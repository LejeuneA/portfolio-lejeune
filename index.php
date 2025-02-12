<?php

require_once 'conf/conf-db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Fetch portfolio items
$sql = "SELECT id, image_url, info_url, live_url, github_url FROM portfolio";
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
<html lang="en">

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
    <link rel="stylesheet" href="./dist/index.css">

    <!-- Favicon -->
    <link href="./assets/icons/favicon.png" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Title -->
    <title>Acelya Lejeune - Web Developer and Graphic Designer</title>
</head>

<body>
    <!-----------------------------------------------------------------
                               Navigation
    ------------------------------------------------------------------>
    <header id="header">
        <!-- Profile -->
        <div class="profile">
            <img src="./assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="index.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
                <a href="fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="fas fa-home"></i><span>Home</span></a>
                </li>
                <li><a href="#about" class="nav-link scrollto"><i class="fas fa-user"></i>
                        <span>About</span></a></li>
                <li><a href="#skills" class="nav-link scrollto"><i class="fas fa-code"></i>
                        <span>Skills</span></a>
                </li>
                <li><a href="#portfolio" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="#services" class="nav-link scrollto"><i class="fas fa-tools"></i> <span>Services</span></a>
                </li>
                <li><a href="#contact" class="nav-link scrollto"><i class="fas fa-envelope"></i>
                        <span>Contact</span></a>
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
            <img src="./assets/images/header-photo.jpg" alt class="profile-img">
            <h1 class="text-light"><a href="index.php">Açelya Lejeune</a></h1>
            <div class="social-links">
                <a href="https://github.com/lejeunea" class="github" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/acelyalejeune" class="linkedin" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
                <a href="fr.php" class="language"><b>FR</b></a>
            </div>
        </div>

        <!-- Nav Menu -->
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="fas fa-home"></i> <span>Home</span></a>
                </li>
                <li><a href="#about" class="nav-link scrollto"><i class="fas fa-user"></i>
                        <span>About</span></a></li>
                <li><a href="#skills" class="nav-link scrollto"><i class="fas fa-code"></i>
                        <span>Skills</span></a>
                </li>
                <li><a href="#portfolio" class="nav-link scrollto"><i class="fas fa-list"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="#services" class="nav-link scrollto"><i class="fas fa-tools"></i> <span>Services</span></a>
                </li>
                <li><a href="#contact" class="nav-link scrollto"><i class="fas fa-envelope"></i>
                        <span>Contact</span></a>
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
    <section id="hero" class="hero">
        <div class="hero-container" data-aos="fade-in" data-aos-duration="3000">
            <h1>Açelya Lejeune</h1>
            <p>I'm a <span class="typed" data-typed-items="Web Developer, Graphic Designer"></span></p>
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
                        <p><span class="first-sentence">Welcome to my website! I'm Açelya
                                Lejeune</span>
                            My name is Açelya, a graphic design professional with over 20 years
                            experience. I started my
                            career in Antalya and have since broadened my horizons by working in
                            various digital
                            agencies
                            and print shops in Northern Cyprus, England and then by settling in
                            Belgium.
                        </p>
                        <p>
                            <span class="first-sentence">Graphic Design Expert</span>
                            My professional career has enabled me to follow the evolution of digital
                            art and embrace
                            innovations in the world of design. I've worked on various projects in
                            my area of of
                            expertise
                            using tools such as <span>Adobe Photoshop</span>, <span>Adobe
                                Illustrator</span>,
                            <span>Adobe
                                Indesign</span>, <span>Adobe XD</span> and <span>Figma</span>. I'm here
                            to share my
                            experience
                            with you.
                        </p>
                    </div>

                    <div class="about-container-right">
                        <div class="content" data-aos="fade-left" data-aos-duration="1600">
                            <p>
                                <span class="first-sentence">Passion for Web development</span>
                                In 2019, I moved to England, started my own business, and in 2020, I
                                got married and
                                started
                                my
                                own business. married and moved to Belgium. Currently, I'm developing
                                my web design
                                skills
                                using
                                <span>HTML5</span>, <span>CSS</span>, <span>Sass</span>,
                                <span>Javascript</span>,
                                <span>Php</span> and <span>MySQL</span>. Web design is my passion, and
                                I develop it
                                further
                                with each new project.
                            </p>
                            <ul>
                                <li><i class="fas fa-chevron-right"></i> Birthday: <span>13 May
                                        1980</span></li>
                                <li><i class="fas fa-chevron-right"></i> Website:
                                    <span>www.acelyalejeune.be</span>
                                </li>
                                <li><i class="fas fa-chevron-right"></i> Phone: <span>+32 493
                                        38 77 29</span></li>
                                <li><i class="fas fa-chevron-right"></i> City: <span>Liége,
                                        Belgium</span></li>
                                <li><i class="fas fa-chevron-right"></i> Age: <span>44</span></li>
                                <li><i class="fas fa-chevron-right"></i> Email:
                                    <span>contact@acelyalejeune.be</span>
                                </li>
                                <li><i class="fas fa-chevron-right"></i> Freelance:
                                    <span>Available</span>
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
                        <h3>Programming Languages</h3>

                        <ul class="skills-list">
                            <li>Html5</li>
                            <li>Css</li>
                            <li>Sass</li>
                            <li>Javascript</li>
                            <li>Php</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Frameworks & Tools</h3>

                        <ul class="skills-list">
                            <li>MySQL</li>
                            <li>CMS</li>
                            <li>NodeJs</li>
                            <li>Npm</li>
                            <li>Webpack</li>
                            <li>GitHub</li>
                        </ul>
                    </div>

                    <div class="skills-list-container">
                        <h3>Softwares for Design</h3>

                        <ul class="skills-list">
                            <li>Figma</li>
                            <li>Adobe XD</li>
                            <li>Adobe Illustrator</li>
                            <li>Adobe Photoshop</li>
                            <li>Adobe InDesign</li>
                        </ul>
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
                    <p>Incorporating two decades of graphic design expertise, I leverage my
                        skills to create impactful
                        works. With a rich background in design, I infuse creativity and
                        experience into every project,
                        delivering compelling results that resonate with audiences. Specializing
                        in responsive web
                        design, I leverage my extensive skill set to craft visually compelling
                        and user-friendly digital
                        experiences that adapt seamlessly across devices. Explore my portfolio to
                        witness the fusion of
                        artistry and technology, honed over years of experimentation and
                        innovation.
                    </p>
                </div>
                <div class="portfolio-container" data-aos="fade-up" data-aos-duration="1500">
                    <?php foreach ($portfolioItems as $item) : ?>
                    <div class="portfolio-items">
                        <div class="portfolio-item-top">
                            <a href="<?php echo htmlspecialchars($item['info_url']); ?>"><img
                                    src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Portfolio Item"></a>
                        </div>
                        <div class="portfolio-wrap">
                            <div class="portfolio-links-top">
                                <a class="portfolio-link-top" href="<?php echo htmlspecialchars($item['info_url']); ?>"
                                    title="More information"><i class="fas fa-circle-info"></i> More
                                    information</a>
                            </div>
                            <div class="portfolio-links-bottom">
                                <a class="portfolio-link-left" href="<?php echo htmlspecialchars($item['live_url']); ?>"
                                    title="Live Demo" target="_blank"><i class="fas fa-link"></i> Live
                                    Preview</a>
                                <a class="portfolio-link-right"
                                    href="<?php echo htmlspecialchars($item['github_url']); ?>" title="See on Github"
                                    target="_blank"><i class="fa fa-github"></i>
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
                    <p>My services focus on enhancing your digital presence and engaging your
                        audience. From bespoke web design to captivating graphics, I offer
                        tailored solutions to elevate your brand. Whether it's seamless UI design
                        or ensuring cross-device compatibility, I'm here to bring your vision to
                        life and make an impact online.
                    </p>
                </div>

                <div class="services-container" data-aos="fade-right" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/web-green.png" alt="icon">
                            <img class="hover-icon" src="./assets/icons/web-white.png" alt="hover icon">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Web design</h4>
                            <p class="description">Crafting visually appealing and intuitive
                                websites tailored to your brand and audience.</p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/ui-green.png" alt="icon">
                            <img class="hover-icon" src="./assets/icons/ui-white.png" alt="hover icon">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">UI design</h4>
                            <p class="description">Creating seamless and engaging user interfaces
                                for optimal digital experiences.</p>
                        </div>
                    </div>
                </div>

                <div class="services-container" data-aos="fade-left" data-aos-duration="1500">

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/graphic-green.png" alt="icon">
                            <img class="hover-icon" src="./assets/icons/graphic-white.png" alt="hover icon">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Graphic design</h4>
                            <p class="description">Designing attractive visuals and assets to
                                enhance brand identity and communication.</p>
                        </div>
                    </div>

                    <div class="services-item">
                        <div class="image-container">
                            <img class="icon" src="./assets/icons/responsive-green.png" alt="icon">
                            <img class="hover-icon" src="./assets/icons/responsive-white.png" alt="hover icon">
                        </div>
                        <div class="services-item-content">
                            <h4 class="title">Responsive design</h4>
                            <p class="description">Ensuring your website looks great and functions
                                flawlessly across all devices and screen sizes.</p>
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
                    <p>If you are interested in collaborating on graphic design, web
                        development or other creative projects, please creative projects, please
                        contact me via my page. I look forward to getting to know you better and
                        to us work together on your projects.
                    </p>
                </div>

                <div class="contact-container" data-aos="fade-in" data-aos-duration="1500">
                    <form action="./forms/contact.php" method="post">

                        <label for="firstName">Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Your name...">

                        <label for="lastName">Surname</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Your surname...">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email...">

                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject...">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Your message..."
                            style="height:200px"></textarea>

                        <!-- Button -->
                        <input type="reset" value="Reset">
                        <input type="submit" value="Submit">
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
                &copy; Copyright, design and development by <a class="github"
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