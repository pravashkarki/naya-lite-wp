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
	'color',
	'social-options',
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
 * Enqueue Scripts for customize controls.
 */
function sampression_customize_scripts() {
	wp_enqueue_script( 'sampression-customize-control', get_template_directory_uri() . '/sampression-customizer/js/customizer-control.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'sampression-admin-style', get_template_directory_uri() . '/sampression-customizer/css/customizer-admin.css', '1.0', 'screen' );
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

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sampression_customize_core_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'sampression_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'sampression_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'sampression_customize_core_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sampression_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sampression_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

require get_template_directory() . '/sampression-customizer/inc/dynamic-css.php';
