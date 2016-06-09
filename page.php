<?php get_header(); ?>

<div class="container">
    <div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

		<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

		<p><?php the_content(); ?></p>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts match your criteria.'); ?></p>
		<?php endif; ?>
	</div>
    </div>
</div>

<?php get_footer(); ?>