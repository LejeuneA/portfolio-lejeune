<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLogin();

require_once __DIR__ . '/../conf/conf-db.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? null;
    $deleteId = filter_input(
        INPUT_POST,
        'delete_id',
        FILTER_VALIDATE_INT,
    );

    if (!isValidCsrfToken(
        is_string($csrfToken) ? $csrfToken : null,
    )) {
        $error = 'Your session expired. Please try again.';
    } elseif (
        $deleteId === false ||
        $deleteId === null ||
        $deleteId < 1
    ) {
        $error = 'Invalid message.';
    } else {
        try {
            $statement = $pdo->prepare(
                'DELETE FROM contact_info WHERE id = :id'
            );

            $statement->execute([
                'id' => $deleteId,
            ]);

            setFlash(
                'Message deleted successfully.',
                'success',
            );

            header('Location: messages.php', true, 303);
            exit;
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            $error = 'The message could not be deleted.';
        }
    }
}

$messages = [];

try {
    $statement = $pdo->query(
        'SELECT
            id,
            firstName,
            lastName,
            email,
            subject,
            message
        FROM contact_info
        ORDER BY id DESC'
    );

    $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    $error = 'Messages could not be loaded.';
}

$flash = getFlash();

$pageTitle = 'My Messages';
$activePage = 'messages';

require __DIR__ . '/_header.php';

?>

<main id="main" class="admin-messages">
    <div class="section-messages">
        <h1>My Messages</h1>

        <?php if ($flash !== null): ?>
            <div class="message <?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>

        <?php if ($error !== null): ?>
            <div class="message error">
                <?= e($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($messages === []): ?>
            <p>No messages found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr>
                            <td><?= e($message['id']) ?></td>
                            <td><?= e($message['firstName']) ?></td>
                            <td><?= e($message['lastName']) ?></td>

                            <td>
                                <a href="mailto:<?= e($message['email']) ?>">
                                    <?= e($message['email']) ?>
                                </a>
                            </td>

                            <td><?= e($message['subject']) ?></td>

                            <td>
                                <?= nl2br(e($message['message'])) ?>
                            </td>

                            <td>
                                <form
                                    method="post"
                                    action="messages.php"
                                    onsubmit="return confirm(
                                        'Are you sure you want to delete this message?'
                                    );">
                                    <input
                                        type="hidden"
                                        name="csrf_token"
                                        value="<?= e(getCsrfToken()) ?>">

                                    <input
                                        type="hidden"
                                        name="delete_id"
                                        value="<?= e($message['id']) ?>">

                                    <button
                                        type="submit"
                                        class="btn-primary">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/_footer.php'; ?>
