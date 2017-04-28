<?php
/**
 * Template Name: Custom Page
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Talent Board
 */

get_header(); ?>
	<?php 
	$is_banner = vp_metabox('tb_common_fields.banner_options.0.show_hide_option');
	if($is_banner == 'show'): ?>
		<section class="page_title_sec">
			<div class="container">
				<div class="page_title"><h1><?php echo vp_metabox('tb_common_fields.banner_options.0.banner_title');?></h1></div>
			</div>
		</section><!-- /page_title -->
	<?php endif; ?>

	<?php if ( is_page() && have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
					<?php the_content(); ?>
			
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
