<?php include 'menu.php';
require_once('config.php');
session_start();
if(!isset($_SESSION["sess_userid"])){
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	echo '<script type="text/javascript">alert("please login");</script>';	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Comet Inn a Hotel Category Flat Bootstrap Responsive Website Template | Search :: PHP</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Comet Inn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
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
<!--search-->
<div class="search-page">
	<div class="container">	
		<div class="search-grids">
			<div class="col-md-3 search-grid-left">
				
				<div class="search-hotel">
					<h3 class="sear-head">Name contains</h3>
					<form method="POST">
						<input type="text" name="filter_text" value="Hotel name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Hotel name...';}" required="">
						<input type="submit" name="name_filter" value=" ">
					</form>
				</div>
				<div class="menu-grid">
				<ul class="menu_drop">
					<li class="item1"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Features</a>
						<ul>
							<li class="subitem1"><a href="search.php?page=1&feature=1">Roll-in shower </a></li>
							<li class="subitem2"><a href="search.php?page=1&feature=2">Comfortable bathroom</a></li>
							<li class="subitem3"><a href="search.php?page=1&feature=3">WI-FI facility</a></li>
						</ul>
					</li>
				</ul>
				<!-- script for tabs -->
					<script type="text/javascript">
						$(function() {
						
							var menu_ul = $('.menu_drop > li > ul'),
									menu_a  = $('.menu_drop > li > a');
							
							menu_ul.hide();
						
							menu_a.click(function(e) {
								e.preventDefault();
								if(!$(this).hasClass('active')) {
									menu_a.removeClass('active');
									menu_ul.filter(':visible').slideUp('normal');
									$(this).addClass('active').next().stop(true,true).slideDown('normal');
								} else {
									$(this).removeClass('active');
									$(this).next().stop(true,true).slideUp('normal');
								}
							});
						
						});
					</script>
				<!-- script for tabs -->

			</div>
			</div>
			<div class="col-md-9 search-grid-right">
				<?php 
					$hotel_id = $_SESSION["hotel_id"];
					$check_in = $_SESSION["check_in"];
					$check_out = $_SESSION["check_out"];
					$occupancy =  $_SESSION['noOfPersons'];
					
					if($_GET["page"])
						$pageNumber = $_GET["page"];
					else
						$pageNumber = 1;
					
					$start = $pageNumber*5 - 5;
					$end = $pageNumber*5;
					if(isset($_POST['name_filter']) && $_POST['filter_text']!="Hotel name..."){
						$name_filter = $_POST['filter_text'];
						$name_filter_flag = true;
					}else{
						$name_filter_flag = false;
					}
					
					require_once('config.php');
					try{ 
						$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);  
						
						if ($db->connect_error) {
							die("Connection failed: " . $db->connect_error);
						} 
						if(isset($_GET['room_id']))
							{
								$user_id = $_SESSION['sess_userid'];
								$room_id = $_GET['room_id'];
								
		
								$check =  "SELECT * FROM wishlist WHERE room_id = '$room_id' and user_id='$user_id'";
								$result = mysqli_query($db,$check);
								$row = mysqli_fetch_array($result);
		
								if(mysqli_num_rows($result)>0 && $row['room_id']==$room_id)
								{
									//unset($_POST);
									echo "<script type='text/javascript'>alert('Room already exists in your wishlist!');</script>"; 
								}
								else{
								$query1 = "INSERT INTO wishlist (`user_id`, `room_id`,`checkin`,`checkout`,`num_of_people`)
											VALUES ('$user_id', '$room_id', '$checkin', '$checkout', '$occupancy')";
								if (mysqli_query($db, $query1)) {
									echo "<script type='text/javascript'>alert('New room added to your wishlist!');</script>"; 
								} else {
									//change this content
									echo "Error: " . $query1 . "<br>" . mysqli_error($db);
								}
								}
						}
						//both name and feature filter
						if($name_filter_flag && isset($_GET["feature"]))
						{		
							$feature_id = $_GET["feature"];		
							$query = 
								"SELECT * from room r
								join room_features f1
								on r.room_id = f1.room_id and f1.feature_id='$feature_id'
								where hotel_id='$hotel_id' and max_occupancy >= $occupancy and r.room_id NOT IN 
								(select b.room_id from bookings b
								where r.room_id = b.room_id and 
								(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
								('$check_out' >= b.checkin and '$check_out' <= b.checkout )))
								and r.room_type like '%$name_filter%' limit $start, $end;";						
						}else if($name_filter_flag){
							$query = 
								"SELECT * from room r
								where hotel_id='$hotel_id' and max_occupancy >= $occupancy and r.room_id NOT IN 
								(select b.room_id from bookings b
								where r.room_id = b.room_id and 
								(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
								('$check_out' >= b.checkin and '$check_out' <= b.checkout )))
								and r.room_type like '%$name_filter%' limit $start, $end;;";
							
						}else if(isset($_GET["feature"])){
							$feature_id = $_GET["feature"];
							$query = "SELECT * from room r 
								join room_features f1
								on r.room_id = f1.room_id and f1.feature_id='$feature_id'
								where hotel_id='$hotel_id' and r.max_occupancy >= $occupancy and r.room_id NOT IN 
								(select b.room_id from bookings b
								where r.room_id = b.room_id and 
								(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
								('$check_out' >= b.checkin and '$check_out' <= b.checkout ))) 
								limit $start, $end;";
						}else{
							$query = "SELECT * from room r
							where hotel_id='$hotel_id' and r.max_occupancy >= $occupancy and r.room_id NOT IN 
							(select b.room_id from bookings b
							where r.room_id = b.room_id and 
							(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
							('$check_out' >= b.checkin and '$check_out' <= b.checkout ))) 
							limit $start, $end;";						
						}
						
						$result = $db->query($query);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) { 
								$room_id = $row['room_id']; ?>
								<div class="hotel-rooms">
									<div class="hotel-left">
										<a href="single.php"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span><?php echo $row['room_type'] ?></a>
										<p><?php echo $row['room_desc'] ?></p>
										<div class="hotel-left-grids">
											<div class="hotel-left-one">
												<a href="single.html"><img src="<?php echo $row['image_url'] ?>" alt="<?php echo $row['room_desc'] ?>" /></a>
											</div>
											<div class="hotel-left-two">
												<div class="rating text-left">
													<span><img alt="Customer Rating" src ="images/st<?php echo $row['customer_rating']; ?>.png"</span>
												</div>
												<div class="rating text-left">
												<?php
													
													$query2 = "select f1.feature_name from room a inner join room_features b on a.room_id=b.room_id inner join features f1 on b.feature_id=f1.feature_id where a.room_id = '$room_id';";
													$result2 = $db->query($query2);
													if ($result2->num_rows > 0) {
														echo '<h5><b>Available Features</b></h5>';
														while ($row2 = $result2->fetch_assoc()) { 
															$feature = $row2['feature_name'];
															echo "<p>$feature</p>";
														}
													}
												?>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									
									<div class="hotel-right text-right">
										<div>
											<a style="background:white" href='wishlist.php?room_id=<?php echo $room_id?>'>
											<img id = "wishlistImg" src="images/wishlist1.png" title="Add to wishlist" onmouseover="this.src='images/wishlist2.png'" onmouseout="this.src='images/wishlist1.png'" /></a>									
										</div>
										<h4><span><?php echo $row['price']+rand(2, 100) ?></span><?php echo "  ".$row['price']?></h4>
										<p>Best price</p>
										<a href="single.php?roomId=<?php echo $room_id;?>&src=search">Continue</a>
									</div>
									<div class="clearfix"></div>
									
								</div>
								<?php
							}
							}else {
								echo '<p>No results to display.</p>';
							}
				
						} catch (Exception $e) {
							echo '<p>', $e->getMessage(), '</p>';
						}
				?>
				<div>
                <nav>
				  <ul class="pagination pagination-lg">
                    
                    <?php
					if(isset($_GET["page"])){
						$currentPage = $_GET["page"];
					}else{
						$currentPage = 1;
					}
					
					if(isset($_POST['name_filter']) && $_POST['filter_text']!="Hotel name..."){
						$name_filter = $_POST['filter_text'];
						echo $name_filter;
						$name_filter_flag = true;
					}else{
						$name_filter_flag = false;
					}

					if($name_filter_flag && isset($_GET["feature"]))
					{		
						$feature_id = $_GET["feature"];		
						$query = 
							"SELECT * from room r
							join room_features f1
							on r.room_id = f1.room_id and f1.feature_id='$feature_id'
							where hotel_id='$hotel_id' and max_occupancy >= $occupancy and r.room_id NOT IN 
							(select b.room_id from bookings b
							where r.room_id = b.room_id and 
							(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
							('$check_out' >= b.checkin and '$check_out' <= b.checkout )))
							and r.room_type like '%$name_filter%'";						
					}else if($name_filter_flag){
						$query = 
							"SELECT * from room r
							where hotel_id='$hotel_id' and max_occupancy >= $occupancy and r.room_id NOT IN 
							(select b.room_id from bookings b
							where r.room_id = b.room_id and 
							(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
							('$check_out' >= b.checkin and '$check_out' <= b.checkout )))
							and r.room_type like '%$name_filter%'";	
					}else if(isset($_GET["feature"])){
						$feature_id = $_GET["feature"];
						$query = "SELECT * from room r 
							join room_features f1
							on r.room_id = f1.room_id and f1.feature_id='$feature_id'
							where hotel_id='$hotel_id' and r.max_occupancy >= $occupancy and r.room_id NOT IN 
							(select b.room_id from bookings b
							where r.room_id = b.room_id and 
							(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
							('$check_out' >= b.checkin and '$check_out' <= b.checkout )));";
					}else{
						$query = "SELECT * from room r
						where hotel_id='$hotel_id' and r.max_occupancy >= $occupancy and r.room_id NOT IN 
						(select b.room_id from bookings b
						where r.room_id = b.room_id and 
						(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
						('$check_out' >= b.checkin and '$check_out' <= b.checkout )));";
					}
                   
                    $result = $db->query($query);
					// Do we have any results?
					$rows = $result->num_rows;
                    $noOfPages = ceil(count($rows)/5);
					 $i = 0;
                     ?>
                     <li><a href="search.php?page=<?php echo $currentPage - 1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                     <?php
                     while($i < $noOfPages){?>
                        <li><a href="search.php?page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
                     <?php
                        $i++;
                    }?>
					<li><a href="search.php?page=<?php echo $currentPage + 1 ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				  </ul>
				  </nav>
                </div>
		</div>
	</div>
</div>
<!--//search-->
<!--footer-->
<div class="footer">
		<div class="container">				 	
			<div class="col-md-3 ftr_navi ftr">
				<h3>NAVIGATION</h3>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
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
					<li>6314.001, WPL,</li>
					<li>University of Texas Dallas</li>
					<li></li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Comet Inn</a>
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
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>

