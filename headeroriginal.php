<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>MeTV - Home</title>
    <style>
        /* Add your CSS styles here or link an external stylesheet */
        /* Example styles for the header */
        header {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .logo h1 {
            display: inline;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav a {
            text-decoration: none;
            color: #fff;
        }
        .buttons {
            display: flex;
            align-items: center;
        }
        .buttons button {
            background-color: #fff;
            color: #333;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo1.png" alt="MeTV Logo">
            <h1>MeTV</h1>
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="buttons">
            <?php
            // Example PHP code to conditionally display buttons
            session_start(); // Start the PHP session
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $firstLetter = substr($username, 0, 1); // Get the first letter of the username
                echo '<div class="user-textbox"><span class="user-icon">' . $firstLetter . '</span><span class="user-username">' . $username . '</span></div>';
              }
            
            if (isset($_SESSION['user'])) {
                // If a user is logged in, show a "Logout" button
                echo '<button class="logout-button">Logout</button>';
            } else {
                // If no user is logged in, show a "Login" button
                echo '<a href="login.php"><button class="login-button">Login</button></a>';
            }
            ?>
            <a href="my order.php"><button class="cart-button">My order</button>
            <a href="logout.php"><button class="cart-button">logout</button>
            <a href="cart.php"><button class="cart-button">Cart</button>
           <a href="php-admin-panel/tv/admin/index.php"><button class="admin-button">Admin</button></a>
        </div>
    </header>
    <script>
        // JavaScript code for an interactive dropdown menu
        document.querySelector('.logo').addEventListener('click', function() {
            document.querySelector('nav ul').classList.toggle('show');
        });
    </script>
</body>
</html>

