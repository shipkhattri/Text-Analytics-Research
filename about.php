<?php
    session_start();
	include("db_conn.php");
	$query = "SELECT * FROM about WHERE id=1 ";

	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	$heading = $row["heading"];
	$p1 = $row["paragraph_1"];
	$t1 = $row["text_1"];
	$t2 = $row["text_2"];
	$image = $row["image"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
</head>
<body>
	<?php include('header.php'); ?>
<br>
	<!-- About section -->
	<section class="about-section spad pt-0">
		<div class="container">
			<div class="section-title text-center">
				<h3><?php echo $heading; ?></h3>
			</div>
			<div class="row">
				<div class="col-lg-6 about-text">
					<h4>About us</h4>
					<p><?php echo $p1 ;?></p>
					<h5 class="pt-4">Our main areas of interests are mainly as follows:</h5>
					<ul class="about-list">
						<li><i class="fa fa-check-square-o"></i><?php echo $t1;?> </li>
						<li><i class="fa fa-check-square-o"></i><?php echo $t2;?></li>
					</ul>
				</div>
				<div class="col-lg-6 pt-5 pt-lg-0">
					<img src="<?php echo $image; ?>" />
					<!--<img src="img/about.jpg" alt="">-->
				</div>
			</div>
		</div>
	</section>
	<!-- About section end-->

	<?php include('footer.php'); ?>	
</body>
</html>