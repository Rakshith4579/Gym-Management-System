<?php
include "config.php";

// Function to sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Function to validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Registration Script
if (isset($_POST["register"])) {
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);

    // Validate email
    if (!isValidEmail($email)) {
        $register_error = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $register_error = "Password must be at least 8 characters long.";
    } else {
        // Hash the password before storing (recommended)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database using prepared statements
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            echo "User registered successfully.";
        } else {
            $register_error = "Error: " . $stmt->error;
        }
    }
}

// Login Script
if (isset($_POST["login"])) {
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);

    // Validate email
    if (!isValidEmail($email)) {
        $login_error = "Invalid email format.";
    } else {
        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the hashed password
            if (password_verify($password, $row['password'])) {
                // Password is correct, start a session
                session_start();
                $_SESSION['username'] = $row['username'];
                
                // Redirect to billing.php or another page
                header("Location: billing.php");
                exit; // Ensure that no further code is executed after the redirection
            } else {
                $login_error = "Incorrect password.";
            }
        } else {
            $login_error = "No account found with that email.";
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <title>Fitness club | Login & Registration</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="logo">
            <a href="index.html"><img src="img/TT.png" alt=""></a>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="index.html" class="link active">Home</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="form-box">
        <!-- Login and Registration Forms -->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form method="post">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="email" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <input type="hidden" id="loginError" value="<?php echo isset($login_error) ? $login_error : ''; ?>">
                <div id="loginErrorMessage" style="color: red; margin-top: 5px;"></div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In" name="login">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form method="post">
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="Email" name="email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password (min 8 characters)" name="password" pattern=".{8,}" title="Password must be at least 8 characters" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <input type="hidden" id="registerError" value="<?php echo isset($register_error) ? $register_error : ''; ?>">
                <div id="registerErrorMessage" style="color: red; margin-top: 5px;"></div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Register" name="register">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Terms & conditions</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // JavaScript functions for form switching and error handling
    function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if (i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }

    window.onload = function() {
        var loginError = document.getElementById('loginError').value;
        var registerError = document.getElementById('registerError').value;

        if (loginError) {
            document.getElementById('loginErrorMessage').innerText = loginError;
        }

        if (registerError) {
            document.getElementById('registerErrorMessage').innerText = registerError;
        }
    };

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
</script>
</body>
</html>
