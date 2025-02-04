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

        <?php session_start();?>

        <div id="main-content">
            <div id="project-container">
            <h1>Projects</h1>
                <article id="projects" class="card">
                    <section class="project" id="project-1">
                        <p class="p-title">Top 5 Attractions</p>
                        <figure>
                            <a href="https://github.com/kiancc/ECS417U/blob/main/topic5/exercise1.html">
                                <img src="images/topic5-exercise1.png" alt="" class="attraction-image"/>
                            </a>
                            
                        </figure>
                        <div class="project-caption">   
                            <p>A website showcasing my top 5 favourite attractions as part of topic5 exercise1</p>
                        </div>
                    </section>

                    <section class="project" id="project-2">
                        <p class="p-title">Udemy Web Scraping Project</p>
                        <figure>
                            <a href="https://github.com/kiancc/Udemy-Scraping-Project">
                                <img src="images/udemy_scraping_project.png" alt="" class="attraction-image"/>
                            </a>       
                        </figure>
                        <div class="project-caption">   
                            <p>A web scraper I built as part of a Udemy Python course</p>
                        </div>
                    </section>

                    <section class="project" id="project-3">
                        <p class="p-title">CS50 Exercises</p>
                        <figure>
                            <img src="images/CS50_screenshot.png" alt="" class="attraction-image"/>
                        </figure>
                        <div class="project-caption">   
                            <p>Exercises I've completed as part of Harvard's CS50 course</p>
                        </div>
                    </section>
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