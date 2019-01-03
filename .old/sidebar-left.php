<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AccessPress Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */


?>

<aside id="secondary" class="left-sidebar widget-area" role="complementary">
	<?php 
		if ( ! is_active_sidebar( 'locopas_left_sidebar' ) ) { return; }
			dynamic_sidebar( 'locopas_left_sidebar' ); 
	?>
</aside><!-- #secondary -->