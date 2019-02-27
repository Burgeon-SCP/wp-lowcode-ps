<?php
/**
 * LoCoPaS Theme Customizer.
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function locopas_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


		/** Dynamic Color Options **/
		$wp_customize->add_setting( 'locopas_tpl_color', array( 'default' => '#e23815', 'sanitize_callback' => 'sanitize_hex_color' ));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			'locopas_tpl_color',
			array(
				'label'      => esc_html__( 'Template Color', 'locopas' ),
				'section'    => 'colors',
				'settings'   => 'locopas_tpl_color',
			) )
		);
}
add_action( 'customize_register', 'locopas_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function locopas_customize_preview_js() {
	wp_enqueue_script( 'locopas_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160714', true );
}
add_action( 'customize_preview_init', 'locopas_customize_preview_js' );

/**
 *
 */
function locopas_customize_backend_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style( 'locopas_admin_customizer_style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'locopas_admin_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160714', true );
}
add_action( 'customize_controls_enqueue_scripts', 'locopas_customize_backend_scripts', 10 );
