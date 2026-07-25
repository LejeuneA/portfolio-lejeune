<?php

$portfolioItems = [];
$databaseError = null;

$cssPath = __DIR__ . '/dist/index.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();

$esc = function ($value, $fallback = '') {
    return htmlspecialchars((string)($value ?? $fallback), ENT_QUOTES, 'UTF-8');
};

$getPortfolioMeta = function ($item) {
    $source = strtolower(
        ($item['info_url'] ?? '') . ' ' .
            ($item['github_url'] ?? '') . ' ' .
            ($item['image_url'] ?? '')
    );

    if (strpos($source, 'flowdeck') !== false) {
        return [
            'title' => 'Flowdeck',
            'stack' => 'React · TypeScript · Python/Flask'
        ];
    }

    if (strpos($source, 'positive-quotes') !== false) {
        return [
            'title' => 'Positive Quotes App',
            'stack' => 'Angular · TypeScript · SCSS'
        ];
    }

    if (strpos($source, 'restaurant-pistache') !== false) {
        return [
            'title' => 'Restaurant Pistache',
            'stack' => 'PHP · MySQL · SCSS'
        ];
    }

    if (strpos($source, 'librairie-lejeune') !== false) {
        return [
            'title' => 'Librairie Lejeune',
            'stack' => 'PHP · MySQL · eCommerce'
        ];
    }

    if (strpos($source, 'recettes') !== false) {
        return [
            'title' => 'Les Recettes',
            'stack' => 'HTML · CSS'
        ];
    }

    if (strpos($source, 'tourisme-wallonie') !== false || strpos($source, 'tourism') !== false) {
        return [
            'title' => 'Tourisme Wallonie',
            'stack' => 'HTML · CSS'
        ];
    }

    return [
        'title' => 'Portfolio Project',
        'stack' => 'Web Design · Frontend'
    ];
};

try {
    require_once __DIR__ . '/conf/conf-db.php';

    $sql = '
    SELECT
        id,
        image_url,
        info_url,
        info_url_fr,
        live_url,
        github_url,
        sort_order
    FROM portfolio
    ORDER BY sort_order ASC, id DESC
';

    $statement = $pdo->query($sql);
    $portfolioItems = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $exception) {
    error_log($exception->getMessage());

    $databaseError = 'Portfolio projects could not be loaded.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        name="description"
        content="Portfolio of Açelya Lejeune, a UX/UI Designer and Frontend Developer in Belgium, specialising in React, TypeScript, PHP and AI applications.">

    <meta
        name="keywords"
        content="Açelya Lejeune, UX UI Designer, Frontend Developer, Product Designer, React Developer, TypeScript Developer, PHP Developer, AI Application Developer, web design portfolio, frontend portfolio, Liège, Belgium, remote Europe">

    <!-- AOS File -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Main Css file -->
    <link rel="stylesheet" href="./dist/index.css?v=<?php echo $cssVersion; ?>">

    <!-- Favicon -->
    <link href="./assets/icons/favicon.png" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Title -->
    <title>Acelya Lejeune - Digital Designer, Frontend Developer, AI Developer</title>
</head>

<body>
    <!-----------------------------------------------------------------
                               Navigation
    ------------------------------------------------------------------>
    <header id="header">
        <!-- Profile -->
        <div class="profile">
            <img src="./assets/images/header-photo.jpg" alt="Profile photo of Açelya Lejeune" class="profile-img">
            <h1 class="text-light"><a href="index.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/LejeuneA" class="github" target="_blank" aria-label="GitHub profile">
                    <i class="fa fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"
                    aria-label="LinkedIn profile">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li>
                    <a href="#hero" class="nav-link scrollto active">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="nav-link scrollto">
                        <i class="fas fa-user"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="#skills" class="nav-link scrollto">
                        <i class="fas fa-code"></i>
                        <span>Skills</span>
                    </a>
                </li>
                <li>
                    <a href="#portfolio" class="nav-link scrollto">
                        <i class="fas fa-list"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="#services" class="nav-link scrollto">
                        <i class="fas fa-tools"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="nav-link scrollto">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <div class="btn-resume">
                <a class="btn-resume" href="./assets/resume/CV_LEJEUNE_EN.pdf" download>Download CV</a>
            </div>

            <div class="btn-resume">
                <a class="btn-resume" href="./admin/login.php">Login</a>
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
            <img src="./assets/images/header-photo.jpg" alt="Profile photo of Açelya Lejeune" class="profile-img">
            <h1 class="text-light"><a href="index.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/LejeuneA" class="github" target="_blank" aria-label="GitHub profile">
                    <i class="fa fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"
                    aria-label="LinkedIn profile">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="sidenav-navbar" class="nav-menu navbar">
            <ul>
                <li>
                    <a href="#hero" class="nav-link scrollto active">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="nav-link scrollto">
                        <i class="fas fa-user"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="#skills" class="nav-link scrollto">
                        <i class="fas fa-code"></i>
                        <span>Skills</span>
                    </a>
                </li>
                <li>
                    <a href="#portfolio" class="nav-link scrollto">
                        <i class="fas fa-list"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="#services" class="nav-link scrollto">
                        <i class="fas fa-tools"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="nav-link scrollto">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <div class="btn-resume">
                <a class="btn-resume" href="./assets/resume/CV_LEJEUNE_EN.pdf" download>Download CV</a>
            </div>

            <div class="btn-resume">
                <a class="btn-resume" href="./admin/login.php">Login</a>
            </div>
        </nav>
        <!-- Nav menu end -->
    </div>
    <!-- Offcanvas menu end -->

    <!-- Hamburger Icon -->
    <div class="navbar-hamburger">
        <div id="hamburger" onclick="openNav()">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <!-- Hamburger icon end -->

    <!-----------------------------------------------------------------
                          Navigation end
    ------------------------------------------------------------------>

    <!-----------------------------------------------------------------
                              Hero section
    ------------------------------------------------------------------>
    <section id="hero" class="hero">
        <div class="hero-container" data-aos="fade-in" data-aos-duration="3000">
            <h1>Açelya Lejeune</h1>
            <p>
                <span class="typed"
                    data-typed-items="Digital Designer, Frontend Developer, AI Developer"></span>
            </p>
        </div>
    </section>
    <!-----------------------------------------------------------------
                              Hero section end
    ------------------------------------------------------------------>

    <!-- Main -->
    <main id="main">
        <!-----------------------------------------------------------------
                              About section
        ------------------------------------------------------------------>
        <section id="about" class="about-section">
            <div class="about-container container">
                <h2>About</h2>
                <div class="about-content">
                    <div class="about-container-left" data-aos="fade-right" data-aos-duration="1500">
                        <p>
                            <span class="first-sentence">Hi, I’m Açelya Lejeune.</span>
                            I am a senior designer with a long professional background in graphic design, visual communication
                            and web design. Over the years, I have worked on a wide range of creative and digital projects,
                            developing a strong sense of layout, typography, color, branding and visual hierarchy.
                        </p>
                        <p>
                            <span class="first-sentence">A design background shaped across countries</span>
                            I started my career in Antalya and continued working with agencies, print studios and creative
                            projects in Northern Cyprus, England and Belgium. Living in Brighton also strengthened my
                            connection with English-speaking environments and international teams.
                        </p>
                    </div>

                    <div class="about-container-right">
                        <div class="content" data-aos="fade-left" data-aos-duration="1600">
                            <p>
                                <span class="first-sentence">From design to frontend development</span>
                                After many years in design, I decided to deepen my technical skills and completed a two-year
                                Frontend Developer programme in Liège, Belgium. During this training, I built a final project
                                with <span>Angular</span> and worked with <span>HTML5</span>, <span>CSS3</span>,
                                <span>SCSS</span>, <span>JavaScript</span>, <span>TypeScript</span>, <span>PHP</span> and
                                <span>MySQL</span>.
                            </p>

                            <p>
                                Today, I combine my design experience with frontend development skills. My strongest areas are
                                <span>SCSS</span>, responsive interfaces, UI integration, visual design, Git/GitHub workflows
                                and CMS-based web projects. I also learned <span>Silverstripe</span> in my current workplace.
                            </p>

                            <ul>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Location: <span>Liège, Belgium</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Website: <span>www.acelyalejeune.com</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Email: <span>contact@acelyalejeune.com</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Focus: <span>Digital Design, Web Design, UI Design, Frontend Integration</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Open to: <span>Remote opportunities with UK and European teams</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Languages:
                                    <span>
                                        <br>TURKISH: Native
                                        <br>ENGLISH: Professional working proficiency
                                        <br>FRENCH: B1.1 certificate — good comprehension, basic spoken communication
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------------------------------------------------------
                              About section end
        ------------------------------------------------------------------>
        <!-----------------------------------------------------------------
                              Skills section
------------------------------------------------------------------>
        <section id="skills" class="skills-section">
            <div class="skills-container container">
                <h2>Skills</h2>
                <div class="skills-content">

                    <div class="skills-list-container">
                        <h3>Frontend & UI Development</h3>

                        <ul class="skills-list">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>SCSS / Sass</li>
                            <li>JavaScript</li>
                            <li>TypeScript</li>
                            <li>React</li>
                            <li>Angular</li>
                            <li>Responsive Interfaces</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Backend, APIs & CMS</h3>

                        <ul class="skills-list">
                            <li>PHP</li>
                            <li>Python</li>
                            <li>Flask</li>
                            <li>REST API Integration</li>
                            <li>MySQL</li>
                            <li>Silverstripe</li>
                            <li>CMS Workflows</li>
                            <li>Node.js / npm</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Product Design & Visual Tools</h3>

                        <ul class="skills-list">
                            <li>UX/UI Design</li>
                            <li>Product Design</li>
                            <li>Interface Design</li>
                            <li>Figma</li>
                            <li>Adobe Photoshop</li>
                            <li>Adobe Illustrator</li>
                            <li>Adobe InDesign</li>
                            <li>Visual Design</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Workflow, AI & Collaboration</h3>

                        <ul class="skills-list">
                            <li>Git</li>
                            <li>GitHub</li>
                            <li>Bitbucket</li>
                            <li>Jira</li>
                            <li>Webpack / Vite</li>
                            <li>Prompt Engineering</li>
                            <li>AI Application Development Basics</li>
                            <li>Frontend / Backend Separation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------------------------------------------------------
                              Skills section end
------------------------------------------------------------------->

        <!-----------------------------------------------------------------
                              Portfolio section
        ------------------------------------------------------------------>
        <section id="portfolio" class="portfolio-section">
            <div class="portfolio-content container">
                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>
                        This portfolio presents selected projects that bring together my background in UX/UI, visual design
                        and frontend development. The projects show how I translate design decisions into responsive digital
                        interfaces using technologies such as HTML5, CSS3, SCSS, JavaScript, TypeScript, Angular, React,
                        PHP, MySQL, Python and Flask.
                    </p>
                    <p>
                        My work combines visual clarity, structured layouts, usability, frontend integration and practical
                        application logic. Some projects focus on interface design and responsive implementation, while others
                        include backend interaction, CMS workflows or the foundations of AI-assisted digital products.
                    </p>
                </div>

                <?php if ($databaseError) : ?>
                    <div class="message error">
                        <?= $esc($databaseError); ?>
                    </div>
                <?php endif; ?>

                <div class="portfolio-container" data-aos="fade-up" data-aos-duration="1500">
                    <?php foreach ($portfolioItems as $item) : ?>
                        <?php
                        $meta = $getPortfolioMeta($item);

                        $infoUrl = !empty($item['info_url'])
                            ? $item['info_url']
                            : '#';

                        $imageUrl = !empty($item['image_url'])
                            ? $item['image_url']
                            : 'assets/images/portfolio/placeholder.png';

                        $liveUrl = !empty($item['live_url']) ? $item['live_url'] : '#';
                        $githubUrl = !empty($item['github_url']) ? $item['github_url'] : '#';

                        $hasLiveUrl = !empty($item['live_url']) && $item['live_url'] !== '#';
                        $hasGithubUrl = !empty($item['github_url']) && $item['github_url'] !== '#';
                        ?>

                        <div class="portfolio-items">
                            <div class="portfolio-item-top">
                                <div class="portfolio-card-meta">
                                    <h3><?= $esc($meta['title']); ?></h3>
                                    <p><?= $esc($meta['stack']); ?></p>
                                </div>

                                <a href="<?= $esc($infoUrl); ?>">
                                    <img src="<?= $esc($imageUrl); ?>" alt="<?= $esc($meta['title']); ?>">
                                </a>
                            </div>

                            <div class="portfolio-wrap">
                                <div class="portfolio-links-top">
                                    <a class="portfolio-link-top" href="<?= $esc($infoUrl); ?>"
                                        title="More information">
                                        <i class="fas fa-circle-info"></i> More information
                                    </a>
                                </div>

                                <div class="portfolio-links-bottom">
                                    <?php if ($hasLiveUrl) : ?>
                                        <a class="portfolio-link-left" href="<?= $esc($liveUrl); ?>"
                                            title="Live Demo" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-link"></i> Live Preview
                                        </a>
                                    <?php else : ?>
                                        <a class="portfolio-link-left portfolio-link-disabled" href="#"
                                            title="Live preview coming soon" aria-disabled="true" onclick="return false;">
                                            <i class="fas fa-link"></i> Coming Soon
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($hasGithubUrl) : ?>
                                        <a class="portfolio-link-right" href="<?= $esc($githubUrl); ?>"
                                            title="See on GitHub" target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-github"></i> Full Code on GitHub
                                        </a>
                                    <?php else : ?>
                                        <a class="portfolio-link-right portfolio-link-disabled" href="#"
                                            title="Code not available" aria-disabled="true" onclick="return false;">
                                            <i class="fa fa-github"></i> Code not available
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-----------------------------------------------------------------
                              Portfolio section end
        ------------------------------------------------------------------>

        <!-----------------------------------------------------------------
                              Services section
        ------------------------------------------------------------------>
        <section id="services" class="services-section">
            <div class="services-content container">
                <div class="section-title">
                    <h2>What I Do</h2>
                    <p>
                        I bring together a long design background with frontend development skills to create clear, responsive
                        and visually consistent digital experiences. My work sits between design and implementation: from
                        visual direction and UI layouts to SCSS styling, frontend integration and CMS-based web projects.
                    </p>
                </div>

                <div class="services-container" data-aos="fade-right" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/web-green.png" alt="web icon">
                            <img class="hover-icon" src="./assets/icons/web-white.png" alt="web icon hover">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Digital & Web Design</h4>
                            <p class="description">
                                Designing clean, structured and visually coherent web pages with attention to layout,
                                typography, color and brand consistency.
                            </p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/ui-green.png" alt="UI icon">
                            <img class="hover-icon" src="./assets/icons/ui-white.png" alt="UI icon hover">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">UI Design</h4>
                            <p class="description">
                                Creating user-friendly interface layouts, visual systems and screen designs that are clear,
                                accessible and easy to navigate.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="services-container" data-aos="fade-left" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/graphic-green.png" alt="graphic design icon">
                            <img class="hover-icon" src="./assets/icons/graphic-white.png" alt="graphic design icon hover">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Visual Design</h4>
                            <p class="description">
                                Using my graphic design experience to create strong visual identities, digital assets and
                                polished communication materials.
                            </p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/responsive-green.png" alt="responsive icon">
                            <img class="hover-icon" src="./assets/icons/responsive-white.png" alt="responsive icon hover">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Frontend Integration</h4>
                            <p class="description">
                                Building and refining responsive interfaces with HTML, CSS, SCSS, JavaScript, PHP and CMS
                                workflows, with a strong eye for design details.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Services items end -->
            </div>
            <!-- Services content end -->
        </section>
        <!-----------------------------------------------------------------
                              Services section end
        ------------------------------------------------------------------>

        <!-----------------------------------------------------------------
                              Contact section
        ------------------------------------------------------------------>
        <section id="contact" class="contact-section">
            <div class="contact-content container">
                <div class="section-title">
                    <h2>Contact</h2>

                    <p>
                        If you are interested in my profile, a design role, a frontend
                        integration opportunity, or a creative digital project, feel free
                        to contact me. I am open to opportunities in Belgium, as well as
                        remote roles with UK and European teams.
                    </p>
                </div>

                <div
                    class="contact-container"
                    data-aos="fade-in"
                    data-aos-duration="1500">
                    <form action="forms/contact.php" method="post">
                        <input
                            type="hidden"
                            name="redirect"
                            value="index.php">

                        <label for="firstName">First name</label>
                        <input
                            type="text"
                            id="firstName"
                            name="firstName"
                            placeholder="Your first name..."
                            autocomplete="given-name"
                            maxlength="100"
                            required>

                        <label for="lastName">Last name</label>
                        <input
                            type="text"
                            id="lastName"
                            name="lastName"
                            placeholder="Your last name..."
                            autocomplete="family-name"
                            maxlength="100"
                            required>

                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Your email..."
                            autocomplete="email"
                            maxlength="255"
                            required>

                        <label for="subject">Subject</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Subject..."
                            maxlength="255"
                            required>

                        <label for="message">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            placeholder="Your message..."
                            maxlength="5000"
                            rows="8"
                            required></textarea>

                        <input type="reset" value="Reset">
                        <input type="submit" value="Send message">
                    </form>
                </div>
            </div>
        </section>
        <!-----------------------------------------------------------------
                              Contact section end
        ------------------------------------------------------------------>
    </main>
    <!-- Main end -->

    <!-----------------------------------------------------------------
                               Footer
    ------------------------------------------------------------------>
    <footer id="footer">
        <div class="footer-container container">
            <div class="copyright">
                &copy; Copyright, design and development by
                <a class="github" href="https://github.com/LejeuneA/portfolio-lejeune" target="_blank"
                    rel="noopener noreferrer">
                    <i class="fa fa-github" aria-hidden="true"></i> Açelya Lejeune
                </a>
            </div>
        </div>
    </footer>
    <!-----------------------------------------------------------------
                               Footer end
    ------------------------------------------------------------------>

    <!-- Back to Top -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/3546d47201.js" crossorigin="anonymous"></script>

    <!-- JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Main JS Files -->
    <script defer="defer" src="./dist/runtime.bundle.js"></script>
    <script defer="defer" src="./dist/shared.bundle.js"></script>
    <script defer="defer" src="./dist/index.bundle.js"></script>
    <script defer="defer" src="./dist/nav.bundle.js"></script>
    <script defer="defer" src="./dist/swiper.bundle.js"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>
