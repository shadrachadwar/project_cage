<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mularx
 */

$selected_footer_layout = get_theme_mod('mularx_footer_layout','footer-layout-1');
?>
<footer id="colophon" class="site-footer <?php echo esc_attr($selected_footer_layout);?>">
	<?php
	 $footer_background_img = get_theme_mod('footer_background_image');
			if($footer_background_img){ ?>
				<img class="footer-overlay-image" src="<?php echo esc_url($footer_background_img);?>" />
		<?php } 
	if($selected_footer_layout=='footer-layout-1' || $selected_footer_layout=='footer-layout-2'){
		footer_column_content();
	}
	mularx_footer_bottom_bar();
	?>
	
</footer><!-- #colophon -->
<?php
mularx_scroll_top();
wp_footer(); ?>

</body>
</html>
