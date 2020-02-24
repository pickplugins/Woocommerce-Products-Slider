<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_wcps(){

    $screens = array( 'wcps' );
    global $post;
    $post_id = $post->ID;




    foreach ( $screens as $screen ){
        add_meta_box('wcps_metabox',__('WCPS Options', 'woocommerce-products-slider'),'meta_boxes_wcps_input', $screen);
        //add_meta_box('wcps_metabox_side',__('Post Grid Information', 'woocommerce-products-slider'),'meta_boxes_wcps_side', $screen,'side');
        add_meta_box('wcps_metabox_side',__('PickPlugins Product Slider', 'woocommerce-products-slider'),'meta_boxes_wcps_side', $screen,'side');

    }



}
add_action( 'add_meta_boxes', 'meta_boxes_wcps' );





function meta_boxes_wcps_input( $post ) {

    global $post;
    wp_nonce_field( 'meta_boxes_wcps_input', 'meta_boxes_wcps_input_nonce' );

    $post_id = $post->ID;
    $team_options = get_post_meta($post_id,'team_options', true);

    $current_tab = isset($team_options['current_tab']) ? $team_options['current_tab'] : 'query_product';


    $wcps_settings_tab = array();

    $wcps_settings_tabs[] = array(
        'id' => 'shortcode',
        'title' => sprintf(__('%s Shortcode','team'),'<i class="fas fa-laptop-code"></i>'),
        'priority' => 1,
        'active' => ($current_tab == 'shortcode') ? true : false,
    );

    $wcps_settings_tabs[] = array(
        'id' => 'slider_options',
        'title' => sprintf(__('%s Slider options','team'),'<i class="fa fa-cogs"></i>'),
        'priority' => 2,
        'active' => ($current_tab == 'slider_options') ? true : false,
    );

    $wcps_settings_tabs[] = array(
        'id' => 'query_product',
        'title' => sprintf(__('%s Query product','team'),'<i class="fas fa-qrcode"></i>'),
        'priority' => 3,
        'active' => ($current_tab == 'query_product') ? true : false,
    );

    $wcps_settings_tabs[] = array(
        'id' => 'style',
        'title' => sprintf(__('%s Style','team'),'<i class="fas fa-palette"></i>'),
        'priority' => 4,
        'active' => ($current_tab == 'style') ? true : false,
    );

    $wcps_settings_tabs[] = array(
        'id' => 'elements',
        'title' => sprintf(__('%s Elements','team'),'<i class="fa fa-magic"></i>'),
        'priority' => 5,
        'active' => ($current_tab == 'style') ? true : false,
    );

    $wcps_settings_tabs[] = array(
        'id' => 'custom_scripts',
        'title' => sprintf(__('%s Custom scripts','team'),'<i class="far fa-file-code"></i>'),
        'priority' => 6,
        'active' => ($current_tab == 'style') ? true : false,
    );





    $wcps_settings_tabs = apply_filters('wcps_settings_tabs', $wcps_settings_tabs);


    $tabs_sorted = array();
    foreach ($wcps_settings_tabs as $page_key => $tab) $tabs_sorted[$page_key] = isset( $tab['priority'] ) ? $tab['priority'] : 0;
    array_multisort($tabs_sorted, SORT_ASC, $wcps_settings_tabs);


    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script('jquery-ui-accordion');

    wp_enqueue_style( 'jquery-ui');
    wp_enqueue_style( 'font-awesome-5' );
    wp_enqueue_style( 'settings-tabs' );
    wp_enqueue_script( 'settings-tabs' );




    ?>

    <div class="wcps-meta-box">

        <div class="settings-tabs vertical">
            <ul class="tab-navs">
                <?php
                foreach ($wcps_settings_tabs as $tab){
                    $id = $tab['id'];
                    $title = $tab['title'];
                    $active = $tab['active'];
                    $data_visible = isset($tab['data_visible']) ? $tab['data_visible'] : '';
                    $hidden = isset($tab['hidden']) ? $tab['hidden'] : false;
                    ?>
                    <li <?php if(!empty($data_visible)):  ?> data_visible="<?php echo $data_visible; ?>" <?php endif; ?> class="tab-nav <?php if($hidden) echo 'hidden';?> <?php if($active) echo 'active';?>" data-id="<?php echo $id; ?>"><?php echo $title; ?></li>
                    <?php
                }
                ?>
            </ul>
            <?php
            foreach ($wcps_settings_tabs as $tab){
                $id = $tab['id'];
                $title = $tab['title'];
                $active = $tab['active'];


                ?>

                <div class="tab-content <?php if($active) echo 'active';?>" id="<?php echo $id; ?>">
                    <?php
                    do_action('wcps_meta_tab_content_'.$id, $tab, $post_id);
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="clear clearfix"></div>

    </div>










    <?php



}



function meta_boxes_wcps_side( $post ) {

    ?>
    <div class="post-grid-meta-box">

        <ul>
            <li>Version: <?php echo wcps_plugin_version; ?></li>
            <li>Tested WP: 5.1</li>

        </ul>

        <h3>Documentation</h3>
        <a class="button" href="https://www.pickplugins.com/documentation/woocommerce-products-slider/?ref=dashboard" target="_blank">Documentation</a><p class="description">Before asking, submitting reviews please take a look on our documentation, may help your issue fast.</p>

        <h3>Looking for support?</h3>
        <a class="button" href="https://www.pickplugins.com/forum/?ref=dashboard" target="_blank">Create Ticket</a><p class="description">Its free and you can ask any question about our plugins and get support fast.</p>


        <h3>Provide your feedback</h3>

        <a class="button" href="https://wordpress.org/support/plugin/woocommerce-products-slider/reviews/?filter=5" target="_blank">Submit Reviews</a> <a class="button" href="https://wordpress.org/support/plugin/woocommerce-products-slider/#new-topic-0" target="_blank">Ask wordpress.org</a><p>We spent thousand+ hours to development on this plugin, please submit your reviews wisely.</p><p>If you have any issue with this plugin please submit our forums or contact our support first.</p><p class="description">Your feedback and reviews are most important things to keep our development on track. If you have time please submit us five star <a href="https://wordpress.org/support/plugin/woocommerce-products-slider/reviews/?filter=5"> <span style="color: orange"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></a> reviews.</p>




        <?php
        $class_wcps_support = new class_wcps_support();

       ?>



        <?php
        $video_tutorials =  $class_wcps_support->faq();
        if(!empty($video_tutorials)):
            ?>
            <div class="faq">
                <h3>FAQ</h3>
                <ul>
                    <?php
                    foreach($video_tutorials as $item){
                        ?>
                        <li class="item">
                            <a target="_blank" href="<?php echo $item['url']; ?>"><i class="fa fa-question"></i> <?php echo $item['title']; ?></a>

                        </li>
                        <?php
                    }

                    ?>
                </ul>
            </div>
        <?php

        endif;
        ?>



        <?php
        $video_tutorials =  $class_wcps_support->video_tutorials();
        if(!empty($video_tutorials)):
            ?>
            <div class="video-tutorials">
                <h3>Video Tutorials</h3>
                <ul>
                <?php
                foreach($video_tutorials as $item){
                    ?>
                    <li class="item">
                        <a target="_blank" href="<?php echo $item['video_url']; ?>"><i class="far fa-dot-circle"></i> <?php echo $item['title']; ?></a>

                    </li>
                    <?php
                }

                ?>
                </ul>
            </div>
            <?php

        endif;
        ?>











    </div>
    <?php

}






/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */



function wcps_metaboxe_save( $post_id ) {

    /*
     * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['meta_boxes_wcps_input_nonce'] ) )
        return $post_id;

    $nonce = $_POST['meta_boxes_wcps_input_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'meta_boxes_wcps_input' ) )
        return $post_id;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;



    /* OK, its safe for us to save the data now. */

    // Sanitize user input.
    //$wcps_collapsible = sanitize_text_field( $_POST['wcps_collapsible'] );





    /* OK, its safe for us to save the data now. */

    do_action('wcps_metaboxe_save', $post_id);


}
add_action( 'save_post', 'wcps_metaboxe_save' );



