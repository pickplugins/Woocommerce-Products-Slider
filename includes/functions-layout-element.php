<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('wcps_layout_element_title', 'wcps_layout_element_title');
function wcps_layout_element_title($args){

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
    <div class="team-title <?php echo $element_class; ?>"><?php echo $post_title; ?></div>
    <?php

}



add_action('wcps_layout_element_thumbnail', 'wcps_layout_element_thumbnail');
function wcps_layout_element_thumbnail($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';
    $element_class = apply_filters('wcps_layout_element_thumbnail_class', $element_class, $args);

    //echo '<pre>'.var_export($args, true).'</pre>';
    $team_id = isset($args['team_id']) ? $args['team_id'] : '';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();

    $permalink = get_permalink($product_id);
    $team_member_url = apply_filters('wcps_layout_element_thumbnail_url', $permalink, $args);




    $thumb_size = isset($elementData['thumb_size']) ? $elementData['thumb_size'] : 'full';

    //echo '<pre>'.var_export($elementData, true).'</pre>';

    $wcps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), $thumb_size);
    $member_image_url = isset($wcps_thumb[0]) ? $wcps_thumb[0] : '';


    $member_image_url = apply_filters('wcps_layout_element_thumbnail_src', $member_image_url, $args);


    //echo '<pre>'.var_export($member_image_url, true).'</pre>';

    if(!empty($member_image_url)){
        ?>
        <div class="team-thumb <?php echo $element_class; ?>"><a href="<?php echo $team_member_url; ?>"><img src="<?php echo $member_image_url; ?>" /></a></div>
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



    //echo '<pre>'.var_export($elementData, true).'</pre>';

    $team_member_data = get_post_meta($product_id, 'team_member_data', true);
    $meta_key_value = isset($team_member_data['custom_fields'][$meta_key]) ? $team_member_data['custom_fields'][$meta_key] : '';
    //echo '<pre>'.var_export($meta_key, true).'</pre>';

    //$team_member_position = get_post_meta($product_id,'position', true);

    ?>
    <div class="team-meta <?php echo $element_class; ?>"><?php echo $meta_key_value; ?></div>
    <?php

}




















add_action('wcps_layout_element_social', 'wcps_layout_element_social');
function wcps_layout_element_social($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';

    //
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();

    $social_icon_type = isset($elementData['social_icon_type']) ? $elementData['social_icon_type'] : '';
    $social_icon_width = isset($elementData['social_icon_width']) ? $elementData['social_icon_width'] : '';
    $social_icon_height = isset($elementData['social_icon_height']) ? $elementData['social_icon_height'] : '';
    $social_icon_color = isset($elementData['color']) ? $elementData['color'] : '';
    $social_icon_font_size = isset($elementData['font_size']) ? $elementData['font_size'] : '';
    $social_icon_font_family = isset($elementData['font_family']) ? $elementData['font_family'] : '';



    $team_member_data = get_post_meta($product_id, 'team_member_data', true);
    $social_fields = isset($team_member_data['social_fields']) ? $team_member_data['social_fields'] : array();

    $team_settings = get_option('team_settings');
    $custom_social_fields = isset($team_settings['custom_social_fields']) ? $team_settings['custom_social_fields'] : array();

    $social_fields_data = array();

    foreach ($custom_social_fields as $social_field){

        $name = isset($social_field['name']) ? $social_field['name'] : '';
        $meta_key = isset($social_field['meta_key']) ? $social_field['meta_key'] : '';
        $icon = isset($social_field['icon']) ? $social_field['icon'] : '';
        $font_icon = isset($social_field['font_icon']) ? $social_field['font_icon'] : '';

        $visibility = isset($social_field['visibility']) ? $social_field['visibility'] : '';

        $social_fields_data[$meta_key] = array('icon'=>$icon, 'font_icon'=>$font_icon, 'name'=>$name, 'visibility'=>$visibility,);
    }




    ob_start();

    if(!empty($social_fields)):
        foreach ($social_fields as $fieldIndex => $field):

            $field_icon = isset($social_fields_data[$fieldIndex]['icon']) ? $social_fields_data[$fieldIndex]['icon'] : '';
            $field_font_icon = isset($social_fields_data[$fieldIndex]['font_icon']) ? $social_fields_data[$fieldIndex]['font_icon'] : '';
            //echo '<pre>'.var_export($field_font_icon, true).'</pre>';

            if(!empty($field)):
                ?>
                <span class="<?php echo $social_icon_type; ?>">
                    <a href="<?php echo $field; ?>">
                        <?php
                        if($social_icon_type == 'image_icon'):

                            if(!empty($field_icon)):
                                ?><img src="<?php echo $field_icon; ?>"><?php
                            endif;

                        elseif($social_icon_type == 'font_icon'):

                            if(!empty($field_font_icon)):
                                ?><?php echo $field_font_icon; ?><?php
                            endif;

                        elseif($social_icon_type == 'text_link'):

                            ?><?php echo $field_font_icon; ?> <?php echo $field; ?><?php
                        endif;

                        ?></a>
                </span>
            <?php
            endif;


        endforeach;

    endif;

    $html = ob_get_clean();

    ?>
    <div class="team-social <?php echo $element_class; ?>"><?php echo $html; ?></div>

    <style type="text/css">
        .team-social{
            margin: 15px 0;
        }
        .team-social a{
            font-size: <?php echo $social_icon_font_size; ?>;
            color: <?php echo $social_icon_color; ?>;
        }

        .team-social .text_link{
            display: block;
        }

        .team-social .text_link a{
            text-decoration: none;
        }

        .team-social a img{
            width: <?php echo $social_icon_width; ?>;
            height: <?php echo $social_icon_height; ?>;
            display: inline-block !important;
            border-radius: 0;
            box-shadow: none;
        }



    </style>


    <?php

}




add_action('wcps_layout_element_content', 'wcps_layout_element_content');
function wcps_layout_element_content($args){

    $element_index = isset($args['element_index']) ? $args['element_index'] : '';
    $element_class = !empty($element_index) ? 'element-'.$element_index : '';
    $element_class = apply_filters('wcps_layout_element_content_class', $element_class, $args);

    //echo '<pre>'.var_export($args, true).'</pre>';

    $team_id = isset($args['team_id']) ? $args['team_id'] : '';
    $product_id = isset($args['product_id']) ? $args['product_id'] : '';
    $elementData = isset($args['elementData']) ? $args['elementData'] : array();
    $content_source = isset($elementData['content_source']) ? $elementData['content_source'] : 'excerpt';
    $read_more_text = isset($elementData['read_more_text']) ? $elementData['read_more_text'] : '';
    $word_count = isset($elementData['word_count']) ? $elementData['word_count'] : 15;

    $post_data= get_post($product_id);

    $team_member_url = get_permalink($product_id);
    $team_member_url = apply_filters('wcps_layout_element_content_link',$team_member_url, $args);

    $content = isset($post_data->post_content) ? $post_data->post_content : '';

    $content_html = '';

    if($content_source=='content'){
        $content_html.= do_shortcode($content);
    }
    elseif($content_source=='excerpt'){

        $content_html.= wp_trim_words( $content , $word_count, ' <a class="read-more" href="'. $team_member_url .'">'.$read_more_text.'</a>' );
    }else{
        $content_html.= wp_trim_words( $content , $word_count, ' <a class="read-more" href="'. $team_member_url .'">'.$read_more_text.'</a>' );
    }


    ?>
    <div class="team-content <?php echo $element_class; ?>"><?php echo $content_html; ?></div>
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





add_action('wcps_layout_element_css_title', 'wcps_layout_element_css_title');
function wcps_layout_element_css_title($args){


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
