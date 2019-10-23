jQuery(document).ready(function($) {


    $(document).on('click', '.control-group-header', function(){

        parent = $(this).parent();

        if(parent.hasClass('active')){
            parent.removeClass('active');
        }else{
            parent.addClass('active');
        }


    })


    $(document).on('change', '#wcps-builder-control', function(){

        formHandle = document.getElementById('wcps-builder-control');


        let formData = new FormData(formHandle);


        //console.log(formData.getAll('wcps_product_categories[]'));
        //console.log(formData.get('wcps_total_items'));

        $('.wcps-container .loader').fadeIn();


        wcps_column_number = formData.get('wcps_column_number');


        wcps_auto_play = formData.get('wcps_auto_play');
        wcps_stop_on_hover = formData.get('wcps_stop_on_hover');
        wcps_auto_play_speed = formData.get('wcps_auto_play_speed');
        wcps_auto_play_timeout = formData.get('wcps_auto_play_timeout');

        wcps_lazyLoad = formData.get('wcps_lazyLoad');
        wcps_lazyLoad = (wcps_lazyLoad == 'true') ? true : false;

        wcps_slider_pagination = formData.get('wcps_slider_pagination');
        wcps_slider_pagination = (wcps_slider_pagination == 'true') ? true : false;

        wcps_slider_pagination_count = formData.get('wcps_slider_pagination_count');
        wcps_slider_pagination_count = (wcps_slider_pagination_count == 'true') ? true : false;

        wcps_pagination_slide_speed = formData.get('wcps_pagination_slide_speed');
        wcps_slideBy = formData.get('wcps_slideBy');

        wcps_loop = formData.get('wcps_loop');
        wcps_loop = (wcps_loop == 'true') ? true : false;

        wcps_rewind = formData.get('wcps_rewind');
        wcps_rewind = (wcps_rewind == 'true') ? true : false;

        wcps_center = formData.get('wcps_center');
        wcps_center = (wcps_center == 'true') ? true : false;

        wcps_slider_rtl = formData.get('wcps_slider_rtl');
        wcps_slider_rtl = (wcps_slider_rtl == 'true') ? true : false;

        wcps_slider_navigation = formData.get('wcps_slider_navigation');
        wcps_slider_navigation = (wcps_slider_navigation == 'true') ? true : false;

        wcps_slide_speed = formData.get('wcps_slide_speed');

        wcps_slider_touch_drag = formData.get('wcps_slider_touch_drag');
        wcps_slider_touch_drag = (wcps_slider_touch_drag == 'true') ? true : false;

        wcps_slider_mouse_drag = formData.get('wcps_slider_mouse_drag');
        wcps_slider_mouse_drag = (wcps_slider_mouse_drag == 'true') ? true : false;

        wcps_slider_animateout = formData.get('wcps_slider_animateout');
        wcps_slider_animatein = formData.get('wcps_slider_animatein');
        wcps_ribbon_name = formData.get('wcps_ribbon_name');
        wcps_plugin_url = formData.get('wcps_plugin_url');
        wcps_ribbon_custom = formData.get('wcps_ribbon_custom');
        wcps_bg_img = formData.get('wcps_bg_img');
        wcps_items_padding = formData.get('wcps_items_padding');
        wcps_product_categories = formData.getAll('wcps_product_categories[]');

        if(wcps_ribbon_name == 'none'){
            $('.wcps-container .wcps-ribbon').fadeOut();
        }else if(wcps_ribbon_name == 'custom'){
            $('.wcps-container .wcps-ribbon').fadeIn();

            $('.wcps-container .wcps-ribbon').css('background', "url("+wcps_ribbon_custom+") no-repeat scroll 0 0 rgba(0, 0, 0, 0)");
        }else{
            $('.wcps-container .wcps-ribbon').fadeIn();
            wcps_ribbon_url = wcps_plugin_url+'assets/front/images/ribbons/'+wcps_ribbon_name+'.png';

            $('.wcps-container .wcps-ribbon').css('background', "url("+wcps_ribbon_url+") no-repeat scroll 0 0 rgba(0, 0, 0, 0)");

        }

        wcps_query_orderby = formData.getAll('wcps_query_orderby[]');



        console.log(wcps_query_orderby);

        if(wcps_bg_img.length){
            $('.wcps-container').css('background', "url("+wcps_bg_img+") repeat scroll 0 0 rgba(0, 0, 0, 0)");

        }

        wcps_container_padding_top_val = formData.get('wcps_container_padding[top][value]');
        wcps_container_padding_top_unit = formData.get('wcps_container_padding[top][unit]');

        wcps_container_padding_right_val = formData.get('wcps_container_padding[right][value]');
        wcps_container_padding_right_unit = formData.get('wcps_container_padding[right][unit]');

        wcps_container_padding_bottom_val = formData.get('wcps_container_padding[bottom][value]');
        wcps_container_padding_bottom_unit = formData.get('wcps_container_padding[bottom][unit]');

        wcps_container_padding_left_val = formData.get('wcps_container_padding[left][value]');
        wcps_container_padding_left_unit = formData.get('wcps_container_padding[left][unit]');


        //console.log(wcps_container_padding_top);

        if(wcps_container_padding_top_val){
            $('.wcps-container').css('padding-top', wcps_container_padding_top_val+wcps_container_padding_top_unit);
        }

        if(wcps_container_padding_right_val){
            $('.wcps-container').css('padding-right', wcps_container_padding_right_val+wcps_container_padding_right_unit);
        }

        if(wcps_container_padding_bottom_val){
            $('.wcps-container').css('padding-bottom', wcps_container_padding_bottom_val+wcps_container_padding_bottom_unit);
        }
        if(wcps_container_padding_left_val){
            $('.wcps-container').css('padding-left', wcps_container_padding_left_val+wcps_container_padding_left_unit);
        }


        wcps_items_padding_top_val = formData.get('wcps_items_padding[top][value]');
        wcps_items_padding_top_unit = formData.get('wcps_items_padding[top][unit]');

        wcps_items_padding_right_val = formData.get('wcps_items_padding[right][value]');
        wcps_items_padding_right_unit = formData.get('wcps_items_padding[right][unit]');

        wcps_items_padding_bottom_val = formData.get('wcps_items_padding[bottom][value]');
        wcps_items_padding_bottom_unit = formData.get('wcps_items_padding[bottom][unit]');

        wcps_items_padding_left_val = formData.get('wcps_items_padding[left][value]');
        wcps_items_padding_left_unit = formData.get('wcps_items_padding[left][unit]');
        if(wcps_items_padding_top_val){
            $('.wcps-container .wcps-items').css('padding-top', wcps_items_padding_top_val+wcps_items_padding_top_unit);
        }

        if(wcps_items_padding_right_val){
            $('.wcps-container .wcps-items').css('padding-right', wcps_items_padding_right_val+wcps_items_padding_right_unit);
        }

        if(wcps_items_padding_bottom_val){
            $('.wcps-container .wcps-items').css('padding-bottom', wcps_items_padding_bottom_val+wcps_items_padding_bottom_unit);
        }
        if(wcps_items_padding_left_val){
            $('.wcps-container .wcps-items').css('padding-left', wcps_items_padding_left_val+wcps_items_padding_left_unit);
        }



        $.ajax(
            {
                type: 'POST',
                context: this,
                url:wcps_builder_ajax.wcps_builder_ajaxurl,
                data: {
                    "action" 	: "wcps_builder_ajax_update",
                    "form_data" : $(this).serializeArray(),
                },
                success: function( response ) {
                    var data = JSON.parse( response );
                    var html = data['html'];

                    $('.wcps-container .loader').fadeOut();
                    $('.owl-carousel').html(html);
                    //console.log(html);


                    $('#owl-carousel').owlCarousel('destroy');

                    $('#owl-carousel').owlCarousel({
                        items : wcps_column_number,
                        lazyLoad : wcps_lazyLoad,
                        responsiveClass : true,

                        autoplay: wcps_auto_play,
                        autoplayHoverPause: wcps_stop_on_hover,
                        autoplaySpeed: wcps_auto_play_speed,
                        autoplayTimeout: wcps_auto_play_timeout,

                        slideBy: wcps_slideBy,
                        loop: wcps_loop,
                        rewind: wcps_rewind,
                        center: wcps_center,
                        rtl: wcps_slider_rtl,


                        dots: wcps_slider_pagination,
                        dotsSpeed: wcps_pagination_slide_speed,

                        nav: wcps_slider_navigation,
                        navText: ["",""],
                        navSpeed: wcps_slide_speed,

                        touchDrag: wcps_slider_touch_drag,
                        mouseDrag: wcps_slider_mouse_drag,

                        animateOut: "bounce",
                        animateIn: "fadeIn",
                    })



                } });


        //console.log(wcps_lazyLoad);




    })
})




