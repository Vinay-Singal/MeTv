<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Us - MeTV</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Get in Touch</h2>
        <p>If you have any questions or inquiries, please feel free to contact us using the form below.</p>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="email">Phone:</label>
            <input type="tel" maxlength="10" id="phone" name="phone" required>


            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a MySQL database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MeTv";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        // Insert the data into the database
        $sql = "INSERT INTO contact_info (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo"<script>
            alert('Message submitted successfully. We Will Contact You Shortly.');
            window.location.href='contact.php';
            </script>";
            
        } else {
            echo "<div class='container'><p>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

</body>
</html>
