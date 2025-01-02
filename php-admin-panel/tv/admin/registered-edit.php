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
              <li class="breadcrumb-item active">Edit Registered Users</li>
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
                        <a href="registered.php" class="btn btn-danger btn-sm float-right">BACK</a>
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
        $query = "SELECT * FROM `users` WHERE id='$user_id' LIMIT 1";
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <div class="form-group">
          <label for="">Email Id</label>
          <input type="text" name="email" value="<?php echo $row['username']  ?>" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" value="<?php echo $row['password']  ?>" class="form-control" placeholder="Password">
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
        
        <button type="submit" name="updateuser" class="btn btn-info">Update</button>
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
include('includes/script.php');
?>
<?php
session_start();
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
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Users</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal"
                           class="btn btn-primary btn-sm float-right">Add Users</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><?php echo $row['created_at'] ?></td>
                                        <td>
                                            <a href="registered-edit.php?id=<?php echo $row['id']; ?>"
                                               class="btn btn-info btn-sm">Edit</a>
                                            <button type="button" data-id="<?php echo $row['id']; ?>"
                                                    class="btn btn-danger btn-sm deletebtn">Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No records found</td>
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

<?php
include('includes/footer.php');
?>