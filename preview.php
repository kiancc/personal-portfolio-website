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
                    <h1>Preview</h1>
                </article>

                <article id="blog-entries">

                    <div class="blog-entry" id="preview-blog">
                        <div class="sub-blog-title">
                            <div>
                                <h2><strong id="preview-title"><?php session_start(); echo $_SESSION["blog-title"];?></strong></h2>
                                <p id="date">
                                    <?php 
                                        $d = date("Y-m-d H:i:s");
                                        echo $d;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <p class="p1" id="preview-text"><?php echo $_SESSION["blog-text"];?></p>
                        <form method="POST">
                            <p>
                                <input type="submit" id=submit-button name="submit-button" value="Post">
                                <input type="submit" id="edit-button" name="edit-button" value="Edit">
                            </p>
                        </form>
                    </div>

                    <?php
                        if (isset($_POST['edit-button'])) {
                            header("Location: addpost.php" );
                            exit;
                        } else if (isset($_POST['submit-button'])) {
                            // connect to db and post 
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
                
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $text = $_SESSION["blog-text"];
                                $title = $_SESSION["blog-title"];
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
                        }
                    ?>

                    <!-- PHP code to connect to db and display blog entries -->
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
                        
                        // grabs entries from db and stores in an array
                        $sql = "SELECT * FROM blogentries";
                        $result = $conn->query($sql);
                        $entries = array();
                        // redirects to addpost if logged in <-- check whether to implement
                        // redirects to login.html if no entries
                        if ($result->num_rows == 0) {
                            header("Location: login.html");
                            exit;
                        }
                        
                        while ($row = $result->fetch_assoc()) {
                            $entries[] = array($row["dateTime"], $row["title"], $row["text"], $row["ID"]);
                        }

                        // **************************************
                        // sorting algorithm developed by ChatGPT
                        // **************************************
                        
                        // Function to compare two entries based on their dateTime
                        function sortByDateTimeDesc($a, $b) {
                            return strtotime($b[0]) - strtotime($a[0]);
                        }
                        
                        usort($entries, 'sortByDateTimeDesc');

                        // **************************************
                        
                        
                        function displayComments($key, $conn) {
                            // grabs entries from db and stores in an array
                            $sql = "SELECT * FROM comments;";
                            $commentResult = $conn->query($sql);
                            $comments = array();

                            while ($row = $commentResult->fetch_assoc()) {
                                if ($row["blogID"] == $key) {
                                    $comments[] = array($row["name"], $row["comment"], $row["dateTime"], $row["ID"]);
                                }
                            }

                            foreach ($comments as $comment) {
                                if (isset($_SESSION["UserID"]) && $_SESSION["UserID"] == "admin") {
                                    echo '<div class="comment-container">';
                                    echo '<p>'.$comment[0].': '.$comment[1].', '.$comment[2].'</p>';
                                    echo '<form action="deletecomment.php" method="POST">
                                    <input type="hidden" name="comment-id" value="'.$comment[3].'">
                                    <input type="submit" value="Delete" class="delete-comment"></form>';
                                    echo '</div>';
                                } else {
                                    echo '<p class="comment">'.$comment[0].': '.$comment[1].', '.$comment[2].'</p>';
                                }
                                
                            }
                        }

                        // Output the sorted entries
                        foreach ($entries as $entry) {
                            echo '<div class="blog-entry">';
                            echo '<div class="sub-blog-title">';
                            
                            if (isset($_SESSION["UserID"]) && $_SESSION["UserID"] == "admin") {
                                echo '<div id="b-title"><h2><strong>' . $entry[1] . '</strong></h2>';
                                echo '<form action="deletepost.php" method="POST">
                                <input type="hidden" name="blog-id" value="'.$entry[3].'">
                                <p><input type="submit" value="Delete" class="delete-blogpost"></p></form></div>';
                                echo '<p id="date">' . $entry[0] . '</p>';
                            } else {
                                echo '<div><h2><strong>' . $entry[1] . '</strong></h2>';
                                echo '<p id="date">' . $entry[0] . '</p></div>';
                            }
                            echo '</div>';
                            echo '<hr>';
                            echo '<p class="p1">' . $entry[2] . '</p>';
                            //echo '<button id="comment-button'. $index .'"><p>Comment</p></button>';
                            echo '<hr>';
                            //echo '<button id="comment-button">Add Comment</button>';
                            echo '<div class="comment-section"><h2>Comments:</h2>';
                            // add function that displays comments from comments db
                            displayComments($entry[3], $conn);
                            echo '</div>';
                            echo '</div>';
                        }
                        

                        $conn->close();
                    ?>
                </article>
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