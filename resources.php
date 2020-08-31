<?php
    session_start();
	include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
</head>
<body>
	<?php include('header.php'); ?>

	<!-- Resources section -->
	<section class="service-section spad">
		<div class="container services">
			<div class="row">
				<div class="col-lg-4 col-sm-6 service-item" style="width:200px;">
					<div class="service-icon" style="width:400px; height:150px; align:center; padding-left:100px;">
						<img src="img/resources/functions.png" alt="1">
					</div>
					<div class="service-content" style="float:left; padding-left:100px;">
						<h4>Library</h4>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item" style="width:200px;">
					<div class="service-icon" style="width:400px; height:150px; align:center; padding-left:100px;">
						<img src="img/resources/code.png" alt="1">
					</div>
					<div class="service-content" style="float:left; padding-left:70px;">
						<h4>Code Segments</h4>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item" style="width:200px;">
					<div class="service-icon" style="width:400px; height:150px; align:center; padding-left:100px;">
						<img src="img/resources/datasets.png" alt="1">
					</div>
					<div class="service-content" style="float:left; padding-left:105px;">
						<h4>Data Sets</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Resources section end -->

<?php include('footer.php'); ?>
</body>
</html>