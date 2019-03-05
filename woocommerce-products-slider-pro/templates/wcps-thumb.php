<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	
	
	
	$primary_product_cat = (int)get_post_meta( get_the_ID(), '_yoast_wpseo_primary_product_cat', true );	
	
	
	
	
	if(!empty($primary_product_cat)){
		
		//var_dump($primary_product_cat);
		
		$cat_link = get_term_link( $primary_product_cat, 'product_cat' );
		//$cat_link = '#';
		}
	else{
		
			$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
			
			if(!empty($product_cats[0])){


				$term_id = $product_cats[0]->term_id;

                //var_dump($term_id);

				$cat_link = get_term_link( $term_id, 'product_cat' );
				}
			else{
				$cat_link = get_permalink(get_the_ID());
				}
			

			
			
		
		}
	

	
	
	$html.= '<div class="wcps-items-thumb">';
	
	$html_thumb = '';
	
	
	if($wcps_items_thumb_link_to == 'category'){
		
		$html_thumb = '<a target="'.$wcps_items_thumb_link_target.'" href="'.$cat_link.'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
		}
    else if($wcps_items_thumb_link_to == '_product_url'){

	    $_product_url = get_post_meta(get_the_ID(),'_product_url', true);



        $html_thumb = '<a target="'.$wcps_items_thumb_link_target.'" href="'.$_product_url.'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
    }

    else if($wcps_items_thumb_link_to == 'meta_value'){

        $_product_url = get_post_meta(get_the_ID(), $wcps_items_thumb_link_to_meta_value, true);

        $html_thumb = '<a target="'.$wcps_items_thumb_link_target.'" href="'.$_product_url.'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
    }

    else{
		$html_thumb = '<a target="'.$wcps_items_thumb_link_target.'" href="'.$permalink.'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
		}
	
	
	$html.= apply_filters( 'wcps_filter_thumb', $html_thumb );	
	

	$html.= '</div>';