<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



add_action('wcps_metabox_content_custom_scripts', 'wcps_metabox_content_custom_scripts',10, 2);

if(!function_exists('wcps_metabox_content_custom_scripts')) {
    function wcps_metabox_content_custom_scripts($tab, $post_id){



        $settings_tabs_field = new settings_tabs_field();


	    $wcps_items_custom_css = get_post_meta( $post_id, 'wcps_items_custom_css', true );


        ?>
        <div class="section">
            <div class="section-title">Custom scripts</div>
            <p class="description section-description">Add your own scritps and style css.</p>

            <?php

            $args = array(
                'id'		=> 'wcps_items_custom_css',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Custom CSS','woocommerce-products-slider'),
                'details'	=> __('Add your own CSS..','woocommerce-products-slider'),
                'type'		=> 'scripts_css',
                'value'		=> $wcps_items_custom_css,
                'default'		=> '.wcps-container #wcps-133{}&#10; .wcps-container #wcps-133 .wcps-items{}&#10;.wcps-container #wcps-133 .wcps-items-thumb{}&#10;',
            );

            $settings_tabs_field->generate_field($args);

            ?>


        </div>



            <?php






	}

}
















add_action('wcps_metabox_content_elements', 'wcps_metabox_content_elements',10, 2);

if(!function_exists('wcps_metabox_content_elements')) {
    function wcps_metabox_content_elements($tab, $post_id){


        $settings_tabs_field = new settings_tabs_field();



	$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );

	if(empty($wcps_items_thumb_size)){$wcps_items_thumb_size= 'large'; }




    $wcps_items_thumb_link_target = get_post_meta( $post_id, 'wcps_items_thumb_link_target', true );
    $wcps_items_thumb_lazy_src = get_post_meta( $post_id, 'wcps_items_thumb_lazy_src', true );


	$wcps_items_thumb_max_hieght = get_post_meta( $post_id, 'wcps_items_thumb_max_hieght', true );
	$wcps_items_thumb_zoom = get_post_meta( $post_id, 'wcps_items_thumb_zoom', true );

	$wcps_items_empty_thumb = get_post_meta( $post_id, 'wcps_items_empty_thumb', true );
	if(empty($wcps_items_empty_thumb)){$wcps_items_empty_thumb = wcps_plugin_url.'assets/front/images/no-thumb.png'; }

	$wcps_items_title_color = get_post_meta( $post_id, 'wcps_items_title_color', true );
	if(empty($wcps_items_title_color)){$wcps_items_title_color = '#626262';}

	$wcps_items_title_font_size = get_post_meta( $post_id, 'wcps_items_title_font_size', true );
	$wcps_items_title_text_align = get_post_meta( $post_id, 'wcps_items_title_text_align', true );


	$wcps_items_excerpt_count = get_post_meta( $post_id, 'wcps_items_excerpt_count', true );
	if(!isset($wcps_items_excerpt_count)){$wcps_items_excerpt_count = 30; }

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



	$wcps_total_items_price_format = get_post_meta( $post_id, 'wcps_total_items_price_format', true );
	$wcps_items_price_color = get_post_meta( $post_id, 'wcps_items_price_color', true );
	if(empty($wcps_items_price_color)){$wcps_items_price_color = '#626262';}

	$wcps_items_price_font_size = get_post_meta( $post_id, 'wcps_items_price_font_size', true );
	$wcps_items_price_text_align = get_post_meta( $post_id, 'wcps_items_price_text_align', true );

	$wcps_ratings_text_align = get_post_meta( $post_id, 'wcps_ratings_text_align', true );
	$wcps_items_ratings_font_size = get_post_meta( $post_id, 'wcps_items_ratings_font_size', true );
	$wcps_items_ratings_color = get_post_meta( $post_id, 'wcps_items_ratings_color', true );

    $wcps_items_tag_font_size = get_post_meta( $post_id, 'wcps_items_tag_font_size', true );
    $wcps_items_tag_text_align = get_post_meta( $post_id, 'wcps_items_tag_text_align', true );
    $wcps_items_tag_font_color = get_post_meta( $post_id, 'wcps_items_tag_font_color', true );

	$wcps_cart_style = get_post_meta( $post_id, 'wcps_cart_style', true );
	$wcps_cart_bg = get_post_meta( $post_id, 'wcps_cart_bg', true );
	$wcps_cart_text_color = get_post_meta( $post_id, 'wcps_cart_text_color', true );
	if(empty($wcps_cart_text_color)){$wcps_cart_text_color = '#626262'; }

	$wcps_cart_text_align = get_post_meta( $post_id, 'wcps_cart_text_align', true );
	$wcps_cart_display_quantity = get_post_meta( $post_id, 'wcps_cart_display_quantity', true );

	$wcps_sale_count_text = get_post_meta( $post_id, 'wcps_sale_count_text', true );

	$wcps_sale_icon_url = get_post_meta( $post_id, 'wcps_sale_icon_url', true );
	$wcps_featured_icon_url = get_post_meta( $post_id, 'wcps_featured_icon_url', true );

	$wcps_grid_items = get_post_meta( $post_id, 'wcps_grid_items', true );
	$wcps_grid_items_hide = get_post_meta( $post_id, 'wcps_grid_items_hide', true );



        ?>
        <div class="section">
            <div class="section-title">Elements</div>
            <p class="description section-description">Customize elements settings.</p>


            <?php
            $class_wcps_functions = new class_wcps_functions();


            if(empty($wcps_grid_items)){

                $wcps_grid_items = $class_wcps_functions->wcps_grid_items();

            }
            else{
                $wcps_grid_items_main = $class_wcps_functions->wcps_grid_items();
                $wcps_grid_items = array_merge($wcps_grid_items,$wcps_grid_items_main);
            }

            $wcps_grid_items = apply_filters('wcps_grid_items',$wcps_grid_items);


            //var_dump($wcps_grid_items);
            ob_start();
            ?>

            <div class="expandable">
                    <?php


                    foreach($wcps_grid_items as $item_key=>$item_name){


						?>
                        <div class="item">
                            <div class="header">
                                <span class="move"><i class="fa fa-bars"></i></span>
                                <span class="expand"><i class="fa fa-expand"></i><i class="fa fa-compress"></i></span>
                                <span class="name"><?php echo $item_name; ?></span>
                                <input type="hidden" name="wcps_grid_items[<?php echo $item_key; ?>]" value="<?php echo $item_name; ?>" />
                                <?php

                                if(!empty($wcps_grid_items_hide[$item_key])){

                                    $checked = 'checked';
                                    }
                                else{
                                    $checked = '';
                                    }

                                ?>
                                <label class="float-right"><input <?php echo $checked; ?> type="checkbox" class="wcps_grid_items_hide" name="wcps_grid_items_hide[<?php echo $item_key; ?>]" value="1" />Hide on front-end</label>

                            </div> <!-- .header -->
                       		<div class="options">
                        <?php

						if($item_key == 'thumb'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider Thumbnail Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>

                                <?php

								$get_intermediate_image_sizes =  get_intermediate_image_sizes();

								$get_intermediate_image_sizes = array_merge($get_intermediate_image_sizes,array('full'));


								//echo '<pre>'.var_export($get_intermediate_image_sizes, true).'</pre>';

								?>


                                <select name="wcps_items_thumb_size" >


                                <?php

									foreach($get_intermediate_image_sizes as $size_key){

										?>
										<option value="<?php echo $size_key; ?>" <?php if($wcps_items_thumb_size==$size_key)echo "selected"; ?>>


										<?php

										$size_key = str_replace('_', ' ',$size_key);
										$size_key = str_replace('-', ' ',$size_key);
										$size_key = ucfirst($size_key);

										echo $size_key;

										?>

										</option>


										<?php


										}




								?>







                                </select>
                            </div>


                            <div class="option-box">

                                <p class="option-info">Link target</p>
                                <select name="wcps_items_thumb_link_target" >
                                    <option value="_blank" <?php if($wcps_items_thumb_link_target=="_blank")echo "selected"; ?>><?php _e('_blank', 'woocommerce-products-slider');?></option>
                                    <option value="_self" <?php if($wcps_items_thumb_link_target=="_self")echo "selected"; ?>><?php _e('_self', 'woocommerce-products-slider');?></option>
                                    <option value="_parent" <?php if($wcps_items_thumb_link_target=="_parent")echo "selected"; ?>><?php _e('_parent', 'woocommerce-products-slider');?></option>
                                    <option value="_top" <?php if($wcps_items_thumb_link_target=="_top")echo "selected"; ?>><?php _e('_top', 'woocommerce-products-slider');?></option>



                                </select>


                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider thumb max hieght(px)', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_thumb_max_hieght" placeholder="14px" id="wcps_items_thumb_max_hieght" value="<?php echo $wcps_items_thumb_max_hieght; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Display Thumbnail Zoom button', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_zoom" >
                                <option value="no" <?php if($wcps_items_thumb_zoom=="no")echo "selected"; ?>><?php _e('No', 'woocommerce-products-slider');?></option>
                                <option value="yes" <?php if($wcps_items_thumb_zoom=="yes")echo "selected"; ?>><?php _e('Yes', 'woocommerce-products-slider');?></option>

                                </select>
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Lazy load image', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_thumb_lazy_src" placeholder="" id="wcps_items_thumb_lazy_src" value="<?php echo $wcps_items_thumb_lazy_src; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Empty Thumbnail', 'woocommerce-products-slider');?></p>
                                <p class="option-info"><?php _e('Custom thumbnail image url', 'woocommerce-products-slider');?></p>
                                <input type="text" name="wcps_items_empty_thumb" id="wcps_items_empty_thumb" value="<?php echo $wcps_items_empty_thumb; ?>" /><br /><br />
                                <input id="wcps_items_empty_thumb_upload" class="wcps_items_empty_thumb_upload button" type="button" value="Upload Image" />
                                   <br /><br />


                                    <?php
                                        if(empty($wcps_items_empty_thumb))
                                            {
                                            ?>
                                            <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo wcps_plugin_url.'assets/front/images/no-thumb.png'; ?>" />
                                            <?php
                                            }
                                        else
                                            {
                                            ?>
                                            <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo $wcps_items_empty_thumb; ?>" />
                                            <?php
                                            }
                                    ?>





                                <script>
                                    jQuery(document).ready(function($){

                                        var custom_uploader;

                                        jQuery('#wcps_items_empty_thumb_upload').click(function(e) {

                                            e.preventDefault();

                                            //If the uploader object has already been created, reopen the dialog
                                            if (custom_uploader) {
                                                custom_uploader.open();
                                                return;
                                            }

                                            //Extend the wp.media object
                                            custom_uploader = wp.media.frames.file_frame = wp.media({
                                                title: 'Choose Image',
                                                button: {
                                                    text: 'Choose Image'
                                                },
                                                multiple: false
                                            });

                                            //When a file is selected, grab the URL and set it as the text field's value
                                            custom_uploader.on('select', function() {
                                                attachment = custom_uploader.state().get('selection').first().toJSON();
                                                jQuery('#wcps_items_empty_thumb').val(attachment.url);
                                                jQuery('.wcps_items_empty_thumb_display').attr('src',attachment.url);
                                            });

                                            //Open the uploader dialog
                                            custom_uploader.open();

                                        });


                                    })
                                </script>
                            </div>




                            <?php

							}
						elseif($item_key == 'cart'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Add to cart button Style', 'woocommerce-products-slider');?></p>
                                <p class="option-info"><?php _e('You can hide items Add to cart button on slider.', 'woocommerce-products-slider');?></p>
                                <select name="wcps_cart_style" >
                                <option value="default" <?php if($wcps_cart_style=="default")echo "selected"; ?>><?php _e('Default', 'woocommerce-products-slider');?></option>
                                <option value="custom" <?php if($wcps_cart_style=="custom")echo "selected"; ?>><?php _e('Custom', 'woocommerce-products-slider');?></option>
                                </select>
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Background Color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_bg" class="wcps_color" id="wcps_cart_bg" value="<?php echo $wcps_cart_bg; ?>" />
                            </div>





                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Text Color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_text_color" class="wcps_color"  id="wcps_cart_text_color" value="<?php echo $wcps_cart_text_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Cart Text Align', 'woocommerce-products-slider');?></p>
                                <select name="wcps_cart_text_align" >
                                <option value="left" <?php if($wcps_cart_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_cart_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                <option value="center" <?php if($wcps_cart_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>



                            <div class="option-box">
                                <p class="option-title"><?php _e('Display quantity', 'woocommerce-products-slider');?></p>
                                <select name="wcps_cart_display_quantity" >
                                    <option value="yes" <?php if($wcps_cart_display_quantity=="yes")echo "selected"; ?>><?php _e('Yes', 'woocommerce-products-slider');?></option>
                                    <option value="no" <?php if($wcps_cart_display_quantity=="no")echo "selected"; ?>><?php _e('No', 'woocommerce-products-slider');?></option>

                                </select>

                            </div>



							<?php


							}
						elseif($item_key == 'sale'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Sale marker icon url', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_sale_icon_url" placeholder="" id="wcps_sale_icon_url" value="<?php echo $wcps_sale_icon_url; ?>" />
                            </div>

                            <?php


							}


						elseif($item_key == 'sale_count'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('sale count text', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_sale_count_text" placeholder="" id="wcps_sale_count_text" value="<?php echo $wcps_sale_count_text; ?>" />
                            </div>

                            <?php


							}


						elseif($item_key == 'title'){

							?>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_color" class="wcps_color" id="wcps_items_title_color" value="<?php echo $wcps_items_title_color; ?>" />
                            </div>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Font Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_font_size" placeholder="14px" id="wcps_items_title_font_size" value="<?php echo $wcps_items_title_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Text Align', 'woocommerce-products-slider');?></p>


                                <select name="wcps_items_title_text_align" >
                                <option value="left" <?php if($wcps_items_title_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_items_title_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                <option value="center" <?php if($wcps_items_title_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>

                            <?php

							}

						elseif($item_key == 'featured'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Featured marker icon url', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_featured_icon_url" placeholder="" id="wcps_featured_icon_url" value="<?php echo $wcps_featured_icon_url; ?>" />
                            </div>


                            <?php
							}
						elseif($item_key == 'price'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Price format on slider', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <select name="wcps_total_items_price_format">
                                    <option value="full" <?php if(($wcps_total_items_price_format=="full")) echo "selected"; ?> ><?php _e('Full Format', 'woocommerce-products-slider');?></option>
                                    <option value="sale" <?php if(($wcps_total_items_price_format=="sale")) echo "selected"; ?> ><?php _e('Sale price', 'woocommerce-products-slider');?></option>
                                    <option value="regular" <?php if(($wcps_total_items_price_format=="regular")) echo "selected"; ?> ><?php _e('Regular price', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Price Color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_color" class="wcps_color" id="wcps_items_price_color" value="<?php echo $wcps_items_price_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items price Font Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_font_size" placeholder="14px" id="wcps_items_price_font_size" value="<?php echo $wcps_items_price_font_size; ?>" />
                            </div>



                            <div class="option-box">
                                <p class="option-title"><?php _e('Price Text Align', 'woocommerce-products-slider');?></p>


                                <select name="wcps_items_price_text_align" >
                                <option value="left" <?php if($wcps_items_price_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_items_price_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                <option value="center" <?php if($wcps_items_price_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>





                            <?php


							}

						elseif($item_key == 'rating'){

							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Rating Text Align', 'woocommerce-products-slider');?></p>


                                <select name="wcps_ratings_text_align" >
                                <option value="left" <?php if($wcps_ratings_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_ratings_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                <option value="center" <?php if($wcps_ratings_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items ratings Font Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_font_size" placeholder="14px" id="wcps_items_ratings_font_size" value="<?php echo $wcps_items_ratings_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Ratings Color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_color" class="wcps_color" id="wcps_items_ratings_color" value="<?php echo $wcps_items_ratings_color; ?>" />
                            </div>




                            <?php

							}


						elseif($item_key == 'excerpt'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt word count', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_count" placeholder="30" id="wcps_items_excerpt_count" value="<?php echo $wcps_items_excerpt_count; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt read more text', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_read_more" placeholder="View product." id="wcps_items_excerpt_read_more" value="<?php echo $wcps_items_excerpt_read_more; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_excerpt_font_size" placeholder="14px" id="wcps_items_excerpt_font_size" value="<?php echo $wcps_items_excerpt_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt Text Align', 'woocommerce-products-slider');?></p>


                                <select name="wcps_items_excerpt_text_align" >
                                <option value="left" <?php if($wcps_items_excerpt_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_items_excerpt_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>

                                <option value="center" <?php if($wcps_items_excerpt_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_excerpt_font_color" placeholder="14px" id="wcps_items_excerpt_font_color" value="<?php echo $wcps_items_excerpt_font_color; ?>" />
                            </div>




                            <?php

							}






						elseif($item_key=='category'){
							?>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font Size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_cat_font_size" placeholder="14px" id="wcps_items_cat_font_size" value="<?php echo $wcps_items_cat_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Category Text Align', 'woocommerce-products-slider');?></p>


                                <select name="wcps_items_cat_text_align" >
                                <option value="left" <?php if($wcps_items_cat_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                <option value="right" <?php if($wcps_items_cat_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                <option value="center" <?php if($wcps_items_cat_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_cat_font_color" placeholder="14px" id="wcps_items_cat_font_color" value="<?php echo $wcps_items_cat_font_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category separator', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="" name="wcps_items_cat_separator" placeholder="," id="wcps_items_cat_separator" value="<?php echo $wcps_items_cat_separator; ?>" />
                            </div>





                            <?php


							}
                        elseif( $item_key=='tag'){
                            ?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items tag font size', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_tag_font_size" placeholder="14px" id="wcps_items_tag_font_size" value="<?php echo $wcps_items_tag_font_size; ?>" />
                            </div>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Tag text align', 'woocommerce-products-slider');?></p>

                                <select name="wcps_items_tag_text_align" >
                                    <option value="left" <?php if($wcps_items_tag_text_align=="left")echo "selected"; ?>><?php _e('Left', 'woocommerce-products-slider');?></option>
                                    <option value="right" <?php if($wcps_items_tag_text_align=="right")echo "selected"; ?>><?php _e('Right', 'woocommerce-products-slider');?></option>
                                    <option value="center" <?php if($wcps_items_tag_text_align=="center")echo "selected"; ?>><?php _e('Center', 'woocommerce-products-slider');?></option>
                                </select>

                            </div>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items tag font color', 'woocommerce-products-slider');?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_tag_font_color" placeholder="" id="wcps_items_tag_font_color" value="<?php echo $wcps_items_tag_font_color; ?>" />
                            </div>
                            <?php
                        }




						echo '</div>'; // .options



						echo '</div>'; // .items

						}
					?>

                    </div> <!-- .expandable -->

					 <script>
                     jQuery(document).ready(function($)
                        {
                            $(function() {
                                $( ".expandable" ).sortable({ handle: '.move' });
                                //$( ".items" ).disableSelection();
                                });

                            })

                    </script>


        </div>

            <?php

            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_elements',
                'title' => __('Elements', 'woocommerce-products-slider'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);







    }
}


add_action('wcps_metabox_content_style', 'wcps_metabox_content_style',10, 2);

if(!function_exists('wcps_metabox_content_style')) {
    function wcps_metabox_content_style($tab, $post_id){



        $settings_tabs_field = new settings_tabs_field();
        $class_wcps_functions = new class_wcps_functions();

        $skins = $class_wcps_functions->skins();
        $ribbons = $class_wcps_functions->ribbons();

        $wcps_themes = get_post_meta($post_id, 'wcps_themes', true);
        $wcps_ribbon_name = get_post_meta($post_id, 'wcps_ribbon_name', true);
        $wcps_ribbon_custom = get_post_meta($post_id, 'wcps_ribbon_custom', true);
        $wcps_container_padding = get_post_meta($post_id, 'wcps_container_padding', true);
        $wcps_container_bg_color = get_post_meta($post_id, 'wcps_container_bg_color', true);
        $wcps_bg_img = get_post_meta($post_id, 'wcps_bg_img', true);

        $wcps_items_padding = get_post_meta($post_id, 'wcps_items_padding', true);
        $wcps_items_bg_color = get_post_meta($post_id, 'wcps_items_bg_color', true);




        ?>
        <div class="section">
            <div class="section-title">Style</div>
            <p class="description section-description">Customize style settings.</p>


            <?php

            $skin_arr = array();

            if(!empty($skins))
            foreach($skins as $skin_key => $skin_data){

                $skin_arr[$skin_key] = $skin_data['name'];

            }

            $args = array(
                'id'		=> 'wcps_themes',
                //'parent'		=> '',
                'title'		=> __('Slider themes','woocommerce-products-slider'),
                'details'	=> __('Choose slider product themes.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $wcps_themes,
                'default'		=> 'OR',
                'args'		=> $skin_arr,
            );

            $settings_tabs_field->generate_field($args);



            $ribbons_arr = array();

            if(!empty($ribbons))
                foreach($ribbons as $ribbon_key => $ribbon_data){

                    $ribbons_arr[$ribbon_key]['name'] = $ribbon_data['name'];
                    $ribbons_arr[$ribbon_key]['thumb'] = $ribbon_data['src'];

                }


            //echo '<pre>'.var_export($ribbons_arr, true).'</pre>';


            $args = array(
                'id'		=> 'wcps_ribbon_name',
                //'parent'		=> '',
                'title'		=> __('Slider ribbon','woocommerce-products-slider'),
                'details'	=> __('Choose slider ribbon.','woocommerce-products-slider'),
                'type'		=> 'radio_image',
                'value'		=> $wcps_ribbon_name,
                'default'		=> 'none',
                'width'		=> '100px',

                'args'		=> $ribbons_arr,
            );

            echo $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'wcps_ribbon_custom',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Custom ribbon','woocommerce-products-slider'),
                'details'	=> __('Choose custom ribbon, image source url.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_ribbon_custom,
                'default'		=> '',
                'placeholder'		=> 'Ribbon image url',
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_items_padding',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Items padding','woocommerce-products-slider'),
                'details'	=> __('Set custom padding for item.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_items_padding,
                'default'		=> '',
                'placeholder'		=> '10px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_items_bg_color',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Item background color','woocommerce-products-slider'),
                'details'	=> __('Set custom background color for item.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_items_bg_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);








            $args = array(
                'id'		=> 'wcps_container_padding',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container Padding','woocommerce-products-slider'),
                'details'	=> __('Set custom padding for container.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_container_padding,
                'default'		=> '',
                'placeholder'		=> '10px',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wcps_container_bg_color',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container background color','woocommerce-products-slider'),
                'details'	=> __('Set custom background color for container.','woocommerce-products-slider'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_container_bg_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_bg_img',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container background image','woocommerce-products-slider'),
                'details'	=> __('Set custom background image for container.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_bg_img,
                'default'		=> '',
                'placeholder'		=> 'image url',
            );

            $settings_tabs_field->generate_field($args);

            ?>


        </div>
            <?php
    }
}































add_action('wcps_metabox_content_query_product', 'wcps_metabox_content_query_product',10, 2);

if(!function_exists('wcps_metabox_content_query_product')) {
    function wcps_metabox_content_query_product($tab, $post_id){

        $settings_tabs_field = new settings_tabs_field();

        $wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );


        $taxonomies = get_post_meta( $post_id, 'wcps_taxonomies', true );


        $wcps_query_order = get_post_meta( $post_id, 'wcps_query_order', true );
        $wcps_query_orderby = get_post_meta( $post_id, 'wcps_query_orderby', true );

        $wcps_hide_out_of_stock = get_post_meta( $post_id, 'wcps_hide_out_of_stock', true );
        $wcps_product_featured = get_post_meta( $post_id, 'wcps_product_featured', true );
        $wcps_product_on_sale = get_post_meta( $post_id, 'wcps_product_on_sale', true );


        $wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );



        ?>
        <div class="section">
            <div class="section-title">Query Products</div>
            <p class="description section-description">Setup product query settings.</p>


            <?php

            $args = array(
                'id'		=> 'wcps_total_items',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Max number of product','woocommerce-products-slider'),
                'details'	=> __('Set custom number you want to display maximum number of product','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_total_items,
                'default'		=> '10',
                'placeholder'		=> '10',
            );

            $settings_tabs_field->generate_field($args);



            ob_start();
            echo wcps_get_categories(get_the_ID());
            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_categories',
                'title' => __('Product categories & terms', 'woocommerce-products-slider'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);



            ?>



            <?php










            $args = array(
                'id'		=> 'wcps_query_order',
                //'parent'		=> '',
                'title'		=> __('Query order','woocommerce-products-slider'),
                'details'	=> __('Set query order.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $wcps_query_order,
                'default'		=> 'DESC',
                'args'		=> array(
                    'DESC'=>__('Descending','woocommerce-products-slider'),
                    'ASC'=>__('Ascending','woocommerce-products-slider'),



                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_query_orderby',
                //'parent'		=> '',
                'title'		=> __('Query orderby','woocommerce-products-slider'),
                'details'	=> __('Set query orderby.','woocommerce-products-slider'),
                'type'		=> 'select',
                'multiple'		=> true,
                'value'		=> $wcps_query_orderby,
                'default'		=> array('date'),
                'args'		=> array(
                    'none'=>__('None','woocommerce-products-slider'),
                    'ID'=>__('ID','woocommerce-products-slider'),
                    'date'=>__('date','woocommerce-products-slider'),
                    'post_date'=>__('post_date','woocommerce-products-slider'),
                    'name'=>__('name','woocommerce-products-slider'),
                    'rand'=>__('rand','woocommerce-products-slider'),
                    'comment_count'=>__('comment_count','woocommerce-products-slider'),
                    'author'=>__('author','woocommerce-products-slider'),
                    'title'=>__('title','woocommerce-products-slider'),
                    'type'=>__('type','woocommerce-products-slider'),
                    'menu_order'=>__('menu order','woocommerce-products-slider'),

                ),
            );

            $settings_tabs_field->generate_field($args);












            $args = array(
                'id'		=> 'wcps_hide_out_of_stock',
                //'parent'		=> '',
                'title'		=> __('Hide out of stock items','woocommerce-products-slider'),
                'details'	=> __('You can hide out of stock items from query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $wcps_hide_out_of_stock,
                'default'		=> 'no_check',
                'args'		=> array(
                    'yes'=>__('Yes','woocommerce-products-slider'),
                    'no'=>__('No','woocommerce-products-slider'),
                    'no_check'=>__('No Check','woocommerce-products-slider'),


                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_product_featured',
                //'parent'		=> '',
                'title'		=> __('Featured product display','woocommerce-products-slider'),
                'details'	=> __('You include/exclude featured product on query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_featured,
                'default'		=> 'no_check',
                'args'		=> array(
                    'yes'=>__('Yes','woocommerce-products-slider'),
                    'no'=>__('No','woocommerce-products-slider'),
                    'no_check'=>__('No Check','woocommerce-products-slider'),


                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_product_on_sale',
                //'parent'		=> '',
                'title'		=> __('On Sale Product display','woocommerce-products-slider'),
                'details'	=> __('You include/exclude on sale product on query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_on_sale,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Yes','woocommerce-products-slider'),
                    'no'=>__('No','woocommerce-products-slider'),


                ),
            );

            $settings_tabs_field->generate_field($args);










            $args = array(
                'id'		=> 'wcps_product_ids',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Product display by Product ID','woocommerce-products-slider'),
                'details'	=> __('You can display custom product by ids.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $wcps_product_ids,
                'default'		=> '',
                'placeholder'		=> '1,4,2',
            );

            $settings_tabs_field->generate_field($args);












            ?>

        </div>

        <?php






    }
}






















add_action('wcps_metabox_content_slider_options', 'wcps_metabox_content_slider_options',10, 2);

if(!function_exists('wcps_metabox_content_slider_options')) {
    function wcps_metabox_content_slider_options($tab, $post_id){


        $settings_tabs_field = new settings_tabs_field();

        $wcps_options = get_post_meta( $post_id, 'wcps_options', true );
        $slider_option = isset($wcps_options['slider']) ? $wcps_options['slider'] : array();

        $slider_column_large = isset($slider_option['column_large']) ? $slider_option['column_large'] : 3;
        $slider_column_medium = isset($slider_option['column_medium']) ? $slider_option['column_medium'] : 2;
        $slider_column_small = isset($slider_option['column_small']) ? $slider_option['column_small'] : 1;


        $slider_slide_speed = isset($slider_option['slide_speed']) ? $slider_option['slide_speed'] : 1000;
        $slider_pagination_speed = isset($slider_option['pagination_speed']) ? $slider_option['pagination_speed'] : 1200;


        $slider_auto_play = isset($slider_option['auto_play']) ? $slider_option['auto_play'] : 'true';
        $auto_play_speed = isset($slider_option['auto_play_speed']) ? $slider_option['auto_play_speed'] : 1500;
        $auto_play_timeout = isset($slider_option['auto_play_timeout']) ? $slider_option['auto_play_timeout'] : 2000;

        $slider_rewind = isset($slider_option['rewind']) ? $slider_option['rewind'] : 'true';
        $slider_loop = isset($slider_option['loop']) ? $slider_option['loop'] : 'true';
        $slider_center = isset($slider_option['center']) ? $slider_option['center'] : 'true';
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
        $slider_rtl = isset($slider_option['rtl']) ? $slider_option['rtl'] : 'false';
        $slider_lazy_load = isset($slider_option['lazy_load']) ? $slider_option['lazy_load'] : 'false';
        $slider_mouse_drag = isset($slider_option['mouse_drag']) ? $slider_option['mouse_drag'] : 'true';
        $slider_touch_drag = isset($slider_option['touch_drag']) ? $slider_option['touch_drag'] : 'true';

        ?>
        <div class="section">
            <div class="section-title"><?php echo __('Slider', 'team-pro'); ?></div>
            <p class="description section-description"><?php echo __('Customize slider settings.', 'team-pro'); ?></p>

            <?php

            $args = array(
                'id'		=> 'slider',
                'title'		=> __('Slider column count ','team-pro'),
                'details'	=> __('Set slider column count.','team-pro'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'column_large',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In desktop','team-pro'),
                        'details'	=> __('min-width: 1200px, ex: 3','team-pro'),
                        'type'		=> 'text',
                        'value'		=> $slider_column_large,
                        'default'		=> 3,
                        'placeholder'   => '3',
                    ),
                    array(
                        'id'		=> 'column_medium',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In tablet & small desktop','team-pro'),
                        'details'	=> __('min-width: 992px, ex: 2','team-pro'),
                        'type'		=> 'text',
                        'value'		=> $slider_column_medium,
                        'default'		=> 2,
                        'placeholder'   => '2',
                    ),
                    array(
                        'id'		=> 'column_small',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In mobile','team-pro'),
                        'details'	=> __('min-width: 576px, ex: 1','team-pro'),
                        'type'		=> 'text',
                        'value'		=> $slider_column_small,
                        'default'		=> 1,
                        'placeholder'   => '1',
                    ),
                ),

            );

            $settings_tabs_field->generate_field($args);




        $args = array(
            'id'		=> 'auto_play',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Auto play','team-pro'),
            'details'	=> __('Choose slider auto play.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_auto_play,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'auto_play_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Auto play speed','team-pro'),
            'details'	=> __('Set auto play speed, ex: 1500','team-pro'),
            'type'		=> 'text',
            'value'		=> $auto_play_speed,
            'default'		=> 1500,
            'placeholder'   => '1500',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'auto_play_timeout',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Auto play timeout','team-pro'),
            'details'	=> __('Set auto play timeout, ex: 2000','team-pro'),
            'type'		=> 'text',
            'value'		=> $auto_play_timeout,
            'default'		=> 2000,
            'placeholder'   => '2000',
            'is_error'   => ($auto_play_speed > $auto_play_timeout)? true : false,
            'error_details'   => __('Value should larger than <b>Auto play speed</b>'),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'rewind',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider rewind','team-pro'),
            'details'	=> __('Choose slider rewind.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_rewind,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'loop',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider loop','team-pro'),
            'details'	=> __('Choose slider loop.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_loop,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'center',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider center','team-pro'),
            'details'	=> __('Choose slider center.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_center,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'stop_on_hover',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider stop on hover','team-pro'),
            'details'	=> __('Choose stop on hover.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_stop_on_hover,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);




        $args = array(
            'id'		=> 'navigation',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation','team-pro'),
            'details'	=> __('Choose slider navigation.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_navigation,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'slide_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation slide speed','team-pro'),
            'details'	=> __('Set slide speed, ex: 1000','team-pro'),
            'type'		=> 'text',
            'value'		=> $slider_slide_speed,
            'default'		=> 1000,
            'placeholder'   => '1000',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'navigation_position',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation position','team-pro'),
            'details'	=> __('Choose slider navigation position.','team-pro'),
            'type'		=> 'select',
            'value'		=> $navigation_position,
            'default'		=> 'topright',
            'args'		=> array('topright'=>__('Top-right','team-pro'),'topleft'=>__('Top-left','team-pro'), 'bottomleft'=>__('Bottom left','team-pro'), 'bottomright'=>__('Bottom right','team-pro'),'middle'=>__('Middle','team-pro') , 'middle-fixed'=>__('Middle-fixed','team-pro')  ), //
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'navigation_style',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation style','team-pro'),
            'details'	=> __('Choose slider navigation style. classes <code>semi-round, round, flat, border</code>','team-pro'),
            'type'		=> 'text',
            'value'		=> $navigation_style,
            'default'		=> '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'navigation_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation background color','team-pro'),
            'details'	=> __('Set navigation background color','team-pro'),
            'type'		=> 'colorpicker',
            'value'		=> $navigation_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'navigation_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation text color','team-pro'),
            'details'	=> __('Set navigation text color','team-pro'),
            'type'		=> 'colorpicker',
            'value'		=> $navigation_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'pagination',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider dots','team-pro'),
            'details'	=> __('Choose slider dots at bottom.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_pagination,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'dots_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots background color','team-pro'),
            'details'	=> __('Set dots background color','team-pro'),
            'type'		=> 'colorpicker',
            'value'		=> $dots_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'dots_active_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots active/hover background color','team-pro'),
            'details'	=> __('Set dots active/hover background color','team-pro'),
            'type'		=> 'colorpicker',
            'value'		=> $dots_active_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'pagination_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots slide speed','team-pro'),
            'details'	=> __('Set dots slide speed, ex: 1200','team-pro'),
            'type'		=> 'text',
            'value'		=> $slider_pagination_speed,
            'default'		=> 1200,
            'placeholder'   => '1200',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'pagination_count',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider dots count','team-pro'),
            'details'	=> __('Choose slider dots count.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_pagination_count,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'rtl',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider rtl','team-pro'),
            'details'	=> __('Choose slider rtl.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_rtl,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'lazy_load',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider lazy load','team-pro'),
            'details'	=> __('Choose slider lazy load.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_lazy_load,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'touch_drag',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider touch drag','team-pro'),
            'details'	=> __('Choose slider touch drag.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_touch_drag,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'mouse_drag',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider mouse drag','team-pro'),
            'details'	=> __('Choose slider mouse drag.','team-pro'),
            'type'		=> 'select',
            'value'		=> $slider_mouse_drag,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','team-pro'), 'false'=>__('False','team-pro')),
        );

        $settings_tabs_field->generate_field($args);








            ?>
        </div>
        <?php
    }
}


add_action('wcps_metabox_content_shortcode', 'wcps_metabox_content_shortcode',10, 2);

if(!function_exists('wcps_metabox_content_shortcode')) {
    function wcps_metabox_content_shortcode($tab, $post_id){

        $settings_tabs_field = new settings_tabs_field();


        ?>
        <div class="section">
            <div class="section-title">Shortcodes</div>
            <p class="description section-description">Simply copy these shortcode and user under post or page content</p>


            <?php
            ob_start();
            ?>

            <div class="copy-to-clipboard">
                <input type="text" value="[wcps id='<?php echo $post_id; ?>']"> <span class="copied">Copied</span>
                <p class="description">You can use this shortcode under post content</p>
            </div>

            <div class="copy-to-clipboard">
                To avoid conflict:<br>
                <input type="text" value="[wcps_pickplugins id='<?php echo $post_id; ?>']"> <span
                    class="copied">Copied</span>
                <p class="description">To avoid conflict with 3rd party shortcode also used same <code>[wcps]</code>You can use this shortcode under post content</p>
            </div>

            <div class="copy-to-clipboard">
                <textarea cols="50" rows="2" style="background:#bfefff" onClick="this.select();"><?php echo '<?php echo do_shortcode("[wcps id='; echo "'" . $post_id . "']"; echo '"); ?>'; ?></textarea> <span class="copied">Copied</span>
                <p class="description">PHP Code, you can use under theme .php files.</p>
            </div>

            <div class="copy-to-clipboard">
                <textarea cols="50" rows="2" style="background:#bfefff"
                          onClick="this.select();"><?php echo '<?php echo do_shortcode("[wcps_pickplugins id=';
                    echo "'" . $post_id . "']";
                    echo '"); ?>'; ?></textarea> <span class="copied">Copied</span>
                <p class="description">To avoid conflict, PHP code you can use under theme .php files.</p>
            </div>

            <style type="text/css">
                .wcps-meta-box .copy-to-clipboard {
                }

                .wcps-meta-box .copy-to-clipboard .copied {
                    display: none;
                    background: #e5e5e5;
                    padding: 4px 10px;
                    line-height: normal;
                }
            </style>

            <script>
                jQuery(document).ready(function ($) {
                    $(document).on('click', '.wcps-meta-box .copy-to-clipboard input, .wcps-meta-box .copy-to-clipboard textarea', function () {
                        $(this).focus();
                        $(this).select();
                        document.execCommand('copy');
                        $(this).parent().children('.copied').fadeIn().fadeOut(2000);
                    })
                })
            </script>
            <?php
            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_shortcodes',
                'title' => __('Get shortcode', 'woocommerce-products-slider'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);


            ?>
        </div>
        <?php
    }
}













add_action('wcps_metaboxe_save','wcps_metaboxe_save');

function wcps_metaboxe_save($job_id){

    $wcps_options = isset($_POST['wcps_options']) ? stripslashes_deep($_POST['wcps_options']) : '';
    update_post_meta($job_id, 'wcps_options', $wcps_options);


//    $job_bm_total_vacancies = isset($_POST['job_bm_total_vacancies']) ? sanitize_text_field($_POST['job_bm_total_vacancies']) : '';
//    update_post_meta($job_id, 'job_bm_total_vacancies', $job_bm_total_vacancies);


}






