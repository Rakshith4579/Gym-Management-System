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
$joindate = "";
$experience = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:/coach-details.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM coach WHERE id=$id";
    $result = $connection->query($sql);

    if (!$result) {
        die("Query failed: " . $connection->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $name = $row["name"];
        $date = $row["dob"];
        $joindate = $row["joindate"];
        $experience = $row["experience"];
    } else {
        header("location:/coach-details.php");
        exit;
    }
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $date = $_POST["dob"];
    $joindate = $_POST["joindate"];
    $experience = $_POST["experience"];

    if (empty($id) || empty($name) || empty($date) || empty($joindate) || empty($experience)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE coach SET name ='$name', dob ='$date', joindate ='$joindate', experience ='$experience' WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
        } else {
            $successMessage = "Coach updated correctly";
            header("location:/coach-details.php");
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
   
    <!-- Form -->
    <form action="edit-coach.php" method="post"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">COACH ID</label>
                <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID" value="<?php echo $id; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">COACH NAME</label>
                <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">DATE OF BIRTH</label>
            <input type="text" name="dob" class="form-control" id="inputAddress" placeholder="dob" value="<?php echo $date; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">JOINED DATE</label>
            <input type="text" name="joindate" class="form-control" id="inputAddress2" placeholder="joineddate" value="<?php echo $joindate; ?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">EXPERIENCE</label>
            <input type="text" name="experience" class="form-control" id="inputAddress2" placeholder="experience" value="<?php echo $experience; ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>
    <!-- Form end -->

    <!-- JavaScript -->
    <!-- Your JavaScript code here -->
</body>
</html>
