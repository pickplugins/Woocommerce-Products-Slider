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
                'icon' => '',

                'elements' => array(
                    'title',
                    'excerpt',
                    'price',
                    'sku',
                    'category',
                    'tag',
                    'rating',
                    'cart',
                    'sale',
                    'featured',
                    'sale_count',



                ),
            );

            $layers['media'] = array(
                'name' => 'Media',
                'icon' => '',
                'elements' => array(
                    'thumb',
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


            $elements = array();

            $elements['thumb'] = array(
                'name'=>__('Thumbnail', 'woocommerce-products-slider'),
                'dummy_html'=> '<img alt="Logo Collection" src="http://localhost/wp-multi/woocommerce-products-slider/wp-content/uploads/sites/7/2019/07/logo-1.jpg">',

            );

            $elements['title'] = array(
                'name'=>__('Title', 'woocommerce-products-slider'),
                'dummy_html'=> 'Product Title',
            );
            $elements['excerpt'] = array(
                'name'=>__('Excerpt', 'woocommerce-products-slider'),
                'dummy_html'=> 'Product excerpt content goes here.',
            );

            $elements['category'] = array(
                'name'=>__('Category', 'woocommerce-products-slider'),
                'dummy_html'=> '<a href="">Hoodies</a>, <a href="">Cap</a>',
            );
            $elements['tag'] = array(
                'name'=>__('Tags', 'woocommerce-products-slider'),
                'dummy_html'=> '<a href="">Tag 1</a>, <a href="">Tag 2</a>',
            );
            $elements['price'] = array(
                'name'=>__('Price', 'woocommerce-products-slider'),
                'dummy_html'=> '$15',
            );

            $elements['rating'] = array(
                'name'=>__('Rating', 'woocommerce-products-slider'),
                'dummy_html'=> '5 Star',
            );
            $elements['cart'] = array(
                'name'=>__('Cart', 'woocommerce-products-slider'),
                'dummy_html'=> 'Add to cart',
            );

            $elements['sale'] = array(
                'name'=>__('Sale', 'woocommerce-products-slider'),
                'dummy_html'=> '',
            );
            $elements['featured'] = array(
                'name'=>__('Featured', 'woocommerce-products-slider'),
                'dummy_html'=> '',
            );
            $elements['sale_count'] = array(
                'name'=>__('Sale Count', 'woocommerce-products-slider'),
                'dummy_html'=> 'Total sold: 4',
            );

            $elements['sku'] = array(
                'name'=>__('SKU', 'woocommerce-products-slider'),
                'dummy_html'=> 'SKU: 123xyz',
            );



//            $elements['div_start'] = array(
//                'name'=>__('div start', 'woocommerce-products-slider'),
//                'dummy_html'=> '<div>Start - ',
//            );
//
//            $elements['div_end'] = array(
//                'name'=>__('div end', 'woocommerce-products-slider'),
//                'dummy_html'=> ' - End</div>',
//            );


            return apply_filters('wcps_elements', $elements);
        }





    }
}