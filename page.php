<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			foreach (array_filter(glob(get_template_directory_uri().'/inc/styles/'), 'is_file') as $file) {
				// Do something with $file
				echo "<h2>$file<h2>";
				// wp_enqueue_style('locopas-'.str_replace('.css', '', $file).'-style',
				// 								 get_template_directory_uri().'/inc/styles/'.$file,
				// 								 array('locopas-style-css'),
				// 								 $locopas_theme_version
				// 							 );
			}

			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// locopas_get_sidebar();
get_footer();
