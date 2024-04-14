<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>My Homepage</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/form-style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
</head>
<body>
    <div id="container">
        <header id="title">
            <a href="index.php"><h1><strong>Kian Christian Chong</strong></h1></a>
            <nav id="page-navigation">
                <ul>
                    <li><a href="index.php">About Me</a></li>
                    <li><a href="education.html">Education</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>

        <div id="main-content">
            <section id="login">
                <form>
                    <fieldset>
                    <?php
                        session_start();
                        // reset session variables
                        $_SESSION = [];
                        session_destroy();
                        if (!isset($_SESSION['UserID'])) {
                            echo "<p>You are now logged out.</p>";
                        } else {
                            echo "<p>Something went wrong.</p>";
                        }
                    ?>
                    </fieldset>
                </form>
            </section>
        </div>

        <footer id="footer">
            <section id="signature">
                <p>Kian Chong 2024 &copy;</p>
            </section>
        </footer>
    </div>
    

</body>
</html>

