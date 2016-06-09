<?php
/*
Template Name: Home page Template
*/
?>
<?php global $foe_options; ?>
<?php get_header(); ?>

<?php if($foe_options['carousel_radio'] == 'yes') {
	echo do_shortcode('[image-carousel]');
} else {
	echo '';
} ?>

<div class="container">
    <div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<p><?php the_content(); ?></p>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts match your criteria.'); ?></p>
		<?php endif; ?>
	</div>
    </div>
</div>

<?php get_footer(); ?>