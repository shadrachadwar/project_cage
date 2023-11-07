<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */
$post_excerpt_lenght= get_theme_mod('mularx_excerpt_length','30');
$readmore_label = get_theme_mod('mularx_excerpt_more');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) {?>
		<div class="mularx-post-thumbnail">
			<?php mularx_post_thumbnail(); 
			mularx_archive_estimate_reading_time();?>
		</div>
	<?php } ?>
	<div class="post-content">
		<?php mularx_custom_category(); ?>
		<header class="entry-header">
			<?php
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					mularx_custom_post_author();
					mularx_custom_post_date();
					mularx_custom_post_tag();
					mularx_post_comments();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		

		<div class="entry-content">
			<div class="post-excerpt">
				<?php echo wp_kses_post(mularx_excerpt($post_excerpt_lenght));?>
			</div>
			<a href="<?php the_permalink();?>" class="post-more"><?php 
			if(!empty($readmore_label)){
				echo esc_html($readmore_label);
			}else{
				echo __('Read More','mularx');
			}
			
			?></a>
		</div><!-- .entry-content -->
	</div><!--end of post conetnt -->

	<footer class="entry-footer">
		<?php mularx_edit_post_link(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
