<?php
/**
 * Template Name: Frontpage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Talent Board
 */

get_header(); ?>
<section class="home_banner">
	<div class="container">
		<div class="hb_content">
			<div class="stack_up">
				<div class="stack_up_pic">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/stack_up_img.png" alt="stack_up_img">
					<a class="button btn_download" href="#">Register Today</a>
				</div>
			</div><!-- /stack_up -->

			<div class="hb_event_half">
				<div class="hb_event_half_in">
					<div class="event_box bg_yellow">
						<div class="event_top">
							<span class="title_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/event_icon_01.png" alt="event_icon_01"></span>
							<h3>Our Next Workshop</h3>
						</div>

						<div class="event_content">
							<div class="feature_title">
								<h2>Excepteur sint ocaecat cupidatat non proident.</h2>
							</div>

							<div class="meta">
								<span class="date">AUGUST 24, 2015</span>
								<span class="time">1:00PM EST / 4:00PM PST</span>
							</div>

							<a class="button btn_register" href="#">Register Today!</a>
						</div>
					</div>
				</div>

				<div class="hb_event_half_in">
					<div class="event_box bg_orange_red">
						<div class="event_top">
							<span class="title_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/event_icon_02.png" alt="event_icon_02"></span>
							<h3>Talent Board's Latest articles</h3>
						</div>

						<div class="event_content">
							
							<div id="event_slider" class="flexslider">
								<ul class="slides">
									<li>
										<div class="feature_title">
											<h2>Domnis iste nat error voluptatem accusan tiuma.</h2>
										</div>
										<div class="meta">
											<span class="by_who">BY ELAINE ORLER</span>
											<span class="date">JANUARY 25, 2015</span>
										</div>
										<a class="more_event" href="#">More</a>
									</li><!-- /slider_item -->

									<li>
										<div class="feature_title">
											<h2>Excepteur sint ocaecat cupidatat non proident.</h2>
										</div>
										<div class="meta">
											<span class="date">AUGUST 24, 2015</span>
											<span class="time">1:00PM EST / 4:00PM PST</span>
										</div>
										<a class="more_event" href="#">More</a>
									</li><!-- /slider_item -->
									<li>
										<div class="feature_title">
											<h2>Domnis iste nat error voluptatem accusan tiuma.</h2>
										</div>
										<div class="meta">
											<span class="by_who">BY ELAINE ORLER</span>
											<span class="date">JANUARY 25, 2015</span>
										</div>
										<a class="more_event" href="#">More</a>
									</li><!-- /slider_item -->

									<li>
										<div class="feature_title">
											<h2>Excepteur sint ocaecat cupidatat non proident.</h2>
										</div>
										<div class="meta">
											<span class="date">AUGUST 24, 2015</span>
											<span class="time">1:00PM EST / 4:00PM PST</span>
										</div>
										<a class="more_event" href="#">More</a>
									</li><!-- /slider_item -->
									<li>
										<div class="feature_title">
											<h2>Domnis iste nat error voluptatem accusan tiuma.</h2>
										</div>
										<div class="meta">
											<span class="by_who">BY ELAINE ORLER</span>
											<span class="date">JANUARY 25, 2015</span>
										</div>
										<a class="more_event" href="#">More</a>
									</li><!-- /slider_item -->
								</ul>
							</div><!-- /event_slider -->

						</div>
					</div>
				</div>
			</div><!-- /hb_event_half -->
		</div><!-- /hb_content -->
	</div>
</section><!-- /home_banner -->

<section class="sec_block feature_panel">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="feature_item">
					<div class="feature_title">
						<h2>Featured Report</h2>
						<a class="show_all" href="#">All &raquo;</a>
					</div>

					<div class="ft_item_content">
						<div class="item_title">Lorem ipsum dolor sit amet</div>
						<div class="ft_item_desc">
							<div class="item_logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/feature_icon_01.png" alt="feature_icon"></div>
							<p>Nemo enim ipsam faroit aut fugit voluptatem quia voluptas sitea quite aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione,nesciunt.</p>

							<a class="feature_btn button" href="#">Download Report</a>
						</div>
					</div>
				</div>
			</div><!-- /feature_item -->

			<div class="col-sm-4">
				<div class="feature_item">
					<div class="feature_title">
						<h2>Latest Article</h2>
						<a class="show_all" href="#">All &raquo;</a>
					</div>

					<div class="ft_item_content">
						<div class="item_title">Duis aute dolor in reprehenderit </div>
						<div class="ft_item_desc">
							<div class="item_logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/feature_icon_02.png" alt="feature_icon"></div>
							<p>Nemo enim ipsam faroit aut fugit voluptatem quia voluptas sitea quite aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione,nesciunt.</p>

							<a class="feature_btn button" href="#">Read Article</a>
						</div>
					</div>
				</div>
			</div><!-- /feature_item -->

			<div class="col-sm-4">
				<div class="feature_item">
					<div class="feature_title">
						<h2>Next Event</h2>
						<a class="show_all" href="#">All &raquo;</a>
					</div>

					<div class="ft_item_content">
						<div class="item_title">Neque porro quisquam 2015</div>
						<div class="ft_item_desc">
							<div class="item_logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/feature_icon_03.png" alt="feature_icon"></div>
							<p>Nemo enim ipsam faroit aut fugit voluptatem quia voluptas sitea quite aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione,nesciunt.</p>

							<a class="feature_btn button" href="#">Register Today</a>
						</div>
					</div>
				</div>
			</div><!-- /feature_item -->
		</div>
	</div>
</section><!-- /feature_panel -->

<section class="global_sponsors sec_block">
	<div class="container">
		<div class="gbs_content row">
			<div class="col-sm-12">
				<div class="sec_title"><h1>Global Sponsors</h1></div>
			</div>
			
			<div class="col-sm-12">
				<ul class="sponsors">
					
				</ul>
			</div>

			<div class="col-sm-12">
				<a class="button" href="#">Become a Sponsor</a>
			</div>
		</div>
	</div>
</section><!-- /global_sponsors -->

<section class="ignore_count sec_block">
	<div class="container">
		<div class="ign_count_content row">
			<div class="col-sm-12">
				<div class="sec_title"><h1>Numbers you can't ignore</h1></div>
			</div>

			<div class="col-sm-12">
				<ul class="ign_count_block">
					<li><div class="count_box c_box1"><span class="ign_number">45K</span></div></li>
					<li><div class="count_box c_box2"><span class="ign_number">1500</span></div></li>
					<li><div class="count_box c_box3"><span class="ign_number">45K</span></div></li>
					<li><div class="count_box c_box4"><span class="ign_number">45K</span></div></li>
					<li><div class="count_box c_box5"><span class="ign_number">45K</span></div></li>
				</ul>
			</div>

			<div class="col-sm-12">
				<div class="content_desc">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident.</p>

					<a class="button" href="#">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</section><!-- /ignore_count -->

<section class="tb_newsletter sec_block">
	<div class="container">
		<div class="newsletter_block">
			<div class="newsletter_title">
				<h2>join the talent board newsletter</h2>	
			</div>
			<div class="nl_form">
				<form action="post">
					<div class="form-group">
						<input type="text" placeholder="Name" name="nl_name" id="nl_name">
						<input type="email" placeholder="Email" name="nl_email" id="nl_email">
						<input class="button" type="submit" value="Sign-up!" id="nl">
					</div>
				</form>
			</div>
		</div>
	</div>
</section><!-- /tb_newsletter -->

<section class="sec_block twitter_feed">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tw_feed_content">
					<div class="tw_feed_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/twitter_icon.png" alt="twitter_icon"></div>
					<div class="content_desc">
						<a href="#">Jimmy Johnson   @CandidateGuru</a>
						<p>Via @talentura: Stop talking about Candidate Experience & start doing something! http://bit.ly/1M6Fhm1  #HR #Recruiting #CandidateExperience  #CandEs</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- /tb_newsletter -->

<section class="sec_block about">
	<div class="container">
		<div class="about_content">
			<div class="sec_title"><h1>About the Talent Board</h1></div>
			<div class="content_desc">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			</div>

			<div class="more_about"><a class="button" href="#">Learn More</a></div>
		</div>
	</div>
</section><!-- /about -->
<?php get_footer();?>