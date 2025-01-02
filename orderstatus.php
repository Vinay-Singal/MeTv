<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Tracking</h1>

        <?php
        // Database connection
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "MeTv";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch order details
        $sql = "SELECT Order_Id, Item_Name, Price, Quantity, Ordered_on FROM user_orders";

        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Order ID</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Ordered On</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Order_Id'] . "</td>";
                echo "<td>" . $row['Item_Name'] . "</td>";
                echo "<td>" . $row['Price'] . "</td>";
                echo "<td>" . $row['Quantity'] . "</td>";
                echo "<td>" . $row['Ordered_on'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No orders found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
