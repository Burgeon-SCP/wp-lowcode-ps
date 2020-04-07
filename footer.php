<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.1.0
 */
?>

		</div><!-- .lc-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>
		<div class="site-info">
			<div class="lc-section-container">
				<?php echo wp_kses_post(
					 get_theme_mod( 'ps_copyright_text',
					  							__('&copy; 2019 LoCoPaS', 'locopas')
												)
											);?>
			</div><!-- lc-section-container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<a href="#masthead" id="scroll-up"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>AOS.init();</script>
</body>
</html>
