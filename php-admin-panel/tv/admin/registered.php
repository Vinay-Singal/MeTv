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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        
        <div class="form-group">
          <label for="">Email Id</label>
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="adduser" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- delete user -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>
          Are you sure,You want to delte the user?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="deleteuserbtn" class="btn btn-primary">Yes, Delete</button>
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
              <li class="breadcrumb-item active">Registered Users</li>
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
                        <h3 class="card-title">Registered Users</h3>
                        <!-- <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Users</a> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>fullname</th>
                                    <th>email</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>Action</th>
                                </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM users";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $row)
                      {
                        ?>
                        <tr>
                          <td><?php echo $row['fullname'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['username'] ?>
                            </td>
                            <td><?php echo $row['password'] ?></td>
                            
                            <td>
                            <button type="button" value="<?php echo $row['username'] ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
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

<?php include('includes/script.php')?>