<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	$wcps_ribbons = get_option( 'wcps_ribbons' );



	$wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
	if(empty($wcps_column_number)){
		$wcps_column_number = 4;
		}
	$wcps_column_number_tablet = get_post_meta( $post_id, 'wcps_column_number_tablet', true );
	if(empty($wcps_column_number_tablet)){
		$wcps_column_number_tablet = 3;
		}

	$wcps_column_number_mobile = get_post_meta( $post_id, 'wcps_column_number_mobile', true );
	if(empty($wcps_column_number_mobile)){
		$wcps_column_number_mobile = 1;
		}



	$wcps_rows_enable = get_post_meta( $post_id, 'wcps_rows_enable', true );
	if(empty($wcps_rows_enable)){
		$wcps_rows_enable = 'true';
	}


	$wcps_rows_desktop = get_post_meta( $post_id, 'wcps_rows_desktop', true );
	if(empty($wcps_rows_desktop)){
		$wcps_rows_desktop = 2;
	}

	$wcps_rows_tablet = get_post_meta( $post_id, 'wcps_rows_tablet', true );
	if(empty($wcps_rows_tablet)){
		$wcps_rows_tablet = 1;
	}

	$wcps_rows_mobile = get_post_meta( $post_id, 'wcps_rows_mobile', true );
	if(empty($wcps_rows_mobile)){
		$wcps_rows_mobile = 1;
	}












	$wcps_auto_play = get_post_meta( $post_id, 'wcps_auto_play', true );
	if(empty($wcps_auto_play)){
		$wcps_auto_play = 'true';
		}


	$wcps_auto_play_speed = get_post_meta( $post_id, 'wcps_auto_play_speed', true );
	if(empty($wcps_auto_play_speed)){
		$wcps_auto_play_speed = 1000;
	}

	$wcps_auto_play_timeout = get_post_meta( $post_id, 'wcps_auto_play_timeout', true );
	if(empty($wcps_auto_play_timeout)){
		$wcps_auto_play_timeout = 1000;
	}





	$wcps_rewind = get_post_meta( $post_id, 'wcps_rewind', true );
	if(empty($wcps_rewind)){
		$wcps_rewind = 'true';
		}

	$wcps_loop = get_post_meta( $post_id, 'wcps_loop', true );
	if(empty($wcps_loop)){
		$wcps_loop = 'true';
		}

		$wcps_slideBy = get_post_meta( $post_id, 'wcps_slideBy', true );
		if(empty($wcps_slideBy)){
			$wcps_slideBy = 'true';
			}

	$wcps_center = get_post_meta( $post_id, 'wcps_center', true );
	if(empty($wcps_center)){
		$wcps_center = 'false';
		}


	$wcps_stop_on_hover = get_post_meta( $post_id, 'wcps_stop_on_hover', true );
	if(empty($wcps_stop_on_hover)){
		$wcps_stop_on_hover = 'true';
		}


	$wcps_slider_navigation = get_post_meta( $post_id, 'wcps_slider_navigation', true );
	if(empty($wcps_slider_navigation)){
		$wcps_slider_navigation = 'true';
		}


	$wcps_slider_navigation_position = get_post_meta( $post_id, 'wcps_slider_navigation_position', true );
	if(empty($wcps_slider_navigation_position)){
		$wcps_slider_navigation_position = 'topright';
		}

	$wcps_slide_speed = get_post_meta( $post_id, 'wcps_slide_speed', true );
	if(empty($wcps_slide_speed)){
		$wcps_slide_speed = '1000';
		}


	$wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
	$wcps_pagination_slide_speed = get_post_meta( $post_id, 'wcps_pagination_slide_speed', true );
	if(empty($wcps_pagination_slide_speed)){$wcps_pagination_slide_speed = '1000'; }

	$wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );
	$wcps_slider_pagination_bg = get_post_meta( $post_id, 'wcps_slider_pagination_bg', true );
	$wcps_slider_pagination_text_color = get_post_meta( $post_id, 'wcps_slider_pagination_text_color', true );

	$wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
	$wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );

	$wcps_slider_rtl = get_post_meta( $post_id, 'wcps_slider_rtl', true );
	if(empty($wcps_slider_rtl)){$wcps_slider_rtl = 'false'; }

	$wcps_slider_animateout = get_post_meta( $post_id, 'wcps_slider_animateout', true );
	if(empty($wcps_slider_animateout)){$wcps_slider_animateout = 'fadeOut'; }

	$wcps_slider_animatein = get_post_meta( $post_id, 'wcps_slider_animatein', true );
	if(empty($wcps_slider_animatein)){$wcps_slider_animatein = 'flipInX'; }



	$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );
	if(empty($wcps_themes)){$wcps_themes = 'flat'; }

	$wcps_ribbon_name = get_post_meta( $post_id, 'wcps_ribbon_name', true );
    $wcps_ribbon_name = !empty($wcps_ribbon_name) ? $wcps_ribbon_name : 'none';
	$wcps_ribbon_custom = get_post_meta( $post_id, 'wcps_ribbon_custom', true );


	$wcps_container_padding = get_post_meta( $post_id, 'wcps_container_padding', true );
	if(empty($wcps_container_padding)){$wcps_container_padding = '';}

	$wcps_container_bg_color = get_post_meta( $post_id, 'wcps_container_bg_color', true );
	if(empty($wcps_container_bg_color)){$wcps_container_bg_color = '';}

	$wcps_bg_img = get_post_meta( $post_id, 'wcps_bg_img', true );


	$wcps_items_bg_color = get_post_meta( $post_id, 'wcps_items_bg_color', true );
	if(empty($wcps_items_bg_color)){$wcps_items_bg_color = '';}

	$wcps_items_padding = get_post_meta( $post_id, 'wcps_items_padding', true );
	if(empty($wcps_items_padding)){$wcps_items_padding = ''; }



	$wcps_meta_query = get_post_meta( $post_id, 'wcps_meta_query', true );
	if(empty($wcps_meta_query)){$wcps_meta_query = array(); }

	$wcps_meta_query_relation = get_post_meta( $post_id, 'wcps_meta_query_relation', true );
	if(empty($wcps_meta_query_relation)){$wcps_meta_query_relation = 'OR'; }

	//var_dump($wcps_meta_query_relation);

	$wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );
	if(empty($wcps_total_items)){$wcps_total_items = 10; }

	$wcps_product_categories = get_post_meta( $post_id, 'wcps_product_categories', true );

	$wcps_more_query = get_post_meta( $post_id, 'wcps_more_query', true );
	//$wcps_content_year = get_post_meta( $post_id, 'wcps_content_year', true );
	//$wcps_content_month = get_post_meta( $post_id, 'wcps_content_month', true );

	$wcps_product_featured = get_post_meta( $post_id, 'wcps_product_featured', true );
	if(empty($wcps_product_featured)){$wcps_product_featured ='no'; }

	$wcps_product_on_sale = get_post_meta( $post_id, 'wcps_product_on_sale', true );
	if(empty($wcps_product_on_sale)){$wcps_product_on_sale = 'no'; }

	$wcps_product_only_discounted = get_post_meta( $post_id, 'wcps_product_only_discounted', true );
	if(empty($wcps_product_only_discounted)){$wcps_product_only_discounted = 'no'; }

	$wcps_product_filter_by = get_post_meta( $post_id, 'wcps_product_filter_by', true );
	if(empty($wcps_product_filter_by)){$wcps_product_filter_by = 'none'; }

	$wcps_product_best_selling = get_post_meta( $post_id, 'wcps_product_best_selling', true );
	if(empty($wcps_product_best_selling)){$wcps_product_best_selling = 'no'; }

	$wcps_product_query_relation = get_post_meta( $post_id, 'wcps_product_query_relation', true );
	if(empty($wcps_product_query_relation)){$wcps_product_query_relation = 'OR'; }

	$wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );
	$wcps_product_sku = get_post_meta( $post_id, 'wcps_product_sku', true );
	$wcps_upsells_crosssells = get_post_meta( $post_id, 'wcps_upsells_crosssells', true );

	$wcps_query_order = get_post_meta( $post_id, 'wcps_query_order', true );
    $wcps_query_orderby = get_post_meta( $post_id, 'wcps_query_orderby', true );
	$wcps_query_orderby_metakey = get_post_meta( $post_id, 'wcps_query_orderby_metakey', true );
    $wcps_hide_out_of_stock = get_post_meta( $post_id, 'wcps_hide_out_of_stock', true );




	$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );
	$wcps_items_thumb_link_to = get_post_meta( $post_id, 'wcps_items_thumb_link_to', true );
    $wcps_items_thumb_link_to_meta_value = get_post_meta( $post_id, 'wcps_items_thumb_link_to_meta_value', true );
    $wcps_items_thumb_link_target = get_post_meta( $post_id, 'wcps_items_thumb_link_target', true );


	$wcps_items_thumb_max_hieght = get_post_meta( $post_id, 'wcps_items_thumb_max_hieght', true );
	$wcps_items_thumb_zoom = get_post_meta( $post_id, 'wcps_items_thumb_zoom', true );

	$wcps_items_empty_thumb = get_post_meta( $post_id, 'wcps_items_empty_thumb', true );
	if(empty($wcps_items_empty_thumb)){$wcps_items_empty_thumb = wcps_plugin_url.'assets/front/images/no-thumb.png'; }

	$wcps_items_title_color = get_post_meta( $post_id, 'wcps_items_title_color', true );
	if(empty($wcps_items_title_color)){$wcps_items_title_color = '#626262';}

	$wcps_items_title_font_size = get_post_meta( $post_id, 'wcps_items_title_font_size', true );
	$wcps_items_title_text_align = get_post_meta( $post_id, 'wcps_items_title_text_align', true );


	$wcps_items_excerpt_count = (int)get_post_meta( $post_id, 'wcps_items_excerpt_count', true );


	$wcps_items_excerpt_read_more = get_post_meta( $post_id, 'wcps_items_excerpt_read_more', true );
	if(empty($wcps_items_excerpt_read_more)){$wcps_items_excerpt_read_more = 'View product.'; }


	$wcps_items_excerpt_font_size = get_post_meta( $post_id, 'wcps_items_excerpt_font_size', true );
	$wcps_items_excerpt_text_align = get_post_meta( $post_id, 'wcps_items_excerpt_text_align', true );
	$wcps_items_excerpt_font_color = get_post_meta( $post_id, 'wcps_items_excerpt_font_color', true );
	if(empty($wcps_items_excerpt_font_color)){$wcps_items_excerpt_font_color = '#626262';}



	$wcps_items_cat_font_size = get_post_meta( $post_id, 'wcps_items_cat_font_size', true );
	$wcps_items_cat_text_align = get_post_meta( $post_id, 'wcps_items_cat_text_align', true );
	$wcps_items_cat_font_color = get_post_meta( $post_id, 'wcps_items_cat_font_color', true );
	if(empty($wcps_items_cat_font_color)){$wcps_items_cat_font_color = '#626262';}


	$wcps_items_cat_separator = get_post_meta( $post_id, 'wcps_items_cat_separator', true );
	if(empty($wcps_items_cat_separator)){$wcps_items_cat_separator = ' ';}

	//var_dump($wcps_items_cat_separator);


	$wcps_total_items_price_format = get_post_meta( $post_id, 'wcps_total_items_price_format', true );
	$wcps_items_price_color = get_post_meta( $post_id, 'wcps_items_price_color', true );
	if(empty($wcps_items_price_color)){$wcps_items_price_color = '#626262';}

	$wcps_items_price_font_size = get_post_meta( $post_id, 'wcps_items_price_font_size', true );
	$wcps_items_price_text_align = get_post_meta( $post_id, 'wcps_items_price_text_align', true );

	$wcps_ratings_text_align = get_post_meta( $post_id, 'wcps_ratings_text_align', true );
	$wcps_items_ratings_font_size = get_post_meta( $post_id, 'wcps_items_ratings_font_size', true );
	$wcps_items_ratings_color = get_post_meta( $post_id, 'wcps_items_ratings_color', true );


	$wcps_cart_style = get_post_meta( $post_id, 'wcps_cart_style', true );
	$wcps_cart_bg = get_post_meta( $post_id, 'wcps_cart_bg', true );
	$wcps_cart_text = get_post_meta( $post_id, 'wcps_cart_text', true );

	$wcps_cart_text_color = get_post_meta( $post_id, 'wcps_cart_text_color', true );
	if(empty($wcps_cart_text_color)){$wcps_cart_text_color = '#626262'; }

	$wcps_cart_text_align = get_post_meta( $post_id, 'wcps_cart_text_align', true );
	$wcps_cart_display_quantity = get_post_meta( $post_id, 'wcps_cart_display_quantity', true );

	$wcps_sale_icon_url = get_post_meta( $post_id, 'wcps_sale_icon_url', true );
	$wcps_featured_icon_url = get_post_meta( $post_id, 'wcps_featured_icon_url', true );

	$wcps_grid_items = get_post_meta( $post_id, 'wcps_grid_items', true );
	$wcps_grid_items_hide = get_post_meta( $post_id, 'wcps_grid_items_hide', true );

	$wcps_items_custom_css = get_post_meta( $post_id, 'wcps_items_custom_css', true );






	if ( wp_is_mobile() ) {
	$wcps_is_mobile =  "wcps_mobile";
	}
	else {
	$wcps_is_mobile =  "";
	}


	$class_wcps_functions = new class_wcps_functions();
	if(empty($wcps_grid_items)){
		$wcps_grid_items = $class_wcps_functions->wcps_grid_items();
		}
