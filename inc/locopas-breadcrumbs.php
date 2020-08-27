<?php
/**
 * Function for breadcrumbs
 * Based on wp-custom-breadcrumbs.php from Sharifur
 * https://gist.github.com/Sharifur/a09008b9f88622d38c948d941bf2bede
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.5.0
 */

if (!function_exists('locopas_breadcrumbs')) {
    function locopas_breadcrumbs() {
        
        // Set variables for later use
        // $        = __( 'You are currently here!' );
        $home_link        = esc_url(home_url('/'));
        $home_text        = esc_html__( 'Home','locopas' );
        $link_before      = '<li typeof="v:Breadcrumb">';
        $link_after       = '</li>';
        $link_attr        = ' rel="v:url" property="v:title"';
        $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        $delimiter        = '>';          // Delimiter between crumbs
        $before           = '<li>';       // Tag before the current crumb
        $after            = '</li>';      // Tag after the current crumb
        // $page_addon       = '';        // Adds the page number if the query is paged
        $breadcrumb_trail = '';
        $category_links   = '';
        
        if ( is_search() ) {
            // Handle the search page
            $breadcrumb_trail = esc_html__( 'Search query for: ','locopas' ) . $before . get_search_query() . $after;
        
        } elseif ( is_404() ) {
            // Handle 404's
            $breadcrumb_trail = $before . esc_html__( 'Error 404','locopas' ) . $after;
        
        // } elseif ( !is_home() || !is_front_page() ) { // only used on inner pages
        //    // Skip breadcrumbs at front page
        } else {
            /**
             * Set our own $wp_the_query variable. Do not use the global variable version due to
             * reliability
             */
            $wp_the_query   = $GLOBALS['wp_the_query'];
            $queried_object = $wp_the_query->get_queried_object();
            $post_object = sanitize_post( $queried_object );

            $title          = apply_filters( 'the_title', $post_object->post_title );
            $parent         = $post_object->post_parent;
            $post_type      = $post_object->post_type;
            $post_id        = $post_object->ID;
            $post_link      = $before . $title . $after;
            $parent_string  = '';
            $post_type_link = '';

            // Page-only theme
            // if ( 'post' === $post_type )
            // {
            //     // Get the post categories
            //     $categories = get_the_category( $post_id );
            //     if ( $categories ) {
            //         // Lets grab the first category
            //         $category  = $categories[0];
            //
            //         $category_links = get_category_parents( $category, true, $delimiter );
            //         $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
            //         $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
            //     }
            // }

            // Get post parents if $parent !== 0
            if ( 0 !== $parent ) {
                $parent_links = [];
                while ( $parent ) {
                    $post_parent = get_post( $parent );

                    $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                    $parent = $post_parent->post_parent;
                }

                $parent_links = array_reverse( $parent_links );
                $parent_string = implode( $delimiter, $parent_links );
            }

            // Build the breadcrumb trail
            if ( $parent_string ) {
                $breadcrumb_trail = $parent_string . $delimiter . $post_link;
            } else {
                $breadcrumb_trail = $post_link;
            }
        }
        
        // Unused types
        // if ( $post_type_link )
        //     $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;
        //
        // if ( $category_links )
        //     $breadcrumb_trail = $category_links . $breadcrumb_trail;
        // }
        // Handle paged pages
        // if ( is_paged() ) {
        //     $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        //     $page_addon   = $before . sprintf( esc_html__( ' ( Page %s )' ,'locopas'), number_format_i18n( $current_page ) ) . $after;
        // }

        // Build breadcrumb object
        $breadcrumb_output_link  = '';
        $breadcrumb_output_link .= '<div> <ul id="crumbs">';
        // Do not show breadcrumbs on page one of home and frontpage
        // if ( is_paged() ) {
        //     // $breadcrumb_output_link .= $here_text . $delimiter;
        //     $breadcrumb_output_link .= '<li><a href="' . $home_link . '">' . $home_text . '</a></li>';
        //     $breadcrumb_output_link .= $page_addon;
        // }

        // $breadcrumb_output_link .= $here_text . $delimiter;
        $breadcrumb_output_link .= '<li><a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a></li>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        // $breadcrumb_output_link .= $page_addon;
        $breadcrumb_output_link .= '</ul></div><!-- locopas-breadcrumbs -->';

        echo $breadcrumb_output_link;

     }
} // end locopas_breadcrumbs()
