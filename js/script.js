$(document).ready(function(){
    // hide #scrollup first
    $("#scrollup").hide();
    
    // fade in #scrollup http://webdesignerwall.com/tutorials/animated-scroll-to-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scrollup').fadeIn();
            } else {
                $('#scrollup').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#scrollup').click(function () {
            $('html,body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});
// // });