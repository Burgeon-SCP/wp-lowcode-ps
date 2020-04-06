<?php
/**
 * The Sidebar containing the footer widget areas.
 * 
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.1.0
 */

/**
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( !is_active_sidebar( 'locopas_footer_sidebar' ) &&
        !is_active_sidebar( 'locopas_footer_sidebar-2' ) &&
        !is_active_sidebar( 'locopas_footer_sidebar-3' ) &&
        !is_active_sidebar( 'locopas_footer_sidebar-4' ) ) {
    return;
}

$locopas_footer_layout = get_theme_mod( 'ps_footer_widget_layout', 'column_three' );

?>
<div class="lc-top-footer footer_<?php echo esc_attr( $locopas_footer_layout ); ?> clearfix">
	<div class="lc-section-container clearfix">
		<div class="lc-footer-widget-wrapper">
			<div class="lc-footer-widget column-first">
				<?php if( is_active_sidebar( 'locopas_footer_sidebar' ) ):
					dynamic_sidebar( 'locopas_footer_sidebar' );
				endif;
				?>
			</div>

			<div class="lc-footer-widget column-second" style="display: <?php if( $locopas_footer_layout == 'column_one' ){ echo 'none'; } else { echo 'block'; }?>;">
				<?php if( is_active_sidebar( 'locopas_footer_sidebar-2' ) ):
					dynamic_sidebar( 'locopas_footer_sidebar-2' );
				endif;
				?>
			</div>

			<div class="lc-footer-widget column-third" style="display: <?php if( $locopas_footer_layout == 'column_one' || $locopas_footer_layout == 'column_two'){ echo 'none'; } else { echo 'block'; }?>;">
				<?php if( is_active_sidebar( 'locopas_footer_sidebar-3' ) ):
					dynamic_sidebar( 'locopas_footer_sidebar-3' );
				endif;
				?>
			</div>

			<div class="lc-footer-widget column-forth" style="display: <?php if( $locopas_footer_layout != 'column_four' ){ echo 'none'; } else { echo 'block'; }?>;">
				<?php if( is_active_sidebar( 'locopas_footer_sidebar-4' ) ):
					dynamic_sidebar( 'locopas_footer_sidebar-4' );
				endif;
				?>
			</div>
		</div><!-- .lc-footer-widget-wrapper -->
	</div><!-- lc-section-container -->
</div><!-- .lc-top-footer -->