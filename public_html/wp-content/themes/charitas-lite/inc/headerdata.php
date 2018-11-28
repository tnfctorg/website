<?php
/**
 * Header data
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Include CSS
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wpl_css_include' ) ) {
	
	function wpl_css_include () {

		/*-----------------------------------------------------------
			Loads our main stylesheet.
		-----------------------------------------------------------*/
		
		wp_enqueue_style( 'charitaslite-style', get_stylesheet_uri(), array(), '2015-04-01' );

		/*-----------------------------------------------------------
			IcoMoon
		-----------------------------------------------------------*/

		wp_register_style('fonts', get_template_directory_uri().'/css/customicons/style.css', 'css', '');
		wp_enqueue_style('fonts');


		/*-----------------------------------------------------------
			FlexSlider
		-----------------------------------------------------------*/
		
		wp_register_style('flexslider', get_template_directory_uri().'/css/flexslider.css', 'css', '');
		wp_enqueue_style('flexslider');


		/*-----------------------------------------------------------
			Grid
		-----------------------------------------------------------*/
		
		wp_register_style('grid', get_template_directory_uri().'/css/grid.css', 'css', '');
		wp_enqueue_style('grid');


		/*-----------------------------------------------------------
			meanMenu
		-----------------------------------------------------------*/
		
		wp_register_style('meanmenu', get_template_directory_uri().'/css/meanmenu.css', 'css', '');
		wp_enqueue_style('meanmenu');

		
		/*-----------------------------------------------------------------------------------*/
		/*	Keyframe / animation
		/*-----------------------------------------------------------------------------------*/
		
		wp_register_style('keyframes', get_template_directory_uri().'/css/keyframes.css', 'css', '');
		wp_enqueue_style('keyframes');

	}
	
	add_action( 'wp_enqueue_scripts', 'wpl_css_include' );
}

/*-----------------------------------------------------------------------------------*/
/*	Include Java Scripts
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'wpl_scripts_include' ) ) {
	
	function wpl_scripts_include() {
		
		/*-----------------------------------------------------------
			Include jQuery
		-----------------------------------------------------------*/
		
		wp_enqueue_script('jquery');


		if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		

		/*-----------------------------------------------------------
	    	Base custom scripts
	    -----------------------------------------------------------*/

		wp_enqueue_script( 'base', get_template_directory_uri().'/js/base.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			FlexSlider
		-----------------------------------------------------------*/
		
		wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', '', '', 'footer' );

		/*-----------------------------------------------------------
			meanMenu
		-----------------------------------------------------------*/
		
		wp_enqueue_script( 'meanmenu', get_template_directory_uri().'/js/jquery.meanmenu.js', '', '', 'footer' );

		/*-----------------------------------------------------------
			Fitvids
		-----------------------------------------------------------*/
		
		wp_enqueue_script( 'fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', '', '', 'footer' );

	}
	add_action('wp_enqueue_scripts', 'wpl_scripts_include');
}


if(preg_match('/(?i)msie [7-8]/',$_SERVER['HTTP_USER_AGENT'])) {
	function wpl_ie8_gix_css () {
		wp_register_style('ie8', get_template_directory_uri().'/css/ie8.css', 'css', '');
		wp_enqueue_style('ie8');
	}
	add_action( 'wp_enqueue_scripts', 'wpl_ie8_gix_css' );
	
}

/*  ----------------------------------------------------------
	Include Script for Internet Explorer ver 6 and 7
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
if(preg_match('/(?i)msie [6-7]/',$_SERVER['HTTP_USER_AGENT'])) {
	
	function wplook_ie_version() {
			wp_enqueue_script( 'customicons', get_template_directory_uri() . '/css/customicons/ie7/ie7.js', '', '',  '' );

			wp_register_style('icomoonie', get_template_directory_uri().'/css/customicons/ie7/ie7.css', 'css', '');
			wp_enqueue_style('icomoonie');
		}
	add_filter( 'wp_head', 'wplook_ie_version' );
	
}

/*-----------------------------------------------------------------------------------*/
/*	Doctitle
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wplook_doctitle' ) ) {

	function wplook_doctitle() {

		if ( is_search() ) { 
		  $content = __('Search Results for:', 'charitas-lite'); 
		  $content .= ' ' . esc_html(stripslashes(get_search_query()));
		}

		elseif ( is_category() ) {
		  $content = __('', 'charitas-lite');
		  $content .= ' ' . single_cat_title("", false);
		}

		elseif ( is_day() ) {
			$content = __( '', 'charitas-lite');
			$content .= ' ' . esc_html(stripslashes( get_the_date()));
		}
		
		elseif ( is_month() ) {
			$content = __( '', 'charitas-lite');
			$content .= ' ' . esc_html(stripslashes( get_the_date( 'F Y' )));
		}
		elseif ( is_year()  ) {
			$content = __( '', 'charitas-lite');
			$content .= ' ' . esc_html(stripslashes( get_the_date( 'Y' ) ));
		}		
		
		elseif ( is_tag() ) { 
		  $content = __('', 'charitas-lite');
		  $content .= ' ' . single_tag_title( '', false );
		}

		elseif ( is_author() ) { 
		  $content = __("", 'charitas-lite');
		  
		} 
		
		elseif ( is_404() ) { 
		  $content = __('Not Found', 'charitas-lite'); 
		}
		
		else { 
			$content = '';
		}
		
		$elements = array("content" => $content);   

		// Filters should return an array
		$elements = apply_filters('wplook_doctitle', $elements);
		
		// But if they don't, it won't try to implode
			if(is_array($elements)) {
			  $doctitle = implode(' ', $elements);
			} else {
			  $doctitle = $elements;
			}

			if ( is_search() || is_category() || is_day() || is_month() || is_year() || is_404() || is_tag() || is_author() ) {
				$doctitle = "<header class=\"page-header\"><h1 class=\"page-title\">" . $doctitle . "</h1><div class=\"left-corner\"></div></header>";
			}

		echo $doctitle;

	} 
} ?>