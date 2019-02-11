<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

?>
<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'locopas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


<!-- </article><!- - #post-## - -> -->
