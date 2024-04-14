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
            <a href="index.html"><h1><strong>Kian Christian Chong</strong></h1></a>
            <nav id="page-navigation">
                <ul>
                    <li><a href="index.html#index-container">About Me</a></li>
                    <li><a href="education.html">Education</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>

        <div id="main-content">
            <section id="login">
                <form action="login.php" method="POST">
                    <fieldset>
                    <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "userdatabase";

                        // Creates connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Checks connec    tion
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $email = $_POST["email"];
                            $pass1 = $_POST["password"];   
                            $sql = "SELECT * FROM USERS";
                            $result = $conn->query($sql);
                            $foundUser = false;
                            while ($row = $result->fetch_assoc()) {
                                if ($row["email"] === $email && $row["password"] === $pass1) {
                                    echo "Welcome ";
                                    echo $row["firstName"];
                                    echo " ";
                                    echo $row["lastName"];
                                    echo "</br>";
                                    $foundUser = true;
                                }
                                break;
                            }

                            if ($foundUser == false) {
                                echo "<p> User not found. </p?";
                            }

                            $conn->close();
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

