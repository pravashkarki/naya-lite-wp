<?php
/**
 * Typography Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
function sampression_customize_register_typography( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// Typography Section.
	$wp_customize->add_section(
		'sampression_typography_section',
		array(
			'title'    => __( 'Typography', 'naya-lite' ),
			'priority' => 20,
		)
	);

	// Setting - primary_font_family.
	$wp_customize->add_setting(
		'primary_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_select',
			'default'           => $defaults['primary_font_family'],
		)
	);
	$wp_customize->add_control(
		'primary_font_family',
		array(
			'label'             => __( 'Primary Font Family', 'naya-lite' ),
			'type'              => 'select',
			'section'           => 'sampression_typography_section',
			'choices'           => sampression_fonts(),
			'settings'          => 'primary_font_family',
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	// Setting - secondary_font_family.
	$wp_customize->add_setting(
		'secondary_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_select',
			'default'           => $defaults['secondary_font_family'],
		)
	);
	$wp_customize->add_control(
		'secondary_font_family',
		array(
			'label'             => __( 'Secondary Font Family', 'naya-lite' ),
			'type'              => 'select',
			'section'           => 'sampression_typography_section',
			'choices'           => sampression_fonts(),
			'settings'          => 'secondary_font_family',
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_typography' );
