<?php global $foe_options; ?>
<!DOCTYPE html>
<html>
<head>
	<!-- SEO Stuff -->
	<title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width,initial-scale=1" />
    	<meta name="author" content="Faculty of Environment Web Team" />
    	<meta name="copyright" content="Copyright (c)<?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved." />
	<?php if ( (is_page()) && (!is_front_page()) || (is_single()) && (!is_front_page()) ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php echo get_the_excerpt(); ?>" />
	<meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
	<meta property="og:image" content="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" />
	<?php endwhile; endif; endif; ?>
	<?php if( is_front_page() ) { ?>
    	<meta name="description" content="<?php echo $foe_options[site_desc]; ?>" />
	<meta property="og:description" content="<?php echo $foe_options[site_desc]; ?>" />
	<?php } ?>
	<link rel="canonical" href="<?php if( is_front_page() ) { echo home_url(); } elseif ( !is_front_page() ) { echo the_permalink(); } ?>" />
	<meta property="og:locale" content="en_GB" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php if (!is_front_page()) { echo the_title() . ' | '; } ?><?php bloginfo('name'); ?>" />
	<meta property="og:url" content="<?php if( is_front_page() ) { echo home_url(); } elseif ( !is_front_page() ) { echo the_permalink(); } ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta name="twitter:card" content="summary" />
	<?php if ( (is_page()) && (!is_front_page()) || (is_single()) && (!is_front_page()) ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>" />
	<meta name="twitter:image" content="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>" />
	<?php endwhile; endif; endif; ?>
	<?php if( is_front_page() ) { ?>
    	<meta name="twitter:description" content="<?php echo $foe_options[site_desc]; ?>" />
	<?php } ?>
	<meta name="twitter:title" content="<?php if (!is_front_page()) { echo the_title() . ' | '; } ?><?php bloginfo('name'); ?>" />

	<!-- Favicon -->
    	<link rel="shortcut icon" href="<?php
	if($foe_options['foe_favicon']['url'] == '') {
		echo "http://www.leeds.ac.uk/site/img/other/favicon.ico";
	} else {
		echo $foe_options['foe_favicon']['url'];
	} ?>" />

	<!-- Styles -->
        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

	<!-- Scripts -->

	<?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>

	<!-- Fonts -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">

	<!-- Theme Options Styles -->
	<style>
	a { color: <?php echo $foe_options['foe_links'][regular]; ?>; }
	a:hover { color: <?php echo $foe_options['foe_links'][hover]; ?>; }
	a:active { color: <?php echo $foe_options['foe_links'][active]; ?>; }
	<?php if( $foe_options['carousel_radio'] == 'yes' && is_front_page() ) {
		echo '.navbar { margin-bottom: 0px !important; }';
	} ?>
	body {
	<?php if( $foe_options['foe_background']['background-color'] != '' && $foe_options['foe_background']['background-image'] == '' ) {
		echo 'background-color: '. $foe_options['foe_background']['background-color']. ';';
	} ?>
	<?php if( $foe_options['foe_background']['background-image'] != '' ) {
		echo 'background-image: '      . $foe_options['foe_background']['background-image']. ';';
		echo 'background-repeat: '     . $foe_options['foe_background']['background-repeat']. ';';
		echo 'background-position: '   . $foe_options['foe_background']['background-position']. ';';
		echo 'background-size: '       . $foe_options['foe_background']['background-size'];
		echo 'background-attachment: ' . $foe_options['foe_background']['background-attachment']. ';';
	} ?>
	}
	.footer { color: <?php echo $foe_options['footer_text']; ?>; }
	.widget li { border-bottom: 1px solid <?php echo $foe_options['footer_divider']; ?>; }
	.widget li:last-child { border-bottom: 0px; }
	<?php echo $foe_options['custom_css']; ?>
	</style>
	<?php if( $foe_options['preloader'] == 'yes' ) { ?>
	<style>
	body {
   		overflow: hidden;
	}

	/* Preloader */
	#preloader {
    		position: fixed;
    		top:0;
    		left:0;
    		right:0;
    		bottom:0;
    		background-color:#fff; /* change if the mask should have another color then white */
    		z-index:999; /* makes sure it stays on top */
	}

	#status {
    		width:200px;
    		height:200px;
    		position:absolute;
    		left:50%; /* centers the loading animation horizontally one the screen */
    		top:50%; /* centers the loading animation vertically one the screen */
    		background-image:url('<?php echo $foe_options['preloader_image']['url']; ?>');
    		background-repeat:no-repeat;
    		background-position:center;
    		margin:-100px 0 0 -100px; /* is width and height divided by two */
	}
	.navbar-fixed-top, .navbar-fixed-bottom, .navbar-static-top {
		z-index: 990 !important;
	}
	</style>
	<?php } ?>
	<?php echo $foe_options['google_analytics']; ?>
	<?php if( $foe_options['navbar'] == 'fixed' && is_front_page() ) { ?>
		<script>
		jQuery(document).ready(function($) {
			var navbar = $('.navbar').height();
			$('body').css("padding-top", navbar);
		});
		</script>
	<?php } ?>
	<?php if( $foe_options['navbar'] == 'fixed' && !is_front_page() ) { ?>
		<script>
		jQuery(document).ready(function($) {
			var navbar = $('.navbar').height();
			$('body').css("padding-top", navbar + 20);
		});
		</script>
	<?php } ?>
</head>
    <body <?php body_class(); ?>>
	<?php if( $foe_options['preloader'] == 'yes' ) { ?>
	<div id="preloader">
    		<div id="status">&nbsp;</div>
	</div>
	<?php } ?>
	<?php if($foe_options['banner']['url'] == '') {
		echo '';
	} else {
		echo '<div class="container-fluid no-pad"><img class="top-banner" src="' . $foe_options['banner']['url'] . '" /></div>';
	} ?>
        <!-- Menu -->
        <nav class="navbar navbar-default navbar-<?php echo $foe_options['navbar']; ?>-top">
            <div class="container">
			 <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/"><?php
			if($foe_options['menu_logo']['url'] == 'no-image' || $foe_options['menu_logo']['url'] == '') {
				echo bloginfo('name');
			} else {
				echo '<img src="' . $foe_options['menu_logo']['url'] .'" />';
			}
		  ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
           		wp_nav_menu( array(
                		'menu'              => 'primary',
                		'theme_location'    => 'primary',
                		'depth'             => 1,
                		'container'         => 'div',
                		'container_class'   => 'collapse navbar-collapse',
        			'container_id'      => 'bs-example-navbar-collapse-1',
                		'menu_class'        => 'nav navbar-nav navbar-right',
                		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                		'walker'            => new wp_bootstrap_navwalker())
            			);
        		?>
                </div><!-- navbar-collapse -->
            </div><!-- row -->
	</div><!-- container -->
        </nav>
