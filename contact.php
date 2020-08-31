<?php
    ob_start();
	session_start();
	include('db_conn.php');
	include('session_var.php');
	
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

	if (isset($_POST["submit2"]))
    {
        $secretKey = "6LePvrUZAAAAAJK3z-S7YtQIUR_3LZc2IDKXzfrh";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
        {
    		$name = $_POST["name"];
    		$email = $_POST["email"];
    		$p = $_POST["phone"];
    		$msg = $_POST["msg"];
    		$date = date('Y/m/d H:i:s');
    		$sql = "INSERT contact_us (`name`, `email`, `phone`, `message`, `time`, `status`) 
    				VALUES ('$name', '$email', '$p', '$msg', '$date', '0') ";
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
                $mail->Username   = 'info@textanalytics.in';                     // SMTP username
                $mail->Password   = 'vivek12##';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom('info@textanalytics.in','Text Analytics Research');
                $mail->addAddress($email, $name);     // Add a recipient
                $mail->addAddress($email);               // Name is optional
                $mail->addReplyTo('info@textanalytics.in','info');
             
                // Content
                $mail->isHTML(false);                                  // Set email format to HTML
                $mail->Subject = 'Text Analytics Feedback Submitted';
                $mail->Body    = "Hello ".$name.",\n\nThanks for getting in touch.\n\nYour feedback has been sucessfully submitted in Text Analytics Research.\n\nWe appreciate you contacting Text Analytics Research. Admin will reply by email as soon as possible.\n\nHave a great day.\n\n\nThanks & Regards\nAdmin Text Analytics";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo '<script type="text/javascript">
    			                    window.onload = function () 
    			                    { alert("Feedback Submitted Successfully"); }
    			                    </script>';
            } catch (Exception $e) {
             //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        else
            echo '<script type="text/javascript">
    			                    window.onload = function () 
    			                    { alert("Please check recaptcha"); }
    			                    </script>';
    
    }
	$query = "SELECT * FROM contact_details WHERE id=1 ";

	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	$addr = $row["address"];
	$p = $row["phone"];
	$e = $row["email"];
	$work_time = $row["work_time"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<?php include('header.php'); ?>

	<!-- Courses section -->
	<section class="contact-page spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8 event-item">
					<div class="contact-form spad pb-0">
						<div class="section-title text-center"  style="margin-bottom:20px;">
							<h3>CONTACT US</h3>
							<p>The group would be very happy to provide consultation to organizations as well as individuals who are dealing with some routine or complex problems in the area. Please feel free to get in touch with us through the following form.</p>
						</div>
						<form class="comment-form --contact" method="POST" action="">
							<div class="row">
								<div class="col-lg-4">
									<input type="text" placeholder="Your Name" name="name" pattern="[A-Za-z ]{1,}" maxlength="50" title="Name must contain alphabets only." required>
								</div>
								<div class="col-lg-4">
									<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"" placeholder="Your Email" name="email" required>
								</div>
								<div class="col-lg-4">
									<input type="text" placeholder="Contact No" name="phone" pattern="[\d*]{10,}" maxlength="10" title="Phone number must contain 10 digits" required>
								</div>
								<div class="col-lg-12">
									<textarea placeholder="Message" name="msg" required  style="margin-bottom:20px;"></textarea>
								
									<div class="text-center">
										<center><div class="g-recaptcha" data-sitekey="6LePvrUZAAAAANFnU0IRdEXNy8CDAgrN3euAaAq1"></div>
									    <span id="captcha_error" class="text-danger"></span></center><br>
										<button class="site-btn" name="submit2">SUBMIT</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>		
		
				<div class="col-md-4 event-item">
					<div class="contact-info-warp" style="margin-top:80px; max-height:480px">
						<div class="contact-info">
							<h4>Address</h4>
							<p><?php echo $addr ;?></p>
						</div>
						<div class="contact-info">
							<h4>Phone</h4>
							<p><?php echo $p ;?></p>
						</div>
						<div class="contact-info">
							<h4>Email</h4>
							<p><?php echo $e ;?></p>
						</div>
					</div>
				</div>
				
			</div>
			<center><div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=cc%20bhu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div></center>
		</div>
	</section>
	<!-- Courses section end-->



	<?php include('footer.php'); ?>
	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script>
	
</body>
</html>