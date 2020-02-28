<?php
if ( ! defined('ABSPATH')) exit;  // if direct access




//add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {



    if(is_singular('page')):
        global $post;
        $content = $post->content;

        if ( has_shortcode( $content, 'wcps_builder' ) ) {
            $classes[] = 'wcps_builder';
        }
    endif;


    return $classes;
}


function wcps_first_wcps_layout(){

    $args = array(
        'post_type' => 'wcps_layout',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    );

    $post_id = '';

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();

            $post_id = get_the_id();

            return $post_id;
        endwhile;
    else:

    endif;
}




function wcps_get_first_product_id(){

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    );

    $post_id ='';

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $product_id = get_the_id();
            return $product_id;
        endwhile;
    else:

    endif;
}






function wcps_layout_data($layout){

    $layout_data = array();

    ob_start();
    ?>.__ID__ {vertical-align: top;}.__ID__ .layer-media{}.__ID__ .layer-content {padding: 5px 10px;}<?php

    $layout_data['flat']['css'] = ob_get_clean();
    $layout_data['flat']['preview_img'] = 'https://i.imgur.com/5mxeJJK.png';


    ob_start();

    ?>.__ID__ {overflow: hidden;position: relative;vertical-align: top;}.__ID__:hover .layer-media {-webkit-transform: scale(0);transform: scale(0);opacity: 0;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";}.__ID__ .layer-media {-webkit-transition: all 1s ease 0s;transition: all 1s ease 0s;left: 0;top: 0;width: 100%;}.__ID__:hover .layer-content{opacity: 1;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";}.__ID__ .layer-content {left: 0;opacity: 0;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";position: absolute;top: 0;width: 100%;-webkit-transition: all 1s ease 0s;transition: all 1s ease 0s;}<?php

    $layout_data['zoomout']['css'] = ob_get_clean();
    $layout_data['zoomout']['preview_img'] = 'https://i.imgur.com/Eid7jWC.gif';




    ob_start();
    ?>.__ID__{}.__ID__ .layer-media {background: rgb(255, 255, 255) none repeat scroll 0 0;border-radius: 50%;overflow: hidden;}.__ID__ .layer-media .thumb {height:240px;}.__ID__ .layer-content{}<?php

    $layout_data['thumbrounded']['css'] = ob_get_clean();
    $layout_data['thumbrounded']['preview_img'] = 'https://i.imgur.com/V1BMOj9.png';


    $layout_data = apply_filters('wcps_layout_data', $layout_data);


    return isset($layout_data[$layout]) ? $layout_data[$layout] : array();

}

















/*

function wcps_grid_items($grid_items){
		
			$grid_items_extra = array(
							'thumb1'=>'Thumbnail 1',
							'title1'=>'Title 1',																												
							);
							
			$grid_items = array_merge($grid_items,$grid_items_extra);
			
			return $grid_items;
		}

add_filter('wcps_grid_items', 'wcps_grid_items');

*/





function wcps_get_categories($post_id){
	

		
	
	
	}
	






















add_action( 'template_redirect', 'wcps_track_product_view', 20 );


function wcps_track_product_view() {
	
	$wcps_track_product_view = get_option( 'wcps_track_product_view' );
	
	if($wcps_track_product_view=='yes' && is_singular('product')){
        global $post;

        if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) )
            $viewed_products = array();
        else
            $viewed_products = (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] );

        if ( ! in_array( $post->ID, $viewed_products ) ) {
            $viewed_products[] = $post->ID;
        }

        if ( sizeof( $viewed_products ) > 15 ) {
            array_shift( $viewed_products );
        }

        //var_dump($viewed_products);


        // Store for session only
        wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
    }


}






















function wcps_add_shortcode_column( $columns ) {
    return array_merge( $columns, 
        array( 'shortcode' => __( 'Shortcode',  'woocommerce-products-slider' ) ) );
}
add_filter( 'manage_wcps_posts_columns' , 'wcps_add_shortcode_column' );


function wcps_posts_shortcode_display( $column, $post_id ) {
    if ($column == 'shortcode'){
		?>
        <input style="background:#bfefff" type="text" onClick="this.select();" value="[wcps <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" /><br />
      <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[wcps id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
        <?php		
		
    }
}
add_action( 'manage_wcps_posts_custom_column' , 'wcps_posts_shortcode_display', 10, 2 );










function wcps_grid_items_reset(){
	
	if(current_user_can('manage_options')){
		
		$wcps_id = sanitize_text_field($_POST['wcps_id']);
		
		if(delete_post_meta($wcps_id, 'wcps_grid_items')){
			echo __('Reset done!', 'woocommerce-products-slider');
			}
		else{
			echo __('Reset failed!', 'woocommerce-products-slider');
			}
			
		}

	die();
	
	}
	
add_action('wp_ajax_wcps_grid_items_reset', 'wcps_grid_items_reset');
//add_action('wp_ajax_nopriv_wcps_grid_items_reset', 'wcps_grid_items_reset');



function wcps_get_item_thumb_url(){
	
	
	$product_id = (int)sanitize_text_field($_POST['product_id']);
	
	$wcps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($product_id), 'full' );
	$wcps_thumb_url = $wcps_thumb['0'];
	
	
	echo $wcps_thumb_url;
	
	die();
	
	}
	
add_action('wp_ajax_wcps_get_item_thumb_url', 'wcps_get_item_thumb_url');
add_action('wp_ajax_nopriv_wcps_get_item_thumb_url', 'wcps_get_item_thumb_url');



















function wcps_get_product_categories($postid)
	{
		
		$taxonomy= "product_cat";
		$wcps_taxonomy_category = get_post_meta( $postid, 'wcps_slide_categories', true );
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'taxonomy' => $taxonomy,
		  );
	
	$categories = get_categories($args);
	
	
	if(empty($categories))
		{
		echo __('No categories found!', 'woocommerce-products-slider');
			$categories = array();
		}
	
	
		$html = '';
		$html .= '<ul style="margin: 0;">';
	
	foreach($categories as $category){
		
		if(array_search($category->cat_ID, $wcps_taxonomy_category))
			{
				$html .= '<li class='.$category->cat_ID.'><label ><input checked type="checkbox" name="wcps_slide_categories['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';
			}
		
		else
			{
				$html .= '<li class='.$category->cat_ID.'><label ><input type="checkbox" name="wcps_slide_categories['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';			
			}
		
		

		
		}
	
		$html .= '</ul>';
		
		echo $html;
	
		
	}











	
	
		
	function wcps_admin_notices()
		{
			$wcps_license_key = get_option('wcps_license_key');
			
			$html= '';
			
			
			
			if(empty($wcps_license_key))
				{
					$admin_url = get_admin_url();
					
					$html.= '<div class="update-nag">';
					$html.= sprintf(__('Please activate your license for <b>%s &raquo; <a href="%sedit.php?post_type=wcps&page=wcps_menu_license">License</a></b>', 'woocommerce-products-slider') ,wcps_plugin_name, $admin_url);
					
					
					$html.= '</div>';	
				}
			else
				{

				}
			
			
			
			
			
			
								
			
			
			echo $html;
		}
	
	//add_action('admin_notices', 'wcps_admin_notices');
	