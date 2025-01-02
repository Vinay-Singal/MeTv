<?php
include('authentication.php');
include('config/dbcon.php');

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    echo"<script>
  alert('Logged Out Successfully');
  window.location.href='login.php';
  </script>";
    exit(0);
}
// Add User
if(isset($_POST['adduser']))
{
   
    $email=$_POST['email'];
    $password=$_POST['password'];

    $user_query="INSERT INTO users(username,password) VALUES('$email','$password')";
    $user_query_run=mysqli_query($con,$user_query);

    if($user_query_run)
    {
        $_SESSION['status']="user added successfully";
        header("Location: registered.php");
    }
    else
    {
        
        $_SESSION['status']="user registeration failed";
        header("Location: registered.php");
    }
}

// Update User
if(isset($_POST['updateuser']))
{
    $user_id=$_POST['id'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="UPDATE users SET username='$email',password='$password' WHERE id='$user_id'";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['status']="user updated successfully";
        header("Location: registered.php");
    }
    else
    {
        
        $_SESSION['status']="user updation failed";
        header("Location: registered.php");
    }
}

//Add Product
if(isset($_POST['addproduct']))
{
   
    // $category=$_POST['pcategory'];
    // $name=$_POST['pname'];

    $user_query="INSERT INTO `product`(`category`,`product_name`,`product_model`, `product_price`,`Warranty`, `Resolution`,`Display_Type`,`Audio_output`,`HDMI_Input`,`Power_Supply`,`Manufactured_By`,`Imported_By`, `product_image`) VALUES ('$_POST[pcategory]','$_POST[pname]','$_POST[pmodel]', '$_POST[pprice]', '$_POST[pwarranty]', '$_POST[presolution]', '$_POST[pdisplaytype]', '$_POST[paudioutput]', '$_POST[phdmi]', '$_POST[ppower]', '$_POST[pmanufactured]', '$_POST[pimported]','$_POST[pimage]')";
    $user_query_run=mysqli_query($con,$user_query);

    if($user_query_run)
    {
        $_SESSION['status']="product added successfully";
        header("Location: products.php");
    }
    else
    {
        
        $_SESSION['status']="product registeration failed";
        header("Location: products.php");
    }
}

//Update Product
if(isset($_POST['updateproduct']))
{
    $id=$_POST['id'];
    $category=$_POST['pcategory'];
    $product_name=$_POST['pname'];
    $product_price=$_POST['pprice'];
    $product_image=$_POST['pimage'];
    $battery_type=$_POST['ptype'];
    $warrenty=$_POST['pwarrenty'];
    $capacity=$_POST['pcapacity'];
    $description=$_POST['pdescription'];
    $weight=$_POST['pweight'];

    $query="UPDATE `product` SET `product_name`='$_POST[pname]',`product_price`='$_POST[pprice]',`Warranty`='$_POST[pwarranty]',`Resolution`='$_POST[presolution]',`Display_Type`='$_POST[pdisplaytype]',`Audio_output`='$_POST[paudioutput]',`HDMI_Input`='$_POST[phdmi]',`Power_Supply`='$_POST[ppower]',`Manufactured_By`='$_POST[pmanufactured]',`Imported_By`='$_POST[pimported]',`product_image`='$_POST[pimage]'  WHERE id='$id'";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['status']="product updated successfully";
        header("Location: products.php");
    }
    else
    {
        
        $_SESSION['status']="product updation failed";
        header("Location: products.php");
    }
}

//Delete User
if(isset($_POST['deleteuserbtn']))
{
    $user_id=$_POST['delete_id'];
    $query="DELETE FROM users WHERE username='$user_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['status']="user deleted successfully";
        header("Location: registered.php");
    }
    else
    {
        
        $_SESSION['status']="user deletion failed";
        header("Location: registered.php");
    }
}

//Delete Product
if(isset($_POST['deleteproductbtn']))
{
    $user_id=$_POST['delete_id'];
    $query="DELETE FROM product WHERE id='$user_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['status']="product deleted successfully";
        header("Location: products.php");
    }
    else
    {
        
        $_SESSION['status']="product deletion failed";
        header("Location: products.php");
    }
}

?>