<?php
/**
*Footer  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_footer_options_register')) {
	function mularx_footer_options_register( $wp_customize ) {
		//footer
		$wp_customize->add_panel( 'mularx_footer_panel', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Footer Options', 'mularx'),
			) 
		);
		$wp_customize->add_section('mularx_footer_options', 
		 	array(
		        'title' => esc_html__('Footer Layout Settings', 'mularx'),
		        'panel' =>'mularx_footer_panel',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		if ( mularx_set_to_premium() ) {
			$wp_customize->add_section('mularx_footer_style_options', 
			 	array(
			        'title' => esc_html__('Footer Style Settings', 'mularx'),
			        'panel' =>'mularx_footer_panel',
			        'priority' => 2,
			        'divider' => 'before',
		    	)
			 );
			$wp_customize->add_section('mularx_footer_business_info_section', 
			 	array(
			        'title' => esc_html__('Footer Business Info Settings', 'mularx'),
			        'panel' =>'mularx_footer_panel',
			        'priority' => 3,
			        'divider' => 'before',
		    	)
			 );
			/** footer layout layout */
		    $wp_customize->add_setting( 
		        'mularx_footer_layout', 
		        array(
		            'default'           => 'footer-layout-1',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    $footer_layout_choices = array(
				'footer-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/footer-layout-1.png' ),
				'footer-layout-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/footer-layout-2.png' ),
				'footer-layout-3'=> esc_url( get_template_directory_uri() . '/images/dashboard/footer-layout-3.png' ),
			);
		    
		    $wp_customize->add_control(
				new mularx_Radio_Image_Control_Vertical(
					$wp_customize,
					'mularx_footer_layout',
					array(
						'section'	  => 'mularx_footer_options',
						'label'		  => esc_html__( 'Choose Footer Layout', 'mularx' ),
						'description' => '',
						'choices'	  => $footer_layout_choices,
						'priority' => 1,
					)
				)
			);
			$wp_customize->add_setting( 'footer_copiright_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'footer_copiright_text', 
				array(
					'type' => 'text',
					'section' => 'mularx_footer_options',
					'label' => '',
					'description' => esc_html__( 'Copyright Text','mularx' ),
				)
			);
			$wp_customize->add_setting( 
		        'copyright_text_alignment', 
		        array(
		            'default'           => 'copyright-text-align-left',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'copyright_text_alignment',
					array(
						'section'	  => 'mularx_footer_options',
						'description'		  => esc_html__( 'Copyright Text Alignment', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'copyright-text-align-left'  => esc_html__('Left','mularx'),
							'copyright-text-align-center'  => esc_html__('Center','mularx'),
							'copyright-text-align-right'  => esc_html__('Right','mularx'),
						),
						
					)
				)
			);
			$wp_customize->add_setting( 'footer_social_icons', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'footer_social_icons', 
				array(
				  'label'   => __( 'Enable Social Icons', 'mularx' ),
				  'section' => 'mularx_footer_options',
				  'settings' => 'footer_social_icons',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 
		        'copyright_social_icon_alignment', 
		        array(
		            'default'           => 'copyright-social-align-center',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'copyright_social_icon_alignment',
					array(
						'section'	  => 'mularx_footer_options',
						'description'		  => esc_html__( 'Social Icon Alignment', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'copyright-social-align-left'  => esc_html__('Left','mularx'),
							'copyright-social-align-center'  => esc_html__('Center','mularx'),
							'copyright-social-align-right'  => esc_html__('Right','mularx'),
						),
						
					)
				)
			);
			$wp_customize->add_setting( 'footer_copyright_extra_text_status', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'footer_copyright_extra_text_status', 
				array(
				  'label'   => __( 'Enable Extra Text for Copyright Section', 'mularx' ),
				  'section' => 'mularx_footer_options',
				  'settings' => 'footer_copyright_extra_text_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'footer_copyright_extra_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' =>'',
					'sanitize_callback' => 'mularx_sanitize_text',

				) 
			);
			$wp_customize->add_control( 'footer_copyright_extra_text', 
				array(
					'type' => 'text',
					'section' => 'mularx_footer_options',
					'label' => '',
					'description' => esc_html__( 'Extra Text, Like link or slogan','mularx' ),
					'active_callback' => function(){
						return get_theme_mod( 'footer_copyright_extra_text_status', true );
					}
				)
			);
			$wp_customize->add_setting( 
		        'copyright_extra_text_alignment', 
		        array(
		            'default'           => 'copyright-extra-text-align-right',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'copyright_extra_text_alignment',
					array(
						'section'	  => 'mularx_footer_options',
						'description'		  => esc_html__( 'Extra Text Alignment', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'copyright-extra-text-align-left'  => esc_html__('Left','mularx'),
							'copyright-extra-text-align-center'  => esc_html__('Center','mularx'),
							'copyright-extra-text-align-right'  => esc_html__('Right','mularx'),
						),
						
					)
				)
			);
			$wp_customize->add_setting( 'footer_brands_logo_status', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'footer_brands_logo_status', 
				array(
				  'label'   => __( 'Enable image Section', 'mularx' ),
				  'section' => 'mularx_footer_options',
				  'settings' => 'footer_brands_logo_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting('footer_brands_logo', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'mularx_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_brands_logo', array(
		    	'label' => '',
		        'description'       => esc_html__('Footer Brands Logo', 'mularx'),
		        'section'           => 'mularx_footer_options',
		        'settings'          => 'footer_brands_logo',
		        'active_callback' => function(){
		            return get_theme_mod( 'footer_brands_logo_status', true );
		        },
		    )));
		    $wp_customize->add_setting( 
		        'copyright_logoimage_text_alignment', 
		        array(
		            'default'           => 'copyright-image-align-center',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'copyright_logoimage_text_alignment',
					array(
						'section'	  => 'mularx_footer_options',
						'description'		  => esc_html__( 'Image Alignment', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'copyright-image-align-left'  => esc_html__('Left','mularx'),
							'copyright-image-align-center'  => esc_html__('Center','mularx'),
							'copyright-image-align-right'  => esc_html__('Right','mularx'),
						),
						
					)
				)
			);
			/*style settings*/
			$wp_customize->add_setting( 'shpor_footer_background_color', 
				array(
			        'default'        => '#062470',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_footer_background_color', 
				array(
					'label' => __('Footer Settings','mularx'),
			        'description'   => esc_html__( 'Background Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_footer_background_color',
			        'priority' => 1
			    ) ) 
			);
			$wp_customize->add_setting('footer_background_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'mularx_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image', array(
		    	'label' => '',
		        'description'       => esc_html__('Background Image', 'mularx'),
		        'section'           => 'mularx_footer_style_options',
		        'settings'          => 'footer_background_image',
		    )));
		    $wp_customize->add_setting(
		    	'footer_bg_opacity',
		    	array(
			        'default'			=> '0',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_bg_opacity', 
				array(
					'label'      => __( 'Background Opacity', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_bg_opacity',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 1.00,
						'step'   => 0.01,
					),
				) ) 
			);
			$wp_customize->add_setting( 'shpor_footer_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_footer_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_footer_text_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_footer_link_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_footer_link_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_footer_link_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_footer_link_hover_color', 
				array(
			        'default'        => '#5034fc',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_footer_link_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Hover Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_footer_link_hover_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_footer_boxbg_color', 
				array(
			        'default'        => '',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_footer_boxbg_color', 
				array(
					'label' => esc_html__( 'Footer Column Box Settings', 'mularx' ),
			        'description'   => esc_html__( 'Box Background Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_footer_boxbg_color',
			    ) ) 
			);
			$wp_customize->add_setting(
		    	'footer_box_bg_opacity',
		    	array(
			        'default'			=> '0.5',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_box_bg_opacity', 
				array(
					'label'      => __( 'Box Background Opacity', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_box_bg_opacity',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 1.00,
						'step'   => 0.01,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'footer_box_spacing',
		    	array(
			        'default'			=> '20',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_box_spacing', 
				array(
					'label' => '',
					'description'      => __( 'Box Padding', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_box_spacing',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 100,
						'step'   => 1,
					),
				) ) 
			);
			$colum_border_style_choices = array(
				'footer-colum-border-all'  => esc_html__('border','mularx'),
				'footer-colum-border-right'  => esc_html__('Border Right','mularx'),
					
			);

			$wp_customize->add_setting( 
		        'footer_column_box_border', 
		        array(
		            'default'           => 'footer-colum-border-right',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'footer_column_box_border',
					array(
						'section'	  => 'mularx_footer_style_options',
						'description' => esc_html__( 'Select Border Style', 'mularx' ),
						'label' => '',
						'type'           => 'select',
						'choices'	  => $colum_border_style_choices,
					)
				)
			);
			$wp_customize->add_setting(
		    	'footer_box_border_size',
		    	array(
			        'default'			=> '0',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_box_border_size', 
				array(
					'label' => '',
					'description'      => __( 'Column Box Border Size', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_box_border_size',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 20,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting( 'footer_box_border_color', 
				array(
			        'default'        => '#382456',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'footer_box_border_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Column Box Border color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'footer_box_border_color',
			    ) ) 
			);
			$wp_customize->add_setting(
		    	'footer_padding_top',
		    	array(
			        'default'			=> '50',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_padding_top', 
				array(
					'label' => '',
					'description'      => __( 'Top Spacing', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_padding_top',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 250,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'footer_padding_bottom',
		    	array(
			        'default'			=> '50',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_padding_bottom', 
				array(
					'label' => '',
					'description'      => __( 'Bottom Spacing', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_padding_bottom',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 250,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting( 'shpor_copyright_bg_color', 
				array(
			        'default'        => '#062470',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_copyright_bg_color', 
				array(
					'label' => __('Copyright Settings','mularx'),
			        'description'   => esc_html__( 'Background Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_copyright_bg_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_copyright_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_copyright_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_copyright_text_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_copyright_link_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_copyright_link_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_copyright_link_color',
			    ) ) 
			);
			$wp_customize->add_setting( 'shpor_copyright_link_hover_color', 
				array(
			        'default'        => '#5034fc',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'shpor_copyright_link_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Hover Color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'shpor_copyright_link_hover_color',
			    ) ) 
			);
			$wp_customize->add_setting(
		    	'footer_copyright_border_size',
		    	array(
			        'default'			=> '0',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'footer_copyright_border_size', 
				array(
					'label' => '',
					'description'      => __( 'Copyright Section Border Top Size', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'footer_copyright_border_size',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 20,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting( 'footer_copyright_border_color', 
				array(
			        'default'        => '#382456',
			        'sanitize_callback' => 'mularx_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'footer_copyright_border_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Copyright Section Border Top color', 'mularx' ),
			        'section' => 'mularx_footer_style_options',
			        'settings'   => 'footer_copyright_border_color',
			    ) ) 
			);
			$wp_customize->add_setting(
		    	'copyright_padding_top',
		    	array(
			        'default'			=> '30',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'copyright_padding_top', 
				array(
					'label' => '',
					'description'      => __( 'Top Spacing', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'copyright_padding_top',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 250,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'copyright_padding_bottom',
		    	array(
			        'default'			=> '30',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_text',
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'copyright_padding_bottom', 
				array(
					'label' => '',
					'description'      => __( 'Bottom Spacing', 'mularx'),
					'section'  => 'mularx_footer_style_options',
					'settings' => 'copyright_padding_bottom',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 250,
						'step'   => 1,
					),
				) ) 
			);

		}
	}
}
add_action( 'customize_register', 'mularx_footer_options_register' );