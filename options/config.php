<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

	$opt_name = "foe_options";

	global $foe_options;

    $foetheme = wp_get_theme();

    // Setup Redux
    Redux::setArgs(
    	'foe_options',
   		array(
       		'display_name' => 'FoE Theme Options',
       		'display_version' => 'v1.0',
       		'menu_title' => 'Theme Options',
       		'page_slug' => 'foe_options',
       		'menu_type' => 'menu',
       		'allow_sub_menu' => true,
		      'dev_mode'  => false
   	    )
    );

    // General Section
    Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'general_section',
        	'title' => 'General Settings',
        	'desc' => 'Change logo, favicon, title and more here.',
        	'icon' => 'el el-cog'
    	)
    );

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'foe_favicon',
			'type'       => 'media',
			'section_id' => 'general_section',
			'title'      => 'Favicon',
			'subtitle'   => 'Make sure it is a square image. (64x64 recommended)',
			'default'  => array(
			'url'=>'http://www.leeds.ac.uk/site/img/other/favicon.ico'
		  )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'site_desc',
			'type'       => 'text',
			'section_id' => 'general_section',
			'title'      => 'Meta Site Description',
			'subtitle'   => 'For SEO purposes',
			'desc'       => 'Set the default site description'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'site_font',
			'type'       => 'typography',
			'section_id' => 'general_section',
			'output'     => array( 'body' ),
			'title'      => 'Site font',
			'subtitle'   => 'Choose from any Google Font',
			'font-backup'=> true
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'foe_background',
			'type'       => 'background',
			'section_id' => 'general_section',
			'title'      => 'Body background',
			'subtitle'   => 'Choose a background colour or image for the theme'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'foe_links',
			'type'       => 'link_color',
			'section_id' => 'general_section',
			'title'      => 'Link colours',
			'subtitle'   => 'Choose a link colour for the theme'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'menu_logo',
			'type'       => 'media',
			'section_id' => 'general_section',
			'title'      => 'Navbar brand (menu logo)',
			'subtitle'   => 'If a logo needs to be used in the menu, put it here.'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'banner',
			'type'       => 'media',
			'section_id' => 'general_section',
			'title'      => 'Banner Image',
			'subtitle'   => 'Leave empty for no banner above the menu'
		)
	);

  Redux::setField(
		'foe_options',
		array(
			'id'         => 'preloader',
			'type'       => 'radio',
			'section_id' => 'general_section',
			'title'      => 'Website Preloader',
			'subtitle'   => 'Do you want to use a website preloader?',
      'options'    => array( 'yes' => 'Yes', 'no' => 'No' )
		)
	);

  Redux::setField(
		'foe_options',
		array(
			'id'         => 'preloader_image',
			'type'       => 'media',
			'section_id' => 'general_section',
			'title'      => 'Preloader GIF',
			'subtitle'   => 'Upload a gif for when the page is loading...',
      'required'   => array( 'preloader', 'equals', 'yes' )
		)
	);

  // Homepage section
	Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'homepage_section',
        	'title' => 'Homepage',
        	'desc' => 'Must use the Homepage template and be set as the homepage!',
        	'icon' => 'el el-home'
    	)
    );

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'carousel_radio',
			'type'       => 'radio',
			'section_id' => 'homepage_section',
			'title'      => 'Toggle Carousel',
			'subtitle'   => 'Toggle whether to use the Bootstrap Carousel in the theme.',
			'description'=> 'Use the Carousel plugin for more options.',
			'options'    => array( 'yes' => 'Yes', 'no' => 'No' )
		)
	);

  // Footer Section
	Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'footer_section',
        	'title' => 'Footer Options',
        	'icon'  => 'el el-chevron-down',
    	)
    );

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_width',
			'type'       => 'radio',
			'section_id' => 'footer_section',
			'title'      => 'Fullwidth footer',
			'subtitle'   => 'Select Yes for a fullwidth footer. No will place the footer inside a container.',
			'options'    => array ( 'yes' => 'Yes', 'no' => 'No' )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_color',
			'type'       => 'color',
			'section_id' => 'footer_section',
			'title'      => 'Footer background Colour',
			'subtitle'   => 'Set a background colour for the footer area. Will work with both fullwidth and container footers.',
			'default'    => '#ffffff',
			'validate'   => 'color'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_widgets',
			'type'       => 'radio',
			'section_id' => 'footer_section',
			'title'      => 'Footer Widgets',
			'subtitle'   => 'Set Yes for footer widgets to be visible',
			'options'    => array ( 'yes' => 'Yes', 'no' => 'No' )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_divider',
			'type'       => 'color',
			'section_id' => 'footer_section',
			'title'      => 'Divider and Border Colour',
			'subtitle'   => 'Set the divider and border colours. The divider appears between the footer widgets and the footer menu.',
			'desc'       => 'Set to transparent if you do not want a divider',
			'default'    => '#333',
			'validate'   => 'color',
			'required'   => array ( 'footer_widgets', 'equals', 'yes' )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'widget_align',
			'type'       => 'radio',
			'section_id' => 'footer_section',
			'title'      => 'Widget Alignment',
			'subtitle'   => 'Text alignment for the widget (default: Center)',
			'default'    => 'center',
			'options'    => array ( 'left' => 'Left Align', 'center' => 'Center Align', 'right' => 'Right Align' ),
			'required'   => array ( 'footer_widgets', 'equals', 'yes' )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_menu',
			'type'       => 'radio',
			'section_id' => 'footer_section',
			'title'      => 'Footer Menu',
			'subtitle'   => 'Set Yes for the footer menu to be visible',
			'options'    => array ( 'yes' => 'Yes', 'no' => 'No' )
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_text',
			'type'       => 'color',
			'section_id' => 'footer_section',
			'title'      => 'Footer Text Colour',
			'subtitle'   => 'Set a text colour for the footer area.',
			'transparent'=> false,
			'default'    => '#333',
			'validate'   => 'color'
		)
	);

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'footer_copyright',
			'type'       => 'text',
			'section_id' => 'footer_section',
			'title'      => 'Copyright Text',
			'subtitle'   => 'Choose the text to display after the &copy; date. Eg. University of Leeds.',
			'default'    => 'University of Leeds, Leeds, LS2 9JT.'
		)
	);

  // Bootstrap Options Section
  Redux::setSection(
    'foe_options',
    array(
      'id'    => 'bs_section',
      'title' => 'Bootstrap Options',
      'icon'  => 'el el-pencil',
    )
  );

  Redux::setField(
		'foe_options',
		array(
			'id'         => 'navbar',
			'type'       => 'radio',
			'section_id' => 'bs_section',
			'title'      => 'Navbar Type',
			'subtitle'   => 'Choose whether to have a fixed or static navbar',
      'desc'       => 'Fixed navbar will automatically append the body to the height of the navbar (using jQuery)',
      'default'    => 'static',
      'options'    => array ( 'static' => 'Static', 'fixed' => 'Fixed' )
		)
	);

  // Analytics Section
	Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'analytics_section',
        	'title' => 'Analytics',
        	'icon' => 'el el-graph',
    	)
    );

	Redux::setField(
		'foe_options',
		array(
			'id'         => 'google_analytics',
			'type'       => 'textarea',
			'section_id' => 'analytics_section',
			'title'      => 'Google Analytics',
			'subtitle'   => 'Analytics code including the script tags.',
			'validate'   => 'js'
		)
	);

  // Custom CSS Section
	Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'css_section',
        	'title' => 'Custom CSS',
			'desc'  => 'Use this instead of editing the stylesheet.',
        	'icon'  => 'el el-css',
    	)
    );

	Redux::setField(
		'foe_options', // This is your opt_name,
		array( // This is your arguments array
			'id'         => 'custom_css', // Unique identifier for your panel. Must be set and must not contain spaces or special characters
			'type'       => 'ace_editor',
			'section_id' => 'css_section',
			'title'      => 'CSS',
			'subtitle'   => 'Syntax-highlighted CSS goes in here.',
			'mode'       => 'css'
		)
	);

  // Custom CSS Section
	Redux::setSection(
    	'foe_options',
		array(
        	'id'    => 'js_section',
        	'title' => 'Custom JS',
			    'desc'  => 'Custom JS for the project. Will appear in the footer.',
        	'icon'  => 'el el-usd',
    	)
    );

	Redux::setField(
		'foe_options', // This is your opt_name,
		array( // This is your arguments array
			'id'         => 'custom_js', // Unique identifier for your panel. Must be set and must not contain spaces or special characters
			'type'       => 'ace_editor',
			'section_id' => 'js_section',
			'title'      => 'JS',
			'subtitle'   => 'Syntax-highlighted Javascript goes in here.',
			'mode'       => 'javascript'
		)
	);
?>
