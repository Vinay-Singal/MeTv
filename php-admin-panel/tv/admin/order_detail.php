<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Modals -->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
      <div class="form-group">
        
        <label for="">Enter Product Category</label>
        <input type="text" class="form-control" name="pcategory">
        
      </div>
      <div class="form-group">
        
    <label for="">Enter Product Name</label>
    <input type="text" class="form-control" name="pname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="Number" class="form-control" name="pprice" >
  </div>
  <div class="form-group">
    <label for="">Enter battery type</label>
    <input type="text" class="form-control" name="ptype">
    
  </div>
  <div class="form-group">
    <label for="">enter warrenty</label>
    <input type="" class="form-control" name="pwarrenty">
    
  </div>
  <div class="form-group">
    <label for="">Enter capacity</label>
    <input type="" class="form-control" name="pcapacity">
    
  </div>
  <div class="form-group">
    <label for="">Enter Product description</label>
    <input type="text" class="form-control" name="pdescription">
    
  </div>
  <div class="form-group">
    <label for="">Enter Product Weight</label>
    <input type="Number" class="form-control" name="pweight">
    
  </div>

  <div class="form-group">
    <label for="">Select Image</label>
    <input type="file" class="form-control-file" name="pimage">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addproduct" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
              if(isset($_SESSION['status']))
              {
                echo"<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
              }
              ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Products</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
      <th>Order Id</th>
      <th>Customer Name</th>
      <th>username</th>
      <th>Phone No</th>
      <th>Address</th>  
      <th>Pay Mode</th>
      <th>Orders</th>
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
                      <td>$user_fetch[email]</td>
                      <td>$user_fetch[Phone_No]</td>
                      <td>$user_fetch[Address]</td>
                      <td>$user_fetch[Pay_Mode]</td>
                      <td>
                
                      <table class='table text-center '>
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Price</th>
                      <th>Quantity</th>
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
                    
                    <td>$order_fetch[Item_Name]</td>
                    <td>$order_fetch[Price]</td>
                    <td>$order_fetch[Quantity]</td>
                    </tr>
                    ";
                  }
                  echo"
                  </tbody>
                  </table>
                      
                      </td>
                    </tr>
                        ";
                    }?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



</div>

<?php
include('includes/footer.php');
?>
