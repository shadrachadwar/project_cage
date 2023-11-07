<?php
if(get_theme_mod('enable_cta_section')==true){
	$cta_title= get_theme_mod('cta_section_heading');
	$cta_info = get_theme_mod('cta_section_text');
	$cta_button = get_theme_mod('cta_button_label');
	$cta_button_link = get_theme_mod('cta_button_link');
	$cta_button_target = get_theme_mod('cta_button_target');

	?>
	<div class="wrapper section-animate discount-offer-wrapper">
		<div class="container">
			<div class="offer-holder">
				<div class="offer-content">
					<div class="col-md-12">
						<?php if(!empty($cta_title ) ){
							echo '<h2 class="section-heading">'.wp_kses_post($cta_title).'</h2>';
						}
						if(!empty($cta_info ) ){
							echo '<p class="section-info">'.wp_kses_post($cta_info).'</p>';
						}
						?>
						<?php 
						if(!empty($cta_button)){
						?>
							<a href="<?php echo esc_url($cta_button_link);?>" target="<?php echo esc_attr($cta_button_target);?>" class="mularx-button">
								<?php echo esc_html($cta_button); ?> <i class="fa-solid fa-arrow-right-long"></i>
							</a>
						<?php } ?>
					</div>
					
				</div>

			</div>
		</div>
	</div>
<?php }