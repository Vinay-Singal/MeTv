<!DOCTYPE html>
<html lang="en">

<head>
    <title>Footer Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="Footer.css"> -->
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
*{
	/* margin:0;
	padding:0; */
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}

ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
    color:white;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: white;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

.popup-element {
    font-size: 20px;
    transition: font-size 0.3s;
	font-weight: normal; 

}


.popup-element:hover {
    font-size: 25px;
	font-weight: bold; 
}
</style>

<body style="line-height: 1.5;
	font-family: 'Poppins', sans-serif;">

    <footer class="footer">
        <div class="container" style="max-width: 1170px;
	margin:auto;">
            <div class="row" style="display: flex;
	flex-wrap: wrap;">
                <div class="footer-col">
                    <h3 style="color:white; font-family:rockwell;">visit the MeTV where you will find best television at a very reasonable price.</h3>
                    <img src="logo1.png" width="180" height="100" alt="MeTV">
                    
                </div>
                <div class="footer-col">
                <h4>company</h4>
                    <ul>
                        <li><a href="Homepage.php" class="popup-element">Home</a></li>
                        <li><a href="About.php" class="popup-element">about us</a></li>
                        <li><a href="Contact.php" class="popup-element">Contact Us</a></li>
                        <li><a href="Terms.php" class="popup-element">Terms and conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Category </h4>
                    <ul>
                        <li><a href="lg.php" class="popup-element">L.G</a></li>
                        <li><a href="SAMSUNG.php" class="popup-element">SAMSUNG</a></li>
                        <li><a href="Haier.php" class="popup-element">Haier</a></li>
                        <li><a href="Hisense.php" class="popup-element">Hisense</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/" class="popup-element"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/" class="popup-element"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/" class="popup-element"><i class="fab fa-instagram"></i></a>
                        <a href="https://web.whatsapp.com/" class="popup-element"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
            <hr style="width: 90%;
                border: 0;
                border-bottom: 1px solid #ccc;
                margin: 20px auto;">
                    <p class="copyright" style=" text-align: center; color:white;">copyright @ MeTV All rights reserverd </p>
    </footer>

</body>

</html>