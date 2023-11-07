<?php
$banner_horizontal_alignment = get_theme_mod('banner_section_text_align','banner-section-text-align-left');
$banner_vertical_alignment = get_theme_mod('banner_section_vertical_align','banner-section-align-middle');
$banners_sldier_source = get_theme_mod('banner_slider_source_type');
$banenr_post_per_page = get_theme_mod('banner_slider_post_per_page','3');

?>
<div class="wrapper banner-wrapper <?php echo esc_attr($banner_horizontal_alignment).' '.esc_attr($banner_vertical_alignment);?>">
	<div class="container full-width"> 
		<div class="swiper-container mularx-slider-6">
			<div class="swiper-wrapper">
			<?php 
			if ( mularx_set_to_premium() ) {
				if($banners_sldier_source=='banner-source-type-post'){
					$slider_category= get_theme_mod('slider_post_category');
					$mularx_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'post_status' => 'publish', 'category_name' => $slider_category, 'post_per_page'=>$banenr_post_per_page) );
				}else{
					$mularx_query = new WP_Query( array( 'post_type' => 'wcr_slider', 'order'=> 'DESC', 'post_per_page'=>$banenr_post_per_page) );
				}
				
			}else{
				$slider_category= get_theme_mod('slider_post_category');
					$mularx_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'post_status' => 'publish', 'category_name' => $slider_category, 'post_per_page'=>$banenr_post_per_page) );
			}


				while ($mularx_query->have_posts()) : $mularx_query->the_post(); ?>
					<div class="swiper-slide">
					<?php 
				    	if( has_post_thumbnail() ) {?>
							<div class="hero-image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>
						<div class="banner-content">
							<span class="banner-content-holder">
								<h1 class="banner-heading"><?php  the_title(); ?></h1>
								<?php if(get_theme_mod('enable_slide_excerpt')==true){?>
									<h5 class="banner-text"><?php  the_excerpt(); ?></h5>
								<?php } ?>
								<div class="banner-buttons">
									<?php
									if($banners_sldier_source=='banner-source-type-custom-posttype'){
										$primary_button_link = get_post_meta( $post->ID, 'walker_slider_primary_button_link', true );
										$primary_button_text = get_post_meta( $post->ID, 'walker_slider_primary_button', true );
										if(!$primary_button_link){
											$primary_button_link ='#';
										}
										if(!empty($primary_button_text)){
											echo '<a class="mularx-button primary-button" href="' . esc_url($primary_button_link) . '">'. esc_html(get_post_meta(get_the_ID(), 'walker_slider_primary_button', true)) .'</a>';
										}
										$secondary_button_link = get_post_meta( $post->ID, 'walker_slider_secondary_button_link', true );
										$secondary_button_text = get_post_meta( $post->ID, 'walker_slider_secondary_button', true );
										if(!$secondary_button_link){
											$secondary_button_link = '#';
										}
										if(!empty($secondary_button_text)){
											echo '<a class="mularx-button secondary-button" href="' . esc_url($secondary_button_link) . '">'. esc_html(get_post_meta(get_the_ID(), 'walker_slider_secondary_button', true)) .'</a>';
										}
									}else{?>
										<a class="mularx-button primary-button" href="<?php the_permalink();?>"><?php echo __('Read More','mularx')?> </a>
									<?php }
									?>
								</div>
							</span>
						</div><!--end of banner content -->
					</div>
				<?php endwhile; ?>

			</div>
			<?php if(get_theme_mod('enable_banner_slide_pagination')==true){?>
				<div class="mularx-slide-pagination"></div>
			<?php } ?>
			
		</div>
	</div>
	<?php if(get_theme_mod('enable_banner_slide_navigation')==true){?>
		<div class="slider-navigation">
			<span class="mularx-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></span>
			<span class="mularx-slide-next"><i class="fa-solid fa-arrow-right-long"></i></span>
		</div>
	<?php } ?>
</div>

			
			
	