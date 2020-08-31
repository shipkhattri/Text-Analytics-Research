<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if(!isset($_SESSION['user_id']))
	{
	 header("location:login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
</head>
<body>
	<?php 
	if ($_SESSION['user_rank'] !=1){
		include('header.php');
	}
	else{
		include('admin_header.php');
	}?>
	<!-- Courses section -->
		<div style="margin-top:50px; margin-left:20px; margin-right:20px;">
			<div class="row" style="margin-top:30px; margin-bottom:40px;>
				<div class="col-md-12 event-item">
					<form class="comment-form --contact" action="croppie.php" method="POST">			
							<?php
							$query = "SELECT * FROM members WHERE id = ".$_SESSION['user_id'];

							$result=mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);						 
							?>							
							<div class="row">
								<div class="col-lg-4">							
									<br>
										<div class="member">
											<div class="member-pic set-bg" style="height:300px; width:300px; max-width:100%; " data-setbg="<?php echo $row['photo']; ?>">
												<div class="member-social">
													<a class="popup-with-form" href="#img-form"><i class="fa fa-camera fa-2x"></i></a>													
												</div>
											</div>
											</div>											
											<center>
										<h2><?php echo $row['name']; ?></h2>	
									</center>
										
									
									<center><button type="submit" name="submit" id="submit" class="site-btn" style="margin:30px;">Update All Profile Details</button></center>
									<center><button type="button" class="site-btn" style="margin-bottom:30px;" onclick="location.href='admin_publication.php'" ><i class="fa fa-plus-circle"></i> &nbsp;Add Publication</button>&nbsp;
								    <button type="button" class="site-btn" style="margin-bottom:30px;" onclick="location.href='admin_research.php'" ><i class="fa fa-plus-circle"></i> &nbsp;Add Research</button></center>
								
								</div>
								<div class="col-lg-4">
										<input name="email" id="email" type="text" value="<?php echo $row['email']; ?>" placeholder="Email" required></input>
										<input name="pass" id="pass" type="password" value="<?php echo $row['password']; ?>" placeholder="Password" required>
										<input name="dob" id="dob" placeholder="Date of Birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" min="1950-01-01" max="2010-12-31" value="<?php echo $row['dob']; ?>"  required>
										<input name="address" id="address" type="text" value="<?php echo $row['address']; ?>" placeholder="Address" required>
										<input name="phone" id="phone" type="text" value="<?php echo $row['phone']; ?>" placeholder="Contact No">
										<input name="status" id="status" value="<?php echo $row['current_status']; ?>"  type="text" placeholder="Current Position" required>
										<textarea name="about" id="about" placeholder="Describe about You (minimum 200 characters)" minlength="200" required><?php echo $row['about']; ?></textarea>										
								</div>
								<div class="col-lg-4">
									<input name="rg" id="rg" type="text" value="<?php echo $row['research_gate']; ?>" placeholder="Research Gate Link" required>
									<input name="gs" id="gs" type="text" value="<?php echo $row['google_scholar']; ?>" placeholder="Google Scholar link" required>
									<input name="orcid" id="orcid" type="text" value="<?php echo $row['orcid']; ?>" placeholder="ORCID Link">
									<input name="linkedin" id="linkedin" value="<?php echo $row['linkedin']; ?>"  type="text" placeholder="Linked In Link">
									<input name="resercher_id" id="resercher_id" value="<?php echo $row['researcher_id']; ?>"  type="text" placeholder="Publons Id">
									<input name="site" id="site" type="text" value="<?php echo $row['personal_site']; ?>" placeholder="Personal website Link">
									<textarea name="intrest" id="intrest" placeholder="Research Interests (minimum 200 characters)" minlength="200" required><?php echo $row['research_intrest']; ?></textarea>
								</div>
							</div>
					</form>
				</div>
			</div>		
		</div>
		
		<div class="container">
			<div class="row">
			<div class="col-lg-12 post-list">
			<?php
				$query2 = "SELECT * FROM publications WHERE AUTHORS LIKE '%".$row['name']."%' ORDER BY date_published DESC";

				$result2=mysqli_query($conn,$query2);
				 while($row2 = mysqli_fetch_array($result2)) 
				 {
				?>							
					<div class="post-item" style="margin-bottom:40px;">
						<div class="card">
							<div class="card-body">
							<a style="float:right;" class="popup-with-form" href="#edit-form-<?php echo $row2['id']; ?>" ><i class="fa fa-edit"></i></a>
								<div class="post-content">
								 <h4 class="card-title" style="cursor:pointer" onclick="window.open('<?php echo $row2['link']; ?>')"><?php echo $row2['title']; ?></h4>
									<div class="post-meta">
										<span><i class="fa fa-calendar-o"></i>  <?php echo $row2['date_published']; ?></span>
										<span><i class="fa fa-user"></i>  <?php echo $row2['authors']; ?></span>
										<span><i class="fa fa-info-circle"></i>  <?php echo $row2['doi']; ?></span>
										<span><i class="fa fa-book"></i>  <?php echo $row2['journal']; ?></span>
									</div>									
								</div>
							</div>
						</div>
					</div>
						
					<!-- Add New Form -->
					<div id="edit-form-<?php echo $row2['id']; ?>" class="col-md-8 form-popup mfp-hide">
						<form class="comment-form --contact" id="regForm" action="croppie.php" method="POST">					
								<center>
									<h3>Edit Publication</h3>
								</center><br>
								<div class="row">
										<div class="col-lg-6">
											<input name="title" id="title" type="text" value="<?php echo $row2['title']; ?>" placeholder="Title" required>
										</div>
										<div class="col-lg-6">
											<input name="author" id="author" type="text" value="<?php echo $row2['authors']; ?>" placeholder="Author" required>
										</div>
										<div class="col-lg-4">
											<input name="doi" id="doi" type="text" value="<?php echo $row2['doi']; ?>" placeholder="DOI" required>
										</div>
										<div class="col-lg-4">
											<input name="journal" id="journal" type="text" value="<?php echo $row2['journal']; ?>" placeholder="Journal" required>
										</div>
										
										<div class="col-lg-4">
											<input name="publication_date" id="publication_date" type="text" value="<?php echo $row2['date_published']; ?>" placeholder="Publication Date" required>
										</div>
										
									<div class="col-lg-6">
										<textarea name="abstract" id="abstract" placeholder="Abstract" required><?php echo $row2['abstract']; ?></textarea>
									</div>
									<div class="col-lg-6">
										<input name="link" id="link" type="text" value="<?php echo $row2['link']; ?>" placeholder="Paper URL">
									
										<input name="impact_factor" id="impact_factor" type="text" value="<?php echo $row2['impact_factor']; ?>" placeholder="Impact Factor">
									</div>	
									<input name="id" id="id" type="text" value="<?php echo $row2['id']; ?>" hidden>
								</div>
								<center><button type="submit" name="submit_publication" id="submit" class="site-btn" style="">Update Publication Details</button></center>
								
						</form>
					</div>
					
					<?php } ?>
				</div>
				
			</div>
		</div>
<!-- Add New Form -->
<div id="img-form" class="col-md-4 form-popup mfp-hide">		
		    
			<center><h3>Image Upload</h3></center><br>
			
			<div id="upload-demo-ci"></div>      
			<center><input type="file" id="image"></center>
			<center><div id="loding_img" style="height:60px;"></div></center>
			<center><button class="my-btn btn-upload-image" style="width:70%; ;padding:10px 30px;">Upload</button></center>
</div>


	<script src="js/image-upload-ci.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>