<?php  
if(get_theme_mod('about_status') == true){
	$heading_text = get_theme_mod('about_heading_text');
	$mularx_about_page = get_theme_mod( 'about_page');
	$featured_image_status = get_theme_mod('about_featured_image_status','true');
	$title_status = get_theme_mod('about_title_status','true');
	$button_status = get_theme_mod('about_cta_button_status','true');
	$button_label = get_theme_mod('about_readmore_text');
	$text_align = get_theme_mod('about_section_text_align','about-text-align-center');
	if($text_align=='about-text-align-left'){
		$text_align_class = 'text-align-left';
	}elseif($text_align =='about-text-align-right'){
		$text_align_class = 'text-align-right';
	}else{
		$text_align_class = 'text-align-center';
	}
	if(!empty($mularx_about_page) && $mularx_about_page != 'None' ){
		$mular_page_slug = get_page_by_path(sanitize_title($mularx_about_page));
        if ( $mular_page_slug ) {
            $page_slug = $mular_page_slug->post_name;
            $parent_page_id = get_page_by_path($page_slug);
            if ( $parent_page_id ) {
                $about_page_id = $parent_page_id->ID;
                $args = array(
                    'post_type' => 'page',
                    'page_id' =>$about_page_id
                );
            }
        }
				$mularx_query = new WP_Query($args);
				if ( $mularx_query->have_posts() ) :
					while ( $mularx_query->have_posts() ) : $mularx_query->the_post();?>
						<div class="wrapper section-animate about-wrapper <?php echo esc_attr($text_align_class);?>">
							<div class="container">
								
										<div class="text-col col-md-6">
											<div class="about-box">
												<?php if($title_status==true){?>
													<h5 class="page-title"><?php the_title();?></h5>
												<?php } 
												if($heading_text ==true){ ?>
													<h2 class="section-heading"><?php echo esc_html(get_theme_mod('about_heading_text'));?></h2>
												<?php } ?>
												<p class="about-description"><?php the_excerpt();?></p>

												<?php if($button_status=='true'){?>
													<a href="<?php the_permalink();?>" class="mularx-button about-more">
														<?php 
															if(!empty($button_label)){
																echo esc_html($button_label);
															}else{
																echo __('Read More','domestic-services');
															}
														?>
													<i class="fa-solid fa-arrow-right-long"></i> </a>
												<?php } ?>
											</div>
										</div>
										
								</div>	
								<?php 
								if ( has_post_thumbnail() && $featured_image_status==true ){?>
									<div class="col-md-6 img-col">
										<?php  the_post_thumbnail(); ?>
									</div>
										
							<?php }?>

							</div>
					<?php endwhile;
				endif;?>
			
	<?php	}
}