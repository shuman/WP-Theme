<?php
/**
 * The main template file.
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
			<div class="page_title"><h1>Page Title</h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="news_blog sec_block">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-9">
						<div class="blog_content">
							<div class="post_title"><h2>Page Title</h2></div><!-- /post_title -->
							<div class="blog_post">
								<?php if ( have_posts() ) : ?>

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

									<?php
										/* Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'content', get_post_format() );
									?>

								<?php endwhile; ?>

								<?php the_posts_navigation(); ?>

							<?php else : ?>

								<?php get_template_part( 'content', 'none' ); ?>

							<?php endif; ?>
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
