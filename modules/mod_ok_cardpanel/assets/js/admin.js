(function ($) {
    $(document).ready(function () {
        // Preview of selected image patterns
        $('.controls .controls, #attrib-cards_tab .controls').has('.ok_img_select').each(function () {
            $(this).append('<div class="ok_img-pattern-box"></div>');
            var ok_ptrn = $('.ok_img_select', this).val();
            $(this).children('.ok_img-pattern-box').css('background-image', 'url("../modules/mod_ok_cardpanel/assets/images/patterns/' + ok_ptrn + '")');
        });
        $('.ok_img_select').change(function () {
            var ok_ptrn = $(this).val();
            $(this).nextAll('.ok_img-pattern-box').css('background-image', 'url("../modules/mod_ok_cardpanel/assets/images/patterns/' + ok_ptrn + '")');
        });
    });
})(jQuery);

