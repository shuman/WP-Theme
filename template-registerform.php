<?php 

/**
 * Template Name: Registration Form
 */

$user = wp_get_current_user();
if ( !$user->ID
	|| !in_array('directory_members', $user->roles) )
{
	wp_redirect(home_url());

	exit;
}

$umeta  = array_map(function($a)
{
	return $a[0];
}, get_user_meta($user->ID));


get_header(); ?>
	<section class="page_title_sec">
		<div class="container">
			<div class="page_title"><h1>Profile Edit</h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="company_info sec_block">
		<form name="register_directory" id="register_directory" method="post" action="<?php echo admin_url("admin-ajax.php");?>" enctype="multipart/form-data">
			<input type="hidden" name="action" value="edit_directory_member" />
			<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('dm_nonce'); ?>" />
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="ci_left">
							<div class="ci_title">
								<?php if($umeta['directory_category'] == "Volunteers"){ ?>
									<h2>My Information</h2>
								<?php } else{ ?>
									<h2>Company Information</h2>
								<?php }?>
								<p>Listed as: 

								<?php if ( isset($umeta['directory_category']) && !empty($umeta['directory_category']) ) { ?>
											<?php echo esc_attr($umeta['directory_category']); ?>
										<?php } ?>
										<br />
										<?php if ( isset($umeta['directory_category']) && ($umeta['directory_category']=='Sponsors') ) { ?>
											<div>Sponsor Level: <?php echo esc_attr($umeta['sponsor_level']); ?></div>
										<?php } ?>
								</p>

							</div><!-- /ci_title -->
							<div class="regions">
								<div class="form_title">
									<h2>Region</h2>
									<p>Select which apply</p>
								</div>

								<div class="form-group">
									<?php foreach ( array('NAM', 'EMEA', 'APAC') as $region ) { ?>
										<label>
											<input type="checkbox"
												name="region[]"
												value="<?php echo $region; ?>"
												<?php echo in_array($region, explode('|', $umeta['region'])) ? ' checked':'';?>>
												<?php echo $region; ?>
										</label>
									<?php } ?>
								</div>
							</div>
									<!--future diable region edit -->
									<?php //foreach ( array('NAM', 'EMEA', 'APAC') as $region ) { ?>
											<!-- <input type="hidden"
												name="region[]"
												value="<?php //if(in_array($region, explode('|', $umeta['region']))){echo $region;}?>" > -->
									<?php //} ?>
				
							<p>Update as necessary</p>
							<div class="form-group">
								<input type="text" name="company_name" placeholder="Company Name" required value="<?php echo isset($umeta['company_name'])? esc_attr($umeta['company_name']):'';?>">
								<input type="url" name="company_url" placeholder="Company URL" required value="<?php echo isset($umeta['company_url'])? esc_attr($umeta['company_url']):'';?>">
								<input type="text" name="street_address" placeholder="Street address" required value="<?php echo isset($umeta['street_address'])? esc_attr($umeta['street_address']):'';?>">
								<input type="text" name="city" placeholder="City" required value="<?php echo isset($umeta['city'])? esc_attr($umeta['city']):'';?>">
								<input type="text" name="state" placeholder="State" required value="<?php echo isset($umeta['state'])? esc_attr($umeta['state']):'';?>">

								<select name="country" required>
									<option value="">Select Country</option>
									<?php foreach ( array('United States', 'United Kingdom', 'Australia', 'Canada') as $country ) { ?>
										<option value="<?php echo $country; ?>"
											<?php echo (isset($umeta['country']) && $umeta['country']==$country)?' selected':'';?>>
											<?php echo $country; ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<?php $regions = explode('|', $umeta['region']); //var_dump($regions);
							if($umeta['directory_category'] == "Underwriters" || $umeta['sponsor_level'] == "Platinum"){ ?>
									<div class="form_title">
										<h2>Main Contact Information</h2>
										<p>Confirm this is the name and email you want used for potential leads</p>
									</div>
									<div class="form-group">
										<input type="text" name="contact_name" placeholder="Contact Name" required value="<?php echo isset($umeta['contact_name'])? esc_attr($umeta['contact_name']):'';?>">
										<input type="email" name="email" placeholder="Email Address" required value="<?php echo esc_attr($user->user_email); ?>">
									</div>
								<?php if(in_array("NAM", $regions )){ ?>	
									<div class="form_title">
										<h4>NAM Contact Information</h4>
									</div>
									<div class="form-group">
										<input type="text" name="nam_contact_name" placeholder="NAM Contact Name" value="<?php echo isset($umeta['nam_contact_name'])? esc_attr($umeta['nam_contact_name']):'';?>">
										<input type="email" name="nam_email" placeholder="NAM Email Address" value="<?php echo isset($umeta['nam_contact_email'])? esc_attr($umeta['nam_contact_email']):'';?>">
										
									</div>
								<?php } ?>
								<?php if(in_array("EMEA", $regions )){ ?>	
									<div class="form_title">
										<h4>EMEA Contact Information</h4>
									</div>
									<div class="form-group">
										<input type="text" name="emea_contact_name" placeholder="EMEA Contact Name" value="<?php echo isset($umeta['emea_contact_name'])? esc_attr($umeta['emea_contact_name']):'';?>">
										<input type="email" name="emea_email" placeholder="EMEA Email Address" value="<?php echo isset($umeta['emea_contact_email'])? esc_attr($umeta['emea_contact_email']):'';?>">
									</div>
								<?php } ?>
								<?php if(in_array("APAC", $regions )){ ?>	
									<div class="form_title">
										<h4>APAC Contact Information</h4>
									</div>
									<div class="form-group">
										<input type="text" name="apac_contact_name" placeholder="APAC Contact Name" value="<?php echo isset($umeta['apac_contact_name'])? esc_attr($umeta['apac_contact_name']):'';?>">
										<input type="email" name="apac_email" placeholder="APAC Email Address" value="<?php echo isset($umeta['apac_contact_email'])? esc_attr($umeta['apac_contact_email']):'';?>">
									</div>
								<?php } ?>
							<?php } else { ?>
									<div class="form_title">
										<h2>Contact Information</h2>
										<p>Confirm this is the name and email you want used for potential leads</p>
									</div>

									<div class="form-group">
										<input type="text" name="contact_name" placeholder="Contact Name" value="<?php echo isset($umeta['contact_name'])? esc_attr($umeta['contact_name']):'';?>">
										<input type="email" name="email" placeholder="Email Address" value="<?php echo isset($umeta['user_email'])? esc_attr($umeta['user_email']):'';?>">
									</div>
							<?php }?>
							
						</div>
					</div><!-- /ci_left -->
					<div class="col-sm-7">
						<div class="ci_right">
							<div class="ci_title" style="height:179px;">
								<?php if($umeta['directory_category'] == "Volunteers"){ ?>
									<h2>Your Photo</h2>
								<?php } else{ ?>
									<h2>Company logo</h2>
								<p>We already have your logo, but if you want to change it, you can here.</p>
								<?php }?>
								
								<div class="select_logo">
									<div class="form-group">
										<?php if ( isset($umeta['company_logo']) && !empty($umeta['company_logo']) ) { ?>
											<?php $params = array( 'height' => 100 ); ?>
											<?php $company_logo = bfi_thumb( $umeta['company_logo'], $params ); ?>
											<div><img src="<?php echo $company_logo; ?>" alt="<?php echo esc_attr($umeta['company_name']); ?>"></div>
										<?php } ?>
										<input class="select_item" type="file" name="company_logo" />
									</div>
								</div>
							</div><!-- /ci_title -->
							<div class="form-group">
								<div class="form_title">
									<?php if($umeta['directory_category'] == "Volunteers"){ ?>
										<h2>Bio</h2>
										<p>Use this to provide a full description of your company and services.  There is a limit of 75 words.  You can also add photos using the "Add Media" option.</p>
									<?php } else{ ?>
										<h2>Long Description</h2>
										<p>Use this to provide a full description of your company and services.  There is a limit of 150 words.  You can also add photos using the "Add Media" option.</p>
									<?php }?>
								</div>
								<?php // wp_editor( '', 'company_long_desc', $settings = array('textarea_rows'=>5, 'teeny'=>true) ); ?>
								<?php 
								$editor_content = isset($umeta['company_long_desc']) ? $umeta['company_long_desc'] : '';
								$settings = array(
												'textarea_rows'=>5, 
												'teeny'=>true,
												'media_buttons'=>true,
											);

								wp_editor( $editor_content, 'company_long_desc', $settings ); ?><br /><br /><br />

								<?php if($umeta['directory_category'] == "Volunteers"){ ?>
										
								<?php } else{ ?>
									<div class="form_title">
										<h3>Short Description</h3>
										<p>Provide a brief description of your company and services.  Note there is a limit of 75 words.</p>
									</div>
										<textarea name="company_short_desc" id="cs_desc" cols="30" rows="8" placeholder="Company short description"><?php echo isset($umeta['company_short_desc'])? esc_html($umeta['company_short_desc']):'';?></textarea>
								<?php }?>

							</div>
						</div>
					</div><!-- /ci_right -->
				</div><!-- /row -->
				<hr>
				<?php if($umeta['directory_category'] == "Volunteers"){ ?>
										
				<?php } else{ ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="news_box">
							<div class="form_title">
								<h2>News Box</h2>
								<p>Use this area to include any events or press mentions regarding your company support of the CandEs.  We recommend headlines with links to the original source.</p>
							</div>
							<div class="form-group">
								<?php wp_editor( (isset($umeta['news_box'])?$umeta['news_box']:''), 'news_box', $settings = array('textarea_rows'=>10) ); ?>
							</div>
						</div>
					</div>
				</div><!-- /row -->
				<?php }?>
				<div class="row select_opt">
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-xs-6">
								<div class="opt_item">
									<h3>Areas of Focus</h3>
									<div class="form-group">
										<?php $umeta_area_focus = explode('|', $umeta['area_focus']); ?>
										<?php foreach ( array("Assessments", "Verifications", "Branding", "Consulting", "HCM", "Job Boards", "Onboarding", "Learning", "Mobile", "Performance Management", "Recruitment Agency", "RPO", "Sourcing", "Video Interviewing") as $area_focus ) { ?>
											<label>
												<input type="checkbox"
													name="area_focus[]"
													value="<?php echo $area_focus; ?>"
													<?php echo in_array($area_focus, $umeta_area_focus) ? 'checked' : ''; ?> >
												<?php echo $area_focus; ?>
											</label>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="opt_item">
									<h3>Company Category</h3>
									<div class="form-group">
										<?php $umeta_company_category = explode('|', $umeta['company_category']); ?>
										<?php foreach ( array("Recruiting Technology", "Recruiting Services", "Consulting Services") as $company_category ) { ?>
											<label>
												<input type="checkbox"
													name="company_category[]"
													value="<?php echo $company_category; ?>"
													<?php echo in_array($company_category, $umeta_company_category) ? 'checked' : ''; ?> >
												<?php echo $company_category; ?>
											</label>
										<?php } ?>
									</div>
								</div>
							</div>
						</div><!-- /row -->
					</div>

					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-xs-6">
								<div class="opt_item">
									<h3>Show Request Info Form</h3>
									<p>Do you wish to show a contact form on your profile page?</p>
									<div class="form-group">
										<label><input name="show_info_form" type="radio" value="yes" <?php echo !isset($umeta['show_info_form']) || $umeta['show_info_form'] == 'yes' ? 'checked=""' : ''; ?>> Yes</label>
										<label><input name="show_info_form" type="radio" value="no" <?php echo !(!isset($umeta['show_info_form']) || $umeta['show_info_form'] == 'yes') ? 'checked=""' : ''; ?>> No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="opt_item">
									<h3>Social Networks</h3>
									<p>Add links to your social media pages below.</p>
									<div class="form-group">
										<input type="text" name="linkedin" placeholder="LinkedIn" value="<?php echo isset($umeta['linkedin'])? esc_attr($umeta['linkedin']):'';?>">
										<input type="text" name="twitter" placeholder="Twitter" value="<?php echo isset($umeta['twitter'])? esc_attr($umeta['twitter']):'';?>">
										<input type="text" name="facebook" placeholder="Facebook" value="<?php echo isset($umeta['facebook'])? esc_attr($umeta['facebook']):'';?>">
										<input type="text" name="google-plus" placeholder="Google+" value="<?php echo isset($umeta['google_plus'])? esc_attr($umeta['google_plus']):'';?>">
										<input type="text" name="youtube" placeholder="Youtube" value="<?php echo isset($umeta['youtube'])? esc_attr($umeta['youtube']):'';?>">
									</div>
								</div>
							</div>
						</div><!-- /row -->
					</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-sm-12">
						<input type="submit" class="save_btn button" value="Save" >
					</div>
				</div><!-- /row -->
			</div>
		</form>

		<script type="text/javascript">
			jQuery(function ($) {
				$(document).on("submit", "#register_directory", function (e) {
					$('.allselect option').prop('selected', true);
					$('input.save_btn').val('Saving...');

					var actionUrl = $(this).attr('action');
					var dataValues = $(this).serialize();

					jQuery.ajax({
						url: actionUrl,
						type: 'POST',
						data: new FormData( this ),
						processData: false,
						contentType: false,
						dataType: 'json',
						// data: dataValues,
						success: function(data){
							$('input.save_btn').val('Saved');
							if(data.status == "OK"){
								console.log("Success");
							}
							alert(data.msg);
							location.reload();

						},
						error: function(){
							alert("Network error!");
							$('input.save_btn').val('Save');
						}
					});
					e.preventDefault();
					return false;
				});
			});
		</script>
	</section><!-- /company_info -->

<?php get_footer(); ?>

