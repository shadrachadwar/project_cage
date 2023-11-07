<?php
/**
* Teams customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_team_options_register')) {
	function mularx_team_options_register( $wp_customize ) {
		$wp_customize->add_section(
	        'mularx_team_options',
	        array(
	            'title'    => esc_html__( 'Team Settings', 'mularx' ),
	            'panel'    => 'mularx_front_page_panel',
	            'priority' => 12,
	        )
	    );

		$wp_customize->add_setting( 'enable_team_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_team_section', 
			array(
			  'label'   => __( 'Enable Team Section', 'mularx' ),
			  'section' => 'mularx_team_options',
			  'settings' => 'enable_team_section',
			  'type'    => 'checkbox',
			)
		);

		 $wp_customize->add_setting( 'team_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'team_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_team_options',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
			)
		);
		$wp_customize->add_setting( 'team_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'team_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_team_options',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
			)
		);  
		$wp_customize->add_setting(
    	'team_post_per_page',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'team_post_per_page', 
		array(
			'label'      => __( 'Post Per Page', 'mularx'),
			'section'  => 'mularx_team_options',
			'settings' => 'team_post_per_page',
             'input_attrs' => array(
				'min'    => 1,
				'max'    => 20,
				'step'   => 1,
			),
            'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
		) ) 
	);

	$wp_customize->add_setting(
	    	'team_member_image_height',
	    	array(
		        'default'			=> '350',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'team_member_image_height', 
			array(
				'label'      => __( 'Member Photo Height', 'mularx'),
				'section'  => 'mularx_team_options',
				'settings' => 'team_member_image_height',
	             'input_attrs' => array(
					'min'    => 100,
					'max'    => 800,
					'step'   =>1,
				),
	           'active_callback' => function(){
		            return get_theme_mod( 'enable_team_section', true );
		        },
			) ) 
		);

	    $wp_customize->add_setting( 'team_all_button_label',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_text'
          ) 
        );
        $wp_customize->add_control( 'team_all_button_label', 
            array(
            	'label' => __('Browse More Button','mularx'),
				'description'=>__('Label','mularx'),
				'section' => 'mularx_team_options',
				'settings'   => 'team_all_button_label',
				'type'     => 'text',
				'active_callback' => function(){
							return get_theme_mod( 'enable_team_section', true );
					}
          )
        );
	    $wp_customize->add_setting( 'team_all_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'team_all_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_team_options',
	            'settings'   => 'team_all_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
          )
        );
    $wp_customize->add_setting( 'team_all_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'team_all_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_team_options',
			  'settings' => 'team_all_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
			)
		);

		$wp_customize->add_setting( 'enable_team_excerpt', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_team_excerpt', 
			array(
			  'label'   => __( 'Enable  Excerpt', 'mularx' ),
			  'section' => 'mularx_team_options',
			  'settings' => 'enable_team_excerpt',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_team_section', true );
				}
			)
		);

		    /*team section style*/
		 $wp_customize->add_setting( 
	        'team_section_text_align', 
	        array(
	            'default'           => 'team-section-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'team_section_text_align',
				array(
					'section'	  => 'mularx_team_options',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => esc_html__('Section Style','mularx'),
					'type'        => 'select',
					'choices'	  => array(
						'team-section-text-align-left'  => esc_html__('Left','mularx'),
						'team-section-text-align-center'  => esc_html__('Center','mularx'),
						'team-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_team_section', true );
			        },
				)
			)
		);

		    $wp_customize->add_setting(
	    	'team_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'team_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_team_options',
				'settings' => 'team_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_team_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'team_section_padding_bottom',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'team_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_team_options',
				'settings' => 'team_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'enable_team_section', true );
			        },
			) ) 
		);

	}
}
add_action( 'customize_register', 'mularx_team_options_register' );