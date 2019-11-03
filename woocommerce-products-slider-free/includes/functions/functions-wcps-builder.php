<?php
if ( ! defined('ABSPATH')) exit;  // if direct access






add_action('wcps_layer_options_content','wcps_layer_options_content');

function wcps_layer_options_content($layer){

    //$wcps_id = $args['wcps_id'];

    ?>
    <div class="control-group">
        <div class="control-group-header">Layer settings

            <div class="icon">
                <span class="expand"><i class="far fa-plus-square"></i></span>
                <span class="collapse"><i class="far fa-minus-square"></i></span>
            </div>
        </div>
        <div class="control-group-body">

ggg
            <?php

            ?>

        </div>


    </div>
    <?php

}


add_action('wcps_layer_options_media','wcps_layer_options_media');

function wcps_layer_options_media($layer){

    //$wcps_id = $args['wcps_id'];

    ?>
    <div class="control-group">
        <div class="control-group-header">Layer settings

            <div class="icon">
                <span class="expand"><i class="far fa-plus-square"></i></span>
                <span class="collapse"><i class="far fa-minus-square"></i></span>
            </div>
        </div>
        <div class="control-group-body">

            ggg
            <?php

            ?>

        </div>


    </div>
    <?php

}











