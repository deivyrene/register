/*-----------------------------------------------------------------------------------*/
/*  PORTFOLIO
/*-----------------------------------------------------------------------------------*/
/*$(window).load(function(){
  'use strict';
  var portfolio_selectors = $('.portfolio-filter li a');
  if(portfolio_selectors!='undefined'){
    var portfolio = $('.portfolio-items');
    portfolio.isotope({
      itemSelector : 'li',
      layoutMode : 'fitRows'
    });
    portfolio_selectors.on('click', function(){
      portfolio_selectors.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      portfolio.isotope({ filter: selector });
      return false;
    });
  }
});

jQuery(function($) {
'use strict';
	$('.tile-progress .tile-header').matchHeight();

	var footerHeight = jQuery('#footer-wrapper').outerHeight();
	jQuery('#content-wrapper').css('margin-bottom', footerHeight );

	var windowsHeight = jQuery(window).height();
	var navHeight = jQuery('navbar-fixed-top').outerHeight();
	var newHeight = windowsHeight - navHeight + 30;
    jQuery('#main-slider').css('height', newHeight + 'px');
    jQuery('#single-page-slider').css('min-height', windowsHeight/3 + 'px');
*/
	//goto top
	$('.toTop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	
/*
	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		theme: 'light_square'
	});	

	jQuery('.prevbg').click(function(x) { x.preventDefault(); jQuery('body').data('backstretch').prev(); });
  	jQuery('.nextbg').click(function(x) { x.preventDefault(); jQuery('body').data('backstretch').prev(); });
});*/

/*-----------------------------------------------------------------------------------*/
/*  FANCY NAV
/*-----------------------------------------------------------------------------------*/
/*$(window).scroll(function() {
'use strict';
    var scroll_pos = 0;
    $(document).scroll(function() { 
        var windowsHeight = $(window).height();
        scroll_pos = $(this).scrollTop();
        if(scroll_pos > windowsHeight) {     	        
            $('.navbar-fixed-top').removeClass('opaqued');
        } else {
            $('.navbar-fixed-top').addClass('opaqued');
        }
    });

  	if  ( ($(document).height() - $(window).height()) - $(window).scrollTop() < 1000 ){
	    $('#footer-wrapper').css('z-index','4');
	} else {
		$('#footer-wrapper').css('z-index','1');
	}

});

jQuery(document).ready(function($){
'use strict';
  var windowsHeight = $(window).height();
  scroll_pos = $(this).scrollTop();
  if(scroll_pos > windowsHeight) {              
      $('.navbar-fixed-top').removeClass('opaqued');
  } else {
      $('.navbar-fixed-top').addClass('opaqued');
  }
  if  ( ($(document).height() - $(window).height()) - $(window).scrollTop() < 1000 ){
      $('#footer-wrapper').css('z-index','4');
    } else {
      $('#footer-wrapper').css('z-index','1');
   }
});

*/
/*-----------------------------------------------------------------------------------*/
/*  SEARCH BAR
/*-----------------------------------------------------------------------------------*/
/*jQuery(document).ready(function($){
'use strict';
  jQuery('#search-wrapper, #search-wrapper input').hide();

	jQuery('span.search-trigger').click(function(){
		jQuery('#search-wrapper').slideToggle(0, function() {
			var check=$(this).is(":hidden");
			if(check == true) {
		  		jQuery('#search-wrapper input').fadeOut(600);
			} else {
				jQuery("#search-wrapper input").focus();
				jQuery('#search-wrapper input').slideDown(200);
			}
		});
	});

  $('#main-slider .carousel-content').flexVerticalCenter({ cssAttribute: 'padding-top' });

});
*/
/*-----------------------------------------------------------------------------------*/
/*  NICESCROLL
/*-----------------------------------------------------------------------------------*/
 

/*-----------------------------------------------------------------------------------*/
/*  ANIMATE
/*-----------------------------------------------------------------------------------*/
$(function() {
    $('.fade-up, .fade-down, .bounce-in, .flip-in, .bounce-in-left, .bounce-in-right, .zoom-in').addClass('no-display');
    $('.slide-in-left, .slide-in-right').addClass('no-display');

    $(document).on('inview', '.bounce-in', function() {
        $(this).addClass('animated bounceIn appear');
    });
    $(document).on('inview', '.flip-in', function() {
        $(this).addClass('animated flipInY appear');
    });
    $(document).on('inview', '.bounce-in-left', function() {
        $(this).addClass('animated bounceInLeft appear');
    });
    $(document).on('inview', '.bounce-in-right', function() {
        $(this).addClass('animated bounceInRight appear');
    });
    $(document).on('inview', '.zoom-in', function() {
        $(this).addClass('animated zoomIn appear');
    });
    $(document).on('inview', '.slide-in-left', function() {
        $(this).addClass('animated slideInLeft appear');
    });
    $(document).on('inview', '.slide-in-right', function() {
        $(this).addClass('animated slideInRight appear');
    });
    $(document).on('inview', '.fade-up', function() {
        $(this).addClass('animated fadeInUp appear');
    });
    $(document).on('inview', '.fade-down', function() {
        $(this).addClass('animated fadeInDown appear');
    });
});

/*-----------------------------------------------------------------------------------*/
/*  SNOOOOOOOOTH SCROLL - SO SMOOTH
/*-----------------------------------------------------------------------------------*/
/*$(function() {
'use strict';
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
					}, 1000);
				return false;
			}
		}
	});
});*/
/*-----------------------------------------------------------------------------------*/
/*  CAROUSEL
/*-----------------------------------------------------------------------------------*/
$(function() {
    
    // invoke the carousel
    $('#myCarousel').carousel({
        interval:6000
    });
    //scroll slides on swipe for touch enabled devices 
    $("#myCarousel").on("touchstart", function(event){ 
        var yClick = event.originalEvent.touches[0].pageY;
        $(this).one("touchmove", function(event){
            var yMove = event.originalEvent.touches[0].pageY;
            if( Math.floor(yClick - yMove) > 1 ){
                $(".carousel").carousel('next');
            }
            else if( Math.floor(yClick - yMove) < -1 ){
                $(".carousel").carousel('prev');
            }
        });
            $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
        });
    });
    //animated  carousel start
    //to add  start animation on load for first slide 
    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass(animationName);
            }); 
        }
    });
    $('.item1.active img').animateCss('slideInDown');
    $('.item1.active h2').animateCss('fadeInDown');
    $('.item1.active p').animateCss('fadeInDown');

    //to start animation on  mousescroll , click and swipe
    $("#myCarousel").on('slide.bs.carousel', function () {
        // add animation type  from animate.css on the element which you want to animate
        $('.item1 img').animateCss('fadeInDown');
        $('.item1 h2').animateCss('fadeInDown');
        $('.item1 p').animateCss('fadeInDown');

        $('.item2 img').animateCss('fadeInUp');
        $('.item2 h2').animateCss('fadeInUp');
        $('.item2 p').animateCss('fadeInUp');
        
        $('.item3 img').animateCss('fadeIn');
        $('.item3 h2').animateCss('fadeIn');
        $('.item3 p').animateCss('fadeIn');
    });
});
/*-----------------------------------------------------------------------------------*/
/*  CONTACT FORM
/*-----------------------------------------------------------------------------------*/
// Flip Card
$("#card").flip({trigger: 'manual',autoSize: true});
$("#contact").click(function() {$("#card").flip(true);});
$("#address").click(function(){$("#card").flip(false);$("#msg").removeClass('alert alert-success alert-danger');$("#msg").html('');});
var frontHeight = $('.front').outerHeight();
var backHeight = $('.back').outerHeight();

if (frontHeight < backHeight) {
    $('#card, .back').height(frontHeight);
}
else if (frontHeight < backHeight) {
    $('#card, .front').height(backHeight);
}
else {
    $('#card').height(backHeight);
}

// Animate JS Form
$.fn.extend({
    animateCssOut: function(animationName, callback) {
        var animationEnd = (function(el) {
            var animations = {
                animation: 'animationend',
                OAnimation: 'oAnimationEnd',
                MozAnimation: 'mozAnimationEnd',
                WebkitAnimation: 'webkitAnimationEnd',
            };
            for (var t in animations) {
                if (el.style[t] !== undefined) {
                    return animations[t];
                }
            }
        })(document.createElement('div'));
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            if (typeof callback === 'function') callback();
        });
        return this;
    },
});
$('#send').click(function(e) {
    var btn = $(this);
    var Nombre = $("#nombre").val(),
        Email = $("#email").val(),
        Mensaje = $("#mensaje").val();
    var data = ValidarContact(Nombre, Email, Mensaje);

    if(!data){
        $.ajax({
            url: 'landing/db/mail.php',
            type: 'POST',
            data: {Nombre: Nombre, Email: Email, Mensaje: Mensaje},
            beforeSend:function(){
                $("#address").prop('disabled', 'disabled');
                $("#msg").html('');
                $("#contacto :input, #contacto textarea").attr("disabled", true);
                btn.button('loading');
            },
            success:function(action) {
                if (!action) {
                    $('#contacto').animateCssOut('zoomOut', function() {
                        $('#contacto').prop('style','display:none');
                    });
                    $("#msg").html('Mensaje enviado exitosamente.');
                    $("#msg").removeClass('alert alert-danger');
                    $("#msg").addClass('alert alert-success');
                    $("#msg").prop('style', '-webkit-animation-duration: 2s;-webkit-animation-delay: 0.5s;');
                    $('#msg').animateCssOut('fadeInDown', function() {
                        $("#card").flip(false);
                        $("#msg").removeClass('alert alert-success alert-danger');
                        $("#msg").html('');
                        $('#contacto').prop('style','display:block');
                        $('#contacto')[0].reset();
                    });
                }else{
                    $("#msg").html(action);
                    $("#msg").removeClass('alert alert-success');
                    $("#msg").addClass('alert alert-danger');
                    $('#msg').animateCssOut('fadeInDown');
                }
                $("#contacto :input, #contacto textarea").attr("disabled", false);
                $("#address").prop('disabled', '');
                btn.button('reset');
            }
        });
    }else{
        alert(data);
    }
    
});

var ValidarContact = function(a,b,c){
    var msj = "";
    if(a==""){
        msj += 'Debe ingresar un nombre.';
    }
    if (b=="") {
        msj += 'Debe ingresar un correo.';
    }
    if (c=="") {
        msj += 'Debe ingresar un mensaje.';
    }
    return msj;
}
/*-----------------------------------------------------------------------------------*/
/*  PRELOADER
/*-----------------------------------------------------------------------------------*/
$(function() {
    'use strict';
    $('#preloader').fadeOut('slow',function(){
        $(this).remove();
        $('body').removeClass('loading');
    });
});
/*-----------------------------------------------------------------------------------*/
/*  GOOGLE MAPS
/*-----------------------------------------------------------------------------------*/
var myLatlng = new google.maps.LatLng(-33.404711, -70.571483);
var myLatlngMarker = new google.maps.LatLng(-33.404191, -70.569652);
var mapOptions = {
    zoom: 16,
    center: myLatlng,
    draggable: false,
    zoomControl: false,
    scrollwheel: false,
    disableDoubleClickZoom: true,
    disableDefaultUI: true
}
var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
var marker = new google.maps.Marker({
    position: myLatlngMarker
});
marker.setMap(map);