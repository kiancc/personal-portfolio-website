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
        $commentid = $_POST["comment-id"];

        $sql = "DELETE FROM comments WHERE ID = '$commentid'";
        if ($conn->query($sql) === TRUE) {
            // redirects to viewblog
            header("Location: viewBlog.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }js/
        $conn->close();
    }
?>