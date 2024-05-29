<?php
require '../conf/conf-db.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_url = $_POST['image_url'];
    $info_url = $_POST['info_url'];
    $live_url = $_POST['live_url'];
    $github_url = $_POST['github_url'];

    $sql = "INSERT INTO portfolio (image_url, info_url, live_url, github_url) VALUES (:image_url, :info_url, :live_url, :github_url)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['image_url' => $image_url, 'info_url' => $info_url, 'live_url' => $live_url, 'github_url' => $github_url]);

    echo "Record added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Portfolio Item</title>
</head>
<body>
    <h1>Add Portfolio Item</h1>
    <form method="POST" action="add.php">
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" required><br>
        <label for="info_url">Info URL:</label>
        <input type="text" name="info_url" required><br>
        <label for="live_url">Live URL:</label>
        <input type="text" name="live_url" required><br>
        <label for="github_url">GitHub URL:</label>
        <input type="text" name="github_url" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
