<?php
/**
*counter customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_counter_options_register')) {
	function mularx_counter_options_register( $wp_customize ) {
		$wp_customize->add_section('mularx_counter_section', 
		 	array(
		        'title' => esc_html__('Counter Numbers', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );

	$wp_customize->add_setting( 'enable_counter_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_counter_section', 
			array(
			  'label'   => __( 'Enable Counter Section', 'mularx' ),
			  'section' => 'mularx_counter_section',
			  'settings' => 'enable_counter_section',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 
	        'counter_section_layout', 
	        array(
	            'default'           => 'counter-section-layout-one',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'counter_section_layout',
				array(
					'section'	  => 'mularx_counter_section',
					'label' => esc_html__('Select Layout','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'counter-section-layout-one'  => esc_html__('Layout 1','mularx'),
						'counter-section-layout-two'  => esc_html__('Layout 2','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_counter_section', true );
			        },
				)
			)
		);

		$wp_customize->add_setting( 'counter_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'counter_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_counter_section',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_counter_section', true );
				}
			)
		);
		$wp_customize->add_setting( 'counter_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'counter_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_counter_section',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_counter_section', true );
				}
			)
		);  


		
		
		$counter_label = __('Counter Box','mularx');
		for($i=1; $i <= 4; $i++){
			$wp_customize->add_setting( 'counter_number_'.$i, 
		    	array(
			      'default'  =>  '100',
			      'sanitize_callback' => 'mularx_sanitize_number_absint'
			  	)
		    );
			$wp_customize->add_control( 'counter_number_'.$i, 
				array(
					'label' => $counter_label.' '.$i,
					'description' => '',
					'section' => 'mularx_counter_section',
					'description' => esc_html__( 'Counter Number','mularx' ),
					'settings' => 'counter_number_'.$i,
					'type'    => 'number',
					'active_callback' => function(){
					    return get_theme_mod( 'enable_counter_section', true );
					},
				)
			);

			$wp_customize->add_setting( 'counter_text_'.$i, 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'counter_text_'.$i, 
				array(
					'type' => 'text',
					'section' => 'mularx_counter_section',
					'description' => esc_html__( 'Text','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_counter_section', true );
			        },
				)
			);
			
	}

	$wp_customize->add_setting( 
	        'counter_section_text_alignment', 
	        array(
	            'default'           => 'counter-section-text-align-left',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'counter_section_text_alignment',
				array(
					'section'	  => 'mularx_counter_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => esc_html__('Style Settings','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'counter-section-text-align-left'  => esc_html__('Left','mularx'),
						'counter-section-text-align-center'  => esc_html__('Center','mularx'),
						'counter-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_counter_section', true );
			        },
				)
			)
		);

	$wp_customize->add_setting( 'counter_background_color', 
			array(
		        'default'        => '#f4f5fc',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'counter_background_color', 
			array(
		        'description'   => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_counter_section',
		        'settings'   => 'counter_background_color',
		        'active_callback' => function(){
				    return get_theme_mod( 'enable_counter_section', true );
				},
		    ) ) 
		);
		
		$wp_customize->add_setting( 'counter_text_color', 
			array(
		        'default'        => '#404040',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'counter_text_color', 
			array(
		        'description'   => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_counter_section',
		        'settings'   => 'counter_text_color',
		        'active_callback' => function(){
					    return get_theme_mod( 'enable_counter_section', true );
					},
		    ) ) 
		);


	$wp_customize->add_setting(
	    	'counter_section_padding_top',
	    	array(
		        'default'			=> '60',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'counter_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_counter_section',
				'settings' => 'counter_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_counter_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'counter_section_padding_bottom',
	    	array(
		        'default'			=> '60',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'counter_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_counter_section',
				'settings' => 'counter_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_counter_section', true );
		        },
			) ) 
		);
	}
}
add_action( 'customize_register', 'mularx_counter_options_register' );