<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

get_header(); ?>

	<div class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<span class="error-code"><?php esc_html_e( '400', 'locopas' ); ?></span>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'locopas' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'locopas' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
