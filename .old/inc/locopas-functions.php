
/*------------------------------------------------------------------------------------------------------------------*/
 /**
  * Define function for homepage slider
  *
  * @since 0.1.0
  */

if( ! function_exists( 'locopas_homepage_slider_hook' ) ):
function locopas_homepage_slider_hook() {
	$ps_slider_option = get_theme_mod( 'homepage_slider_option', 'hide' );
	$ps_slider_cat_id = get_theme_mod( 'slider_cat_id', '0' );
	if( $ps_slider_option != 'hide' && !empty( $ps_slider_cat_id ) ) {
?>
		<div id="section-slider" class="lc-front-slider-wrapper">
			<?php
				$ps_slider_args = array(
									'category__in' => $ps_slider_cat_id,
									'posts_per_page' => 5
									);
				$ps_slider_query = new WP_Query( $ps_slider_args );
				if( $ps_slider_query->have_posts() ) {
					echo '<ul class="frontSlider">';
					while( $ps_slider_query->have_posts() ) {
						$ps_slider_query->the_post();
						$image_id = get_post_thumbnail_id();
						$image_path = wp_get_attachment_image_src( $image_id, 'full', true );
						if( has_post_thumbnail() ) {

		?>
						<div class="single-slide-wrap" style="background-image: url('<?php echo esc_url( $image_path[0] ); ?>');">
							<div class="slider-info">
								<div class="lc-container">
									<h2 class="slider-title"><?php the_title(); ?></h2>
									<div class="slider-desc"><?php the_excerpt(); ?></div>
									<span class="slide-button">
										<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Learn More', 'locopas' ); ?></a>
									</span>
								</div>
							</div><!-- .slider-info -->
						</div><!-- .single-slide-wrap -->
		<?php
						}
					}
					echo '</ul>';
				}
                wp_reset_postdata();
			?>

		</div><!-- .lc-front-slider-wrapper -->
<?php
	}
}
endif;

add_action( 'locopas_homepage_slider', 'locopas_homepage_slider_hook', 10 );

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Locopas Social Icons
 *
 * @since 0.1.0
 */
if( !function_exists( 'locopas_social_icons' ) ):
	function locopas_social_icons() {
		$fb_link = get_theme_mod( 'fb_link', '' );
		$tw_link = get_theme_mod( 'tw_link', '' );
		$ln_link = get_theme_mod( 'ln_link', '' );
		$pin_link = get_theme_mod( 'pin_link', '' );
		$gp_link = get_theme_mod( 'gp_link', '' );
		$yt_link = get_theme_mod( 'yt_link', '' );
?>
		<div class="lc-social-icons-wrapper">
			<?php if( !empty ( $fb_link ) ) { ?> <a href="<?php echo esc_url( $fb_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-facebook"></span></a> <?php } ?>
			<?php if( !empty ( $tw_link ) ) { ?> <a href="<?php echo esc_url( $tw_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-twitter"></span></a> <?php } ?>
			<?php if( !empty ( $ln_link ) ) { ?> <a href="<?php echo esc_url( $ln_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-linkedin"></span></a> <?php } ?>
			<?php if( !empty ( $pin_link ) ) { ?> <a href="<?php echo esc_url( $pin_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-pinterest"></span></a> <?php } ?>
			<?php if( !empty ( $gp_link ) ) { ?> <a href="<?php echo esc_url( $gp_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-google-plus"></span></a> <?php } ?>
			<?php if( !empty ( $yt_link ) ) { ?> <a href="<?php echo esc_url( $yt_link ); ?>" target="_
			blank"> <span class="lc-social-icon fa fa-youtube"></span></a> <?php } ?>
		</div><!-- .lc-social-icons-wrapper -->
<?php
	}
endif;

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Top header social icons
 *
 * @since 0.1.0
 */
if( ! function_exists( 'locopas_top_social_icons_hook' ) ):
	function locopas_top_social_icons_hook() {
		$top_social_option = get_theme_mod( 'top_header_social_option', 'show' );
		if( $top_social_option != 'hide' ) {
?>
			<div class="top-social-icons"><?php locopas_social_icons(); ?></div>
<?php
		}
	}
endif;

add_action( 'locopas_top_social_icons', 'locopas_top_social_icons_hook', 10 );
