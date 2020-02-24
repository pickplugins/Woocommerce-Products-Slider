<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

class class_wcps_metabox{
	
	public function __construct(){

		//meta box action for "wcps"
		add_action('add_meta_boxes', array($this, 'wcps_post_meta_wcps'));
		add_action('save_post', array($this, 'meta_boxes_wcps_save'));



		}


	public function wcps_post_meta_wcps($post_type){

            add_meta_box('metabox-wcps',__('WCPS data', 'woocommerce-products-slider'), array($this, 'meta_box_wcps_data'), 'wcps', 'normal', 'high');

		}






	public function meta_box_wcps_data($post) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field('wcps_nonce_check', 'wcps_nonce_check_value');
 
        // Use get_post_meta to retrieve an existing value from the database.
       // $wcps_data = get_post_meta($post -> ID, 'wcps_data', true);

        $post_id = $post->ID;



        $settings_tabs_field = new settings_tabs_field();

        $wcps_options = get_post_meta($post_id,'wcps_options', true);
        $current_tab = isset($wcps_options['current_tab']) ? $wcps_options['current_tab'] : 'layouts';


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
            'id' => 'layouts',
            'title' => sprintf(__('%s Layouts','team'),'<i class="fas fa-palette"></i>'),
            'priority' => 5,
            'active' => ($current_tab == 'layouts') ? true : false,
        );


        $wcps_settings_tabs[] = array(
            'id' => 'custom_scripts',
            'title' => sprintf(__('%s Custom scripts','team'),'<i class="far fa-file-code"></i>'),
            'priority' => 6,
            'active' => ($current_tab == 'custom_scripts') ? true : false,
        );

        $wcps_settings_tabs[] = array(
            'id' => 'help_support',
            'title' => sprintf(__('%s Help support','team'),'<i class="far fa-file-code"></i>'),
            'priority' => 80,
            'active' => ($current_tab == 'help_support') ? true : false,
        );

        $wcps_settings_tabs[] = array(
            'id' => 'buy_pro',
            'title' => sprintf(__('%s Buy pro','team'),'<i class="far fa-file-code"></i>'),
            'priority' => 90,
            'active' => ($current_tab == 'buy_pro') ? true : false,
        );

        $wcps_settings_tabs = apply_filters('wcps_metabox_navs', $wcps_settings_tabs);

        $tabs_sorted = array();

        if(!empty($wcps_settings_tabs))
        foreach ($wcps_settings_tabs as $page_key => $tab) $tabs_sorted[$page_key] = isset( $tab['priority'] ) ? $tab['priority'] : 0;
        array_multisort($tabs_sorted, SORT_ASC, $wcps_settings_tabs);





		?>


        <div class="settings-tabs vertical">
            <input class="current_tab" type="hidden" name="wcps_options[current_tab]" value="<?php echo $current_tab; ?>">


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
                    do_action('wcps_metabox_content_'.$id, $post_id);
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="clear clearfix"></div>

        <?php


   		}




	public function meta_boxes_wcps_save($post_id){

        /*
         * We need to verify this came from the our screen and with
         * proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['wcps_nonce_check_value']))
            return $post_id;

        $nonce = $_POST['wcps_nonce_check_value'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'wcps_nonce_check'))
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id))
                return $post_id;

        } else {

            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        /* OK, its safe for us to save the data now. */

        do_action('wcps_metabox_save', $post_id);


					
		}
	
	}


new class_wcps_metabox();