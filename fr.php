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
    <meta content="web, developer, designer, portfolio, web developer, web designer, graphic designer, acelya lejeune, lejeune, frontend, web developer liege, web designer liege, devéloppeur web liege, designer graphique liege, infographiste" name="keywords">

    <!-- Main Css file -->
    <link rel="stylesheet" href="./css/styles.css">

    <!-- Vendor CSS Files -->
    <link href="./vendor/aos/aos.css" rel="stylesheet">
    <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="./vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="./assets/icons/favicon.png" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="./index.php" class="language"><b>EN</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="fr.php#hero" class="nav-link scrollto active"><i class="fas fa-home"></i><span>Acceuil</span></a>
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
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
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
    <section id="hero" class="hero">
        <div class="hero-container" data-aos="fade-in">
            <h1>Açelya Lejeune</h1>
            <p>Je suis <span class="typed" data-typed-items="Développeur Web, Infographiste"></span></p>
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
                    <div class="about-container-left" data-aos="fade-right">
                        <p><span class="first-sentence">Bienvenue sur mon site web ! Je suis Açelya Lejeune</span>
                            Je m'appelle Açelya, professionnelle du design graphique avec plus de 20 ans d'expérience.
                            J'ai commencé ma carrière à Antalya et depuis, j'ai élargi mes horizons en travaillant dans
                            diverses agences digitales et imprimeries dans le nord de Chypre, en Angleterre, puis en
                            m'installant en Belgique.
                        </p>
                        <p>
                            <span class="first-sentence">Expert en design graphique</span>
                            Ma carrière professionnelle m'a permis de suivre l'évolution de l'art numérique et
                            d'embrasser les innovations dans le monde du design. J'ai travaillé sur divers projets dans
                            mon domaine d'expertise en utilisant des outils tels que <span>Adobe Photoshop</span>,
                            <span>Adobe Illustrator</span>, <span>Adobe InDesign</span>, <span>Adobe XD</span> et
                            <span>Figma</span>. Je suis là pour partager mon expérience avec vous.
                        </p>
                    </div>

                    <div class="about-container-right">
                        <div class="content" data-aos="fade-left">
                            <p>
                                <span class="first-sentence">Passion pour le développement web</span>
                                En 2019, j'ai déménagé en Angleterre, j'ai lancé ma propre entreprise, et en 2020, je me
                                suis mariée et j'ai déménagé en Belgique. Actuellement, je développe mes compétences en
                                design web en utilisant <span>HTML5</span>, <span>CSS</span>, <span>Sass</span>,
                                <span>Javascript</span>, <span>Php</span> et <span>MySQL</span>. Le design web est ma
                                passion, et je le développe davantage avec chaque nouveau projet.
                            </p>
                            <ul>
                                <li><i class="fas fa-chevron-right"></i> Date de naissance : <span>13 Mai 1980</span>
                                </li>
                                <li><i class="fas fa-chevron-right"></i> Site Web : <span>www.acelyalejeune.be</span>
                                </li>
                                <li><i class="fas fa-chevron-right"></i> Téléphone : <span>+32 493 38 77 29</span></li>
                                <li><i class="fas fa-chevron-right"></i> Ville : <span>Liège, Belgique</span></li>
                                <li><i class="fas fa-chevron-right"></i> Âge : <span>44</span></li>
                                <li><i class="fas fa-chevron-right"></i> Email : <span>contact@acelyalejeune.be</span>
                                </li>
                                <li><i class="fas fa-chevron-right"></i> Freelance : <span>Disponible</span></li>
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

                    <!-- Skills container left -->
                    <div class="skills-container-left" data-aos="fade-up">

                        <h3>Développeur Front-end</h3>

                        <!-- Html -->
                        <div class="progress">
                            <span class="skill">HTML <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Css -->
                        <div class="progress">
                            <span class="skill">CSS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Sass -->
                        <div class="progress">
                            <span class="skill">SASS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Javascript -->
                        <div class="progress">
                            <span class="skill">JavaScript & jQuery <i class="val">65%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Php -->
                        <div class="progress">
                            <span class="skill">PHP <i class="val">80%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Mysql -->
                        <div class="progress">
                            <span class="skill">MYSQL <i class="val">70%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Cms -->
                        <div class="progress">
                            <span class="skill">WordPress/CMS <i class="val">85%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills container right -->
                    <div class="skills-container-right" data-aos="fade-up" data-aos-delay="100">

                        <h3>UI & Conception Graphique</h3>

                        <!-- Figma -->
                        <div class="progress">
                            <span class="skill">Figma<i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Xd -->
                        <div class="progress">
                            <span class="skill">Adobe XD<i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Photoshop -->
                        <div class="progress">
                            <span class="skill">Adobe Photoshop <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Indesign -->
                        <div class="progress">
                            <span class="skill">Adobe InDesign <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!--Illustrator -->
                        <div class="progress">
                            <span class="skill">Adobe Illustrator <i class="val">80%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-----------------------------------------------------------------
                                Skills section end
        ------------------------------------------------------------------>
        <!-----------------------------------------------------------------
                                Portfolio section
        ------------------------------------------------------------------>
        <section id="portfolio" class="portfolio-section">
            <div class="portfolio-content container">
                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>Au travers de deux décennies d'expertise en design graphique, j'utilise mes compétences pour créer
                        des œuvres percutantes. Forte d'une solide expérience en design, j'insuffle créativité et
                        expérience dans chaque projet, offrant des résultats convaincants qui résonnent avec le public.
                        Spécialisée dans le design web responsive, j'utilise mon ensemble de compétences étendu pour
                        créer des expériences numériques visuellement attrayantes et conviviales qui s'adaptent
                        parfaitement à tous les appareils. Explorez mon portfolio pour découvrir la fusion de l'art et
                        de la technologie, affinée au fil des années d'expérimentation et d'innovation.
                    </p>
                </div>
                <div class="portfolio-container" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($portfolioItems as $item) : ?>
                        <div class="portfolio-items">
                            <div class="portfolio-item-top">
                                <a href="<?php echo htmlspecialchars($item['info_url_fr']); ?>"><img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Portfolio Item"></a>
                            </div>
                            <div class="portfolio-wrap">
                                <div class="portfolio-links-top">
                                    <a class="portfolio-link-top" href="<?php echo htmlspecialchars($item['info_url_fr']); ?>" title="More
                        information"><i class="fas fa-circle-info"></i> More
                                        information</a>
                                </div>
                                <div class="portfolio-links-bottom">
                                    <a class="portfolio-link-left" href="<?php echo htmlspecialchars($item['live_url']); ?>" title="Live Demo" target="_blank"><i class="fas fa-link"></i> Live
                                        Preview</a>
                                    <a class="portfolio-link-right" href="<?php echo htmlspecialchars($item['github_url']); ?>" title="See on Github" target="_blank"><i class="fa fa-github"></i>
                                        Full Code on GitHub</a>
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
                    <h2>Services</h2>
                    <p>Mes services se concentrent sur l'amélioration de votre présence numérique et l'engagement de
                        votre public. Du design web sur mesure aux graphismes captivants, je propose des solutions
                        adaptées pour rehausser votre marque. Que ce soit pour un design d'interface utilisateur fluide
                        ou pour garantir une compatibilité multi-appareils, je suis là pour concrétiser votre vision et
                        avoir un impact en ligne.
                    </p>
                </div>

                <div class="services-container" data-aos="fade-right" data-aos-delay="100">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/web-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/web-white.png" alt="icône survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design web</h4>
                            <p class="description">Création de sites web visuellement attrayants et intuitifs adaptés à
                                votre marque et à votre public.</p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/ui-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/ui-white.png" alt="icône survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design d'UI</h4>
                            <p class="description">Création d'interfaces utilisateur fluides et engageantes pour des
                                expériences numériques optimales.</p>
                        </div>
                    </div>
                </div>

                <div class="services-container" data-aos="fade-left" data-aos-delay="100">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/graphic-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/graphic-white.png" alt="icône survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design graphique</h4>
                            <p class="description">Conception de visuels et d'éléments attractifs pour renforcer
                                l'identité et la communication de la marque.</p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/responsive-green.png" alt="icône">
                            <img class="hover-icon" src="./assets/icons/responsive-white.png" alt="icône survol">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Design responsive</h4>
                            <p class="description">Garantir que votre site web ait un aspect superbe et fonctionne
                                parfaitement sur tous les appareils et tailles d'écran.</p>
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
                    <p>Si vous êtes intéressé par une collaboration en design graphique, développement web ou autres
                        projets créatifs, veuillez me contacter via ma page. J'ai hâte de mieux vous connaître et de
                        travailler avec vous sur vos projets.
                    </p>
                </div>

                <div class="contact-container" data-aos="fade-in">
                    <form action="../forms/contact.php" method="post">

                        <label for="firstName">Nom</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Votre nom...">

                        <label for="lastName">Prénom</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Votre prénom...">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Votre email...">

                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" placeholder="Sujet...">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Votre message..." style="height:200px"></textarea>

                        <!-- Button -->
                        <input type="reset" value="Effacer">
                        <input type="submit" value="Envoyer">
                        <!-- Button end -->
                    </form>
                    <!-- Contact form end -->
                </div>
                <!-- Contact container -->
            </div>
            <!-- Contact content end -->
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
                &copy; Copyright, conception et développement par <a class="github" href="https://github.com/LejeuneA/portfolio-lejeune" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> Açelya
                    Lejeune</a>
            </div>
        </div>
        <!-----------------------------------------------------------------
                               Footer end
    	------------------------------------------------------------------>

        <!-- Back to Top -->
        <a href="#" class="back-to-top" id="backToTop"><i class="fa fa-arrow-up"></i></a>


        <!-- Font Awesome JS -->
        <script src="https://kit.fontawesome.com/3546d47201.js" crossorigin="anonymous"></script>


        <!-- Vendor JS Files -->
        <script src="./vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="./vendor/aos/aos.js"></script>
        <script src="./vendor/glightbox/js/glightbox.min.js"></script>
        <script src="./vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="./vendor/swiper/swiper-bundle.min.js"></script>
        <script src="./vendor/typed.js/typed.umd.js"></script>
        <script src="./vendor/waypoints/noframework.waypoints.js"></script>
        <script src="./vendor/php-email-form/validate.js"></script>

        <!-- Include main.js -->
        <script src="./js/main.js"></script>

</body>

</html>