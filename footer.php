	<?php
	
    	$query_xy = "SELECT * FROM contact_details WHERE id=1 ";
    
    	$result_xy=mysqli_query($conn,$query_xy);
    	$row_xy = mysqli_fetch_assoc($result_xy);
    	$addr = $row_xy["address"];
    	$phone = $row_xy["phone"];
    	$email = $row_xy["email"];
    	$work_time = $row_xy["work_time"];
	?>
	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img src="img/logo_footer_f.png" alt="" style="max-height:80px;">
						<p>Text Analytics Research is a group of researchers working in the area of text analytics, information systems, scientometrics and artificial intelligence.</p>
						<div class="social pt-1">
							<a href="<?php echo $row_xy["twitter"]; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
							<a href="<?php echo $row_xy["facebook"]; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
							<a href="<?php echo $row_xy["linkedin"]; ?>"target="_blank"><i class="fa fa-linkedin-square"></i></a>
							<a href="<?php echo $row_xy["reserch_gate"]; ?>" target="_blank" ><i class="fa fa-google-plus-square"></i></a>
							<a href="<?php echo $row_xy["mendeley"]; ?>" target="_blank"><i class="fa fa-rss-square"></i></a>
						</div>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">USEFUL LINKS</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="/index.php">Home</a></li>
							<li><a href="/about.php">About us</a></li>
							<li><a href="/resources.php">Resources</a></li>
							<li><a href="/group.php">Group</a></li>
							<li><a href="/contact.php">Contact</a></li>
						</ul>
						<ul>
							<li><a href="/research.php">Research</a></li>
							<li><a href="/publication.php">Publications</a></li>
							<li><a href="">Term</a></li>
							<li><a href="">Help</a></li>
							<li><a href="">FAQs</a></li>
							
						</ul>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">EXTERNAL LINKS</h6>
					<div class="dobule-link">
					    <ul>
							<li><a href="http://www.indianscience.net/" target="_blank">Indian Science Reports</a></li>
							<li><a href="http://www.universityselectplus.com/" target="_blank">University Select Plus</a></li>
							
						</ul>
						<ul>
					</ul>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> <?php echo $row_xy["address"]; ?></p></li>
						<li><p><i class="fa fa-phone"></i> <?php echo $row_xy["phone"]; ?></p></li>
						<li><p><i class="fa fa-envelope"></i> <?php echo $row_xy["email"]; ?></p></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- copyright -->
		<div class="copyright" hidden>
			<div class="container">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>		
		</div>
	</footer>
	<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.countdown.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/multi-step-form.js"></script>
	
	<script src="js/magnific-popup-form.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/image-upload.js"></script>