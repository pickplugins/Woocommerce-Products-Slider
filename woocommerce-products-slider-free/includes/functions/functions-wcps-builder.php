<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('layer_element_options_title','layer_element_options_title');

function layer_element_options_title($wcps_id){


    $wcps_items_title_font_size = get_post_meta($wcps_id, 'wcps_items_title_font_size', true);
    $wcps_items_title_text_align = get_post_meta($wcps_id, 'wcps_items_title_text_align', true);
    $wcps_items_title_color = get_post_meta($wcps_id, 'wcps_items_title_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'wcps_items_title_font_size',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items title font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_title_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);




    $args = array(
        'id'		=> 'wcps_items_title_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items title text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_items_title_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_items_title_color',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items title font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_title_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}





add_action('layer_element_options_excerpt','layer_element_options_excerpt');

function layer_element_options_excerpt($wcps_id){


    $wcps_items_excerpt_count = get_post_meta($wcps_id, 'wcps_items_excerpt_count', true);
    $wcps_items_excerpt_read_more = get_post_meta($wcps_id, 'wcps_items_excerpt_read_more', true);
    $wcps_items_excerpt_font_color = get_post_meta($wcps_id, 'wcps_items_excerpt_font_color', true);
    $wcps_items_excerpt_text_align = get_post_meta($wcps_id, 'wcps_items_excerpt_text_align', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'wcps_items_excerpt_count',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Word count','woocommerce-products-slider'),
        'details'	=> __('Excerpt word count','woocommerce-products-slider'),
        'type'		=> 'number',
        'value'		=> $wcps_items_excerpt_count,
        'default'		=> '20',
        'placeholder'		=> '20',
    );

    $wcps_builder_control->generate_field($args);




    $args = array(
        'id'		=> 'wcps_items_excerpt_read_more',
        //'parent'		=> '',
        'title'		=> __('Read more text','woocommerce-products-slider'),
        'details'	=> __('Excerpt read more text','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_excerpt_read_more,
        'default'		=> 'View product.',
        'placeholder'		=> 'View product',

    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_items_excerpt_font_color',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Text color','woocommerce-products-slider'),
        'details'	=> __('Items excerpt text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_excerpt_font_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_excerpt_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items title text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_items_excerpt_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);

    ?>

    <?php
}




add_action('layer_element_options_price','layer_element_options_price');

function layer_element_options_price($wcps_id){

    $wcps_total_items_price_format = get_post_meta($wcps_id, 'wcps_total_items_price_format', true);

    $wcps_items_price_font_size = get_post_meta($wcps_id, 'wcps_items_price_font_size', true);
    $wcps_items_price_text_align = get_post_meta($wcps_id, 'wcps_items_price_text_align', true);
    $wcps_items_price_color = get_post_meta($wcps_id, 'wcps_items_price_color', true);


    $wcps_builder_control = new wcps_builder_control();


    $args = array(
        'id'		=> 'wcps_total_items_price_format',
        //'parent'		=> '',
        'title'		=> __('Price format','woocommerce-products-slider'),
        'details'	=> __('Price format on slider','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_total_items_price_format,
        'default'		=> 'full',
        'args'		=> array(
            'full'=>__('Full format','woocommerce-products-slider'),
            'sale'=>__('Sale price','woocommerce-products-slider'),
            'regular'=>__('Regular price','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_price_font_size',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items title font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_price_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);




    $args = array(
        'id'		=> 'wcps_items_price_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items title text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_items_price_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);



    $args = array(
        'id'		=> 'wcps_items_price_color',
        //'parent'		=> 'post_grid_meta_options',
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items price text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_price_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}









