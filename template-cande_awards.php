<?php
/**
 * Template Name: Cande Awards
 *
 */
get_header();
?>
<section class="page_title_sec">
	<div class="container">
		<div class="page_title"><h1>C<span>and</span>E AWARDS</h1></div>
	</div>
</section><!-- /page_title -->

<section class="cande_award_banner">
	<div class="container">
		<div class="cnd_banner">
			<h2>Welcome</h2>
			<p>Although the CandE Awards is a competition, it exists to enable any company to benchmark and improve their candidate experience. Any corporation that is interested in enhancing the candidate experience they provide, regardless of sophistication, will benefit from participating in the benchmark process. Companies that participate can receive access to data that benchmarks their candidate experience against the aggregate of all winners.</p>
		</div><!-- /cnd_banner -->
	</div>
</section><!-- /cande_award_banner -->
<?php if ( is_page() && have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
					<?php the_content(); ?>
			
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer();?>