<div class="banner1">
<?php include 'menu.php';
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/chocolat.css" rel="stylesheet">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/register.js" type="text/javascript"></script>
<script src="js/passwordstrengthcheck.js"></script>

<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
</head>
<body>
<!-- banner -->
		<div class="banner-bottom1">
				<h3 class="tittle"> Register </h2>
                
	<form method="POST" action="register.php" name="register" class="register" id="register">
    <br/>
	<div>
    <input type="email" name="email" id="email" placeholder="Email*" /></div>
    <br/>
	<div>
    <input type="password" name="password" id="password" placeholder="Password*" /></div>
    <span id="result"></span>
    <br/>
	<div>
	<input type="text" name="fname" id="fname" placeholder="Full Name*" /></div>
    <br/>
    <div>
	<input type="number" name="phone" id="phone" placeholder="Phone Number" /></div><br><br>
    <br/>
    <div class="search"><input type="submit" name="register" id="submit" value="Register" /></div>
	</form>

				<div class="clearfix"></div>
		</div>
	</div>
<!-- //banner -->


<!--footer-->
	<div class="footer">
		<div class="container">				 	
			<div class="col-md-3 ftr_navi ftr">
				<h3>NAVIGATION</h3>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="typography.html">Services</a></li>						
					<li><a href="booking.html">Booking</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
					 <h3>FACILITIES</h3>
					 <ul>
						 <li><a href="#">Double bedrooms</a></li>
						 <li><a href="#">Single bedrooms</a></li>
						 <li><a href="#">Royal facilities</a></li>						
						 <li><a href="#">Connected rooms</a></li>
					 </ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
				<h3>GET IN TOUCH</h3>
				<ul>
					<li>Ola-ola street jump,</li>
					<li>260-14 City, Country</li>
					<li>+62 000-0000-00</li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Classic Hotel</a>
				<ul>
					<li><a href="#" class="f1"> </a></li>
					<li><a href="#" class="f2"> </a></li>
					<li><a href="#" class="f3"> </a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--footer-->
<!-- copy -->
<div class="copy-right">
	<div class="container">
			<div> &copy; 2015 Classic Hotel. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></div>
	</div>
</div>
<!-- //copy -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/							
		$(".banner-page-head").removeClass("imagebg");
		$(".banner1").addClass("banner");	
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
</body>
</html>

	<?php
	
	if(isset($_POST['register']))
	{	
		Signup();
	}
	function Signup()
	{
          
    $con=mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
	     
	$password = $_POST["password"];
	$full_name = $_POST["fname"];
	$email = $_POST["email"];
    $phone = $_POST["phone"];

    $check =  "SELECT email_id FROM `user` WHERE email_id = '$email'";
    $result = mysqli_query($con,$check);
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0 && $row['email_id']==$email)
    {
        unset($_POST);
        echo "<script type='text/javascript'>alert('Email already exists!');</script>"; 
    }
    else
    {
        if($password!='' || $full_name!='' || $email!='' || $phone!='')
        {
            $query = "INSERT INTO `user` (user_id, name, email_id, password, phone, status) 
                        VALUES (null, '$full_name', '$email', '$password', '$phone', 1)";
            unset($_POST);            
                        
            if ($con->query($query) === TRUE)
            {
                echo "<script type='text/javascript'>alert('Successfully registered with Comet Inn!');</script>"; 
                mysqli_close($con);
                
                header("Location: index.php");
            }
            else
            {
                echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again !');</script>";
                mysqli_close($con);
                unset($_POST);
                        
            }
        }   
        else
        {
            unset($_POST);            
            echo "<script type='text/javascript'>alert('One or more fields are empty. Please complete the form.');</script>";            
        }

    }

	}
	?>