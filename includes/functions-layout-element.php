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

    $product = wc_get_product( $product_id );

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

    $product = wc_get_product( $product_id );

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
    $product = wc_get_product( $product_id );

    $string = get_woocommerce_price_format();

    //echo '<pre>'.var_export($product_id, true).'</pre>';

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






add_action('wcps_layout_element_on_sale_mark', 'wcps_layout_element_on_sale_mark');
function wcps_layout_element_on_sale_mark($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = !empty($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '%s';
    $icon_img_src = isset($elementData['icon_img_src']) ? $elementData['icon_img_src'] : '';
    $position = isset($elementData['position']) ? $elementData['position'] : '';
    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $text_color = isset($elementData['text_color']) ? $elementData['text_color'] : '';
    $icon = '<img src="'.$icon_img_src.'">';

    $product = wc_get_product( $product_id );

    $is_on_sale = $product->is_on_sale();


    if($is_on_sale && ($product->is_type('simple') || $product->is_type('variable'))):
        ?>
        <div class="on-sale <?php echo $position; ?> <?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $icon); ?></div>
    <?php
    endif;
}




add_action('wcps_layout_element_featured_mark', 'wcps_layout_element_featured_mark');
function wcps_layout_element_featured_mark($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = !empty($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '%s';
    $icon_img_src = isset($elementData['icon_img_src']) ? $elementData['icon_img_src'] : '';
    $position = isset($elementData['position']) ? $elementData['position'] : '';
    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $text_color = isset($elementData['text_color']) ? $elementData['text_color'] : '';
    $icon = '<img src="'.$icon_img_src.'">';

    $product = wc_get_product( $product_id );
    $is_featured = $product->get_featured();



    if($is_featured):
    ?>
    <div class="featured-mark <?php echo $position; ?> <?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $icon); ?></div>
    <?php
    endif;
}



add_action('wcps_layout_element_product_id', 'wcps_layout_element_product_id');
function wcps_layout_element_product_id($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //echo '<pre>'.var_export($args, true).'</pre>';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $wrapper_html = !empty($elementData['wrapper_html']) ? $elementData['wrapper_html'] : '%s';

    ?>
    <div class="featured-mark <?php echo $element_class; ?>"><?php echo sprintf($wrapper_html, $product_id); ?></div>
    <?php

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

    $product = wc_get_product( $product_id );
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
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
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
    $text_align = isset($elementData['text_align']) ? (int) $elementData['text_align'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            margin: <?php echo $wrapper_margin; ?>;

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
        <?php if(!empty($link_color)): ?>
            color: <?php echo $link_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
            text-decoration: none;
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
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
        <?php if(!empty($wrapper_margin)): ?>
            margin: <?php echo $wrapper_margin; ?>;
        <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
        <?php if(!empty($link_color)): ?>
            color: <?php echo $link_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
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
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>

        }

    </style>
    <?php
}

add_action('wcps_layout_element_css_on_sale_mark', 'wcps_layout_element_css_on_sale_mark');
function wcps_layout_element_css_on_sale_mark($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $text_color = isset($elementData['text_color']) ? $elementData['text_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $padding = isset($elementData['padding']) ? $elementData['padding'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
        <?php if(!empty($background_color)): ?>
            background-color: <?php echo $background_color; ?>;
        <?php endif; ?>
        <?php if(!empty($text_color)): ?>
            color: <?php echo $text_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        line-height: normal;
        <?php if(!empty($padding)): ?>
        padding: <?php echo $padding; ?>;
        <?php endif; ?>
        }

    </style>
    <?php
}

add_action('wcps_layout_element_css_featured_mark', 'wcps_layout_element_css_featured_mark');
function wcps_layout_element_css_featured_mark($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $text_color = isset($elementData['text_color']) ? $elementData['text_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $padding = isset($elementData['padding']) ? $elementData['padding'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
        <?php if(!empty($background_color)): ?>
            background-color: <?php echo $background_color; ?>;
        <?php endif; ?>
        <?php if(!empty($text_color)): ?>
            color: <?php echo $text_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        line-height: normal;
        <?php if(!empty($padding)): ?>
        padding: <?php echo $padding; ?>;
        <?php endif; ?>
        }
    </style>
    <?php
}



add_action('wcps_layout_element_css_product_id', 'wcps_layout_element_css_product_id');
function wcps_layout_element_css_product_id($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $text_color = isset($elementData['text_color']) ? $elementData['text_color'] : '';
    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
        <?php if(!empty($background_color)): ?>
            background-color: <?php echo $background_color; ?>;
        <?php endif; ?>
        <?php if(!empty($text_color)): ?>
            color: <?php echo $text_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
            line-height: normal;
        <?php if(!empty($margin)): ?>
            padding: <?php echo $margin; ?>;
        <?php endif; ?>
        }
    </style>
    <?php
}






add_action('wcps_layout_element_css_add_to_cart', 'wcps_layout_element_css_add_to_cart');
function wcps_layout_element_css_add_to_cart($args){

    //echo '<pre>'.var_export($args, true).'</pre>';
    $wcps_id = isset($args['wcps_id']) ? $args['wcps_id'] : '';

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $background_color = isset($elementData['background_color']) ? $elementData['background_color'] : '';
    $color = isset($elementData['color']) ? $elementData['color'] : '';

    $font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';
    $margin = isset($elementData['margin']) ? $elementData['margin'] : '';
    $show_quantity = isset($elementData['show_quantity']) ? $elementData['show_quantity'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        }
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a {
        <?php if(!empty($background_color)): ?>
            background-color: <?php echo $background_color; ?>;
        <?php endif; ?>
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
        <?php endif; ?>
        }
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> p{
            border: none !important;
            margin: 0;
            padding: 0 !important;
        }
    </style>

    <?php if($show_quantity == 'yes'): ?>
    <script>
        jQuery('.wcps-container-<?php echo $wcps_id; ?> .wcps-items-cart .add_to_cart_button').parent().prepend('<input value=1 class=quantity type=number> ');
    </script>
    <?php endif; ?>
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
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
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
    $text_align = isset($elementData['text_align']) ? $elementData['text_align'] : '';


    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?>{
            <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
            <?php endif; ?>
            <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
            <?php endif; ?>
            <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
            <?php endif; ?>
            <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
            <?php endif; ?>

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
            <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
            <?php endif; ?>
            <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
            <?php endif; ?>
            <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
            <?php endif; ?>
            <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
            <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element-<?php echo $element_index; ?> a{
            <?php if(!empty($read_more_color)): ?>
            color: <?php echo $read_more_color; ?>;
            <?php endif; ?>
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
            <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
            <?php endif; ?>
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
