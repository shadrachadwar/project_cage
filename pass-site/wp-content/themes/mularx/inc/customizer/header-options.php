<?php
/**
*Header  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_header_options_register')) {
	function mularx_header_options_register( $wp_customize ) {
		$wp_customize->get_section('header_image')->priority = 1;
	    $wp_customize->get_section( 'header_image')->title  = esc_html__('Header Background Image', 'mularx');
	    $wp_customize->get_section('header_image')->panel = 'mularx_header_panel';
		//header
		$wp_customize->add_panel( 'mularx_header_panel', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Header Options', 'mularx'),
			) 
		);
		$wp_customize->add_section('mularx_header_options', 
		 	array(
		        'title' => esc_html__('Header Layout Settings', 'mularx'),
		        'panel' =>'mularx_header_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_header_topbar_options', 
		 	array(
		        'title' => esc_html__('Header Topbar Settings', 'mularx'),
		        'panel' =>'mularx_header_panel',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_header_promotion_options', 
		 	array(
		        'title' => esc_html__('Header Promotion Bar', 'mularx'),
		        'panel' =>'mularx_header_panel',
		        'priority' => 3,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_header_style_options', 
		 	array(
		        'title' => esc_html__('Header Style Settings', 'mularx'),
		        'panel' =>'mularx_header_panel',
		        'priority' => 4,
		        'divider' => 'before',
	    	)
		 );
		/** header layout layout */
	    $wp_customize->add_setting( 
	        'mularx_header_layout', 
	        array(
	            'default'           => 'header-layout-1',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    if ( mularx_set_to_premium() ) {
		    $header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
				'header-layout-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-2.png' ),
				'header-layout-3'=> esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-3.png' ),
				'header-layout-4'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-4.png' ),
				'header-layout-5'=> esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-5.png' ),
				'header-layout-6'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-6.png' ),
			);
		}else{
			$header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
			);
		}
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Vertical(
				$wp_customize,
				'mularx_header_layout',
				array(
					'section'	  => 'mularx_header_options',
					'label'		  => esc_html__( 'Choose Header Layout', 'mularx' ),
					'description' => '',
					'choices'	  => $header_layout_choices,
					'priority' => 1,
				)
			)
		);
	    $wp_customize->add_setting( 
		        'main_header_alignment_position', 
		        array(
		            'default'           => 'menu-alignment-left',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'main_header_alignment_position',
					array(
						'section'	  => 'mularx_header_options',
						'description'		  => esc_html__( 'Menu Position', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'menu-alignment-left'  => esc_html__('Left','mularx'),
							'menu-alignment-center'  => esc_html__('Center','mularx'),
							'menu-alignment-right'  => esc_html__('Right','mularx'),
						),
						'active_callback' => 'mularx_header_alignment_option',
					)
				)
			);
		if(mularx_set_to_premium()){
			
		$wp_customize->add_setting(
	    	'header_mainheaer_container_width',
	    	array(
		        'default'			=> '1340',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_mainheaer_container_width', 
			array(
				'label' => '',
				'description'      => __( 'Headder Container Width', 'mularx'),
				'section'  => 'mularx_header_options',
				'settings' => 'header_mainheaer_container_width',
	             'input_attrs' => array(
					'min'    => 980,
					'max'    => 1920,
					'step'   => 1,
				),
			) ) 
		);
		
		$wp_customize->add_setting( 'overlay_header_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'overlay_header_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Header Text Color', 'mularx' ),
			        'section' => 'mularx_header_options',
			        'settings'   => 'overlay_header_text_color',
			        'active_callback' => 'mularx_header_overlay_color_status',
			    ) ) 
			);
		}
		$wp_customize->add_setting( 'header_overlay_layout_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_overlay_layout_status', 
			array(
			  'label'   => __( 'Enable Header Overlay on Banner', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_overlay_layout_status',
			  'type'    => 'checkbox',
			  'active_callback' =>'mularx_header_overlay_option',
			)
		);
		$wp_customize->add_setting( 'header_sticky_menu_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_sticky_menu_status', 
			array(
			  'label'   => __( 'Enable Sticky Header', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_sticky_menu_status',
			  'type'    => 'checkbox',
			)
		);
	    $wp_customize->add_setting( 'header_search_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_search_status', 
			array(
			  'label'   => __( 'Enable Search', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_search_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_cart_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_cart_status', 
			array(
			  'label'   => __( 'Enable Cart Icon', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_cart_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_account_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_account_status', 
			array(
			  'label'   => __( 'Enable Account Icon', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_account_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_social_icons_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_social_icons_status', 
			array(
			  'label'   => __( 'Enable Social Icons', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_social_icons_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_primary_button_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_primary_button_status', 
			array(
			  'label'   => __( 'Enable Primary Button', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_primary_button_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_primary_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'header_primary_button_label', 
	            array(
					'label'   => __( 'Primary Button', 'mularx' ),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_header_options',
					'settings'   => 'header_primary_button_label',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'header_primary_button_status', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'header_primary_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'header_primary_button_link', 
            array(
	            'label' => '',
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_header_options',
	            'settings'   => 'header_primary_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'header_primary_button_status', true );
				}
          )
        );
        $wp_customize->add_setting( 'header_primary_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_primary_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_primary_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_primary_button_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_secondary_button_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_secondary_button_status', 
			array(
			  'label'   => __( 'Enable Secondary Button', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_secondary_button_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_secondary_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'header_secondary_button_label', 
	            array(
					'label'   => __( 'Secondary Button', 'mularx' ),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_header_options',
					'settings'   => 'header_secondary_button_label',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'header_secondary_button_status', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'header_secondary_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'header_secondary_button_link', 
            array(
	            'label' => '',
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_header_options',
	            'settings'   => 'header_secondary_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'header_secondary_button_status', true );
				}
          )
        );
        $wp_customize->add_setting( 'header_secondary_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_secondary_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_header_options',
			  'settings' => 'header_secondary_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_secondary_button_status', true );
				}
			)
		);
		
		$wp_customize->add_setting(
	    	'header_mainheaer_padding_top',
	    	array(
		        'default'			=> '35',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_mainheaer_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_header_options',
				'settings' => 'header_mainheaer_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
			) ) 
		);
		$wp_customize->add_setting(
	    	'header_mainheaer_padding_bottom',
	    	array(
		        'default'			=> '20',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_mainheaer_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_header_options',
				'settings' => 'header_mainheaer_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
			) ) 
		);
/*topbar settings*/
	$wp_customize->add_setting( 'header_topbar_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_status', 
			array(
			  'label'   => __( 'Enable Topbar', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_topbar_social_media_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_social_media_status', 
			array(
			  'label'   => __( 'Enable Social Icons', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_social_media_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_topbar_slogan_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_slogan_status', 
			array(
			  'label'   => __( 'Enable Slogan Text', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_slogan_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_slogan_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'header_slogan_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_header_topbar_options',
				'label' => '',
				'description' => esc_html__( 'Slogan Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'header_topbar_slogan_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_topbar_email_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_email_status', 
			array(
			  'label'   => __( 'Enable Topbar Email', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_email_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'topbar_email', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'topbar_email', 
			array(
				'type' => 'text',
				'section' => 'mularx_header_topbar_options',
				'label' => '',
				'description' => esc_html__( 'Email','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'header_topbar_email_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_topbar_phone_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_phone_status', 
			array(
			  'label'   => __( 'Enable Topbar Phone', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_phone_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'topbar_phone', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'topbar_phone', 
			array(
				'type' => 'text',
				'section' => 'mularx_header_topbar_options',
				'label' => '',
				'description' => esc_html__( 'Phone','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'header_topbar_phone_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_topbar_location_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_topbar_location_status', 
			array(
			  'label'   => __( 'Enable Topbar Location', 'mularx' ),
			  'section' => 'mularx_header_topbar_options',
			  'settings' => 'header_topbar_location_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'topbar_location', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'topbar_location', 
			array(
				'type' => 'text',
				'section' => 'mularx_header_topbar_options',
				'label' => '',
				'description' => esc_html__( 'Location','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'header_topbar_location_status', true );
				}
			)
		);
		$wp_customize->add_setting(
	    	'header_topbar_font_size',
	    	array(
		        'default'			=> '14',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_topbar_font_size', 
			array(
				'label' => '',
				'description'      => __( 'Font Size', 'mularx'),
				'section'  => 'mularx_header_topbar_options',
				'settings' => 'header_topbar_font_size',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			) ) 
		);
		$wp_customize->add_setting(
	    	'header_topbar_padding_top',
	    	array(
		        'default'			=> '5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_topbar_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_header_topbar_options',
				'settings' => 'header_topbar_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			) ) 
		);
		$wp_customize->add_setting(
	    	'header_topbar_padding_bottom',
	    	array(
		        'default'			=> '5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_topbar_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_header_topbar_options',
				'settings' => 'header_topbar_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'header_topbar_status', true );
				}
			) ) 
		);
		/*header promotion bar settings*/
	$wp_customize->add_setting( 'header_promotion_bar_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_promotion_bar_status', 
			array(
			  'label'   => __( 'Enable Promotion Bar', 'mularx' ),
			  'section' => 'mularx_header_promotion_options',
			  'settings' => 'header_promotion_bar_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'header_promotion_bar_all_page_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_promotion_bar_all_page_status', 
			array(
			  'label'   => __( 'Enable Promotion Bar on all page', 'mularx' ),
			  'section' => 'mularx_header_promotion_options',
			  'settings' => 'header_promotion_bar_all_page_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'header_promotion_bar_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'header_promotion_bar_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'header_promotion_bar_text', 
			array(
				'type' => 'textarea',
				'section' => 'mularx_header_promotion_options',
				'label' => '',
				'description' => esc_html__( 'Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'header_promotion_bar_status', true );
				}
			)
		);
		$wp_customize->add_setting(
	    	'header_promotion_padding_top',
	    	array(
		        'default'			=> '5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_promotion_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_header_promotion_options',
				'settings' => 'header_promotion_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'header_promotion_bar_status', true );
				}
			) ) 
		);
		$wp_customize->add_setting(
	    	'header_promotion_padding_bottom',
	    	array(
		        'default'			=> '5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'header_promotion_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_header_promotion_options',
				'settings' => 'header_promotion_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'header_promotion_bar_status', true );
				}
			) ) 
		);
		if ( mularx_set_to_premium() ) {
			/*style settings*/
			$wp_customize->add_setting( 'shpor_header_background_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_header_background_color', 
				array(
					'label' => esc_html__( 'Header Color Settings', 'mularx' ),
			        'description'   => esc_html__( 'Background Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_header_background_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_header_text_color', 
				array(
			        'default'        => '#232323',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_header_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_header_text_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_header_link_text_color', 
				array(
			        'default'        => '#232323',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_header_link_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_header_link_text_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_header_link_text_hover_color', 
				array(
			        'default'        => '#797979',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_header_link_text_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Text Hover Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_header_link_text_hover_color',
			        'priority' => 1
			    ) ) 
			);

			/*menu color*/
			$mularx_primary_menu_choices = array(
					'mularx-link-style-normal'  => esc_html__('Normal','mularx'),
					'mularx-link-style-underline'  => esc_html__('Underline','mularx'),
					'mularx-link-style-boxed'  => esc_html__('Boxed Background','mularx'),
						
				);

				$wp_customize->add_setting( 
			        'mularx_navigation_link_hover_style', 
			        array(
			            'default'           => 'mularx-link-style-normal',
			            'sanitize_callback' => 'mularx_sanitize_choices'
			        ) 
			    );
			    
			    $wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'mularx_navigation_link_hover_style',
						array(
							'section'	  => 'mularx_header_style_options',
							'label' => esc_html__( 'Primary Menu Settings', 'mularx' ),
							'description' => esc_html__( 'Link Menu Hover Style', 'mularx' ),
							'type'           => 'select',
							'choices'	  => $mularx_primary_menu_choices,
							'priority' => 1
						)
					)
				);
			$wp_customize->add_setting(
		    	'mularx_navigation_font_size',
		    	array(
			        'default'			=> '16',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_navigation_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'mularx'),
					'section'  => 'mularx_header_style_options',
					'settings' => 'mularx_navigation_font_size',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 30,
						'step'   => 1,
					),
		            'priority' => 1
				) ) 
			);
			$wp_customize->add_setting(
		    	'mularx_navigation_menu_item_spacing',
		    	array(
			        'default'			=> '20',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_navigation_menu_item_spacing', 
				array(
					'label' => '',
					'description'      => __( 'Menu Item padding', 'mularx'),
					'section'  => 'mularx_header_style_options',
					'settings' => 'mularx_navigation_menu_item_spacing',
		             'input_attrs' => array(
						'min'    => 1,
						'max'    => 50,
						'step'   => 1,
					),
		            'priority' => 1
				) ) 
			);
			$wp_customize->add_setting(
		    	'mularx_navigation_menu_item_margin',
		    	array(
			        'default'			=> '1',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_navigation_menu_item_margin', 
				array(
					'label' => '',
					'description'      => __( 'Menu Item Spacing', 'mularx'),
					'section'  => 'mularx_header_style_options',
					'settings' => 'mularx_navigation_menu_item_margin',
		             'input_attrs' => array(
						'min'    => 1,
						'max'    => 50,
						'step'   => 1,
					),
		            'priority' => 1
				) ) 
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
			$font_transform_choices = array(
				'initial'=>'Initial',
				'uppercase'=>'Uppercase',
				'lowercase'=>'Lowercase',
				'capitalize'=>'Capitalize',
				'normal'=>'Normal'
			);
			$wp_customize->add_setting( 'mularx_main_navigation_weight', array(
					'sanitize_callback' => 'mularx_sanitize_text',
					'default' => 'normal',
				)
			);

			$wp_customize->add_control( 'mularx_main_navigation_weight', array(
					'type' => 'select',
					'label'		  => '',
					'description' => esc_html__('Font Weight','mularx'),
					'section' => 'mularx_header_style_options',
					'choices' => $font_weight_choices,
					'priority' => 1
				)
			);
			$wp_customize->add_setting( 'mularx_navigation_font_text_transform', array(
					'sanitize_callback' => 'mularx_sanitize_text',
					'default' => 'normal',
				)
			);

			$wp_customize->add_control( 'mularx_navigation_font_text_transform', array(
					'type' => 'select',
					'label'		  => '',
					'description' => esc_html__('Text Transform','mularx'),
					'section' => 'mularx_header_style_options',
					'choices' => $font_transform_choices,
					'priority' => 1
				)
			);
			$wp_customize->add_setting( 'shpor_main_menu_background_color', 
				array(
			        'default'        => '#2e1a4e',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_main_menu_background_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Primary Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_main_menu_background_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_main_menu_secondary_color', 
				array(
			        'default'        => '#b7e735',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_main_menu_secondary_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Secondary Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_main_menu_secondary_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_main_menu_text_color', 
				array(
			        'default'        => '#7e7e7e',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_main_menu_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_main_menu_text_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_main_menu_text_hover_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_main_menu_text_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Hover Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_main_menu_text_hover_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'enable_main_menu_top_border', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_main_menu_top_border', 
				array(
				  'label'   => __( 'Enable Menu Container Top Border', 'mularx' ),
				  'section' => 'mularx_header_style_options',
				  'settings' => 'enable_main_menu_top_border',
				  'type'    => 'checkbox',
				  'priority' => 1
				)
				 
			);
			$wp_customize->add_setting( 'enable_main_menu_bottom_border', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_main_menu_bottom_border', 
				array(
				  'label'   => __( 'Enable Menu Container Bottom Border', 'mularx' ),
				  'section' => 'mularx_header_style_options',
				  'settings' => 'enable_main_menu_bottom_border',
				  'type'    => 'checkbox',
				  'priority' => 1
				)
			);
			$wp_customize->add_setting( 'shpor_main_menu_container_bodrer_color', 
				array(
			        'default'        => '#ededed',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_main_menu_container_bodrer_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Border Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_main_menu_container_bodrer_color',
			        'priority' => 1
			    ) ) 
			);
			/*topbar style*/
			$wp_customize->add_setting( 'shpor_topbar_bg_color', 
				array(
			        'default'        => '',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_topbar_bg_color', 
				array(
					'label' => __('Topbar Setting','mularx'),
			        'description'   => esc_html__( 'Background Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_topbar_bg_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_topbar_text_color', 
				array(
			        'default'        => '',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_topbar_text_color', 
				array(
					'label' =>'',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_topbar_text_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_topbar_text_link_color', 
				array(
			        'default'        => '',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_topbar_text_link_color', 
				array(
					'label' =>'',
			        'description'   => esc_html__( 'Link Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_topbar_text_link_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_topbar_text_link_hover_color', 
				array(
			        'default'        => '#ededed',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_topbar_text_link_hover_color', 
				array(
					'label' =>'',
			        'description'   => esc_html__( 'Link Hover Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_topbar_text_link_hover_color',
			        'priority' => 1
			    ) ) 
			);

			$wp_customize->add_setting( 'shpor_promotion_bg_color', 
				array(
			        'default'        => '#edfaf1',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_promotion_bg_color', 
				array(
					'label' => __('Promotion Bar Setting','mularx'),
			        'description'   => esc_html__( 'Background Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_promotion_bg_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_promotion_text_color', 
				array(
			        'default'        => '#232323',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_promotion_text_color', 
				array(
					'label' =>'',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_header_style_options',
			        'settings'   => 'shpor_promotion_text_color',
			        'priority' => 1
			    ) ) 
			);
		}

	}
	function mularx_header_alignment_option(){
        $header_layout_current= get_theme_mod( 'mularx_header_layout' );
		$menu_alignment_status = false;
		if($header_layout_current == 'header-layout-1'){
			$menu_alignment_status = true;
		}
		return $menu_alignment_status;
    }

    function mularx_header_overlay_option(){
        $header_layout_current= get_theme_mod( 'mularx_header_layout' );
		$header_overlay_status = false;
		if($header_layout_current == 'header-layout-1' || $header_layout_current == 'header-layout-2'){
			$header_overlay_status = true;
		}
		return $header_overlay_status;
    }

    function mularx_header_overlay_color_status(){
    	$overlay_header_status = get_theme_mod('header_overlay_layout_status');
        $header_layout_current= get_theme_mod( 'mularx_header_layout' );
		$header_overlay_color_status = false;
		if($overlay_header_status==true && $header_layout_current == 'header-layout-1' || $overlay_header_status==true && $header_layout_current == 'header-layout-2'){
			$header_overlay_color_status = true;
		}
		return $header_overlay_color_status;
    }
	
}
add_action( 'customize_register', 'mularx_header_options_register' );