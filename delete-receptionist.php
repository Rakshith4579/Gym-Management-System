<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Establishing database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $SQL = "DELETE FROM receptionist WHERE id=$id";
    $connection->query($SQL);

    // Close the database connection
    $connection->close();

    // Redirect to member-details.php after deletion
    header("Location: /receptionist-details.php");
    exit();
} else {
    // Redirect if id parameter is not set
    header("Location: /receptionist-details.php");
    exit();
}
?>
