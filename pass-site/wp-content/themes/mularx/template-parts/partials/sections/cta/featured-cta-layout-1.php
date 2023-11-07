<?php
if(get_theme_mod('enable_featured_cta_section')==true){
	$mularx_featured_cta_1 = get_theme_mod('featured_cta_heading_1');
    $mularx_featured_cta_2 = get_theme_mod('featured_cta_heading_2');
    $mularx_featured_cta_3 = get_theme_mod('featured_cta_heading_3');
    $mularx_featured_cta_4 = get_theme_mod('featured_cta_heading_4');

    $text_align = get_theme_mod('featured_cta_section_text_alignment','featured-cta-section-text-align-center');
    if($text_align=='featured-cta-section-text-align-left'){
        $text_align_class = 'text-align-left';
    }elseif($text_align =='featured-cta-section-text-align-right'){
        $text_align_class = 'text-align-right';
    }else{
        $text_align_class = 'text-align-center';
    }

    $image_icon_position = get_theme_mod('featured_cta_image_icon_position','featured-cta-section-image-align-top');
    if($image_icon_position == 'featured-cta-section-image-align-left'){
        $icon_alignment_class = 'icon-align-left';
    }else{
         $icon_alignment_class = 'icon-align-top';
    }
    
    $featured_cta_button = get_theme_mod('featured_cta_button_label');
    $featured_cta_button_link = get_theme_mod('featured_cta_button_link');
    if(empty($featured_cta_button_link)){
        $featured_cta_button_link='#';
    }
    $featured_cta_button_target = get_theme_mod('featured_cta_button_target');
    if($featured_cta_button_target==true){
        $featured_cta_button_target='_blank';
    }else{
         $featured_cta_button_target='_self';
    }

    $mularx_featured_cta_items = array($mularx_featured_cta_1,$mularx_featured_cta_2,$mularx_featured_cta_3,$mularx_featured_cta_4);
    $mularx_featured_cta_items_array_filter = array_filter($mularx_featured_cta_items);
    $mularx_featured_cta_total_items = sizeof($mularx_featured_cta_items_array_filter);
    if($mularx_featured_cta_total_items > 0){
?>
<div class="wrapper featured-cta-wrapper section-animate <?php echo esc_attr($icon_alignment_class);?>">
	<div class="container">
         <div class="col-md-12 section-header <?php echo esc_attr($text_align_class);?>">
            <?php 
            if(get_theme_mod('featured_cta_section_text')){

                echo '<h2 class="section-heading">'. wp_kses_post(get_theme_mod('featured_cta_section_text')).'</h2>';
            }


             if(get_theme_mod('featured_cta_section_desc')){
                echo '<p class="section-info">'. wp_kses_post(get_theme_mod('featured_cta_section_desc')).'</p>';
            }
            ?>
            
        </div>
		<div class="featured-ctas-holder">
			<?php
			for($i= 1; $i < $mularx_featured_cta_total_items+1 ; $i++){
            	$count=1;
                $image[] = get_theme_mod( 'featured_cta_box_image_'.$i);
                
                $titles[] = get_theme_mod( 'featured_cta_heading_'.$i);
                $content[] = get_theme_mod( 'featured_cta_text_'.$i);
                $buttonLabel[] = get_theme_mod( 'featured_cta_button_label_'.$i);
                $linkUrl[] = get_theme_mod( 'featured_cta_button_link_'.$i);
                $linkTarget[] = get_theme_mod( 'featured_cta_button_target_'.$i);
                $results = array_map( null, $image, $titles, $content, $buttonLabel, $linkUrl, $linkTarget );
            }
             foreach ($results as $result){
	            if(isset($result[4])){
	            	$itemurl = esc_html($result[4]);
	            }else{
	            	$itemurl = '#';
	            }
	            if($result[5]==true){
                    $item_link_target='_blank';
                }else{
                    $item_link_target='_self';
                }?>
                <div class="featured-cta-box <?php echo esc_attr($text_align_class);?>">
                    <span class="featured-cta-image">
                	   <img src="<?php echo esc_url($result[0]);?>" />
                    </span>
                    <span class="featured-cta-content">
                      	<h4 class="title"><?php echo esc_html($result[1]); ?></h4>
    					<p><?php echo wp_kses_post($result[2]);?></p> 
                        <?php if(!empty($result[3])){?>
        					<a  target="<?php echo esc_attr($item_link_target);?>" href="<?php echo esc_url($itemurl); ?>" class="mularx-button featured-cta-more">
        						<?php echo esc_html($result[3]); ?>
        					</a>
                    </span>
                    <?php } ?>
               </div>


	    <?php  } ?>
		</div>
	</div>
</div>
<?php }
}