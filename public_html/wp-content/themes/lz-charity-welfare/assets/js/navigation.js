/* global lz_charity_welfareScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function lz_charity_welfare_open() {
	  document.getElementById("sidelong-menu").style.width = "250px";
}
function lz_charity_welfare_close() {
  document.getElementById("sidelong-menu").style.width = "0";
}

(function( $ ) {
	/**** Hidden search box ***/
	jQuery('document').ready(function($){
		$('.search-box span a').click(function(){
	        $(".serach_outer").slideDown(700);
	    });

	    $('.closepop a').click(function(){
	        $(".serach_outer").slideUp(700);
	    });
	});
	
})( jQuery );
