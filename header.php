<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'locopas_before' ); ?>
<div id="page-<?php if (! get_permalink()) { the_ID(); } else { echo basename(get_permalink()); } ?>" class="site">
	<?php do_action( 'locopas_before_header' ); ?>
	<div class="lc-whole-header">
		<?php
			$locopas_top_header_option = get_theme_mod( 'top_header_option', 'hide' );
			if( $locopas_top_header_option != 'hide' ) {
		?>
			<div class="lc-top-header-wrapper">
				<div class="lc-container clearfix">
					<nav class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'locopas_top_menu', 'menu_id' => 'top-menu', 'fallback_cb' => false  ) ); ?>
					</nav><!-- #site-navigation -->
					<?php do_action( 'locopas_top_social_icons' ); ?>
				</div><!-- .lc-container -->
			</div><!-- .lc-top-header-wrapper -->
		<?php } ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="lc-container">
				<div class="lc-header-wrapper clearfix">
					<div class="site-branding">
						<?php
                            if(get_theme_mod('custom_logo')){
    							if ( function_exists( 'the_custom_logo' ) ) {
    								the_custom_logo();
    							}
								} else {
    						?>
        						<div class="site-title-wrapper">
        							<?php
        								if ( is_front_page() && is_home() ) : ?>
        									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        							<?php else : ?>
        									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        							<?php
        								endif;

        								$description = get_bloginfo( 'description', 'display' );
        								if ( $description || is_customize_preview() ) : ?>
        									<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
        							<?php
        								endif;
        							?>
        						</div><!-- .site-title-wrapper -->
                            <?php
                            }
                        ?>
					</div><!-- .site-branding -->

					<!-- theme main menu -->
					<nav id="top-site-navigation" role="navigation">
                       <?php wp_nav_menu( array( 'theme_location' => 'locopas_top_menu', 'menu_id' => 'top-menu', 'fallback_cb' => false  ) ); ?>
                    </nav><!-- #site-navigation -->
                    <?php /* do_action( 'locopas_main_menu' ); */ ?>

				</div><!-- .lc-header-wrapper-- >
			</div><!-- .lc-container -->
		</header><!-- #masthead -->

	</div><!-- .lc-whole-header -->
	<?php
		if( is_front_page() ) {
			do_action( 'locopas_homepage_slider' );
		} else {
			do_action( 'locopas_innerpage_header' );
		}
	?>

	<div id="content" class="site-content">
		<div class="lc-container">
