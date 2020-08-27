<?php
/* This mu-plugin allows deactivation of plugins on page basis.
 * Increases perfomance by filtering unnecessary active elements.
 * Extracted from post by Brian Jackson at:
 * https://kinsta.com/blog/disable-wordpress-plugins-loading/
 *
 */

$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

$is_admin = strpos( $request_uri, '/wp-admin/' );

if( false === $is_admin ){
	add_filter( 'option_active_plugins', function( $plugins ){

		global $request_uri;

		$is_contact_page = strpos( $request_uri, '/contact/' );

		$myplugins = array(
			"everest-forms/everest-forms.php"
		);

		if( false === $is_contact_page ){
			$plugins = array_diff( $plugins, $myplugins );
		}

		return $plugins;

	} );
}

?>
