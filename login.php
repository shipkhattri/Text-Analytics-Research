<?php
ob_start();
session_start();
include('session_var.php');
include('db_conn.php');
$message = '';
if(isset($_SESSION['user_id']))
{
	if($_SESSION['user_rank'] ==1)
	{
	 header('location:admin_index.php');
	}
	else{
		header('location:member_edit.php');
	}
}
if(isset($_POST["submit"]))
{
  $query = "
   SELECT * FROM members 
    WHERE email = :email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':email' => $_POST["email"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($_POST["password"]== $row["password"])
      {
        $_SESSION['user_id'] = $row['id'];
		$_SESSION['user_rank'] = $row['member_rank'];
        $_SESSION['email'] = $row['email'];
		
		if($row["member_rank"]==1){
			header("location:admin_index.php");
		}
		else{
			header("location:member_edit.php");
		}
      }
      else
      {
      $message = "<label>* Invalid password</label>";
      }
    }
 }
 else
 {
   $message = "<label>* Invalid email</labe>";
 }
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

	<!-- Courses section -->
	<section class="contact-page spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-4 event-item">
				</div>				
				<div class="col-md-4 event-item">
				<br><br>
					<div class="card">
						<div class="card-body">
							<br>
							<center><h3 style="font-weight:600px;">LOGIN</h3></center>
							<br>
							<form class="comment-form --contact" action="" method="POST">
								<div class="row">
									<div class="col-lg-12">
										<input type="text" name="email" id="email" placeholder="Email" required>
									</div>
									<div class="col-lg-12">
										<input type="password" name="password" id="password" placeholder="Password" required>
										<p class="text-danger" style="float:right;"><?php echo $message; ?></p>
									</div>		
									
									<div class="col-lg-12">
										<div class="text-center">
											<button class="site-btn" type="submit" id="submit" name="submit">SUBMIT</button>
										</div>
									</div>
								</div>
							</form>								
						</div>		
					</div>		
				</div>		
			</div>
		</div>
	</section>
	<?php include('footer.php'); ?>
</body>
</html>