<?php
/**
 * sidebar options sample.
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */
function sampression_customize_sidebar_layout( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// default layout setting
	$wp_customize->add_section(
		'sampression_default_layout_setting',
		array(
			'priority' => 50,
			'title'    => __( 'Default Sidebar Layout', 'naya-lite' ),
		)
	);

	$wp_customize->add_setting(
		'sampression_sidebar_layout',
		array(
			'default'           => $defaults['sampression_sidebar_layout'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		new sampression_sidebar_Control(
			$wp_customize,
			'sampression_sidebar_layout',
			array(
				'type'     => 'radio',
				'label'    => __( 'Website Sidebar', 'naya-lite' ),
				'section'  => 'sampression_default_layout_setting',
				'settings' => 'sampression_sidebar_layout',
				'choices'  => array(
					'right' => get_template_directory_uri() . '/sampression-customizer/images/right-sidebar.png',
					'left'  => get_template_directory_uri() . '/sampression-customizer/images/left-sidebar.png',
					'none'  => get_template_directory_uri() . '/sampression-customizer/images/no-sidebar-full-width-layout.png',
				),
			)
		)
	);
}

add_action( 'customize_register', 'sampression_customize_sidebar_layout' );
