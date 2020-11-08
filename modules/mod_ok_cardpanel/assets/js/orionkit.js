(function ($) {
    $(document).ready(function () {
//match the boxes height
$(".ok-match-panel").each(function (index, el) {
    var okbox = $(this).find('.ok-card3-content');
    var okMaxHeight = 0;
    $(okbox).each(function () {
        if ($(this).innerHeight() > okMaxHeight) {
            okMaxHeight = $(this).innerHeight();
        }; 
                        //console.log(okMaxHeight);                        
                    });
    $(okbox).innerHeight(okMaxHeight);
});
//ok animation
$('.okcp-animation').css('visibility', 'hidden');
$('.okcp-animation').each(function(index, el) {
 $(this).okAnimation();   
});
    // circle image animation
    $('.ok-card3 .ok-effect-circle').hover(function() {
        var animation = $(this).data('ok-img-anim');
        $('img', this).addClass(animation);
    }, function() {
        var animation = $(this).data('ok-img-anim');
        $('img', this).removeClass(animation);
    });
//dev
// if ($('.ok-cp-caption-down').isInViewport()) {
//   alert('boom');
// } else {
//   alert('ups');
// }
//$('body').css('background', '#ccc');
    });// end doc ready
    $.fn.okAnimation = function(){
        /*----------  animation without repeat  with trigger----------*/        
            //function to detect if element in vieport
            $.fn.isInViewport = function() {
              var elementTop = $(this).offset().top;
              var elementBottom = elementTop + $(this).outerHeight();
              var viewportTop = $(window).scrollTop();
              var viewportBottom = viewportTop + $(window).height();
              return elementBottom > viewportTop && elementTop < viewportBottom;
          }
          //start animation if el in viewport  
          var box = $(this);                
          var t = $(this).data('ok-trg');
          var animation = $(this).data('ok-anim');
          var okDelay = $(this).data('ok-delay');
          var runAnim = function(){
              if ($(box).isInViewport()) {
           setTimeout(function () {
                $(box).addClass('ok-inview');
                $(box).addClass(animation);
            }, okDelay);
          } else {
             $(box).removeClass('ok-inview');
             $(box).removeClass(animation);
             //  console.log('ups');
          } 
          }
         runAnim();
         $(window).scroll(function(event) {
             runAnim();
         });
    }
})(jQuery);