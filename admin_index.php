<?php
	ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if(!isset($_SESSION['user_id']))
	{
	 header("location:login.php");
	}
	if (isset($_POST["submit"])) {
		header("Refresh:0");
	}

	if(isset($_POST["submit_delete_news"]))
	{
    	if(!empty($_POST['checkbox'])) {
		foreach($_POST['checkbox'] as $id) {
			$sql1 = "DELETE FROM recent_updates WHERE id='$id' ";
			$result=mysqli_query($conn,$sql1);
			}
		}
	}

    if(isset($_POST["del"]))
	{
		$id = $_POST["del"];
			$sql2 = "DELETE FROM slider WHERE id='$id' ";
			$result=mysqli_query($conn,$sql2);
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
	
<style>
    
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}

</style>
</head>
<body>
	<?php include('admin_header.php'); ?>

	<!-- Slider photo section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row" >
			<?php
				$query = "SELECT * FROM slider";
				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
			?>			
				<div class="col-md-6 col-lg-3">
					<div class="course-item">
						<div class="card">
							<div class="card-body">

							<form method="POST" action="">
								<div class="member">
									<img src="<?php echo $row['image']; ?>" alt="photo" /><br><br>
									<div class="text-center">
										<button class="my-btn" name="del" value="<?php echo $row['id']; ?>">Delete</button>
									</div>
								</div>	

							</form>		
							</div>
						</div>							
					</div>
				</div>
				<br>
				<?php
					}
				?>
              			
			<div class="col-md-6 col-lg-3">
					<div class="course-item">
						<div class="card">
							<div class="card-body">
								<div class="member">
								    <br>
									<a class="popup-with-form" href="#test-form">
										<div class="member-pic set-bg" style="width: 135px; height: 135px; margin-bottom: 8px;" data-setbg="img/plus.jpg"></div>
									</a>
								<br>
								</div>			
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Slider photo section end -->

	<!-- LATEST NEWS SECTION -->
		<div class="container">
			<center>
			<h3 style="padding-top: 50px;"> NEWS & UPDATES SECTION</h3><br><br>
				<div class="col-md-6 event-item" style="text-align: left;">	
					<div class="card">
						<div class="card-body" style="padding:40px;">
							<form method="POST" action="">
								<div class="widget" style="max-height:400px; overflow-y:auto;">
									<div class="recent-post-widget">									
										<?php
											$query = "SELECT * FROM recent_updates";	
											$result=mysqli_query($conn,$query);
											 while($row = mysqli_fetch_array($result)) 
											 {
											?>
												<input type="checkbox" name="checkbox[]" value="<?php echo $row['id'] ?>" style="float: right;float: bottom; width: 20px; height: 20px;">
													
												<div class="rp-item" style="max-width:95%;">
													<div class="rp-thumb set-bg">
													    <img src="img/news/<?php echo $row['image']; ?>" alt="news pic">
													</div>
													<div class="rp-content">
														<h6><?php echo $row['content']; ?></h6>
														<p><i class="fa fa-clock-o"></i> <?php echo $row['date']; ?></p>
													</div>
												</div>	
											<?php } ?>	
									</div>
								</div>
								<center><button class="site-btn" name="submit_delete_news" style="margin:10px;"><i class="fa fa-minus-circle"></i> &nbsp;DELETE News</button>
								<button class="site-btn popup-with-form" href="#edit-form-news" style="margin:10px;"><i class="fa fa-plus-circle"></i> &nbsp;Add News</button></center>
							</form>
						</div>	
					</div>
				</div>
			</center>
		</div>

	<!-- LATEST POSTS SECTION -->
	<section class="blog-section spad" style="padding-top:0px;">
		<div class="container">
			<div class="section-title text-center">
				<h3>RECENT POSTS</h3>
			</div>
			<div class="row">
			<?php
				$query = "SELECT * FROM recent_posts";

				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
			?>
				<div class="col-xl-6">
					<div class="blog-item" style="margin-bottom: 5px;">
					<a style="float:right;" class="popup-with-form" href="#edit-form-<?php echo $row['id']; ?>" ><i class="fa fa-edit"></i> Edit</a>
						<div class="blog-thumb set-bg" data-setbg="img/post/<?php echo $row['image']; ?>"></div>
						<div class="blog-content">
							<h4><?php echo $row['title']; ?></h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i><?php echo $row['date']; ?></span>
								<span><i class="fa fa-user"></i>Vivek Kumar Singh</span>
							</div>
							
						</div>
						<div class="col-md-12">
    					                <p style="text-align: justify;"><?php echo $row['content']; ?><a href="<?php echo $row['link']; ?>" target="_blank"><i class="fa fa-external-link"></i></a></p>
    					   </div>
					</div>
				</div>
				
				<!-- Update Post Form -->
				<div id="edit-form-<?php echo $row['id']; ?>" class="col-md-6 form-popup mfp-hide">
					<form class="comment-form --contact" id="regForm" action="upload.php" method="POST" enctype="multipart/form-data">					
						<center>
								<h3>Edit Post Details</h3>
						</center><br>
							<div class="row">
								<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
								<div class="col-lg-12">
									<input type="text" name="title" id="title" value="<?php echo $row['title'];?>" placeholder="Title">
								</div>
								<div class="col-lg-12">
									<input type="text" name="date" id="date" value="<?php echo $row['date'];?>" placeholder="Date">
								</div>
								<div class="col-lg-12">
									<textarea name="content" id="content" placeholder="Content"><?php echo $row['content']; ?></textarea>
								</div>
								<div class="col-lg-12">
									<input type="text" name="link" id="link" value="<?php echo $row['link'];?>" placeholder="Url">
								</div>
								<div class="col-lg-12">
								    Change Image <input type="file" name="image" id="file-input">
								</div>
								<div class="col-lg-12">
									<center><button type="submit" name="submit_post" id="submit" class="site-btn" style="">Update</button></center>
								</div>
							</div>
					</form>
				</div>
				<!-- Update Post Form end-->

				
			<?php } ?>
			</div>
		</div>
	</section>
	<!-- Latest Post Section end-->
	
	<!-- Pop up add news-->
    <div id="edit-form-news" class="col-md-4 form-popup mfp-hide">
		<form class="comment-form --contact" method="POST" action="upload.php" enctype="multipart/form-data">
			<center><h3>Add Recent News</h3></center><br>
			<center><div class="col-lg-12">
				<input type="text" name="content" id="content" placeholder="content" required>
				<input type="text" name="url" id="url" placeholder="link">
			
			</div></center>
			<div class="col-lg-10">
			    	<center><input type="file" name="image" id="file-input" required></center>	
			<br>
			   </div>
			<center><button type="submit" name="submit_add_news" class="site-btn" ><i class="fa fa-plus-circle"></i> &nbsp;Add News</button></center>
		</form>
	</div>
	<!-- Popup add news end-->

	<!--- Pop up slider upload image -->
	<div id="test-form" class="col-md-9 form-popup mfp-hide">
			<div id="upload-demo"></div>      
			<center><input type="file" id="image"></center>
			<center><div id="loding_img" style="height:60px;"></div></center>
			<center><button class="my-btn btn-upload-image" style="width:60%; ;padding:10px 30px;">Upload</button></center>
	</div>
	<!--Pop up slider upload image end-->

<script src="js/slider-image-upload2.js"></script>
	<?php include('footer.php'); ?>

</body>
</html>