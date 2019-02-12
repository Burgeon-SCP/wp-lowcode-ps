<?php
/**
 * LoCoPaS custom functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */
/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Define variable for theme version
 *
 * @since 1.0.0
 */
	$locopas_theme_details = wp_get_theme();
	$locopas_theme_version = $locopas_theme_details->Version;


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Function define about page/post/archive sidebar
 *
 * @since 1.0.0
 */
if( ! function_exists( 'locopas_get_sidebar' ) ):
function locopas_get_sidebar() {
    global $post;

    if( 'post' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'ps_post_sidebar_layout', true );
    }

    if( 'page' === get_post_type() ) {
    	$sidebar_meta_option = get_post_meta( $post->ID, 'ps_post_sidebar_layout', true );
    }

    if( is_home() ) {
        $set_id = get_option( 'page_for_posts' );
		$sidebar_meta_option = get_post_meta( $set_id, 'ps_post_sidebar_layout', true );
    }

    if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar_layout';
    }

    $archive_sidebar      = get_theme_mod( 'ps_archive_sidebar_layout', 'right_sidebar' );
    $post_default_sidebar = get_theme_mod( 'ps_default_post_sidebar', 'right_sidebar' );
    $page_default_sidebar = get_theme_mod( 'ps_default_page_sidebar', 'right_sidebar' );

    if( $sidebar_meta_option == 'default_sidebar_layout' ) {
        if( is_single() ) {
            if( $post_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $post_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( is_page() ) {
            if( $page_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $page_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( $archive_sidebar == 'right_sidebar' ) {
            get_sidebar();
        } elseif( $archive_sidebar == 'left_sidebar' ) {
            get_sidebar( 'left' );
        }
    } elseif( $sidebar_meta_option == 'right_sidebar' ) {
        get_sidebar();
    } elseif( $sidebar_meta_option == 'left_sidebar' ) {
        get_sidebar( 'left' );
    }
}
endif;

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Homepage Section header
 *
 * @since 1.0.0
 */
if( ! function_exists( 'locopas_section_header' ) ) {
	function locopas_section_header( $title, $sub_title, $description ) {
?>
		<header class="section-header">

			<span class="section-sub-title"><?php echo esc_html( $sub_title ); ?></span>
			<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
			<p class="section-description"><?php echo esc_html( $description ); ?></p>

		</header><!-- .entry-header -->
<?php
	}
}

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Create a global variable for single page menu
 *
 * @return array
 * @since 1.0.0
 */
$locopas_single_menu_fields = array(
		'slider' =>  array(
						'default'=> esc_html__( 'Main', 'locopas' ),
						'label'=>  esc_html__( 'Top Section', 'locopas' )
					),
		'about' =>  array(
						'default'=> esc_html__( 'About', 'locopas' ),
						'label'=>  esc_html__( 'About Us', 'locopas' )
					),
		'team' =>  array(
						'default'=> esc_html( '', 'locopas' ),
						'label'=>  esc_html__( 'Our Team', 'locopas' )
					),
		'services' =>  array(
						'default'=> esc_html__( 'Services', 'locopas' ),
						'label'=>  esc_html__( 'Our Services', 'locopas' )
					),
		'testimonials' =>  array(
						'default'=> esc_html( '', 'locopas' ),
						'label'=>  esc_html__( 'Client Says', 'locopas' )
					),
		'fact' =>  array(
						'default'=> esc_html( '', 'locopas' ),
						'label'=>  esc_html__( 'Fact Us', 'locopas' )
					),
		'portfolio' =>  array(
						'default'=> esc_html__( 'Portfolio', 'locopas' ),
						'label'=>  esc_html__( 'Portfolio', 'locopas' )
					),
		'contact' =>  array(
						'default'=> esc_html__( 'Contact', 'locopas' ),
						'label'=>  esc_html__( 'Contact Us', 'locopas' )
					)
	);
