<?php
/**
 * Adding Admin Notice for recommended plugins
 */
if( ! function_exists( 'mularx_welcome_notice' ) ) :
    function mularx_welcome_notice() {
            global $pagenow;
            // $theme_args      = wp_get_theme();
            // $name            = $theme_args->__get( 'Name' );
            $meta            = get_option( 'mularx-welcome-notice-update' );
            $current_screen  = get_current_screen();

            if ( is_admin() && !$meta ) {
                
                if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
                    return;
                }

                if ( is_network_admin() ) {
                    return;
                }

                if ( ! current_user_can( 'manage_options' ) ) {
                    return;
                } ?>
                <div class="notice notice-info is-dismissible content-install-plugin theme-info-notice">

                    <div class="theme-screen">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/image/theme_screen.png'); ?>" />
                    </div>
                     <div class="info-content">
                        <h2><?php echo __('Welcome! Thank you for choosing MularX!','mularx');?></h2>
                        <h4>
                            <?php echo __('To get fully advantage of theme please install and activate recommended plugins listed below at recommended plugin section.','mularx');?>
                            </h4>
                        <h4><a href="<?php echo admin_url();?>themes.php?page=tgmpa-install-plugins&plugin_status=install"><?php echo __('Getting Started','mularx');?></a> <?php echo __('with installing and activating recommended plugins.','mularx');?></h4>
                           
                       <a target="_blank" href="https://walkerwp.com/mularx/" class="admin-button info-button"><?php echo __('More Information','mularx');?></a>
                        
                    
                        <a href="<?php echo admin_url();?>themes.php?mularx-welcome-notice-update=true" class="admin-button dismiss-notice btn-notice-dismiss"><?php echo __('Dismiss Notice','mularx');?></a>
                   
                    </div>
                 </div>
            <?php 
            }
        }
    endif;
    add_action( 'admin_notices', 'mularx_welcome_notice' );


    if( ! function_exists( 'mularx_ignore_admin_notice' ) ) :
        /**
         * ignore notice if dismissed!
         */
        function mularx_ignore_admin_notice() {

            if ( isset( $_GET['mularx-welcome-notice-update'] ) && $_GET['mularx-welcome-notice-update'] = 'true' ) {
                update_option( 'mularx-welcome-notice-update', true );
            }
        }
    endif;
    add_action( 'admin_init', 'mularx_ignore_admin_notice' );