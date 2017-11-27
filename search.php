<?php include 'menu.php';
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive Website Template | Search :: w3layouts</title>
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
					<form>
						<input type="text" value="Hotel name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Hotel name...';}" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				
				<div class="range">
					<h3 class="sear-head">Average nightly rate</h3>
							<ul class="dropdown-menu6">
								<li>
									                
									<div id="slider-range"></div>							
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
									</li>			
							</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 50, 6000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
							
				</div>
				<div class="range-two">
					<h3 class="sear-head">Distance from</h3>
						<select class="sel">
							<option value="">Enter City Center</option>
							<option value="">Park View Center</option>
							<option value="">E Park Road</option>
							<option value="">Silver City</option>   
						</select>

							<ul class="dropdown-menu5">
								<li>
									               
									<div id="slider-range1"></div>							
										<input type="text" id="amount1" style="border: 0; color: #ffffff; font-weight: normal;" />
									</li>			
							</ul>
							<!---->
							<script type="text/javascript" src="js/jquery-ui.js"></script>
							
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range1" ).slider({
										range: true,
										min: 0,
										max: 6000,
										values: [ 50, 5000 ],
										slide: function( event, ui ) {  $( "#amount1" ).val( "KM-" + ui.values[ 0 ] + " - KM-" + ui.values[ 1 ] );
										}
							 });
							$( "#amount1" ).val( "KM-" + $( "#slider-range1" ).slider( "values", 0 ) + " - KM-" + $( "#slider-range1" ).slider( "values", 1 ) );

							});//]]>  

							</script>
				</div>
				<div class="single-star-bottom">
					<h3 class="sear-head">Star rating</h3>
						
							<input type="checkbox"  id="nike" value="">
							<label for="nike"><span></span><b><img src="images/st2.png" alt="" /></b></label>
						
						
							<input type="checkbox"  id="nike1" value="">
							<label for="nike1"><span></span> <b><img src="images/st3.png" alt="" /></b></label>
					
					
							<input type="checkbox"  id="nike2" value="">
							<label for="nike2"><span></span><b><img src="images/st4.png" alt="" /></b></label>
				
				
							<input type="checkbox"  id="nike3" value="">
							<label for="nike3"><span></span> <b><img src="images/st5.png" alt="" /></b></label>
				
						
							<input type="checkbox"  id="nike4" value="">
							<label for="nike4"><span></span><b><img src="images/st.png" alt="" /></b></label>
						
				</div>
				
				<div class="menu-grid">
					<ul class="menu_drop">
						<li class="item1"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Features</a>
							<ul>
								<li class="subitem1"><a href="#">Roll-in shower </a></li>
								<li class="subitem2"><a href="#">Comfortable bathroom</a></li>
								<li class="subitem3"><a href="#">WI-FI facility</a></li>
							</ul>
						</li>
						<li class="item2"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Facilities</a>
							<ul>
								<li class="subitem1"><a href="#">Childcare </a></li>
								<li class="subitem2"><a href="#">Gym</a></li>
								<li class="subitem3"><a href="#">Bar</a></li>
							</ul>
						</li>
						<li class="item3"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Accommodation type</a>
							<ul>
								<li class="subitem1"><a href="#">Resort</a></li>
								<li class="subitem2"><a href="#">Hostel</a></li>
								<li class="subitem3"><a href="#">Apartment</a></li>
							</ul>
						</li>
						<li class="item4"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Landmarks</a>
							<ul>
								<li class="subitem1"><a href="#">Mexican City</a></li>
								<li class="subitem2"><a href="#">Park View Center</a></li>
								<li class="subitem3"><a href="#">Land Park Center</a></li>
							</ul>
						</li>
						<li class="item5"><a href="#"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Neighbourhood</a>
							<ul>
								<li class="subitem1"><a href="#">Diamond Park Colony</a></li>
								<li class="subitem2"><a href="#">E Park Road</a></li>
								<li class="subitem3"><a href="#">lake View Center</a></li>
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
					
					require_once('config.php');
					try{ 
						$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);  
						
						if ($db->connect_error) {
							die("Connection failed: " . $db->connect_error);
						} 
						
						$query = 
							"SELECT count(*) as count from room r
							where hotel_id='$hotel_id' and max_occupancy <= $occupancy and r.room_id NOT IN 
							(select b.room_id from bookings b
							where r.room_id = b.room_id and 
							(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
							('$check_out' >= b.checkin and '$check_out' <= b.checkout )));";						
						
						// Find out how many items are in the table
						
						$result = $db->query($query)->fetch_assoc();
						$total = $result['count'][0];
						
						// How many items to list per page
						$limit = 2;
					
						// How many pages will there be
						$pages = ceil($total / $limit);
					
						// What page are we currently on?
						$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
							'options' => array(
								'default'   => 1,
								'min_range' => 1,
							),
						)));
					
						// Calculate the offset for the query
						$offset = ($page - 1)  * $limit;
					
						// Some information to display to the user
						$start = $offset + 1;
						$end = min(($offset + $limit), $total);
					
						// The "back" link
						$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
					
						// The "forward" link
						$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
					
						// Display the paging information
						echo '<div style="float:right" id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div><br><br>';
					
						// Prepare the paged query
						$stmt = "SELECT * from room r
								where hotel_id='$hotel_id' and max_occupancy <= $occupancy and r.room_id NOT IN 
								(select b.room_id from bookings b
								where r.room_id = b.room_id and 
								(('$check_in' >= b.checkin and '$check_in' <= b.checkout ) or 
								('$check_out' >= b.checkin and '$check_out' <= b.checkout ))) 
								LIMIT $limit OFFSET $offset;";	
						
						$result1 = $db->query($stmt);
						// Do we have any results?
						if ($result1->num_rows > 0) {
						// Define how we want to fetch the results
						while ($row = $result1->fetch_assoc()) { 
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
												<span><img src ="images/st<?php echo $row['customer_rating']; ?>.png"</span>
											</div>
											<div class="rating text-left">
											<?php
												
												$query2 = "select f1.feature_name from room a inner join room_features b on a.room_id=b.room_id inner join features f1 on b.feature_id=f1.feature_id where room_id = '$room_id';";
						
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
								echo '<p>No results could be displayed.</p>';
							}
				
						} catch (Exception $e) {
							echo '<p>', $e->getMessage(), '</p>';
						}
				?>
				
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
					<li>Ola-ola street jump,</li>
					<li>260-14 City, Country</li>
					<li>+62 000-0000-00</li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Classic Hotel</a>
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