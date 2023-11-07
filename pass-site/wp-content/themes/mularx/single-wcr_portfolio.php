<?php
/**
 * The template for displaying all single Portolios 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mularx
 */

get_header();
?>
<div class="wrapper inner-wrapper">
	<div class="container">
		<main id="primary" class="site-main single-portfolio">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content-single', 'wcr_portfolio' );
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
	</div>
</div>
<?php get_footer();
