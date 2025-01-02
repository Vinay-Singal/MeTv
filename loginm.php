<?php
session_start();

// User Login Form Handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user-login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with your database connection code
    $conn = new mysqli("localhost", "root", "", "MeTv");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("location: homepage.php"); // Redirect to a dashboard page
    } else {
        $userLoginError = "Login failed. Check your username and password.";
    }

    $conn->close();
}

// Admin Login Form Handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["admin-login"])) {
    // Handle admin login here if needed
    // You can add similar logic as above for the admin login
    // ...

    // For this example, no admin login logic is provided.
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .left-text {
            text-align: left;
        }

        /* Hide the admin login form by default */
        .admin-login-container {
            display: none;
        }

        .error-message {
            color: red;
        }

        .button-wide {
        width: 100%; /* Set your desired width here */
        }
        
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        
        <!-- User Login Form -->
        <form id="user-login-form" action="" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button class="button-wide" type="submit" class="login-button" name="user-login">Login</button>
    </form>
    <br>
    <!-- Choice Buttons to Switch Between User and Admin Login -->
    <center>
        <div class="choice-buttons">
            <a href="register.php" target="_self"><button class="admin-button">Sign Up</button></a>&nbsp;
            <a href="php-admin-panel/tv/admin/index.php" target="_self"><button class="admin-button">Admin Login</button></a>
        </div></center>
        
    
        <!-- Error message for User Login -->
        <?php
            if (isset($userLoginError)) {
                echo '<p class="error-message">' . $userLoginError . '</p>';
            }
        ?>
    </div>

    <script>
        // JavaScript to switch between User and Admin login forms
        const userLoginButton = document.getElementById("user-login-button");
        const adminLoginButton = document.getElementById("admin-login-button");
        const userLoginForm = document.getElementById("user-login-form");
        const adminLoginForm = document.getElementById("admin-login-form");

        userLoginButton.addEventListener("click", () => {
            userLoginForm.style.display = "block";
            adminLoginForm.style.display = "none";
        });

        adminLoginButton.addEventListener("click", () => {
            userLoginForm.style.display = "none";
            adminLoginForm.style.display = "block";
        });
    </script>
</body>
</html>
