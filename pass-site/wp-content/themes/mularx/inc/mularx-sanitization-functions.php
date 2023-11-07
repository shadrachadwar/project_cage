<?php
/**
 * Sanitization Functions
 *
 * @package mularx
 * 
 */
// Sanitize hex color 
if ( ! function_exists( 'mularx_sanitize_hex_color' ) ) :
  function mularx_sanitize_hex_color( $color ) {
    if ( '' === $color ) {
      return '';
    }
    if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
      return $color;
    }
    return NULL;
  }
endif;

//// Sanitize checkbox 
if ( ! function_exists( 'mularx_sanitize_checkbox' ) ) :
  function mularx_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && true == $input ) ? true : false );
  }
endif;

// Sanitize select
if ( ! function_exists( 'mularx_sanitize_select' ) ) :
  function mularx_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;


//Sanitize choice
if ( ! function_exists( 'mularx_sanitize_choices' ) ) :
  function mularx_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
  }
endif;


// Sanitize Number Range
if ( ! function_exists( 'mularx_sanitize_float' ) ) :
  function mularx_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  }
endif;

// Sanitize files
if ( ! function_exists( 'mularx_sanitize_file' ) ) :
  function mularx_sanitize_file( $file, $setting ) {
            
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
      
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
      
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
  }
endif;

// Sanitize url
if ( ! function_exists( 'mularx_sanitize_url' ) ) :
  function mularx_sanitize_url( $text) {
    $text = esc_url_raw( $text);
    return $text;
  }
  endif;

// Sanitize textarea
if ( ! function_exists( 'mularx_sanitize_textarea' ) ) :
    function mularx_sanitize_textarea( $html ) {
        return wp_filter_post_kses( $html );
    }
endif;

// Sanitize text
if ( ! function_exists( 'mularx_sanitize_text' ) ) :
    function mularx_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
}
endif;

if ( ! function_exists( 'mularx_sanitize_number_absint' ) ) :
  function mularx_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );

    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
  }
endif;
if(!function_exists('mularx_sanitize_fonts')):
    function mularx_sanitize_fonts( $input, $setting ) {

      // Get list of choices from the control associated with the setting.
      $choices = $setting->manager->get_control( $setting->id )->choices;
      
      // If the input is a valid key, return it; otherwise, return the default.
      return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }
endif;
if ( ! function_exists( 'mularx_sanitize_number_range' ) ) :
  function mularx_sanitize_number_range( $number, $setting ) {
      $atts = $setting->manager->get_control( $setting->id )->input_attrs;
      $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
      $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
      $step = ( isset( $atts['step'] ) ? $atts['step'] : 0.001 );
      $number = floor($number / $atts['step']) * $atts['step'];
      return ( $min <= $number && $number <= $max ) ? $number : $setting->default;
  }
endif;