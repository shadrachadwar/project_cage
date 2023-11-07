<?php if(get_theme_mod('enable_testimonial_section')==true){
	$section_heading = get_theme_mod('testimonial_section_heading');
	$section_info = get_theme_mod('testimonial_section_text');
	$post_per_page = get_theme_mod('testimonial_section_post_per_page','3');
	$selected_testimonial_layout = get_theme_mod('testimonial_section_layout','testimonial-layout-carousel');
	if($selected_testimonial_layout=='testimonial-layout-carousel-style-three'){
		$selected_testimonial_layout ='testimonial-carousel-style-3';
	}elseif($selected_testimonial_layout=='testimonial-layout-carousel-style-two'){
		$selected_testimonial_layout ='testimonial-carousel-style-2';
	}else{
		$selected_testimonial_layout ='mularx-testimonial-slide';
	}
	$testimonial_button = get_theme_mod('all_testimonial_button_label');
    $testimonial_button_link = get_theme_mod('all_testimonial_button_link');
    if(empty($testimonial_button_link)){
        $testimonial_button_link='#';
    }
    $testimonial_button_target = get_theme_mod('all_testimonial_button_target');
    if($testimonial_button_target==true){
        $testimonial_button_target='_blank';
    }else{
         $testimonial_button_target='_self';
    }
	?>
	<div class="wrapper section-animate testimonial-wrapper text-align-center <?php echo esc_attr($selected_testimonial_layout);?>">
		<div class="container">
			<div class="col-md-12 section-header">
				<?php if(!empty($section_heading ) ){
					echo '<h2 class="section-heading">'.esc_html($section_heading).'</h2>';
				}
				if(!empty($section_info ) ){
					echo '<p class="section-info">'.wp_kses_post($section_info).'</p>';
				}
				?>
			</div>
			<div class="product-navigation">
					<span class="product-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></span>
					<span class="product-slide-next"><i class="fa-solid fa-arrow-right-long"></i></span>
				</div>
				<div class="testimonial-holder  swiper-container <?php echo esc_attr($selected_testimonial_layout); ?>">
					<div class="swiper-wrapper">

						<?php $cozy_query = new WP_Query( array( 'post_type' => 'wcr_testimonials', 'order'=> 'DESC', 'posts_per_page' => $post_per_page) );
							    while ($cozy_query->have_posts()) : $cozy_query->the_post();?>
							    <div class="swiper-slide">
							    	<div class="testimonial-box">
								  		<?php
								  		if($selected_testimonial_layout=='testimonial-carousel-style-2'  ){ ?>
								  			
											<div class="review-message">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote.png" class="testimonial-quote"  />
												<?php the_content();?></div>
								  			<?php if ( has_post_thumbnail() ) {?>
												<div class="testimonial-thumbnail"><?php the_post_thumbnail(); ?></div>
											<?php	} ?>
											<h4 class="reviewer-name"><?php  the_title(); ?></h4>
											<?php echo '<div class="review-meta">';
													if(get_post_meta($post->ID,'walker_client_company', true)){
														echo ' <span class="review-compnay">'. esc_html(get_post_meta($post->ID,'walker_client_company', true)).', </span>';
													}
													if(get_post_meta($post->ID,'walker_client_position', true)){
														echo ' <span class="review-position">'. esc_html(get_post_meta($post->ID,'walker_client_position', true)).'</span>';
													}
												echo '</div>';?>
								  			<?php 
								  		} else {
								  			if ( has_post_thumbnail() ) {?>
												<div class="testimonial-thumbnail"><?php the_post_thumbnail(); ?></div>
											<?php } ?>
											<div class="review-part">
												<p class="review-message"><?php the_content();?></p>
												<h4 class="reviewer-name"><?php  the_title(); ?></h4>
												<?php echo '<div class="review-meta">';
													if(get_post_meta($post->ID,'walker_client_company', true)){
														echo ' <span class="review-compnay">'. esc_html(get_post_meta($post->ID,'walker_client_company', true)).', </span>';
													}
													if(get_post_meta($post->ID,'walker_client_position', true)){
														echo ' <span class="review-position">'. esc_html(get_post_meta($post->ID,'walker_client_position', true)).'</span>';
													}
												echo '</div>';?>				
											</div>
								  			<?php 
								  		} ?>
									</div>
								</div>
							<?php endwhile; 
						wp_reset_postdata(); ?>
					</div>
					<div class="mularx-slide-pagination"></div>
				</div>
		 
			
		</div>
		<div class="container">
			<div class="col-md-12 testimonials-cta-button">
            <?php if(!empty($testimonial_button)){  ?>
                <a href="<?php echo esc_url($testimonial_button_link);?>" target="<?php echo esc_attr($testimonial_button_target);?>" class="testimonial-cta-button">
                    <?php echo esc_html($testimonial_button); ?> <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            <?php } ?>
        </div>
		</div>

	</div>

<?php } ?>