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


    $element_class = !empty($element_index) ? 'element-'.$element_index : '';
    $element_class = apply_filters('wcps_layout_element_title_class', $element_class, $args);

    ?>
    <div class="<?php echo $element_class; ?>"><?php echo $post_title; ?></div>
    <?php

}



add_action('wcps_layout_element_thumbnail', 'wcps_layout_element_thumbnail');
function wcps_layout_element_thumbnail($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';
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
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';
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
