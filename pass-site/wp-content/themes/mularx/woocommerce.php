<?php
/**
 * The template for displaying all woocommerce content
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mularx
 */

get_header();
   if(is_archive()){
   		$select_shop_sidebar = get_theme_mod('mularx_wooproduct_layout','woorpoduct-right-sidebar');
   	if( mularx_set_to_premium() ){
	   	if($select_shop_sidebar=='woorpoduct-left-sidebar'){
	   		$content_class= 'col-md-8';
	   		$content_sub_class = 'left-sidebar-template';
	   	}elseif($select_shop_sidebar=='woorpoduct-right-sidebar'){
	   		$content_class= 'col-md-8';
	   		$content_sub_class = 'right-sidebar-template';
	   	}else{
	   		$content_class= 'col-md-12';
	   		$content_sub_class = 'full-width-template';
	   	}
	   	$shop_text_alignment = get_theme_mod('product_shop_text_alignment','product-text-align-center');
	   	if($shop_text_alignment=='product-text-align-left'){
	   		$shop_text_alignment='product-text-left';
	   	}elseif($shop_text_alignment=='product-text-align-right'){
	   		$shop_text_alignment='product-text-right';
	   	}else{
	   		$shop_text_alignment='product-text-center';
	   	}
	   	$add_to_cart_class ='';
	   	if(get_theme_mod('enable_archive_add_to_cart_button')!=true){
	   		$add_to_cart_class ='cart-disabled';
	   	}
	}else{
		$shop_text_alignment='product-text-center';
		$add_to_cart_class ='';
		$content_class= 'col-md-8';
	   	$content_sub_class = 'right-sidebar-template';
	}
   	?>
		<div class="wrapper inner-wrapper <?php echo esc_attr($add_to_cart_class);?>">
			<div class="container">
				<?php if($select_shop_sidebar=='woorpoduct-left-sidebar'){?>
					<div class="col-md-4 sidebar-block ">
						<?php 
						if(get_theme_mod('enable_archive_product_sidebar')==true && mularx_set_to_premium() ){
							dynamic_sidebar( 'shop-sidebar' );
						}else{
							get_sidebar();
						}
						 ?>
					</div>
				<?php } ?>
				<main id="primary" class="site-main <?php echo esc_attr($content_class) .' '. esc_attr($content_sub_class) .' '. esc_attr($shop_text_alignment);?>">
					<?php woocommerce_content(); ?>
				</main><!-- #main -->
				<?php if($select_shop_sidebar=='woorpoduct-right-sidebar'){?>
					<div class="col-md-4 sidebar-block ">
						<?php 
						if(get_theme_mod('enable_archive_product_sidebar')==true && mularx_set_to_premium() ){
							dynamic_sidebar( 'shop-sidebar' );
						}else{
							get_sidebar();
						}
						 ?>
					</div>
				<?php } ?>
			</div>
		</div>
<?php } else{
	$select_product_sidebar = get_theme_mod('mularx_single_wooproduct_layout','woorpoduct-right-sidebar');
   	if($select_product_sidebar=='woorpoduct-left-sidebar'){
   		$single_content_class= 'col-md-8';
   		$single_content_sub_class = 'left-sidebar-template';
   	}elseif($select_product_sidebar=='woorpoduct-right-sidebar'){
   		$single_content_class= 'col-md-8';
   		$single_content_sub_class = 'right-sidebar-template';
   	}else{
   		$single_content_class= 'col-md-12';
   		$single_content_sub_class = 'full-width-template';
   	}

	?>

<div class="wrapper inner-wrapper">
	<div class="container">
		<?php if($select_product_sidebar=='woorpoduct-left-sidebar'){?>
			<div class="col-md-4 sidebar-block ">
				<?php 
				if(get_theme_mod('enable_single_product_sidebar')==true && mularx_set_to_premium()){
					dynamic_sidebar( 'single-product-sidebar' );
				}else{
					get_sidebar();
				}
				 ?>
			</div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($single_content_class) .' '. esc_attr($single_content_sub_class);?>">
			<?php woocommerce_content(); ?>
		</main><!-- #main -->
		<?php if($select_product_sidebar=='woorpoduct-right-sidebar'){?>
			<div class="col-md-4 sidebar-block ">
				<?php 
				if(get_theme_mod('enable_single_product_sidebar')==true && mularx_set_to_premium() ){
					dynamic_sidebar( 'single-product-sidebar' );
				}else{
					get_sidebar();
				}
				 ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
<?php get_footer();
