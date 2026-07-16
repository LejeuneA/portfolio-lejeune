<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../conf/conf-db.php';

if (!empty($_SESSION['user_id'])) {
    header('Location: portfolio.php', true, 303);
    exit;
}

$msg = null;
$loginValue = '';

$blockedUntil = (int) ($_SESSION['login_block_until'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginValue = trim((string) ($_POST['login'] ?? ''));
    $password = (string) ($_POST['pwd'] ?? '');
    $csrfToken = $_POST['csrf_token'] ?? null;

    if (time() < $blockedUntil) {
        $remainingSeconds = $blockedUntil - time();

        $msg = sprintf(
            'Too many failed attempts. Try again in %d seconds.',
            $remainingSeconds,
        );
    } elseif (!isValidCsrfToken(
        is_string($csrfToken) ? $csrfToken : null,
    )) {
        $msg = 'Your session expired. Please try again.';
    } elseif (
        !filter_var($loginValue, FILTER_VALIDATE_EMAIL) ||
        $password === ''
    ) {
        $msg = 'Please enter a valid email address and password.';
    } else {
        try {
            $statement = $pdo->prepare(
                'SELECT
                    idUser,
                    email,
                    passwd,
                    permission
                FROM users
                WHERE email = :email
                LIMIT 1'
            );

            $statement->execute([
                'email' => $loginValue,
            ]);

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $validLogin = (
                $user !== false &&
                (int) $user['permission'] === 1 &&
                password_verify(
                    $password,
                    (string) $user['passwd'],
                )
            );

            if ($validLogin) {
                session_regenerate_id(true);

                $_SESSION['user_id'] = (int) $user['idUser'];
                $_SESSION['user_email'] = (string) $user['email'];
                $_SESSION['user_permission'] = (int) $user['permission'];

                unset(
                    $_SESSION['login_failures'],
                    $_SESSION['login_block_until'],
                    $_SESSION['csrf_token'],
                );

                if (password_needs_rehash(
                    (string) $user['passwd'],
                    PASSWORD_DEFAULT,
                )) {
                    $newHash = password_hash(
                        $password,
                        PASSWORD_DEFAULT,
                    );

                    $updateStatement = $pdo->prepare(
                        'UPDATE users
                        SET passwd = :passwd
                        WHERE idUser = :id'
                    );

                    $updateStatement->execute([
                        'passwd' => $newHash,
                        'id' => (int) $user['idUser'],
                    ]);
                }

                header('Location: portfolio.php', true, 303);
                exit;
            }

            $failures = (int) (
                $_SESSION['login_failures'] ?? 0
            ) + 1;

            if ($failures >= 5) {
                $_SESSION['login_block_until'] = time() + 300;
                $_SESSION['login_failures'] = 0;

                $msg = 'Too many failed attempts. Try again in 5 minutes.';
            } else {
                $_SESSION['login_failures'] = $failures;
                $msg = 'Invalid email or password.';
            }
        } catch (Throwable $exception) {
            error_log($exception->getMessage());

            $msg = 'Unable to sign in right now.';
        }
    }
}

$pageTitle = 'Admin Login';
$activePage = '';
$showAdminNav = false;

require __DIR__ . '/_header.php';

?>

<main id="main">
    <section class="login">
        <div class="login-container">
            <div class="login-title">
                <h2>Login</h2>
            </div>

            <div class="login-content container">
                <?php if ($msg !== null): ?>
                    <div class="message error">
                        <?= e($msg) ?>
                    </div>
                <?php endif; ?>

                <form
                    class="login-form"
                    action="login.php"
                    method="post">
                    <input
                        type="hidden"
                        name="csrf_token"
                        value="<?= e(getCsrfToken()) ?>">

                    <div class="form-ctrl">
                        <label for="login" class="form-ctrl">
                            E-mail
                        </label>

                        <input
                            type="email"
                            class="form-ctrl"
                            id="login"
                            name="login"
                            value="<?= e($loginValue) ?>"
                            autocomplete="username"
                            required>
                    </div>

                    <div class="form-ctrl">
                        <label for="pwd" class="form-ctrl">
                            Password
                        </label>

                        <input
                            type="password"
                            class="form-ctrl"
                            id="pwd"
                            name="pwd"
                            autocomplete="current-password"
                            required>
                    </div>

                    <button type="submit" class="btn-primary">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_footer.php'; ?>
