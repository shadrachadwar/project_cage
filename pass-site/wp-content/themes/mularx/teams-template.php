<?php
/**
 *  Template Name: Team List Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mularx
 */


get_header();
if(mularx_set_to_premium() ){ ?>
<div class="wrapper inner-wrapper teams-template">
	<div class="container">
		<div class="col-md-12 text-center team-archive-header">
			<h2 class="page-header"><?php the_title();?></h2>
			<p class="page-content"><?php the_content();?></p>
		</div>
	</div>
<div class="container team-list">
<?php $mularx_query = new WP_Query( array( 'post_type' => 'wcr_teams', 'order'=> 'DESC', 'posts_per_page' => -1) );
    while ($mularx_query->have_posts()) : $mularx_query->the_post();?>

   <div class="team-member">
    	<div class="walkerwp-teams-box text-center">
	  		<?php 
	    	if ( has_post_thumbnail() ) {?>
				<div class="team-image"><a href="<?php the_permalink();?>" class=""><?php the_post_thumbnail(); ?></a></div>
			<?php	} ?>
			
			
			<div class="content-part">
				<h3 class="team-name"><a href="<?php the_permalink();?>" class=""><?php  the_title(); ?></a></h3>
				<?php echo '<h5 class="team-position">'. esc_html(get_post_meta( $post->ID, 'walker_team_position', true )) .'</h5>';?>
				
				<span class="team-desc"><?php echo mularx_excerpt('20');?></span>
				<div class="team-social-media"><?php 
				$member_facebook_link = get_post_meta( $post->ID, 'walker_team_facebook', true );
				if($member_facebook_link){
				 	echo '<a href="' . esc_url($member_facebook_link) . '" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>';
				}
				$member_twitter_link = get_post_meta( $post->ID, 'walker_team_twitter', true );
				if($member_twitter_link){
				 	echo '<a href="' . esc_url($member_twitter_link) . '" target="_blank"><i class="fa-brands fa-twitter"></i></a>';
				}
				$member_twitter_instagram = get_post_meta( $post->ID, 'walker_team_instagram', true );
				if($member_twitter_instagram){
				 	echo '<a href="' . esc_url($member_twitter_instagram) . '" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
				}
				$member_twitter_linkedin = get_post_meta( $post->ID, 'walker_team_linkedin', true );
				if($member_twitter_linkedin){
				 	echo '<a href="' . esc_url($member_twitter_linkedin) . '" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>';
				}
				$member_twitter_github = get_post_meta( $post->ID, 'walker_team_github', true );
				if($member_twitter_github){
				 	echo '<a href="' . esc_url($member_twitter_github) . '" target="_blank"><i class="fa-brands fa-github"></i></a>';
				}
				?>
					
				</div>
		</div>
	</div>
	</div>
	
<?php endwhile; 
wp_reset_postdata(); ?>
</div>
</div>

<?php
}
 get_footer();