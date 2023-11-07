<?php
/**
*woocomemrce layout  customizer options
*
* @package mularx
*
*/
if (! function_exists('mularx_wooproduct_options_register')) {
	function mularx_wooproduct_options_register( $wp_customize ) {
		$wp_customize->add_section(
	        'mularx_wooproduct_options',
	        array(
	            'title'    => esc_html__( 'WooCommerce Settings', 'mularx' ),
	            'panel'    => 'mularx_theme_option_panel',
	            'priority' => 6,
	        )
	    );
	    /** blog layout layout */
		$wooproduct_layout_choices = array(
			'woorpoduct-no-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
			'woorpoduct-left-sidebar'  => esc_url( get_template_directory_uri() . '/images/dashboard/left-sidebar.png' ),
			'woorpoduct-right-sidebar'=> esc_url( get_template_directory_uri() . '/images/dashboard/right-sidebar.png' ),
		);
	    $wp_customize->add_setting( 
	        'mularx_wooproduct_layout', 
	        array(
	            'default'           => 'woorpoduct-right-sidebar',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Horizontal(
				$wp_customize,
				'mularx_wooproduct_layout',
				array(
					'section'	  => 'mularx_wooproduct_options',
					'label'		  => esc_html__( 'Shop/Archive Settings', 'mularx' ),
					'description' => esc_html__( 'Choose Sidebar Option', 'mularx' ),
					'choices'	  => $wooproduct_layout_choices,
					'priority' => 1,
				)
			)
		);
		$wp_customize->add_setting( 
	        'product_shop_text_alignment', 
	        array(
	            'default'           => 'product-text-align-center',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'product_shop_text_alignment',
				array(
					'section'	  => 'mularx_wooproduct_options',
					'description'		  => esc_html__( 'Product Text Alignment', 'mularx' ),
					'label' => '',
					'type'        => 'select',
					'choices'	  => array(
						'product-text-align-left'  => esc_html__('Left','mularx'),
						'product-text-align-center'  => esc_html__('Center','mularx'),
						'product-text-align-right'  => esc_html__('Right','mularx'),
					),
					
				)
			)
		);
		$wp_customize->add_setting(
	    	'archive_product_image_height',
	    	array(
		        'default'			=> '350',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mularx_sanitize_number_absint',
			
			)
		);
		$wp_customize->add_control( 
		new mularx_Customizer_Range_Control( $wp_customize, 'archive_product_image_height', 
			array(
				'label'      => __( 'Product Image Height', 'mularx'),
				'section'  => 'mularx_wooproduct_options',
				'settings' => 'archive_product_image_height',
	             'input_attrs' => array(
					'min'    => 100,
					'max'    => 800,
					'step'   =>1,
				),
			) ) 
		);

		$wp_customize->add_setting( 'enable_archive_add_to_cart_button', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_archive_add_to_cart_button', 
			array(
			  'label'   => __( 'Enable Add to Cart Button', 'mularx' ),
			  'section' => 'mularx_wooproduct_options',
			  'settings' => 'enable_archive_add_to_cart_button',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'enable_archive_product_sidebar', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_archive_product_sidebar', 
			array(
			  'label'   => __( 'Enable Product Sidebar in Archive/Shop Page', 'mularx' ),
			  'section' => 'mularx_wooproduct_options',
			  'settings' => 'enable_archive_product_sidebar',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_shop_sidebar_enable_status',
			)
		);

/*single product*/
	    $wp_customize->add_setting( 
	        'mularx_single_wooproduct_layout', 
	        array(
	            'default'           => 'woorpoduct-right-sidebar',
	            'sanitize_callback' => 'mularx_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new mularx_Radio_Image_Control_Horizontal(
				$wp_customize,
				'mularx_single_wooproduct_layout',
				array(
					'section'	  => 'mularx_wooproduct_options',
					'label'		  => esc_html__( 'Single Product Settings', 'mularx' ),
					'description' => esc_html__( 'Choose Sidebar Option', 'mularx' ),
					'choices'	  => $wooproduct_layout_choices,
					'priority' => 10,
				)
			)
		);
		$wp_customize->add_setting( 'enable_single_product_sidebar', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'mularx_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_single_product_sidebar', 
			array(
			  'label'   => __( 'Enable Product Sidebar in Single Product Page', 'mularx' ),
			  'section' => 'mularx_wooproduct_options',
			  'settings' => 'enable_single_product_sidebar',
			  'type'    => 'checkbox',
			  'active_callback' => 'mularx_product_sidebar_enable_status',
			)
		);
	}

	function mularx_shop_sidebar_enable_status(){
        $shop_sidebar_layout= get_theme_mod( 'mularx_wooproduct_layout' );
		$custom_sidebar_status = false;
		if($shop_sidebar_layout == 'woorpoduct-left-sidebar' || $shop_sidebar_layout == 'woorpoduct-right-sidebar'){
			$custom_sidebar_status = true;
		}
		return $custom_sidebar_status;
    }
    function mularx_product_sidebar_enable_status(){
        $shop_sidebar_layout= get_theme_mod( 'mularx_single_wooproduct_layout' );
		$custom_sidebar_status = false;
		if($shop_sidebar_layout == 'woorpoduct-left-sidebar' || $shop_sidebar_layout == 'woorpoduct-right-sidebar'){
			$custom_sidebar_status = true;
		}
		return $custom_sidebar_status;
    }
}
add_action( 'customize_register', 'mularx_wooproduct_options_register' );