<?php

/**
 * Template Name: User Profile
 */

get_header();
?>

<section class="page_title_sec">
	<div class="container">
		<div class="page_title"><h1>Directory Frontend</h1></div>
	</div>
</section><!-- /page_title -->

<section class="company_info sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="ci_left">
					<div class="ci_title">
						<h2>Company Name</h2>
					</div><!-- /ci_title -->

					<div class="company_logo">
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/logo_bg.png" alt="logo"></a>
					</div>

					<a class="button btn_sponsor" href="#">Gold sponsor</a>

					<div class="df_block">
						<p>12345 Maple View Drive Suite 450 San Diego, CA 92064 USA</p>

						<h3>Contact person</h3>
						<a href="#">Julianna Smith</a>
					</div>
					
					<div class="df_block">
						<h3>Region</h3>
						<span class="region_name">NAM</span>
					</div>

					<div class="df_block">
						<h3>Areas of Focus</h3>
						<ul>
							<li>Area of Focus</li>
							<li>Area of Focus</li>
							<li>Area of Focus</li>
							<li>Area of Focus</li>
							<li>Area of Focus</li>
							<li>Area of Focus</li>
						</ul>
					</div>

					<div class="df_block">
						<h3>Company Category</h3>
						<ul>
							<li>Company Category</li>
							<li>Company Category</li>
							<li>Company Category</li>
							<li>Company Category</li>
							<li>Company Category</li>
							<li>Company Category</li>
						</ul>
					</div>
				</div>
			</div><!-- /ci_left -->

			<div class="col-sm-8">
				<div class="ci_right">
					<div class="ci_title">
						<h2>Company description</h2>
					</div><!-- /ci_title -->
					<div class="ci_desc">
						<p>Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. In molestie elit dui dictum, praesent nascetur pulvinar sed, in dolor pede in aliquam, risus nec error quis pharetra. Eros metus quam augue suspendisse, metus rutrum risus erat in. In ultrices quo ut lectus, etiam vestibulum urna a est, pretium luctus euismod nisl, pellentesque turpis hac ridiculus massa. Venenatis a taciti dolor platea, curabitur lorem platea urna odio, convallis sit pellentesque lacus proin. Et ipsum velit diam nulla, fringilla vel tincidunt vitae, elit turpis tellus vivamus, dictum adipiscing convallis magna id.</p>
					</div>

					<div class="df_block">
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>

							<label class="visit_ow">Visit our website</label>
						</div>
					</div>

					<div class="df_block">
						<h2>Latest news</h2>
						<p>Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc.</p>
						<p>Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel.</p>
						<p>Eros metus quam augue suspendisse, metus rutrum risus erat in. In ultrices quo ut lectus, etiam vestibulum urna a est, pretium luctus euismod nisl, pellentesque turpis hac ridiculus massa.</p>
						<p>Venenatis a taciti dolor platea, curabitur lorem platea urna odio, convallis sit pellentesque lacus proin. Et ipsum velit diam nulla, fringilla vel tincidunt vitae, elit turpis tellus vivamus, dictum adipiscing convallis magna id.</p>
					</div>

					<div class="df_block">
						<div class="df_contact">
							<form action="">
								<div class="form-group">
									<input class="left" type="text" name="df_name" id="df_name" placeholder="Your Name">
									<input class="right" type="email" name="df_email" id="df_email" placeholder="Email Address">
									<textarea name="df_message" id="df_message" cols="30" rows="10"></textarea>
									<input type="submit" class="button right" value="Send">
								</div>

							</form>
						</div>
					</div>
				</div>
			</div><!-- /ci_right -->
		</div><!-- /row -->

	</div>
</section><!-- /company_info -->
