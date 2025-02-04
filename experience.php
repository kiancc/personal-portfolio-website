<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
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

        <?php session_start(); ?>

        <div id="main-content">
            <div id="experience-container">

                <article id="experience" class="card">

                    <caption><h1>Experience</h1></caption>
                        <div class="job">
                            <p class="p-title">Business Applications Analyst I, Fender</p>
                            <p id="date">2022-Present</p>
                            <ul>
                                <li>Developed a series of web scrapers in Python to collect PreSonus product specifications, streamlining data formatting
                                    for integration into the PIM database during Fender’s acquisition. Achieved a remarkable reduction in time importing
                                    the data, compressing a 2 month data collection job into to 2 weeks.</li>
                                <li>Implemented automation in Velocity Template Language to assist in the build process of product records for Fender
                                    Custom Shop guitars. This reduced roughly 70% of the time taken building these records to validation.</li>
                                <li>Spearheaded day-to-day support for stakeholders throughout the company with a focus on the EMEA region.
                                    Amongst these tasks included developing and maintaining customized reports, managing user access and accounts,
                                    and troubleshooting issues with the PIM (Product Information Management) system.</li>
                                <li>Created a copy generator and image classifier proof of concept during a 3 day trial of AWS Sagemaker, and presented
                                    the results to the CIO, VP and manager.</li>
                            </ul>
                        </div>

                        <div class="job">
                            <p class="p-title">Customer Service Advisor, Juno Records</p>
                            <p id="date">2020-2022</p>
                            <ul>
                                <li>Responded to customer enquires via Zendesk in a friendly and professional manner. On a particularly busy day I
                                    was able to resolve just over 300 customer support tickets.</li>
                                <li>Processed vinyl record and equipment returns and refunds, well within advised return time frames.</li>
                                <li>Covered other departments when necessary, for instance helping with picking in the despatch department during
                                    hectic days, or packaging for the distribution department when staff were unavailable.</li>
                            </ul>
                        </div>

                </article>

            </div>

        </div>
<!-- 
        <aside id="login">
            <form action="">
                <fieldset>
                    <legend><strong>Login</strong></legend>
                    <label>Username</label>
                    <p><input type="email" name="username" placeholder="Email Address"></p>
                    
                    <label>Password</label>
                    <p><input type="password" name="password" placeholder="Password" pattern=""></p>

                    <p><input type="submit" value="Submit"></p>
                    
                </fieldset>
            </form>
        </aside>
-->
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