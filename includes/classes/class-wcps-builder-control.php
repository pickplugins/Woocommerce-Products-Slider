<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

if( ! class_exists( 'wcps_builder_control' ) ) {
class wcps_builder_control{


    function field_template($option){

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";
        $control_group_class 			= isset( $option['control_group_class'] ) ? $option['control_group_class'] : "";
        $control_desc_class 			= isset( $option['control_desc_class'] ) ? $option['control_desc_class'] : "top-middle";

        //var_dump($option);

        ob_start();

        ?>
        <div class="control-wrap <?php echo $control_group_class; ?>">
            <div class="control-title">%s
                <span  data-title="%s" class="control-description <?php echo $control_desc_class; ?>"><i class="far fa-question-circle"></i></span>
            </div>
            <div class="control-input">%s</div>
        </div>
        <?php

        return ob_get_clean();

    }


    function generate_field($option){

        $id 		= isset( $option['id'] ) ? $option['id'] : "";
        $type 		= isset( $option['type'] ) ? $option['type'] : "";
        $details 	= isset( $option['details'] ) ? $option['details'] : "";


        //var_dump($option);



        if( empty( $id ) ) return;

        if( isset($option['type']) && $option['type'] === 'select' ) 		    $this->field_select( $option );
        elseif( isset($option['type']) && $option['type'] === 'select2')	    $this->field_select2( $option );
        elseif( isset($option['type']) && $option['type'] === 'checkbox')	    $this->field_checkbox( $option );
        elseif( isset($option['type']) && $option['type'] === 'radio')		    $this->field_radio( $option );
        elseif( isset($option['type']) && $option['type'] === 'radio_image')	$this->field_radio_image( $option );
        elseif( isset($option['type']) && $option['type'] === 'textarea')	    $this->field_textarea( $option );
        elseif( isset($option['type']) && $option['type'] === 'scripts_js')	    $this->field_scripts_js( $option );
        elseif( isset($option['type']) && $option['type'] === 'scripts_css')	$this->field_scripts_css( $option );
        elseif( isset($option['type']) && $option['type'] === 'number' ) 	    $this->field_number( $option );
        elseif( isset($option['type']) && $option['type'] === 'hidden' ) 		    $this->field_hidden( $option );

        elseif( isset($option['type']) && $option['type'] === 'text' ) 		    $this->field_text( $option );
        elseif( isset($option['type']) && $option['type'] === 'text_icon' )     $this->field_text_icon( $option );
        elseif( isset($option['type']) && $option['type'] === 'text_multi' ) 	$this->field_text_multi( $option );
        elseif( isset($option['type']) && $option['type'] === 'text_multi_predefine' ) 	$this->field_text_multi_predefine( $option );

        elseif( isset($option['type']) && $option['type'] === 'range' ) 		$this->field_range( $option );
        elseif( isset($option['type']) && $option['type'] === 'colorpicker')    $this->field_colorpicker( $option );
        elseif( isset($option['type']) && $option['type'] === 'colorpicker_multi')    $this->field_colorpicker_multi( $option );

        elseif( isset($option['type']) && $option['type'] === 'spectrum')    $this->field_spectrum( $option );


        elseif( isset($option['type']) && $option['type'] === 'padding' ) 	    $this->field_padding( $option );
        elseif( isset($option['type']) && $option['type'] === 'font_size' ) 	    $this->field_font_size( $option );


        elseif( isset($option['type']) && $option['type'] === 'datepicker')	    $this->field_datepicker( $option );
        //elseif( isset($option['type']) && $option['type'] === 'repeater')	    $this->field_repeater( $option );
        elseif( isset($option['type']) && $option['type'] === 'faq')	        $this->field_faq( $option );
        elseif( isset($option['type']) && $option['type'] === 'addons_grid')	$this->field_addons_grid( $option );
        elseif( isset($option['type']) && $option['type'] === 'custom_html')	$this->field_custom_html( $option );
        elseif( isset($option['type']) && $option['type'] === 'repeatable')	    $this->field_repeatable( $option );
        elseif( isset($option['type']) && $option['type'] === 'media')	        $this->field_media( $option );
        elseif( isset($option['type']) && $option['type'] === 'media_url')	    $this->field_media_url( $option );



        elseif( isset($option['type']) && $option['type'] === $type ) 	do_action( "wcps_builder_control_$type", $option );


        //if( !empty( $details ) ) echo "<p class='description'>$details</p>";





    }




    public function field_media( $option ){



        $id			= isset( $option['id'] ) ? $option['id'] : "";
        if(empty($id)) return;
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $field_name 	= isset( $option['field_name'] ) ? $option['field_name'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $default			= isset( $option['default'] ) ? $option['default'] : '';
        $value			= isset( $option['value'] ) ? $option['value'] : '';
        $value          = !empty($value) ?  $value : $default;

        $media_url	= wp_get_attachment_url( $value );
        $media_type	= get_post_mime_type( $value );
        $media_title= get_the_title( $value );
        $media_url = !empty($media_url) ? $media_url : $placeholder;

        $field_name     = !empty( $field_name ) ? $field_name : $id;
        $field_name = !empty($parent) ? $parent.'['.$field_name.']' : $field_name;


        wp_enqueue_media();

        ob_start();


        ?>
        <div id="input-wrapper-<?php echo $css_id; ?>" class="input-wrapper field-media-wrapper
            field-media-wrapper-<?php echo $css_id; ?>">
            <div class="media-preview-wrap" style="width: 150px;margin-bottom: 10px;background: #eee;padding: 5px;    text-align: center;">
                <?php

                if( "audio/mpeg" == $media_type ){
                    ?>
                    <div class="media-preview" class="dashicons dashicons-format-audio" style="font-size: 70px;display: inline;"></div>
                    <div><?php echo $media_title; ?></div>
                    <?php
                }
                elseif( "images/png" == $media_type || "images/jpg" == $media_type || "images/jpeg" == $media_type ||
                    "images/gif" == $media_type  ||
                    "images/ico" == $media_type){
                    ?>
                    <img class="media-preview" src="<?php echo $media_url; ?>" style="width:100%"/>
                    <div><?php echo $media_title; ?></div>
                    <?php
                }

                else {
                    ?>
                    <img class="media-preview" src="<?php echo $media_url; ?>" style="width:100%"/>
                    <span><?php echo wp_basename($media_type); ?></span>

                    <?php
                }
                ?>
            </div>
            <input type="hidden" name="<?php echo $field_name; ?>" id="media_input_<?php echo $css_id; ?>" value="<?php echo $value; ?>" />
            <div class="media-upload button" id="media_upload_<?php echo $css_id; ?>"><?php echo __('Upload','job-board-manager');?></div>
            <div class="clear button" id="media_clear_<?php echo $css_id; ?>"><?php echo __('Clear','job-board-manager');?></div>
            <div class="error-mgs"></div>
        </div>

        <?php


        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }



    public function field_media_url( $option ){



        $id			= isset( $option['id'] ) ? $option['id'] : "";
        if(empty($id)) return;
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $field_name 	= isset( $option['field_name'] ) ? $option['field_name'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $default			= isset( $option['default'] ) ? $option['default'] : '';
        $value			= isset( $option['value'] ) ? $option['value'] : '';
        $value          = !empty($value) ?  $value : $default;

        $media_url	= $value;
        $media_type	= get_post_mime_type( $value );
        $media_title= get_the_title( $value );
        $media_url = !empty($media_url) ? $media_url : '';

        $field_name     = !empty( $field_name ) ? $field_name : $id;
        $field_name = !empty($parent) ? $parent.'['.$field_name.']' : $field_name;


        wp_enqueue_media();
        ob_start();


        ?>
        <div id="input-wrapper-<?php echo $css_id; ?>" class="input-wrapper field-media-url-wrapper
            field-media-wrapper-<?php echo $css_id; ?>">
            <div class="media-preview-wrap" style="width: 150px;margin-bottom: 10px;background: #eee;padding: 5px;    text-align: center;">
                <?php

                if( "audio/mpeg" == $media_type ){
                    ?>
                    <div class="media-preview" class="dashicons dashicons-format-audio" style="font-size: 70px;display: inline;"></div>

                    <?php
                }
                elseif( "images/png" == $media_type || "images/jpg" == $media_type || "images/jpeg" == $media_type ||
                    "images/gif" == $media_type  ||
                    "images/ico" == $media_type){
                    ?>
                    <img class="media-preview" src="<?php echo $media_url; ?>" style="width:100%"/>

                    <?php
                }

                else {
                    ?>
                    <img class="media-preview" src="<?php echo $media_url; ?>" style="width:100%"/>

                    <?php
                }
                ?>
            </div>
            <input type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $field_name; ?>" id="media_input_<?php echo $css_id; ?>" value="<?php echo $value; ?>" />
            <div class="media-upload button" id="media_upload_<?php echo $css_id; ?>"><?php echo __('Upload','job-board-manager');?></div>
            <div class="clear button" id="media_clear_<?php echo $css_id; ?>"><?php echo __('Clear','job-board-manager');?></div>
            <div class="error-mgs"></div>
        </div>

        <?php


        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }





    public function field_repeatable( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        if(empty($id)) return;
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_name 	= isset( $option['field_name'] ) ? $option['field_name'] : $id;
        $field_name     = !empty( $parent ) ? $parent.'['.$field_name.']' : $field_name;

        $sortable 	    = isset( $option['sortable'] ) ? $option['sortable'] : true;
        $collapsible 	= isset( $option['collapsible'] ) ? $option['collapsible'] : true;
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $values			= isset( $option['value'] ) ? $option['value'] : array();
        $fields 		= isset( $option['fields'] ) ? $option['fields'] : array();
        $title_field 	= isset( $option['title_field'] ) ? $option['title_field'] : '';
        $remove_text 	= isset( $option['remove_text'] ) ? $option['remove_text'] : '<i class="fas fa-times"></i>';
        $limit 	        = isset( $option['limit'] ) ? $option['limit'] : '';

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $settings_tabs_field = new settings_tabs_field();

        ob_start();
        ?>
        <script>
            jQuery(document).ready(function($) {




                jQuery(document).on("click", ".field-repeatable-wrapper-<?php echo $css_id; ?> .add-repeat-field", function() {


                    now = jQuery.now();
                    fields_arr = <?php echo json_encode($fields); ?>;
                    html = '<div class="item-wrap collapsible"><div class="header"><span class="button remove" ' +
                        'onclick="jQuery(this).parent().parent().remove()"><?php echo $remove_text; ?></span> ';
                    <?php if($sortable):?>
                    html += '<span class="button sort" ><i class="fas fa-arrows-alt"></i></span>';
                    <?php endif; ?>
                    html += ' <span  class="title-text">#'+now+'</span></div>';

                    <?php

                    $fieldHtml = '';

                        if(!empty($fields)):
                            foreach ($fields as $field):

                                $fieldType = isset($field['type']) ? $field['type'] : '';
                                $field['parent'] = $field_name.'[TIMEINDEX]';

                                ob_start();
                                ?>
                                <div class="item">
                                    <?php if($collapsible):?>
                                        <div class="content">
                                    <?php endif; ?>

                                    <?php
                                    $settings_tabs_field->generate_field($field);
                                    ?>
                                    <?php if($collapsible):?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <?php
                                $fieldHtml .= ob_get_clean();
                            endforeach;
                        endif;


                    $string = str_replace("\n", "", $fieldHtml);
                    $fieldHtml = str_replace("\r", "", $string);


                    ?>

                    fieldHtml = '<?php echo $fieldHtml; ?>';
                    html+= fieldHtml.replace(/TIMEINDEX/g, now);
                    html+='</div>';

                    jQuery('.<?php echo 'field-repeatable-wrapper-'.$css_id; ?> .repeatable-field-list').append(html);

                })
            });
        </script>
        <div id="input-wrapper-<?php echo $css_id; ?>" class=" input-wrapper field-repeatable-wrapper
            field-repeatable-wrapper-<?php echo $css_id; ?>">
            <div class="add-repeat-field button"><?php _e('Add','job-board-manager'); ?></div>
            <div class="repeatable-field-list sortable" id="<?php echo $css_id; ?>">
                <?php
                if(!empty($values)):
                    $count = 1;
                    foreach ($values as $index=>$val):
                        $title_field_val = !empty($val[$title_field]) ? $val[$title_field] : '#'.$count;
                        ?>
                        <div class="item-wrap <?php if($collapsible) echo 'collapsible'; ?>">
                            <?php if($collapsible):?>
                            <div class="header">
                                <?php endif; ?>
                                <span class="button remove" onclick="jQuery(this).parent().parent().remove()"><?php echo $remove_text; ?></span>
                                <!--                                    <span index_id="--><?php //echo $index; ?><!--" class="button clone"><i class="far fa-clone"></i></span>-->
                                <?php if($sortable):?>
                                    <span class="button sort"><i class="fas fa-arrows-alt"></i></span>
                                <?php endif; ?>
                                <span class="button clone"><i class="far fa-copy"></i></span>

                                <span class="title-text"><?php echo $title_field_val; ?></span>
                                <?php if($collapsible):?>
                            </div>
                        <?php endif; ?>
                            <?php



                            foreach ($fields as $field_index => $field):
                                $fieldId = $field['id'];

                                $title_field_class = ($title_field == $field_index) ? 'title-field':'';
                                ?>
                                <div class="item <?php echo $title_field_class; ?>">
                                    <?php if($collapsible):?>
                                    <div class="content">
                                        <?php endif; ?>

                                        <?php
                                        $field['parent'] = $field_name.'['.$index.']';
                                        $field['value'] = isset($val[$fieldId]) ? $val[$fieldId] : '';

                                        $settings_tabs_field->generate_field($field);


                                        if($collapsible):?>
                                    </div>
                                <?php endif; ?>
                                </div>
                            <?php

                            endforeach; ?>
                        </div>
                        <?php
                        $count++;
                    endforeach;
                else:
                    ?>
                <?php
                endif;
                ?>
            </div>
            <div class="error-mgs"></div>
        </div>

        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);



    }








    public function field_select( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $args 	= isset( $option['args'] ) ? $option['args'] : array();
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $multiple 	= isset( $option['multiple'] ) ? $option['multiple'] : false;
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';


        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }


        if($multiple){
            $value 	= isset( $option['value'] ) ? $option['value'] : array();
            $field_name = !empty($parent) ? $parent.'['.$id.'][]' : $id.'[]';
            $default 	= isset( $option['default'] ) ? $option['default'] : array();
        }else{
            $value 	= isset( $option['value'] ) ? $option['value'] : '';
            $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;
            $default 	= isset( $option['default'] ) ? $option['default'] : '';
        }


        $value = !empty($value) ? $value : $default;




        ob_start();
        ?>
        <select <?php if($multiple) echo 'multiple'; ?> name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>">
            <?php
            foreach( $args as $key => $name ):
                if($multiple){
                    $selected = in_array($key, $value) ? "selected" : "";
                }else{
                    $selected = $value == $key ? "selected" : "";
                }


                ?>
                <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $name; ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);


    }

    public function field_select2( $option ){

        $id 			    = isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $args 	            = isset( $option['args'] ) ? $option['args'] : array();
        $multiple 	        = isset( $option['multiple'] ) ? $option['multiple'] : "";
        $attributes 	    = isset( $option['attributes'] ) ? $option['attributes'] : array();
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	        = isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	        = isset( $option['pro_text'] ) ? $option['pro_text'] : '';


        //var_dump($css_id);

        if($multiple){
            $value 	= isset( $option['value'] ) ? $option['value'] : array();
            $field_name = !empty($parent) ? $parent.'['.$id.'][]' : $id.'[]';
            $default 	= isset( $option['default'] ) ? $option['default'] : array();
        }else{
            $value 	= isset( $option['value'] ) ? $option['value'] : '';
            $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;
            $default 	= isset( $option['default'] ) ? $option['default'] : '';
        }

        $value = !empty($value) ? $value : $default;

        //$value	= get_post_meta( $post_id, $id, true );
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $attributes_html = '';

        foreach ($attributes as $attributeId=>$attribute):

            $attributes_html = $attributeId.'='.$attribute.' ';

        endforeach;


        ob_start();
        ?>
        <select <?php echo $attributes_html; ?> class="select2" <?php if($multiple) echo 'multiple'; ?>  name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>">
            <?php
            foreach( $args as $key => $name ):

                if($multiple){
                    $selected = in_array($key, $value) ? "selected" : "";
                }else{
                    $selected = ($key == $value) ? "selected" : "";
                }

                ?>
                <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $name; ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);





    }





    public function field_text_multi( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";

        $default 	= isset( $option['default'] ) ? $option['default'] : array();
        $values 	= isset( $option['value'] ) ? $option['value'] : $default;

        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $remove_text 	= isset( $option['remove_text'] ) ? $option['remove_text'] : '<i class="fas fa-times"></i>';
        $sortable 	    = isset( $option['sortable'] ) ? $option['sortable'] : true;
        $allow_clone 	    = isset( $option['allow_clone'] ) ? $option['allow_clone'] : false;


        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';


        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <div  id="input-wrapper-<?php echo $id; ?>" class="input-wrapper input-text-multi-wrapper
            input-text-multi-wrapper-<?php echo $css_id; ?>">
            <span data-placeholder="<?php echo esc_attr($placeholder); ?>" data-sort="<?php echo $sortable; ?>" data-clone="<?php echo $allow_clone; ?>" data-name="<?php echo $field_name; ?>[]" class="button add-item"><?php echo __('Add','job-board-manager'); ?></span>
            <div class="field-list <?php if($sortable){ echo 'sortable'; }?>" id="<?php echo $css_id; ?>">
                <?php
                if(!empty($values)):
                    foreach ($values as $value):
                        ?>
                        <div class="item">
                            <input type="text" name="<?php echo esc_attr($field_name); ?>[]"  placeholder="<?php
                            echo esc_attr($placeholder); ?>" value="<?php echo esc_attr($value); ?>" />

                            <?php if($allow_clone):?>
                                <span class="button clone"><i class="far fa-clone"></i></span>
                            <?php endif; ?>


                            <?php if($sortable):?>
                                <span class="button sort"><i class="fas fa-arrows-alt"></i></span>
                            <?php endif; ?>

                            <span class="button remove" onclick="jQuery(this).parent().remove()"><?php echo ($remove_text); ?></span>
                        </div>
                    <?php
                    endforeach;

                else:

                    ?>
                    <div class="item">
                        <input type="text" name="<?php echo esc_attr($field_name); ?>[]"  placeholder="<?php
                        echo esc_attr($placeholder); ?>" value="" />

                        <?php if($allow_clone):?>
                            <span class="button clone"><i class="far fa-clone"></i></span>
                        <?php endif; ?>


                        <?php if($sortable):?>
                            <span class="button sort"><i class="fas fa-arrows-alt"></i></span>
                        <?php endif; ?>

                        <span class="button remove" onclick="jQuery(this).parent().remove()"><?php echo ($remove_text); ?></span>
                    </div>
                <?php

                endif;
                ?>
            </div>
            <div class="error-mgs"></div>


        </div>

        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }


    public function field_text_multi_predefine( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";

        $default 	= isset( $option['default'] ) ? $option['default'] : array();
        $values 	= ( !empty( $option['value'] )) ? $option['value'] : $default;
        $args 	= isset( $option['args'] ) ? $option['args'] : $default;


        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);


        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';


        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <div  id="input-wrapper-<?php echo $id; ?>" class="input-wrapper input-text-multi-wrapper
            input-text-multi-wrapper-<?php echo $css_id; ?>">
            <div class="field-list " id="<?php echo $css_id; ?>">
                <?php
                if(!empty($args)):
                    foreach ($args as $args_index => $arg):

                        $name =$arg['name'];
                        ?>
                        <div class="item">
                            <label><?php echo $name; ?></label>
                            <input type="text" name="<?php echo esc_attr($field_name); ?>[<?php echo esc_attr($args_index); ?>]"  placeholder="<?php
                            echo esc_attr($placeholder); ?>" value="<?php echo esc_attr($values[$args_index]); ?>" />

                        </div>
                    <?php
                    endforeach;

                endif;
                ?>
            </div>
            <div class="error-mgs"></div>


        </div>

        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }


    public function field_padding( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <div class="control-padding">
            <div class="item">
                <input type="number" class="" name="<?php echo $field_name; ?>[top][value]" id="<?php echo $css_id; ?>-top" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
                <select name="<?php echo $field_name; ?>[top][unit]">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="em">em</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="in">in</option>
                    <option value="pt">pt</option>
                    <option value="pc">pc</option>
                    <option value="ex">ex</option>
                </select>
            </div>

            <div class="item">
                <input type="number" class="" name="<?php echo $field_name; ?>[right][value]" id="<?php echo $css_id; ?>-right" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
                <select name="<?php echo $field_name; ?>[right][unit]">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="em">em</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="in">in</option>
                    <option value="pt">pt</option>
                    <option value="pc">pc</option>
                    <option value="ex">ex</option>
                </select>
            </div>
            <div class="item">
                <input type="number" class="" name="<?php echo $field_name; ?>[bottom][value]" id="<?php echo $css_id; ?>-bottom" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
                <select name="<?php echo $field_name; ?>[bottom][unit]">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="em">em</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="in">in</option>
                    <option value="pt">pt</option>
                    <option value="pc">pc</option>
                    <option value="ex">ex</option>
                </select>
            </div>

            <div class="item">
                <input type="number" class="" name="<?php echo $field_name; ?>[left][value]" id="<?php echo $css_id; ?>-left" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
                <select name="<?php echo $field_name; ?>[left][unit]">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="em">em</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="in">in</option>
                    <option value="pt">pt</option>
                    <option value="pc">pc</option>
                    <option value="ex">ex</option>
                </select>
            </div>

        </div>



        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }



    public function field_hidden( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $default 	= isset( $option['default'] ) ? $option['default'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : $default;
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        //$value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <input type="hidden" class="" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }


    public function field_text( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <input type="text" class="" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }




    public function field_number( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <input type="number" class="" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($value); ?>" />
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }



    public function field_font_size( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $is_responsive 	= (isset( $option['responsive'] ) && ( $option['responsive'] )) ? true : false;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $default 	= isset( $option['default'] ) ? $option['default'] : array('size'=>14, 'unit'=>'px');
        $value 	= isset( $option['value'] ) ? $option['value'] : $default;

        //var_dump($is_responsive);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';


        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        if($is_pro == true){
            $details = '<span class="pro-feature">'.$pro_text.'</span> '.$details;
        }

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;

        $font_size = $value['size'];
        $unit = $value['unit'];

        $unit_args = array(
            'px'=>'px',
            '%'=>'%',
            'em'=>'em',
            'cm'=>'cm',
            'mm'=>'mm',
            'in'=>'in',
            'pt'=>'pt',
            'pc'=>'pc',
            'ex'=>'ex',
        );

        $media_args = array(
            'desktop'=>array('name'=>'Desktop', 'active'=> true,  'icon'=> '<i class="fas fa-desktop"></i>'),
            'tablet'=>array('name'=>'Tablet',  'active'=> false,  'icon'=> '<i class="fas fa-tablet-alt"></i>'),
            'mobile'=>array('name'=>'Mobile',  'active'=> false,  'icon'=> '<i class="fas fa-mobile-alt"></i>'),
        );



        ob_start();
        ?>
        <div class="control-input-wrap control-font-size">
            <input type="hidden" class="" name="<?php echo $field_name.'[responsive]'; ?>" id="<?php echo $css_id; ?>-responsive" value="<?php echo ($is_responsive) ?  true : false; ?>" />

            <?php

            if($is_responsive):



            ?>

            <div class="media-query">
                <?php
                foreach ($media_args as $media_index => $media_data){
                    $media_name = $media_data['name'];
                    $media_icon = $media_data['icon'];
                    $media_active = $media_data['active'];


                    ?>
                    <span title="<?php echo $media_name; ?>" class="media <?php echo ($media_active) ? 'active': '';?>" data-media="<?php echo $media_index; ?>"><?php echo $media_icon; ?></span>

                    <?php

                }
                ?>


            </div>


            <?php

            ?>

            <div class="media-input media-input-desktop" style="display: block">
                <div class="col-50">
                    <input type="number" class="" name="<?php echo $field_name.'[desktop][size]'; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($font_size); ?>" />
                </div>
                <div class="col-50">
                    <select name="<?php echo $field_name.'[desktop][unit]'; ?>">
                        <?php
                        foreach ($unit_args as $unit_index => $unit_name){
                            ?>
                            <option <?php if($unit == $unit_index) echo 'selected'; ?> value="<?php echo $unit_index; ?>"><?php echo $unit_name; ?></option>
                            <?php

                        }
                        ?>

                    </select>
                </div>
            </div>

            <div class="media-input media-input-tablet">
                <div class="col-50">
                    <input type="number" class="" name="<?php echo $field_name.'[tablet][size]'; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($font_size); ?>" />
                </div>
                <div class="col-50">
                    <select name="<?php echo $field_name.'[tablet][unit]'; ?>">
                        <?php
                        foreach ($unit_args as $unit_index => $unit_name){
                            ?>
                            <option <?php if($unit == $unit_index) echo 'selected'; ?> value="<?php echo $unit_index; ?>"><?php echo $unit_name; ?></option>
                            <?php

                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="media-input media-input-mobile">
                <div class="col-50">
                    <input type="number" class="" name="<?php echo $field_name.'[mobile][size]'; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($font_size); ?>" />
                </div>
                <div class="col-50">
                    <select name="<?php echo $field_name.'[mobile][unit]'; ?>">
                        <?php
                        foreach ($unit_args as $unit_index => $unit_name){
                            ?>
                            <option <?php if($unit == $unit_index) echo 'selected'; ?> value="<?php echo $unit_index; ?>"><?php echo $unit_name; ?></option>
                            <?php

                        }
                        ?>
                    </select>
                </div>
            </div>


            <?php
            else:

                ?>
                <div class="col-50">
                    <input type="number" class="" name="<?php echo $field_name.'[size]'; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr($font_size); ?>" />
                </div>
                <div class="col-50">
                    <select name="<?php echo $field_name.'[unit]'; ?>">
                        <?php
                        foreach ($unit_args as $unit_index => $unit_name){
                            ?>
                            <option <?php if($unit == $unit_index) echo 'selected'; ?> value="<?php echo $unit_index; ?>"><?php echo $unit_name; ?></option>
                            <?php

                        }
                        ?>
                    </select>
                </div>
                <?php
            endif;
            ?>

        </div>

        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }














    public function field_datepicker( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $format 	= isset( $option['format'] ) ? $option['format'] : "";


        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style( 'jquery-ui');

        ob_start();
        ?>
        <input type="text" autocomplete="off" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $value; ?>" />
        <script>jQuery(document).ready(function($) { $("#<?php echo $css_id; ?>").datepicker({ dateFormat: "<?php echo $format; ?>" });});</script>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);
    }

    public function field_text_icon( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $option_value = empty($value) ? $default : $value;

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;




        ob_start();
        ?>
        <div class="text-icon">
            <span class="icon"><i class="<?php echo $option_value; ?>"></i></span><input type="text" class="" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $option_value; ?>" />
        </div>
        <style type="text/css">
            .text-icon{}
            .text-icon .icon{
                /* width: 30px; */
                background: #ddd;
                /* height: 28px; */
                display: inline-block;
                vertical-align: top;
                text-align: center;
                font-size: 14px;
                padding: 5px 10px;
                line-height: normal;
            }
        </style>
        <script>
            jQuery(document).ready(function($){
                $(document).on("keyup", ".text-icon input", function () {
                    val = $(this).val();
                    if(val){
                        $(this).parent().children(".icon").html('<i class="'+val+'"></i>');
                    }
                })
            })
        </script>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }



    public function field_range( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $args 	= isset( $option['args'] ) ? $option['args'] : "";

        $min = isset($args['min']) ? $args['min'] : '';
        $max = isset($args['max']) ? $args['max'] : '';
        $step = isset($args['step']) ? $args['step'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <div class="range-input">
            <span class="range-value"><?php echo $value; ?></span><input type="range" min="<?php if($min) echo $min; ?>" max="<?php if($max) echo $max; ?>" step="<?php if($step) echo $step; ?>" class="" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" value="<?php echo $value; ?>" />
        </div>

        <script>
            jQuery(document).ready(function($){
                $(document).on("change", "#<?php echo $css_id; ?>", function () {
                    val = $(this).val();
                    if(val){
                        $(this).parent().children(".range-value").html(val);
                    }
                })
            })
        </script>

        <style type="text/css">
            .range-input{}
            .range-input .range-value{
                display: inline-block;
                vertical-align: top;
                margin: 0 0;
                padding: 4px 10px;
                background: #eee;
            }
        </style>
        <?php

        $input_html = ob_get_clean();
        echo sprintf($field_template, $title, $details, $input_html);
    }



    public function field_textarea( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <textarea name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" cols="40" rows="5" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);






    }



    public function field_scripts_js( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();
        ?>
        <textarea name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" cols="40" rows="5" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>

        <script>
            var editor = CodeMirror.fromTextArea(document.getElementById("<?php echo $css_id; ?>"), {
                lineNumbers: true,
            });

        </script>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);




    }


    public function field_scripts_css( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";

        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";
        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 		= isset( $option['details'] ) ? $option['details'] : "";



        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;
        ?>

        <?php

        ob_start();
        ?>
        <textarea name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" cols="40" rows="5" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
        <script>

            var editor = CodeMirror.fromTextArea(document.getElementById("<?php echo $css_id; ?>"), {
                lineNumbers: true,
                value: "",
                viewportMargin: Infinity,

                //scrollbarStyle: "simple"
            });



        </script>

        <style type="text/css">
            .CodeMirror {
                min-height:80px;
            }

        </style>

        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);

    }





    public function field_checkbox( $option ){

        $id				= isset( $option['id'] ) ? $option['id'] : "";
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 		= isset( $option['details'] ) ? $option['details'] : "";
        $for 		= isset( $option['for'] ) ? $option['for'] : "";
        $args			= isset( $option['args'] ) ? $option['args'] : array();

        $option_value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $option_value = !empty($option_value) ? $option_value : $default;

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;



        ?>
        <div class="setting-field">
            <div class="field-lable"><?php if(!empty($title)) echo $title;  ?></div>
            <div class="field-input">
                <?php



                if(!empty($args))
                    foreach( $args as $key => $value ):

                        //$checked = ( $key == $option_value ) ? "checked" : "";
                        $checked = in_array($key, $option_value) ? "checked" : "";

                        $for = !empty($for) ? $for.'-'.$id."-".$key : $id."-".$key;


                        ?>
                        <label for='<?php echo $for;?>'><input name='<?php echo $field_name; ?>[]' type='checkbox' id='<?php echo $for; ?>' value='<?php echo $key;?>'  <?php echo $checked;?>><span><?php echo $value;?></span></label>
                    <?php


                    endforeach;

                ?>
                <p class="description"><?php if(!empty($details)) echo $details;  ?></p>
            </div>
        </div>
        <?php


    }



    public function field_radio( $option ){

        $id				= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 		= isset( $option['details'] ) ? $option['details'] : "";
        $for 		= isset( $option['for'] ) ? $option['for'] : "";
        $args			= isset( $option['args'] ) ? $option['args'] : array();

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $option_value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $option_value = !empty($option_value) ? $option_value : $default;

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        ob_start();

        if(!empty($args))
            foreach( $args as $key => $value ):
                $checked = ( $key == $option_value ) ? "checked" : "";
                $for = !empty($for) ? $for.'-'.$css_id."-".$key : $css_id."-".$key;
                ?>
                <label for="<?php echo $for;?>"><input name="<?php echo $field_name; ?>" type="radio" id="<?php echo $for; ?>" value="<?php echo $key;?>"  <?php echo $checked;?>><span><?php echo $value;?></span></label>

                <?php
            endforeach;

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);


    }



    public function field_radio_image( $option ){

        $id				= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $args			= isset( $option['args'] ) ? $option['args'] : array();
        //$args			= is_array( $args ) ? $args : $this->generate_args_from_string( $args );
        $option_value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";
        $width 			= isset( $option['width'] ) ? $option['width'] : "250px";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;

        //var_dump($option);

        $option_value = empty($option_value) ? $default : $option_value;



        ob_start();
        ?>
        <div class="radio-img">
            <?php
            foreach( $args as $key => $value ):

                $name = $value['name'];
                $thumb = $value['thumb'];
                $disabled = isset($value['disabled']) ? $value['disabled'] : '';
                $pro_msg = isset($value['pro_msg']) ? $value['pro_msg'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $link_text = isset($value['link_text']) ? $value['link_text'] : 'Go';

                $checked = ($key == $option_value) ? "checked" : "";

                //var_dump($checked);

                ?>
                <label title="<?php echo $name; ?>" class="<?php if($checked =='checked') echo 'active';?> <?php if($disabled == true) echo 'disabled';?>">
                    <input <?php if($disabled) echo 'disabled'; ?>  name="<?php echo $field_name; ?>" type="radio" id="<?php echo $css_id; ?>-<?php echo $key; ?>" value="<?php echo $key; ?>"  <?php echo $checked; ?>>
                    <?php // echo $name; ?>
                    <img style="width: <?php echo $width; ?>;" alt="<?php echo $name; ?>" src="<?php echo $thumb; ?>">
                    <?php if($disabled == true):?>
                    <span class="pro-msg"><?php echo $pro_msg; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($link)):?>
                        <a target="_blank" class="link" href="<?php echo $link; ?>"><?php echo $link_text; ?></a>
                    <?php endif; ?>

                </label>
            <?php

            endforeach;
            ?>
        </div>
        <script>
            jQuery(document).ready(function($){
                $(document).on("click", ".radio-img label", function () {
                    if($(this).hasClass('disabled')){
                        return;
                    }

                    $(this).parent().children("label").removeClass("active");
                    $(this).addClass("active");

                })
            })
        </script>

        <style type="text/css">
            .radio-img{}
            .radio-img label{
                display: inline-block;
                vertical-align: top;
                margin: 5px;
                padding: 2px;
                background: #eee;
            }

            .radio-img label.active{
                background: #fd730d;
            }

            .radio-img label.disabled{
                background: #e2e2e2;

            }
            .radio-img label.disabled img{
                background: #e2e2e2;
                opacity: .3;
            }

            .radio-img label.disabled .pro-msg{
                background: #ffd87f;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                padding: 0 10px;

            }

            .radio-img label .link{
                background: hsl(200, 7%, 42%);
                position: absolute;
                top: 10%;
                left: 90%;
                transform: translate(-50%,-50%);
                padding: 3px 14px;
                text-decoration: none;
                font-size: 14px;
                color: #fff;

            }


            .radio-img input[type=radio]{
                display: none;
            }
            .radio-img img{

                vertical-align: top;
            }

        </style>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);


    }



    public function field_spectrum( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        wp_enqueue_style( 'spectrum' );
        wp_enqueue_script('spectrum' );


        ob_start();
        ?>
        <input class="spectrum" name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $value; ?>" />
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);
    }



    public function field_colorpicker( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $placeholder 	= isset( $option['placeholder'] ) ? $option['placeholder'] : "";

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;


        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script(
            'iris',
            admin_url( 'js/iris.min.js' ),
            array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
            false,
            1
        );
        wp_enqueue_script(
            'wp-color-picker',
            admin_url( 'js/color-picker.min.js' ),
            array( 'iris' ),
            false,
            1
        );
        $colorpicker_l10n = array(
            'clear' => __( 'Clear' ),
            'defaultString' => __( 'Default' ),
            'pick' => __( 'Select Color' ),
            'current' => __( 'Current Color' ),
        );
        wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );


        ob_start();
        ?>
        <input name="<?php echo $field_name; ?>" id="<?php echo $css_id; ?>" placeholder="<?php echo $placeholder; ?>" value="<?php echo $value; ?>" />
        <script>jQuery(document).ready(function($) { $("#<?php echo $css_id; ?>").wpColorPicker();});</script>
        <?php

        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);
    }



    public function field_colorpicker_multi( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $args 	= isset( $option['args'] ) ? $option['args'] : "";


        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $value 	= isset( $option['value'] ) ? $option['value'] : '';
        $default 	= isset( $option['default'] ) ? $option['default'] : '';
        $value = !empty($value) ? $value : $default;

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";

        $field_name = !empty($parent) ? $parent.'['.$id.']' : $id;



        //echo '<pre>'.var_export($args, true).'</pre>';

        ob_start();

        if(!empty($args)):

            foreach ($args as $arg_key => $arg):

                $item_value = isset($value[$arg_key]) ? $value[$arg_key] : $arg;

                ?>
            <div class="">
                <span><?php echo $arg_key; ?></span>
                <input name="<?php echo $field_name; ?>[<?php echo $arg_key; ?>]" id="<?php echo $arg_key.'-'.$css_id; ?>"  value="<?php echo $item_value; ?>" />
                <script>jQuery(document).ready(function($) { $("#<?php echo $arg_key.'-'.$css_id; ?>").wpColorPicker();});</script>
            </div>

            <?php
            endforeach;

        endif;


        $input_html = ob_get_clean();

        echo sprintf($field_template, $title, $details, $input_html);
    }













    public function field_custom_html( $option ){

        $id 			= isset( $option['id'] ) ? $option['id'] : "";
        $css_id 			= isset( $option['css_id'] ) ? $option['css_id'] : $id;
        $parent 			= isset( $option['parent'] ) ? $option['parent'] : "";
        $field_template 	= isset( $option['field_template'] ) ? $option['field_template'] : $this->field_template($option);
        $html 	= isset( $option['html'] ) ? $option['html'] : "";

        $is_pro 	= isset( $option['is_pro'] ) ? $option['is_pro'] : false;
        $pro_text 	= isset( $option['pro_text'] ) ? $option['pro_text'] : '';

        $title			= isset( $option['title'] ) ? $option['title'] : "";
        $details 			= isset( $option['details'] ) ? $option['details'] : "";


        echo sprintf($field_template, $title, $details, $html);







    }



}}