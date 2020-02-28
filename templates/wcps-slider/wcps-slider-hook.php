<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_action('wcps_slider_main', 'wcps_slider_main_ribbon');
function wcps_slider_main_ribbon($args){
    $wcps_id = isset($args['wcps_id']) ? (int) $args['wcps_id'] : 0;
    $wcps_options = get_post_meta( $wcps_id, 'wcps_options', true );
    $slider_ribbon = isset($wcps_options['ribbon']) ? $wcps_options['ribbon'] : array();

    $ribbon_name = isset($slider_ribbon['ribbon_name']) ? $slider_ribbon['ribbon_name'] : '';
    $ribbon_custom = isset($slider_ribbon['ribbon_custom']) ? $slider_ribbon['ribbon_custom'] : '';
    $ribbon_position = isset($slider_ribbon['position']) ? $slider_ribbon['position'] : '';

    $ribbon_text = isset($slider_ribbon['text']) ? $slider_ribbon['text'] : '';
    $ribbon_background_img = isset($slider_ribbon['background_img']) ? $slider_ribbon['background_img'] : '';
    $ribbon_background_color = isset($slider_ribbon['background_color']) ? $slider_ribbon['background_color'] : '';
    $ribbon_text_color = isset($slider_ribbon['text_color']) ? $slider_ribbon['text_color'] : '';
    $ribbon_width = isset($slider_ribbon['width']) ? $slider_ribbon['width'] : '';
    $ribbon_height = isset($slider_ribbon['height']) ? $slider_ribbon['height'] : '';
    $ribbon_position = isset($slider_ribbon['position']) ? $slider_ribbon['position'] : '';



    if($ribbon_name == 'none'){
        $ribbon_url = '';
    }elseif($ribbon_name == 'custom'){
        $ribbon_url = $ribbon_custom;
    }else{
        $ribbon_url = wcps_plugin_url.'assets/front/images/ribbons/'.$ribbon_name.'.png';
    }



    $ribbon_url = apply_filters( 'wcps_ribbon_img', $ribbon_url );

    //var_dump($slider_ribbon);

    if(!empty($ribbon_url)):
        ?>
        <div class="wcps-ribbon <?php echo $ribbon_position; ?>" ><?php echo $ribbon_text; ?></div>

        <style type="text/css">
            .wcps-ribbon{
                background-color: <?php echo $ribbon_background_color; ?>;
                background-image: url("<?php echo $ribbon_background_img; ?>");
                color: <?php echo $ribbon_text_color; ?>;
                width: <?php echo $ribbon_width; ?>;
                height: <?php echo $ribbon_height; ?>;
                text-align: center;
                text-transform: uppercase;
                background-repeat: no-repeat;
                background-size: 100%;
            }
        </style>
    <?php
    endif;


}



add_action('wcps_slider_main', 'wcps_slider_main_items');

function wcps_slider_main_items($args){

    $wcps_id = isset($args['wcps_id']) ? (int) $args['wcps_id'] : 0;

    $wcps_options = get_post_meta( $wcps_id, 'wcps_options', true );
    $query = isset($wcps_options['query']) ? $wcps_options['query'] : array();

    $max_product_count = isset($query['max_product_count']) ? $query['max_product_count'] : 10;
    $query_order = isset($query['order']) ? $query['order'] : 'DESC';
    $query_orderby = isset($query['orderby']) ? $query['orderby'] : 'date';
    $hide_out_of_stock = isset($query['hide_out_of_stock']) ? $query['hide_out_of_stock'] : 'no_check';
    $product_featured = isset($query['product_featured']) ? $query['product_featured'] : 'no_check';
    $categories = isset($query['categories']) ? $query['categories'] : array();


    $on_sale = isset($query['on_sale']) ? $query['on_sale'] : 'no';
    $product_ids = isset($query['product_ids']) ? $query['product_ids'] : '';

    wp_enqueue_style( 'font-awesome-5' );

    //if(empty($post_id)) return;

    $tax_query = array();
    $query_args['post_type'] 		= 'product';
    $query_args['orderby']  		= $query_orderby;

    if(!empty($query_orderby_meta_key))
        $query_args['meta_key']         = $query_orderby_meta_key;

    $query_args['order']  			= $query_order;
    $query_args['posts_per_page'] 	= $max_product_count;


    $query_args = apply_filters('wcps_slider_query_args', $query_args, $args);
    //echo '<pre>'.var_export($wcps_id, true).'</pre>';
    $wcps_query = new WP_Query($query_args);
    //echo '<pre>'.var_export($query_args, true).'</pre>';

    if ( $wcps_query->have_posts() ) :

        $wcps_items_class = apply_filters('wcps_items_wrapper_class', 'wcps-items owl-carousel owl-theme', $args);

        do_action('wcps_slider_before_items', $wcps_query, $args);

        ?>
        <div id="wcps-<?php echo $wcps_id; ?>" class="<?php echo $wcps_items_class; ?>">
            <?php

            while ( $wcps_query->have_posts() ) : $wcps_query->the_post();

                $product_id = get_the_id();
                $args['product_id'] = $product_id;

                //echo '<pre>'.var_export($product_id, true).'</pre>';
                do_action('wcps_slider_item', $args);

            endwhile;

            wp_reset_query();
            ?>
        </div>

        <?php


        do_action('wcps_slider_after_items', $wcps_query, $args);

        ?>

    <?php
    else:
        do_action('wcps_slider_no_item');
    endif;


}






add_action('wcps_slider_item', 'wcps_slider_item');

function wcps_slider_item($args){

    $wcps_id = isset($args['wcps_id']) ? $args['wcps_id'] : '';
    $product_id = isset($args['product_id']) ? $args['product_id'] : 0;
    $args['product_id'] = $product_id;

    $wcps_options = get_post_meta( $wcps_id, 'wcps_options', true );
    $item_layout_id = isset($wcps_options['item_layout_id']) ? $wcps_options['item_layout_id'] : wcps_first_wcps_layout();
    $layout_elements_data = get_post_meta( $item_layout_id, 'layout_elements_data', true );

    $wcps_item_class = apply_filters('wcps_slider_item_class', 'item ', $args);


    //echo '<pre>'.var_export($item_layout_id, true).'</pre>';

    ?>
    <div class="<?php echo $wcps_item_class; ?>">
        <div class="elements-wrapper layout-<?php echo $item_layout_id; ?>">
            <?php
            if(!empty($layout_elements_data))
                foreach ($layout_elements_data as $elementGroupIndex => $elementGroupData){

                    if(!empty($elementGroupData))
                        foreach ($elementGroupData as $elementIndex => $elementData){

                            $args['elementData'] = $elementData;
                            $args['element_index'] = $elementGroupIndex;

                            //echo '<pre>'.var_export($elementIndex, true).'</pre>';


                            do_action('wcps_layout_element_'.$elementIndex, $args);
                        }
                }
            ?>
        </div>
    </div>
    <?php

}





add_filter('wcps_slider_main', 'wcps_slider_main_scripts');

function wcps_slider_main_scripts( $args){

    $wcps_id = isset($args['wcps_id']) ? $args['wcps_id'] : '';

    $wcps_options = get_post_meta($wcps_id, 'wcps_options', true);

    $container = isset($wcps_options['container']) ? $wcps_options['container'] : array();
    $container_background_img_url = isset($container['background_img_url']) ? $container['background_img_url'] : '';
    $container_background_color = isset($container['background_color']) ? $container['background_color'] : '';
    $container_padding = isset($container['padding']) ? $container['padding'] : '';
    $container_margin = isset($container['margin']) ? $container['margin'] : '';

    $item_style = isset($wcps_options['item_style']) ? $wcps_options['item_style'] : array();

    $item_padding = isset($item_style['padding']) ? $item_style['padding'] : '';
    $item_margin = isset($item_style['margin']) ? $item_style['margin'] : '';
    $item_background_color = isset($item_style['background_color']) ? $item_style['background_color'] : '';
    $item_text_align = isset($item_style['text_align']) ? $item_style['text_align'] : '';

    $slider_option = isset($wcps_options['slider']) ? $wcps_options['slider'] : array();

    $slider_column_large = isset($slider_option['column_large']) ? $slider_option['column_large'] : 3;
    $slider_column_medium = isset($slider_option['column_medium']) ? $slider_option['column_medium'] : 2;
    $slider_column_small = isset($slider_option['column_small']) ? $slider_option['column_small'] : 1;

    $slider_slide_speed = isset($slider_option['slide_speed']) ? $slider_option['slide_speed'] : 1000;
    $slider_pagination_speed = isset($slider_option['pagination_speed']) ? $slider_option['pagination_speed'] : 1200;

    $slider_auto_play = isset($slider_option['auto_play']) ? $slider_option['auto_play'] : 'true';
    $auto_play_speed = !empty($slider_option['auto_play_speed']) ? $slider_option['auto_play_speed'] : 1000;
    $auto_play_timeout = !empty($slider_option['auto_play_timeout']) ? $slider_option['auto_play_timeout'] : 1200;

    $auto_play_timeout = ($auto_play_speed > $auto_play_timeout) ? $auto_play_speed + 1000 : $auto_play_timeout;

    $slider_rewind = !empty($slider_option['rewind']) ? $slider_option['rewind'] : 'true';
    $slider_loop = !empty($slider_option['loop']) ? $slider_option['loop'] : 'true';
    $slider_center = !empty($slider_option['center']) ? $slider_option['center'] : 'true';
    $slider_stop_on_hover = isset($slider_option['stop_on_hover']) ? $slider_option['stop_on_hover'] : 'true';
    $slider_navigation = isset($slider_option['navigation']) ? $slider_option['navigation'] : 'true';
    $navigation_position = isset($slider_option['navigation_position']) ? $slider_option['navigation_position'] : '';
    $navigation_background_color = isset($slider_option['navigation_background_color']) ? $slider_option['navigation_background_color'] : '';
    $navigation_color = isset($slider_option['navigation_color']) ? $slider_option['navigation_color'] : '';
    $navigation_style = isset($slider_option['navigation_style']) ? $slider_option['navigation_style'] : 'flat';

    $dots_background_color = isset($slider_option['dots_background_color']) ? $slider_option['dots_background_color'] : '';
    $dots_active_background_color = isset($slider_option['dots_active_background_color']) ? $slider_option['dots_active_background_color'] : '';

    $slider_pagination = isset($slider_option['pagination']) ? $slider_option['pagination'] : 'true';
    $slider_pagination_count = isset($slider_option['pagination_count']) ? $slider_option['pagination_count'] : 'false';
    $slider_rtl = !empty($slider_option['rtl']) ? $slider_option['rtl'] : 'false';
    $slider_lazy_load = isset($slider_option['lazy_load']) ? $slider_option['lazy_load'] : 'true';
    $slider_mouse_drag = isset($slider_option['mouse_drag']) ? $slider_option['mouse_drag'] : 'true';
    $slider_touch_drag = isset($slider_option['touch_drag']) ? $slider_option['touch_drag'] : 'true';

    $item_layout_id = isset($wcps_options['item_layout_id']) ? $wcps_options['item_layout_id'] : '';
    $layout_elements_data = get_post_meta( $item_layout_id, 'layout_elements_data', true );
    $args['layout_id'] = $item_layout_id;


    wp_enqueue_script('owl.carousel');
    wp_enqueue_style('owl.carousel');

        //echo '<pre>'.var_export($item_layout_id, true).'</pre>';
//        echo '<pre>'.var_export($auto_play_speed, true).'</pre>';
//        echo '<pre>'.var_export($auto_play_timeout, true).'</pre>';

        ?>
        <script>
            jQuery(document).ready(function($){
                $("#wcps-<?php echo $wcps_id; ?>").owlCarousel({
                    items : <?php echo $slider_column_large; ?>, //10 items above 1000px browser width
                    autoHeight:false,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:<?php echo $slider_column_small; ?>,
                            nav:true
                        },
                        600:{
                            items:<?php echo $slider_column_medium; ?>,
                            nav:true
                        },
                        900:{
                            items:<?php echo $slider_column_medium; ?>,
                            nav:true
                        },
                        1000:{
                            items:<?php echo $slider_column_large; ?>,
                            nav:true,
                        }
                    },
                    autoplay:<?php echo $slider_auto_play; ?>,
                    autoplaySpeed:<?php echo $auto_play_speed; ?>,
                    autoplayTimeout:<?php echo $auto_play_timeout; ?>,
                    autoplayHoverPause:<?php echo $slider_stop_on_hover; ?>,
                    loop:<?php echo $slider_loop; ?>,
                    rewind:<?php echo $slider_rewind; ?>,
                    center:<?php echo $slider_center; ?>,
                    rtl:<?php echo $slider_rtl; ?>,
                    navContainerClass: 'owl-nav <?php echo $navigation_position; ?> <?php echo $navigation_style; ?>',
                    nav:<?php echo $slider_navigation; ?>,
                    navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
                    navSpeed:<?php echo $slider_slide_speed; ?>,
                    dots:<?php echo $slider_pagination; ?>,
                    dotsSpeed:<?php echo $slider_pagination_speed; ?>,
                    mouseDrag:<?php echo $slider_mouse_drag; ?>,
                    touchDrag:<?php echo $slider_touch_drag; ?>,
                    lazyLoad:<?php echo $slider_lazy_load; ?>,


                });



            });
        </script>

        <style type="text/css">

            .wcps-container-<?php echo $wcps_id; ?>{
                padding: <?php echo $container_padding; ?>;
                margin: <?php echo $container_margin; ?>;
                background: <?php echo $container_background_color; ?> url(<?php echo $container_background_img_url; ?>) repeat scroll 0 0;
                position: relative;
                overflow: hidden;
            }



            /*ribbon position*/
            .wcps-container-<?php echo $wcps_id; ?> .wcps-ribbon.topright{
                position: absolute;
                right: -25px;
                top: 15px;
                box-shadow: 0 2px 4px -1px rgb(51, 51, 51);
                transform: rotate(45deg);
                z-index: 10;
            }

            .wcps-container-<?php echo $wcps_id; ?> .wcps-ribbon.topleft{
                position: absolute;
                left: -25px;
                top: 15px;
                box-shadow: 0 2px 4px -1px rgb(51, 51, 51);
                transform: rotate(-45deg);
                z-index: 10;
            }

            .wcps-container-<?php echo $wcps_id; ?> .wcps-ribbon.bottomleft{
                position: absolute;
                left: -25px;
                bottom: 10px;
                box-shadow: 0 2px 4px -1px rgb(51, 51, 51);
                transform: rotate(45deg);
                z-index: 10;
            }
            .wcps-container-<?php echo $wcps_id; ?> .wcps-ribbon.bottomright{
                position: absolute;
                right: -24px;
                bottom: 10px;
                box-shadow: 0 2px 4px -1px rgb(51, 51, 51);
                transform: rotate(-45deg);
                z-index: 10;
            }


            .wcps-container-<?php echo $wcps_id; ?> .wcps-ribbon.none{
                display: none;
            }






            .wcps-container-<?php echo $wcps_id; ?> .item {
                padding: <?php echo $item_padding; ?>;
                margin: <?php echo $item_margin; ?>;
                background: <?php echo $item_background_color; ?>;
                text-align: <?php echo $item_text_align; ?>;

            }

            #wcps-<?php echo $wcps_id; ?> .wcps-items{
                padding-top:45px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-dots {
                text-align: center;
                width: 100%;
                margin: 30px 0 0;
            }
            #wcps-<?php echo $wcps_id; ?> .owl-dots .owl-dot {
                background: <?php echo $dots_background_color; ?>;
                border-radius: 20px;
                display: inline-block;
                height: 15px;
                margin: 5px 7px;
                width: 15px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-dots .owl-dot.active, #wcps-<?php echo $wcps_id; ?> .owl-dots .owl-dot:hover {
                background: <?php echo $dots_active_background_color; ?>;

            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav button{
                background: <?php echo $navigation_background_color; ?>;
                color: <?php echo $navigation_color; ?>;
                margin: 0 5px;
            }

            /*navs position*/
            #wcps-<?php echo $wcps_id; ?> .owl-nav.topright  {
                position: absolute;
                right: 15px;
                top: 15px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.topleft  {
                position: absolute;
                left: 15px;
                top: 15px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.bottomleft  {
                position: absolute;
                left: 15px;
                bottom: 15px;
            }
            #wcps-<?php echo $wcps_id; ?> .owl-nav.bottomright   {
                position: absolute;
                right: 15px;
                bottom: 15px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle-fixed   {
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                width: 100%;
            }


            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle-fixed  .owl-next {
                float: right;
            }
            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle-fixed .owl-prev {
                float: left;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle {
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                width: 100%;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle  .owl-next {
                float: right;
                right: -20%;
                position: absolute;
                transition: all ease 1s 0s;
            }
            #wcps-<?php echo $wcps_id; ?>:hover .owl-nav.middle  .owl-next{
                right: 0;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.middle  .owl-prev {
                left: -20%;
                position: absolute;
                transition: all ease 1s 0s;
            }

            #wcps-<?php echo $wcps_id; ?>:hover .owl-nav.middle  .owl-prev {
                left: 0;
                position: absolute;
            }

            /*navs style*/
            #wcps-<?php echo $wcps_id; ?> .owl-nav.flat button{
                padding: 5px 20px;
                border-radius: 0;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.border button{
                padding: 5px 20px;
                border: 2px solid #777;
            }
            #wcps-<?php echo $wcps_id; ?> .owl-nav.semi-round button{
                padding: 5px 20px;
                border-radius: 8px;
            }

            #wcps-<?php echo $wcps_id; ?> .owl-nav.round button{
                border-radius: 50px;
                width: 50px;
                height: 50px;
            }

            #wcps-<?php echo $wcps_id; ?> .quantity{
                width: 45px;

            }


            <?php
            $custom_scripts = get_post_meta($item_layout_id,'custom_scripts', true);
            $custom_css = isset($custom_scripts['custom_css']) ? $custom_scripts['custom_css'] : '';

            echo str_replace('__ID__', 'layout-'.$item_layout_id, $custom_css);

            ?>
        </style>
    <?php
    if(!empty($layout_elements_data))
        foreach ($layout_elements_data as $elementGroupIndex => $elementGroupData){

            if(!empty($elementGroupData))
                foreach ($elementGroupData as $elementIndex => $elementData){


                    $args['elementData'] = $elementData;
                    $args['element_index'] = $elementGroupIndex;

                    //echo $elementIndex;
                    do_action('wcps_layout_element_css_'.$elementIndex, $args);
                }
        }
    ?>

        <?php





}










