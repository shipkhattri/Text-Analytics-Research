<?php
    session_start();
	include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Text Analytics</title>
	<?php include('head_links.php'); ?>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon_my.ico">

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="JHb2NAYy"></script></div>
                               
</head>
<body>
	<?php include('header.php'); ?>

	    <div style=" max-width: 100%;">
			<div class="row" style="margin: 0px; padding: 0px; max-width: 100%;">
				<div class="col-lg-9" style="padding: 0px">
					<div class="post-item">
						<section class="hero-section">
							<div class="hero-slider owl-carousel" style="height: 100%;">
								<?php
									$query = "SELECT * FROM slider";
									$result=mysqli_query($conn,$query);
									 while($row = mysqli_fetch_array($result)) 
									 {
								?>	
								<div class="hs-item set-bg" data-setbg="<?php echo $row['image']; ?>" style="max-height: 470px;"></div>
								<?php } ?>
							</div>
						</section>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-3" style="padding: 20px">
					<div class="widget" style="padding-left: 10px">
						<center><h3 class="widget-title">NEWS & UPDATES</h3></center>
						<div class="recent-post-widget">
    						<div style="  overflow: hidden;  height: 390px;">
							   <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
        							<?php
        								$query = "SELECT * FROM recent_updates";
        
        								$result=mysqli_query($conn,$query);
        								 while($row = mysqli_fetch_array($result)) 
        								 { ?>
            							<!-- recent post -->
            							<div style="cursor:pointer" onclick="window.open('<?php echo $row['url']; ?>')">
            							    <div class="rp-item">
                								<div class="rp-thumb set-bg" data-setbg="img/news/<?php echo $row['image']; ?>"></div>
                								<div class="rp-content">
                									<h6><?php echo $row['content']; ?></h6>
                									<p><i class="fa fa-clock-o"></i><?php echo $row['date']; ?></p>
                								</div>
            							    </div>
            							</div>
            							<?php } ?>	
    							</marquee>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Blog page section end -->

	<!-- Blog section -->
	<section class="blog-section spad" style="padding-top:0px;">
		<div class="container">
			<div class="section-title text-center">
				<h3>RECENT POSTS</h3>
			</div>
			<div id="accordion">
			<div class="row">
			<?php
				$query = "SELECT * FROM recent_posts";
                $i=0;
				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result)) 
				 {
				     $i+=1;
			?>
				<div class="col-xl-6" class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
					<div class="blog-item">
					    	<div class="row">
				                <div class="col-md-12">
            						<div class="blog-thumb set-bg" data-setbg="img/post/<?php echo $row['image']; ?>"></div>
            						<div class="blog-content" style="min-height:190px;">
            							<h5><?php echo $row['title']; ?></h5>
            							<div class="blog-meta">
            								<span><i class="fa fa-calendar-o"></i><?php echo $row['date']; ?></span>
            								<span><i class="fa fa-user"></i>Vivek Kumar Singh</span>
            							</div>
            						</div>
            					</div>
            					<div id="collapse<?php echo $i; ?>" class="collapse" data-parent="#accordion">
                					<div class="col-md-12">
    					                <p style="text-align: justify;"><?php echo $row['content']; ?>&nbsp;<a href="<?php echo $row['link']; ?>" target="_blank"><i class="fa fa-external-link"></i></a></p>
    					           </div>
    					       </div>
					       </div>
						</div>
				</div>
			<?php } ?>
			</div>
			</div>
	        <br>
			<div class="section-title text-center">
				<h3>SOCIAL MEDIA</h3>
			</div>
			<div class="row">
				<div class="col-xl-6" style="padding-bottom:30px;">
				    <div class="card">
							<div class="card-body">
					            <a class="twitter-timeline" data-width="600" data-height="500" href="https://twitter.com/textanalyticsin?ref_src=twsrc%5Etfw">Tweets by textanalyticsin</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			                </div>
			         </div>
				</div>
				<div class="col-xl-6" style="padding-bottom:30px;">
				    <div class="card">
							<div class="card-body">
					            <div class="fb-page" data-href="https://www.facebook.com/textanalyticsin" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/textanalyticsin" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/textanalyticsin">textanalytics.in</a></blockquote></div>
			         </div>
				</div>
			</div>
		</div>
	</section>

	<!--====== Javascripts & Jquery ======-->
<script>
	var myIndex = 0;
	carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";  
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}    
	  x[myIndex-1].style.display = "block";  
	  setTimeout(carousel, 2000); // Change image every 2 seconds
	}
</script>
	<?php include('footer.php'); ?>
</body>
</html>