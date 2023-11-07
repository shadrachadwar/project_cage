<?php if(get_theme_mod('enable_team_section')== true){

$section_heading = get_theme_mod('team_section_heading');
$section_info = get_theme_mod('team_section_description');
if(mularx_set_to_premium() ){
	$post_per_page = get_theme_mod('team_post_per_page','3');
}else{
	$post_per_page = '3';
}
$view_all_button = get_theme_mod('team_all_button_label');
if(empty($view_all_button)){
	$view_all_button= __('Meet All Members','mularx');	
}
$view_all_button_link = get_theme_mod('team_all_button_link');
if(empty($view_all_button_link)){
	$view_all_button_link = '#';
}
$view_all_button_link_target= get_theme_mod('team_all_button_target');
if($view_all_button_link_target=='true'){
	$view_all_button_link_target ='_blank';
}else{
	$view_all_button_link_target ='_self';
}
$text_align = get_theme_mod('team_section_text_align','team-section-text-align-center');
if($text_align=='team-section-text-align-left'){
	$text_align_class = 'text-align-left';
}elseif($text_align =='team-section-text-align-right'){
	$text_align_class = 'text-align-right';
}else{
	$text_align_class = 'text-align-center';
}
?>
<div class="wrapper team-wraper section-animate team-layout-1 <?php echo esc_attr($text_align_class);?>">
	<div class="container">
		<div class="col-md-12 section-header">
				<?php if(!empty($section_heading ) ){
					echo '<h2 class="section-heading">'.esc_html($section_heading).'</h2>';
				}
				if(!empty($section_info ) ){
	              echo '<p class="section-info">'.wp_kses_post($section_info).'</p>';
	            }

				?>

		</div>
	<div class="teams-holder">
<?php
	
	$mularx_query = new WP_Query( array( 'post_type' => 'wcr_teams', 'order'=> 'DESC', 'posts_per_page' => $post_per_page) );
    while ($mularx_query->have_posts()) : $mularx_query->the_post();?>
   
    	<div class="teams-box">
	  		<?php 
	    	if ( has_post_thumbnail() ) {?>
	    		<a href="<?php the_permalink();?>">
					<div class="team-image"><?php the_post_thumbnail(); ?></div>
				</a>
			<?php	} ?>
				
			<div class="content-part">
				<a href="<?php the_permalink();?>">
					<h3 class="team-name"><?php  the_title(); ?></h3>
				</a>
				<?php echo '<h5 class="team-position">'. esc_html(get_post_meta( $post->ID, 'walker_team_position', true )) .'</h5>';?>
				<?php if(get_theme_mod('enable_team_excerpt')==true){?>
					<span class="team-desc"><?php echo  wp_kses_post(mularx_excerpt(20)); ?></span>
				<?php } ?>
				<div class="team-social-media"><?php 
					$member_facebook_link = get_post_meta( $post->ID, 'walker_team_facebook', true );
					if($member_facebook_link){
					 	echo '<a href="' . esc_url($member_facebook_link) . '" target="_blank"> <i class="fa-brands fa-facebook-f"></i></a>';
					}
					$member_twitter_link = get_post_meta( $post->ID, 'walker_team_twitter', true );
					if($member_twitter_link){
					 	echo '<a href="' . esc_url($member_twitter_link) . '" target="_blank"><i class="fa-brands fa-twitter"></i></a>';
					}
					$member_instagram = get_post_meta( $post->ID, 'walker_team_instagram', true );
					if($member_instagram){
					 	echo '<a href="' . esc_url($member_instagram) . '" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
					}
					$member_linkedin = get_post_meta( $post->ID, 'walker_team_linkedin', true );
					if($member_linkedin){
					 	echo '<a href="' . esc_url($member_linkedin) . '" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>';
					}
					$member_github = get_post_meta( $post->ID, 'walker_team_github', true );
					if($member_github){
					 	echo '<a href="' . esc_url($member_github) . '" target="_blank"><i class="fa-brands fa-github"></i></a>';
					}

					?>
				</div>
				
			</div>
	
	</div>
	
<?php endwhile; ?>
	</div>
<?php wp_reset_postdata(); ?>
<div class="button-group col-md-12">
	<a href="<?php echo esc_url($view_all_button_link);?>" target="<?php echo esc_attr($view_all_button_link_target);?>" class="meet-all-teams"><?php echo esc_html($view_all_button);?> <i class="fa-solid fa-arrow-right-long"></i> </a>
	</div>
</div>
</div>
<?php } ?>