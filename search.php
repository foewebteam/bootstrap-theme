<?php get_header(); ?>

<div class="container">
    <div class="row">
	<div class="col-md-12 col=sm-12 col-xs-12">
        <?php if ( have_posts() ) : ?>

   		<!-- HTML content appropriate for results found goes here -->
   		<?php while ( have_posts() ) : the_post();

      		// This "The Loop" where search results are output
      		get_template_part( 'content', get_post_format() );

   		endwhile; ?>

		<?php else : ?>
   		<!-- HTML content appropriate for results not found goes here -->
		<h2 class="text-center">No Results Found</h2>
		<?php endif; ?>
	</div>
    </div>
</div>

<?php get_footer(); ?>