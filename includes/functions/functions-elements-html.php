<?php
if ( ! defined('ABSPATH')) exit;  // if direct access





add_action('wcps_layer_element_title','wcps_layer_element_title');

function wcps_layer_element_title($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $product_title =  get_the_title($product_id);

    ?>
    <div class="element-<?php echo $index; ?> element-title">
        <?php
        echo $product_title;
        ?>
    </div>

    <?php



}

add_action('wcps_layer_element_excerpt','wcps_layer_element_excerpt');

function wcps_layer_element_excerpt($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $product_excerpt =  get_the_excerpt($product_id);



    ?>
    <div class="element-<?php echo $index; ?> element-excerpt">
        <?php

        echo $product_excerpt;

        ?>
    </div>

    <?php
}

add_action('wcps_layer_element_price','wcps_layer_element_price');

function wcps_layer_element_price($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $price_format = 'full';

    $currency = get_woocommerce_currency_symbol();
    global $product;

    $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);

    if ($price_format == 'full') {
        $price = $product->get_price_html();
    } elseif ($price_format == 'sale') {

        $price = $currency . get_post_meta(get_the_ID(), '_sale_price', true);

    } elseif ($price_format == 'regular') {
        $price = $currency . get_post_meta(get_the_ID(), '_regular_price', true);

    } else {
        $price = $product->get_price_html();
    }


    ?>
    <div class="element-<?php echo $index; ?> element-price">
        <?php echo $price;
        ?>
    </div>

    <?php
}
add_action('wcps_layer_element_sku','wcps_layer_element_sku');

function wcps_layer_element_sku($element_args){
    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $product_sku = get_post_meta($product_id, '_sku', true);



    ?>
    <div class="element-<?php echo $index; ?> element-sku">
        <?php
        echo $product_sku;
        ?>
    </div>

    <?php
}
add_action('wcps_layer_element_category','wcps_layer_element_category');

function wcps_layer_element_category($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $product_cats = wp_get_post_terms( $product_id, 'product_cat' );
    $cat_link = array();
    $cat_name = array();
    $product_cats_count = count($product_cats);
    $wcps_items_cat_separator = ', ';

    ?>
    <div class="element-<?php echo $index; ?> element-category">
        <?php

        $i=1;
        if(!empty($product_cats))
        foreach($product_cats as $key => $cat){

            $cat_link = get_term_link( $cat->term_id, 'product_cat' );
            $cat_name = $cat->name;

            echo '<a href="'.$cat_link.'">'.$cat_name.'</a>';

            if($product_cats_count > $i){
                echo '<span class="cat-separator">'.$wcps_items_cat_separator.'</span>';
            }

            $i++;
        }

        ?>
    </div>

    <?php

}
add_action('wcps_layer_element_tag','wcps_layer_element_tag');

function wcps_layer_element_tag($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $product_cats = wp_get_post_terms( $product_id, 'product_tag' );
    $cat_link = array();
    $cat_name = array();
    $product_cats_count = count($product_cats);
    $wcps_items_cat_separator = ', ';
    $i=1;


    ?>
    <div class="element-<?php echo $index; ?> element-tag">
        <?php

        if(!empty($product_cats))
            foreach($product_cats as $key => $cat){

                $cat_link = get_term_link( $cat->term_id, 'product_tag' );
                $cat_name = $cat->name;

                echo '<a href="'.$cat_link.'">'.$cat_name.'</a>';

                if($product_cats_count > $i){
                    echo '<span class="cat-separator">'.$wcps_items_cat_separator.'</span>';
                }

                $i++;
            }

        ?>
    </div>

    <?php
}
add_action('wcps_layer_element_rating','wcps_layer_element_rating');

function wcps_layer_element_rating($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    global $product;

    $rating = $product->get_average_rating();
    $rating = (($rating/5)*100);



    ?>
    <div class="element-<?php echo $index; ?> element-rating">
        <?php

        if( $rating > 0 ){
            ?>
            <div class="woocommerce">
                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
            </div>
            <?php
        }

        ?>
    </div>

    <?php

}

add_action('wcps_layer_element_cart','wcps_layer_element_cart');

function wcps_layer_element_cart($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];


    ?>
    <div class="element-<?php echo $index; ?> element-cart">
        <?php
        echo do_shortcode('[add_to_cart show_price="false" quantity="1" id="'.$product_id.'"]');
        ?>
    </div>

    <?php
}



add_action('wcps_layer_element_sale','wcps_layer_element_sale');

function wcps_layer_element_sale($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    ?>
    <div data-position="topright" class="element-<?php echo $index; ?> element-sale">

    </div>

    <?php
    //echo $product_title;

}



add_action('wcps_layer_element_featured','wcps_layer_element_featured');

function wcps_layer_element_featured($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];


    ?>
    <div  data-position="topleft" class="element-<?php echo $index; ?> element-featured">

    </div>

    <?php
    //echo $product_title;

}


add_action('wcps_layer_element_sale_count','wcps_layer_element_sale_count');

function wcps_layer_element_sale_count($element_args){

    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $units_sold = get_post_meta( $product_id, 'total_sales', true );


    ?>
    <div class="element-<?php echo $index; ?> element-sale_count">
        <?php echo $units_sold; ?>
    </div>

    <?php


}



add_action('wcps_layer_element_thumb','wcps_layer_element_thumb');

function wcps_layer_element_thumb($element_args){

    $link_target= '';
    $wcps_items_thumb_size= 'full';
    $product_id = $element_args['product_id'];
    $index = $element_args['index'];

    $wcps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), $wcps_items_thumb_size);
    $wcps_thumb_url = isset($wcps_thumb['0']) ? $wcps_thumb['0'] : '';
    $product_title = get_the_title($product_id);

    $permalink = get_permalink($product_id);

    ?>
    <?php

    ?>
    <div class="element-<?php echo $index; ?> element-thumb">
        <a target="<?php echo $link_target; ?>" href="<?php echo $permalink;?>"><img alt="<?php echo $product_title;?>" src="<?php echo $wcps_thumb_url; ?>" /></a>

    </div>

    <?php
}













