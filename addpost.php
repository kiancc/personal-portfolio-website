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
    <script src="js/addpost.js" defer></script>
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
        
        <section id="add-blog">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <fieldset>
        
                    <legend>Add Entry</legend>
                    <?php 
                        session_start();
                        if (isset($_SESSION["blog-title"])) {
                            echo '<p><input type="text" name="title" placeholder="Title" id="post-title" value="'.$_SESSION["blog-title"].'"></p>
                            <textarea placeholder="Enter your text" name="blog-text" rows="4" cols="50" id="blog-text">'.$_SESSION["blog-text"].'</textarea>';
                        } else {
                            echo '<p><input type="text" name="title" placeholder="Title" id="post-title"></p>
                            <textarea placeholder="Enter your text" name="blog-text" rows="4" cols="50" id="blog-text"></textarea>';
                        }
                    ?>

                    <p>
                        <input type="submit" id=submit value="Post">
                        <input type="button" id="clear" value="Clear">
                    </p>

                    <input type="submit" id="preview-button" name="preview-button" value="Preview">
                    
                </fieldset>
            </form>
        </section>

        <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "portfoliodb";

            // Creates connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Checks connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['clear'])) {
                unset($_SESSION["blog-title"]);
                unset($_SESSION["blog-text"]);
            }

            if (isset($_POST['preview-button'])) {
                $_SESSION["blog-title"] = $_POST["title"];
                $_SESSION["blog-text"] = str_replace("'", '"', $_POST["blog-text"]);
                header("Location: preview.php");
            }

            else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $text = str_replace("'", '"', $_POST["blog-text"]);
                $title = $_POST["title"];
                $time = date("Y-m-d H:i:s");
                $sql = "INSERT INTO blogentries (title, text, dateTime)
                VALUES ('$title', '$text', '$time')";
                if ($conn->query($sql) === TRUE) {
                    // redirects to viewblog
                    unset($_SESSION["blog-title"]);
                    unset($_SESSION["blog-text"]);
                    header("Location: viewBlog.php");
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        ?>

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