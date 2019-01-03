<?php
/**
 * LoCoPaS Theme Customizer for Footer Settings Panel.
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

if( ! function_exists( 'locopas_footer_panel_register' ) ):
	function locopas_footer_panel_register( $wp_customize ) {

		/**
		 * Footer Settings Panel on customizer
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_panel(
	        'locopas_footer_settings_panel',
	        	array(
	        		'priority'       => 30,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Footer Settings', 'locopas' ),
	            )
	    );

/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Footer Widget Settings
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'footer_widget_section',
	        array(
	            'title'		=> esc_html__( 'Footer Widget Settings', 'locopas' ),
	            'panel'     => 'locopas_footer_settings_panel',
	            'priority'  => 5,
	        )
	    );

	    /**
	     * Field for Image Radio
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'ps_footer_widget_layout',
	        array(
	            'default'           => 'column_three',
	            'sanitize_callback' => 'sanitize_key',
	        )
	    );
	    $wp_customize->add_control( new Locopas_Customize_Control_Radio_Image(
	        $wp_customize,
	        'ps_footer_widget_layout',
	            array(
	                'label'    => esc_html__( 'Footer Widget Layout', 'locopas' ),
	                'description' => esc_html__( 'Choose layout from available layouts', 'locopas' ),
	                'section'  => 'footer_widget_section',
	                'choices'  => array(
		                    'column_four' => array(
		                        'label' => esc_html__( 'Left Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/footer-4.png'
		                    ),
		                    'column_three' => array(
		                        'label' => esc_html__( 'Right Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/footer-3.png'
		                    ),
		                    'column_two' => array(
		                        'label' => esc_html__( 'No Sidebar', 'locopas' ),
		                        'url'   => '%s/assets/images/footer-2.png'
		                    ),
		                    'column_one' => array(
		                        'label' => esc_html__( 'No Sidebar Center', 'locopas' ),
		                        'url'   => '%s/assets/images/footer-1.png'
		                    )
		            ),
		            'priority' => 5
	            )
	        )
	    );
/*--------------------------------------------------------------------------------------------------------------*/
		/**
		 * Footer Settings
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'bottom_footer_section',
	        array(
	            'title'		=> esc_html__( 'Bottom Footer Settings', 'locopas' ),
	            'panel'     => 'locopas_footer_settings_panel',
	            'priority'  => 10,
	        )
	    );

	    /**
	     * Field for Archive read more button text
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'ps_copyright_text',
	            array(
	                'default' => esc_html__( '2018 BurgeonEnv', 'locopas' ),
	                'sanitize_callback' => 'wp_kses_post',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'ps_copyright_text',
	            array(
		            'type' => 'textarea',
		            'label' => esc_html__( 'Copyright Text', 'locopas' ),
		            'section' => 'bottom_footer_section',
		            'priority' => 5
	            )
	    );

	} //close function
endif;

add_action( 'customize_register', 'locopas_footer_panel_register' );
