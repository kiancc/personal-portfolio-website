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
    <script src="js/confirmpassword.js" defer></script>
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
                        <legend><strong>Register</strong></legend>

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

                            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $fname = $_POST["firstName"];
                                $sname = $_POST["lastName"];
                                $email = $_POST["email"];
                                $pass1 = $_POST["password"];   
                                $sql = "INSERT INTO users (firstName, lastName, email, password)
                                VALUES ('$fname', '$sname', '$email', '$pass1')";
                                if ($conn->query($sql) === TRUE) {
                                //YOUR CODE GOES HERE
                                
                                echo '<p>Registration Successful!</p>';
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
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