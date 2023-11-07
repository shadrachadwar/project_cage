<?php
/**
 * Template part for single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */
$post_excerpt_lenght= get_theme_mod('mularx_excerpt_length','30');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				mularx_custom_post_author();
				mularx_custom_post_date();
				mularx_singlepage_category();
				mularx_post_comments();
				mularx_archive_estimate_reading_time();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( has_post_thumbnail() ) {?>
		<div class="post-thumnail">
			<?php mularx_post_thumbnail(); 
			?>
		</div>
	<?php } ?>
	

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mularx' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mularx' ),
				'after'  => '</div>',
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mularx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php mularx_single_post_navigation();
	if(get_theme_mod('related_post_status','true')){?>
			<div class="related-posts">
				<h3 class="related-post-heading box-title">
					<span>
						<?php 
						if(get_theme_mod('single_post_related_post_title')){
							$related_post_heading = get_theme_mod('single_post_related_post_title');
						}else{
							$related_post_heading = __('Related Posts','mularx');
						}
							echo esc_html($related_post_heading);
							?>
					</span>
				</h3>
		
		
		<div class="related-post-list">
			<?php $current_post_id = get_the_ID();
		    $cat_ids = array();
		    $categories = get_the_category( $current_post_id );

		    if(!empty($categories) && !is_wp_error($categories)):
		        foreach ($categories as $category):
		            array_push($cat_ids, $category->term_id);
		        endforeach;
		    endif;

		    $current_post_type = get_post_type($current_post_id);

		    $query_args = array( 
		        'category__in'   => $cat_ids,
		        'post_type'      => $current_post_type,
		        'post__not_in'    => array($current_post_id),
		        'posts_per_page'  => '3',
		     );

		    $related_cats_post = new WP_Query( $query_args );

		    if($related_cats_post->have_posts()):
		         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
		           <div class="related-posts-box">
		           		<a href="<?php the_permalink(); ?>" class="related-post-feature-image">
		           			<?php mularx_post_thumbnail(); ?>
		           		</a>
		           		<div class="related-post-content">
		                    <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
		                    <div class="meta-data">
		                    	<?php mularx_custom_post_date(); ?>
							</div>
							<div class="related-post-excerpt"> 
		                    	<?php echo esc_html(mularx_excerpt($post_excerpt_lenght)); ?>
		                    </div>
		                    <a href="<?php the_permalink();?>" class="related-post-more"><?php echo __('Read More','mularx');?></a>
		                </div>
		              </div>
		        <?php endwhile;

		        // Restore original Post Data
		        wp_reset_postdata();
		     endif;
		     ?>
		</div>
	 </div>
	<?php }
	if(get_theme_mod('single_author_box_status','true')){?>
		<div class="author-box">
            <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), 215 ); ?>
            <?php if( $avatar ) : ?>
            <div class="author-img">
               <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                   <?php echo $avatar; ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="author-details">
                <h4><?php echo esc_html( get_the_author() ); ?> </h4>
                <p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
                <a class="author-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo __('Learn More','mularx');?> </a>
            </div>
        </div>
    <?php }?>
</article><!-- #post-<?php the_ID(); ?> -->
