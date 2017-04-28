<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Talent Board
 */
?>

		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="footer_logo">
							<a href="<?php echo site_url();?>">
							<?php if( vpt_option('footer_logo') ): ?>
								<img src="<?php echo vpt_option('footer_logo');?>" alt="Talent Board"></a>
							<?php else: ?>
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/logo_footer.png" alt="Talent Board"></a>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="footer_menu">
							<?php 
								wp_nav_menu( 
									array(
										'theme_location' =>'footer-menu',
										'container'      =>'',
										'menu_class'     =>'',
									) 
								);
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="footer_bottom">
							<div class="footer_social">
								<ul>
									<?php if( vpt_option('facebook') ): ?>
										<li><a href="<?php echo vpt_option('facebook');?>"><i class="fa fa-facebook"></i></a></li>
									<?php endif; ?>
									<?php if( vpt_option('twitter') ): ?> 
										<li><a href="<?php echo vpt_option('twitter');?>"><i class="fa fa-twitter"></i></a></li>
									<?php endif; ?>
									<?php if( vpt_option('google_plus') ): ?>
										<li><a href="<?php echo vpt_option('google_plus');?>"><i class="fa fa-google"></i></a></li>
									<?php endif; ?>
									<?php if( vpt_option('linkedin') ): ?>
										<li><a href="<?php echo vpt_option('linkedin');?>"><i class="fa fa-linkedin"></i></a></li>
									<?php endif; ?>
									<?php if( vpt_option('youtube') ): ?>
										<li><a href="<?php echo vpt_option('youtube');?>"><i class="fa fa-youtube"></i></a></li>
									<?php endif; ?>
									<?php if( vpt_option('rss') ): ?>
										<li><a href="<?php echo vpt_option('rss');?>"><i class="fa fa-rss"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
							<div class="copyright">
								<p><?php echo vpt_option('copyright_text');?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- /footer -->
	</div><!-- /wrap -->


		<div id="setRegion" class="modal fade">
			<div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
					<div class="modal-body">
						<form action="<?php echo admin_url("admin-ajax.php");?>" method="get">
							<input type="hidden" name="action" value="set_region">
							<h1><i class="fa fa-map-marker"></i> &nbsp; Select your region</h1>
							<div class="desc">To optimize your experience, you will need to choose your region. This will provide the information relevant to the area you identify with.</div>
							<div class="form-group">
								<select name="region">
									<option value="NAM"<?php echo ( 'NAM'==get_region() ) ? ' selected': '';?>>NAM (North America)</option>
									<option value="EMEA"<?php echo ( 'EMEA'==get_region() ) ? ' selected': '';?>>EMEA (Europe, Middle East, Africa)</option>
									<option value="APAC"<?php echo ( 'APAC'==get_region() ) ? ' selected': '';?>>APAC (Asia-Pacific)</option>
								</select>
							</div>
							<div class="text-right">
								<button type="submit" class="button">Continue</button>
							</div>
						</form>
					</div>
					<div class="modal-footer text-center">
						<p>By clicking Continue, I agree to the Terms of Service and <a href="<?php echo get_permalink( 178 ); ?>">Privacy Statement</a><br>Already have an account? Continue</p>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php if( get_region() == false  && in_array(get_the_ID(), vpt_option('region_popup_pages')) ): ?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			setTimeout(function(){
				$('#setRegion').modal()
			}, 1000);
		});
		</script>
	<?php endif; ?>

	<a class="scrollup" id="linkTop" href="#"></a>
	<?php wp_footer();?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-43044845-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>