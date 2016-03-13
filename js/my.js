/**
 * Created by reamon26 on 13.03.16.
 */

$(document).ready(function(){
    $(window).scroll(function(){
        var scrollTop = $("body").scrollTop();
        $headerBg = $('.page_header__bg');
        $proportion = scrollTop / $headerBg.height();
        $headerBg.css({
            //'background-position': 'left ' + scrollTop + 'px',
            '-webkit-filter': ('blur(' + 4 * $proportion * 2 + 'px)'),
            '-moz-filter': ('blur(' + 4 * $proportion * 2 + 'px)'),
            'filter': ('blur(' + 4 * $proportion * 2 + 'px)')
        });
    })
})
