<?php
/**
 * Theme Customizer.
 *
 * @package Sampression theme
 */

// Create your-option.php inside customizer-parts folder .Add your new option-name below.
$sampression_customizer_settings = array(
	'defaults',
	'typography',
	'social-options',
	'blog-options',
	'footer-options',
	'sidebar-layout',
);

/**
 * Sanitization control and helper Functions
 */
require get_template_directory() . '/sampression-customizer/inc/sanitization-functions.php';
require get_template_directory() . '/sampression-customizer/inc/customizer-controls.php';
require get_template_directory() . '/sampression-customizer/inc/helper-functions.php';
require get_template_directory() . '/sampression-customizer/inc/default-options.php';


/**
 * Include required customizer
 */
foreach ( $sampression_customizer_settings as $customizer_setting ) {
	require get_template_directory() . '/sampression-customizer/customizer-parts/' . $customizer_setting . '.php';

}

/**
 *
 * Theme option settings
 **/
function sampression_options_theme_option( $option_name ) {
	$sampression_options_settings = get_option( 'sampression_theme_options' );
	if ( isset( $sampression_options_settings[ $option_name ] ) ) {
		$all_option = $sampression_options_settings[ $option_name ];
		return $all_option;
	}

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sampression_customize_preview_js() {
	wp_enqueue_script( 'sampression-customizer', get_template_directory_uri() . '/sampression-customizer/js/customizer.js', array( 'jquery' ), '1.0', true );
}

add_action( 'customize_preview_init', 'sampression_customize_preview_js' );

/**
 * Enqueue Scripts for customize controls
 */
function sampression_customize_scripts() {
	wp_enqueue_script( 'sampression-customize-control', get_template_directory_uri() . '/sampression-customizer/js/customizer-control.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'sampression-customize-preview', get_template_directory_uri() . '/sampression-customizer/js/customizer-preview.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'sampression-admin-style', get_template_directory_uri() . '/sampression-customizer/css/customizer-admin.css', '1.0', 'screen' );
	wp_enqueue_script( 'sampression-admin-js', get_template_directory_uri() . '/sampression-customizer/js/customizer-admin.js', array( 'jquery' ), '', true );
}

add_action( 'customize_controls_enqueue_scripts', 'sampression_customize_scripts' );

/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function sampression_get_option( $key ) {
	$default_options = sampression_get_default_options_value();

	$current_default_value = isset( $default_options[ $key ] ) ? $default_options[ $key ] : null;

	return get_theme_mod( $key, $current_default_value );
}
