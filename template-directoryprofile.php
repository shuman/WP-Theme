<?php
/**
 * Template Name: Directory Profile
 */

if(is_user_logged_in() && get_user_meta(get_current_user_id(), 'company_name', true) ){
	//
}
else{
	if(!isset($_GET['c']) || empty($_GET['c'])){
		// wp_safe_redirect( get_home_url() );
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 ); 
		exit();
	}
}

get_header();
			
		$user_data = get_user_by('slug', $_GET['c']);
		// var_dump($user_data);
		 
		$user_id = $user_data->ID;

		$user_meta = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user_id ) );
		//remove_query_arg( 'company', $user_id )
		//var_dump($user_meta);
?>

<section class="page_title_sec">
	<div class="container">
		<div class="page_title"><h1>Directory Profile</h1></div>
	</div>
</section><!-- /page_title -->

<section class="company_info sec_block">
	<div class="container">
		<?php if($user_meta['directory_category'] == "Volunteers"){ ?>
			<div style="position:absolute;top:-30px;"><a href="/directory/volunteers/">&#8629; Back to Volunteer List</a></div>
		<?php } else{ ?>
			<div style="position:absolute;top:-30px;"><a href="/directory/sponsors/">&#8629; Back to Sponsor List</a></div>
		<?php }?>
		<div class="row">
			<div class="col-sm-4">
				<div class="ci_left">
					<div class="ci_title">
						<h2><?php echo $user_meta['company_name'];?></h2>
					</div><!-- /ci_title -->

					<div class="company_logo">
						<?php
						$company_logo = !empty($user_meta['company_logo']) ? $user_meta['company_logo'] : 'http://placehold.it/250x80/CCC/FFF&text=Logo';
						?>
						<img src="<?php echo $company_logo;?>" alt="logo">
					</div>

					<?php if(!$user_meta['sponsor_level']){ ?>
					
					<?php } else { ?>
						<div class="button btn_sponsor <?php echo $user_meta['sponsor_level']; ?>"><?php echo $user_meta['sponsor_level']; ?> sponsor</div>
					<?php } ?>
					<div class="df_block">
						<p><?php 
							if($user_meta['street_address'])
								{ echo $user_meta['street_address'].', ';} 
							if($user_meta['city'])
								{echo $user_meta['city'].', ';} 
							if($user_meta['state'])
								{echo $user_meta['state'].', ';} 
							echo $user_meta['country'];?>
						</p>

						<h3>Contact person</h3>
						
						<?php $regions = explode('|', $user_meta['region']); $region = get_region(); //var_dump($region);
							
							if($user_meta['directory_category'] == "Underwriters" || $user_meta['sponsor_level'] == "Platinum"){ ?>
							
							<?php if(($region == "NAM") && isset($user_meta['nam_contact_name'])){ 

								?>	
										<span class="region_name"><?php echo isset($user_meta['nam_contact_name']) ? $user_meta['nam_contact_name'] : '';?></span><br />
								<?php } ?>
								<?php if(($region == "EMEA") && isset($user_meta['emea_contact_name'])){ ?>	
										<span class="region_name"><?php echo isset($user_meta['emea_contact_name']) ? $user_meta['emea_contact_name'] : '';?></span><br />
								<?php } ?>
								<?php if(($region == "APAC") && isset($user_meta['apac_contact_name'])){ ?>	
										<span class="region_name"><?php echo isset($user_meta['apac_contact_name']) ? $user_meta['apac_contact_name'] : '';?></span><br />
								<?php } ?>
							
							<?php } else { ?>
							
								<span class="region_name"><?php echo isset($user_meta['contact_name']) ? $user_meta['contact_name'] : '';?></span>
							
							<?php }?>
						
					</div>
					
					<div class="df_block">
						<h3>Region</h3>
						
						<span class="region_name"><?php echo isset($user_meta['region']) ? implode(', ', explode("|", $user_meta['region'])) : 'none'; ?></span>
					</div>
			
					<div class="df_block">
						<h3>Areas of Focus</h3>
						<ul>
							<?php
							$area_focuses = explode('|', isset($user_meta['area_focus']) ? $user_meta['area_focus'] : '');
							foreach ($area_focuses as $area_focus) {
								echo '<li>'.$area_focus.'</li>';
							}
							?>
						</ul>
					</div>

					<div class="df_block">
						<h3>Company Category</h3>
						<ul>
							<?php
							$company_categories = explode('|', isset($user_meta['company_category']) ? $user_meta['company_category'] : '');
							foreach ($company_categories as $company_category) {
								echo '<li>'.$company_category.'</li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div><!-- /ci_left -->

			<div class="col-sm-8">
				<div class="ci_right">
					<div class="ci_title">
						<?php if($user_meta['directory_category'] == "Volunteers"){ ?>
							<h2>My Bio</h2>
						<?php } else{ ?>
							<h2>Company description</h2>
						<?php }?>
						
					</div><!-- /ci_title -->
					<div class="ci_desc">
						<?php echo isset($user_meta['company_long_desc']) ? $user_meta['company_long_desc'] : '';?>
					</div>

					<div class="df_block">
						<div class="footer_social">
							<ul>
								<li><a href="<?php echo isset($user_meta['facebook']) ? $user_meta['facebook'] : '';?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo isset($user_meta['twitter']) ? $user_meta['twitter'] : '';?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo isset($user_meta['linkedin']) ? $user_meta['linkedin'] : '';?>"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="<?php echo isset($user_meta['google_plus']) ? $user_meta['google_plus'] : '';?>"><i class="fa fa-google-plus"></i></a></li>
							</ul>

							<a href="<?php echo isset($user_meta['company_url']) ? $user_meta['company_url'] : '';?>" class="visit_ow">
								<?php if($user_meta['directory_category'] == "Volunteers"){ ?>
									Visit my website
								<?php } else{ ?>
									Visit our website
								<?php }?></a>
						</div>
					</div>

					<?php if($user_meta['directory_category'] == "Volunteers"){ ?>
						
					<?php } else{ ?>
						<div class="df_block">
							<h2>Latest news</h2>
							<?php echo isset($user_meta['news_box']) ? $user_meta['news_box'] : '';?>
						</div>
					<?php }?>

					<div class="df_block">
						<div class="ci_title">
						<?php if($user_meta['directory_category'] != "Volunteers"){ ?>
							<h2>Contact Our Company</h2>
						<?php } else{ ?>
							<h2>Contact Me</h2>
						<?php }?>
						</div><!-- /ci_title -->
						<div class="df_contact">
							<?php 
							// var_dump($user_meta);
							// var_dump($region);
							if($user_meta['directory_category'] == "Underwriters" || $user_meta['sponsor_level'] == "Platinum"):
								$nam_contact  = isset($user_meta['nam_contact_email']) ? $user_meta['nam_contact_email'] : false;
								$emea_contact = isset($user_meta['emea_contact_email']) ? $user_meta['emea_contact_email'] : false;
								$apac_contact = isset($user_meta['apac_contact_email']) ? $user_meta['apac_contact_email'] : false;
								if($nam_contact || $emea_contact || $apac_contact): 
									?>
										<?php if($region == "NAM"): ?>
											<script type="text/javascript">
												jQuery(document).ready(function($) {
													$(".main_contact").val('<?php echo $nam_contact;?>');
													//$(".region_contact").val('<?php echo $nam_contact;?>');
												});
											</script>
										<?php endif; ?>
										<?php if($region == "EMEA"): ?>
											<script type="text/javascript">
												jQuery(document).ready(function($) {
													$(".main_contact").val('<?php echo $emea_contact;?>');
												});
											</script>
										<?php endif; ?>
										<?php if($region == "APAC"): ?>
											<script type="text/javascript">
												jQuery(document).ready(function($) {
													$(".main_contact").val('<?php echo $apac_contact;?>');
												});
											</script>
										<?php endif; ?>
									<?php 
								endif; 
							endif; 
							?>
							<?php the_content(); ?>
						</div>

					</div>
				</div>
			</div><!-- /ci_right -->
		</div><!-- /row -->

	</div>
</section><!-- /company_info -->
<?php get_footer(); ?>
