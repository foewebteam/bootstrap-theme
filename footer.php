	<?php global $foe_options; ?>
	<?php if( $foe_options['footer_width'] == 'yes' ) {
		echo '<div class="container-fluid footer" style="background-color: ' . $foe_options['footer_color'] .'">';
	} else {
		echo '<div class="container footer" style="background-color: ' . $foe_options['footer_color'] .'">';
	} ?>

	<?php if ( $foe_options['footer_widgets'] == 'yes' ) { ?>
		<div class="container footer-widgets">
			<div class="row">
				<div class="col-md-4 col-sm-12 footer-widget" style="text-align: <?php echo $foe_options['widget_align']; ?>">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div>
				<div class="col-md-4 col-sm-12 footer-widget" style="text-align: <?php echo $foe_options['widget_align']; ?>">
					<?php dynamic_sidebar( 'footer-middle' ); ?>
				</div>
				<div class="col-md-4 col-sm-12 footer-widget" style="text-align: <?php echo $foe_options['widget_align']; ?>">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div>
			</div>
		</div>
		<hr style="border-color: <?php echo $foe_options['footer_divider']; ?>;">
	<?php } ?>

	<?php if ( $foe_options['footer_menu'] == 'yes' ) { ?>
		<div class="row">
			<div class="container text-center">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>
		</div>
	<?php } ?>

	<div class="row">
		<div class="container text-center">
			<p class="copyright">&copy; <?php echo date("Y"); ?> <?php echo $foe_options['footer_copyright']; ?></p>
		</div>
	</div>

	<?php if( $foe_options['footer_width'] == 'yes' || $foe_options['footer_width'] == 'no' || $foe_options['footer_width'] == '' ) {
		echo '</div>';
	} ?>
    	<?php wp_footer(); ?>
	<?php if( $foe_options['preloader'] == 'yes' ) { ?>
	<script type="text/javascript">
    	//<![CDATA[
        jQuery(window).load(function() { // makes sure the whole site is loaded
            	jQuery('#status').fadeOut(); // will first fade out the loading animation
            	jQuery('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            	jQuery('body').delay(350).css({'overflow':'visible'});
        })
    	//]]>
	</script>
	<?php } ?>
</body>
</html>