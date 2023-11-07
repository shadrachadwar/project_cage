<?php
/**
 * mularx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mularx
 */

if ( ! defined( 'MULARX_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MULARX_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mularx_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mularx, use a find and replace
		* to change 'mularx' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mularx', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mularx' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mularx_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mularx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mularx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mularx_content_width', 640 );
}
add_action( 'after_setup_theme', 'mularx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mularx_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mularx' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	if ( mularx_set_to_premium() ) {
		if(get_theme_mod('enable_archive_product_sidebar')==true){
			register_sidebar(
				array(
					'name'          => esc_html__( 'Product Archive/Shop Sidebar', 'mularx' ),
					'id'            => 'shop-sidebar',
					'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
		if(get_theme_mod('enable_single_product_sidebar')==true){
			register_sidebar(
				array(
					'name'          => esc_html__( 'Single Product Sidebar', 'mularx' ),
					'id'            => 'single-product-sidebar',
					'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
	}
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #1', 'mularx' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #2', 'mularx' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #3', 'mularx' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #4', 'mularx' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'mularx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'mularx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mularx_scripts() {

	wp_enqueue_style( 'mularx-style', get_stylesheet_uri(), array(), MULARX_VERSION );
	wp_style_add_data( 'mularx-style', 'rtl', 'replace' );
	wp_enqueue_style('mularx-font-awesome', get_template_directory_uri() . '/css/all.min.css', '6.0.0');
	wp_enqueue_style('mularx-swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css', '8.0.7');

	wp_enqueue_script( 'mularx-font-awesome-js', get_template_directory_uri() . '/js/all.min.js', array(), '6.0.0', true );
	wp_enqueue_script( 'mularx-swiper-bundle-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '8.0.7', true );
	wp_enqueue_script( 'mularx-isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '8.0.7', true );
	wp_enqueue_script( 'mularx-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MULARX_VERSION, true );
	wp_enqueue_script( 'mularx-scripts', get_template_directory_uri() . '/js/mularx-scripts.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$font_family = get_theme_mod( 'mularx_body_fonts', 'Heebo' );
	$heading_one_font_family = get_theme_mod( 'mularx_fonts_heading_h1', 'Heebo' );
	$heading_two_font_family = get_theme_mod( 'mularx_fonts_heading_h12', 'Heebo' );
	$heading_three_font_family = get_theme_mod( 'mularx_fonts_heading_h3', 'Heebo' );
	$heading_four_font_family = get_theme_mod( 'mularx_fonts_heading_h4', 'Heebo' );
	$heading_five_font_family = get_theme_mod( 'mularx_fonts_heading_h5', 'Heebo' );
	$heading_six_font_family = get_theme_mod( 'mularx_fonts_heading_h6', 'Heebo' );
	$site_title_font = get_theme_mod('mularx_site_title_font_family','Heebo');
	$site_buttons_font = get_theme_mod('mularx_button_font_family','Heebo');
	wp_enqueue_style( 'mularx-googlefonts', 'https://fonts.googleapis.com/css?family='. esc_attr( $font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_one_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_two_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_three_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_four_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_five_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $heading_six_font_family ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $site_title_font ) . ':100,200,300,400,500,600,700,800,900|' . esc_attr( $site_buttons_font ) . ':100,200,300,400,500,600,700,800,900|' );
}
add_action( 'wp_enqueue_scripts', 'mularx_scripts' );
/*
**
 * Adds customizable styles to your <head>
 */
if ( ! function_exists( 'mularx_dynamic_css' ) ) :
	function mularx_dynamic_css(){
		get_template_part('inc/customizer/dynamic-style');

	} 
endif;
add_action( 'wp_head', 'mularx_dynamic_css');




/**
* Enqueue style for dashboard 
*/
function mularx_register_admin_styles() {
    if ( is_admin() ) {
    	wp_register_style( 'mularx-admin-notice-style', get_template_directory_uri() . '/inc/admin/admin-notice.css', false, MULARX_VERSION );
    	wp_enqueue_style( 'mularx-admin-notice-style' );
	}
}
add_action( 'admin_enqueue_scripts', 'mularx_register_admin_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Recommended plugins for this theme.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';
/**
 * Theme Breadcrumbs
 */
require get_template_directory() . '/inc/mularx-breadcrumbs.php';
/**
 * WooCommerce Compatibility
 */


/**
*Loading admin notices
*/
require get_template_directory() . '/inc/admin/admin-notice.php';

add_action( 'after_setup_theme', 'mularx_setup_woocommerce_support' );
function mularx_setup_woocommerce_support(){
  	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' ); 
}

add_filter( 'woocommerce_output_related_products_args', 'mularx_change_number_related_products', 9999 );
 
function mularx_change_number_related_products( $args ) {
 $args['posts_per_page'] = 3; // # of related products
 $args['columns'] = 3; // # of columns per row
 return $args;
}

if( ! function_exists('mularx_filter_archive_title')):
	function mularx_filter_archive_title( $title ) {
		return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
	}
endif;
add_filter( 'get_the_archive_title', 'mularx_filter_archive_title' );
function mularx_set_to_premium() {
	$premium_status = false;
	if ( class_exists( 'Walker_Core' ) ) {
		$WC = new Walker_Core();
		$premium_status = $WC->walker_core_premium_status();
	}
	return $premium_status;

}