<?php
if(get_theme_mod('enable_services_section') == true){
	$section_heading = get_theme_mod('services_section_heading');
	$section_info = get_theme_mod('services_section_description');
	$mularx_service_page = get_theme_mod( 'select_service_page');
	$view_all_button = get_theme_mod('service_all_button_label');

	$view_all_button_link = get_theme_mod('service_all_button_link');
	if(empty($view_all_button_link)){
		$view_all_button_link = '#';
	}
	$view_all_button_link_target= get_theme_mod('service_all_button_target');
	if($view_all_button_link_target=='true'){
		$view_all_button_link_target ='_blank';
	}else{
		$view_all_button_link_target ='_self';
	}
	$text_align = get_theme_mod('service_section_text_align','service-section-text-align-center');
	if($text_align=='service-section-text-align-left'){
		$text_align_class = 'text-align-left';
	}elseif($text_align =='service-section-text-align-right'){
		$text_align_class = 'text-align-right';
	}else{
		$text_align_class = 'text-align-center';
	}
	?>
	<div class="wraper service-wraper service-layou-1 section-animate <?php echo esc_attr($text_align_class);?>">
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
	
				<div class="services-holder">
					<?php
					
					if(!empty($mularx_service_page) && $mularx_service_page != 'None' ){
						$parent_slug = get_page_by_path(sanitize_title($mularx_service_page));
						if ( $parent_slug ) {
							$page_slug = $parent_slug->post_name;
							$parent_page_id = get_page_by_path($page_slug);
							if ( $parent_page_id ) {
								$service_page_id = $parent_page_id->ID;
								$args = array(
									'post_type' => 'page',
									'post_parent' => $service_page_id
								);
							}
						} 
						$mularx_query = new WP_Query( $args );
						if ( $mularx_query->have_posts() ) :
							while ( $mularx_query->have_posts() ) : $mularx_query->the_post();
								echo '<div class="service-box"> <span class="service-content">';
								if ( has_post_thumbnail() ) : ?>
									<span class="service-image">
									    <a class="service-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									        <?php the_post_thumbnail(); ?>

									    </a>
									   
									</span>
								<?php endif;
								the_title( sprintf( '<h3 class="service-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
								echo '<p class="service-excerpt">'.  wp_kses_post(mularx_excerpt(20)) .'</p>'; ?>
								 
									
							
								<?php echo '</div></span>';
							endwhile;
						endif;
						wp_reset_postdata();
					}
					
					?>
				</div>
				<?php if(!empty($view_all_button)){?>
					<div class="button-group">
						<a href="<?php echo esc_url($view_all_button_link);?>" target="<?php echo esc_attr($view_all_button_link_target);?>" class="all-services"><?php echo esc_html($view_all_button);?> <i class="fa-solid fa-arrow-right-long"></i> </a>
					</div>
				<?php } ?>
			</div>
	</div>
	<?php 
} ?>