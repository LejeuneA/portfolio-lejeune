<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLogin();

require_once __DIR__ . '/../conf/conf-db.php';

$formData = [
    'image_url' => '',
    'info_url' => '',
    'info_url_fr' => '',
    'live_url' => '',
    'github_url' => '',
];

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? null;

    if (!isValidCsrfToken(
        is_string($csrfToken) ? $csrfToken : null,
    )) {
        $error = 'Your session expired. Please try again.';
    } else {
        $formData = getPortfolioFormData($_POST);
        $error = validatePortfolioFormData($formData);

        if ($error === null) {
            try {
                $statement = $pdo->prepare(
                    'INSERT INTO portfolio (
                        image_url,
                        info_url,
                        info_url_fr,
                        live_url,
                        github_url
                    ) VALUES (
                        :image_url,
                        :info_url,
                        :info_url_fr,
                        :live_url,
                        :github_url
                    )'
                );

                $statement->execute($formData);

                setFlash(
                    'Portfolio item added successfully.',
                    'success',
                );

                header('Location: portfolio.php', true, 303);
                exit;
            } catch (Throwable $exception) {
                error_log($exception->getMessage());
                $error = 'The portfolio item could not be added.';
            }
        }
    }
}

$pageTitle = 'Add Portfolio Item';
$activePage = 'add';

require __DIR__ . '/_header.php';

?>

<main id="main" class="admin-add">
    <h1>Add Portfolio Item</h1>

    <?php if ($error !== null): ?>
        <div class="message error">
            <?= e($error) ?>
        </div>
    <?php endif; ?>

    <section class="section-add">
        <form method="post" action="add.php">
            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(getCsrfToken()) ?>">

            <label for="image_url">Image URL</label>
            <input
                type="text"
                id="image_url"
                name="image_url"
                value="<?= e($formData['image_url']) ?>"
                maxlength="2048"
                required>

            <label for="info_url">Info URL</label>
            <input
                type="text"
                id="info_url"
                name="info_url"
                value="<?= e($formData['info_url']) ?>"
                maxlength="2048"
                required>

            <label for="info_url_fr">Info URL FR</label>
            <input
                type="text"
                id="info_url_fr"
                name="info_url_fr"
                value="<?= e($formData['info_url_fr']) ?>"
                maxlength="2048"
                required>

            <label for="live_url">Live URL</label>
            <input
                type="text"
                id="live_url"
                name="live_url"
                value="<?= e($formData['live_url']) ?>"
                maxlength="2048"
                required>

            <label for="github_url">GitHub URL</label>
            <input
                type="text"
                id="github_url"
                name="github_url"
                value="<?= e($formData['github_url']) ?>"
                maxlength="2048"
                required>

            <div class="btn-submit">
                <button type="submit">Add</button>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__ . '/_footer.php'; ?>
