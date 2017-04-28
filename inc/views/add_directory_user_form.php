<?php

if(isset($_GET['action']) && $_GET['action']=='edit'){
	$userid = $_GET['user'];
	$user   = get_user_by( "id", $userid );
	$umeta  = array_map( function( $a ){ return $a[0]; }, get_user_meta( $userid ) );
	// var_dump($user);
}

if(isset($_GET['action']) && $_GET['action']=='delete'){
	if(isset($_GET['user']) && !empty($_GET['user']) && wp_verify_nonce($_GET['delnonce'], 'del_user')){
		// $res = wp_delete_user( $_GET['user'] );
		?>
		<script type="text/javascript">
		 location.href = '<?php echo wp_get_referer();?>';
		</script>
		<?php
		exit();
	}
}
?>
<div class="tb_admin_panel">
	<form name="register_directory" id="register_directory" method="post" action="<?php echo admin_url("admin-ajax.php");?>" enctype="multipart/form-data">
		<div class="tb_admin_table">
			
			<input type="hidden" name="action" value="add_directory_member" />
			<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('dm_nonce'); ?>" />
			
			<table class="table" width="100%" cellpadding="10">
				<tbody>
					<tr>
						<td colspan="2">
							<h2>Company Information</h2>
						</td>
					</tr>
					<tr>
						<td>
							<label>Directory Cagtegory</label>
						</td>
						<td>
							<select name="directory_category" required>
								<option value="Sponsors"<?php echo (isset($umeta['directory_category']) && $umeta['directory_category']=='Sponsors')?' selected':'';?>>Sponsors</option>
								<option value="Volunteers"<?php echo (isset($umeta['directory_category']) && $umeta['directory_category']=='Volunteers')?' selected':'';?>>Volunteers</option>
								<option value="Winners"<?php echo (isset($umeta['directory_category']) && $umeta['directory_category']=='Winners')?' selected':'';?>>Winners</option>
								<option value="Underwriters"<?php echo (isset($umeta['directory_category']) && $umeta['directory_category']=='Underwriters')?' selected':'';?>>Underwriters</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Sponsor Level</label>
						</td>
						<td>
							<select name="sponsor_level">
								<option value="">&nbsp;</option>
								<option value="Platinum"<?php echo (isset($umeta['sponsor_level']) && $umeta['sponsor_level']=='Platinum')?' selected':'';?>>Global Platinum</option>
								<option value="Gold"<?php echo (isset($umeta['sponsor_level']) && $umeta['sponsor_level']=='Gold')?' selected':'';?>>Regional Gold</option>
								<option value="Silver"<?php echo (isset($umeta['sponsor_level']) && $umeta['sponsor_level']=='Silver')?' selected':'';?>>Regional Silver</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Region</label>
						</td>
						<?php if(isset($umeta['region'])): ?>
							<td>
								<label><input type="checkbox" name="region[]" value="NAM"<?php echo in_array('NAM', explode('|', $umeta['region'])) ? ' checked':'';?>> NAM</label>
								<label><input type="checkbox" name="region[]" value="EMEA"<?php echo in_array('EMEA', explode('|', $umeta['region'])) ? ' checked':'';?>> EMEA</label>
								<label><input type="checkbox" name="region[]" value="APAC"<?php echo in_array('APAC', explode('|', $umeta['region'])) ? ' checked':'';?>> APAC</label>
							</td>
						<?php else: ?>
							<td>
								<label><input type="checkbox" name="region[]" value="NAM"> NAM</label>
								<label><input type="checkbox" name="region[]" value="EMEA"> EMEA</label>
								<label><input type="checkbox" name="region[]" value="APAC"> APAC</label>
							</td>
						<?php endif; ?>
					</tr>
					<tr>
						<td>
							<label>Company logo</label>
							<p>Please upload a 200x200 pixel PNG of your company’s logo.</p>
						</td>
						<td class="table_text">
							<?php 
							if( isset($umeta['company_logo']) && !empty($umeta['company_logo']) ){
								$params = array( 'height' => 100 );
								$company_logo = bfi_thumb( $umeta['company_logo'], $params );
								echo '<div><img src="'.$company_logo.'" alt="'.$umeta['company_name'].'"></div>';
								echo '<input class="select_item" type="file" name="company_logo" />';
							}
							else{
								echo '<input class="select_item" type="file" name="company_logo" />';
							}
							?>
						</td>
					</tr>
					<tr>
						<td><label>Username</label></td>
						<td>
							<?php 
							if(isset($userid) && !empty($userid)){
								echo '<input type="text" value="'.$user->user_login.'" disabled="">';
							}
							else{
								echo '<input type="text" name="username" required>';
							}
							?>
						</td>
					</tr>
					<tr>
						<td><label>Company Name</label></td>
						<td><input type="text" name="company_name" value="<?php echo isset($umeta['company_name'])? $umeta['company_name']:'';?>" ></td>
					</tr>
					<tr>
						<td><label>Company URL</label></td>
						<td><input type="text" name="company_url" value="<?php echo isset($umeta['company_url'])? $umeta['company_url']:'';?>" placeholder="http://"></td>
					</tr>
					<tr>
						<td><label>Street address</label></td>
						<td><input type="text" name="street_address" value="<?php echo isset($umeta['street_address'])? $umeta['street_address']:'';?>" ></td>
					</tr>
					<tr>
						<td><label>City</label></td>
						<td><input type="text" name="city" value="<?php echo isset($umeta['city'])? $umeta['city']:'';?>" ></td>
					</tr>
					<tr>
						<td><label>State</label></td>
						<td><input type="text" name="state" value="<?php echo isset($umeta['state'])? $umeta['state']:'';?>" ></td>
					</tr>
					<tr>
						<td><label>Country</label></td>
						<td>
							<select name="country" required>
								<option value="">Country</option>
								<option value="United States"<?php echo (isset($umeta['country']) && $umeta['country']=='United States')?' selected':'';?>>United States</option>
								<option value="United Kingdom"<?php echo (isset($umeta['country']) && $umeta['country']=='United Kingdom')?' selected':'';?>>United Kingdom</option>
								<option value="Australia"<?php echo (isset($umeta['country']) && $umeta['country']=='Australia')?' selected':'';?>>Australia</option>
								<option value="Canada"<?php echo (isset($umeta['country']) && $umeta['country']=='Canada')?' selected':'';?>>Canada</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><h2>Contact information</h2></td>
					</tr>
					<tr>
						<td><label>Contact Name</label></td>
						<td><input type="text" name="contact_name" value="<?php echo isset($umeta['contact_name'])? $umeta['contact_name']:'';?>" ></td>
					</tr>
					<tr>
						<td><label>Email Address</label></td>
						<td>
							<?php 
							if(isset($userid) && !empty($userid)){
								echo '<input type="email" value="'.$user->user_email.'" name="email">';
							}
							else{
								echo '<input type="email" name="email" required>';
							}
							?>
						</td>
					</tr>
					<tr>
						<td><label>Company long description</label></td>
						<td><?php wp_editor( (isset($umeta['company_long_desc'])? $umeta['company_long_desc']:''), 'company_long_desc', $settings = array('textarea_rows'=>5, 'teeny'=>true) ); ?></td>
					</tr>
					<tr>
						<td><label>Company short description</label></td>
						<td><textarea name="company_short_desc"><?php echo isset($umeta['company_short_desc'])? $umeta['company_short_desc']:'';?></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><hr></td>
					</tr>
					<tr>
						<td><h2>News Box</h2></td>
						<td><?php wp_editor( (isset($umeta['news_box'])? $umeta['news_box']:''), 'news_box', $settings = array('textarea_rows'=>5, 'teeny'=>true) ); ?></td>
					</tr>
					<tr>
						<td>
							<h3>Areas of Focus</h3>
						</td>
						<td>
							<div class="form-group">
								<?php 
								$areas = array("Assessments", "Verifications", "Branding", "Consulting", "HCM", "Job Boards", "Onboarding", "Learning", "Mobile", "Performance", "Management", "Recruitment Agency", "RPO", "Sourcing", "Video Interviewing");
								?>
								<table width="100%">
									<tr>
										<td width="45%" align="center">
											Removed
											<select id="leftValues" size="10" multiple>
												<?php 
												if(isset($userid) && !empty($userid)){
													$area_focuses = get_user_meta($user->ID, 'area_focus', true); 
													$area_focuses = explode('|', get_user_meta($user->ID, 'area_focus', true));

													$areas = array_diff($areas, $area_focuses);
													foreach ($areas as $area) {
														if(!empty($area)){
															echo "<option>$area</option>\n";
														}
													}
												}
												else{
													foreach ($areas as $area) {
														if(!empty($area)){
															echo "<option>$area</option>\n";
														}
													}	
												}
												?>									
											</select>
										</td>
										<td width="10%" valign="middle" style="vertical-align:middle;">
											<input type="button" id="btnRight" value="&gt;&gt;" />
											<input type="button" id="btnLeft" value="&lt;&lt;" /> 
										</td>
										<td width="45%" align="center">
											Added
											<select name="area_focus[]" class="allselect" id="rightValues" size="10" multiple>
												<?php
												if(isset($userid) && !empty($userid)){
													$area_focuses = get_user_meta($user->ID, 'area_focus', true); 
													$area_focuses = explode('|', get_user_meta($user->ID, 'area_focus', true));
													foreach ($area_focuses as $a_focus) {
														if(!empty($a_focus)){
															echo "<option>$a_focus</option>\n";
														}
													}
												}
												?>
									        </select>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Company Category</h3>
						</td>
						<td>
							<div class="form-group">
								<?php 
								$company_cats = array("Recruiting Technology", "Recruiting Services", "Consulting Services");
								?>
								<table width="100%">
									<tr>
										<td width="45%" align="center">
											Removed
											<select id="catLeftValues" size="10" multiple>
												<?php 
												if(isset($userid) && !empty($userid)){
													$cats = get_user_meta($user->ID, 'company_category', true); 
													$cats = explode('|', get_user_meta($user->ID, 'company_category', true));
													
													$company_cats = array_diff($company_cats, $cats);
													foreach ($company_cats as $cat) {
														if(!empty($cat)){
															echo "<option>$cat</option>\n";
														}
													}
												}
												else{
													foreach ($company_cats as $cat) {
														if(!empty($cat)){
															echo "<option>$cat</option>\n";
														}
													}
												}
												?>									
											</select>
										</td>
										<td width="10%" valign="middle" style="vertical-align:middle;">
											<input type="button" id="catBtnRight" value="&gt;&gt;" />
											<input type="button" id="catBtnLeft" value="&lt;&lt;" /> 
										</td>
										<td width="45%" align="center">
											Added
											<select name="company_category[]" class="allselect" id="catRightValues" size="10" multiple>
												<?php
												if(isset($userid) && !empty($userid)){
													$cats = get_user_meta($user->ID, 'company_category', true); 
													$cats = explode('|', get_user_meta($user->ID, 'company_category', true));
													foreach ($cats as $cat) {
														if(!empty($cat)){
															echo "<option>$cat</option>\n";
														}
													}
												}
												?>
									        </select>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td class="table_text">
							<h3>Show Request Info Form</h3>
							<p>If you would like to have a viewer contact you via email thru your profile, click here to display an email form.</p>
						</td>
						<td>
							<div class="form-group">
								<label><input name="show_info_form" type="radio" value="yes"<?php echo (isset($umeta['show_info_form']) && $umeta['show_info_form']!='no')?' checked':'';?>> Yes</label> 
								<label><input name="show_info_form" type="radio" value="no"<?php echo (isset($umeta['show_info_form']) && $umeta['show_info_form']=='no')?' checked':'';?>> No</label>
							</div>
						</td>
					</tr>
					<tr>
						<td class="table_text">
							<h3>Social Networks</h3>
							<p>Please provide the URLs in the boxes to your social network pages</p>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="facebook" value="<?php echo isset($umeta['facebook'])? $umeta['facebook']:'';?>" placeholder="Facebook">
								<input type="text" name="twitter" value="<?php echo isset($umeta['twitter'])? $umeta['twitter']:'';?>" placeholder="Twitter">
								<input type="text" name="youtube" value="<?php echo isset($umeta['youtube'])? $umeta['youtube']:'';?>" placeholder="Youtube">
								<input type="text" name="google-plus" value="<?php echo isset($umeta['google-plus'])? $umeta['google-plus']:'';?>" placeholder="Google+">
								<input type="text" name="linkedin" value="<?php echo isset($umeta['linkedin'])? $umeta['linkedin']:'';?>" placeholder="LinkedIn">
							</div>
						</td>
					</tr>
					<?php if(isset($_GET['action']) && $_GET['action']=='edit'): ?>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" name="update" class="save_btn button" value="Update Profile" >
								<input type="hidden" name="userid" value="<?php echo $userid;?>" >
							</td>
						</tr>
					<?php else: ?>
						<tr>
							<td colspan="2" align="right"><input type="submit" class="save_btn button" value="Save" ></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</form>
</div><!-- /tb_admin_panel -->
