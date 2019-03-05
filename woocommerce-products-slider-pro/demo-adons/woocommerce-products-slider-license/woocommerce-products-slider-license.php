<?php
/*
Plugin Name: Woocommerce Products Slider - License
Plugin URI: http://paratheme.com/
Description: License activation for "Woocommerce Products Slider"
Version: 1.0.0
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright: 	2016 pickplugins

*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


register_activation_hook(__FILE__, 'woocommerce_products_slider_activation_license');


function woocommerce_products_slider_activation_license()
	{

		update_option('wcps_license_key', '3cdb75e2e68aeb340e427fcf12556b14'); //update plugin license.

		
	}
	
	
	
	

	
	