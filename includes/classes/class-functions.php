<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 	

if( ! class_exists( 'class_wcps_functions' ) ) {
    class class_wcps_functions
    {


        public function __construct()
        {

        }


        public function ribbons()
        {

            $ribbons['none'] = array(
                'name' => 'None',
                'id' => 'none',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/none.png',
            );

            $ribbons['custom'] = array(
                'name' => 'Custom',
                'id' => 'custom',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/custom.png',
            );


            $ribbons['free'] = array(
                'name' => 'Free',
                'id' => 'free',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/free.png',
            );

            $ribbons['save'] = array(
                'name' => 'Save',
                'id' => 'save',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/save.png',
            );

            $ribbons['hot'] = array(
                'name' => 'Hot',
                'id' => 'hot',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/hot.png',
            );

            $ribbons['pro'] = array(
                'name' => 'Pro',
                'id' => 'pro',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/pro.png',
            );

            $ribbons['best'] = array(
                'name' => 'Best',
                'id' => 'best',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/best.png',
            );

            $ribbons['gift'] = array(
                'name' => 'Gift',
                'id' => 'gift',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/gift.png',
            );

            $ribbons['sale'] = array(
                'name' => 'Sale',
                'id' => 'sale',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/sale.png',
            );

            $ribbons['new'] = array(
                'name' => 'New',
                'id' => 'new',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/new.png',
            );

            $ribbons['top'] = array(
                'name' => 'Top',
                'id' => 'top',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/top.png',
            );

            $ribbons['fresh'] = array(
                'name' => 'Fresh',
                'id' => 'fresh',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/fresh.png',
            );


            $ribbons['dis-10'] = array(
                'name' => '-10%',
                'id' => 'dis-10',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-10.png',
            );

            $ribbons['dis-20'] = array(
                'name' => '-20%',
                'id' => 'dis-20',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-20.png',
            );

            $ribbons['dis-30'] = array(
                'name' => '-30%',
                'id' => 'dis-30',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-30.png',
            );

            $ribbons['dis-40'] = array(
                'name' => '-40%',
                'id' => 'dis-40',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-40.png',
            );

            $ribbons['dis-50'] = array(
                'name' => '-50%',
                'id' => 'dis-50',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-50.png',
            );

            $ribbons['dis-60'] = array(
                'name' => '-60%',
                'id' => 'dis-60',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-60.png',
            );

            $ribbons['dis-70'] = array(
                'name' => '-70%',
                'id' => 'dis-70',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-70.png',
            );

            $ribbons['dis-80'] = array(
                'name' => '-80%',
                'id' => 'dis-80',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-80.png',
            );

            $ribbons['dis-90'] = array(
                'name' => '-90%',
                'id' => 'dis-90',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-90.png',
            );

            $ribbons['dis-100'] = array(
                'name' => '-100%',
                'id' => 'dis-100',
                'src' => wcps_plugin_url . 'assets/front/images/ribbons/dis-100.png',
            );

            $ribbons_list = apply_filters('wcps_ribbons', $ribbons);

            return $ribbons_list;

        }

        public function wcps_layers(){

            $layers['content'] = array(
                'name' => 'Content',
                'elements' => array(
                    'title',
                    'excerpt',
                    'price',
//                    'category',
//                    'tag',
//                    'rating',
//                    'cart',
//                    'sale',
//                    'featured',
//                    'sale_count',



                ),
            );

            $layers['media'] = array(
                'name' => 'Media',
                'elements' => array(
                    'thumb',
                    'excerpt',
                ),
            );


            $layers = apply_filters('wcps_skin_layers', $layers);

            return $layers;

        }


        public function skins()
        {

            $skins = array(

                'flat' => array(
                    'slug' => 'flat',
                    'name' => 'Flat',
                    'thumb_url' => '',
                ),

                'zoomin' => array(
                    'slug' => 'zoomin',
                    'name' => 'ZoomIn',
                    'thumb_url' => '',
                ),

                'spinleft' => array(
                    'slug' => 'spinleft',
                    'name' => 'SpinLeft',
                    'thumb_url' => '',
                ),


                'contentbottom' => array(
                    'slug' => 'contentbottom',
                    'name' => 'ContentBottom',
                    'thumb_url' => '',
                ),


            );

            $skins = apply_filters('wcps_skins', $skins);

            return $skins;

        }


        public function wcps_grid_items($grid_items = array()){

            $grid_items = array(
                'thumb' => __('Thumbnail', 'woocommerce-products-slider'),
                'title' => __('Title', 'woocommerce-products-slider'),
                'excerpt' => __('Excerpt', 'woocommerce-products-slider'),
                'category' => __('Category', 'woocommerce-products-slider'),
                'tag'=>__('Tags','woocommerce-products-slider'),
                'price' => __('Price', 'woocommerce-products-slider'),
                'rating' => __('Rating', 'woocommerce-products-slider'),
                'cart' => __('Cart', 'woocommerce-products-slider'),
                'sale' => __('Sale', 'woocommerce-products-slider'),
                //'quick_view'=>__('Quick view', 'woocommerce-products-slider'),
                'featured' => __('Featured', 'woocommerce-products-slider'),
                //'popup_thumb'=>__('Popup Thumbnail', 'woocommerce-products-slider'),
                'sale_count' => __('Sale Count', 'woocommerce-products-slider'),


            );


            return apply_filters('wcps_grid_items', $grid_items);
        }


        public function wcps_elements(){

            $elements = array(
                'thumb' => __('Thumbnail', 'woocommerce-products-slider'),
                'title' => __('Title', 'woocommerce-products-slider'),
                'excerpt' => __('Excerpt', 'woocommerce-products-slider'),
                'category' => __('Category', 'woocommerce-products-slider'),
                'tag'=>__('Tags','woocommerce-products-slider'),
                'price' => __('Price', 'woocommerce-products-slider'),
                'rating' => __('Rating', 'woocommerce-products-slider'),
                'cart' => __('Cart', 'woocommerce-products-slider'),
                'sale' => __('Sale', 'woocommerce-products-slider'),
                //'quick_view'=>__('Quick view', 'woocommerce-products-slider'),
                'featured' => __('Featured', 'woocommerce-products-slider'),
                //'popup_thumb'=>__('Popup Thumbnail', 'woocommerce-products-slider'),
                'sale_count' => __('Sale Count', 'woocommerce-products-slider'),


            );


            return apply_filters('wcps_elements', $elements);
        }



        public function wcps_elements_settings_html(){


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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][0][element_id]" id="element_id" placeholder="" value="title">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Font size
                            <span data-title="Items title font size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][0][wcps_items_title_font_size]" id="wcps_items_title_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][0][wcps_items_title_text_align]" id="wcps_items_title_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][0][wcps_items_title_color]" id="wcps_items_title_color" placeholder="" value="#626262">
                        </div>
                    </div>

                </div>
            </div>
            <?php

            $html['title'] = ob_get_clean();

            ob_start();
            ?>
            <div class="element ">
                <div class="element-title ui-sortable-handle" data-element="thumb">
                    Thumbnail                                                            <span class="element-remove"><i class="fas fa-times"></i></span>
                </div>
                <div class="element-options">

                    <div class="control-wrap hidden">
                        <div class="control-title">Element id
                            <span data-title="" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[media][0][element_id]" id="element_id" placeholder="" value="thumb">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Max hieght(px)
                            <span data-title="Items thumbnail max height" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[media][0][wcps_items_thumb_max_hieght]" id="wcps_items_thumb_max_hieght" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Thumbnail size
                            <span data-title="Choose thumbnail size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[media][0][wcps_items_thumb_size]" id="wcps_items_thumb_size">
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
                        <div class="control-input">        <select name="layer_data[media][0][wcps_items_thumb_link_target]" id="wcps_items_thumb_link_target">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][1][element_id]" id="element_id" placeholder="" value="excerpt">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Word count
                            <span data-title="Excerpt word count" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="number" class="" name="layer_data[content][1][wcps_items_excerpt_count]" id="wcps_items_excerpt_count" placeholder="20" value="15">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Read more text
                            <span data-title="Excerpt read more text" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][1][wcps_items_excerpt_read_more]" id="wcps_items_excerpt_read_more" placeholder="View product" value="View product.">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text color
                            <span data-title="Items excerpt text color" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][1][wcps_items_excerpt_font_color]" id="wcps_items_excerpt_font_color" placeholder="" value="#626262">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][1][wcps_items_excerpt_text_align]" id="wcps_items_excerpt_text_align">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][3][element_id]" id="element_id" placeholder="" value="category">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Font size
                            <span data-title="Items category font size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][3][wcps_items_cat_font_size]" id="wcps_items_cat_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Category separator
                            <span data-title="Items category separator custom text" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][3][wcps_items_cat_separator]" id="wcps_items_cat_separator" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items category text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][3][wcps_items_cat_text_align]" id="wcps_items_cat_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][3][wcps_items_cat_font_color]" id="wcps_items_cat_font_color" placeholder="" value="#626262">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][4][element_id]" id="element_id" placeholder="" value="tag">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Font size
                            <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][4][wcps_items_tag_font_size]" id="wcps_items_tag_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Tag separator
                            <span data-title="Items tag separator custom text" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][4][wcps_items_tag_separator]" id="wcps_items_tag_separator" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items tag text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][4][wcps_items_tag_text_align]" id="wcps_items_tag_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][4][wcps_items_tag_font_color]" id="wcps_items_tag_font_color" placeholder="" value="">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][2][element_id]" id="element_id" placeholder="" value="price">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Price format
                            <span data-title="Price format on slider" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][2][wcps_total_items_price_format]" id="wcps_total_items_price_format">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][2][wcps_items_price_font_size]" id="wcps_items_price_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items title text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][2][wcps_items_price_text_align]" id="wcps_items_price_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][2][wcps_items_price_color]" id="wcps_items_price_color" placeholder="" value="#626262">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][5][element_id]" id="element_id" placeholder="" value="rating">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Font size
                            <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][5][wcps_items_ratings_font_size]" id="wcps_items_ratings_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items tag text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][5][wcps_ratings_text_align]" id="wcps_ratings_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][5][wcps_items_ratings_color]" id="wcps_items_ratings_color" placeholder="" value="">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][6][element_id]" id="element_id" placeholder="" value="cart">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Cart button style
                            <span data-title="Items cart button style" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][6][wcps_cart_display_quantity]" id="wcps_cart_display_quantity">
                                <option selected="" value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Font size
                            <span data-title="Items tag font size" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][6][wcps_items_cart_font_size]" id="wcps_items_cart_font_size" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Text align
                            <span data-title="Items cart text align" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <select name="layer_data[content][6][wcps_cart_text_align]" id="wcps_cart_text_align">
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
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][6][wcps_cart_bg]" id="wcps_cart_bg" placeholder="" value="">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Cart text color
                            <span data-title="Items cart text color" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][6][wcps_cart_text_color]" id="wcps_cart_text_color" placeholder="" value="#626262">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][7][element_id]" id="element_id" placeholder="" value="sale">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Sale marker icon url
                            <span data-title="Items sale marker icon url" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][7][wcps_sale_icon_url]" id="wcps_sale_icon_url" placeholder="" value="">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][8][element_id]" id="element_id" placeholder="" value="featured">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Featured marker icon url
                            <span data-title="Items featured marker icon url" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][8][wcps_featured_icon_url]" id="wcps_featured_icon_url" placeholder="" value="">
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
                        <div class="control-input">        <input type="hidden" class="" name="layer_data[content][9][element_id]" id="element_id" placeholder="" value="sale_count">
                        </div>
                    </div>
                    <div class="control-wrap ">
                        <div class="control-title">Sale count text
                            <span data-title="Items sale count text" class="control-description"><i class="far fa-question-circle"></i></span>
                        </div>
                        <div class="control-input">        <input type="text" class="" name="layer_data[content][9][wcps_sale_count_text]" id="wcps_sale_count_text" placeholder="" value="">
                        </div>
                    </div>

                </div>
            </div>
            <?php
            $html['sale_count'] = ob_get_clean();




            return apply_filters('wcps_elements_settings_html', $html);
        }


















    }
}