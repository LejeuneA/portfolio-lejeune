<?php
require '../conf/conf-db.php';

$sql = "SELECT * FROM portfolio";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll();
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Title -->
    <title>Display Portfolio Items</title>
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
    <!-- Main -->
    <main id="main" class="admin-portfolio">
        <h1>Portfolio</h1>
        <section class="section-portfolio">
            
            <table>
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
                    <?php foreach ($items as $item) : ?>
                        <tr>
                            <td><?= htmlspecialchars($item['id']) ?></td>
                            <td><?= htmlspecialchars($item['image_url']) ?></td>
                            <td><?= htmlspecialchars($item['info_url']) ?></td>
                            <td><?= htmlspecialchars($item['live_url']) ?></td>
                            <td><?= htmlspecialchars($item['github_url']) ?></td>
                            <td><a href="edit.php?id=<?= htmlspecialchars($item['id']) ?>"><i class="fas fa-tools"></i> Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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

    <!-- Include main.js -->
    <script src="../js/main.js"></script>

    <!-- Custom JS for debugging data-cell attributes -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cells = document.querySelectorAll('td[data-cell]');
            cells.forEach(cell => {
                console.log(`${cell.getAttribute('data-cell')}: ${cell.textContent}`);
            });
        });
    </script>
</body>

</html>
