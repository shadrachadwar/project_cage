<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mularx
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mularx_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'mularx_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mularx_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'mularx_pingback_header' );
if(!function_exists('mularx_branding')){
	function mularx_branding(){?>
		<div class="site-branding">
			<?php
			the_custom_logo();?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
			<?php $mularx_description = get_bloginfo( 'description', 'display' );
			if ( $mularx_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $mularx_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	<?php }
}
if(!function_exists('mularx_footer_copyright')){
	function mularx_footer_copyright(){?>
		<div class="site-info">
			<?php
			$mularx_copyright = get_theme_mod('footer_copiright_text');
			if($mularx_copyright && mularx_set_to_premium() ){?>
				<?php echo wp_kses_post($mularx_copyright);?>
			<?php } else { ?>
				
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mularx' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'mularx' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'mularx' ), 'MularX', '<a href="http://walkerwp.com/">WalkerWP</a>' );
					?>
			<?php }
			?>
		</div>
<?php }
}

if(!function_exists('mularx_header_section')){
	function mularx_header_section(){
		$mularx_header_stikcy_status = get_theme_mod('header_sticky_menu_status');
		$sticky_header_class= '';
		if(!empty($mularx_header_stikcy_status)){
			$sticky_header_class= 'sticky-header';
		}
		$header_overlay_class= '';
		$selected_header_layout= get_theme_mod( 'mularx_header_layout','header-layout-1' );
		if($selected_header_layout=='header-layout-1' || $selected_header_layout=='header-layout-2'){
			$ovelay_header_style_status= get_theme_mod('header_overlay_layout_status');
			if($ovelay_header_style_status==true){
				$header_overlay_class = 'header-overlay-style-enabled';
			}
		}
		?>
		<header id="masthead" class="site-header <?php echo esc_attr($sticky_header_class).' '.esc_attr($header_overlay_class);?>">
			<?php
				$header_background_img = "";
				if( has_header_image() ) {
					$header_background_img = get_header_image();
				}
				if($header_background_img){ ?>
					<div class="header-background">
						<img class="header-overlay-image" src="<?php echo esc_url($header_background_img);?>" />
					</div>
				<?php 
			} ?>
			<?php mularx_topbar_section();?>
			<?php mularx_main_header();?>
			<?php mularx_header_promotion_bar();?>
		</header><!-- #masthead -->
	</div>
	<?php	}
}
if(!function_exists('mularx_copyright_extra_content')){
	function mularx_copyright_extra_content(){
		$footer_extra_text_align = get_theme_mod('copyright_extra_text_alignment','copyright-extra-text-align-right');
		if($footer_extra_text_align=='copyright-extra-text-align-left'){
			$footer_extra_text_align_class = 'align-left';
		}elseif($footer_extra_text_align=='copyright-extra-text-align-center'){
			$footer_extra_text_align_class = 'align-center';
		}else{
			$footer_extra_text_align_class ='align-right';
		}
		$footer_extra_text= get_theme_mod('footer_copyright_extra_text');
		if(!empty($footer_extra_text)){?>
			<div class="footer-extra-text <?php echo esc_attr($footer_extra_text_align_class);?>">
				<?php echo wp_kses_post($footer_extra_text);?>
			</div>
		<?php }
	}
}
if(!function_exists('mularx_footer_brand_logo')){
	function mularx_footer_brand_logo(){
		$footer_logo_align = get_theme_mod('copyright_logoimage_text_alignment','copyright-image-align-center');
		if($footer_logo_align=='copyright-image-align-left'){
			$footer_logo_align_class = 'align-left';
		}elseif($footer_logo_align=='copyright-image-align-right'){
			$footer_logo_align_class = 'align-right';
		}else{
			$footer_logo_align_class ='align-center';
		}
		$footer_image = get_theme_mod('footer_brands_logo');
		if(!empty($footer_image) ){?>
			<div class="footer-image <?php echo esc_attr($footer_logo_align_class);?>">
				<img class="brand-logo" src="<?php echo esc_url($footer_image);?>" />
			</div>
		<?php }
	}
}
if(!function_exists('mularx_social_media')){
	function mularx_social_media(){
		get_template_part( 'template-parts/partials/social-medias'); 
	}
}
if(! function_exists('header_cart_icon')):
	function header_cart_icon(){
		if(get_theme_mod('header_cart_status')==true && class_exists( 'woocommerce' ) ){?>
			<span class="header-cart-icon"><a class="header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','mularx' ); ?>"> <i class="fa-solid fa-cart-shopping"></i><span class="item-count"><?php echo  WC()->cart->get_cart_contents_count(); ?> </span></a></span>
		<?php } 
	}
endif;

if(!function_exists('header_account_icon')){
	function header_account_icon(){
		if(get_theme_mod('header_account_status')==true && class_exists( 'woocommerce' ) ){?>
			<span class="header-account-icon">
				<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"  title="<?php esc_attr_e('My Account', 'mularx'); ?>">
				 <i class="fa-solid fa-user-large"></i>
				</a>
			</span>
		<?php }
	}
}

if(! function_exists('mularx_banner_section')){
	function mularx_banner_section(){
		if(mularx_set_to_premium()){
			$selected_banner_layout = get_theme_mod('mularx_banner_layout','banner-layout-1');
			if($selected_banner_layout=='banner-layout-6'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-6');
			}elseif($selected_banner_layout=='banner-layout-5'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-5');
			}elseif($selected_banner_layout=='banner-layout-4'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-4');
			}
			elseif($selected_banner_layout=='banner-layout-3'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-3');
			}
			elseif($selected_banner_layout=='banner-layout-2'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-2');
			}else{
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-1');
			}
		}else{
			$selected_banner_layout = get_theme_mod('mularx_banner_layout','banner-layout-3');
			if($selected_banner_layout=='banner-layout-1'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-1');
			}elseif($selected_banner_layout=='banner-layout-2'){
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-2');
			}else{
				get_template_part( 'template-parts/partials/sections/banner/banner-layout-3');
			}
		}
		
	}
}
if(!function_exists('mularx_featrued_cta_section')){
	function mularx_featrued_cta_section(){
		get_template_part( 'template-parts/partials/sections/cta/featured-cta-layout-1');	
	}
}
if(!function_exists('mularx_latest_products_section')){
	function mularx_latest_products_section(){
		get_template_part( 'template-parts/partials/sections/products/latest-products');
	}
}

if(!function_exists('mularx_about_us_section')){
	function mularx_about_us_section(){
		get_template_part( 'template-parts/partials/sections/about/about-layout');
	}
}

if(!function_exists('mularx_latest_post_section')){
	function mularx_latest_post_section(){
		get_template_part( 'template-parts/partials/sections/latest-post/latestpost-layout');
	}
}
if(!function_exists('mularx_cta_section')){
	function mularx_cta_section(){
		$selected_cta_layout = get_theme_mod('cta_section_layout_option','simple-cta-layout-1');
		if($selected_cta_layout=='simple-cta-layout-2'){
			get_template_part( 'template-parts/partials/sections/cta/cta-layout-2');
		}else{
			get_template_part( 'template-parts/partials/sections/cta/cta-layout');
		}
	}
}

if(!function_exists('mularx_testimonial_section')){
	function mularx_testimonial_section(){
		if(mularx_set_to_premium()){
			get_template_part( 'template-parts/partials/sections/testimonial/testimonial-layout-1');
		}
	}
}
if(!function_exists('mularx_brands_showcase_section')){
	function mularx_brands_showcase_section(){
		if(mularx_set_to_premium()){
			get_template_part( 'template-parts/partials/sections/brands/brands-showcase-1');
		}
	}
}
if(!function_exists('mularx_newsletter_section')){
	function mularx_newsletter_section(){
		get_template_part( 'template-parts/partials/sections/newsletter/newsletter-layout');
	}
}
if(!function_exists('mularx_teams_section')){
	function mularx_teams_section(){
		get_template_part( 'template-parts/partials/sections/team/team-layout-1');
	}
}
if(!function_exists('mularx_portfolio_section')){
	function mularx_portfolio_section(){
		get_template_part( 'template-parts/partials/sections/portfolio/portfolio-layout-1');
	}
}
if(!function_exists('mularx_steps_section')){
	function mularx_steps_section(){
		get_template_part( 'template-parts/partials/sections/steps/steps-layout-1');
	}
}
if(!function_exists('mularx_counter_section')){
	function mularx_counter_section(){
		$counter_selected_layout = get_theme_mod('counter_section_layout','counter-section-layout-one');
		if($counter_selected_layout == 'counter-section-layout-two'){
			get_template_part( 'template-parts/partials/sections/about/counter-layout-2');
		}else{
			get_template_part( 'template-parts/partials/sections/about/counter-layout-1');
		}
	}
}
if(!function_exists('mularx_misson_section')){
	function mularx_misson_section(){
		get_template_part( 'template-parts/partials/sections/about/missongoal-layout-1');
	}
}
if(!function_exists('mularx_service_section')){
	function mularx_service_section(){
		$selected_service_layout = get_theme_mod('service_section_layout','service-section-layout-one');
		if($selected_service_layout=='service-section-layout-two'){
			get_template_part( 'template-parts/partials/sections/services/service-layout-2');
		}else{
			get_template_part( 'template-parts/partials/sections/services/service-layout-1');
		}
	}
}
if(! function_exists('header_search_icon')):
	function header_search_icon(){?>
		
			<span class="header-icon-search">
				<button class="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
				<!-- The Modal -->
				<div id="searchModel" class="search-modal modal">
					<div class="modal-content">
						<div class="modal-body">
							<button  class="modal-close">&times;</button>
							<p><?php get_Search_form(); ?></p>
						</div>
					</div>
				</div>
			</span>

		<?php 
	 }
endif;

if(!function_exists('mularx_topbar_section')){
	function mularx_topbar_section(){
		if(get_theme_mod('header_topbar_status')){?>
			<div class="wrapper topbar-wrapper">
				<div class="container">
					<div class="topbar-left">
						<?php
						if(get_theme_mod('header_topbar_slogan_status')==true){
							echo '<div class="topbar-slogan-text">';
								echo wp_kses_post(get_theme_mod('header_slogan_text'));
							echo '</div>';
						}
						if(get_theme_mod('header_topbar_location_status')==true){
							echo '<div class="topbar-lcoation"> <i class="fa-solid fa-location-dot"></i> ';
								echo wp_kses_post(get_theme_mod('topbar_location'));
							echo '</div>';
						}
						if(get_theme_mod('header_topbar_phone_status')==true){
							echo '<div class="topbar-phone"> <i class="fa-solid fa-phone"></i> ';
								echo wp_kses_post(get_theme_mod('topbar_phone'));
							echo '</div>';
						}
						if(get_theme_mod('header_topbar_email_status')==true){
							echo '<div class="topbar-email"> <i class="fa-solid fa-envelope"></i> ';
								echo wp_kses_post(get_theme_mod('topbar_email'));
							echo '</div>';
						}
						?>
					</div>
					<?php 
					if(get_theme_mod('header_topbar_social_media_status')==true){
						mularx_social_media();
					}
					?>
				</div>
			</div><!--end of topbar-wrapper -->
	<?php }
	}
}

if(!function_exists('mularx_navigation')):
	function mularx_navigation(){
		if(mularx_set_to_premium()){
			$mularx_menu_hover_style = get_theme_mod('mularx_navigation_link_hover_style','mularx-link-style-normal');
		}else{
			$mularx_menu_hover_style ='mularx-link-style-normal';
		}
		?>
		<div class="primary-menu <?php echo esc_attr($mularx_menu_hover_style);?>">
			<nav id="site-navigation" class="main-navigation">
					<button type="button" class="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
	<?php }
endif;

if(!function_exists('header_icons_buttons')){
	function header_icons_buttons(){?>
		<div class="header-icons header-buttons-group">

					<?php if(get_theme_mod('header_search_status','true') ){
					
						header_search_icon();
					} 
					header_account_icon();
					header_cart_icon();
					
					?>
					<div class="header-buttons">
						<?php if(get_theme_mod('header_primary_button_status')==true && !empty(get_theme_mod('header_primary_button_label') ) ){
							if(get_theme_mod('header_primary_button_link')){
								$primary_button_link = get_theme_mod('header_primary_button_link');
							}else{
								$primary_button_link='#';
							}
							if(get_theme_mod('header_primary_button_target')){
								$primary_button_target = __('_blank','mularx');
							}else{
								$primary_button_target =__('_self','mularx');;
							}?>
							<a href="<?php echo esc_url($primary_button_link);?>" class="primary-buttons" target="<?php echo esc_attr($primary_button_target);?>"><?php echo esc_html(get_theme_mod('header_primary_button_label'));?> </a>
						<?php }
						if(get_theme_mod('header_secondary_button_status')==true && !empty(get_theme_mod('header_secondary_button_label') ) ){
							if(get_theme_mod('header_secondary_button_link')){
								$secondary_button_link = get_theme_mod('header_secondary_button_link');
							}else{
								$secondary_button_link='#';
							}
							if(get_theme_mod('header_secondary_button_target')){
								$secondary_button_target = __('_blank','mularx');
							}else{
								$secondary_button_target =__('_self','mularx');;
							}?>
							<a href="<?php echo esc_url($secondary_button_link);?>" class="secondary-buttons" target="<?php echo esc_attr($secondary_button_target);?>"><?php echo esc_html(get_theme_mod('header_secondary_button_label'));?> </a>
						<?php }?>
					</div>
					<?php if(get_theme_mod('header_social_icons_status')==true){
						get_template_part( 'template-parts/partials/social-medias'); 
					}?>
				</div><!--end of icons -->
	<?php }
}
if(!function_exists('mularx_main_header')){
	function mularx_main_header(){
		get_template_part( 'template-parts/partials/sections/header/header-layout');
	}
}

if(!function_exists('mularx_header_promotion_bar')){
	function mularx_header_promotion_bar(){
		if(get_theme_mod('header_promotion_bar_status')==true){?>
			<?php if(get_theme_mod('header_promotion_bar_all_page_status') == true){ ?>
				<div class="wrapper header-promotion-bar">
					<div class="container">
						<div class="promotion-conetnt">
							<?php echo wp_kses_post(get_theme_mod('header_promotion_bar_text')); ?>
						</div>
					</div>
				</div>
			<?php } else{
				if ( is_front_page() || is_home() ) {?>
					<div class="wrapper header-promotion-bar">
						<div class="container">
							<div class="promotion-conetnt">
								<?php echo wp_kses_post(get_theme_mod('header_promotion_bar_text')); ?>
							</div>
						</div>
					</div>
				<?php }
			} 
	 	}
	}
}

if(!function_exists('footer_column_content')){
	function footer_column_content(){
		if(mularx_set_to_premium()){
			$footer_layout = get_theme_mod('mularx_footer_layout','footer-layout-1');
			$footer_column_border_style = get_theme_mod('footer_column_box_border','footer-colum-border-right');
		}else{
			$footer_layout='footer-layout-1';
			$footer_column_border_style='footer-colum-border-right';
		}
		if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ){
			if($footer_layout=='footer-layout-2'){?>
				<div class="wrapper footer-section">
					<div class="container">
						<div class="col-md-6 large-col">
							<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
							    <div class="mularx-footer-column">
							        <?php dynamic_sidebar( 'footer-1' ); ?>
							    </div>
							<?php } ?>
						</div>
						<div class="col-md-6 footer-wiget-list">
							<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
							    <div class="mularx-footer-column">
							        <?php dynamic_sidebar( 'footer-2' ); ?>
							    </div>
							<?php } ?>
							<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
							    <div class="mularx-footer-column">
							        <?php dynamic_sidebar( 'footer-3' ); ?>
							    </div>
							<?php } ?>
							<?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
							    <div class="mularx-footer-column">
							        <?php dynamic_sidebar( 'footer-4' ); ?>
							    </div>
							<?php } ?>
						</div>
					</div>
				</div>
				 
			<?php }else{?>

			<div class="wrapper footer-section">
			<div class="container footer-wiget-list <?php echo esc_attr($footer_column_border_style);?>">
				<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
				    <div class="mularx-footer-column">
				        <?php dynamic_sidebar( 'footer-1' ); ?>
				    </div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
				    <div class="mularx-footer-column">
				        <?php dynamic_sidebar( 'footer-2' ); ?>
				    </div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
				    <div class="mularx-footer-column">
				        <?php dynamic_sidebar( 'footer-3' ); ?>
				    </div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
				    <div class="mularx-footer-column">
				        <?php dynamic_sidebar( 'footer-4' ); ?>
				    </div>
				<?php } ?>
			</div>
		</div>
		<?php }
		}
	}
}

if(!function_exists('mularx_breadcrumbs')){
	function mularx_breadcrumbs(){
		if(mularx_set_to_premium() && get_theme_mod('enable_breadcrumbs_homepage')==true){?>
			<div class="wrapper breadcrumbs-wrapper">
				<div class="container">
					<?php if(get_theme_mod('enable_sub_header_title','true')==true){?>
						<h2 class="page-header-title">
							<?php 
								if(is_search()){
									$walker_charity_title= __('Search', 'mularx');
								}elseif(is_404()){
									$walker_charity_title = __('404', 'mularx');
								}elseif(is_archive()){
									$walker_charity_title = the_archive_title();
								}elseif(is_home() || is_front_page() ){
									$walker_charity_title = __('Home','mularx');
								}else{
									$walker_charity_title = get_the_title();
								}?>
								<?php echo $walker_charity_title; ?>
										
						</h2>
					<?php 
					}
					if(get_theme_mod('enable_sub_header_breadcrumbs','true')==true){
						if ( function_exists('yoast_breadcrumb') && get_theme_mod('enable_yoast_breadcrumbs')==true ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}else{
							breadcrumb_trail();
						}
					
					}?>


				</div>
			</div>
		<?php }else{
			if ( !is_front_page() ) {?>
				<div class="wrapper breadcrumbs-wrapper">
					<div class="container">
						<?php if(get_theme_mod('enable_sub_header_title','true')==true){?>
							<h2 class="page-header-title">
							<?php 
								if(is_search()){
									$walker_charity_title= __('Search', 'mularx');
								}elseif(is_404()){
									$walker_charity_title = __('404', 'mularx');
								}elseif(is_archive()){
									$walker_charity_title = the_archive_title();
								}elseif(is_home() || is_front_page() ){
									$walker_charity_title = __('Home','mularx');
								}else{
									$walker_charity_title = get_the_title();
								}?>
								<?php echo $walker_charity_title; ?>
										
						</h2>
					<?php 
					}
					if(get_theme_mod('enable_sub_header_breadcrumbs','true')==true){
						if(mularx_set_to_premium()){
							if ( function_exists('yoast_breadcrumb') && get_theme_mod('enable_yoast_breadcrumbs')==true ) {
							  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
							}else{
								breadcrumb_trail();
							
							}
						}else{
							breadcrumb_trail();
						}
					}?>
					</div>
				</div>
			<?php }
		}
	}
}
if(! function_exists('mularx_scroll_top')):
	function mularx_scroll_top(){
		if(get_theme_mod('enable_scroll_top_icon','true')==true){
		$selected_top_icon = get_theme_mod('mularx_footer_scroll_top_icon','top-icon-1');
		 ?>
			<a href="#" class="mularx-top">
				<?php if($selected_top_icon=='top-icon-4'){?>
					<i class="fa-solid fa-caret-up"></i>
				<?php } elseif($selected_top_icon=='top-icon-3'){?>
					 <i class="fa-solid fa-angles-up"></i>
				<?php } elseif($selected_top_icon=='top-icon-2'){?>
					<i class="fa-solid fa-angle-up"></i>
				<?php } else{?>
					<i class="fa-solid fa-arrow-up-long"></i>
				<?php } ?>
			</a>
	<?php }
	}
endif;

if( !function_exists('mularx_pagination')):
	function mularx_pagination($pages = '', $range = 2){  
		$showitem = ($range * 2)+1;  
		$mularx_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		if(empty($mularx_paged)) $mularx_paged = 1;
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
			 $pages = 1;
			}
		}   

	     if(1 != $pages){
	         echo "<div class='mularx-pagination'>";
	         if($mularx_paged > 2 && $mularx_paged > $range+1 && $showitem < $pages) echo "<a class='first' href='".get_pagenum_link(1)."'>".esc_html('First','mularx')."</a>";
	         if($mularx_paged > 1 && $showitem < $pages) echo "<a class='prev' href='".get_pagenum_link($mularx_paged - 1)."'><i class='fas fa-arrow-left'></i></a>";

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $mularx_paged+$range+1 || $i <= $mularx_paged-$range-1) || $pages <= $showitem ))
	             {
	                 echo ($mularx_paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
	             }
	         }

	         if ($mularx_paged < $pages && $showitem < $pages) echo "<a class='next' href='".get_pagenum_link($mularx_paged + 1)."'><i class='fas fa-arrow-right'></i></a>";  
	         if ($mularx_paged < $pages-1 &&  $mularx_paged+$range-1 < $pages && $showitem < $pages) echo "<a class='last' href='".get_pagenum_link($pages)."'>". esc_html('Last','mularx') ."</a>";
	         echo "</div>\n";
	     }
	}
endif;

if(!function_exists('mularx_paginate')){
	function mularx_paginate(){
		if(mularx_set_to_premium()){
			$current_paginate_style = get_theme_mod('mularx_pagination_style','mularx-default-style');
			if($current_paginate_style=='mularx-numeric-style'){
				mularx_pagination();
			}else{
				echo '<div class="default-pagiantion">';
					the_posts_navigation();
				echo '</div>';
			}

		}else{
			echo '<div class="default-pagiantion">';
				the_posts_navigation();
			echo '</div>';
		}
	}
}

if(!function_exists('mularx_footer_bottom_bar')){
	function mularx_footer_bottom_bar(){
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
					mularx_footer_copyright();
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
					<?php mularx_footer_copyright(); ?>
				</div><!--end of container -->
			</div><!--end of wrapper -->

		<?php }

	}
}