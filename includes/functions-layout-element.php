<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('wcps_layout_element_post_title', 'wcps_layout_element_post_title');
function wcps_layout_element_post_title($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';

    $post_data = get_post($product_id);
    $post_title = isset($post_data->post_title) ? $post_data->post_title : '';
    $post_title = apply_filters('wcps_layout_element_title_text', $post_title, $args);


    $element_class = !empty($element_index) ? 'wcps-items-title element-'.$element_index : 'wcps-items-title';
    $element_class = apply_filters('wcps_layout_element_title_class', $element_class, $args);

    ?>
    <div class="<?php echo $element_class; ?>"><?php echo $post_title; ?></div>
    <?php

}



add_action('wcps_layout_element_thumbnail', 'wcps_layout_element_thumbnail');
function wcps_layout_element_thumbnail($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-thumb element-'.$element_index : 'wcps-items-thumb';
    $element_class = apply_filters('wcps_layout_element_thumbnail_class', $element_class, $args);

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();

    $permalink = get_permalink($product_id);
    $product_url = apply_filters('wcps_layout_element_thumbnail_url', $permalink, $args);




    $thumb_size = isset($elementData['thumb_size']) ? $elementData['thumb_size'] : 'full';

    //echo '<pre>'.var_export($elementData, true).'</pre>';

    $wcps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), $thumb_size);
    $member_image_url = isset($wcps_thumb[0]) ? $wcps_thumb[0] : '';


    $member_image_url = apply_filters('wcps_layout_element_thumbnail_src', $member_image_url, $args);


    //echo '<pre>'.var_export($member_image_url, true).'</pre>';

    if(!empty($member_image_url)){
        ?>
        <div class=" <?php echo $element_class; ?>"><a href="<?php echo $product_url; ?>"><img src="<?php echo $member_image_url; ?>" /></a></div>
        <?php

    }

}








add_action('wcps_layout_element_meta', 'wcps_layout_element_meta');
function wcps_layout_element_meta($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $meta_key = isset($elementData['meta_key']) ? $elementData['meta_key'] : '';
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';


    //echo '<pre>'.var_export($wrapper_html, true).'</pre>';

    $meta_key_value = get_post_meta($product_id, $meta_key, true);

    if(!empty($meta_key_value)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $meta_key_value); ?></div>
    <?php
    endif;


}




add_action('wcps_layout_element_content', 'wcps_layout_element_content');
function wcps_layout_element_content($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-excerpt element-'.$element_index : 'wcps-items-excerpt';
    $element_class = apply_filters('wcps_layout_element_content_class', $element_class, $args);

    //echo '<pre>'.var_export($args, true).'</pre>';

    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $content_source = isset($elementData['content_source']) ? $elementData['content_source'] : 'excerpt';
    $read_more_text = isset($elementData['read_more_text']) ? $elementData['read_more_text'] : '';
    $word_count = isset($elementData['word_count']) ? $elementData['word_count'] : 15;

    $post_data= get_post($product_id);

    $product_url = get_permalink($product_id);
    $product_url = apply_filters('wcps_layout_element_content_link',$product_url, $args);

    $content = isset($post_data->post_content) ? $post_data->post_content : '';

    $content_html = '';

    if($content_source=='content'){
        $content_html.= do_shortcode($content);
    }
    elseif($content_source=='excerpt'){

        $content_html.= wp_trim_words( $content , $word_count, ' <a class="read-more" href="'. $product_url .'">'.$read_more_text.'</a>' );
    }else{
        $content_html.= wp_trim_words( $content , $word_count, ' <a class="read-more" href="'. $product_url .'">'.$read_more_text.'</a>' );
    }


    ?>
    <div class="<?php echo $element_class; ?>"><?php echo $content_html; ?></div>
    <?php

}



add_action('wcps_layout_element_product_category', 'wcps_layout_element_product_category');
function wcps_layout_element_product_category($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-category element-'.$element_index : 'wcps-items-category';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $max_count = isset($elementData['max_count']) ? (int) $elementData['max_count'] : '';
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    $term_list = wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'all' ) );

    $categories_html = '';

    $term_total_count = count($term_list);
    //echo '<pre>'.var_export($term_total_count, true).'</pre>';

    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    $i = 0;
    foreach ($term_list as $term){


        if($i >= $max_count){
            continue;
        }


        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';

        $term_link = get_term_link($term_id);

        $categories_html .= '<a href="'.$term_link.'">'.$term_name.'</a>';
        if( $i+1 < $max_term_limit){
            $categories_html .= ', ';
        }




        $i++;
    }

    //echo '<pre>'.var_export($term_list, true).'</pre>';

    if(!empty($term_total_count)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $categories_html); ?></div>
    <?php
    endif;


}



add_action('wcps_layout_element_product_tag', 'wcps_layout_element_product_tag');
function wcps_layout_element_product_tag($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-tags element-'.$element_index : 'wcps-items-tags';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $max_count = isset($elementData['max_count']) ? (int) $elementData['max_count'] : '';
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    $term_list = wp_get_post_terms( $product_id, 'product_tag', array( 'fields' => 'all' ) );

    $categories_html = '';

    $term_total_count = count($term_list);
    //echo '<pre>'.var_export($term_total_count, true).'</pre>';

    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    $i = 0;
    foreach ($term_list as $term){


        if($i >= $max_count){
            continue;
        }


        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';

        $term_link = get_term_link($term_id);

        $categories_html .= '<a href="'.$term_link.'">'.$term_name.'</a>';
        if( $i+1 < $max_term_limit){
            $categories_html .= ', ';
        }




        $i++;
    }

    //echo '<pre>'.var_export($term_list, true).'</pre>';

    if(!empty($term_total_count)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $categories_html); ?></div>
    <?php
    endif;


}


add_action('wcps_layout_element_sale_count', 'wcps_layout_element_sale_count');
function wcps_layout_element_sale_count($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-sale-count element-'.$element_index : 'wcps-items-sale-count';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    global $product;
    $total_sales = $product->get_total_sales();

    if(!empty($total_sales)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $total_sales); ?></div>
    <?php
    endif;
}





add_action('wcps_layout_element_add_to_cart', 'wcps_layout_element_add_to_cart');
function wcps_layout_element_add_to_cart($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-cart element-'.$element_index : 'wcps-items-cart';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['cart_text']) ? $elementData['cart_text'] : '';

    $cart_html = do_shortcode('[add_to_cart show_price="false" quantity="1" id="'.$product_id.'"]');



    ?>
    <div class="woocommerce <?php echo $element_class; ?>"><?php echo $cart_html; ?></div>
    <?php

}



add_action('wcps_layout_element_product_price', 'wcps_layout_element_product_price');
function wcps_layout_element_product_price($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-price element-'.$element_index : 'wcps-items-price';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['cart_text']) ? $elementData['cart_text'] : '';
    $price_type = isset($elementData['price_type']) ? $elementData['price_type'] : '';
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';
    $currency = get_woocommerce_currency_symbol();
    global $product;

    $string = get_woocommerce_price_format();



    if ($price_type == 'full') {
        $price_html = $product->get_price_html();
    } elseif ($price_type == 'sale') {


        $price_html = $product->get_sale_price();

    } elseif ($price_type == 'regular') {

        $price_html = $product->get_regular_price();
        $price_html = wc_price($price_html);

    } else {
        $price_html = $product->get_price_html();
        $price_html = wc_price($price_html);

    }


    //echo '<pre>'.var_export(wc_price($price_html), true).'</pre>';

    if(!empty($price_html)):
        ?>
        <div class=" <?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $price_html); ?></div>
        <?php
    endif;



}





add_action('wcps_layout_element_stock_status', 'wcps_layout_element_stock_status');
function wcps_layout_element_stock_status($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $stock_status_text = isset($elementData['stock_status_text']) ? $elementData['stock_status_text'] : '';
    $out_stock_status_text = isset($elementData['out_stock_status_text']) ? $elementData['out_stock_status_text'] : '';

    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    global $product;
    $is_in_stock = $product->is_in_stock();
    $managing_stock = $product->managing_stock();

    //echo '<pre>'.var_export($managing_stock, true).'</pre>';

    if($managing_stock  ):
        if($is_in_stock):
            ?>
            <div class="woocommerce <?php echo $element_class; ?>"><?php echo $stock_status_text; ?></div>
        <?php
        else:
            ?>
            <div class="woocommerce <?php echo $element_class; ?>"><?php echo $out_stock_status_text; ?></div>
        <?php
        endif;

    endif;


}

add_action('wcps_layout_element_stock_quantity', 'wcps_layout_element_stock_quantity');
function wcps_layout_element_stock_quantity($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    global $product;
    $stock_quantity = $product->get_stock_quantity();

    if(!empty($stock_quantity)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $stock_quantity); ?></div>
    <?php
    endif;
}




add_action('wcps_layout_element_product_weight', 'wcps_layout_element_product_weight');
function wcps_layout_element_product_weight($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';
    $weight_unit = get_option( 'woocommerce_weight_unit' );

    global $product;
    $weight = $product->get_weight() . $weight_unit;
    $has_weight = $product->has_weight();



    if($has_weight && !empty($weight)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $weight); ?></div>
    <?php
    endif;
}



add_action('wcps_layout_element_product_dimensions', 'wcps_layout_element_product_dimensions');
function wcps_layout_element_product_dimensions($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';
    $dimension_unit = get_option( 'woocommerce_dimension_unit' );

    global $product;
    $dimensions = $product->get_dimensions();
    $has_dimensions = $product->has_dimensions();



    if($has_dimensions && !empty($dimensions)):
        ?>
        <div class="<?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $dimensions); ?></div>
    <?php
    endif;
}


add_action('wcps_layout_element_rating', 'wcps_layout_element_rating');
function wcps_layout_element_rating($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'wcps-items-rating element-'.$element_index : 'wcps-items-rating';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $rating_type = isset($elementData['rating_type']) ? $elementData['rating_type'] : '';
    $wrapper_html = isset($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '';
    $wrapper_html = !empty($wrapper_html) ? $wrapper_html : '%s';

    global $product;
    $average_rating = $product->get_average_rating();
    $rating_html = wc_get_rating_html( $average_rating );


    if($average_rating > 0):
        ?>
        <div class="woocommerce <?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $rating_html); ?></div>
        <?php
    endif;


}





add_action('wcps_layout_element_wrapper_start', 'wcps_layout_element_wrapper_start');
function wcps_layout_element_wrapper_start($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_class = isset($elementData['wrapper_class']) ? $elementData['wrapper_class'] : '';
    $wrapper_id = isset($elementData['wrapper_id']) ? $elementData['wrapper_id'] : '';



    ?>
    <div class="<?php echo $wrapper_class; ?> <?php echo $element_class; ?>" id="<?php echo $wrapper_id; ?>">
    <?php

}


add_action('wcps_layout_element_wrapper_end', 'wcps_layout_element_wrapper_end');
function wcps_layout_element_wrapper_end($args){


    ?>
    </div>
    <?php

}





add_action('wcps_layout_element_css_post_title', 'wcps_layout_element_css_post_title');
function wcps_layout_element_css_post_title($args){


    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    //echo '<pre>'.var_export($layout_id, true).'</pre>';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            color: <?php echo $color; ?>;
            font-size: <?php echo $font_size; ?>;
            font-family: <?php echo $font_family; ?>;
            margin: <?php echo $margin; ?>;

        }
    </style>
    <?php
}





add_action('wcps_layout_element_css_meta', 'wcps_layout_element_css_meta');
function wcps_layout_element_css_meta($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            color: <?php echo $color; ?>;
            font-size: <?php echo $font_size; ?>;
            font-family: <?php echo $font_family; ?>;
            margin: <?php echo $margin; ?>;

        }
    </style>
    <?php
}





add_action('wcps_layout_element_css_product_category', 'wcps_layout_element_css_product_category');
function wcps_layout_element_css_product_category($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $link_color = isset($elementData['link_color']) ? $elementData['link_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $wrapper_margin = isset($elementData['wrapper_margin']) ? $elementData['wrapper_margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $wrapper_margin; ?>;

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
            color: <?php echo $link_color; ?>;
            font-size: <?php echo $font_size; ?>;
            font-family: <?php echo $font_family; ?>;
            text-decoration: none;

        }
    </style>
    <?php
}




add_action('wcps_layout_element_css_product_tag', 'wcps_layout_element_css_product_tag');
function wcps_layout_element_css_product_tag($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $link_color = isset($elementData['link_color']) ? $elementData['link_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $wrapper_margin = isset($elementData['wrapper_margin']) ? $elementData['wrapper_margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $wrapper_margin; ?>;

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
            color: <?php echo $link_color; ?>;
            font-size: <?php echo $font_size; ?>;
            font-family: <?php echo $font_family; ?>;
            text-decoration: none;

        }
    </style>
    <?php
}




add_action('wcps_layout_element_css_sale_count', 'wcps_layout_element_css_sale_count');
function wcps_layout_element_css_sale_count($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $link_color = isset($elementData['link_color']) ? $elementData['link_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;

        }

    </style>
    <?php
}

add_action('wcps_layout_element_css_add_to_cart', 'wcps_layout_element_css_add_to_cart');
function wcps_layout_element_css_add_to_cart($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $color = isset($elementData['color']) ? $elementData['color'] : '';

    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> .add_to_cart_button {
            background-color: <?php echo $background_color; ?>;
            color: <?php echo $color; ?>;
        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> p{
            border: none !important;
            margin: 0;
        }

    </style>
    <?php
}



add_action('wcps_layout_element_css_rating', 'wcps_layout_element_css_rating');
function wcps_layout_element_css_rating($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $link_color = isset($elementData['link_color']) ? $elementData['link_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
        }
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> .star-rating{
            float: none;

        }

    </style>
    <?php
}


add_action('wcps_layout_element_css_product_price', 'wcps_layout_element_css_product_price');
function wcps_layout_element_css_product_price($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
            color: <?php echo $color; ?>;

        }

    </style>
    <?php
}


add_action('wcps_layout_element_css_stock_status', 'wcps_layout_element_css_stock_status');
function wcps_layout_element_css_stock_status($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
            color: <?php echo $color; ?>;

        }

    </style>
    <?php
}


add_action('wcps_layout_element_css_stock_quantity', 'wcps_layout_element_css_stock_quantity');
function wcps_layout_element_css_stock_quantity($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
            color: <?php echo $color; ?>;

        }

    </style>
    <?php
}



add_action('wcps_layout_element_css_product_weight', 'wcps_layout_element_css_product_weight');
function wcps_layout_element_css_product_weight($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
            color: <?php echo $color; ?>;

        }

    </style>
    <?php
}




add_action('wcps_layout_element_css_product_dimensions', 'wcps_layout_element_css_product_dimensions');
function wcps_layout_element_css_product_dimensions($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $margin; ?>;
            color: <?php echo $color; ?>;

        }

    </style>
    <?php
}








add_action('wcps_layout_element_css_content', 'wcps_layout_element_css_content');
function wcps_layout_element_css_content($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $read_more_color = isset($elementData['read_more_color']) ? $elementData['read_more_color'] : '';

    $color = isset($elementData['color']) ? $elementData['color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            color: <?php echo $color; ?>;
            font-size: <?php echo $font_size; ?>;
            font-family: <?php echo $font_family; ?>;
            margin: <?php echo $margin; ?>;

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
            color: <?php echo $read_more_color; ?>;

        }

    </style>
    <?php
}



add_action('wcps_layout_element_css_thumbnail', 'wcps_layout_element_css_thumbnail');
function wcps_layout_element_css_thumbnail($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $thumb_height = isset($elementData['thumb_height']) ? $elementData['thumb_height'] : '';
    $thumb_height_large = isset($thumb_height['large']) ? $thumb_height['large'] : '';
    $thumb_height_medium = isset($thumb_height['medium']) ? $thumb_height['medium'] : '';
    $thumb_height_small = isset($thumb_height['small']) ? $thumb_height['small'] : '';

    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            overflow: hidden;
            margin: <?php echo $margin; ?>;
        }

        @media only screen and (min-width: 1024px ){
            .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            <?php if(!empty($thumb_height_large)): ?>
                max-height: <?php echo $thumb_height_large; ?>;
            <?php endif; ?>
            }
        }

        @media only screen and ( min-width: 768px ) and ( max-width: 1023px ) {
            .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            <?php if(!empty($thumb_height_medium)): ?>
                max-height: <?php echo $thumb_height_medium; ?>;
            <?php endif; ?>
            }
        }

        @media only screen and ( min-width: 0px ) and ( max-width: 767px ){
            .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            <?php if(!empty($thumb_height_small)): ?>
                max-height: <?php echo $thumb_height_small; ?>;
            <?php endif; ?>
            }
        }



    </style>
    <?php
}
