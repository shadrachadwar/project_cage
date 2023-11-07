<?php if(get_theme_mod('newsletter_section_status') == true){

$newsletter_img = get_theme_mod('newsletter_section_image');
	?>
	<div class="wrapper section-animate newsletter-wrapper">
		<?php if(!empty($newsletter_img) ){?>
					<img class="newsletter-img" src="<?php echo esc_url($newsletter_img);?>" />
			<?php } ?>
		<div class="container">
			<div class="col-md-6"></div>
			<div class="newsletter-content col-md-6">
				<?php
					echo '<h5 class="section-heading">'. wp_kses_post(get_theme_mod('newsletter_section_heading')).'</h5>';
					echo '<h2 class="sectio-info">'. wp_kses_post(get_theme_mod('newsletter_section_description')).'</h2>';

					?>
					<div class="newsletter-form">
						<?php
						$newsletter_form = get_theme_mod('newsletter_form_shortcode');
						echo do_shortcode( wp_kses_post( $newsletter_form ) );
						?>
					</div>
			</div>
	</div>
	
</div>

<?php } ?>
