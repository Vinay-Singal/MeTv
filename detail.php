<?php
include("header.php");
require("connection.php");
$id = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

?>

<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .product {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            transition: transform 0.2s ease;
        }

        .product-image img:hover {
            transform: scale(1.1);
            cursor: pointer;
        }

        .product-info {
            flex: 2;
            padding: 20px;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
        }

        .product-details {
            margin-top: 10px;
        }

        .product-price {
            font-size: 20px;
            margin-top: 10px;
        }

        .similar-products {
            margin-top: 30px;
            text-align: center;
        }

        .similar-product {
            display: inline-block;
            width: 30%;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
    </style>
</head>

<body>
    <div class="container">

        <?php
        $query = "SELECT * FROM `product` WHERE `product_name`='$id'";
        $user_result = mysqli_query($con, $query);
        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
            echo "<div class='product'>
                <div class='product-image'>
                    <img src='$user_fetch[product_image]' alt='$user_fetch[product_name]'>
                </div>
                <div class='product-info'>
                    <div class='product-title'>$user_fetch[product_name]</div>
                    <div class='product-details'>
                        <p><strong>Category:</strong> $user_fetch[category]</p>
                        <p><strong>Product Model:</strong> $user_fetch[product_model]</p>
                        <p><strong>Resolution:</strong> $user_fetch[Resolution]</p>
                        <p><strong>Warranty:</strong> $user_fetch[Warranty]</p>
                    </div>
                    <div class='product-price'>
                        <span>Price: ₹<span id='price-display'>$user_fetch[product_price]</span></span>
                    </div>
                    <form action='manage_cart.php' method='POST'>
                        <div class='form-group'>
                            <label for='size'>Select Size:</label>
                            <select id='size' name='size'>
                                <option value='83inch'>83 inch</option>
                                <option value='75inch'>75 inch</option>
                                <option value='55inch'>55 inch</option>
                            </select>
                        </div>
                        <button type='submit' name='add_to_cart' class='btn btn-info' style='background-color: #007BFF; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;'>Add to Cart</button>
                        <input type='hidden' name='Item_Name' value='$user_fetch[product_name]'>
                        <input type='hidden' name='Price' id='price' value='$user_fetch[product_price]'>
                    </form>
                </div>
            </div>
            <hr>
            <ul>
                <li>100% new & Genuine Product</li>
                <li>Display_Type: $user_fetch[Display_Type]</li>
                <li>Audio_output: $user_fetch[Audio_output]</li>
                <li>HDMI_Input: $user_fetch[HDMI_Input]</li>
                <li>Power_Supply: $user_fetch[Power_Supply]</li>
                <li>Manufactured_By: $user_fetch[Manufactured_By]</li>
                <li>Imported_By: $user_fetch[Imported_By]</li>
            </ul>";
        }
        ?>
    </div>
    <div class="similar-products">
          <center>
            <h1><b>SIMILAR PRODUCTS</b></h1>
        </center>
    </div>
    <div class="container" style="overflow-x: auto; display: flex;">
        <?php
        $query = "SELECT * FROM `product` ORDER BY RAND() LIMIT 6";
        $user_result = mysqli_query($con, $query);
        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
            echo "
            <div class='col-lg-4 mt-5 '>
            <div class='div1'>
            <form action='manage_cart.php' method='POST'>
            <div id='ab' class='card'>
            <img src='$user_fetch[product_image]' class='card-img-top'>
            <div class='card-body text-center'>
            <h1 class='card-title'>$user_fetch[product_name]</h1>
            <h3><p class='card-text'>$user_fetch[product_price]</p></h3>
            <a href='detail.php?id=$user_fetch[product_name]' class='btn btn-primary'>view detail</a>
            </div>
            </div>
            </form>
            </div>
            </div>
            ";
        }
        ?>
    </div>
</body>

</html>
<br><br>
<?php
include("footer.php");
?>
<script>
    // JavaScript code to update the price based on the selected size
    document.getElementById("size").addEventListener("change", function () {
        var size = this.value;
        var priceDisplay = document.getElementById("price-display");
        var priceInput = document.getElementById("price");

        // Define the price for each size
        <?php
        $query = "SELECT * FROM `product` WHERE `product_name`='$id'";
        $user_result = mysqli_query($con, $query);
        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
            echo "var basePrice = $user_fetch[product_price];
                  var price55 = basePrice - (basePrice * 0.20);
                  var price75 = basePrice - (basePrice * 0.10);
                  var price83 = basePrice;";
        }
        ?>

        var prices = {
            '55inch': price55,
            '75inch': price75,
            '83inch': price83,
        };

        // Update the price display and hidden input
        priceDisplay.textContent = "" + prices[size] + "";
        priceInput.value = prices[size];
    });
</script>

