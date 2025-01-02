<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">

<!-- Modal -->

<!-- delete user -->


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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM contact_info";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $row)
                      {
                        ?>
                        <tr>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['email'] ?>
                            </td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <!-- <td>
                            <button type="button" value="" class="btn btn-primary btn-sm replybtn">reply</button>
                            </td> -->
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
<div class="modal fade" id="ReplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reply to User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea id="replyMessage" class="form-control" rows="4" placeholder="Compose your reply..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendReply">Send Reply</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Reply Button Click
            $('.replybtn').click(function (e) {
                e.preventDefault();
                var email = $(this).closest('tr').find('td:eq(1)').text(); // Extract email
                $('#replyMessage').val(''); // Clear the message input
                $('#ReplyModal').modal('show');

                // Send Reply Button Click
                $('#sendReply').click(function () {
                    var replyMessage = $('#replyMessage').val();
                    if (replyMessage.trim() !== '') {
                        $.ajax({
                            type: "POST",
                            url: "send_reply.php", // Create a PHP file to handle sending emails
                            data: { email: email, message: replyMessage },
                            success: function (response) {
                                if (response === 'success') {
                                    $('#ReplyModal').modal('hide');
                                    alert('Reply sent successfully!');
                                } else {
                                    alert('Failed to send the reply. Please try again.');
                                }
                            }
                        });
                    } else {
                        alert('Please enter a message to send.');
                    }
                });
            });
        });
    </script>



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