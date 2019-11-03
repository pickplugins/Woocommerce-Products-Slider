<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('wp_footer','wcps_builder_tools');

function wcps_builder_tools($post_id){

    $wcps_id = isset($_GET['wcps_id']) ? sanitize_text_field($_GET['wcps_id']) : 4;
    $post_id = $wcps_id;
    $wcps_builder_control = new wcps_builder_control();


    $wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
    if(empty($wcps_column_number)){$wcps_column_number = 2; }

    $wcps_column_number_tablet = get_post_meta( $post_id, 'wcps_column_number_tablet', true );
    if(empty($wcps_column_number_tablet)){$wcps_column_number_tablet = 2;}

    $wcps_column_number_mobile = get_post_meta( $post_id, 'wcps_column_number_mobile', true );
    if(empty($wcps_column_number_mobile)){$wcps_column_number_mobile = 1;}




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
    $wcps_slider_nav_icon = get_post_meta( $post_id, 'wcps_slider_nav_icon', true );

    $nav_bg_color = get_post_meta( $post_id, 'nav_bg_color', true );

    $wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
    $wcps_slider_pagination_bg = get_post_meta( $post_id, 'wcps_slider_pagination_bg', true );
    $wcps_slider_pagination_text_color = get_post_meta( $post_id, 'wcps_slider_pagination_text_color', true );
    $wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );

    $wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
    $wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );
    $wcps_slider_rtl = get_post_meta( $post_id, 'wcps_slider_rtl', true );
    $wcps_slider_animateout = get_post_meta( $post_id, 'wcps_slider_animateout', true );
    $wcps_slider_animatein = get_post_meta( $post_id, 'wcps_slider_animatein', true );
    $dot_active_bg_color = get_post_meta( $post_id, 'dot_active_bg_color', true );
    $nav_text_color = get_post_meta( $post_id, 'nav_text_color', true );


    ?>
    <div id="wcps-builder-tools">

        <form id="wcps-builder-control" method="" action="" enctype="multipart/form-data">

            <input type="hidden" readonly name="wcps_plugin_url" value="<?php echo wcps_plugin_url; ?>">
            <input type="hidden" readonly name="wcps_id" value="<?php echo $wcps_id; ?>">



<!--            <div class="control-group-tabs" data-width="3">-->
<!--                <div class="tab-navs">-->
<!--                    <div class="tab-nav active" data-panel="1">Nav 1</div>-->
<!--                    <div class="tab-nav" data-panel="2">Nav 2</div>-->
<!--                    <div class="tab-nav" data-panel="3">Nav 3</div>-->
<!---->
<!--                </div>-->
<!--                <div class="tab-panels">-->
<!--                    <div class="tab-panel panel-1 active">Panel 1</div>-->
<!--                    <div class="tab-panel panel-2">Panel 2</div>-->
<!--                    <div class="tab-panel panel-3">Panel 3</div>-->
<!--                </div>-->
<!--            </div>-->










            <div class="control-group ">
                <div class="control-group-header">Slider Options
                    <div class="icon">
                        <span class="expand"><i class="far fa-plus-square"></i></span>
                        <span class="collapse"><i class="far fa-minus-square"></i></span>
                    </div>
                </div>
                <div class="control-group-body">


<!--                    <div class="control-wrap">-->
<!--                        <div class="control-title">Control title</div>-->
<!--                        <div class="control-input">-->
<!---->
<!--                        </div>-->
<!--                    </div>-->








                    <?php


                    ob_start();

                    ?>
                    <div style="font-size: 13px;margin: 5px 0"><?php _e('In Desktop:', 'woocommerce-products-slider');?></div>
                    <input type="number" placeholder="4"   name="slider_options[wcps_column_number]" value="<?php echo $wcps_column_number;  ?>" />

                    <div style="font-size: 13px;margin: 5px 0"><?php _e('In Tablet:', 'woocommerce-products-slider');?></div>
                    <input type="number" placeholder="2"  name="slider_options[wcps_column_number_tablet]" value="<?php echo $wcps_column_number_tablet;  ?>" />

                    <div style="font-size: 13px;margin: 5px 0"><?php _e('In Mobile:', 'woocommerce-products-slider');?></div>
                    <input type="number" placeholder="1"  name="slider_options[wcps_column_number_mobile]" value="<?php echo $wcps_column_number_mobile;  ?>" />
                    <?php


                    $html = ob_get_clean();
                    $args = array(
                        'id' => 'wcps_shortcodes',
                        'title' => __('Column count', 'woocommerce-products-slider'),
                        'details' => 'Set custom number of column count',
                        'type' => 'custom_html',
                        'html' => $html,
                    );
                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_auto_play',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Auto play','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider autoplay.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_auto_play,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_auto_play_speed',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Auto play speed','woocommerce-products-slider'),
                        'details'	=> __('Custom value for auto play speed, 1000 = 1 second','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_auto_play_speed,
                        'default'		=> '1000',
                        'placeholder'		=> '1000',
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_auto_play_timeout',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Auto play timeout','woocommerce-products-slider'),
                        'details'	=> __('Custom value for auto play timeout, 1000 = 1 second','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_auto_play_timeout,
                        'default'		=> '1200',
                        'placeholder'		=> '1200',
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_slide_speed',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Slide speed','woocommerce-products-slider'),
                        'details'	=> __('Custom value for slide speed, 1000 = 1 second','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_slide_speed,
                        'default'		=> '600',
                        'placeholder'		=> '600',
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_pagination_slide_speed',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Pagination Slide Speed','woocommerce-products-slider'),
                        'details'	=> __('Custom value for pagination slide speed, 1000 = 1 second','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_pagination_slide_speed,
                        'default'		=> '600',
                        'placeholder'		=> '600',
                    );

                    $wcps_builder_control->generate_field($args);

                    $args = array(
                        'id'		=> 'wcps_slideBy',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Slideby count','woocommerce-products-slider'),
                        'details'	=> __('Custom value for slideby','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_slideBy,
                        'default'		=> '1',
                        'placeholder'		=> '1',
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_rewind',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Rewind','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider rewind.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_rewind,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);

                    $args = array(
                        'id'		=> 'wcps_loop',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Loop','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider loop.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_loop,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_center',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Center','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider center. please set odd number of slider column to work slider center.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_center,
                        'default'		=> 'false',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_stop_on_hover',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Stop on hover','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider stop on hover.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_stop_on_hover,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);






                    $args = array(
                        'id'		=> 'wcps_slider_touch_drag',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Touch drag enable','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider touch drag.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_slider_touch_drag,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_slider_mouse_drag',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Mouse drag enable','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider mouse drag.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_slider_mouse_drag,
                        'default'		=> 'true',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_slider_rtl',
                        'parent'		=> 'slider_options',
                        'title'		=> __('RTL enable','woocommerce-products-slider'),
                        'details'	=> __('Enable or disable slider RTL.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_slider_rtl,
                        'default'		=> 'false',
                        'args'		=> array(
                            'true'=>__('True','woocommerce-products-slider'),
                            'false'=>__('False','woocommerce-products-slider'),
                        ),
                    );

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_slider_animateout',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Animate Out','woocommerce-products-slider'),
                        'details'	=> __('Choose animation on out.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_slider_animateout,
                        'default'		=> 'false',
                        'args'		=> array(
                            'false'=>__('None','woocommerce-products-slider'),
                            'fadeOut'=>__('fadeOut','woocommerce-products-slider'),
                            'bounce'=>__('bounce','woocommerce-products-slider'),
                            'flash'=>__('flash','woocommerce-products-slider'),
                            'pulse'=>__('pulse','woocommerce-products-slider'),
                            'shake'=>__('shake','woocommerce-products-slider'),
                            'swing'=>__('swing','woocommerce-products-slider'),
                            'tada'=>__('tada','woocommerce-products-slider'),
                            'wobble'=>__('wobble','woocommerce-products-slider'),
                            'flip'=>__('flip','woocommerce-products-slider'),
                            'flipInX'=>__('flipInX','woocommerce-products-slider'),
                            'flipInY'=>__('flipInY','woocommerce-products-slider'),
                            'fadeIn'=>__('fadeIn','woocommerce-products-slider'),
                            'fadeInDown'=>__('fadeInDown','woocommerce-products-slider'),
                            'fadeInUp'=>__('fadeInUp','woocommerce-products-slider'),
                            'bounceIn'=>__('bounceIn','woocommerce-products-slider'),
                            'bounceInDown'=>__('bounceInDown','woocommerce-products-slider'),
                            'bounceInUp'=>__('bounceInUp','woocommerce-products-slider'),


                        ),
                    );

                    $wcps_builder_control->generate_field($args);


                    $args = array(
                        'id'		=> 'wcps_slider_animatein',
                        'parent'		=> 'slider_options',
                        'title'		=> __('Animate In','woocommerce-products-slider'),
                        'details'	=> __('Choose animation on out.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_slider_animatein,
                        'default'		=> 'false',
                        'args'		=> array(
                            'false'=>__('None','woocommerce-products-slider'),
                            'fadeOut'=>__('fadeOut','woocommerce-products-slider'),
                            'bounce'=>__('bounce','woocommerce-products-slider'),
                            'flash'=>__('flash','woocommerce-products-slider'),
                            'pulse'=>__('pulse','woocommerce-products-slider'),
                            'shake'=>__('shake','woocommerce-products-slider'),
                            'swing'=>__('swing','woocommerce-products-slider'),
                            'tada'=>__('tada','woocommerce-products-slider'),
                            'wobble'=>__('wobble','woocommerce-products-slider'),
                            'flip'=>__('flip','woocommerce-products-slider'),
                            'flipInX'=>__('flipInX','woocommerce-products-slider'),
                            'flipInY'=>__('flipInY','woocommerce-products-slider'),
                            'fadeIn'=>__('fadeIn','woocommerce-products-slider'),
                            'fadeInDown'=>__('fadeInDown','woocommerce-products-slider'),
                            'fadeInUp'=>__('fadeInUp','woocommerce-products-slider'),
                            'bounceIn'=>__('bounceIn','woocommerce-products-slider'),
                            'bounceInDown'=>__('bounceInDown','woocommerce-products-slider'),
                            'bounceInUp'=>__('bounceInUp','woocommerce-products-slider'),


                        ),
                    );

                    $wcps_builder_control->generate_field($args);




                    ?>









                    <div class="control-group ">
                        <div class="control-group-header">Navigation
                            <div class="icon">
                                <span class="expand"><i class="far fa-plus-square"></i></span>
                                <span class="collapse"><i class="far fa-minus-square"></i></span>
                            </div>
                        </div>
                        <div class="control-group-body">

                            <?php


                            $args = array(
                                'id'		=> 'wcps_slider_navigation',
                                'parent'		=> 'slider_options',
                                'title'		=> __('Navigation','woocommerce-products-slider'),
                                'details'	=> __('Enable or disable slider navigation at Top.','woocommerce-products-slider'),
                                'type'		=> 'select',
                                'value'		=> $wcps_slider_navigation,
                                'default'		=> 'true',
                                'args'		=> array(
                                    'true'=>__('True','woocommerce-products-slider'),
                                    'false'=>__('False','woocommerce-products-slider'),
                                ),
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'wcps_slider_navigation_position',
                                'parent'		=> 'slider_options',
                                'title'		=> __('Navigation position','woocommerce-products-slider'),
                                'details'	=> __('Choose slider navigation position.','woocommerce-products-slider'),
                                'type'		=> 'select',
                                'value'		=> $wcps_slider_navigation_position,
                                'default'		=> 'true',
                                'args'		=> array(
                                    'topleft'=>__('Top Left','woocommerce-products-slider'),
                                    'topright'=>__('Top Right','woocommerce-products-slider'),
                                    'bottomright'=>__('Bottom Right','woocommerce-products-slider'),
                                    'bottomleft'=>__('Bottom Left','woocommerce-products-slider'),
                                    'middle'=>__('Middle','woocommerce-products-slider'),

                                ),
                            );

                            $wcps_builder_control->generate_field($args);



                            $args = array(
                                'id'		=> 'wcps_slider_nav_icon',
                                'parent'		=> 'slider_options',
                                'control_group_class'		=> 'responsive',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Navigation icons','woocommerce-products-slider'),
                                'details'	=> __('Choose icons for navs.','woocommerce-products-slider'),
                                'type'		=> 'text_multi_predefine',
                                'value'		=> $wcps_slider_nav_icon,
                                'default'		=> array(
                                    'next'=>'<i class="fas fa-chevron-left"></i>',
                                    'prev'=>'<i class="fas fa-chevron-right"></i>',
                                ),
                                'args'		=> array(
                                    'next'=>array('name'=>'Next'),
                                    'prev'=>array('name'=>'Previous'),
                                ),
                            );

                            $wcps_builder_control->generate_field($args);

                            $args = array(
                                'id'		=> 'wcps_slider_pagination',
                                'parent'		=> 'slider_options',
                                'title'		=> __('Pagination at bottom','woocommerce-products-slider'),
                                'details'	=> __('Enable or disable slider Pagination at bottom.','woocommerce-products-slider'),
                                'type'		=> 'select',
                                'value'		=> $wcps_slider_navigation,
                                'default'		=> 'true',
                                'args'		=> array(
                                    'true'=>__('True','woocommerce-products-slider'),
                                    'false'=>__('False','woocommerce-products-slider'),
                                ),
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'nav_bg_color',
                                'parent'		=> 'slider_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Navs background color','woocommerce-products-slider'),
                                'details'	=> __('Choose custom background color for navigation.','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $nav_bg_color,
                                'default'		=> '#fff',
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'nav_text_color',
                                'parent'		=> 'slider_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Navs text color','woocommerce-products-slider'),
                                'details'	=> __('Choose custom text color for navigation.','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $nav_bg_color,
                                'default'		=> '#fff',
                            );

                            $wcps_builder_control->generate_field($args);




                            $args = array(
                                'id'		=> 'dot_bg_color',
                                'parent'		=> 'slider_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Dots background color','woocommerce-products-slider'),
                                'details'	=> __('Choose custom background color for dots','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $wcps_slider_pagination_bg,
                                'default'		=> '#ddd',
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'dot_active_bg_color',
                                'parent'		=> 'slider_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Active dot background color','woocommerce-products-slider'),
                                'details'	=> __('Choose custom background color for dots','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $dot_active_bg_color,
                                'default'		=> '#ddd',
                            );

                            $wcps_builder_control->generate_field($args);



//
//                            $args = array(
//                                'id'		=> 'wcps_slider_pagination_count',
//                                //'parent'		=> '',
//                                'title'		=> __('Pagination number counting','woocommerce-products-slider'),
//                                'details'	=> __('Enable or disable slider pagination number counting.','woocommerce-products-slider'),
//                                'type'		=> 'select',
//                                'value'		=> $wcps_slider_pagination_count,
//                                'default'		=> 'true',
//                                'args'		=> array(
//                                    'true'=>__('True','woocommerce-products-slider'),
//                                    'false'=>__('False','woocommerce-products-slider'),
//                                ),
//                            );
//
//                            $wcps_builder_control->generate_field($args);


                            ?>
                        </div>
                    </div>






                </div>


            </div>


            <div class="control-group ">
                <div class="control-group-header">Query Product
                    <div class="icon">
                        <span class="expand"><i class="far fa-plus-square"></i></span>
                        <span class="collapse"><i class="far fa-minus-square"></i></span>
                    </div>
                </div>
                <div class="control-group-body">


                    <?php
                    $wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );

                    $wcps_product_categories = get_post_meta( $post_id, 'wcps_product_categories', true );

                    $taxonomies = get_post_meta( $post_id, 'wcps_taxonomies', true );


                    $wcps_query_order = get_post_meta( $post_id, 'wcps_query_order', true );
                    $wcps_query_orderby = get_post_meta( $post_id, 'wcps_query_orderby', true );

                    $wcps_hide_out_of_stock = get_post_meta( $post_id, 'wcps_hide_out_of_stock', true );
                    $wcps_product_featured = get_post_meta( $post_id, 'wcps_product_featured', true );
                    $wcps_product_on_sale = get_post_meta( $post_id, 'wcps_product_on_sale', true );


                    $wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );

                    $args = array(
                        'id'		=> 'wcps_total_items',
                        'parent'		=> 'query_options',
                        'title'		=> __('Max product count','woocommerce-products-slider'),
                        'details'	=> __('Set custom number you want to display maximum number of product','woocommerce-products-slider'),
                        'type'		=> 'number',
                        'value'		=> $wcps_total_items,
                        'default'		=> '10',
                        'placeholder'		=> '10',
                    );

                    $wcps_builder_control->generate_field($args);



                    ob_start();
                    echo wcps_get_categories(get_the_ID());
                    $html = ob_get_clean();
                    $args = array(
                        'id' => 'wcps_categories',
                        'control_group_class'		=> 'responsive',
                        'control_desc_class'		=> 'left-middle',
                        'title' => __('Product categories', 'woocommerce-products-slider'),
                        'details' => 'Choose product categories.',
                        'type' => 'custom_html',
                        'html' => $html,
                    );
                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_query_order',
                        'parent'		=> 'query_options',
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

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_query_orderby',
                        'parent'		=> 'query_options',
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

                    $wcps_builder_control->generate_field($args);












                    $args = array(
                        'id'		=> 'wcps_hide_out_of_stock',
                        'parent'		=> 'query_options',
                        'title'		=> __('Hide out of stock','woocommerce-products-slider'),
                        'details'	=> __('You can hide out of stock items from query.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_hide_out_of_stock,
                        'default'		=> 'no_check',
                        'args'		=> array(
                            'yes'=>__('Yes','woocommerce-products-slider'),
                            'no'=>__('No','woocommerce-products-slider'),
                            'no_check'=>__('No Check','woocommerce-products-slider'),


                        ),
                    );

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_product_featured',
                        'parent'		=> 'query_options',
                        'title'		=> __('Featured product','woocommerce-products-slider'),
                        'details'	=> __('You include/exclude featured product on query.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_product_featured,
                        'default'		=> 'no_check',
                        'args'		=> array(
                            'yes'=>__('Yes','woocommerce-products-slider'),
                            'no'=>__('No','woocommerce-products-slider'),
                            'no_check'=>__('No Check','woocommerce-products-slider'),


                        ),
                    );

                    $wcps_builder_control->generate_field($args);



                    $args = array(
                        'id'		=> 'wcps_product_on_sale',
                        'parent'		=> 'query_options',
                        'title'		=> __('On Sale','woocommerce-products-slider'),
                        'details'	=> __('You include/exclude on sale product on query.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $wcps_product_on_sale,
                        'default'		=> 'no',
                        'args'		=> array(
                            'yes'=>__('Yes','woocommerce-products-slider'),
                            'no'=>__('No','woocommerce-products-slider'),


                        ),
                    );

                    $wcps_builder_control->generate_field($args);










                    $args = array(
                        'id'		=> 'wcps_product_ids',
                        'parent'		=> 'query_options',
                        'title'		=> __('Product IDs','woocommerce-products-slider'),
                        'details'	=> __('You can display custom product by ids.','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $wcps_product_ids,
                        'default'		=> '',
                        'placeholder'		=> '1,4,2',
                    );

                    $wcps_builder_control->generate_field($args);



                    ?>

                </div>


            </div>





            <div class="control-group ">
                <div class="control-group-header">Style
                    <div class="icon">
                        <span class="expand"><i class="far fa-plus-square"></i></span>
                        <span class="collapse"><i class="far fa-minus-square"></i></span>
                    </div>
                </div>
                <div class="control-group-body">


                    <?php

                    $class_wcps_functions = new class_wcps_functions();

                    $skins = $class_wcps_functions->skins();
                    $ribbons = $class_wcps_functions->ribbons();

                    $wcps_ribbon_name = get_post_meta($post_id, 'wcps_ribbon_name', true);
                    $wcps_ribbon_custom = get_post_meta($post_id, 'wcps_ribbon_custom', true);
                    $wcps_ribbon_position = get_post_meta($post_id, 'wcps_ribbon_position', true);
                    $ribbon_bg_color = get_post_meta($post_id, 'ribbon_bg_color', true);


                    $wcps_container_padding = get_post_meta($post_id, 'wcps_container_padding', true);
                    $wcps_container_bg_color = get_post_meta($post_id, 'wcps_container_bg_color', true);
                    $wcps_bg_img = get_post_meta($post_id, 'wcps_bg_img', true);

                    $wcps_items_padding = get_post_meta($post_id, 'wcps_items_padding', true);
                    $wcps_items_bg_color = get_post_meta($post_id, 'wcps_items_bg_color', true);




                    $ribbons_arr = array();

                    if(!empty($ribbons))
                        foreach($ribbons as $ribbon_key => $ribbon_data){

                            $ribbons_arr[$ribbon_key]['name'] = $ribbon_data['name'];
                            $ribbons_arr[$ribbon_key]['thumb'] = $ribbon_data['src'];

                        }


                    //echo '<pre>'.var_export($ribbons_arr, true).'</pre>';


                    ?>
                    <div class="control-group ">
                        <div class="control-group-header">Ribbon
                            <div class="icon">
                                <span class="expand"><i class="far fa-plus-square"></i></span>
                                <span class="collapse"><i class="far fa-minus-square"></i></span>
                            </div>
                        </div>
                        <div class="control-group-body">

                            <?php


                            $args = array(
                                'id'		=> 'wcps_ribbon_name',
                                'control_group_class'		=> 'responsive',
                                'control_desc_class'		=> 'left-middle',

                                'parent'		=> 'style_options',
                                'title'		=> __('Slider ribbon','woocommerce-products-slider'),
                                'details'	=> __('Choose slider ribbon.','woocommerce-products-slider'),
                                'type'		=> 'radio_image',
                                'value'		=> $wcps_ribbon_name,
                                'default'		=> 'none',
                                'width'		=> '70px',

                                'args'		=> $ribbons_arr,
                            );

                            echo $wcps_builder_control->generate_field($args);





                            $args = array(
                                'id'		=> 'wcps_ribbon_custom',
                                'parent'		=> 'style_options',
                                'title'		=> __('Custom ribbon','woocommerce-products-slider'),
                                'details'	=> __('Choose custom ribbon, image source url.','woocommerce-products-slider'),
                                'type'		=> 'text',
                                'value'		=> $wcps_ribbon_custom,
                                'default'		=> '',
                                'placeholder'		=> 'Ribbon image url',
                            );

                            $wcps_builder_control->generate_field($args);

                            $args = array(
                                'id'		=> 'ribbon_bg_color',
                                'parent'		=> 'style_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Ribbon background color','woocommerce-products-slider'),
                                'details'	=> __('Set custom background color for ribbon.','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $ribbon_bg_color,
                                'default'		=> '',
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'wcps_ribbon_position',
                                'parent'		=> 'style_options',
                                'title'		=> __('Ribbon position','woocommerce-products-slider'),
                                'details'	=> __('Set ribbon position.','woocommerce-products-slider'),
                                'type'		=> 'select',
                                'value'		=> $wcps_ribbon_position,
                                'default'		=> 'topleft',
                                'args'		=> array(
                                    'topleft'=>__('Top Left','woocommerce-products-slider'),
                                    'topright'=>__('Top Right','woocommerce-products-slider'),
                                    'bottomleft'=>__('Bottom Left','woocommerce-products-slider'),
                                    'bottomright'=>__('Bottom Right','woocommerce-products-slider'),
                                ),
                            );

                            $wcps_builder_control->generate_field($args);


                            ?>

                        </div>
                    </div>

                    <div class="control-group ">
                        <div class="control-group-header">Item style
                            <div class="icon">
                                <span class="expand"><i class="far fa-plus-square"></i></span>
                                <span class="collapse"><i class="far fa-minus-square"></i></span>
                            </div>
                        </div>
                        <div class="control-group-body">

                            <?php

                            $args = array(
                                'id'		=> 'wcps_items_padding',
                                'parent'		=> 'style_options',
                                'title'		=> __('Items padding','woocommerce-products-slider'),
                                'details'	=> __('Set custom padding for item.','woocommerce-products-slider'),
                                'type'		=> 'text',
                                'value'		=> $wcps_items_padding,
                                'default'		=> '',
                                'placeholder'		=> '10px',
                            );

                            $wcps_builder_control->generate_field($args);


                            $args = array(
                                'id'		=> 'wcps_items_bg_color',
                                'parent'		=> 'style_options',
                                'control_group_class'		=> '',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Item background color','woocommerce-products-slider'),
                                'details'	=> __('Set custom background color for item.','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $wcps_items_bg_color,
                                'default'		=> '',
                            );

                            $wcps_builder_control->generate_field($args);

                            ?>

                        </div>
                    </div>


                    <div class="control-group ">
                        <div class="control-group-header">Container style
                            <div class="icon">
                                <span class="expand"><i class="far fa-plus-square"></i></span>
                                <span class="collapse"><i class="far fa-minus-square"></i></span>
                            </div>
                        </div>
                        <div class="control-group-body">

                            <?php


                            $args = array(
                                'id'		=> 'padding',
                                'parent'		=> 'container',
                                'title'		=> __('Container padding','woocommerce-products-slider'),
                                'details'	=> __('Set custom padding for container.','woocommerce-products-slider'),
                                'type'		=> 'text',
                                'value'		=> $wcps_container_padding,
                                'default'		=> '',
                                'placeholder'		=> '10px',
                            );

                            $wcps_builder_control->generate_field($args);

                            $args = array(
                                'id'		=> 'bg_color',
                                'parent'		=> 'container',
                                'control_desc_class'		=> 'left-middle',
                                'title'		=> __('Background color','woocommerce-products-slider'),
                                'details'	=> __('Set custom background color for container.','woocommerce-products-slider'),
                                'type'		=> 'spectrum',
                                'value'		=> $wcps_container_bg_color,
                                'default'		=> '',
                            );

                            $wcps_builder_control->generate_field($args);



                            $args = array(
                                'id'		=> 'bg_img',
                                'parent'		=> 'container',
                                'title'		=> __('Background image','woocommerce-products-slider'),
                                'details'	=> __('Set custom background image for container.','woocommerce-products-slider'),
                                'type'		=> 'text',
                                'value'		=> $wcps_bg_img,
                                'default'		=> '',
                                'placeholder'		=> 'image url',
                            );

                            $wcps_builder_control->generate_field($args);



                            ?>
                        </div>

                    </div>








                    <?php














                    ?>


                </div>


            </div>


            <?php

            $wcps_grid_items = $class_wcps_functions->wcps_grid_items();
            $skins_layers = $class_wcps_functions->wcps_layers();

            $wcps_elements = $class_wcps_functions->wcps_elements();

            $active_layer = 'content';

            ?>

            <div class="control-group active">
                <div class="control-group-header">Item Layout
                    <div class="icon">
                        <span class="expand"><i class="far fa-plus-square"></i></span>
                        <span class="collapse"><i class="far fa-minus-square"></i></span>
                    </div>
                </div>
                <div class="control-group-body">

                    <div class="control-wrap responsive">
                        <div class="control-title">Add elements</div>
                        <div class="control-input">

                            <div class="elements">
                                <?php

                                if(!empty($wcps_elements))
                                foreach ($wcps_elements as $element_key=>$element){

                                    $element_name = isset($element['name']) ? $element['name'] : '';

                                    ?>
                                    <span data-element="<?php echo $element_key; ?>"><?php echo $element_name; ?></span>
                                    <?php

                                }

                                ?>
                            </div>





                        </div>
                    </div>

                    <div class="control-wrap responsive">
                        <div class="control-title">Layers</div>
                        <div class="control-input">
                            <div class="skins_layers">
                                <?php

                                foreach ($skins_layers as $layer_key=>$layer){

                                    $layer_name = $layer['name'];
                                    $layer_elements = $layer['elements'];


                                    ?>
                                    <div class="layer layer-<?php echo $layer_key; ?> <?php echo ($active_layer == $layer_key) ? 'active': ''; ?>">
                                        <div class="layer-title" data-layer="<?php echo $layer_key; ?>">
                                            <i class="fas fa-layer-group"></i> <?php echo $layer_name; ?>
                                            <span class="icon-checked"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <div class="layer-options">
                                            <div class="layer-elements">

                                                <?php

                                                if(!empty($layer_elements))
                                                    foreach ($layer_elements as $elementIndex => $element){

                                                        $element_name = isset($wcps_elements[$element]['name']) ?$wcps_elements[$element]['name'] : 'Name missing';

                                                        ?>
                                                        <div class="element ">
                                                            <div class="element-title" data-element="<?php echo $element; ?>">
                                                                <?php echo $element_name; ?>
                                                                <span class="element-remove"><i class="fas fa-times"></i></span>
                                                            </div>
                                                            <div class="element-options" >

                                                                <?php

                                                                $option_name = 'layer_data['.$layer_key.']['.$elementIndex.']';

                                                                $args = array(
                                                                    'wcps_id'=>$wcps_id,
                                                                    'option_name'=> $option_name,
                                                                    'index'=> $elementIndex,

                                                                );

                                                                do_action("layer_element_options_$element", $args);

                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php

                                                    }

                                                ?>

                                            </div>

                                            <?php

                                            do_action("wcps_layer_options_$layer_key", $layer);

                                            ?>

                                        </div>








                                    </div>
                                    <?php

                                }

                                ?>
                            </div>
                        </div>
                    </div>






                </div>


            </div>

            <script>
                jQuery(document).ready(function($) {

                    $(".skins_layers").sortable({handle: '.layer-title'});
                    $(".layer-elements").sortable({handle: '.element-title'});


                })
            </script>

            <style type="text/css">


            </style>


            <div class="control-group">
                <div class="control-group-header">Custom Scripts

                    <div class="icon">
                        <span class="expand"><i class="far fa-plus-square"></i></span>
                        <span class="collapse"><i class="far fa-minus-square"></i></span>
                    </div>
                </div>
                <div class="control-group-body">


                    <?php
                    $wcps_items_custom_css = get_post_meta( $post_id, 'wcps_items_custom_css', true );



                    $args = array(
                        'id'		=> 'wcps_items_custom_css',
                        'control_group_class'		=> 'responsive',
                        //'parent'		=> 'post_grid_meta_options',
                        'control_desc_class'		=> 'left-middle',
                        'title'		=> __('Custom CSS','woocommerce-products-slider'),
                        'details'	=> __('Add your own CSS..','woocommerce-products-slider'),
                        'type'		=> 'scripts_css',
                        'value'		=> $wcps_items_custom_css,
                        'default'		=> '.wcps-container #wcps-133{}&#10; .wcps-container #wcps-133 .wcps-items{}&#10;.wcps-container #wcps-133 .wcps-items-thumb{}&#10;',
                    );

                    $wcps_builder_control->generate_field($args);

                    ?>

                </div>


            </div>


        </form>



    </div>

    <?php

    $wcps = array();
    $wcps['wcps_id'] = $wcps_id;


    $wcps['sliderOptions']['wcps_column_number'] = $wcps_column_number;
    $wcps['sliderOptions']['wcps_column_number_tablet'] = $wcps_column_number_tablet;
    $wcps['sliderOptions']['wcps_column_number_mobile'] = $wcps_column_number_mobile;


    $wcps['sliderOptions']['wcps_loop'] = $wcps_loop;
    $wcps['sliderOptions']['wcps_center'] = $wcps_center;
    $wcps['sliderOptions']['wcps_slider_mouse_drag'] = $wcps_slider_mouse_drag;
    $wcps['sliderOptions']['wcps_slider_touch_drag'] = $wcps_slider_touch_drag;

    $wcps['sliderOptions']['wcps_rewind'] = $wcps_rewind;
    $wcps['sliderOptions']['navText'] = $wcps_loop;
    $wcps['sliderOptions']['wcps_slideBy'] = $wcps_slideBy;
    $wcps['sliderOptions']['wcps_slider_pagination'] = $wcps_slider_pagination;
    $wcps['sliderOptions']['wcps_slider_pagination_bg'] = $wcps_slider_pagination_bg;
    $wcps['sliderOptions']['wcps_slider_pagination_text_color'] = $wcps_slider_pagination_text_color;
    $wcps['sliderOptions']['wcps_slider_pagination_count'] = $wcps_slider_pagination_count;


    $wcps['sliderOptions']['wcps_pagination_slide_speed'] = $wcps_pagination_slide_speed;
    $wcps['sliderOptions']['wcps_auto_play'] = $wcps_auto_play;
    $wcps['sliderOptions']['wcps_auto_play_timeout'] = $wcps_auto_play_timeout;
    $wcps['sliderOptions']['wcps_stop_on_hover'] = $wcps_stop_on_hover;
    $wcps['sliderOptions']['wcps_auto_play_speed'] = $wcps_auto_play_speed;

    $wcps['sliderOptions']['wcps_slider_navigation'] = $wcps_slider_navigation;
    $wcps['sliderOptions']['wcps_slider_navigation_position'] = $wcps_slider_navigation_position;

    $wcps['sliderOptions']['wcps_slide_speed'] = $wcps_slide_speed;
    $wcps['sliderOptions']['wcps_slider_animateout'] = $wcps_slider_animateout;
    $wcps['sliderOptions']['wcps_slider_animatein'] = $wcps_slider_animatein;
    $wcps['sliderOptions']['wcps_slider_rtl'] = $wcps_slider_rtl;


    $wcps['queryOptions']['wcps_total_items'] = $wcps_total_items;
    $wcps['queryOptions']['wcps_product_categories'] = $wcps_product_categories;
    $wcps['queryOptions']['wcps_query_order'] = $wcps_query_order;
    $wcps['queryOptions']['wcps_query_orderby'] = $wcps_query_orderby;
    $wcps['queryOptions']['wcps_hide_out_of_stock'] = $wcps_hide_out_of_stock;
    $wcps['queryOptions']['wcps_product_featured'] = $wcps_product_featured;
    $wcps['queryOptions']['wcps_product_on_sale'] = $wcps_product_on_sale;
    $wcps['queryOptions']['wcps_product_ids'] = $wcps_product_ids;

    $wcps['active_layer'] = 'content';




    ?>

    <script>
        var wcps_edits = {};

        var wcps = <?php echo json_encode($wcps); ?>;
        var wcps_elements = <?php echo json_encode($wcps_elements); ?>;
        var wcpsFormData = '';



        console.log(wcps_elements);

    </script>


    <?php

}

add_action('wcps_builder','wcps_builder');

function wcps_builder(){

    $wcps_id = isset($_GET['wcps_id']) ? sanitize_text_field($_GET['wcps_id']) : 4;

    ?>
    <div id="wcps-builder">

        <div class="loader"><i class="fas fa-spin fa-crosshairs"></i></div>

        <?php
        echo do_shortcode('[wcps_new id='.$wcps_id.']');
        ?>

    </div>










    <?php
}