<?php
session_start(); // Start the session
require '../conf/conf-db.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_url = $_POST['image_url'];
    $info_url = $_POST['info_url'];
    $info_url_fr = $_POST['info_url_fr'];
    $live_url = $_POST['live_url'];
    $github_url = $_POST['github_url'];

    $sql = "INSERT INTO portfolio (image_url, info_url, info_url_fr, live_url, github_url) VALUES (:image_url, :info_url, :info_url_fr, :live_url, :github_url)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute(['image_url' => $image_url, 'info_url' => $info_url, 'info_url_fr' => $info_url_fr, 'live_url' => $live_url, 'github_url' => $github_url])) {
        $_SESSION['message'] = "Record added successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to add record.";
        $_SESSION['message_type'] = "error";
    }

    // Redirect back to the add.php page
    header('Location: add.php');
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
    <title>Add Portfolio Item</title>
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
    <main id="main" class="admin-add">
        <h1>Add Portfolio Item</h1>

        <?php if (isset($_SESSION['message'])) : ?>
            <div class="message <?= $_SESSION['message_type']; ?>">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>


        <section class="section-add">
            <form method="POST" action="add.php">

                <label for="image_url">Image URL:</label>
                <input type="text" name="image_url" required>

                <label for="info_url">Info URL:</label>
                <input type="text" name="info_url" required>

                <label for="info_url_fr">Info URL FR:</label>
                <input type="text" name="info_url_fr" required>

                <label for="live_url">Live URL:</label>
                <input type="text" name="live_url" required>

                <label for="github_url">GitHub URL:</label>
                <input type="text" name="github_url" required>

                <div class="btn-submit">
                    <button type="submit">Add</button>
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