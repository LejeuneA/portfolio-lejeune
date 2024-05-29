<?php
require '../conf/conf-db.php';

// Fetch all records from the portfolio table
$sql = "SELECT * FROM portfolio";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Portfolio</title>
</head>
<body>
    <h1>Portfolio</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image URL</th>
                <th>Info URL</th>
                <th>Live URL</th>
                <th>GitHub URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><?= htmlspecialchars($item['image_url']) ?></td>
                    <td><?= htmlspecialchars($item['info_url']) ?></td>
                    <td><?= htmlspecialchars($item['live_url']) ?></td>
                    <td><?= htmlspecialchars($item['github_url']) ?></td>
                    <td><a href="edit.php?id=<?= htmlspecialchars($item['id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
