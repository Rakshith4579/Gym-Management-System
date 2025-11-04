<?php
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

$id = "";
$name = "";
$date = "";
$dob = "";
$phone = "";
$coach = "";
$gender = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:/member-details.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM member WHERE id=$id";
    $result = $connection->query($sql);

    if (!$result) {
        die("Query failed: " . $connection->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $name = $row["name"];
        $date = $row["date"];
        $dob = $row["dob"];
        $phone = $row["phone"];
        $coach = $row["coach"];
        $gender = $row["gender"];
        $address = $row["address"];
    } else {
        header("location:/member-details.php");
        exit;
    }
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $dob =  $_POST["dob"];
    $phone = $_POST["phone"];
    $coach = $_POST["coach"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    if (empty($id) || empty($name) || empty($date) || empty($dob) || empty($phone) || empty($coach)|| empty($gender)|| empty($address)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE member SET id ='$id',name ='$name', date ='$date', dob ='$dob', phone ='$phone', coach='$coach', gender='$gender', address='$address' WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
        } else {
            $successMessage = "Client updated correctly";
            header("location:/member-details.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
         /* Styling for form */
         form {
            margin: 120px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: white;
        }

        /* Styling for navigation bar */
        .navbar {
            margin-bottom: 10px;
        }

        .navbar-brand img {
            height: 80px; /* Adjust the height of the logo */
        }

        .navbar-nav .nav-link {
            font-size: 18px; /* Adjust the font size of the links */
            padding: 0.5rem 1rem; /* Adjust padding for the links */
            font-weight: bold;
        }

        .navbar-nav .nav-item.active .nav-link {
            font-weight: bold; /* Bold font for active link */
        }

        /* Additional styling for the Save button */
        .btn-primary {
            margin-top: 10px;
        }

        /* Background image styling */
        body {
            margin: 0; /* Remove default body margin */
            height: 100%; /* Ensure body takes up full viewport height */
            background-image: url("background.png"); /* Replace 'background.jpg' with the path to your image file */
            background-size: cover; /* Ensure the background image covers the entire viewport */
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <!-- Your navigation bar code here -->

    <!-- Form -->
    <form action="edit-member.php" method="post"> 
        <!--<input type="hidden" name="id" value="<?php echo $id; ?>">-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">ID</label>
                <input type="text" name="id" class="form-control" id="inputPassword4" placeholder="ID" value="<?php echo $id; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Name</label>
                <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Date of Joining</label>
            <input type="text" name="date" class="form-control" id="inputAddress" placeholder="Date of Joining" value="<?php echo $date; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Date of Birth</label>
            <input type="text" name="dob" class="form-control" id="inputAddress2" placeholder="Date of Birth" value="<?php echo $dob; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Coach</label>
            <input type="text" name="coach" class="form-control" id="inputAddress2" placeholder="Coach" value="<?php echo $coach; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Coach</label>
            <input type="text" name="gender" class="form-control" id="inputAddress2" placeholder="Gender" value="<?php echo $gender; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress2" placeholder="Address" value="<?php echo $address; ?>">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>
    <!-- Form end -->

    <!-- JavaScript -->
    <!-- Your JavaScript code here -->
</body>
</html>
