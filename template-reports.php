<?php
/**
 * Template Name: Reports
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
<section class="page_title_sec page_bg2">
	<div class="container">
		<div class="page_title"><h1>Reports</h1></div>
	</div>
</section><!-- /page_title -->

<section class="resources_blog sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<div class="blog_content">
					<?php  if (!is_user_logged_in()): ?>
						<?php get_template_part( 'content', 'protected' ); ?>
					<?php else: ?>
						<!--<div class="post_title"><h2>Reports</h2></div>-->
						<div class="blog_post">
							<?php 
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$posts_per_page = (int) vpt_option('posts_per_page');

							$args = array(
								'post_type'      => 'report',
								'posts_per_page' => $posts_per_page,
								'paged'          => $paged,
							);
							if(get_region()){
								$args['region'] = get_region().', global';
							}
							else{
								$args['region'] = 'global';
							}
							
							query_posts($args); 
							?>
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="post_item">
										<div class="resch_pic"><?php the_post_thumbnail(); ?></div>
										<div class="post_desc">
											<a class="desc_title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
											<span class="meta"><?php echo get_the_date();?> - posted by <?php the_author();?></span>
											<div class="rp_desc"><?php echo get_the_excerpt();?> <a class="post_read_more" href="<?php the_permalink();?>">read more</a></div>
										</div>
									</div><!-- /post_item -->
								<?php endwhile; ?>
							<?php endif; ?>
						</div><!-- /blog_post -->
						<?php pagination('', $posts_per_page); ?>
						
					<?php endif;?>
				</div>
			</div><!-- /blog_content -->

			<div class="col-sm-4 col-md-3">
				<div id="sidebar">
					<div class="widget">
						<h2>Sponsored Article</h2>
						<div class="widget_desc">
							<p><img class="alignleft" src="<?php echo get_template_directory_uri();?>/images/logo_mpgs.png" alt="logo_mpgs"> Lorem ipsum dolor sit amet minimes, consect etu adipiscing elit</p>
						</div>
					</div><!-- /widget -->

					<div class="widget">
						<h2>Most Popular</h2>
						<div class="widget_desc">
							<p>Lorem ipsum dolor sit amet minimes seat consectetur adipiscing elit</p>
							<p>Sed do eiusmod tempor incididunt utea labore et dolore magna aliqua. </p>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
							<p>Sed do eiusmod tempor incididunt uteat labore et dolore magna aliqua. </p>
						</div>
					</div><!-- /widget -->

					<div class="widget">
						<h2>Stay Connected</h2>
						<div class="widget_desc">
							<ul class="sidebar_social">
								<li><a href="#"><i class="fa fa-newspaper-o"></i> Newsletter</a></li>
								<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
								<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
								<li><a href="#"><i class="fa fa-youtube"></i> YouTube</a></li>
								<li><a href="#"><i class="fa fa-rss"></i> RSS</a></li>
							</ul>
						</div>
					</div><!-- /widget -->
				</div>
			</div><!-- /sidebar -->

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