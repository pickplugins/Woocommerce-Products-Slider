<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_action('wp_ajax_wcps_ajax_elements_settings_html', 'wcps_ajax_elements_settings_html');


function wcps_ajax_elements_settings_html(){

    $wcps_builder_control = new wcps_builder_control();

    $class_wcps_functions = new class_wcps_functions();
    $wcps_elements = $class_wcps_functions->wcps_elements();



    $time = '3';
    $args = array();

    $element = isset($_POST['element']) ? $_POST['element'] : '';
    $active_layer = isset($_POST['active_layer']) ? $_POST['active_layer'] : '';
    $wcps_id = isset($_POST['wcps_id']) ? $_POST['wcps_id'] : '';

    $element_name = isset($wcps_elements[$element]['name']) ?$wcps_elements[$element]['name'] : 'Name missing';


    $response = array();

    $html = array();

    ob_start();


    ?>
    <div class="element ">
        <div class="element-title" data-element="<?php echo $element; ?>">
            <?php echo $element_name; ?>
            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options" >

            <?php

            $option_name = 'layer_data['.$active_layer.']['.$time.']';

            $args = array(
                'wcps_id'=>$wcps_id,
                'option_name'=> $option_name,
                'layer_key'=> $active_layer,
                'index'=> $time,

            );

            do_action("layer_element_options_$element", $args);

            ?>
        </div>
    </div>
    <?php



    $html[$element] = ob_get_clean();




    $html = apply_filters('wcps_elements_settings_html', $html);

    $response['html'] = $html[$element];

    echo json_encode( $response );
    die();


}


