<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */
get_header();
$selected_sidebar_layout = get_theme_mod('mularx_blog_layout','blog-right-sidebar');
if($selected_sidebar_layout=='blog-left-sidebar'){
	$main_content_class='col-md-8';
	$main_content_sub_class='left-sidebar-template';
}elseif($selected_sidebar_layout=='blog-no-sidebar'){
	$main_content_class='col-md-12';
	$main_content_sub_class='full-width';
}else{
	$main_content_class='col-md-8';
	$main_content_sub_class='right-sidebar-template';
}

$selected_blog_layout = get_theme_mod('mularx_blog_view_layout','blog-grid-view');
if($selected_blog_layout=='blog-full-view'){
	$mularx_post_view = 'blog-full-view';
}elseif($selected_blog_layout=='blog-list-view'){
	$mularx_post_view = 'blog-list-view';
}else{
	$mularx_post_view = 'blog-grid-view';
}
?>
<div class="wrapper inner-wrapper">
	<div class="container">
		<?php if($selected_sidebar_layout=='blog-left-sidebar'){ ?>
			<div class="col-md-4 sidebar-block">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($main_content_class) .' '.esc_attr($main_content_sub_class); ?>">
			
				<?php if ( have_posts() ) : ?>
					<div class="mularx-blogs-list <?php echo esc_attr($mularx_post_view);?>">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					
					echo '</div>';
					
					mularx_paginate();
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
	
	</main><!-- #main -->
		<?php if($selected_sidebar_layout=='blog-right-sidebar'){ ?>
			<div class="col-md-4 sidebar-block">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php get_footer();