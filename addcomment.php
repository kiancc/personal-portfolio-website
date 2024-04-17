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
                $entries[$row["ID"]] =  $row["title"];
            }
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <fieldset>
        
                    <legend>Add Comment</legend>
                    <select id="select-blog" name="select-blog">
                        <?php 
                            foreach ($entries as $key => $value) {
                                echo '<option id="blog-option" name="blog-option" value="'.$key.'">'.$value.'</option>';
                            }
                        ?>
                    </select>
                    <textarea placeholder="Enter your text" name="comment-text" rows="4" cols="50" id="blog-text"></textarea>
        
                    <p>
                        <input type="submit" id=submit value="Post">
                        <input type="button" id="clear" value="Clear">
                    </p>
                    
                </fieldset>
            </form>
        </section>

        <?php 
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $key = $_POST["select-blog"];
                $comment = $_POST["comment-text"];
                $time = date("Y-m-d H:i:s");
                $name = $_SESSION['VisitorName'];
                $sql = "INSERT INTO comments (blogID, comment, dateTime, name)
                VALUES ('$key', '$comment', '$time', '$name')";
                if ($conn->query($sql) === TRUE) {
                    // redirects to viewblog
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