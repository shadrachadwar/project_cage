<?php
/**
 * mularx Theme Customizer
 *
 * @package mularx
 */
/**
*Custom controls for theme
*/

require get_template_directory() . '/inc/custom-controls/mularx-custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mularx_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'mularx_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'mularx_customize_partial_blogdescription',
			)
		);
	}
	//Panel register for theme option
	    $wp_customize->add_panel( 'mularx_theme_option_panel', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('General Settings', 'mularx'),
			) 
		);
		$wp_customize->add_panel( 'mularx_frontpage_option_panel', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Front Page Settings', 'mularx'),
			) 
		);
	$wp_customize->add_setting(
    	'mularx_site_title_size',
    	array(
	        'default'			=> '30',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'mularx_site_title_size', 
		array(
			'label'      => __( 'Logo Size [PX]', 'mularx'),
			'section'  => 'title_tagline',
			'settings' => 'mularx_site_title_size',
             'input_attrs' => array(
				'min'    => 10,
				'max'    => 150,
				'step'   => 1,
			),
		) ) 
	);
	$wp_customize->add_setting( 'mularx_site_title_font_family', array(
				'sanitize_callback' => 'mularx_sanitize_fonts',
				'default' => 'Heebo',
			)
		);

		$wp_customize->add_control( 'mularx_site_title_font_family', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Site Title Font Family', 'mularx' ),
				'description' => '',
				'section' => 'title_tagline',
				'choices' => mularx_google_fonts()
			)
		);
		$wp_customize->add_setting( 'mularx_site_title_color', 
			array(
		        'default'        => '#0e1020',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_site_title_color', 
			array(
		        'label'   => esc_html__( 'Title Color', 'mularx' ),
		        'section' => 'title_tagline',
		        'settings'   => 'mularx_site_title_color',
		    ) ) 
		);

	
}
add_action( 'customize_register', 'mularx_customize_register' );

/**
* Including customizer sanitization for theme
*
*/
require get_template_directory() . '/inc/mularx-sanitization-functions.php';
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
/*including theme customizer options*/
require get_template_directory() . '/inc/customizer/general-options.php';
require get_template_directory() . '/inc/customizer/header-options.php';
require get_template_directory() . '/inc/customizer/footer-options.php';
require get_template_directory() . '/inc/customizer/blog-options.php';
require get_template_directory() . '/inc/customizer/color-options.php';
require get_template_directory() . '/inc/customizer/typography-options.php';
require get_template_directory() . '/inc/customizer/social-options.php';
require get_template_directory() . '/inc/customizer/frontpage-options.php';
function mularx_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mularx_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
*
*Enqueue customizer styles and scripts
*/
function mularx_customize_controls_register_scripts() {
	wp_enqueue_style( 'mularx-customizer-style', get_template_directory_uri() . '/inc/customizer/mularx-customizer-style.css', array(), MULARX_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'mularx_customize_controls_register_scripts', 0 );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mularx_customize_preview_js() {
	wp_enqueue_script( 'mularx-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), MULARX_VERSION, true );
}
add_action( 'customize_preview_init', 'mularx_customize_preview_js' );
