<?php
/**
*steps customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_steps_options_register')) {
	function mularx_steps_options_register( $wp_customize ) {
		$wp_customize->add_section('mularx_steps_section', 
		 	array(
		        'title' => esc_html__('Process Steps', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );

	$wp_customize->add_setting( 'enable_steps_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_steps_section', 
			array(
			  'label'   => __( 'Enable Setps Section', 'mularx' ),
			  'section' => 'mularx_steps_section',
			  'settings' => 'enable_steps_section',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'steps_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'steps_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_steps_section',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_steps_section', true );
				}
			)
		);
		$wp_customize->add_setting( 'steps_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'steps_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_steps_section',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_steps_section', true );
				}
			)
		);  
		
		$steps_label = __('Step Box','mularx');
		for($i=1; $i <= 3; $i++){
		    $wp_customize->add_setting( 'steps_heading_'.$i, 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'steps_heading_'.$i, 
				array(
					'type' => 'text',
					'label' => $steps_label.' '.$i,
					'section' => 'mularx_steps_section',
					'description' => esc_html__( 'Heading','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_steps_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'steps_text_'.$i, 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'steps_text_'.$i, 
				array(
					'type' => 'text',
					'section' => 'mularx_steps_section',
					'description' => esc_html__( 'Info Text','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_steps_section', true );
			        },
				)
			);
			
		}

$wp_customize->add_setting( 
	        'steps_section_text_alignment', 
	        array(
	            'default'           => 'steps-section-text-align-left',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'steps_section_text_alignment',
				array(
					'section'	  => 'mularx_steps_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => esc_html__('Style Setting','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'steps-section-text-align-left'  => esc_html__('Left','mularx'),
						'steps-section-text-align-center'  => esc_html__('Center','mularx'),
						'steps-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_steps_section', true );
			        },
				)
			)
		);
	$wp_customize->add_setting(
	    	'steps_section_padding_top',
	    	array(
		        'default'			=> '70',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'steps_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_steps_section',
				'settings' => 'steps_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_steps_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'steps_section_padding_bottom',
	    	array(
		        'default'			=> '70',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'steps_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_steps_section',
				'settings' => 'steps_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_steps_section', true );
		        },
			) ) 
		);
	}
}
add_action( 'customize_register', 'mularx_steps_options_register' );