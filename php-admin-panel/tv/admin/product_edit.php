<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
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
              <li class="breadcrumb-item active">Edit Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Registered Users</h3>
                        <a href="products.php" class="btn btn-danger btn-sm float-right">BACK</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                            <form action="code.php" method="POST">
      <div class="modal-body">
        <?php
        if(isset($_GET['id']))
        {
        $user_id = $_GET['id'];
        $query = "SELECT * FROM `product` WHERE id='$user_id' LIMIT 1";
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <div class="form-group">
        
        <label for="">Enter Product Category</label>
        <input type="text" class="form-control" value="<?php echo $row['category'] ?>" name="pcategory">
        
      </div>
      <div class="form-group">
    <label for="exampleInputEmail1">Enter Product Name</label>
    <input type="text" class="form-control" value="<?php echo $row['product_name']?>" name="pname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Model</label>
    <input type="text" class="form-control" value="<?php echo $row['product_model']?>" name="pmodel">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="Number" class="form-control" value="<?php echo $row['product_price']?>" name="pprice" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Warranty</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Warranty']?>" name="pwarranty">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Resolution</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Resolution']?>" name="presolution">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Display Type</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Display_Type']?>" name="pdisplaytype">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">	Audio output</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Audio_output']?>" name="paudioutput">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">HDMI Input</label>
    <input type="text" class="form-control-file" value="<?php echo $row['HDMI_Input']?>" name="phdmi">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Power Supply</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Power_Supply']?>" name="ppower">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">	Manufactured By</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Manufactured_By']?>" name="pmanufactured">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">	Imported_By</label>
    <input type="text" class="form-control-file" value="<?php echo $row['Imported_By']?>" name="pimported">
  </div>
  <div class="form-group">
    <label for="">Select Image</label>
    <input type="file" class="form-control-file" name="pimage" value="<?php echo $row['product_image']  ?>">
  </div>

                <?php
            }
        }
        else{
            echo"<h4>no record found</h4>";
        }
        }
        ?>
        
      </div>
      <div class="modal-footer">
        
        <button type="submit" name="updateproduct" class="btn btn-info">Update</button>
      </div>
</form>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<?php
include('includes/footer.php');
?>