<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



add_action('wcps_meta_tab_content_custom_scripts', 'wcps_meta_tab_content_custom_scripts',10, 2);

if(!function_exists('wcps_meta_tab_content_custom_scripts')) {
    function wcps_meta_tab_content_custom_scripts($tab, $post_id){


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
                'title'		=> __('Custom CSS','post-grid'),
                'details'	=> __('Add your own CSS..','post-grid'),
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
















add_action('wcps_meta_tab_content_elements', 'wcps_meta_tab_content_elements',10, 2);

if(!function_exists('wcps_meta_tab_content_elements')) {
    function wcps_meta_tab_content_elements($tab, $post_id){


        $settings_tabs_field = new settings_tabs_field();



	$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );

	if(empty($wcps_items_thumb_size)){$wcps_items_thumb_size= 'large'; }



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



        ?>
        <div class="section">
            <div class="section-title">Style</div>
            <p class="description section-description">Customize style settings.</p>


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
                                <label><input <?php echo $checked; ?> type="checkbox" class="wcps_grid_items_hide" name="wcps_grid_items_hide[<?php echo $item_key; ?>]" value="1" />Hide on front-end</label>

                            </div> <!-- .header -->
                       		<div class="options">
                        <?php

						if($item_key == 'thumb'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider Thumbnail Size', wcps_textdomain);?></p>
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
                                <p class="option-title"><?php _e('Items thumbnail link\'s to', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_link_to" >
                                    <option value="product" <?php if($wcps_items_thumb_link_to=="product")echo "selected"; ?>><?php _e('Product', wcps_textdomain);?></option>
                                    <option value="category" <?php if($wcps_items_thumb_link_to=="category")echo "selected"; ?>><?php _e('Category', wcps_textdomain);?></option>
                                    <option value="_product_url" <?php if($wcps_items_thumb_link_to=="_product_url")echo "selected"; ?>><?php _e('External/Affiliate product link', wcps_textdomain);?></option>
                                    <option value="meta_value" <?php if($wcps_items_thumb_link_to=="meta_value")echo "selected"; ?>><?php _e('Meta Value', wcps_textdomain);?></option>
                                </select>

                                <p class="option-info">Meta Key</p>
                                <input type="text" name="wcps_items_thumb_link_to_meta_value" placeholder="meta_key" id="wcps_items_thumb_link_to_meta_value" value="<?php echo $wcps_items_thumb_link_to_meta_value; ?>" />

                                <p class="option-info">Link target</p>
                                <select name="wcps_items_thumb_link_target" >
                                    <option value="_blank" <?php if($wcps_items_thumb_link_target=="_blank")echo "selected"; ?>><?php _e('_blank', wcps_textdomain);?></option>
                                    <option value="_self" <?php if($wcps_items_thumb_link_target=="_self")echo "selected"; ?>><?php _e('_self', wcps_textdomain);?></option>
                                    <option value="_parent" <?php if($wcps_items_thumb_link_target=="_parent")echo "selected"; ?>><?php _e('_parent', wcps_textdomain);?></option>
                                    <option value="_top" <?php if($wcps_items_thumb_link_target=="_top")echo "selected"; ?>><?php _e('_top', wcps_textdomain);?></option>



                                </select>


                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Slider thumb max hieght(px)', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_thumb_max_hieght" placeholder="14px" id="wcps_items_thumb_max_hieght" value="<?php echo $wcps_items_thumb_max_hieght; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Display Thumbnail Zoom button', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <select name="wcps_items_thumb_zoom" >
                                <option value="no" <?php if($wcps_items_thumb_zoom=="no")echo "selected"; ?>><?php _e('No', wcps_textdomain);?></option>
                                <option value="yes" <?php if($wcps_items_thumb_zoom=="yes")echo "selected"; ?>><?php _e('Yes', wcps_textdomain);?></option>

                                </select>
                            </div>


				<div class="option-box">
                    <p class="option-title"><?php _e('Empty Thumbnail', wcps_textdomain);?></p>
                    <p class="option-info"><?php _e('Custom thumbnail image url', wcps_textdomain);?></p>
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
                                <p class="option-title"><?php _e('Items Add to cart button Style', wcps_textdomain);?></p>
                                <p class="option-info"><?php _e('You can hide items Add to cart button on slider.', wcps_textdomain);?></p>
                                <select name="wcps_cart_style" >
                                <option value="default" <?php if($wcps_cart_style=="default")echo "selected"; ?>><?php _e('Default', wcps_textdomain);?></option>
                                <option value="custom" <?php if($wcps_cart_style=="custom")echo "selected"; ?>><?php _e('Custom', wcps_textdomain);?></option>
                                </select>
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart custom text', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_text" class="" id="wcps_cart_text" value="<?php echo $wcps_cart_text; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Background Color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_bg" class="wcps_color" id="wcps_cart_bg" value="<?php echo $wcps_cart_bg; ?>" />
                            </div>





                            <div class="option-box">
                                <p class="option-title"><?php _e('Add to cart Text Color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_cart_text_color" class="wcps_color"  id="wcps_cart_text_color" value="<?php echo $wcps_cart_text_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Cart Text Align', wcps_textdomain);?></p>
                                <select name="wcps_cart_text_align" >
                                <option value="left" <?php if($wcps_cart_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_cart_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>
                                <option value="center" <?php if($wcps_cart_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>



                            <div class="option-box">
                                <p class="option-title"><?php _e('Display quantity', wcps_textdomain);?></p>
                                <select name="wcps_cart_display_quantity" >
                                    <option value="yes" <?php if($wcps_cart_display_quantity=="yes")echo "selected"; ?>><?php _e('Yes', wcps_textdomain);?></option>
                                    <option value="no" <?php if($wcps_cart_display_quantity=="no")echo "selected"; ?>><?php _e('No', wcps_textdomain);?></option>

                                </select>

                            </div>
























							<?php


							}
						elseif($item_key == 'sale'){

							?>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Sale marker icon url', wcps_textdomain);?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_sale_icon_url" placeholder="" id="wcps_sale_icon_url" value="<?php echo $wcps_sale_icon_url; ?>" />
                            </div>



                            <?php


							}


						elseif($item_key == 'title'){

							?>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_color" class="wcps_color" id="wcps_items_title_color" value="<?php echo $wcps_items_title_color; ?>" />
                            </div>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Font Size', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_title_font_size" placeholder="14px" id="wcps_items_title_font_size" value="<?php echo $wcps_items_title_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Title Text Align', wcps_textdomain);?></p>


                                <select name="wcps_items_title_text_align" >
                                <option value="left" <?php if($wcps_items_title_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_items_title_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>
                                <option value="center" <?php if($wcps_items_title_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>

                            <?php

							}

						elseif($item_key == 'featured'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Featured marker icon url', wcps_textdomain);?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_featured_icon_url" placeholder="" id="wcps_featured_icon_url" value="<?php echo $wcps_featured_icon_url; ?>" />
                            </div>


                            <?php
							}
						elseif($item_key == 'price'){
							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Price format on slider', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <select name="wcps_total_items_price_format">
                                    <option value="full" <?php if(($wcps_total_items_price_format=="full")) echo "selected"; ?> ><?php _e('Full Format', wcps_textdomain);?></option>
                                    <option value="sale" <?php if(($wcps_total_items_price_format=="sale")) echo "selected"; ?> ><?php _e('Sale price', wcps_textdomain);?></option>
                                    <option value="regular" <?php if(($wcps_total_items_price_format=="regular")) echo "selected"; ?> ><?php _e('Regular price', wcps_textdomain);?></option>
                                </select>

                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Price Color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_color" class="wcps_color" id="wcps_items_price_color" value="<?php echo $wcps_items_price_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items price Font Size', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_price_font_size" placeholder="14px" id="wcps_items_price_font_size" value="<?php echo $wcps_items_price_font_size; ?>" />
                            </div>



                            <div class="option-box">
                                <p class="option-title"><?php _e('Price Text Align', wcps_textdomain);?></p>


                                <select name="wcps_items_price_text_align" >
                                <option value="left" <?php if($wcps_items_price_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_items_price_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>
                                <option value="center" <?php if($wcps_items_price_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>





                            <?php


							}

						elseif($item_key == 'rating'){

							?>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Rating Text Align', wcps_textdomain);?></p>


                                <select name="wcps_ratings_text_align" >
                                <option value="left" <?php if($wcps_ratings_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_ratings_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>
                                <option value="center" <?php if($wcps_ratings_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items ratings Font Size', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_font_size" placeholder="14px" id="wcps_items_ratings_font_size" value="<?php echo $wcps_items_ratings_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Ratings Color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_ratings_color" class="wcps_color" id="wcps_items_ratings_color" value="<?php echo $wcps_items_ratings_color; ?>" />
                            </div>




                            <?php

							}


						elseif($item_key == 'excerpt'){

							?>
                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt word count', wcps_textdomain);?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_count" placeholder="30" id="wcps_items_excerpt_count" value="<?php echo $wcps_items_excerpt_count; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt read more text', wcps_textdomain);?></p>
                                <p class="option-info"></p>
								<input type="text" name="wcps_items_excerpt_read_more" placeholder="View product." id="wcps_items_excerpt_read_more" value="<?php echo $wcps_items_excerpt_read_more; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font Size', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_excerpt_font_size" placeholder="14px" id="wcps_items_excerpt_font_size" value="<?php echo $wcps_items_excerpt_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Excerpt Text Align', wcps_textdomain);?></p>


                                <select name="wcps_items_excerpt_text_align" >
                                <option value="left" <?php if($wcps_items_excerpt_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_items_excerpt_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>

                                <option value="center" <?php if($wcps_items_excerpt_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Excerpt Font color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_excerpt_font_color" placeholder="14px" id="wcps_items_excerpt_font_color" value="<?php echo $wcps_items_excerpt_font_color; ?>" />
                            </div>




                            <?php

							}






						elseif($item_key=='category'){
							?>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font Size', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" name="wcps_items_cat_font_size" placeholder="14px" id="wcps_items_cat_font_size" value="<?php echo $wcps_items_cat_font_size; ?>" />
                            </div>


                            <div class="option-box">
                                <p class="option-title"><?php _e('Category Text Align', wcps_textdomain);?></p>


                                <select name="wcps_items_cat_text_align" >
                                <option value="left" <?php if($wcps_items_cat_text_align=="left")echo "selected"; ?>><?php _e('Left', wcps_textdomain);?></option>
                                <option value="right" <?php if($wcps_items_cat_text_align=="right")echo "selected"; ?>><?php _e('Right', wcps_textdomain);?></option>
                                <option value="center" <?php if($wcps_items_cat_text_align=="center")echo "selected"; ?>><?php _e('Center', wcps_textdomain);?></option>
                                </select>

                            </div>




                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category Font color', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" class="wcps_color" name="wcps_items_cat_font_color" placeholder="14px" id="wcps_items_cat_font_color" value="<?php echo $wcps_items_cat_font_color; ?>" />
                            </div>

                            <div class="option-box">
                                <p class="option-title"><?php _e('Items Category separator', wcps_textdomain);?></p>
                                <p class="option-info"></p>
                                <input type="text" class="" name="wcps_items_cat_separator" placeholder="," id="wcps_items_cat_separator" value="<?php echo $wcps_items_cat_separator; ?>" />
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
                'title' => __('Elements', 'post-grid'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);







    }
}


add_action('wcps_meta_tab_content_style', 'wcps_meta_tab_content_style',10, 2);

if(!function_exists('wcps_meta_tab_content_style')) {
    function wcps_meta_tab_content_style($tab, $post_id){



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
                'title'		=> __('Slider themes','post-grid'),
                'details'	=> __('Choose slider product themes.','post-grid'),
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

            $args = array(
                'id'		=> 'wcps_ribbon_name',
                //'parent'		=> '',
                'title'		=> __('Slider ribbon','post-grid'),
                'details'	=> __('Choose slider ribbon.','post-grid'),
                'type'		=> 'radio_image',
                'value'		=> $wcps_ribbon_name,
                'default'		=> 'OR',
                'args'		=> $ribbons_arr,
            );

            echo $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'wcps_ribbon_custom',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Custom ribbon','post-grid'),
                'details'	=> __('Choose custom ribbon, image source url.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_ribbon_custom,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_items_padding',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Items padding','post-grid'),
                'details'	=> __('Set custom padding for item.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_items_padding,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_items_bg_color',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Item background color','post-grid'),
                'details'	=> __('Set custom background color for item.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_items_bg_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);








            $args = array(
                'id'		=> 'wcps_container_padding',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container Padding','post-grid'),
                'details'	=> __('Set custom padding for container.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_container_padding,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wcps_container_bg_color',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container background color','post-grid'),
                'details'	=> __('Set custom background color for container.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_container_bg_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_bg_img',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Container background image','post-grid'),
                'details'	=> __('Set custom background image for container.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_bg_img,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            ?>


        </div>
            <?php
    }
}































add_action('wcps_meta_tab_content_query_product', 'wcps_meta_tab_content_query_product',10, 2);

if(!function_exists('wcps_meta_tab_content_query_product')) {
    function wcps_meta_tab_content_query_product($tab, $post_id){

        $settings_tabs_field = new settings_tabs_field();

        $wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );
        $wcps_meta_query = get_post_meta( $post_id, 'wcps_meta_query', true );
        if(empty($wcps_meta_query)){$wcps_meta_query = array(); }

        $wcps_meta_query_relation = get_post_meta( $post_id, 'wcps_meta_query_relation', true );
        $wcps_more_query = get_post_meta( $post_id, 'wcps_more_query', true );
        $wcps_query_order = get_post_meta( $post_id, 'wcps_query_order', true );
        $wcps_query_orderby = get_post_meta( $post_id, 'wcps_query_orderby', true );


        $wcps_hide_out_of_stock = get_post_meta( $post_id, 'wcps_hide_out_of_stock', true );
        $wcps_product_featured = get_post_meta( $post_id, 'wcps_product_featured', true );
        $wcps_product_on_sale = get_post_meta( $post_id, 'wcps_product_on_sale', true );
        $wcps_product_only_discounted = get_post_meta( $post_id, 'wcps_product_only_discounted', true );
        $wcps_product_best_selling = get_post_meta( $post_id, 'wcps_product_best_selling', true );
        $wcps_product_filter_by = get_post_meta( $post_id, 'wcps_product_filter_by', true );
        $wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );
        $wcps_product_sku = get_post_meta( $post_id, 'wcps_product_sku', true );
        $wcps_upsells_crosssells = get_post_meta( $post_id, 'wcps_upsells_crosssells', true );



        ?>
        <div class="section">
            <div class="section-title">Query Products</div>
            <p class="description section-description">Setup product query settings.</p>


            <?php

            $args = array(
                'id'		=> 'wcps_total_items',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Max number of product','post-grid'),
                'details'	=> __('Set custom number you want to display maximum number of product','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_total_items,
                'default'		=> '10',
            );

            $settings_tabs_field->generate_field($args);



            ob_start();
            echo wcps_get_categories(get_the_ID());
            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_categories',
                'title' => __('Product categories & terms', 'post-grid'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);



            ob_start();
            ?>
            <div class="meta-query-list expandable">
                <?php
                echo wcps_meta_query_args($wcps_meta_query);
                ?>
            </div>
            <div class="button add-meta-query"><?php _e('Add more', wcps_textdomain); ?></div>

            <script>
                jQuery(document).ready(function($)
                {
                    $( ".meta-query-list" ).sortable({revert: "invalid", handle: '.header'});

                })
            </script>
            <?php
            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_meta_query',
                'title' => __('Product meta query', 'post-grid'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_meta_query_relation',
                //'parent'		=> '',
                'title'		=> __('Meta query relation','post-grid'),
                'details'	=> __('Set meta query relation.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_meta_query_relation,
                'default'		=> 'OR',
                'args'		=> array(
                    'OR'=>__('OR','post-grid'),
                    'AND'=>__('AND','post-grid'),



                ),
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_query_order',
                //'parent'		=> '',
                'title'		=> __('Query order','post-grid'),
                'details'	=> __('Set query order.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_query_order,
                'default'		=> 'DESC',
                'args'		=> array(
                    'DESC'=>__('Descending','post-grid'),
                    'ASC'=>__('Ascending','post-grid'),



                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_query_orderby',
                //'parent'		=> '',
                'title'		=> __('Query orderby','post-grid'),
                'details'	=> __('Set query orderby.','post-grid'),
                'type'		=> 'select',
                'multiple'		=> true,
                'value'		=> $wcps_query_orderby,
                'default'		=> array('none'),
                'args'		=> array(
                    'none'=>__('None','post-grid'),
                    'ID'=>__('ID','post-grid'),
                    'date'=>__('date','post-grid'),
                    'rand'=>__('rand','post-grid'),
                    'comment_count'=>__('comment_count','post-grid'),
                    'author'=>__('author','post-grid'),
                    'title'=>__('title','post-grid'),
                    'type'=>__('type','post-grid'),
                    'menu_order'=>__('menu order','post-grid'),
                    'meta_value_num'=>__('meta value number','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);








            $args = array(
                'id'		=> 'wcps_more_query',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('More query parameter','post-grid'),
                'details'	=> __('Set custom query parameter.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $wcps_more_query,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_hide_out_of_stock',
                //'parent'		=> '',
                'title'		=> __('Hide out of stock items','post-grid'),
                'details'	=> __('You can hide out of stock items from query.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_hide_out_of_stock,
                'default'		=> 'no_check',
                'args'		=> array(
                    'yes'=>__('Yes','post-grid'),
                    'no'=>__('No','post-grid'),
                    'no_check'=>__('No Check','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_product_featured',
                //'parent'		=> '',
                'title'		=> __('Featured product display','post-grid'),
                'details'	=> __('You include/exclude featured product on query.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_featured,
                'default'		=> 'no_check',
                'args'		=> array(
                    'yes'=>__('Yes','post-grid'),
                    'no'=>__('No','post-grid'),
                    'no_check'=>__('No Check','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_product_on_sale',
                //'parent'		=> '',
                'title'		=> __('On Sale Product display','post-grid'),
                'details'	=> __('You include/exclude on sale product on query.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_on_sale,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Yes','post-grid'),
                    'no'=>__('No','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_product_only_discounted',
                //'parent'		=> '',
                'title'		=> __('Only discounted','post-grid'),
                'details'	=> __('You include/exclude discounted product on query.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_only_discounted,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Yes','post-grid'),
                    'no'=>__('No','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_product_best_selling',
                //'parent'		=> '',
                'title'		=> __('Best selling product display','post-grid'),
                'details'	=> __('You query best selling product on query.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_best_selling,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Yes','post-grid'),
                    'no'=>__('No','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_product_filter_by',
                //'parent'		=> '',
                'title'		=> __('Product filter by','post-grid'),
                'details'	=> __('Choose filter you want to display product.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_product_filter_by,
                'default'		=> 'no',
                'args'		=> array(
                    'none'=>__('None','post-grid'),
                    'top_rated'=>__('Top rated','post-grid'),
                    'featured_first'=>__('Featured product at first','post-grid'),

                ),
            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'wcps_product_ids',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Product display by Product ID','post-grid'),
                'details'	=> __('You can display custom product by ids.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_product_ids,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_product_sku',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Product display by SKU','post-grid'),
                'details'	=> __('You can display custom product by sku, use (,) comma separated','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_product_sku,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_upsells_crosssells',
                //'parent'		=> '',
                'title'		=> __('Product filter by','post-grid'),
                'details'	=> __('Choose filter you want to display product.','post-grid'),
                'type'		=> 'radio',
                'value'		=> $wcps_upsells_crosssells,
                'default'		=> 'no',
                'args'		=> array(
                    'none'=>__('None','post-grid'),
                    'upsells'=>__('Upsells','post-grid'),
                    'cross_sells'=>__('Cross-sells','post-grid'),
                    'both'=>__('Both','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);









            ?>

        </div>

        <?php






    }
}






















add_action('wcps_meta_tab_content_options', 'wcps_meta_tab_content_options',10, 2);

if(!function_exists('wcps_meta_tab_content_options')) {
    function wcps_meta_tab_content_options($tab, $post_id){

        $settings_tabs_field = new settings_tabs_field();

        $wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
        if(empty($wcps_column_number)){$wcps_column_number = 3; }

        $wcps_column_number_tablet = get_post_meta( $post_id, 'wcps_column_number_tablet', true );
        if(empty($wcps_column_number_tablet)){$wcps_column_number_tablet = 2;}

        $wcps_column_number_mobile = get_post_meta( $post_id, 'wcps_column_number_mobile', true );
        if(empty($wcps_column_number_mobile)){$wcps_column_number_mobile = 1;}

        $wcps_rows_enable = get_post_meta( $post_id, 'wcps_rows_enable', true );


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
        $wcps_auto_play_speed = get_post_meta( $post_id, 'wcps_auto_play_speed', true );
        $wcps_auto_play_timeout = get_post_meta( $post_id, 'wcps_auto_play_timeout', true );
        $wcps_slide_speed = get_post_meta( $post_id, 'wcps_slide_speed', true );
        $wcps_pagination_slide_speed = get_post_meta( $post_id, 'wcps_pagination_slide_speed', true );

        $wcps_slideBy = get_post_meta( $post_id, 'wcps_slideBy', true );
        $wcps_rewind = get_post_meta( $post_id, 'wcps_rewind', true );
        $wcps_loop = get_post_meta( $post_id, 'wcps_loop', true );
        $wcps_center = get_post_meta( $post_id, 'wcps_center', true );
        $wcps_stop_on_hover = get_post_meta( $post_id, 'wcps_stop_on_hover', true );
        $wcps_slider_navigation = get_post_meta( $post_id, 'wcps_slider_navigation', true );
        $wcps_slider_navigation_position = get_post_meta( $post_id, 'wcps_slider_navigation_position', true );
        $wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
        $wcps_slider_pagination_bg = get_post_meta( $post_id, 'wcps_slider_pagination_bg', true );
        $wcps_slider_pagination_text_color = get_post_meta( $post_id, 'wcps_slider_pagination_text_color', true );
        $wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );

        $wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
        $wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );
        $wcps_slider_rtl = get_post_meta( $post_id, 'wcps_slider_rtl', true );
        $wcps_slider_animateout = get_post_meta( $post_id, 'wcps_slider_animateout', true );
        $wcps_slider_animatein = get_post_meta( $post_id, 'wcps_slider_animatein', true );


        ?>
        <div class="section">
        <div class="section-title">Options</div>
        <p class="description section-description">Customize slider options here.</p>
            <?php


            ob_start();

            ?>
            <div><?php _e('In Destop: (min:1000px and max)', wcps_textdomain);?></div>
            <input type="text" placeholder="4"   name="wcps_column_number" value="<?php echo $wcps_column_number;  ?>" />

            <div><?php _e('In Tablet & Small Desktop: (900px max width)', wcps_textdomain);?></div>
            <input type="text" placeholder="2"  name="wcps_column_number_tablet" value="<?php echo $wcps_column_number_tablet;  ?>" />

            <div><?php _e('In Mobile: (479px max width)', wcps_textdomain);?></div>
            <input type="text" placeholder="1"  name="wcps_column_number_mobile" value="<?php echo $wcps_column_number_mobile;  ?>" />
            <?php


            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_shortcodes',
                'title' => __('Slider column number', 'post-grid'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_rows_enable',
                //'parent'		=> '',
                'title'		=> __('Enable slider row','post-grid'),
                'details'	=> __('Enable or disable slider rows.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_rows_enable,
                'default'		=> 'no',
                'args'		=> array(
                    'no'=>__('No','post-grid'),
                    'yes'=>__('Yes','post-grid'),



                ),
            );

            $settings_tabs_field->generate_field($args);





            ob_start();

            ?>
            <div><?php _e('In Desktop: (min:1000px and max)', wcps_textdomain);?></div>
            <input type="text" placeholder="2"   name="wcps_rows_desktop" value="<?php echo $wcps_rows_desktop;  ?>" />

            <div><?php _e('In Tablet & Small Desktop: (900px max width)', wcps_textdomain);?></div>
            <input type="text" placeholder="1"  name="wcps_rows_tablet" value="<?php echo $wcps_rows_tablet;  ?>" />

            <div><?php _e('In Mobile: (479px max width)', wcps_textdomain);?></div>
            <input type="text" placeholder="1"  name="wcps_rows_mobile" value="<?php echo $wcps_rows_mobile;  ?>" />
            <?php


            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_rows',
                'title' => __('Slider row number', 'post-grid'),
                'details' => '',
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_auto_play',
                //'parent'		=> '',
                'title'		=> __('Slider auto play','post-grid'),
                'details'	=> __('Enable or disable slider autoplay.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_auto_play,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),



                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_auto_play_speed',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Slider auto play speed','post-grid'),
                'details'	=> __('Custom value for auto play speed, 1000 = 1 second','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_auto_play_speed,
                'default'		=> '500',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_auto_play_timeout',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Slider auto play timeout','post-grid'),
                'details'	=> __('Custom value for auto play timeout, 1000 = 1 second','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_auto_play_timeout,
                'default'		=> '600',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_slide_speed',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Slide speed','post-grid'),
                'details'	=> __('Custom value for slide speed, 1000 = 1 second','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_slide_speed,
                'default'		=> '600',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_pagination_slide_speed',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Pagination Slide Speed','post-grid'),
                'details'	=> __('Custom value for pagination slide speed, 1000 = 1 second','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_pagination_slide_speed,
                'default'		=> '600',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wcps_slideBy',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Slider slideby count','post-grid'),
                'details'	=> __('Custom value for slideby','post-grid'),
                'type'		=> 'text',
                'value'		=> $wcps_slideBy,
                'default'		=> '1',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_rewind',
                //'parent'		=> '',
                'title'		=> __('Slider rewind','post-grid'),
                'details'	=> __('Enable or disable slider rewind.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_rewind,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wcps_loop',
                //'parent'		=> '',
                'title'		=> __('Slider loop','post-grid'),
                'details'	=> __('Enable or disable slider loop.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_loop,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_center',
                //'parent'		=> '',
                'title'		=> __('Slider center','post-grid'),
                'details'	=> __('Enable or disable slider center. please set odd number of slider column to work slider center.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_center,
                'default'		=> 'false',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_stop_on_hover',
                //'parent'		=> '',
                'title'		=> __('Slider stop on hover','post-grid'),
                'details'	=> __('Enable or disable slider stop on hover.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_stop_on_hover,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_slider_navigation',
                //'parent'		=> '',
                'title'		=> __('Slider navigation at top','post-grid'),
                'details'	=> __('Enable or disable slider navigation at Top.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_navigation,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_slider_navigation_position',
                //'parent'		=> '',
                'title'		=> __('Slider navigation position','post-grid'),
                'details'	=> __('Choose slider navigation position.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_navigation_position,
                'default'		=> 'true',
                'args'		=> array(
                    'topright'=>__('Top Right','post-grid'),
                    'middle'=>__('Middle','post-grid'),
                    'middle-fixed'=>__('Middle fixed','post-grid'),

                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_slider_pagination',
                //'parent'		=> '',
                'title'		=> __('Slider Pagination at bottom','post-grid'),
                'details'	=> __('Enable or disable slider Pagination at bottom.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_navigation,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'wcps_slider_pagination_bg',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Pagination background color','post-grid'),
                'details'	=> __('Choose custom pagination background color','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_slider_pagination_bg,
                'default'		=> '#ddd',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_slider_pagination_text_color',
                //'parent'		=> 'post_grid_meta_options',
                'title'		=> __('Pagination text color','post-grid'),
                'details'	=> __('Choose custom pagination text color','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $wcps_slider_pagination_text_color,
                'default'		=> '#999',
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_slider_pagination_count',
                //'parent'		=> '',
                'title'		=> __('Slider pagination number counting','post-grid'),
                'details'	=> __('Enable or disable slider pagination number counting.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_pagination_count,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);




            $args = array(
                'id'		=> 'wcps_slider_touch_drag',
                //'parent'		=> '',
                'title'		=> __('Slider touch drag enable','post-grid'),
                'details'	=> __('Enable or disable slider touch drag.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_touch_drag,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_slider_mouse_drag',
                //'parent'		=> '',
                'title'		=> __('Slider mouse drag enable','post-grid'),
                'details'	=> __('Enable or disable slider mouse drag.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_mouse_drag,
                'default'		=> 'true',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_slider_rtl',
                //'parent'		=> '',
                'title'		=> __('RTL enable','post-grid'),
                'details'	=> __('Enable or disable slider RTL.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_rtl,
                'default'		=> 'false',
                'args'		=> array(
                    'true'=>__('True','post-grid'),
                    'false'=>__('False','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wcps_slider_animateout',
                //'parent'		=> '',
                'title'		=> __('Animate Out','post-grid'),
                'details'	=> __('Choose animation on out.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_animateout,
                'default'		=> 'false',
                'args'		=> array(
                    'fadeOut'=>__('fadeOut','post-grid'),
                    'bounce'=>__('bounce','post-grid'),
                    'flash'=>__('flash','post-grid'),
                    'pulse'=>__('pulse','post-grid'),
                    'shake'=>__('shake','post-grid'),
                    'swing'=>__('swing','post-grid'),
                    'tada'=>__('tada','post-grid'),
                    'wobble'=>__('wobble','post-grid'),
                    'flip'=>__('flip','post-grid'),
                    'flipInX'=>__('flipInX','post-grid'),
                    'flipInY'=>__('flipInY','post-grid'),
                    'fadeIn'=>__('fadeIn','post-grid'),
                    'fadeInDown'=>__('fadeInDown','post-grid'),
                    'fadeInUp'=>__('fadeInUp','post-grid'),
                    'bounceIn'=>__('bounceIn','post-grid'),
                    'bounceInDown'=>__('bounceInDown','post-grid'),
                    'bounceInUp'=>__('bounceInUp','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wcps_slider_animatein',
                //'parent'		=> '',
                'title'		=> __('Animate Out','post-grid'),
                'details'	=> __('Choose animation on out.','post-grid'),
                'type'		=> 'select',
                'value'		=> $wcps_slider_animatein,
                'default'		=> 'false',
                'args'		=> array(
                    'fadeOut'=>__('fadeOut','post-grid'),
                    'bounce'=>__('bounce','post-grid'),
                    'flash'=>__('flash','post-grid'),
                    'pulse'=>__('pulse','post-grid'),
                    'shake'=>__('shake','post-grid'),
                    'swing'=>__('swing','post-grid'),
                    'tada'=>__('tada','post-grid'),
                    'wobble'=>__('wobble','post-grid'),
                    'flip'=>__('flip','post-grid'),
                    'flipInX'=>__('flipInX','post-grid'),
                    'flipInY'=>__('flipInY','post-grid'),
                    'fadeIn'=>__('fadeIn','post-grid'),
                    'fadeInDown'=>__('fadeInDown','post-grid'),
                    'fadeInUp'=>__('fadeInUp','post-grid'),
                    'bounceIn'=>__('bounceIn','post-grid'),
                    'bounceInDown'=>__('bounceInDown','post-grid'),
                    'bounceInUp'=>__('bounceInUp','post-grid'),


                ),
            );

            $settings_tabs_field->generate_field($args);











            ?>
        </div>
        <?php
    }
}


add_action('wcps_meta_tab_content_shortcode', 'wcps_meta_tab_content_shortcode',10, 2);

if(!function_exists('wcps_meta_tab_content_shortcode')) {
    function wcps_meta_tab_content_shortcode($tab, $post_id){

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
                'title' => __('Get shortcode', 'post-grid'),
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