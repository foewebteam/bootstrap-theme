<?php

// Remove admin bar

show_admin_bar(false);

// Add theme options core

include (TEMPLATEPATH . '/framework/framework.php');

// Theme options

require_once (dirname(__FILE__) . '/options/config.php');

// Required plugins

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'theme_require_plugins' );
 
function theme_require_plugins() {
 
    $plugins = array(
		array(
			'name'      => 'CPT Bootstrap Carousel',
			'slug'      => 'cpt-bootstrap-carousel',
			'required'  => false
		)
    );

    $config = array(
    	'id'           => 'foe-theme', // your unique TGMPA ID
    	'has_notices'  => true, 
    	'dismissable'  => true, 
    	'dismiss_msg'  => 'Bootstrap Carousel is recommended for the theme. Please download.', 
    	'is_automatic' => true, 
    	'strings'      => array() 
    );
 
    tgmpa( $plugins, $config );
 
}

// Scripts

function foe_scripts()
{
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap' );
}
add_action( 'wp_enqueue_scripts', 'foe_scripts' );

// Add featured images to theme

add_theme_support( 'post-thumbnails' );

// Register menus
require_once('navwalker.php');

add_theme_support( 'menus' );
function register_foe_menus() {
	register_nav_menus( array (
		'primary' => 'Primary Menu',
		'footer'  => 'Footer Menu'
	) );
}
add_action( 'init', 'register_foe_menus' );

// Register 'Sidebars'
// Left Footer Sidebar
add_action( 'widgets_init', 'foe_footer_one' );
function foe_footer_one() {
    register_sidebar( array(
        'name' => __( 'Footer Left', 'footer-left' ),
        'id' => 'footer-left',
        'description' => __( 'Widgets in this area will be shown in the left column in the footer.', 'footer-left' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

// Middle Footer Sidebar
add_action( 'widgets_init', 'foe_footer_two' );
function foe_footer_two() {
    register_sidebar( array(
        'name' => __( 'Footer Middle', 'footer-middle' ),
        'id' => 'footer-middle',
        'description' => __( 'Widgets in this area will be shown in the middle column in the footer.', 'footer-middle' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

// Right Footer Sidebar
add_action( 'widgets_init', 'foe_footer_three' );
function foe_footer_three() {
    register_sidebar( array(
        'name' => __( 'Footer Right', 'footer-right' ),
        'id' => 'footer-right',
        'description' => __( 'Widgets in this area will be shown in the right column in the footer.', 'footer-right' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

// Remove query string from static files
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
?>