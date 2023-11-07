<?php
/**
*Front page  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_frontpage_options_register')) {
	function mularx_frontpage_options_register( $wp_customize ) {
		$wp_customize->add_panel( 'mularx_front_page_panel', 
          array(
            'priority'       => 25,
            'capability'     => 'edit_theme_options',
            'title'      => esc_html__('Frontpage Options', 'mularx'),
        ) 
      );
	/*banner options*/
	$wp_customize->add_section('mularx_banner_section', 
		 	array(
		        'title' => esc_html__('Banner', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );

	$wp_customize->add_setting( 'enable_banner_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_banner_section', 
			array(
			  'label'   => __( 'Enable Banner Section', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'enable_banner_section',
			  'type'    => 'checkbox',
			)
		);
		if(mularx_set_to_premium()){
			$banner_layout_choices = array(
				'banner-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-1.png' ),
				'banner-layout-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-2.png' ),
				'banner-layout-3'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-3.png' ),
				'banner-layout-4'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-4.png' ),
				'banner-layout-5'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-5.png' ),
				'banner-layout-6'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-6.png' ),
			);
		}else{
			$banner_layout_choices = array(
				'banner-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-1.png' ),
				'banner-layout-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-2.png' ),
				'banner-layout-3'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-layout-3.png' ),
			);
		}
	    $wp_customize->add_setting( 
	        'mularx_banner_layout', 
	        array(
	            'default'           => 'banner-layout-3',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Horizontal(
				$wp_customize,
				'mularx_banner_layout',
				array(
					'section'	  => 'mularx_banner_section',
					'label'		  => esc_html__( 'Choose Banner Layout', 'mularx' ),
					'description' => '',
					'choices'	  => $banner_layout_choices,
					'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
				)
			)
		);
	    if(mularx_set_to_premium()){
		    $banner_slider_sources_choice = array(
				'banner-source-type-post'  => esc_html__('Post','mularx'),
				'banner-source-type-custom-posttype'  => esc_html__('Custom Post Type - Slider','mularx'),
			);
		}else{
			 $banner_slider_sources_choice = array(
				'banner-source-type-post'  => esc_html__('Post','mularx'),
			);
		}

		$wp_customize->add_setting( 
	        'banner_slider_source_type', 
	        array(
	            'default'           => 'banner-source-type-post',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'banner_slider_source_type',
				array(
					'section'	  => 'mularx_banner_section',
					'description'		  => esc_html__( 'Source Type', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => $banner_slider_sources_choice,
					'active_callback' => 'mularx_current_slider_layout',
				)
			)
		);

		$wp_customize->add_setting('slider_post_category',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'mularx_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new mularx_Dropdown_Taxonomies_Control($wp_customize, 
				'slider_post_category',
				    array(
				        'description'       => esc_html__('Select Slider Category', 'mularx'),
				     	'section'     => 'mularx_banner_section',
				        'type'        => 'dropdown-taxonomies',
				        'taxonomy'    => 'category',
				        'settings'	  => 'slider_post_category',
				        'active_callback' => 'mularx_slider_post_category',
			    	)
				)
			);

		$wp_customize->add_setting('banner_hero_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'mularx_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_hero_image', array(
	    	'label' => '',
	        'description'       => esc_html__('Upload Hero Image', 'mularx'),
	        'section'           => 'mularx_banner_section',
	        'settings'          => 'banner_hero_image',
	        'active_callback' => 'mularx_current_banner_layout',
	    )));
	    $wp_customize->add_setting(
	    	'banner_section_height',
	    	array(
		        'default'			=> '950',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		if ( mularx_set_to_premium() ) {
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_section_height', 
				array(
					'label'      => __( 'Banner section Height', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_section_height',
		             'input_attrs' => array(
						'min'    => 100,
						'max'    => 1200,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				) ) 
			);
		    $wp_customize->add_setting(
		    	'banner_section_top_spacing',
		    	array(
			        'default'			=> '0',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_section_top_spacing', 
				array(
					'label'      => __( 'Banner section top spacing', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_section_top_spacing',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 150,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				) ) 
			);
			$wp_customize->add_setting(
		    	'banner_section_padding_top',
		    	array(
			        'default'			=> '40',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_section_padding_top', 
				array(
					'label'      => __( 'Banner Content Top Spacing', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_section_padding_top',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 600,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				) ) 
			);
			$wp_customize->add_setting(
		    	'banner_section_container_spacing',
		    	array(
			        'default'			=> '0',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_section_container_spacing', 
				array(
					'label'      => __( 'Banner Container Spacing(Left/Right)', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_section_container_spacing',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 250,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				) ) 
			);
			$wp_customize->add_setting(
		    	'banner_content_box_width',
		    	array(
			        'default'			=> '70',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_content_box_width', 
				array(
					'label'      => __( 'Content Box Width(%)', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_content_box_width',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 100,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				) ) 
			);
		}
	    $wp_customize->add_setting( 
	        'banner_section_text_align', 
	        array(
	            'default'           => 'banner-section-text-align-left',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'banner_section_text_align',
				array(
					'section'	  => 'mularx_banner_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'banner-section-text-align-left'  => esc_html__('Left','mularx'),
						'banner-section-text-align-center'  => esc_html__('Center','mularx'),
						'banner-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				)
			)
		);
		$wp_customize->add_setting( 
	        'banner_section_vertical_align', 
	        array(
	            'default'           => 'banner-section-align-middle',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'banner_section_vertical_align',
				array(
					'section'	  => 'mularx_banner_section',
					'description'		  => esc_html__( 'Vertical Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'banner-section-align-top'  => esc_html__('Top','mularx'),
						'banner-section-align-middle'  => esc_html__('Middle','mularx'),
						'banner-section-align-bottom'  => esc_html__('Bottom','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_banner_section', true );
			        },
				)
			)
		);
		
	    $wp_customize->add_setting( 'banner_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'banner_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_banner_section',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => 'mularx_current_banner_layout',
			)
		);
		$wp_customize->add_setting( 'banner_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'banner_text', 
			array(
				'type' => 'textarea',
				'section' => 'mularx_banner_section',
				'label' => '',
				'description' => esc_html__( 'Text','mularx' ),
				'active_callback' => 'mularx_current_banner_layout',
			)
		);
		$wp_customize->add_setting( 'banner_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'banner_button_label', 
	            array(
					'label'   => __( 'CTA Button', 'mularx' ),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_banner_section',
					'settings'   => 'banner_button_label',
					'type'     => 'text',
					'active_callback' => 'mularx_current_banner_layout',
	          )
	        );
	    $wp_customize->add_setting( 'banner_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'banner_button_link', 
            array(
	            'label' => '',
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_banner_section',
	            'settings'   => 'banner_button_link',
	            'type'     => 'text',
	            'active_callback' => 'mularx_current_banner_layout',
          )
        );
        $wp_customize->add_setting( 'banner_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'banner_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'banner_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_current_banner_layout',
			)
		);
	
	$wp_customize->add_setting( 'enable_slide_excerpt', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_slide_excerpt', 
			array(
			  'label'   => __( 'Enable Excerpt', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'enable_slide_excerpt',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_current_slider_layout',
			)
		);
	$wp_customize->add_setting(
    	'banner_slider_post_per_page',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'banner_slider_post_per_page', 
		array(
			'label'      => __( 'Post Per Page', 'mularx'),
			'section'  => 'mularx_banner_section',
			'settings' => 'banner_slider_post_per_page',
             'input_attrs' => array(
				'min'    => 1,
				'max'    => 20,
				'step'   => 1,
			),
            'active_callback' => 'mularx_current_slider_layout',
		) ) 
	);

	$wp_customize->add_setting( 'enable_banner_slide_navigation', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_banner_slide_navigation', 
			array(
			  'label'   => __( 'Enable Navigation Arrow', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'enable_banner_slide_navigation',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_current_slider_layout',
			)
		);
	$wp_customize->add_setting( 'enable_banner_slide_pagination', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_banner_slide_pagination', 
			array(
			  'label'   => __( 'Enable Dot Pagination Controller', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'enable_banner_slide_pagination',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_current_slider_layout',
			)
		);
		if ( mularx_set_to_premium() ) {
		/*banner style*/
		$wp_customize->add_setting( 'banenr_background_color', 
			array(
		        'default'        => '#04174a',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'banenr_background_color', 
			array(
				'label' => __('Banner Style Settings','mularx'),
		        'description'   => esc_html__( 'Background Overlay Color', 'mularx' ),
		        'section' => 'mularx_banner_section',
		        'settings'   => 'banenr_background_color',
		        'active_callback' => function(){
				    return get_theme_mod( 'enable_banner_section', true );
				},
		    ) ) 
		);
		$wp_customize->add_setting(
	    	'banner_background_opacity',
	    	array(
		        'default'			=> '1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'banner_background_opacity', 
			array(
				'label'      => __( 'Overlay Opacity', 'mularx'),
				'section'  => 'mularx_banner_section',
				'settings' => 'banner_background_opacity',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 1.00,
					'step'   => 0.01,
				),
	             'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
			) ) 
		);
		$wp_customize->add_setting( 'enable_banner_ovelay_blend', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_banner_ovelay_blend', 
			array(
			  'label'   => __( 'Enable Overlay Blend Mode', 'mularx' ),
			  'section' => 'mularx_banner_section',
			  'settings' => 'enable_banner_ovelay_blend',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
			)
		);
		$wp_customize->add_setting( 'banenr_text_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'mularx_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'banenr_text_color', 
			array(
				'label' => __('Banner Style','mularx'),
		        'description'   => esc_html__( 'Text Color', 'mularx' ),
		        'section' => 'mularx_banner_section',
		        'settings'   => 'banenr_text_color',
		        'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
		    ) ) 
		);
		$wp_customize->add_setting( 'mularx_banner_heading_typography', array(
				'sanitize_callback' => 'mularx_sanitize_fonts',
				'default' => 'Heebo',
			)
		);

		$wp_customize->add_control( 'mularx_banner_heading_typography', array(
				'type' => 'select',
				'description' => esc_html__('Heading Font Family','mularx'),
				'section' => 'mularx_banner_section',
				'choices' => mularx_google_fonts(),
				'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
			)
		);
		$wp_customize->add_setting(
		    	'banner_heading_text_size',
		    	array(
			        'default'			=> 70,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_heading_text_size', 
				array(
					'label' => '',
					'description'      => __( 'Heading Font Size', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_heading_text_size',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 200,
						'step'   => 1,
					),
		             'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
				) ) 
			);
		$wp_customize->add_setting(
		    	'banner_heading_text_line_height',
		    	array(
			        'default'			=> 75,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'banner_heading_text_line_height', 
				array(
					'label' => '',
					'description'      => __( 'Heading Text Line Height', 'mularx'),
					'section'  => 'mularx_banner_section',
					'settings' => 'banner_heading_text_line_height',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 250,
						'step'   => 1,
					),
		             'active_callback' => function(){
					    return get_theme_mod( 'enable_banner_section', true );
					},
				) ) 
			);
		}

	/*Featured CTA Option*/
		$wp_customize->add_section('mularx_featured_cta_section', 
		 	array(
		        'title' => esc_html__('Featured CTA', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );

	$wp_customize->add_setting( 'enable_featured_cta_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_featured_cta_section', 
			array(
			  'label'   => __( 'Enable Featured CTA Section', 'mularx' ),
			  'section' => 'mularx_featured_cta_section',
			  'settings' => 'enable_featured_cta_section',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'featured_cta_section_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'featured_cta_section_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_featured_cta_section',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
			)
		);
		$wp_customize->add_setting( 'featured_cta_section_desc', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'featured_cta_section_desc', 
			array(
				'type' => 'text',
				'section' => 'mularx_featured_cta_section',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
			)
		);

		$wp_customize->add_setting( 
	        'featured_cta_image_icon_position', 
	        array(
	            'default'           => 'featured-cta-section-image-align-top',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_cta_image_icon_position',
				array(
					'section'	  => 'mularx_featured_cta_section',
					'description'		  => esc_html__( 'Image Position', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'featured-cta-section-image-align-top'  => esc_html__('Top','mularx'),
						'featured-cta-section-image-align-left'  => esc_html__('Left','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
				)
			)
		);
		$wp_customize->add_setting( 
	        'featured_cta_section_text_alignment', 
	        array(
	            'default'           => 'featured-cta-section-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_cta_section_text_alignment',
				array(
					'section'	  => 'mularx_featured_cta_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'featured-cta-section-text-align-left'  => esc_html__('Left','mularx'),
						'featured-cta-section-text-align-center'  => esc_html__('Center','mularx'),
						'featured-cta-section-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
				)
			)
		);
		$featured_ctas_label = __('CTA Box','mularx');
		for($i=1; $i <= 4; $i++){
			$wp_customize->add_setting('featured_cta_box_image_'.$i, array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'mularx_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_cta_box_image_'.$i, array(
		    	'label' => $featured_ctas_label.' '.$i,
		        'description'       => esc_html__('Upload CTA Image', 'mularx'),
		        'section'           => 'mularx_featured_cta_section',
		        'settings'          => 'featured_cta_box_image_'.$i,
		        'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
		    )));
		    $wp_customize->add_setting( 'featured_cta_heading_'.$i, 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'featured_cta_heading_'.$i, 
				array(
					'type' => 'text',
					'section' => 'mularx_featured_cta_section',
					'description' => esc_html__( 'Heading','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'featured_cta_text_'.$i, 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'featured_cta_text_'.$i, 
				array(
					'type' => 'text',
					'section' => 'mularx_featured_cta_section',
					'description' => esc_html__( 'Info Text','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_featured_cta_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'featured_cta_button_label_'.$i,
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'featured_cta_button_label_'.$i, 
	            array(
	            	'label' => __('Button','mularx'),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_featured_cta_section',
					'settings'   => 'featured_cta_button_label_'.$i,
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'enable_featured_cta_section', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'featured_cta_button_link_'.$i,
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'featured_cta_button_link_'.$i, 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_featured_cta_section',
	            'settings'   => 'featured_cta_button_link_'.$i,
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_featured_cta_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'featured_cta_button_target_'.$i, 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'featured_cta_button_target_'.$i, 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_featured_cta_section',
			  'settings' => 'featured_cta_button_target_'.$i,
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_featured_cta_section', true );
				}
			)
		);
	}

	$wp_customize->add_setting(
	    	'featured_cta_icon_image_width',
	    	array(
		        'default'			=> '64',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'featured_cta_icon_image_width', 
			array(
				'label' => '',
				'description'      => __( 'Icon/Image Width', 'mularx'),
				'section'  => 'mularx_featured_cta_section',
				'settings' => 'featured_cta_icon_image_width',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 500,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'featured_cta_icon_image_height',
	    	array(
		        'default'			=> '64',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'featured_cta_icon_image_height', 
			array(
				'label' => '',
				'description'      => __( 'Icon/Image Height[px]', 'mularx'),
				'section'  => 'mularx_featured_cta_section',
				'settings' => 'featured_cta_icon_image_height',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 500,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
			) ) 
		);

		$wp_customize->add_setting(
	    	'featured_cta_section_overlap_top_offset',
	    	array(
		        'default'			=> '-100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'featured_cta_section_overlap_top_offset', 
			array(
				'label' => '',
				'description'      => __( 'Section Overlap Top Offset', 'mularx'),
				'section'  => 'mularx_featured_cta_section',
				'settings' => 'featured_cta_section_overlap_top_offset',
	             'input_attrs' => array(
					'min'    => -250,
					'max'    => 100,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
			) ) 
		);



	$wp_customize->add_setting(
	    	'featured_cta_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'featured_cta_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_featured_cta_section',
				'settings' => 'featured_cta_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'featured_cta_section_padding_bottom',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'featured_cta_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_featured_cta_section',
				'settings' => 'featured_cta_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_featured_cta_section', true );
		        },
			) ) 
		);
		
if ( class_exists( 'WooCommerce' ) ) {
		/*Latest  Products Option*/
		$wp_customize->add_section('mularx_latest_product_section', 
		 	array(
		        'title' => esc_html__('Latest Products', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 3,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'enable_latest_product_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_latest_product_section', 
			array(
			  'label'   => __( 'Enable Latest Product Section', 'mularx' ),
			  'section' => 'mularx_latest_product_section',
			  'settings' => 'enable_latest_product_section',
			  'type'    => 'checkbox',
			)
		);
		if(mularx_set_to_premium()){
			$mularx_latest_product_layout_choice = array(
				'latest-product-layout-carousel'  => esc_html__('Carousel','mularx'),
				'latest-product-layout-grid'  => esc_html__('Grid','mularx'),
			);
		}else{
			$mularx_latest_product_layout_choice = array(
				'latest-product-layout-grid'  => esc_html__('Grid','mularx'),
			);
		}
		$wp_customize->add_setting( 
	        'latest_product_section_layout', 
	        array(
	            'default'           => 'latest-product-layout-grid',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'latest_product_section_layout',
				array(
					'section'	  => 'mularx_latest_product_section',
					'description'		  => esc_html__( 'Choose Layout', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => $mularx_latest_product_layout_choice,
					'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			)
		);
		if(mularx_set_to_premium()){
			$mularx_products_grid_column_choices = array(
				'mularx-product-col-2'  => __('2 Column','mularx'),
				'mularx-product-col-3'  => __('3 Column','mularx'),
				'mularx-product-col-4'=> __('4 Column','mularx'),
				'mularx-product-col-5'=> __('5 Column','mularx'),
				'mularx-product-col-6'=> __('6 Column','mularx'),
			);
			
			$mularx_products_carousel_column_choices = array(
				'mularx-product-col-3'  => __('3 Column','mularx'),
				'mularx-product-col-4'=> __('4 Column','mularx'),
				'mularx-product-col-5'=> __('5 Column','mularx'),
				'mularx-product-col-6'=> __('6 Column','mularx'),
			);
		}else{

			$mularx_products_grid_column_choices = array(
				'mularx-product-col-4'=> __('4 Column','mularx'),
			);

		}
		
		$wp_customize->add_setting( 
	        'latest_product_section_grid_column', 
	        array(
	            'default'           => 'mularx-product-col-4',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'latest_product_section_grid_column',
				array(
					'section'	  => 'mularx_latest_product_section',
					'description'		  => esc_html__( 'Display Column', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => $mularx_products_grid_column_choices,
					'active_callback' => 'mularx_latest_product_grid_col_status',
				)
			)
		);
		if(mularx_set_to_premium()){
			$wp_customize->add_setting( 
		        'latest_product_section_carousel_column', 
		        array(
		            'default'           => 'mularx-product-col-4',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'latest_product_section_carousel_column',
					array(
						'section'	  => 'mularx_latest_product_section',
						'description'		  => esc_html__( 'Display Column', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => $mularx_products_carousel_column_choices,
						'active_callback' => 'mularx_latest_product_carousel_col_status',
					)
				)
			);
		}
		$wp_customize->add_setting( 
	        'latest_product_section_text_align', 
	        array(
	            'default'           => 'latest-product-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'latest_product_section_text_align',
				array(
					'section'	  => 'mularx_latest_product_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'latest-product-text-align-left'  => esc_html__('Left','mularx'),
						'latest-product-text-align-center'  => esc_html__('Center','mularx'),
						'latest-product-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			)
		);


		$wp_customize->add_setting( 'latest_product_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'mularx_sanitize_text',
			) 
		);

		$wp_customize->add_control( 'latest_product_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_latest_product_section',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_latest_product_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'latest_product_description_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'latest_product_description_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_latest_product_section',
				'description' => esc_html__( 'Descriptive Text','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_latest_product_section', true );
		        },
			)
		);
	if ( mularx_set_to_premium() ) {
		$wp_customize->add_setting(
	    	'latest_product_post_per_page',
	    	array(
		        'default'			=> '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latest_product_post_per_page', 
			array(
				'label'      => __( 'Post Per Page', 'mularx'),
				'section'  => 'mularx_latest_product_section',
				'settings' => 'latest_product_post_per_page',
	             'input_attrs' => array(
					'min'    => -1,
					'max'    => 100,
					'step'   => 1,
				),
	           'active_callback' => function(){
		            return get_theme_mod( 'enable_latest_product_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'latest_product_image_height',
	    	array(
		        'default'			=> '350',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latest_product_image_height', 
			array(
				'label'      => __( 'Product Image Height', 'mularx'),
				'section'  => 'mularx_latest_product_section',
				'settings' => 'latest_product_image_height',
	             'input_attrs' => array(
					'min'    => 100,
					'max'    => 800,
					'step'   =>1,
				),
	           'active_callback' => function(){
		            return get_theme_mod( 'enable_latest_product_section', true );
		        },
			) ) 
		);




$wp_customize->add_setting( 'latest_product_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'latest_product_button_label', 
	            array(
	            	'label' => __('All Products Button','mularx'),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_latest_product_section',
					'settings'   => 'latest_product_button_label',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'enable_latest_product_section', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'latest_product_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'latest_product_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_latest_product_section',
	            'settings'   => 'latest_product_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_latest_product_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'latest_product_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'latest_product_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_latest_product_section',
			  'settings' => 'latest_product_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_latest_product_section', true );
				}
			)
		);






			$wp_customize->add_setting( 'enable_latest_product_excerpt', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_excerpt', 
				array(
				  'label'   => __( 'Enable Excerpt', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_excerpt',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'enable_latest_product_cart', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_cart', 
				array(
				  'label'   => __( 'Enable add to cart button', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_cart',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			
			$wp_customize->add_setting( 'enable_latest_product_onsale', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_onsale', 
				array(
				  'label'   => __( 'Enable on sale badge', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_onsale',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'enable_latest_product_price', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_price', 
				array(
				  'label'   => __( 'Enable price', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_price',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'enable_latest_product_star', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_star', 
				array(
				  'label'   => __( 'Enable rating star', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_star',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'enable_latest_product_readmore', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_product_readmore', 
				array(
				  'label'   => __( 'Enable Read More button', 'mularx' ),
				  'section' => 'mularx_latest_product_section',
				  'settings' => 'enable_latest_product_readmore',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
				)
			);
			$wp_customize->add_setting( 'latest_product_section_readmore_label', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'mularx_sanitize_text',
				) 
			);

			$wp_customize->add_control( 'latest_product_section_readmore_label', 
				array(
					'type' => 'text',
					'section' => 'mularx_latest_product_section',
					'description' => esc_html__( 'Read More Button Label','mularx' ),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_readmore', true );
			        },
				)
			);
		}
		$wp_customize->add_setting(
	    	'latestproduct_section_padding_top',
	    	array(
		        'default'			=> '60',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latestproduct_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_latest_product_section',
				'settings' => 'latestproduct_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_latest_product_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'latestproduct_section_padding_bottom',
	    	array(
		        'default'			=> '60',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latestproduct_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_latest_product_section',
				'settings' => 'latestproduct_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'enable_latest_product_section', true );
			        },
			) ) 
		);
	}

		/*About Us Section*/
		$wp_customize->add_section('mularx_about_options', 
		 	array(
		        'title' => esc_html__('About Us', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'about_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'about_status', 
			array(
			  'label'   => esc_html__( 'Enable About Section', 'mularx' ),
			  'section' => 'mularx_about_options',
			  'settings' => 'about_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->add_setting( 
	        'about_section_text_align', 
	        array(
	            'default'           => 'about-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'about_section_text_align',
				array(
					'section'	  => 'mularx_about_options',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'about-text-align-left'  => esc_html__('Left','mularx'),
						'about-text-align-center'  => esc_html__('Center','mularx'),
						'about-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'about_status', true );
			        },
				)
			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_status', array(
            'selector' => '.about-wraper h5.about-title',
        ) );

		$wp_customize->add_setting( 'about_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',

			) 
		);
		$wp_customize->add_control( 'about_heading_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_about_options',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
				'priority' =>2,
			)
		);
	    $wp_customize->add_setting('about_page',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'mularx_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new mularx_Dropdown_Pages_Control($wp_customize, 
				'about_page',
				    array(
				        'description'       => esc_html__('Select Page', 'mularx'),
				        'section'     => 'mularx_about_options',
				        'type'        => 'dropdown-pages',
				        'settings'	  => 'about_page',
				        'priority'    => 2,
				        'active_callback' => function(){
								return get_theme_mod( 'about_status', true );
						},
			    	)
				)
			);

	    

		$wp_customize->add_setting( 'about_title_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'about_title_status', 
			array(
			  'label'   => esc_html__( 'Enable Title', 'mularx' ),
			  'section' => 'mularx_about_options',
			  'settings' => 'about_title_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'about_status', true );
		        },
			)
		);

        $wp_customize->add_setting( 'about_featured_image_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'about_featured_image_status', 
			array(
			  'label'   => esc_html__( 'Enable Featured Image', 'mularx' ),
			  'section' => 'mularx_about_options',
			  'settings' => 'about_featured_image_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'about_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'about_cta_button_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'about_cta_button_status', 
			array(
			  'label'   => esc_html__( 'Enable Button', 'mularx' ),
			  'section' => 'mularx_about_options',
			  'settings' => 'about_cta_button_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'about_status', true );
		        },
			)
		);
		$wp_customize->add_setting( 'about_readmore_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'mularx_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'about_readmore_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_about_options',
				'description' => esc_html__( 'Button Label','mularx' ),
				'active_callback' => function(){
				    return get_theme_mod( 'about_status', true );
				},
			)
		);

		$wp_customize->add_setting(
	    	'about_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'about_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_about_options',
				'settings' => 'about_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
		            return get_theme_mod( 'about_status', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'about_section_padding_bottom',
	    	array(
		        'default'			=> '10',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'about_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_about_options',
				'settings' => 'about_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
			            return get_theme_mod( 'about_status', true );
			        },
			) ) 
		);
		/*Latest Post*/
		$wp_customize->add_section('mularx_latest_post_options', 
		 	array(
		        'title' => esc_html__('Latest Posts', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 7,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'latest_post_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'latest_post_status', 
			array(
			  'label'   => esc_html__( 'Enable Latest Post Section', 'mularx' ),
			  'section' => 'mularx_latest_post_options',
			  'settings' => 'latest_post_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
		);
		$wp_customize->add_setting( 'latest_post_heading_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',

			) 
		);
		$wp_customize->add_control( 'latest_post_heading_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_latest_post_options',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
			)
		);
		$wp_customize->add_setting( 'latest_post_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'latest_post_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_latest_post_options',
				'description' => esc_html__( 'Descriptive Text','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'latest_post_status', true );
		        },
			)
		);
		if ( mularx_set_to_premium() ) {
			$wp_customize->add_setting( 
		        'latest_post_section_text_align', 
		        array(
		            'default'           => 'latest-post-text-align-left',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'latest_post_section_text_align',
					array(
						'section'	  => 'mularx_latest_post_options',
						'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
						'label' => '',
						'type'        => 'select',
						'choices'	  => array(
							'latest-post-text-align-left'  => esc_html__('Left','mularx'),
							'latest-post-text-align-center'  => esc_html__('Center','mularx'),
							'latest-post-text-align-right'  => esc_html__('Right','mularx'),
						),
						'active_callback' => function(){
				            return get_theme_mod( 'latest_post_status', true );
				        },
					)
				)
			);
			$wp_customize->add_setting(
		    	'laetst_post_post_per_page',
		    	array(
			        'default'			=> '3',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'mularx_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new mularx_Customizer_Range_Control( $wp_customize, 'laetst_post_post_per_page', 
				array(
					'label'      => __( 'Post Per Page', 'mularx'),
					'section'  => 'mularx_latest_post_options',
					'settings' => 'laetst_post_post_per_page',
		             'input_attrs' => array(
						'min'    => 2,
						'max'    => 20,
						'step'   => 1,
					),
		           'active_callback' => function(){
			            return get_theme_mod( 'latest_post_status', true );
			        },
				) ) 
			);
			// $wp_customize->selective_refresh->add_partial( 'about_status', array(
	  //           'selector' => '.about-wraper h5.about-title',
	  //       ) );
			
			$wp_customize->add_setting( 'mularx_latest_post_source_type', 
		        array(
		            'default'           => 'latest-post',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mularx_latest_post_source_type',
					array(
						'section'	  => 'mularx_latest_post_options',
						'label'		  => esc_html__( 'Choose Post Source Type', 'mularx' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => array(
							'latest-post'  => esc_html__('Default','mularx'),
							'select-category'  => esc_html__('From Category','mularx'),
						),
						'active_callback' => function(){
								return get_theme_mod( 'latest_post_status', true );
						},
					)
				)
			);

			$wp_customize->add_setting('latest_post_category',
		    array(
		        'default'           => '',
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'mularx_sanitize_text',
		    )
			);
			$wp_customize->add_control(
				new mularx_Dropdown_Taxonomies_Control($wp_customize, 
				'latest_post_category',
				    array(
				        'description'       => esc_html__('Select Category', 'mularx'),
				     	'section'     => 'mularx_latest_post_options',
				        'type'        => 'dropdown-taxonomies',
				        'taxonomy'    => 'category',
				        'settings'	  => 'latest_post_category',
				        'priority'    => 10,
				        'active_callback' => 'mularx_current_post_type',
			    	)
				)
			);
			$wp_customize->add_setting( 'enable_latest_post_excerpt', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_post_excerpt', 
				array(
				  'label'   => esc_html__( 'Enable Excerpt', 'mularx' ),
				  'section' => 'mularx_latest_post_options',
				  'settings' => 'enable_latest_post_excerpt',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
				)
			);
			$wp_customize->add_setting( 'enable_latest_post_category', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_post_category', 
				array(
				  'label'   => esc_html__( 'Enable Category', 'mularx' ),
				  'section' => 'mularx_latest_post_options',
				  'settings' => 'enable_latest_post_category',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
				)
			);
			$wp_customize->add_setting( 'enable_latest_post_meta_author', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_post_meta_author', 
				array(
				  'label'   => esc_html__( 'Enable Author', 'mularx' ),
				  'section' => 'mularx_latest_post_options',
				  'settings' => 'enable_latest_post_meta_author',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
				)
			);
			$wp_customize->add_setting( 'enable_latest_post_meta_date', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'enable_latest_post_meta_date', 
				array(
				  'label'   => esc_html__( 'Enable Post Date', 'mularx' ),
				  'section' => 'mularx_latest_post_options',
				  'settings' => 'enable_latest_post_meta_date',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
				)
			);

			$wp_customize->add_setting( 'latest_post_button_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'latest_post_button_status', 
				array(
				  'label'   => esc_html__( 'Enable Read More Button', 'mularx' ),
				  'section' => 'mularx_latest_post_options',
				  'settings' => 'latest_post_button_status',
				  'type'    => 'checkbox',
				  'active_callback' => function(){
				    return get_theme_mod( 'latest_post_status', true );
				},
				)
			);
			$wp_customize->add_setting( 'latest_post_readmore_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'mularx_sanitize_text',
				) 
			);
			$wp_customize->add_control( 'latest_post_readmore_text', 
				array(
					'type' => 'text',
					'section' => 'mularx_latest_post_options',
					'description' => esc_html__( 'Read More Text','mularx' ),
					'active_callback' => function(){
					    return get_theme_mod( 'latest_post_status', true );
					},
					'priority'    => 12,
					'active_callback' => function(){
					    return get_theme_mod( 'latest_post_status', true );
					},
				)
			);
		}
		$wp_customize->add_setting(
	    	'latestpost_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latestpost_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_latest_post_options',
				'settings' => 'latestpost_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
					    return get_theme_mod( 'latest_post_status', true );
					},
			) ) 
		);
		$wp_customize->add_setting(
	    	'latestpost_section_padding_bottom',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'latestpost_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_latest_post_options',
				'settings' => 'latestpost_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'priority'    => 50,
	             'active_callback' => function(){
					    return get_theme_mod( 'latest_post_status', true );
					},
			) ) 
		);



		/*CTA Section*/
		$wp_customize->add_section('mularx_cta_section', 
		 	array(
		        'title' => esc_html__('CTA', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 9,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'enable_cta_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_cta_section', 
			array(
			  'label'   => __( 'Enable CTA Section', 'mularx' ),
			  'section' => 'mularx_cta_section',
			  'settings' => 'enable_cta_section',
			  'type'    => 'checkbox',
			)
		);

		if ( mularx_set_to_premium() ) {
			    $wp_customize->add_setting( 
			        'cta_section_layout_option', 
			        array(
			            'default'           => 'simple-cta-layout-1',
			            'sanitize_callback' => 'mularx_sanitize_choices'
			        ) 
			    );
			    
			    $wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'cta_section_layout_option',
						array(
							'section'	  => 'mularx_cta_section',
							'description'		  => esc_html__( 'Select Layout', 'mularx' ),
							'label' => '',
							'type'        => 'select',
							'choices'	  => array(
								'simple-cta-layout-1'  => esc_html__('Layout 1','mularx'),
								'simple-cta-layout-2'  => esc_html__('Layout 2','mularx'),
							),
							'active_callback' => function(){
					            return get_theme_mod( 'enable_cta_section', true );
					        },
						)
					)
				);
	  }
		$wp_customize->add_setting( 'cta_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'mularx_sanitize_text',
			) 
		);

		$wp_customize->add_control( 'cta_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_cta_section',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_cta_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'cta_section_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'cta_section_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_cta_section',
				'description' => esc_html__( 'Descriptive Text','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_cta_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'cta_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'cta_button_label', 
	            array(
	            	'label' => __('Button','mularx'),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_cta_section',
					'settings'   => 'cta_button_label',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'enable_cta_section', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'cta_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'cta_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_cta_section',
	            'settings'   => 'cta_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_cta_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'cta_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'cta_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_cta_section',
			  'settings' => 'cta_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_cta_section', true );
				}
			)
		);
/*cta style settings*/

$wp_customize->add_setting(
	    	'cta_section_padding_top',
	    	array(
		    'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'cta_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_cta_section',
				'settings' => 'cta_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 500,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_cta_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'cta_section_padding_bottom',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'cta_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_cta_section',
				'settings' => 'cta_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 500,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_cta_section', true );
		        },
			) ) 
		);
		
		
		
	if ( mularx_set_to_premium() ) {

	/*Testimonial Section*/
		$wp_customize->add_section('mularx_testimonial_section', 
		 	array(
		        'title' => esc_html__('Testimonial', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 10,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'enable_testimonial_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_testimonial_section', 
			array(
			  'label'   => __( 'Enable Testimonial Section', 'mularx' ),
			  'section' => 'mularx_testimonial_section',
			  'settings' => 'enable_testimonial_section',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 
	        'testimonial_section_layout', 
	        array(
	            'default'           => 'testimonial-layout-carousel',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'testimonial_section_layout',
				array(
					'section'	  => 'mularx_testimonial_section',
					'description'		  => esc_html__( 'Choose Layout', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'testimonial-layout-carousel'  => esc_html__('Carousel','mularx'),
						'testimonial-layout-carousel-style-two'  => esc_html__('Carousel Style 2','mularx'),
						'testimonial-layout-carousel-style-three'  => esc_html__('Carousel Style 3','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_testimonial_section', true );
			        },
				)
			)
		);
		$wp_customize->add_setting( 'testimonial_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'mularx_sanitize_text',
			) 
		);

		$wp_customize->add_control( 'testimonial_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_testimonial_section',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_testimonial_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'testimonial_section_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'testimonial_section_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_testimonial_section',
				'description' => esc_html__( 'Descriptive Text','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_testimonial_section', true );
		        },
			)
		);
		$wp_customize->add_setting(
    	'testimonial_section_post_per_page',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_number_absint',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'testimonial_section_post_per_page', 
		array(
			'label'      => __( 'Post Per Page', 'mularx'),
			'section'  => 'mularx_testimonial_section',
			'settings' => 'testimonial_section_post_per_page',
             'input_attrs' => array(
				'min'    => 2,
				'max'    => 50,
				'step'   => 1,
			),
             'active_callback' => function(){
	            return get_theme_mod( 'enable_testimonial_section', true );
	        },
		) ) 
	);



$wp_customize->add_setting( 'all_testimonial_button_label',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'all_testimonial_button_label', 
	            array(
	            	'label' => __('All Testimonials Button','mularx'),
					'description'=>__('Label','mularx'),
					'section' => 'mularx_testimonial_section',
					'settings'   => 'all_testimonial_button_label',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'enable_testimonial_section', true );
  					}
	          )
	        );
	    $wp_customize->add_setting( 'all_testimonial_button_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'all_testimonial_button_link', 
            array(
	            'description'   => esc_html__( 'Link', 'mularx' ),
	            'section' => 'mularx_testimonial_section',
	            'settings'   => 'all_testimonial_button_link',
	            'type'     => 'text',
	            'active_callback' => function(){
					return get_theme_mod( 'enable_testimonial_section', true );
				}
          )
        );
        $wp_customize->add_setting( 'all_testimonial_button_target', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'all_testimonial_button_target', 
			array(
			  'label'   => __( 'Open in New Tab', 'mularx' ),
			  'section' => 'mularx_testimonial_section',
			  'settings' => 'all_testimonial_button_target',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'enable_testimonial_section', true );
				}
			)
		);
		$wp_customize->add_setting(
	    	'testimonials_section_padding_top',
	    	array(
		        'default'			=> '100',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'testimonials_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_testimonial_section',
				'settings' => 'testimonials_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_testimonial_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'testimonials_section_padding_bottom',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'testimonials_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_testimonial_section',
				'settings' => 'testimonials_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_testimonial_section', true );
		        },
			) ) 
		);

		/*Brands logo  Section*/
		$wp_customize->add_section('mularx_brands_logo_section', 
		 	array(
		        'title' => esc_html__('Brands Logo Showcase', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 10,
		        'divider' => 'before',
	    	)
		 );

		$wp_customize->add_setting( 'enable_brands_logo_section', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_brands_logo_section', 
			array(
			  'label'   => __( 'Enable Brands Showcase Section', 'mularx' ),
			  'section' => 'mularx_brands_logo_section',
			  'settings' => 'enable_brands_logo_section',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 
	        'brands_section_layout', 
	        array(
	            'default'           => 'brands-layout-carousel',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'brands_section_layout',
				array(
					'section'	  => 'mularx_brands_logo_section',
					'description'		  => esc_html__( 'Choose Layout', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'brands-layout-carousel'  => esc_html__('Carousel','mularx'),
						'brands-layout-grid'  => esc_html__('Grid Layout','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_brands_logo_section', true );
			        },
				)
			)
		);
		$wp_customize->add_setting( 
	        'brands_section_text_align', 
	        array(
	            'default'           => 'brands-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'brands_section_text_align',
				array(
					'section'	  => 'mularx_brands_logo_section',
					'description'		  => esc_html__( 'Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'brands-text-align-left'  => esc_html__('Left','mularx'),
						'brands-text-align-center'  => esc_html__('Center','mularx'),
						'brands-text-align-right'  => esc_html__('Right','mularx'),
					),
					'active_callback' => function(){
			            return get_theme_mod( 'enable_brands_logo_section', true );
			        },
				)
			)
		);
		$wp_customize->add_setting( 'brands_logo_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'mularx_sanitize_text',
			) 
		);

		$wp_customize->add_control( 'brands_logo_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_brands_logo_section',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'brands_logo_section_text', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'brands_logo_section_text', 
			array(
				'type' => 'text',
				'section' => 'mularx_brands_logo_section',
				'description' => esc_html__( 'Descriptive Text','mularx' ),
				'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			)
		);
		$wp_customize->add_setting(
    	'brands_section_post_per_page',
    	array(
	        'default'			=> '-1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mularx_sanitize_text',
		
		)
	);
	$wp_customize->add_control( 
	new mularx_Customizer_Range_Control( $wp_customize, 'brands_section_post_per_page', 
		array(
			'label'      => __( 'Post Per Page', 'mularx'),
			'section'  => 'mularx_brands_logo_section',
			'settings' => 'brands_section_post_per_page',
             'input_attrs' => array(
				'min'    => -1,
				'max'    => 50,
				'step'   => 1,
			),
             'active_callback' => function(){
	            return get_theme_mod( 'enable_brands_logo_section', true );
	        },
		) ) 
	);
	$wp_customize->add_setting( 'enable_brands_logo_grayscale', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_brands_logo_grayscale', 
			array(
			  'label'   => __( 'Enable Grayscale Mode', 'mularx' ),
			  'section' => 'mularx_brands_logo_section',
			  'settings' => 'enable_brands_logo_grayscale',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			)
		);
		$wp_customize->add_setting( 'enable_brands_logo_border_top', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_brands_logo_border_top', 
			array(
			  'label'   => __( 'Enable Border Top', 'mularx' ),
			  'section' => 'mularx_brands_logo_section',
			  'settings' => 'enable_brands_logo_border_top',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			)
		);
		$wp_customize->add_setting(
	    	'brands_section_padding_top',
	    	array(
		        'default'			=> '40',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'brands_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Section Top Padding', 'mularx'),
				'section'  => 'mularx_brands_logo_section',
				'settings' => 'brands_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			) ) 
		);
		$wp_customize->add_setting(
	    	'brands_section_padding_bottom',
	    	array(
		        'default'			=> '50',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'brands_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Section Bottom Padding', 'mularx'),
				'section'  => 'mularx_brands_logo_section',
				'settings' => 'brands_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
		            return get_theme_mod( 'enable_brands_logo_section', true );
		        },
			) ) 
		);
	}

		/*Newsletter CTA*/
		$wp_customize->add_section('mularx_newsletter_options', 
		 	array(
		        'title' => esc_html__('Newsletter Settings', 'mularx'),
		        'panel' =>'mularx_front_page_panel',
		        'priority' => 13,
		        'divider' => 'before',
	    	)
		 );
	  $wp_customize->add_setting( 'newsletter_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'newsletter_section_status', 
			array(
			  'label'   => __( 'Enable Newsletter Section', 'mularx' ),
			  'section' => 'mularx_newsletter_options',
			  'settings' => 'newsletter_section_status',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_setting('newsletter_section_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'mularx_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'newsletter_section_image', array(
	    	'label' => '',
	        'description'       => esc_html__('Upload Image', 'mularx'),
	        'section'           => 'mularx_newsletter_options',
	        'settings'          => 'newsletter_section_image',
	       'active_callback' => function(){
						return get_theme_mod( 'newsletter_section_status', true );
				}
	    )));

	    $wp_customize->add_setting( 'enable_background_overlay_effect', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_background_overlay_effect', 
			array(
			  'label'   => __( 'Enable Background Overlay Effect', 'mularx' ),
			  'section' => 'mularx_newsletter_options',
			  'settings' => 'enable_background_overlay_effect',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			)
		);
		
	    $wp_customize->add_setting( 'newsletter_section_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'newsletter_section_heading', 
			array(
				'type' => 'text',
				'section' => 'mularx_newsletter_options',
				'label' => '',
				'description' => esc_html__( 'Heading','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			)
		);
		$wp_customize->add_setting( 'newsletter_section_description', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'newsletter_section_description', 
			array(
				'type' => 'text',
				'section' => 'mularx_newsletter_options',
				'label' => '',
				'description' => esc_html__( 'Description Text','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			)
		);   
	    $wp_customize->add_setting( 'newsletter_form_shortcode', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			) 
		);

		$wp_customize->add_control( 'newsletter_form_shortcode', 
			array(
				'type' => 'text',
				'section' => 'mularx_newsletter_options',
				'label' => '',
				'description' => esc_html__( 'Form Shortcode','mularx' ),
				'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			)
		);
		$wp_customize->add_setting(
	    	'newsletter_section_padding_top',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'newsletter_section_padding_top', 
			array(
				'label' => '',
				'description'      => __( 'Top Spacing', 'mularx'),
				'section'  => 'mularx_newsletter_options',
				'settings' => 'newsletter_section_padding_top',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			) ) 
		);
		$wp_customize->add_setting(
	    	'newsletter_section_padding_bottom',
	    	array(
		        'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_text',
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'newsletter_section_padding_bottom', 
			array(
				'label' => '',
				'description'      => __( 'Bottom Spacing', 'mularx'),
				'section'  => 'mularx_newsletter_options',
				'settings' => 'newsletter_section_padding_bottom',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 250,
					'step'   => 1,
				),
	             'active_callback' => function(){
					return get_theme_mod( 'newsletter_section_status', true );
				}
			) ) 
		);

	}

	function mularx_current_post_type(){
		$current_blog_status = get_theme_mod( 'latest_post_status');
        $choice_post_type= get_theme_mod( 'mularx_latest_post_source_type' );
		$blog_display_type = false;
		if($current_blog_status == true && $choice_post_type == 'select-category'){
			$blog_display_type = true;
		}
		return $blog_display_type;
    }
  
    function mularx_current_banner_layout(){
		$current_banner_status = get_theme_mod( 'enable_banner_section');
        $choice_banner_layout= get_theme_mod( 'mularx_banner_layout' );
		$banner_layout_one = false;
		if($current_banner_status == true && $choice_banner_layout == 'banner-layout-1' || $current_banner_status == true && $choice_banner_layout == 'banner-layout-3'){
			$banner_layout_one = true;
		}
		return $banner_layout_one;
    }
    function mularx_current_slider_layout(){
		$current_banner_status = get_theme_mod( 'enable_banner_section');
        $choice_banner_layout= get_theme_mod( 'mularx_banner_layout' );
		$banner_slider_layout = false;
		if($current_banner_status == true && $choice_banner_layout == 'banner-layout-2' || $current_banner_status == true && $choice_banner_layout == 'banner-layout-4' || $current_banner_status == true &&  $choice_banner_layout == 'banner-layout-5' || $current_banner_status == true &&  $choice_banner_layout == 'banner-layout-6'){
			$banner_slider_layout = true;
		}
		return $banner_slider_layout;
    }
    
    function mularx_slider_post_category(){
    	$current_banner_status = get_theme_mod( 'enable_banner_section');
    	$banner_source_layout = get_theme_mod('banner_slider_source_type');
    	$choice_banner_layout= get_theme_mod( 'mularx_banner_layout' );
    	$slider_post_category = false;
    	if($current_banner_status == true){
    		if( $banner_source_layout=='banner-source-type-post' && $choice_banner_layout=='banner-layout-2' || $banner_source_layout=='banner-source-type-post' && $choice_banner_layout=='banner-layout-4' || $banner_source_layout=='banner-source-type-post' && $choice_banner_layout=='banner-layout-5'  || $banner_source_layout=='banner-source-type-post' && $choice_banner_layout=='banner-layout-6'){
    			$slider_post_category = true;
    		}
    		
    	}
    	return $slider_post_category;
    }
    function mularx_current_product_slider_read_more(){
		$current_banner_status = get_theme_mod( 'enable_banner_section');
		$current_button_status = get_theme_mod( 'enable_product_slide_read_more');
        $choice_banner_layout= get_theme_mod( 'mularx_banner_layout' );
		$product_readmore_button = false;
		if($current_banner_status=='true'){
			if($current_button_status == true && $choice_banner_layout == 'banner-layout-3' || $current_button_status == true && $choice_banner_layout == 'banner-layout-4'){
				$product_readmore_button = true;
			}
		}
		return $product_readmore_button;
    }

    
    function mularx_latest_product_grid_col_status(){
		$section_status = get_theme_mod( 'enable_latest_product_section');
        $section_layout_type= get_theme_mod( 'latest_product_section_layout' );
		$latest_grid_col_status = false;
		if($section_status == true && $section_layout_type == 'latest-product-layout-grid'){
			$latest_grid_col_status = true;
		}
		return $latest_grid_col_status;
    }
    function mularx_latest_product_carousel_col_status(){
		$section_status = get_theme_mod( 'enable_latest_product_section');
        $section_layout_type= get_theme_mod( 'latest_product_section_layout' );
		$latest_carousel_col_status = false;
		if($section_status == true && $section_layout_type == 'latest-product-layout-carousel'){
			$latest_carousel_col_status = true;
		}
		return $latest_carousel_col_status;
    }

}
add_action( 'customize_register', 'mularx_frontpage_options_register' );
require get_template_directory() . '/inc/customizer/services-options.php';
require get_template_directory() . '/inc/customizer/mission-options.php';
require get_template_directory() . '/inc/customizer/steps-options.php';

if(mularx_set_to_premium() ){
	require get_template_directory() . '/inc/customizer/counter-options.php';
	require get_template_directory() . '/inc/customizer/woo-options.php';
	require get_template_directory() . '/inc/customizer/portfolio-options.php';
	require get_template_directory() . '/inc/customizer/teams-options.php';

}