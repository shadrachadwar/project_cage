<?php
/**
*Social Media customizer options
*
* @package mularx
*
*/

if (! function_exists('mularx_social_options_register')) {
    function mularx_social_options_register( $wp_customize ) {
        $wp_customize->add_panel( 'mularx_social_media_panel', 
          array(
            'priority'       => 25,
            'capability'     => 'edit_theme_options',
            'title'      => esc_html__('Social Media Icons', 'mularx'),
        ) 
      );
        // Social media 
        $wp_customize->add_section('mularx_social_setup', 
          array(
            'title' => esc_html__('Add Social Media', 'mularx'),
            'panel' => 'mularx_social_media_panel',
            'priority' => 1
          )
        );
        $wp_customize->add_section('mularx_social_media_style', 
          array(
            'title' => esc_html__('Social Media Style', 'mularx'),
            'panel' => 'mularx_social_media_panel',
            'priority' => 1
          )
        );
        //Facebook Link
        $wp_customize->add_setting( 'mularx_facebook',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_facebook', 
            array(
              'label'   => esc_html__( 'Facebook', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_facebook',
              'type'     => 'text',
              'priority' => 1,
          )
        );
      
        //Twitter Link
        $wp_customize->add_setting( 'mularx_twitter',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_twitter', 
            array(
              'label'   => esc_html__( 'Twitter', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_twitter',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        
        //Youtube Link
        $wp_customize->add_setting( 'mularx_youtube',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_youtube', 
            array(
              'label'   => esc_html__( 'Youtube', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_youtube',
              'type'     => 'text',
              'priority' => 2,
              
          )
        );
        //Instagram
        $wp_customize->add_setting( 'mularx_instagram',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_instagram', 
            array(
              'label'   => esc_html__( 'Instagram', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_instagram',
              'type'     => 'text',
              'priority' => 2,
             
          )
        );
        //Linkedin
        $wp_customize->add_setting( 'mularx_linkedin',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_linkedin', 
            array(
              'label'   => esc_html__( 'Linkedin', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_linkedin',
              'type'     => 'text',
              'priority' => 2,
             
          )
        );
        //Google
        $wp_customize->add_setting( 'mularx_google',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_google', 
            array(
              'label'   => esc_html__( 'Google Business', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_google',
              'type'     => 'text',
              'priority' => 2,
              
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'mularx_pinterest',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_pinterest', 
            array(
              'label'   => esc_html__( 'Pinterest', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_pinterest',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'mularx_vk',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_vk', 
            array(
              'label'   => esc_html__( 'VK', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_vk',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        //yelp
        $wp_customize->add_setting( 'mularx_yelp',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_yelp', 
            array(
              'label'   => esc_html__( 'Yelp', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_yelp',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        $wp_customize->add_setting( 'mularx_git',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_git', 
            array(
              'label'   => esc_html__( 'Github', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_git',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        $wp_customize->add_setting( 'mularx_dribbble',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_dribbble', 
            array(
              'label'   => esc_html__( 'Dribbble', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_dribbble',
              'type'     => 'text',
              'priority' => 2,
          )
        );
        $wp_customize->add_setting( 'mularx_reddit',
          array(
            'default'        => '',
            'sanitize_callback' => 'mularx_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'mularx_reddit', 
            array(
              'label'   => esc_html__( 'Reddit', 'mularx' ),
              'section' => 'mularx_social_setup',
              'settings'   => 'mularx_reddit',
              'type'     => 'text',
              'priority' => 2,
          )
        );
  if ( mularx_set_to_premium() ) {
    $social_media_layout_choices= array(
      'social-layout-normal' => __('Normal','mularx'),
      'social-layout-box' => __('Box Layout','mularx')
    );

    $wp_customize->add_setting( 'mularx_social_media_layout', array(
        'sanitize_callback' => 'mularx_sanitize_text',
        'default' => 'social-layout-box',
      )
    );

    $wp_customize->add_control( 'mularx_social_media_layout', array(
        'type' => 'select',
        'label' => esc_html__('Select Layout','mularx'),
        'section' => 'mularx_social_media_style',
        'choices' => $social_media_layout_choices
      )
    );

    $social_media_color_choices= array(
      'social-default-color' => __('Default','mularx'),
      'social-custom-color' => __('Custom Color','mularx')
    );

    $wp_customize->add_setting( 'mularx_social_media_colors', array(
        'sanitize_callback' => 'mularx_sanitize_text',
        'default' => 'social-default-color',
      )
    );

    $wp_customize->add_control( 'mularx_social_media_colors', array(
        'type' => 'select',
        'label' => esc_html__('Color Option','mularx'),
        'section' => 'mularx_social_media_style',
        'choices' => $social_media_color_choices
      )
    );
     $wp_customize->add_setting(
      'mularx_social_icon_border_radius',
      array(
          'default'     => '0',
      'capability'      => 'edit_theme_options',
      'sanitize_callback' => 'mularx_sanitize_number_absint',
    
    )
  );
  $wp_customize->add_control( 
  new mularx_Customizer_Range_Control( $wp_customize, 'mularx_social_icon_border_radius', 
    array(
      'label'      => __( 'Icon Border Radius', 'mularx'),
      'section'  => 'mularx_social_media_style',
      'settings' => 'mularx_social_icon_border_radius',
             'input_attrs' => array(
        'min'    => 0,
        'max'    => 100,
        'step'   => 1,
      ),
    ) ) 
  );
   $wp_customize->add_setting(
      'mularx_social_icon_size',
      array(
          'default'     => '16',
      'capability'      => 'edit_theme_options',
      'sanitize_callback' => 'mularx_sanitize_number_absint',
    
    )
  );
  $wp_customize->add_control( 
  new mularx_Customizer_Range_Control( $wp_customize, 'mularx_social_icon_size', 
    array(
      'label'      => __( 'Icon Size', 'mularx'),
      'section'  => 'mularx_social_media_style',
      'settings' => 'mularx_social_icon_size',
             'input_attrs' => array(
        'min'    => 10,
        'max'    => 100,
        'step'   => 1,
      ),
    ) ) 
  );
  $wp_customize->add_setting(
      'mularx_social_icon_border_size',
      array(
      'default'     => '0',
      'capability'      => 'edit_theme_options',
      'sanitize_callback' => 'mularx_sanitize_number_absint',
    
    )
  );
  $wp_customize->add_control( 
  new mularx_Customizer_Range_Control( $wp_customize, 'mularx_social_icon_border_size', 
    array(
      'label'      => __( 'Border Size', 'mularx'),
      'section'  => 'mularx_social_media_style',
      'settings' => 'mularx_social_icon_border_size',
             'input_attrs' => array(
        'min'    => 0,
        'max'    => 10,
        'step'   => 1,
      ),
    ) ) 
  );
    $wp_customize->add_setting( 'mularx_social_icon_bg_color', 
      array(
            'default'        => '#ededed',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_bg_color', 
      array(
            'label' => esc_html__('Normal Style','mularx'),
            'description'   => esc_html__( 'Icon Background Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_bg_color',
        ) ) 
    );
    $wp_customize->add_setting( 'mularx_social_icon_text_color', 
      array(
            'default'        => '#232323',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_text_color', 
      array(
        'label' => '',
            'description'   => esc_html__( 'Icon Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_text_color',
        ) ) 
    );
   
  $wp_customize->add_setting( 'mularx_social_icon_border_color', 
      array(
            'default'        => '#232323',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_border_color', 
      array(
        'label' => '',
            'description'   => esc_html__( 'Border Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_border_color',
        ) ) 
    );
    $wp_customize->add_setting( 'mularx_social_icon_hover_bg_color', 
      array(
            'default'        => '#676767',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_hover_bg_color', 
      array(
            'label' => esc_html__('Hover Style','mularx'),
            'description'   => esc_html__( 'Icon Background Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_hover_bg_color',
        ) ) 
    );
    $wp_customize->add_setting( 'mularx_social_icon_hover_text_color', 
      array(
            'default'        => '#ffffff',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_hover_text_color', 
      array(
            'label' => '',
            'description'   => esc_html__( 'Icon Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_hover_text_color',
        ) ) 
    );
     $wp_customize->add_setting( 'mularx_social_icon_hover_border_color', 
      array(
            'default'        => '#232323',
            'sanitize_callback' => 'mularx_sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
      'mularx_social_icon_hover_border_color', 
      array(
        'label' => '',
            'description'   => esc_html__( 'Border Color', 'mularx' ),
            'section' => 'mularx_social_media_style',
            'settings'   => 'mularx_social_icon_hover_border_color',
        ) ) 
    );
  }
}

}
add_action( 'customize_register', 'mularx_social_options_register' );