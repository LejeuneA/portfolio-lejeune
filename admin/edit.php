<?php
require '../conf/conf-db.php';

// Check if the form has been submitted for update or delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $image_url = $_POST['image_url'];
        $info_url = $_POST['info_url'];
        $live_url = $_POST['live_url'];
        $github_url = $_POST['github_url'];

        $sql = "UPDATE portfolio SET image_url = :image_url, info_url = :info_url, live_url = :live_url, github_url = :github_url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['image_url' => $image_url, 'info_url' => $info_url, 'live_url' => $live_url, 'github_url' => $github_url, 'id' => $id]);

        echo "Record updated successfully!";
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM portfolio WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        echo "Record deleted successfully!";
    }
}

// Fetch the record to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM portfolio WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $record = $stmt->fetch();

    if (!$record) {
        die("Record not found!");
    }
} else {
    die("ID not specified!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Portfolio Item</title>
</head>
<body>
    <h1>Edit Portfolio Item</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($record['id']) ?>">
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" value="<?= htmlspecialchars($record['image_url']) ?>"><br>
        <label for="info_url">Info URL:</label>
        <input type="text" name="info_url" value="<?= htmlspecialchars($record['info_url']) ?>"><br>
        <label for="live_url">Live URL:</label>
        <input type="text" name="live_url" value="<?= htmlspecialchars($record['live_url']) ?>"><br>
        <label for="github_url">GitHub URL:</label>
        <input type="text" name="github_url" value="<?= htmlspecialchars($record['github_url']) ?>"><br>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
    </form>
</body>
</html>
