<?php
// session_start();

include("header.php");
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    echo"<script>
    alert('Login To Continue Shopping');
    window.location.href='homepage.php';
    </script>";
    // header("location: login.php");
    exit(); // Terminate script to prevent further execution
}

require('connection.php');
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (rest of your HTML code) ... -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- ... (rest of your HTML code) ... -->
    <div class="abc">
        <table class="table table-hover">
            <thead>
                <tr>
                    <!-- ... (rest of your table header) ... -->
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Ordered On</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userid = $_SESSION['username']; // Get the logged-in user's username

                $query = "SELECT * FROM product 
                          JOIN user_orders ON user_orders.Item_Name = product.product_name 
                          JOIN order_manager ON user_orders.Order_Id = order_manager.order_id 
                          JOIN users ON order_manager.email = users.username 
                          WHERE users.username = ?";

                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "s", $userid);
                mysqli_stmt_execute($stmt);
                $user_result = mysqli_stmt_get_result($stmt);

                while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                    // ... (rest of your table row) ...
                    echo "
                    <tr>
                      <td scope='row'><img src='$user_fetch[product_image]' width=80 height=80></td>
                      <td>$user_fetch[product_name]</td>
                      <td>$user_fetch[Price]</td>
                      <td>$user_fetch[Order_at]</td>
                      <td><a href='detail.php?id=$user_fetch[product_name]' class='btn btn-primary'>view detail</a></td>
                      <td><a href='invoice.php?id=$user_fetch[product_name]' class='btn btn-primary'>invoice</a></td>
                      
                      
                    </tr>";
                }
                mysqli_stmt_close($stmt);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
include("footer.php");
?>
