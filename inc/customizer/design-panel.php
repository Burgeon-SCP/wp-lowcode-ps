<?php
/**
 * LoCoPaS Theme Customizer for Design panel.
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if( ! function_exists( 'locopas_design_panel_register' ) ):
	function locopas_design_panel_register( $wp_customize ) {

		// Register the radio image control class as a JS control type.
    	$wp_customize->register_control_type( 'Locopas_Customize_Control_Radio_Image' );

		/**
		 * Design Settings Panel on customizer
		 *
		 * @since 0.1.0
		 */
		$wp_customize->add_panel(
	        'locopas_design_settings_panel',
	        	array(
	        		'priority'       => 20,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Design Settings', 'locopas' ),
	            )
	    );
/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Archive Settings
		 *
		 * @since 0.1.0
		 */
		$wp_customize->add_section(
	        'archive_settings_section',
	        array(
	            'title'		=> esc_html__( 'Archive Settings', 'locopas' ),
	            'panel'     => 'locopas_design_settings_panel',
	            'priority'  => 5,
	        )
	    );

	    /**
	     * Field for Image Radio
	     *
	     * @since 0.1.0
	     */
	    $wp_customize->add_setting(
	        'ps_archive_sidebar_layout',
	        array(
	            'default'           => 'no_sidebar_center',
	            'sanitize_callback' => 'sanitize_key',
	        )
	    );
	    $wp_customize->add_control( new Locopas_Customize_Control_Radio_Image(
	        $wp_customize,
	        'ps_archive_sidebar_layout',
	            array(
	                'label'    => esc_html__( 'Archive Sidebars', 'locopas' ),
	                'description' => esc_html__( 'Choose sidebar from available layouts', 'locopas' ),
	                'section'  => 'archive_settings_section',
	                'choices'  => array(
		                    'no_sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar.png'
		                    ),
		                    'no_sidebar_center' => array(
		                        'label' => esc_html__( 'No Sidebar Center', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar-center.png'
		                    )
		            ),
		            'priority' => 5
	            )
	        )
	    );
			// 'left_sidebar' => array(
			//     'label' => esc_html__( 'Left Sidebar', 'locopas' ),
			//     'url'   => '%s/assets/images/left-sidebar.png'
			// ),
			// 'right_sidebar' => array(
			//     'label' => esc_html__( 'Right Sidebar', 'locopas' ),
			//     'url'   => '%s/assets/images/right-sidebar.png'
			// ),



	    /**
	     * Field for Archive read more button text
	     *
	     * @since 0.1.0
	     */

/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Page Settings
		 *
		 * @since 0.1.0
		 */
		$wp_customize->add_section(
	        'page_settings_section',
	        array(
	            'title'		=> esc_html__( 'Page Settings', 'locopas' ),
	            'panel'     => 'locopas_design_settings_panel',
	            'priority'  => 10,
	        )
	    );

	    /**
	     * Field for sidebar Image Radio
	     *
	     * @since 0.1.0
	     */
	    $wp_customize->add_setting(
	        'ps_default_page_sidebar',
	        array(
	            'default'           => 'no_sidebar_center',
	            'sanitize_callback' => 'sanitize_key',
	        )
	    );
	    $wp_customize->add_control( new Locopas_Customize_Control_Radio_Image(
	        $wp_customize,
	        'ps_default_page_sidebar',
	            array(
	                'label'    => esc_html__( 'Page Sidebars', 'locopas' ),
	                'description' => esc_html__( 'Choose sidebar from available layouts', 'locopas' ),
	                'section'  => 'page_settings_section',
	                'choices'  => array(
		                    'no_sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar.png'
		                    ),
		                    'no_sidebar_center' => array(
		                        'label' => esc_html__( 'No Sidebar Center', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar-center.png'
		                    )
		            ),
		            'priority' => 5
	            )
	        )
	    );
			// 'left_sidebar' => array(
			// 		'label' => esc_html__( 'Left Sidebar', 'locopas' ),
			// 		'url'   => '%s/assets/images/left-sidebar.png'
			// ),
			// 'right_sidebar' => array(
			// 		'label' => esc_html__( 'Right Sidebar', 'locopas' ),
			// 		'url'   => '%s/assets/images/right-sidebar.png'
			// ),



/*--------------------------------------------------------------------------------------------------------------*/
		/*
		 * Post Settings
		 *
		 * @since 0.1.0
		 */
		 /*
		$wp_customize->add_section(
	        'post_settings_section',
	        array(
	            'title'		=> esc_html__( 'Post Settings', 'locopas' ),
	            'panel'     => 'locopas_design_settings_panel',
	            'priority'  => 15,
	        )
	    );
			*/

			/*
	     * Field for sidebar Image Radio
	     *
	     * @since 0.1.0
	     */
			 /*
	    $wp_customize->add_setting(
	        'ps_default_post_sidebar',
	        array(
	            'default'           => 'right_sidebar',
	            'sanitize_callback' => 'sanitize_key',
	        )
	    );
	    $wp_customize->add_control( new Locopas_Customize_Control_Radio_Image(
	        $wp_customize,
	        'ps_default_post_sidebar',
	            array(
	                'label'    => esc_html__( 'Post Sidebars', 'locopas' ),
	                'description' => esc_html__( 'Choose sidebar from available layouts', 'locopas' ),
	                'section'  => 'post_settings_section',
	                'choices'  => array(
		                    'left_sidebar' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/left-sidebar.png'
		                    ),
		                    'right_sidebar' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/right-sidebar.png'
		                    ),
		                    'no_sidebar' => array(
		                        'label' => esc_html__( 'No Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar.png'
		                    ),
		                    'no_sidebar_center' => array(
		                        'label' => esc_html__( 'No Sidebar Center', 'locopas' ),
		                        'url'   => '%s/assets/images/no-sidebar-center.png'
		                    )
		            ),
		            'priority' => 5
	            )
	        )
	    );
			*/

	} //close function
endif;
add_action( 'customize_register', 'locopas_design_panel_register' );
