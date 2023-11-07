<?php
$section_heading = get_theme_mod('counter_section_heading');
$section_info = get_theme_mod('counter_section_description');
if(get_theme_mod('enable_counter_section')==true){
	$mularx_counter_1 = get_theme_mod('counter_number_1');
    $mularx_counter_2 = get_theme_mod('counter_number_2');
    $mularx_counter_3 = get_theme_mod('counter_number_3');
    $mularx_counter_4 = get_theme_mod('counter_number_4');

    $text_align = get_theme_mod('counter_section_text_alignment','counter-section-text-align-left');
    if($text_align=='counter-section-text-align-left'){
        $text_align_class = 'text-align-left';
    }elseif($text_align =='counter-section-text-align-right'){
        $text_align_class = 'text-align-right';
    }else{
        $text_align_class = 'text-align-center';
    }
    
    $mularx_counter_items = array($mularx_counter_1,$mularx_counter_2,$mularx_counter_3,$mularx_counter_4);
    $mularx_counter_items_array_filter = array_filter($mularx_counter_items);
    $mularx_counter_total_items = sizeof($mularx_counter_items_array_filter);
    if($mularx_counter_total_items > 0){
?>
<div class="wrapper counter-wrapper counter-layout-2 section-animate <?php echo esc_attr($text_align_class);?>">
	<div class="container">
        <div class="col-md-6 section-header">
                <?php if(!empty($section_heading ) ){
                    echo '<h2 class="section-heading">'.esc_html($section_heading).'</h2>';
                }
                if(!empty($section_info ) ){
                  echo '<p class="section-info">'.wp_kses_post($section_info).'</p>';
                }

                ?>

            </div>
        <div class="col-md-6 counter-section">
    		<div class="counter-holder">
    			<?php
    			for($i= 1; $i < $mularx_counter_total_items+1 ; $i++){
                	$count=1;
                    $counter_number[] = get_theme_mod( 'counter_number_'.$i);
                    $content[] = get_theme_mod( 'counter_text_'.$i);
                    $results = array_map( null, $counter_number, $content );
                }
                 foreach ($results as $result){
                   ?>
                    <div class="counter-box">
                        <span class="counter-content">
                          	<h1 class="counter-number"><div class="count-number"><?php echo esc_html($result[0]); ?></div>+</h1>
        					<p class="counter-text"><?php echo wp_kses_post($result[1]);?></p> 
                        </span>
                   </div>
    	       <?php  
                } 

                }
               ?>
    		</div>
        </div>
	</div>
</div>
<?php 
}