<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');
get_template_part('inc/customizer/alpha', 'control');// New Alpha Control



/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section		
}
add_action( "customize_register", "progression_studios_change_default_customizer_panels" );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_studios_customize_preview_js() {
	wp_enqueue_script( 'progression_studios_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'progression_studios_customize_preview_js' );


function progression_studios_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'progression_studios_general_panel', array(
		'priority'    => 3,
		'title'       => esc_html__( 'General', 'multifondo-progression' ),
		 ) 
 	);
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_general_layout', array(
		'title'          => esc_html__( 'General Options', 'multifondo-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_site_boxed' ,array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_site_boxed', array(
		'label'    => esc_html__( 'Site Layout', 'multifondo-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'multifondo-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width',array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
		'label'    => esc_html__( 'Site Width(px)', 'multifondo-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 961,
			'max'  => 4500,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
		'label'    => esc_html__( 'Mouse Selection Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 20,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_bg', array(
		'default'	=> '#06d79c',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
		'default'	=> '#06d79c',
		'label'    => esc_html__( 'Mouse Selection Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 25,
		)) 
	);
	
	

	
	
	
	
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_caption' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_caption', array(
		'label'    => esc_html__( 'Lightbox Captions', 'multifondo-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 100,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_play' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_play', array(
		'label'    => esc_html__( 'Lightbox Gallery Play/Pause', 'multifondo-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 110,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_count' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_count', array(
		'label'    => esc_html__( 'Lightbox Gallery Count', 'multifondo-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 150,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	
	/* Section - General - Page Loader */
	$wp_customize->add_section( 'progression_studios_section_page_transition', array(
		'title'          => esc_html__( 'Page Loader', 'multifondo-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 26,
		) 
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'multifondo-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'multifondo-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_transition_loader' ,array(
		'default' => 'circle-loader-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'multifondo-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
			'circle-loader-pro' => esc_html__( 'Circle Loader Animation', 'multifondo-progression' ),
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'multifondo-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'multifondo-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'multifondo-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'multifondo-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'multifondo-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'multifondo-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'multifondo-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'multifondo-progression' ),
		
		 ),
		)
	);





	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_text', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 30,
	) ) 
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_secondary_color', array(
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_secondary_color', array(
		'label'    => esc_html__( 'Page Loader Secondary (Circle Loader)', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 31,
	) ) 
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 35,
	) ) 
	);
	
	
	
	
	
	
	


	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section( 'progression_studios_section_scroll', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'multifondo-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'multifondo-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'multifondo-progression' ),
		),
	) ) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
		'label'    => esc_html__( 'Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 15,
		) ) 
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_bg_color', array(
		'default' => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
		'label'    => esc_html__( 'Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 20,
		) ) 
	);



	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Arrow Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 30,
		) ) 
	);
	
	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
		'label'    => esc_html__( 'Hover Arrow Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 40,
		) ) 
	);


	

	
	
	
	
	
	/* Panel - Header */
	$wp_customize->add_panel( 'progression_studios_header_panel', array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'multifondo-progression' ),
		) 
	);
	
	
	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_logo', array(
		'title'          => esc_html__( 'Logo', 'multifondo-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_theme_logo', array(
		'section' => 'progression_studios_section_logo',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width',array(
		'default' => '147',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top',array(
		'default' => '30',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom',array(
		'default' => '29',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_position' ,array(
		'default' => 'progression-studios-logo-position-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
		'label'    => esc_html__( 'Logo Position', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 50,
		'choices'     => array(
			'progression-studios-logo-position-left' => esc_html__( 'Left', 'multifondo-progression' ),
			'progression-studios-logo-position-center' => esc_html__( 'Center (Block)', 'multifondo-progression' ),
			'progression-studios-logo-position-right' => esc_html__( 'Right', 'multifondo-progression' ),
		),
		))
	);
	


	/* Section - Header - Header Options */
	$wp_customize->add_section( 'progression_studios_section_header_bg', array(
		'title'          => esc_html__( 'Header Options', 'multifondo-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 20,
		) 
	);

	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_width' ,array(
		'default' => 'progression-studios-header-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_width', array(
		'label'    => esc_html__( 'Header Layout', 'multifondo-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-header-full-width' => esc_html__( 'Full Width', 'multifondo-progression' ),
			//'progression-studios-header-full-width-no-gap' => esc_html__( 'No Gap', 'multifondo-progression' ),
			'progression-studios-header-normal-width' => esc_html__( 'Max Width', 'multifondo-progression' ),
		),
		))
	);
	

	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_background_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
		'label'    => esc_html__( 'Header Background Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_bg_image' ,array(	
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_bg_image', array(
		'label'    => esc_html__( 'Header Background Image', 'multifondo-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 40,
		))
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'multifondo-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 50,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'multifondo-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'multifondo-progression' ),
		),
		))
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_top_background_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_top_background_color', array(
		'label'    => esc_html__( 'Header Top Background Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 41,
		)) 
	);

	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_top_bg_image' ,array(	
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_top_bg_image', array(
		'label'    => esc_html__( 'Header Top Background Image', 'multifondo-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 42,
		))
	);

	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section( 'progression_studios_section_mobile_header', array(
		'title'          => esc_html__( 'Tablet/Mobile Header Options', 'multifondo-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 23,
		) 
	);
	
	

	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_transparent' ,array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_header_transparent', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Transparent', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 9,
		'choices'     => array(
			'transparent' => esc_html__( 'Transparent', 'multifondo-progression' ),
			'default' => esc_html__( 'Default', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
		'label'    => esc_html__( 'Tablet/Mobile Background Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 10,
		)) 
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_menu_text' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_menu_text', array(
		'label'    => esc_html__( 'Display "Menu" text for Menu', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 11,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'multifondo-progression' ),
			'off' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_left' ,array(
		'default' => 'progression_studios_hide_top_left_bar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_left', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Left', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 12,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'multifondo-progression' ),
			'progression_studios_hide_top_left_bar' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_right' ,array(
		'default' => 'progression_studios_hide_top_left_right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_right', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Right', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 13,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'multifondo-progression' ),
			'progression_studios_hide_top_left_right' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);

	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_nav_padding' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_nav_padding', array(
		'label'    => esc_html__( 'Tablet/Mobile Nav Padding', 'multifondo-progression' ),
		'description'    => esc_html__( 'Optional padding above/below the Navigation. Example: 20', 'multifondo-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_width' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_width', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Width', 'multifondo-progression' ),
		'description'    => esc_html__( 'Optional logo width. Example: 180', 'multifondo-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_margin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_margin', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Margin Top/Bottom', 'multifondo-progression' ),
		'description'    => esc_html__( 'Optional logo margin. Example: 25', 'multifondo-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	
	
	
	
	/* Section - Header - Sticky Header */
	$wp_customize->add_section( 'progression_studios_section_sticky_header', array(
		'title'          => esc_html__( 'Sticky Header Options', 'multifondo-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 25,
		) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_header_sticky' ,array(
		'default' => 'none-sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 10,
		'choices'     => array(
			'sticky-pro' => esc_html__( 'Sticky Header', 'multifondo-progression' ),
			'none-sticky-pro' => esc_html__( 'Disable Sticky Header', 'multifondo-progression' ),
		),
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_background_color', array(
		'default' =>  'rgba(38,85,193,0.7)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
		'default' =>  'rgba(38,85,193,0.7)',
		'label'    => esc_html__( 'Sticky Header Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 15,
		)) 
	);
	



	

	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_logo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_sticky_logo', array(
		'label'    => esc_html__( 'Sticky Logo', 'multifondo-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 20,
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
		'label'    => esc_html__( 'Sticky Logo Width (px)', 'multifondo-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'multifondo-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
		'label'    => esc_html__( 'Sticky Logo Margin Top (px)', 'multifondo-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'multifondo-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
		'label'    => esc_html__( 'Sticky Logo Margin Bottom (px)', 'multifondo-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'multifondo-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 50,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
		'label'    => esc_html__( 'Sticky Nav Padding Top/Bottom', 'multifondo-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 60,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
		'label'    => esc_html__( 'Sticky Nav Font Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 70,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
		'label'    => esc_html__( 'Sticky Nav Font Hover Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 80,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_underline', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_underline', array(
		'label'    => esc_html__( 'Sticky Nav Underline', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 95,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
		'label'    => esc_html__( 'Sticky Nav Background Color', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 100,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
		'label'    => esc_html__( 'Sticky Nav Hover Background', 'multifondo-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 105,
		)) 
	);
	
	

	

	
	
	
	
	
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_align' ,array(
		'default' => 'progression-studios-nav-center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
		'label'    => esc_html__( 'Navigation Alignment', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-nav-left' => esc_html__( 'Left', 'multifondo-progression' ),
			'progression-studios-nav-center' => esc_html__( 'Center', 'multifondo-progression' ),
			'progression-studios-nav-right' => esc_html__( 'Right', 'multifondo-progression' ),
		),
		))
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size',array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 500,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding',array(
		'default' => '42',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
		'label'    => esc_html__( 'Navigation Padding Top/Bottom', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 505,
		'choices'     => array(
			'min'  => 5,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right',array(
		'default' => '22',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
		'label'    => esc_html__( 'Navigation Padding Left/Right', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 8,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
		'label'    => esc_html__( 'Navigation Font Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
		'label'    => esc_html__( 'Navigation Font Hover Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_underline', array(		
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_underline', array(
		'label'    => esc_html__( 'Navigation Underline', 'multifondo-progression' ),
		'description'    => esc_html__( 'Remove underline by clearing the color.', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 535,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
		'label'    => esc_html__( 'Navigation Item Background', 'multifondo-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
		'label'    => esc_html__( 'Navigation Item Background Hover', 'multifondo-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_letterspacing',array(
		'default' => '0.01',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_letterspacing', array(
		'label'          => esc_html__( 'Navigation Letter-Spacing', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 540,
		'choices'     => array(
			'min'  => -1,
			'max'  => 1,
			'step' => 0.01
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_header_login' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_login', array(
		'label'    => esc_html__( 'Login Top Right', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 590,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_search' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search', array(
		'label'    => esc_html__( 'Search Icon in Navigation', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 600,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_cart', array(
		'label'    => esc_html__( 'Cart Icon in Navigation', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 620,
		'choices'     => array(
			'on' => esc_html__( 'On', 'multifondo-progression' ),
			'off' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	


	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_color', array(
		'default'	=> '#0a0715',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_color', array(
		'label'    => esc_html__( 'Count Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 625,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_background', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_background', array(
		'label'    => esc_html__( 'Count Background', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 650,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_border', array(
		'default' => 'rgba(255,255,255,0.3)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_highlight_border', array(
		'default' => 'rgba(255,255,255,0.3)',
		'label'    => esc_html__( 'Highlight Button Border', 'multifondo-progression' ),
		'description'    => esc_html__( 'Add class "highlight-button" to a navigation menu item to create a button.', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 658,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_background', array(
		'default' => 'rgba(255,255,255,0)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_highlight_background', array(
		'default' => 'rgba(255,255,255,0)',
		'label'    => esc_html__( 'Highlight Button Background', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 660,
		)) 
	);

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_font_color', array(
		'label'    => esc_html__( 'Highlight Button Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 665,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_border_hover', array(
		'default' => 'rgba(255,255,255,0.7)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_highlight_border_hover', array(
		'default' => 'rgba(255,255,255,0.7)',
		'label'    => esc_html__( 'Highlight Button Border Hover', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 678,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_hover_background', array(
		'default' => 'rgba(255,255,255,0)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_highlight_hover_background', array(
		'default' => 'rgba(255,255,255,0)',
		'label'    => esc_html__( 'Highlight Button Background Hover', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 680,
		)) 
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_hover_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_hover_color', array(
		'label'    => esc_html__( 'Top Right Hover Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 690,
		)) 
	);
	

	
	
	
	
	
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_top', array(
		'default' => '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_top', array(
		'label'    => esc_html__( 'Sub-Navigation Border Top Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 6,
		)) 
	);
	
	

	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );	
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sub-Navigation Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 10,
		)) 
	);
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
		'label'    => esc_html__( 'Sub-Navigation Font Size', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_letterspacing' ,array(
		'default' => '0.02',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_letterspacing', array(
		'label'          => esc_html__( 'Sub-Navigation Letter-Spacing', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 515,
		'choices'     => array(
			'min'  => -1,
			'max'  => 1,
			'step' => 0.01
		), ) ) 
	);

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_font_color', array(
		'default'	=> '#717171',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#99b4ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Hover Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_color', array(
		'default'	=> '#e8e8e8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
		'label'    => esc_html__( 'Sub-Navigation Divider Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 550,
		)) 
	);
	
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_onoff' ,array(
		'default' => 'off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
		'label'    => esc_html__( 'Display Top Header Bar?', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 10,
		'choices'     => array(
			'on-pro' => esc_html__( 'On', 'multifondo-progression' ),
			'off-pro' => esc_html__( 'Off', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_background', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
		'label'    => esc_html__( 'Top Header Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 20,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_border_bottom', array(
		'default' => 'rgba(255,255,255, 0.11)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_border_bottom', array(
		'default' => 'rgba(255,255,255, 0.11)',
		'label'    => esc_html__( 'Top Header Border Bottom', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 22,
		)) 
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
		'label'    => esc_html__( 'Top Header Font Size', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 5,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
		'label'    => esc_html__( 'Top Header Padding Above/Below', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 535,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_color', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 550,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 555,
		)) 
	);
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_border_top', array(
		'default' => '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_top', array(
		'label'    => esc_html__( 'Sub Navigation Border top', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 560,
		)) 
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
		'label'    => esc_html__( 'Sub Navigation Background', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 565,
		)) 
	);

	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_border_clr', array(
		'default' => '#e8e8e8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_clr', array(
		'label'    => esc_html__( 'Sub Navigation Border Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 568,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_color', array(
		'default' => '#717171',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 570,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#99b4ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Hover Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_body_panel', array(
		'priority'    => 8,
        'title'       => esc_html__( 'Body', 'multifondo-progression' ),
    ) );
	 
	 
	 
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_color', array(
 		'default'	=> '#4689fb',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
 		'label'    => esc_html__( 'Default Link Color', 'multifondo-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 500,
 		)) 
 	);
	
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_hover_color', array(
 		'default'	=> '#2453bf',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
 		'label'    => esc_html__( 'Default Hover Link Color', 'multifondo-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 510,
 		)) 
 	);
	
	

	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
		'label'    => esc_html__( 'Body Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 513,
		)) 
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_body_bg_image', array(
		'label'    => esc_html__( 'Body Background Image', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 525,
		))
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 530,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'multifondo-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'multifondo-progression' ),
		),
		))
	);
	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_boxed_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
		'label'    => esc_html__( 'Boxed Content Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 560,
		)) 
	);
	
	

	

	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top',array(
		'default' => '190',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
		'label'    => esc_html__( 'Page Title Top Padding', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 501,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom',array(
		'default' => '125',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
		'label'    => esc_html__( 'Page Title Bottom Padding', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	

	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_image' ,array(
		'default' => get_template_directory_uri().'/images/page-title.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_page_title_bg_image', array(
		'label'    => esc_html__( 'Page Title Background Image', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'multifondo-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_color', array(
		'default' => '#2655c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 580,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_overlay_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color', array(
		'label'    => esc_html__( 'Page Title Image Overlay', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 600,
		)) 
	);
	
	
	

	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_sidebar_header_border', array(
		'default'	=> '#ebf0fc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sidebar_header_border', array(
		'label'    => esc_html__( 'Sidebar Heading Border Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sidebar-headings',
		'priority'   => 328,
		)) 
	);
	

	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_sidebar_divider', array(
		'default'	=> '#ebebeb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sidebar_divider', array(
		'label'    => esc_html__( 'Sidebar Divider Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-sidebar-headings',
		'priority'   => 330,
		)) 
	);
	
	
	
	
	/* Section - Blog - Blog Index Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_index', array(
   	'title'          => esc_html__( 'Blog Index Options', 'multifondo-progression' ),
   	'panel'          => 'progression_studios_blog_panel', // Not typically needed.
   	'priority'       => 20,
   ) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_cat_sidebar' ,array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_cat_sidebar', array(
		'label'    => esc_html__( 'Category Sidebar', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 70,
		'choices' => array(
			'left-sidebar' => esc_html__( 'Left', 'multifondo-progression' ),
			'right-sidebar' => esc_html__( 'Right', 'multifondo-progression' ),
			'no-sidebar' => esc_html__( 'Hidden', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
	

	

   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_transition' ,array(
		'default' => 'progression-studios-blog-image-no-effect',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_blog_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 104,
		'choices' => array(
			'progression-studios-blog-image-scale' => esc_html__( 'Zoom', 'multifondo-progression' ),
			'progression-studios-blog-image-zoom-grey' => esc_html__( 'Greyscale', 'multifondo-progression' ),
			'progression-studios-blog-image-zoom-sepia' => esc_html__( 'Sepia', 'multifondo-progression' ),
			'progression-studios-blog-image-zoom-saturate' => esc_html__( 'Saturate', 'multifondo-progression' ),
			'progression-studios-blog-image-zoom-shine' => esc_html__( 'Shine', 'multifondo-progression' ),
			'progression-studios-blog-image-no-effect' => esc_html__( 'No Effect', 'multifondo-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_border_color', array(
		'default' => 'rgba(0,0,0,0.07)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_blog_post_border_color', array(
		'default' => 'rgba(0,0,0,0.07)',
		'label'    => esc_html__( 'Post Border Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 105,
		)) 
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_background', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_post_background', array(
		'label'    => esc_html__( 'Post Background Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 106,
		)) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_shadow' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_shadow', array(
		'label'    => esc_html__( 'Blog Post Drop-Shadow', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 110,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Hover', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 206,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
	
	
	

   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_image_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 210,
		)) 
	);
	
  
	
	

	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_author_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_author_display', array(
		'label'    => esc_html__( 'Author', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 335,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_date_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_date_display', array(
		'label'    => esc_html__( 'Date', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 340,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_index_meta_category_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_meta_category_display', array(
		'label'    => esc_html__( 'Category', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 350,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_comment_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_comment_display', array(
		'label'    => esc_html__( 'Comment Count', 'multifondo-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 355,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
  
	

	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_page_title_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_post_page_title_bg_image', array(
		'label'    => esc_html__( 'Post Title Background Image', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 170,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_post_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_post_title_image_position', array(
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 180,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'multifondo-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_bg_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_post_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 190,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_overlay_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_post_title_overlay_color', array(
		'label'    => esc_html__( 'Page Title Image Overlay', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 200,
		)) 
	);
	

	
   /* Section - Blog - Blog Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sidebar' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
		'label'    => esc_html__( 'Blog Post Sidebar', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 330,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'multifondo-progression' ),
			'right' => esc_html__( 'Right', 'multifondo-progression' ),
			'none' => esc_html__( 'No Sidebar', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	




	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
		'label'    => esc_html__( 'Button Font Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1635,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background', array(
		'default'	=> '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
		'label'    => esc_html__( 'Button Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1640,
		)) 
	);
	


	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
		'label'    => esc_html__( 'Button Hover Font Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1650,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background_hover', array(
		'default'	=> '#3975e4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
		'label'    => esc_html__( 'Button Hover Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1680,
		)) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_shop_dashboard_highlight', array(
		'default' => '#4689fb',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_shop_dashboard_highlight', array(
		'default' => '#4689fb',
		'label'    => esc_html__( 'Dashboard Highlight Color', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-button-typography',
		'priority'   => 1685,
		)) 
	);
	

	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1700,
		'choices'     => array(
			'min'  => 4,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_letter_spacing',array(
		'default' => '0.03',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_letter_spacing', array(
		'label'    => esc_html__( 'Button Letter Spacing', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1710,
		'choices'     => array(
			'min'  => 0,
			'max'  => 2,
			'step' => 0.01
		), ) ) 
	);


	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_bordr_radius',array(
		'default' => '4',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_bordr_radius', array(
		'label'    => esc_html__( 'Button Border Radius', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1750,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_ionput_bordr_radius',array(
		'default' => '4',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_ionput_bordr_radius', array(
		'label'    => esc_html__( 'Input Border Radius', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1750,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_input_background', array(
		'default'	=> '#f9fbff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_background', array(
		'default'	=> '#f9fbff',
		'label'    => esc_html__( 'Default Input Background Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1790,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_input_border', array(
		'default'	=> '#99b4ee',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_border', array(
		'default'	=> '#99b4ee',
		'label'    => esc_html__( 'Default Input Border Color', 'multifondo-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1790,
		)) 
	);
	
	
	

	/* Panel - Footer Top LEvel
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 11,
        'title'       => esc_html__( 'Footer', 'multifondo-progression' ),
    ) 
 	);
	*/
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_footer_section', array(
		'title'          => esc_html__( 'Footer', 'multifondo-progression' ),
		/* 'panel'          => 'progression_studios_footer_panel',*/  // Not typically needed.
		'priority'       => 11,
		) 
	);
	
	/* Setting - Footer Elementor 
	https://gist.github.com/ajskelton/27369df4a529ac38ec83980f244a7227
	*/
	$progression_studios_elementor_library_list =  array(
		'' => 'Choose a template',
	);
	$progression_studios_elementor_args = array('post_type' => 'elementor_library', 'posts_per_page' => 99);
	$progression_studios_elementor_posts = get_posts( $progression_studios_elementor_args );
	foreach($progression_studios_elementor_posts as $progression_studios_elementor_post) {
	    $progression_studios_elementor_library_list[$progression_studios_elementor_post->ID] = $progression_studios_elementor_post->post_title;
	}
	
	$wp_customize->add_setting( 'progression_studios_footer_elementor_library' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_footer_elementor_library', array(
	  'type' => 'select',
	  'section' => 'progression_studios_section_footer_section',
	  'priority'   => 5,
	  'label'    => esc_html__( 'Footer Elementor Template', 'multifondo-progression' ),
	  'description'    => esc_html__( 'You can add/edit your footer under ', 'multifondo-progression') . '<a href="' . admin_url() . 'edit.php?post_type=elementor_library">Elementor > My Library</a>',
	  'choices'  => 	   $progression_studios_elementor_library_list,
	) );
	

	
	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_background', array(
 		'default'	=> '#2f2f2f',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
 		'label'    => esc_html__( 'Copyright Background', 'multifondo-progression' ),
 		'section' => 'progression_studios_section_footer_section',
 		'priority'   => 500,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
 		)) 
 	);



	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_footer_copyright' ,array(
		'default' =>  'All Rights Reserved. Developed by Progression Studios',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control( 'progression_studios_footer_copyright', array(
		'label'          => esc_html__( 'Copyright Text', 'multifondo-progression' ),
 	  'description'    => esc_html__( 'This default text will be replaced if you use a template above.', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'type' => 'textarea',
		'priority'   => 10,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_text_color', array(
		'default' => '#727272',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_text_color', array(
		'label'    => esc_html__( 'Copyright Text Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 525,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
		'label'    => esc_html__( 'Copyright Link Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 530,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
		'label'    => esc_html__( 'Copyright Link Hover Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 540,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);
	
	

	
 	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_copyright_location' ,array(
		'default' => 'footer-copyright-align-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
		'label'    => esc_html__( 'Copyright Text Alignment', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 19,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'footer-copyright-align-left' => esc_html__( 'Left', 'multifondo-progression' ),
			'footer-copyright-align-center' => esc_html__( 'Center', 'multifondo-progression' ),
			'footer-copyright-align-right' => esc_html__( 'Right', 'multifondo-progression' ),
		),
		))
	);
	
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_top',array(
		'default' => '35',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_top', array(
		'label'    => esc_html__( 'Copyright Padding Top', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 20,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_bottom',array(
		'default' => '35',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_bottom', array(
		'label'    => esc_html__( 'Copyright Padding Bottom', 'multifondo-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 22,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);

  
  
   
	
	
	
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_blog_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Blog', 'multifondo-progression' ),
    ) );
	
	


	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link', array(
		'default' => '#2f2f2f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
		'label'    => esc_html__( 'Title Color', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 5,
		)) 
	);
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link_hover', array(
		'default' => '#4689fb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
		'label'    => esc_html__( 'Title Hover Color', 'multifondo-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 10,
		)) 
	);
	

	
	
	
	
	
	
	#devnote remove option since most are deprecated and should be handled via framework/crowdfunding level
	/* Panel - Shop */
	/*$wp_customize->add_panel( 'progression_studios_shop_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Shop/Crowdfunding', 'multifondo-progression' ),
    ) 
 	);*/
	
  	/* Section - Shop - Shop Index Options */
  	/*$wp_customize->add_section( 'progression_studios_section_shop_index', array(
  		'title'          => esc_html__( 'Shop/Crowdfunding Index', 'multifondo-progression' ),
  		'panel'          => 'progression_studios_shop_panel', // Not typically needed.
  		'priority'       => 700,
  	) );*/
	
	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_columns' ,array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_columns', array(
		'label'    => esc_html__( 'Shop Index Columns', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 20,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		),
		))
	);
	
	


	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_posts_Page' ,array(
		'default' =>  '9',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_shop_posts_Page', array(
		'label'          => esc_html__( 'Shop Posts Per Page', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'text',
		'priority'   => 30,

		)
	
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_border_color', array(
		'default' => 'rgba(0,0,0,0.09)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_shop_post_border_color', array(
		'default' => 'rgba(0,0,0,0.09)',
		'label'    => esc_html__( 'Post Border Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 34,
		)) 
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_background', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_post_background', array(
		'label'    => esc_html__( 'Post Background Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 35,
		)) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shopratign_color', array(
		'default' => '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shopratign_color', array(
		'label'    => esc_html__( 'Shop Rating Color', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 40,
		)) 
	);
	
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_percent_text_location' ,array(
		'default' => 'below',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_percent_text_location', array(
		'label'    => esc_html__( 'Percent Text Location', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'select',
		'priority'   => 45,
		'choices' => array(
			'above' => esc_html__( 'Above', 'multifondo-progression' ),
	       'below' => esc_html__( 'Below', 'multifondo-progression' ),
		
		 ),
		)
	);
	
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_cat' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_cat', array(
		'label'    => esc_html__( 'Shop Index Category', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 55,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_byline' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_byline', array(
		'label'    => esc_html__( 'Shop Index Byline', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 60,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_raisd' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_raisd', array(
		'label'    => esc_html__( 'Shop Index Raised', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 65,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_goal' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_goal', array(
		'label'    => esc_html__( 'Shop Index Goal', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 70,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_percetnage' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_percetnage', array(
		'label'    => esc_html__( 'Shop Index Percentage', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 75,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_percetnage_text' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_percetnage_text', array(
		'label'    => esc_html__( 'Shop Index Percentage Text', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 80,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_time_remaining' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_index_time_remaining', array(
		'label'    => esc_html__( 'Shop Index Time Remaining', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 85,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);
	
	
	

   /* Section - Blog - Blog Index Post Options */
	/*$wp_customize->add_setting( 'progression_studios_shop_post_rating' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_rating', array(
		'label'    => esc_html__( 'Shop Index Rating', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 505,
		'choices' => array(
			'true' => esc_html__( 'Display', 'multifondo-progression' ),
			'false' => esc_html__( 'Hide', 'multifondo-progression' ),
		
		 ),
		))
	);*/
	
	
	
   /* Section - Shop - Shop Post Options */
   $wp_customize->add_section( 'progression_studios_section_shop_post', array(
   	'title'          => esc_html__( 'Shop/Crowdfunding Post Options', 'multifondo-progression' ),
   	'panel'          => 'progression_studios_shop_panel', // Not typically needed.
   	'priority'       => 770,
   ) 
	);
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_ost_bookmarks' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_ost_bookmarks', array(
		'label'    => esc_html__( 'Show Heart/Bookmark option', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 15,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'multifondo-progression' ),
			'off' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	

	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_backers_count' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_backers_count', array(
		'label'    => esc_html__( 'Show Backers Count', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 20,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'multifondo-progression' ),
			'off' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_percent_raised' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_percent_raised', array(
		'label'    => esc_html__( 'Show Percent Raised', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 25,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'multifondo-progression' ),
			'off' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	
	
   
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_related_display' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_related_display', array(
		'label'    => esc_html__( 'Show Related Products', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 65,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'multifondo-progression' ),
			'off' => esc_html__( 'Hide', 'multifondo-progression' ),
		),
		))
	);
	
	
	
	
	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_related_columns' ,array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_related_columns', array(
		'label'    => esc_html__( 'Related Posts Columns', 'multifondo-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 70,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		),
		))
	);
	
	



	
	
}
add_action( 'customize_register', 'progression_studios_customizer' );

//HTML Text
function progression_studios_sanitize_customizer( $input ) {
    return wp_kses( $input, TRUE);
}

//no-HTML text
function progression_studios_sanitize_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}

function progression_studios_customizer_styles() {
	global $post;
	
	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style( 'progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css' );

   if ( get_theme_mod( 'progression_studios_header_bg_image') && !is_front_page() && !is_home()  ) {
      $progression_studios_header_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image' ) ) . ");";
	}	else {
		$progression_studios_header_bg_image = "";
	}
	
	
   if ( get_theme_mod( 'progression_studios_sub_nav_border_top', '#06d79c') ) {
      $progression_studios_sub_nav_brder_top = "ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {border-top:3px solid " .  esc_attr( get_theme_mod('progression_studios_sub_nav_border_top', '#06d79c') ) . "; }";
	}	else {
		$progression_studios_sub_nav_brder_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_sub_border_top', '#06d79c') ) {
      $progression_studios_top_header_sub_nav_brder_top = "#multifondo-progression-header-top .sf-menu ul {border-top:3px solid " .  esc_attr( get_theme_mod('progression_studios_top_header_sub_border_top', '#06d79c') ) . "; }";
	}	else {
		$progression_studios_top_header_sub_nav_brder_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover' ) {
      $progression_studios_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_header_bg_cover = "background-repeat:repeat-all; ";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image') ) {
      $progression_studios_body_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_body_bg_image') ). ");";
	}	else {
		$progression_studios_body_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
      $progression_studios_body_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover; background-attachment: fixed;";
	}	else {
		$progression_studios_body_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_page_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_page_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
	
   if ( get_theme_mod( 'progression_studios_post_title_bg_color')  ) {
      $progression_studios_post_tite_bg_color = "background-color: " . esc_attr( get_theme_mod('progression_studios_post_title_bg_color', '#000000') ) . ";";
	}	else {
		$progression_studios_post_tite_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_page_title_bg_image')  ) {
      $progression_studios_post_tite_bg_image_post = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_post_page_title_bg_image',  get_template_directory_uri().'/images/page-title.jpg' ) ). ");";
	}	else {
		$progression_studios_post_tite_bg_image_post = "";
	}
	
   if ( get_theme_mod( 'progression_studios_blog_image_bg')  ) {
      $progression_studios_post_tite_bg_featuredimg_bg = ".progression-studios-feaured-image {background:" . esc_attr( get_theme_mod('progression_studios_blog_image_bg') ) . ";}";
	}	else {
		$progression_studios_post_tite_bg_featuredimg_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_page_post_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_post_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_post_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_overlay_color') ) {
      $progression_studios_page_tite_overlay_image_cover = "#page-title-pro:before {background:" .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color') ) . "; }";
	}	else {
		$progression_studios_page_tite_overlay_image_cover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_title_overlay_color') ) {
      $progression_studios_post_tite_overlay_image_cover = "#page-title-pro.page-title-pro-post-page:before {background:" .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color') ) . "; }";
	}	else {
		$progression_studios_post_tite_overlay_image_cover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_width', '0') != '0' ) {
      $progression_studios_sticky_logo_width = "width:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_width', '70') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_top', '0') != '0' ) {
      $progression_studios_sticky_logo_top = "padding-top:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_top', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_bottom', '0') != '0' ) {
      $progression_studios_sticky_logo_bottom = "padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_bottom = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_padding', '0') != '0' ) {
      $progression_studios_sticky_nav_padding = "
		.progression-sticky-scrolled .progression-mini-banner-icon {
			top:" . esc_attr( (get_theme_mod('progression_studios_sticky_nav_padding') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count { top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px; }
		.progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
					padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5  ). "px;
					padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5 ). "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
		}
			";
	}	else {
		$progression_studios_sticky_nav_padding = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_underline') ) {
      $progression_studios_nav_underline = "
		.progression-sticky-scrolled .sf-menu a:before {
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
		.progression-sticky-scrolled .sf-menu a:hover:before, .progression-sticky-scrolled .sf-menu li.sfHover a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline = "";
	}
	
   if (  get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_sticky_nav_option_font_color = "
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression-sticky-scrolled .active-mobile-icon-pro .mobile-menu-icon-pro, .progression-sticky-scrolled .mobile-menu-icon-pro,  .progression-sticky-scrolled .mobile-menu-icon-pro:hover,
			.progression-sticky-scrolled  #progression-studios-header-login-container a.progresion-studios-login-icon,
	.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
	}";
	}	else {
		$progression_studios_sticky_nav_option_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_optional_sticky_nav_font_hover = "
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
		.progression-sticky-scrolled .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_optional_sticky_nav_font_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg') ) {
      $progression_studios_optional_nav_bg = "background:" . esc_attr( get_theme_mod('progression_studios_nav_bg') ). ";";
	}	else {
		$progression_studios_optional_nav_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_underline') ) {
      $progression_studios_nav_underline_default = "
		.sf-menu a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#2a666e') ). ";
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#2a666e') ). ";
		}
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before,
	
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#2a666e') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline_default = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_onoff', 'off-pro') == 'off-pro' ) {
      $progression_studios_top_header_off_on_display = "display:none;";
	}	else {
		$progression_studios_top_header_off_on_display = "";
	}
	
   if ( get_theme_mod( 'progression_studios_pro_scroll_top', 'scroll-on-pro') == "scroll-off-pro" ) {
      $progression_studios_scroll_top_disable = "display:none;";
	}	else {
		$progression_studios_scroll_top_disable = "";
	}

	
   if ( get_theme_mod( 'progression_studios_nav_bg_hover') ) {
      $progression_studios_optiona_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_nav_bg_hover') ). "; }";
	}	else {
		$progression_studios_optiona_nav_bg_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_bg') ) {
      $progression_studios_optiona_sticky_nav_font_bg = ".progression-sticky-scrolled .sf-menu a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_font_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_hover_bg') ) {
      $progression_studios_optiona_sticky_nav_hover_bg = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_hover_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_hover_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_option_sticky_nav_font_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:". esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ). ";
	}";
	}	else {
		$progression_studios_option_sticky_nav_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_option_stickY_nav_font_hover_color = ".progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_option_stickY_nav_font_hover_color = "";
	}
	


	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_font') ) {
      $progression_studios_option_sticky_hightlight_font_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.sfHover.highlight-button a, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover { color:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_font') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button') ) {
      $progression_studios_option_sticky_hightlight_bg_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button_hover') ) {
      $progression_studios_option_sticky_hightlight_bg_color_hover = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button_hover') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "";
	}

   if ( get_theme_mod( 'progression_studios_mobile_header_bg') ) {
      $progression_studios_mobile_header_bg_color = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {background:". esc_attr( get_theme_mod('progression_studios_mobile_header_bg') ) . ";  }";
	}	else {
		$progression_studios_mobile_header_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_width') ) {
      $progression_studios_mobile_header_logo_width = "body #logo-pro img { width:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_width') ). "px; } ";
	}	else {
		$progression_studios_mobile_header_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_margin') ) {
      $progression_studios_mobile_header_logo_margin_top = " body #logo-pro img { padding-top:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; padding-bottom:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; }";
	}	else {
		$progression_studios_mobile_header_logo_margin_top = "";
	}

	
   if ( get_theme_mod( 'progression_studios_mobile_header_nav_padding') ) {
      $progression_studios_mobile_header_nav_padding_top = "		body header#masthead-pro #progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding')  ) . "px;}
		body header#masthead-pro .mobile-menu-icon-pro {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px; }
		body header#masthead-pro #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
		}";
	}	else {
		$progression_studios_mobile_header_nav_padding_top = "";
	}
	

	
	
   if (  function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() ) {
      $progression_studios_custom_tax_page_title_img = "body #page-title-pro {background-image:url('" . esc_url( z_taxonomy_image_url() ) . "'); }";
	}	else {
		$progression_studios_custom_tax_page_title_img = "";
	}
	
   if ( is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true ) ) {
      $progression_studios_custom_page_title_img = "body #page-title-pro {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true)) . "'); }";
	}	else {
		$progression_studios_custom_page_title_img = "";
	}
   if ( class_exists('Woocommerce') ) {
		global $woocommerce;
		if ( is_shop() || is_tax( 'product_cat')  || is_tax( 'product_tag') ) {
			$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
			if ( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true ) ) {
				$progression_studios_woo_page_title = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) ). "'); }";
			} else {
		$progression_studios_woo_page_title = "";
		}
		} else {
		$progression_studios_woo_page_title = "";
	}
	}	else {
		$progression_studios_woo_page_title = "";
	}
   if ( get_option( 'page_for_posts' ) ) {
		$cover_page = get_page( get_option( 'page_for_posts' ));
		 if ( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category( ) && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) {
			$progression_studios_blog_header_img = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ). "'); }";
		} else {
		$progression_studios_blog_header_img = ""; }
	}	else {
		$progression_studios_blog_header_img = "";
	}


   if ( get_theme_mod( 'progression_studios_header_icon_bg_color') ) {
      $progression_studios_top_header_icon_bg = "background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color') )  . ";";
	}	else {
		$progression_studios_top_header_icon_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_background') ) {
      $progression_studios_top_header_background_option = "background:" . esc_attr( get_theme_mod('progression_studios_top_header_background', '#000000') )  . ";";
	}	else {
		$progression_studios_top_header_background_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_border_bottom', 'rgba(255,255,255, 0.11)') ) {
      $progression_studios_top_header_border_bottom_option = "border-bottom:1px solid " . esc_attr( get_theme_mod('progression_studios_top_header_border_bottom', 'rgba(255,255,255, 0.11)') )  . ";";
	}	else {
		$progression_studios_top_header_border_bottom_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_blog_post_shadow') == 'true'  ) {
      $progression_studios_blog_shadow = "box-shadow: 0px 0px 25px rgba(0,0,0, 0.07);	";
	}	else {
		$progression_studios_blog_shadow = "";
	}
	

	
   if ( get_theme_mod( 'progression_studios_shop_post_rating', 'false') == 'false'  ) {
      $progression_studios_shop_rating_index = "ul.products li.product .progression-studios-shop-index-content .star-rating {display:none;}	";
	}	else {
		$progression_studios_shop_rating_index = "";
	}
	
 if ( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro' ) {
	 $progression_studios_boxed_layout = "
	 	@media only screen and (min-width: 959px) {
		
		#boxed-layout-pro.progression-studios-preloader {margin-top:90px;}
		#boxed-layout-pro.progression-studios-preloader.progression-preloader-completed {animation-name: ProMoveUpPageLoaderBoxed; animation-delay:200ms;}
 	 	#boxed-layout-pro { margin-top:50px; margin-bottom:50px;}
	 	}
		#boxed-layout-pro #content-pro {
			overflow:hidden;
		}
	 	#boxed-layout-pro {
	 		position:relative;
	 		width:". esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
	 		margin-left:auto; margin-right:auto; 
	 		background-color:". esc_attr( get_theme_mod('progression_studios_boxed_background_color', '#ffffff') ) . ";
	 		box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
	 	}
 	#boxed-layout-pro .width-container-pro { width:90%; }
 	
 	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		body #boxed-layout-pro{width:92%;}
	}
	
	";
 }	else {
		$progression_studios_boxed_layout = "";
	}
	
	$progression_studios_custom_css = "
	$progression_studios_custom_page_title_img
	$progression_studios_woo_page_title
	$progression_studios_custom_tax_page_title_img
	$progression_studios_blog_header_img
	body #logo-pro img {
		width:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_width', '147') ) . "px;
		padding-top:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_top', '30') ) . "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_bottom', '29') ) . "px;
	}
	.woocommerce-shop-single .summary .star-rating:before, .woocommerce-shop-single .woocommerce-product-rating .star-rating:before, #boxed-layout-pro #content-pro p.stars, #boxed-layout-pro #content-pro p.stars a, #boxed-layout-pro #content-pro p.stars a:hover, #boxed-layout-pro #content-pro .star-rating, #boxed-layout-pro ul.products li.product .star-rating, #boxed-layout-pro ul.products li.product .star-rating:before {
		color:" .  esc_attr( get_theme_mod('progression_studios_shopratign_color', '#06d79c') ) . ";
	}
	a, .woocommerce-shop-single .product_meta a:hover, .woocommerce-shop-single .woocommerce-product-rating a.woocommerce-review-link:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_color', '#4689fb') ) . ";
	}
	a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_hover_color', '#2453bf') ). ";
	}
	#multifondo-progression-header-top .sf-mega, header ul .sf-mega {margin-left:-" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') / 2 ) . "px; width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	body .elementor-section.elementor-section-boxed > . elementor-container {max-width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	.width-container-pro {  width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px; }
	$progression_studios_header_bg_optional
	body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before {
		$progression_studios_header_bg_image
		$progression_studios_header_bg_cover
	}
	body {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_background_color', '#ffffff') ). ";
		$progression_studios_body_bg
		$progression_studios_body_bg_cover
	}
	body:not(.home) #page-title-pro {
		background-color:" . esc_attr( get_theme_mod('progression_studios_header_background_color') ). ";
		background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_header_bg_image' ) ). ");
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '190') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '125') ). "px;
		$progression_studios_page_tite_bg_cover
	}
	body:not(.home) #progression-studios-header-position #logo-nav-pro {
		background-color:" . esc_attr( get_theme_mod('progression_studios_header_top_background_color') ). ";
		background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_top_bg_image' ) ) . ");
		background-position: center;
		background-size: cover;
	}
	$progression_studios_page_tite_overlay_image_cover
	
	.sidebar h2.widget-title, .sidebar h4.widget-title { border-color:" .   esc_attr( get_theme_mod('progression_studios_sidebar_header_border', '#ebf0fc') ). "; }
	.sidebar ul ul, .sidebar ul li, .widget .widget_shopping_cart_content p.buttons { border-color:" .   esc_attr( get_theme_mod('progression_studios_sidebar_divider', '#ebebeb') ). "; }
	
	/* START BLOG STYLES */	
	#page-title-pro.page-title-pro-post-page {
		$progression_studios_post_tite_bg_color
		$progression_studios_post_tite_bg_image_post
		$progression_studios_post_tite_bg_cover
	}
	.progression-blog-content {
		$progression_studios_blog_shadow
		background-color: " . esc_attr( get_theme_mod('progression_studios_blog_post_background', '#ffffff') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_blog_post_border_color', 'rgba(0,0,0,0.07)') ) . ";
	}
	$progression_studios_post_tite_overlay_image_cover
	$progression_studios_post_tite_bg_featuredimg_bg
	.progression-studios-default-blog-overlay:hover a img, .progression-studios-feaured-image:hover a img { opacity:" . esc_attr( get_theme_mod('progression_studios_blog_image_opacity', '1') ) . ";}
	h2.progression-blog-title a {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link', '#2f2f2f') ) . ";}
	h2.progression-blog-title a:hover {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link_hover', '#4689fb') ) . ";}
	/* END BLOG STYLES */
	
	/* START SHOP STYLES */
	.progression-studios-shop-index-content {
		background: " . esc_attr( get_theme_mod('progression_studios_shop_post_background', '#ffffff') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_shop_post_border_color', 'rgba(0,0,0,0.09)') ) . ";
	}

	$progression_studios_shop_rating_index
	/* END SHOP STYLES */
	
	/* START BUTTON STYLES */
	#reward_options input.button,
	.wpneo-dashboard-summery ul li.active,
	#wpneofrontenddata input#cc-image-upload-file-button, #campaign_update_addon_field input.removecampaignupdate,  input#addcampaignupdate, button#wpneo-update-save, button#cc-image-upload-file-button, input.wpneo-submit-campaign, input#wpneo_active_edit_form, .wpneo-buttons-group button#wpneo-edit, .wpneo-buttons-group button#wpneo-password-save, .wpneo-buttons-group button#wpneo-dashboard-save, .wpneo-buttons-group button#wpneo-contact-save, .wpneo-buttons-group button#wpneo-profile-save, .wpneo-admin-location .wpneo-fields-action span a, .wp-crowd-new-campaign a.wp-crowd-btn, .wpneo-dashboard-head-left .active, .dashboard-head-date input[type='submit'] {
		background:" . esc_attr( get_theme_mod('progression_shop_dashboard_highlight', '#4689fb') ) . ";
	}
	.progression-studios-jetpack-styles .sharedaddy .sd-content ul li a.sd-button:hover span,
	.progression-studios-jetpack-styles .sharedaddy .sd-content ul li a.sd-button:hover:before {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
	}
	.progression-studios-jetpack-styles .sharedaddy .sd-content ul li a.sd-button:hover {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	#reward_options input.button:hover, #wpneofrontenddata input#cc-image-upload-file-button:hover, input#addcampaignupdate:hover, button#wpneo-update-save:hover, button#cc-image-upload-file-button:hover, input.wpneo-submit-campaign:hover, input#wpneo_active_edit_form:hover, .wpneo-buttons-group button#wpneo-edit:hover, .wpneo-buttons-group button#wpneo-password-save:hover, .wpneo-buttons-group button#wpneo-dashboard-save:hover, .wpneo-buttons-group button#wpneo-contact-save:hover, .wpneo-buttons-group button#wpneo-profile-save:hover, .wpneo-admin-location .wpneo-fields-action span a:hover, .wp-crowd-new-campaign a.wp-crowd-btn:hover, .wpneo-dashboard-head-left .active:hover, .dashboard-head-date input[type='submit']:hover {
		background:" . esc_attr( get_theme_mod('progression_shop_dashboard_highlight', '#4689fb') ) . ";
	}
	.wpneo-dashboard-summery ul li.active:after {
	    border-color: " . esc_attr( get_theme_mod('progression_shop_dashboard_highlight', '#4689fb') ) . " rgba(0, 128, 0, 0) rgba(255, 255, 0, 0) rgba(0, 0, 0, 0);
	}
	.wpneo-dashboard-head-left ul li a, .dashboard-price-number, .wpneo-links div a:hover, .wpneo-links div.active a {
	    color: " . esc_attr( get_theme_mod('progression_shop_dashboard_highlight', '#4689fb') ) . ";
	}
	.wpneo-links div a:hover .wpcrowd-arrow-down, .wpneo-links div.active a .wpcrowd-arrow-down {
	    border: solid " . esc_attr( get_theme_mod('progression_shop_dashboard_highlight', '#4689fb') ) . ";
	    border-width: 0 2px 2px 0;
	}

	.wpneo-fields input[type='number'], .wpneo-fields input[type='text'], .wpneo-fields input[type='email'], .wpneo-fields input[type='password'],  .wpneo-fields textarea, .campaign_update_field_copy  input, .campaign_update_field_copy  textarea, #campaign_update_addon_field input, #campaign_update_addon_field textarea,
	.woocommerce input, #content-pro .woocommerce table.shop_table .coupon input#coupon_code, #content-pro .woocommerce table.shop_table input, form.checkout.woocommerce-checkout textarea.input-text, form.checkout.woocommerce-checkout input.input-text,
	.post-password-form input, .search-form input.search-field, .wpcf7 select, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		background:" . esc_attr( get_theme_mod('progression_studios_input_background', '#f9fbff') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_input_border', '#99b4ee') ) . ";
	}
	.wpneo-fields input[type='text'], .wpneo-fields input[type='email'], .wpneo-fields input[type='password'],  .wpneo-fields textarea {
		border-color:" . esc_attr( get_theme_mod('progression_studios_input_border', '#99b4ee') ) . " !important;
	}
	#reward_options input.button,
	.helpmeout-registration-page .wpneo-user-registration-wrap #wpneo-registration .wpneo-single input#user-registration-btn,
	.woocommerce form input.button,
	.woocommerce form input.woocommerce-Button,
	button.wpneo_donate_button,
	#boxed-layout-pro .progression-woocommerce-product-short-summary button.button,
	#boxed-layout-pro .progression-woocommerce-product-short-summary a.button,
	.post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '13') ) . "px;
	}
	.helpmeout-rewards-select_button button.select_rewards_button,
	#boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button  {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '13') ) . "px;
	}
	.progression-page-nav span, .progression-page-nav a, #content-pro ul.page-numbers li span.current, #content-pro ul.page-numbers li a {
		border-radius:" . esc_attr( get_theme_mod('progression_studios_ionput_bordr_radius', '4') ) . "px;
	}
	#reward_options input.button,
	#wpneo-registration input#user-registration-btn,
	#campaign_update_addon_field input.removecampaignupdate, button#wpneo-update-save, input#addcampaignupdate,
	button#cc-image-upload-file-button,
	input.wpneo-submit-campaign, input#wpneo_active_edit_form, .wpneo-buttons-group button#wpneo-edit, .wpneo-buttons-group button#wpneo-dashboard-btn-cancel, .wpneo-buttons-group button#wpneo-password-save, .wpneo-buttons-group button#wpneo-dashboard-save, .wpneo-buttons-group button#wpneo-contact-save, .wpneo-buttons-group button#wpneo-profile-save, button.wpneo_donate_button,
	.woocommerce input, #content-pro .woocommerce table.shop_table .coupon input#coupon_code, #content-pro .woocommerce table.shop_table input, form.checkout.woocommerce-checkout textarea.input-text, form.checkout.woocommerce-checkout input.input-text,
	#progression-checkout-basket a.cart-button-header-cart, .search-form input.search-field, .wpcf7 select, .post-password-form input, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		border-radius:" . esc_attr( get_theme_mod('progression_studios_ionput_bordr_radius', '4') ) . "px;
	}
	#helpmeeout-login-form:before {
		border-bottom: 8px solid " . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	#helpmeeout-login-form,
	.product #campaign_loved_html,
	ul.wpneo-crowdfunding-update li:hover span.round-circle,
	.tags-progression a:hover,
	.progression-page-nav a:hover, .progression-page-nav span, #content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	#progression-checkout-basket a.cart-button-header-cart, .flex-direction-nav a:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button,
	.mc4wp-form input[type='submit'] {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	body #content-pro a.wp-block-button__link,
	.helpmeout-registration-page .wpneo-user-registration-wrap #wpneo-registration .wpneo-single input#user-registration-btn,
	input.wpneo-submit-campaign,
	#wpneo-registration input#user-registration-btn,
	.woocommerce form input.button,
	.woocommerce form input.woocommerce-Button,
	.helpmeout-rewards-select_button button.select_rewards_button,
	button.wpneo_donate_button,
	.sidebar ul.progression-studios-social-widget li a,
	footer#site-footer .tagcloud a, .tagcloud a, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a,
	.post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit,
	#boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
		border-radius:" . esc_attr( get_theme_mod('progression_studios_button_bordr_radius', '4') ) . "px;
		letter-spacing:" . esc_attr( get_theme_mod('progression_studios_button_letter_spacing', '0.03') ) . "em;
	}
	#boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button {
		letter-spacing:" . esc_attr( get_theme_mod('progression_studios_button_letter_spacing', '0.03') ) . "em;
	}
	body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a {
	border-radius:0px;
	}
	.wpneo-fields input[type='number']:focus, #wpneofrontenddata .wpneo-fields select:focus, .campaign_update_field_copy  input:focus, .campaign_update_field_copy  textarea:focus, #campaign_update_addon_field input:focus, #campaign_update_addon_field textarea:focus, .wpneo-fields input[type='text']:focus, .wpneo-fields input[type='email']:focus, .wpneo-fields input[type='password']:focus,  .wpneo-fields textarea:focus {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . " !important;
	}
	.dashboard-head-date input[type='text']:focus,
	#panel-search-progression .search-form input.search-field:focus, blockquote.alignleft, blockquote.alignright, body .woocommerce-shop-single table.variations td.value select:focus, .woocommerce input:focus, #content-pro .woocommerce table.shop_table .coupon input#coupon_code:focus, body #content-pro .woocommerce table.shop_table input:focus, body #content-pro .woocommerce form.checkout.woocommerce-checkout input.input-text:focus, body #content-pro .woocommerce form.checkout.woocommerce-checkout textarea.input-text:focus, form.checkout.woocommerce-checkout input.input-text:focus, form#mc-embedded-subscribe-form  .mc-field-group input:focus, .wpcf7-form select:focus, blockquote, .post-password-form input:focus, .search-form input.search-field:focus, #respond textarea:focus, #respond input:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus,
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-handle {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
		outline:none;
	}
	body .woocommerce .woocommerce-MyAccount-content {
		border-left-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-range {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#06d79c') ) . ";
	}
	body #content-pro a.wp-block-button__link:hover,
	.helpmeout-registration-page .wpneo-user-registration-wrap #wpneo-registration .wpneo-single input#user-registration-btn:hover,
	input.wpneo-submit-campaign:hover,
	#wpneo-registration input#user-registration-btn:hover,
	.woocommerce form input.button:hover,
	.woocommerce form input.woocommerce-Button:hover,
	.helpmeout-rewards-select_button button.select_rewards_button:hover,
	button.wpneo_donate_button:hover,
	body #progression-checkout-basket a.cart-button-header-cart:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button:hover,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button:hover, .mc4wp-form input[type='submit']:hover, .progression-studios-blog-cat-overlay a, .progression-studios-blog-cat-overlay a:hover,
	.sidebar ul.progression-studios-social-widget li a:hover,
	footer#site-footer .tagcloud a:hover, .tagcloud a:hover, #boxed-layout-pro .woocommerce .shop_table input.button:hover, #boxed-layout-pro .form-submit input#submit:hover, #boxed-layout-pro #customer_login input.button:hover, #boxed-layout-pro .woocommerce-checkout-payment input.button:hover, #boxed-layout-pro button.button:hover, #boxed-layout-pro a.button:hover, .post-password-form input[type=submit]:hover, #respond input.submit:hover, .wpcf7-form input.wpcf7-submit:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#3975e4') ) . ";
	}
	/* END BUTTON STYLES */
	
	/* START Sticky Nav Styles */
	.progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, .progression-sticky-scrolled header#masthead-pro, #progression-sticky-header.progression-sticky-scrolled { background-color:" .   esc_attr( get_theme_mod('progression_studios_sticky_header_background_color', 'rgba(38,85,193,0.7)') ) ."; }
	body .progression-sticky-scrolled #logo-pro img {
		$progression_studios_sticky_logo_width
		$progression_studios_sticky_logo_top
		$progression_studios_sticky_logo_bottom
	}
	$progression_studios_sticky_nav_padding
	$progression_studios_sticky_nav_option_font_color	
	$progression_studios_optional_sticky_nav_font_hover
	$progression_studios_nav_underline
	/* END Sticky Nav Styles */
	/* START Main Navigation Customizer Styles */
	#progression-shopping-cart-count a.progression-count-icon-nav, nav#site-navigation { letter-spacing: ". esc_attr( get_theme_mod('progression_studios_nav_letterspacing', '0.01') ). "em; }
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 3 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 3 ). "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 6 ). "px;
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 6 ). "px;
	}
	.mobile-menu-icon-pro:hover, .active-mobile-icon-pro .mobile-menu-icon-pro {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#06d79c') ) . ";
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text {
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') ). "px;
	}
	#progression-shopping-cart-count span.progression-cart-count {
		top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 1). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 5 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 10 ). "px;
	}
	.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
	}
	.progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
	.progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
	.activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon { 
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#06d79c') ) . ";
	}
	#progression-studios-header-login-container a.progresion-studios-login-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 13 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 13 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 8 ). "px;
	}
	#progression-studios-header-search-icon i.pe-7s-search span, #progression-studios-header-login-container a.progresion-studios-login-icon span {
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15')). "px;
	}
	#progression-studios-header-login-container a.progresion-studios-login-icon i.fa-sign-in {
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 6 ). "px;
	}
	
	#progression-studios-header-search-icon i.pe-7s-search {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 4 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') - 4 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 8 ). "px;
	}
	.sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '42') ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') ). "px;
		$progression_studios_optional_nav_bg
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a  {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
	}
	$progression_studios_nav_underline_default
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon, 
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	
	#progression-studios-header-login-container:hover a.progresion-studios-login-icon, #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon,
	
	#progression-studios-header-search-icon:hover i.pe-7s-search, #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#06d79c') ) . ";
	}
	ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {
		background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#ffffff') ). ";
	}
	$progression_studios_top_header_sub_nav_brder_top
	$progression_studios_sub_nav_brder_top
	#main-nav-mobile { background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#ffffff') ). "; }
	ul.mobile-menu-pro li a { color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#717171') ) . "; }
	ul.mobile-menu-pro .sf-mega .sf-mega-section li a, ul.mobile-menu-pro .sf-mega .sf-mega-section, ul.mobile-menu-pro.collapsed li a {border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', '#e8e8e8') ) . ";}
	ul.mobile-menu-pro li a {
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0.02') ). "em;
	}
	ul#progression-studios-panel-login li a, .sf-menu li li a { 
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0.02') ). "em;
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13') ). "px;
	}
	#progression-checkout-basket .progression-sub-total {
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	ul#progression-studios-panel-login, #panel-search-progression input, #progression-checkout-basket ul#progression-cart-small li.empty { 
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	ul#progression-studios-panel-login a,
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #panel-search-progression .search-form input.search-field, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a, .progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#717171') ) . ";
	}
	
	.progression-sticky-scrolled ul#progression-studios-panel-login li a:hover, .progression-sticky-scrolled .sf-menu li li a:hover,  .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.current-menu-item li a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { 
		background:none;
	}
	ul#progression-studios-panel-login a:hover,
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add, .sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a, .sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { 
		color:". esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#99b4ee') ) . ";
	}
	
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#ffffff') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#0a0715') ) . ";
	}
	.progression-sticky-scrolled .sf-menu .progression-mini-banner-icon,
	.progression-mini-banner-icon {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ) . "; 
		color:#000000;
	}
	.progression-mini-banner-icon {
		top:" . esc_attr( (get_theme_mod('progression_studios_nav_padding', '42') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4 ). "px;
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') / 2 ) . "px; 
	}
	.sf-menu ul {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') / 3 ) . "px; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_background', 'rgba(255,255,255,0)') ) . "; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .sf-menu li.sfHover.highlight-button a, .sf-menu li.current-menu-item.highlight-button a, .sf-menu li.highlight-button a, .sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ). "; 
	}
	.sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_color', '#ffffff') ). "; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .sf-menu li.current-menu-item.highlight-button a:before, .sf-menu li.highlight-button a:before {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ). "; 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_background', 'rgba(255,255,255,0)') ). "; 
		opacity:1;
		width: 100%;
		width: calc(100% - 12px);
	}
	.sf-menu li.highlight-button a:before {
		border-color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_border', 'rgba(255,255,255,0.3)') ). "; 
	}
	.sf-menu li.highlight-button a:hover:before {
		border-color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_border_hover', 'rgba(255,255,255,0.7)') ). "; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .sf-menu li.current-menu-item.highlight-button a:hover:before, .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_background', 'rgba(255,255,255,0)') ). "; 
		width: 100%;
		width: calc(100% - 12px);
	}
	ul#progression-studios-panel-login li a, #progression-checkout-basket ul#progression-cart-small li, #progression-checkout-basket .progression-sub-total, #panel-search-progression .search-form input.search-field, .sf-mega li:last-child li a, body header .sf-mega li:last-child li a, .sf-menu li li a, .sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', '#e8e8e8') ) . ";
	}
	.sf-menu a:before {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ) . "px;
	}
	.sf-menu a:before, .sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
	   width: calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') -  7 ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ). "px;
	}
	#progression-inline-icons .progression-studios-social-icons {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ). "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
	}
	
	.sf-menu li.highlight-button { 
		margin-right:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ) . "px;
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ) . "px;
	}
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 15 ) . "px;
	}
	.sf-arrows .sf-with-ul:after { 
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 9 ) . "px;
	}
	
	.rtl .sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ) . "px;
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 15 ) . "px;
	}
	.rtl  .sf-arrows .sf-with-ul:after { 
		right:auto;
		left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 9 ) . "px;
	}
	
	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		#page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '190') - 15 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '125') - 15 ). "px;
		}
		.sf-menu ul {
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ) . "px; 
		}
		.sf-menu a:before {
			margin-left:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ) . "px;
		}
		.sf-menu a:before, .sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
		   width: calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) - 6) . "px);
		}
		.sf-menu a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ). "px;
		}
		.sf-menu li.highlight-button { 
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 13 ). "px;
		}
		.sf-arrows .sf-with-ul:after { 
			right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 7 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22')  ). "px;
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 13 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul:after { 
			right:auto;
			left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 7 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') -  12 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
	}
	
	$progression_studios_optiona_nav_bg_hover
	$progression_studios_optiona_sticky_nav_font_bg	
	$progression_studios_optiona_sticky_nav_hover_bg
	$progression_studios_option_sticky_nav_font_color	
	$progression_studios_option_stickY_nav_font_hover_color
	$progression_studios_option_sticky_hightlight_bg_color
	$progression_studios_option_sticky_hightlight_font_color
	$progression_studios_option_sticky_hightlight_bg_color_hover
	/* END Main Navigation Customizer Styles */
	/* START Top Header Top Styles */
	#multifondo-progression-header-top {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
		$progression_studios_top_header_off_on_display
	}
	#multifondo-progression-header-top .sf-menu a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
	}
	.progression-studios-header-left .widget, .progression-studios-header-right .widget {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') + 2 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') + 1 ) . "px;
	}
	#multifondo-progression-header-top .sf-menu a {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') + 2 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') + 2 ) . "px;
	}
	#multifondo-progression-header-top  .progression-studios-social-icons a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
		min-width:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') + 1 ) . "px;
		padding:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') + 1 ) . "px " . esc_attr( get_theme_mod('progression_studios_top_header_padding', '13') - 1 ) . "px;
		$progression_studios_top_header_icon_bg
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#bbbbbb') ) . ";
		border-right:1px solid " . esc_attr( get_theme_mod('progression_studios_header_icon_border_color', '#585752') ) . ";
	}
	#multifondo-progression-header-top .progression-studios-social-icons a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_icon_hover_color', '#ffffff') ) . ";
	}
	#multifondo-progression-header-top  .progression-studios-social-icons a:nth-child(1) {
		border-left:1px solid " . esc_attr( get_theme_mod('progression_studios_header_icon_border_color', '#585752') ) . ";
	}
	#main-nav-mobile .progression-studios-social-icons a {
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', '#444444') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#bbbbbb') ) . ";
	}
	#multifondo-progression-header-top a, #multifondo-progression-header-top .sf-menu a, #multifondo-progression-header-top {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_color', '#dddddd') ) . ";
	}
	#multifondo-progression-header-top a:hover, #multifondo-progression-header-top .sf-menu a:hover, #multifondo-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_hover_color', '#ffffff') ) . ";
	}

	#multifondo-progression-header-top .sf-menu ul {
		background:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_bg', '#ffffff') ) . ";
	}
	#multifondo-progression-header-top .sf-menu ul li a { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_border_clr', '#e8e8e8') ) . ";
	}

	.progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #multifondo-progression-header-top .sf-menu li.sfHover li a, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li a, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_color', '#717171') ) . "; }
	.progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #multifondo-progression-header-top .sf-menu li.sfHover li a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover a, #multifondo-progression-header-top .sf-menu li.sfHover li li a:hover, #multifondo-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #multifondo-progression-header-top .sf-menu li.sfHover li li li a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #multifondo-progression-header-top .sf-menu li.sfHover li li li li a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #multifondo-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #multifondo-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_hover_color', '#99b4ee') ) . ";
	}
	#multifondo-progression-header-top {
		$progression_studios_top_header_background_option
	}
	#multifondo-progression-header-top .width-container-pro {
		$progression_studios_top_header_border_bottom_option
	}
	/* END Top Header Top Styles */
	/* START FOOTER STYLES */
	footer#site-footer {
		background: " . esc_attr(get_theme_mod('progression_studios_footer_background', '#2f2f2f')) . ";
	}
	#pro-scroll-top:hover {   color: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_color', '#ffffff')) . ";    background: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#06d79c')) . ";  }
	footer#site-footer #copyright-text {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_text_color', '#727272')) . ";}
	footer#site-footer #progression-studios-copyright a {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_link', '#dddddd')) . ";}
	footer#site-footer #progression-studios-copyright a:hover { color: " . esc_attr(get_theme_mod('progression_studios_copyright_link_hover', '#ffffff')) . "; }
	#pro-scroll-top { $progression_studios_scroll_top_disable color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . ";  background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', '#888888')) . ";  }
	#copyright-text { padding:" . esc_attr(get_theme_mod('progression_studios_copyright_margin_top', '35')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_copyright_margin_bottom', '35')) . "px 0px; }
	#progression-studios-footer-logo { max-width:" . esc_attr( get_theme_mod('progression_studios_footer_logo_width', '250') ) . "px; padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_top', '45') ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_bottom', '0') ) . "px; padding-right:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_right', '0') ) . "px; padding-left:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_left', '0') ) . "px; }
	/* END FOOTER STYLES */
	@media only screen and (max-width: 959px) { 
		#page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '190') - 25 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '125') - 25 ). "px;
		}
		$progression_studios_header_bg_optional
		.progression-studios-transparent-header header#masthead-pro {
			$progression_studios_header_bg_image
			$progression_studios_header_bg_cover
		}
		$progression_studios_mobile_header_bg_color
		$progression_studios_mobile_header_logo_width
		$progression_studios_mobile_header_logo_margin_top
		$progression_studios_mobile_header_nav_padding_top
	}
	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		#progression-shopping-cart-count a.progression-count-icon-nav {
			margin-left:4px;
		}
		.width-container-pro {
			width:94%;
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width #progression-studios-header-width header#masthead-pro .width-container-pro,
		.progression-studios-header-full-width-no-gap #multifondo-progression-header-top .width-container-pro,
		footer#site-footer.progression-studios-footer-full-width .width-container-pro,
		.progression-studios-page-title-full-width #page-title-pro .width-container-pro,
		.progression-studios-header-full-width #multifondo-progression-header-top .width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width-no-gap.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro,
		.progression-studios-header-full-width.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro {
			width:98%;
			margin-left:2%;
			padding-right:0;
		}
		#multifondo-progression-header-top ul .sf-mega,
		header ul .sf-mega {
			margin-right:2%;
			width:98%; 
			left:0px;
			margin-left:auto;
		}
	}
	.progression-studios-spinner { border-left-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-right-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). "; border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-top-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; }
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{ 
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#ffffff')). ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; 
	}
	$progression_studios_boxed_layout
	::-moz-selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#2f2f2f') ) . ";}
	::selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#2f2f2f') ) . ";}
	";
        wp_add_inline_style( 'progression-studios-custom-style', $progression_studios_custom_css );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_customizer_styles' );