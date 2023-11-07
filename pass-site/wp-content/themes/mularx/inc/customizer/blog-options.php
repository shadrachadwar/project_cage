<?php
/**
*Blog  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_blog_options_register')) {
	function mularx_blog_options_register( $wp_customize ) {
		//blog
		$wp_customize->add_panel( 'mularx_blog_panel', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Blog Options', 'mularx'),
			) 
		);
		$wp_customize->add_section('mularx_blog_options', 
		 	array(
		        'title' => esc_html__('Blog Archive Settings', 'mularx'),
		        'panel' =>'mularx_blog_panel',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_section('mularx_single_blog_options', 
		 	array(
		        'title' => esc_html__('Single Blog Settings', 'mularx'),
		        'panel' =>'mularx_blog_panel',
		        'priority' => 2,
		        'divider' => 'before',
	    	)
		 );
		/** blog layout layout */
		$blog_layout_choices = array(
			'blog-no-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
			'blog-left-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/left-sidebar.png' ),
			'blog-right-sidebar'=> esc_url( get_template_directory_uri() . '/images/dashboard/right-sidebar.png' ),
		);
	    $wp_customize->add_setting( 
	        'mularx_blog_layout', 
	        array(
	            'default'           => 'blog-right-sidebar',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Vertical(
				$wp_customize,
				'mularx_blog_layout',
				array(
					'section'	  => 'mularx_blog_options',
					'label'		  => esc_html__( 'Choose Sidebar Position', 'mularx' ),
					'description' => '',
					'choices'	  => $blog_layout_choices,
					'priority' => 1,
				)
			)
		);
		if ( mularx_set_to_premium() ) {
		    $wp_customize->add_setting( 
		        'mularx_blog_view_layout', 
		        array(
		            'default'           => 'blog-grid-view',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    $blog_view_layout_choices = array(
				'blog-grid-view'  => esc_url( get_template_directory_uri() . '/images/dashboard/blog-grid-view.png' ),
				'blog-list-view'  => esc_url( get_template_directory_uri() . '/images/dashboard/blog-list-view.png' ),
				'blog-full-view'=> esc_url( get_template_directory_uri() . '/images/dashboard/blog-full-view.png' ),
			);
			$wp_customize->add_control(
				new mularx_Radio_Image_Control_Vertical(
					$wp_customize,
					'mularx_blog_view_layout',
					array(
						'section'	  => 'mularx_blog_options',
						'label'		  => esc_html__( 'Choose Blog View', 'mularx' ),
						'description' => '',
						'choices'	  => $blog_view_layout_choices,
						'priority' => 2,
					)
				)
			);
		}
		$wp_customize->add_setting( 'mularx_excerpt_length', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
				'default' => 30,
			) 
		);

		$wp_customize->add_control( 'mularx_excerpt_length', 
			array(
				'type' => 'number',
				'section' => 'mularx_blog_options',
				'settings' => 'mularx_excerpt_length',
				'label' => esc_html__( 'Excerpt Length','mularx' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'mularx_excerpt_more', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' =>'',
				'sanitize_callback' => 'mularx_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'mularx_excerpt_more', 
			array(
				'type' => 'text',
				'section' => 'mularx_blog_options',
				'label' => esc_html__( 'Read More Label','mularx' ),
			)
		);
		if ( mularx_set_to_premium() ) {
			$mularx_blog_pagination_choices = array(
				'mularx-default-style'  => esc_html__('Default','mularx'),
				'mularx-numeric-style'  => esc_html__('Numeric','mularx'),
					
			);

			$wp_customize->add_setting( 
		        'mularx_pagination_style', 
		        array(
		            'default'           => 'mularx-default-style',
		            'sanitize_callback' => 'mularx_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mularx_pagination_style',
					array(
						'section'	  => 'mularx_blog_options',
						'label'		  => esc_html__( 'Choose Pagination Style', 'mularx' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => $mularx_blog_pagination_choices,
					)
				)
			);
			$wp_customize->add_setting( 'author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'author_status', 
				array(
				  'label'   => __( 'Show Author', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'category_status', 
				array(
				  'label'   => __( 'Show Category', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'tags_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'comment_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'comment_status', 
				array(
				  'label'   => __( 'Show Comment', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'comment_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'estimate_reading_time_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'estimate_reading_time_status', 
				array(
				  'label'   => __( 'Show Estimated Reading Time', 'mularx' ),
				  'section' => 'mularx_blog_options',
				  'settings' => 'estimate_reading_time_status',
				  'type'    => 'checkbox',
				)
			);
		}

		/**
		* Single blog options
		*/
		$wp_customize->add_setting( 
	        'mularx_single_blog_layout', 
	        array(
	            'default'           => 'single-right-sidebar',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    $single_blog_layout_choices = array(
			'single-no-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
			'single-left-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/left-sidebar.png' ),
			'single-right-sidebar'=> esc_url( get_template_directory_uri() . '/images/dashboard/right-sidebar.png' ),
		);
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Vertical(
				$wp_customize,
				'mularx_single_blog_layout',
				array(
					'section'	  => 'mularx_single_blog_options',
					'label'		  => esc_html__( 'Choose Sidebar Position', 'mularx' ),
					'description' => '',
					'choices'	  => $single_blog_layout_choices,
					'priority' => 1,
				)
			)
		);
		 if ( mularx_set_to_premium() ) {
			$wp_customize->add_setting( 'single_featured_image_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'single_featured_image_status', 
				array(
				  'label'   => __( 'Enable Featured Image', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_featured_image_status',
				  'type'    => 'checkbox',
				)
			);
		
			$wp_customize->add_setting( 'single_author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_author_status', 
				array(
				  'label'   => __( 'Show Author', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_category_status', 
				array(
				  'label'   => __( 'Show Category', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_tags_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_postnav_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_postnav_status', 
				array(
				  'label'   => __( 'Show Post Navigation', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_postnav_status',
				  'type'    => 'checkbox',
				)
			);
			
			
			$wp_customize->add_setting( 'single_estimate_reading_time_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_estimate_reading_time_status', 
				array(
				  'label'   => __( 'Show Estimated Reading Time', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_estimate_reading_time_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_author_box_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'single_author_box_status', 
				array(
				  'label'   => __( 'Enable Author Box', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'single_author_box_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'related_post_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'mularx_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'related_post_status', 
				array(
				  'label'   => __( 'Enable Related Post', 'mularx' ),
				  'section' => 'mularx_single_blog_options',
				  'settings' => 'related_post_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_post_related_post_title',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'mularx_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_related_post_title', 
	            array(
					'label'   => esc_html__( 'Heading for Related Post', 'mularx' ),
					'section' => 'mularx_single_blog_options',
					'settings'   => 'single_post_related_post_title',
					'type'     => 'text',
					'active_callback' => function(){
   							return get_theme_mod( 'related_post_status', true );
  					}
	          )
	        );
	    }
	
	}
}
add_action( 'customize_register', 'mularx_blog_options_register' );