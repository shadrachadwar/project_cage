<?php
/**
 * Template Name: Testimonials Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */

get_header();
?>
<div class="wrapper inner-wrapper archive-list-testimonial">
	<div class="container">
		<main id="primary" class="site-main col-md-12">
			<div class="col-md-4 list-header">
				<h2 class="page-header"><?php the_title();?></h2>
				<p class="page-content"><?php the_content();?></p>
			</div>
			<div class="testimonial-lists col-md-8">
				<?php
				if(mularx_set_to_premium() ){ 
					$mularx_query = new WP_Query( array( 'post_type' => 'wcr_testimonials', 'order'=> 'DESC', 'posts_per_page' => -1 ) );
				}elseif(get_theme_mod('mularx_testimonial_category')){
					$mularx_query = get_theme_mod('mularx_testimonial_category');
					$mularx_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => -1, 'category_name' => $testimonial_cat) );
				}else{
					echo __('Testimonial Not Found!','mularx');
				}
				while ($mularx_query->have_posts()) : $mularx_query->the_post();?>
					 <div class="mularx-testimonial-box">
				  		<?php 
				    	if ( has_post_thumbnail() ) {
				    		$review_class = 'with_thumbnails';?>
							<div class="testimonial-thumbnail"><?php the_post_thumbnail(); ?></div>
						<?php	} else{
							$review_class = 'without_thumbnails';
						}?>
										
						<div class="review-part <?php echo esc_attr($review_class);?>">
							<span class="review-message"><?php the_content();?></span>
							<h4 class="reviewer-name"><?php  the_title(); ?></h4>
							<?php if(mularx_set_to_premium() ){ 
								echo '<div class="review-meta">';
								if(get_post_meta($post->ID,'walker_client_company', true)){
									echo ' <span class="review-compnay">'. esc_html(get_post_meta($post->ID,'walker_client_company', true)).'</span>';
								}
								if(get_post_meta($post->ID,'walker_client_position', true)){
									echo ' <span class="review-position"> - '. esc_html(get_post_meta($post->ID,'walker_client_position', true)).'</span>';
								}
								echo '</div>';
							}

							 ?>						
						</div>
					</div>
			<?php endwhile;?>
		</div>
	</main><!-- #main -->
	</div>
</div>
<?php get_footer();