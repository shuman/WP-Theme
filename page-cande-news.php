<?php
/**
 * The template for displaying all pages.
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
						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'content', 'page' ); ?>
								<?php
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										// comments_template();
									endif;
								?>
							<?php endwhile; ?>
						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>
					</div>
				</div><!-- /blog_content -->

				<div class="col-sm-4 col-md-3">
					<?php get_sidebar(); ?>
				</div><!-- /sidebar -->
			</div><!-- /row -->
		</div>
	</section><!-- /news_events -->
<?php get_footer(); ?>
