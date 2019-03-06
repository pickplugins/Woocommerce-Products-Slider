<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	//global $wp_query;
	
	$meta_query = array();




	

	//var_dump($wcps_upsells_crosssells);
	
	/*More Query parameter string to array*/
	if(!empty($wcps_more_query)){
		
		$wcps_more_query = explode('&', $wcps_more_query);
		
		//var_dump($extra_query_parameter);
		
		foreach($wcps_more_query as $parameter){
			
			//var_dump($parameter).'<br />';
			
			$parameter = explode('=', $parameter);
			
			//var_dump($parameter).'<br />';

			//var_dump(do_shortcode($parameter[1])).'<br />';


				if (strpos($parameter[1], ',') !== false) {
					//var_dump($parameter[1]);
					$parameter_args = explode(',', do_shortcode($parameter[1]));
					
						//echo '<pre>'.var_export($parameter_args, true).'</pre>';
					$query_parameter[$parameter[0]] = $parameter_args;
					//echo '<pre>'.var_export($query_parameter, true).'</pre>';

					} 
				else{
					$query_parameter[$parameter[0]] = $parameter[1];
					}

			
			
			}
		
		}
	else{
		
		$query_parameter = array();
		}
	
	
	
	//var_dump($query_parameter);
	
	
	
	
	
	
	

//var_dump($wcps_product_categories);
	if(!empty($wcps_product_categories))
	foreach($wcps_product_categories as $category){
		
		$tax_cat = explode(',',$category);
		
		$tax_terms[$tax_cat[0]][] = $tax_cat[1];
		
		}
	
	if(empty($tax_terms)){
		
		$tax_terms = array(); 
		}
	
	
	foreach($tax_terms as $taxonomy=>$terms){
		
			$tax_query[] = array(
								'taxonomy' => $taxonomy,
								'field'    => 'id',
								'terms'    => $terms,
								//'operator'    => '',
								);
			
			
		}
	
	if(empty($tax_query)){
		
		$tax_query = array();
		
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
		
		$meta_query[] =  array(
							'relation' => 'OR',
							array( // Variable products type
								'key'           => '_min_variation_sale_price',
								'value'         => 0,
								'compare'       => '>',
								'type'          => 'numeric'
							),
								array(
								'key' => '_sale_price',
								'value' => 0,
								'compare' => '>',
								'type' => 'NUMERIC'
								)
							);
		
		}	
	
	

	
	
	
	
	
	
	if(!empty($wcps_product_sku)){

		$wcps_product_sku = explode(',', $wcps_product_sku);

			$meta_query[] = 
						array(
							'key' => '_sku',
							'value' => $wcps_product_sku,
							'compare' => 'IN'
							);
		
		}









if($wcps_product_best_selling=='yes'){

		$meta_query[] =  array(
							array(
							'key' => '_visibility',
							'value' => array('catalog', 'visible'),
							'compare' => 'IN'
							),
							array(
							'key' => 'total_sales',
							'value' => 0,
							'compare' => '>',
							'type' => 'NUMERIC'
							),
							);
		
		}


	
	

	
	
	if(!empty($wcps_product_ids)){

		$wcps_product_ids = array_map('intval',explode(',', $wcps_product_ids));
		//array_walk( $wcps_product_ids, 'intval' );


		//var_dump($wcps_product_ids);
		}
	else{

		$wcps_product_ids = array();

	}

	if($wcps_upsells_crosssells=='upsells' && is_singular('product')):


		$upsells_crosssells_ids = get_post_meta( get_the_ID(), '_upsell_ids',true);

		if(empty($upsells_crosssells_ids)):
			$upsells_crosssells_ids = array();
		endif;

	elseif ($wcps_upsells_crosssells=='cross_sells' && is_singular('product')):


		$upsells_crosssells_ids = get_post_meta( get_the_ID(), '_crosssell_ids',true);
		if(empty($upsells_crosssells_ids)):
			$upsells_crosssells_ids = array();
		endif;


	elseif ($wcps_upsells_crosssells=='both' && is_singular('product')):

		$upsell_ids = get_post_meta( get_the_ID(), '_upsell_ids',true);
		$crosssell_ids = get_post_meta( get_the_ID(), '_crosssell_ids',true);

		if(!empty($crosssell_ids) && !empty($upsell_ids)):
			$upsells_crosssells_ids = array_merge($upsell_ids, $crosssell_ids);

		else:
			$upsells_crosssells_ids = array();
		endif;


	else:

	endif;





	
	//var_dump($upsells_crosssells_ids);
	
	
	
	$wcps_meta_query_relation = array('relation' => $wcps_meta_query_relation);

	//$meta_query = array_merge($meta_query_relation, $wcps_meta_query );
	
	//$meta_query_relation = array('relation' => $meta_query_relation);
		
	$meta_query = array_merge($meta_query, $wcps_meta_query );
		
	$meta_query = array_merge($wcps_meta_query_relation, $meta_query );
	
	
	
	//var_dump($meta_query);
	
/*

	$query_args = array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'posts_per_page' => $wcps_total_items,
						'orderby' => $wcps_query_orderby,
						'order' => $wcps_query_order,
						'post__in' => $wcps_product_ids,
						'meta_query' => $meta_query,
						'tax_query' => $tax_query,
						
						);
	
	//echo '<pre>'.var_export($query_args).'</pre>';
	$wp_query = new WP_Query($query_args);	

*/
	
	//var_dump($query_args);

	
	
	
	if($wcps_product_filter_by=='top_rated'){
		
		
			$meta_query = WC()->query->get_meta_query();
			 
			$args = array(
			 'post_type'           => 'product',
			 'post_status'         => 'publish',
			 'ignore_sticky_posts' => 1,
			 'orderby'             => $wcps_query_orderby,
			 'order'               => $wcps_query_order,
			 'posts_per_page'      => $wcps_total_items,
			 'meta_query'          => $meta_query
			);
			 
			add_filter('posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses'));
			$query_args = apply_filters('woocommerce_shortcode_products_query', $args, $atts);
			remove_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );
		
		}
		
	elseif($wcps_product_filter_by=='recently_viewed'){
		
		$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
		$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );





		 
			$query_args = 
				array (
					'post_type' => 'product',
					'post_status' => 'publish',
					'orderby' => $wcps_query_orderby,
					'order' => $wcps_query_order,
					'post__in' => $viewed_products,					
					'posts_per_page' => $wcps_total_items,
					'meta_query'  => $meta_query,
					'tax_query' => $tax_query,
					 );
		
		}
		
	
	elseif($wcps_product_filter_by=='featured_first'){
		
		
		$tax_query[] = array(
						'taxonomy' => 'product_visibility',
						'field' => 'name',
						'terms' => 'featured',
						'operator' => 'IN',
						);	
		
		
			//$meta_query = WC()->query->get_meta_query();
			 
/*

			$meta_query[] = array(
				'key'   => '_featured',
				'value' => 'yes'
			);

*/
			 
			$query_args = array(
			 'post_type'           => 'product',
			 'post_status'         => 'publish',
			 'orderby'             => $wcps_query_orderby,
			 'order'               => $wcps_query_order,
			 'posts_per_page'      => $wcps_total_items,
			 'meta_query'          => $meta_query,
			 'tax_query' => $tax_query,
			);
			 
			// var_dump($query_args);
			$wp_query = new WP_Query($query_args);
			 
			$featured_post_ids = wp_list_pluck( $wp_query->posts, 'ID' );
			 
			//var_dump($featured_post_ids);
			wp_reset_postdata();
		
		
	
		
		
		
/*

			$meta_query[] = array(
				'key'   => '_featured',
				'value' => 'yes',
				'compare' => '!=',
			);

*/
			 
			$query_args = array(
			 'post_type'           => 'product',
			 'post_status'         => 'publish',
			 'orderby'             => $wcps_query_orderby,
			 'order'               => $wcps_query_order,
			 'posts_per_page'      => $wcps_total_items,
			 'meta_query'          => $meta_query,
			 'tax_query' => $tax_query,
			);
			 
			// var_dump($query_args);
			 $wp_query = new WP_Query($query_args);			
		
			 $non_featured_post_ids = wp_list_pluck( $wp_query->posts, 'ID' );
			 
			//var_dump($non_featured_post_ids);
			
			$all_post_ids = array_merge( $featured_post_ids,  $non_featured_post_ids); 
			
			//var_dump($all_post_ids);
			wp_reset_postdata();
		
			$query_args = array(
			 'post_type'           => 'product',
			 'post_status'         => 'publish',
			 'orderby'             => 'post__in',
			 'order'               => $wcps_query_order,
			 'posts_per_page'      => $wcps_total_items,
			 'post__in'      => $all_post_ids,			 
			 
			// 'meta_query'          => $meta_query,
			 //'tax_query' => $tax_query,
			);
		
		
		
		
		
		}		
		
		
	else{

		if(!empty($upsells_crosssells_ids)):
			$wcps_product_ids = $upsells_crosssells_ids;
		endif;

		//var_dump($wcps_product_ids);


		$default_query['post_type'] = 'product';
		$default_query['post_status'] = 'publish';
		$default_query['posts_per_page'] = $wcps_total_items;
		$default_query['orderby'] = $wcps_query_orderby;
		$default_query['order'] = $wcps_query_order;
		$default_query['orderby'] = $wcps_query_orderby;
		$default_query['post__in'] = $wcps_product_ids;
		$default_query['meta_query'] = $meta_query;
		$default_query['tax_query'] = $tax_query;

		
		//echo '<pre>'.var_export($query_args).'</pre>';

		$query_args = array_merge($default_query, $query_parameter);
		
		
		
		}
		
	//echo '<pre>'.var_export(wc_get_product_ids_on_sale(), true).'</pre>';		
	
	$query_args = apply_filters('wcps_filter_query_args', $query_args);
	//echo '<pre>'.var_export($query_args, true).'</pre>';
	
	
	$wp_query = new WP_Query($query_args);


//echo '<pre>'.var_export($wp_query, true).'</pre>';
	

