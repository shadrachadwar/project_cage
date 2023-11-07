<?php  
if(get_theme_mod('enable_missions_section') == true){
	$heading_text = get_theme_mod('missions_section_heading');
	$mularx_misson_page = get_theme_mod( 'select_mission_page');
	$title_status = get_theme_mod('mission_title_status','true');
	$button_status = get_theme_mod('mission_readmore_status','true');
	$button_label = get_theme_mod('mission_more_button_label');
	
	if(!empty($mularx_misson_page) && $mularx_misson_page != 'None' ){
		$mular_page_slug = get_page_by_path(sanitize_title($mularx_misson_page));
        if ( $mular_page_slug ) {
            $page_slug = $mular_page_slug->post_name;
            $parent_page_id = get_page_by_path($page_slug);
            if ( $parent_page_id ) {
                $mission_page_id = $parent_page_id->ID;
                $args = array(
                    'post_type' => 'page',
                    'page_id' =>$mission_page_id
                );
            }
        }
				$mularx_query = new WP_Query( $args );
				if ( $mularx_query->have_posts() ) :
					while ( $mularx_query->have_posts() ) : $mularx_query->the_post();?>
						<div class="wrapper section-animate missiongoal-wrapper">
							<div class="container">
								<?php 
										if ( has_post_thumbnail()){?>
											<div class="col-md-6 img-col">
												<?php  the_post_thumbnail(); ?>
											</div>
													
										<?php }?>

								<?php if ( has_post_thumbnail() ){
									$about_content_class='col-md-6';
								}else{
									$about_content_class='col-md-12';
								} ?>
									
										<div class="text-col <?php echo esc_attr($about_content_class);?>">
											<div class="mission-box">
												<?php if($title_status==true){?>
													<h5 class="page-title"><?php the_title();?></h5>
												<?php } 
												if($heading_text ==true){ ?>
													<h2 class="section-heading"><?php echo esc_html($heading_text);?></h2>
												<?php } ?>
												<p class="mission-description"><?php the_excerpt();?></p>

												<?php if($button_status=='true'){?>
													<a href="<?php the_permalink();?>" class="mularx-button mission-more">
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

							</div>
					<?php endwhile;
				endif;?>
			
	<?php	}
}