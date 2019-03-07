<?php
if ( ! defined('ABSPATH')) exit;  // if direct access  
	
	$html_cart = apply_filters( 'wcps_filter_cart', do_shortcode('[add_to_cart show_price="false" quantity="1" id="'.get_the_ID().'"]') );

	$add_to_cart_text = apply_filters('add_to_cart_text', 'Add to cart');



    global $woocommerce,$product;
    $cart_url = wc_get_cart_url();

    if($product->is_in_stock()):
        $html.= '<div class="wcps-items-cart '.$wcps_cart_style.'">';
        $html.= $html_cart;
        $html.= '</div>';
    else:
        $html.= '<div class="wcps-items-cart '.$wcps_cart_style.'">';
        $html.= __('Out of Stock','woocommerce-products-slider');
        $html.= '</div>';
    endif;








