<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Homepage</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/form-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
</head>
<body>
    <div id="container">
        <header id="title">
            <a href="index.php"><h1><strong>Kian Christian Chong</strong></h1></a>
            <nav id="page-navigation">
                <ul>
                    <li><a href="index.php">About Me</a></li>
                    <li><a href="education.php">Education</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="experience.php">Experience</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>

        <div id="main-content">
            <div id="index-container">
                <article id="about-me" class="card">
                    <section>
                        <h1>About me</h1>
                        <p class="p1">Hi! I'm a Computer Science student at Queen Mary.</p>
                        <p class="p1">I'm interested in emerging technologies and their applications in the world, such as AI, Cloud technologies and IoT.</p>
                    </section>
                </article>

                <figure id="profile-pic">
                    <img  src="images/Kian.jpeg" alt="Personal Image">
                </figure>

                <aside id="contact-info" class="card">
                    <h1 class="sub-h1">Contact Info</h1>    
                    <section>
                        <div class="info">
                            <a href="mailto:kiancc97@gmail.com"><img src="images/icons8-gmail-240.png" alt="email icon"></a>
                        </div>
                        <div class="info">
                            <a href="https://github.com/kiancc"><img src="images/icons8-github-96.png" alt="github icon"></a>
                        </div>
                        <div class="info">
                            <a href="https://www.linkedin.com/in/kian-chong-a51436121/"><img src="images/icons8-linkedin-240.png" alt="Linkedin Logo"></a>
                        </div>
                        <div class="info">
                            <a href="tel:+447481475631"><img src="images/icons8-whatsapp-240.png" alt="whatsapp icon"></a>
                        </div>
                    </section>
                </aside>
                
                <?php 
                    session_start();
                    if (!isset($_SESSION['UserID'])) {
                        echo '<aside id="login" class="big-button">';
                        echo '<a href="login.html">Login</a>';
                        echo '</aside>';
                    } else {
                        echo '<aside id="login" class="big-button">';
                        echo '<a href="logout.php">Logout</a>';
                        echo '</aside>';
                    }
                ?>
                <!--
                <aside id="register" class="big-button">
                    <a href="registration.html">Register</a>
                </aside>-->
            </div>
        </div>

        <footer id="footer">
            <section id="log-footer"> 
                <?php 
                    if(!isset($_SESSION['UserID'])) {
                        echo '<a href="login.html">Login</a>';
                    } else {
                        echo '<p>Welcome, '. $_SESSION["VisitorName"].'</p><a href="logout.php">Logout</a>';
                    }
                ?>
                <p>Kian Chong 2024 &copy;</p>
            </section>
        </footer>
    </div>
</body>
</html>