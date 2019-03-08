<?php

/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 	

class class_wcps_functions  {
	
	
    public function __construct(){

		}



	public function ribbons(){

		$ribbons[] = array(
			'name'=>'None',
			'id'=>'none',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/none.png',
		);

		$ribbons[] = array(
			'name'=>'Custom',
			'id'=>'custom',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/custom.png',
		);


		$ribbons[] = array(
			'name'=>'Free',
			'id'=>'free',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/free.png',
		);

		$ribbons[] = array(
			'name'=>'Save',
			'id'=>'save',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/save.png',
		);

		$ribbons[] = array(
			'name'=>'Hot',
			'id'=>'hot',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/hot.png',
		);

		$ribbons[] = array(
			'name'=>'Pro',
			'id'=>'pro',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/pro.png',
		);

		$ribbons[] = array(
			'name'=>'Best',
			'id'=>'best',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/best.png',
		);

		$ribbons[] = array(
			'name'=>'Gift',
			'id'=>'gift',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/gift.png',
		);

		$ribbons[] = array(
			'name'=>'Sale',
			'id'=>'sale',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/sale.png',
		);

		$ribbons[] = array(
			'name'=>'New',
			'id'=>'new',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/new.png',
		);

		$ribbons[] = array(
			'name'=>'Top',
			'id'=>'top',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/top.png',
		);

		$ribbons[] = array(
			'name'=>'Fresh',
			'id'=>'fresh',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/fresh.png',
		);


		$ribbons[] = array(
			'name'=>'-10%',
			'id'=>'dis-10',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-10.png',
		);

		$ribbons[] = array(
			'name'=>'-20%',
			'id'=>'dis-20',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-20.png',
		);

		$ribbons[] = array(
			'name'=>'-30%',
			'id'=>'dis-30',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-30.png',
		);

		$ribbons[] = array(
			'name'=>'-40%',
			'id'=>'dis-40',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-40.png',
		);

		$ribbons[] = array(
			'name'=>'-50%',
			'id'=>'dis-50',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-50.png',
		);

		$ribbons[] = array(
			'name'=>'-60%',
			'id'=>'dis-60',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-60.png',
		);

		$ribbons[] = array(
			'name'=>'-70%',
			'id'=>'dis-70',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-70.png',
		);

		$ribbons[] = array(
			'name'=>'-80%',
			'id'=>'dis-80',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-80.png',
		);

		$ribbons[] = array(
			'name'=>'-90%',
			'id'=>'dis-90',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-90.png',
		);

		$ribbons[] = array(
			'name'=>'-100%',
			'id'=>'dis-100',
			'src'=>wcps_plugin_url.'assets/front/images/ribbons/dis-100.png',
		);

		$ribbons_list = apply_filters('wcps_ribbons', $ribbons);

		return $ribbons_list;

	}

		
	public function skins(){
		
		$skins = array(
		
						'flat'=> array(
										'slug'=>'flat',									
										'name'=>'Flat',
										'thumb_url'=>'',
										),		
		
						'flip-x'=> array(
										'slug'=>'flip-x',									
										'name'=>'Flip-x',
										'thumb_url'=>'',
										),
						'flip-y'=>array(
										'slug'=>'flip-y',
										'name'=>'Flip-y',
										'thumb_url'=>'',
										),
						'zoomin'=>array(
										'slug'=>'zoomin',
										'name'=>'ZoomIn',
										'thumb_url'=>'',
										),							
						'zoomout'=>array(
										'slug'=>'zoomout',
										'name'=>'ZoomOut',
										'thumb_url'=>'',
										),							
						'spinright'=>array(
										'slug'=>'spinright',
										'name'=>'SpinRight',
										'thumb_url'=>'',
										),
						'spinleft'=>array(
										'slug'=>'spinleft',
										'name'=>'SpinLeft',
										'thumb_url'=>'',
										),
										
						'spinrightzoom'=>array(
										'slug'=>'spinrightzoom',
										'name'=>'SpinRightZoom',
										'thumb_url'=>'',
										),
										
						'spinleftzoom'=>array(
										'slug'=>'spinleftzoom',
										'name'=>'SpinLeftZoom',
										'thumb_url'=>'',
										),										
																			
										
										
						'spinrightfast'=>array(
										'slug'=>'spinrightfast',
										'name'=>'SpinRightFast',
										'thumb_url'=>'',
										),
						'spinleftfast'=>array(
										'slug'=>'spinleftfast',
										'name'=>'SpinLeftFast',
										'thumb_url'=>'',
										),										
										
						'thumbgoleft'=>array(
										'slug'=>'thumbgoleft',
										'name'=>'ThumbGoLeft',
										'thumb_url'=>'',
										),																
							
						'thumbgoright'=>array(
										'slug'=>'thumbgoright',
										'name'=>'ThumbGoRight',
										'thumb_url'=>'',
										),
						'thumbgotop'=>array(
										'slug'=>'thumbgotop',
										'name'=>'ThumbGoTop',
										'thumb_url'=>'',
										),																
							
						'thumbgobottom'=>array(
										'slug'=>'thumbgobottom',
										'name'=>'ThumbGoBottom',
										'thumb_url'=>'',
										),
										
						'thumbgoleftconetntinright'=>array(
										'slug'=>'thumbgoleftconetntinright',
										'name'=>'ThumbGoLeftConetntInRight',
										'thumb_url'=>'',
										),
										
						'thumbgobottomconetntinright'=>array(
										'slug'=>'thumbgobottomconetntinright',
										'name'=>'ThumbGoBottomConetntInRight',
										'thumb_url'=>'',
										),										
						'thumbgotopconetntinright'=>array(
										'slug'=>'thumbgotopconetntinright',
										'name'=>'ThumbGoTopConetntInRight',
										'thumb_url'=>'',
										),																			
						'thumbgorightconetntinright'=>array(
										'slug'=>'thumbgorightconetntinright',
										'name'=>'ThumbGoRightConetntInRight',
										'thumb_url'=>'',
										),										
																			
						'thumbmiddle'=>array(
										'slug'=>'thumbmiddle',
										'name'=>'ThumbMiddle',
										'thumb_url'=>'',
										),
										
						'thumbskew'=>array(
										'slug'=>'thumbskew',
										'name'=>'ThumbSkew',
										'thumb_url'=>'',
										),										
										
										
						'contentbottom'=>array(
										'slug'=>'contentbottom',
										'name'=>'ContentBottom',
										'thumb_url'=>'',
										),
						'contentmiddle'=>array(
										'slug'=>'contentmiddle',
										'name'=>'ContentMiddle',
										'thumb_url'=>'',
										),
										
						'contentinbottom'=>array(
										'slug'=>'contentinbottom',
										'name'=>'ContentInBottom',
										'thumb_url'=>'',
										),										
										
						'contentinleft'=>array(
										'slug'=>'contentinleft',
										'name'=>'ContentInLeft',
										'thumb_url'=>'',
										),
										
						'contentinright'=>array(
										'slug'=>'contentinright',
										'name'=>'ContentInRight',
										'thumb_url'=>'',
										),																												
												

						'halfthumbleft'=>array(
										'slug'=>'halfthumbleft',
										'name'=>'HalfThumbLeft',
										'thumb_url'=>'',
										),
										
						'halfthumbright'=>array(
										'slug'=>'halfthumbright',
										'name'=>'HalfThumbRight',
										'thumb_url'=>'',
										),
										
						'thumbrounded'=>array(
										'slug'=>'thumbrounded',
										'name'=>'ThumbRounded',
										'thumb_url'=>'',
										),																											
										
																															
					
						
						);
		
		$skins = apply_filters('post_grid_filter_skins', $skins);	
		
		return $skins;
		
		}
		

		
	public function wcps_grid_items($grid_items = array()){
		
			$grid_items = array(
                'thumb'=>__('Thumbnail', 'woocommerce-products-slider'),
                'title'=>__('Title', 'woocommerce-products-slider'),
                'excerpt'=>__('Excerpt', 'woocommerce-products-slider'),
                'category'=>__('Category', 'woocommerce-products-slider'),
                'price'=>__('Price', 'woocommerce-products-slider'),
                'rating'=>__('Rating', 'woocommerce-products-slider'),
                'cart'=>__('Cart', 'woocommerce-products-slider'),
                'sale'=>__('Sale', 'woocommerce-products-slider'),
                //'quick_view'=>__('Quick view', 'woocommerce-products-slider'),
                'featured'=>__('Featured', 'woocommerce-products-slider'),
                //'popup_thumb'=>__('Popup Thumbnail', 'woocommerce-products-slider'),
                'sale_count'=>__('Sale Count', 'woocommerce-products-slider'),


							);


			return apply_filters('wcps_grid_items', $grid_items);
		}		
		
		
		
		
		
		
		
	
}