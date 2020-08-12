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
 * Define performance functions
 *
 * @since 0.5.0
 */

if ( ! function_exists( 'url_async_script_tagging' ) ) :
    /**
    * Asynchronous load based on editable url.
    *
    * Now you can enqueue your scripts as normal,
    * and simply add the #asyncload string at the end of any url.
    *
    * This filter was proposed by Scott from ikreativ at:
    * https://ikreativ.com/async-with-wordpress-enqueue/
    *
    *
    * @since 0.5.0
    *
    */
    function url_async_script_tagging($url) {
        if ( strpos( $url, '#asyncload') === false )
            return $url;
        else if ( is_admin() )
            return str_replace( '#asyncload', '', $url );
        else
            return str_replace( '#asyncload', '', $url )."' async='async";
    }
endif;
add_filter( 'clean_url', 'url_async_script_tagging', 11, 1 );

if ( ! function_exists( 'url_defer_script_tagging' ) ) :
    /**
    * Defered load based on editable url.
    *
    * Now you can enqueue your scripts as normal,
    * and simply add #deferload string at the end of any url.
    *
    * This filter was proposed for async tag by Scott from ikreativ at:
    * https://ikreativ.com/async-with-wordpress-enqueue/
    *
    *
    * @since 0.5.0
    *
    */
    function url_defer_script_tagging($url) {
         if ( strpos( $url, '#deferload') === false )
             return $url;
         else if ( is_admin() )
             return str_replace( '#deferload', '', $url );
         else
        	return str_replace( '#deferload', '', $url )."' defer='defer";
    }
endif;
add_filter( 'clean_url', 'url_defer_script_tagging', 11, 1 );

if( ! function_exists( 'is_user_loggeg_in' ) ):
    /**
    * Check for a logged user
    *
    * @since 0.5
    */
    function is_user_loggeg_in() {
        $user = _wp_get_current_user();
        return $user->exists();
    }
endif;

// TODO: Create preload and lazyload functions

// Preload first files
// <head>
//   <link rel="preload" as="style" href="style.css">
//   <link rel="preload" as="image" href="reflex-pano.jp2">
//   <link rel="preload" as="script" href="jquery.js">
// </head>

// Lazy load images as later elements
// <script src="lazysizes.min.js" async></script>
// <img data-src="flower.jpg" class="lazyload" alt="">


if ( ! function_exists( 'locopas_remove_emojis' ) ) :
    
    /**
     * Removes emoji content for higher performance.
     *
     * This function is proposed by Christine Cooper at:
     * https://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
     *
     * It is also an increased solution of the one proposed at WpFASTER.org
     * 		https://www.wpfaster.org/code/how-to-remove-emoji-styles-scripts-wordpress
     *
     * @since 0.1.2
     *
     */

    function disable_emojicons_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }

    function locopas_remove_emojis() {
    	/* Remove emoji creation capability */
    	// all actions related to emojis
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );

    	// all filters related to emojis
    	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    	add_filter( 'emoji_svg_url', '__return_false' );

        // filter to remove TinyMCE emojis with previous function
        add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
    }
endif;
add_action( 'init', 'locopas_remove_emojis' );

if ( ! function_exists( 'disable_pingback' ) ) :
    function disable_pingback( &$links ) {
        foreach ( $links as $l => $link )
            if ( 0 === strpos( $link, get_option( 'home' ) ) )
                unset($links[$l]);
    }
endif;
add_action( 'pre_ping', 'disable_pingback' );

// Exclude unnecessary elements from loading
if ( ! function_exists( 'locopas_unload' ) ) :
    // Exclude loading of unnecessary files
    function locopas_unload() {
        wp_dequeue_style( 'wp-block-library' ); // Guttenberg blocks
        remove_action( 'wp_head', 'rsd_link' ); // Really Simply Discovery
        remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // header wp_shortlink --> SEO canonical
        remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live writer
        add_filter( 'xmlrpc_enabled', '__return_false'); // Wordpress API - prevent DDoS & BF
        add_filter( 'wpcf7_load_js', '__return_false' ); // Contact Form 7 --> Everest Forms
        add_filter( 'wpcf7_load_css', '__return_false' ); // Contact Form 7 --> Everest Forms
        // Not-logged visitors
        if ( ! is_user_loggeg_in() ) {
            //wp_deregister_style( 'amethyst-dashicons-style' );
            wp_deregister_script( 'jquery' );
            wp_deregister_style( 'dashicons' ); // Dashicons
        }
        // Pages without external form
        if ( ! is_page( 'contact' ) ) {
            wp_dequeue_style( 'everest-forms-general-css' ); // Everest Forms
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'locopas_unregister', 100 );



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
	wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/assets/library/jquery-nav/js/jquery.nav.js#deferload', array( 'jquery' ), '2.2.0', true );
	wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/assets/library/jquery-scrollTo/js/jquery.scrollTo.js#deferload', array( 'jquery' ), '2.1.1', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/library/parallax-js/js/parallax.min.js#asyncload', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_style ( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css#asyncload', array(), '2.3.1' );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js#asyncload', false, null, true );
    wp_enqueue_script( 'aos-init-js', get_template_directory_uri() . '/assets/library/aos/js/init.js#asyncload', ['aos-js'], null, true );

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
         * TODO: Check for minimized version and use it if present
		 */


		 // WIP: NOT WORKING
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
/* Complementary functions */

if( ! function_exists( 'locopas_get_visitor_ip' ) ):
    /**
     * Define shortcode for visitor ip recovery
     * Extracted from:
     * https://www.wpbeginner.com/wp-tutorials/how-to-display-a-users-ip-address-in-wordpress/
     *
     * @since 0.1.2
     */
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
