<?php
require("connection.php");
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location:admin login.php");
}
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
    <h1>WELCOME TO ADMIN PANEL - <?php echo $_SESSION['AdminLoginId']?></h1>
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
  <option name="pcategory">LG</option>
  <option name="pcategory">SAMSUNG</option>
  <option name="pcategory">1+ ONEPLUS</option>
  <option name="pcategory">MI</option>
  <option name="pcategory">HITACHI</option>
  <option name="pcategory">VU</option>
  <option name="pcategory">HAIER</option>
  <option name="pcategory">REALME</option>
  <option name="pcategory">SONY</option>
  <option name="pcategory">BPL</option>
  <option name="pcategory">PANASONIC</option>
  <option name="pcategory">PHILIPS</option>
  
</select></center>

<div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name</label>
    <input type="text" class="form-control" name="pname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Model</label>
    <input type="text" class="form-control" name="pmodel">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="Number" class="form-control" name="pprice" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Warranty</label>
    <input type="text" class="form-control-file" name="pwarranty">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Resolution</label>
    <input type="text" class="form-control-file" name="presolution">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Display Type</label>
    <input type="text" class="form-control-file" name="pdisplaytype">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">	Audio output</label>
    <input type="text" class="form-control-file" name="paudioutput">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">HDMI Input</label>
    <input type="text" class="form-control-file" name="phdmi">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Power Supply</label>
    <input type="text" class="form-control-file" name="ppower">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">	Manufactured By</label>
    <input type="text" class="form-control-file" name="pmanufactured">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">	Imported_By</label>
    <input type="text" class="form-control-file" name="pimported">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Select Image</label>
    <input type="file" class="form-control-file" name="pimage">
  </div>
  
  <center><button type="submit" class="btn btn-primary" name="AddProduct">Add Product</button></center>
</form></div>


<!-- edit product -->

<div class="col-lg-4 mt-5 text-white border bg-dark rounded p-4 ">
    <form action="edited.php" method="POST">
    <center><select class="form-group mt-5" name="pcategory">
    <option name="pcategory">LG</option>
  <option name="pcategory">SAMSUNG</option>
  <option name="pcategory">1+ ONEPLUS</option>
  <option name="pcategory">MI</option>
  <option name="pcategory">HITACHI</option>
  <option name="pcategory">VU</option>
  <option name="pcategory">HAIER</option>
  <option name="pcategory">REALME</option>
  <option name="pcategory">SONY</option>
  <option name="pcategory">BPL</option>
  <option name="pcategory">PANASONIC</option>
  <option name="pcategory">PHILIPS</option>
</select></center>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name You Want to Change</label>
    <input type="text" class="form-control" name="pedit">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">New Product Name</label>
    <input type="text" class="form-control" name="pname">
    
  <div class="form-group">
    <label for="exampleInputEmail1">New Product Model</label>
    <input type="text" class="form-control" name="pmodel">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Price</label>
    <input type="Number" class="form-control" name="pprice" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">New Warranty</label>
    <input type="text" class="form-control-file" name="pwarranty">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New Resolution</label>
    <input type="text" class="form-control-file" name="presolution">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New Display Type</label>
    <input type="text" class="form-control-file" name="pdisplaytype">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">New Audio output</label>
    <input type="text" class="form-control-file" name="paudioutput">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New HDMI Input</label>
    <input type="text" class="form-control-file" name="phdmi">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New Power Supply</label>
    <input type="text" class="form-control-file" name="ppower">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">New Manufactured By</label>
    <input type="text" class="form-control-file" name="pmanufactured">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New Imported_By</label>
    <input type="text" class="form-control-file" name="pimported">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">New Select Image</label>
    <input type="file" class="form-control-file" name="pimage">
  </div>
  <center><button type="submit" class="btn btn-primary" name="EditProduct">Edit Product</button></center>
</form></div>
      </div>
</div>


<?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location:http://localhost/MeTv/homepage.php#");
    }
    ?>
</body>
</html>