<?php
    ob_start();
	session_start();
	include('db_conn.php');
	if((!isset($_SESSION['user_id'])))
	{
	 header("location:logout.php");
	}
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
		<br><br>
		<div class="container">			
			<div class="row">
			<div class="col-md-6 col-lg-3">
					<div class="course-item">
					    <?php
            			$queryx = "SELECT count(*) as a FROM publications";
            			 $resultx=mysqli_query($conn,$queryx);
            			 $rowx = mysqli_fetch_assoc($resultx);
            			 ?>
						<div class="card">
							<div class="card-body">
								<div class="member">
									<h4>Total Publications</h4>
										<h1 style="font-size:100px;"><?php echo $rowx["a"]; ?></h1>
								</div>			
							</div>
						</div>							
					</div>
				</div>
			
			<div class="col-md-6 col-lg-3">
					<div class="course-item">
					    <?php
            			 $queryx2 = "SELECT count(*) as a FROM members";
            			 $resultx2=mysqli_query($conn,$queryx2);
            			 $rowx2 = mysqli_fetch_assoc($resultx2);
            			 ?>
						<div class="card">
							<div class="card-body">
								<div class="member">
									<h4>Total Authors</h4>
										<h1 style="font-size:100px;"><?php echo $rowx2["a"]; ?></h1>
								</div>			
							</div>
						</div>							
					</div>
				</div>
			<div class="col-md-6 col-lg-3">
					<div class="course-item">
					    <?php
					    $year= date("Y").'-01-01';
            			 $queryx3 = "SELECT count(*) as a FROM publications where date_published > '$year'";
            			 $resultx3=mysqli_query($conn,$queryx3);
            			 $rowx3 = mysqli_fetch_assoc($resultx3);
            			 ?>
						<div class="card">
							<div class="card-body">
								<div class="member">
									<h4>This Year</h4>
										<h1 style="font-size:100px;"><?php echo $rowx3["a"]; ?></h1>
								</div>			
							</div>
						</div>							
					</div>
				</div>
			<div class="col-md-6 col-lg-3">
					<div class="course-item">
						<div class="card">
							<div class="card-body">
								<div class="member">
									<h4>New Publication</h4>
									<a class="popup-with-form" href="#test-form">
										<img height="128" src="img/plus.jpg">
									</a>
									
								</div>			
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
			<div class="col-lg-12 post-list">
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
					</div>
					<ul class="site-pageination">
						<li><a href="#" class="active">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</section>
<!-- Add New Form -->
<div id="test-form" class="col-md-8 form-popup mfp-hide">
	<form class="comment-form --contact" action="croppie.php" method="POST">			

			<center>
				<h3>Add New Publication</h3>
			</center>		
			<div class="row">
					<div class="col-lg-6">
						<input name="title" id="title" type="text" placeholder="Title" required>
					</div>
					<div class="col-lg-6">
						<input name="author" id="author" type="text" placeholder="Authors (Separate using Comma)" required>
					</div>
					<div class="col-lg-4">
						<input name="doi" id="doi" type="text" placeholder="DOI" required>
					</div>
					<div class="col-lg-4">
						<input name="journal" id="journal" type="text" placeholder="Journal/Conference" >
					</div>
					
					<div class="col-lg-4">
						<input name="publication_date" id="publication_date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  min="1950-01-01" max="2050-12-31" placeholder="Publication Date">
					</div>
					
				<div class="col-lg-6">
					<textarea name="abstract" id="abstract" placeholder="Abstract"></textarea>
				</div>
				<div class="col-lg-6">
					<input name="link" id="link" type="text" placeholder="Paper URL">
				
					<input name="impact_factor" id="impact_factor" type="text" placeholder="Impact Factor">
				</div>	
			</div>
			<center><button type="submit" class="site-btn" id="add_publication" name="add_publication" >Add Publication</button></center>
	</form>
</div>
<!-- Add New Form 
<div id="test-form" class="col-md-8 form-popup mfp-hide">
	<form class="comment-form --contact" id="regForm" action="croppie.php" method="POST">			
		<div class="tab">
			<div class="section-title text-center">
				<h3>Add New Publication</h3>
			</div>		
			<div class="row">
					<div class="col-lg-6">
						<input name="title" id="title" type="text" placeholder="Title" required>
					</div>
					<div class="col-lg-6">
						<input name="author" id="author" type="text" placeholder="Authors (Separate using Comma)" required>
					</div>
					<div class="col-lg-4">
						<input name="doi" id="doi" type="text" placeholder="DOI" required>
					</div>
					<div class="col-lg-4">
						<input name="journal" id="journal" type="text" placeholder="Journal" >
					</div>
					
					<div class="col-lg-4">
						<input name="publication_date" id="publication_date"  type="date" min="1950-01-01" max="2050-12-31" placeholder="Publication Date">
					</div>
					
				<div class="col-lg-6">
					<textarea name="abstract" id="abstract" placeholder="Abstract"></textarea>
				</div>
				<div class="col-lg-6">
					<input name="link" id="link" type="text" placeholder="Paper URL">
				
					<input name="author_note" id="author_note" type="text" placeholder="Author's Note">
				</div>	
			</div>
		</div>
		<div class="tab">
			<div class="section-title text-center">
				<h3>Image Upload</h3>
			</div>
			<div class="row">
				<div class="col-md-12 text-center"><center>
					<div class="col-md-6 text-center">
						<div id="upload-demo-sq"></div>      
							<input type="file" id="image">							
					</div></center> 
					<div id="preview-crop-image"></div>
				</div> 
				
			</div>
		</div>
		
		<div style="text-align:center;margin-top:15px; margin-left:10px; margin-right:10px;">
			<button style="float:left; " class="my-btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>			  
			<span class="step"></span>
			<span class="step"></span>
			<button style="float:right;" class="my-btn" type="button" id="nextBtn" name="nextBtn" onclick="nextPrev(1)">Next</button>
			<button type="submit" class="my-btn btn-upload-image" id="uploadSubmit" name="nextBtn" >Submit</button>
		</div>
	</form>
</div>-->

	<script src="js/image-upload-sq.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>