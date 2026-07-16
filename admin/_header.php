<?php

$pageTitle = $pageTitle ?? 'Admin';
$activePage = $activePage ?? '';
$showAdminNav = $showAdminNav ?? true;

function renderAdminNavigation(
    string $activePage,
    bool $showAdminNav,
    string $navigationId,
): void {
?>
    <nav
        id="<?= e($navigationId) ?>"
        class="nav-menu navbar"
        aria-label="Admin navigation">
        <ul>
            <li>
                <a
                    href="../index.php#hero"
                    class="nav-link <?= $activePage === 'home'
                                        ? 'active'
                                        : '' ?>">
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <span>Home</span>
                </a>
            </li>

            <?php if ($showAdminNav): ?>
                <li>
                    <a
                        href="portfolio.php"
                        class="nav-link <?= $activePage === 'portfolio'
                                            ? 'active'
                                            : '' ?>">
                        <i class="fas fa-list" aria-hidden="true"></i>
                        <span>Display</span>
                    </a>
                </li>

                <li>
                    <a
                        href="add.php"
                        class="nav-link <?= $activePage === 'add'
                                            ? 'active'
                                            : '' ?>">
                        <i
                            class="fa-solid fa-square-plus"
                            aria-hidden="true"></i>

                        <span>Add</span>
                    </a>
                </li>

                <li>
                    <a
                        href="messages.php"
                        class="nav-link <?= $activePage === 'messages'
                                            ? 'active'
                                            : '' ?>">
                        <i
                            class="fa-solid fa-envelope"
                            aria-hidden="true"></i>

                        <span>My messages</span>
                    </a>
                </li>

                <li class="logout-item">
                    <form
                        action="logoff.php"
                        method="post"
                        class="logout-form">
                        <input
                            type="hidden"
                            name="csrf_token"
                            value="<?= e(getCsrfToken()) ?>">

                        <button
                            type="submit"
                            class="logout-button">
                            <i
                                class="fa-solid fa-right-from-bracket"
                                aria-hidden="true"></i>

                            <span>Logoff</span>
                        </button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="noindex, nofollow">

    <link
        rel="stylesheet"
        href="../dist/index.css">

    <style>
        .nav-menu .logout-item {
            width: 100%;
            margin: 1rem 0 0;
            padding: 0;
            list-style: none;
        }

        .nav-menu .logout-form {
            display: block;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .nav-menu .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            width: 100%;
            min-height: 46px;
            margin: 0;
            padding: 0.75rem 1.5rem;

            border: 1px solid rgba(156, 166, 183, 0.3);
            border-radius: 0.7rem;
            outline: 0;

            background-color: rgba(156, 166, 183, 0.12);
            color: #ffffff;

            font-family: inherit;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.4;
            text-align: center;

            appearance: none;
            -webkit-appearance: none;
            box-sizing: border-box;
            cursor: pointer;

            transition:
                background-color 0.3s ease,
                border-color 0.3s ease,
                color 0.3s ease,
                transform 0.3s ease;
        }

        .nav-menu .logout-button i {
            margin: 0;
            padding: 0;
            color: inherit;
            font-size: 0.95rem;
        }

        .nav-menu .logout-button:hover {
            background-color: #41965f;
            border-color: #41965f;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .nav-menu .logout-button:focus-visible {
            outline: 2px solid #41965f;
            outline-offset: 3px;
        }
    </style>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link
        rel="icon"
        type="image/png"
        href="../assets/icons/favicon.png">

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700">

    <title><?= e($pageTitle) ?></title>
</head>

<body>
    <header id="header">
        <div class="profile">
            <img
                src="../assets/images/header-photo.jpg"
                alt="Açelya Lejeune"
                class="profile-img">

            <h1 class="text-light">
                <a href="../index.php">
                    Açelya Lejeune
                </a>
            </h1>

            <div class="social-links">
                <a
                    href="https://github.com/lejeunea"
                    class="github"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="GitHub profile">
                    <i class="fa fa-github" aria-hidden="true"></i>
                </a>

                <a
                    href="https://www.linkedin.com/in/acelyalejeune"
                    class="linkedin"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="LinkedIn profile">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <?php
        renderAdminNavigation(
            $activePage,
            $showAdminNav,
            'navbar',
        );
        ?>
    </header>

    <div id="mySidenav" class="sidenav">
        <button
            type="button"
            class="closebtn"
            onclick="closeNav()"
            aria-label="Close navigation">
            &times;
        </button>

        <div class="profile">
            <img
                src="../assets/images/header-photo.jpg"
                alt="Açelya Lejeune"
                class="profile-img">

            <h1 class="text-light">
                <a href="../index.php">
                    Açelya Lejeune
                </a>
            </h1>

            <div class="social-links">
                <a
                    href="https://github.com/lejeunea"
                    class="github"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="GitHub profile">
                    <i class="fa fa-github" aria-hidden="true"></i>
                </a>

                <a
                    href="https://www.linkedin.com/in/acelyalejeune"
                    class="linkedin"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="LinkedIn profile">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <?php
        renderAdminNavigation(
            $activePage,
            $showAdminNav,
            'mobile-navbar',
        );
        ?>
    </div>

    <div class="navbar-hamburger">
        <button
            id="hamburger"
            type="button"
            onclick="openNav()"
            aria-label="Open navigation">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
    </div>
