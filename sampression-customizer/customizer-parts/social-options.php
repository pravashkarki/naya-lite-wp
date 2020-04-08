<?php
/**
 * Social Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/

function sampression_customize_register_social( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// Social Media
	$wp_customize->add_section(
		'sampression_social_section',
		array(
			'title'    => __( 'Social Media', 'naya-lite' ),
			'priority' => 140,
		)
	);

	// Social Icon Color - Setting
	$wp_customize->add_setting(
		'social_icon_color',
		array(
			'default'              => $defaults['social_color'],
			'sanitize_callback'    => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			'transport'            => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'social_icon_color',
			array(
				'label'    => __( 'Social Icon Color', 'naya-lite' ),
				'section'  => 'sampression_social_section',
				'settings' => 'social_icon_color',
				'priority' => 1,
			)
		)
	);

	// Use Social Icon Default Color - Setting
	$wp_customize->add_setting(
		'use_social_default_color',
		array(
			'default'           => 1,
			'sanitize_callback' => 'sampression_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'use_social_default_color',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Use Default Social Icon Color?', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'priority' => 2,
		)
	);

	// Facebook URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_facebook',
		array(
			'default'           => $defaults['sampression_socials_facebook'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_facebook',
		array(
			'label'    => __( 'Facebook Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_facebook',
			'priority' => 3,

		)
	);

	// Twitter URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_twitter',
		array(
			'default'           => $defaults['sampression_socials_twitter'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'sampression_socials_twitter',
		array(
			'label'    => __( 'Twitter Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_twitter',
			'priority' => 4,
		)
	);

	// Youtube URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_youtube',
		array(
			'default'           => $defaults['sampression_socials_youtube'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_youtube',
		array(
			'label'    => __( 'Youtube Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_youtube',
			'priority' => 5,
		)
	);

	// Google+ URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_googleplus',
		array(
			'default'           => $defaults['sampression_socials_googleplus'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_googleplus',
		array(
			'label'    => __( 'Google+ Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_googleplus',
			'priority' => 6,
		)
	);

	// Linkedin URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_linkedin',
		array(
			'default'           => $defaults['sampression_socials_linkedin'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_linkedin',
		array(
			'label'    => __( 'Linkedin Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_linkedin',
			'priority' => 9,
		)
	);

	// Flickr URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_flickr',
		array(
			'default'           => $defaults['sampression_socials_flickr'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_flickr',
		array(
			'label'    => __( 'Flickr Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_flickr',
			'priority' => 12,
		)
	);

	// Vimeo URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_vimeo',
		array(
			'default'           => $defaults['sampression_socials_vimeo'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_vimeo',
		array(
			'label'    => __( 'Vimeo Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_vimeo',
			'priority' => 13,
		)
	);

	// Github URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_github',
		array(
			'default'           => $defaults['sampression_socials_github'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_github',
		array(
			'label'    => __( 'Github Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_github',
			'priority' => 10,
		)
	);

	// Instagram URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_instagram',
		array(
			'default'           => $defaults['sampression_socials_instagram'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_instagram',
		array(
			'label'    => __( 'Instagram Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_instagram',
			'priority' => 11,
		)
	);

	// Tumblr URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_tumblr',
		array(
			'default'           => $defaults['sampression_socials_tumblr'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_tumblr',
		array(
			'label'    => __( 'Tumblr Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_tumblr',
			'priority' => 7,
		)
	);

	// Pinterest URL - Setting
	$wp_customize->add_setting(
		'sampression_socials_pinterest',
		array(
			'default'           => $defaults['sampression_socials_pinterest'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'sampression_socials_pinterest',
		array(
			'label'    => __( 'Pinterest Link', 'naya-lite' ),
			'section'  => 'sampression_social_section',
			'settings' => 'sampression_socials_pinterest',
			'priority' => 8,
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_social' );
