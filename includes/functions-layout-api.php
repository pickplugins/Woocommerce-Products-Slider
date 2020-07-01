<?php
if ( ! defined('ABSPATH')) exit;  // if direct access




/*
 * Ajax Function to fetch block from http://wcps.com/ server
 *
 * */
function wcps_ajax_fetch_block_hub_by_id(){



    check_ajax_referer( 'wcps_ajax_nonce', 'wcps_ajax_nonce' );

    if(!current_user_can('manage_options')) return;


    $responses = array();

    $post_id = isset($_POST['post_id']) ? sanitize_text_field($_POST['post_id']) : 0;


    $html = '';
    $api_params = array(
        'block_hub_remote_action' => 'blockSearchByID',
        'post_id' => $post_id,
    );




    // Send query to the license manager server
    $server_response = wp_remote_get(add_query_arg($api_params, wcps_server_url), array('timeout' => 20, 'sslverify' => false));


    /*
     * Check is there any server error occurred
     *
     * */
    if (is_wp_error($server_response)){
        $responses['error'] = __('There is a server error', 'wp-block-hub');
    }
    else{

        $response_data = json_decode(wp_remote_retrieve_body($server_response));

        //$response_data = json_decode($response_data);

        $post_title = isset($response_data->post_title) ? ($response_data->post_title) : '';
//        $post_id = isset($response_data->post_id) ? ($response_data->post_id) : 0;
//        $download_count = isset($response_data->download_count) ? sanitize_text_field($response_data->download_count) : 0;
//
        $layout_options = isset($response_data->layout_options) ? (array)($response_data->layout_options) : array();
        $layout_elements_data = isset($response_data->layout_elements_data) ? (array)($response_data->layout_elements_data) : array();
        $custom_scripts = isset($response_data->custom_scripts) ? (array)($response_data->custom_scripts) : array();



        $post_found = isset($response_data->post_found) ? sanitize_text_field($response_data->post_found) : 'no';
//        $responses['download_count'] = $download_count;



        // Create post object
        $my_post = array(
            'post_title'    => $post_title,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'wcps_layout',
        );

        // Insert the post into the database
        $new_post_id = wp_insert_post( $my_post );

        update_post_meta($new_post_id, 'layout_options', $layout_options);
        update_post_meta($new_post_id, 'layout_elements_data', $layout_elements_data);
        update_post_meta($new_post_id, 'custom_scripts', $custom_scripts);


        $responses['is_saved'] = 'yes';
        $responses['post_title'] = $post_title;
        $responses['post_id'] = $post_id;
        $responses['response_data'] = $response_data;




    }


    echo json_encode( $responses );
    die();
}


add_action('wp_ajax_wcps_ajax_fetch_block_hub_by_id', 'wcps_ajax_fetch_block_hub_by_id');
//add_action('wp_ajax_nopriv_wcps_ajax_fetch_block_hub_by_id', 'wcps_ajax_fetch_block_hub_by_id');
