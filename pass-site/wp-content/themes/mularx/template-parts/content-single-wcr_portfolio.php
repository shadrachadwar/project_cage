<?php
/**
 * Template part for displaying portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */
if(mularx_set_to_premium()  ){ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrapper single-portfolio">
		<div class="container">
			<div class="col-md-4">
				<h2 class="portfolio-title"><?php the_title();?></h2>
				<?php
				
					$portfolio_terms = get_the_terms( $post->ID, 'wcr_portfolio_category' );
					if($portfolio_terms){
						echo '<h3 class="cat-level">'.__('Project Category','mularx').'</h3>';
						echo '<ul class="portfolio-categories">';
					    foreach($portfolio_terms as $portfolio_cat) {
					      echo '<li>'. $portfolio_cat->name .'</li>';
					    }
					echo '</ul>';
					}
					
				 ?>
			</div>
			<div class="col-md-8">
				<?php 
				mularx_post_thumbnail();
				the_content();?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
