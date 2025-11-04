<?php
include "config.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $dob = $_POST["dateofbirth"]; // Corrected variable name
    $phone = $_POST["phone"]; // Corrected variable name
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];

    $ins = "INSERT INTO joined (name, dob, phone, email, address, gender) VALUES ('$name', '$dob', '$phone', '$email', '$address', '$gender')";
    $query1 = mysqli_query($connection, $ins);
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
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styling for form */
        form {
            margin: 120px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color:white;
        }

        /* Styling for navigation bar */
        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand img {
            height: 50px; /* Adjust the height of the logo */
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

        /* Additional custom styling */
        body {
            font-family: Arial, sans-serif;
        }

        .top_link {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .top_link a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 50%;
            text-decoration: none;
        }

        .top_link a img {
            width: 30px;
            height: 30px;
        }
        /* Background image styling */
        body {
            background-image: url("background.png"); /* Replace 'background.jpg' with the path to your image file */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Do not repeat the background image */
        }

        /* Optional: You may add more custom styling here based on your requirements */
    </style>
</head>
<body>
<!-- nav bar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Tuitions Tonight Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="join.php">join</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
        </ul>
    </div>
</nav>
<!-- nav bar end     -->
<!-- form start -->
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Date of Birth</label>
            <input type="text" name="dateofbirth" class="form-control" id="inputAddress2" placeholder="Date of Birth">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Phone</label>
        <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Email</label>
        <input type="text" name="email" class="form-control" id="inputAddress2" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress2" placeholder="Address">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Gender</label>
        <input type="text" name="gender" class="form-control" id="inputAddress2" placeholder="Gender">
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Pay</button>
</form>
<!-- form end -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>