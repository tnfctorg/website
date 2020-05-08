<?php
/**
 * VW Charity NGO Theme Customizer
 *
 * @package VW Charity NGO
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_charity_ngo_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_charity_ngo_custom_controls' );

function vw_charity_ngo_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_charity_ngo_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_charity_ngo_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWCharityNGOParentPanel = new VW_Charity_NGO_WP_Customize_Panel( $wp_customize, 'vw_charity_ngo_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_charity_ngo_left_right', array(
    	'title'      => __( 'General Settings', 'vw-charity-ngo' ),
		'priority'   => 30,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	$wp_customize->add_setting('vw_charity_ngo_width_option',array(
        'default' => __('Full Width','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Charity_NGO_Image_Radio_Control($wp_customize, 'vw_charity_ngo_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-charity-ngo'),
        'description' => __('Here you can change the width layout of Website.','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_charity_ngo_theme_options',array(
        'default' => __('Right Sidebar','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_charity_ngo_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-charity-ngo'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-charity-ngo'),
            'Right Sidebar' => __('Right Sidebar','vw-charity-ngo'),
            'One Column' => __('One Column','vw-charity-ngo'),
            'Three Columns' => __('Three Columns','vw-charity-ngo'),
            'Four Columns' => __('Four Columns','vw-charity-ngo'),
            'Grid Layout' => __('Grid Layout','vw-charity-ngo')
        ),
	));

	$wp_customize->add_setting('vw_charity_ngo_page_layout',array(
        'default' => __('One Column','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control('vw_charity_ngo_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-charity-ngo'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-charity-ngo'),
            'Right Sidebar' => __('Right Sidebar','vw-charity-ngo'),
            'One Column' => __('One Column','vw-charity-ngo')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_charity_ngo_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_charity_ngo_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_charity_ngo_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-charity-ngo' ),
        'section' => 'vw_charity_ngo_left_right'
    )));

	$wp_customize->add_setting('vw_charity_ngo_loader_icon',array(
        'default' => __('Two Way','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control('vw_charity_ngo_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-charity-ngo'),
            'Dots' => __('Dots','vw-charity-ngo'),
            'Rotate' => __('Rotate','vw-charity-ngo')
        ),
	) );

	//Topbar section
	$wp_customize->add_section('vw_charity_ngo_topbar',array(
		'title'	=> __('Topbar Section','vw-charity-ngo'),
		'description'	=> __('Add TopBar Content here','vw-charity-ngo'),
		'priority'	=> null,
		'panel' => 'vw_charity_ngo_panel_id',
	));

	$wp_customize->add_setting( 'vw_charity_ngo_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_topbar'
    )));

    $wp_customize->add_setting('vw_charity_ngo_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-charity-ngo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_charity_ngo_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-charity-ngo' ),
        'section' => 'vw_charity_ngo_topbar'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_address',array( 
		'selector' => '#top-bar span', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_address', 
	));

    $wp_customize->add_setting('vw_charity_ngo_topbar_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_topbar_location_icon',array(
		'label'	=> __('Add Location Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_topbar_location_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_charity_ngo_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_address',array(
		'label'	=> __('Add Location','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_contact_no_icon',array(
		'default'	=> 'fas fa-mobile-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_contact_no_icon',array(
		'label'	=> __('Add Contact Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_contact_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_charity_ngo_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_contact',array(
		'label'	=> __('Add Contact Details','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_contact',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_charity_ngo_email_address_icon',array(
		'default'	=> 'fa fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_charity_ngo_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_email',array(
		'label'	=> __('Add Email Address','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_text',array(
		'label'	=> __('Button Text','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_link',array(
		'label'	=> __('Button Link','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_topbar',
		'setting'	=> 'vw_charity_ngo_link',
		'type'		=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'vw_charity_ngo_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	$wp_customize->add_setting( 'vw_charity_ngo_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_charity_ngo_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_charity_ngo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-charity-ngo' ),
			'description' => __('Slider image size (1500 x 765)','vw-charity-ngo'),
			'section'  => 'vw_charity_ngo_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_charity_ngo_slider_content_option',array(
        'default' => __('Left','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Charity_NGO_Image_Radio_Control($wp_customize, 'vw_charity_ngo_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_charity_ngo_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_charity_ngo_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-charity-ngo' ),
		'section'     => 'vw_charity_ngo_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_charity_ngo_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_charity_ngo_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_charity_ngo_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-charity-ngo' ),
	'section'     => 'vw_charity_ngo_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_charity_ngo_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-charity-ngo'),
      '0.1' =>  esc_attr('0.1','vw-charity-ngo'),
      '0.2' =>  esc_attr('0.2','vw-charity-ngo'),
      '0.3' =>  esc_attr('0.3','vw-charity-ngo'),
      '0.4' =>  esc_attr('0.4','vw-charity-ngo'),
      '0.5' =>  esc_attr('0.5','vw-charity-ngo'),
      '0.6' =>  esc_attr('0.6','vw-charity-ngo'),
      '0.7' =>  esc_attr('0.7','vw-charity-ngo'),
      '0.8' =>  esc_attr('0.8','vw-charity-ngo'),
      '0.9' =>  esc_attr('0.9','vw-charity-ngo')
	),
	));

	//Scholarship
	$wp_customize->add_section( 'vw_charity_ngo_scholarship' , array(
    	'title'      => __( 'Scholarship Section', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_charity_ngo_scholarship_excerpt_number', array( 
		'selector' => '.scholarship-box h2 a', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_scholarship_excerpt_number',
	));

	for ( $count = 1; $count <= 3; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_scholarship_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_charity_ngo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_scholarship_page' . $count, array(
			'label'    => __( 'Select Scholarship Page', 'vw-charity-ngo' ),
			'section'  => 'vw_charity_ngo_scholarship',
			'type'     => 'dropdown-pages'
		) );
	}

	//Scholarship excerpt
	$wp_customize->add_setting( 'vw_charity_ngo_scholarship_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_charity_ngo_scholarship_excerpt_number', array(
		'label'       => esc_html__( 'Scholarship Excerpt length','vw-charity-ngo' ),
		'section'     => 'vw_charity_ngo_scholarship',
		'type'        => 'range',
		'settings'    => 'vw_charity_ngo_scholarship_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//What We Do
	$wp_customize->add_section( 'vw_charity_ngo_what_do' , array(
    	'title'      => __( 'What we do Section', 'vw-charity-ngo' ),
		'priority'   => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_charity_ngo_what_title', array( 
		'selector' => '#what-do h3', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_what_title',
	));

	$wp_customize->add_setting('vw_charity_ngo_what_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_what_title',array(
		'label'	=> __('Section Title','vw-charity-ngo'),
		'section'	=> 'vw_charity_ngo_what_do',
		'setting'	=> 'vw_charity_ngo_what_title',
		'type'		=> 'text'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_charity_ngo_what_do_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_charity_ngo_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_charity_ngo_what_do_page' . $count, array(
			'label'    => __( 'Select What we do Page', 'vw-charity-ngo' ),
			'section'  => 'vw_charity_ngo_what_do',
			'type'     => 'dropdown-pages'
		) );
	}

	//What We Do excerpt
	$wp_customize->add_setting( 'vw_charity_ngo_what_we_do_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_charity_ngo_what_we_do_excerpt_number', array(
		'label'       => esc_html__( 'What We Do Excerpt length','vw-charity-ngo' ),
		'section'     => 'vw_charity_ngo_what_do',
		'type'        => 'range',
		'settings'    => 'vw_charity_ngo_what_we_do_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWCharityNGOParentPanel );

	$BlogPostParentPanel = new VW_Charity_NGO_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-charity-ngo' ),
		'panel' => 'vw_charity_ngo_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_charity_ngo_post_settings', array(
		'title' => __( 'Post Settings', 'vw-charity-ngo' ),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_charity_ngo_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-charity-ngo' ),
        'section' => 'vw_charity_ngo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_toggle_author',array(
		'label' => esc_html__( 'Author','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_post_settings'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_charity_ngo_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-charity-ngo' ),
		'section'     => 'vw_charity_ngo_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_charity_ngo_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_charity_ngo_blog_layout_option',array(
        'default' => __('Default','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Charity_NGO_Image_Radio_Control($wp_customize, 'vw_charity_ngo_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_charity_ngo_excerpt_settings',array(
        'default' => __('Excerpt','vw-charity-ngo'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control('vw_charity_ngo_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-charity-ngo'),
            'Excerpt' => __('Excerpt','vw-charity-ngo'),
            'No Content' => __('No Content','vw-charity-ngo')
        ),
	) );

	$wp_customize->add_setting('vw_charity_ngo_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'vw_charity_ngo_button_settings', array(
		'title' => __( 'Button Settings', 'vw-charity-ngo' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_charity_ngo_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-charity-ngo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-charity-ngo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_charity_ngo_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_charity_ngo_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-charity-ngo' ),
		'section'     => 'vw_charity_ngo_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_button_text', 
	));

    $wp_customize->add_setting('vw_charity_ngo_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_button_text',array(
		'label'	=> __('Add Button Text','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_charity_ngo_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-charity-ngo' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_charity_ngo_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_related_post',array(
		'label' => esc_html__( 'Related Post','vw-charity-ngo' ),
		'section' => 'vw_charity_ngo_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_charity_ngo_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_charity_ngo_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_charity_ngo_404_page',array(
		'title'	=> __('404 Page Settings','vw-charity-ngo'),
		'panel' => 'vw_charity_ngo_panel_id',
	));	

	$wp_customize->add_setting('vw_charity_ngo_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_charity_ngo_404_page_title',array(
		'label'	=> __('Add Title','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_charity_ngo_404_page_content',array(
		'label'	=> __('Add Text','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_charity_ngo_responsive_media',array(
		'title'	=> __('Responsive Media','vw-charity-ngo'),
		'panel' => 'vw_charity_ngo_panel_id',
	));

	$wp_customize->add_setting( 'vw_charity_ngo_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_charity_ngo_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_charity_ngo_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-charity-ngo' ),
      'section' => 'vw_charity_ngo_responsive_media'
    )));

    $wp_customize->add_setting('vw_charity_ngo_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_responsive_media',
		'setting'	=> 'vw_charity_ngo_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_charity_ngo_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_responsive_media',
		'setting'	=> 'vw_charity_ngo_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_charity_ngo_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-charity-ngo' ),
		'priority' => null,
		'panel' => 'vw_charity_ngo_panel_id'
	) );

	$wp_customize->add_setting('vw_charity_ngo_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Charity_NGO_Content_Creation( $wp_customize, 'vw_charity_ngo_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-charity-ngo' ),
		),
		'section' => 'vw_charity_ngo_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-charity-ngo' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_charity_ngo_footer',array(
		'title'	=> __('Footer','vw-charity-ngo'),
		'description'=> __('This section will appear in the footer','vw-charity-ngo'),
		'panel' => 'vw_charity_ngo_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_footer_text', array( 
		'selector' => '.footer-2 .copyright p', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_footer_text', 
	));
	
	$wp_customize->add_setting('vw_charity_ngo_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_charity_ngo_footer_text',array(
		'label'	=> __('Copyright Text','vw-charity-ngo'),
		'section'=> 'vw_charity_ngo_footer',
		'setting'=> 'vw_charity_ngo_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_charity_ngo_copyright_alingment',array(
        'default' => __('center','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Charity_NGO_Image_Radio_Control($wp_customize, 'vw_charity_ngo_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_footer',
        'settings' => 'vw_charity_ngo_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/images/copyright1.png',
            'center' => get_template_directory_uri().'/images/copyright2.png',
            'right' => get_template_directory_uri().'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_charity_ngo_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_charity_ngo_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-charity-ngo'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-charity-ngo'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-charity-ngo' ),
        ),
		'section'=> 'vw_charity_ngo_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_charity_ngo_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_charity_ngo_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Charity_NGO_Toggle_Switch_Custom_Control( $wp_customize, 'vw_charity_ngo_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-charity-ngo' ),
      	'section' => 'vw_charity_ngo_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_charity_ngo_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_charity_ngo_customize_partial_vw_charity_ngo_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_charity_ngo_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Charity_NGO_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_charity_ngo_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-charity-ngo'),
		'transport' => 'refresh',
		'section'	=> 'vw_charity_ngo_footer',
		'setting'	=> 'vw_charity_ngo_scroll_to_top_icon',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting('vw_charity_ngo_scroll_top_alignment',array(
        'default' => __('Right','vw-charity-ngo'),
        'sanitize_callback' => 'vw_charity_ngo_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Charity_NGO_Image_Radio_Control($wp_customize, 'vw_charity_ngo_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-charity-ngo'),
        'section' => 'vw_charity_ngo_footer',
        'settings' => 'vw_charity_ngo_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Charity_NGO_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Charity_NGO_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_charity_ngo_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Charity_NGO_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_charity_ngo_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
 	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Charity_NGO_WP_Customize_Section extends WP_Customize_Section {
  	
	    public $section;
	    public $type = 'vw_charity_ngo_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_charity_ngo_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_charity_ngo_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Charity_Ngo_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Charity_NGO_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Charity_NGO_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Charity NGO Pro', 'vw-charity-ngo' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-charity-ngo' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-charity-wordpress-theme/'),
		)));

		$manager->add_section(new VW_Charity_NGO_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-charity-ngo' ),
			'pro_text' => esc_html__( 'Docs', 'vw-charity-ngo' ),
			'pro_url'  => admin_url( 'themes.php?page=vw_charity_ngo_guide' ),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-charity-ngo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-charity-ngo-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Charity_Ngo_Customize::get_instance();