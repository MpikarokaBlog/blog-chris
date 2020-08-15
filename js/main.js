jQuery(document).ready(function ($) {
    var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    // -------------------------------------------------------------
    //   CONFIGURATION SLIDER
    // -------------------------------------------------------------
    (function () {
        var $frame  = $('#basic');
        var $slidee = $frame.children('ul').eq(0);
        var $wrap   = $frame.parent();

        // Call Sly on frame
        $frame.sly({
            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 0,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 0,
            activatePageOn: 'click',
            speed: 300,
            elasticBounds: 1,
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,

            // Cycling
            cycleBy: 'items',
            cycleInterval: 1000,
            pauseOnHover: 1,
        });
    }());

    $('#fullpage').fullpage({
        //options here
        autoScrolling:true,
        scrollHorizontally: true,
        licenseKey: 'YOUR_KEY_HERE'
    });

    //methods
    $.fn.fullpage.setAllowScrolling(false);
});