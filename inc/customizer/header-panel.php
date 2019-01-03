<?php
/**
 * LoCoPaS Theme Customizer for header panel.
 *
 * @package AccessPress Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if( ! function_exists( 'locopas_header_panel_register' ) ):
	function locopas_header_panel_register( $wp_customize ) {

		$wp_customize->get_section( 'header_image' )->panel = 'locopas_header_settings_panel';
		$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Innerpages Header Image', 'locopas' );
    	$wp_customize->get_section( 'header_image' )->priority = '25';

    	global $locopas_single_menu_fields;

		/**
		 * Header Settings Panel on customizer
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_panel(
	        'locopas_header_settings_panel', 
	        	array(
	        		'priority'       => 10,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Header Settings', 'locopas' ),
	            ) 
	    );
/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Top Header Section
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'top_header_section',
	        array(
	            'title'		=> esc_html__( 'Top Header Settings', 'locopas' ),
	            'panel'     => 'locopas_header_settings_panel',
	            'priority'  => 5,
	        )
	    );

	    /**
	     * Switch option for Top Header Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'top_header_option',
	        array(
	            'default' => 'show',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'locopas_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'top_header_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Top Header Option', 'locopas' ),
	                'description' 	=> esc_html__( 'Show/hide option for Top Header Section.', 'locopas' ),
	                'section' 	=> 'top_header_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'locopas' ),
	                    'hide' 	=> esc_html__( 'Hide', 'locopas' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    /**
	     * Switch option for social icons at top header section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'top_header_social_option',
	        array(
	            'default' => 'show',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'locopas_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'top_header_social_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Social Icons Option', 'locopas' ),
	                'description' 	=> esc_html__( 'Show/hide option for Top Header Social Icon Section.', 'locopas' ),
	                'section' 	=> 'top_header_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'locopas' ),
	                    'hide' 	=> esc_html__( 'Hide', 'locopas' )
	                    ),
	                'priority'  => 10,
	            )
	        )
	    );
/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Menu Settings Section
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'menu_settings_section',
	        array(
	            'title'		=> esc_html__( 'Menu Settings', 'locopas' ),
	            'panel'     => 'locopas_header_settings_panel',
	            'priority'  => 15,
	        )
	    );

	    /**
	     * Switch option for primary menu
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'primary_menu_type',
	        array(
	            'default' => 'parallax',
	            'sanitize_callback' => 'locopas_sanitize_menu_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'primary_menu_type', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Primary Menu Type', 'locopas' ),
	                'description' 	=> esc_html__( 'Choose type of Primary Menu.', 'locopas' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'parallax' 	=> esc_html__( 'Parallax', 'locopas' ),
	                    'default' 	=> esc_html__( 'Default', 'locopas' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    /**
	     * Switch option for parallax menu layout
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'parallax_menu_type',
	        array(
	            'default' => 'default',
	            'sanitize_callback' => 'locopas_sanitize_p_menu_type_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'parallax_menu_type', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Parallax Menu Type', 'locopas' ),
	                'description' 	=> esc_html__( 'Choose type of Parallax Menu.', 'locopas' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'default' 	=> esc_html__( 'Default', 'locopas' ),
	                    'float' 	=> esc_html__( 'Float Menu', 'locopas' )
	                    ),
	                'priority'  => 5,
	                'active_callback' => 'locopas_primary_menu_type_callback'
	            )
	        )
	    );

	    /**
	     * Field for parallax Menu
	     *
	     * @since 1.0.0
	     */
	    $count = 10;
	    foreach ( $locopas_single_menu_fields as $menu_key => $section_value ) {
	    	$wp_customize->add_setting(
		        $menu_key.'_menu_title',
		            array(
		                'default' => $section_value['default'],
		                'sanitize_callback' => 'sanitize_text_field',
		                'transport' => 'postMessage'
			       )
		    );    
		    $wp_customize->add_control(
		        $menu_key.'_menu_title',
		            array(
		            'type' => 'text',
		            'label' => $section_value['label'],
		            'section' => 'menu_settings_section',
		            'priority' => $count,
		            'active_callback' => 'locopas_primary_menu_type_callback'
		            )
		    );
		    $count++;
	    }

	    /**
	     * Switch option for search icon in primary section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'primary_menu_search_option',
	        array(
	            'default' => 'show',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'locopas_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'primary_menu_search_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Search Icon', 'locopas' ),
	                'description' 	=> esc_html__( 'Show/hide search icons on primary menu section.', 'locopas' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'locopas' ),
	                    'hide' 	=> esc_html__( 'Hide', 'locopas' )
	                    ),
	                'priority'  => 35,
	            )
	        )
	    );

	    /**
	     * Switch option for sticky menu
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'sticky_header_option',
	        array(
	            'default' => 'enable',
	            'sanitize_callback' => 'locopas_sanitize_enable_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Parallaxsome_Customize_Switch_Control(
	        $wp_customize, 
	            'sticky_header_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Header Sticky', 'locopas' ),
	                'description' 	=> esc_html__( 'Enable/disable option for header sticky.', 'locopas' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'enable' 	=> esc_html__( 'Enable', 'locopas' ),
	                    'disable' 	=> esc_html__( 'Disable', 'locopas' )
	                    ),
	                'priority'  => 40,
	            )
	        )
	    );


	} //close fucntion
endif;
add_action( 'customize_register', 'locopas_header_panel_register' );