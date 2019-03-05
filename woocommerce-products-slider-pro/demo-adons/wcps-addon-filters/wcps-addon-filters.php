<?php
/*
Plugin Name: Woocommerce Products Slider Addon Filters
Plugin URI: http://paratheme.com/
Description: Demo Addon for "Woocommerce Products Slider" used for Filters
Version: 1.0.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright: 	2015 ParaTheme

*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class WCPSAddonFilters{
	
	public function __construct(){

		
		add_filter('wcps_filter_title', array( $this, 'wcps_filter_title_extra' ));
		add_filter('wcps_filter_price', array( $this, 'wcps_filter_extra' ));
		add_filter('wcps_filter_cart', array( $this, 'wcps_filter_extra' ));	
		add_filter('wcps_filter_ribbon', array( $this, 'wcps_filter_extra' ));			
		
		// extra grid items
		add_filter('wcps_grid_items', array( $this, 'wcps_grid_items_extra' ));	
						
		}
		

	public function wcps_filter_title_extra($title){
			return '♣ '.$title.' ♥';
		}



public function wcps_grid_items_extra($grid_items){
		
			$grid_items_extra = array(
							'thumb1'=>'Thumbnail 1',
							'title1'=>'Title 1',																												
							);
							
			$grid_items = array_merge($grid_items,$grid_items_extra);
			
			return $grid_items;
		}






	}
	
	new WCPSAddonFilters();
	
	
	
	
	
add_filter('wcps_filter_excerpt', 'wcps_filter_excerpt_extra' );
		
function wcps_filter_excerpt_extra($excerpt){
	
	return 'Before Text '.$excerpt.' After Text';
	
	}
	
	
	
	
	