<?php
if ( ! defined('ABSPATH')) exit;  // if direct access




add_action('wcps_metabox_content_shortcode', 'wcps_metabox_content_shortcode');

if(!function_exists('wcps_metabox_content_shortcode')) {
    function wcps_metabox_content_shortcode($post_id){

        $settings_tabs_field = new settings_tabs_field();
        $wcps_options = get_post_meta( $post_id, 'wcps_options', true );
        $developer_options = isset($wcps_options['developer_options']) ? $wcps_options['developer_options'] : array();

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
                .settings-tabs .copy-to-clipboard {
                }

                .settings-tabs .copy-to-clipboard .copied {
                    display: none;
                    background: #e5e5e5;
                    padding: 4px 10px;
                    line-height: normal;
                }
            </style>

            <script>
                jQuery(document).ready(function ($) {
                    $(document).on('click', '.settings-tabs .copy-to-clipboard input, .settings-tabs .copy-to-clipboard textarea', function () {
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


            $args = array(
                'id'		=> 'developer_options',
                'parent'		=> 'wcps_options',
                'title'		=> __('Developer options','woocommerce-products-slider'),
                'details'	=> __('var dump following variable.','woocommerce-products-slider'),
                'type'		=> 'checkbox',
                'value'		=> $developer_options,
                'default'		=> 'none',
                'args'		=> array(
                    'query_args'=>__('Query arguments','woocommerce-products-slider'),
                    'found_posts'=>__('Found posts','woocommerce-products-slider'),
                    'more_query_args'=>__('More query_args','woocommerce-products-slider'),

                ),
            );

            $settings_tabs_field->generate_field($args);



            ?>
        </div>
        <?php
    }
}
















add_action('wcps_metabox_content_style', 'wcps_metabox_content_style');

if(!function_exists('wcps_metabox_content_style')) {
    function wcps_metabox_content_style($post_id){

        $settings_tabs_field = new settings_tabs_field();
        $wcps_options = get_post_meta( $post_id, 'wcps_options', true );
        $slider_ribbon = isset($wcps_options['ribbon']) ? $wcps_options['ribbon'] : array();

        $ribbon_text = isset($slider_ribbon['text']) ? $slider_ribbon['text'] : '';
        $ribbon_background_img = isset($slider_ribbon['background_img']) ? $slider_ribbon['background_img'] : '';
        $ribbon_background_color = isset($slider_ribbon['background_color']) ? $slider_ribbon['background_color'] : '';
        $ribbon_text_color = isset($slider_ribbon['text_color']) ? $slider_ribbon['text_color'] : '';
        $ribbon_width = isset($slider_ribbon['width']) ? $slider_ribbon['width'] : '';
        $ribbon_height = isset($slider_ribbon['height']) ? $slider_ribbon['height'] : '';
        $ribbon_position = isset($slider_ribbon['position']) ? $slider_ribbon['position'] : '';

        $item_style = isset($wcps_options['item_style']) ? $wcps_options['item_style'] : array();

        $item_padding = isset($item_style['padding']) ? $item_style['padding'] : '';
        $item_margin = isset($item_style['margin']) ? $item_style['margin'] : '';

        $item_background_color = isset($item_style['background_color']) ? $item_style['background_color'] : '';
        $item_text_align = isset($item_style['text_align']) ? $item_style['text_align'] : '';

        $container = isset($wcps_options['container']) ? $wcps_options['container'] : array();
        $container_background_img_url = isset($container['background_img_url']) ? $container['background_img_url'] : '';
        $container_background_color = isset($container['background_color']) ? $container['background_color'] : '';
        $container_padding = isset($container['padding']) ? $container['padding'] : '';





        ?>
        <div class="section">
            <div class="section-title">Style</div>
            <p class="description section-description">Customize style settings.</p>


            <?php


            $args = array(
                'id'		=> 'ribbon_options',
                'title'		=> __('Ribbon style','woocommerce-products-slider'),
                'details'	=> __('Customize ribbon style.','woocommerce-products-slider'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'text',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon text','woocommerce-products-slider'),
                        'details'	=> __('Choose custom ribbon text, image source url.','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $ribbon_text,
                        'default'		=> '',
                        'placeholder'		=> 'Hot sale',
                    ),
                    array(
                        'id'		=> 'background_img',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon background image','woocommerce-products-slider'),
                        'details'	=> __('Choose background image source.','woocommerce-products-slider'),
                        'type'		=> 'media_url',
                        'value'		=> $ribbon_background_img,
                        'default'		=> '',
                        'placeholder'		=> '',
                    ),
                    array(
                        'id'		=> 'background_color',
                        'css_id'		=> 'ribbon_background_color',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon background color','woocommerce-products-slider'),
                        'details'	=> __('Choose ribbon background color.','woocommerce-products-slider'),
                        'type'		=> 'colorpicker',
                        'value'		=> $ribbon_background_color,
                        'default'		=> '',
                        'placeholder'		=> '',
                    ),
                    array(
                        'id'		=> 'text_color',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon text color','woocommerce-products-slider'),
                        'details'	=> __('Choose ribbon text color.','woocommerce-products-slider'),
                        'type'		=> 'colorpicker',
                        'value'		=> $ribbon_text_color,
                        'default'		=> '',
                        'placeholder'		=> '',
                    ),
                    array(
                        'id'		=> 'width',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon width','woocommerce-products-slider'),
                        'details'	=> __('Set ribbon width.','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $ribbon_width,
                        'default'		=> '90px',
                        'placeholder'		=> '',
                    ),
                    array(
                        'id'		=> 'height',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon height','woocommerce-products-slider'),
                        'details'	=> __('Set ribbon height.','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $ribbon_height,
                        'default'		=> '24px',
                        'placeholder'		=> '',
                    ),
                    array(
                        'id'		=> 'position',
                        'parent'		=> 'wcps_options[ribbon]',
                        'title'		=> __('Ribbon position','woocommerce-products-slider'),
                        'details'	=> __('Set ribbon position.','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $ribbon_position,
                        'default'		=> 'none',
                        'args'		=> array(
                            'topright'=>__('Top-right','woocommerce-products-slider'),
                            'topleft'=>__('Top-left','woocommerce-products-slider'),
                            'bottomright'=>__('Bottom-right','woocommerce-products-slider'),
                            'bottomleft'=>__('Bottom-left','woocommerce-products-slider'),
                            'none'=>__('None','woocommerce-products-slider'),
                        ),
                    ),
                ),

            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'item_style',
                'title'		=> __('Item style','woocommerce-products-slider'),
                'details'	=> __('Customize item style.','woocommerce-products-slider'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'padding',
                        'parent'		=> 'wcps_options[item_style]',
                        'title'		=> __('Item padding','woocommerce-products-slider'),
                        'details'	=> __('Item custom padding','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $item_padding,
                        'default'		=> '',
                        'placeholder'   => '10px',
                    ),
                    array(
                        'id'		=> 'margin',
                        'parent'		=> 'wcps_options[item_style]',
                        'title'		=> __('Item margin','woocommerce-products-slider'),
                        'details'	=> __('Item custom margin','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $item_margin,
                        'default'		=> '',
                        'placeholder'   => '10px',
                    ),
                    array(
                        'id'		=> 'background_color',
                        'parent'		=> 'wcps_options[item_style]',
                        'title'		=> __('Background color','woocommerce-products-slider'),
                        'details'	=> __('Item background color','woocommerce-products-slider'),
                        'type'		=> 'colorpicker',
                        'value'		=> $item_background_color,
                        'default'		=> '',
                        'placeholder'   => '',
                    ),
                    array(
                        'id'		=> 'text_align',
                        'parent'		=> 'wcps_options[item_style]',
                        'title'		=> __('Text align','woocommerce-products-slider'),
                        'details'	=> __('Item text align','woocommerce-products-slider'),
                        'type'		=> 'select',
                        'value'		=> $item_text_align,
                        'default'		=> '',
                        'args'		=> array('left'=>'Left','center'=>'Center', 'right'=>'Right',),
                    ),
                ),

            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'item_width',
                'title'		=> __('Container style','woocommerce-products-slider'),
                'details'	=> __('Customize container style.','woocommerce-products-slider'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'background_img_url',
                        'parent'		=> 'wcps_options[container]',
                        'title'		=> __('Background image','woocommerce-products-slider'),
                        'details'	=> __('Container background image','woocommerce-products-slider'),
                        'type'		=> 'media_url',
                        'value'		=> $container_background_img_url,
                        'default'		=> '',
                        'placeholder'   => '',
                    ),
                    array(
                        'id'		=> 'background_color',
                        'css_id'		=> 'container_background_color',
                        'parent'		=> 'wcps_options[container]',
                        'title'		=> __('Background color','woocommerce-products-slider'),
                        'details'	=> __('Container background color','woocommerce-products-slider'),
                        'type'		=> 'colorpicker',
                        'value'		=> $container_background_color,
                        'default'		=> '',
                        'placeholder'   => '',
                    ),
                    array(
                        'id'		=> 'padding',
                        'parent'		=> 'wcps_options[container]',
                        'title'		=> __('Padding','woocommerce-products-slider'),
                        'details'	=> __('Container padding','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $container_padding,
                        'default'		=> '',
                    ),
                    array(
                        'id'		=> 'margin',
                        'parent'		=> 'wcps_options[container]',
                        'title'		=> __('Margin','woocommerce-products-slider'),
                        'details'	=> __('Container margin','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $container_padding,
                        'default'		=> '',
                    ),

                ),

            );

            $settings_tabs_field->generate_field($args);




            ?>


        </div>
            <?php
    }
}










add_action('wcps_metabox_content_layouts','wcps_metabox_content_layouts');
function wcps_metabox_content_layouts($post_id){


    $settings_tabs_field = new settings_tabs_field();
    $wcps_options = get_post_meta($post_id,'wcps_options', true);
    $item_layout_id = !empty($wcps_options['item_layout_id']) ? $wcps_options['item_layout_id'] : wcps_first_wcps_layout();



    ?>
    <div class="section">
        <div class="section-title"><?php echo __('Layouts', 'woocommerce-products-slider'); ?></div>
        <p class="description section-description"><?php echo __('Choose item layouts.', 'woocommerce-products-slider'); ?></p>


        <?php



        ob_start();

        ?>
        <p><a target="_blank" class="button" href="<?php echo admin_url().'post-new.php?post_type=wcps_layout'; ?>"><?php echo __('Create layout','woocommerce-products-slider'); ?></a> </p>
        <p><a target="_blank" class="button" href="<?php echo admin_url().'edit.php?post_type=wcps_layout'; ?>"><?php echo __('Manage layouts','woocommerce-products-slider'); ?></a> </p>

        <?php


        $html = ob_get_clean();

        $args = array(
            'id'		=> 'create_wcps_layout',
            'parent'		=> 'wcps_options[query]',
            'title'		=> __('Create layout','woocommerce-products-slider'),
            'details'	=> __('Please follow the links to create layouts or manage.','woocommerce-products-slider'),
            'type'		=> 'custom_html',
            'html'		=> $html,
        );

        $settings_tabs_field->generate_field($args);


        $item_layout_args = array();

        $query_args['post_type'] 		= array('wcps_layout');
        $query_args['post_status'] 		= array('publish');
        $query_args['orderby']  		= 'date';
        $query_args['order']  			= 'DESC';
        $query_args['posts_per_page'] 	= -1;
        $wp_query = new WP_Query($query_args);

        if ( $wp_query->have_posts() ) :

            while ( $wp_query->have_posts() ) : $wp_query->the_post();

                $post_id = get_the_id();
                $layout_name = get_the_title();
                $product_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
                $product_thumb_url = isset($product_thumb['0']) ? esc_url_raw($product_thumb['0']) : '';

                $layout_options = get_post_meta($post_id,'layout_options', true);
                $layout_preview_img = !empty($layout_options['layout_preview_img']) ? $layout_options['layout_preview_img'] : 'https://i.imgur.com/JyurCtY.jpg';

                $product_thumb_url = !empty( $product_thumb_url ) ? $product_thumb_url : $layout_preview_img;

                $item_layout_args[$post_id] = array('name'=>$layout_name, 'link_text'=>'Edit', 'link'=> get_edit_post_link($post_id), 'thumb'=> $product_thumb_url, );

            endwhile;
        endif;





        $args = array(
            'id'		=> 'item_layout_id',
            'parent' => 'wcps_options',
            'title'		=> __('Item layouts','woocommerce-products-slider'),
            'details'	=> __('Choose grid item layout.','woocommerce-products-slider'),
            'type'		=> 'radio_image',
            'value'		=> $item_layout_id,
            'default'		=> '',
            'width'		=> '250px',
            'args'		=> $item_layout_args,
        );

        $settings_tabs_field->generate_field($args);



        ?>
    </div>
    <?php


}


























add_action('wcps_metabox_content_query_product', 'wcps_metabox_content_query_product');

if(!function_exists('wcps_metabox_content_query_product')) {
    function wcps_metabox_content_query_product($post_id){

        $settings_tabs_field = new settings_tabs_field();

        $wcps_options = get_post_meta( $post_id, 'wcps_options', true );
        $query = !empty($wcps_options['query']) ? $wcps_options['query'] : array();

        $posts_per_page = isset($query['posts_per_page']) ? $query['posts_per_page'] : 10;
        $query_order = isset($query['order']) ? $query['order'] : 'DESC';
        $query_orderby = !empty($query['orderby']) ? $query['orderby'] : array('date');
        $ordberby_meta_key = isset($query['ordberby_meta_key']) ? $query['ordberby_meta_key'] : '';

        $hide_out_of_stock = isset($query['hide_out_of_stock']) ? $query['hide_out_of_stock'] : 'no_check';
        $product_featured = isset($query['product_featured']) ? $query['product_featured'] : 'no_check';
        $taxonomies = !empty($query['taxonomies']) ? $query['taxonomies'] : array();
        $taxonomy_relation = !empty($query['taxonomy_relation']) ? $query['taxonomy_relation'] : 'OR';




        $on_sale = isset($query['on_sale']) ? $query['on_sale'] : 'no';
        $product_ids = isset($query['product_ids']) ? $query['product_ids'] : '';


        //echo '<pre>'.var_export($taxonomies, true).'</pre>';

        ?>
        <div class="section">
            <div class="section-title">Query Products</div>
            <p class="description section-description">Setup product query settings.</p>


            <?php

            $args = array(
                'id'		=> 'posts_per_page',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Max number of product','woocommerce-products-slider'),
                'details'	=> __('Set custom number you want to display maximum number of product','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $posts_per_page,
                'default'		=> '10',
                'placeholder'		=> '10',
            );

            $settings_tabs_field->generate_field($args);


            $wcps_allowed_taxonomies = apply_filters('wcps_allowed_taxonomies', array('product_cat', 'product_tag'));

            ob_start();


            $post_types =  array('product');
            $post_taxonomies =  array();

            $post_taxonomies = get_object_taxonomies( $post_types );

            if(!empty($post_taxonomies)){

                ?>

                <div class="expandable sortable">

                    <?php

                    foreach ($post_taxonomies as $taxonomy ) {

                        $terms = isset($taxonomies[$taxonomy]['terms']) ? $taxonomies[$taxonomy]['terms'] : array();
                        $terms_relation = isset($taxonomies[$taxonomy]['terms_relation']) ? $taxonomies[$taxonomy]['terms_relation'] : 'IN';

                        if(!in_array($taxonomy, $wcps_allowed_taxonomies)) continue;
                        //if($taxonomy != 'product_cat' && $taxonomy != 'product_tag') continue;

                        $the_taxonomy = get_taxonomy($taxonomy);
                        $args=array('orderby' => 'name', 'order' => 'ASC', 'taxonomy' => $taxonomy, 'hide_empty' => false);
                        $categories_all = get_categories($args);



                        ?>
                        <div class="item">
                            <div class="element-title header ">
                                <span class="expand"><i class="fas fa-expand"></i><i class="fas fa-compress"></i></span>
                                <?php
                                if(!empty($terms)):
                                ?><i class="fas fa-check"></i><?php
                                else:
                                    ?><i class="fas fa-times"></i><?php
                                endif;?>
                                <span class="expand"><?php echo $the_taxonomy->labels->name; ?> - <?php echo $taxonomy; ?></span>

                            </div>
                            <div class="element-options options">

                                <?php
                                $term_list = array();
                                foreach($categories_all as $category_info){
                                    $term_list[$category_info->cat_ID] = $category_info->cat_name.'('.$category_info->count.')';
                                }




                                $args = array(
                                    'id'		=> 'terms',
                                    'parent' => 'wcps_options[query][taxonomies]['.$taxonomy.']',
                                    'title'		=> __('Select terms','woocommerce-products-slider'),
                                    'details'	=> __('Choose some terms.','woocommerce-products-slider'),
                                    'type'		=> 'select',
                                    'multiple'		=> true,
                                    'value'		=> $terms,
                                    'args'		=> $term_list,
                                    'default'		=> array(),
                                );

                                $settings_tabs_field->generate_field($args);

                                $args = array(
                                    'id'		=> 'terms_relation',
                                    'css_id'		=> $taxonomy.'_terms_relation',
                                    'parent'		=> 'wcps_options[query][taxonomies]['.$taxonomy.']',
                                    'title'		=> __('Terms relation','post-grid'),
                                    'details'	=> __('Choose term relation.','post-grid'),
                                    'type'		=> 'radio',
                                    'value'		=> $terms_relation,
                                    'default'		=> 'IN',
                                    'args'		=> array(
                                        'IN'=>__('IN','post-grid'),
                                        'NOT IN'=>__('NOT IN','post-grid'),
                                        'AND'=>__('AND','post-grid'),
                                        'EXISTS'=>__('EXISTS','post-grid'),
                                        'NOT EXISTS'=>__('NOT EXISTS','post-grid'),
                                    ),
                                );

                                $settings_tabs_field->generate_field($args, $post_id);


                                ?>

                            </div>
                        </div>
                        <?php






                    }

                    ?>
                </div>
                <?php

            }
            else{
                echo 'No categories found.';
            }



            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_categories',
                'title' => __('Product taxonomy  & terms', 'woocommerce-products-slider'),
                'details' => __('Choose product taxonomy & terms. click to expand and see there is categories or terms you can select.', 'woocommerce-products-slider'),
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'taxonomy_relation',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Taxonomy relation','woocommerce-products-slider'),
                'details'	=> __('Set taxonomy relation.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $taxonomy_relation,
                'default'		=> 'OR',
                'args'		=> array(
                    'OR'=>__('OR','post-grid'),
                    'AND'=>__('AND','post-grid'),
                ),
            );

            $settings_tabs_field->generate_field($args);








            $args = array(
                'id'		=> 'order',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Query order','woocommerce-products-slider'),
                'details'	=> __('Set query order.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> $query_order,
                'default'		=> 'DESC',
                'args'		=> array(
                    'DESC'=>__('Descending','woocommerce-products-slider'),
                    'ASC'=>__('Ascending','woocommerce-products-slider'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $wcps_query_orderby_args = apply_filters('wcps_query_orderby_args',
                array(
                    'ID'=>__('ID','woocommerce-products-slider'),
                    'date'=>__('Date','woocommerce-products-slider'),
                    'post_date'=>__('Post date','woocommerce-products-slider'),
                    'name'=>__('Name','woocommerce-products-slider'),
                    'rand'=>__('Random','woocommerce-products-slider'),
                    'comment_count'=>__('Comment count','woocommerce-products-slider'),
                    'author'=>__('Author','woocommerce-products-slider'),
                    'title'=>__('Title','woocommerce-products-slider'),
                    'type'=>__('Type','woocommerce-products-slider'),
                    'menu_order'=>__('Menu order','woocommerce-products-slider'),
                    'meta_value'=>__('meta_value','woocommerce-products-slider'),
                    'meta_value_num'=>__('meta value number','woocommerce-products-slider'),
                    'post__in'=>__('post__in','woocommerce-products-slider'),
                    'post_name__in'=>__('post_name__in','woocommerce-products-slider'),
                )
            );



            ob_start();

            if(!empty($wcps_query_orderby_args)){

                $all_team_members_new = array();

                $member_ids_new = array();

                if(!empty($query_orderby))
                    foreach ($query_orderby as $elementIndex => $argData){
                        $arg_order = isset($argData['arg_order']) ? $argData['arg_order'] :'';
                        if(!empty($arg_order))
                        $query_orderby_new[$elementIndex]  = array('arg_order'=>$arg_order);
                    }

                //echo '<pre>'.var_export($query_orderby_new, true).'</pre>';

                $wcps_query_orderby_args_new = array_replace($query_orderby_new, $wcps_query_orderby_args);

                $wcps_query_orderby_args_new = (!empty($wcps_query_orderby_args_new)) ? $wcps_query_orderby_args_new : $wcps_query_orderby_args;



                ?>

                <div class="expandable sortable">

                    <?php

                    foreach ($wcps_query_orderby_args_new as $argIndex => $argName ) {

                        $arg_order = isset($query_orderby[$argIndex]['arg_order']) ?$query_orderby[$argIndex]['arg_order'] : '';

                        ?>
                        <div class="item">
                            <div class="element-title header ">
                                <span class="sort"><i class="fas fa-sort"></i></span>
                                <span class="expand"><i class="fas fa-expand"></i><i class="fas fa-compress"></i></span>
                                <?php
                                if(!empty($arg_order)):
                                    ?><i class="fas fa-check"></i><?php
                                else:
                                    ?><i class="fas fa-times"></i><?php
                                endif;?>
                                <span class="expand"><?php echo $argName; ?></span>

                            </div>
                            <div class="element-options options">

                                <?php



                                $args = array(
                                    'id'		=> 'arg_order',
                                    'parent' => 'wcps_options[query][orderby]['.$argIndex.']',
                                    'title'		=> __('Order','woocommerce-products-slider'),
                                    'details'	=> __('Choose some terms.','woocommerce-products-slider'),
                                    'type'		=> 'select',
                                    'value'		=> $arg_order,
                                    'default'		=> '',
                                    'args'		=> array(
                                        ''=>__('None','woocommerce-products-slider'),
                                        'DESC'=>__('Descending','woocommerce-products-slider'),
                                        'ASC'=>__('Ascending','woocommerce-products-slider'),


                                    ),
                                );

                                $settings_tabs_field->generate_field($args);




                                ?>

                            </div>
                        </div>
                        <?php






                    }

                    ?>
                </div>
                <?php

            }



            $html = ob_get_clean();
            $args = array(
                'id' => 'wcps_ordeby',
                'title' => __('Query orderby', 'woocommerce-products-slider'),
                'details' => __('Set query orderby.', 'woocommerce-products-slider'),
                'type' => 'custom_html',
                'html' => $html,
            );
            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'ordberby_meta_key',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Orderby meta key','woocommerce-products-slider'),
                'details'	=> __('Write meta key for orderby meta key value.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $ordberby_meta_key,
                'default'		=> '',
                'placeholder'		=> 'meta_key',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hide_out_of_stock',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Include out of stock products?','woocommerce-products-slider'),
                'details'	=> __('Include or exclude out of stock products from query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $hide_out_of_stock,
                'default'		=> 'no_check',
                'args'		=> array(
                    'no'=>__('Include','woocommerce-products-slider'),
                    'yes'=>__('Exclude','woocommerce-products-slider'),
                    'no_check'=>__('No check','woocommerce-products-slider'),

                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'product_featured',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Include featured products?','woocommerce-products-slider'),
                'details'	=> __('Include or exclude featured products from query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $product_featured,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Include','woocommerce-products-slider'),
                    'no'=>__('Exclude','woocommerce-products-slider'),
                    'no_check'=>__('No check','woocommerce-products-slider'),
                ),
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'on_sale',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Include on-sale products?','woocommerce-products-slider'),
                'details'	=> __('Include or exclude on-sale products from query.','woocommerce-products-slider'),
                'type'		=> 'radio',
                'value'		=> $on_sale,
                'default'		=> 'no',
                'args'		=> array(
                    'yes'=>__('Include','woocommerce-products-slider'),
                    'no'=>__('Exclude','woocommerce-products-slider'),
                    'no_check'=>__('No check','woocommerce-products-slider'),

                ),
            );

            $settings_tabs_field->generate_field($args);










            $args = array(
                'id'		=> 'product_ids',
                'parent'		=> 'wcps_options[query]',
                'title'		=> __('Product ID\'s','woocommerce-products-slider'),
                'details'	=> __('You can display products by ids.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> $product_ids,
                'default'		=> '',
                'placeholder'		=> '1,4,2',
            );

            $settings_tabs_field->generate_field($args);










            ?>

        </div>

        <?php






    }
}





add_action('wcps_metabox_content_slider_options', 'wcps_metabox_content_slider_options');

if(!function_exists('wcps_metabox_content_slider_options')) {
    function wcps_metabox_content_slider_options($post_id){


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
            <div class="section-title"><?php echo __('Slider', 'woocommerce-products-slider'); ?></div>
            <p class="description section-description"><?php echo __('Customize slider settings.', 'woocommerce-products-slider'); ?></p>

            <?php

            $args = array(
                'id'		=> 'slider',
                'title'		=> __('Slider column count ','woocommerce-products-slider'),
                'details'	=> __('Set slider column count.','woocommerce-products-slider'),
                'type'		=> 'option_group',
                'options'		=> array(
                    array(
                        'id'		=> 'column_large',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In desktop','woocommerce-products-slider'),
                        'details'	=> __('min-width: 1200px, ex: 3','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $slider_column_large,
                        'default'		=> 3,
                        'placeholder'   => '3',
                    ),
                    array(
                        'id'		=> 'column_medium',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In tablet & small desktop','woocommerce-products-slider'),
                        'details'	=> __('min-width: 992px, ex: 2','woocommerce-products-slider'),
                        'type'		=> 'text',
                        'value'		=> $slider_column_medium,
                        'default'		=> 2,
                        'placeholder'   => '2',
                    ),
                    array(
                        'id'		=> 'column_small',
                        'parent'		=> 'wcps_options[slider]',
                        'title'		=> __('In mobile','woocommerce-products-slider'),
                        'details'	=> __('min-width: 576px, ex: 1','woocommerce-products-slider'),
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
            'title'		=> __('Auto play','woocommerce-products-slider'),
            'details'	=> __('Choose slider auto play.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_auto_play,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'auto_play_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Auto play speed','woocommerce-products-slider'),
            'details'	=> __('Set auto play speed, ex: 1500','woocommerce-products-slider'),
            'type'		=> 'text',
            'value'		=> $auto_play_speed,
            'default'		=> 1500,
            'placeholder'   => '1500',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'auto_play_timeout',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Auto play timeout','woocommerce-products-slider'),
            'details'	=> __('Set auto play timeout, ex: 2000','woocommerce-products-slider'),
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
            'title'		=> __('Slider rewind','woocommerce-products-slider'),
            'details'	=> __('Choose slider rewind.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_rewind,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'loop',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider loop','woocommerce-products-slider'),
            'details'	=> __('Choose slider loop.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_loop,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'center',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider center','woocommerce-products-slider'),
            'details'	=> __('Choose slider center.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_center,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'stop_on_hover',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider stop on hover','woocommerce-products-slider'),
            'details'	=> __('Choose stop on hover.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_stop_on_hover,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);




        $args = array(
            'id'		=> 'navigation',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation','woocommerce-products-slider'),
            'details'	=> __('Choose slider navigation.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_navigation,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'slide_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation slide speed','woocommerce-products-slider'),
            'details'	=> __('Set slide speed, ex: 1000','woocommerce-products-slider'),
            'type'		=> 'text',
            'value'		=> $slider_slide_speed,
            'default'		=> 1000,
            'placeholder'   => '1000',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'navigation_position',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation position','woocommerce-products-slider'),
            'details'	=> __('Choose slider navigation position.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $navigation_position,
            'default'		=> 'topright',
            'args'		=> array('topright'=>__('Top-right','woocommerce-products-slider'),'topleft'=>__('Top-left','woocommerce-products-slider'), 'bottomleft'=>__('Bottom left','woocommerce-products-slider'), 'bottomright'=>__('Bottom right','woocommerce-products-slider'),'middle'=>__('Middle','woocommerce-products-slider') , 'middle-fixed'=>__('Middle-fixed','woocommerce-products-slider')  ), //
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'navigation_style',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider navigation style','woocommerce-products-slider'),
            'details'	=> __('Choose slider navigation style. classes <code>semi-round, round, flat, border</code>','woocommerce-products-slider'),
            'type'		=> 'text',
            'value'		=> $navigation_style,
            'default'		=> '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'navigation_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation background color','woocommerce-products-slider'),
            'details'	=> __('Set navigation background color','woocommerce-products-slider'),
            'type'		=> 'colorpicker',
            'value'		=> $navigation_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'navigation_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Navigation text color','woocommerce-products-slider'),
            'details'	=> __('Set navigation text color','woocommerce-products-slider'),
            'type'		=> 'colorpicker',
            'value'		=> $navigation_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'pagination',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider dots','woocommerce-products-slider'),
            'details'	=> __('Choose slider dots at bottom.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_pagination,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'dots_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots background color','woocommerce-products-slider'),
            'details'	=> __('Set dots background color','woocommerce-products-slider'),
            'type'		=> 'colorpicker',
            'value'		=> $dots_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'dots_active_background_color',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots active/hover background color','woocommerce-products-slider'),
            'details'	=> __('Set dots active/hover background color','woocommerce-products-slider'),
            'type'		=> 'colorpicker',
            'value'		=> $dots_active_background_color,
            'default'		=> '',
            'placeholder'   => '',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'pagination_speed',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Dots slide speed','woocommerce-products-slider'),
            'details'	=> __('Set dots slide speed, ex: 1200','woocommerce-products-slider'),
            'type'		=> 'text',
            'value'		=> $slider_pagination_speed,
            'default'		=> 1200,
            'placeholder'   => '1200',
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'pagination_count',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider dots count','woocommerce-products-slider'),
            'details'	=> __('Choose slider dots count.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_pagination_count,
            'default'		=> 'true',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'rtl',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider rtl','woocommerce-products-slider'),
            'details'	=> __('Choose slider rtl.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_rtl,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'lazy_load',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider lazy load','woocommerce-products-slider'),
            'details'	=> __('Choose slider lazy load.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_lazy_load,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'touch_drag',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider touch drag','woocommerce-products-slider'),
            'details'	=> __('Choose slider touch drag.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_touch_drag,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'mouse_drag',
            'parent'		=> 'wcps_options[slider]',
            'title'		=> __('Slider mouse drag','woocommerce-products-slider'),
            'details'	=> __('Choose slider mouse drag.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $slider_mouse_drag,
            'default'		=> 'false',
            'args'		=> array('true'=>__('True','woocommerce-products-slider'), 'false'=>__('False','woocommerce-products-slider')),
        );

        $settings_tabs_field->generate_field($args);








            ?>
        </div>
        <?php
    }
}








add_action('wcps_metabox_content_custom_scripts', 'wcps_metabox_content_custom_scripts');

if(!function_exists('wcps_metabox_content_custom_scripts')) {
    function wcps_metabox_content_custom_scripts($post_id){



        $settings_tabs_field = new settings_tabs_field();


	    $wcps_items_custom_css = get_post_meta( $post_id, 'wcps_items_custom_css', true );


        ?>
        <div class="section">
            <div class="section-title">Custom scripts</div>
            <p class="description section-description">Add your own scritps and style css.</p>

            <?php

            $args = array(
                'id'		=> 'custom_css',
                'parent'		=> 'wcps_options',
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






add_action('wcps_metabox_content_help_support', 'wcps_metabox_content_help_support');

if(!function_exists('wcps_metabox_content_help_support')) {
    function wcps_metabox_content_help_support($tab){

        $settings_tabs_field = new settings_tabs_field();

        ?>
        <div class="section">
            <div class="section-title"><?php echo __('Get support', 'woocommerce-products-slider'); ?></div>
            <p class="description section-description"><?php echo __('Use following to get help and support from our expert team.', 'woocommerce-products-slider'); ?></p>

            <?php


            ob_start();
            ?>

            <p><?php echo __('Ask question for free on our forum and get quick reply from our expert team members.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.pickplugins.com/create-support-ticket/"><?php echo __('Create support ticket', 'woocommerce-products-slider'); ?></a>

            <p><?php echo __('Read our documentation before asking your question.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.pickplugins.com/documentation/woocommerce-products-slider/"><?php echo __('Documentation', 'woocommerce-products-slider'); ?></a>

            <p><?php echo __('Watch video tutorials.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.youtube.com/playlist?list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy"><i class="fab fa-youtube"></i> <?php echo __('All tutorials', 'woocommerce-products-slider'); ?></a>

            <ul>
<!--                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=SOe0D-Og3nQ&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=1">How to install plugin & setup</a></li>-->

            </ul>



            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'get_support',
                //'parent'		=> '',
                'title'		=> __('Ask question','woocommerce-products-slider'),
                'details'	=> '',
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);


            ob_start();
            ?>

            <p class="">We wish your 2 minutes to write your feedback about the <b>PickPlugins Product Slider</b> plugin. give us <span style="color: #ffae19"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></p>

            <a target="_blank" href="https://wordpress.org/plugins/woocommerce products slider/#reviews" class="button"><i class="fab fa-wordpress"></i> Write a review</a>


            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'reviews',
                //'parent'		=> '',
                'title'		=> __('Submit reviews','woocommerce-products-slider'),
                'details'	=> '',
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>


        </div>
        <?php


    }
}






add_action('wcps_metabox_content_buy_pro', 'wcps_metabox_content_buy_pro');

if(!function_exists('wcps_metabox_content_buy_pro')) {
    function wcps_metabox_content_buy_pro($tab){

        $settings_tabs_field = new settings_tabs_field();


        ?>
        <div class="section">
            <div class="section-title"><?php echo __('Get Premium', 'woocommerce-products-slider'); ?></div>
            <p class="description section-description"><?php echo __('Thanks for using our plugin, if you looking for some advance feature please buy premium version.', 'woocommerce-products-slider'); ?></p>

            <?php


            ob_start();
            ?>

            <p><?php echo __('If you love our plugin and want more feature please consider to buy pro version.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.pickplugins.com/item/woocommerce-products-slider-for-wordpress/?ref=dashobard"><?php echo __('Buy premium', 'woocommerce-products-slider'); ?></a>

            <h2><?php echo __('See the differences','woocommerce-products-slider'); ?></h2>

            <table class="pro-features">
                <thead>
                <tr>
                    <th class="col-features"><?php echo __('Features','woocommerce-products-slider'); ?></th>
                    <th class="col-free"><?php echo __('Free','woocommerce-products-slider'); ?></th>
                    <th class="col-pro"><?php echo __('Premium','woocommerce-products-slider'); ?></th>
                </tr>
                </thead>

                <tr>
                    <td class="col-features"><?php echo __('View type - Slider','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <th class="col-features"><?php echo __('Features','woocommerce-products-slider'); ?></th>
                    <th class="col-free"><?php echo __('Free','woocommerce-products-slider'); ?></th>
                    <th class="col-pro"><?php echo __('Premium','woocommerce-products-slider'); ?></th>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Buy now','woocommerce-products-slider'); ?></td>
                    <td> </td>
                    <td><a class="button" href="https://www.pickplugins.com/item/woocommerce-products-slider-for-wordpress/?ref=dashobard"><?php echo __('Buy premium', 'woocommerce-products-slider'); ?></a></td>
                </tr>

            </table>



            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'get_pro',
//                'parent'		=> 'related_post_settings',
                'title'		=> __('Get pro version','woocommerce-products-slider'),
                'details'	=> '',
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);


            ?>


        </div>

        <style type="text/css">
            .pro-features{
                margin: 30px 0;
                border-collapse: collapse;
                border: 1px solid #ddd;
            }
            .pro-features th{
                width: 120px;
                background: #ddd;
                padding: 10px;
            }
            .pro-features tr{
            }
            .pro-features td{
                border-bottom: 1px solid #ddd;
                padding: 10px 10px;
                text-align: center;
            }
            .pro-features .col-features{
                width: 230px;
                text-align: left;
            }

            .pro-features .col-free{
            }
            .pro-features .col-pro{
            }

            .pro-features i.fas.fa-check {
                color: #139e3e;
                font-size: 16px;
            }
            .pro-features i.fas.fa-times {
                color: #f00;
                font-size: 17px;
            }
        </style>
        <?php


    }
}







add_action('wcps_metabox_save','wcps_metabox_save');

function wcps_metabox_save($job_id){

    $wcps_options = isset($_POST['wcps_options']) ? stripslashes_deep($_POST['wcps_options']) : '';
    update_post_meta($job_id, 'wcps_options', $wcps_options);


//    $job_bm_total_vacancies = isset($_POST['job_bm_total_vacancies']) ? sanitize_text_field($_POST['job_bm_total_vacancies']) : '';
//    update_post_meta($job_id, 'job_bm_total_vacancies', $job_bm_total_vacancies);


}

