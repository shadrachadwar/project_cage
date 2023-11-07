<?php
$section_heading = get_theme_mod('steps_section_heading');
$section_info = get_theme_mod('steps_section_description');
if(get_theme_mod('enable_steps_section')==true){
	$mularx_steps_1 = get_theme_mod('steps_heading_1');
    $mularx_steps_2 = get_theme_mod('steps_heading_2');
    $mularx_steps_3 = get_theme_mod('steps_heading_3');

    $text_align = get_theme_mod('steps_section_text_alignment','steps-section-text-align-left');
    if($text_align=='steps-section-text-align-center'){
        $text_align_class = 'text-align-center';
    }elseif($text_align =='steps-section-text-align-right'){
        $text_align_class = 'text-align-right';
    }else{
        $text_align_class = 'text-align-left';
    }
    
    $mularx_steps_items = array($mularx_steps_1,$mularx_steps_2,$mularx_steps_3);
    $mularx_steps_items_array_filter = array_filter($mularx_steps_items);
    $mularx_steps_total_items = sizeof($mularx_steps_items_array_filter);
    if($mularx_steps_total_items > 0){
?>
<div class="wrapper steps-wrapper section-animate <?php echo esc_attr($text_align_class);?>">
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
		<div class="steps-holder">
			<?php
			for($i= 1; $i < $mularx_steps_total_items+1 ; $i++){
            	$count=1;
                
                $titles[] = get_theme_mod( 'steps_heading_'.$i);
                $content[] = get_theme_mod( 'steps_text_'.$i);
                $results = array_map( null, $titles, $content );
            }
             $count=1;
             foreach ($results as $result){
               ?>
                <div class="steps-box">
                    <span class="steps-content">
                        <h1 class="step-number"><span>0<?php echo esc_html($count);?></span></h1> 
                      	<h4 class="title"><?php echo esc_html($result[0]); ?></h4>
    					<p><?php echo wp_kses_post($result[1]);?></p> 
                    </span>
               </div>
	       <?php  
           $count++;
            } 

            }
           ?>
		</div>
	</div>
</div>
<?php 
}