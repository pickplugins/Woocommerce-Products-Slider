<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_action('wp_ajax_wcps_ajax_elements_settings_html', 'wcps_ajax_elements_settings_html');


function wcps_ajax_elements_settings_html(){

$time = time();


    $element = isset($_POST['element']) ? $_POST['element'] : '';

    $response = array();

    $html = array();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="title">
            Title                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="title">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items title font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_title_font_size]" id="wcps_items_title_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_items_title_text_align]" id="wcps_items_title_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items title font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_title_color]" id="wcps_items_title_color" placeholder="" value="#626262">
                </div>
            </div>

        </div>
    </div>
    <?php

    $html['title'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element">
        <div class="element-title ui-sortable-handle" data-element="thumb">
            Thumbnail                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[media]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="thumb">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Max hieght(px)
                    <span data-title="Items thumbnail max height" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[media]['<?php echo $time; ?>'][wcps_items_thumb_max_hieght]" id="wcps_items_thumb_max_hieght" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Thumbnail size
                    <span data-title="Choose thumbnail size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[media]['<?php echo $time; ?>'][wcps_items_thumb_size]" id="wcps_items_thumb_size">
                        <option selected="" value="0">thumbnail</option>
                        <option value="1">medium</option>
                        <option value="2">medium_large</option>
                        <option value="3">large</option>
                        <option value="4">post-thumbnail</option>
                        <option value="5">woocommerce_thumbnail</option>
                        <option value="6">woocommerce_single</option>
                        <option value="7">woocommerce_gallery_thumbnail</option>
                        <option value="8">shop_catalog</option>
                        <option value="9">shop_single</option>
                        <option value="10">shop_thumbnail</option>
                        <option value="11">full</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Link target
                    <span data-title="Items link target" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[media]['<?php echo $time; ?>'][wcps_items_thumb_link_target]" id="wcps_items_thumb_link_target">
                        <option selected="" value="_blank">_blank</option>
                        <option value="_self">_self</option>
                        <option value="_parent">_parent</option>
                        <option value="_top">_top</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['thumb'] = ob_get_clean();


    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="excerpt">
            Excerpt                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="excerpt">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Word count
                    <span data-title="Excerpt word count" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="number" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_excerpt_count]" id="wcps_items_excerpt_count" placeholder="20" value="15">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Read more text
                    <span data-title="Excerpt read more text" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_excerpt_read_more]" id="wcps_items_excerpt_read_more" placeholder="View product" value="View product.">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text color
                    <span data-title="Items excerpt text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_excerpt_font_color]" id="wcps_items_excerpt_font_color" placeholder="" value="#626262">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_items_excerpt_text_align]" id="wcps_items_excerpt_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['excerpt'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="category">
            Category                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="category">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items category font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_cat_font_size]" id="wcps_items_cat_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Category separator
                    <span data-title="Items category separator custom text" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_cat_separator]" id="wcps_items_cat_separator" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items category text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_items_cat_text_align]" id="wcps_items_cat_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items category text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_cat_font_color]" id="wcps_items_cat_font_color" placeholder="" value="#626262">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['category'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="tag">
            Tags                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="tag">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_tag_font_size]" id="wcps_items_tag_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Tag separator
                    <span data-title="Items tag separator custom text" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_tag_separator]" id="wcps_items_tag_separator" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items tag text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_items_tag_text_align]" id="wcps_items_tag_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items tag text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_tag_font_color]" id="wcps_items_tag_font_color" placeholder="" value="">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['tag'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="price">
            Price                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="price">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Price format
                    <span data-title="Price format on slider" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_total_items_price_format]" id="wcps_total_items_price_format">
                        <option selected="" value="full">Full format</option>
                        <option value="sale">Sale price</option>
                        <option value="regular">Regular price</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items title font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_price_font_size]" id="wcps_items_price_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_items_price_text_align]" id="wcps_items_price_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items price text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_price_color]" id="wcps_items_price_color" placeholder="" value="#626262">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['price'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="rating">
            Rating                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="rating">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_ratings_font_size]" id="wcps_items_ratings_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items tag text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_ratings_text_align]" id="wcps_ratings_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Color
                    <span data-title="Items text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_ratings_color]" id="wcps_items_ratings_color" placeholder="" value="">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['rating'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="cart">
            Cart                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="cart">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Cart button style
                    <span data-title="Items cart button style" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_cart_display_quantity]" id="wcps_cart_display_quantity">
                        <option selected="" value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Font size
                    <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_items_cart_font_size]" id="wcps_items_cart_font_size" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Text align
                    <span data-title="Items cart text align" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <select name="layer_data[content]['<?php echo $time; ?>'][wcps_cart_text_align]" id="wcps_cart_text_align">
                        <option selected="" value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Background color
                    <span data-title="cart Background color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_cart_bg]" id="wcps_cart_bg" placeholder="" value="">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Cart text color
                    <span data-title="Items cart text color" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_cart_text_color]" id="wcps_cart_text_color" placeholder="" value="#626262">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['cart'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="sale">
            Sale                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="sale">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Sale marker icon url
                    <span data-title="Items sale marker icon url" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_sale_icon_url]" id="wcps_sale_icon_url" placeholder="" value="">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['sale'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="featured">
            Featured                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="featured">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Featured marker icon url
                    <span data-title="Items featured marker icon url" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_featured_icon_url]" id="wcps_featured_icon_url" placeholder="" value="">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['featured'] = ob_get_clean();

    ob_start();
    ?>
    <div class="element ">
        <div class="element-title ui-sortable-handle" data-element="sale_count">
            Sale Count                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
        </div>
        <div class="element-options">

            <div class="control-wrap hidden">
                <div class="control-title">Element id
                    <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="hidden" class="" name="layer_data[content]['<?php echo $time; ?>'][element_id]" id="element_id" placeholder="" value="sale_count">
                </div>
            </div>
            <div class="control-wrap ">
                <div class="control-title">Sale count text
                    <span data-title="Items sale count text" class="control-description"><i class="far fa-question-circle"></i></span>
                </div>
                <div class="control-input">        <input type="text" class="" name="layer_data[content]['<?php echo $time; ?>'][wcps_sale_count_text]" id="wcps_sale_count_text" placeholder="" value="">
                </div>
            </div>

        </div>
    </div>
    <?php
    $html['sale_count'] = ob_get_clean();




    $html = apply_filters('wcps_elements_settings_html', $html);

    $response['html'] = $html[$element];

    echo json_encode( $response );
    die();


}


