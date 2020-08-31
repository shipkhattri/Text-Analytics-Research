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

<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-7">
					<div class="section-title mb-md-0">
					<h3>Publications</h3>
					<p>Get all of Our Publications here</p>
				</div>
				</div>
			<!--	<div class="col-md-7 col-lg-5">
					<form class="newsletter">
						<input type="text" placeholder="Title / Author / DOI">
						<button class="site-btn">Search</button>
					</form>-->
				</div>
			</div>
		</div>
	</section>
	<!-- Newsletter section end -->	
	

	<!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 post-list">
				<br><br>
				<div id="accordion">
			<?php
				$query = "SELECT * FROM publications ORDER BY date_published DESC";

				$result=mysqli_query($conn,$query);
				$i=0;
				 while($row = mysqli_fetch_array($result)) 
				 {
				     $i+=1;
				?>							
					<div class="post-item" style="margin-bottom:15px;">
						<div class="card"  style="cursor:pointer" class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
							<div class="card-body">
								<div class="post-content">
									 <h5 class="card-title"><i><?php echo $row['title']; ?></i></h5>
								    <div class="post-meta">
										<span><i class="fa fa-calendar-o"></i>  <?php echo $row['date_published']; ?></span>
										<span><i class="fa fa-user"></i>  <?php echo $row['authors']; ?></span>
										<span><i class="fa fa-info-circle"></i>  <?php echo $row['doi']; ?></span>
										<span><i class="fa fa-book"></i>  <?php echo $row['journal']; ?></span>
									</div>
									<div id="collapse<?php echo $i; ?>" class="collapse" data-parent="#accordion">
									<p style="text-align: justify;"><?php echo $row['abstract']; ?><a href="<?php echo $row['link']; ?> "  target="_blank"> <i class="fa fa-external-link"></i>Full Version</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php } ?>
					<ul class="site-pageination">
						<li><a href="#" class="active">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					
					
				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog page section end -->
<?php include('footer.php'); ?>
</body>
</html>