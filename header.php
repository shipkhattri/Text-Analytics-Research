<?php
	session_start();
	include('db_conn.php');	

    	$query_xy = "SELECT * FROM contact_details WHERE id=1 ";
    
    	$result_xy=mysqli_query($conn,$query_xy);
    	$row_xy = mysqli_fetch_assoc($result_xy);
    
?>
	

	<!-- header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a href="index.html"><img src="img/logo_f.png" alt="" style="max-width:70%;max-height:55px;"></a>
		    <div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info" style="max-height:55px;">
				<div class="hf-item" style="margin:0px;">
					<a href="<?php echo $row_xy["facebook"]; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
				</div>
				<div class="hf-item" style="margin:0px;">
					<a href="<?php echo $row_xy["twitter"]; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
				</div>
				<div class="hf-item" style="margin:0px;">
					<a href="<?php echo $row_xy["linkedin"]; ?>"target="_blank"><i class="fa fa-linkedin-square"></i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<div class="nav-right">				
				<?php 
					if(isset($_SESSION['user_id'])){ echo '<a href="member_edit.php"><i class="fa fa-user"></i>  My Profile</a> <a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a>' ; }
					else{  echo '<a href="login.php"><i class="fa fa-user"></i>  Login</a>' ;}
				?>
			</div>
			<ul class="main-menu">
			<?php 
				$n = basename($_SERVER['PHP_SELF']); 
				echo str_replace('><a href="'.$n,' class="active"><a href="'.$n,
			   '<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="research.php">Research</a></li>
				<li><a href="group.php">Group</a></li>
				<li><a href="publication.php">Publications</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="contact.php">Contact</a></li>');			
			?>				
			</ul>
		</div>
	</nav> 
	
	<!-- Header section end -->

