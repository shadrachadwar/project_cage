<?php
/**
*services customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_services_options_register')) {
	function mularx_services_options_register( $wp_customize ) {
		$wp_customize->add_section(
	        'mularx_services_options',
	        array(
	            'title'    => esc_html__( 'Services Settings', 'mularx' ),
	            'panel'    => 'mularx_front_page_panel',
	            'priority' => 10,
	        )
	    );

		$wp_customize->add_setting( 'enable_services_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_services_section', 
			array(
			  'label'   => __( 'Enable services Section', 'mularx' ),
			  'section' => 'mularx_services_options',
			  'settings' => 'enable_services_section',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_setting( 
	        'service_section_layout', 
	        array(
	            'default'           => 'service-section-layout-one',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_section_layout',
				array(
					'section'	  => 'mularx_services_options',
					'label' => esc_html__('Select Layout','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'service-section-layout-one'  => esc_html__('Layout 1','mularx'),
						'service-section-layout-two'  => esc_html__('Layout 2','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_services_section', true );
			        },
				)
			)
		);

		 $wp_customize->add_setting( 'services_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'services_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_services_options',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_services_section', true );
				}
			)
		);
		$wp_customize->add_setting( 'services_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'services_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_services_options',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_services_section', true );
				}
			)
		);  
		$wp_customize->add_setting( 'select_service_page', array(
		        'default' => '',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' =>'mularx_sanitize_text'
		        ));
	    $wp_customize->add_control(
			new mularx_Dropdown_Pages_Control($wp_customize, 
			'select_service_page',
		    	array(
					'description'    => esc_html__( 'Select Parent Page', 'mularx' ),
					'section'  => 'mularx_services_options',
					'type'     => 'dropdown-pages',
					'settings' => 'select_service_page',
					'active_callback' => function(){
					    return get_theme_mod( 'enable_services_section', true );
					},
		    	) 
	    	)
	    );

	    $wp_customize->add_setting( 'service_all_button_label',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_text'
          ) 
        );
        $wp_customize->add_control( 'service_all_button_label', 
            array(
            	'label' => __('Browse More Button','mularx'),
				'description'=>__('Label','mularx'),
				'section' => 'mularx_services_options',
				'settings'   => 'service_all_button_label',
				'type'     => 'text',
				'active_callback' => function(){
							return get_theme_mod( 'enable_services_section', true );
					}
          )
        );
	    $wp_customize->add_setting( 'service_all_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'service_all_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_services_options',
	            'settings'   => 'service_all_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_services_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'service_all_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'service_all_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_services_options',
			  'settings' => 'service_all_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_services_section', true );
				}
			)
		);





		/*service section style*/
		$wp_customize->add_setting( 
	        'service_section_text_align', 
	        array(
	            'default'           => 'service-section-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_section_text_align',
				array(
					'section'	  => 'mularx_services_options',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => esc_html__('Section Style','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'service-section-text-align-left'  => esc_html__('Left','mularx'),
						'service-section-text-align-center'  => esc_html__('Center','mularx'),
						'service-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_services_section', true );
			        },
				)
			)
		);


		$wp_customize->add_setting(
	    	'service_image_width',
	    	array(
		        'default'			=> '410',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'service_image_width', 
			array(
				'label' => '',
				'description'      => __( 'Icon/Image Width', 'mularx'),
				'section'  => 'mularx_services_options',
				'settings' => 'service_image_width',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    =>650,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_services_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'service_image_height',
	    	array(
		        'default'			=> '320',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'service_image_height', 
			array(
				'label' => '',
				'description'      => __( 'Icon/Image Height[px]', 'mularx'),
				'section'  => 'mularx_services_options',
				'settings' => 'service_image_height',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 650,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_services_section', true );
		        },
			) ) 
		);

		    $wp_customize->add_setting(
	    	'services_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'services_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_services_options',
				'settings' => 'services_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_services_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'services_section_padding_bottom',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'services_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_services_options',
				'settings' => 'services_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'enable_services_section', true );
			        },
			) ) 
		);

	}
}
add_action( 'customize_register', 'mularx_services_options_register' );