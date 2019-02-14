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
			foreach (glob(get_template_directory_uri() . '/inc/styles/') as $key) {
				// code...
				echo '<p>' . $key .'</p><br>';
			}
			foreach (array_filter(glob(get_template_directory_uri() . '/inc/styles/*.css'),'is_file') as $file) {
			  // Do something with $file
			  echo '<p>path: '.$file.'</p>';
			  echo '<p>st: '.str_replace('.css','',basename($file)).'</p>';
			  echo '<p>id: '.'locopas-'.str_replace('.css', '', basename($file)).'-style'.'</p>';
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'locopas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
