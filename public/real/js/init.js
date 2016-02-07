jQuery(function($){

var REAL = window.REAL || {};

/* ==================================================
	Contact Form Validations
================================================== */
	REAL.ContactForm = function(){
		$('.contact-form').each(function(){
			var formInstance = $(this);
			formInstance.submit(function(){
		
			var action = $(this).attr('action');
		
			$("#message").slideUp(750,function() {
			$('#message').hide();
		
			$('#submit')
				.after('<img src="images/assets/ajax-loader.gif" class="loader" />')
				.attr('disabled','disabled');
		
			$.post(action, {
				name: $('#name').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				comments: $('#comments').val()
			},
				function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('.contact-form img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit').removeAttr('disabled');
					if(data.match('success') != null) $('.contact-form').slideUp('slow');
		
				}
			);
			});
			return false;
		});
		});
	}

/* ==================================================
	Responsive Nav Menu
================================================== */
	REAL.navMenu = function() {
		// Responsive Menu Events
		$(".menu-toggle").click(function(){
			$(".main-menu-wrapper").slideToggle();
			return false;
		});
		$(window).resize(function(){
			if($(".menu-toggle").hasClass("opened")){
				$(".main-menu-wrapper").css("display","block");
			} else {
				$(".menu-toggle").css("display","none");
			}
		});
	}
/* ==================================================
	Scroll to Top
================================================== */
	REAL.scrollToTop = function(){
		var windowWidth = $(window).width(),
			didScroll = false;
	
		var $arrow = $('#back-to-top');
	
		$arrow.click(function(e) {
			$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
			e.preventDefault();
		})
	
		$(window).scroll(function() {
			didScroll = true;
		});
	
		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
	
				if( $(window).scrollTop() > 200 ) {
					$arrow.fadeIn();
				} else {
					$arrow.fadeOut();
				}
			}
		}, 250);
	}
/* ==================================================
   Accordion
================================================== */
	REAL.accordion = function(){
		var accordion_trigger = $('.accordion-heading.accordionize');
		
		accordion_trigger.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				accordion_trigger.find('.active').addClass('inactive');          
				accordion_trigger.find('.active').removeClass('active');   
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Toggle
================================================== */
	REAL.toggle = function(){
		var accordion_trigger_toggle = $('.accordion-heading.togglize');
		
		accordion_trigger_toggle.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Tooltip
================================================== */
	REAL.toolTip = function(){ 
		$('a[data-toggle=tooltip]').tooltip();
	}
/* ==================================================
   Twitter Widget
================================================== */
	REAL.TwitterWidget = function() {
		$('.twitter-widget').each(function(){
			var twitterInstance = $(this); 
			twitterTweets = twitterInstance.attr("data-tweets-count") ? twitterInstance.attr("data-tweets-count") : "2"
			twitterInstance.twittie({
            	dateFormat: '%b. %d, %Y',
            	template: '<li><i class="fa fa-twitter"></i> {{tweet}} <span class="date">{{date}}</span></li>',
            	count: twitterTweets,
            	hideReplies: true
        	});
		});
	}
/* ==================================================
   Flex Slider
================================================== */
	REAL.FlexSlider = function() {
		$('.flexslider').each(function(){
				var sliderInstance = $(this); 
				sliderAutoplay = sliderInstance.attr("data-autoplay") == 'yes' ? true : false,
				sliderPagination = sliderInstance.attr("data-pagination") == 'yes' ? true : false,
				sliderArrows = sliderInstance.attr("data-arrows") == 'yes' ? true : false,
				sliderDirection = sliderInstance.attr("data-direction") ? sliderInstance.attr("data-direction") : "horizontal",
				sliderStyle = sliderInstance.attr("data-style") ? sliderInstance.attr("data-style") : "fade",
				sliderSpeed = sliderInstance.attr("data-speed") ? sliderInstance.attr("data-speed") : "5000",
				sliderPause = sliderInstance.attr("data-pause") == 'yes' ? true : false,
				
				sliderInstance.flexslider({
					animation: sliderStyle,
					easing: "swing",               
					direction: sliderDirection,       
					slideshow: sliderAutoplay,              
					slideshowSpeed: sliderSpeed,         
					animationSpeed: 600,         
					initDelay: 0,              
					randomize: false,            
					pauseOnHover: sliderPause,       
					controlNav: sliderPagination,           
					directionNav: sliderArrows,            
					prevText: "",          
					nextText: "",
					start: function(){$(".flex-caption").fadeIn();}
				});
		});
	}
/* ==================================================
   Owl Carousel
================================================== */
	REAL.OwlCarousel = function() {
		$('.owl-carousel').each(function(){
				var carouselInstance = $(this); 
				carouselColumns = carouselInstance.attr("data-columns") ? carouselInstance.attr("data-columns") : "1",
				carouselitemsDesktop = carouselInstance.attr("data-items-desktop") ? carouselInstance.attr("data-items-desktop") : "4",
				carouselitemsDesktopSmall = carouselInstance.attr("data-items-desktop-small") ? carouselInstance.attr("data-items-desktop-small") : "3",
				carouselitemsTablet = carouselInstance.attr("data-items-tablet") ? carouselInstance.attr("data-items-tablet") : "2",
				carouselitemsMobile = carouselInstance.attr("data-items-mobile") ? carouselInstance.attr("data-items-mobile") : "1",
				carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false,
				carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false,
				carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false,
				carouselSingle = carouselInstance.attr("data-single-item") == 'yes' ? true : false
				carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade",
				
				carouselInstance.owlCarousel({
					items: carouselColumns,
					autoPlay : carouselAutoplay,
					navigation : carouselArrows,
					pagination : carouselPagination,
					itemsDesktop:[1199,carouselitemsDesktop],
					itemsDesktopSmall:[979,carouselitemsDesktopSmall],
					itemsTablet:[768,carouselitemsTablet],
					itemsMobile:[479,carouselitemsMobile],
					singleItem:carouselSingle,
					navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
					stopOnHover: true,
					lazyLoad: true,
					transitionStyle: carouselStyle
				});
		});
	}
/* ==================================================
   PrettyPhoto
================================================== */
	REAL.PrettyPhoto = function() {
			$("a[data-rel^='prettyPhoto']").prettyPhoto({
				  opacity: 0.5,
				  social_tools: "",
				  deeplinking: false
			});
	}
/* ==================================================
   Pricing Tables
================================================== */
	var $tallestCol;
	REAL.pricingTable = function(){
		$('.pricing-table').each(function(){
			$tallestCol = 0;
			$(this).find('> div .features').each(function(){
				($(this).height() > $tallestCol) ? $tallestCol = $(this).height() : $tallestCol = $tallestCol;
			});	
			if($tallestCol == 0) $tallestCol = 'auto';
			$(this).find('> div .features').css('height',$tallestCol);
		});
	}
/* ==================================================
   Animated Counters
================================================== */
	REAL.Counters = function() {
		$('.counters').each(function () {
			$(".timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60,
				});
			});
		});
	}
/* ==================================================
   SuperFish menu
================================================== */
	REAL.SuperFish = function() {
		$('.sf-menu').superfish({
			  delay: 200,
			  animation: {opacity:'show', height:'show'},
			  speed: 'fast',
			  cssArrows: false,
			  disableHI: true
		});
		$(".navigation > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-angle-down'></i>");
		$(".navigation > ul > li > ul > li:has(ul)").find("a:first").append(" <i class='fa fa-caret-right'></i>");
	}
/* ==================================================
   IsoTope Portfolio
================================================== */
		REAL.IsoTope = function() {	
			$("ul.sort-source").each(function() {

				var source = $(this);
				var destination = $("ul.sort-destination[data-sort-id=" + $(this).attr("data-sort-id") + "]");

				if(destination.get(0)) {

					$(window).load(function() {

						destination.isotope({
							itemSelector: ".grid-item",
							layoutMode: 'sloppyMasonry'
						});

						source.find("a").click(function(e) {

							e.preventDefault();

							var $this = $(this),
								filter = $this.parent().attr("data-option-value");

							source.find("li.active").removeClass("active");
							$this.parent().addClass("active");

							destination.isotope({
								filter: filter
							});

							if(window.location.hash != "" || filter.replace(".","") != "*") {
								self.location = "#" + filter.replace(".","");
							}

							return false;

						});

						$(window).bind("hashchange", function(e) {

							var hashFilter = "." + location.hash.replace("#",""),
								hash = (hashFilter == "." || hashFilter == ".*" ? "*" : hashFilter);

							source.find("li.active").removeClass("active");
							source.find("li[data-option-value='" + hash + "']").addClass("active");

							destination.isotope({
								filter: hash
							});

						});

						var hashFilter = "." + (location.hash.replace("#","") || "*");

						var initFilterEl = source.find("li[data-option-value='" + hashFilter + "'] a");

						if(initFilterEl.get(0)) {
							source.find("li[data-option-value='" + hashFilter + "'] a").click();
						} else {
							source.find("li:first-child a").click();
						}

					});

				}

			});
			$(window).load(function() {
				IsoTopeCont = $(".isotope-grid");
				IsoTopeCont.isotope({
					itemSelector: ".grid-item",
					layoutMode: 'sloppyMasonry'
				});
				if ($(".grid-holder").length > 0){	
					var $container_blog = $('.grid-holder');
					$container_blog.isotope({
					itemSelector : '.grid-item'
					});
			
					$(window).resize(function() {
					var $container_blog = $('.grid-holder');
					$container_blog.isotope({
						itemSelector : '.grid-item'
					});
					});
				}
			});
		}
/* ==================================================
   Sticky Navigation
================================================== */	
	REAL.StickyNav = function() {
		if($("body").hasClass("boxed"))
			return false;
		if ($(window).width() > 992){
			$(".main-menu-wrapper").sticky({topSpacing:0});
		}
	}
/* ==================================================
   Init Functions
================================================== */
$(document).ready(function(){
	REAL.ContactForm();
	REAL.scrollToTop();
	REAL.accordion();
	REAL.toggle();
	REAL.toolTip();
	REAL.navMenu();
	REAL.TwitterWidget();
	REAL.FlexSlider();
	REAL.PrettyPhoto();
	REAL.SuperFish();
	REAL.pricingTable();
	REAL.Counters();
	REAL.IsoTope();
	REAL.StickyNav();
	REAL.OwlCarousel();
	$('.selectpicker').selectpicker({container:'body'});
});

/* Design Related Scripts */
$(".flex-caption").each(function(){
	$(this).prepend('<i class="fa fa-caret-down"></i>');
});
$(".block-heading").each(function(){
	$(this).find('.heading-icon').prepend('<i class="fa fa-caret-right icon-design"></i>');
});
$(".property-featured-image").each(function(){
	PIheight = $(this).find("img").outerHeight();
	$(this).prepend("<div class='overlay' style='line-height:"+PIheight+"px'><i class='fa fa-search'></i></div>");
});
$(".agent-featured-image").each(function(){
	PIheight = $(this).find("img").outerHeight();
	$(this).prepend("<div class='overlay' style='line-height:"+PIheight+"px'><i class='fa fa-plus'></i></div>");
});
$(".format-image").each(function(){
	$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-search'></i></span>");
});
$(".format-standard").each(function(){
	$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-plus'></i></span>");
});
$(".format-video").each(function(){
	$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-play'></i></span>");
});
$(".format-link").each(function(){
	$(this).find(".media-box").append("<span class='zoom'><i class='fa fa-link'></i></span>");
});
$(".media-box .zoom").each(function(){
	mpwidth = $(this).parent().width();
	mpheight = $(this).parent().find("img").height();
	
	$(this).css("width", mpwidth);
	$(this).css("height", mpheight);
	$(this).css("line-height", mpheight+"px");
});

$(window).resize(function(){
	$(".media-box .zoom").each(function(){
		mpwidth = $(this).parent().width();
		mpheight = $(this).parent().find("img").height();
		
		$(this).css("width", mpwidth);
		$(this).css("height", mpheight);
		$(this).css("line-height", mpheight+"px");
	});
	if ($(window).width() > 992){
		$(".main-menu-wrapper").css("display","block");
	} else {
		$(".main-menu-wrapper").css("display","none");
	}
});

$('#ads-trigger').click(function () {	
	if ($(this).hasClass('advanced')) {
		$(this).removeClass('advanced');
		$(".site-search-module").animate({
			'bottom': '-107px'
		});
		$(this).html('<i class="fa fa-plus"></i> Advanced');
		$('.slider-mask').fadeOut(500);
	} else {
		
		$(this).addClass('advanced');
		$(".site-search-module").animate({
			'bottom': '-15px'
		});
		$(this).html('<i class="fa fa-minus"></i> Basic');
		$('.slider-mask').fadeIn(500);
	}	
	return false;
});

// FITVIDS
$(".container").fitVids();


// List Styles
$(".location").prepend('<i class="fa fa-map-marker"></i> ');
$(".nav-tabs li").prepend('<i class="fa fa-caret-down"></i> ');
$('ul.checks li').prepend('<i class="fa fa-check"></i> ');
$('ul.angles li, .nav-list-primary li a').prepend('<i class="fa fa-angle-right"></i> ');
$('ul.inline li').prepend('<i class="fa fa-check-circle-o"></i> ');
$('ul.chevrons li').prepend('<i class="fa fa-chevron-right"></i> ');
$('ul.carets li').prepend('<i class="fa fa-caret-right"></i> ');
$('a.external').prepend('<i class="fa fa-external-link"></i> ');



// Animation Appear
$("[data-appear-animation]").each(function() {

	var $this = $(this);
  
	$this.addClass("appear-animation");
  
	if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {
  
		$this.appear(function() {
  
			var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
  
			if(delay > 1) $this.css("animation-delay", delay + "ms");
			$this.addClass($this.attr("data-appear-animation"));
  
			setTimeout(function() {
				$this.addClass("appear-animation-visible");
			}, delay);
  
		}, {accX: 0, accY: -150});
  
	} else {
  
		$this.addClass("appear-animation-visible");
	}
});
// Animation Progress Bars
$("[data-appear-progress-animation]").each(function() {

	var $this = $(this);

	$this.appear(function() {

		var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);

		if(delay > 1) $this.css("animation-delay", delay + "ms");
		$this.addClass($this.attr("data-appear-animation"));

		setTimeout(function() {

			$this.animate({
				width: $this.attr("data-appear-progress-animation")
			}, 1500, "easeOutQuad", function() {
				$this.find(".progress-bar-tooltip").animate({
					opacity: 1
				}, 500, "easeOutQuad");
			});

		}, delay);

	}, {accX: 0, accY: -50});

});

// Parallax Jquery Callings
if(!Modernizr.touch) {
	$(window).bind('load', function () {
		parallaxInit();						  
	});
}
function parallaxInit() {
	$('.parallax1').parallax("50%", 0.1);
	$('.parallax2').parallax("50%", 0.1);
	$('.parallax3').parallax("50%", 0.1);
	$('.parallax4').parallax("50%", 0.1);
	$('.parallax5').parallax("50%", 0.1);
	$('.parallax6').parallax("50%", 0.1);
	$('.parallax7').parallax("50%", 0.1);
	$('.parallax8').parallax("50%", 0.1);
	/*add as necessary*/
}

// Window height/Width Getter Classes
wheighter = $(window).height();
wwidth = $(window).width();
$(".wheighter").css("height",wheighter);
$(".wwidth").css("width",wwidth);
$(window).resize(function(){
	wheighter = $(window).height();
	wwidth = $(window).width();
	$(".wheighter").css("height",wheighter);
	$(".wwidth").css("width",wwidth);
});
/* Property details slider */
	 $('#property-thumbs').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 175,
    itemMargin: 10,
    asNavFor: '#property-images',            
	prevText: "",          
	nextText: ""
  });
   
  $('#property-images').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#property-thumbs",            
	prevText: "",          
	nextText: ""
  });
});