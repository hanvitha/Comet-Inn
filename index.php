<div class="banner1">
<?php include 'menu.php';
require_once('config.php');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/chocolat.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script src="js/validateLogin.js" type="text/javascript"></script>

<div class="banner-info">
	<script src="js/responsiveslides.min.js"></script>
	<script>
							// You can also use "$(window).load(function() {"
							$(function () {
								// Slideshow 4
							$("#slider3").responsiveSlides({
								auto: true,
								pager: false,
								nav: false,
								speed: 500,
								namespace: "callbacks",
								before: function () {
							$('.events').append("<li>before event fired.</li>");
							},
							after: function () {
								$('.events').append("<li>after event fired.</li>");
								}
								});
								});
	</script>
	
</div>
<div class="banner-bottom1">
		<h3 class="tittle"> Member Login</h2>
		<form method="POST" action="index.php">
		<input type="text" id="email" name="email" placeholder="Enter your Email ID"/>
		<br/><br/>
		<input type="password" id="password" name="pwd" placeholder="Password"/>
		<br/><br/>
		<div><a href="forgotpassword.php">Forgot Password</a></div>
		<div><a href="register.php">New user? Register here!</a></div>
		<br/><br/>
		<div class="search">
					<input type="submit" id="submit" name="login" value="  Login  ">
		</div>
		</form>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<!-- //banner -->
<!-- banner-pos -->

<div class="footer">
	<div class="container">				 	
		<div class="col-md-3 ftr_navi ftr">
			<h3>NAVIGATION</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="typography.php">Services</a></li>						
				<li><a href="booking.php">Booking</a></li>
				<li><a href="contact.php">Contact</a></li>
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
<div class="copy-right">
<div class="container">
	<p> &copy;2017 Comet Inn. All Rights Reserved | Design by  PHP</p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".banner-page-head").removeClass("imagebg");
	$(".banner1").addClass("banner");
$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>

<?php

if(isset($_POST['login']))
{	
	Login();
}
function Login()
{

$con=mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}
    $email=$_POST["email"];
	$password=$_POST["pwd"];
	$hashedpwd=md5($password);
    $query = "SELECT * FROM `user` WHERE email_id = '$email'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0 && $row['password'] == $hashedpwd && $row['email_id']==$email)
    {
        $_SESSION["sess_userid"]=$row['user_id'];
        $_SESSION["sess_name"]=$row['name'];
        mysqli_close($con);
		session_write_close();
		echo '<script type="text/javascript">location.href = "home.php";</script>';
    }
    else
    {
         echo "<script type='text/javascript'>alert('Invalid credentials entered. Please try again !');</script>";
         mysqli_close($con);
         
    }
    
}
?>