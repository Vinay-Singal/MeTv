<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Modal -->
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


<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>
          Are you sure?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="deleteproductbtn" class="btn btn-primary">Yes, Delete</button>
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
                                    <th>Category</th>
                                    <th>Product name</th>
                                    <th>Product price</th>
                                    <th>product image</th>
                                    <th>product model</th>
                                    
                                    <th>resolution</th>
                                    <th>warranty</th>
                                    <th>Display_type</th>
                                    <th>audio output</th>
                                    <th>hdmi input</th>
                                    <th>powersuplly</th>
                                    <th>manufactured_by</th>
                                    <th>imported_by</th>
                                    <th></th>
                                </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM product";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $row)
                      {
                        ?>
                        <tr>
                          <td><?php echo $row['category'] ?></td>
                          <td><?php echo $row['product_name'] ?>
                            </td>
                            <td><?php echo $row['product_price'] ?></td>
                            <td><img src="../../../<?php echo $row['product_image'] ?>" width=80 height=80></td>

                            <td><?php echo $row['product_model'] ?></td>
                          <td><?php echo $row['Resolution'] ?>
                            </td>
                            <td><?php echo $row['Warranty'] ?></td>
                            <td><?php echo $row['Display_Type'] ?></td>
                            <td><?php echo $row['Audio_output'] ?></td>
                            <td><?php echo $row['HDMI_Input'] ?>
                            </td>
                            <td><?php echo $row['Power_Supply'] ?></td>
                            <td><?php echo $row['Manufactured_By'] ?></td>
                            <td><?php echo $row['Imported_By'] ?></td>
                            
                            <td><a href="product_edit.php?id=<?php echo $row['id'] ?></td>" class="btn btn-info btn-sm">Edit</a>
                            <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
                            </td>
                        </tr>
                        <?php
                      }
                    }
                    else
                    {  
                    
                    ?>
                    <tr>
                      <td>no record found</td>
                    </tr>
                    <?php
                    }
                    ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function()
{
  $('.deletebtn').click(function(e)
  {
    e.preventDefault();
    var user_id=$(this).val();
    $('.delete_user_id').val(user_id);
    $('#DeleteModal').modal('show');
  });
});
</script>
<script>
$(document).ready(function () {
  $('#example1').DataTable({
    "paging": true,         // Enable pagination
    "lengthMenu": [10, 25, 50, 100],  // Define the number of rows per page
    "pageLength": 10        // Set the default number of rows per page to 10
  });

  $('.deletebtn').click(function (e) {
    e.preventDefault();
    var user_id = $(this).val();
    $('.delete_user_id').val(user_id);
    $('#DeleteModal').modal('show');
  });
});
</script>

<?php include('includes/script.php');?>