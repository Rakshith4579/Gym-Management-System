<?php
// Start session
session_start();

// Check if the user is already logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin-login.php"); // Redirect to login page if not logged in
    exit;
}

// Logout process
if(isset($_GET["logout"]) && $_GET["logout"] == "true"){
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to login page
    header("location: admin-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
  /* Styling for form */
  form {
    margin: 20px;
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    font-weight: bold;
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
  }

  .navbar-nav .nav-item.active .nav-link {
    font-weight: bold; /* Bold font for active link */
  }

  /* Additional styling for the Save button */
  .btn-primary {
    margin-top: 10px;
  }
</style>

</head>
<body>

<!-- Logout link -->
<a href="?logout=true" class="btn btn-danger">Logout</a>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
