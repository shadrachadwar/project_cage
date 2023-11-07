<?php
/**
*General  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_general_options_register')) {
	function mularx_general_options_register( $wp_customize ) {
		if ( mularx_set_to_premium() ) {
			$wp_customize->add_section(
		        'mularx_content_width_options',
		        array(
		            'title'    => esc_html__( 'Content Width', 'mularx' ),
		            'panel'    => 'mularx_theme_option_panel',
		            'priority' => 4,
		        )
		    );
				$wp_customize->add_setting(
			    	'mularx_container_width',
			    	array(
				        'default'			=> '1340',
						'capability'     	=> 'edit_theme_options',
						'sanitize_callback' => 'mularx_sanitize_number_absint',
					
					)
				);
				$wp_customize->add_control( 
				new mularx_Customizer_Range_Control( $wp_customize, 'mularx_container_width', 
					array(
						'label'      => __( 'Main Container Width [PX]', 'mularx'),
						'section'  => 'mularx_content_width_options',
						'settings' => 'mularx_container_width',
			             'input_attrs' => array(
							'min'    => 1100,
							'max'    => 1900,
							'step'   => 1,
						),
					) ) 
				);
				$wp_customize->add_setting(
			    	'mularx_sidebar_width',
			    	array(
				        'default'			=> '28',
						'capability'     	=> 'edit_theme_options',
						'sanitize_callback' => 'mularx_sanitize_number_absint',
					
					)
				);
				$wp_customize->add_control( 
				new mularx_Customizer_Range_Control( $wp_customize, 'mularx_sidebar_width', 
					array(
						'label'      => __( 'Sidebar Width [%]', 'mularx'),
						'section'  => 'mularx_content_width_options',
						'settings' => 'mularx_sidebar_width',
			             'input_attrs' => array(
							'min'    => 20,
							'max'    => 35,
							'step'   => 1,
						),
					) ) 
				);
		
			 /*button style*/
			$wp_customize->add_section(
		        'mularx_button_options',
		        array(
		            'title'    => esc_html__( 'Button Options', 'mularx' ),
		            'panel'    => 'mularx_theme_option_panel',
		            'priority' => 4,
		        )
		    );
		    $wp_customize->add_setting( 'mularx_button_font_family', array(
					'sanitize_callback' => 'mularx_sanitize_fonts',
					'default' => 'Heebo',
				)
			);

			$wp_customize->add_control( 'mularx_button_font_family', array(
					'type' => 'select',
					'label'      => __( 'Button Settings', 'mularx'),
					'description'		  => esc_html__( 'Font Family', 'mularx' ),
					'section' => 'mularx_button_options',
					'choices' => mularx_google_fonts()
				)
			);
			
				$mularx_button_text_transform = array(
					'initial'  => esc_html__('Initial - Default','mularx'),
					'uppercase'  => esc_html__('Uppercase','mularx'),
					'capitalize'  => esc_html__('Capitalize','mularx'),
					'lowercase'  => esc_html__('Lowercase','mularx'),
						
				);

				$wp_customize->add_setting( 
			        'mularx_button_texts_transform', 
			        array(
			            'default'           => 'initial',
			            'sanitize_callback' => 'mularx_sanitize_choices'
			        ) 
			    );
			    
			    $wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'mularx_button_texts_transform',
						array(
							'section'	  => 'mularx_button_options',
							'label'		  => esc_html__( 'Text Transform', 'mularx' ),
							'description' => '',
							'type'           => 'select',
							'choices'	  => $mularx_button_text_transform,
						)
					)
				);
				$wp_customize->add_setting(
			    	'mularx_button_text_size',
			    	array(
				        'default'			=> 14,
						'capability'     	=> 'edit_theme_options',
						'sanitize_callback' => 'mularx_sanitize_number_absint',
					
					)
				);
				$wp_customize->add_control( 
				new mularx_Customizer_Range_Control( $wp_customize, 'mularx_button_text_size', 
					array(
						'label' => '',
						'description'      => __( 'Font Size', 'mularx'),
						'section'  => 'mularx_button_options',
						'settings' => 'mularx_button_text_size',
			             'input_attrs' => array(
							'min'    => 10,
							'max'    => 20,
							'step'   => 1,
						),
					) ) 
				);
				$wp_customize->add_setting(
			    	'mularx_button_radius',
			    	array(
				        'default'			=> '3',
						'capability'     	=> 'edit_theme_options',
						'sanitize_callback' => 'mularx_sanitize_number_absint',
					
					)
				);
				$wp_customize->add_control( 
				new mularx_Customizer_Range_Control( $wp_customize, 'mularx_button_radius', 
					array(
						'label'      => '',
						'description'      => __( 'Border Radius [px]', 'mularx'),
						'section'  => 'mularx_button_options',
						'settings' => 'mularx_button_radius',
			             'input_attrs' => array(
							'min'    => 1,
							'max'    => 100,
							'step'   => 1,
						),
					) ) 
				);
			}
			/*scroll top*/
		$wp_customize->add_section(
	        'mularx_scroll_top_icon',
	        array(
	            'title'    => esc_html__( 'Scroll Top Options', 'mularx' ),
	            'panel'    => 'mularx_theme_option_panel',
	            'priority' => 4,
	        )
	    );
		$wp_customize->add_setting( 'enable_scroll_top_icon', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_scroll_top_icon', 
			array(
			  'label'   => __( 'Enable Scroll Top', 'mularx' ),
			  'section' => 'mularx_scroll_top_icon',
			  'settings' => 'enable_scroll_top_icon',
			  'type'    => 'checkbox',
			)
		);
		$top_icon_choices = array(
			'top-icon-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/top_icon_1.png' ),
			'top-icon-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/top_icon_2.png' ),
			'top-icon-3'=> esc_url( get_template_directory_uri() . '/images/dashboard/top_icon_3.png' ),
			'top-icon-4'=> esc_url( get_template_directory_uri() . '/images/dashboard/top_icon_4.png' ),
		);
		$wp_customize->add_setting( 
	        'mularx_footer_scroll_top_icon', 
	        array(
	            'default'           => 'top-icon-1',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );

	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Horizontal(
				$wp_customize,
				'mularx_footer_scroll_top_icon',
				array(
					'section'	  => 'mularx_scroll_top_icon',
					'label'		  => esc_html__( 'Choose Icon', 'mularx' ),
					'description' => '',
					'choices'	  => $top_icon_choices,
				)
			)
		);
		$wp_customize->add_setting(
		    	'mularx_scroll_top_icon_size',
		    	array(
			        'default'			=> 16,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_scroll_top_icon_size', 
				array(
					'label' => '',
					'description'      => __( 'Icon Size', 'mularx'),
					'section'  => 'mularx_scroll_top_icon',
					'settings' => 'mularx_scroll_top_icon_size',
		             'input_attrs' => array(
						'min'    => 5,
						'max'    => 50,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_setting(
		    	'mularx_scroll_top_icon_width',
		    	array(
			        'default'			=> 50,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_scroll_top_icon_width', 
				array(
					'label' => '',
					'description'      => __( 'Box Width', 'mularx'),
					'section'  => 'mularx_scroll_top_icon',
					'settings' => 'mularx_scroll_top_icon_width',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_setting(
		    	'mularx_scroll_top_icon_height',
		    	array(
			        'default'			=> 50,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_scroll_top_icon_height', 
				array(
					'label' => '',
					'description'      => __( 'Box Height', 'mularx'),
					'section'  => 'mularx_scroll_top_icon',
					'settings' => 'mularx_scroll_top_icon_height',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'mularx_scroll_top_icon_box_radius',
		    	array(
			        'default'			=> 50,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_scroll_top_icon_box_radius', 
				array(
					'label' => '',
					'description'      => __( 'Box Radius', 'mularx'),
					'section'  => 'mularx_scroll_top_icon',
					'settings' => 'mularx_scroll_top_icon_box_radius',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_setting( 'mularx_scroll_top_background', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_scroll_top_background', 
			array(
		        'label'   => esc_html__( 'Normal Style', 'mularx' ),
		        'description' => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_scroll_top_icon',
		        'settings'   => 'mularx_scroll_top_background',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_scroll_top_icon_color', 
			array(
		        'default'        => '#04174a',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_scroll_top_icon_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Icon Color', 'mularx' ),
		        'section' => 'mularx_scroll_top_icon',
		        'settings'   => 'mularx_scroll_top_icon_color',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_scroll_top_background_hover', 
			array(
		        'default'        => '#5034fc',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_scroll_top_background_hover', 
			array(
		        'label'   => esc_html__( 'Hover Style', 'mularx' ),
		        'description' => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_scroll_top_icon',
		        'settings'   => 'mularx_scroll_top_background_hover',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_scroll_top_icon_color_hover', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_scroll_top_icon_color_hover', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Icon Color', 'mularx' ),
		        'section' => 'mularx_scroll_top_icon',
		        'settings'   => 'mularx_scroll_top_icon_color_hover',
		    ) ) 
		);
		if ( mularx_set_to_premium() ) {
			/*breadcrumbs*/
			$wp_customize->add_section(
		        'mularx_sub_header_option',
		        array(
		            'title'    => esc_html__( 'Sub-Header Options', 'mularx' ),
		            'panel'    => 'mularx_theme_option_panel',
		            'priority' => 5,
		        )
		    );
		    $wp_customize->add_setting( 'enable_sub_header_section', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_sub_header_section', 
				array(
				  'label'   => __( 'Enable Subheader Section', 'mularx' ),
				  'section' => 'mularx_sub_header_option',
				  'settings' => 'enable_sub_header_section',
				  'type'    => 'checkbox',
				 
				)
			);
			$wp_customize->add_setting( 'enable_sub_header_title', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_sub_header_title', 
				array(
				  'label'   => __( 'Enable Title', 'mularx' ),
				  'section' => 'mularx_sub_header_option',
				  'settings' => 'enable_sub_header_title',
				  'type'    => 'checkbox',
				 
				)
			);
			$wp_customize->add_setting( 'enable_sub_header_breadcrumbs', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_sub_header_breadcrumbs', 
				array(
				  'label'   => __( 'Enable Breadcrumbs', 'mularx' ),
				  'section' => 'mularx_sub_header_option',
				  'settings' => 'enable_sub_header_breadcrumbs',
				  'type'    => 'checkbox',
				 
				)
			);
			if ( function_exists('yoast_breadcrumb') ){
				$wp_customize->add_setting( 'enable_yoast_breadcrumbs', 
			    	array(
				      'default'  =>  true,
				      'sanitize_callback' => 'mularx_sanitize_checkbox'
				  	)
			    );
				$wp_customize->add_control( 'enable_yoast_breadcrumbs', 
					array(
					  'label'   => __( 'Replace Default Breadcrumbs with Yoast SEO Breadcrumbs', 'mularx' ),
					  'section' => 'mularx_sub_header_option',
					  'settings' => 'enable_yoast_breadcrumbs',
					  'type'    => 'checkbox',
					 
					)
				);
			}
			$wp_customize->add_setting( 'enable_breadcrumbs_homepage', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_breadcrumbs_homepage', 
				array(
				  'label'   => __( 'Enable Breadcrumbs in Homepage', 'mularx' ),
				  'section' => 'mularx_sub_header_option',
				  'settings' => 'enable_breadcrumbs_homepage',
				  'type'    => 'checkbox',
				 
				)
			);

		$wp_customize->add_setting( 'breadcrumbs_background_color', 
			array(
		        'default'        => '#062470',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'breadcrumbs_background_color', 
			array(
				'label' => __('Style Settings','mularx'),
		        'description'   => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_sub_header_option',
		        'settings'   => 'breadcrumbs_background_color',
		    ) ) 
		);
		
		
		$wp_customize->add_setting( 'breadcrumbs_text_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'breadcrumbs_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_sub_header_option',
		        'settings'   => 'breadcrumbs_text_color',
		       
		    ) ) 
		);
		$wp_customize->add_setting( 'breadcrumbs_text_link_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'breadcrumbs_text_link_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Link Color', 'mularx' ),
		        'section' => 'mularx_sub_header_option',
		        'settings'   => 'breadcrumbs_text_link_color',
		        
		    ) ) 
		);
		$wp_customize->add_setting( 'breadcrumbs_text_link__hover_color', 
			array(
		        'default'        => '#5034fc',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'breadcrumbs_text_link__hover_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Link Hover Color', 'mularx' ),
		        'section' => 'mularx_sub_header_option',
		        'settings'   => 'breadcrumbs_text_link__hover_color',
		       
		    ) ) 
		);
		$wp_customize->add_setting(
	    	'breadcrumbs_padding_top',
	    	array(
		        'default'			=> '40',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'breadcrumbs_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_sub_header_option',
				'settings' => 'breadcrumbs_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
			) ) 
		);
		$wp_customize->add_setting(
	    	'breadcrumbs_padding_bottom',
	    	array(
		        'default'			=> '40',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'breadcrumbs_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_sub_header_option',
				'settings' => 'breadcrumbs_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
			) ) 
		);
		/*Post Meta Color*/
		$wp_customize->add_setting(
		    'mularx_post_meta_spacing',
		    	array(
			        'default'			=> 10,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_post_meta_spacing', 
				array(
					'label' => __('General Meta Settings','mularx'),
					'description'      => __( 'Meta Spacing', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_post_meta_spacing',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_section(
	        'mularx_post_meta_option',
	        array(
	            'title'    => esc_html__( 'Post Meta Style', 'mularx' ),
	            'panel'    => 'mularx_theme_option_panel',
	            'priority' => 5,
	        )
	    );
	    $wp_customize->add_setting(
		    	'mularx_post_meta_font_size',
		    	array(
			        'default'			=> 12,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_post_meta_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_post_meta_font_size',
		             'input_attrs' => array(
						'min'    => 8,
						'max'    => 30,
						'step'   => 1,
					),
				) ) 
			);
		$wp_customize->add_setting( 'mularx_post_meta_text_color', 
			array(
		        'default'        => '#7d7d7d',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_text_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_text_color',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_post_meta_text_hover_color', 
			array(
		        'default'        => '#5034fc',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_text_hover_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Hover Text Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_text_hover_color',
		    ) ) 
		);
		$mularx_meta_text_transform = array(
				'initial'  => esc_html__('Initial - Default','mularx'),
				'uppercase'  => esc_html__('Uppercase','mularx'),
				'capitalize'  => esc_html__('Capitalize','mularx'),
				'lowercase'  => esc_html__('Lowercase','mularx'),
					
			);

			$wp_customize->add_setting( 
		        'mularx_meta_text_transform_option', 
		        array(
		            'default'           => 'initial',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mularx_meta_text_transform_option',
					array(
						'section'	  => 'mularx_post_meta_option',
						'description'		  => esc_html__( 'Text Transform', 'mularx' ),
						'label' => '',
						'type'           => 'select',
						'choices'	  => $mularx_meta_text_transform,
					)
				)
			);
		/*seprate cat style*/
		
		$wp_customize->add_setting( 'mularx_post_meta_cat_background', 
			array(
		        'default'        => '#ededed',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_cat_background', 
			array(
		        'label'   => __('Seprate Category Style','mularx'),
		        'description' => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_cat_background',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_post_meta_cat_color', 
			array(
		        'default'        => '#232323',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_cat_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_cat_color',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_post_meta_cat_background_hover', 
			array(
		        'default'        => '#454545',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_cat_background_hover', 
			array(
		        'label'   =>'',
		        'description' => esc_html__( 'Background Hover Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_cat_background_hover',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_post_meta_cat_hover_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_cat_hover_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Text Hover Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_cat_hover_color',
		    ) ) 
		);
		$wp_customize->add_setting(
		    	'mularx_post_meta_cat_font_size',
		    	array(
			        'default'			=> 12,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_post_meta_cat_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_post_meta_cat_font_size',
		             'input_attrs' => array(
						'min'    => 8,
						'max'    => 30,
						'step'   => 1,
					),
				) ) 
			);
			$mularx_cat_text_transform = array(
				'initial'  => esc_html__('Initial - Default','mularx'),
				'uppercase'  => esc_html__('Uppercase','mularx'),
				'capitalize'  => esc_html__('Capitalize','mularx'),
				'lowercase'  => esc_html__('Lowercase','mularx'),
					
			);

			$wp_customize->add_setting( 
		        'mularx_cate_text_transform_option', 
		        array(
		            'default'           => 'initial',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mularx_cate_text_transform_option',
					array(
						'section'	  => 'mularx_post_meta_option',
						'description'		  => esc_html__( 'Text Transform', 'mularx' ),
						'label' => '',
						'type'           => 'select',
						'choices'	  => $mularx_cat_text_transform,
					)
				)
			);
			$wp_customize->add_setting(
		    	'mularx_cat_border_radius',
		    	array(
			        'default'			=> 1,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_cat_border_radius', 
				array(
					'label' => '',
					'description'      => __( 'Border Radius', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_cat_border_radius',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);

			/*estimated time style*/

		$wp_customize->add_setting( 'mularx_post_meta_ert_background', 
			array(
		        'default'        => '#232323',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_ert_background', 
			array(
		        'label'   => __('Estimtaed Reading Time','mularx'),
		        'description' => esc_html__( 'Background Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_ert_background',
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_post_meta_ert_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'mularx_post_meta_ert_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_post_meta_option',
		        'settings'   => 'mularx_post_meta_ert_color',
		    ) ) 
		);
		$wp_customize->add_setting(
		    	'mularx_post_meta_ert_font_size',
		    	array(
			        'default'			=> 12,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_post_meta_ert_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_post_meta_ert_font_size',
		             'input_attrs' => array(
						'min'    => 8,
						'max'    => 30,
						'step'   => 1,
					),
				) ) 
			);
			$mularx_ert_text_transform = array(
				'initial'  => esc_html__('Initial - Default','mularx'),
				'uppercase'  => esc_html__('Uppercase','mularx'),
				'capitalize'  => esc_html__('Capitalize','mularx'),
				'lowercase'  => esc_html__('Lowercase','mularx'),
					
			);

			$wp_customize->add_setting( 
		        'mularx_ert_text_transform_option', 
		        array(
		            'default'           => 'initial',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mularx_ert_text_transform_option',
					array(
						'section'	  => 'mularx_post_meta_option',
						'description'		  => esc_html__( 'Text Transform', 'mularx' ),
						'label' => '',
						'type'           => 'select',
						'choices'	  => $mularx_ert_text_transform,
					)
				)
			);
			$wp_customize->add_setting(
		    	'mularx_ert_border_radius',
		    	array(
			        'default'			=> 20,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'mularx_ert_border_radius', 
				array(
					'label' => '',
					'description'      => __( 'Border Radius', 'mularx'),
					'section'  => 'mularx_post_meta_option',
					'settings' => 'mularx_ert_border_radius',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
		}

	}
	function mularx_subheader_cover_layout_status(){
    	$current_subehader_layout = get_theme_mod('subheader_layout_option');
    	$cover_layout_status = false;
    	if($current_subehader_layout=='subheader-layout-2'){
    		$cover_layout_status = true;
    	}
    	return $cover_layout_status;
    }
	}
add_action( 'customize_register', 'mularx_general_options_register' );