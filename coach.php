<?php
include "config.php";


if (isset($_REQUEST["submit"])) {
    
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $dob = $_REQUEST["dob"];
    $joindate = $_REQUEST["joindate"];
    $experience = $_REQUEST["experience"];

    

    $ins = "INSERT INTO coach (id,name, dob,joindate,experience) VALUES ('$id','$name','$dob','$joindate','$experience')";
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
        /* Styling for form */
        form {
            margin: 180px;
        }

        .form-group {
            margin-bottom: 40px;
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

        /* Background image styling */
        body {
            background-image: url("background.png"); /* Replace 'background.jpg' with the path to your image file */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Do not repeat the background image */
        }
    </style>
</head>
<body>
    
<!-- nav bar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt=""></a>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Gym Management System</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="billing.php">Billing</a>
      </li>
      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMembers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Coach
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMembers">
                    <a class="dropdown-item" href="coach-details.php">View Coach</a>
                    
                    <!-- Add more dropdown items as needed -->
                </div>
            </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="receptionist.php">Receptionist</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<!-- nav bar ends -->


<!-- form start -->
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Coach ID</label>
      <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Date of Birth</label>
    <input type="text" name="dob" class="form-control" id="inputAddress" placeholder="Date of Birth">
  </div>
  <div class="form-group">
    <label for="inputAddress">Date of joined</label>
    <input type="text" name="joindate" class="form-control" id="inputAddress" placeholder="Date of joined">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Experience</label>
    <input type="text" name="experience" class="form-control" id="inputAddress2" placeholder="Experience">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
<!-- form end -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
