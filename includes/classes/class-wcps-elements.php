<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

if( ! class_exists( 'class_wcps_elements' ) ) {
    class class_wcps_elements{

        public $post_id = '';

        public function __construct($post_id){

            $this->post_id = $post_id;

        }

        public function wcps_element_thumb(){

            $post_id = $this->post_id;

            $element_data = array();
            $element_data['name'] = __('Thumbnail','woocommerce-products-slider');
            $element_data['dummy_html'] = '<img alt="WordPress Pennant" src="http://localhost/wp-multi/woocommerce-products-slider/wp-content/uploads/sites/7/2019/07/pennant-1.jpg">';


            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
            $thumb_url = isset($thumb['0']) ? $thumb['0'] : '';

            $element_data['html'] = $thumb_url;

            return $element_data;

        }

        public function wcps_element_title(){

        }
        public function wcps_element_excerpt(){

        }

        public function wcps_element_category(){

        }

        public function wcps_element_tag(){

        }

        public function wcps_element_price(){

        }

        public function wcps_element_rating(){

        }

        public function wcps_element_cart(){

        }

        public function wcps_element_sale(){

        }

        public function wcps_element_featured(){

        }

        public function wcps_element_sale_count(){

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











    }
}