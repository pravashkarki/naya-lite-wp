<?php
/**
 * Footer Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */

function sampression_customize_register_footer( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	$wp_customize->add_section(
		'footer_options',
		array(
			'title'    => __( 'Footer Options', 'naya-lite' ),
			'priority' => 160,
		)
	);

	// Copyright Text - Setting
	$wp_customize->add_setting(
		'sampression_copyright_text',
		array(
			'default'           => $defaults['sampression_copyright_text'],
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'sampression_copyright_text',
		array(
			'label'    => __( 'Copyright Text', 'naya-lite' ),
			'section'  => 'footer_options',
			'priority' => 63,
			'type'     => 'textarea',
		)
	);

	// Remove Copyright Text - Setting
	$wp_customize->add_setting(
		'sampression_remove_copyright_text',
		array(
			'default'           => $defaults['sampression_remove_copyright_text'],
			'sanitize_callback' => 'sampression_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'sampression_remove_copyright_text',
		array(
			'label'    => __( 'Remove Copyright Text?', 'naya-lite' ),
			'section'  => 'footer_options',
			'priority' => 64,
			'type'     => 'checkbox',
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_footer' );
