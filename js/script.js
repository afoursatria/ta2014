 // $("carousel-example-generic").carousel({
 //  interval: 2000,

  $("#owl-example").owlCarousel();
 /**
 * Show or hide the button depending on the scroll position.
 */
function animateButton() {
    var button = $('#back-to-top');
    var scrollPosition = $(window).scrollTop();
    if (scrollPosition > 100) {
        button.fadeIn();
    } else {
        button.fadeOut();
    }
}
 
 // inspiration from https://gist.github.com/clioweb/4586585
/**
 * Create the button and append it to the body.
 */
$(function () {
    $('<a id="back-to-top">Back to Top</a>')
        .click(function () {
            $('html,body').animate({
                scrollTop: 0
            }, 1200);
            return false;
        })
        .appendTo($('body'));
});
 
/**
 * Run the animateButton function on window resize, scroll, and load.
 */
$(window).resize(animateButton);
$(window).scroll(animateButton);
$(window).load(animateButton);
// });