<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

if( ! class_exists( 'class_wcps_shortcodes' ) ) {
    class class_wcps_shortcodes{


        public function __construct(){

            add_shortcode('wcps', array($this, 'wcps_new_display'));

        }

        public function wcps_new_display($atts, $content = null ) {
            $atts = shortcode_atts(
                array(
                    'id' => "",
                ), $atts
            );

            $html = '';
            $wcps_id = isset($atts['id']) ? $atts['id'] : '';

            $args = array('wcps_id'=> $wcps_id);

            ob_start();
            ?>
            <div id="wcps-container-<?php echo $wcps_id; ?>" class="wcps-container wcps-container-<?php echo $wcps_id; ?>">
                <?php
                do_action('wcps_slider_main', $args);
                ?>
            </div>
            <?php
            return ob_get_clean();
        }



    }
}
new class_wcps_shortcodes();