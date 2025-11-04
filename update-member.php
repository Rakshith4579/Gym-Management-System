<?php
// Start session to maintain data across pages if needed
session_start();

// Check if the member ID is provided in the URL
if(isset($_GET['id'])) {
    $member_id = $_GET['id'];
    
    // Fetch member details from the database based on the ID
    // Replace DB_SERVER, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials
    $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if ($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    }
    
    $sql = "SELECT * FROM member WHERE id = $member_id";
    $result = $connection->query($sql);
    
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Store member details in session for later use in the update form
        $_SESSION['member_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['date'] = $row['date'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['coach'] = $row['coach'];
        
        // Redirect to the update form
        header("Location: members-details.php");
        exit();
    } else {
        echo "Member not found.";
    }
} else {
    echo "Member ID not provided.";
}
?>
