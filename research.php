<?php
    session_start();
	include("db_conn.php");
    include('session_var.php');
	
	$author = $_SESSION['user_id'];
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
							    
							    
						  </div>
					</div>
						  <div class="course-thumb">
							<div class="course-cat">
								<button class="site-btn" style="padding:15px;" name="abc" id="abc" type="submit">view </button>
							</div>
						</div>
					</form>
				</div>
				 <?php } ?>
			
				
			</div>
			
		</div>
	</section>
	<!-- Courses section end-->

<?php include('footer.php'); ?>
</body>
</html>
