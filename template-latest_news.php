<?php
/**
 * Template Name: Latest News
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
	<section class="page_title_sec">
		<div class="container">
			<div class="page_title"><h1>Latest News</h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="news_blog sec_block">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-9">
						<div class="blog_content">
							<div class="post_title"><h2>Latest news</h2></div>
							<div class="blog_post">
								<?php
								$args = array(
									"orderby"	=> 'post_date',
									"order"	=> 'DESC',
									"post_status"	=> 'publish',
									"posts_per_page"	=> '2'
								);
								$news_posts = get_posts( $args );

								foreach ( $news_posts as $post ) : setup_postdata( $post ); 
									?>
									<div class="post_item">
										<div class="post_desc">
											<a class="desc_title" href="#"><h3><?php the_title();?></h3></a>
											<span class="meta"><?php echo get_the_date();?></span>
											<div class="rp_desc"><?php echo get_the_excerpt();?> <a class="post_read_more" href="<?php echo get_the_permalink();?>">read more</a></div>
										</div>
									</div>
									<?php
								endforeach; 
								wp_reset_postdata();
								?>
							</div><!-- /blog_post -->
						</div>
					</div><!-- /blog_content -->

					<div class="col-sm-4 col-md-3">
						<?php get_sidebar(); ?>
					</div><!-- /sidebar -->

				</div><!-- /row -->
			</div>
		</section><!-- /news_events -->
<?php get_footer(); ?>
