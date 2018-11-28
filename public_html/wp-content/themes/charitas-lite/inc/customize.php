<?php
/**
 * Morning Time Customizer functionality
 *
 */

/**
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wplook_customize_register( $wp_customize ) {


	/*------------------------------------------------------------
		Toolbar Setings
	============================================================*/
	$wp_customize->add_section( 'wplook_toolbar_settings' , array(
			'title'      => __( 'Toolbar Settings', 'charitas-lite' ),
			'description'=> '',
			'priority'   => 160,
		)
	);

	/*------------------------------------------------------------
		Homepage Setings
	============================================================*/
	$wp_customize->add_section(
		'wplook_homepage_settings' ,
		array(
			'title'      => __( 'HomePage Settings', 'charitas-lite' ),
			'description'=> '',
			'priority'   => 160,
			'active_callback' => 'is_front_page',
		)
	);

	/*------------------------------------------------------------
		Homepage Slider
	============================================================*/
	$wp_customize->add_section(
		'wplook_homepage_slider' ,
		array(
			'title'      => __( 'HomePage Slider', 'charitas-lite' ),
			'description'=> '',
			'priority'   => 160,
			'active_callback' => 'is_front_page',
		)
	);


	/*------------------------------------------------------------
		General Setings
	============================================================*/
	$wp_customize->add_section( 'wplook_themes_settings' , array(
			'title'      => __( 'General Settings', 'charitas-lite' ),
			'description'=> '',
			'priority'   => 160,
		)
	);

	/*------------------------------------------------------------
		Blog Setings
	============================================================*/
	$wp_customize->add_section( 'wplook_blog_settings' , array(
			'title'      => __( 'Blog Settings', 'charitas-lite' ),
			'description'=> '',
			'priority'   => 160,
		)
	);

	/*------------------------------------------------------------
		Upload a logo
	============================================================*/
	$wp_customize->add_setting( 'wplook_logo', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_logo', array(
				'label'		=>  __( 'Logo', 'charitas-lite' ),
				'description' => __('Upload (190px x 50px) image size.', 'charitas-lite' ),
				'section' 	=> 'title_tagline',
				'settings' 	=> 'wplook_logo'
			)
		)
	);


	/*------------------------------------------------------------
		Home Page Slider
	============================================================*/

	// Activate Home page Slider
	$wp_customize->add_setting( 'wplook_activate_homepage_slider', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_activate_homepage_slider',  array(
			'label'    => __( 'Activate Home Page Slider', 'charitas-lite' ),
			'description'	=> __( 'Activate or deactivate the Homepage Sldier.', 'charitas-lite'),
			'section'  => 'wplook_homepage_slider',
			'type'     => 'radio',
			'choices'  => array(
				'yes'  => 'Yes',
				'no' => 'No',
			),
		)
	);


	// Title
	$wp_customize->add_setting( 'wplook_slide1_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide1_title', array(
			'label' 		=> __( 'Title', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Title.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	// Description
	$wp_customize->add_setting( 'wplook_slide1_description', array(
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'wplook_slide1_description', array(
			'label' 		=> __( 'Description', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Description.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
			'type'     => 'textarea',
		)
	);

	// URL
	$wp_customize->add_setting( 'wplook_slide1_url', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide1_url', array(
			'label' 		=> __( 'Slide URL', 'charitas-lite'),
			'description'	=> __( 'Enter a slide URL.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	//Slider Image
	$wp_customize->add_setting( 'wplook_slide1_image', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide1_image', array(
				'label'		=>  __( 'Image', 'charitas-lite' ),
				'description' => __('Upload (1920x714px) image size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	//Slider Thumbnail
	$wp_customize->add_setting( 'wplook_slide1_thumb', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide1_thumb', array(
				'label'		=>  __( 'Thumbnail', 'charitas-lite' ),
				'description' => __('Upload (272x150px) Thumbnail size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	// Title
	$wp_customize->add_setting( 'wplook_slide2_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide2_title', array(
			'label' 		=> __( 'Title', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Title.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	// Description
	$wp_customize->add_setting( 'wplook_slide2_description', array(
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'wplook_slide2_description', array(
			'label' 		=> __( 'Description', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Description.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
			'type'     => 'textarea',
		)
	);

	// URL
	$wp_customize->add_setting( 'wplook_slide2_url', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide2_url', array(
			'label' 		=> __( 'Slide URL', 'charitas-lite'),
			'description'	=> __( 'Enter a slide URL.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	//Slider Image
	$wp_customize->add_setting( 'wplook_slide2_image', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide2_image', array(
				'label'		=>  __( 'Image', 'charitas-lite' ),
				'description' => __('Upload (1920x714px) image size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	//Slider Thumbnail
	$wp_customize->add_setting( 'wplook_slide2_thumb', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide2_thumb', array(
				'label'		=>  __( 'Thumbnail', 'charitas-lite' ),
				'description' => __('Upload (272x150px) Thumbnail size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	// Title
	$wp_customize->add_setting( 'wplook_slide3_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide3_title', array(
			'label' 		=> __( 'Title', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Title.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	// Description
	$wp_customize->add_setting( 'wplook_slide3_description', array(
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'wplook_slide3_description', array(
			'label' 		=> __( 'Description', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Description.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
			'type'     => 'textarea',
		)
	);

	// URL
	$wp_customize->add_setting( 'wplook_slide3_url', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide3_url', array(
			'label' 		=> __( 'Slide URL', 'charitas-lite'),
			'description'	=> __( 'Enter a slide URL.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	//Slider Image
	$wp_customize->add_setting( 'wplook_slide3_image', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide3_image', array(
				'label'		=>  __( 'Image', 'charitas-lite' ),
				'description' => __('Upload (1920x714px) image size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	//Slider Thumbnail
	$wp_customize->add_setting( 'wplook_slide3_thumb', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide3_thumb', array(
				'label'		=>  __( 'Thumbnail', 'charitas-lite' ),
				'description' => __('Upload (272x150px) Thumbnail size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);



	// Title
	$wp_customize->add_setting( 'wplook_slide4_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_slide4_title', array(
			'label' 		=> __( 'Title', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Title.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	// Description
	$wp_customize->add_setting( 'wplook_slide4_description', array(
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'wplook_slide4_description', array(
			'label' 		=> __( 'Description', 'charitas-lite'),
			'description'	=> __( 'Enter a slide Description.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
			'type'     => 'textarea',
		)
	);

	// URL
	$wp_customize->add_setting( 'wplook_slide4_url', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 'wplook_slide4_url', array(
			'label' 		=> __( 'Slide URL', 'charitas-lite'),
			'description'	=> __( 'Enter a slide URL.', 'charitas-lite'),
			'section' 		=> 'wplook_homepage_slider',
		)
	);

	//Slider Image
	$wp_customize->add_setting( 'wplook_slide4_image', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide4_image', array(
				'label'		=>  __( 'Image', 'charitas-lite' ),
				'description' => __('Upload (1920x714px) image size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);

	//Slider Thumbnail
	$wp_customize->add_setting( 'wplook_slide4_thumb', array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wplook_slide4_thumb', array(
				'label'		=>  __( 'Thumbnail', 'charitas-lite' ),
				'description' => __('Upload (272x150px) Thumbnail size.', 'charitas-lite' ),
				'section' 	=> 'wplook_homepage_slider',
			)
		)
	);


	/*------------------------------------------------------------
		Add Revolution Slider
	============================================================*/
	$wp_customize->add_setting( 'wplook_rev_slider', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_rev_slider', array(
			'label' 		=> __( 'Revolution Slider', 'charitas-lite'),
			'description'	=> __( 'Revolution Slider Alias. If you have installed the revolution slider Plugin, add the Slider Alias here. From this example [rev_slider test] you need to add only the word test.', 'charitas-lite'),
			'section' 		=> 'header_image',
		)
	);


/*------------------------------------------------------------
		Home Page Settings
	============================================================*/
	// #1 Homepage widget area
	$wp_customize->add_setting( 'wplook_first_front_widget_size', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'default' => 'grid_12',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_first_front_widget_size',  array(
			'label'    => __( 'First home page widget area', 'charitas-lite' ),
			'description'	=> __( 'Set the size for first home page widget area', 'charitas-lite'),
			'section'  => 'wplook_homepage_settings',
			'type'     => 'select',
			'choices'  => array(
				'grid_4'  => '25%',
				'grid_8' => '50%',
				'grid_12'  => '75%',
				'grid_16' => '100%',
			),
		)
	);


	// #2 Homepage widget area
	$wp_customize->add_setting( 'wplook_second_front_widget_size', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'default' => 'grid_4',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_second_front_widget_size',  array(
			'label'    => __( 'Second home page widget area', 'charitas-lite' ),
			'description'	=> __( 'Set the size for second home page widget area', 'charitas-lite'),
			'section'  => 'wplook_homepage_settings',
			'type'     => 'select',
			'choices'  => array(
				'grid_4'  => '25%',
				'grid_8' => '50%',
				'grid_12'  => '75%',
				'grid_16' => '100%',
			),
		)
	);


	// #3 Homepage widget area
	$wp_customize->add_setting( 'wplook_third_front_widget_size', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'default' => 'grid_16',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_third_front_widget_size',  array(
			'label'    => __( 'Third home page widget area', 'charitas-lite' ),
			'description'	=> __( 'Set the size for Third home page widget area', 'charitas-lite'),
			'section'  => 'wplook_homepage_settings',
			'type'     => 'select',
			'choices'  => array(
				'grid_4'  => '25%',
				'grid_8' => '50%',
				'grid_12'  => '75%',
				'grid_16' => '100%',
			),
		)
	);

	// #4 Homepage widget area
	$wp_customize->add_setting( 'wplook_forth_front_widget_size', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'default' => 'grid_16',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_forth_front_widget_size',  array(
			'label'    => __( 'Forth home page widget area', 'charitas-lite' ),
			'description'	=> __( 'Set the size for Forth home page widget area', 'charitas-lite'),
			'section'  => 'wplook_homepage_settings',
			'type'     => 'select',
			'choices'  => array(
				'grid_4'  => '25%',
				'grid_8' => '50%',
				'grid_12'  => '75%',
				'grid_16' => '100%',
			),
		)
	);



	/*------------------------------------------------------------
		General Settings
	============================================================*/
	// Display Breadcrumb
	$wp_customize->add_setting( 'wplook_breadcrumb', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_breadcrumb',  array(
			'label'    => __( 'Breadcrumb', 'charitas-lite' ),
			'description'	=> __( 'Activate or deactivate the Breadcrumb', 'charitas-lite'),
			'section'  => 'wplook_themes_settings',
			'type'     => 'radio',
			'choices'  => array(
				'yes'  => 'Yes',
				'no' => 'No',
			),
		)
	);


	/*------------------------------------------------------------
		Blog Settings
	============================================================*/
	// Date on Blog/Archive template
	$wp_customize->add_setting( 'wplook_date_blog_post', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_date_blog_post',  array(
			'label'    => __( 'Date on Blog/Archive template', 'charitas-lite' ),
			'description'	=> __( 'Activate/Deactivated the date on Blog/Archive template.', 'charitas-lite'),
			'section'  => 'wplook_blog_settings',
			'type'     => 'select',
			'choices'  => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);

	// Date on Blog/Archive template
	$wp_customize->add_setting( 'wplook_author_blog_post', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_author_blog_post',  array(
			'label'    => __( 'Author on Blog/Archive template', 'charitas-lite' ),
			'description'	=> __( 'Activate/Deactivated the author on Blog/Archive template.', 'charitas-lite'),
			'section'  => 'wplook_blog_settings',
			'type'     => 'select',
			'choices'  => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);


	// Date on single post
	$wp_customize->add_setting( 'wplook_date_single_post', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_date_single_post',  array(
			'label'    => __( 'Date on single post', 'charitas-lite' ),
			'description'	=> __( 'Activate/Deactivated the date on single post.', 'charitas-lite'),
			'section'  => 'wplook_blog_settings',
			'type'     => 'select',
			'choices'  => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);

	// Author on single post
	$wp_customize->add_setting( 'wplook_author_single_post', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_author_single_post',  array(
			'label'    => __( 'Author on single post', 'charitas-lite' ),
			'description'	=> __( 'Activate/Deactivated the author on single post.', 'charitas-lite'),
			'section'  => 'wplook_blog_settings',
			'type'     => 'select',
			'choices'  => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);

	// Category on single post
	$wp_customize->add_setting( 'wplook_category_single_post', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_category_single_post',  array(
			'label'    => __( 'Category on single post', 'charitas-lite' ),
			'description'	=> __( 'Activate/Deactivated the category on single post.', 'charitas-lite'),
			'section'  => 'wplook_blog_settings',
			'type'     => 'select',
			'choices'  => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);


	/*------------------------------------------------------------
		Toolbar Settings
	============================================================*/
	// Phone Number
	$wp_customize->add_setting( 'wplook_phonenr', array(
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'wplook_phonenr', array(
			'type'     => 'textarea',
			'label' 		=> __( 'Phone Number', 'charitas-lite'),
			'description'	=> __( 'Add phone number', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
		)
	);

	// RSS link
	$wp_customize->add_setting( 'wplook_rssurl', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_rssurl', array(
			'type'			=> 'url',
			'label' 		=> __( 'RSS Link', 'charitas-lite'),
			'description'	=> __( 'Add RSS Link', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
		)
	);
	
	// Contact Page Link
	$wp_customize->add_setting( 'wplook_contacturl', array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'wplook_contacturl', array(
			'type'			=> 'dropdown-pages',
			'label' 		=> __( 'Contact Page', 'charitas-lite'),
			'description'	=> __( 'Select the Contact Page', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
		)
	);

	// Facebook
	$wp_customize->add_setting( 'wplook_facebookurl', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_facebookurl', array(
			'label' 		=> __( 'Facebook Link', 'charitas-lite'),
			'description'	=> __( 'Add the Link to  your Facebook page', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
			'type'			=> 'url',
		)
	);

	// Facebook
	$wp_customize->add_setting( 'wplook_twitterurl', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_twitterurl', array(
			'label' 		=> __( 'Twitter Link', 'charitas-lite'),
			'description'	=> __( 'Add the Link to  your twitter Account', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
			'type'			=> 'url',
		)
	);

	// Display search icon
	$wp_customize->add_setting( 'wplook_Search_button', array(
	    'type'           => 'theme_mod',
	    'capability'     => 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_choices',
	) );


	$wp_customize->add_control( 'wplook_Search_button',  array(
			'label'    => __( 'Search', 'charitas-lite' ),
			'description'	=> __( 'Activate or deactivate the search icon', 'charitas-lite'),
			'section'  => 'wplook_toolbar_settings',
			'type'     => 'radio',
			'choices'  => array(
				'yes'  => 'Yes',
				'no' => 'No',
			),
		)
	);

	// Donate URL
	$wp_customize->add_setting( 'wplook_donateurl', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'wplook_donateurl', array(
			'label' 		=> __( 'Donate Link', 'charitas-lite'),
			'description'	=> __( 'Add Donate Link', 'charitas-lite'),
			'section' 		=> 'wplook_toolbar_settings',
			'type'			=> 'url',
		)
	);




	/*------------------------------------------------------------
		Add Copyright
	============================================================*/
	$wp_customize->add_setting(
		'wplook_copy',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'wplook_copy',
		array(
			'label' 		=> __( 'Copyright', 'charitas-lite'),
			'description'	=> __( 'Add Footer Copyright', 'charitas-lite'),
			'section' 		=> 'wplook_themes_settings',
		)
	);

	if ( apply_filters( 'wplook_customizer_more', true ) ) {
		require_once dirname( __FILE__ ) . '/more.php';
	}


	/*------------------------------------------------------------
		More Info
	============================================================*/
	$wp_customize->add_section( 'wplook_more_settings',  array(
			'title'      => __( 'More', 'charitas-lite' ),
			'priority'   => 999,
		)
	);


	function sanitize_choices( $input, $setting ) {
	    global $wp_customize;
	 
	    $control = $wp_customize->get_control( $setting->id );
	 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	/*------------------------------------------------------------
		More info Details
	============================================================*/
	if ( apply_filters( 'wplook_customizer_more', true ) ) {
		$wp_customize->add_setting( 'wplook_more_settings', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

		$wp_customize->add_control(
			new Wplook_Customize_Control( $wp_customize, 'wplook_more_settings', array(
					'label'		=>  __( 'Looking for more options?', 'charitas-lite' ),
					'description' => __('Use .png image type.', 'charitas-lite' ),
					'section' 	=> 'wplook_more_settings',
					'settings' 	=> 'wplook_more_settings'
				)
			)
		);
	}


}
add_action( 'customize_register', 'wplook_customize_register', 11 );
