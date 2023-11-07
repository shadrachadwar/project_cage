<?php
/**
 * Template Name: Front Page for Theme
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */
get_header();
mularx_banner_section();
	if(mularx_set_to_premium()){
		$default_order = array( 'featured-cta','about-us','mission','steps','services', 'portfolio', 'counters','teams', 'testimonials','latest-products','newsletter','cta','latest-post','brands-logo');
		$mularx_sections = get_theme_mod( 'mularx_section_order', $default_order );
	
		if( !empty($mularx_sections) ):
			foreach ($mularx_sections as $section) {
				//echo $section;
				switch ( $section ) {
					case "featured-cta":
						mularx_featrued_cta_section();
					break;
					case "about-us":
						mularx_about_us_section();
					break;
					case "mission":
						mularx_misson_section();
					break;
					case "steps":
						mularx_steps_section();
					break;
					case "services":
						mularx_service_section();
					break;
					case "portfolio":
						mularx_portfolio_section();
					break;
					case "counters":
						mularx_counter_section();
					break;
					case "teams":
						mularx_teams_section();
					break;
					case "testimonials":
						mularx_testimonial_section();
					break;
					case "latest-products":
						mularx_latest_products_section();
					break;
					case "newsletter":
						mularx_newsletter_section();
					break;
					case "cta":
						mularx_cta_section();
					break;
					case "latest-post":
						mularx_latest_post_section();
					break;
					case "brands-logo":
						mularx_brands_showcase_section();
					break;
				}
			}
		endif;
	}else{
		mularx_featrued_cta_section();
		mularx_about_us_section();
		mularx_misson_section();
		mularx_steps_section();
		mularx_service_section();
		mularx_cta_section();
		mularx_latest_products_section();
		mularx_newsletter_section();
		mularx_latest_post_section();
	}
get_footer();
