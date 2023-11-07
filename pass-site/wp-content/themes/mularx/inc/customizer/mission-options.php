<?php
/**
*missions customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_missions_options_register')) {
	function mularx_missions_options_register( $wp_customize ) {
		$wp_customize->add_section(
	        'mularx_missions_options',
	        array(
	            'title'    => esc_html__( 'Mission & Goal Settings', 'mularx' ),
	            'panel'    => 'mularx_front_page_panel',
	            'priority' => 10,
	        )
	    );

		$wp_customize->add_setting( 'enable_missions_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_missions_section', 
			array(
			  'label'   => __( 'Enable Mission & Goal Section', 'mularx' ),
			  'section' => 'mularx_missions_options',
			  'settings' => 'enable_missions_section',
			  'type'    => 'checkbox',
			)
		);

		 $wp_customize->add_setting( 'missions_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'missions_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_missions_options',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'enable_missions_section', true );
				}
			)
		);
		
		$wp_customize->add_setting( 'select_mission_page', array(
		        'default' => '',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' =>'mularx_sanitize_text'
		        ));
	    $wp_customize->add_control(
			new mularx_Dropdown_Pages_Control($wp_customize, 
			'select_mission_page',
		    	array(
					'description'    => esc_html__( 'Select Page', 'mularx' ),
					'section'  => 'mularx_missions_options',
					'type'     => 'dropdown-pages',
					'settings' => 'select_mission_page',
					'active_callback' => function(){
					    return get_theme_mod( 'enable_missions_section', true );
					},
		    	) 
	    	)
	    );
	    $wp_customize->add_setting( 'mission_title_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'mission_title_status', 
			array(
			  'label'   => esc_html__( 'Enable Title', 'mularx' ),
			  'section' => 'mularx_missions_options',
			  'settings' => 'mission_title_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'enable_missions_section', true );
		        },
			)
		);
		 $wp_customize->add_setting( 'mission_readmore_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'mission_readmore_status', 
			array(
			  'label'   => esc_html__( 'Enable Read More Button', 'mularx' ),
			  'section' => 'mularx_missions_options',
			  'settings' => 'mission_readmore_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'enable_missions_section', true );
		        },
			)
		);
	    $wp_customize->add_setting( 'mission_more_button_label',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_text'
          ) 
        );
        $wp_customize->add_control( 'mission_more_button_label', 
            array(
				'description'=>__('Read More Label','mularx'),
				'section' => 'mularx_missions_options',
				'settings'   => 'mission_more_button_label',
				'type'     => 'text',
				'active_callback' => function(){
							return get_theme_mod( 'enable_missions_section', true );
					}
          )
        );
	

		    /*mission section style*/


	$wp_customize->add_setting(
	    	'missions_section_padding_top',
	    	array(
		        'default'			=> '70',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'missions_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_missions_options',
				'settings' => 'missions_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_missions_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'missions_section_padding_bottom',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'missions_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_missions_options',
				'settings' => 'missions_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'enable_missions_section', true );
			        },
			) ) 
		);

	}
}
add_action( 'customize_register', 'mularx_missions_options_register' );