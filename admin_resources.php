<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if((!isset($_SESSION['user_id'])) || ($_SESSION['user_rank'] !=1))
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
	<?php include('admin_header.php'); ?>

	<section class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-7">
					<div class="section-title mb-md-0">
					<h3>Under Construction</h3>
				</div>
				</div>
				
			</div>
		</div>
	</section>

	<?php include('footer.php'); ?>
</body>
</html>