<?php
/*
Plugin Name: PickPlugins Product Slider for WooCommerce
Plugin URI: http://pickplugins.com/items/woocommerce-product-slider-for-wordpress/
Description: Fully responsive and mobile ready Carousel Slider for your WooCommerce product. unlimited slider anywhere via short-codes and easy admin setting.
Version: 1.13.0
WC requires at least: 3.0.0
WC tested up to: 3.9
Author: PickPlugins
Text Domain: woocommerce-products-slider
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


class WoocommerceProductsSlider{

	public function __construct(){

		define('wcps_plugin_url', plugins_url('/', __FILE__)  );
		define('wcps_plugin_dir', plugin_dir_path( __FILE__ ) );
		define('wcps_plugin_name', 'PickPlugins Product Slider' );
        define('wcps_plugin_version', '1.13.0' );

        require_once( wcps_plugin_dir . 'includes/class-post-types.php');
        require_once( wcps_plugin_dir . 'includes/class-metabox-wcps.php');
        require_once( wcps_plugin_dir . 'includes/class-metabox-wcps-hook.php');

        require_once( wcps_plugin_dir . 'includes/class-metabox-wcps-layout.php');
        require_once( wcps_plugin_dir . 'includes/class-metabox-wcps-layout-hook.php');
        require_once( wcps_plugin_dir . 'includes/functions-layout-hook.php');
        require_once( wcps_plugin_dir . 'includes/functions-layout-element.php');

        require_once( wcps_plugin_dir . 'templates/wcps-slider/wcps-slider-hook.php');

        require_once( wcps_plugin_dir . 'includes/class-admin-notices.php');
        require_once( wcps_plugin_dir . 'includes/functions-data-upgrade.php');
        require_once( wcps_plugin_dir . 'includes/class-settings.php');
        require_once( wcps_plugin_dir . 'includes/functions-settings-hook.php');



        require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-update.php');
        require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings-tabs.php');


		// to work upload button
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );

		//short-code support into sidebar.
		add_filter('widget_text', 'do_shortcode');

		add_action( 'wp_enqueue_scripts', array( $this, '_front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, '_admin_scripts' ) );

		add_action( 'plugins_loaded', array( $this, '_textdomain' ));


		register_activation_hook( __FILE__, array( $this, '_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, '_deactivation' ) );
        //register_uninstall_hook( __FILE__, array( $this, '_uninstall' ) );
        add_filter('cron_schedules', array($this, 'cron_recurrence_interval'));


		}



	public function _textdomain() {

        $locale = apply_filters('plugin_locale', get_locale(), 'woocommerce-products-slider');
        load_textdomain('woocommerce-products-slider', WP_LANG_DIR . '/woocommerce-products-slider/woocommerce-products-slider-' . $locale . '.mo');

        load_plugin_textdomain('woocommerce-products-slider', false, plugin_basename(dirname(__FILE__)) . '/languages/');

	}




    function cron_recurrence_interval($schedules){

        $schedules['1minute'] = array(
            'interval' => 120,
            'display' => __('1 Minute', 'woocommerce-products-slider')
        );


        return $schedules;
    }


	public function _activation(){


		do_action( 'wcps_plugin_activation' );

		}

    public function _deactivation(){

        wp_clear_scheduled_hook('wcps_cron_upgrade_settings');
        wp_clear_scheduled_hook('wcps_cron_upgrade_wcps');

        do_action( 'wcps_plugin_deactivation' );
    }

	public function _uninstall(){

		do_action( 'wcps_plugin_uninstall' );
		}



	public function _front_scripts(){


        wp_enqueue_script('jquery');

        wp_enqueue_style('font-awesome-4', wcps_plugin_url.'assets/global/css/font-awesome.css');
        wp_enqueue_style('font-awesome-5', wcps_plugin_url.'assets/global/css/fontawesome-5.css');

        wp_enqueue_script('owl.carousel', plugins_url( '/assets/front/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));

        wp_enqueue_style('owl.carousel', wcps_plugin_url.'assets/front/css/owl.carousel.css');
        wp_enqueue_style('animate', wcps_plugin_url.'assets/front/css/animate.css');



		}

	public function _admin_scripts(){

		wp_enqueue_script('jquery');

		wp_enqueue_style('font-awesome-4', wcps_plugin_url.'assets/global/css/font-awesome.css');
        wp_enqueue_style('font-awesome-5', wcps_plugin_url.'assets/global/css/fontawesome-5.min.css');
        wp_enqueue_script('codemirror', plugins_url( 'assets/admin/js/codemirror.js' , __FILE__ ) , array( 'jquery' ));
        wp_enqueue_style('codemirror', wcps_plugin_url.'assets/admin/css/codemirror.css');
        wp_enqueue_style('settings-tabs', wcps_plugin_url.'assets/settings-tabs/settings-tabs.css');
        wp_enqueue_script('settings-tabs', plugins_url( 'assets/settings-tabs/settings-tabs.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script('wp-color-picker');


        $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
        wp_localize_script('jquery', 'cm_settings', $cm_settings);
        wp_enqueue_script('wp-theme-plugin-editor');
        //wp_enqueue_style('wp-codemirror');

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script('jquery-ui-accordion');

        wp_enqueue_style( 'jquery-ui');
        wp_enqueue_style( 'font-awesome-5' );
        wp_enqueue_style( 'settings-tabs' );
        wp_enqueue_script( 'settings-tabs' );



		}

	}

	new WoocommerceProductsSlider();
