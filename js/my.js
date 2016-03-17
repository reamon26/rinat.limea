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

// return a random integer between 0 and number
function random(number) {

    return Math.floor(Math.random() * (number + 1));
}
;

// show random quote
$(document).ready(function () {

    var quotes = $('.quote');
    quotes.hide();

    var qlen = quotes.length; //document.write( random(qlen-1) );
    $('.quote:eq(' + random(qlen - 1) + ')').show(); //tag:eq(1)
});