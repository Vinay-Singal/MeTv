<?php
require("Connection.php");
?>
<html>
<head>
<title>Admin Login</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Admin Name" name="AdminName">
        </div>
        <div class="input-field">
            <i class="bi bi-shield-lock"></i>
            <input type="password" placeholder="Password" name="AdminPassword">
        </div>

        <button type="submit" name="SignIn">Sign In</button>

        <div class="extra">
            <a href="http://localhost/MeTv/homepage.php#">Back To Home</a>
            
        </div>


    </form>
</div>

<?php
if(isset($_POST['SignIn']))
{
    $query="SELECT * FROM `admin login` WHERE `user_name`='$_POST[AdminName]' AND `password`='$_POST[AdminPassword]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminName'];
        header("location: Admin Panel.php");
    }
    else{
        echo"<script>
        alert('Invalid Details');
        </script>";;
    }
}
?>

</body>
</html>
