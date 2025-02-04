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
            <div id="education-container">
                <article id="education" class="card">
                    <section>
                        <h1>Education</h1>
                        <div>
                            <p class="p-title">BSc Computer Science, Queen Mary</p>
                            <p id="date">2023-2026</p>
                            <table id="grades">
                                <tr>
                                    <td>Procedural Programming</td>
                                    <td>82%</td>
                                </tr>
                                <tr>
                                    <td>Computer Systems & Networks</td>
                                    <td>86.4%</td>
                                </tr>
                                <tr>
                                    <td>Logic & Discrete Structures</td>
                                    <td>92.1%</td>
                                </tr>
                                <tr>
                                    <td>Professional Research & Practice</td>
                                    <td>91%</td>
                                </tr>
                            </table>
                        </div>

                        <div>
                            <p class="p-title">Ampleforth College</p>
                            <p id="date">2018-2020</p>
                            <table id="grades">
                                <tr>
                                    <td>Maths</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>Further Maths</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>Physics</td>
                                    <td>B</td>
                                </tr>

                            </table>
                        </div>
                    </section>
                </article>

                <article id="achievements" class="card">
                    <section>
                        <caption><h1 class="sub-h1">Achievements</h1></caption>
                        <div class="achievement">
                            <img src="images/icons8-amazon-web-services-240.png" alt="AWS Icon">
                            <p class="p-title">AWS Certified Cloud Practicioner</p>
                        </div>
                        <div class="achievement">
                            <img src="images/icons8-graduation-cap-96.png" alt="Graduation Cap Image">
                            <p class="p-title">Academic Scholar</p>
                        </div>
                        <div class="achievement">
                            <img src="images/icons8-udemy.com-is-an-online-learning-and-teaching-platform.-100.png" alt="Udemy Icon">
                            <p class="p-title">The Complete SQL Bootcamp 2022</p>
                        </div>
                    </section>
                    
                </article>

                <article id="skills" class="card">
                    <section>
                        <h1 class="sub-h1">Skills</h1>
                        <ul>
                            <li>
                                <a href="https://icons8.com/icon/13679/java">
                                    <img id=skills-icon src="images/icons8-java-240.png" alt="Java Icon" class="overlayed" />
                                </a>
                                <p>Java</p>
                            </li>
                            <li>
                                <a href="https://icons8.com/icon/ti98Xg8mxLWd/sql">
                                    <img id=skills-icon src="images/icons8-sql-64.png" alt="SQL Icon" class="overlayed"/>
                                </a>
                                <p>SQL</p>
                            </li>
                            <li>
                                <a href="https://icons8.com/icon/13441/python">
                                    <img id=skills-icon src="images/icons8-python-240.png" alt="Python Icon" class="overlayed"/>
                                </a>
                                <p>Python</p>
                            </li>
                            <li>
                                <a href="https://icons8.com/icon/108784/javascript">
                                    <img id=skills-icon src="images/icons8-javascript-240.png" alt="Javascript Icon" class="overlayed"/>
                                </a>
                                <p>Javascript</p>
                            </li>
                            <li>
                                <a href="https://icons8.com/icon/20909/html-5">
                                    <img id=skills-icon src="images/icons8-html-5-240.png" alt="HTML5 Icon" class="overlayed"/>
                                </a>
                                <p>HTML5</p>
                            </li>
                            <li>
                                <a href="https://icons8.com/icon/7gdY5qNXaKC0/css3">
                                    <img id=skills-icon src="images/icons8-css3-240.png" alt="CSS Icon" class="overlayed"/>
                                </a>
                                <p>CSS</p>
                            </li>

                        </ul>
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