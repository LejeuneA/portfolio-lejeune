<?php

session_start();
require '../conf/conf-db.php';

// Check if the form has been submitted for update or delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$image_url = $_POST['image_url'];
		$info_url = $_POST['info_url'];
		$info_url_fr = $_POST['info_url_fr'];
		$live_url = $_POST['live_url'];
		$github_url = $_POST['github_url'];

		$sql = "UPDATE portfolio SET image_url = :image_url, info_url = :info_url, info_url_fr = :info_url_fr, live_url = :live_url, github_url = :github_url WHERE id = :id";
		$stmt = $pdo->prepare($sql);
		if ($stmt->execute(['image_url' => $image_url, 'info_url' => $info_url, 'info_url_fr' => $info_url_fr, 'live_url' => $live_url, 'github_url' => $github_url, 'id' => $id])) {
			$_SESSION['message'] = "Record updated successfully!";
			$_SESSION['message_type'] = "success";
		} else {
			$_SESSION['message'] = "Failed to update record.";
			$_SESSION['message_type'] = "error";
		}

		header('Location: edit.php?id=' . $id);
		exit;
	}

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];

		$sql = "DELETE FROM portfolio WHERE id = :id";
		$stmt = $pdo->prepare($sql);
		if ($stmt->execute(['id' => $id])) {
			$_SESSION['message'] = "Record deleted successfully!";
			$_SESSION['message_type'] = "success";
		} else {
			$_SESSION['message'] = "Failed to delete record.";
			$_SESSION['message_type'] = "error";
		}

		header('Location: ../admin/portfolio.php');
		exit;
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
		$_SESSION['message'] = "Record not found!";
		$_SESSION['message_type'] = "error";
		header('Location: ../admin/portfolio.php');
		exit;
	}
} else {
	$_SESSION['message'] = "ID not specified!";
	$_SESSION['message_type'] = "error";
	header('Location: ../admin/portfolio.php');
	exit;
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
	<link rel="stylesheet" href="../dist/index.css">

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
			<h1 class="text-light"><a href="../index.php">Açelya Lejeune</a></h1>
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
				<li><a href="messages.php" class="nav-link scrollto"><i class="fa-solid fa-envelope"></i>
						<span>My messages</span></a></li>
			</ul>
			<div class="btn-resume">
				<a class="btn-resume" href="../admin/logoff.php">Logoff</a>
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
			<h1 class="text-light"><a href="../index.php">Açelya Lejeune</a></h1>
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
				<li><a href="messages.php" class="nav-link scrollto"><i class="fa-solid fa-envelope"></i>
						<span>My messages</span></a></li>
			</ul>
			<div class="btn-resume">
				<a class="btn-resume" href="../admin/logoff.php">Logoff</a>
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
	<!-- Main -->
	<main id="main" class="admin-edit">
		<h1>Edit Portfolio Item</h1>

		<?php if (isset($_SESSION['message'])) : ?>
			<div class="message <?= $_SESSION['message_type']; ?>">
				<?= $_SESSION['message']; ?>
				<?php unset($_SESSION['message']); ?>
			</div>
		<?php endif; ?>


		<section class="section-edit">
			<form method="POST" action="edit.php">

				<label for="id">ID</label>
				<input type="text" name="id" value="<?= htmlspecialchars($record['id']) ?>">

				<label for="image_url">Image URL:</label>
				<input type="text" name="image_url" value="<?= htmlspecialchars($record['image_url']) ?>">

				<label for="info_url">Info URL:</label>
				<input type="text" name="info_url" value="<?= htmlspecialchars($record['info_url']) ?>">

				<label for="info_url_fr">Info URL FR:</label>
				<input type="text" name="info_url_fr" value="<?= htmlspecialchars($record['info_url_fr']) ?>">

				<label for="live_url">Live URL:</label>
				<input type="text" name="live_url" value="<?= htmlspecialchars($record['live_url']) ?>">

				<label for="github_url">GitHub URL:</label>
				<input type="text" name="github_url" value="<?= htmlspecialchars($record['github_url']) ?>">

				<div class="btn-submit">
					<button type="submit" name="update">Update</button>
					<button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
				</div>
			</form>
		</section>
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

	 <!-- JS Files -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.css"></script>

    <!-- Main JS Files -->
    <script defer="defer" src="../dist/runtime.bundle.js"></script>
    <script defer="defer" src="../dist/shared.bundle.js"></script>
    <script defer="defer" src="../dist/index.bundle.js"></script>
    <script defer="defer" src="../dist/nav.bundle.js"></script>
    <script defer="defer" src="../dist/swiper.bundle.js"></script>


	<script>
		AOS.init();
	</script>
</body>

</html>