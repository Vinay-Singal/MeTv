<?php
session_start();
include('config/dbcon.php');
if(isset($_POST['login_btn']))
{
    $email=$_POST['user_name'];
    $password=$_POST['password'];
    $log_query="SELECT * FROM `admin login` where user_name='$email' AND password='$password'";
    $log_query_run=mysqli_query($con,$log_query);
    if(mysqli_num_rows($log_query_run) >0)
    {
        foreach($log_query_run as $row)
        {
            $user_name=$row['user_name'];
            $user_password=$row['password'];
        }
        $_SESSION['auth']=true;
        $_SESSION['auth_user']=[
            'user_name'=>$user_name,
            'password'=>$user_password
        ];
        echo"<script>
        alert('Logged In Successfully');
        window.location.href='index.php';
        </script>";
    }
    else
    {
        echo"<script>
  alert('Invalid Details');
  window.location.href='login.php';
  </script>";
    }
}
else
{
    echo"<script>
  alert('Acess Denied');
  window.location.href='login.php';
  </script>";
}
?>