<?php
/**
*Servcies customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_portfolio_options_register')) {
	function mularx_portfolio_options_register( $wp_customize ) {
		$wp_customize->add_section(
	        'mularx_portfolio_options',
	        array(
	            'title'    => esc_html__( 'Portfolio Settings', 'mularx' ),
	            'panel'    => 'mularx_front_page_panel',
	            'priority' => 11,
	        )
	    );

		$wp_customize->add_setting( 'enable_portfolio_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_portfolio_section', 
			array(
			  'label'   => __( 'Enable Portfolio Section', 'mularx' ),
			  'section' => 'mularx_portfolio_options',
			  'settings' => 'enable_portfolio_section',
			  'type'    => 'checkbox',
			)
		);

		 $wp_customize->add_setting( 'portfolio_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'portfolio_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_portfolio_options',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_portfolio_section', true );
				}
			)
		);
		$wp_customize->add_setting( 'portfolio_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'portfolio_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_portfolio_options',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_portfolio_section', true );
				}
			)
		);  
		$wp_customize->add_setting(
    	'portfolio_post_per_page',
    	array(
	        'default'			=> '6',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'portfolio_post_per_page', 
		array(
			'label'      => __( 'Post Per Page', 'mularx'),
			'section'  => 'mularx_portfolio_options',
			'settings' => 'portfolio_post_per_page',
             'input_attrs' => array(
				'min'    => 1,
				'max'    => 20,
				'step'   => 1,
			),
            'active_callback' => function(){
					return get_theme_mod( 'enable_portfolio_section', true );
				}
		) ) 
	);
	    $wp_customize->add_setting( 'portfolio_all_button_label',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_text'
          ) 
        );
        $wp_customize->add_control( 'portfolio_all_button_label', 
            array(
            	'label' => __('Browse More Button','mularx'),
				'description'=>__('Label','mularx'),
				'section' => 'mularx_portfolio_options',
				'settings'   => 'portfolio_all_button_label',
				'type'     => 'text',
				'active_callback' => function(){
							return get_theme_mod( 'enable_portfolio_section', true );
					}
          )
        );
	    $wp_customize->add_setting( 'portfolio_all_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'portfolio_all_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_portfolio_options',
	            'settings'   => 'portfolio_all_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_portfolio_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'portfolio_all_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'portfolio_all_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_portfolio_options',
			  'settings' => 'portfolio_all_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_portfolio_section', true );
				}
			)
		);

		    /*portfolio section style*/
		   $wp_customize->add_setting( 
	        'portfolio_section_text_align', 
	        array(
	            'default'           => 'portfolio-section-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'portfolio_section_text_align',
				array(
					'section'	  => 'mularx_portfolio_options',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => esc_html__('Section Style','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'portfolio-section-text-align-left'  => esc_html__('Left','mularx'),
						'portfolio-section-text-align-center'  => esc_html__('Center','mularx'),
						'portfolio-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_portfolio_section', true );
			        },
				)
			)
		);

		    $wp_customize->add_setting(
	    	'portfolio_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'portfolio_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_portfolio_options',
				'settings' => 'portfolio_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_portfolio_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'portfolio_section_padding_bottom',
	    	array(
		        'default'			=> '60',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'portfolio_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_portfolio_options',
				'settings' => 'portfolio_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'enable_portfolio_section', true );
			        },
			) ) 
		);

	}
}
add_action( 'customize_register', 'mularx_portfolio_options_register' );