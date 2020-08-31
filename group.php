<?php
	session_start();
	error_reporting(1);

	include('db_conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
</head>
<body>
	<?php include('header.php'); ?>

	<!-- Team section  -->
	<section class="team-section spad">
		<div class="container">
			<div class="row">
			<?php
				$query = "SELECT * FROM members ORDER BY name";

				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
				//$image = $row["image"];				
				?>
				<div class="col-md-6 col-lg-3">
					<div class="course-item">
					    <form action="personal.php" method="POST">
						<div class="card" style="min-height:431px;max-height:431px;">
							<div class="card-body">
								<div class="member">
									<div class="member-pic set-bg" data-setbg="<?php echo $row['photo']; ?>">
										<div class="member-social">
											<a style="margin:0px; padding:0px;" href="<?php echo $row['research_gate']; ?>" target="_blank"><img src="img/rg.png" width="30"height="30" /></a>
											<a style="margin:0px; padding:0px;" href="<?php echo $row['google_scholar']; ?>" target="_blank"><img src="img/gs.png" width="30"height="30" /></a>
											<a style="margin:0px; padding:0px;" href="<?php echo $row['orcid']; ?>" target="_blank"><img src="img/orcid.png" width="30"height="30" /></a>
											<a style="margin:0px; padding:0px;" href="<?php echo $row['linkedin']; ?>" target="_blank"><img src="img/linkedin.png" width="30"height="30" /></a>
										</div>
									</div>
									<h5><?php echo $row['name']; ?></h5>
									<p style="color:grey;"><?php echo substr($row['about'], 0, 95); ?>...</p>
									<br>
								</div>			
							</div>
						</div>
						<div class="course-thumb">
						<input id="p_id" name="p_id" value="<?php echo $row['id']; ?>" hidden> 
							<div class="course-cat">
								<button class="site-btn" style="padding:15px;" type="submit">view </button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<?php } ?>				
			</div>
		</div>
	</section>
	<!-- Team section end -->

	<!-- Gallery section
		<div class="gallery-section">
			<div class="gallery">
				<div class="grid-sizer"></div>
				<div class="gallery-item gi-big set-bg" data-setbg="img/gallery/1.jpg">
					<a class="img-popup" href="img/gallery/1.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item set-bg" data-setbg="img/gallery/2.jpg">
					<a class="img-popup" href="img/gallery/2.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item set-bg" data-setbg="img/gallery/3.jpg">
					<a class="img-popup" href="img/gallery/3.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item gi-long set-bg" data-setbg="img/gallery/5.jpg">
					<a class="img-popup" href="img/gallery/5.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item gi-big set-bg" data-setbg="img/gallery/8.jpg">
					<a class="img-popup" href="img/gallery/8.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item gi-long set-bg" data-setbg="img/gallery/4.jpg">
					<a class="img-popup" href="img/gallery/4.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item set-bg" data-setbg="img/gallery/6.jpg">
					<a class="img-popup" href="img/gallery/6.jpg"><i class="ti-plus"></i></a>
				</div>
				<div class="gallery-item set-bg" data-setbg="img/gallery/7.jpg">
					<a class="img-popup" href="img/gallery/7.jpg"><i class="ti-plus"></i></a>
				</div>
			</div>
		</div>
	 Gallery section -->
		<br><br>
<?php include('footer.php'); ?>
</body>
</html>