<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../conf/conf-db.php');

    // Retrieve form data
    $login = $_POST['login'];
    $password = $_POST['pwd'];

    // Validate inputs (you can add more validation if needed)
    if (empty($login) || empty($password)) {
        $msg = "Please enter both email and password.";
    } else {
        try {
            // Prepare SQL statement to fetch user details
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch();

            // Verify password
            if ($user && $password === $user['passwd']) { // Compare plain text passwords
                // Password is correct, set session variables or redirect as needed
                $_SESSION['user_id'] = $user['idUser'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_permission'] = $user['permission'];

                // Redirect to admin page or any other authenticated page
                header("Location: ../admin/portfolio.php");
                exit();
            } else {
                // Invalid login credentials
                $msg = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $msg = "Database error: " . $e->getMessage();
        }
    }
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
    <main id="main">

        <section class="login">
            <div class="login-container">
                <div class="login-title">
                    <h2>Login</h2>
                </div>
                <div class="login-content container">
                    <form class="login-form" action="login.php" method="post">
                        <div class="form-ctrl">
                            <label for="login" class="form-ctrl">E-mail</label>
                            <input type="email" class="form-ctrl" id="login" name="login" value="<?php echo (!empty($_POST['login'])) ? $_POST['login'] : null; ?>" required>
                        </div>
                        <div class="form-ctrl">
                            <label for="pwd" class="form-ctrl">Password</label>
                            <input type="password" class="form-ctrl" id="pwd" name="pwd" value="" required>
                        </div>
                        <input type="hidden" id="form" name="form" value="login">
                        <button type="submit" class="btn-primary">Login</button>
                    </form>
                </div>
            </div>
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

</body>

</html>