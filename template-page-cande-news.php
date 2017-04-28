<?php
/**
 * Template Name: CandE News
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Talent Board
 */

get_header(); 
?>
<section class="page_title_sec page_bg2">
	<div class="container">
		<div class="page_title"><h1><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );?></h1></div>
	</div>
</section><!-- /page_title -->

<section class="resources_blog sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<div class="blog_content">
					<?php  //if (!is_user_logged_in()): ?>
						<?php //get_template_part( 'content', 'protected' ); ?>
					<?php //else: ?>
					<?php 

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
					//$posts_per_page = (int) vpt_option('posts_per_page');

					$args = array(
						'category_name' => 'cande-news',
						'posts_per_page' => 10,
						'paged'          => $paged,
					);

					// if(get_region()){
					// 	$args['region'] = get_region();
					// }
					
					query_posts($args); 
					?>
						<?php if ( have_posts() ) : ?>
							<div class="post_title"><h2>CandE News</h2></div><!-- /post_title -->
							<div class="blog_post">
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="post_item" style="padding-left:0px;">
										<div class="post_desc">
											<a class="desc_title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
											<span class="meta"><?php echo get_the_date();?><!--  - posted by <?php the_author();?> --></span>
											<div class="rp_desc"><?php echo get_the_excerpt();?> <a class="post_read_more" href="<?php the_permalink();?>">read more</a></div>
										</div>
									</div><!-- /post_item -->
								<?php endwhile; ?>
							</div>
							<?php pagination('', $posts_per_page); ?>
							
							<?php else: ?>
							<div class="post_title"><h2>No post found!</h2></div><!-- /post_title -->
							<div class="blog_post">
								<article>
									<p>Page is empty!</p>
								</article>
							</div><!-- /blog_post -->
						<?php endif; ?>

					<?php //endif; ?>
				</div>
			</div><!-- /blog_content -->

			<div class="col-sm-4 col-md-3">
				<?php get_sidebar();?>
			</div><!-- /sidebar -->

		</div><!-- /row -->
	</div>
</section><!-- /news_events -->
<?php get_footer(); ?>
