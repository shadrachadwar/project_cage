<?php
/**
*color  customizer options
*
* @package mularx
*
*/
add_action( 'customize_register', 'mularx_color_settings_panel' );

function mularx_color_settings_panel( $wp_customize)  {
    $wp_customize->get_section('colors')->priority = 1;
    $wp_customize->get_section( 'colors' )->title  = esc_html__('Color', 'mularx');
    $wp_customize->get_section('colors')->panel = 'mularx_theme_option_panel';
}
if (! function_exists('mularx_color_options_register')) {
	function mularx_color_options_register( $wp_customize ) {
		//blog
		$wp_customize->add_setting( 'mularx_primary_color', 
			array(
		        'default'        => '#04174a',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_primary_color', 
			array(
		        'label'   => esc_html__( 'Site Color Settings', 'mularx' ),
		        'description' => esc_html__( 'Primary Color', 'mularx' ),
		        'section' => 'colors',
		        'settings'   => 'mularx_primary_color',
		        'priority' => 1
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_secondary_color', 
			array(
		        'default'        => '#5034fc',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_secondary_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Secondary Color', 'mularx' ),
		        'section' => 'colors',
		        'settings'   => 'mularx_secondary_color',
		        'priority' => 2
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_heading_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_heading_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Heading Color', 'mularx' ),
		        'section' => 'colors',
		        'settings'   => 'mularx_heading_color',
		        'priority' => 3
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_light_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_light_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Light Color', 'mularx' ),
		        'section' => 'colors',
		        'settings'   => 'mularx_light_color',
		        'priority' => 3
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_text_color', 
			array(
		        'default'        => '#404040',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'colors',
		        'settings'   => 'mularx_text_color',
		        'priority' => 3
		    ) ) 
		);
		
	}
}
add_action( 'customize_register', 'mularx_color_options_register' );