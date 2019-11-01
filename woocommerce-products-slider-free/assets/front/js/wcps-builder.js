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





    function wcps_is_busy(){

        hndle = $('#wcps-builder');

        if(hndle.hasClass('busy')){
            return true;
        }else{
            return  false;
        }

    }

    function wcps_make_busy(){

        hndle = $('#wcps-builder');

        hndle.addClass('busy');

    }

    function wcps_remove_busy(){

        hndle = $('#wcps-builder');

        hndle.removeClass('busy');

    }

    function wcps_get_form_data_obj(){

        formDataObj = $('#wcps-builder-control').getForm2obj();

        console.log(formDataObj);


        return formDataObj;

    }




    $(document).on('click', '.control-group-header', function(){

        parent = $(this).parent();

        isActive = $(this).next().attr('data-active');

        if(typeof isActive == 'undefined' && isActive != ''){
            $(this).next().attr('data-active','active');
            $(this).attr('data-active','active');

        }else{
            $(this).next().removeAttr('data-active');
            $(this).removeAttr('data-active');
        }


    })




    $(document).on('click', '.control-group-tabs .tab-nav', function(){

        container = $(this).parent().parent();
        data_panel = $(this).attr('data-panel');
        container.children('.tab-navs').children('.tab-nav').removeClass('active');
        $(this).addClass('active');


        container.children('.tab-panels').children('.tab-panel').removeClass('active');

        container.children('.tab-panels').children('.panel-'+data_panel).addClass('active');

        //$(container+' .tab-panel').removeClass('active');
       // $(container+' .panel-'+data_panel).addClass('active');



    })









    function generateLayerHtml(layer_data){


        html = '';
        html += '<div class="wcps-items  skin flat">1';

        for(layerId in layer_data){
            elements = layer_data[layerId];
            //console.log(elements);

            html += '<div class="layer-'+layerId+'">';

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];

                html += '<div class="element-'+elementIndex+' element-'+element_id+'">';
                html += wcps_elements[element_id]['dummy_html'];
                //console.log(element_id);
                html += '</div>';
            }

            html += '</div>';
        }

        html += '</div>';

        html += '<div class="wcps-items  skin flat">2';

        for(layerId in layer_data){
            elements = layer_data[layerId];
            //console.log(elements);

            html += '<div class="layer-'+layerId+'">';

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];

                html += '<div class="element-'+elementIndex+' element-'+element_id+'">';
                html += wcps_elements[element_id]['dummy_html'];
                //console.log(element_id);
                html += '</div>';
            }

            html += '</div>';
        }

        html += '</div>';


        html += '<div class="wcps-items  skin flat">3';

        for(layerId in layer_data){
            elements = layer_data[layerId];
            //console.log(elements);

            html += '<div class="layer-'+layerId+'">';

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];

                html += '<div class="element-'+elementIndex+' element-'+element_id+'">';
                html += wcps_elements[element_id]['dummy_html'];
                //console.log(element_id);
                html += '</div>';
            }

            html += '</div>';
        }

        html += '</div>';


        html += '<div class="wcps-items  skin flat">4';

        for(layerId in layer_data){
            elements = layer_data[layerId];
            //console.log(elements);

            html += '<div class="layer-'+layerId+'">';

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];

                html += '<div class="element-'+elementIndex+' element-'+element_id+'">';
                html += wcps_elements[element_id]['dummy_html'];
                //console.log(element_id);
                html += '</div>';
            }

            html += '</div>';
        }

        html += '</div>';

        html += '<div class="wcps-items  skin flat">5';

        for(layerId in layer_data){
            elements = layer_data[layerId];
            //console.log(elements);

            html += '<div class="layer-'+layerId+'">';

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];

                html += '<div class="element-'+elementIndex+' element-'+element_id+'">';
                html += wcps_elements[element_id]['dummy_html'];
                //console.log(element_id);
                html += '</div>';
            }

            html += '</div>';
        }

        html += '</div>';


        return html;

    }








    function reinitiateOwl(slider_options){

        console.log(slider_options.wcps_slider_navigation);

        $('.owl-carousel').owlCarousel('destroy');

        $('.owl-carousel').owlCarousel({
            items : slider_options.wcps_column_number,
            //lazyLoad : (slider_options.wcps_lazyLoad == 'true') ? true : false,
            responsiveClass : true,

            autoplay: slider_options.wcps_auto_play,
            autoplayHoverPause: slider_options.wcps_stop_on_hover,
            autoplaySpeed: slider_options.wcps_auto_play_speed,
            autoplayTimeout: slider_options.wcps_auto_play_timeout,

            slideBy: slider_options.wcps_slideBy,
            loop: (slider_options.wcps_loop == 'true') ? true : false,
            rewind: (slider_options.wcps_rewind == 'true') ? true : false,
            center: (slider_options.wcps_center == 'true') ? true : false,
            rtl: (slider_options.wcps_slider_rtl == 'true') ? true : false,

            dots: (slider_options.wcps_slider_pagination == 'true') ? true : false,
            dotsSpeed: slider_options.wcps_pagination_slide_speed,

            nav: (slider_options.wcps_slider_navigation == 'true') ? true : false,
            navText: ["",""],
            navSpeed: slider_options.wcps_slide_speed,

            touchDrag: ( slider_options.wcps_slider_touch_drag == 'true') ? true : false,
            mouseDrag: (slider_options.wcps_slider_mouse_drag == 'true') ? true : false,

            // animateOut: slider_options.wcps_slider_animateout,
            // animateIn: slider_options.wcps_slider_animatein,
        })

        $('.wcps-container .owl-nav').attr('data-position', slider_options.wcps_slider_navigation_position);



    }



    $(document).on('click', '.elements span', function(){

        active_layer = wcps.active_layer;

        element = $(this).attr('data-element');

        if(!wcps_is_busy()){
            wcps_make_busy();
        }

        $.ajax(
            {
                type: 'POST',
                context: this,
                url:wcps_builder_ajax.wcps_builder_ajaxurl,
                data: {
                    "action" 	: "wcps_ajax_elements_settings_html",
                    "element" : element,
                },
                success: function( response ) {
                    var data = JSON.parse( response );
                    var html = data['html'];

                    $('.skins_layers .layer-'+active_layer+' .layer-elements').append(html);

                    formDataObj = wcps_get_form_data_obj();

                    wcps['formData'] = formDataObj;

                    layer_data = wcps.formData['layer_data'];
                    layerHtml = generateLayerHtml(layer_data);
                    $('.owl-carousel').html(layerHtml);
                    reinitiateOwl(formDataObj.slider_options);

                    wcps_remove_busy();

                } });














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

        if(!wcps_is_busy()){
            wcps_make_busy();
        }

        elementWrap = $(this).parent().parent();
        elementWrap.remove();


        formDataObj = $('#wcps-builder-control').getForm2obj();

        wcps['formData'] = formDataObj;

        layer_data = wcps.formData['layer_data'];
        layerHtml = generateLayerHtml(layer_data);
        $('.owl-carousel').html(layerHtml);
        reinitiateOwl(formDataObj.slider_options);





        wcps_remove_busy();
    })




    $(document).on('click', '.skins_layers .layer-title', function(){

        $('.skins_layers .layer').removeClass('active');

        parent = $(this).parent();
        layer = $(this).attr('data-layer');
        parent.addClass('active');

        wcps.active_layer = layer;




    })





    $(document).on('change', '#wcps-builder-control', function(){

        formHandle = document.getElementById('wcps-builder-control');


        let formDataSerialize = $(this).serializeArray();
        formDataObj = wcps_get_form_data_obj();


        $('.wcps-container .loader').fadeIn();


        wcps_plugin_url = formDataObj.wcps_plugin_url;
        wcps_ribbon_name = formDataObj.style_options.wcps_ribbon_name;
        wcps_ribbon_custom = formDataObj.style_options.wcps_ribbon_custom;
        wcps_ribbon_position = formDataObj.style_options.wcps_ribbon_position;


        wcps_items_padding = formDataObj.style_options.wcps_items_padding;
        wcps_bg_img = formDataObj.container_options.wcps_bg_img;
        wcps_container_padding = formDataObj.container_options.wcps_container_padding;

        wcps_product_categories = formDataObj.query_options.wcps_product_categories;


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

        $('.wcps-container .wcps-ribbon').attr('data-position', wcps_ribbon_position);




        wcps_query_orderby = formDataObj.query_options.wcps_query_orderby;

        console.log(wcps_ribbon_position);

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

        layer_data = formDataObj['layer_data'];

        layerCss = generateLayerCss(layer_data);

        $('.wcps-container').append(layerCss);
        //console.log(layerCss);


        if(!wcps_is_busy()){
            //wcps_make_busy();
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
                    //$('.owl-carousel').html(html);
                    //console.log(html);

                    layerHtml = generateLayerHtml(layer_data);
                    $('.owl-carousel').html(layerHtml);

                    //console.log(layer_data);


                    reinitiateOwl(formDataObj.slider_options);



                    //wcps_remove_busy();

                } });


        //console.log(wcps_lazyLoad);




    })



    function generateLayerCss(layer_data){

        html = '<style type="text/css">';

        for(layerId in layer_data){
            elements = layer_data[layerId];

            for(elementIndex in elements){

                element_id = elements[elementIndex]['element_id'];
                element_style = elements[elementIndex]['style'];
                element_style_idle = elements[elementIndex]['style']['idle'];
                element_style_hover = elements[elementIndex]['style']['hover'];
                html += '.layer-'+layerId+' .element-'+elementIndex+'{';

                for(styleIndex in element_style_idle){

                    styleIndexVal = element_style_idle[styleIndex];

                    //console.log(styleIndex);
                    //console.log(styleIndexVal);

                    if(styleIndex == 'color'){
                        html += 'color:'+styleIndexVal+';';
                    }

                    if(styleIndex == 'fontSize'){
                        html += 'font-size:'+styleIndexVal.size+styleIndexVal.unit+';';
                    }
                    if(styleIndex == 'textAlign'){
                        html += 'text-align:'+styleIndexVal+';';
                    }

                }
                html += '}';

                html += '.layer-'+layerId+' .element-'+elementIndex+':hover{';
                for(styleIndex in element_style_hover){

                    styleIndexVal = element_style_hover[styleIndex];

                    //console.log(styleIndex);
                    //console.log(styleIndexVal);

                    if(styleIndex == 'color'){
                        html += 'color:'+styleIndexVal+';';
                    }

                    if(styleIndex == 'fontSize'){
                        html += 'font-size:'+styleIndexVal.size+styleIndexVal.unit+';';
                    }
                    if(styleIndex == 'textAlign'){
                        html += 'text-align:'+styleIndexVal+';';
                    }

                }







                html += '}';

                //console.log(element_id);
            }

        }

        html += '</style>';

        return html;



    }



    $(document).on('click', '.control-font-size .media', function(){

        wrap = $(this).parent().parent();

        media = $(this).attr('data-media');

        $(wrap.children('.media-query').children('.media')).removeClass('active');
        $(this).addClass('active');

        $(wrap.children('.media-input')).fadeOut(200);
        $(wrap.children('.media-input-'+media)).fadeIn(200);


        console.log(media);

    })


})




