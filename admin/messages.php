<?php
session_start();
require '../conf/conf-db.php';

// Database connection
$conn = new mysqli('localhost', 'root', '@NtLYa130580', 'portfolio');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM contact_info WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    // Redirect to prevent form resubmission
    header("Location: messages.php");
    exit();
}

// Fetch all messages from the database
$sql = "SELECT * FROM contact_info";
$result = $conn->query($sql);

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Title -->
    <title>My Messages</title>
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
    <main id="main" class="admin-messages">
        <div class="section-messages">
            <h1>My Messages</h1>
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["firstName"] . "</td>";
                    echo "<td>" . $row["lastName"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>
                            <form method='post' action='messages.php' onsubmit='return confirm(\"Are you sure you want to delete this message?\");'>
                                <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn-primary'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No messages found.";
            }
            $conn->close();
            ?>
        </div>
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