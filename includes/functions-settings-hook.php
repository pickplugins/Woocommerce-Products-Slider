<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_action('wcps_settings_content_general', 'wcps_settings_content_general');

function wcps_settings_content_general(){
    $settings_tabs_field = new settings_tabs_field();

    $wcps_settings = get_option('wcps_settings');

    $track_product_view = isset($wcps_settings['track_product_view']) ? $wcps_settings['track_product_view'] : 'no';
    $social_media_sites = isset($wcps_settings['social_media_sites']) ? $wcps_settings['social_media_sites'] : array();
    $font_aw_version = isset($wcps_settings['font_aw_version']) ? $wcps_settings['font_aw_version'] : 'none';

    ?>
    <div class="section">
        <div class="section-title"><?php echo __('General', 'woocommerce-products-slider'); ?></div>
        <p class="description section-description"><?php echo __('Choose some general options.', 'woocommerce-products-slider'); ?></p>

        <?php




        $args = array(
            'id'		=> 'track_product_view',
            'parent' => 'wcps_settings',
            'title'		=> __('Team member slug','woocommerce-products-slider'),
            'details'	=> __('Write custom team member slug.','woocommerce-products-slider'),
            'type'		=> 'select',
            'value'		=> $track_product_view,
            'default'		=> '',
            'args'		=> array('no'=>'No','yes'=>'Yes' ),
        );

        $settings_tabs_field->generate_field($args);


        $social_field = array(

            array(
                'id'		=> 'name',
                'title'		=> __('Meta Name','woocommerce-products-slider'),
                'details'	=> __('Write meta field name here.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),
            array(
                'id'		=> 'meta_key',
                'title'		=> __('Meta key','woocommerce-products-slider'),
                'details'	=> __('Write meta key here.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> 'meta_key',
            ),

            array(
                'id'		=> 'icon',
                'title'		=> __('Add icon','woocommerce-products-slider'),
                'details'	=> __('Upload icon image here.','woocommerce-products-slider'),
                'type'		=> 'media_url',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),

            array(
                'id'		=> 'font_icon',
                'title'		=> __('Add font icon','woocommerce-products-slider'),
                'details'	=> __('Add font icon html here, you can use <a href="https://fontawesome.com/icons">fontawesome</a>  ex: <code> &lt;i class="fab fa-facebook-square">&lt;/i></code>.','woocommerce-products-slider'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '<i class=&quot;fab fa-facebook-square&quot;></i>',
            ),

            array(
                'id'		=> 'visibility',
                'title'		=> __('Visibility','woocommerce-products-slider'),
                'details'	=> __('Choose visibility.','woocommerce-products-slider'),
                'type'		=> 'select',
                'value'		=> '',
                'default'		=> '',
                'args'		=> array('1'=>'Yes',''=>'No'),
            ),

        );


        $args = array(
            'id'		=> 'social_media_sites',
            'parent'		=> 'wcps_settings',
            'title'		=> __('Social share media','text-domain'),
            'details'	=> __('Custom social share button inputs.','text-domain'),
            'collapsible'=> true,
            'type'		=> 'repeatable',
            'limit'		=> 10,
            'title_field'		=> 'name',
            'value'		=> $social_media_sites,
            'fields'    => $social_field,
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'font_aw_version',
            'parent'		=> 'wcps_settings',
            'title'		=> __('Font-awesome version','related-post'),
            'details'	=> __('Choose font awesome version you want to load.','related-post'),
            'type'		=> 'select',
            'value'		=> $font_aw_version,
            'default'		=> 'none',
            'args'		=> array('v_5'=>__('Version 5+','related-post'), 'v_4'=>__('Version 4+','related-post'), 'none'=>__('None','related-post')  ),
        );

        $settings_tabs_field->generate_field($args);

        ?>

    </div>

    <?php





}


add_action('wcps_settings_content_help_support', 'wcps_settings_content_help_support');

if(!function_exists('wcps_settings_content_help_support')) {
    function wcps_settings_content_help_support($tab){

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
            <a class="button" href="https://www.pickplugins.com/documentation/team/"><?php echo __('Documentation', 'woocommerce-products-slider'); ?></a>

            <p><?php echo __('Watch video tutorials.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.youtube.com/playlist?list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy"><i class="fab fa-youtube"></i> <?php echo __('All tutorials', 'woocommerce-products-slider'); ?></a>

            <ul>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=SOe0D-Og3nQ&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=1">How to install plugin & setup</a></li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=zdaRmH_KGCI&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=2">How to create team showcase</a></li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=T2LyT-K4TF8&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=3">Display team showcase slider</a> [pro]</li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=zcWP-rB1xG0&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=4">Create filterable style grid</a> [pro]</li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=HjrePb90ToA&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=5">Add custom filter</a> [pro]</li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=8AWlEOLmgA4&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=6">Create glossary grid</a> [pro]</li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=n1aiPFL7QoM&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=7">Team showcase masonry style</a></li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=zDGM9KQxQbg&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=8">Team showcase pagination</a></li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=0YBEhSOXSeI&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=9">Team showcase customize layouts</a></li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=A5ARR__VimA&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=10">Query team members ids</a> [pro]</li>
                <li><i class="far fa-dot-circle"></i> <a href="https://www.youtube.com/watch?v=TtwkAKgYG-M&list=PL0QP7T2SN94atYZswlnBMhDuIYoqlmlxy&index=11">Customize team member page</a></li>

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

            <p class="">We wish your 2 minutes to write your feedback about the team plugin. give us <span style="color: #ffae19"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></p>

            <a target="_blank" href="https://wordpress.org/plugins/team/#reviews" class="button"><i class="fab fa-wordpress"></i> Write a review</a>


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


            ob_start();
            $team_plugin_info = get_option('team_plugin_info');

            $migration_reset_stats = isset($team_plugin_info['migration_reset']) ? $team_plugin_info['migration_reset'] : '';

            $actionurl = admin_url().'edit.php?post_type=team&page=settings&tab=help_support';
            $actionurl = wp_nonce_url( $actionurl,  'team_reset_migration' );

            $nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : '';

            if ( wp_verify_nonce( $nonce, 'team_reset_migration' )  ){

                $team_plugin_info['migration_reset'] = 'processing';
                update_option('team_plugin_info', $team_plugin_info);

                wp_schedule_event(time(), '2minute', 'team_cron_reset_migrate');


                $migration_reset_stats = 'processing';
            }

            //var_dump($migration_reset_stats);


            if($migration_reset_stats == 'processing'){
                ?>
                <p style="color: #f00;"><i class="fas fa-spin fa-spinner"></i> Migration reset on process, please wait until complete.</p>
                <p><a href="<?php echo admin_url().'edit.php?post_type=team&page=settings&tab=help_support'; ?>">Refresh</a> to check Migration reset stats</p>
                <?php
            }elseif($migration_reset_stats == 'done'){
                ?>
                <p style="color: #22631a;font-weight: bold;"><i class="fas fa-check"></i> Migration reset completed.</p>
                <?php
            }else{

            }



            ?>

            <p class="">Please click the button bellow to reset migration data, you can start over, Please use with caution, your new migrate data will deleted. you can use default <a href="<?php echo admin_url().'export.php'; ?>">export</a> menu to take your team member, team or layouts data saved.</p>

            <p class="reset-migration"><a class="button  button-primary" href="<?php echo $actionurl; ?>">Reset migration</a> <span style="display: none; color: #f2433f; margin: 0 5px"> Click again to confirm!</span></p>

            <script>
                jQuery(document).ready(function($){
                    $(document).on('click','.reset-migration a',function(event){

                        event.preventDefault();

                        is_confirm = $(this).attr('confirm');
                        url = $(this).attr('href');

                        if(is_confirm == 'ok'){
                            window.location.href = url;
                        }else{
                            $(this).attr('confirm', 'ok');


                        }
                        $('.reset-migration span').fadeIn();

                    })
                })
            </script>

            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'reset_migrate',
                //'parent'		=> '',
                'title'		=> __('Reset migration','woocommerce-products-slider'),
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






add_action('wcps_settings_content_buy_pro', 'wcps_settings_content_buy_pro');

if(!function_exists('wcps_settings_content_buy_pro')) {
    function wcps_settings_content_buy_pro($tab){

        $settings_tabs_field = new settings_tabs_field();


        ?>
        <div class="section">
            <div class="section-title"><?php echo __('Get Premium', 'woocommerce-products-slider'); ?></div>
            <p class="description section-description"><?php echo __('Thanks for using our plugin, if you looking for some advance feature please buy premium version.', 'woocommerce-products-slider'); ?></p>

            <?php


            ob_start();
            ?>

            <p><?php echo __('If you love our plugin and want more feature please consider to buy pro version.', 'woocommerce-products-slider'); ?></p>
            <a class="button" href="https://www.pickplugins.com/item/team-responsive-meet-the-team-grid-for-wordpress/?ref=dashobard"><?php echo __('Buy premium', 'woocommerce-products-slider'); ?></a>
            <a class="button" href="http://www.pickplugins.com/demo/team/?ref=dashobard"><?php echo __('See all demo', 'woocommerce-products-slider'); ?></a>

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
                    <td class="col-features"><?php echo __('View type - Slider','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/slider/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('View type - Filterable','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/filterable/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('View type - Glossary','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/glossary-custom-index/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Access to layout library(30+ ready layout)','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Query by team members id','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Pagination type - jQuery','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Pagination type - Ajax','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/ajax-pagination/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Pagination type - Load more','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/load-more/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Skill','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/skill-bars/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>


                <tr>
                    <td class="col-features"><?php echo __('Team members custom class','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('View type - Grid','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/view-type-grid/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Masonry style grid','woocommerce-products-slider'); ?> <a href="http://www.pickplugins.com/demo/team/masonry/?ref=dashobard"><?php echo __('Demo', 'woocommerce-products-slider'); ?></a></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Item custom width','woocommerce-products-slider'); ?> </td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Item margin','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Item text align','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Container style','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout builder','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Wrapper start','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Wrapper end','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Thumbnail','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Layout element - Title','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Layout element - Position','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Content','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Layout element - Social','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Layout element - Meta fields','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Pagination type - Normal','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Hide Pagination','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Custom CSS','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Custom JS','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>



                <tr>
                    <td class="col-features"><?php echo __('Hide featured image(Team member page)','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Hide post title(Team member page)','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Custom team member slug','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td class="col-features"><?php echo __('Custom meta fields','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

                <tr>
                    <td class="col-features"><?php echo __('Custom social fields','woocommerce-products-slider'); ?></td>
                    <td><i class="fas fa-check"></i></td>
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
                    <td><a class="button" href="https://www.pickplugins.com/item/team-responsive-meet-the-team-grid-for-wordpress/?ref=dashobard"><?php echo __('Buy premium', 'woocommerce-products-slider'); ?></a></td>
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









add_action('wcps_settings_save', 'wcps_settings_save');

function wcps_settings_save(){

    $wcps_settings = isset($_POST['wcps_settings']) ?  stripslashes_deep($_POST['wcps_settings']) : array();
    update_option('wcps_settings', $wcps_settings);
}
