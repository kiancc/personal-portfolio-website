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
                    <li><a href="education.php">Education</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="experience.php">Experience</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>

        <div id="main-content">
            <section id="login">
                <form>
                    <fieldset>
                    <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "portfoliodb";

                        session_start();

                        // Creates connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Checks connec    tion
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $foundUser = false;

                        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $email = $_POST["email"];
                            $pass1 = $_POST["password"];   
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                if ($row["email"] === $email && $row["password"] === $pass1) {
                                    echo "<p>Welcome ";
                                    echo $row["firstName"];
                                    echo " ";
                                    echo $row["lastName"];
                                    echo "</p></br>";
                                    if ($email === "kiancc97@gmail.com" || $email === "ec23152@qmul.ac.uk" || $email === "kianchristianchong@gmail.com") {
                                        $_SESSION['UserID'] = "admin";
                                        $_SESSION["VisitorName"] = "admin";
                                    } else {
                                        $_SESSION['UserID'] = "visitor";
                                        $_SESSION['VisitorName'] = $row["firstName"] . " " . $row["lastName"];
                                    }

                                    $foundUser = true;
                                    break;
                                }
                            }

                            if ($foundUser == false) {
                                echo "<p> User not found. </p?";
                            } else {
                                if ($_SESSION['UserID'] == "admin") {
                                    header("Location: addpost.php");
                                } else {
                                    header("Location: index.php");
                                }
                            }

                            $conn->close();
                        }
                    ?>
                    </fieldset>
                </form>
            </section>
            
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

