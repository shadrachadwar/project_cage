<?php
if(get_theme_mod('enable_brands_logo_section')){
	$section_heading = get_theme_mod('brands_logo_section_heading');
	$section_info = get_theme_mod('brands_logo_section_text');
	$post_per_page = get_theme_mod('brands_section_post_per_page','-1');
	$grayscale_mode_status = get_theme_mod('enable_brands_logo_grayscale');
	$section_layout = get_theme_mod('brands_section_layout','brands-layout-carousel');
	$text_align = get_theme_mod('brands_section_text_align','brands-text-align-center');
	if($text_align=='brands-text-align-left'){
		$text_align_class = 'text-align-left';
	}elseif($text_align =='brands-text-align-right'){
		$text_align_class = 'text-align-right';
	}else{
		$text_align_class = 'text-align-center';
	}
	$image_grascale_class='';
	if($grayscale_mode_status==true){
		$image_grascale_class='grascale-enabled';
	}
	?>
	<div class="wrapper section-animate brands-wrapper <?php echo esc_attr($section_layout) .' '. esc_attr($image_grascale_class) .' '. esc_attr($text_align_class);?>">
		<div class="container">
			<?php if(!empty($section_heading ) || !empty($section_info )){?>
				<div class="col-md-12 section-header <?php echo esc_attr($text_align_class);?>">
					<?php if(!empty($section_heading ) ){
						echo '<h2 class="section-heading">'.wp_kses_post($section_heading).'</h2>';
					}
					if(!empty($section_info ) ){
						echo '<p class="section-info">'.wp_kses_post($section_info).'</p>';
					}
					?>
				</div>
			<?php } ?>
			<?php $cozy_query = new WP_Query( array( 'post_type' => 'wcr_brands', 'order'=> 'DESC', 'posts_per_page' =>$post_per_page) );
			if($section_layout=='brands-layout-carousel'){
				echo '<div class="logo-holder swiper-container brands-logo-carousel">';
					echo '<div class="swiper-wrapper">';
					    while ($cozy_query->have_posts()) : $cozy_query->the_post();?>
					    	<div class="swiper-slide">
							    <div class="logo-box">
								  		<?php 
								    	if ( has_post_thumbnail() ) {?>
											<?php the_post_thumbnail(); ?>
										<?php	} ?>
										
								</div>
							</div>
						<?php endwhile; 
					echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="logo-holder">';
					while ($cozy_query->have_posts()) : $cozy_query->the_post();?>
					    <div class="logo-box">
						  		<?php 
						    	if ( has_post_thumbnail() ) {?>
									<?php the_post_thumbnail(); ?>
								<?php	} ?>
						</div>
					<?php endwhile; 
				echo '</div>';
			}
			wp_reset_postdata(); ?>
		</div>
	</div>
<?php }