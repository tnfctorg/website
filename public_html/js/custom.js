// JavaScript Document

		
		
    $(document).ready(function(){


	
	 // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
	
	$(function() {
    $('a.page-scroll,a.gotop').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top-50
        }, 500);
        event.preventDefault();
    });
});
		$('.carousel').carousel({
	interval:3000,
	});


	 
        $('.gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          closeOnContentClick: false,
          closeBtnInside: false,
          mainClass: 'mfp-with-zoom mfp-img-mobile',
        
          gallery: {
            enabled: true
          },
          zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
              return element.find('img');
            }
          }
          
        });
  
  
   // add this code after popup JS file is included
    $.magnificPopup.instance.next = function() {    
        // if index is not last, call parent method
        if($.magnificPopup.instance.index < $.magnificPopup.instance.items.length - 1) {
            // You may call parent ("original") method like so:
            $.magnificPopup.proto.next.call(this /*, optional arguments */);
        }
    };
    $.magnificPopup.instance.prev = function() {
        // if index is not first, call parent method
        if($.magnificPopup.instance.index > 0) {
            // You may call parent ("original") method like so:
            $.magnificPopup.proto.prev.call(this /*, optional arguments */);
        }
    };

    $.magnificPopup.instance.toggleArrows = function() {
        // if index is not last, show the Next-Image Arrow Button:
        if($.magnificPopup.instance.index < $.magnificPopup.instance.items.length - 1) {
            $(".mfp-arrow-right").show();
        }
        // if index is last, hide the Next-Image Arrow Button:
        if($.magnificPopup.instance.index == $.magnificPopup.instance.items.length - 1) {
            $(".mfp-arrow-right").hide();
        }

        // if index is not first, show the Previous-Image Arrow Button:
        if($.magnificPopup.instance.index > 0) {
            $(".mfp-arrow-left").show();
        }
        // if index is first, hide the Previous-Image Arrow Button:
        if($.magnificPopup.instance.index == 0) {
            $(".mfp-arrow-left").hide();
        }
    };

    $.magnificPopup.instance.updateItemHTML = function() {
        $.magnificPopup.instance.toggleArrows();
        // You may call parent ("original") method like so:
        $.magnificPopup.proto.updateItemHTML.call(this /*, optional arguments */);
    };

	});