jQuery(document).ready(function($){

    $(document).on('click','.import-layout',function(){
        _this = this;
        post_id = $(this).attr('post_id');

        $(_this).addClass('updating-message');

        $.ajax({
            type: 'POST',
            context: _this,
            url:wcps_ajax.wcps_ajaxurl,
            data: {
                "action" 		: "wcps_ajax_fetch_block_hub_by_id",
                "wcps_ajax_nonce"	: wcps_ajax.ajax_nonce,
                "post_id" 		: post_id,
            },
            success: function( response ) {
                var data = JSON.parse( response );
                post_data = data['post_data'];
                download_count = data['download_count'];

                console.log(data);

                $(this).addClass('saved');
                $(this).text('Saved');

                $(_this).removeClass('updating-message');
            }
        });

    })

});