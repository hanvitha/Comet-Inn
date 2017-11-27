<?php include 'menu.php';
require_once('config.php');
session_start();
if(!isset($_SESSION["sess_userid"])){
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	echo '<script type="text/javascript">alert("please login");</script>';	
}
if(isset($_GET["roomId"])){
	$db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
	$roomId = $db->quote($_GET["roomId"]);
	$query = $db->prepare("SELECT * FROM room where room_id=$roomId and status=1");
	$query->execute();
	$rooms=$query->fetchAll();
	$query = $db->prepare("SELECT feature_id FROM room_features where room_id=$roomId");
	$query->execute();
	$featuresSelected=$query->fetchAll();
}
?>
<!--single-page-->
<div class="single-page">
	<div class="container">
		<div class="col-md-8 single-gd-lt">
			<div class="single-pg-hdr">
				<h2><span class="glyphicon glyphicon-bed" aria-hidden="true"></span><?php echo $rooms[0]["room_type"] ?></h2>
				<p>Max Occupancy: <?php echo $rooms[0]["max_occupancy"]?></p>
				<span><b>Booking from:</b> <?php echo $_SESSION["check_in"]?>
				<b>Booking to:</b> <?php echo $_SESSION["check_out"]?></span>
				<img src="<?php echo $rooms[0]["image_url"] ?>" alt="" width="70%" height="70%"/>
			</div>
		</div>
		<div class="col-md-4 single-gd-rt">
			<div class="spl-btn">
				<div class="spl-btn-bor">
					<a href="#" data-toggle="tooltip" title="Save up to 50% on this stay">
						<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
																	
					</a>
					<p>Special Offer</p>	
					<script>
						$(document).ready(function(){
						$('[data-toggle="tooltip"]').tooltip();   
						});
					</script>
				</div>
				<div class="sp-bor-btn text-right">
					<h4 name="price"><span>$<?php echo $rooms[0]["price"]+50?></span> $<?php echo $rooms[0]["price"]?></h4>
					<p class="best-pri">Best price</p>
					<form method="post">
						<div class="search">
							<input type="submit" name="booknow" value="Book Now" />
						</div>
					</form>
				</div>
			</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php
	if(isset($_POST["booknow"])){
		$src = $_GET["src"];
		$roomId = $_GET["roomId"];
		if($src === "wishlist"){
			validateInfo($roomId);
		}
	}
	function validateInfo($roomId){
		$userId = $_SESSION["sess_userid"];
		$query = "(select b.room_id from bookings b
		where r.room_id = b.room_id and 
		(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
		('$check_out' >= b.checkin and '$check_out' <= b.checkout ))";
	}
?>
<!--//single-page-->
<!--footer-->
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
<!--footer-->
<!-- copy -->
<div class="copy-right">
<div class="container">
	<p> &copy;2017 Comet Inn. All Rights Reserved | Design by  PHP</p>
</div>
</div>
