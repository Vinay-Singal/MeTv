<?php include("header.php");
require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepagecss.css">
    <title>HAIER</title>

    <style>
         header {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .logo h1 {
            display: inline;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav a {
            text-decoration: none;
            color: #fff;
        }
        .buttons {
            display: flex;
            align-items: center;
        }
        .buttons button {
            background-color: #fff;
            color: #333;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
        }
        /* Add your custom CSS styles here */
        .product-card {
            border: 1px solid #bbb;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            width: 300px;
            margin: 20px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .product-model,
        .product-price {
            font-size: 1rem;
            color: #777;
        }

        .product-price {
            font-weight: bold;
            margin: 10px 0;
        }

        .buy-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #0056b3;
        }
        
    </style>
    

</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                
                <img src="haier slider4.png" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="haier slider3.png" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="haier slider2.png" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="haier slider1.png" alt="Slide 4">
            </div>
        </div>
    </div>
    <h1 style="text-align: center; background-color: rgb(0, 92, 170); color: #FFFF;">
    <center><img src="haier logo1.png" width="320" height="80" alt="HAIER" style="vertical-align: middle;"></h1><center>
    <div class="container">
        <div class="row">

    <?php
    $query = "SELECT * FROM `product` WHERE `category`='HAIER'";
    $user_result = mysqli_query($con, $query);
    while ($user_fetch = mysqli_fetch_assoc($user_result)) {
        echo "
        <div class='col-md-4'>
  <form action='detail.php' method='POST'>
  <div class='product-card'>
  <img src='$user_fetch[product_image]' alt='Product Image'>
  <h2 class='product-name'>$user_fetch[product_name]</h2>
  <p class='product-model'>Product Model:$user_fetch[product_model]</p>
  <p class='product-price'>₹$user_fetch[product_price]</p>
  <a href='detail.php?id=$user_fetch[product_name]' class='btn btn-primary'>view detail</a>

  

</div>
</form>

</div>
";
    }



    ?>
    </div>
    </div><br>
    <script>
        // JavaScript code for the image slider
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        let slideIndex = 0;

        function showSlide() {
            slideIndex = (slideIndex + 1) % slides.length;
            const translateX = -slideIndex * 33.33; // Adjust the percentage based on the number of slides
            slider.style.transform = `translateX(${translateX}%)`;
        }

        setInterval(showSlide, 3000); // Change slide every 3 seconds (adjust timing as needed)
    </script>

</body>

</html>

<?php
include("footer.php");
?>
