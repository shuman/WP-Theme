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
			<div class="page_title"><h1>404</h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="news_blog sec_block">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-9">
						<div class="blog_content">
							<div class="post_title"><h2>Page not found!</h2></div><!-- /post_title -->
							<div class="blog_post">
								<?php get_template_part( 'content', 'none' ); ?>
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
