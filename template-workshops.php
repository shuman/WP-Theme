<?php
/**
 * Template Name: Workshops
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
			<div class="feature_title">
						<h2>Register Now!</h2>
					</div>
				<div class="ne_content">
					<ul class="upcoming_events">
							<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$posts_per_page = (int) vpt_option('posts_per_page');

							$args = array(
								"orderby"        => 'post_date',
								"order"          => 'ASC',
								"post_type"      => 'events',
								"post_status"    => 'publish',
								'event_type' 		 => 'workshop', 
								'posts_per_page' => $posts_per_page,
								'paged'          => $paged,
							);
							$myposts = get_posts( $args );

							$ordered_events = array();
							$i=0;
							foreach ( $myposts as $post ) : setup_postdata( $post ); 
								$ordered_events[$i]['ID'] = $post->ID;
								$ordered_events[$i]['title'] = get_the_title();
								$ordered_events[$i]['permalink'] = get_the_permalink();
								$ordered_events[$i]['start_date'] = strtotime(vp_metabox('event_info.date.0.start_date'));
								$ordered_events[$i]['content'] = get_the_content();
								$i++;
							endforeach;

							/* Sorting by event date */
							usort($ordered_events, function($a, $b) {
							    return $a['start_date'] - $b['start_date'];
							});

							$yesterday = date("Y/m/d", strtotime("- 1 DAY"));
							foreach ( $ordered_events as $event ) : 
								$month = date("F", $event['start_date']);
								$day = date("d", $event['start_date']);
								$event_date = date("Y/m/d", $event['start_date']);
								if($event_date > $yesterday){?>
									<li>
										<div class="event_date"><span><?php echo $month;?></span> <?php echo $day;?></div>
										<!--span class="event_name"><?php //echo implode(', ', wp_get_post_terms( $event['ID'], 'region', array("fields" => "names")) );?></span-->
										<div class="en_item_desc">
											<h3><a href="<?php echo $event['permalink'];?>"><?php echo $event['title'];?></a></h3>
										</div>
										<div class="entry-content blog_post">
											<p><?php echo wpautop($event['content']);?></p>
										</div>
										<!--a href="<?php //echo $event['permalink'];?>">See Details</a-->
									</li>
								<?php }
							endforeach;
							wp_reset_postdata();
							?>
						</ul><!-- /upcoming_events -->
						<hr>
				</div>
				<div class="container">
					<div class="blog_post">
						<?php if ( is_page() && have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								
								<?php add_filter( 'the_content', 'wpautop' ); ?>
								<?php the_content(); ?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'talent-board' ),
										'after'  => '</div>',
									) );
								?>
								
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				
			</div><!-- /blog_content -->

			<div class="col-sm-4 col-md-3">
				<?php get_sidebar();?>
			</div><!-- /sidebar -->

		</div><!-- /row -->
	</div>
</section><!-- /news_events -->

<?php get_footer(); ?>