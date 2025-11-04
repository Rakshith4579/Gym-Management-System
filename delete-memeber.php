<?php
// Check if the member ID is provided in the URL
if(isset($_GET['id'])) {
    $member_id = $_GET['id'];
    
    // Delete the member from the database
    // Replace DB_SERVER, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials
    $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if ($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    }
    
    $sql = "DELETE FROM member WHERE id = $member_id";
    
    if ($connection->query($sql) === TRUE) {
        // Redirect back to the member details page
        header("Location: member_details.php");
        exit();
    } else {
        echo "Error deleting member: " . $connection->error;
    }
} else {
    echo "Member ID not provided.";
}
?>
