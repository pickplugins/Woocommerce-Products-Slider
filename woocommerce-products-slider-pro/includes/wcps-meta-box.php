<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

function wcps_posttype_register() {

    $labels = array(
        'name' => __('WCPS',  wcps_textdomain),
        'singular_name' => __('WCPS',  wcps_textdomain),
        'add_new' => __('New WCPS',  wcps_textdomain),
        'add_new_item' => __('New WCPS', wcps_textdomain),
        'edit_item' => __('Edit WCPS', wcps_textdomain),
        'new_item' => __('New WCPS', wcps_textdomain),
        'view_item' => __('View WCPS', wcps_textdomain),
        'search_items' => __('Search WCPS', wcps_textdomain),
        'not_found' =>  __('Nothing found', wcps_textdomain),
        'not_found_in_trash' => __('Nothing found in Trash', wcps_textdomain),
        'parent_item_colon' => ''
    );


    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => null,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-media-spreadsheet',

    );

    register_post_type( 'wcps' , $args );

}

add_action('init', 'wcps_posttype_register');


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_wcps(){

    $screens = array( 'wcps' );
    global $post;
    $post_id = $post->ID;




    foreach ( $screens as $screen ){
        add_meta_box('wcps_metabox',__('WCPS Options', 'post-grid'),'meta_boxes_wcps_input', $screen);
        //add_meta_box('wcps_metabox_side',__('Post Grid Information', 'post-grid'),'meta_boxes_wcps_side', $screen,'side');
    }



}
add_action( 'add_meta_boxes', 'meta_boxes_wcps' );





function meta_boxes_wcps_input( $post ) {

    global $post;
    wp_nonce_field( 'meta_boxes_wcps_input', 'meta_boxes_wcps_input_nonce' );

    $post_id = $post->ID;


    $wcps_settings_tab = array();


    $wcps_settings_tab[] = array(
        'id' => 'shortcode',
        'title' => __('<i class="fas fa-laptop-code"></i> Shortcode','post-grid'),
        'priority' => 1,
        'active' => false,
    );


    $wcps_settings_tab[] = array(
        'id' => 'options',
        'title' => __('<i class="fa fa-cogs"></i> Options','post-grid'),
        'priority' => 2,
        'active' => false,
    );

    $wcps_settings_tab[] = array(
        'id' => 'query_product',
        'title' => __('<i class="fas fa-qrcode"></i> Query Product','post-grid'),
        'priority' => 3,
        'active' => false,
    );

    $wcps_settings_tab[] = array(
        'id' => 'style',
        'title' => __('<i class="fas fa-palette"></i> Style','post-grid'),
        'priority' => 4,
        'active' => false,
    );

    $wcps_settings_tab[] = array(
        'id' => 'elements',
        'title' => __('<i class="fa fa-magic"></i> Elements','post-grid'),
        'priority' => 5,
        'active' => true,
    );

    $wcps_settings_tab[] = array(
        'id' => 'custom_scripts',
        'title' => __('<i class="far fa-file-code"></i> Custom CSS','post-grid'),
        'priority' => 6,
        'active' => false,
    );




    $wcps_settings_tabs = apply_filters('wcps_settings_tabs', $wcps_settings_tab);


    $tabs_sorted = array();
    foreach ($wcps_settings_tabs as $page_key => $tab) $tabs_sorted[$page_key] = isset( $tab['priority'] ) ? $tab['priority'] : 0;
    array_multisort($tabs_sorted, SORT_ASC, $wcps_settings_tabs);







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






/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */



function meta_boxes_wcps_save( $post_id ) {

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


    $wcps_query_orderby = stripslashes_deep( $_POST['wcps_query_orderby'] );
    update_post_meta( $post_id, 'wcps_query_orderby', $wcps_query_orderby );





}
add_action( 'save_post', 'meta_boxes_wcps_save' );



