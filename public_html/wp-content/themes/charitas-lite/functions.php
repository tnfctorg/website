<?php
/**
 * Charitas functions and definitions
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 790; /* pixels */


	/*-----------------------------------------------------------
		Include Customizer
	-----------------------------------------------------------*/
	
	include_once( get_template_directory() . '/inc/customize.php' );
/*-----------------------------------------------------------------------------------*/
/*	Theme setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_setup' ) ) :

function charitas_setup() {


	/*-----------------------------------------------------------
		Make theme available for translation
	-----------------------------------------------------------*/

	load_theme_textdomain( 'charitas-lite', get_template_directory() . '/languages' );


	/*-----------------------------------------------------------
		Theme style for the visual editor
	-----------------------------------------------------------*/
	
	add_editor_style( 'css/editor-style.css' );

	/*-----------------------------------------------------------
		Add default posts and comments RSS feed links to head
	-----------------------------------------------------------*/
	
	add_theme_support( 'automatic-feed-links' );
	

	/*-----------------------------------------------------------
		Enable support for Title Tag
	-----------------------------------------------------------*/
	
	add_theme_support( 'title-tag' );


	/*-----------------------------------------------------------
		Enable support for Post Thumbnails on posts and pages
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'charitas-lite-small-thumb', 272, 150, true );
	add_image_size( 'charitas-lite-medium-thumb', 500, 277, true );
	add_image_size( 'charitas-lite-big-thumb', 1200, 661, true );
	
	/*-----------------------------------------------------------
		Register menu
	-----------------------------------------------------------*/
	
	function register_my_menus() {
		register_nav_menus(
				array(
					'primary' => __( 'Main Menu', 'charitas-lite' ),
					'language' => __( 'Language Menu', 'charitas-lite' ),
				) 
		);
	}
		
	add_action( 'init', 'register_my_menus' );
	wp_create_nav_menu( 'Main Menu', array( 'slug' => 'primary' ) );
	wp_create_nav_menu( 'Language Menu', array( 'slug' => 'language' ) );
	
	/*-----------------------------------------------------------
		Enable support for Post Formats
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'status' ) );


	/*-----------------------------------------------------------
		Add theme Support Custom Background
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-background' );


	/*-----------------------------------------------------------
		Add theme Support  Custom Header
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-header' );

}
endif; // charitas_setup
add_action( 'after_setup_theme', 'charitas_setup' );



/*-----------------------------------------------------------------------------------*/
/*	Include Theme specific functionality
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_initiate_files' ) ) {

	function charitas_initiate_files() {
		include_once( get_template_directory() . '/inc/widgets/widget-init.php' );				// Initiate all widgets
		include_once( get_template_directory() . '/inc/headerdata.php' );						// Include header data
		include_once( get_template_directory() . '/inc/library.php' );							// Include other functions
		require_once (get_template_directory() . '/inc/' . 'comment.php');						// Comments
	}
	add_action( 'after_setup_theme', 'charitas_initiate_files' );

}

/*-----------------------------------------------------------------------------------*/
/*	Custom Background
/*-----------------------------------------------------------------------------------*/


add_theme_support( 'custom-background', apply_filters( 'charitas_custom_background_args', array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	) ) );

/*-----------------------------------------------------------
	Custom Header
-----------------------------------------------------------*/

$custom_header = array(
	'default-image'          => get_template_directory_uri() . '/images/church.jpg',
	'random-default'         => false,
	'width'                  => '1920',
	'height'                 => '714',
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header );