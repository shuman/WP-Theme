<?php
/**
 * Template Name: Resources
 */
get_header();
?>
<section class="page_title_sec page_bg2">
	<div class="container">
		<div class="page_title"><h1>Resources</h1></div>
	</div>
</section><!-- /page_title -->

<section class="resources sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="resc_item">
					<div class="resc_title">
						<div class="resc_icon"><img src="<?php echo get_template_directory_uri();?>/images/resc_icon_01.png" alt="resc_icon"></div>
						<h2>Community Webinars</h2>
					</div>
					<?php 
					$args = array(
						'post_type'      => 'webinar',
						'posts_per_page' => 3,
					);

					if(get_region()){
						$args['region'] = get_region().', global';
					}
					else{
						$args['region'] = 'global';
					}
					$webinar_posts = get_posts( $args );

					foreach ( $webinar_posts as $post ) : setup_postdata( $post );
						?>
						<div class="resc_list_item">
							<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
							<p><?php echo truncate(get_the_excerpt(), 20);?></p>
						</div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>
					<a class="button resc_view_all" href="/webinar/">View All Webinars</a>
				</div>
			</div><!-- /resc_item -->

			<div class="col-sm-4">
				<div class="resc_item">
					<div class="resc_title">
						<div class="resc_icon"><img src="<?php echo get_template_directory_uri();?>/images/resc_icon_02.png" alt="resc_icon"></div>
						<h2>Community articles</h2>
					</div>

					<?php 
					$args = array(
						'post_type'      => 'article',
						'posts_per_page' => 3,
					);

					if(get_region()){
						$args['region'] = get_region().', global';
					}
					else{
						$args['region'] = 'global';
					}
					$article_posts = get_posts( $args );

					foreach ( $article_posts as $post ) : setup_postdata( $post );
						?>
						<div class="resc_list_item">
							<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
							<p><?php echo truncate(get_the_excerpt(), 20);?></p>
						</div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>

					<a class="button resc_view_all" href="/articles/">View All Articles</a>
				</div>
			</div><!-- /resc_item -->

			<div class="col-sm-4">
				<div class="resc_item">
					<div class="resc_title">
						<div class="resc_icon"><img src="<?php echo get_template_directory_uri();?>/images/resc_icon_03.png" alt="resc_icon"></div>
						<h2>Research papers</h2>
					</div>

					<?php 
					$args = array(
						'post_type'      => 'resource',
						'posts_per_page' => 3,
					);

					if(get_region()){
						$args['region'] = get_region().', global';
					}
					else{
						$args['region'] = 'global';
					}
					$resource_posts = get_posts( $args );

					foreach ( $resource_posts as $post ) : setup_postdata( $post );
						?>
						<div class="resc_list_item">
							<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
							<p><?php echo truncate(get_the_excerpt(), 20);?></p>
						</div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>

					<a class="button resc_view_all" href="/research-papers/">View All Research</a>
				</div>
			</div><!-- /resc_item -->
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