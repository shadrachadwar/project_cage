<?php
$section_heading = get_theme_mod('latest_product_section_heading');
$section_info = get_theme_mod('latest_product_description_text');
$section_layout = get_theme_mod('latest_product_section_layout');
$excerpt_status = get_theme_mod('enable_latest_product_excerpt');
$cart_button_status = get_theme_mod('enable_latest_product_cart','true');
$sale_badge_status = get_theme_mod('enable_latest_product_onsale','true');
$price_status = get_theme_mod('enable_latest_product_price','true');
$rating_status = get_theme_mod('enable_latest_product_star','true');
$readmore_status = get_theme_mod('enable_latest_product_readmore');
$readmore_label = get_theme_mod('latest_product_section_readmore_label');
if(mularx_set_to_premium() ){
	$post_per_page = get_theme_mod('latest_product_post_per_page','4');
}else{
	$post_per_page = '3';
}

$text_align = get_theme_mod('latest_product_section_text_align','latest-product-text-align-center');
$grid_layout_col = get_theme_mod('latest_product_section_grid_column','mularx-product-col-4');
$cart_button_style = get_theme_mod('latest_product_cart_position_style','latest-product-cart-style-normal');
if($text_align=='latest-product-text-align-left'){
	$text_align_class = 'text-align-left';
}elseif($text_align =='latest-product-text-align-right'){
	$text_align_class = 'text-align-right';
}else{
	$text_align_class = 'text-align-center';
}

$latest_product_button = get_theme_mod('latest_product_button_label');
$latest_product_button_link = get_theme_mod('latest_product_button_link');
if(empty($latest_product_button_link)){
    $latest_product_button_link='#';
}
$latest_product_button_target = get_theme_mod('latest_product_button_target');
if($latest_product_button_target== true){
    $latest_product_button_target='_blank';
}else{
	 $latest_product_button_target='_self';
}
if(get_theme_mod('enable_latest_product_section')==true){
	?>
	<div class="wrapper section-animate latest-product-wrapper <?php echo esc_attr($text_align_class).' '. esc_attr($section_layout);?>">
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
			
			<?php if($section_layout=='latest-product-layout-carousel'){
				$mularx_query = new WP_Query( array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => $post_per_page) );
				$mularx_product_carousel_col = get_theme_mod('latest_product_section_carousel_column','mularx-product-col-4');
				if($mularx_product_carousel_col =='mularx-product-col-6'){
					$mularx_product_carousel_class = 'latest-product-carousel-6';
				}elseif($mularx_product_carousel_col =='mularx-product-col-5'){
					$mularx_product_carousel_class = 'latest-product-carousel-5';
				}elseif($mularx_product_carousel_col =='mularx-product-col-3'){
					$mularx_product_carousel_class = 'latest-product-carousel-3';
				}else{
					$mularx_product_carousel_class = 'latest-product-carousel-4';
				}
				?>
				<div class="product-navigation">
					<span class="product-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></span>
					<span class="product-slide-next"><i class="fa-solid fa-arrow-right-long"></i></span>
				</div>
				<div class="products-holder swiper-container <?php echo esc_attr($mularx_product_carousel_class);?>">
					
					<div class="swiper-wrapper">
					<?php
						if ( $mularx_query->have_posts() ) :
							while( $mularx_query->have_posts() ):$mularx_query->the_post();
								$product_id=get_the_ID();
								$product=wc_get_product($product_id);
								?>
								<div class="swiper-slide">
									<div class="product-item">
										<?php if ( has_post_thumbnail() ) {?>
											<div class="featured-image">
												<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"
						                           title="<?php echo esc_attr( $product->get_title() ); ?>">
												    <?php the_post_thumbnail();?>
												</a>
												<?php if ( $product->is_on_sale() && $sale_badge_status== true){
										            echo '<span class="onsale">'.__('Sale','domestic-services').'</span>';
										        }?>
										       <div class="overlay-buttons">
											        
													<a href="<?php the_permalink();?>" class="product-more-icon">
														<i class="fa-solid fa-eye"></i>
													</a>
													<?php 
														woocommerce_template_loop_add_to_cart( $mularx_query->post, $product );
													?>

												</div>

										    </div>
										<?php }?>
										<div class="product-content">
											<a href="<?php the_permalink();?>" class="product-title">
												<?php echo '<h4>'; the_title(); echo '</h4>';?>
											</a>

											<?php if($price_status==true){ ?>
												<div class="product-price">
													<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
														<?php  wc_get_template( 'loop/price.php' ); ?>
													</span>
												</div>
											<?php }

											if($rating_status==true){ ?>
												<div class="product-rating">
												     <?php  woocommerce_template_loop_rating( $mularx_query->post, $product );	?>
												</div>
											<?php }?>
											<?php if($excerpt_status==true){ ?>
												<div class="product-excerpt">
												     <?php  the_excerpt();	?>
												</div>
											<?php }?>
											<div class="products-button-group">
												<?php if($cart_button_status==true){
													woocommerce_template_loop_add_to_cart( $mularx_query->post, $product );
												} ?>
												<?php if($readmore_status==true){?>
													<a href="<?php the_permalink();?>" class="mularx-button product-more">
														<?php 
															if(!empty($readmore_label)){
																echo esc_html($readmore_label);
															}else{
																echo __('Read More','domestic-services');
															}
														?>
													</a>
												<?php } ?>
											</div>

											
										</div>
									</div>
								</div>
						
						<?php endwhile;
						endif;
						wp_reset_postdata();
					?>
				</div>
				<div class="products-pagination"></div>
			</div>
				
			<?php }else{?>
			<div class="products-holder <?php echo esc_attr($grid_layout_col);?>">
				<?php
				$mularx_query = new WP_Query( array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => $post_per_page) );
					if ( $mularx_query->have_posts() ) :
						while( $mularx_query->have_posts() ):$mularx_query->the_post();
							$product_id=get_the_ID();
							$product=wc_get_product($product_id);
							?>
							<div class="product-item">
								<?php if ( has_post_thumbnail() ) {?>
									<div class="featured-image">
										<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"
				                           title="<?php echo esc_attr( $product->get_title() ); ?>">
										    <?php the_post_thumbnail();?>
										</a>
										<?php if ( $product->is_on_sale() && $sale_badge_status== true){
								            echo '<span class="onsale">'.__('Sale','domestic-services').'</span>';
								        }?>
								        <div class="overlay-buttons">
								        	<a href="<?php the_permalink();?>" class="product-more-icon">
												<i class="fa-solid fa-eye"></i>
											</a>
									        <?php 
												woocommerce_template_loop_add_to_cart( $mularx_query->post, $product );
											?>

										</div>

								    </div>
								<?php }?>
								<div class="product-content">
									<a href="<?php the_permalink();?>" class="product-title">
										<?php echo '<h4>'; the_title(); echo '</h4>';?>
									</a>

									<?php if($price_status==true){ ?>
										<div class="product-price">
											<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
												<?php  wc_get_template( 'loop/price.php' ); ?>
											</span>
										</div>
									<?php }

									if($rating_status==true){ ?>
										<div class="product-rating">
										     <?php  woocommerce_template_loop_rating( $mularx_query->post, $product );	?>
										</div>
									<?php }?>
									<?php if($excerpt_status==true){ ?>
												<div class="product-excerpt">
												     <?php  the_excerpt();	?>
												</div>
											<?php }?>
									<div class="products-button-group">
										<?php if($cart_button_status==true ){
											woocommerce_template_loop_add_to_cart( $mularx_query->post, $product );
										} ?>
										<?php if($readmore_status==true){?>
											<a href="<?php the_permalink();?>" class="mularx-button product-more">
												<?php 
													if(!empty($readmore_label)){
														echo esc_html($readmore_label);
													}else{
														echo __('Read More','domestic-services');
													}
												?>
											</a>
										<?php } ?>
									</div>

								</div>
							</div>
					
					<?php endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		<?php 
		
		} ?>

		<div class="button-group col-md-12">
	
	<?php if(!empty($latest_product_button)){  ?>
                <a href="<?php echo esc_url($latest_product_button_link);?>" target="<?php echo esc_attr($latest_product_button_target);?>" class="visit-store-btn">
                    <?php echo esc_html($latest_product_button); ?> <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            <?php } ?>
	</div>
		</div>
	</div>

<?php }