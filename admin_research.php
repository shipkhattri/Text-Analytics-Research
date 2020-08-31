<?php
     ob_start();
	session_start();
	include('db_conn.php');
    include('session_var.php');
	
	$author = $_SESSION['user_id'];
    
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
<br><br>

	<!-- Courses section -->
	<section class="full-courses-section spad pt-0">
		<div class="container">
			<div class="row">
			<?php
				$query = "SELECT * FROM `research`  ORDER BY id DESC";

				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
			
        			$a=$row["author"];
        		    $q2="SELECT name FROM members WHERE id='$a' ";
        			$res2=mysqli_query($conn,$q2);
        			$row2 = mysqli_fetch_array($res2);	     
				//$image = $row["image"];				
				?>
				<div class="col-lg-4 col-md-6 course-item">
				    <form action="open_research.php" method="POST">
					<div class="card" style="max-height:350px;min-height:350px;">
						<div class="card-body">
							<div class="course-thumb" style="margin-bottom:15px;">
								<img src="<?php echo $row['image']; ?>" alt="" style="max-height:180px; min-height:180px; object-fit:cover">						
							</div>
								<h5 style="text-align: justify; margin-bottom:15px;"><i><?php echo substr($row['title'], 0, 90); ?></i></h5>
								<p style="margin-bottom:0px;"><i class="fa fa-user-o"></i> &nbsp;<?php echo $row2['name'] ?></p>
								<p style="margin-bottom:0px;"><i class="fa fa-calendar-o"></i> &nbsp;<?php echo $row['date_post']; ?></p>
							    <input id="p_id" name="p_id" value="<?php echo $row['id']; ?>" hidden>
							    <?php
							    if($author == $row['author']){
							    ?>
							    <a style="float:right;" class="popup-with-form" href="#edit-form-<?php echo $row['id']; ?>" ><i class="fa fa-edit"></i> Edit</a>
							    <?php } ?>
						  </div>
					</div>
					
						  <div class="course-thumb">
							<div class="course-cat">
								<button class="site-btn" style="padding:15px;" name="abc" id="abc" type="submit">view </button>
							</div>
						</div>
					</form>
				</div>
				<!-- Update Research Form -->
				<div id="edit-form-<?php echo $row['id']; ?>" class="col-md-6 form-popup mfp-hide">
					<form class="comment-form --contact" id="regForm" action="upload2.php" method="POST" enctype="multipart/form-data">					
						<center>
								<h3>Edit Research Details</h3>
						</center><br>
							<div class="row">
								<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
								<div class="col-lg-12">
								    <input name="title" id="title" type="text" value="<?php echo $row['title'];?>" placeholder="Title (maximim 90 characters)" maxlength="90" required>
								</div>
								<div class="col-lg-12">
								    <textarea name="about" id="about" placeholder="About (minimum 500 characters)" minlength="500" required><?php echo $row['about'];?></textarea>
								</div>
								<div class="col-lg-12">
                			    	<center><input type="file" name="image" id="file-input" value="<?php echo $row['image']; ?>"></center>	
                			    	<br>
								</div>
								<div class="col-lg-12">
									<center><button type="submit" name="submit_edit_research" id="submit_edit_research" class="site-btn" style="">Update</button></center>
								</div>
							</div>
					</form>
				</div>
				<!-- Update research Form end-->
				 <?php } ?>
				<div class="col-lg-4 col-md-6 course-item">
					<div class="card">
						<div class="card-body">
							<a class="popup-with-form" href="#test-form">
								<div class="course-thumb" style="padding:50px; margin-bottom:12px;">
									<img src="img/plus.jpg" alt="">						
								</div>
							</a>
							
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- Courses section end-->

<!-- Add New Form -->
<div id="test-form" class="col-md-6 form-popup mfp-hide">
	<div class="section-title text-center">
		<h3>Add New Research</h3>
	</div>
	<form class="comment-form --contact" action="upload2.php" method="POST"  enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<input name="title" id="title" type="text" placeholder="Title (maximim 90 characters)" maxlength="90" required>
			</div>
			<div class="col-lg-12">
					<textarea name="about" id="about" placeholder="About (minimum 500 characters)" minlength="500" required></textarea>
			</div>
			<div class="col-lg-10">
			    	<center><input type="file" name="image" id="file-input" minlength="500" required></center>	
			    	<br>
			</div>
			<div class="col-lg-12">
				<div class="text-center">
					<button class="site-btn" type="submit" id="submit_add_research" name="submit_add_research" >SUBMIT</button>
				</div>
			</div>
		</div>
	</form>
</div>
	<?php include('footer.php'); ?>
</body>
</html>