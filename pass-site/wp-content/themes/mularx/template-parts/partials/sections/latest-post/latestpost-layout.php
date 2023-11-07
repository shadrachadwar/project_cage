<?php
if(get_theme_mod('latest_post_status')==true){
	$section_heading = get_theme_mod('latest_post_heading_text');
	$section_info = get_theme_mod('latest_post_text');
	$post_per_page = get_theme_mod('laetst_post_post_per_page','3');
	$text_align = get_theme_mod('latest_post_section_text_align','latest-post-text-align-left');
	if($text_align=='latest-post-text-align-left'){
		$text_align_class = 'text-align-left';
	}elseif($text_align =='latest-post-text-align-right'){
		$text_align_class = 'text-align-right';
	}else{
		$text_align_class = 'text-align-center';
	}
	$latest_post_source = get_theme_mod('mularx_latest_post_source_type','latest-post');
	$latest_post_category = get_theme_mod('latest_post_category');
	$latest_post_more_button_status = get_theme_mod('latest_post_button_status','true');
	$latest_post_button_label = get_theme_mod('latest_post_readmore_text');
	$post_excerpt_lenght= get_theme_mod('mularx_excerpt_length','30');
	$post_excerpt_status = get_theme_mod('enable_latest_post_excerpt','true');
	$post_category_status = get_theme_mod('enable_latest_post_category','true');
	$post_meta_author = get_theme_mod('enable_latest_post_meta_author','true');
	$post_meta_post_date = get_theme_mod('enable_latest_post_meta_date','true');
	?>
	<div class="wrapper section-animate latest-post-wrapper <?php echo esc_attr($text_align_class);?>">
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
			<div class="latest-posts-holder">
				<?php
				if(!empty($latest_post_category) && $latest_post_source=='select-category'){
				$sticky = get_option( 'sticky_posts' );
				$mularx_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $post_per_page, 'post_status' => 'publish', 'ignore_sticky_posts' => 1,'post__not_in' => $sticky, 'category_name' => $latest_post_category) );
				
				}else{
				$sticky = get_option( 'sticky_posts' );
				$mularx_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $post_per_page, 'post_status' => 'publish', 'ignore_sticky_posts' => 1,'post__not_in' => $sticky) );
				}
				if ( $mularx_query->have_posts() ) :
					while( $mularx_query->have_posts() ):$mularx_query->the_post(); ?>
						<div class="post-box">
							<?php
								if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink();?>" class="post-thumbnail">
								   		<?php  the_post_thumbnail(); ?>
								   	</a>
								<?php }?>
								<div class="post-content">
									<?php if($post_category_status==true){?>
										<?php mularx_custom_category(); ?>
									<?php } ?>
									<h3 class="post-title">
										<a href="<?php the_permalink();?>">
											<?php the_title(); ?>
										</a>
									</h3>
									
										<div class="post-meta">
											<?php 
											if($post_meta_author==true){
												mularx_custom_post_author();
											}
											if($post_meta_post_date==true){
												mularx_custom_post_date();
											}
											?>
										</div><!-- end post meta -->
									
									
									<?php if($post_excerpt_status == true){?>
										<div class="post-excerpt">
											<?php echo wp_kses_post(mularx_excerpt($post_excerpt_lenght));?>
										</div><!-- end post excerpt -->
										<?php } ?>
									
									<?php if($latest_post_more_button_status==true){ ?>
										<a href="<?php the_permalink();?>" class="mularx-button post-more">
											<?php 
											if(!empty($latest_post_button_label)){
												echo esc_html($latest_post_button_label);
											}else{
												echo __('Read More','mularx');
											}
											?> <i class="fa-solid fa-arrow-right-long"></i>
										</a>
									<?php } ?>

								</div><!-- end post content -->
							
						</div><!-- end post-box -->
					<?php endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
<?php }
