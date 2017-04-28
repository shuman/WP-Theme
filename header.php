<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Talent Board
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri();?>/images/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/fav/favicon-16x16.png">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/favicon.ico">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/images/fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/images/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript">
	var site_url = '<?php echo site_url();?>';
	var admin_ajax = '<?php echo admin_url("admin-ajax.php");?>';
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="wrap">
		<section class="topbar">
			<div class="container">
				<?php 
				/*
				<div class="top_menu">
					<?php wp_nav_menu( array('theme_location'=>'top-menu','container'=>'','menu_class'=>'top_nav' ) );?>
				</div>
				*/
				?>
				<div class="top_menu">
					<ul class="top_nav">
						<?php if(get_region()){?>
						<li style="background:#fdc500;"><a href="" style="color:#fff;">Your Region: <strong><?php echo get_region(); ?></strong></a></li>
						<?php } ?>
						<li>
							<a href="javascript:void(0)" onclick="jQuery('#setRegion').modal();"><?php if(get_region()){ echo "Change your region"; }else {echo "Choose your region";} ?></a>
						</li>
						<li class="hide_600"><a href="/contact">Contact Us</a></li>
						<?php if ( is_user_logged_in() ):?> 
							<?php $user = wp_get_current_user();
									if ( in_array('directory_members', $user->roles) )
									{ ?>
								<li><a href="<?php echo get_permalink( 56 ); ?>">Update Profile</a></li>
							<?php } ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" id="change_pass" data-toggle="dropdown">Change Password</a>
								<div class="dropdown-menu" style="width: 270px">
									<form method="post">
										<fieldset class="top_login">
											<div class="form-group">
												<label for="tl_password">Current Password</label>
												<input type="password" name="tl_password" id="tl_password" />
											</div>
											<div class="form-group">
												<label for="tl_password">New Password</label>
												<input type="password" name="tl_password" id="tl_password" />
											</div>
											<div class="form-group">
												<label for="tl_password">Confirm New Password</label>
												<input type="password" name="tl_password" id="tl_password" />
											</div>
											<div class="form-group">
												<input type="submit" class="btn_sign_in" value="Update Password">
											</div>				

										</fieldset>
									</form>
								</div> <!-- /dropdown-menu -->
							</li>
							<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout <i class="fa fa-sign-out"></i></a></li>
						<?php else: ?>
							<!--li class="dropdown">
								<a href="#" class="dropdown-toggle" id="register" data-toggle="dropdown">Sign Up</a>
								<div class="dropdown-menu" style="width: 270px">
									<form method="post">
										<fieldset class="top_login">
											<div class="form-group">
												<label for="tl_first_name">First Name</label>
												<input type="text" name="first_name" id="tl_first_name" required />
											</div>
											<div class="form-group">
												<label for="tl_last_name">Last Name</label>
												<input type="text" name="last_name" id="tl_last_name" required />
											</div>
											<div class="form-group">
												<label for="tl_username">Username</label>
												<input type="text" name="username" id="tl_username" required />
											</div>
											<div class="form-group">
												<label for="tl_register_email">Email</label>
												<input type="email" name="email" id="tl_register_email" required />
											</div>
											<div class="form-group">
												<input type="submit" class="btn_sign_in" value="Sign Up">
											</div>				
											<div class="social_login" style="display:none;">
												<ul> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=Facebook';?>"><i class="fa fa-facebook"></i></a></li> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=Google';?>"><i class="fa fa-google-plus"></i></a></li> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=LinkedIn';?>"><i class="fa fa-linkedin"></i></a></li> 
												</ul> 
											</div>
										</fieldset>
									</form>
								</div> <!-- /dropdown-menu -->
							</li-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" id="login" data-toggle="dropdown">Login</a>
								<div class="dropdown-menu" style="width: 270px">
									<form method="post" action="/wp-login.php">
										<fieldset class="top_login">
											<div class="form-group">
												<label for="tl_login_email">Username</label>
												<input type="text" name="log" id="tl_login_email" required />
											</div>
											<div class="form-group">
												<label for="tl_password">Password</label>
												<input type="password" name="pwd" id="tl_password" required />
											</div>
											<div class="form-group">
												<a href="/wp-login.php?action=lostpassword">Forgot Password?</a>
												<input type="submit" class="btn_sign_in" value="Sign In">
											</div>				
											<div class="social_login" style="display:none;">
												<ul> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=Facebook';?>"><i class="fa fa-facebook"></i></a></li> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=Google';?>"><i class="fa fa-google-plus"></i></a></li> 
													<li><a href="<?php echo admin_url("admin-ajax.php").'?action=hybridauth&provider=LinkedIn';?>"><i class="fa fa-linkedin"></i></a></li> 
												</ul> 
											</div>
										</fieldset>
									</form>
								</div> <!-- /dropdown-menu -->
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</section><!-- /topbar -->

		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo">
							<a href="<?php echo site_url();?>">
								<?php if( vpt_option('header_logo') ): ?>
								<img src="<?php echo vpt_option('header_logo');?>" alt="Talent Board"></a>
							<?php else: ?>
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/logo_bg.png" alt="Talent Board"></a>
							<?php endif; ?>
							</a>
						</div><!-- /logo -->
					</div>

					<div class="col-sm-9">
						<div class="menuber">
							<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive_nav">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="collapse navbar-collapse" id="responsive_nav">
									<?php 
										wp_nav_menu( 
											array(
												'theme_location' =>'main-menu',
												'container'      =>'',
												'menu_class'     =>'nav navbar-nav',
												'fallback_cb'    => 'wp_bootstrap_navwalker::fallback', 
												'walker'         => new wp_bootstrap_navwalker()
											) 
										);
									?>
								</div><!-- /.navbar-collapse -->
							</nav>
						</div><!-- /menuber -->
					</div>
				</div><!-- /row -->
			</div>
		</header><!-- /header -->

