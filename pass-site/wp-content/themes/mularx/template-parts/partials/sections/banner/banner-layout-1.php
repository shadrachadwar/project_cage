<?php
if(get_theme_mod('enable_banner_section')==true){
	$banner_hero_img = get_theme_mod('banner_hero_image');
	$banner_header = get_theme_mod('banner_heading');
	$banner_text = get_theme_mod('banner_text');
	$banner_button_label = get_theme_mod('banner_button_label');
	$banner_button_link = get_theme_mod('banner_button_link');
	$banner_horizontal_alignment = get_theme_mod('banner_section_text_align','banner-section-text-align-left');
	$banner_vertical_alignment = get_theme_mod('banner_section_vertical_align','banner-section-align-middle');
	if(!empty($banner_button_link)){
		$banner_button_link = $banner_button_link;
	}else{
		$banner_button_link =  '#';
	}
	$banner_button_target = get_theme_mod('banner_button_target');
	if($banner_button_target == true){
		$banner_button_target = '_blank';
	}else{
		$banner_button_target = '_sellf';
	}
	?>
	<div class="wrapper banner-wrapper <?php echo esc_attr($banner_horizontal_alignment).' '.esc_attr($banner_vertical_alignment);?>">
		<div class="container full-width"> 
			<?php if(!empty($banner_hero_img) ){?>
				<div class="hero-image">
					<img class="hero-img" src="<?php echo esc_url($banner_hero_img);?>" />
				</div>
			<?php } ?>
			<div class="banner-content">
				<span class="banner-content-holder">
					<h1 class="banner-heading"><?php  echo wp_kses_post($banner_header); ?></h1>
					<h5 class="banner-text"><?php  echo wp_kses_post($banner_text); ?></h5>
					<?php if(!empty($banner_button_label)){?>
					<a href="<?php echo esc_url($banner_button_link);?>" target="<?php echo esc_attr($banner_button_target);?>" class="banner-button">
						<?php echo esc_html($banner_button_label);?> <i class="fa-solid fa-arrow-right-long"></i>
					</a>
				</span>
			<?php } ?>
			</div><!--end of banner content -->
		</div>
	</div>
<?php  }