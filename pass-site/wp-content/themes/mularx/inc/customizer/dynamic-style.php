<?php
    $primary_color = sanitize_hex_color( get_theme_mod( 'mularx_primary_color', '#04174a' ) );
    $secondary_color = sanitize_hex_color( get_theme_mod( 'mularx_secondary_color', '#5034fc' ) );
    $text_color = sanitize_hex_color( get_theme_mod( 'mularx_text_color', '#404040' ) );
    $light_color = sanitize_hex_color(get_theme_mod('mularx_light_color','#ffffff'));
    $heading_color = sanitize_hex_color( get_theme_mod( 'mularx_heading_color', '#000000' ) );
    $site_title_color = sanitize_hex_color(get_theme_mod('mularx_site_title_color','#04174a'));
    if ( mularx_set_to_premium() ) {
        $topbar_background = sanitize_hex_color(get_theme_mod('shpor_topbar_bg_color'));
        if(!empty($topbar_background)){
            $topbar_background = $topbar_background;
        }else{
             $topbar_background = $primary_color;
        }
        $topbar_text_color = sanitize_hex_color(get_theme_mod('shpor_topbar_text_color'));
        if(!empty($topbar_text_color)){
            $topbar_text_color = $topbar_text_color;
        }else{
            $topbar_text_color = $light_color;
        }
        $topbar_link_color = sanitize_hex_color(get_theme_mod('shpor_topbar_text_link_color'));
        if(!empty($topbar_link_color)){
            $topbar_link_color= $topbar_link_color;
        }else{
            $topbar_link_color = $secondary_color;
        }
        $topbar_link_hover_color = sanitize_hex_color(get_theme_mod('shpor_topbar_text_link_hover_color','#ededed'));
        
    }else{
        $topbar_background = $primary_color;
        $topbar_text_color = $light_color;
        $topbar_link_color = $secondary_color;
        $topbar_link_hover_color = '#ededed';
        $topbar_padding_top = '5';
        $topbar_padding_bottom = '5';
    }
    $topbar_padding_top = absint(get_theme_mod('header_topbar_padding_top','5'));
    $topbar_padding_bottom = absint(get_theme_mod('header_topbar_padding_bottom','5'));
    $topbar_font_size = absint(get_theme_mod('header_topbar_font_size','14'));
    $site_font = get_theme_mod('mularx_body_fonts','Heebo');
    $site_title_font = get_theme_mod('mularx_site_title_font_family','Heebo');
    $site_brand_size = absint(get_theme_mod('mularx_site_title_size','30'));
    $heading_font_h1 = get_theme_mod('mularx_fonts_heading_h1','Heebo');
    $heading_font_h2 = get_theme_mod('mularx_fonts_heading_h2','Heebo');
    $heading_font_h3 = get_theme_mod('mularx_fonts_heading_h3','Heebo');
    $heading_font_h4 = get_theme_mod('mularx_fonts_heading_h4','Heebo');
    $heading_font_h5 = get_theme_mod('mularx_fonts_heading_h5','Heebo');
    $heading_font_h6 = get_theme_mod('mularx_fonts_heading_h6','Heebo');


    $latest_product_image_height = absint(get_theme_mod('latest_product_image_height','350'));
    $team_image_height = absint(get_theme_mod('team_member_image_height','350'));
    $product_shop_image_height = absint(get_theme_mod('archive_product_image_height','350'));

    $aboutus_padding_top = absint(get_theme_mod('about_section_padding_top','100'));
    $abouts_padding_bottom = absint(get_theme_mod('about_section_padding_bottom','10'));
    $mission_padding_top = absint(get_theme_mod('missions_section_padding_top','70'));
    $mission_padding_bottom = absint(get_theme_mod('missions_section_padding_bottom','150'));
    $steps_padding_top = absint(get_theme_mod('steps_section_padding_top','70'));
    $steps_padding_bottom = absint(get_theme_mod('steps_section_padding_bottom','70'));
    $service_padding_top = absint(get_theme_mod('services_section_padding_top','100'));
    $service_padding_bottom = absint(get_theme_mod('services_section_padding_bottom','100'));
    $portfolio_padding_top = absint(get_theme_mod('portfolio_section_padding_top','100'));
    $portfolio_padding_bottom = absint(get_theme_mod('portfolio_section_padding_bottom','60'));
    $counter_padding_top = absint(get_theme_mod('counter_section_padding_top','60'));
    $counter_padding_bottom = absint(get_theme_mod('counter_section_padding_bottom','60'));
    $teams_padding_top = absint(get_theme_mod('team_section_padding_top','100'));
    $teams_padding_bottom = absint(get_theme_mod('team_section_padding_bottom','100'));
    $newsletter_padding_top = absint(get_theme_mod('newsletter_section_padding_top','150'));
    $newsletter_padding_bottom = absint(get_theme_mod('newsletter_section_padding_bottom','150'));
    $brands_padding_top = absint(get_theme_mod('brands_section_padding_top','40'));
    $brands_padding_bottom = absint(get_theme_mod('brands_section_padding_bottom','50'));
    $testimonials_padding_top = absint(get_theme_mod('testimonials_section_padding_top','100'));
    $testimonials_padding_bottom = absint(get_theme_mod('testimonials_section_padding_bottom','150'));
    $latestpost_padding_top = absint(get_theme_mod('latestpost_section_padding_top','100'));
    $latestpost_padding_bottom = absint(get_theme_mod('latestpost_section_padding_bottom','100'));

    $cta_simple_padding_top =  absint(get_theme_mod('cta_section_padding_top','100'));
    $cta_simple_padding_bottom =  absint(get_theme_mod('cta_section_padding_bottom','100'));
    
    
   
    
    $latestproduct_padding_top = absint(get_theme_mod('latestproduct_section_padding_top','60'));
    $latestproduct_padding_bottom = absint(get_theme_mod('latestproduct_section_padding_bottom','60'));
    $featured_cta_padding_top = absint(get_theme_mod('featured_cta_section_padding_top','100'));
    $featured_cta_padding_bottom = absint(get_theme_mod('featured_cta_section_padding_bottom','150'));
    $featured_box_padding_top = absint(get_theme_mod('featured_box_section_padding_top','50'));
    $featured_box_padding_bottom = absint(get_theme_mod('featured_box_section_padding_bottom','50'));
    if ( mularx_set_to_premium() ) {
        $promotionbar_background_color = sanitize_hex_color(get_theme_mod('shpor_promotion_bg_color','#edfaf1'));
        $promotionbar_text_color = sanitize_hex_color(get_theme_mod('shpor_promotion_text_color','#232323'));
    }else{
        $promotionbar_background_color = '#edfaf1';
        $promotionbar_text_color = '#232323';
    }
        $promotionbar_padding_top = absint(get_theme_mod('header_promotion_padding_top','5'));
        $promotionbar_padding_bottom = absint(get_theme_mod('header_promotion_padding_bottom','5'));
        $mainheader_padding_top = absint(get_theme_mod('header_mainheaer_padding_top','35'));
        $mainheader_padding_bottom = absint(get_theme_mod('header_mainheaer_padding_bottom','20'));
    if ( mularx_set_to_premium() ) {
        $footer_bg_opacity = get_theme_mod('footer_bg_opacity','0');
        $footer_column_border_size = absint(get_theme_mod('footer_box_border_size','0'));
        $footer_column_border_color = sanitize_hex_color(get_theme_mod('footer_box_border_color','#382456'));
        $footer_copyright_border_size = absint(get_theme_mod('footer_copyright_border_size','0'));
        $footer_copyright_border_color = sanitize_hex_color(get_theme_mod('footer_copyright_border_color','#382456'));
        $footer_background_color = sanitize_hex_color(get_theme_mod('shpor_footer_background_color',$primary_color));
        $footer_text_color = sanitize_hex_color(get_theme_mod('shpor_footer_text_color','#ffffff'));
        $footer_text_link_color=  sanitize_hex_color(get_theme_mod('shpor_footer_link_color','#ffffff'));
        $footer_text_link_hover_color=  sanitize_hex_color(get_theme_mod('shpor_footer_link_hover_color',$secondary_color));
        $footer_padding_top = absint(get_theme_mod('footer_padding_top','50'));
        $footer_padding_bottom = absint(get_theme_mod('footer_padding_bottom','50'));
        $footer_columnbox_bg_color = sanitize_hex_color(get_theme_mod('shpor_footer_boxbg_color'));
        $footer_box_padding = absint(get_theme_mod('footer_box_spacing','20'));
        $footer_box_opacity = get_theme_mod('footer_box_bg_opacity','0.5');
    }else{
        $footer_bg_opacity = '0';
        $footer_column_border_size = '1';
        $footer_column_border_color = '#382456';
        $footer_copyright_border_size = '1';
        $footer_copyright_border_color ='#382456';
        $footer_background_color = $primary_color;
        $footer_text_color ='#ffffff';
        $footer_text_link_color=  '#ffffff';
        $footer_text_link_hover_color= $secondary_color;
        $footer_padding_top = '50';
        $footer_padding_bottom = '50';
        $footer_columnbox_bg_color = '';
        $footer_box_padding = '';
        $footer_box_opacity = '0';
    }

    if(get_theme_mod('enable_brands_logo_border_top','true')==true){
        $brands_section_top_border='1';
    }else{
        $brands_section_top_border='0';
    }
    

    if ( mularx_set_to_premium() ) {
        $main_menu_primary_color = sanitize_hex_color(get_theme_mod('shpor_main_menu_background_color',$primary_color));
        $main_menu_secondary_color = sanitize_hex_color(get_theme_mod('shpor_main_menu_secondary_color',$secondary_color));
        $main_menu_text_color = sanitize_hex_color(get_theme_mod('shpor_main_menu_text_color','#7e7e7e'));
        if(empty($main_menu_text_color)){
            $main_menu_text_color = $text_color;
        }
        $main_menu_text_hover_color = sanitize_hex_color(get_theme_mod('shpor_main_menu_text_hover_color','#ffffff'));
        $main_menu_font_size = absint(get_theme_mod('mularx_navigation_font_size','16'));
        $main_menu_item_padding = absint(get_theme_mod('mularx_navigation_menu_item_spacing','20'));
        $main_menu_item_spacing = absint(get_theme_mod('mularx_navigation_menu_item_margin','1'));
        $main_menu_font_weight = get_theme_mod('mularx_main_navigation_weight');
        $main_menu_text_transform = get_theme_mod('mularx_navigation_font_text_transform');

        $copyright_background_color = sanitize_hex_color(get_theme_mod('shpor_copyright_bg_color',$primary_color));
        $copyright_text_color = sanitize_hex_color(get_theme_mod('shpor_copyright_text_color','#ffffff'));
        $copyright_text_link_color=  sanitize_hex_color(get_theme_mod('shpor_copyright_link_color','#ffffff'));
        $copyright_text_link_hover_color=  sanitize_hex_color(get_theme_mod('shpor_copyright_link_hover_color',$secondary_color));
        $copyright_padding_top = absint(get_theme_mod('copyright_padding_top','30'));
        $copyright_padding_bottom = absint(get_theme_mod('copyright_padding_bottom','30'));
    }else{
        $main_menu_primary_color = $primary_color;
        $main_menu_secondary_color = $secondary_color;
        $main_menu_text_color = $text_color;
        $main_menu_text_hover_color = '#ffffff';
        $main_menu_font_size = '16';
        $main_menu_item_padding ='20';
        $main_menu_item_spacing = '0';
        $main_menu_font_weight = '';
        $main_menu_text_transform = '';

        $copyright_background_color = $primary_color;
        $copyright_text_color ='#ffffff';
        $copyright_text_link_color=  '#ffffff';
        $copyright_text_link_hover_color=  $secondary_color;
        $copyright_padding_top ='30';
        $copyright_padding_bottom ='30';
    }
    $menu_container_top_border_size ='';
    if(get_theme_mod('enable_main_menu_top_border')==true){
        $menu_container_top_border_size =1;
    }
    $menu_container_bottom_border_size ='';
    if(get_theme_mod('enable_main_menu_bottom_border')==true){
        $menu_container_bottom_border_size =1;
    }
    if ( mularx_set_to_premium() ) {
         $banner_content_box_max_width = absint(get_theme_mod('banner_content_box_width','70'));
     }else{
         $banner_content_box_max_width='100';
     }

    if(get_theme_mod('enable_background_overlay_effect','true')==true){
        $newsleter_bg_mode = 'overlay';
    }else{
        $newsleter_bg_mode = 'normal';
    }
   
    $banner_section_top_spacing = absint(get_theme_mod('banner_section_top_spacing','0'));
    $main_menu_container_border_color = sanitize_hex_color(get_theme_mod('shpor_main_menu_container_bodrer_color','#ededed'));
    $site_font_size = absint(get_theme_mod('mularx_font_size','14'));
    $site_container_width = absint(get_theme_mod('mularx_container_width','1340'));
    $sidebar_width = absint(get_theme_mod('mularx_sidebar_width','28'));
    $main_content_width = absint(100-$sidebar_width);
    $featured_cta_overlap_offset= get_theme_mod('featured_cta_section_overlap_top_offset','-100');
    $featured_cta_icon_width = absint(get_theme_mod('featured_cta_icon_image_width','64'));
    $featured_cta_icon_height = absint(get_theme_mod('featured_cta_icon_image_height','64'));
    $service_image_height = absint(get_theme_mod('service_image_height','320'));
    $service_image_width = absint(get_theme_mod('service_image_width','410'));


    $breadcrumbs_bg_color = sanitize_hex_color(get_theme_mod('breadcrumbs_background_color','#04174a'));
    $breadcrumbs_txt_color = sanitize_hex_color(get_theme_mod('breadcrumbs_text_color','#fff'));
    $breadcrumbs_txt_link_color = sanitize_hex_color(get_theme_mod('breadcrumbs_text_link_color','#ffffff'));
    $breadcrumbs_txt_link_hover_color = sanitize_hex_color(get_theme_mod('breadcrumbs_text_link__hover_color','#5034fc'));
    $breadcrumbs_padding_top_space = absint(get_theme_mod('breadcrumbs_padding_top','40'));
    $breadcrumbs_padding_bottom_space = absint(get_theme_mod('breadcrumbs_padding_bottom','40'));

    $scroll_top_icon_width = get_theme_mod('mularx_scroll_top_icon_width','50');
    $scroll_top_icno_height = get_theme_mod('mularx_scroll_top_icon_height','50');
    $scroll_top_icon_size = get_theme_mod('mularx_scroll_top_icon_size','16');
    $scroll_top_icon_border_radius = get_theme_mod('mularx_scroll_top_icon_box_radius','50');
    $scroll_top_background = sanitize_hex_color(get_theme_mod('mularx_scroll_top_background','#ffffff'));
    $scroll_top_icon_color = sanitize_hex_color(get_theme_mod('mularx_scroll_top_icon_color','#04174a'));
    $scroll_top_background_hover = sanitize_hex_color(get_theme_mod('mularx_scroll_top_background_hover','#5034fc'));
    $scroll_top_icon_hover_color = sanitize_hex_color(get_theme_mod('mularx_scroll_top_icon_color_hover','#ffffff'));

    $button_font_family = get_theme_mod('mularx_button_font_family','Heebo');
    $button_text_transform = get_theme_mod('mularx_button_texts_transform','initial');
    $button_font_size = absint(get_theme_mod('mularx_button_text_size','14'));
    $button_radius = absint(get_theme_mod('mularx_button_radius','3'));
    $post_meta_color = sanitize_hex_color(get_theme_mod('mularx_post_meta_text_color','#7d7d7d'));
    $post_meta_link_hover_color = sanitize_hex_color(get_theme_mod('mularx_post_meta_text_hover_color','#5034fc'));
    $post_meta_font_size = absint(get_theme_mod('mularx_post_meta_font_size','12'));
    $post_meta_gap = absint(get_theme_mod('mularx_post_meta_spacing','10'));
    $post_meta_text_transform = get_theme_mod('mularx_meta_text_transform_option','initial');

    $reading_time_bgcolor = sanitize_hex_color(get_theme_mod('mularx_post_meta_ert_background','#232323'));
    $reading_time_color = sanitize_hex_color(get_theme_mod('mularx_post_meta_ert_color','#ffffff'));
    $reading_time_font_size = absint(get_theme_mod('mularx_post_meta_ert_font_size','12'));
    $reading_time_text_transform = get_theme_mod('mularx_ert_text_transform_option','initial');
    $reading_time_border_radius = absint(get_theme_mod('mularx_ert_border_radius','20'));

    $post_meta_category_bgcolor = sanitize_hex_color(get_theme_mod('mularx_post_meta_cat_background','#ededed'));
    $post_meta_category_color = sanitize_hex_color(get_theme_mod('mularx_post_meta_cat_color','#232323'));
    $post_meta_category_bgcolor_hover = sanitize_hex_color(get_theme_mod('mularx_post_meta_cat_background_hover','#454545'));
    $post_meta_category_color_hover = sanitize_hex_color(get_theme_mod('mularx_post_meta_cat_hover_color','#ffffff'));
    $post_meta_category_font_size = absint(get_theme_mod('mularx_post_meta_cat_font_size','12'));
    $post_meta_category_text_transform = get_theme_mod('mularx_cate_text_transform_option','initial');
    $post_meta_category_border_radius = absint(get_theme_mod('mularx_cat_border_radius','1'));

    $business_info_background = sanitize_hex_color(get_theme_mod('business_section_background_color','#f2f2f2'));
    $business_info_text_color = sanitize_hex_color(get_theme_mod('business_section_text_color','#232323'));
    $business_info_text_link_color = sanitize_hex_color(get_theme_mod('business_section_text_link_color','#232323'));
    $business_info_text_link_hover_color = sanitize_hex_color(get_theme_mod('business_section_text_link_hover_color','#5034fc'));
    $business_info_font_size = absint(get_theme_mod('business_section_text_font_size','14'));
    $business_info_top_space = absint(get_theme_mod('business_section_padding_top','70'));
    $business_info_bottom_space = absint(get_theme_mod('business_section_padding_bottom','50'));
    $business_info_top_border_size = absint(get_theme_mod('footer_business_border_size','1'));
    $business_info_border_color = sanitize_hex_color(get_theme_mod('footer_business_border_color','#f2f2f2'));

    $featured_cat_tab_padding_top =  absint(get_theme_mod('catrgorise_products_section_padding_top','50'));
    $featured_cat_tab_padding_bottom = absint(get_theme_mod('catrgorise_products_section_padding_bottom','20'));
    $category_image_height= absint(get_theme_mod('productcat_cat_image_height'));
    if(empty($category_image_height)){
        $category_image_height = '100';
    }
    $category_image_width= absint(get_theme_mod('productcat_cat_image_width'));
    if(empty($category_image_width)){
        $category_image_width= '100';
    }
    $ctaegory_image_border_radius = absint(get_theme_mod('productcat_cat_image_border_radius'));
    $banner_background_color = sanitize_hex_color(get_theme_mod('banenr_background_color','#15305a'));
    if ( mularx_set_to_premium() ) {
        $banner_background_opacity = get_theme_mod('banner_background_opacity','1');
    }else{
        $banner_background_opacity='1';
    }
    $banner_text_color = sanitize_hex_color(get_theme_mod('banenr_text_color','#ffffff'));
    $banner_blend_mode_status = get_theme_mod('enable_banner_ovelay_blend','true');
    $background_blend_mode='';
    if($banner_blend_mode_status==true){
        $background_blend_mode ='overlay';
    }
    $banner_heading_font = get_theme_mod('mularx_banner_heading_typography','Heebo');
    $banner_heading_font_size = absint(get_theme_mod('banner_heading_text_size','60'));
    $banner_heading_line_height = absint(get_theme_mod('banner_heading_text_line_height','70'));

    $offer_cta_color = sanitize_hex_color(get_theme_mod('offer_cta_text_color','#ffffff'));
    $offer_cta_heading_font = sanitize_hex_color(get_theme_mod('offer_cta_heading_typography','Heebo'));
    $offer_cta_heading_font_size = absint(get_theme_mod('offer_cta_heading_text_size','60'));
    $offer_cta_heading_line_height = absint(get_theme_mod('offer_cta_heading_text_line_height','70'));

    $special_offer_cta_heading_font = sanitize_hex_color(get_theme_mod('special_offer_heading_typography','Heebo'));
    $special_offer_cta_heading_font_size = absint(get_theme_mod('special_offer_heading_text_size','60'));
    $special_offer_cta_heading_line_height = absint(get_theme_mod('special_offer_heading_text_line_height','70'));

    $product_showcase_color = sanitize_hex_color(get_theme_mod('product_showcase_text_color','#ffffff'));
    $product_showcase_heading_font = sanitize_hex_color(get_theme_mod('product_showcase_heading_typography','Heebo'));
    $product_showcase_heading_font_size = absint(get_theme_mod('product_showcase_heading_text_size','60'));
    $product_showcase_heading_line_height = absint(get_theme_mod('product_showcase_heading_text_line_height','70'));

    $social_icon_radius = absint(get_theme_mod('mularx_social_icon_border_radius'));
    $social_icon_size = absint(get_theme_mod('mularx_social_icon_size','14'));
    $social_icon_border_size='';
    if ( mularx_set_to_premium() ) {
        $social_icon_border_size = absint(get_theme_mod('mularx_social_icon_border_size'));
    }
    $social_icon_border_color = sanitize_hex_color(get_theme_mod('mularx_social_icon_border_color'));
    $social_icon_border_hover_color = sanitize_hex_color(get_theme_mod('mularx_social_icon_hover_border_color'));

    $social_icon_custom_bg_color = sanitize_hex_color(get_theme_mod('mularx_social_icon_bg_color','#ededed'));
    $social_icon_custom_text_color = sanitize_hex_color(get_theme_mod('mularx_social_icon_text_color','#232323'));
    $social_icon_custom_bg_color_hover = sanitize_hex_color(get_theme_mod('mularx_social_icon_hover_bg_color','#676767'));
    $social_icon_custom_text_color_hover = sanitize_hex_color(get_theme_mod('mularx_social_icon_hover_text_color','#ffffff'));

    if ( mularx_set_to_premium() ) {
        $banner_container_padding = absint(get_theme_mod('banner_section_container_spacing'));
        $banner_content_padding_top = absint(get_theme_mod('banner_section_padding_top','40'));
        $site_banner_height = absint(get_theme_mod('banner_section_height','950'));
        $main_header_max_with = absint(get_theme_mod('header_mainheaer_container_width','1340'));
        if(!empty($main_header_max_with)){
            $main_header_max_with = $main_header_max_with;
        }else{
            $main_header_max_with = $site_container_width;
        }
    }else{
          $banner_container_padding = '0';
          $banner_content_padding_top = '40';
          $site_banner_height='950';
          $main_header_max_with = $site_container_width;
    }
    
    $heading_default_size = array(
        '1' =>  40,
        '2' =>  32,
        '3' =>  24,
        '4' =>  20,
        '5' =>  16,
        '6' =>  14,
    );
    for( $size = 1; $size <= 6 ; $size++ ) {
        $size_heading[$size] = absint( get_theme_mod( 'mularx_heading_font_size_h'.$size, absint( $heading_default_size[$size] ) ) );
    }

    $heading_default_line_height= array(
        '1' =>  50,
        '2' =>  40,
        '3' =>  35,
        '4' =>  30,
        '5' =>  25,
        '6' =>  22,
    );
    for($line_height = 1; $line_height <= 6; $line_height++){
         $lineheight_heading[$line_height] = absint( get_theme_mod( 'mularx_heading_font_line_height_h'.$line_height, absint( $heading_default_line_height[$line_height] ) ) );
    }

    $heading_default_text_transform = 'initial';
    for($tt = 1; $tt <= 6; $tt++){
         $texttransform_heading[$tt] = esc_attr( get_theme_mod( 'mularx_heading_font_text_transform_h'.$tt, esc_attr( $heading_default_text_transform ) ) );
    }
    $heading_default_text_style = 'initial';
    for($ts = 1; $ts <= 6; $ts++){
         $text_style_heading[$ts] = esc_attr( get_theme_mod( 'mularx_heading_font_style_h'.$ts, esc_attr( $heading_default_text_style ) ) );
    }
    $heading_default_font_weight ='bold';
    for($ft = 1; $ft <= 6; $ft++){
         $font_weight_heading[$ft] = esc_attr( get_theme_mod( 'mularx_heading_font_weight_h'.$ft, esc_attr( $heading_default_font_weight ) ) );
    }

    
    ?>
    <style type="text/css">
    :root{
        --primary-color: <?php echo $primary_color;?>;
        --secondary-color: <?php echo $secondary_color;?>;
        --text-color:<?php echo $text_color;?>;
        --heading-color:<?php echo $heading_color;?>;
        --light-color:<?php echo $light_color;?>;
    }
    body{
        font-family: '<?php echo esc_attr($site_font);?>',sans-serif;
        color: var(--text-color);
        font-size: <?php echo $site_font_size.'px';?>;
    }
    h1{
        font-family: '<?php echo esc_attr($heading_font_h1);?>',sans-serif;
        font-size: <?php echo $size_heading[1].'px';?>;
        line-height: <?php echo $lineheight_heading[1].'px';?>;
        text-transform: <?php echo $texttransform_heading[1];?>;
        font-style: <?php echo $text_style_heading[1];?>;
        font-weight: <?php echo $font_weight_heading[1];?>;
    }
    h2{
        font-family: '<?php echo esc_attr($heading_font_h2);?>',sans-serif;
        font-size: <?php echo $size_heading[2].'px';?>;
        line-height: <?php echo $lineheight_heading[2].'px';?>;
        text-transform: <?php echo $texttransform_heading[2];?>;
        font-style: <?php echo $text_style_heading[2];?>;
        font-weight: <?php echo $font_weight_heading[2];?>;
    }
    h3{
        font-family: '<?php echo esc_attr($heading_font_h3);?>',sans-serif;
        font-size: <?php echo $size_heading[3].'px';?>;
        line-height: <?php echo $lineheight_heading[3].'px';?>;
        text-transform: <?php echo $texttransform_heading[3];?>;
        font-style: <?php echo $text_style_heading[3];?>;
        font-weight: <?php echo $font_weight_heading[3];?>;
    }
    h4{
        font-family: '<?php echo esc_attr($heading_font_h4);?>',sans-serif;
        font-size: <?php echo $size_heading[4].'px';?>;
        line-height: <?php echo $lineheight_heading[4].'px';?>;
        text-transform: <?php echo $texttransform_heading[4];?>;
        font-style: <?php echo $text_style_heading[4];?>;
        font-weight: <?php echo $font_weight_heading[4];?>;
    }
    h5{
        font-family: '<?php echo esc_attr($heading_font_h5);?>',sans-serif;
        font-size: <?php echo $size_heading[5].'px';?>;
        line-height: <?php echo $lineheight_heading[5].'px';?>;
        text-transform: <?php echo $texttransform_heading[5];?>;
        font-style: <?php echo $text_style_heading[5];?>;
        font-weight: <?php echo $font_weight_heading[5];?>;
    }
    h6{
        font-family: '<?php echo esc_attr($heading_font_h6);?>',sans-serif;
        font-size: <?php echo $size_heading[6].'px';?>;
        line-height: <?php echo $lineheight_heading[6].'px';?>;
        text-transform: <?php echo $texttransform_heading[6];?>;
        font-style: <?php echo $text_style_heading[6];?>;
        font-weight: <?php echo $font_weight_heading[6];?>;
    }
    .site-branding h1.site-title{
        font-family: <?php echo esc_attr($site_title_font);?>;
        font-size: <?php echo $site_brand_size .'px';?>;
    }
    .site-branding img.custom-logo{
        height: <?php echo $site_brand_size .'px';?>;
        width: auto;

    }
    .container{
        max-width: <?php echo $site_container_width.'px';?>;
    }
    .sidebar-block{
        width: <?php echo $sidebar_width .'%';?>;
    }
    .site-main.col-md-8{
        width:<?php echo $main_content_width.'%';?>;
    }
    .wrapper.topbar-wrapper{
        background: <?php echo $topbar_background;?>;
        color: <?php echo $topbar_text_color;?>;
        padding-top: <?php echo $topbar_padding_top.'px';?>;
        padding-bottom: <?php echo $topbar_padding_bottom.'px';?>;
    }
    .topbar-wrapper .topbar-left{
        font-size: <?php echo $topbar_font_size.'px';?>;
    }
    .topbar-wrapper .topbar-left a{
        color: <?php echo $topbar_link_color;?>;
    }
    .topbar-wrapper .topbar-left a:hover{
        color:<?php echo $topbar_link_hover_color;?>;
    }
    .latest-product-wrapper .product-item .featured-image{
        height: <?php echo $latest_product_image_height.'px';?>;
    }
    .wrapper.newsletter-wrapper{
        padding-top: <?php echo $newsletter_padding_top.'px';?>;
        padding-bottom:  <?php echo $newsletter_padding_bottom.'px';?>;
    }
    .wrapper.brands-wrapper{
        padding-top: <?php echo $brands_padding_top.'px';?>;
        padding-bottom:  <?php echo $brands_padding_bottom.'px';?>;
    }
    .wrapper.testimonial-wrapper{
        padding-top: <?php echo $testimonials_padding_top.'px';?>;
        padding-bottom:  <?php echo $testimonials_padding_bottom.'px';?>;
    }
    .wrapper.latest-post-wrapper{
        padding-top: <?php echo $latestpost_padding_top.'px';?>;
        padding-bottom:  <?php echo $latestpost_padding_bottom.'px';?>;
    }
    .wrapper.latest-product-wrapper{
        padding-top: <?php echo $latestproduct_padding_top.'px';?>;
        padding-bottom:  <?php echo $latestproduct_padding_bottom.'px';?>;
    }
    .featured-cta-wrapper{
        padding-top: <?php echo $featured_cta_padding_top.'px';?>;
        padding-bottom:  <?php echo $featured_cta_padding_bottom.'px';?>;
    }
    .header-promotion-bar{
        padding-top: <?php echo $promotionbar_padding_top.'px';?>;
        padding-bottom:  <?php echo $promotionbar_padding_bottom.'px';?>;
        background: <?php echo $promotionbar_background_color;?>;
        color: <?php echo $promotionbar_text_color;?>;
    }
    .wrapper.main-header{
        padding-top: <?php echo $mainheader_padding_top.'px';?>;
        padding-bottom:  <?php echo $mainheader_padding_bottom.'px';?>;
    }
    .footer-overlay-image{
        opacity: <?php echo esc_attr($footer_bg_opacity);?>;
    }
    .footer-wiget-list.footer-colum-border-right .mularx-footer-column{
        border-right:solid <?php echo $footer_column_border_size.'px '. $footer_column_border_color;?>; 
    }
    .footer-wiget-list.footer-colum-border-right .mularx-footer-column:last-child{
        border:0;
    }
    .footer-wiget-list.footer-colum-border-right .mularx-footer-column{
        padding-right: 30px;
    }
    .copyright-section{
        border-top:solid <?php echo $footer_copyright_border_size.'px '. $footer_copyright_border_color;?>; 
        background:<?php echo $copyright_background_color;?>;
        color: <?php echo $copyright_text_color;?>;
        padding: <?php echo $copyright_padding_top.'px';?> 0 <?php echo $copyright_padding_bottom.'px';?> 0;
    }
    .copyright-section a{
         color: <?php echo $copyright_text_link_color;?>;
    }
    .copyright-section a:hover{
         color: <?php echo $copyright_text_link_hover_color;?>;
    }
    .footer-section{
        color: <?php echo $footer_text_color;?>;
        background:<?php echo $footer_background_color;?>;
        padding: <?php echo $footer_padding_top.'px';?> 0 <?php echo $footer_padding_bottom.'px';?> 0;
    }
    .footer-section a{
         color: <?php echo $footer_text_link_color;?>;
    }
    .footer-section a:hover{
         color: <?php echo $footer_text_link_hover_color;?>;
    }
    .footer-wiget-list.footer-colum-border-all .mularx-footer-column {
        border:solid <?php echo $footer_column_border_size.'px '. $footer_column_border_color;?>; 
        padding: <?php echo $footer_box_padding.'px';?>;
        position: relative;
    }
    .footer-wiget-list.footer-colum-border-all .mularx-footer-column:before {
        background: <?php echo $footer_columnbox_bg_color;?>;
        opacity: <?php echo $footer_box_opacity;?>;
    }
    .woocommerce ul.products li.product a img{
        height: <?php echo $product_shop_image_height.'px';?>;
    }
    .wrapper.main-navigation-wrapper{
        background: <?php echo $main_menu_primary_color;?>;
        border-top: <?php echo esc_attr($menu_container_top_border_size).'px  solid ' . esc_attr($main_menu_container_border_color);?>;
        border-bottom: <?php echo esc_attr($menu_container_bottom_border_size).'px  solid ' . esc_attr($main_menu_container_border_color);?>;
    }
    .wrapper.main-navigation-wrapper .main-navigation ul li a,
    .main-navigation ul li a{
        color:<?php echo $main_menu_text_color;?>;
    }
    .wrapper.main-navigation-wrapper .main-navigation ul li:hover a,
    .main-navigation ul li:hover a,
     .home header#masthead.header-overlay-style-enabled.sticky-header-enabled   .wrapper.main-navigation-wrapper .main-navigation ul li:hover a,
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled    .main-navigation ul li:hover a{
        background: <?php echo $main_menu_secondary_color;?>;
        color: <?php echo $main_menu_text_hover_color;?>;
    }
    .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-underline .main-navigation ul li:hover a, 
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-normal .main-navigation ul li:hover a{
      background: transparent;
   }
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-underline .main-navigation ul ul li:hover a, 
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-normal .main-navigation ul ul li:hover a{
      background: <?php echo $main_menu_primary_color;?>;
   }
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-underline .main-navigation ul li:hover ul li a, 
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-normal .main-navigation ul li:hover ul li a,
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-underline .main-navigation ul li:focus ul li a, 
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-normal .main-navigation ul li:focus ul li a{
      background: <?php echo $main_menu_secondary_color;?>;
   }
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-underline .main-navigation ul li:hover ul li a:hover, 
   .wrapper.main-navigation-wrapper .primary-menu.mularx-link-style-normal .main-navigation ul li:hover ul li a:hover{
      background: <?php echo $main_menu_primary_color;?>;
   }

    .primary-menu.mularx-link-style-underline .main-navigation ul ul li:hover a,
    .primary-menu.mularx-link-style-normal .main-navigation ul ul li:hover a{
         background: <?php echo $main_menu_primary_color;?>;
    }
    .wrapper.main-navigation-wrapper  .main-navigation ul ul li a:hover,
    .wrapper.main-navigation-wrapper  .main-navigation ul ul li a:focus{
        background: <?php echo $main_menu_primary_color;?>;
        color:<?php echo $main_menu_text_color;?>;
    }
    .main-navigation ul li a{
        font-size: <?php echo $main_menu_font_size.'px';?>;
        padding: 0 <?php echo $main_menu_item_padding.'px';?>;
        margin:0 <?php echo $main_menu_item_spacing.'px';?>;
        font-weight: <?php echo esc_attr($main_menu_font_weight);?>;
        text-transform: <?php echo esc_attr($main_menu_text_transform);?>;
    }
    .main-navigation ul ul li a{
        padding: 0 15px;
    }
    .primary-menu.mularx-link-style-normal .main-navigation li.current-menu-item > a, 
    .primary-menu.mularx-link-style-underline .main-navigation li.current-menu-item > a,
    .primary-menu.mularx-link-style-underline .main-navigation ul li:hover > a, 
    .primary-menu.mularx-link-style-normal .main-navigation ul li:hover > a,
    .primary-menu.mularx-link-style-underline .main-navigation ul li:focus > a, 
    .primary-menu.mularx-link-style-normal .main-navigation ul li:focus > a,
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled   .primary-menu.mularx-link-style-normal .main-navigation li.current-menu-item > a, 
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled .primary-menu.mularx-link-style-underline .main-navigation li.current-menu-item > a,
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled .primary-menu.mularx-link-style-underline .main-navigation ul li:hover > a, 
   .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .primary-menu.mularx-link-style-normal .main-navigation ul li:hover > a,
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled .primary-menu.mularx-link-style-underline .main-navigation ul li:focus > a, 
   .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .primary-menu.mularx-link-style-normal .main-navigation ul li:focus > a
    {
        color:<?php echo $main_menu_secondary_color;?>;
    }
    .main-navigation ul ul{
        background: <?php echo $main_menu_secondary_color;?>;
    }
    .primary-menu.mularx-link-style-underline .main-navigation ul ul li:hover > a, 
    .primary-menu.mularx-link-style-normal .main-navigation ul ul li:hover > a,
    .main-navigation ul ul li a:hover, 
    .main-navigation ul ul li a:focus,


    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .primary-menu.mularx-link-style-underline .main-navigation ul ul li:hover > a, 
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .primary-menu.mularx-link-style-normal .main-navigation ul ul li:hover > a,
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .main-navigation ul ul li a:hover, 
    .home header#masthead.header-overlay-style-enabled.sticky-header-enabled  .main-navigation ul ul li a:focus,
    .home header#masthead.header-overlay-style-enabled .main-navigation ul ul li:hover > a{
         background: <?php echo $main_menu_primary_color;?>;
         color:<?php echo $main_menu_text_hover_color;?>;
    }
    .primary-menu.mularx-link-style-normal .main-navigation li.current-menu-item:hover li.current-menu-item > a, 
    .primary-menu.mularx-link-style-underline .main-navigation li.current-menu-item:hover li.current-menu-item > a,
    .primary-menu.mularx-link-style-normal .main-navigation li.current-menu-parent:hover li.current_page_item > a,
     .primary-menu.mularx-link-style-underline .main-navigation li.current-menu-parent:hover li.current_page_item > a{
        background:<?php echo $main_menu_primary_color;?>;
        color:<?php echo $main_menu_text_hover_color;?>;
    }
    .primary-menu.mularx-link-style-boxed .main-navigation li.current-menu-item a{
         background: <?php echo $main_menu_secondary_color;?>;
         color:<?php echo $main_menu_text_hover_color;?>;
    }
    .primary-menu.mularx-link-style-underline .main-navigation ul li:hover > a:before, 
    .primary-menu.mularx-link-style-underline .main-navigation li.current-menu-item > a:before{
        background:  <?php echo $main_menu_secondary_color;?>;
    }
    span.banner-content-holder{
        max-width: <?php echo $banner_content_box_max_width.'%';?>;
    }

    .wrapper.banner-wrapper{
        margin-top: <?php echo $banner_section_top_spacing.'px';?>;
    }
   
    
    .wrapper.breadcrumbs-wrapper{
        background: <?php echo $breadcrumbs_bg_color;?>;
        padding: <?php echo $breadcrumbs_padding_top_space.'px';?> 0 <?php echo $breadcrumbs_padding_bottom_space.'px';?>;
        color: <?php echo $breadcrumbs_txt_color;?>;
    }
    .wrapper.breadcrumbs-wrapper ul.trail-items li a,
    #breadcrumbs a{
        color: <?php echo $breadcrumbs_txt_link_color;?>;
    }
    .wrapper.breadcrumbs-wrapper ul.trail-items li a:hover:after{
        color: <?php echo $breadcrumbs_txt_color;?>;
    }
    .wrapper.breadcrumbs-wrapper ul.trail-items li a:hover,
    #breadcrumbs a:hover{
        color: <?php echo $breadcrumbs_txt_link_hover_color;?>;
    }
    a.mularx-top{
        background: <?php echo $scroll_top_background;?>;
        width: <?php echo $scroll_top_icon_width.'px';?>;
        height: <?php echo $scroll_top_icno_height.'px';?>;
        border-radius: <?php echo $scroll_top_icon_border_radius.'px';?>;
        color: <?php echo $scroll_top_icon_color;?>;
        font-size:<?php echo $scroll_top_icon_size.'px';?>;
        text-align: center;
        line-height: <?php echo $scroll_top_icno_height.'px';?>;
        display: inline-block;
        position: fixed;
        bottom: 16px;
        right: 50px;
        transition: all ease 0.23s;
        box-shadow: 0 0 11px rgb(0 0 0 / 10%);
    }
    a.mularx-top:hover{
        background: <?php echo $scroll_top_background_hover;?>;
        color: <?php echo $scroll_top_icon_hover_color;?>;
    }
    a.primary-buttons,
    a.secondary-buttons,
    a.mularx-button,
    .products-button-group a.button,
    form.wpcf7-form input.wpcf7-form-control.wpcf7-submit,
    .woocommerce ul.products li.product .button,
    a.banner-button,
    a.meet-all-teams,
    .wrapper.portfolio-wraper a.more-portfolio,
    .wraper.service-wraper .service-box a.details-service.mularx-primary-button,
    .wraper.service-layout-2 .button-group a.all-services,
    .wraper.service-wraper a.all-services,
    .wrapper.testimonial-wrapper a.testimonial-cta-button{
        font-family: <?php echo esc_attr($button_font_family);?>;
        font-size: <?php echo $button_font_size.'px';?>;
        border-radius: <?php echo $button_radius.'px';?> !important;
        text-transform: <?php echo $button_text_transform;?>;

    }

    .entry-meta a, .latest-post-wrapper .post-meta a,
    .entry-meta{
        color:<?php echo $post_meta_color;?>;
        font-size: <?php echo $post_meta_font_size.'px';?>;
        text-transform: <?php echo esc_attr($post_meta_text_transform);?>;
    }
    .entry-meta a.mularx-post-date, .entry-meta a.post-author, .latest-post-wrapper .post-meta a{
        margin-right: <?php echo $post_meta_gap.'px';?>;
    }
   .entry-meta a:hover, .latest-post-wrapper .post-meta a:hover{
    color: <?php echo $post_meta_link_hover_color;?>;
   }
   .mularx-post-thumbnail span.estimate-reading-time{
    background: <?php echo $reading_time_bgcolor;?>;
    color: <?php echo $reading_time_color;?>;
    font-size: <?php echo $reading_time_font_size.'px';?>;
    text-transform: <?php echo esc_attr($reading_time_text_transform);?>;
    border-radius: <?php echo $reading_time_border_radius.'px';?>;
   }
    .mularx-blogs-list span.category a, 
    .latest-post-wrapper span.category a{
        background: <?php echo $post_meta_category_bgcolor;?>;
        color: <?php echo $post_meta_category_color;?>;
        font-size: <?php echo $post_meta_category_font_size.'px';?>;
        text-transform: <?php echo esc_attr($post_meta_category_text_transform);?>;
        border-radius: <?php echo $post_meta_category_border_radius.'px';?>;
    }
      .mularx-blogs-list span.category a:hover, 
    .latest-post-wrapper span.category a:hover{
        background: <?php echo $post_meta_category_bgcolor_hover;?>;
        color: <?php echo $post_meta_category_color_hover;?>;
    }
    .wrapper.footer-business-info{
        background: <?php echo $business_info_background;?>;
        color:<?php echo $business_info_text_color;?>;
        padding: <?php echo $business_info_top_space.'px';?> 0 <?php echo $business_info_bottom_space.'px';?>;
        font-size: <?php echo $business_info_font_size.'px';?>;
        border-top:<?php echo $business_info_top_border_size.'px';?> solid <?php echo $business_info_border_color;?>;
    }
    .wrapper.footer-business-info a{
        text-decoration: none;
        color: <?php echo $business_info_text_link_color;?>;
    }
    .wrapper.footer-business-info a:hover{
     color: <?php echo $business_info_text_link_hover_color;?>;
    }
    .wrapper.banner-wrapper .container.full-width .hero-image,
    .wrapper.banner-wrapper.banner-layout-3{
        background: <?php echo $banner_background_color;?>;
        height: <?php echo $site_banner_height.'px';?>;
    }
    .wrapper.banner-wrapper.banner-layout-3 .banner-contents{
         height: <?php echo $site_banner_height.'px';?>;
    }
    .wrapper.banner-wrapper .container.full-width .hero-image img{
        opacity: <?php echo $banner_background_opacity;?>;
        mix-blend-mode:<?php echo $background_blend_mode;?>;
    }
    .wrapper.banner-wrapper h5{
        color:<?php echo $banner_text_color;?>;
    }
    .banner-content .banner-heading,
    .banner-contents .banner-heading{
        color:<?php echo $banner_text_color;?>;
        font-family: <?php echo $banner_heading_font;?>;
        font-size: <?php echo $banner_heading_font_size.'px'; ?>;
        line-height: <?php echo $banner_heading_line_height.'px';?>;
    }
    .wrapper.discount-offer-wrapper h1,
    .wrapper.discount-offer-wrapper h3{
        color: <?php echo $offer_cta_color;?>;
    }
    .wrapper.discount-offer-wrapper h1{
        font-family: <?php echo $offer_cta_heading_font;?>;
        font-size:  <?php echo $offer_cta_heading_font_size.'px';?>;
        line-height: <?php echo $offer_cta_heading_line_height.'px';?>;
    }
    
    .wrapper.special-offer h1,
    .wrapper.special-offer .section-header{
        font-family: <?php echo $special_offer_cta_heading_font;?>;
        font-size:  <?php echo $special_offer_cta_heading_font_size.'px';?>;
        line-height: <?php echo $special_offer_cta_heading_line_height.'px';?>;
    }

    .swiper-container.mularx-product-showcase .section-heading,
    .swiper-container.mularx-product-showcase,
    .swiper-container.mularx-product-showcase h1{
        color:<?php echo $product_showcase_color;?>;
    }
    .swiper-container.mularx-product-showcase .section-heading,
    .swiper-container.mularx-product-showcase h1{
        font-family: <?php echo $product_showcase_heading_font;?>;
        font-size:  <?php echo $product_showcase_heading_font_size.'px';?>;
        line-height: <?php echo $product_showcase_heading_line_height.'px';?>;
    }
    ul.mularx-social-icons li a {
        border: <?php echo $social_icon_border_size.'px';?> solid <?php echo $social_icon_border_color;?>;
    }
     ul.mularx-social-icons li a:hover {
        border-color: <?php echo $social_icon_border_hover_color;?>;
     }
    ul.mularx-social-icons li a, .sidebar-block section.widget ul.mularx-social-icons li a, .site-footer .widget ul.mularx-social-icons li a{
        font-size: <?php echo $social_icon_size.'px';?>;
        border-radius: <?php echo $social_icon_radius.'px';?>;
    }
    ul.mularx-social-icons.social-layout-box.social-custom-color a{
        background: <?php echo $social_icon_custom_bg_color;?>;
        color:<?php echo $social_icon_custom_text_color;?>;
    }
    ul.mularx-social-icons.social-layout-box.social-custom-color a:hover{
        background: <?php echo $social_icon_custom_bg_color_hover;?>;
        color:<?php echo $social_icon_custom_text_color_hover;?>;
    }
    ul.mularx-social-icons.social-layout-normal.social-custom-color li a{
         color:<?php echo $social_icon_custom_text_color;?>;
    }
     ul.mularx-social-icons.social-layout-normal.social-custom-color li a:hover{
         color:<?php echo $social_icon_custom_text_color_hover;?>;
    }
    .wrapper.banner-wrapper .container.full-width{
        padding: 0 <?php echo $banner_container_padding.'px';?>;
    }
    span.banner-content-holder{
        padding-top: <?php echo $banner_content_padding_top.'px';?>;
    }
    .home header#masthead.header-overlay-style-enabled .main-navigation ul li > a,
    .home header#masthead.header-overlay-style-enabled  .wrapper.main-header,
    .home header#masthead.header-overlay-style-enabled .site-branding h1.site-title a,
    .home header#masthead.header-overlay-style-enabled span.header-cart-icon a, 
    .home header#masthead.header-overlay-style-enabled span.header-account-icon a,
    .home header#masthead.header-overlay-style-enabled .header-icon-search button{
        color: #fff;
    }
    .home header#masthead.header-overlay-style-enabled .main-navigation ul li > a:hover,
    .home header#masthead.header-overlay-style-enabled .site-branding h1.site-title a:hover,
    .home header#masthead.header-overlay-style-enabled span.header-cart-icon a:hover, 
    .home header#masthead.header-overlay-style-enabled span.header-account-icon a:hover{
        color:var(--secondary-color);
    }
    .home header#masthead.header-overlay-style-enabled .header-icon-search button:hover{
        color: var(--light-color);
    }
    header#masthead  .container{
        max-width: <?php echo $main_header_max_with.'px';?>;
    }
    .home header#masthead.header-overlay-style-enabled  .main-navigation .menu-toggle span{
         background:#fff;
    }
     .home header#masthead.header-overlay-style-enabled  .main-navigation .menu-toggle:hover span{
         background:var(--secondary-color);
    }
    .home header#masthead.header-overlay-style-enabled  .menu-toggle:focus span:nth-of-type(2), 
    .home header#masthead.header-overlay-style-enabled  .menu-toggle:hover span:nth-of-type(2), 
    .home header#masthead.header-overlay-style-enabled .main-navigation.toggled .menu-toggle span:nth-of-type(2){
        background: transparent;
    }
    .site-branding h1.site-title,
     .site-branding h1.site-title a{
        color: <?php echo $site_title_color;?>;
    }
    
    .category-holder .category img{
        height: auto;
        height: <?php echo $category_image_height.'px';?>;
        width: <?php echo $category_image_width.'px';?>;
        max-width: 100%;
        border-radius: <?php echo $ctaegory_image_border_radius.'px';?>;
    }
    .wrapper.featured-box-wrapper{
        padding: <?php echo $featured_box_padding_top.'px';?> 0 <?php echo $featured_box_padding_bottom.'px';?>;
    }
    .featured-cta-wrapper .featured-ctas-holder .featured-cta-box img{
        max-width: 100%;
        width: <?php echo $featured_cta_icon_width.'px';?>;
        height: <?php echo $featured_cta_icon_height.'px';?>;
    }
    .featured-cta-wrapper .featured-ctas-holder .featured-cta-box{
        margin-top: <?php echo $featured_cta_overlap_offset.'px';?>;

    }
    .newsletter-wrapper img.newsletter-img{
        mix-blend-mode: <?php echo $newsleter_bg_mode;?>;
    }
    .about-wrapper{
        padding: <?php echo $aboutus_padding_top.'px';?> 0 <?php echo $abouts_padding_bottom.'px';?>;
    }
    .wrapper.missiongoal-wrapper{
        padding: <?php echo $mission_padding_top.'px';?> 0 <?php echo $mission_padding_bottom.'px';?>;
    }
    .wraper.service-wraper .service-box a.service-thumbnail img{
        height: <?php echo $service_image_height.'px';?>;
        width: <?php echo $service_image_width.'px';?>;
    }
    .wrapper.steps-wrapper{
        padding: <?php echo $steps_padding_top.'px';?> 0 <?php echo $steps_padding_bottom.'px';?>;
    }
    .wraper.service-wraper{
        padding: <?php echo $service_padding_top.'px';?> 0 <?php echo $service_padding_bottom.'px';?>;
    }
    .wrapper.portfolio-wraper{
        padding: <?php echo $portfolio_padding_top.'px';?> 0 <?php echo $portfolio_padding_bottom.'px';?>;
    }
    .wrapper.counter-wrapper{
        padding: <?php echo $counter_padding_top.'px';?> 0 <?php echo $counter_padding_bottom.'px';?>;
    }
    .wrapper.team-wraper{
        padding: <?php echo $teams_padding_top.'px';?> 0 <?php echo $teams_padding_bottom.'px';?>;
    }
    .wrapper.brands-wrapper{
        border-width: <?php echo $brands_section_top_border.'px';?>;
    }
    .team-wraper .teams-holder .team-image img{
        height: <?php echo $team_image_height.'px';?>;
    }
    .discount-offer-wrapper{
        padding: <?php echo $cta_simple_padding_top.'px';?> 0 <?php echo $cta_simple_padding_bottom.'px';?>;
    }
    
</style>