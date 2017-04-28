<?php
/**
 * Template Name: Directory Volunteer Listing
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
						<h2>SEARCH OUR VOLUNTEERS</h2>
						<div class="filter">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								SORT LIST BY
								<span class="caret"></span>
								</button>
								<ul id="directory_filters" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="?sort=name">Company Name</a></li>
									<li role="presentation" class="divider"></li>
									<li role="presentation">
										<form action="" method="get">
											<input name="search" placeholder="SEARCH" value="<?php echo isset($_REQUEST['search']) ? $_REQUEST['search'] : '';?>" />
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
									<th style="width:200px;"><span>Name</span></th>
									<th><span>Bio</span></th>
									<th><span>Company</span></th>
									<th><span>Region</span></th>
									<th><span>Areas of focus</span></th>
								</tr><!-- /table_tr -->
							</thead>

							<tbody>
								<?php
								global $wpdb;

								$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;

								$posts_per_page = (int) vpt_option('posts_per_page');
								$total = count(get_directory_items( get_region(), $posts_per_page, 0, true, "Volunteers" ));

								$offset = ($paged > 0) ? (($paged - 1) * $posts_per_page) : 0;

								$users = get_directory_items( get_region(), $posts_per_page, $offset, false, "Volunteers");
								// var_dump($users);

								if($users):
									foreach ($users as $user):
										$company_logo = get_user_meta($user->ID, 'company_logo', true);
										if(!empty($company_logo)){
											$params = array( 'width' => 150 );
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
													<a href="/company-profile/?c=<?php echo $user->user_nicename;?>"><?php echo get_user_meta($user->ID, 'contact_name', true);?></a>
												</span>
											</td>
											<td class="gsp_desc">
												<span class="short_desc"><?php echo truncate(get_user_meta($user->ID, 'company_long_desc', true), 50);?></span>
											</td>
											<td class="gsp_category" align="center"><span class="company_name">
													<a href="/company-profile/?c=<?php echo $user->user_nicename;?>"><?php echo get_user_meta($user->ID, 'company_name', true);?></a>
												</span></td>
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
									pagination('', $posts_per_page);
								endif;
								?>
							</tbody>
						</table>
					</div>
					<?php directory_pagination($total, $posts_per_page); ?>
				</div><!-- /directory_content -->
			</div>
		</div><!-- /row -->
	</div>
</section><!-- /news_events -->

	<?php if ( is_page() && have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
					<?php the_content(); ?>
			
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>