<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLogin();

require_once __DIR__ . '/../conf/conf-db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    setFlash('Invalid portfolio item.', 'error');
    header('Location: portfolio.php', true, 303);
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? null;

    if (!isValidCsrfToken(
        is_string($csrfToken) ? $csrfToken : null,
    )) {
        $error = 'Your session expired. Please try again.';
    } elseif (isset($_POST['delete'])) {
        try {
            $statement = $pdo->prepare(
                'DELETE FROM portfolio WHERE id = :id'
            );

            $statement->execute([
                'id' => $id,
            ]);

            setFlash(
                'Portfolio item deleted successfully.',
                'success',
            );

            header('Location: portfolio.php', true, 303);
            exit;
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            $error = 'The portfolio item could not be deleted.';
        }
    } elseif (isset($_POST['update'])) {
        $formData = getPortfolioFormData($_POST);
        $error = validatePortfolioFormData($formData);

        if ($error === null) {
            try {
                $statement = $pdo->prepare(
                    'UPDATE portfolio
                    SET
                        image_url = :image_url,
                        info_url = :info_url,
                        info_url_fr = :info_url_fr,
                        live_url = :live_url,
                        github_url = :github_url
                    WHERE id = :id'
                );

                $statement->execute([
                    ...$formData,
                    'id' => $id,
                ]);

                setFlash(
                    'Portfolio item updated successfully.',
                    'success',
                );

                header(
                    'Location: edit.php?id=' . $id,
                    true,
                    303,
                );

                exit;
            } catch (Throwable $exception) {
                error_log($exception->getMessage());
                $error = 'The portfolio item could not be updated.';
            }
        }
    }
}

try {
    $statement = $pdo->prepare(
        'SELECT
            id,
            image_url,
            info_url,
            info_url_fr,
            live_url,
            github_url
        FROM portfolio
        WHERE id = :id
        LIMIT 1'
    );

    $statement->execute([
        'id' => $id,
    ]);

    $record = $statement->fetch(PDO::FETCH_ASSOC);

    if ($record === false) {
        setFlash('Portfolio item not found.', 'error');
        header('Location: portfolio.php', true, 303);
        exit;
    }
} catch (Throwable $exception) {
    error_log($exception->getMessage());

    setFlash('Portfolio item could not be loaded.', 'error');
    header('Location: portfolio.php', true, 303);
    exit;
}

$flash = getFlash();

$pageTitle = 'Edit Portfolio Item';
$activePage = 'portfolio';

require __DIR__ . '/_header.php';

?>

<main id="main" class="admin-edit">
    <h1>Edit Portfolio Item</h1>

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

    <section class="section-edit">
        <form
            method="post"
            action="edit.php?id=<?= e($record['id']) ?>">
            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(getCsrfToken()) ?>">

            <label for="display_id">ID</label>
            <input
                type="text"
                id="display_id"
                value="<?= e($record['id']) ?>"
                readonly>

            <label for="image_url">Image URL</label>
            <input
                type="text"
                id="image_url"
                name="image_url"
                value="<?= e($record['image_url']) ?>"
                maxlength="2048"
                required>

            <label for="info_url">Info URL</label>
            <input
                type="text"
                id="info_url"
                name="info_url"
                value="<?= e($record['info_url']) ?>"
                maxlength="2048"
                required>

            <label for="info_url_fr">Info URL FR</label>
            <input
                type="text"
                id="info_url_fr"
                name="info_url_fr"
                value="<?= e($record['info_url_fr']) ?>"
                maxlength="2048"
                required>

            <label for="live_url">Live URL</label>
            <input
                type="text"
                id="live_url"
                name="live_url"
                value="<?= e($record['live_url']) ?>"
                maxlength="2048"
                required>

            <label for="github_url">GitHub URL</label>
            <input
                type="text"
                id="github_url"
                name="github_url"
                value="<?= e($record['github_url']) ?>"
                maxlength="2048"
                required>

            <div class="btn-submit">
                <button type="submit" name="update">
                    Update
                </button>

                <button
                    type="submit"
                    name="delete"
                    onclick="return confirm(
                        'Are you sure you want to delete this item?'
                    );">
                    Delete
                </button>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__ . '/_footer.php'; ?>
