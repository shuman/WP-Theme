<?php
/**
 * Template Name: Events
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
<section class="page_title_sec page_bg2">
	<div class="container">
		<div class="page_title"><h1><?php the_title();?></h1></div>
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
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					//$posts_per_page = (int) vpt_option('posts_per_page');

					$args = array(
						'post_type'      => 'events',
						'posts_per_page' => 10,
						'paged'          => $paged,
					);

					if(get_region()){
						$args['region'] = get_region();
					}
					else{
						$args['region'] = 'global';
					}
					
					$myposts = get_posts( $args );

					$ordered_events = array();
					$i=0;
					foreach ( $myposts as $post ) : setup_postdata( $post ); 
						$ordered_events[$i]['ID'] = $post->ID;
						$ordered_events[$i]['title'] = get_the_title();
						$ordered_events[$i]['permalink'] = get_the_permalink();
						$ordered_events[$i]['excerpt'] = get_the_excerpt();
						$ordered_events[$i]['start_date'] = strtotime(vp_metabox('event_info.date.0.start_date'));
						$i++;
					endforeach;

					/* Sorting by event date */
					usort($ordered_events, function($a, $b) {
					    return $b['start_date'] - $a['start_date'];
					});

					$yesterday = date("Y/m/d", strtotime("- 1 DAY"));

					?>
						<?php if ( have_posts() ) : ?>
							<div class="post_title"><h2>Events</h2></div><!-- /post_title -->
							<div class="blog_post">
								<?php foreach ( $ordered_events as $event ) : 
									$date = date("F j, Y", $event['start_date']);
									$event_date = date("Y/m/d", $event['start_date']);
									?>
									<div class="post_item" style="padding-left:0px;">
										<div class="post_desc">
											<a class="desc_title" href="<?php echo $event['permalink'];?>"><h3><?php echo $event['title'];?></h3></a>
											<span class="meta"><?php echo $date;?></span>
											<div class="rp_desc"><?php echo $event['excerpt'];?> <a class="post_read_more" href="<?php echo $event['permalink'];?>">read more</a></div>
										</div>
									</div><!-- /post_item -->
								<?php  endforeach; ?>
							</div>
							<?php else: ?>
							<div class="post_title"><h2>No events found!</h2></div><!-- /post_title -->
							<div class="blog_post">
								<article>
									<p>Page is empty!</p>
								</article>
							</div><!-- /blog_post -->
						<?php endif; ?>
						<?php pagination('', $posts_per_page); ?>
					<?php //endif; ?>
				</div>
			</div><!-- /blog_content -->

			<div class="col-sm-4 col-md-3">
				<?php get_sidebar();?>
			</div><!-- /sidebar -->

		</div><!-- /row -->
	</div>
</section><!-- /news_events -->

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php the_content(); ?>
		
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>