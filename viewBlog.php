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
            <div id="blog-container">

                <article id="blog-title" class="card">
                    <h1 >Blog</h1>
                    <aside class="big-button">
                        <a href="addpost.html">Add Post</a>
                    </aside>
                </article>

                <article id="blog-entries">
                    <!-- PHP code to connect to db and display blog entries -->
                    <?php
                        session_start();
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
                        
                        // grabs entries from db and displays them
                        $sql = "SELECT * FROM blogentries";
                        $result = $conn->query($sql);
                        // redirects to addpost if logged in <-- check whether to implement
                        // redirects to login.html if no entries
                        if ($result->num_rows == 0) {
                            header("Location: login.php");
                            exit;
                        }
                        while ($row = $result->fetch_assoc()) {
                        
                            echo '<div class="blog-entry">
                                    <div class="sub-blog-title">
                                        <h2><strong>'.$row['title'].'</strong></h2>
                                        <p id="date">'.$row['dateTime'].'</p>
                                    </div>
                                    <hr>
                                    <p class="p1">'.$row['text'].'</p>
                                </div>';
                        }
                        $conn->close();
                    ?>
                </article>
            </div>
        </div>

        <footer id="footer">
            <section id="log-footer">
                <p>Kian Chong 2024 &copy;</p>
                <?php 
                    if(!isset($_SESSION['UserID'])) {
                        echo '<a href="login.html">Login</a>';
                    } else {
                        echo '<a href="logout.php">Logout</a>';
                    }
                ?>
            </section>
        </footer>
    </div>
</body>
</html>