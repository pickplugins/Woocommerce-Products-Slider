<?php	


/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



if(empty($_POST['wcps_hidden']))
	{



	}
else
	{	
		if($_POST['wcps_hidden'] == 'Y') {

	

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.',  wcps_textdomain ); ?></strong></p></div>
	
			<?php
			} 
	}
	
	

?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".wcps_plugin_name.' '.__('License',  wcps_textdomain)."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="wcps_hidden" value="Y">
        <?php settings_fields( 'wcps_plugin_options' );
				do_settings_sections( 'wcps_plugin_options' );
			
		?>

    <div class="para-settings wcps-settings">
    
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><i class="fa fa-key"></i> <?php _e('Activation', wcps_textdomain); ?></li>       
  
        </ul> <!-- tab-nav end --> 
		<ul class="box">
       		<li style="display: block;" class="box1 tab-box active">
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Activate license', wcps_textdomain); ?></p>

                	<?php

    /*** License activate button was clicked ***/
    if (isset($_REQUEST['activate_license'])) {
        $license_key = $_REQUEST['wcps_license_key'];

        // API query parameters
        $api_params = array(
            'slm_action' => 'slm_activate',
            'secret_key' => WCPS_SPECIAL_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(WCPS_ITEM_REFERENCE),
        );

        // Send query to the license manager server
        $response = wp_remote_get(add_query_arg($api_params, WCPS_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
        if (is_wp_error($response)){
			_e('Unexpected Error! The query returned with an error.', wcps_textdomain);

        }

        //var_dump($response);//uncomment it if you want to look at the full response
        
        // License data.
        $license_data = json_decode(wp_remote_retrieve_body($response));
        
        // TODO - Do something with it.
        //var_dump($license_data);//uncomment it to look at the data
        
        if($license_data->result == 'success'){//Success was returned for the license activation
            
            //Uncomment the followng line to see the message that returned from the license server
			
			echo sprintf(__('<br />The following message was returned from the server: <strong class="option-info">%s</strong>', wcps_textdomain) , $license_data->message);

            
            //Save the license key in the options table
            update_option('wcps_license_key', $license_key); 
        }
        else{
            //Show error to the user. Probably entered incorrect license key.
            
            //Uncomment the followng line to see the message that returned from the license server
			echo sprintf(__('<br />The following message was returned from the server: <strong class="option-info">%s</strong>', wcps_textdomain), $license_data->message);
 
        }

    }
    /*** End of license activation ***/
    
    /*** License activate button was clicked ***/
    if (isset($_REQUEST['deactivate_license'])) {
        $license_key = $_REQUEST['wcps_license_key'];

        // API query parameters
        $api_params = array(
            'slm_action' => 'slm_deactivate',
            'secret_key' => WCPS_SPECIAL_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(WCPS_ITEM_REFERENCE),
        );

        // Send query to the license manager server
        $response = wp_remote_get(add_query_arg($api_params, WCPS_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
        if (is_wp_error($response)){
			_e('Unexpected Error! The query returned with an error.', wcps_textdomain);

        }

        //var_dump($response);//uncomment it if you want to look at the full response
        
        // License data.
        $license_data = json_decode(wp_remote_retrieve_body($response));
        
        // TODO - Do something with it.
        //var_dump($license_data);//uncomment it to look at the data
        
        if($license_data->result == 'success'){//Success was returned for the license activation
            
            //Uncomment the followng line to see the message that returned from the license server
			echo sprintf(__('<br />The following message was returned from the server: <strong class="option-info">%s</strong>', wcps_textdomain), $license_data->message);
            echo '';
            
            //Remove the licensse key from the options table. It will need to be activated again.
            update_option('wcps_license_key', '');
        }
        else{
            //Show error to the user. Probably entered incorrect license key.
            
            //Uncomment the followng line to see the message that returned from the license server
			echo sprintf( __('The following message was returned from the server: <strong class="option-info">%s</strong>', wcps_textdomain), $license_data->message);
            echo '<br />';
        }
        
    }
    /*** End of sample license deactivation ***/
    
    ?>
    
    
                    
	<?php
    
        $wcps_license_key = get_option('wcps_license_key');
        
        if(empty($wcps_license_key))
            {
                $wcps_license_status = '<span style="color:#f00;">'.__('Not Active', wcps_textdomain).'</span>';
            }
        else
            {
                $wcps_license_status = __('Active', wcps_textdomain);
            }
        
    ?>
    
    
    <p class="option-info"><?php _e('Status:', wcps_textdomain);?> <b><?php echo $wcps_license_status; ?></b></p>
    
    
    
    
    <p>
    <?php echo sprintf( __('Enter the license key for this product to activate it. You were given a license key when you purchased this item. please visit <a href="%s">%s</a> after logged-in you will see license key for your purchased product.', wcps_textdomain), WCPS_LICENSE_KEYS_PAGE,WCPS_LICENSE_KEYS_PAGE);?>
     </p>
    
    <p>
    <?php echo sprintf( __('If you have any problem regarding license activatin please contact for support <a href="%s">%s</a>', wcps_textdomain), wcps_conatct_url, wcps_conatct_url);?>
    </p>    
    

        <table class="form-table">
            <tr>
                <th style="width:100px;"><label for="wcps_license_key"><?php _e('License Key', wcps_textdomain);?></label></th>
                <td >
                <input class="regular-text" type="text" id="wcps_license_key" name="wcps_license_key"  value="<?php echo get_option('wcps_license_key'); ?>" >

                
                </td>
            </tr>
        </table>



                </div>
            
            </li>
           
        </ul>
    
    
		

        
    </div>






        <p class="submit">
            <input type="submit" name="activate_license" value="Activate" class="button-primary" />
            <input type="submit" name="deactivate_license" value="Deactivate" class="button" />
        </p>
		</form>


</div>
