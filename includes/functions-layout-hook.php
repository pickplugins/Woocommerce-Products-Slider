<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('wcps_layout_elements_option_post_title','wcps_layout_elements_option_post_title');


function wcps_layout_elements_option_post_title($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';


    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $link_to = isset($element_data['link_to']) ? $element_data['link_to'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Title','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_title_color',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Color','team'),
                'details'	=> __('Title text color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Font size','team'),
                'details'	=> __('Set font size.','team'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Font family','team'),
                'details'	=> __('Set font family.','team'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Link to','team'),
                'details'	=> __('Choose option to link team member.','team'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'team_member_link',
                'args'		=> array('none'=> __('None', 'team'),'team_member_link'=> __('Team member link', 'team'),'popup_box'=> __('Popup box', 'team'), 'popup_slider'=> __('Popup slider', 'team'), 'custom_link'=> __('Custom link', 'team') ),
            );

            $settings_tabs_field->generate_field($args);




            ob_start();
            ?>
            <textarea readonly type="text"  onclick="this.select();">.element-<?php echo $element_index?>{}</textarea>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}




add_action('wcps_layout_elements_option_thumbnail','wcps_layout_elements_option_thumbnail');


function wcps_layout_elements_option_thumbnail($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $thumb_size = isset($element_data['thumb_size']) ? $element_data['thumb_size'] : '';
    $thumb_height = isset($element_data['thumb_height']) ? $element_data['thumb_height'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $link_to = isset($element_data['link_to']) ? $element_data['link_to'] : '';

    $thumb_height_large = isset($thumb_height['large']) ? $thumb_height['large'] : '';
    $thumb_height_medium = isset($thumb_height['medium']) ? $thumb_height['medium'] : '';
    $thumb_height_small = isset($thumb_height['small']) ? $thumb_height['small'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Thumbnail','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $thumbnail_sizes = array();

            $get_intermediate_image_sizes =  get_intermediate_image_sizes();

            if(!empty($get_intermediate_image_sizes))
            foreach($get_intermediate_image_sizes as $size_key){
                $size_name = str_replace('_', ' ',$size_key);
                $size_name = str_replace('-', ' ',$size_name);

                $thumbnail_sizes[$size_key] = ucfirst($size_name);
            }
            //echo '<pre>'.var_export($thumbnail_sizes, true).'</pre>';

            $args = array(
                'id'		=> 'thumb_size',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Thumbnail size','team'),
                'details'	=> __('Choose thumbnail size.','team'),
                'type'		=> 'select',
                'value'		=> $thumb_size,
                'default'		=> 'large',
                'args'		=> $thumbnail_sizes,
            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'thumb_height',
                'title'		=> __('Thumbnail height','team'),
                'details'	=> __('Set thumbnail height.','team'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'large',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In desktop','team'),
                        'details'	=> __('min-width: 1200px, ex: 280px','team'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_large,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                    array(
                        'id'		=> 'medium',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In tablet & small desktop','team'),
                        'details'	=> __('min-width: 992px, ex: 280px','team'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_medium,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                    array(
                        'id'		=> 'small',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In mobile','team'),
                        'details'	=> __('max-width: 768px, ex: 280px','team'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_small,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                ),

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Link to','team'),
                'details'	=> __('Choose option to link team member.','team'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'team_member_link',
                'args'		=> array('none'=> __('None', 'team'),'team_member_link'=> __('Team member link', 'team'),'popup_box'=> __('Popup box', 'team'), 'popup_slider'=> __('Popup slider', 'team'), 'custom_link'=> __('Custom link', 'team') ),
            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}




add_action('wcps_layout_elements_option_content','wcps_layout_elements_option_content');


function wcps_layout_elements_option_content($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $content_source = isset($element_data['content_source']) ? $element_data['content_source'] : '';
    $word_count = isset($element_data['word_count']) ? $element_data['word_count'] : 15;
    $read_more_text = isset($element_data['read_more_text']) ? $element_data['read_more_text'] : __('Read more','woocommerce-products-slider');
    $read_more_color = isset($element_data['read_more_color']) ? $element_data['read_more_color'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $link_to = isset($element_data['link_to']) ? $element_data['link_to'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Content','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'content_source',
                'css_id'		=> $element_index.'_content_source',
                'parent' => $input_name.'[content]',
                'title'		=> __('Content source','team'),
                'details'	=> __('Choose content source.','team'),
                'type'		=> 'select',
                'value'		=> $content_source,
                'default'		=> 'excerpt',
                'args'		=> array('excerpt'=> __('Excerpt', 'team'), 'content'=> __('Content', 'team')),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'word_count',
                'css_id'		=> $element_index.'_word_count',
                'parent' => $input_name.'[content]',
                'title'		=> __('Word count','team'),
                'details'	=> __('Set word count.','team'),
                'type'		=> 'text',
                'value'		=> $word_count,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'read_more_text',
                'css_id'		=> $element_index.'_read_more_text',
                'parent' => $input_name.'[content]',
                'title'		=> __('Read more text','team'),
                'details'	=> __('Set custom read more text.','team'),
                'type'		=> 'text',
                'value'		=> $read_more_text,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'read_more_color',
                'css_id'		=> $element_index.'_read_more_color',
                'parent' => $input_name.'[content]',
                'title'		=> __('Read more color','team'),
                'details'	=> __('Set custom read more color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $read_more_color,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_content_color',
                'parent' => $input_name.'[content]',
                'title'		=> __('Color','team'),
                'details'	=> __('Title text color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[content]',
                'title'		=> __('Font size','team'),
                'details'	=> __('Set font size.','team'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[content]',
                'title'		=> __('Font family','team'),
                'details'	=> __('Set font family.','team'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[content]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);



            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[content]',
                'title'		=> __('Link to','team'),
                'details'	=> __('Choose option to link team member.','team'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'team_member_link',
                'args'		=> array('none'=> __('None', 'team'),'team_member_link'=> __('Team member link', 'team'),'popup_box'=> __('Popup box', 'team'), 'popup_slider'=> __('Popup slider', 'team'), 'custom_link'=> __('Custom link', 'team') ),
            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}




add_action('wcps_layout_elements_option_social','wcps_layout_elements_option_social');


function wcps_layout_elements_option_social($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $social_icon_type = isset($element_data['social_icon_type']) ? $element_data['social_icon_type'] : '';
    $social_icon_width = isset($element_data['social_icon_width']) ? $element_data['social_icon_width'] : '30px';
    $social_icon_height = isset($element_data['social_icon_height']) ? $element_data['social_icon_height'] : '30px';


    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Social','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'social_icon_type',
                'css_id'		=> $element_index.'_content_source',
                'parent' => $input_name.'[social]',
                'title'		=> __('Social icon type','team'),
                'details'	=> __('Choose icon type.','team'),
                'type'		=> 'select',
                'value'		=> $social_icon_type,
                'default'		=> 'image_icon',
                'args'		=> array('image_icon'=> __('Image icon', 'team'), 'font_icon'=> __('Font icon', 'team'), 'text_link'=> __('Text link', 'team')),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'social_icon_width',
                'css_id'		=> $element_index.'_social_icon_width',
                'parent' => $input_name.'[social]',
                'title'		=> __('Icon width','team'),
                'details'	=> __('Set icon width.','team'),
                'type'		=> 'text',
                'value'		=> $social_icon_width,
                'default'		=> '',
                'placeholder'		=> '20px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'social_icon_height',
                'css_id'		=> $element_index.'_social_icon_height',
                'parent' => $input_name.'[social]',
                'title'		=> __('Icon height','team'),
                'details'	=> __('Set icon height.','team'),
                'type'		=> 'text',
                'value'		=> $social_icon_height,
                'default'		=> '',
                'placeholder'		=> '20px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_social_color',
                'parent' => $input_name.'[social]',
                'title'		=> __('Color','team'),
                'details'	=> __('Title text color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[social]',
                'title'		=> __('Font size','team'),
                'details'	=> __('Set font size.','team'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[social]',
                'title'		=> __('Font family','team'),
                'details'	=> __('Set font family.','team'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[social]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_meta','wcps_layout_elements_option_meta');


function wcps_layout_elements_option_meta($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $meta_key = isset($element_data['meta_key']) ? $element_data['meta_key'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Meta','team'); ?> - <?php echo $meta_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'meta_key',
                'css_id'		=> $element_index.'_meta_key',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Meta key','team'),
                'details'	=> __('Write meta key.','team'),
                'type'		=> 'text',
                'value'		=> $meta_key,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Wrapper html','team'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace meta value output.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Prefix text %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_skill_color',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Color','team'),
                'details'	=> __('Title text color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Font size','team'),
                'details'	=> __('Set font size.','team'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Font family','team'),
                'details'	=> __('Set font family.','team'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[meta]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);


            ?>

        </div>
    </div>
    <?php

}







add_action('wcps_layout_elements_option_position','wcps_layout_elements_option_position');


function wcps_layout_elements_option_position($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Position','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php
            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_position_color',
                'parent' => $input_name.'[position]',
                'title'		=> __('Color','team'),
                'details'	=> __('Title text color.','team'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[position]',
                'title'		=> __('Font size','team'),
                'details'	=> __('Set font size.','team'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[position]',
                'title'		=> __('Font family','team'),
                'details'	=> __('Set font family.','team'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[position]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}










add_action('wcps_layout_elements_option_wrapper_start','wcps_layout_elements_option_wrapper_start');


function wcps_layout_elements_option_wrapper_start($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_id = isset($element_data['wrapper_id']) ? $element_data['wrapper_id'] : '';
    $wrapper_class = isset($element_data['wrapper_class']) ? $element_data['wrapper_class'] : '';
    $css_idle = isset($element_data['css_idle']) ? $element_data['css_idle'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Wrapper start','team'); ?></span>

            <span class="handle-start"><i class="fas fa-level-up-alt"></i></span>

        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_id',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Wrapper id','team'),
                'details'	=> __('Write wrapper id, ex: my-unique-id.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_id,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_class',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Wrapper class','team'),
                'details'	=> __('Write wrapper class, ex: layer-thumbnail','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_class,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css_idle',
                'css_id'		=> 'css_idle_'.preg_replace('/\D/', '', $input_name) ,
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Custom CSS','team'),
                'details'	=> __('Write custom CSS. do not use <code>&lt;style>&lt;/style></code>','team'),
                'type'		=> 'scripts_css',
                'value'		=> $css_idle,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Margin','team'),
                'details'	=> __('Set margin.','team'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            ob_start();
            ?>
            <code onclick="this.select()">
                .element-<?php echo $element_index?>{}

            </code>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','team'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','team'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}




add_action('wcps_layout_elements_option_wrapper_end','wcps_layout_elements_option_wrapper_end');


function wcps_layout_elements_option_wrapper_end($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $meta_key = isset($element_data['meta_key']) ? $element_data['meta_key'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Wrapper end','team'); ?></span>
            <span class="handle-end"><i class="fas fa-level-down-alt"></i></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_id',
                'parent' => $input_name.'[wrapper_end]',
                'title'		=> __('Wrapper id','team'),
                'details'	=> __('Write wrapper id, ex: div, p, span.','team'),
                'type'		=> 'text',
                'value'		=> $meta_key,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);





            ?>

        </div>
    </div>
    <?php

}





add_action('wcps_layout_elements_option_product_category','wcps_layout_elements_option_product_category');
function wcps_layout_elements_option_product_category($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $max_count = isset($element_data['max_count']) ? $element_data['max_count'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product category','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Max count','team'),
                'details'	=> __('Write max count','team'),
                'type'		=> 'text',
                'value'		=> $max_count,
                'default'		=> '',
                'placeholder'		=> '3',
            );

            $settings_tabs_field->generate_field($args);





            ?>

        </div>
    </div>
    <?php

}


add_action('wcps_layout_elements_option_product_tag','wcps_layout_elements_option_product_tag');
function wcps_layout_elements_option_product_tag($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $max_count = isset($element_data['max_count']) ? $element_data['max_count'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product tag','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Max count','team'),
                'details'	=> __('Write max count','team'),
                'type'		=> 'text',
                'value'		=> $max_count,
                'default'		=> '',
                'placeholder'		=> '3',
            );

            $settings_tabs_field->generate_field($args);





            ?>

        </div>
    </div>
    <?php

}

add_action('wcps_layout_elements_option_sale_count','wcps_layout_elements_option_sale_count');
function wcps_layout_elements_option_sale_count($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Sale count','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[sale_count]',
                'title'		=> __('Wrapper html','team'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace sale count output.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Prefix text %s',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_featured_mark','wcps_layout_elements_option_featured_mark');
function wcps_layout_elements_option_featured_mark($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $icon_img_src = isset($element_data['icon_img_src']) ? $element_data['icon_img_src'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Featured mark','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'icon_img_src',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('Icon image','team'),
                'details'	=> __('Choose icon image','team'),
                'type'		=> 'media_url',
                'value'		=> $icon_img_src,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}


add_action('wcps_layout_elements_option_on_sale_mark','wcps_layout_elements_option_on_sale_mark');
function wcps_layout_elements_option_on_sale_mark($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $icon_img_src = isset($element_data['icon_img_src']) ? $element_data['icon_img_src'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('On sale mark','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'icon_img_src',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('Icon image','team'),
                'details'	=> __('Choose icon image','team'),
                'type'		=> 'media_url',
                'value'		=> $icon_img_src,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_add_to_cart','wcps_layout_elements_option_add_to_cart');
function wcps_layout_elements_option_add_to_cart($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $cart_text = isset($element_data['cart_text']) ? $element_data['cart_text'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Add to cart','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'cart_text',
                'parent' => $input_name.'[add_to_cart]',
                'title'		=> __('Cart text','team'),
                'details'	=> __('Write custom add to cart text.','team'),
                'type'		=> 'text',
                'value'		=> $cart_text,
                'default'		=> '',
                'placeholder'		=> __('Add to cart','woocommerce-products-slider'),

            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}





add_action('wcps_layout_elements_option_rating','wcps_layout_elements_option_rating');
function wcps_layout_elements_option_rating($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $rating_type = isset($element_data['rating_type']) ? $element_data['rating_type'] : 'five_star';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Rating','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'rating_type',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Rating type','team'),
                'details'	=> __('Choose rating type.','team'),
                'type'		=> 'select',
                'value'		=> $rating_type,
                'args'		=> array('text'=> 'Text', 'five_star'=>'Star'),
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}





add_action('wcps_layout_elements_option_product_price','wcps_layout_elements_option_product_price');
function wcps_layout_elements_option_product_price($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $price_type = isset($element_data['price_type']) ? $element_data['price_type'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product price','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'price_type',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Price type','team'),
                'details'	=> __('Choose price type.','team'),
                'type'		=> 'select',
                'value'		=> $price_type,
                'args'		=> array('full'=> 'Full Format', 'sale'=>'Sale price' , 'regular'=>'Regular price'),
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_stock_status','wcps_layout_elements_option_stock_status');
function wcps_layout_elements_option_stock_status($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $stock_status_text = isset($element_data['stock_status_text']) ? $element_data['stock_status_text'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Stock status','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'stock_status_text',
                'parent' => $input_name.'[add_to_cart]',
                'title'		=> __('Stock status text','team'),
                'details'	=> __('Write custom stock status text.','team'),
                'type'		=> 'text',
                'value'		=> $stock_status_text,
                'default'		=> '',
                'placeholder'		=> __('In stock','woocommerce-products-slider'),

            );

            $settings_tabs_field->generate_field($args);


            ?>

        </div>
    </div>
    <?php

}


add_action('wcps_layout_elements_option_stock_quantity','wcps_layout_elements_option_stock_quantity');
function wcps_layout_elements_option_stock_quantity($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Stock quantity','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[stock_quantity]',
                'title'		=> __('Wrapper html','team'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace quantity output.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Prefix text %s',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_product_weight','wcps_layout_elements_option_product_weight');
function wcps_layout_elements_option_product_weight($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product weight','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[product_weight]',
                'title'		=> __('Wrapper html','team'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace weight output.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Prefix text %s',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}



add_action('wcps_layout_elements_option_product_dimensions','wcps_layout_elements_option_product_dimensions');
function wcps_layout_elements_option_product_dimensions($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product dimensions','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[product_dimensions]',
                'title'		=> __('Wrapper html','team'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace dimensions output.','team'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Prefix text %s',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}

add_action('wcps_layout_elements_option_share_button','wcps_layout_elements_option_share_button');
function wcps_layout_elements_option_share_button($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();

    $social_media = isset($element_data['social_media']) ? $element_data['social_media'] : array();
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Share button','team'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'social_media',
                'parent' => $input_name.'[share_button]',
                'title'		=> __('Social media','team'),
                'details'	=> __('Write social media. use following format, <code>icon html | url</code><br> use following parameter with url, <code>{TITLE}, {PRODUCT_URL}, {THUMBNAIL_SRC}</code>','team'),
                'type'		=> 'text_multi',
                'value'		=> $social_media,
                'default'		=> array(),
                'placeholder'		=> 'Icon HTML | URL',
            );

            $settings_tabs_field->generate_field($args);
            ?>

        </div>
    </div>
    <?php

}
