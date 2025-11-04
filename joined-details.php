<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            margin-bottom: 100px;
        }

        label {
            font-weight: bold;
            color:white;
        }

        /* Styling for navigation bar */
        .navbar {
            margin-bottom: 10px;
            color:dark;
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
            margin-top: 1px;
        }

        /* Background image styling */
        body {
            margin: 0; /* Remove default body margin */
            height: 100%; /* Ensure body takes up full viewport height */
            background-image: url("background.png"); /* Replace 'background.jpg' with the path to your image file */
            background-size:120 ;
            color:white;
        }
        navbar-nav .back-button {
            color: red; /* Change the color */
            font-size: 16px; /* Change the font size */
            margin-right: 10px; /* Adjust margins for alignment */
        }
        <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Tuitions Tonight Logo"></a>
    </style>
</head>

<body>

<li class="nav-item">
    <a class="nav-link" href="members.php">&#8592; Back</a>
</li>

<h1 style="text-align: center;">Joined Member Details</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>DATE OF BIRTH</th>
                <th>PHONE</th> 
                <th>EMAIL</th> 
                <th>ADDRESS</th> 
                <th>GENDER</th> 
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php

        define('DB_SERVER','localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
        define('DB_NAME','gym');

        $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        
        if ($connection->connect_error) {
            die("Connection Failed: " . $connection->connect_error);
        }
        
        $sql = "SELECT * FROM joined";
        $result = $connection->query($sql);

        if(!$result) {
            die("Invalid query: " . $connection->error);
        }

        while($row = $result->fetch_assoc()) {
            echo "<tr>
               
                <td>" . $row["name"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>
                    
                    <a class='btn btn-danger btn-sm' href='delete-joined.php?name=" . $row["name"] . "'>Delete</a>
                </td>
              </tr>";

        }
        ?>
    </tbody>
            
</table>
</body>
</html>
