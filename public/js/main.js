// Fixed Header Fix
// ======================
jQuery(window).load(function() {
    if( jQuery('body').find('.shopheader').length<1 ) {
    $('.mukam-waypoint').css('marginTop', $('.mukam-header').outerHeight(true) );
}
});

// Fixed Header
// ======================
var $head = $( '#mukam-header' );
jQuery( '.mukam-waypoint' ).each( function(i) {
    var $el = $( this ),
        animClassDown = $el.data( 'animateDown' ),
        animClassUp = $el.data( 'animateUp' );
 
    $el.waypoint( function( direction ) {
        if( direction === 'down' && animClassDown ) {
            $head.attr('class', 'mukam-header ' + animClassDown);
        }
        else if( direction === 'up' && animClassUp ){
            $head.attr('class', 'mukam-header ' + animClassUp);
        }
    }, { offset: '-1px' } );
} );

// Fixed Header for Parallax Home Page
// ======================
// ======================
var browser_height = jQuery(window).height();
jQuery(window).load(function() {
     jQuery('.parallax-homepage').css({height:browser_height});
});

var $head2 = $( '#mukam-header2' );
jQuery( '.mukam-waypoint2' ).each( function(i) {
    var $el = $( this ),
        animClassDown = $el.data( 'animateDown' ),
        animClassUp = $el.data( 'animateUp' );
 
    $el.waypoint( function( direction ) {
        if( direction === 'down' && animClassDown ) {
            $head2.attr('class', 'mukam-header2 ' + animClassDown);
        }
        else if( direction === 'up' && animClassUp ){
            $head2.attr('class', 'mukam-header2 ' + animClassUp);
        }
    }, { offset: -browser_height } );
} );

// Show Hide TopSection
// ======================
jQuery(document).ready(function() {
        jQuery('.top-section-container .showhide .trans-topsection').click(function() {
          jQuery('.top-section').slideToggle( 300, "easeInSine", function() {
          $('.mukam-waypoint').css('marginTop', $('.mukam-header').outerHeight(true) );
            // Animation complete.
          });
        });
});

// Search Widget Open - Close
// ======================
var $searchCheck = "close";
jQuery(document).ready(function() {

    jQuery( ".search-widget .social-box" ).click(function() {
        if( $searchCheck == "close") {
          jQuery('.search-widget').addClass( 'open' );  
          jQuery('.search').addClass( 'open' );
          jQuery('.search-widget .social-box').addClass( 'open' );
          $searchCheck = "open"
        }
        else {
          jQuery('.search-widget').removeClass( 'open' );  
          jQuery('.search').removeClass( 'open');
          jQuery('.search-widget .social-box').removeClass( 'open' );
          $searchCheck = "close"
        }
    });
});

// All Menu Active 
// ======================
jQuery(function(jQuery) {
jQuery("header nav li a").filter(function(){
    return this.href == location.href.replace(/#.*/, "");
}) 
.closest('li.dropdown').addClass("active");
});

// Pretty Photo
// ====================== 
jQuery(document).ready(function(){
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        theme: "light_square"
    });
  });

// TOGGLE
// ======================
jQuery(document).ready(function() {
    jQuery('.toggle').each(function() {
        var tis = $(this);
        tis.click(function() {
            tis.next('div').slideToggle( 400, "easeInCirc", function() {
            tis.toggleClass('title-active'); 
            });
        });
    });
});

// Anything Zoomer
// ======================
 if( jQuery('body').find('.product-gallery-active').length>0 ) {
 jQuery(function() {
        jQuery(".product-gallery-active").anythingZoomer({
            overlay : true,
            edit: true,
            // If you need to make the left top corner be at exactly 0,0, adjust the offset values below
            offsetX : 0,
            offsetY : 0
        });
});
}

// Product Rating
// ======================
 if( jQuery('body').find('.product-rating').length>0 ) {
jQuery(document).ready(function() {
 jQuery('.product-rating').raty({ path: 'img' });
});
}
// Blog Home Page Slider
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#foo3').length>0 ) {
jQuery("#foo3").carouFredSel({
    responsive: true,
    width: "100%",
    height: "variable",
    items: {    width: 1920,
                height: "auto",
                visible: {
                    min: 1,
                    max: 1
                }
            },
    auto : false,
    prev    : { 
                button  : ".html_carousel .prev",
                key     : "left"
            },
            next    : { 
                button  : ".html_carousel .next",
                key     : "right"
            },
    scroll      : {
            fx          : "crossfade",
            easing      : "linear"
    }
});
}
});

// Latest Work Carousel
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#carousellatest').length>0 ) {
    jQuery("#carousellatest").carouFredSel({
            responsive: true,
            scroll: 1,
            auto: false,
            items: {
                width: 370,
                height: 350,
                visible: {
                    min: 1,
                    max: 10
                }
            },
            prev    : { 
                button  : ".carousel-container .prev",
                key     : "left"
            },
            next    : { 
                button  : ".carousel-container .next",
                key     : "right"
            }
            
    }); 
}
});

// Latest Product
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#latestproduct-carousel').length>0 ) {
    jQuery("#latestproduct-carousel").carouFredSel({
            responsive: true,
            scroll: 1,
            auto: false,
            
            items: {
                width: 300,
                visible: {
                    min: 1,
                    max: 4
                }
            },
            prev    : { 
                button  : ".latestproduct-container .prev",
                key     : "left"
            },
            next    : { 
                button  : ".latestproduct-container .next",
                key     : "right"
            }
            
    }); 
}
});

// Latest Product
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#latestproduct-carousel-2').length>0 ) {
    jQuery("#latestproduct-carousel-2").carouFredSel({
            responsive: true,
            scroll: 1,
            auto: false,
            
            items: {
                width: 300,
                visible: {
                    min: 1,
                    max: 4
                }
            },
            prev    : { 
                button  : ".latestproduct-container #prev2",
                key     : "left"
            },
            next    : { 
                button  : ".latestproduct-container #next2",
                key     : "right"
            }
            
    }); 
}
});

// Latest Product
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#latestproduct-carousel-3').length>0 ) {
    jQuery("#latestproduct-carousel-3").carouFredSel({
            responsive: true,
            scroll: 1,
            auto: false,
            
            items: {
                width: 300,
                visible: {
                    min: 1,
                    max: 4
                }
            },
            prev    : { 
                button  : ".latestproduct-container #prev3",
                key     : "left"
            },
            next    : { 
                button  : ".latestproduct-container #next3",
                key     : "right"
            }
            
    }); 
}
});

// Our Client
// ======================
jQuery(window).load(function() {
  jQuery('.clientslider').flexslider({
    directionNav: false,
    animation: "slide",
    animationLoop: false,
    itemWidth: 218,
    itemMargin: 0,
    minItems: 2,
    maxItems: 5
  });
});

// Our Client's SAY
// ======================
jQuery(window).load(function() {
  jQuery('.happyclientslider').flexslider({
    directionNav: false,
    animation: "fade",
    animationLoop: false,
    itemWidth: 684,
    itemMargin: 0,
    minItems: 1,
    maxItems: 1
  });
});

// About Us Slider
// ======================
jQuery(window).load(function() {
  jQuery('.aboutus').flexslider({
    controlNav: false,             
    directionNav: true,  
    animation: "fade",
    animationLoop: false,
    itemWidth: 488,
    itemMargin: 0,
    minItems: 1,
    maxItems: 1,
    prevText: "",
    nextText: ""
  });
});

// Full Width Image Slider
// ====================== 
jQuery(window).load(function() {
if( jQuery('body').find('#full-carousel').length>0 ) {
    jQuery("#full-carousel").carouFredSel({
        responsive  : true,
        scroll: {
        items: 1,
        fx: "directScroll",
        easing: "linear",
        width: "100%",
    },
        items       : {
            width       : 384,
            height      : "variable",
            visible     : 5 
        },
        swipe       : {
            onTouch     : true,
            onMouse     : true, 
        },
        auto        : false
    });
}
});

// Full Width Image Slider 2
// ====================== 
jQuery(window).load(function() {
if( jQuery('body').find('#full-carousel2').length>0 ) {
    jQuery("#full-carousel2").carouFredSel({
        responsive  : true,
        scroll: {
        items: 1,
        fx: "directScroll",
        easing: "linear",
                width: "100%",
    },
        items       : {
            width       : 384,
            height      : "variable",
            visible     : 5
        },
        swipe       : {
            onTouch     : true,
            onMouse     : true, 
        },
        auto        : false
    });
}
});

// Parallax Home Page Loader
// ======================
jQuery("body.download").queryLoader2({
        barColor: "#e7d408",
        backgroundColor: "#e7d408",
        percentage: true,
        barHeight: 3,
        completeAnimation: "grow",
        minimumTime: 200
    });

// Parallax Plugin
// ======================
jQuery(document).ready(function(){
  jQuery.stellar({
    horizontalScrolling: false,
    scrollProperty: 'scroll',
    positionProperty: 'position',
  });
});


// Parallax Home Page Slider
// ======================
jQuery(document).ready(function() {
  jQuery('.homepage-slider').flexslider({
        animation: "swing",
        direction: "vertical", 
        slideshow: true,
        slideshowSpeed: 3500,
        animationDuration: 1000,
        directionNav: false,
        controlNav: true
  });
});

// Parallax Home Page Text Size
// ======================
if( jQuery('body').find('.homepage-slider').length>0 ) {
jQuery(".homepage-slider p").fitText(1.8, { maxFontSize: '88px' });
}

// Banner Layer Slider - 1
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#layerslider').length>0 ) {
    jQuery(document).ready(function(){
        // Calling LayerSlider on your selected element after the document loaded
        jQuery('#layerslider').layerSlider({
    autoStart               : true,
    responsive              : true,
    responsiveUnder         : 1170,
    sublayerContainer       : 1170,
    firstLayer              : 1,
    twoWaySlideshow         : false,
    randomSlideshow         : false,
    keybNav                 : true,
    touchNav                : true,
    imgPreload              : true,
    navPrevNext             : true,
    navStartStop            : false,
    navButtons              : false,
    thumbnailNavigation     : 'disabled',
    tnWidth                 : 100,
    tnHeight                : 60,
    tnContainerWidth        : '60%',
    tnActiveOpacity         : 35,
    tnInactiveOpacity       : 100,
    hoverPrevNext           : true,
    hoverBottomNav          : false,
    skin                    : 'fullwidth',
    skinsPath               : 'layerslider/skins/',
    pauseOnHover            : false,
    globalBGColor           : 'transparent',
    globalBGImage           : false,
    animateFirstLayer       : true,
    yourLogo                : false,
    yourLogoStyle           : 'position: absolute; z-index: 1001; left: 10px; top: 10px;',
    yourLogoLink            : false,
    yourLogoTarget          : '_blank',
    loops                   : 0,
    forceLoopNum            : true,
    autoPlayVideos          : false,
    autoPauseSlideshow      : 'auto',
    youtubePreview          : 'maxresdefault.jpg',
    showBarTimer        : false,
    showCircleTimer     : false,
    // you can change this settings separately by layers or sublayers with using html style attribute
});
    });
}
});
// Banner Layer Slider - 2
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#layersliderparallax').length>0 ) {
    jQuery(document).ready(function(){
        // Calling LayerSlider on your selected element after the document loaded
        jQuery('#layersliderparallax').layerSlider({
    autoStart               : true,
    responsive              : true,
    responsiveUnder         : 1170,
    sublayerContainer       : 1170,
    firstLayer              : 1,
    twoWaySlideshow         : false,
    randomSlideshow         : false,
    keybNav                 : true,
    touchNav                : true,
    imgPreload              : true,
    navPrevNext             : false,
    navStartStop            : false,
    navButtons              : true,
    thumbnailNavigation     : 'disabled',
    tnWidth                 : 100,
    tnHeight                : 60,
    tnContainerWidth        : '60%',
    tnActiveOpacity         : 35,
    tnInactiveOpacity       : 100,
    hoverPrevNext           : true,
    hoverBottomNav          : false,
    skin                    : 'fullwidth',
    skinsPath               : 'layerslider/skins/',
    pauseOnHover            : false,
    globalBGColor           : 'transparent',
    globalBGImage           : false,
    animateFirstLayer       : true,
    yourLogo                : false,
    yourLogoStyle           : 'position: absolute; z-index: 1001; left: 10px; top: 10px;',
    yourLogoLink            : false,
    yourLogoTarget          : '_blank',
    loops                   : 0,
    forceLoopNum            : true,
    autoPlayVideos          : true,
    autoPauseSlideshow      : 'auto',
    youtubePreview          : 'maxresdefault.jpg',
    showBarTimer        : false,
    showCircleTimer     : false, 
    // you can change this settings separately by layers or sublayers with using html style attribute
});
    });
}
});

// Banner Layer Slider - 3
// ======================
 jQuery(window).load(function() {
if( jQuery('body').find('#layerslider3').length>0 ) {
    jQuery(document).ready(function(){
        // Calling LayerSlider on your selected element after the document loaded
        jQuery('#layerslider3').layerSlider({
 
    autoStart               : true,
    responsive              : true,
    responsiveUnder         : 1170,
    sublayerContainer       : 1170,
    firstLayer              : 1,
    twoWaySlideshow         : false,
    randomSlideshow         : false,
    keybNav                 : true,
    touchNav                : true,
    imgPreload              : true,
    navPrevNext             : true,
    navStartStop            : false,
    navButtons              : true,
    thumbnailNavigation     : 'hover',
    tnWidth                 : 100,
    tnHeight                : 60,
    tnContainerWidth        : '60%',
    tnActiveOpacity         : 35,
    tnInactiveOpacity       : 100,
    hoverPrevNext           : true,
    hoverBottomNav          : false,
    skin                    : 'fullwidth',
    skinsPath               : 'layerslider/skins/',
    pauseOnHover            : false,
    globalBGColor           : 'transparent',
    globalBGImage           : false,
    animateFirstLayer       : true,
    yourLogo                : false,
    yourLogoStyle           : 'position: absolute; z-index: 1001; left: 10px; top: 10px;',
    yourLogoLink            : false,
    yourLogoTarget          : '_blank',
    loops                   : 0,
    forceLoopNum            : true,
    autoPlayVideos          : false,
    autoPauseSlideshow      : 'auto',
    youtubePreview          : 'maxresdefault.jpg',
    showBarTimer        : false,
    showCircleTimer     : false,
 
    // you can change this settings separately by layers or sublayers with using html style attribute
});
    });
}
});

// Banner Layer Slider - 4
// ======================
jQuery(window).load(function() {
if( jQuery('body').find('#shopslider').length>0 ) {
jQuery(document).ready(function(){
        // Calling LayerSlider on your selected element after the document loaded
        jQuery('#shopslider').layerSlider({
 
    autoStart               : true,
    responsive              : true,
    responsiveUnder         : 1170,
    sublayerContainer       : 1170,
    firstLayer              : 1,
    twoWaySlideshow         : false,
    randomSlideshow         : false,
    keybNav                 : true,
    touchNav                : true,
    imgPreload              : false,
    navPrevNext             : false,
    navStartStop            : false,
    navButtons              : true,
    thumbnailNavigation     : 'disabled',
    tnWidth                 : 100,
    tnHeight                : 60,
    tnContainerWidth        : '60%',
    tnActiveOpacity         : 35,
    tnInactiveOpacity       : 100,
    hoverPrevNext           : true,
    hoverBottomNav          : false,
    skin                    : 'borderlesslight',
    skinsPath               : 'layerslider/skins/',
    pauseOnHover            : false,
    globalBGColor           : 'transparent',
    globalBGImage           : false,
    animateFirstLayer       : true,
    yourLogo                : false,
    yourLogoStyle           : 'position: absolute; z-index: 1001; left: 10px; top: 10px;',
    yourLogoLink            : false,
    yourLogoTarget          : '_blank',
    loops                   : 0,
    forceLoopNum            : true,
    autoPlayVideos          : false,
    autoPauseSlideshow      : 'auto',
    youtubePreview          : 'maxresdefault.jpg',
    showBarTimer        : false,
    showCircleTimer     : false,
 
    // you can change this settings separately by layers or sublayers with using html style attribute
});
    });
}
});

// PORTFOLIO
// ======================
if( jQuery('body').find('.latest-work-grid').length>0 ) {
jQuery(function(jQuery) {
    var nav=jQuery('.latest-word-grid-container .menu-widget');
    var container=jQuery('.latest-work-grid');
    container.masonry({
    isAnimated: true,
    itemSelector:'.latest-work-item:not(.hidden)',
    columnWidth: '.grid-sizer',
});
    container.masonry();
 // Filter for Portfolio
    jQuery('.latest-word-grid-container .menu-widget a').click(function(e){
        var menuactive = jQuery(this).attr('href');
        var category = jQuery(this).attr('href').replace('#','');
        nav.find('li').removeClass('active'); /* Portfolio menu remove active */
        nav.find('li.slug-'+category).addClass('active');
        container.find('.latest-work-item').removeClass('hidden'); 
        container.find('.latest-work-item:not(.'+category+')').addClass('hidden');

        container.masonry({
        isAnimated: true,
        itemSelector:'.latest-work-item:not(.hidden)',
        columnWidth: '.grid-sizer',
        });

        container.masonry();
        container.find('.'+category).show(500);
        container.find('.latest-work-item:not(.'+category+')').hide(500);
        location.hash = category;
        e.preventDefault(); 

    });

    if(location.hash!=''){
        jQuery('a[href="'+location.hash+'"]').trigger('click');
    }
});
}

// Portfolio Page
// Portfolio Style 1
// ======================
if( jQuery('body').find('.portfolio-1-wrapper').length>0 ) {
jQuery(function(jQuery) {
    var nav=jQuery('.portfolio-style-1-filter');
    var container=jQuery('.portfolio-1-wrapper');
    container.masonry({
    isAnimated: true,
    itemSelector:'.portfolio-item:not(.hidden)',
    columnWidth: '.grid-sizer',
});
    container.masonry();
 // Filter for Portfolio
    jQuery('.portfolio-style-1-filter a').click(function(e){
        var menuactive = jQuery(this).attr('href');
        var category = jQuery(this).attr('href').replace('#','');
        nav.find('li').removeClass('active'); /* Portfolio menu remove active */
        nav.find('li.slug-'+category).addClass('active');
        container.find('.portfolio-item').removeClass('hidden'); 
        container.find('.portfolio-item:not(.'+category+')').addClass('hidden');

        container.masonry({
        isAnimated: true,
        itemSelector:'.portfolio-item:not(.hidden)',
        columnWidth: '.grid-sizer',
        });

        container.masonry();
        container.find('.'+category).show(500);
        container.find('.portfolio-item:not(.'+category+')').hide(500);
        location.hash = category;
        e.preventDefault(); 

    });

    if(location.hash!=''){
        jQuery('a[href="'+location.hash+'"]').trigger('click');
    }
});
}

// Portfolio Style 2
// ======================
if( jQuery('body').find('.portfolio-2-wrapper').length>0 ) {
jQuery(function(jQuery) {
    var nav=jQuery('.portfolio-style-1-filter');
    var container=jQuery('.portfolio-2-wrapper');
    container.masonry({
    isAnimated: true,
    itemSelector:'.portfolio-item-2:not(.hidden)',
    columnWidth: '.grid-sizer',
    gutter: 15,
});
    container.masonry();
 // Filter for Portfolio
    jQuery('.portfolio-style-1-filter a').click(function(e){
        var menuactive = jQuery(this).attr('href');
        var category = jQuery(this).attr('href').replace('#','');
        nav.find('li').removeClass('active'); /* Portfolio menu remove active */
        nav.find('li.slug-'+category).addClass('active');
        container.find('.portfolio-item-2').removeClass('hidden'); 
        container.find('.portfolio-item-2:not(.'+category+')').addClass('hidden');

        container.masonry({
        isAnimated: true,
        itemSelector:'.portfolio-item-2:not(.hidden)',
        columnWidth: '.grid-sizer',
        });

        container.masonry();
        container.find('.'+category).show(500);
        container.find('.portfolio-item-2:not(.'+category+')').hide(500);
        location.hash = category;
        e.preventDefault(); 

    });

    if(location.hash!=''){
        jQuery('a[href="'+location.hash+'"]').trigger('click');
    }
});
}

// Portfolio Style 3
// ======================
if( jQuery('body').find('.portfolio-3-wrapper').length>0 ) {
jQuery(function(jQuery) {
    var nav=jQuery('.portfolio-style-1-filter');
    var container=jQuery('.portfolio-3-wrapper');
    container.masonry({
    isAnimated: true,
    itemSelector:'.portfolio-item-3:not(.hidden)',
    columnWidth: '.grid-sizer',
    gutter: 30,
});
    container.masonry();
 // Filter for Portfolio
    jQuery('.portfolio-style-1-filter a').click(function(e){
        var menuactive = jQuery(this).attr('href');
        var category = jQuery(this).attr('href').replace('#','');
        nav.find('li').removeClass('active'); /* Portfolio menu remove active */
        nav.find('li.slug-'+category).addClass('active');
        container.find('.portfolio-item-3').removeClass('hidden'); 
        container.find('.portfolio-item-3:not(.'+category+')').addClass('hidden');

        container.masonry({
        isAnimated: true,
        itemSelector:'.portfolio-item-3:not(.hidden)',
        columnWidth: '.grid-sizer',
        });

        container.masonry();
        container.find('.'+category).show(500);
        container.find('.portfolio-item-3:not(.'+category+')').hide(500);
        location.hash = category;
        e.preventDefault(); 

    });

    if(location.hash!=''){
        jQuery('a[href="'+location.hash+'"]').trigger('click');
    }
});
}

// BLOG
// Style 1
// ======================
if( jQuery('body').find('.blog-style-1').length>0 ) {
jQuery(function(jQuery) {
    var container=document.querySelector('.blog-style-1');
        var msnry = new Masonry( container, {
        isAnimated: true,
        itemSelector:'.blog-item',
        columnWidth: '.blog-sizer',
        gutter: 29,
        isResizable: true
    });
});
}

// BLOG
// Style 3
// ======================
if( jQuery('body').find('.blog-style-3').length>0 ) {
jQuery(function(jQuery) {
    var container=jQuery('.blog-style-3');
    container.imagesLoaded( function(){ 
        container.masonry({
        isAnimated: true,
        itemSelector:'.blog-item',
        columnWidth: '.blog-sizer',
        gutter: 30,
        isResizable: true
});
});
}); }

// ANIMATION
// ======================
jQuery(document).ready(function() {"use strict";
   var myclasses;
   var myclass;
   var ekclass;
jQuery('.blind').waypoint(function() {
   myclasses = this.className;
   myclass = myclasses.split(" ");
   ekclass = myclass[0].split("-");
    if ( ekclass[0] !== "no_animation" && myclass[1] === "blind") {
                jQuery(this).addClass('v '+ekclass[0]);
                                                   }
}, { offset: '80%' });
});

// ANIMATION 2
// ======================
jQuery(document).ready(function() {
    var $body = $('body');
    $(window).load(function() {
        $body.toggleClass('on off');
        $('.on_off').click(function() {
            $body.toggleClass('on off');
            setTimeout(function() {
                $body.toggleClass('on off');
            }, 3000)
        });
    });  
    var transitionDelay=0;
    function findMaxYLValue(){
        var max=0;elArray=[];
        $('*[class*="anim_"]').each(function(){
            var animValue=$(this).attr('class').split(" ");
            var i,value;
            for(i=0;i<animValue.length;++i){
                value=animValue[i];if(value.substring(0,5)==="anim_"){
                    elArray.push(value.substring(5));
                    break;
                    }}});
            var maxValue='.anim_'+Math.max.apply(Math,elArray),$maxValueEl=$(maxValue).first();
            $maxValueEl.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(e){
            var transitionDelayValue=$maxValueEl.css("transition-delay");
            transitionDelay=Math.ceil(parseFloat(transitionDelayValue.substring(0,transitionDelayValue.length-1)*1000)*1)/1;
            });}findMaxYLValue();$('body').on('click','.trigger',function(e){
            e.preventDefault();
            $body.toggleClass('on off');
            var link=$(this).attr('href');
            setTimeout(function(){
            location.href=link;},transitionDelay);
    });
});