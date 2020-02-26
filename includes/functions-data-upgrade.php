<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_shortcode('wcps_cron_upgrade_settings', 'wcps_cron_upgrade_settings');
add_action('wcps_cron_upgrade_settings', 'wcps_cron_upgrade_settings');

function wcps_cron_upgrade_settings(){

    $wcps_settings = get_option( 'wcps_settings', array() );

    $wcps_track_product_view = get_option( 'wcps_track_product_view' );
    $wcps_settings['track_product_view'] = $wcps_track_product_view;

    $social_fields_new = array();
    $social_fields_new[] = array('name'=> 'Email', 'meta_key'=> 'email', 'icon'=> 'https://i.imgur.com/OS2saH8.png','font_icon'=> '',  'visibility'=> 1   );
    $social_fields_new[] = array('name'=> 'Facebook', 'meta_key'=> 'facebook', 'icon'=> 'https://i.imgur.com/IftZ9Ng.png','font_icon'=> '',  'visibility'=> 1   );
    $social_fields_new[] = array('name'=> 'Twitter', 'meta_key'=> 'twitter', 'icon'=> 'https://i.imgur.com/JZDm0R5.png','font_icon'=> '',  'visibility'=> 1   );
    $social_fields_new[] = array('name'=> 'Pinterest', 'meta_key'=> 'pinterest', 'icon'=> 'https://i.imgur.com/VxUWxZC.png','font_icon'=> '',  'visibility'=> 0   );
    $social_fields_new[] = array('name'=> 'Linkedin', 'meta_key'=> 'linkedin', 'icon'=> 'https://i.imgur.com/8kuHCtD.png','font_icon'=> '',  'visibility'=> 0   );
    $social_fields_new[] = array('name'=> 'Instagram', 'meta_key'=> 'instagram', 'icon'=> 'https://i.imgur.com/DYj382i.png','font_icon'=> '',  'visibility'=> 0   );

    $wcps_settings['social_media_sites'] = $social_fields_new;


    update_option('wcps_settings', $wcps_settings);

    wp_clear_scheduled_hook('wcps_cron_upgrade_settings');
    wp_schedule_event(time(), '1minute', 'wcps_cron_upgrade_wcps');

    $wcps_plugin_info = get_option('wcps_plugin_info');
    $wcps_plugin_info['settings_upgrade'] = 'done';

    update_option('wcps_plugin_info', $wcps_plugin_info);

}





add_shortcode('wcps_cron_upgrade_wcps', 'wcps_cron_upgrade_wcps');
add_action('wcps_cron_upgrade_wcps', 'wcps_cron_upgrade_wcps');


function wcps_cron_upgrade_wcps(){

    $meta_query = array();

        $meta_query[] = array(
        'key' => 'wcps_upgrade_status',
        'compare' => 'NOT EXISTS'
    );

    $args = array(
        'post_type'=>'wcps',
        'post_status'=>'any',
        'posts_per_page'=> 10,
        'meta_query'=> $meta_query,

    );



    $wp_query = new WP_Query($args);


    if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();

            $team_id = get_the_id();
            $team_title = get_the_title();
            $team_options = array();

            echo $team_title.'<br/>';


            // Product Query options
            $wcps_total_items = get_post_meta( $team_id, 'wcps_total_items', true );
            $team_options['query']['post_per_page'] = $wcps_total_items;

            $wcps_product_categories = get_post_meta( $team_id, 'wcps_product_categories', true );
            $team_options['query']['taxonomy_terms'] = $wcps_product_categories;

            $wcps_meta_query = get_post_meta( $team_id, 'wcps_meta_query', true );
            $team_options['query']['meta_query_args'] = $wcps_meta_query;

            $wcps_meta_query_relation = get_post_meta( $team_id, 'wcps_meta_query_relation', true );
            $team_options['query']['meta_query_relation'] = $wcps_meta_query_relation;

            $wcps_query_order = get_post_meta( $team_id, 'wcps_query_order', true );
            $team_options['query']['order'] = $wcps_query_order;

            $wcps_query_orderby = get_post_meta( $team_id, 'wcps_query_orderby', true );
            $team_options['query']['orderby'] = $wcps_query_orderby;

            $wcps_more_query = get_post_meta( $team_id, 'wcps_more_query', true );
            $team_options['query']['more_query_args'] = $wcps_more_query;

            $wcps_hide_out_of_stock = get_post_meta( $team_id, 'wcps_hide_out_of_stock', true );
            $team_options['query']['stock_status'] = $wcps_hide_out_of_stock;

            $wcps_product_featured = get_post_meta( $team_id, 'wcps_product_featured', true );
            $team_options['query']['featured'] = $wcps_product_featured;

            $wcps_product_on_sale = get_post_meta( $team_id, 'wcps_product_on_sale', true );
            $team_options['query']['on_sale'] = $wcps_product_on_sale;

            $wcps_product_only_discounted = get_post_meta( $team_id, 'wcps_product_only_discounted', true );
            $team_options['query']['only_discounted'] = $wcps_product_only_discounted;

            $wcps_product_filter_by = get_post_meta( $team_id, 'wcps_product_filter_by', true );
            $team_options['query']['filter_by'] = $wcps_product_filter_by;

            $wcps_product_ids = get_post_meta( $team_id, 'wcps_product_ids', true );
            $team_options['query']['product_ids'] = $wcps_product_ids;

            $wcps_product_sku = get_post_meta( $team_id, 'wcps_product_sku', true );
            $team_options['query']['product_sku'] = $wcps_product_sku;

            $wcps_upsells_crosssells = get_post_meta( $team_id, 'wcps_upsells_crosssells', true );
            $team_options['query']['upsells_crosssells'] = $wcps_upsells_crosssells;

            $wcps_related_product_query = get_post_meta( $team_id, 'wcps_related_product_query', true );
            $team_options['query']['related_product_query'] = $wcps_related_product_query;

            $wcps_related_product_query_by = get_post_meta( $team_id, 'wcps_related_product_query_by', true );
            $team_options['query']['related_product_query_by'] = $wcps_related_product_query_by;


            //Slider options
            $wcps_column_number = get_post_meta( $team_id, 'wcps_column_number', true );
            $team_options['slider']['column_large'] = $wcps_column_number;

            $wcps_column_number_tablet = get_post_meta( $team_id, 'wcps_column_number_tablet', true );
            $team_options['slider']['column_medium'] = $wcps_column_number_tablet;

            $wcps_column_number_mobile = get_post_meta( $team_id, 'wcps_column_number_mobile', true );
            $team_options['slider']['column_small'] = $wcps_column_number_mobile;

            $wcps_rows_enable = get_post_meta( $team_id, 'wcps_rows_enable', true );
            $team_options['slider']['rows_enable'] = $wcps_rows_enable;

            $wcps_rows_desktop = get_post_meta( $team_id, 'wcps_rows_desktop', true );
            $team_options['slider']['row_large'] = $wcps_rows_desktop;

            $wcps_rows_tablet = get_post_meta( $team_id, 'wcps_rows_tablet', true );
            $team_options['slider']['row_medium'] = $wcps_rows_tablet;

            $wcps_rows_mobile = get_post_meta( $team_id, 'wcps_rows_mobile', true );
            $team_options['slider']['row_small'] = $wcps_rows_mobile;

            $wcps_auto_play = get_post_meta( $team_id, 'wcps_auto_play', true );
            $team_options['slider']['auto_play'] = $wcps_auto_play;

            $wcps_auto_play_speed = get_post_meta( $team_id, 'wcps_auto_play_speed', true );
            $team_options['slider']['auto_play_speed'] = $wcps_auto_play_speed;

            $wcps_auto_play_timeout = get_post_meta( $team_id, 'wcps_auto_play_timeout', true );
            $team_options['slider']['auto_play_timeout'] = $wcps_auto_play_timeout;

            $wcps_slide_speed = get_post_meta( $team_id, 'wcps_slide_speed', true );
            $team_options['slider']['slide_speed'] = $wcps_slide_speed;

            $wcps_slideBy = get_post_meta( $team_id, 'wcps_slideBy', true );
            $team_options['slider']['slide_by_count'] = $wcps_slideBy;

            $wcps_rewind = get_post_meta( $team_id, 'wcps_rewind', true );
            $team_options['slider']['rewind'] = $wcps_rewind;

            $wcps_loop = get_post_meta( $team_id, 'wcps_loop', true );
            $team_options['slider']['loop'] = $wcps_loop;

            $wcps_center = get_post_meta( $team_id, 'wcps_center', true );
            $team_options['slider']['center'] = $wcps_center;

            $wcps_stop_on_hover = get_post_meta( $team_id, 'wcps_stop_on_hover', true );
            $team_options['slider']['stop_on_hover'] = $wcps_stop_on_hover;

            $wcps_slider_navigation_position = get_post_meta( $team_id, 'wcps_slider_navigation_position', true );
            $team_options['slider']['nav_position'] = $wcps_slider_navigation_position;

            $team_options['slider']['navigation_background_color'] = '';
            $team_options['slider']['navigation_style'] = 'flat';
            $team_options['slider']['navigation_color'] = '';

            $wcps_slider_pagination = get_post_meta( $team_id, 'wcps_slider_pagination', true );
            $team_options['slider']['pagination'] = $wcps_slider_pagination;

            $wcps_pagination_slide_speed = get_post_meta( $team_id, 'wcps_pagination_slide_speed', true );
            $team_options['slider']['pagination_speed'] = $wcps_pagination_slide_speed;

            $wcps_slider_pagination_bg = get_post_meta( $team_id, 'wcps_slider_pagination_bg', true );
            $team_options['slider']['pagination_background_color'] = $wcps_slider_pagination_bg;

            $wcps_slider_pagination_text_color = get_post_meta( $team_id, 'wcps_slider_pagination_text_color', true );
            $team_options['slider']['pagination_background_text_color'] = $wcps_slider_pagination_text_color;

            $wcps_slider_pagination_count = get_post_meta( $team_id, 'wcps_slider_pagination_count', true );
            $team_options['slider']['pagination_count'] = $wcps_slider_pagination_count;

            $wcps_slider_rtl = get_post_meta( $team_id, 'wcps_slider_rtl', true );
            $team_options['slider']['rtl'] = $wcps_slider_rtl;

            $wcps_slider_mouse_drag = get_post_meta( $team_id, 'wcps_slider_mouse_drag', true );
            $team_options['slider']['mouse_drag'] = $wcps_slider_mouse_drag;

            $wcps_slider_touch_drag = get_post_meta( $team_id, 'wcps_slider_touch_drag', true );
            $team_options['slider']['touch_drag'] = $wcps_slider_touch_drag;

            $wcps_slider_animateout = get_post_meta( $team_id, 'wcps_slider_animateout', true );
            $team_options['slider']['animate_out'] = $wcps_slider_animateout;

            $wcps_slider_animatein = get_post_meta( $team_id, 'wcps_slider_animatein', true );
            $team_options['slider']['animate_in'] = $wcps_slider_animatein;


            $wcps_themes = get_post_meta( $team_id, 'wcps_themes', true );

            // Ribbon options
            $wcps_ribbon_name = get_post_meta( $team_id, 'wcps_ribbon_name', true );
            $team_options['ribbon']['ribbon_name'] = $wcps_ribbon_name;

            $wcps_ribbon_custom = get_post_meta( $team_id, 'wcps_ribbon_custom', true );
            $team_options['ribbon']['ribbon_custom'] = $wcps_ribbon_custom;



            // Item options
            $wcps_items_padding = get_post_meta( $team_id, 'wcps_items_padding', true );
            $team_options['item_style']['padding'] = $wcps_items_padding;

            $wcps_items_bg_color = get_post_meta( $team_id, 'wcps_items_bg_color', true );
            $team_options['item_style']['background_color'] = $wcps_items_bg_color;
            $team_options['item_style']['margin'] = '';



            //Container options
            $wcps_container_padding = get_post_meta( $team_id, 'wcps_container_padding', true );
            $team_options['container']['padding'] = $wcps_container_padding;

            $wcps_container_bg_color = get_post_meta( $team_id, 'wcps_container_bg_color', true );
            $team_options['container']['background_color'] = $wcps_container_bg_color;

            $wcps_bg_img = get_post_meta( $team_id, 'wcps_bg_img', true );
            $team_options['container']['background_img_url'] = $wcps_bg_img;

            $team_options['container']['margin'] = '';


            // Custom Scripts
            $wcps_items_custom_css = get_post_meta( $team_id, 'wcps_items_custom_css', true );
            $team_options['custom_scripts']['custom_css'] = $wcps_items_custom_css;

            $team_options['custom_scripts']['custom_js'] = '';





            // Create layout from team settings.
            $wcps_grid_items = get_post_meta( $team_id, 'wcps_grid_items', true );

            $wcps_grid_items_hide = get_post_meta( $team_id, 'wcps_grid_items_hide', true );




            $layout_elements_data = array();

            $layout_elements_data[0]['wrapper_start']['wrapper_id'] = '';
            $layout_elements_data[0]['wrapper_start']['wrapper_class'] = 'layer-media';
            $layout_elements_data[0]['wrapper_start']['css_idle'] = '';

            $wcps_items_thumb_size = get_post_meta( $team_id, 'wcps_items_thumb_size', true );
            $wcps_items_thumb_link_to = get_post_meta( $team_id, 'wcps_items_thumb_link_to', true );
            $wcps_items_thumb_link_to_meta_value = get_post_meta( $team_id, 'wcps_items_thumb_link_to_meta_value', true );
            $wcps_items_thumb_link_target = get_post_meta( $team_id, 'wcps_items_thumb_link_target', true );
            $wcps_items_thumb_max_hieght = get_post_meta( $team_id, 'wcps_items_thumb_max_hieght', true );
            $wcps_items_empty_thumb = get_post_meta( $team_id, 'wcps_items_empty_thumb', true );

            $layout_elements_data[1]['thumbnail']['thumb_size'] = $wcps_items_thumb_size;
            $layout_elements_data[1]['thumbnail']['link_to'] = $wcps_items_thumb_link_to;
            $layout_elements_data[1]['thumbnail']['link_to_meta_key'] = $wcps_items_thumb_link_to_meta_value;
            $layout_elements_data[1]['thumbnail']['link_target'] = $wcps_items_thumb_link_target;
            $layout_elements_data[1]['thumbnail']['thumb_height']['large'] = $wcps_items_thumb_max_hieght;
            $layout_elements_data[1]['thumbnail']['thumb_height']['medium'] = '';
            $layout_elements_data[1]['thumbnail']['thumb_height']['small'] = '';
            $layout_elements_data[1]['thumbnail']['default_thumb_src'] = $wcps_items_empty_thumb;


            $layout_elements_data[2]['wrapper_end']['wrapper_id'] = '';


            $layout_elements_data[3]['wrapper_start']['wrapper_id'] = '';
            $layout_elements_data[3]['wrapper_start']['wrapper_class'] = 'layer-content';
            $layout_elements_data[3]['wrapper_start']['css_idle'] = '';



            $item_count = 4;

            if(!empty($wcps_grid_items))
            foreach ($wcps_grid_items as $itemIndex => $item){


                if($itemIndex == 'thumbnail'){

                }elseif($itemIndex == 'social'){
                    $team_items_social_icon_type = get_post_meta( $team_id, 'team_items_social_icon_type', true );
                    $team_items_social_icon_width = get_post_meta( $team_id, 'team_items_social_icon_width', true );
                    $team_items_social_icon_height = get_post_meta( $team_id, 'team_items_social_icon_height', true );
                    $team_items_social_font_family = get_post_meta( $team_id, 'team_items_social_font_family', true );

                    $layout_elements_data[$item_count]['social']['social_icon_type'] = $team_items_social_icon_type;
                    $layout_elements_data[$item_count]['social']['social_icon_width'] = $team_items_social_icon_width;
                    $layout_elements_data[$item_count]['social']['social_icon_height'] = $team_items_social_icon_height;

                    $layout_elements_data[$item_count]['social']['font_size'] = '';
                    $layout_elements_data[$item_count]['social']['color'] = '';
                    $layout_elements_data[$item_count]['social']['font_family'] = $team_items_social_font_family;
                    $layout_elements_data[$item_count]['social']['margin'] = '5px 0';


                }elseif($itemIndex == 'title'){
                    $wcps_items_title_font_size = get_post_meta( $team_id, 'wcps_items_title_font_size', true );
                    $wcps_items_title_color = get_post_meta( $team_id, 'wcps_items_title_color', true );
                    $wcps_items_title_text_align = get_post_meta( $team_id, 'wcps_items_title_text_align', true );


                    $layout_elements_data[$item_count]['post_title']['color'] = $wcps_items_title_color;
                    $layout_elements_data[$item_count]['post_title']['font_size'] = $wcps_items_title_font_size;
                    $layout_elements_data[$item_count]['post_title']['font_family'] = '';
                    $layout_elements_data[$item_count]['post_title']['margin'] = '5px 0';
                    $layout_elements_data[$item_count]['post_title']['text_align'] = $wcps_items_title_text_align;


                }elseif($itemIndex == 'position'){
                    $team_items_position_font_size = get_post_meta( $team_id, 'team_items_position_font_size', true );
                    $team_items_position_font_family = get_post_meta( $team_id, 'team_items_position_font_family', true );
                    $team_items_position_color = get_post_meta( $team_id, 'team_items_position_color', true );

                    $layout_elements_data[$item_count]['position']['color'] = $team_items_position_color;
                    $layout_elements_data[$item_count]['position']['font_size'] = $team_items_position_font_size;
                    $layout_elements_data[$item_count]['position']['font_family'] = $team_items_position_font_family;
                    $layout_elements_data[$item_count]['position']['margin'] = '5px 0';

                }elseif($itemIndex == 'category'){
                    $wcps_items_cat_font_size = get_post_meta( $team_id, 'wcps_items_cat_font_size', true );
                    $wcps_items_cat_font_color = get_post_meta( $team_id, 'wcps_items_cat_font_color', true );
                    $wcps_items_cat_text_align = get_post_meta( $team_id, 'wcps_items_cat_text_align', true );
                    $wcps_items_cat_separator = get_post_meta( $team_id, 'wcps_items_cat_separator', true );

                    $layout_elements_data[$item_count]['product_category']['font_size'] = $wcps_items_cat_font_size;
                    $layout_elements_data[$item_count]['product_category']['text_align'] = $wcps_items_cat_text_align;
                    $layout_elements_data[$item_count]['product_category']['margin'] = '5px 0';
                    $layout_elements_data[$item_count]['product_category']['separator'] = $wcps_items_cat_separator;
                    $layout_elements_data[$item_count]['product_category']['max_count'] = 3;
                    $layout_elements_data[$item_count]['product_category']['wrapper_html'] = '';
                    $layout_elements_data[$item_count]['product_category']['link_color'] = $wcps_items_cat_font_color;

                }elseif($itemIndex == 'price'){
                    $wcps_total_items_price_format = get_post_meta( $team_id, 'wcps_total_items_price_format', true );
                    $wcps_items_price_color = get_post_meta( $team_id, 'wcps_items_price_color', true );
                    $wcps_items_price_font_size = get_post_meta( $team_id, 'wcps_items_price_font_size', true );
                    $wcps_items_price_text_align = get_post_meta( $team_id, 'wcps_items_price_text_align', true );


                    $layout_elements_data[$item_count]['product_price']['color'] = $wcps_items_price_color;
                    $layout_elements_data[$item_count]['product_price']['font_size'] = $wcps_items_price_font_size;
                    $layout_elements_data[$item_count]['product_price']['text_align'] = $wcps_items_price_text_align;
                    $layout_elements_data[$item_count]['product_price']['margin'] = '5px 0';

                    $layout_elements_data[$item_count]['product_price']['price_type'] = $wcps_total_items_price_format;
                    $layout_elements_data[$item_count]['product_price']['wrapper_html'] = '';

                }elseif($itemIndex == 'rating'){
                    $wcps_total_items_price_format = get_post_meta( $team_id, 'wcps_total_items_price_format', true );
                    $wcps_items_ratings_color = get_post_meta( $team_id, 'wcps_items_ratings_color', true );
                    $wcps_items_ratings_font_size = get_post_meta( $team_id, 'wcps_items_ratings_font_size', true );
                    $wcps_ratings_text_align = get_post_meta( $team_id, 'wcps_ratings_text_align', true );


                    $layout_elements_data[$item_count]['rating']['color'] = $wcps_items_ratings_color;
                    $layout_elements_data[$item_count]['rating']['font_size'] = $wcps_items_ratings_font_size;
                    $layout_elements_data[$item_count]['rating']['text_align'] = $wcps_ratings_text_align;
                    $layout_elements_data[$item_count]['rating']['margin'] = '5px 0';

                    $layout_elements_data[$item_count]['rating']['rating_type'] = $wcps_total_items_price_format;
                    $layout_elements_data[$item_count]['rating']['wrapper_html'] = '';

                }elseif($itemIndex == 'cart'){
                    $wcps_cart_text = get_post_meta( $team_id, 'wcps_cart_text', true );
                    $wcps_cart_bg = get_post_meta( $team_id, 'wcps_cart_bg', true );
                    $wcps_cart_text_color = get_post_meta( $team_id, 'wcps_cart_text_color', true );
                    $wcps_cart_text_align = get_post_meta( $team_id, 'wcps_cart_text_align', true );
                    $wcps_cart_display_quantity = get_post_meta( $team_id, 'wcps_cart_display_quantity', true );


                    $layout_elements_data[$item_count]['add_to_cart']['background_color'] = $wcps_cart_bg;
                    $layout_elements_data[$item_count]['add_to_cart']['color'] = $wcps_cart_text_color;
                    $layout_elements_data[$item_count]['add_to_cart']['text_align'] = $wcps_cart_text_align;
                    $layout_elements_data[$item_count]['add_to_cart']['margin'] = '5px 0';

                    $layout_elements_data[$item_count]['add_to_cart']['cart_text'] = $wcps_cart_text;
                    $layout_elements_data[$item_count]['add_to_cart']['show_quantity'] = $wcps_cart_display_quantity;

                }



                elseif($itemIndex == 'content'){

                    $wcps_items_excerpt_count = get_post_meta( $team_id, 'wcps_items_excerpt_count', true );
                    $wcps_items_excerpt_read_more = get_post_meta( $team_id, 'wcps_items_excerpt_read_more', true );
                    $wcps_items_excerpt_font_color = get_post_meta( $team_id, 'wcps_items_excerpt_font_color', true );
                    $wcps_items_excerpt_font_size = get_post_meta( $team_id, 'wcps_items_excerpt_font_size', true );
                    $wcps_items_excerpt_text_align = get_post_meta( $team_id, 'wcps_items_excerpt_text_align', true );

                    $layout_elements_data[$item_count]['content']['content_source'] = 'excerpt';
                    $layout_elements_data[$item_count]['content']['word_count'] = $wcps_items_excerpt_count;

                    $layout_elements_data[$item_count]['content']['read_more_text'] = $wcps_items_excerpt_read_more;
                    $layout_elements_data[$item_count]['content']['read_more_color'] = $wcps_items_excerpt_font_color;
                    $layout_elements_data[$item_count]['content']['color'] = $wcps_items_excerpt_font_color;

                    $layout_elements_data[$item_count]['content']['font_size'] = $wcps_items_excerpt_font_size;
                    $layout_elements_data[$item_count]['content']['font_family'] = $wcps_items_excerpt_text_align;
                    $layout_elements_data[$item_count]['content']['margin'] = '5px 0';

                }elseif($itemIndex == 'skill'){

                    $team_items_skill_bg_color = get_post_meta( $team_id, 'team_items_skill_bg_color', true );
                    $layout_elements_data[$item_count]['skill']['background_color'] = $team_items_skill_bg_color;

                    $team_items_skill_sort = get_post_meta( $team_id, 'team_items_skill_sort', true );
                    $layout_elements_data[$item_count]['skill']['order'] = $team_items_skill_sort;
                    $layout_elements_data[$item_count]['skill']['margin'] = '5px 0';


                }elseif($itemIndex == 'meta'){

                    $team_items_meta_font_family = get_post_meta( $team_id, 'team_items_meta_font_family', true );
                    $team_grid_meta_keys = get_post_meta( $team_id, 'team_grid_meta_keys', true );


                    if(!empty($team_grid_meta_keys) && is_array($team_grid_meta_keys))
                        foreach ($team_grid_meta_keys as $meta){

                            $wrapper = isset($meta['wrapper']) ? $meta['wrapper'] : '';
                            $key = isset($meta['key']) ?$meta['key'] : '';

                            $layout_elements_data[$item_count]['meta']['meta_key'] = $key;
                            $layout_elements_data[$item_count]['meta']['wrapper'] = $wrapper;
                            $layout_elements_data[$item_count]['meta']['font_family'] = $team_items_meta_font_family;

                            $layout_elements_data[$item_count]['meta']['font_size'] = '';
                            $layout_elements_data[$item_count]['meta']['color'] = '';
                            $layout_elements_data[$item_count]['meta']['margin'] = '5px 0';
                            $item_count++;

                        }




                }




                $item_count++;
            }

            $layout_elements_data[$item_count]['wrapper_end']['wrapper_id'] = '';


            $team_layout_id = wp_insert_post(
                array(
                    'post_title'    => $team_id.' - '.$team_title,
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_type'   	=> 'wcps_layout',
                    'post_author'   => 1,
                )
            );


            $team_options['item_layout_id'] = $team_layout_id;

            $layout_data = team_layout_data($wcps_themes);

            $layout_data_css = isset($layout_data['css']) ? $layout_data['css'] : '';
            $layout_preview_img = isset($layout_data['preview_img']) ? $layout_data['preview_img'] : '';

            //echo '<pre>'.var_export($layout_data_css, true).'</pre>';

            $layout_scripts['custom_css'] = $layout_data_css;
            $layout_options['layout_preview_img'] = $layout_preview_img;



            update_post_meta($team_id, 'team_options', $team_options);

            update_post_meta($team_layout_id, 'custom_scripts', $layout_scripts);
            update_post_meta($team_layout_id, 'layout_options', $layout_options);
            update_post_meta($team_layout_id, 'layout_elements_data', $layout_elements_data);
            
            update_post_meta($team_id, 'wcps_upgrade_status', 'done');



            wp_reset_query();
            wp_reset_postdata();
        endwhile;
    else:
        wp_clear_scheduled_hook('wcps_cron_upgrade_wcps');

        $wcps_plugin_info = get_option('wcps_plugin_info');
        $wcps_plugin_info['team_upgrade'] = 'done';
        update_option('wcps_plugin_info', $wcps_plugin_info);
    endif;


}


add_action('wcps_cron_reset_migrate','wcps_cron_reset_migrate');

function wcps_cron_reset_migrate(){

    $wcps_plugin_info = get_option('wcps_plugin_info');

    delete_option('wcps_settings');


    $team_member_meta_query[] = array(
        'key' => 'wcps_upgrade_status',
        'compare' => '='
    );

    $team_member_args = array(
        'post_type' => 'team_member',
        'post_status' => 'any',
        'posts_per_page' => -1,
        'meta_query' => $team_member_meta_query,
    );

    $team_member_query = new WP_Query($team_member_args);

    if ($team_member_query->have_posts()) :
        while ($team_member_query->have_posts()) : $team_member_query->the_post();
            $post_id = get_the_id();
            delete_post_meta($post_id, 'wcps_upgrade_status');
            delete_post_meta($post_id, 'team_member_data');

        endwhile;

        wp_reset_postdata();
        wp_reset_query();
    endif;


    $team_meta_query[] = array(
        'key' => 'wcps_upgrade_status',
        'compare' => '='
    );

    $team_args = array(
        'post_type' => 'woocommerce-products-slider',
        'post_status' => 'any',
        'posts_per_page' => -1,
        'meta_query' => $team_meta_query,
    );

    $team_query = new WP_Query($team_args);

    if ($team_query->have_posts()) :
        while ($team_query->have_posts()) : $team_query->the_post();
            $post_id = get_the_id();
            delete_post_meta($post_id, 'wcps_upgrade_status');
            delete_post_meta($post_id, 'team_options');

        endwhile;
        wp_reset_postdata();
        wp_reset_query();
    endif;


    wp_clear_scheduled_hook('wcps_cron_reset_migrate');

    $wcps_plugin_info['settings_upgrade'] = '';
    $wcps_plugin_info['team_members_upgrade'] = '';
    $wcps_plugin_info['team_upgrade'] = '';
    $wcps_plugin_info['migration_reset'] = 'done';
    update_option('wcps_plugin_info', $wcps_plugin_info);



}
		
		
		

		
		