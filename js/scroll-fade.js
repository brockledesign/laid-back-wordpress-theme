function showImages(el) {
    var windowHeight = jQuery( window ).height();
    jQuery(el).each(function(){
        var thisPos = jQuery(this).offset().top;

        var topOfWindow = jQuery(window).scrollTop();
        if (topOfWindow + windowHeight - 120 > thisPos ) {
            jQuery(this).addClass("fadeInElement");
        }
    });
}

// if the image in the window of browser when the page is loaded, show that image
jQuery(window).load(function(){
    showImages('.fade-on-scroll');
});

// if the image in the window of browser when scrolling the page, show that image
jQuery(window).scroll(function() {
    showImages('.fade-on-scroll');
});
