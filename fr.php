<?php

$portfolioItems = [];
$databaseError = null;

$cssPath = __DIR__ . '/dist/index.css';
$cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time();

$esc = function ($value, $fallback = '') {
    return htmlspecialchars((string)($value ?? $fallback), ENT_QUOTES, 'UTF-8');
};

$contactStatus = $_GET['contact'] ?? '';

$contactToastMessages = [
    'success' => [
        'type' => 'success',
        'title' => 'Message envoyé',
        'message' => 'Merci de m’avoir contactée. Votre message a bien été envoyé.',
    ],
    'missing' => [
        'type' => 'error',
        'title' => 'Informations manquantes',
        'message' => 'Veuillez compléter tous les champs avant d’envoyer votre message.',
    ],
    'invalid-email' => [
        'type' => 'error',
        'title' => 'Adresse e-mail invalide',
        'message' => 'Veuillez saisir une adresse e-mail valide puis réessayer.',
    ],
    'too-long' => [
        'type' => 'error',
        'title' => 'Message trop long',
        'message' => 'Un ou plusieurs champs sont trop longs. Veuillez raccourcir votre message puis réessayer.',
    ],
    'error' => [
        'type' => 'error',
        'title' => 'Message non envoyé',
        'message' => 'Une erreur est survenue. Veuillez réessayer ou m’écrire directement à contact@acelyalejeune.com.',
    ],
];

$contactToast = $contactToastMessages[$contactStatus] ?? null;

$getPortfolioMetaFr = function ($item) {
    $source = strtolower(
        ($item['info_url_fr'] ?? '') . ' ' .
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
        'title' => 'Projet portfolio',
        'stack' => 'Web design · Front-end'
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

    $databaseError = 'Les projets du portfolio n’ont pas pu être chargés.';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio d’Açelya Lejeune, designer UX/UI et développeuse front-end à Liège, Belgique, avec des projets en React, TypeScript, Angular, PHP, MySQL, Python, Flask et applications IA.">

    <meta
        name="keywords"
        content="Açelya Lejeune, designer UX/UI, développeuse front-end, design produit, React, TypeScript, Angular, PHP, MySQL, Python, Flask, applications IA, portfolio, Liège, Belgique, travail à distance">

    <!-- SEO & Social Preview -->
    <meta name="author" content="Açelya Lejeune">
    <meta name="theme-color" content="#0f172a">
    <link rel="canonical" href="https://www.acelyalejeune.com/fr.php">
    <link rel="alternate" hreflang="en" href="https://www.acelyalejeune.com/">
    <link rel="alternate" hreflang="fr" href="https://www.acelyalejeune.com/fr.php">
    <link rel="alternate" hreflang="x-default" href="https://www.acelyalejeune.com/">
    <meta property="og:title" content="Açelya Lejeune - Designer UX/UI &amp; Développeuse Front-End">
    <meta property="og:description" content="Portfolio d’Açelya Lejeune, designer UX/UI et développeuse front-end à Liège, Belgique, avec des projets en React, TypeScript, Angular, PHP, MySQL, Python, Flask et applications IA.">
    <meta property="og:url" content="https://www.acelyalejeune.com/fr.php">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Portfolio Açelya Lejeune">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:locale:alternate" content="en_US">
    <meta property="og:image" content="https://www.acelyalejeune.com/assets/images/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Aperçu du portfolio d’Açelya Lejeune avec positionnement UX/UI, front-end et applications IA">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Açelya Lejeune - Designer UX/UI &amp; Développeuse Front-End">
    <meta name="twitter:description" content="Portfolio d’Açelya Lejeune, designer UX/UI et développeuse front-end à Liège, Belgique, avec des projets en React, TypeScript, Angular, PHP, MySQL, Python, Flask et applications IA.">
    <meta name="twitter:image" content="https://www.acelyalejeune.com/assets/images/og-image.png">
    <meta name="twitter:image:alt" content="Aperçu du portfolio d’Açelya Lejeune avec positionnement UX/UI, front-end et applications IA">


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

    <!-- Canonical -->
    <!-- Title -->
    <title>Açelya Lejeune - Designer UX/UI &amp; Développeuse Front-End</title>

    <!-- Analytics -->
    <script
        defer
        src="https://cloud.umami.is/script.js"
        data-website-id="5bf62b4a-7132-4425-a099-12d42e69f1df"
        data-domains="www.acelyalejeune.com,acelyalejeune.com,flowdeck.acelyalejeune.com,quotes.acelyalejeune.com"
        data-tag="portfolio">
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ProfilePage",
            "name": "Portfolio Açelya Lejeune",
            "url": "https://www.acelyalejeune.com/fr.php",
            "description": "Portfolio d’Açelya Lejeune, designer UX/UI et développeuse front-end à Liège, Belgique, avec des projets en React, TypeScript, Angular, PHP, MySQL, Python, Flask et applications IA.",
            "inLanguage": "fr",
            "mainEntity": {
                "@type": "Person",
                "name": "Açelya Lejeune",
                "url": "https://www.acelyalejeune.com/",
                "image": "https://www.acelyalejeune.com/assets/images/og-image.png",
                "email": "mailto:contact@acelyalejeune.com",
                "jobTitle": [
                    "UX/UI Designer",
                    "Frontend Developer",
                    "AI Application Developer"
                ],
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Liège",
                    "addressCountry": "BE"
                },
                "knowsAbout": [
                    "UX/UI Design",
                    "Product Design",
                    "Frontend Development",
                    "React",
                    "TypeScript",
                    "Angular",
                    "PHP",
                    "MySQL",
                    "Python",
                    "Flask",
                    "AI Applications"
                ],
                "sameAs": [
                    "https://www.linkedin.com/in/acelyalejeune",
                    "https://github.com/LejeuneA"
                ]
            }
        }
    </script>
</head>

<body>

    <?php if ($contactToast) : ?>
        <div
            class="contact-toast contact-toast--<?= $esc($contactToast['type']); ?>"
            role="status"
            aria-live="polite"
            data-contact-toast>
            <div class="contact-toast__icon" aria-hidden="true">
                <?= $contactToast['type'] === 'success' ? '✓' : '!'; ?>
            </div>
            <div class="contact-toast__content">
                <p class="contact-toast__title"><?= $esc($contactToast['title']); ?></p>
                <p><?= $esc($contactToast['message']); ?></p>
            </div>
            <button
                class="contact-toast__close"
                type="button"
                aria-label="Close notification"
                data-contact-toast-close>
                &times;
            </button>
        </div>
    <?php endif; ?>
    <!-----------------------------------------------------------------
                               Navigation
    ------------------------------------------------------------------>
    <header id="header">
        <!-- Profile -->
        <div class="profile">
            <img src="./assets/images/header-photo.jpg" alt="Photo de profil d’Açelya Lejeune" class="profile-img">
            <h1 class="text-light"><a href="./fr.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/LejeuneA" class="github" target="_blank" aria-label="Profil GitHub" rel="noopener noreferrer">
                    <i class="fa fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"
                    aria-label="Profil LinkedIn" rel="noopener noreferrer">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a
                    href="./index.php"
                    class="language"
                    data-umami-event="language-switch"
                    data-umami-event-from="fr"
                    data-umami-event-to="en">
                    <b>EN</b>
                </a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li>
                    <a href="fr.php#hero" class="nav-link scrollto active">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#about" class="nav-link scrollto">
                        <i class="fas fa-user"></i>
                        <span>À propos</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#skills" class="nav-link scrollto">
                        <i class="fas fa-code"></i>
                        <span>Compétences</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#portfolio" class="nav-link scrollto">
                        <i class="fas fa-list"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#services" class="nav-link scrollto">
                        <i class="fas fa-tools"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="freelance-fr.html" class="nav-link scrollto">
                        <i class="fas fa-handshake"></i>
                        <span>Services design</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#contact" class="nav-link scrollto">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <div class="btn-resume">
                <a
                    class="btn-resume"
                    href="./assets/resume/Acelya_Lejeune_CV_FR_UXUI_Frontend.pdf"
                    download
                    data-umami-event="cv-download"
                    data-umami-event-file="Acelya_Lejeune_CV_FR_UXUI_Frontend.pdf"
                    data-umami-event-language="fr"
                    data-umami-event-location="main-nav">
                    Télécharger le CV
                </a>
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
            <img src="./assets/images/header-photo.jpg" alt="Photo de profil d’Açelya Lejeune" class="profile-img">
            <h1 class="text-light"><a href="./fr.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/LejeuneA" class="github" target="_blank" aria-label="Profil GitHub" rel="noopener noreferrer">
                    <i class="fa fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"
                    aria-label="Profil LinkedIn" rel="noopener noreferrer">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a
                    href="./index.php"
                    class="language"
                    data-umami-event="language-switch"
                    data-umami-event-from="fr"
                    data-umami-event-to="en">
                    <b>EN</b>
                </a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="sidenav-navbar" class="nav-menu navbar">
            <ul>
                <li>
                    <a href="fr.php#hero" class="nav-link scrollto active">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#about" class="nav-link scrollto">
                        <i class="fas fa-user"></i>
                        <span>À propos</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#skills" class="nav-link scrollto">
                        <i class="fas fa-code"></i>
                        <span>Compétences</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#portfolio" class="nav-link scrollto">
                        <i class="fas fa-list"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#services" class="nav-link scrollto">
                        <i class="fas fa-tools"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="freelance-fr.html" class="nav-link scrollto">
                        <i class="fas fa-handshake"></i>
                        <span>Services design</span>
                    </a>
                </li>
                <li>
                    <a href="fr.php#contact" class="nav-link scrollto">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <div class="btn-resume">
                <a
                    class="btn-resume"
                    href="./assets/resume/Acelya_Lejeune_CV_FR_UXUI_Frontend.pdf"
                    download
                    data-umami-event="cv-download"
                    data-umami-event-file="Acelya_Lejeune_CV_FR_UXUI_Frontend.pdf"
                    data-umami-event-language="fr"
                    data-umami-event-location="mobile-nav">
                    Télécharger le CV
                </a>
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
                    data-typed-items="Designer UX/UI, Développeuse Front-End, Développeuse d’applications IA"></span>
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
                <h2>À propos</h2>
                <div class="about-content">
                    <div class="about-container-left" data-aos="fade-right" data-aos-duration="1500">
                        <p>
                            <span class="first-sentence">Bonjour, je suis Açelya Lejeune.</span>
                            Je suis designer UX/UI avec environ 15 ans d’expérience en communication visuelle,
                            branding, design graphique et design digital. Au fil des années, j’ai travaillé sur une
                            grande variété de projets créatifs et digitaux, développant un sens solide de la mise en
                            page, de la typographie, de la couleur, de la hiérarchie visuelle et de la communication
                            digitale claire.
                        </p>
                        <p>
                            <span class="first-sentence">Un parcours design construit dans plusieurs pays</span>
                            J’ai commencé ma carrière à Antalya, puis j’ai continué à travailler avec des agences,
                            des studios d’impression et des projets créatifs à Chypre du Nord, en Angleterre et en
                            Belgique. Ce parcours international a façonné ma manière d’aborder le design, avec une
                            attention particulière à la clarté, à l’adaptabilité, au détail visuel et aux besoins de
                            différents publics.
                        </p>
                    </div>

                    <div class="about-container-right">
                        <div class="content" data-aos="fade-left" data-aos-duration="1600">
                            <p>
                                <span class="first-sentence">Du design vers le front-end et les applications IA</span>
                                Après plusieurs années dans le design, j’ai voulu approfondir mes compétences techniques
                                et j’ai terminé une formation de deux ans en développement front-end à Liège, en Belgique.
                                Pendant cette formation et à travers mes projets portfolio, j’ai travaillé avec
                                <span>Angular</span>, <span>React</span>, <span>TypeScript</span>,
                                <span>JavaScript</span>, <span>PHP</span>, <span>MySQL</span>,
                                <span>Python</span> et <span>Flask</span>.
                            </p>

                            <p>
                                Aujourd’hui, je combine mon parcours en design visuel avec des compétences en développement
                                front-end pour créer des interfaces digitales claires, responsives et réalistes à intégrer.
                                Mon travail se concentre sur le <span>design UX/UI</span>, <span>SCSS</span>,
                                les mises en page responsives, l’intégration UI, les projets basés sur un CMS,
                                les workflows Git/GitHub et les bases du développement d’applications assistées par l’IA.
                            </p>
                        </div>
                    </div>

                    <div class="about-info-card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="about-info-grid">
                            <ul class="about-info-column">
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Localisation : <span>Liège, Belgique</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Site web : <span>www.acelyalejeune.com</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Email : <span>contact@acelyalejeune.com</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Profil : <span>Design UX/UI, interfaces produit, intégration front-end, applications IA</span>
                                </li>
                            </ul>

                            <ul class="about-info-column">
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Langues :
                                    <span>
                                        <br>TURC : langue maternelle
                                        <br>ANGLAIS : niveau professionnel
                                        <br>FRANÇAIS : certificat B1.1, bonne compréhension et expression orale simple
                                    </span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    Ouverte à : <span>Opportunités à distance avec des équipes au Royaume-Uni et en Europe</span>
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
                <h2>Compétences</h2>
                <div class="skills-content">

                    <div class="skills-list-container">
                        <h3>Front-end & intégration UI</h3>

                        <ul class="skills-list">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>SCSS / Sass</li>
                            <li>JavaScript</li>
                            <li>TypeScript</li>
                            <li>React</li>
                            <li>Angular</li>
                            <li>Interfaces responsives</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Backend léger, APIs & CMS</h3>

                        <ul class="skills-list">
                            <li>PHP</li>
                            <li>Python</li>
                            <li>Flask</li>
                            <li>Intégration d’API REST</li>
                            <li>MySQL</li>
                            <li>Silverstripe</li>
                            <li>Workflows CMS</li>
                            <li>Node.js / npm</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Design produit & outils visuels</h3>

                        <ul class="skills-list">
                            <li>UX/UI Design</li>
                            <li>Design produit</li>
                            <li>Design d’interface</li>
                            <li>Figma</li>
                            <li>Adobe Photoshop</li>
                            <li>Adobe Illustrator</li>
                            <li>Adobe InDesign</li>
                            <li>Design visuel</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Workflow, IA & collaboration</h3>

                        <ul class="skills-list">
                            <li>Git</li>
                            <li>GitHub</li>
                            <li>Bitbucket</li>
                            <li>Jira</li>
                            <li>Webpack / Vite</li>
                            <li>Prompt Engineering</li>
                            <li>Bases du développement d’applications IA</li>
                            <li>Séparation frontend / backend</li>
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
                        Ce portfolio présente une sélection de projets qui réunissent mon expérience en UX/UI, design visuel
                        et développement front-end. Ces projets montrent comment je transforme des décisions de design en
                        interfaces digitales responsives avec des technologies comme HTML5, CSS3, SCSS, JavaScript,
                        TypeScript, Angular, React, PHP, MySQL, Python et Flask.
                    </p>
                    <p>
                        Mon travail combine clarté visuelle, structure des interfaces, ergonomie, intégration front-end et
                        logique applicative concrète. Certains projets sont centrés sur le design d’interface et l’intégration
                        responsive, tandis que d’autres incluent des interactions backend, des workflows CMS ou les premières
                        bases de produits digitaux assistés par l’IA.
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
                        $meta = $getPortfolioMetaFr($item);

                        $infoUrlFr = !empty($item['info_url_fr'])
                            ? $item['info_url_fr']
                            : (!empty($item['info_url']) ? $item['info_url'] : '#');

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

                                <a href="<?= $esc($infoUrlFr); ?>">
                                    <img src="<?= $esc($imageUrl); ?>" alt="<?= $esc($meta['title']); ?>">
                                </a>
                            </div>

                            <div class="portfolio-wrap">
                                <div class="portfolio-links-top">
                                    <a
                                        class="portfolio-link-top"
                                        href="<?= $esc($infoUrlFr); ?>"
                                        title="Plus d’informations"
                                        data-umami-event="portfolio-case-study-click"
                                        data-umami-event-project="<?= $esc($meta['title']); ?>"
                                        data-umami-event-language="fr">
                                        <i class="fas fa-circle-info"></i> Plus d’informations
                                    </a>
                                </div>

                                <div class="portfolio-links-bottom">
                                    <?php if ($hasLiveUrl) : ?>
                                        <a
                                            class="portfolio-link-left"
                                            href="<?= $esc($liveUrl); ?>"
                                            title="Démo en ligne"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            data-umami-event="portfolio-live-preview-click"
                                            data-umami-event-project="<?= $esc($meta['title']); ?>"
                                            data-umami-event-language="fr">
                                            <i class="fas fa-link"></i> Aperçu en direct
                                        </a>
                                    <?php else : ?>
                                        <a class="portfolio-link-left portfolio-link-disabled" href="#"
                                            title="Aperçu bientôt disponible" aria-disabled="true" onclick="return false;">
                                            <i class="fas fa-link"></i> Bientôt disponible
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($hasGithubUrl) : ?>
                                        <a
                                            class="portfolio-link-right"
                                            href="<?= $esc($githubUrl); ?>"
                                            title="Voir sur GitHub"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            data-umami-event="portfolio-github-click"
                                            data-umami-event-project="<?= $esc($meta['title']); ?>"
                                            data-umami-event-language="fr">
                                            <i class="fa fa-github"></i> Code complet sur GitHub
                                        </a>
                                    <?php else : ?>
                                        <a class="portfolio-link-right portfolio-link-disabled" href="#"
                                            title="Code non disponible" aria-disabled="true" onclick="return false;">
                                            <i class="fa fa-github"></i> Code non disponible
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
                    <h2>Ce que je peux apporter</h2>
                    <p>
                        Je combine une longue expérience en design avec des compétences en développement front-end pour créer
                        des expériences digitales claires, responsives et visuellement cohérentes. Mon travail se situe entre
                        le design et l’intégration : direction visuelle, interfaces UI, styles SCSS, intégration front-end et
                        projets web basés sur un CMS.
                    </p>
                </div>
                <div class="services-container" data-aos="fade-right" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/web-green.png" alt="icône web">
                            <img class="hover-icon" src="./assets/icons/web-white.png" alt="icône web survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design digital & web</h4>
                            <p class="description">
                                Concevoir des pages web claires, structurées et visuellement cohérentes, avec une attention
                                particulière à la mise en page, à la typographie, aux couleurs et à l’identité visuelle.
                            </p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/ui-green.png" alt="icône UI">
                            <img class="hover-icon" src="./assets/icons/ui-white.png" alt="icône UI survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design UI</h4>
                            <p class="description">
                                Créer des interfaces simples à comprendre, agréables à utiliser et faciles à naviguer, avec une
                                structure visuelle claire et accessible.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="services-container" data-aos="fade-left" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/graphic-green.png" alt="icône design graphique">
                            <img class="hover-icon" src="./assets/icons/graphic-white.png" alt="icône design graphique survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design visuel</h4>
                            <p class="description">
                                Utiliser mon expérience en design graphique pour créer des identités visuelles, des supports
                                digitaux et des éléments de communication soignés.
                            </p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/responsive-green.png" alt="icône responsive">
                            <img class="hover-icon" src="./assets/icons/responsive-white.png" alt="icône responsive survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Intégration front-end</h4>
                            <p class="description">
                                Construire et améliorer des interfaces responsives avec HTML, CSS, SCSS, JavaScript, PHP et des
                                workflows CMS, tout en gardant une forte attention aux détails visuels.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Services items end -->

                <div class="services-link-panel" data-aos="fade-up" data-aos-duration="1200">
                    <div class="services-link-panel__content">
                        <h3>Services design pour des interfaces ciblées</h3>
                        <p>
                            Pour de petits écrans produit, des améliorations UI responsives et du support Figma vers code,
                            une page dédiée présente plus clairement ma façon d’aider.
                        </p>
                    </div>
                    <a href="freelance-fr.html" class="services-link-button">
                        <span>Découvrir les services design</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
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
                        Si mon profil vous intéresse pour un poste en design, une
                        opportunité en intégration front-end ou un projet digital créatif,
                        n’hésitez pas à me contacter. Je suis ouverte aux opportunités en
                        Belgique, ainsi qu’aux postes à distance avec des équipes au
                        Royaume-Uni et en Europe.
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
                            value="fr.php">

                        <label for="firstName">Prénom</label>
                        <input
                            type="text"
                            id="firstName"
                            name="firstName"
                            placeholder="Votre prénom..."
                            autocomplete="given-name"
                            maxlength="100"
                            required>

                        <label for="lastName">Nom</label>
                        <input
                            type="text"
                            id="lastName"
                            name="lastName"
                            placeholder="Votre nom..."
                            autocomplete="family-name"
                            maxlength="100"
                            required>

                        <label for="email">E-mail</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Votre adresse e-mail..."
                            autocomplete="email"
                            maxlength="255"
                            required>

                        <label for="subject">Sujet</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Sujet..."
                            maxlength="255"
                            required>

                        <label for="message">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            placeholder="Votre message..."
                            maxlength="5000"
                            rows="8"
                            required></textarea>

                        <input type="reset" value="Effacer">
                        <input
                            type="submit"
                            value="Envoyer le message"
                            data-umami-event="contact-form-submit-click"
                            data-umami-event-language="fr">
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
                &copy; Copyright, conception et développement par
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


        const contactToast = document.querySelector('[data-contact-toast]');

        if (contactToast) {
            const closeButton = contactToast.querySelector('[data-contact-toast-close]');

            const closeContactToast = () => {
                contactToast.classList.add('contact-toast--hide');

                window.setTimeout(() => {
                    contactToast.remove();
                }, 250);
            };

            if (closeButton) {
                closeButton.addEventListener('click', closeContactToast);
            }

            window.setTimeout(closeContactToast, 7000);

            if (window.history && window.history.replaceState) {
                const currentUrl = new URL(window.location.href);

                if (currentUrl.searchParams.has('contact')) {
                    currentUrl.searchParams.delete('contact');

                    const cleanUrl = currentUrl.pathname +
                        (currentUrl.search ? currentUrl.search : '') +
                        currentUrl.hash;

                    window.history.replaceState({}, document.title, cleanUrl);
                }
            }
        }
    </script>

</body>

</html>
