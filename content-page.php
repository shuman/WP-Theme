<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Talent Board
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post_title">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</div><!-- /post_title -->
	<div class="entry-content blog_post">
		<?php add_filter( 'the_content', 'wpautop' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'talent-board' ),
				'after'  => '</div>',
			) );
		?>
		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'talent-board' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- ##post-## -->
