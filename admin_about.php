<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if(!isset($_SESSION['user_id']))
	{
	 header("location:login.php");
	}
	if (isset($_POST["submit"]))
    {
    	$heading = $_POST["heading"];
		$p1 = $_POST["p1"];
		$t1 = $_POST["t1"];
		$t2 = $_POST["t2"];

    	$sql = "UPDATE about SET heading='$heading', paragraph_1='$p1', text_1='$t1',text_2='$t2' WHERE id=1 ";
    	$result=mysqli_query($conn,$sql);
    
    }
    else{
		$query = "SELECT * FROM about WHERE id=1 ";

		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$heading = $row["heading"];
		$p1 = $row["paragraph_1"];
		$t1 = $row["text_1"];
		$t2 = $row["text_2"];
		$image = $row["image"];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>

</head>
<body>
	<?php include('admin_header.php'); ?>
<br><br><br>

	<!-- About section -->
	<!-- About section -->
	<section class="about-section spad pt-0">
		<div class="container">
			<div class="section-title text-center">
				<h3><?php echo $heading; ?></h3>
			</div>
			<div class="row">
				<div class="col-lg-6 about-text">
					<h5>About us</h5>
					<p><?php echo $p1 ;?></p>
					<h5 class="pt-4">Our main areas of interests are mainly as follows:</h5>
					<ul class="about-list">
						<li><i class="fa fa-check-square-o"></i><?php echo $t1;?> </li>
						<li><i class="fa fa-check-square-o"></i><?php echo $t2;?></li>
					</ul>
					<button class="my-btn popup-with-form" href="#edit-form-about" ><i class="fa fa-pencil"></i> Edit </button>
				</div>
				<div class="col-lg-6 pt-5 pt-lg-0">
					<img src="<?php echo $image; ?>" alt="photo"/>
					<br><br>
						<div class="col-lg-12">
							<a class="popup-with-form" href="#test-form">
								<center><button class="my-btn popup-with-form" ><i class="fa fa-pencil"></i>Change Image</button></center>
							</a>
						</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- About section end-->

	<!-- Edit About Form -->
	<div id="edit-form-about" class="col-md-6 form-popup mfp-hide">
		<form class="comment-form --contact" id="regForm" action="" method="POST">					
				<center>
					<h3>Edit About Details</h3>
				</center><br>
				<div class="row">
						<div class="col-lg-12">
							<input type="text" name="heading" id="heading" value="<?php echo $heading;?>" placeholder="Title">
						</div>
						<div class="col-lg-12">
							<input type="text" name="p1" id="p1" value="<?php echo $p1;?>" placeholder="paragraph 1">
						</div>
						<div class="col-lg-12">
							<textarea style="max-height:100px;" name="t1" id="t1"><?php echo $t1;?></textarea>
						</div>
						<div class="col-lg-12">
							<textarea style="max-height:100px;" name="t2" id="t2"><?php echo $t2;?></textarea>
						</div>
				</div>
				<center><button type="submit" name="submit" id="submit" class="site-btn" style="">Update</button></center>		
		</form>
	</div>
	<!-- Edit form end-->

	<!--- Pop up update image -->
	<div id="test-form" class="col-md-8 form-popup mfp-hide">
			<div id="upload-demo"></div>      
			<center><input type="file" id="image"></center>
			<center><div id="loding_img" style="height:60px;"></div></center>
			<center><button class="my-btn btn-upload-image" style="width:70%; ;padding:10px 30px;">Upload</button></center>
	</div>
	<!--Pop up update image end-->

<script src="js/slider-image-upload.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>