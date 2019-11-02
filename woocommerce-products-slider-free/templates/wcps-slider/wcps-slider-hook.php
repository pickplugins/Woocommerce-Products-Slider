<?php
if ( ! defined('ABSPATH')) exit;  // if direct access 


add_action('wcps_slider_main','wcps_slider_main');
function wcps_slider_main($atts){

    $wcps_id = $atts['id'];
    $is_mobile =  (wp_is_mobile()) ? "wcps_mobile" : '';


    ?>
    <div  class="wcps-container wcps-container-<?php echo $wcps_id; ?> <?php echo $is_mobile; ?>">

        <?php

        do_action('wcps_container', $atts);

        ?>

    </div>
    <?php


}

add_action('wcps_container','wcps_container_ribbon');
function wcps_container_ribbon($atts){

    $wcps_id = $atts['id'];
    $wcps_ribbon_name = get_post_meta( $wcps_id, 'wcps_ribbon_name', true );
    $wcps_ribbon_name = !empty($wcps_ribbon_name) ? $wcps_ribbon_name : 'none';
    $wcps_ribbon_custom = get_post_meta( $wcps_id, 'wcps_ribbon_custom', true );



    if($wcps_ribbon_name=='none'):

        return;

    elseif ($wcps_ribbon_name=='custom'):
        $ribbon_url = $wcps_ribbon_custom;
    else:
        $ribbon_url = wcps_plugin_url.'assets/front/images/ribbons/'.$wcps_ribbon_name.'.png';

    endif;


    ?>
    <div class="wcps-ribbon wcps-ribbon-<?php echo $wcps_ribbon_name; ?>" data-position="topleft" style="background:url(<?php echo $ribbon_url; ?>) no-repeat scroll 0 0 rgba(0, 0, 0, 0)"></div>
    <?php


}


add_action('wcps_container','wcps_container_product_loop');
function wcps_container_product_loop($atts){

    $wcps_id = $atts['id'];

    ?>
    <div  id="wcps-<?php echo $wcps_id; ?>" class="owl-carousel owl-theme">
        <?php

        do_action('wcps_loop', $atts);

        ?>
    </div>
    <?php


}


add_action('wcps_loop','wcps_loop');
function wcps_loop($atts){

    $wcps_id = $atts['id'];

    $wcps_product_categories = get_post_meta( $wcps_id, 'wcps_product_categories', true );
    $wcps_hide_out_of_stock = get_post_meta( $wcps_id, 'wcps_hide_out_of_stock', true );
    $wcps_product_featured = get_post_meta( $wcps_id, 'wcps_product_featured', true );
    if(empty($wcps_product_featured)){$wcps_product_featured ='no'; }

    $wcps_product_on_sale = get_post_meta( $wcps_id, 'wcps_product_on_sale', true );
    if(empty($wcps_product_on_sale)){$wcps_product_on_sale = 'no'; }

    $wcps_total_items = get_post_meta( $wcps_id, 'wcps_total_items', true );
    if(empty($wcps_total_items)){$wcps_total_items = 10; }

    $wcps_query_order = get_post_meta( $wcps_id, 'wcps_query_order', true );
    $wcps_query_orderby = get_post_meta( $wcps_id, 'wcps_query_orderby', true );

    if(is_array($wcps_query_orderby)){
        $wcps_query_orderby = implode(' ', $wcps_query_orderby);
    }

    $meta_query = array();
    $default_query = array();
    $tax_terms = array();
    $tax_query = array();




    /*Categories and taxonomies*/

    if(!empty($wcps_product_categories)){
        foreach($wcps_product_categories as $category){
            $tax_cat = explode(',',$category);

            $taxonomy = isset($tax_cat[0]) ? $tax_cat[0] : '';
            $term_id  = isset($tax_cat[1]) ? $tax_cat[1] : '';

            if(!empty($taxonomy) && !empty($term_id))
                $tax_terms[$taxonomy][] = $term_id;

        }
    }




    if(!empty($tax_terms)){
        foreach($tax_terms as $taxonomy=>$terms){

            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'id',
                'terms'    => $terms,
                //'operator'    => '',
            );
        }
    }





    if($wcps_hide_out_of_stock=='yes'){

        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'outofstock',
            'operator' => 'NOT IN',
        );

    }


    if($wcps_product_featured=='yes'){

        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'featured',
            'operator' => 'IN',
        );

    }
    elseif($wcps_product_featured=='no'){

        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'featured',
            'operator' => 'NOT IN',
        );

    }




    if($wcps_product_on_sale=='yes'){

        $wc_get_product_ids_on_sale = wc_get_product_ids_on_sale();
        $default_query['post__in'] = $wc_get_product_ids_on_sale;

    }



    $wcps_product_ids = !empty($wcps_product_ids) ? array_map('intval',explode(',', $wcps_product_ids)) : array();


    $default_query['post_type'] = 'product';
    $default_query['post_status'] = 'publish';
    $default_query['posts_per_page'] = $wcps_total_items;

    if(!empty($wcps_query_orderby) && $wcps_query_orderby != 'none')
        $default_query['orderby'] = $wcps_query_orderby;

    $default_query['order'] = $wcps_query_order;


    if(!empty($meta_query))
        $default_query['meta_query'] = $meta_query;

    if(!empty($tax_query))
        $default_query['tax_query'] = $tax_query;


    $query_args = apply_filters('wcps_query_args', $default_query);

    //echo '<pre>'.var_export($query_args, true).'</pre>';


    $wp_query = new WP_Query($query_args);


    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();

            $loop_product_id = get_the_id();

            do_action('wcps_loop_item', $loop_product_id, $atts);

        endwhile;

        wp_reset_query();

    else:

        ?>
        <div class="no-product"><?php echo __('No Product to Slide', 'woocommerce-products-slider'); ?></div>
        <?php

    endif;





}


add_action('wcps_loop_item', 'wcps_loop_item',10,2);

function wcps_loop_item($loop_product_id, $atts){

    $wcps_id = $atts['id'];

    //$class_wcps_elements = new class_wcps_elements();

    $class_wcps_functions = new class_wcps_functions();
    $wcps_layers = $class_wcps_functions->wcps_layers();



    $wcps_items_thumb_link_target = get_post_meta( $wcps_id, 'wcps_items_thumb_link_target', true );
    $permalink = get_permalink($loop_product_id);
    $wcps_featured = get_post_meta($wcps_id, '_featured', true);
    $wcps_items_thumb_size = get_post_meta( $wcps_id, 'wcps_items_thumb_size', true );

    $wcps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($loop_product_id), $wcps_items_thumb_size);
    $wcps_thumb_url = $wcps_thumb['0'];

    $wcps_items_empty_thumb = get_post_meta( $wcps_id, 'wcps_items_empty_thumb', true );
    if(empty($wcps_items_empty_thumb)){$wcps_items_empty_thumb = wcps_plugin_url.'assets/front/images/no-thumb.png'; }
    $wcps_items_thumb_zoom = get_post_meta( $wcps_id, 'wcps_items_thumb_zoom', true );

    $wcps_grid_items = get_post_meta( $wcps_id, 'wcps_grid_items', true );
    $wcps_grid_items_hide = get_post_meta( $wcps_id, 'wcps_grid_items_hide', true );

    $wcps_items_title_color = get_post_meta( $wcps_id, 'wcps_items_title_color', true );
    if(empty($wcps_items_title_color)){$wcps_items_title_color = '#626262';}


    $wcps_items_thumb_size = get_post_meta( $wcps_id, 'wcps_items_thumb_size', true );

    $wcps_items_thumb_link_target = get_post_meta( $wcps_id, 'wcps_items_thumb_link_target', true );


    $wcps_items_thumb_max_hieght = get_post_meta( $wcps_id, 'wcps_items_thumb_max_hieght', true );
    $wcps_items_thumb_zoom = get_post_meta( $wcps_id, 'wcps_items_thumb_zoom', true );

    $wcps_items_empty_thumb = get_post_meta( $wcps_id, 'wcps_items_empty_thumb', true );
    if(empty($wcps_items_empty_thumb)){$wcps_items_empty_thumb = wcps_plugin_url.'assets/front/images/no-thumb.png'; }

    $wcps_items_title_color = get_post_meta( $wcps_id, 'wcps_items_title_color', true );
    if(empty($wcps_items_title_color)){$wcps_items_title_color = '#626262';}

    $wcps_items_title_font_size = get_post_meta( $wcps_id, 'wcps_items_title_font_size', true );
    $wcps_items_title_text_align = get_post_meta( $wcps_id, 'wcps_items_title_text_align', true );


    $wcps_items_excerpt_count = (int)get_post_meta( $wcps_id, 'wcps_items_excerpt_count', true );


    $wcps_items_excerpt_read_more = get_post_meta( $wcps_id, 'wcps_items_excerpt_read_more', true );
    if(empty($wcps_items_excerpt_read_more)){$wcps_items_excerpt_read_more = 'View product.'; }


    $wcps_items_excerpt_font_size = get_post_meta( $wcps_id, 'wcps_items_excerpt_font_size', true );
    $wcps_items_excerpt_text_align = get_post_meta( $wcps_id, 'wcps_items_excerpt_text_align', true );
    $wcps_items_excerpt_font_color = get_post_meta( $wcps_id, 'wcps_items_excerpt_font_color', true );
    if(empty($wcps_items_excerpt_font_color)){$wcps_items_excerpt_font_color = '#626262';}



    $wcps_items_cat_font_size = get_post_meta( $wcps_id, 'wcps_items_cat_font_size', true );
    $wcps_items_cat_text_align = get_post_meta( $wcps_id, 'wcps_items_cat_text_align', true );
    $wcps_items_cat_font_color = get_post_meta( $wcps_id, 'wcps_items_cat_font_color', true );
    if(empty($wcps_items_cat_font_color)){$wcps_items_cat_font_color = '#626262';}


    $wcps_items_cat_separator = get_post_meta( $wcps_id, 'wcps_items_cat_separator', true );
    if(empty($wcps_items_cat_separator)){$wcps_items_cat_separator = ' ';}

    //var_dump($wcps_items_cat_separator);


    $wcps_total_items_price_format = get_post_meta( $wcps_id, 'wcps_total_items_price_format', true );
    $wcps_items_price_color = get_post_meta( $wcps_id, 'wcps_items_price_color', true );
    if(empty($wcps_items_price_color)){$wcps_items_price_color = '#626262';}

    $wcps_items_price_font_size = get_post_meta( $wcps_id, 'wcps_items_price_font_size', true );
    $wcps_items_price_text_align = get_post_meta( $wcps_id, 'wcps_items_price_text_align', true );

    $wcps_ratings_text_align = get_post_meta( $wcps_id, 'wcps_ratings_text_align', true );
    $wcps_items_ratings_font_size = get_post_meta( $wcps_id, 'wcps_items_ratings_font_size', true );
    $wcps_items_ratings_color = get_post_meta( $wcps_id, 'wcps_items_ratings_color', true );


    $wcps_cart_style = get_post_meta( $wcps_id, 'wcps_cart_style', true );
    $wcps_cart_bg = get_post_meta( $wcps_id, 'wcps_cart_bg', true );

    $wcps_cart_text_color = get_post_meta( $wcps_id, 'wcps_cart_text_color', true );
    if(empty($wcps_cart_text_color)){$wcps_cart_text_color = '#626262'; }

    $wcps_cart_text_align = get_post_meta( $wcps_id, 'wcps_cart_text_align', true );
    $wcps_cart_display_quantity = get_post_meta( $wcps_id, 'wcps_cart_display_quantity', true );

    $wcps_sale_icon_url = get_post_meta( $wcps_id, 'wcps_sale_icon_url', true );
    $wcps_sale_count_text = get_post_meta( $wcps_id, 'wcps_sale_count_text', true );

    $wcps_featured_icon_url = get_post_meta( $wcps_id, 'wcps_featured_icon_url', true );


    if (empty($wcps_thumb_url)) {
        $wcps_thumb_url = $wcps_items_empty_thumb;
    }

    $wcps_themes = get_post_meta( $wcps_id, 'wcps_themes', true );
    if(empty($wcps_themes)){$wcps_themes = 'flat'; }

    global $product;
    $currency = get_woocommerce_currency_symbol();

    $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);

    if ($wcps_total_items_price_format == 'full') {
        $price = $product->get_price_html();
    } elseif ($wcps_total_items_price_format == 'sale') {

        $price = $currency . get_post_meta(get_the_ID(), '_sale_price', true);
    } elseif ($wcps_total_items_price_format == 'regular') {
        $price = $currency . get_post_meta(get_the_ID(), '_regular_price', true);
    } else {
        $price = $product->get_price_html();
    }

    $product_visibility = wp_get_post_terms(get_the_ID(), 'product_visibility');
    $product_is_featured = 'no';

    if (!empty($product_visibility)) {
        foreach ($product_visibility as $visibility) {
            $is_featured = $visibility->slug;
            if ($is_featured == 'featured') {
                $product_is_featured = 'yes';
            }
        }
    }

    ?>
    <div class="wcps-items  skin <?php echo $wcps_themes; ?>">

        <?php

        if(!empty($wcps_layers))
        foreach ($wcps_layers as $layer_key => $layer){

            $layer_elements = isset($layer['elements']) ? $layer['elements'] : array();

            ?>
            <div class="layer-<?php echo $layer_key; ?>">
                <?php

                if(!empty($layer_elements))
                foreach ($layer_elements as $element_key => $element){

                    do_action("wcps_layer_element_$element_key");

                }

                ?>
            </div>
            <?php

        }

        ?>

        <?php

        $html = '';


        include wcps_plugin_dir . '/templates/layer-media.php';
        include wcps_plugin_dir . '/templates/layer-content.php';

        echo $html;
        ?>

    </div>
    <?php

}








































add_action('wcps_slider_main','wcps_slider_main_scripts');
function wcps_slider_main_scripts($atts){

    $wcps_id = $atts['id'];

    $wcps_column_number = get_post_meta( $wcps_id, 'wcps_column_number', true );
    if(empty($wcps_column_number)){
        $wcps_column_number = 4;
    }
    $wcps_column_number_tablet = get_post_meta( $wcps_id, 'wcps_column_number_tablet', true );
    if(empty($wcps_column_number_tablet)){
        $wcps_column_number_tablet = 3;
    }

    $wcps_column_number_mobile = get_post_meta( $wcps_id, 'wcps_column_number_mobile', true );
    if(empty($wcps_column_number_mobile)){
        $wcps_column_number_mobile = 1;
    }


    $wcps_auto_play = get_post_meta( $wcps_id, 'wcps_auto_play', true );
    if(empty($wcps_auto_play)){
        $wcps_auto_play = 'true';
    }


    $wcps_auto_play_speed = get_post_meta( $wcps_id, 'wcps_auto_play_speed', true );
    if(empty($wcps_auto_play_speed)){
        $wcps_auto_play_speed = 1000;
    }

    $wcps_auto_play_timeout = get_post_meta( $wcps_id, 'wcps_auto_play_timeout', true );
    if(empty($wcps_auto_play_timeout)){
        $wcps_auto_play_timeout = 1000;
    }





    $wcps_rewind = get_post_meta( $wcps_id, 'wcps_rewind', true );
    if(empty($wcps_rewind)){
        $wcps_rewind = 'true';
    }

    $wcps_loop = get_post_meta( $wcps_id, 'wcps_loop', true );
    if(empty($wcps_loop)){
        $wcps_loop = 'true';
    }

    $wcps_slideBy = get_post_meta( $wcps_id, 'wcps_slideBy', true );
    if(empty($wcps_slideBy)){
        $wcps_slideBy = 'true';
    }

    $wcps_center = get_post_meta( $wcps_id, 'wcps_center', true );
    if(empty($wcps_center)){
        $wcps_center = 'false';
    }


    $wcps_stop_on_hover = get_post_meta( $wcps_id, 'wcps_stop_on_hover', true );
    if(empty($wcps_stop_on_hover)){
        $wcps_stop_on_hover = 'true';
    }


    $wcps_slider_navigation = get_post_meta( $wcps_id, 'wcps_slider_navigation', true );
    if(empty($wcps_slider_navigation)){
        $wcps_slider_navigation = 'true';
    }


    $wcps_slider_navigation_position = get_post_meta( $wcps_id, 'wcps_slider_navigation_position', true );
    if(empty($wcps_slider_navigation_position)){
        $wcps_slider_navigation_position = 'topright';
    }

    $wcps_slide_speed = get_post_meta( $wcps_id, 'wcps_slide_speed', true );
    if(empty($wcps_slide_speed)){
        $wcps_slide_speed = '1000';
    }


    $wcps_slider_pagination = get_post_meta( $wcps_id, 'wcps_slider_pagination', true );
    $wcps_pagination_slide_speed = get_post_meta( $wcps_id, 'wcps_pagination_slide_speed', true );
    if(empty($wcps_pagination_slide_speed)){$wcps_pagination_slide_speed = '1000'; }

    $wcps_slider_pagination_count = get_post_meta( $wcps_id, 'wcps_slider_pagination_count', true );
    $wcps_slider_pagination_bg = get_post_meta( $wcps_id, 'wcps_slider_pagination_bg', true );
    $wcps_slider_pagination_text_color = get_post_meta( $wcps_id, 'wcps_slider_pagination_text_color', true );

    $wcps_slider_touch_drag = get_post_meta( $wcps_id, 'wcps_slider_touch_drag', true );
    $wcps_slider_mouse_drag = get_post_meta( $wcps_id, 'wcps_slider_mouse_drag', true );

    $wcps_slider_rtl = get_post_meta( $wcps_id, 'wcps_slider_rtl', true );
    if(empty($wcps_slider_rtl)){$wcps_slider_rtl = 'false'; }

    $wcps_slider_animateout = get_post_meta( $wcps_id, 'wcps_slider_animateout', true );
    if(empty($wcps_slider_animateout)){$wcps_slider_animateout = 'fadeOut'; }

    $wcps_slider_animatein = get_post_meta( $wcps_id, 'wcps_slider_animatein', true );
    if(empty($wcps_slider_animatein)){$wcps_slider_animatein = 'flipInX'; }




    ?>

    <script>
        jQuery(document).ready(function($)
        {
            $("#wcps-<?php echo $wcps_id; ?>").owlCarousel({

                items : <?php echo $wcps_column_number; ?>,
                lazyLoad : true,

                responsiveClass:true,

                responsive:{
                    0:{
                        items:<?php echo $wcps_column_number_mobile; ?>,

                    },
                    600:{
                        items:<?php echo $wcps_column_number_tablet; ?>,

                    },

                    900:{
                        items:<?php echo $wcps_column_number_tablet; ?>,

                    },

                    1000:{
                        items:<?php echo $wcps_column_number; ?>,


                    }
                },
                slideBy: <?php echo $wcps_slideBy; ?>,
                loop: <?php echo $wcps_loop; ?>,
                rewind: <?php echo $wcps_rewind; ?>,
                center: <?php echo $wcps_center; ?>,
                rtl: <?php echo $wcps_slider_rtl; ?>,
                animateOut: "<?php echo $wcps_slider_animateout; ?>",
                animateIn: "<?php echo $wcps_slider_animatein; ?>",
                autoplay: <?php echo $wcps_auto_play; ?>,
                autoplayHoverPause: <?php echo $wcps_stop_on_hover; ?>,
                autoplaySpeed: <?php echo $wcps_auto_play_speed; ?>,
                autoplayTimeout: <?php echo $wcps_auto_play_timeout; ?>,
                navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
                nav: true,
                dots: true,
                navSpeed: <?php echo $wcps_slide_speed; ?>,
                dotsSpeed: <?php echo $wcps_pagination_slide_speed; ?>,
                touchDrag : true,
                mouseDrag  : true,

            })


            $('#wcps-<?php echo $wcps_id; ?> .wcps-items-cart p').prepend('<input value=1 class=quantity type=number> ');

            $('.wcps-container .owl-nav').attr('data-position', '<?php echo $wcps_slider_navigation_position; ?>');

        })









    </script>

    <?php


}