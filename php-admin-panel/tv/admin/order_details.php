<?php
include('authentication.php');
include('config/dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body{
            margin:0;   
        }
       div.header{
        font-family: poppins;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 60px;
        background-color: #204969;
       }
       div.header button{
        background-color: #f0f0f0;
        font-size: 16px;
        font-weight: 550;
        padding: 8px 12px;
        border: 2px solid black;
        border-radius: 5px;
       }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      
     
      
          </style>
</head>
<body>
    <div class="header">
    <h1>WELCOME TO ADMIN PANEL - </h1>
    <form method="POST">
    <button name="Logout">LOG OUT</button>
    </form>
    </div>

   <br><br>
   <div class="container">
  <div class="row">
    <div class="col-lg-4 mt-5 text-white border bg-dark rounded p-4 ">
    <form action="product.php" method="POST">
    <center><select class="form-group mt-5" name="pcategory">
  <option name="pcategory">luminous</option>
  <option name="pcategory">exide</option>
  <option name="pcategory">amaron</option>
  <option name="pcategory">sf sonic</option>
  <option name="pcategory">okaya</option>
  <option name="pcategory">mtekpower</option>
  <option name="pcategory">tata</option>
  <option name="pcategory">livfast</option>
  <option name="pcategory">livguard</option>
  <option name="pcategory">featured</option>
</select></center>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name</label>
    <input type="text" class="form-control" name="pname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="Number" class="form-control" name="pprice" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter battery type</label>
    <input type="text" class="form-control" name="ptype">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">enter warrenty</label>
    <input type="" class="form-control" name="pwarrenty">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter capacity</label>
    <input type="" class="form-control" name="pcapacity">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product description</label>
    <input type="text" class="form-control" name="pdescription">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Weight</label>
    <input type="Number" class="form-control" name="pweight">
    
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Select Image</label>
    <input type="file" class="form-control-file" name="pimage">
  </div>
  
  <center><button type="submit" class="btn btn-primary" name="AddProduct">Add Product</button></center>
</form></div>
    

    
    <div class="col-lg-4 mt-5 text-white border bg-dark rounded p-4 ">
    <form action="removed.php" method="POST">
    <center><select class="form-group mt-5" name="pcategory">
  <option name="pcategory">Indian</option>
  <option name="pcategory">Chinese</option>
  <option name="pcategory">Italian</option>
  <option name="pcategory">Beverages</option>
</select></center>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name You Want to Remove</label>
    <input type="text" class="form-control" name="pname">
  </div><br>
  <center><button type="submit" class="btn btn-primary" name="RemoveProduct">Remove Product</button></center>
</form></div>
      



    <div class="col-lg-4 mt-5 text-white border bg-dark rounded p-4 ">
    <form action="edited.php" method="POST">
    <center><select class="form-group mt-5" name="pcategory">
  <option name="pcategory">Indian</option>
  <option name="pcategory">Chinese</option>
  <option name="pcategory">Italian</option>
  <option name="pcategory">Beverages</option>
</select></center>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name You Want to Change</label>
    <input type="text" class="form-control" name="pedit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">New Product Name</label>
    <input type="text" class="form-control" name="pname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Price</label>
    <input type="Number" class="form-control" name="pprice" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">New Image</label>
    <input type="file" class="form-control-file" name="pimage">
  </div>
  
  <center><button type="submit" class="btn btn-primary" name="EditProduct">Edit Product</button></center>
</form></div>
      </div>
</div>
<hr>

    




    <center><h1>Order's Details</h1></center>
    <div class="class container mt-5">
            <div class="row">
                <div class="col-lg-12">
                <table class="table text-center table-dark">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>  
      <th scope="col">Pay Mode</th>
      <th scope="col">Orders</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $query="SELECT * FROM `order_manager`";
    $user_result=mysqli_query($con,$query);
    while($user_fetch=mysqli_fetch_assoc($user_result))
    {
        echo"
        <tr>
      <td >$user_fetch[order_id]</td>
      <td>$user_fetch[Full_Name]</td>
      <td>$user_fetch[Phone_No]</td>
      <td>$user_fetch[Address]</td>
      <td>$user_fetch[Pay_Mode]</td>
      <td>

      <table class='table text-center table-dark'>
  <thead>
    <tr>
      <th scope='col'>Item</th>
      <th scope='col'>Price</th>
      <th scope='col'>Quantity</th>
    </tr>
  </thead>
  <tbody>
  ";

  $order_query="SELECT * FROM `user_orders` WHERE `Order_Id`='$user_fetch[order_id]'";
  $order_result=mysqli_query($con,$order_query);
  while($order_fetch=mysqli_fetch_assoc($order_result))
  {
    echo"
    <tr>
    
    <td scope='col'>$order_fetch[Item_Name]</td>
    <td scope='col'>$order_fetch[Price]</td>
    <td scope='col'>$order_fetch[Quantity]</td>
    </tr>
    ";
  }
  echo"
  </tbody>
  </table>
      
      </td>
    </tr>
        ";
    }
    ?>
    
    
  </tbody>
</table>
                </div>
            </div>
        </div>

        

    <?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location:http://localhost/project/welcome.php#");
    }
    ?>
</body>
</html>