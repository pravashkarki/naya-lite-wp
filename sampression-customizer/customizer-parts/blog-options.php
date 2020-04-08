<?php
/**
 * Blog Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
// get default values
function sampression_customize_register_blog( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// Blog - Section
	$wp_customize->add_section(
		'sampression_blog_section',
		array(
			'title'    => __( 'Blog', 'naya-lite' ),
			'priority' => 60,
		)
	);

	// Show Post Meta - Setting
	$wp_customize->add_setting(
		'hide_post_metas',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default'           => $defaults['hide_post_metas'],
		)
	);

	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'hide_post_metas',
			array(
				'priority' => 1,
				'settings' => 'hide_post_metas',
				'section'  => 'sampression_blog_section',
				'label'    => __( 'Hide Post Meta' ),
				'choices'  => array(
					'date'       => __( 'Date' ),
					'author'     => __( 'Author' ),
					'categories' => __( 'Categories' ),
					'tags'       => __( 'Tags' ),
				),
			)
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_blog' );
