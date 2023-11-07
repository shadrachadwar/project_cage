<?php if(get_theme_mod('enable_portfolio_section')==true){
    $section_heading = get_theme_mod('portfolio_section_heading');
    $section_info = get_theme_mod('portfolio_section_description');
    if(mularx_set_to_premium() ){
        $post_per_page = get_theme_mod('portfolio_post_per_page','6');
    }else{
        $post_per_page = '6';
    }
    $view_all_button = get_theme_mod('portfolio_all_button_label');
    if(empty($view_all_button)){
        $view_all_button= __('More Portfolios','mularx'); 
    }
    $view_all_button_link = get_theme_mod('portfolio_all_button_link');
    if(empty($view_all_button_link)){
        $view_all_button_link = '#';
    }
    $view_all_button_link_target= get_theme_mod('portfolio_all_button_target');
    if($view_all_button_link_target=='true'){
        $view_all_button_link_target ='_blank';
    }else{
        $view_all_button_link_target ='_self';
    }
    $text_align = get_theme_mod('portfolio_section_text_align','portfolio-section-text-align-center');
    if($text_align=='portfolio-section-text-align-left'){
        $text_align_class = 'text-align-left';
    }elseif($text_align =='portfolio-section-text-align-right'){
        $text_align_class = 'text-align-right';
    }else{
        $text_align_class = 'text-align-center';
    }
    ?>
    <div class="wrapper section-animate portfolio-wraper <?php echo esc_attr($text_align_class);?>">
        <div class="container">
            <div class="col-md-12 section-header">
                <div class="col-md-6">
                    <?php if(!empty($section_heading ) ){
                        echo '<h2 class="section-heading">'.esc_html($section_heading).'</h2>';
                    }
                    if(!empty($section_info ) ){
                      echo '<p class="section-info">'.wp_kses_post($section_info).'</p>';
                    }

                    ?>
                </div>
                <div class="col-md-6 button-col">
                     <?php   if(!empty($view_all_button)){ ?>
                
                        <a href="<?php echo esc_url($view_all_button_link);?>" class="more-portfolio" target="<?php echo esc_attr($view_all_button_link_target);?>">
                            <?php echo esc_html($view_all_button);?> <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
               
             <?php } ?>
                </div>
            </div>
        </div>
        <div class="container full-width">
        <div class="portfolio-holder">
            <?php 
            $mularx_query = new WP_Query( array( 'post_type' => 'wcr_portfolio', 'order'=> 'DESC', 'posts_per_page' => $post_per_page) );
            while ($mularx_query->have_posts()) : $mularx_query->the_post();?>
               
                    <div class="portfolio-box ">
                       
                          <?php 
                                if ( has_post_thumbnail() ) {?>
                                    <div class="portfolio-image"><?php the_post_thumbnail(); ?></div>
                                <?php   
                                } ?>
                                <div class="content-part">
                                     <span class="content-box">
                                        <h3 class="portfolio-title"><?php  the_title(); ?></h3>
                                        <span class="team-desc"><?php echo  wp_kses_post(mularx_excerpt(20)); ?></span>
                                        <a href="<?php the_permalink();?>" class="portfolio-more"> <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </span>
                                </div>
                          
                        
                    </div>
                
            <?php endwhile; 
            wp_reset_postdata(); ?>
        </div>
        
           
        </div>
    </div>
<?php 
} ?>