<?php

Class Munk_Sites {
    static $_instance = null;
    const THEME_NAME = 'munk';


    function admin_scripts( $id ){
        if( $id == 'appearance_page_munk-sites' ){
            wp_enqueue_style('owl.carousel', MUNK_SITES_URL.'/assets/css/owl.carousel.css' );
            wp_enqueue_style('owl.theme.default', MUNK_SITES_URL.'/assets/css/owl.theme.default.css' );
            wp_enqueue_style('munk-sites', MUNK_SITES_URL.'/assets/css/munk-sites.css', '', MUNK_SITES_VERSION );

            wp_enqueue_script('owl.carousel', MUNK_SITES_URL.'/assets/js/owl.carousel.min.js',  array( 'jquery' ), false, true );
            wp_enqueue_script('munk-sites', MUNK_SITES_URL.'/assets/js/backend.js',  array( 'jquery', 'underscore' ), MUNK_SITES_VERSION, true );
            wp_localize_script('munk-sites', 'Munk_Sites',  $this->get_localize_script() );
        }
    }

    static function get_instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            add_action( 'admin_menu', array( self::$_instance, 'add_menu' ), 50 );
            add_action( 'admin_enqueue_scripts', array( self::$_instance, 'admin_scripts' ) );
            add_action( 'admin_notices', array( self::$_instance, 'admin_notice' ) );
        }
        return self::$_instance;
    }

    function admin_notice( $hook ) {
        $screen = get_current_screen();
        if( $screen->id != 'appearance_page_munk-sites' && $screen->id != 'themes' ) {
            return '';
        }

        if( get_template() == self::THEME_NAME  ) {
            return '';
        }

        $themes = wp_get_themes();
        if ( isset( $themes[ self::THEME_NAME ] ) ) {
            $url = esc_url( 'themes.php?theme='.self::THEME_NAME );
        } else {
            $url = esc_url( 'theme-install.php?search='.self::THEME_NAME );
        }

        $html = sprintf( '<strong>Munk Sites</strong> work better with <strong>Munk WordPress theme</strong>. <a href="%1$s">Install &amp; Activate Now</a>', $url );
        ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <?php echo $html; ?>
            </p>
        </div>
        <?php
    }

    static function get_api_url(){
        return apply_filters( 'munk_sites/api_url', 'https://wpmunk.com/wp-json/munk-sites/v2/api/' );		
    }

    function add_menu() {
        add_theme_page(__( 'Munk Sites', 'munk-sites' ), __( 'Munk Sites', 'munk-sites' ), 'edit_theme_options', 'munk-sites', array( $this, 'page' ));
    }

    function page(){
        echo '<div class="wrap munk_sites_wrapper">';
        require_once MUNK_SITES_PATH.'/templates/header.php';       
        require_once MUNK_SITES_PATH.'/templates/dashboard.php';
        require_once MUNK_SITES_PATH.'/templates/modal.php';
        echo '</div>';
        require_once MUNK_SITES_PATH.'/templates/preview.php';
    }

    function get_installed_plugins(){
        // Check if get_plugins() function exists. This is required on the front end of the
        // site, since it is in a file that is normally only loaded in the admin.
        if ( ! function_exists( 'get_plugins' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $all_plugins = get_plugins();
        if ( ! is_array( $all_plugins ) ) {
            $all_plugins = array();
        }

        $plugins = array();
        foreach ( $all_plugins as $file => $info ) {
            $slug = dirname( $file );
            $plugins[ $slug ] = $info['Name'];
        }

        return $plugins;
    }

    function get_activated_plugins(){
        $activated_plugins = array();
        foreach( ( array ) get_option('active_plugins') as $plugin_file ) {
            $plugin_file = dirname( $plugin_file );
            $activated_plugins[ $plugin_file ] = $plugin_file;
        }
        return $activated_plugins;
    }

    function get_support_plugins(){
        $plugins = array(
            'munk-pro' => _x( 'Munk Pro', 'plugin-name', 'munk-sites' ),
            'elementor' => _x( 'Elementor', 'plugin-name', 'munk-sites' ),
            'elementor-pro' => _x( 'Elementor Pro', 'plugin-name', 'munk-sites' ),
            'beaver-builder-lite-version' => _x( 'Beaver Builder', 'plugin-name', 'munk-sites' ),
            'contact-form-7' => _x( 'Contact Form 7', 'plugin-name', 'munk-sites' ),
            'breadcrumb-navxt' => _x( 'Breadcrumb NavXT', 'plugin-name', 'munk-sites' ),
            'jetpack' => _x( 'JetPack', 'plugin-name', 'munk-sites' ),
            'polylang' => _x( 'Polylang', 'plugin-name', 'munk-sites' ),
            'woocommerce' => _x( 'WooCommerce', 'plugin-name', 'munk-sites' ),
        );

        return $plugins;
    }

    function is_license_valid(){

        if ( ! class_exists('Munk_Pro' ) ) {
            return false;
        }
        
	    $pro_data = get_option('munk_pro_license_data');
        
	    if ( ! is_array( $pro_data ) ) {
	        return false;
        }
        
	    if ( ! isset( $pro_data['license'] ) ) {
		    return false;
	    }

	    if ( isset( $pro_data['license'] ) && $pro_data['license'] == 'valid' &&  $pro_data['success'] ) {
            return true;
        }

        return false;
    }

    function get_localize_script(){

        $args = array(
            'api_url' => self::get_api_url(),
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'is_admin' => is_admin(),
            'try_again' => __( 'Try Again', 'munk-sites' ),
            'pro_text' => __( 'Pro only', 'munk-sites' ),
            'activated_plugins' => $this->get_activated_plugins(),
            'installed_plugins' => $this->get_installed_plugins(),
            'support_plugins' => $this->get_support_plugins(),
            'license_valid' =>   $this->is_license_valid(),
        );

        $args['elementor_clear_cache_nonce'] = wp_create_nonce( 'elementor_clear_cache' );
        $args['elementor_reset_library_nonce'] = wp_create_nonce( 'elementor_reset_library' );

        return $args;
    }

}
