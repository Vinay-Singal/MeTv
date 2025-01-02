<?php
session_start();
include('includes/header.php');
if(isset($_SESSION['auth']))
{
    $_SESSION['status']="You are already Logged In";
    header("Location: index.php");
    exit(0);
}
?>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">

                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h5>Admin Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="user_name" class="form-control" placeholder="user_name">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      <div class="form-group">
        <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
      </div>
      <a href="../../../homepage.php"><center>Back To Home</center></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

