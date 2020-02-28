<?php
if ( ! defined('ABSPATH')) exit; // if direct access 

class class_wcps_notices{

    public function __construct(){

        add_action('admin_notices', array( $this, 'data_upgrade' ));

    }

    public function data_upgrade(){

        $wcps_plugin_info = get_option('wcps_plugin_info');
        $wcps_upgrade = isset($wcps_plugin_info['wcps_upgrade']) ? $wcps_plugin_info['wcps_upgrade'] : '';


        $actionurl = admin_url().'edit.php?post_type=wcps&page=upgrade_status';
        $actionurl = wp_nonce_url( $actionurl,  'wcps_upgrade' );

        $nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : '';
        var_dump($wcps_plugin_info);

        //var_dump($wcps_plugin_info);

        if ( wp_verify_nonce( $nonce, 'wcps_upgrade' )  ){
            $wcps_plugin_info['wcps_upgrade'] = 'processing';
            update_option('wcps_plugin_info', $wcps_plugin_info);
            var_dump($wcps_plugin_info);

            wp_schedule_event(time(), '1minute', 'wcps_cron_upgrade_settings');

            return;
        }


        if(empty($wcps_upgrade)){

            $tutorial_link = 'https://www.youtube.com/watch?v=iiH8FjNPGFw';

            ?>
            <div class="update-nag">
                <?php
                echo sprintf(__('Data migration required for <b>PickPlugins Product Slider</b> plugin, please <a class="button button-primary" href="%s">click to start</a> migration. watch this <a target="_blank" href="%s">video</a> first.', 'woocommerce-products-slider'), $actionurl, $tutorial_link)
                ?>
            </div>
            <?php


        }

    }

}

new class_wcps_notices();