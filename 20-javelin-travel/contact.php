<?php include 'top-header.php';?>

<section class="breadcrumb-blog-version-one">
	<div class="single-bredcurms" style="background-image:url('images/contact-page.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="bredcrums-content">
						<h2>Contact</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- blog breadcrumb version one end here -->


<!--===== Contact form =====-->
<!--===== Contact form =====-->
<section class="section-paddings">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="contact-title">
					<h2>Our Office</h2>
				</div>
				<div class="address">
					<p>
						<strong>Address</strong>
						<br> 18 St yourAdress, Cairo <br> Room 1201, Tecco Tower C Apartment <br> Quang Trung Ward, NY City,  USA
					</p>
					<p>
						<strong>Website</strong>
						<br> youdomain.com
					</p>
					<p>
						<strong>Email</strong>
						<br> info@yourdomian.com
					</p>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="contact-title">
					<h2>Contact</h2>
				</div>
				<div class="contact-form">
					<div id="contact">  
						<div id="message"></div> 						
						<!-- Contact Form -->
						<form class="form" method="post" action="contact.php" name="contactform" id="contactform">
							<div class="form-group">
								<input type="text" placeholder="Name" required="required" name="name" id="name">
							</div>
							<div class="form-group">
								<input type="email" placeholder="Email" required="required" name="email" id="email">
							</div>
							<div class="form-group">
								<input type="text" placeholder="Subject" required="required" name="subject" id="subject">
							</div>
							<div class="form-group">
								<textarea name="message" rows="6" placeholder="Message" id="comments"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="button primary"><i class="fa fa-send"></i>Submit</button>
							</div>
						</form><!--/ End Contact Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




<?php include 'footer.php';?>