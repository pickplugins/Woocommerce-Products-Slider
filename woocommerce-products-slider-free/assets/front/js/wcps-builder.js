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


        //formData = $(this).serialize();

        console.log(formData.getAll('wcps_product_categories[]'));
        console.log(formData.get('wcps_total_items'));




        formData = $(this).serializeArray();

        var data = {};

        $(formData).each(function(index, obj){

            if(data[obj.name] === undefined)
                data[obj.name] = [];

            data[obj.name].push(obj.value);

        });

        //console.log(data);






         var values = {};
        $.each(formData, function(i, field) {

            fieldName = field.name;
            fieldValue = field.value;


            if (values.hasOwnProperty(fieldName)) {

                //_fieldName = fieldName.replace("[]", "");
                values[fieldName] = $.makeArray(values[fieldName]);
                values[fieldName].push(fieldValue);

                //values[fieldName] = fieldValue;
            }else{
                values[fieldName] = fieldValue;
            }




            //console.log(field.name);

        });


        //console.log(values);

        //console.log(values['wcps_product_categories']);


        wcps_auto_play = (values.wcps_auto_play == 'true') ? true : false;

        wcps_stop_on_hover = (values.wcps_stop_on_hover == 'true') ? true : false;
        wcps_auto_play_speed = values.wcps_auto_play_speed;
        wcps_auto_play_timeout = values.wcps_auto_play_timeout;
        wcps_lazyLoad = (values.wcps_lazyLoad == 'true') ? true : false;


        wcps_slider_pagination = (values.wcps_slider_pagination == 'true') ? true : false;
        wcps_slider_pagination_count = (values.wcps_slider_pagination_count == 'true') ? true : false;
        wcps_pagination_slide_speed = values.wcps_pagination_slide_speed;


        wcps_slideBy = values.wcps_slideBy;
        wcps_loop = (values.wcps_loop == 'true') ? true : false;
        wcps_rewind = (values.wcps_rewind == 'true') ? true : false;
        wcps_center = (values.wcps_center == 'true') ? true : false;
        wcps_slider_rtl = (values.wcps_slider_rtl == 'true') ? true : false;


        wcps_slider_navigation = (values.wcps_slider_navigation == 'true') ? true : false;
        wcps_slide_speed = values.wcps_slide_speed;

        wcps_slider_touch_drag = (values.wcps_slider_touch_drag == 'true') ? true : false;
        wcps_slider_mouse_drag = (values.wcps_slider_mouse_drag == 'true') ? true : false;

        wcps_slider_animateout = values.wcps_slider_animateout;
        wcps_slider_animatein = values.wcps_slider_animatein;
        wcps_ribbon_name = values.wcps_ribbon_name;
        wcps_plugin_url = values.wcps_plugin_url;
        wcps_ribbon_custom = values.wcps_ribbon_custom;

        //wcps_container_padding = values.wcps_container_padding['top'];
        wcps_bg_img = values.wcps_bg_img;
        wcps_items_padding = values.wcps_items_padding;
        wcps_product_categories = values.wcps_product_categories;



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




        //console.log(wcps_container_padding);

        if(wcps_bg_img.length){
            $('.wcps-container').css('background', "url("+wcps_bg_img+") repeat scroll 0 0 rgba(0, 0, 0, 0)");

        }




       // $('.wcps-container').css('padding', wcps_container_padding+"px");


        $('#owl-carousel').owlCarousel('destroy');

        $('#owl-carousel').owlCarousel({
            items : values.wcps_column_number,
            lazyLoad : values.wcps_lazyLoad,
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


    })
})




