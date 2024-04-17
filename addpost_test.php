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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text = str_replace("'", '"', $_POST["blog-text"]);
        $title = $_POST["title"];
        $time = date("Y-m-d H:i:s");
        $sql = "INSERT INTO blogentries (title, text, dateTime)
        VALUES ('$title', '$text', '$time')";
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