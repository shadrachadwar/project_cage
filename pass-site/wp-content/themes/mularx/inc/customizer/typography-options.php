<?php
/**
*Typography customizer options
*
* @package mularx
*
*/
require get_template_directory() . '/inc/mularx-google-fonts.php';

if (! function_exists('mularx_typography_options_register')) {
	function mularx_typography_options_register( $wp_customize ) {
		$wp_customize->add_panel( 'mularx_typography_panel', 
		  	array(
			    'priority'       => 20,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Typography Settings', 'mularx'),
			) 
		);
	//Typography
		$wp_customize->add_section('mularx_body_typography', 
		 	array(
		        'title' => esc_html__('Body Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h1', 
		 	array(
		        'title' => esc_html__('H1 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h2', 
		 	array(
		        'title' => esc_html__('H2 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h3', 
		 	array(
		        'title' => esc_html__('H3 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h4', 
		 	array(
		        'title' => esc_html__('H4 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h5', 
		 	array(
		        'title' => esc_html__('H5 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_heading_typography_h6', 
		 	array(
		        'title' => esc_html__('H6 Typography', 'mularx'),
		        'panel' =>'mularx_typography_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$font_weight_choices = array(
			'100'=>'100',
			'200'=>'200',
			'300'=>'300',
			'400'=>'400',
			'500'=>'500',
			'600'=>'600',
			'700'=>'700',
			'800'=>'800',
			'900'=>'900',
			'normal'=>'Normal',
			'bold' =>'Bold'
		);
		$font_style_choices = array(
			'initial'=>'Initial',
			'normal'=>'Normal',
			'italic'=>'Italic',
			'oblique'=>'Oblique'
		);
		$font_transform_choices = array(
			'initial'=>'Initial',
			'uppercase'=>'Uppercase',
			'lowercase'=>'Lowercase',
			'capitalize'=>'Capitalize',
			'normal'=>'Normal'
		);

		$wp_customize->add_setting( 'mularx_body_fonts', array(
				'sanitize_callback' => 'mularx_sanitize_fonts',
				'default' => 'Heebo',
			)
		);

		$wp_customize->add_control( 'mularx_body_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Body Typography', 'mularx' ),
				'description' => esc_html__('Font Family','mularx'),
				'section' => 'mularx_body_typography',
				'choices' => mularx_google_fonts()
			)
		);

		$wp_customize->add_setting(
		    	'mularx_font_size',
		    	array(
			        'default'			=> 14,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for Body [PX]', 'mularx'),
					'section'  => 'mularx_body_typography',
					'settings' => 'mularx_font_size',
		             'input_attrs' => array(
						'min'    => 12,
						'max'    => 24,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_setting( 'mularx_body_font_weight', array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_body_font_weight', array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Font Weight','mularx'),
				'section' => 'mularx_body_typography',
				'choices' => $font_weight_choices
			)
		);
		$wp_customize->add_setting( 'mularx_body_font_style', array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_body_font_style', array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Font Style','mularx'),
				'section' => 'mularx_body_typography',
				'choices' => $font_style_choices
			)
		);
		$wp_customize->add_setting( 'mularx_body_font_text_transform', array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_body_font_text_transform', array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Text Transform','mularx'),
				'section' => 'mularx_body_typography',
				'choices' => $font_transform_choices
			)
		);
		$wp_customize->add_setting(
	    	'mularx_body_font_line_height',
	    	array(
		        'default'			=> 24,
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'mularx_body_font_line_height', 
			array(
				'label' => '',
				'description'      => __( 'Line Height [PX]', 'mularx'),
				'section'  => 'mularx_body_typography',
				'settings' => 'mularx_body_font_line_height',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 150,
					'step'   => 1,
				),
			) ) 
		);
		$Heading_default_font_size= '';
		$heading_default_line_height='';
		/*H1*/
		for ($i=1; $i<=6; $i++){
			if($i==1){
				$Heading_default_font_size=50;
				$heading_default_line_height=55;
			}elseif($i==2){
				$Heading_default_font_size=40;
				$heading_default_line_height=45;
			}elseif($i==3){
				$Heading_default_font_size=30;
				$heading_default_line_height=35;
			}elseif($i==4){
				$Heading_default_font_size=24;
				$heading_default_line_height=30;
			}elseif($i==5){
				$Heading_default_font_size=18;
				$heading_default_line_height=25;
			}else{
				$Heading_default_font_size=16;
				$heading_default_line_height=22;
			}
		$wp_customize->add_setting( 'mularx_fonts_heading_h'.$i, array(
				'sanitize_callback' => 'mularx_sanitize_fonts',
				'default' => 'Heebo',
			)
		);

		$wp_customize->add_control( 'mularx_fonts_heading_h'.$i, array(
				'type' => 'select',
				'label'		  => esc_html__( 'Heading Typography', 'mularx' ),
				'description' => esc_html__('Font Family','mularx'),
				'section' => 'mularx_heading_typography_h'.$i,
				'choices' => mularx_google_fonts()
			)
		);
		$wp_customize->add_setting(
		    	'mularx_heading_font_size_h'.$i,
		    	array(
			        'default'			=> $Heading_default_font_size,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_heading_font_size_h'.$i, 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'mularx'),
					'section'  => 'mularx_heading_typography_h'.$i,
					'settings' => 'mularx_heading_font_size_h'.$i,
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting( 'mularx_heading_font_weight_h'.$i, array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_heading_font_weight_h'.$i, array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Font Weight','mularx'),
				'section' => 'mularx_heading_typography_h'.$i,
				'choices' => $font_weight_choices
			)
		);
		$wp_customize->add_setting( 'mularx_heading_font_style_h'.$i, array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_heading_font_style_h'.$i, array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Font Style','mularx'),
				'section' => 'mularx_heading_typography_h'.$i,
				'choices' => $font_style_choices
			)
		);
		$wp_customize->add_setting( 'mularx_heading_font_text_transform_h'.$i, array(
				'sanitize_callback' => 'mularx_sanitize_text',
				'default' => 'default',
			)
		);

		$wp_customize->add_control( 'mularx_heading_font_text_transform_h'.$i, array(
				'type' => 'select',
				'label'		  => '',
				'description' => esc_html__('Text Transform','mularx'),
				'section' => 'mularx_heading_typography_h'.$i,
				'choices' => $font_transform_choices
			)
		);
		$wp_customize->add_setting(
	    	'mularx_heading_font_line_height_h'.$i,
	    	array(
		        'default'			=> $heading_default_line_height,
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'mularx_heading_font_line_height_h'.$i, 
			array(
				'label' => '',
				'description'      => __( 'Line Height [PX]', 'mularx'),
				'section'  => 'mularx_heading_typography_h'.$i,
				'settings' => 'mularx_heading_font_line_height_h'.$i,
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 150,
					'step'   => 1,
				),
			) ) 
		);

		}
	}

}
add_action( 'customize_register', 'mularx_typography_options_register' );