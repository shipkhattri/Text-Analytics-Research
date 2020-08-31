<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if((!isset($_SESSION['user_id'])) || ($_SESSION['user_rank'] !=1))
	{
	 header("location:logout.php");
	}
	if(isset($_POST["submit1"]))
	{
    	if(!empty($_POST['checkbox'])) {
		foreach($_POST['checkbox'] as $id) {
			$sql1 = "UPDATE contact_us SET status='1' WHERE id='$id' ";
			$result=mysqli_query($conn,$sql1);
			}
		}
	}
	if (isset($_POST["submit_contact"]))
    {
		$addr = $_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$work_time = $_POST["work_time"];
		$sql = "UPDATE contact_details SET address='$addr', phone='$phone', email='$email', work_time='$work_time' WHERE id=1 ";
    	$result=mysqli_query($conn,$sql);   
    }
    else{
		$query = "SELECT * FROM contact_details WHERE id=1 ";

		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$addr = $row["address"];
		$phone = $row["phone"];
		$email = $row["email"];
		$work_time = $row["work_time"];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
<style>

body .container_tab input[name="tab"] {
  display: none;
}
body .container input:checked + label {
  background: #ccc;
}
body .container_tab input#tab1:checked ~ .line {
  left: 0%;
}
body .container_tab input#tab1:checked ~ .content-container_tab #c1 {
  opacity: 1;
}
body .container_tab input#tab2:checked ~ .line {
  left: 25%;
}
body .container_tab input#tab2:checked ~ .content-container_tab #c2 {
  opacity: 1;
}

body .container_tab label {
  display: inline-block;
  font-size: 16px;
  height: 36px;
  line-height: 36px;
  width: 25%;
  text-align: center;
  background: #f4f4f4;
  color: #444;
  position: relative;
  -webkit-transition: 0.25s background ease;
  transition: 0.25s background ease;
  cursor: pointer;
}
body .container_tab label::after {
  content: "";
  height: 2px;
  width: 100%;
  position: absolute;
  display: block;
  background: #ccc;
  bottom: 0;
  opacity: 0;
  left: 0;
  -webkit-transition: 0.25s ease;
  transition: 0.25s ease;
}
body .container_tab label:hover::after {
  opacity: 1;
}
body .container_tab .line {
  position: absolute;
  height: 2px;
  background: #1e88e5;
  width: 25%;
  top: 34px;
  left: 0;
  -webkit-transition: 0.25s ease;
  transition: 0.25s ease;
}
body .container_tab .content-container_tab {
  background: #fff;
  position: relative;
overflow-x: hidden;
overflow-y: auto;
height:600px;
  font-size: 16px;
}
body .container_tab .content-container_tab .content {
  position: absolute;
  width: 100%;
  top: 0;
  opacity: 0;
  -webkit-transition: 0.25s ease;
  transition: 0.25s ease;
  color: #666;
}


::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}

</style
</head>
<body>
	<?php include('admin_header.php'); ?>
	<!-- Courses section -->
	<section class="contact-page spad pt-0">
		<div class="container">	
			<br>		
			<div class="row">
				<div class="col-lg-8 post-list">					
						<div class="container_tab">
						  <input type="radio" id="tab1" name="tab" >
						  <label for="tab1"> Checked </label>
						  <input type="radio" id="tab2" name="tab" checked>
						  <label for="tab2"> New</label>						 
							<div class="content-container_tab">
								<div class="content" id="c1">
										<?php
										$query = "SELECT * FROM contact_us";

										$result=mysqli_query($conn,$query);
										$x=1;
										 while(($row = mysqli_fetch_array($result)) && $x<=10) 
										 {
											if($row['status']==1)
											{
										?>
											<div class="post-item" style="margin-bottom: 10px;">
												<div class="card">
													<div class="card-body">
														<div class="post-content">
															<h5 class="card-title"><?php echo $row['name']; ?></h5>
															<div class="post-meta">
																<span><i class="fa fa-envelope"></i>  <?php echo $row['email']; ?></span>
																<span><i class="fa fa-phone"></i>  <?php echo $row['phone']; ?></span>
																<span><i class="fa fa-calendar-o"></i>  <?php echo $row['time']; ?></span>
															</div>
															<p><?php echo $row['message']; ?></p>
														</div>
													</div>
												</div>
											</div>
										<?php 
											$x++;
										}} ?>	
								</div>
								<div class="content" id="c2">									
									 <?php
									$query = "SELECT * FROM contact_us";

									$result=mysqli_query($conn,$query);
									 while($row = mysqli_fetch_array($result)) 
									 {
										if($row['status']==0)
										{
									?>
									<form method="POST" action="">
										<div class="post-item" style="margin-bottom: 10px;">
											<div class="card">
												<div class="card-body">
													<div class="post-content">
													<input type="checkbox" name="checkbox[]" value="<?php echo $row['id'] ?>" style="float: right; width: 20px; height: 20px;">
														<h5 class="card-title"><?php echo $row['name']; ?></h5>
														<div class="post-meta">
															<span><i class="fa fa-envelope"></i>  <?php echo $row['email']; ?></span>
															<span><i class="fa fa-phone"></i>  <?php echo $row['phone']; ?></span>
															<span><i class="fa fa-calendar-o"></i>  <?php echo $row['time']; ?></span>
														</div>
														<p><?php echo $row['message']; ?></p>
													</div>
												</div>
											</div>
										</div>
									<?php }} ?>		
										<center><button class="site-btn" name="submit1" style=" margin:30px;"><i class="fa fa-save"></i> Save Changes</button></center>
										</form>								
								</div>
							</div>
						</div>
					
				</div>
					
						
				<div class="col-md-4 event-item">		
					<div class="contact-info-warp">					
						<div class="contact-info">
							<h4>Address</h4>
							<p><?php echo $addr ;?></p>
						</div>
						<div class="contact-info">
							<h4>Phone</h4>
							<p><?php echo $phone ;?></p>
						</div>
						<div class="contact-info">
							<h4>Email</h4>
							<p><?php echo $email ;?></p>
						</div>
						<center><button class="site-btn popup-with-form" href="#edit-form-contact" ><i class="fa fa-pencil"></i> Edit Contact Details</button></center>

					</div>	
				</div>
		
				
				
			</div>
		</div>
	</section>
	<!-- Courses section end-->
<!-- Add New Form -->
	<div id="edit-form-contact" class="col-md-4 form-popup mfp-hide">
		<form class="comment-form --contact" id="regForm" action="" method="POST">					
				<center>
					<h3>Edit Contact Details</h3>
				</center><br>
				<div class="row">
						<div class="col-lg-12">
							<input type="text" name="address" id="address" value="<?php echo $addr;?>"" placeholder="Title">
						</div>
						<div class="col-lg-12">
							<input type="text" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="Author">
						</div>
						<div class="col-lg-12">
							<input type="text" name="email" id="email" value="<?php echo $email;?>" placeholder="DOI">
						</div>
						<div class="col-lg-12">
							<input type="text" name="work_time" id="work_time" value="<?php echo $work_time;?>" placeholder="Journal">
						</div>
				</div>
				<center><button type="submit" name="submit_contact" id="submit" class="site-btn" style="">Update Contact Details</button></center>		
		</form>
	</div>

	<?php include('footer.php'); ?>

</body>
</html>