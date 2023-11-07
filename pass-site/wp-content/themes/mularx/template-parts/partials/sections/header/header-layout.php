<?php 

if ( mularx_set_to_premium() ) {
	$mularx_selected_header_layout = get_theme_mod('mularx_header_layout','header-layout-1');
	if($mularx_selected_header_layout=='header-layout-5'){?>
		 <div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php mularx_branding(); ?>
			</div><!--end of container-->
		</div><!--end of wrapper-->
		<div class="wrapper main-navigation-wrapper <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php  mularx_navigation();
				header_icons_buttons();
				 ?>
			</div>
		</div>
	<?php } elseif($mularx_selected_header_layout=='header-layout-4'){?>
		 <div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php
				mularx_branding(); 
				echo '<div class="header-search-form">';
					get_Search_form();
				echo '</div>';
				header_icons_buttons(); 
				?>
			</div><!--end of container-->
		</div><!--end of wrapper-->
		<div class="wrapper main-navigation-wrapper <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php  mularx_navigation(); ?>
			</div>
		</div>
	<?php } elseif($mularx_selected_header_layout=='header-layout-3'){?>
		<div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php
				echo '<div class="header-search-form">';
					get_Search_form();
				echo '</div>';
				mularx_branding(); 
				header_icons_buttons(); 
				?>
			</div><!--end of container-->
		</div><!--end of wrapper-->
		<div class="wrapper main-navigation-wrapper <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php  mularx_navigation(); ?>
			</div>
		</div>

	<?php }elseif($mularx_selected_header_layout=='header-layout-2'){?>
		 <div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php 
				mularx_navigation();
				mularx_branding(); 
				header_icons_buttons(); 
				?>
			</div><!--end of container-->
		</div><!--end of wrapper-->
	<?php }else{?>
		<div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php 
				$main_menu_align = get_theme_mod('main_header_alignment_position','menu-alignment-left');
				if($main_menu_align=='menu-alignment-left'){
					echo '<span class="left-part combine-div">';
						mularx_branding(); 
						mularx_navigation();
					echo '</span>';
					header_icons_buttons();
				}elseif($main_menu_align=='menu-alignment-right'){
					mularx_branding(); 
					echo '<span class="left-part combine-div">';
						mularx_navigation();
						header_icons_buttons(); 
					echo '</span>';
				}else{
					mularx_branding(); 
					mularx_navigation();
					header_icons_buttons(); 
				}
				?>
			</div><!--end of container-->
		</div><!--end of wrapper-->
	<?php }
}else{
	$mularx_selected_header_layout = 'header-layout-1';
	?>
	<div class="wrapper main-header <?php echo esc_attr($mularx_selected_header_layout);?>">
			<div class="container">
				<?php 
				$main_menu_align = get_theme_mod('main_header_alignment_position','menu-alignment-left');
				if($main_menu_align=='menu-alignment-left'){
					echo '<span class="left-part combine-div">';
						mularx_branding(); 
						mularx_navigation();
					echo '</span>';
					header_icons_buttons();
				}elseif($main_menu_align=='menu-alignment-right'){
					mularx_branding(); 
					echo '<span class="left-part combine-div">';
						mularx_navigation();
						header_icons_buttons(); 
					echo '</span>';
				}else{
					mularx_branding(); 
					mularx_navigation();
					header_icons_buttons(); 
				}
				?>
			</div><!--end of container-->
		</div><!--end of wrapper-->

<?php }