(function ($) {
    $(document).ready(function () {
//match images and boxes height
  setTimeout(function() {
    // small delay for get img if they slow
    $('.okm-image-match').each(function(index, el) {
         $('.okm-card-image', this).matchImg();
         $('.ok-match-cards', this).matchHeight();
         $('.okm-card', this).animate({opacity: 1}, 600)
    }, 600);
    });
//reveal
        $('.okm-activator').on('click', function (event) {
            var prnt = $(this).parents('.okm-card');
            $('.okm-card-reveal', prnt).fadeIn(600);
        });
        $('.okm-close').on('click', function (event) {
            $(this).parents('.okm-card-reveal').fadeOut(600);
        });
       //dev
       //conlole.log('DOC READY-NO ERRORS');
    });// end func ready
        $.fn.matchImg = function () {
        //matches img container by smaller image
        var imgHeight = 0;
        $(this).each(function (index, el) {
            var h = $(this).find('img').height();
            // console.log('img height - ' + h);
            if (imgHeight == 0) {
                imgHeight = h
            }
            if (h < imgHeight) {
                if (h !== 0) {
                    imgHeight = h;
                }
            }
        });
        // console.log('imgHeight Fin - ' + imgHeight);
        $(this).height(imgHeight);
    };
    //match boxes container
    $.fn.matchHeight = function () {
        var maxHeight = 0;
        $(this).each(function () {
            if ($(this).height() > maxHeight) {
                maxHeight = $(this).height();
            }
        });
        $(this).height(maxHeight);
    };
})(jQuery);