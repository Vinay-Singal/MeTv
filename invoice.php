<?php
include("header.php");
require('connection.php');
$id="";
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 40px;
            padding: 20px 20px 20px 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
        }
        .invoice-details {
            margin-top: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .print-btn {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
$query="SELECT * FROM order_manager,user_orders,product,users WHERE user_orders.Order_Id=order_manager.order_id and order_manager.email=users.username and user_orders.Item_Name=product.product_name and `product_name`='$id'";
$user_result=mysqli_query($con,$query);
while($user_fetch=mysqli_fetch_assoc($user_result))
{
  echo"
    <div class='invoice'>
        <div class='invoice-header'>
            <h1>Invoice</h1>
        </div>
        <div class='invoice-details'>
            <p><strong>Name:</strong>$user_fetch[Full_Name] </p>
            <p><strong>Phone Number:</strong>$user_fetch[Phone_No]</p>
            <p><strong>Date:</strong>$user_fetch[Order_at]</p>
        </div>
        <table class='invoice-table'>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$user_fetch[Item_Name]</td>
                    <td>$user_fetch[Quantity]</td>
                    <td>$user_fetch[Price]</td>
                </tr>
                
            </tbody>
        </table>
        <div class='print-btn'>
            <button onclick='printInvoice()'>Print Invoice</button>
        </div>
    </div>
    ";
}
?>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>
</body>
</html>
<?php
include("footer.php");
?>
