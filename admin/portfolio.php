<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLogin();

require_once __DIR__ . '/../conf/conf-db.php';

$items = [];
$error = null;

try {
    $statement = $pdo->query(
        'SELECT
            id,
            image_url,
            info_url,
            info_url_fr,
            live_url,
            github_url
        FROM portfolio
        ORDER BY id DESC'
    );

    $items = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    $error = 'Portfolio records could not be loaded.';
}

$flash = getFlash();

$pageTitle = 'Portfolio Administration';
$activePage = 'portfolio';

require __DIR__ . '/_header.php';

?>

<main id="main" class="admin-portfolio">
    <h1>Portfolio</h1>

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

    <section class="section-portfolio">
        <?php if ($items === []): ?>
            <p>No portfolio items found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image URL</th>
                        <th>Info URL</th>
                        <th>Info URL FR</th>
                        <th>Live URL</th>
                        <th>GitHub URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= e($item['id']) ?></td>
                            <td><?= e($item['image_url']) ?></td>
                            <td><?= e($item['info_url']) ?></td>
                            <td><?= e($item['info_url_fr']) ?></td>
                            <td><?= e($item['live_url']) ?></td>
                            <td><?= e($item['github_url']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= e($item['id']) ?>">
                                    <i class="fas fa-tools"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>
</main>

<?php require __DIR__ . '/_footer.php'; ?>
