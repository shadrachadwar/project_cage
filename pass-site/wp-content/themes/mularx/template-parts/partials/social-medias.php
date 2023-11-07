<?php
/**
 * Social media icons for mularx
 *
 * @package mularx
 * @since version 1.0.0
 */

if ( mularx_set_to_premium() ) {
	$mularx_social_icon_layout = get_theme_mod('mularx_social_media_layout','social-layout-box');
	$mularx_icon_color_option = get_theme_mod('mularx_social_media_colors','social-default-color');
}else{
	$mularx_social_icon_layout='social-layout-box';
	$mularx_icon_color_option='social-default-color';
}
?>
<ul class="mularx-social-icons <?php echo esc_attr($mularx_social_icon_layout) .' '.esc_attr($mularx_icon_color_option);?>">
	<?php if(get_theme_mod('mularx_facebook')){?>
		<li>
			<a class="facebook" href="<?php echo esc_url(get_theme_mod('mularx_facebook'));?>" target="_blank">
				<i class="fa-brands fa-facebook-f"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_twitter')){?>
		<li>
			<a class="twitter" href="<?php echo esc_url(get_theme_mod('mularx_twitter'));?>" target="_blank">
				<i class="fa-brands fa-twitter"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_youtube')){?>
		<li>
			<a class="youtube" href="<?php echo esc_url(get_theme_mod('mularx_youtube'));?>" target="_blank">
				<i class="fa-brands fa-youtube"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_instagram')){?>
		<li>
			<a class="instagram" href="<?php echo esc_url(get_theme_mod('mularx_instagram'));?>" target="_blank">
				<i class="fa-brands fa-instagram"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_linkedin')){?>
		<li>
			<a class="linkedin" href="<?php echo esc_url(get_theme_mod('mularx_linkedin'));?>" target="_blank">
				<i class="fa-brands fa-linkedin-in"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_google')){?>
		<li>
			<a class="google" href="<?php echo esc_url(get_theme_mod('mularx_google'));?>" target="_blank">
				<i class="fa-brands fa-google"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_pinterest')){?>
		<li>
			<a class="pinterest" href="<?php echo esc_url(get_theme_mod('mularx_pinterest'));?>" target="_blank">
				<i class="fa-brands fa-pinterest-p"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_vk')){?>
		<li>
			<a class="vk" href="<?php echo esc_url(get_theme_mod('mularx_vk'));?>" target="_blank">
				<i class="fa-brands fa-vk"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_yelp')){?>
		<li>
			<a class="yelp" href="<?php echo esc_url(get_theme_mod('mularx_yelp'));?>" target="_blank">
				<i class="fa-brands fa-yelp"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_git')){?>
		<li>
			<a class="github" href="<?php echo esc_url(get_theme_mod('mularx_git'));?>" target="_blank">
				<i class="fa-brands fa-github"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_dribbble')){?>
		<li>
			<a class="dribbble" href="<?php echo esc_url(get_theme_mod('mularx_dribbble'));?>" target="_blank">
				<i class="fa-brands fa-dribbble"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('mularx_reddit')){?>
		<li>
			<a class="reddit" href="<?php echo esc_url(get_theme_mod('mularx_reddit'));?>" target="_blank">
				<i class="fa-brands fa-reddit-alien"></i>
			</a>
		</li>
	<?php } ?>
</ul>