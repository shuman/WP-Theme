<?php
/**
 * Template Name: News & Events
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
		<div class="page_title"><h1>News & Events</h1></div>
	</div>
</section><!-- /page_title -->

<section class="news_events sec_block">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="ne_box_container ne_left">
					<div class="feature_title">
						<h2>Upcoming events</h2>
						<!-- <a class="show_all" href="<?php //echo site_url('/events');?>">Past Events »</a> -->
					</div>
					<div class="ne_content">
						<ul class="upcoming_events">
							<?php
							$args = array(
								"orderby"        => 'post_date',
								"order"          => 'ASC',
								"post_type"      => 'events',
								"post_status"    => 'publish',
								"posts_per_page" => '10'
							);
							$myposts = get_posts( $args );

							$ordered_events = array();
							$i=0;
							foreach ( $myposts as $post ) : setup_postdata( $post ); 
								$ordered_events[$i]['ID'] = $post->ID;
								$ordered_events[$i]['title'] = get_the_title();
								$ordered_events[$i]['permalink'] = get_the_permalink();
								$ordered_events[$i]['start_date'] = strtotime(vp_metabox('event_info.date.0.start_date'));
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
									<span class="event_name"><?php echo implode(', ', wp_get_post_terms( $event['ID'], 'region', array("fields" => "names")) );?></span>
									<div class="en_item_desc">
										<h3><a href="<?php echo $event['permalink'];?>"><?php echo $event['title'];?></a></h3>
									</div>
									<a href="<?php echo $event['permalink'];?>">See Details</a>
								</li>
								<?php }
							endforeach;
							wp_reset_postdata();
							?>
						</ul><!-- /upcoming_events -->

						<a class="button view_all" href="<?php echo site_url('/news-events/events');?>">View more events</a>
					</div>

				</div>
			</div><!-- /ne_box_container -->

			<div class="col-sm-6">
				<div class="ne_box_container ne_right">
					<div class="feature_title">
						<h2>Latest News</h2>
						<a class="show_all" href="<?php echo site_url('/news');?>">All News »</a>
					</div>

					<div class="ne_content">
						<ul class="letest_news">
							<?php
							$args = array(
								"orderby"        => 'post_date',
								"order"          => 'DESC',
								"post_type"      => 'news',
								"post_status"    => 'publish',
								"posts_per_page" => '4'
							);
							$myposts = get_posts( $args );

							foreach ( $myposts as $post ) : setup_postdata( $post ); 
								$month = date("F", strtotime(vp_metabox('event_info.date.0.start_date')));
								$day = date("d", strtotime(vp_metabox('event_info.date.0.start_date')));
								?>
								<li>
									<span class="ln_time"><?php echo get_the_date("m.d.Y");?></span>
									<div class="en_item_desc">
										<h3><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h3>
										<p><?php //echo truncate(get_the_content(), 20);?></p>
									</div>
									<a href="<?php echo get_the_permalink();?>">Read More</a>
								</li>
								<?php
							endforeach;
							wp_reset_postdata();
							?>
						</ul><!-- /letest_news -->

						<a class="button view_all" href="<?php echo site_url('/news');?>">View all news</a>
					</div>

				</div>
			</div><!-- /ne_box_container -->
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