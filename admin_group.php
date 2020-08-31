<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	if((!isset($_SESSION['user_id'])) || ($_SESSION['user_rank'] !=1))
	{
	 header("location:logout.php");
	}
	
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
        


	if (isset($_POST["submit"]))
    {
    	$name = $_POST["name"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
    	$sql = "INSERT INTO members (`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
    	$result=mysqli_query($conn,$sql);
    	
    	 
        $address=$email;
        
     // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
   
    
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isMail();                                            // Send using SMTP
    $mail->Host       = 'localhost';                    // Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@textanalytics.in';                     // SMTP username
    $mail->Password   = 'vivek12##';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('admin@textanalytics.in','Admin Text Analytics');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('info@textanalytics.in','info');
 
    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'Text Analytics Registration';
    $mail->Body    = "Hello ".$name.",\n\nYour account has been sucessfully registered in Text Analytics Research.\n\nYour password : ".$pass."\n\nUpdate your profile here\nhttp://textanalytics.in/login.php\n\n\n\nThanks & Regards\nAdmin Text Analytics";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
 //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
	<?php include('admin_header.php'); ?>
	<!-- Team section  -->
	<section class="team-section spad">
		<div class="container">			
			<div class="row">
			<?php
				$query = "SELECT * FROM members ORDER BY name";

				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
				//$image = $row["image"];				
				?>
				<div class="col-md-6 col-lg-3">
					<div class="course-item">
						<div class="card">
							<div class="card-body">
								<div class="member">
									<div class="member-pic set-bg" data-setbg="<?php echo $row['photo']; ?>">										
									</div>
									<h4><?php echo $row['name']; ?></h4>
								</div>			
							</div>
						</div>
					</div>
				</div>
				 <?php } ?>
				
				<div class="col-md-6 col-lg-3">
					<div class="course-item">
						<div class="card">
							<div class="card-body">
								<div class="member">
									<a class="popup-with-form" href="#test-form">
										<div class="member-pic set-bg" data-setbg="img/plus.jpg"></div>
									</a>
									<h4>Add New</h4>
								</div>			
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Team section end -->

		<br><br>
		

<!-- Add New Form -->
<div id="test-form" class="col-md-4 form-popup mfp-hide">
	<div class="section-title text-center">
		<h3>Add New Member</h3>
	</div>
	<form class="comment-form --contact" action="admin_group.php" method="POST">
		<div class="row">
			<div class="col-lg-12">
				<input name="name" id="name" type="text" placeholder="Name" required>
			</div>
			<div class="col-lg-12">
				<input name="email" id="email" type="email" placeholder="Email" required>
			</div>
			<div class="col-lg-12">
				<input name="pass" id="pass" type="password" placeholder="Password" required>
			</div>
			<div class="col-lg-12">
				<div class="text-center">
					<button class="site-btn" type="submit" id="submit" name="submit" >SUBMIT</button>
				</div>
			</div>
		</div>
	</form>
</div>
	<?php include('footer.php'); ?>
</body>
</html>