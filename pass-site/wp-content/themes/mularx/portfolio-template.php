<?php
/**
 *  Template Name: Portfolio List Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package replcia
 */


get_header(); 
if(mularx_set_to_premium() ){ ?>
<div class="wrapper inner-wrapper portafolio-archive">
	<div class="container">
		<div class="col-md-12">
			<h2 class="page-header"><?php the_title();?></h2>
			<p class="page-content"><?php the_content();?></p>
		</div>
	</div>
	<div class="container">
		<div class="col-md-3 portfolio-sidebar">
			<?php echo '<h4>'. __('List by Category:','mularx') .'</h4>'; ?>
			<?php	$portfolio_catargs = array(
						'type'                     => 'wcr_portfolio',
						'child_of'                 => 0,
						'parent'                   => '',
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'exclude'                  => '',
						'include'                  => '',
						'number'                   => '',
						'taxonomy'                 => 'wcr_portfolio_category',
						'pad_counts'               => false 
					);

			$categories = get_categories($portfolio_catargs);
			if($categories){?>
				<ul class="portfolio-categories">
			 <?php 
          		foreach ($categories as $category) {
    				$protfolio_term_url = get_term_link($category);?>
					 	<li>
					 	<a href="<?php echo esc_url($protfolio_term_url);?>"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $category->name;  echo '<span class="item-count">('. $category->count .')</span>'; ?></a></li>
					<?php }
					} ?>
					</ul>
				

		</div>
		<main id="primary" class="site-main col-md-9 porftfolio-grid">

			<?php
			
			$portfolioargs = array( 'post_type' => 'wcr_portfolio', 'posts_per_page' => -1, 'orderby' =>'date','order' => 'DESC' );
			$pager_portfolio_loop = new WP_Query( $portfolioargs );
            while ( $pager_portfolio_loop->have_posts() ) : $pager_portfolio_loop->the_post(); ?>
            	<div class="portfolio-holder">
						<?php if ( has_post_thumbnail() ) {?>
							
					    <?php    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');?>
						        <div class="portfolio-featured-image">
						        	<a href="<?php echo $large_image_url[0];?>"> <?php   the_post_thumbnail(); ?></a>
						        	<a href="<?php the_permalink();?>" class="archive-portfolio-details"><i class="fa fa-external-link" aria-hidden="true"></i></a>
						        </div>
								<?php }?>
									<h3>
									<a href="<?php the_permalink();?>">
										<?php 	the_title(); ?>
									</a>
									</h3>
									<div class="portfolio-description"><?php echo mularx_excerpt('30');?></div>
									<a href="<?php the_permalink();?>" class="mularx-primary-button"><?php echo __('Read More','mularx')?></a>
							</div>
						<?php endwhile;

				mularx_paginate();
			?>

		</main><!-- #main -->
	</div>
</div>
<?php 
}
get_footer();