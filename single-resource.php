<?php
/**
 * The template for displaying all single posts.
 *
 * @package Talent Board
 */

get_header(); ?>
	<section class="page_title_sec">
		<div class="container">
			<div class="page_title"><h1>Resources</h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="news_blog sec_block">
		<div class="container">
			<div style="position:absolute;top:-30px;"><a href="/research-papers/">&#8629; Back to Research Papers</a></div>
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<div class="blog_content">
						
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php  //if (!is_user_logged_in()): ?>
									<?php //get_template_part( 'content', 'protected' ); ?>
								<?php //else: ?>
									<?php get_template_part( 'content', 'page' ); ?>
									<?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
								<?php //endif; ?>
							<?php endwhile; ?>
						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>
					</div><!-- /blog_content -->
				</div>

				<div class="col-sm-4 col-md-3">
					<?php get_sidebar(); ?>
				</div><!-- /sidebar -->

			</div><!-- /row -->
		</div>
	</section><!-- /news_events -->
<?php get_footer(); ?>