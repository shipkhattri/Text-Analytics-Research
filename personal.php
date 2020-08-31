<?php
    ob_start();
	session_start();
	include('db_conn.php');
	if(isset($_POST['p_id']))
	{
		$id = $_POST['p_id'];
	}
	else{
		header("location:group.php");
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); 
	?>
	
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
	<?php 
						$query = "SELECT * FROM members WHERE id = ".$id;
                                		$result=mysqli_query($conn,$query);
                                		$row = mysqli_fetch_assoc($result);	
									?>

		<div class="container" style="margin-bottom:40px;">
			<div class="row">
				<div class="col-md-12 event-item" style="margin-top:30px;margin-bottom:0px;">
					<div class="row">
					    <div class="col-lg-4" style="margin-bottom:30px;">
								<div class="card">
									<div class="card-body">
									    <center><img src="<?php echo $row['photo']; ?>" width="250" height="250" style="border-radius: 50%;"  /></center>
								        <br>
										<center><h3 style="margin-bottom:10px;"><?php echo $row['name']; ?></h3></center>
										<center><p style="font-size: 16px; "><?php echo $row['current_status']; ?></p></center>
										<center>
											<p style="font-size: 16px; font-style: italic; margin-bottom:4px;"><i class="fa fa-envelope"></i>&nbsp; <?php echo $row['email']; ?></p>
										    <p style="font-size: 16px; font-style: italic; margin-bottom:10px;"><i class="fa fa-location-arrow"></i>&nbsp; <?php echo $row['address']; ?></p>
										</center>
										<center><a href="<?php echo $row['research_gate']; ?>" target="_blank"><img src="img/rg_d.png" width="32"height="32" /></a>&nbsp;
												<a href="<?php echo $row['google_scholar']; ?>" target="_blank"><img src="img/gs_d.png" width="32"height="32" /></a>&nbsp;
												<a href="<?php echo $row['orcid']; ?>" target="_blank"><img src="img/orcid_d.png" width="32"height="32" /></a>&nbsp;
												<a href="<?php echo $row['linkedin']; ?>" target="_blank"><img src="img/linkedin_d.png" width="32"height="32" /></a>
												<a href="<?php echo $row['researcher_id']; ?>" target="_blank"><img src="img/publon_d.png" width="32"height="32" /></a>
												<a href="<?php echo $row['personal_site']; ?>" target="_blank"><img src="img/personal_d.png" width="32"height="32" /></a>
										</center>
										<br>
									
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="row">
								    <div class="col-lg-12" style="margin-bottom:30px;">
        								<div class="card">
        									<div class="card-header">
        										<b style="font-size: 22px;" >About</b>
        									</div>
        									<div class="card-body">
        										<p style="font-size: 18px; font-style: italic;"> <?php echo $row['about']; ?></p>
        									</div>
        								</div>
        							</div>
        							<div class="col-lg-12" style="margin-bottom:30px;">
        								<div class="card">
        									<div class="card-header">
        										<b style="font-size: 22px;" >Research Interests</b>
        									</div>
        									<div class="card-body">
        										<p style="font-size: 18px; font-style: italic;"> <?php echo $row['research_intrest']; ?></p>
        									</div>
        								</div>
        							</div>
								</div>
				        	</div>
					   </div>
			     </div>
				<div class="col-lg-12" >
				    <div id="accordion">
					<div class="card">
						<div class="card-header">
							<b style="font-size: 22px;" >Publications</b>
						</div>
						</div>
						<br>
				    	<?php
                		$query2 = "SELECT * FROM publications WHERE AUTHORS LIKE '%".$row['name']."%' ORDER BY date_published DESC";
                
        				$result2=mysqli_query($conn,$query2);
        				$i=0;
        				 while($row2 = mysqli_fetch_array($result2)) 
        				 {
        				     $i+=1;
        				?>							
        					<div class="post-item" style="margin-bottom:15px;">
        						<div class="card"  style="cursor:pointer" class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
        							<div class="card-body">
        								<div class="post-content">
        									 <h5 class="card-title"><i><?php echo $row2['title']; ?></i></h5>
        								    <div class="post-meta">
        										<span><i class="fa fa-calendar-o"></i>  <?php echo $row2['date_published']; ?></span>
        										<span><i class="fa fa-user"></i>  <?php echo $row2['authors']; ?></span>
        										<span><i class="fa fa-info-circle"></i>  <?php echo $row2['doi']; ?></span>
        										<span><i class="fa fa-book"></i>  <?php echo $row2['journal']; ?></span>
        									</div>
        									<div id="collapse<?php echo $i; ?>" class="collapse" data-parent="#accordion">
        									<p style="text-align: justify;"><?php echo $row2['abstract']; ?><a href="<?php echo $row2['link']; ?> "  target="_blank"> <i class="fa fa-external-link"></i></a></p>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
					
					<?php } ?>
			
						
					</div>
				</div>
			  </div>
   
  
			</div>
			
	
		</div>

	<script src="js/image-upload-ci.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>