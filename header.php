<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external stylesheet -->
    <title>MeTV - Home</title>
    <style>
        /* Add your CSS styles here or link an external stylesheet */
        /* Example styles for the header */
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 70px;
            margin-right: 10px;
        }
        .logo h1 {
            display: inline;
            font-size: 24px;
        }
        .nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .nav ul li {
            margin-right: 20px;
        }
        .nav a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }
        .profile-dropdown {
            position: relative;
        }
        .profile-dropdown button {
            background: none;
            border: none;
            cursor: pointer;
        }
        .profile-icon {
            width: 40px;
            height: 40px;
            cursor: pointer;
        }
        .profile-icon img {
            width: 100%;
            height: 100%;
        }
        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 150px;
            right: 0;
            top: 100%;
            z-index: 1;
        }
        .profile-content {
            padding: 10px;
            display: block;
            text-align: center;
        }
        .user-info {
            display: flex;
            align-items: center;
            color: #fff;
            margin-right: 20px;
        }
        .cart-icon {
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo1.png" alt="MeTV Logo">
            <h1>MeTV</h1>
        </div>
        <div class="nav">
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '<div class="cart-icon"><a href="cart.php">🛒</a></div>'; // Cart icon
            echo '<div class="profile-dropdown">';
            echo '<button class="profile-icon" id="profile-dropdown-btn" style="color: white;">';
            echo '<img src="profile icon.svg" alt="User Icon" style="width: 40px; height: 40px;">';
            echo '</button>';
            echo '<div class="profile-dropdown-content" id="profile-dropdown-content">';
            echo '<div class="user-info">' . $username . '</div>';
            
            echo '<button class="profile-content"><a href="my order.php">My Order</a></button>';
            echo '<button class="profile-content"><a href="logout.php">Logout</a></button>';
            echo '<button class="profile-content"><a href="php-admin-panel/tv/admin/login.php">ADMIN</a></button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="cart-icon"><a href="cart.php">🛒</a></div>'; // Cart icon
            echo '<a href="loginm.php">Login</a>';
        }
        ?>

    </header>

    <script>
        const profileDropdownBtn = document.getElementById("profile-dropdown-btn");
        const profileDropdownContent = document.getElementById("profile-dropdown-content");

        profileDropdownBtn.addEventListener("click", () => {
            profileDropdownContent.style.display = profileDropdownContent.style.display === "block" ? "none" : "block";
        });

        // Close the dropdown when clicking outside of it
        window.addEventListener("click", (event) => {
            if (event.target !== profileDropdownBtn && event.target !== profileDropdownContent) {
                profileDropdownContent.style.display = "none";
            }
        });
    </script>
</body>
</html>
