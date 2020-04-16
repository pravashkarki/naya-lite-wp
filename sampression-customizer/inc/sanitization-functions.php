<?php
/**
 * Sanitization callback for  type controls
 *
 * @param  string $input Slug to sanitize.
 * @param  WP_Customize_Setting $setting Setting instance
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default
 */

function sampression_sanitize_checkboxes( $values ) {

	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

	$multi_values = array_filter( $multi_values );

	return ! empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/**
 * Sanitization callback for checkbox as a boolean value, either TRUE or FALSE.
 *
 * @param  bool $checked Whether the checkbox is checked
 * @return bool          Whether the checkbox is checked
 */
function sampression_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitize select.
 *
 * @since 1.0.0
 *
 * @param mixed                $input The value to sanitize.
 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
 * @return mixed Sanitized value.
 */
function sampression_sanitize_select( $input, $setting ) {
	// Ensure input is clean.
	$input = sanitize_text_field( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
