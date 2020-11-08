(function ($) {
    $(document).ready(function () {
        // tabs management----------------------------
        //colors
        // $('#myTabTabs li"]').css('background-color', 'transparent');
        //$('.nav-tabs li"]').first().css('background-color', '#ccc');
        //change order
        //$('li > a[href="#assignment"]').hide();
        //$('body').css('background-color', '#ccc'); // debug, don't forcet to remove

        // pattern img select preview
        // adds block -----------
        $('.controls .controls').has('.ok_img_select').each(function () {
            $(this).append('<div class="ok_img-pattern-box"></div>');
            var ok_ptrn = $('.ok_img_select', this).val();
            $(this).children('.ok_img-pattern-box').css('background-image', 'url("../modules/mod_ok_cardpanel/assets/images/patterns/' + ok_ptrn + '")');
        });

        $('.ok_img_select').change(function () {
            var ok_ptrn = $(this).val();
            $(this).nextAll('.ok_img-pattern-box').css('background-image', 'url("../modules/mod_ok_cardpanel/assets/images/patterns/' + ok_ptrn + '")');
        });
// re arrange tab order
// $('#myTabTabs li a').first().css('background-color' , '#000');
// $('li:contains("Module")').css('background-color' , '#000');
// $('ul.nav-tabs li').eq(3).css('height' , '100px');
//  $('body').css('background-color' , '#ccc');  //debug*/

        //------
        $("#jform_params__caption__pattern").gentleSelect({
            columns: 6,
            itemWidth: 140,
            title: "Select a pattern, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__panel__pattern").gentleSelect({
            columns: 6,
            itemWidth: 140,
            title: "Select a pattern, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });

        $("#jform_params_card_style").gentleSelect({
            columns: 3,
            itemWidth: 150,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__slide__slide1__div1_line1_animation").gentleSelect({
            columns: 3,
            itemWidth: 150,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__card__card0__animation").gentleSelect({
            columns: 4,
            itemWidth: 200,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__card__card1__animation").gentleSelect({
            columns: 4,
            itemWidth: 200,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__card__card2__animation").gentleSelect({
            columns: 4,
            itemWidth: 200,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });
        $("#jform_params__card__card3__animation").gentleSelect({
            columns: 4,
            itemWidth: 200,
            title: "Select an animation, or click on this bar to close",
            hideOnMouseOut: false,
            openSpeed: "fast"
        });

        $('.gentleselect-dialog li:contains("New")').css('color', '#8d0510');
        // $('.gentleselect-dialog li:contains("fade")').css('color', '#2962ff');
        // $('.gentleselect-dialog li:contains("zoom")').css('color', '#01990f');
        // $('.gentleselect-dialog li:contains("flip")').css('color', '#795548');


        jQuery(document).on('subform-row-add', function (event, row) {
            jQuery(row).find('select').chosen();
        })

        // cards collapsing
        // // collapse subforms in the sertan tabs
        /*$('#attrib-cards_tab .subform-repeatable-group').addClass('ok_collapsed');
         $("#attrib-cards_tab .subform-repeatable-group").append(' <span class="ok_close btn btn-warning"><span class="icon-chevron-up"></span>Close</span>');
         // dev func
         function collapse(){
         $('.subform-repeatable-group').has('[id^="jform_params__card__cardX"]').prepend('<div class="ok_">Card number is not undefined. Save without closing to continue</div>');
         }*/

// $('tr:has(#jform_params__card__card0__image-lbl) td:last').prepend('<div class="ok-rpt-nomber"> Card 1</div>');
// $('tr:has(#jform_params__card__card1__image-lbl) td:last').prepend('<div class="ok-rpt-nomber"> Card 2</div>');
// $('tr:has(#jform_params__card__card2__image-lbl) td:last').prepend('<div class="ok-rpt-nomber"> Card 3</div>');
// $('tr:has(#jform_params__card__card3__image-lbl) td:last').prepend('<div class="ok-rpt-nomber"> Card 4</div>');

        $('tr:has(#jform_params__card__cardX__image-lbl) td:last').prepend('<div class="ok-rpt-nomber"> XXXX</div>');


//end dev
//add titles to some subform-repeatable-group NOTE MAKE IT SIMPLIER
        /*$('.subform-repeatable-group:has(#jform_params__card__card0__title)').prepend('<div class="ok_slide">Card-1</div>');
         $('.subform-repeatable-group:has(#jform_params__card__card1__title)').prepend('<div class="ok_slide">Card-2</div>');
         $('.subform-repeatable-group:has(#jform_params__card__card2__title)').prepend('<div class="ok_slide">Card-3</div>');
         $('.subform-repeatable-group:has(#jform_params__card__card3__title)').prepend('<div class="ok_slide">Card-4</div>');
         $('.subform-repeatable-group').has('[id^="jform_params__card__cardX"]').prepend('<div class="ok_not_udent">Card number is not undefined. Save without closing to continue</div>');*/

//add edit-open button
        /*$('.ok_slide').append('   <span class="ok_edit">(click here to edit)</span>');*/
// open click func
        /*$('.ok_edit').bind('click', function() {
         $('#attrib-cards_tab .subform-repeatable-group').addClass('ok_collapsed');
         $('.subform-repeatable-group').has('[id^="jform_params__card__cardX"]').prepend('<div class="ok_not_udent">Card number is not undefined. Save without closing to continue</div>');
         // collapse();
         $(this).parents("#attrib-cards_tab .subform-repeatable-group").removeClass("ok_collapsed");
         // $(this).hide();
         });
         // close click func
         $('.ok_close').bind('click', function() {
         $('#attrib-cards_tab .subform-repeatable-group').addClass('ok_collapsed');
         $(this).parents("#attrib-cards_tab .subform-repeatable-group").addClass('ok_collapsed');
         //$(".ok_edit").show();
         });*/

    });
})(jQuery);

