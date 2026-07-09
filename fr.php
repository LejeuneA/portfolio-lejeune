<?php

require_once 'conf/conf-db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch portfolio items
$sql = "SELECT id, image_url, info_url_fr, live_url, github_url FROM portfolio";
$result = $conn->query($sql);

$portfolioItems = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $portfolioItems[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acelya Lejeune - Web Developer and Graphic Designer">
    <meta
        content="web, developer, designer, portfolio, web developer, web designer, graphic designer, acelya lejeune, lejeune, frontend, web developer liege, web designer liege, devéloppeur web liege, designer graphique liege, infographiste"
        name="keywords">


    <!-- AOS File -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Main Css file -->
    <link rel="stylesheet" href="./dist/index.css?v=<?php echo filemtime(__DIR__ . '/dist/index.css'); ?>">


    <!-- Favicon -->
    <link href="./assets/icons/favicon.png" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Title -->
    <title>Acelya Lejeune - Développeur Web et Infographiste</title>
</head>

<body>
    <!-----------------------------------------------------------------
                               Navigation
    ------------------------------------------------------------------>
    <header id="header">
        <!-- Profile -->
        <div class="profile">
            <img src="./assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="./fr.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
                <a href="./index.php" class="language"><b>EN</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="fr.php#hero" class="nav-link scrollto active"><i
                            class="fas fa-home"></i><span>Acceuil</span></a>
                </li>
                <li><a href="fr.php#about" class="nav-link scrollto"><i class="fas fa-user"></i>
                        <span>À propos</span></a></li>
                <li><a href="fr.php#skills" class="nav-link scrollto"><i class="fas fa-code"></i>
                        <span>Compétences</span></a>
                </li>
                <li><a href="fr.php#portfolio" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="fr.php#services" class="nav-link scrollto"><i class="fas fa-tools"></i>
                        <span>Services</span></a>
                </li>
                <li><a href="fr.php#contact" class="nav-link scrollto"><i class="fas fa-envelope"></i>
                        <span>Contact</span></a>
                </li>
            </ul>
            <div class="btn-resume">
                <a class="btn-resume" href="./assets/resume/CV_LEJEUNE_FR.pdf" download>Télécharger le CV</a>
            </div>
            <div class="btn-resume">
                <a class="btn-resume" href="./admin/login.php">Se connecter</a>
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
            <img src="./assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="./fr.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
                <a href="./index.php" language"><b>EN</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="fr.php#hero" class="nav-link scrollto active"><i class="fas fa-home"></i>
                        <span>Acceuil</span></a>
                </li>
                <li><a href="fr.php#about" class="nav-link scrollto"><i class="fas fa-user"></i>
                        <span>À propos</span></a></li>
                <li><a href="fr.php#skills" class="nav-link scrollto"><i class="fas fa-code"></i>
                        <span>Compétences</span></a>
                </li>
                <li><a href="fr.php#portfolio" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="fr.php#services" class="nav-link scrollto"><i class="fas fa-tools"></i>
                        <span>Services</span></a>
                </li>
                <li><a href="fr.php#contact" class="nav-link scrollto"><i class="fas fa-envelope"></i>
                        <span>Contact</span></a>
                </li>
            </ul>
            <div class="btn-resume">
                <a class="btn-resume" href="./assets/resume/CV_LEJEUNE_FR.pdf" download>Télécharger le CV</a>
            </div>
            <div class="btn-resume">
                <a class="btn-resume" href="./admin/login.php">Se connecter</a>
            </div>
        </nav>
        <!-- Nav menu end -->
        <!-- Hamburger Icon -->
        <div class="navbar-hamburger">
            <div id="hamburger" onclick="openNav()"><i class="fa-solid fa-bars"></i></div>
        </div>
    </div>
    <!-- Hamburger icon end -->
    <!-----------------------------------------------------------------
						  Navigation end
    ------------------------------------------------------------------>
    <!-----------------------------------------------------------------
                      	Hero section end
   ------------------------------------------------------------------>
    <section id="hero" class="hero">
        <div class="hero-container" data-aos="fade-in" data-aos-duration="3000">
            <h1>Açelya Lejeune</h1>
            <p><span class="typed" data-typed-items="Designer Digitale Senior, Développeuse Front-End"></span></p>
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
                            Je suis designer senior avec une longue expérience professionnelle en design graphique,
                            communication visuelle et web design. Au fil des années, j’ai travaillé sur de nombreux projets
                            créatifs et digitaux, en développant un sens solide de la mise en page, de la typographie, de la
                            couleur, de l’identité visuelle et de la hiérarchie visuelle.
                        </p>
                        <p>
                            <span class="first-sentence">Un parcours design construit dans plusieurs pays</span>
                            J’ai commencé ma carrière à Antalya, puis j’ai continué à travailler avec des agences, des
                            imprimeries et des projets créatifs dans le nord de Chypre, en Angleterre et en Belgique. Mon
                            expérience à Brighton a également renforcé mon lien avec les environnements anglophones et les
                            équipes internationales.
                        </p>
                    </div>

                    <div class="about-container-right">
                        <div class="content" data-aos="fade-left" data-aos-duration="1600">
                            <p>
                                <span class="first-sentence">Du design vers le développement front-end</span>
                                Après plusieurs années dans le design, j’ai voulu approfondir mes compétences techniques et j’ai
                                terminé une formation de deux ans en développement front-end à Liège, en Belgique. Pendant cette
                                formation, j’ai réalisé un projet de fin d’études avec <span>Angular</span> et travaillé avec
                                <span>HTML5</span>, <span>CSS3</span>, <span>SCSS</span>, <span>JavaScript</span>,
                                <span>TypeScript</span>, <span>PHP</span> et <span>MySQL</span>.
                            </p>

                            <p>
                                Aujourd’hui, je combine mon expérience en design avec des compétences en développement
                                front-end. Mes points forts sont <span>SCSS</span>, les interfaces responsives, l’intégration
                                UI, le design visuel, les workflows Git/GitHub et les projets web basés sur un CMS. J’ai
                                également appris <span>Silverstripe</span> dans mon poste actuel.
                            </p>

                            <ul>
                                <li><i class="fas fa-chevron-right"></i> Localisation : <span>Liège, Belgique</span></li>
                                <li><i class="fas fa-chevron-right"></i> Site web : <span>www.acelyalejeune.be</span></li>
                                <li><i class="fas fa-chevron-right"></i> Email : <span>contact@acelyalejeune.be</span></li>
                                <li><i class="fas fa-chevron-right"></i> Profil : <span>Design digital, web design, design UI,
                                        intégration front-end</span></li>
                                <li><i class="fas fa-chevron-right"></i> Ouverte à : <span>Opportunités à distance avec des
                                        équipes au Royaume-Uni et en Europe</span></li>
                                <li><i class="fas fa-chevron-right"></i> Langues : <span><br>TURC : langue maternelle
                                        <br>ANGLAIS : niveau professionnel<br>FRANÇAIS : certificat B1.1 — bonne compréhension,
                                        expression orale simple</span>
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
                        <h3>Front-end & Développement</h3>

                        <ul class="skills-list">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>SCSS / Sass</li>
                            <li>JavaScript</li>
                            <li>TypeScript</li>
                            <li>Angular</li>
                            <li>PHP</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>CMS, base de données & outils de build</h3>

                        <ul class="skills-list">
                            <li>MySQL</li>
                            <li>Silverstripe</li>
                            <li>CMS</li>
                            <li>Node.js</li>
                            <li>npm</li>
                            <li>Webpack</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Design & outils UX/UI</h3>

                        <ul class="skills-list">
                            <li>Figma</li>
                            <li>Adobe XD</li>
                            <li>Adobe Illustrator</li>
                            <li>Adobe Photoshop</li>
                            <li>Adobe InDesign</li>
                            <li>Design responsive</li>
                            <li>Design UI</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Versioning & workflow</h3>

                        <ul class="skills-list">
                            <li>Git</li>
                            <li>GitHub</li>
                            <li>GitHub Desktop</li>
                            <li>SourceTree</li>
                            <li>gitg</li>
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
                        Ce portfolio rassemble une sélection de projets issus de mon parcours en design et en développement
                        front-end. Il reflète mon expérience en design graphique et digital, mon attention aux interfaces
                        claires et responsives, ainsi que mon évolution avec des technologies front-end comme HTML5, CSS3,
                        SCSS, JavaScript, Angular, PHP et MySQL.
                    </p>
                    <p>
                        À travers ces projets, je souhaite montrer comment je combine design visuel, ergonomie, mise en page,
                        développement responsive et fonctionnalités backend de base pour créer des expériences digitales
                        concrètes. Certains projets sont davantage orientés design, tandis que d’autres incluent une partie
                        plus technique et de l’intégration front-end.
                    </p>
                </div>

                <?php
                function getPortfolioMetaFr($item)
                {
                    $source = strtolower(
                        ($item['info_url_fr'] ?? '') . ' ' .
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
                            'stack' => 'Angular · TypeScript · JSON Server'
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
                }
                ?>

                <div class="portfolio-container" data-aos="fade-up" data-aos-duration="1500">
                    <?php foreach ($portfolioItems as $item) : ?>
                        <?php $meta = getPortfolioMetaFr($item); ?>
                        <div class="portfolio-items">
                            <div class="portfolio-item-top">
                                <div class="portfolio-card-meta">
                                    <h3><?php echo htmlspecialchars($meta['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($meta['stack']); ?></p>
                                </div>

                                <a href="<?php echo htmlspecialchars($item['info_url_fr']); ?>">
                                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($meta['title']); ?>">
                                </a>
                            </div>

                            <div class="portfolio-wrap">
                                <div class="portfolio-links-top">
                                    <a class="portfolio-link-top" href="<?php echo htmlspecialchars($item['info_url_fr']); ?>"
                                        title="Plus d’informations"><i class="fas fa-circle-info"></i> Plus
                                        d’informations</a>
                                </div>
                                <div class="portfolio-links-bottom">
                                    <a class="portfolio-link-left" href="<?php echo htmlspecialchars($item['live_url']); ?>"
                                        title="Démo en ligne" target="_blank"><i class="fas fa-link"></i> Aperçu
                                        en direct</a>
                                    <a class="portfolio-link-right" href="<?php echo htmlspecialchars($item['github_url']); ?>"
                                        title="Voir sur GitHub" target="_blank"><i class="fa fa-github"></i>
                                        Code complet sur GitHub</a>
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
                            <img class="icon" src="./assets/icons/web-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/web-white.png" alt="icône survol">
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
                            <img class="icon" src="./assets/icons/ui-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/ui-white.png" alt="icône survol">
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
                            <img class="icon" src="./assets/icons/graphic-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/graphic-white.png" alt="icône survol">
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
                            <img class="icon" src="./assets/icons/responsive-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/responsive-white.png" alt="icône survol">
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
                        Si mon profil vous intéresse pour un poste en design, une opportunité en intégration front-end ou un
                        projet digital créatif, n’hésitez pas à me contacter. Je suis ouverte aux opportunités en Belgique,
                        ainsi qu’aux rôles à distance avec des équipes au Royaume-Uni et en Europe.
                    </p>
                </div>
                <div class="contact-container" data-aos="fade-in" data-aos-duration="1500">
                    <form action="./forms/contact.php" method="post">

                        <label for="firstName">Prénom</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Votre prénom...">

                        <label for="lastName">Nom</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Votre nom...">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Votre email...">

                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" placeholder="Sujet...">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Votre message..." style="height:200px"></textarea>

                        <input type="reset" value="Effacer">
                        <input type="submit" value="Envoyer le message">
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
                &copy; Copyright, conception et développement par <a class="github"
                    href="https://github.com/LejeuneA/portfolio-lejeune" target="_blank"><i class="fa fa-github"
                        aria-hidden="true"></i> Açelya
                    Lejeune</a>
            </div>
        </div>
    </footer>
    <!-----------------------------------------------------------------
                               Footer end
    	------------------------------------------------------------------>

    <!-- Back to Top -->
    <a href="#" class="back-to-top" id="backToTop"><i class="fa fa-arrow-up"></i></a>


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
