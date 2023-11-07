<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mularx
 */

get_header();
$selected_sidebar_layout = get_theme_mod('mularx_single_blog_layout','single-right-sidebar');
if($selected_sidebar_layout=='single-left-sidebar'){
	$main_content_class='col-md-8';
	$main_content_sub_class='left-sidebar-template';
}elseif($selected_sidebar_layout=='single-no-sidebar'){
	$main_content_class='col-md-12';
	$main_content_sub_class='full-width';
}else{
	$main_content_class='col-md-8';
	$main_content_sub_class='right-sidebar-template';
}
?>
<div class="wrapper inner-wrapper">
	<div class="container">
		<?php if($selected_sidebar_layout=='single-left-sidebar'){ ?>
			<div class="col-md-4 sidebar-block">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($main_content_class) .' '.esc_attr($main_content_sub_class); ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php if($selected_sidebar_layout=='single-right-sidebar'){ ?>
			<div class="col-md-4 sidebar-block">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php get_footer();
