<?php
session_start();
$con=mysqli_connect("localhost","root","","MeTv");

if(mysqli_connect_error()){
    echo"<script>
    alert('cannot connect to database');
     window.location.href='cart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['EditProduct']))
    {
    $query1="UPDATE `product` SET `product_name`='$_POST[pname]',`product_price`='$_POST[pprice]',`Warranty`='$_POST[pwarranty]',`Resolution`='$_POST[presolution]',`Display_Type`='$_POST[pdisplaytype]',`Audio_output`='$_POST[paudioutput]',`HDMI_Input`='$_POST[phdmi]',`Power_Supply`='$_POST[ppower]',`Manufactured_By`='$_POST[pmanufactured]',`Imported_By`='$_POST[pimported]',`product_image`='$_POST[pimage]' WHERE `Category`='$_POST[pcategory]' AND `product_name`='$_POST[product_name]'";
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
