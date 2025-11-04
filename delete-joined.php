<?php
if (isset($_GET["name"])) {
    // Get the name from the GET request
    $name = $_GET["name"];

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

    // Prepare and bind the SQL statement
    $SQL = "DELETE FROM joined WHERE name=?";
    $statement = $connection->prepare($SQL);
    $statement->bind_param("s", $name);

    // Execute the statement
    $statement->execute();

    // Close the statement
    $statement->close();

    // Close the database connection
    $connection->close();

    // Redirect to joined-details.php after deletion
    header("Location: /joined-details.php");
    exit();
} else {
    // Redirect if name parameter is not set
    header("Location: /joined-details.php");
    exit();
}
?>
