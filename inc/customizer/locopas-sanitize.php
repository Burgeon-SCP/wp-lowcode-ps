<?php
/**
 * Define sanitize functions for customizer fields
 *
 * @package BurgeonEnv Themes
 * @subpackage LoCoPaS
 * @since 0.1.0
 */

/**
 * Sanitize number field
 *
 * @since 0.1.0
 */
function locopas_sanitize_number( $input ) {
    $output = intval($input);
     return $output;
}

/**
 * Sanitize checkbox field
 *
 * @since 0.1.0
 */
function locopas_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Sanitize switch button
 *
 * @since 0.1.0
 */
function locopas_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Show', 'locopas' ),
            'hide'  => esc_html__( 'Hide', 'locopas' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize switch button ( Enable/Disable )
 *
 * @since 0.1.0
 */
function locopas_sanitize_enable_switch_option( $input ) {
    $valid_keys = array(
            'enable'    => esc_html__( 'Enable', 'locopas' ),
            'disable'   => esc_html__( 'Disable', 'locopas' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize switch button for menu
 *
 * @since 0.1.0
 */
function locopas_sanitize_menu_switch_option( $input ) {
    $valid_keys = array(
            'parallax'  => esc_html__( 'Parallax', 'locopas' ),
            'default'   => esc_html__( 'Default', 'locopas' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize switch button for parallax menu type
 *
 * @since 0.1.0
 */
function locopas_sanitize_p_menu_type_switch_option( $input ) {
    $valid_keys = array(
            'default'   => esc_html__( 'Default', 'locopas' ),
            'float'     => esc_html__( 'Float Menu', 'locopas' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize multiple categories for blog
 *
 * @since 0.1.0
 */
function locopas_multiple_categories_sanitize( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/**
 * Active Callback function for customizer field
 */
function locopas_primary_menu_type_callback( $control ) {
    if ( $control->manager->get_setting('primary_menu_type')->value() == 'parallax' ) {
        return true;
    } else {
        return false;
    }
}