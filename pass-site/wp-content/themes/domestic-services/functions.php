<?php
if ( ! function_exists( 'domestic_services_setup' ) ) :
	function domestic_services_setup() {
		add_theme_support( "title-tag");
		add_theme_support( 'automatic-feed-links' );
	}
endif;
add_action( 'after_setup_theme', 'domestic_services_setup' );


function domestic_services_customizer_default_settings() {
	set_theme_mod( 'mularx_primary_color', '#06ccb1' );
	set_theme_mod( 'mularx_secondary_color', '#f6d55c' );
	set_theme_mod('shpor_footer_background_color','#06ccb1');
	set_theme_mod('main_header_alignment_position','menu-alignment-right');
	set_theme_mod('mularx_social_media_layout','social-layout-normal');
	set_theme_mod('mularx_social_media_colors','social-custom-color');
	set_theme_mod('mularx_social_icon_text_color','#ffffff');
	set_theme_mod('mularx_social_icon_hover_text_color','#43d4c0');
	set_theme_mod('header_mainheaer_padding_top','20');
	set_theme_mod('shpor_topbar_bg_color','#2f3232');
	set_theme_mod('banenr_background_color','#096758');
	set_theme_mod('banner_blend_mode_status','false');
	set_theme_mod('featured_cta_section_padding_top','0');
	set_theme_mod('featured_cta_section_padding_bottom','60');
	set_theme_mod('featured_cta_icon_image_width','410');
	set_theme_mod('featured_cta_icon_image_height','310');
	set_theme_mod('missions_section_padding_top','90');
	set_theme_mod('missions_section_padding_bottom','10');
	set_theme_mod('mularx_button_radius','1');
	set_theme_mod('service_section_text_align','service-section-text-align-left');
	set_theme_mod('mularx_container_width','1200');
	set_theme_mod('service_image_height','560');
	set_theme_mod('service_image_width','560');
	set_theme_mod('latest_product_section_grid_column','mularx-product-col-3');
	set_theme_mod('latest_product_section_text_align','latest-product-text-align-left');
	set_theme_mod('banner_heading_text_size','66');
	set_theme_mod('banner_heading_text_line_height','75');
	set_theme_mod('breadcrumbs_background_color','#06ccb1');
}
add_action( 'after_switch_theme', 'domestic_services_customizer_default_settings' );


function domestic_services_enqueue_styles() {
    wp_enqueue_style( 'mularx-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'domestic-services-style',get_stylesheet_directory_uri() . '/style.css',array('mularx-style'));
}
add_action( 'wp_enqueue_scripts', 'domestic_services_enqueue_styles' );

function domestic_services_dynamic_style() {
    wp_enqueue_style(
        'custom-style',
        get_stylesheet_directory_uri() . '/style.css'
    );
    if ( mularx_set_to_premium() ) {
         $banner_content_box_max_width = absint(get_theme_mod('banner_content_box_width','60'));
     }else{
         $banner_content_box_max_width='60';
     }
     $ds_banner_content_width = $banner_content_box_max_width.'%';
     if ( mularx_set_to_premium() ) {
        $banner_background_opacity = get_theme_mod('banner_background_opacity','0.78');
    }else{
        $banner_background_opacity='0.78';
    }
    if( mularx_set_to_premium() ){
    	$site_banner_height = absint(get_theme_mod('banner_section_height','950'));
    }else{
    	$site_banner_height='745';
    }
    $ds_banner_height= $site_banner_height.'px';
    if ( mularx_set_to_premium() ) {
    	$footer_column_border_color = sanitize_hex_color(get_theme_mod('footer_box_border_color','#382456'));
    	$footer_copyright_border_color = sanitize_hex_color(get_theme_mod('footer_copyright_border_color','#382456'));
    }else{
    	$footer_column_border_color='#0db9a1';
    	$footer_copyright_border_color='#0db9a1';
    }
    $ds_slider_container_width = absint(get_theme_mod('mularx_container_width','1200')).'px';
    $my_custom_css = "
        span.banner-content-holder{
        	max-width:$ds_banner_content_width !important;
    	}
    	.wrapper.banner-wrapper .container.full-width .hero-image img{
    		opacity:$banner_background_opacity !important;
    	}
    	.wrapper.banner-wrapper .container.full-width .hero-image{
    		height:$ds_banner_height !important;
    	}
    	.footer-wiget-list.footer-colum-border-right .mularx-footer-column{
    		border-color:$footer_column_border_color!important;
    	}
    	.copyright-section{
    		border-color:$footer_copyright_border_color!important;
    	}
    	.wrapper.banner-wrapper.banner-layout-1  .banner-content {
    		max-width:$ds_slider_container_width;
    	}

    ";
    wp_add_inline_style( 'custom-style', $my_custom_css );
}
add_action( 'wp_enqueue_scripts', 'domestic_services_dynamic_style' );


if(!function_exists('domestic_services_footer_copyright')){
	function domestic_services_footer_copyright(){?>
		<div class="site-info">
			<?php
			$mularx_copyright = get_theme_mod('footer_copiright_text');
			if($mularx_copyright && mularx_set_to_premium() ){?>
				<?php echo wp_kses_post($mularx_copyright);?>
			<?php } else { ?>
				
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'domestic-services' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'domestic-services' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'domestic-services' ), 'Domestic Services', '<a href="http://walkerwp.com/">WalkerWP</a>' );
					?>
			<?php }
			?>
		</div>
<?php }
}
if(!function_exists('domestic_services_footer_bottom_bar')){
	function domestic_services_footer_bottom_bar(){
		if(mularx_set_to_premium()){
			$copyright_text_align = get_theme_mod('copyright_text_alignment');
			if($copyright_text_align=='copyright-text-align-right'){
				$text_alignment_class = 'align-right';
			}elseif($copyright_text_align=='copyright-text-align-left'){
				$text_alignment_class = 'align-left';
			}else{
				$text_alignment_class ='align-center';
			}
			?>
			<div class="wrapper copyright-section <?php echo esc_attr($text_alignment_class);?>">
				<div class="container">
					<?php 
					domestic_services_footer_copyright();
					mularx_footer_brand_logo();
					if(get_theme_mod('footer_social_icons')==true){
						$social_icon_align = get_theme_mod('copyright_social_icon_alignment','copyright-social-align-center');
						if($social_icon_align=='copyright-social-align-left'){
							$social_icon_align_class = 'align-left';
						}elseif($social_icon_align=='copyright-social-align-right'){
							$social_icon_align_class = 'align-right';
						}else{
							$social_icon_align_class ='align-center';
						}
						echo '<div class="footer-social-media '.esc_attr($social_icon_align_class).'">';
							mularx_social_media();
						echo '</div>';
					}
					mularx_copyright_extra_content();
					?>
				</div><!--end of container -->
			</div><!--end of wrapper -->
	<?php } else{?>
		<div class="wrapper copyright-section align-center">
				<div class="container">
					<?php domestic_services_footer_copyright(); ?>
				</div><!--end of container -->
			</div><!--end of wrapper -->

		<?php }

	}
}