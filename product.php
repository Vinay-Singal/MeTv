<?php
session_start();
$con=mysqli_connect("localhost","root","","metv");

if(mysqli_connect_error()){
    echo"<script>
    alert('cannot connect to database');
     window.location.href='cart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['AddProduct']))
    {
    $query1="INSERT INTO `product`(`category`,`product_name`,`product_model`, `product_price`,`Warranty`, `Resolution`,`Display_Type`,`Audio_output`,`HDMI_Input`,`Power_Supply`,`Manufactured_By`,`Imported_By`, `product_image`) VALUES ('$_POST[pcategory]','$_POST[pname]','$_POST[pmodel]', '$_POST[pprice]', '$_POST[pwarranty]', '$_POST[presolution]', '$_POST[pdisplaytype]', '$_POST[paudioutput]', '$_POST[phdmi]', '$_POST[ppower]', '$_POST[pmanufactured]', '$_POST[pimported]','$_POST[pimage]')";
    if(mysqli_query($con,$query1))
    {
        echo "done";
        header("Location: Admin Panel.php");

    }
    else
    {
        echo"<script>
        alert('SQL Error');
        window.location.href='cart.php';
        </script>";
    }

    }
}
