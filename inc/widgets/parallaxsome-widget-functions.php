<?php
/**
 * ParallaxSome custom functions and definitions for widgets
 *
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package AccessPress Themes
 * @subpackage ParallaxSome
 */

function parallaxsome_widgets_init() {

	/**
	 * Register Home Contact Map widget area
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Map', 'parallaxsome' ),
		'id'            => 'parallaxsome_map_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Contact Us section at homepage.', 'parallaxsome' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Register WooCommerce Sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'parallaxsome' ),
		'id'            => 'parallaxsome_woo_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Sidebar section only in woocommerce posts/pages/archives.', 'parallaxsome' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Register 4 different Footer Area
	 *
	 * @since 1.0.0
	 */
	register_sidebars( 4 , array(
		/* translators: %d : sidebar identifier */
		'name'          => esc_html__( 'Footer Area %d', 'parallaxsome' ),
		'id'            => 'parallaxsome_footer_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'parallaxsome' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'parallaxsome_widgets_init' );
