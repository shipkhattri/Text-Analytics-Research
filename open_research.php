<?php
    ob_start();
	session_start();
	include('db_conn.php');
	
	
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
	
	<div class="container" style="margin-bottom:40px;">
			<div class="row">
				<div class="col-md-12 event-item" style="margin-top:30px;margin-bottom:0px;">
				    <?php
				    if(isset($_POST['abc']))
                    {
                        $id=$_POST['p_id'];
                        
                    	$query = "SELECT * FROM `research` WHERE id='$id' ";
                    	$result=mysqli_query($conn,$query);
        				 while($row = mysqli_fetch_array($result)) 
        				 {
        				     $a=$row["author"];
        				     $q2="SELECT name FROM members WHERE id='$a' ";
        				     $res2=mysqli_query($conn,$q2);
        				     $row2 = mysqli_fetch_array($res2);
                	?>
					<div class="row">
					    <div class="col-lg-4" style="margin-bottom:30px;">
							<img src="<?php echo $row['image']; ?>" alt="" style="max-height:220px; min-height:220px; object-fit:cover; margin-bottom:20px;">
							<p style="margin-bottom:0px;"><i class="fa fa-user-o"></i> &nbsp;<?php echo $row2['name'] ?></p>
							<p style="margin-bottom:0px;"><i class="fa fa-calendar-o"></i> &nbsp;<?php echo $row["date_post"]; ?></p>
						</div>
							<div class="col-lg-8">
								<div class="row">
								    <div class="col-lg-12" style="margin-bottom:30px;">
        								<div class="card">
        									<div class="card-header">
        										<b style="font-size: 22px;" ><?php echo substr($row["title"], 0, 90); ?></b>
        									</div>
        									<div class="card-body">
        										<p style="font-size: 18px; font-style: italic;"><?php echo $row["about"]; ?></p>
        									</div>
        								</div>
        							</div>
								</div>
				        	</div>
					   </div>
					   <?php }} ?>
			     </div>
			 </div>
	    </div>
	<?php include('footer.php'); ?>
</body>
</html>