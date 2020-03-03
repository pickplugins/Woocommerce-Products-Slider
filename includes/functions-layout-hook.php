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
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Title','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_title_color',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Color','woocommerce-products-slider'),
                'details'	=> __('Title text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Font size','woocommerce-products-slider'),
                'details'	=> __('Set font size.','woocommerce-products-slider'),
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
                'title'		=> __('Font family','woocommerce-products-slider'),
                'details'	=> __('Set font family.','woocommerce-products-slider'),
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
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[post_title]',
                'title'		=> __('Link to','woocommerce-products-slider'),
                'details'	=> __('Choose option to link product.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'product_link',
                'args'		=> array('none'=> __('None', 'woocommerce-products-slider'),'external_product_url'=> __('External product', 'woocommerce-products-slider'), 'product_link'=> __('product link', 'woocommerce-products-slider'), 'popup_box'=> __('Popup box', 'woocommerce-products-slider'), 'custom_link'=> __('Custom link', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);




            ob_start();
            ?>
            <textarea readonly type="text"  onclick="this.select();">.element-<?php echo $element_index?>{}</textarea>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','woocommerce-products-slider'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','woocommerce-products-slider'),
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
    $default_thumb_src = isset($element_data['default_thumb_src']) ? $element_data['default_thumb_src'] : '';
    $link_to_meta_key = isset($element_data['link_to_meta_key']) ? $element_data['link_to_meta_key'] : '';

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

            <span class="expand"><?php echo __('Thumbnail','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $thumbnail_sizes = array();
            $thumbnail_sizes['full'] = __('Full', '');
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
                'title'		=> __('Thumbnail size','woocommerce-products-slider'),
                'details'	=> __('Choose thumbnail size.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $thumb_size,
                'default'		=> 'large',
                'args'		=> $thumbnail_sizes,
            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'thumb_height',
                'title'		=> __('Thumbnail height','woocommerce-products-slider'),
                'details'	=> __('Set thumbnail height.','woocommerce-products-slider'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'large',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In desktop','woocommerce-products-slider'),
                        'details'	=> __('min-width: 1200px, ex: 280px','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_large,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                    array(
                        'id'		=> 'medium',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In tablet & small desktop','woocommerce-products-slider'),
                        'details'	=> __('min-width: 992px, ex: 280px','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_medium,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                    array(
                        'id'		=> 'small',
                        'parent'		=> $input_name.'[thumbnail][thumb_height]',
                        'title'		=> __('In mobile','woocommerce-products-slider'),
                        'details'	=> __('max-width: 768px, ex: 280px','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $thumb_height_small,
                        'default'		=> '',
                        'placeholder'   => '280px',
                    ),
                ),

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'default_thumb_src',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Default thumbnail','woocommerce-products-slider'),
                'details'	=> __('Choose default thumbnail.','woocommerce-products-slider'),
                'type'		=> 'media_url',
                'value'		=> $default_thumb_src,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
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
                'title'		=> __('Use of CSS','woocommerce-products-slider'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','woocommerce-products-slider'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Link to','woocommerce-products-slider'),
                'details'	=> __('Choose option to product link.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'product_link',
                'args'		=> array('none'=> __('None', 'woocommerce-products-slider'),'product_link'=> __('Product link', 'woocommerce-products-slider'),'popup_box'=> __('Popup box', 'woocommerce-products-slider'), 'custom_link'=> __('Custom link', 'woocommerce-products-slider'), 'meta_value'=> __('Meta value', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'link_to_meta_key',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[thumbnail]',
                'title'		=> __('Link to meta key','woocommerce-products-slider'),
                'details'	=> __('Write meta key for meta value link.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $link_to_meta_key,
                'default'		=> '',
                'placeholder'		=> '',
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
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $custom_css = isset($element_data['custom_css']) ? $element_data['custom_css'] : '';
    $custom_css_hover = isset($element_data['custom_css_hover']) ? $element_data['custom_css_hover'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Content','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'content_source',
                'css_id'		=> $element_index.'_content_source',
                'parent' => $input_name.'[content]',
                'title'		=> __('Content source','woocommerce-products-slider'),
                'details'	=> __('Choose content source.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $content_source,
                'default'		=> 'excerpt',
                'args'		=> array('excerpt'=> __('Excerpt', 'woocommerce-products-slider'), 'content'=> __('Content', 'woocommerce-products-slider')),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'word_count',
                'css_id'		=> $element_index.'_word_count',
                'parent' => $input_name.'[content]',
                'title'		=> __('Word count','woocommerce-products-slider'),
                'details'	=> __('Set word count.','woocommerce-products-slider'),
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
                'title'		=> __('Read more text','woocommerce-products-slider'),
                'details'	=> __('Set custom read more text.','woocommerce-products-slider'),
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
                'title'		=> __('Read more color','woocommerce-products-slider'),
                'details'	=> __('Set custom read more color.','woocommerce-products-slider'),
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
                'title'		=> __('Color','woocommerce-products-slider'),
                'details'	=> __('Title text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[content]',
                'title'		=> __('Font size','woocommerce-products-slider'),
                'details'	=> __('Set font size.','woocommerce-products-slider'),
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
                'title'		=> __('Font family','woocommerce-products-slider'),
                'details'	=> __('Set font family.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[content]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[content]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
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
                'title'		=> __('Use of CSS','woocommerce-products-slider'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','woocommerce-products-slider'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_to',
                'css_id'		=> $element_index.'_link_to',
                'parent' => $input_name.'[content]',
                'title'		=> __('Link to','woocommerce-products-slider'),
                'details'	=> __('Choose option to product link.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $link_to,
                'default'		=> 'product_link',
                'args'		=> array('none'=> __('None', 'woocommerce-products-slider'),'product_link'=> __('Product link', 'woocommerce-products-slider'),'popup_box'=> __('Popup box', 'woocommerce-products-slider'), 'custom_link'=> __('Custom link', 'woocommerce-products-slider') ),
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

            <span class="expand"><?php echo __('Wrapper start','woocommerce-products-slider'); ?></span>

            <span class="handle-start"><i class="fas fa-level-up-alt"></i></span>

        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_id',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Wrapper id','woocommerce-products-slider'),
                'details'	=> __('Write wrapper id, ex: my-unique-id.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_id,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_class',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Wrapper class','woocommerce-products-slider'),
                'details'	=> __('Write wrapper class, ex: layer-thumbnail','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_class,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css_idle',
                'css_id'		=> 'css_idle_'.preg_replace('/\D/', '', $input_name) ,
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Custom CSS','woocommerce-products-slider'),
                'details'	=> __('Write custom CSS. do not use <code>&lt;style>&lt;/style></code>','woocommerce-products-slider'),
                'type'		=> 'scripts_css',
                'value'		=> $css_idle,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[wrapper_start]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
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
                'title'		=> __('Use of CSS','woocommerce-products-slider'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','woocommerce-products-slider'),
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

            <span class="expand"><?php echo __('Wrapper end','woocommerce-products-slider'); ?></span>
            <span class="handle-end"><i class="fas fa-level-down-alt"></i></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_id',
                'parent' => $input_name.'[wrapper_end]',
                'title'		=> __('Wrapper id','woocommerce-products-slider'),
                'details'	=> __('Write wrapper id, ex: div, p, span.','woocommerce-products-slider'),
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $max_count = isset($element_data['max_count']) ? $element_data['max_count'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $link_color = isset($element_data['link_color']) ? $element_data['link_color'] : '';
    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product category','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Max count','woocommerce-products-slider'),
                'details'	=> __('Write max count','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $max_count,
                'default'		=> 3,
                'placeholder'		=> '3',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_position_color',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Link separator','woocommerce-products-slider'),
                'details'	=> __('Choose link separator.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace category output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Categories: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Font size','woocommerce-products-slider'),
                'details'	=> __('Choose font size.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'link_color',
                'css_id'		=> $element_index.'_link_color',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Link color','woocommerce-products-slider'),
                'details'	=> __('Choose link color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $link_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[product_category]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $max_count = isset($element_data['max_count']) ? $element_data['max_count'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $link_color = isset($element_data['link_color']) ? $element_data['link_color'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';
    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product tag','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Max count','woocommerce-products-slider'),
                'details'	=> __('Write max count','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $max_count,
                'default'		=> 3,
                'placeholder'		=> '3',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_position_color',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Link separator','woocommerce-products-slider'),
                'details'	=> __('Choose link separator.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace tags output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Tags: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'link_color',
                'css_id'		=> $element_index.'_link_color',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Link color','woocommerce-products-slider'),
                'details'	=> __('Choose link color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $link_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[product_tag]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
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
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Sale count','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[sale_count]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace sale count output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Total sold: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[sale_count]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $icon_img_src = isset($element_data['icon_img_src']) ? $element_data['icon_img_src'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $position = isset($element_data['position']) ? $element_data['position'] : '';
    $background_color = isset($element_data['background_color']) ? $element_data['background_color'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';
    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Featured mark','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'icon_img_src',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('Icon image','woocommerce-products-slider'),
                'details'	=> __('Choose icon image','woocommerce-products-slider'),
                'type'		=> 'media_url',
                'value'		=> $icon_img_src,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace on-sale output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'On sale: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'position',
                'css_id'		=> $element_index.'_position',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('position','woocommerce-products-slider'),
                'details'	=> __('Choose position.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $position,
                'default'		=> '',
                'args'		=> array(
                    'topright'=>__('Top-right','woocommerce-products-slider'),
                    'topleft'=>__('Top-left','woocommerce-products-slider'),
                    'bottomright'=>__('Bottom-right','woocommerce-products-slider'),
                    'bottomleft'=>__('Bottom-left','woocommerce-products-slider'),
                    ''=>__('None','woocommerce-products-slider'),
                )
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'background_color',
                'css_id'		=> $element_index.'_background_color',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('Background color','woocommerce-products-slider'),
                'details'	=> __('Choose background color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $background_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[featured_mark]',
                'title'		=> __('Text color','woocommerce-products-slider'),
                'details'	=> __('Choose text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $text_color,
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $icon_img_src = isset($element_data['icon_img_src']) ? $element_data['icon_img_src'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $position = isset($element_data['position']) ? $element_data['position'] : '';
    $background_color = isset($element_data['background_color']) ? $element_data['background_color'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('On sale mark','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'icon_img_src',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('Icon image','woocommerce-products-slider'),
                'details'	=> __('Choose icon image','woocommerce-products-slider'),
                'type'		=> 'media_url',
                'value'		=> $icon_img_src,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace on-sale output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'On sale: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'position',
                'css_id'		=> $element_index.'_position',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('position','woocommerce-products-slider'),
                'details'	=> __('Choose position.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $position,
                'default'		=> '',
                'args'		=> array(
                    'topright'=>__('Top-right','woocommerce-products-slider'),
                    'topleft'=>__('Top-left','woocommerce-products-slider'),
                    'bottomright'=>__('Bottom-right','woocommerce-products-slider'),
                    'bottomleft'=>__('Bottom-left','woocommerce-products-slider'),
                    ''=>__('None','woocommerce-products-slider'),
                )
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'background_color',
                'css_id'		=> $element_index.'_background_color',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('Background color','woocommerce-products-slider'),
                'details'	=> __('Choose background color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $background_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[on_sale_mark]',
                'title'		=> __('Text color','woocommerce-products-slider'),
                'details'	=> __('Choose text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $text_color,
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $background_color = isset($element_data['background_color']) ? $element_data['background_color'] : '';
    $color = isset($element_data['color']) ? $element_data['color'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $show_quantity = isset($element_data['show_quantity']) ? $element_data['show_quantity'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Add to cart','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'background_color',
                'css_id'		=> $element_index.'_background_color',
                'parent' => $input_name.'[add_to_cart]',
                'title'		=> __('Background color','woocommerce-products-slider'),
                'details'	=> __('Choose background color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $background_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_color',
                'parent' => $input_name.'[add_to_cart]',
                'title'		=> __('Text color','woocommerce-products-slider'),
                'details'	=> __('Choose text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'show_quantity',
                'css_id'		=> $element_index.'_display_quantity',
                'parent' => $input_name.'[add_to_cart]',
                'title'		=> __('Display quantity','woocommerce-products-slider'),
                'details'	=> __('Choose display quantity input field.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $show_quantity,
                'default'		=> 'no',
                'args'		=> array('no'=> __('No', 'woocommerce-products-slider'),'yes'=> __('Yes', 'woocommerce-products-slider'), ),
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $rating_type = isset($element_data['rating_type']) ? $element_data['rating_type'] : 'five_star';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Rating','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'rating_type',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Rating type','woocommerce-products-slider'),
                'details'	=> __('Choose rating type.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $rating_type,
                'args'		=> array('text'=> 'Text', 'five_star'=>'Star'),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace rating output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Total sold: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_color',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Text Color','woocommerce-products-slider'),
                'details'	=> __('Choose text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[rating]',
                'title'		=> __('Font size','woocommerce-products-slider'),
                'details'	=> __('Set font size.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
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
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $price_type = isset($element_data['price_type']) ? $element_data['price_type'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $color = isset($element_data['color']) ? $element_data['color'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Product price','woocommerce-products-slider'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'price_type',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Price type','woocommerce-products-slider'),
                'details'	=> __('Choose price type.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $price_type,
                'args'		=> array('full'=> 'Full Format', 'sale'=>'Sale price' , 'regular'=>'Regular price'),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Wrapper html','woocommerce-products-slider'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace price output.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Price: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_color',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Text Color','woocommerce-products-slider'),
                'details'	=> __('Choose text color.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Margin','woocommerce-products-slider'),
                'details'	=> __('Set margin.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Font size','woocommerce-products-slider'),
                'details'	=> __('Set font size.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[product_price]',
                'title'		=> __('Text align','woocommerce-products-slider'),
                'details'	=> __('Choose text align.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'woocommerce-products-slider'),'right'=> __('Right', 'woocommerce-products-slider'),'center'=> __('Center', 'woocommerce-products-slider') ),
            );

            $settings_tabs_field->generate_field($args);


            ?>

        </div>
    </div>
    <?php

}


