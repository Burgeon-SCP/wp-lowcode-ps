<?php
/**
 * LoCoPaS custom functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.1.0
 */
/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Define variable for theme version
 *
 * @since 0.1.0
 */
	$locopas_theme_details = wp_get_theme();
	$locopas_theme_version = $locopas_theme_details->Version;
	// $locopas_theme_version = rand(111,999); /* used for development */


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 *
 * @since 0.1.0
 */
function locopas_scripts() {
	global $locopas_theme_version;

	$locopas_font_args = array(
        'family' => 'Lato:400,700,300|Roboto+Mono:400,700|Nova+Mono',
    );
		// wp_register_style( 'locopas-google-fonts', '//fonts.googleapis.com/css?family='.$locopas_font_args['family'] );
	wp_enqueue_style( 'locopas-google-fonts', add_query_arg( $locopas_font_args, "//fonts.googleapis.com/css" ) . '#asyncload' );

	// // Bootstrap libraries
  // wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
  // wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

	// Theme stylesheet and custom js
	wp_enqueue_style( 'locopas-style', get_stylesheet_uri() . '#asyncload', array(), $locopas_theme_version );
	wp_enqueue_script( 'locopas-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js#deferload', array( 'jquery' ), $locopas_theme_version, true );

  // jQuery libraries
	// TODO: Some of them could be excluded unless explicitly called
    // wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array( 'jquery' ), '1.1.3', true );
	// wp_enqueue_style( 'lightslider-style', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.css', array(), '1.1.3' );
    // wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/assets/library/bxSlider/js/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
	// wp_enqueue_style( 'bxSlider-style', get_template_directory_uri() . '/assets/library/bxSlider/css/jquery.bxslider.css', array(), '4.1.2' );
	// wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css#deferload', array(), '4.7.0', true );
	wp_enqueue_style( 'jquery-prettyPhoto-style', get_template_directory_uri() . '/assets/library/prettyphoto/css/prettyPhoto.css', array(), '3.1.6', true );
	// wp_enqueue_style ( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.5.1' , true);
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/library/counterup/js/jquery.counterup.min.js#deferload', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/library/waypoints/js/jquery.waypoints.min.js#deferload', array( 'jquery' ), '2.0.5', true );
	wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/assets/library/jquery-nav/js/jquery.nav.js#deferload', array( 'jquery' ), '2.2.0', true );
	wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/assets/library/jquery-scrollTo/js/jquery.scrollTo.js#deferload', array( 'jquery' ), '2.1.1', true );
	wp_enqueue_script( 'jquery-prettyPhoto', get_template_directory_uri() . '/assets/library/prettyphoto/js/jquery.prettyPhoto.js#deferload', array( 'jquery' ), '3.1.6', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/library/parallax-js/js/parallax.min.js#asyncload', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_style ( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css#asyncload', array(), '2.3.1' );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js#asyncload', false, null, true );
	// wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.1.2', true );
    
    wp_enqueue_script('aos-init-js',get_template_directory_uri() . '/assets/library/aos/js/init.js#asyncload', ['aos-js'], null, true);

	$ps_header_sticky_option = get_theme_mod( 'sticky_header_option', 'enable' );
	if( $ps_header_sticky_option != 'disable' ) {
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/library/jquery-sticky/js/jquery.sticky.js', array( 'jquery' ), '1.0.2', true );
		wp_enqueue_script( 'locopas-sticky-setting', get_template_directory_uri() . '/assets/library/jquery-sticky/js/sticky-setting.js', array( 'jquery-sticky' ), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'locopas_scripts' );

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue styles after locopas_scripts
 *
 * @since 0.1.2
 */
if( ! function_exists( 'locopas_styles_register' ) ):
	function locopas_styles_register() {
		/**
		 * This theme styles several css elements by using separate files inside the theme.
		 * e.g.: header, footer, typography, social icons, pages, column galleries and responsiveness.
		 *
		 * locopas_styles_register is hooked with low priority to ensure css cascading
		 * NOTE: more specific priorities could be introduced at wp_enqueue_style()
		 */


		 // TODO: NOT WORKING
		/* foreach (glob(get_template_directory_uri().'/inc/styles/*.css') as $file) {
			// Do something with $file
			wp_enqueue_style( 'locopas-'.str_replace('.css', '', basename($file)).'-style',
											 $file);
		} */
        wp_enqueue_style( 'locopas-pages-style', get_template_directory_uri() . '/inc/styles/pages.css' );

        wp_enqueue_style( 'locopas-divisors-style', get_template_directory_uri() . '/inc/styles/divisors.css' );
		wp_enqueue_style( 'locopas-header-style', get_template_directory_uri() . '/inc/styles/header.css' );
		wp_enqueue_style( 'locopas-footer-style', get_template_directory_uri() . '/inc/styles/footer.css' );
		wp_enqueue_style( 'locopas-menus-style', get_template_directory_uri() . '/inc/styles/menus.css' );
        wp_enqueue_style( 'locopas-typography-style', get_template_directory_uri() . '/inc/styles/typography.css' );
        wp_enqueue_style( 'locopas-gallery-style', get_template_directory_uri() . '/inc/styles/gallery.css' );
		wp_enqueue_style( 'locopas-responsive-style', get_template_directory_uri() . '/inc/styles/responsive.css' );
        wp_enqueue_style( 'locopas-social-style', get_template_directory_uri() . '/inc/styles/social.css' );
        wp_enqueue_style( 'locopas-widget-style', get_template_directory_uri() . '/inc/styles/widget.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'locopas_styles_register', 999 );



/*------------------------------------------------------------------------------------------------------------------*/
/**
  * Check for a logged user
  *
  * @since 0.5
  */
if( ! function_exists( 'is_user_loggeg_in' ) ):
    function is_user_loggeg_in() {
        $user = _wp_get_current_user();
        return $user->exists();
    }
endif;


/**
  * Check if user needs dashboard
  *
  * @since 0.5
  */
if (is_user_loggeg_in()):
    /**
     * Enqueue scripts/styles for admin area
     *
     * @since 0.1.0
     */
    if( ! function_exists( 'locopas_admin_scripts' ) ):
    	function locopas_admin_scripts() {
    		wp_enqueue_style( 'locopas-admin-style', get_template_directory_uri() . '/assets/css/admin-styles.css' );
    		wp_enqueue_script( 'jquery-ui-button' );
    		wp_enqueue_script( 'locopas-admin-scripts', get_template_directory_uri() . '/assets/js/admin-scripts.js', array( 'jquery', 'jquery-ui-button' ), true );
    	}
    endif;
    add_action( 'admin_enqueue_scripts', 'locopas_admin_scripts' );
    

    /**
    * Remove unnecessary menu entries for admin area
    * extracted from https://codex.wordpress.org/Function_Reference/remove_menu_page
    *
    * @since 0.1.2
    */
    if( ! function_exists( 'locopas_admin_menu' ) ):
        function locopas_admin_menu() {
            // remove_menu_page( 'index.php' );                  //Dashboard
            // remove_menu_page( 'jetpack' );                    //Jetpack*
            remove_menu_page( 'edit.php' );                   //Posts
            // remove_menu_page( 'upload.php' );                 //Media
            // remove_menu_page( 'edit.php?post_type=page' );    //Pages
            remove_menu_page( 'edit-comments.php' );          //Comments
            // remove_menu_page( 'themes.php' );                 //Appearance
            // remove_menu_page( 'plugins.php' );                //Plugins
            remove_menu_page( 'users.php' );                  //Users
            // remove_menu_page( 'tools.php' );                  //Tools
            // remove_menu_page( 'options-general.php' );        //Settings
        }
    endif;
    add_action( 'admin_menu', 'locopas_admin_menu' );
endif;


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Define shortcode for visitor ip recovery
 * Extracted from:
 * https://www.wpbeginner.com/wp-tutorials/how-to-display-a-users-ip-address-in-wordpress/
 *
 * @since 0.1.2
 */
if( ! function_exists( 'locopas_get_visitor_ip' ) ):
	function locopas_get_visitor_ip() {
		// Display User IP in WordPress
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		// Recover origin (first) ip only
		$ipa = explode(',', $ip);
		$ip = reset($ipa);

		return apply_filters( 'wpb_get_ip', $ip );
	}
endif;

add_shortcode('show_ip', 'locopas_get_visitor_ip');


/*------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'locopas_parallax_menu_cb' ) ):

	/**
	 * Define the Parallax Menu Tab
	 *
	 * @param string
	 * @return HTML
	 * @since 0.1.0
	 */

	function locopas_parallax_menu_cb() {
		global $locopas_single_menu_fields;
		$parallax_menu_type = get_theme_mod( 'parallax_menu_type', 'default' );
		foreach ( $locopas_single_menu_fields as $section_id => $section_value ) {
			$locopas_menu_mod_id = $section_id.'_menu_title';
			$locopas_menu_mod_default = $section_value['default'];
			$locopas_menu_title = get_theme_mod( $locopas_menu_mod_id, $locopas_menu_mod_default );
			if( !empty( $locopas_menu_title ) ) {
				?>
                <li class="lc-menu-tab">
            	<?php
                if( $parallax_menu_type == 'float' ) {
                	?>
                	<a href="<?php echo esc_url( home_url() ) . '/#section-' . esc_attr($section_id); ?>"><span></span></a>
                	<div class="px-tooltip"><?php echo esc_attr( $locopas_menu_title ); ?></div>
                	<?php
                } else {
                	if( $locopas_menu_title ) :
                	?>
                	<a href="<?php echo esc_url( home_url() . '/#section-' . esc_attr($section_id) ); ?>"><?php echo esc_html( $locopas_menu_title ); ?></a>
                	<?php
                	endif;
                }
                ?>
                </li>
                <?php
			}
		}
	}
endif;

add_action( 'locopas_parallax_menu', 'locopas_parallax_menu_cb', 10 );


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Primary menu section
 *
 */
if( ! function_exists( 'locopas_main_menu_hook' ) ) :
	function locopas_main_menu_hook() {
		$locopas_menu_style = get_theme_mod( 'primary_menu_type', 'parallax' );
		$parallax_menu_type = get_theme_mod( 'parallax_menu_type', 'default' );
		if($locopas_menu_style == 'parallax')  {
			if( $parallax_menu_type == 'float' ) {
				$nav_class = 'lc-floating-menu';
			} else {
				$nav_class = 'lc-parallax-menu';
			}
		}
?>
		<nav id="site-navigation" class="main-navigation lc-nav <?php echo esc_attr( $nav_class ); ?>" role="navigation">
			<div class="nav-wrapper">
				<div class="nav-toggle hide">
		            <span class="one"> </span>
		            <span class="two"> </span>
		            <span class="three"> </span>
		        </div>

                <?php
                if ( has_nav_menu( 'locopas_primary_menu' ) && $locopas_menu_style == 'default' ) {
                     wp_nav_menu( array( 'theme_location' => 'locopas_primary_menu', 'menu_id' => 'primary-menu' ) );
                }else{
                    if( $locopas_menu_style == 'parallax' ) { ?>
					<div class="menu-main-menu-container">
						<ul id="primary-parallax-menu" class="menu parallax-menu">
							<?php do_action( 'locopas_parallax_menu' ); ?>
						</ul>
					</div>
				<?php }
                } ?>
			</div><!-- .nav-wrapper -->
		</nav><!-- #site-navigation -->
		<div class="lc-head-search">
			<?php
				$ps_search_option = get_theme_mod( 'primary_menu_search_option', 'show' );
				if( $ps_search_option != 'hide' ) {
			?>
					<span class="lc-search-icon"></span>
					<div class="search-form"><?php get_search_form(); ?></div>
			<?php } ?>
		</div><!-- .lc-head-search -->
<?php
	}
endif;

add_action( 'locopas_main_menu', 'locopas_main_menu_hook', 10, 2 );


/*------------------------------------------------------------------------------------------------------------------*/
 /**
  * Define header function for innerpages
  *
  * @since 0.1.0
  */

if( ! function_exists( 'locopas_innerpage_header_hook' ) ):
	function locopas_innerpage_header_hook() {

?>
 	<div class="lc-innerpages-header-wrapper" style="background-image: url(<?php header_image(); ?>);">
 		<div class="lc-container">
	 		<header class="entry-header">
				<?php
					if( is_archive() ) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					// } elseif( is_single() && 'post' === get_post_type() ) {
					// 	$post_category = get_the_category();
					// 	$first_cat_name = $post_category[0]->name;
					// 	the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif( is_page() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif( is_search() ) {
				?>
						<header class="entry-header">
							<h1 class="page-title">
								<?php
									/* translators: %s : search keyword */
									printf( esc_html__( 'Search Results for: %s', 'locopas' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->
				<?php
					}

					locopas_breadcrumbs();
				?>
			</header><!-- .entry-header -->
		</div><!-- .lc-container -->
 	</div><!-- .lc-innerpages-header-wrapper -->
<?php
	}
endif;

add_action( 'locopas_innerpage_header', 'locopas_innerpage_header_hook' );


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Get categories
 *
 * @since 0.1.0
 */
$locopas_raw_categories = get_categories();
foreach ( $locopas_raw_categories  as $categories ) {
	$locopas_categories[$categories->slug] = $categories->name;
}
/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Changed excerpt more
 *
 * @since 0.1.0
 */
if( ! function_exists( 'locopas_custom_excerpt_more' ) ):
	function locopas_custom_excerpt_more( $more ) {
		return ' ';
	}
endif;
add_filter( 'excerpt_more', 'locopas_custom_excerpt_more' );

/**
 * Remove the title prefix from archive pages
 *
 * @since 0.1.0
 */
if( !function_exists( 'locopas_arch_title' ) ) {
	function locopas_arch_title($title) {
	    if ( is_category() ) {
	            $title = single_cat_title( '', false );
	        } elseif ( is_tag() ) {
	            $title = single_tag_title( '', false );
	        } elseif ( is_author() ) {
	            $title = '<span class="vcard lc-admin">' . get_the_author() . '</span>' ;
	        }
	    return $title;
	}
}
add_filter( 'get_the_archive_title', 'locopas_arch_title' );

/*
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
//  if( !function_exists( 'locopas_content_width' ) ) {
// 	function locopas_content_width() {
// 		$GLOBALS['content_width'] = apply_filters( 'locopas_content_width', 640 );
// 	}
// }
// add_action( 'after_setup_theme', 'locopas_content_width', 0 );


/*
 * Define pingback link inside the header.
 *
 */
// if( !function_exists( 'locopas_pingback_header' ) ) {
// 	function locopas_pingback_header() {
// 		if ( is_singular() && pings_open() ) {
// 			printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url', 'display' )) );
// 		}
// 	}
// }
// add_action( 'wp_head', 'locopas_pingback_header' );
