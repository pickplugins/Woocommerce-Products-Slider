<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('layer_element_options_title','layer_element_options_title');

function layer_element_options_title($args){

    $wcps_id = $args['wcps_id'];

    $option_name = $args['option_name'];



    $wcps_items_title_font_size = get_post_meta($wcps_id, 'wcps_items_title_font_size', true);
    $wcps_items_title_text_align = get_post_meta($wcps_id, 'wcps_items_title_text_align', true);
    $wcps_items_title_color = get_post_meta($wcps_id, 'wcps_items_title_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class'		=> 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_title_font_size',
        'parent'		=> $option_name,
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
        'parent'		=> $option_name,
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
        'parent'		=> $option_name,
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

function layer_element_options_excerpt($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_items_excerpt_count = get_post_meta($wcps_id, 'wcps_items_excerpt_count', true);
    $wcps_items_excerpt_read_more = get_post_meta($wcps_id, 'wcps_items_excerpt_read_more', true);
    $wcps_items_excerpt_font_color = get_post_meta($wcps_id, 'wcps_items_excerpt_font_color', true);
    $wcps_items_excerpt_text_align = get_post_meta($wcps_id, 'wcps_items_excerpt_text_align', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_items_excerpt_count',
        'parent'		=> $option_name,
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
        'parent'		=> $option_name,
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

function layer_element_options_price($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];
    $wcps_total_items_price_format = get_post_meta($wcps_id, 'wcps_total_items_price_format', true);

    $wcps_items_price_font_size = get_post_meta($wcps_id, 'wcps_items_price_font_size', true);
    $wcps_items_price_text_align = get_post_meta($wcps_id, 'wcps_items_price_text_align', true);
    $wcps_items_price_color = get_post_meta($wcps_id, 'wcps_items_price_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

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
        'parent'		=> $option_name,
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
        'parent'		=> $option_name,
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



add_action('layer_element_options_category','layer_element_options_category');

function layer_element_options_category($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_items_cat_separator = get_post_meta($wcps_id, 'wcps_items_cat_separator', true);

    $wcps_items_cat_font_size = get_post_meta($wcps_id, 'wcps_items_cat_font_size', true);
    $wcps_items_cat_text_align = get_post_meta($wcps_id, 'wcps_items_cat_text_align', true);
    $wcps_items_cat_font_color = get_post_meta($wcps_id, 'wcps_items_cat_font_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_cat_font_size',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items category font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_cat_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_cat_separator',
        'parent'		=> $option_name,
        'title'		=> __('Category separator','woocommerce-products-slider'),
        'details'	=> __('Items category separator custom text','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_cat_separator,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_items_cat_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items category text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_items_cat_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);



    $args = array(
        'id'		=> 'wcps_items_cat_font_color',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items category text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_cat_font_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}





add_action('layer_element_options_tag','layer_element_options_tag');

function layer_element_options_tag($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_items_tag_separator = get_post_meta($wcps_id, 'wcps_items_tag_separator', true);

    $wcps_items_tag_font_size = get_post_meta($wcps_id, 'wcps_items_tag_font_size', true);
    $wcps_items_tag_text_align = get_post_meta($wcps_id, 'wcps_items_tag_text_align', true);
    $wcps_items_tag_font_color = get_post_meta($wcps_id, 'wcps_items_tag_font_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_tag_font_size',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items tag font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_tag_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_tag_separator',
        'parent'		=> $option_name,
        'title'		=> __('Tag separator','woocommerce-products-slider'),
        'details'	=> __('Items tag separator custom text','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_tag_separator,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_items_tag_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items tag text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_items_tag_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);



    $args = array(
        'id'		=> 'wcps_items_tag_font_color',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items tag text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_tag_font_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}



add_action('layer_element_options_rating','layer_element_options_rating');

function layer_element_options_rating($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_items_ratings_font_size = get_post_meta($wcps_id, 'wcps_items_ratings_font_size', true);
    $wcps_ratings_text_align = get_post_meta($wcps_id, 'wcps_ratings_text_align', true);
    $wcps_items_ratings_color = get_post_meta($wcps_id, 'wcps_items_ratings_color', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_ratings_font_size',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items tag font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_ratings_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_ratings_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items tag text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_ratings_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);



    $args = array(
        'id'		=> 'wcps_items_ratings_color',
        'parent'		=> $option_name,
        'title'		=> __('Color','woocommerce-products-slider'),
        'details'	=> __('Items text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_ratings_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}



add_action('layer_element_options_cart','layer_element_options_cart');

function layer_element_options_cart($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_cart_style = get_post_meta($wcps_id, 'wcps_cart_style', true);

    $wcps_items_cart_font_size = get_post_meta($wcps_id, 'wcps_items_cart_font_size', true);
    $wcps_cart_text_align = get_post_meta($wcps_id, 'wcps_cart_text_align', true);
    $wcps_cart_bg = get_post_meta($wcps_id, 'wcps_cart_bg', true);
    $wcps_cart_text_color = get_post_meta($wcps_id, 'wcps_cart_text_color', true);
    $wcps_cart_display_quantity = get_post_meta($wcps_id, 'wcps_cart_display_quantity', true);


    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_cart_style',
        //'parent'		=> '',
        'title'		=> __('Cart button style','woocommerce-products-slider'),
        'details'	=> __('Items cart button style','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_cart_style,
        'default'		=> 'no',
        'args'		=> array(
            'default'=>__('Default','woocommerce-products-slider'),
            'custom'=>__('Custom','woocommerce-products-slider'),

        ),
    );

    $args = array(
        'id'		=> 'wcps_cart_display_quantity',
        //'parent'		=> '',
        'title'		=> __('Cart button style','woocommerce-products-slider'),
        'details'	=> __('Items cart button style','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_cart_display_quantity,
        'default'		=> 'no',
        'args'		=> array(
            'yes'=>__('Yes','woocommerce-products-slider'),
            'no'=>__('No','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_items_cart_font_size',
        'parent'		=> $option_name,
        'title'		=> __('Font size','woocommerce-products-slider'),
        'details'	=> __('Items tag font size','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_items_cart_font_size,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    $args = array(
        'id'		=> 'wcps_cart_text_align',
        //'parent'		=> '',
        'title'		=> __('Text align','woocommerce-products-slider'),
        'details'	=> __('Items cart text align','woocommerce-products-slider'),
        'type'		=> 'select',
        'value'		=> $wcps_cart_text_align,
        'default'		=> 'no',
        'args'		=> array(
            'left'=>__('Left','woocommerce-products-slider'),
            'right'=>__('Right','woocommerce-products-slider'),
            'center'=>__('Center','woocommerce-products-slider'),

        ),
    );

    $wcps_builder_control->generate_field($args);



    $args = array(
        'id'		=> 'wcps_cart_bg',
        'parent'		=> $option_name,
        'title'		=> __('Background color','woocommerce-products-slider'),
        'details'	=> __('cart Background color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_cart_bg,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_cart_text_color',
        'parent'		=> $option_name,
        'title'		=> __('Cart text color','woocommerce-products-slider'),
        'details'	=> __('Items cart text color','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_cart_text_color,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}





add_action('layer_element_options_sale','layer_element_options_sale');

function layer_element_options_sale($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_sale_icon_url = get_post_meta($wcps_id, 'wcps_sale_icon_url', true);

    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);
    $args = array(
        'id'		=> 'wcps_sale_icon_url',
        'parent'		=> $option_name,
        'title'		=> __('Sale marker icon url','woocommerce-products-slider'),
        'details'	=> __('Items sale marker icon url','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_sale_icon_url,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}




add_action('layer_element_options_featured','layer_element_options_featured');

function layer_element_options_featured($args){
    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_featured_icon_url = get_post_meta($wcps_id, 'wcps_featured_icon_url', true);

    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_featured_icon_url',
        'parent'		=> $option_name,
        'title'		=> __('Featured marker icon url','woocommerce-products-slider'),
        'details'	=> __('Items featured marker icon url','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_featured_icon_url,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}





add_action('layer_element_options_sale_count','layer_element_options_sale_count');

function layer_element_options_sale_count($args){

    $wcps_id = $args['wcps_id'];
    $option_name = $args['option_name'];

    $wcps_sale_count_text = get_post_meta($wcps_id, 'wcps_sale_count_text', true);

    $wcps_builder_control = new wcps_builder_control();

    $args = array(
        'id'		=> 'element_id',
        'parent'		=> $option_name,
        'title'		=> __('Element id','woocommerce-products-slider'),
        'details'	=> '',
        'type'		=> 'hidden',
        'control_group_class' => 'hidden',
        'value'		=> 'title',

    );

    $wcps_builder_control->generate_field($args);

    $args = array(
        'id'		=> 'wcps_sale_count_text',
        'parent'		=> $option_name,
        'title'		=> __('Sale count text','woocommerce-products-slider'),
        'details'	=> __('Items sale count text','woocommerce-products-slider'),
        'type'		=> 'text',
        'value'		=> $wcps_sale_count_text,
        'default'		=> '',
        'placeholder'		=> '',
    );

    $wcps_builder_control->generate_field($args);


    ?>

    <?php
}







