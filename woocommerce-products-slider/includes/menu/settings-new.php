<?php	


/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



$wcps_settings_tab = array();

$wcps_settings_tab[] = array(
    'id' => 'options',
    'title' => __('<i class="fas fa-cog"></i> Options','woocommerce-products-slider'),
    'priority' => 1,
    'active' => true,
);

$wcps_settings_tab[] = array(
    'id' => 'license',
    'title' => __('<i class="fas fa-key"></i> License','woocommerce-products-slider'),
    'priority' => 2,
    'active' => false,
);




//$wcps_settings_tab[] = array(
//    'id' => 'our_plugins',
//    'title' => __('<i class="fa fa-cubes"></i> Our Plugins','woocommerce-products-slider'),
//    'priority' => 2,
//    'active' => false,
//);




$wcps_settings_tabs = apply_filters('wcps_settings', $wcps_settings_tab);


$tabs_sorted = array();
foreach ($wcps_settings_tabs as $page_key => $tab) $tabs_sorted[$page_key] = isset( $tab['priority'] ) ? $tab['priority'] : 0;
array_multisort($tabs_sorted, SORT_ASC, $wcps_settings_tabs);













?>





<div class="wrap">


    <h2><?php echo __('PickPlugins WooCommerce Products Slider - Settings','woocommerce-products-slider')?></h2><br>

    <?php

    if(empty($_POST['wcps_hidden'])) {

        $wcps_license = get_option('wcps_license');
        $license_key = isset($wcps_license['license_key']) ? $wcps_license['license_key'] : '';
        $wcps_track_product_view = get_option( 'wcps_track_product_view' );
        $wcps_load_script_pages = get_option( 'wcps_load_script_pages' );

    }
    else{

        $nonce = sanitize_text_field($_POST['_wpnonce']);

        if(wp_verify_nonce( $nonce, 'wcps_nonce' ) && $_POST['wcps_hidden'] == 'Y') {

            $license_key = sanitize_text_field($_POST['license_key']);
            $wcps_license = array(
                'license_key'=>$license_key,
                'license_status'=>'pending',

            );

            update_option('wcps_license', $wcps_license);

            $wcps_track_product_view = sanitize_text_field($_POST['wcps_track_product_view']);
            update_option('wcps_track_product_view', $wcps_track_product_view);

            $wcps_load_script_pages = sanitize_text_field($_POST['wcps_load_script_pages']);
            update_option('wcps_load_script_pages', $wcps_load_script_pages);



            ?>
            <div class="updated notice  is-dismissible"><p><strong><?php _e('Changes Saved.', 'woocommerce-products-slider' ); ?></strong></p></div>

            <?php
        }
    }



    //var_dump($wcps_1);

    ?>

 
        <form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="wcps_hidden" value="Y">


            <div class="clear clearfix"></div>
            <div class="wcps-settings">
                <div class="settings-tabs vertical">
                    <ul class="tab-navs">
                        <?php
                        foreach ($wcps_settings_tabs as $tab){
                            $id = $tab['id'];
                            $title = $tab['title'];
                            $active = $tab['active'];
                            $data_visible = isset($tab['data_visible']) ? $tab['data_visible'] : '';
                            $hidden = isset($tab['hidden']) ? $tab['hidden'] : false;
                            ?>
                            <li class="tab-nav <?php if($hidden) echo 'hidden';?> <?php if($active) echo 'active';?>" data-id="<?php echo $id; ?>"><?php echo $title; ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                    foreach ($wcps_settings_tabs as $tab){
                        $id = $tab['id'];
                        $title = $tab['title'];
                        $active = $tab['active'];


                        ?>

                        <div class="tab-content <?php if($active) echo 'active';?>" id="<?php echo $id; ?>">
                            <?php
                            do_action('wcps_settings_'.$id, $tab);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="clear clearfix"></div>



            <p class="submit">
                <?php wp_nonce_field( 'wcps_nonce' ); ?>
                <input type="submit" name="submit" value="<?php _e('Update', 'woocommerce-products-slider'); ?>" class="button-primary" />

            </p>
        </form>

























</div>
