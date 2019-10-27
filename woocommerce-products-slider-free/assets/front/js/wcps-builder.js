jQuery(document).ready(function($) {


    (function($){
        $.fn.getForm2obj = function(){
            var _ = {},_t=this;
            this.c = function(k,v){ eval("c = typeof "+k+";"); if(c == 'undefined') _t.b(k,v);}
            this.b = function(k,v,a = 0){ if(a) eval(k+".push("+v+");"); else eval(k+"="+v+";"); };
            $.map(this.serializeArray(),function(n){
                if(n.name.indexOf('[') > -1 ){
                    var keys = n.name.match(/[a-zA-Z0-9_]+|(?=\[\])/g),le = Object.keys(keys).length,tmp = '_';
                    $.map(keys,function(key,i){
                        if(key == ''){
                            eval("ale = Object.keys("+tmp+").length;");
                            if(!ale) _t.b(tmp,'[]');
                            if(le == (i+1)) _t.b(tmp,"'"+n['value']+"'",1);
                            else _t.b(tmp += "["+ale+"]",'{}');
                        }else{
                            _t.c(tmp += "['"+key+"']",'{}');
                            if(le == (i+1)) _t.b(tmp,"'"+n['value']+"'");
                        }
                    });
                }else _t.b("_['"+n['name']+"']","'"+n['value']+"'");
            });
            return _;
        }
    })(jQuery);










    $(document).on('click', '.control-group-header', function(){

        parent = $(this).parent();

        if(parent.hasClass('active')){
            parent.removeClass('active');
        }else{
            parent.addClass('active');
        }


    })

    $(document).on('click', '.element-title', function(){

        parent = $(this).parent();

        if(parent.hasClass('active')){
            parent.removeClass('active');
        }else{
            parent.addClass('active');
        }


    })

    $(document).on('click', '.element-title .element-remove', function(){

        elementWrap = $(this).parent().parent();
        elementWrap.remove();


    })




    $(document).on('click', '.skins_layers .layer-title', function(){

        $('.skins_layers .layer').removeClass('active');

        parent = $(this).parent();
        layer = $(this).attr('data-layer');
        parent.addClass('active');

        wcps.active_layer = layer;

        console.log(wcps.active_layer);


    })





    $(document).on('change', '#wcps-builder-control', function(){

        formHandle = document.getElementById('wcps-builder-control');


        let formData = new FormData(formHandle);
        let formDataSerialize = $(this).serializeArray();



        //console.log(formData.getAll('wcps_product_categories[]'));
        //console.log(formData.get('wcps_total_items'));
        console.log($('form').getForm2obj());


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
        wcps_container_padding = formData.get('wcps_container_padding');

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



        //console.log(wcps_product_categories);

        if(wcps_bg_img.length){
            $('.wcps-container').css('background', "url("+wcps_bg_img+") repeat scroll 0 0 rgba(0, 0, 0, 0)");

        }



        if(wcps_container_padding){
            $('.wcps-container').css('padding', wcps_container_padding);
        }

        if(wcps_items_padding){
            $('.wcps-container .wcps-items').css('padding', wcps_items_padding);
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


                    $('.owl-carousel').owlCarousel('destroy');

                    $('.owl-carousel').owlCarousel({
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




