<?php
/**
 * Typography Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
function sampression_customize_register_colors( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// Typography Section.
	$wp_customize->add_section(
		'sampression_color_section',
		array(
			'title'    => __( 'Color Options', 'naya-lite' ),
			'priority' => 25,
		)
	);

	// Setting - primary_color.
	$wp_customize->add_setting(
		'primary_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => $defaults['primary_color'],
		)
	);
	$wp_customize->add_control(
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'naya-lite' ),
			'type'     => 'color',
			'section'  => 'sampression_color_section',
			'choices'  => sampression_fonts(),
			'settings' => 'primary_color',
		)
	);

	// Setting - secondary_color.
	$wp_customize->add_setting(
		'secondary_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => $defaults['secondary_color'],
		)
	);
	$wp_customize->add_control(
		'secondary_color',
		array(
			'label'    => __( 'Secondary Color', 'naya-lite' ),
			'type'     => 'color',
			'section'  => 'sampression_color_section',
			'choices'  => sampression_fonts(),
			'settings' => 'secondary_color',
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_colors' );
