<?php
/**
 * The template for displaying all single posts.
 *
 * @package Talent Board
 */

get_header(); ?>
	<section class="page_title_sec">
		<div class="container">
			<div class="page_title"><h1><?php the_title();?></h1></div>
		</div>
	</section><!-- /page_title -->

	<section class="news_blog sec_block">
		<div class="container">
			<?php if ( have_posts() ) : 

			$type = get_post_type();

			if($type == 'events'){?>
				<div style="position:absolute;top:-30px;"><a href="/news-events/events/">&#8629; Back to Event List</a></div>
			<?php } else if($type == 'news'){ ?>
				<div style="position:absolute;top:-30px;"><a href="/news/">&#8629; Back to News List</a></div>
			<?php } ?>

			<?php endif ?>
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<div class="blog_content">
						
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'content', 'page' ); ?>
								<?php
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
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