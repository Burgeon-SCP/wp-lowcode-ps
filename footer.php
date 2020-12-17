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
	<a href="#masthead" id="scroll-up"></a>
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    AOS.init({
      // Global settings:
      disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
      
      // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
      offset: 120, // offset (in px) from the original trigger point
      delay: 0, // values from 0 to 3000, with step 50ms
      duration: 1200, // values from 0 to 3000, with step 50ms
      easing: 'ease', // default easing for AOS animations
      once: false, // whether animation should happen only once - while scrolling down
      mirror: true, // whether elements should animate out while scrolling past them
      anchorPlacement: 'center-center', // defines which position of the element regarding to window should trigger the animation
    });
</script>
</body>
</html>
