<?php
/**
 * Template Name: Volunteer Listing
 */
get_header();
?>
<section class="page_title_sec">
	<div class="container">
		<div class="page_title"><h1>Volunteer Directory</h1></div>
	</div>
</section><!-- /page_title -->

<section class="directory sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="directory_content">
					<div class="post_title">
						<h2>FIND THE COMPANY YOU'RE LOOKING FOR</h2>
						<div class="filter">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								SORT LIST BY
								<span class="caret"></span>
								</button>
								<ul id="directory_filters" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="?sort=name">Company Name</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="?sort=category">Category</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="?sort=region">Region</a></li>
									<li role="presentation" class="divider"></li>
									<li role="presentation">
										<form action="" method="get">
											<input name="search" placeholder="SEARCH" />
											<input class="hide" type="submit" value="go" />
										</form>
									</li>
								</ul>
							</div>
							<!--
							<select class="selectpicker" data-style="btn-warning">
								<option>Mustard</option>
								<option>Ketchup</option>
								<option>Barbecue</option>
							</select>
							-->
						</div>
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><span>Company</span></th>
									<th><span>Description</span></th>
									<th><span>Category</span></th>
									<th><span>Region</span></th>
									<th><span>Areas of focus</span></th>
								</tr><!-- /table_tr -->
							</thead>

							<tbody>
								<?php
								$sort = isset($_GET['sort']) ? $_GET['sort'] : false;
								$users = get_users( array(
									'role'       =>'directory_members',
									'order'      => 'ASC',
									'meta_key'   => 'company_name',
									'orderby'    => 'meta_value',
									'meta_query' => array(
										'relation' => 'AND',
										array(
											'key'     => 'region',
											'value'   => get_region(),
											'compare' => 'LIKE'
										),
										array(
											'key'     => 'directory_category',
											'value'   => 'Volunteers',
										),
									),
								));
								// var_dump($users);
								if($users):
									foreach ($users as $user):
										$company_logo = get_user_meta($user->ID, 'company_logo', true);
										if(!empty($company_logo)){
											$params = array( 'height' => 100 );
											$company_logo = bfi_thumb( $company_logo, $params );
										}
										else{
											$company_logo = 'http://placehold.it/144x65/';
										}
										?>
										<tr data-href="#">
											<td class="company_info">
												<div class="company_logo">
													<a href="/company-profile/?c=<?php echo $user->user_nicename;?>"><img src="<?php echo $company_logo;?>" alt="<?php echo get_user_meta($user->ID, 'company_name', true);?>"></a>
												</div>
												<span class="company_name">
													<a href="/company-profile/?c=<?php echo $user->user_nicename;?>"><?php echo get_user_meta($user->ID, 'company_name', true);?></a>
												</span>
												<?php
												$sponsor_level = get_user_meta($user->ID, 'sponsor_level', true);
												if(!empty($sponsor_level)){
													echo '<span class="button btn_gsp '.$sponsor_level.'">'.$sponsor_level.'</span>';
												}
												?>
											</td>
											<td class="gsp_desc">
												<span class="short_desc"><?php echo truncate(get_user_meta($user->ID, 'company_short_desc', true), 50);?></span>
											</td>
											<?php 
											$company_category = get_user_meta($user->ID, 'company_category', true); 
											$company_category = implode("<br>", explode('|', $company_category));
											?>
											<td class="gsp_category" align="center"><?php echo $company_category;?></td>
											<?php 
											$region = get_user_meta($user->ID, 'region', true); 
											$region = implode("<br>", explode('|', $region));
											?>
											<td class="gsp_region" align="center"><?php echo $region;?></td>
											<?php 
											$area_focus = get_user_meta($user->ID, 'area_focus', true); 
											$area_focus = implode("<br>", explode('|', $area_focus));
											?>
											<td class="customer_service"><?php echo $area_focus;?></td>
										</tr>
										<?php
									endforeach;
								endif;
								?>
							</tbody>
						</table>
					</div>
					<?php if(count($users) > 20) : ?>
						<div class="dc_pagination">
							<ul>
								<li><a href="#"> &lt; Prev</a></li>
								<li><a href="#"> Next &gt;</a></li>
							</ul>
							<span class="display_text">Displaying 0 through 20 of <?php echo count($users);?> listings</span>
						</div><!-- /pagination -->
					<?php endif; ?>
				</div><!-- /directory_content -->
			</div>
		</div><!-- /row -->
	</div>
</section><!-- /news_events -->

<section class="sec_block join_directory about">
	<div class="container">
		<div class="about_content">
			<div class="sec_title"><h1>Join the Directory Today! </h1></div>
			<div class="content_desc">
				<p>Looking for specific data consectetur adipiscing elit, sed do eiusmod? Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. </p>
			</div>

			<div class="more_about"><a class="button" href="#">Register Today</a></div>
		</div>
	</div>
</section><!-- /about -->
<?php get_footer(); ?>