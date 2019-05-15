<?php
/**
 * VW Kids Theme Customizer
 *
 * @package VW Kids
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_kids_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_kids_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-kids' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_kids_left_right', array(
    	'title'      => __( 'General Settings', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id'
	) );

	$wp_customize->add_setting('vw_kids_theme_options',array(
        'default' => __('Right Sidebar','vw-kids'),
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-kids'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-kids'),
        'section' => 'vw_kids_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
            'One Column' => __('One Column','vw-kids'),
            'Three Columns' => __('Three Columns','vw-kids'),
            'Four Columns' => __('Four Columns','vw-kids'),
            'Grid Layout' => __('Grid Layout','vw-kids')
        ),
	) );

	$wp_customize->add_setting('vw_kids_page_layout',array(
        'default' => __('One Column','vw-kids'),
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-kids'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-kids'),
        'section' => 'vw_kids_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
            'One Column' => __('One Column','vw-kids')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_kids_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id'
	) );

	$wp_customize->add_setting('vw_kids_discount_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_discount_text',array(
		'label'	=> __('Add Discount Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'FREE SHIPPING : lorem ipsum is adummy text', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_call',array(
		'label'	=> __('Add Phone Number','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_email',array(
		'label'	=> __('Add Email Address','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_kids_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id'
	) );

	$wp_customize->add_setting('vw_kids_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_kids_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-kids'),
       'section' => 'vw_kids_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_kids_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_kids_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_kids_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-kids' ),
			'description' => __('Slider image size (825 x 470)','vw-kids'),
			'section'  => 'vw_kids_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
    
	//Popular Toys section
	$wp_customize->add_section( 'vw_kids_popular_product_section' , array(
    	'title'      => __( 'Most Popular Product', 'vw-kids' ),
		'priority'   => null,
		'panel' => 'vw_kids_panel_id'
	) );

	$wp_customize->add_setting( 'vw_kids_popular_product', array(
		'default'           => '',
		'sanitize_callback' => 'vw_kids_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_kids_popular_product', array(
		'label'    => __( 'Select Page to show popular product', 'vw-kids' ),
		'section'  => 'vw_kids_popular_product_section',
		'type'     => 'dropdown-pages'
	) );

	//Content creation
	$wp_customize->add_section( 'vw_kids_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-kids' ),
		'priority' => null,
		'panel' => 'vw_kids_panel_id'
	) );

	$wp_customize->add_setting('vw_kids_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Kids_Content_Creation( $wp_customize, 'vw_kids_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-kids' ),
		),
		'section' => 'vw_kids_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-kids' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_kids_footer',array(
		'title'	=> __('Footer','vw-kids'),
		'panel' => 'vw_kids_panel_id',
	));	
	
	$wp_customize->add_setting('vw_kids_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_kids_footer_text',array(
		'label'	=> __('Copyright Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_kids_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Kids_Customize {

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
		$manager->register_section_type( 'VW_Kids_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Kids_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'VW KIDS PRO', 'vw-kids' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-kids' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/kids-wordpress-theme/'),
				)
			)
		);

	// Register sections.
	$manager->add_section(
			new VW_Kids_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'Documentation', 'vw-kids' ),
					'pro_text' => esc_html__( 'Docs', 'vw-kids' ),
					'pro_url'  => admin_url('themes.php?page=vw_kids_guide'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-kids-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-kids-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Kids_Customize::get_instance();