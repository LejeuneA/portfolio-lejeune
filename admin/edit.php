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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Acelya Lejeune - Web Developer and Graphic Designer">
	<meta content="web, developer, designer, portfolio, web developer, web designer, graphic designer, acelya lejeune, lejeune, frontend, web developer liege, web designer liege, devéloppeur web liege, designer graphique liege, infographiste" name="keywords">

	<!-- Main Css file -->
	<link rel="stylesheet" href="../css/styles.css">

	<!-- Favicon -->
	<link href="../assets/icons/favicon.png" rel="icon" type="image/png">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Title -->
	<title>Edit Portfolio Item</title>
</head>

<body>
	<!-----------------------------------------------------------------
                               Navigation
    ------------------------------------------------------------------>
    <header id="header">
        <!-- Profile -->
        <div class="profile">
            <img src="../assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="index.html">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="../fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="../index.php#hero" class="nav-link scrollto active"><i class="fas fa-home"></i><span>Home</span></a>
                </li>
                <li><a href="portfolio.php" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Display</span></a></li>
                </li>
                <li><a href="add.php" class="nav-link scrollto"><i class="fa-solid fa-square-plus"></i>
                        <span>Add</span></a></li>
            </ul>
            <div class="btn-resume">
                <a class="btn-resume" href="../admin/portfolio.php">Admin</a>
            </div>
        </nav>
        <!-- End Nav Menu -->
    </header>
    <!-- End Header -->

    <!-----------------------------------------------------------------
						Offcanvas Menu
	------------------------------------------------------------------>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- Profile -->
        <div class="profile">
            <img src="../assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="index.html">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="../fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="../index.php#hero" class="nav-link scrollto active"><i class="fas fa-home"></i><span>Home</span></a>
                </li>
                <li><a href="portfolio.php" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Display</span></a></li>
                </li>
                <li><a href="add.php" class="nav-link scrollto"><i class="fa-solid fa-square-plus"></i>
                        <span>Add</span></a></li>
            </ul>
            <div class="btn-resume">
                <a class="btn-resume" href="../admin/portfolio.php">Admin</a>
            </div>
        </nav>
        <!-- Nav menu end -->
        <!-- Hamburger Icon -->
        <div class="navbar-hamburger">
            <div id="hamburger" onclick="openNav()"><i class="fa-solid fa-bars"></i></div>
        </div>
		<!-- Hamburger icon end -->
    </div>
    <!-- Offcanvas menu end-->
    <!-----------------------------------------------------------------
						  Navigation end
    ------------------------------------------------------------------>
	<!--  -->
	<main id="main">
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
	</main>

	<!-----------------------------------------------------------------
                               Footer
    ------------------------------------------------------------------>
	<footer id="footer">
		<div class="footer-container container">
			<div class="copyright">
				&copy; Copyright, design and development by <a class="github" href="https://github.com/LejeuneA/portfolio-lejeune" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> Açelya
					Lejeune</a>
			</div>
		</div>
	</footer>
	<!-----------------------------------------------------------------
                               Footer end
    ------------------------------------------------------------------>

	<!-- Font Awesome JS -->
	<script src="https://kit.fontawesome.com/3546d47201.js" crossorigin="anonymous"></script>

	<!-- Include main.js -->
	<script src="../js/main.js"></script>

</body>

</html>