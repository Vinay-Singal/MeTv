<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepagecss.css">
    <title>MeTV - Home</title>
    <style>
   
    </style>
</head>
<body>
       
    <main>
        <div class="slider-container">
            <div class="slider">
                <div class="slide">
                
                    <img src="offer1m.png" alt="Slide 1">
                </div>
                <div class="slide">
                    <img src="offer2m.png" alt="Slide 2">
                </div>
                <div class="slide">
                    <img src="offer3m.png" alt="Slide 3">
                </div>
            </div>
        </div>
       
        <!-- <center> <h1 class="a"><b>FIND THE BEST</b> BATTERY FOR YOU</h1></center>
            <h3 style="padding: 10px 40px; color: gray; text-align: center;">"Welcome to VoltCare – Your Power Solution Partner. Discover top-quality  batteries and reliable power backup solutions for homes and businesses. We bring you peace of mind through uninterrupted power supply."</h2><br> -->

        <div>
        <center> <h1><u>Explore Brands</u></h1></center>
    <table cellpadding="53"><tr>
        <th><a href="lg.php"><img src="lg logo.png"></a></th>
        <th><a href="samsung.php"><img src="SAMSUNG LOGO1.PNG" width="150" height="80"></a></th>
        <th><a href="1+.php"><img src="1+logo.png"></a></th>
        <th><a href="sony.php"><img src="sony logo.png"></a></th>
        
        <th><h1><a href="view all product.php">View all</a></h1></th>
    </tr>
    </table></div>

    <div>
        <center> <h1><u>Branded QLED TV</u></h1></center>
    <table cellpadding="10"><tr>
        <th><a href="lg.php"><img src="lg OLED.png"></a></th>
        <th><a href="samsung.php"><img src="sumsung oled11.png"></a></th>
        <th><a href="mi.php"><img src="MI OLED1.png"></a></th>
        <th><a href="sony.php"><img src="sony OLED.png"></a></th>
        
    </tr>
    </table></div>
    </main>
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