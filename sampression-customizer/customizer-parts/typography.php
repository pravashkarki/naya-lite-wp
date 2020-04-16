<?php
/**
 * Typography Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
function sampression_customize_register_typography( $wp_customize ) {
	$defaults = sampression_get_default_options_value();

	// Typography - Panel
	$wp_customize->add_panel(
		'sampression_typography_panel',
		array(
			'priority'    => 40,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Typography', 'naya-lite' ),
			'description' => __( 'Description of what this panel does.', 'naya-lite' ),
		)
	);

	// website Text - Section
	$wp_customize->add_section(
		'sampression_title_tag_section',
		array(
			'title'    => __( 'Site Title/Tagline', 'naya-lite' ),
			'priority' => 1,
			'panel'    => 'sampression_typography_panel',
		)
	);

	// website title and tags font setting
	$wp_customize->add_setting(
		'webtitle_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_select',
			'default'           => $defaults['webtitle_font_family'],
		)
	);
	$wp_customize->add_control(
		'webtitle_font_family',
		array(
			'type'              => 'select',
			'priority'          => 1,
			'description'       => __( 'Select your desired font for Site Title.', 'naya-lite' ),
			'section'           => 'sampression_title_tag_section',
			'choices'           => sampression_fonts(),
			'settings'          => 'webtitle_font_family',
			'label'             => __( 'Site Font Family', 'naya-lite' ),
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	// Website Title Font Size  - Setting
	$wp_customize->add_setting(
		'webtitle_font_size',
		array(
			'default'           => $defaults['webtitle_font_size'],
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'webtitle_font_size',
		array(
			'type'        => 'range',
			'priority'    => 2,
			'settings'    => 'webtitle_font_size',
			'section'     => 'sampression_title_tag_section',
			'label'       => __( 'Site Title Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 72,
				'step' => 1,
			),
		)
	);

	// Title Font Style - Setting
	$wp_customize->add_setting(
		'webtitle_font_style',
		array(
			'default'           => $defaults['webtitle_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'webtitle_font_style',
			array(
				'priority' => 3,
				'settings' => 'webtitle_font_style',
				'section'  => 'sampression_title_tag_section',
				'label'    => __( 'Site Title Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Title Font Color - Setting
	$wp_customize->add_setting(
		'webtitle_font_color',
		array(
			'default'           => '#' . $defaults['webtitle_font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'webtitle_font_color',
			array(
				'label'    => __( 'Title Font Color', 'naya-lite' ),
				'section'  => 'sampression_title_tag_section',
				'settings' => 'webtitle_font_color',
				'priority' => 4,
			)
		)
	);

	// Website Tagline Font Family - Setting
	$wp_customize->add_setting(
		'webtagline_font_family',
		array(
			'default'           => $defaults['webtagline_font_family'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'webtagline_font_family',
		array(
			'type'     => 'select',
			'priority' => 5,
			'section'  => 'sampression_title_tag_section',
			'choices'  => sampression_fonts(),
			'settings' => 'webtagline_font_family',
			'label'    => __( 'Tagline Font Family', 'naya-lite' ),
		)
	);

	// Website Tagline Font Size  - Setting
	$wp_customize->add_setting(
		'webtagline_font_size',
		array(
			'default'           => $defaults['webtagline_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'webtagline_font_size',
		array(
			'type'        => 'range',
			'priority'    => 6,
			'settings'    => 'webtagline_font_size',
			'section'     => 'sampression_title_tag_section',
			'label'       => __( 'Tagline Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 32,
				'step' => 1,
			),
		)
	);

	// Website Tagline Font Style - Setting
	$wp_customize->add_setting(
		'webtagline_font_style',
		array(
			'default'           => $defaults['webtagline_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'webtagline_font_style',
			array(
				'priority' => 7,
				'settings' => 'webtagline_font_style',
				'section'  => 'sampression_title_tag_section',
				'label'    => __( 'Tagline Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Website Tagline Font Color - Setting
	$wp_customize->add_setting(
		'webtagline_font_color',
		array(
			'default'           => '#' . $defaults['webtagline_font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'webtagline_font_color',
			array(
				'label'    => __( 'Tagline Font Color', 'naya-lite' ),
				'section'  => 'sampression_title_tag_section',
				'settings' => 'webtagline_font_color',
				'priority' => 8,
			)
		)
	);

	// Header Text - Section
	$wp_customize->add_section(
		'sampression_headertext_section',
		array(
			'title'    => __( 'Header Text', 'naya-lite' ),
			'priority' => 2,
			'panel'    => 'sampression_typography_panel',
		)
	);

	// Header Text Font Family - Setting
	$wp_customize->add_setting(
		'title_font',
		array(
			'default'           => $defaults['title_font'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'title_font',
		array(
			'type'     => 'select',
			'priority' => 1,
			'section'  => 'sampression_headertext_section',
			'choices'  => sampression_fonts(),
			'settings' => 'title_font',
			'label'    => __( 'Font Family', 'naya-lite' ),
		)
	);

	// Header Text Font Size  - Setting
	$wp_customize->add_setting(
		'headertext_font_size',
		array(
			'default'           => $defaults['headertext_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'headertext_font_size',
		array(
			'type'        => 'range',
			'priority'    => 2,
			'settings'    => 'headertext_font_size',
			'section'     => 'sampression_headertext_section',
			'label'       => __( 'Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 36,
				'step' => 1,
			),
		)
	);

	// Header Text Font Style - Setting
	$wp_customize->add_setting(
		'headertext_font_style',
		array(
			'default'           => $defaults['headertext_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'headertext_font_style',
			array(
				'priority' => 3,
				'settings' => 'headertext_font_style',
				'section'  => 'sampression_headertext_section',
				'label'    => __( 'Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Header Text Font Color - Setting
	$wp_customize->add_setting(
		'title_textcolor',
		array(
			'default'           => '#' . $defaults['title_textcolor'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'title_textcolor',
			array(
				'label'    => __( 'Font Color', 'naya-lite' ),
				'section'  => 'sampression_headertext_section',
				'settings' => 'title_textcolor',
				'priority' => 4,
			)
		)
	);

	// Header Text Link Color - Setting
	$wp_customize->add_setting(
		'headertext_link_color',
		array(
			'default'           => '#' . $defaults['headertext_link_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'headertext_link_color',
			array(
				'label'    => __( 'Font Color : Hover', 'naya-lite' ),
				'section'  => 'sampression_headertext_section',
				'settings' => 'headertext_link_color',
				'priority' => 5,
			)
		)
	);

	// Body Text - Section
	$wp_customize->add_section(
		'sampression_bodytext_section',
		array(
			'title'    => __( 'Body Text', 'naya-lite' ),
			'priority' => 1,
			'panel'    => 'sampression_typography_panel',
		)
	);

	// Body Text Font Family - Setting
	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => $defaults['body_font'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'body_font',
		array(
			'type'     => 'select',
			'priority' => 1,
			'section'  => 'sampression_bodytext_section',
			'choices'  => sampression_fonts(),
			'settings' => 'body_font',
			'label'    => __( 'Font Family', 'naya-lite' ),
		)
	);

	// Body Text Font Size  - Setting
	$wp_customize->add_setting(
		'bodytext_font_size',
		array(
			'default'           => $defaults['bodytext_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bodytext_font_size',
		array(
			'type'        => 'range',
			'priority'    => 2,
			'settings'    => 'bodytext_font_size',
			'section'     => 'sampression_bodytext_section',
			'label'       => __( 'Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 22,
				'step' => 1,
			),
		)
	);

	// Body Text Font Style - Setting
	$wp_customize->add_setting(
		'bodytext_font_style',
		array(
			'default'           => $defaults['bodytext_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);

	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'bodytext_font_style',
			array(
				'priority' => 3,
				'settings' => 'bodytext_font_style',
				'section'  => 'sampression_bodytext_section',
				'label'    => __( 'Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Body Text Font Color - Setting
	$wp_customize->add_setting(
		'body_textcolor',
		array(
			'default'           => '#' . $defaults['body_textcolor'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_textcolor',
			array(
				'label'    => __( 'Font Color', 'naya-lite' ),
				'section'  => 'sampression_bodytext_section',
				'settings' => 'body_textcolor',
				'priority' => 4,
			)
		)
	);

	// Body Text Link Color - Setting
	$wp_customize->add_setting(
		'body_link_color',
		array(
			'default'           => '#' . $defaults['body_link_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_link_color',
			array(
				'label'    => __( 'Link Color', 'naya-lite' ),
				'section'  => 'sampression_bodytext_section',
				'settings' => 'body_link_color',
				'priority' => 5,
			)
		)
	);

	// Meta Text - Section
	$wp_customize->add_section(
		'sampression_metatext_section',
		array(
			'title'    => __( 'Meta Text', 'naya-lite' ),
			'priority' => 4,
			'panel'    => 'sampression_typography_panel',
		)
	);

	// Meta Text Font Family - Setting
	$wp_customize->add_setting(
		'metatext_font_family',
		array(
			'default'           => $defaults['metatext_font_family'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'metatext_font_family',
		array(
			'type'     => 'select',
			'priority' => 1,
			'section'  => 'sampression_metatext_section',
			'choices'  => sampression_fonts(),
			'settings' => 'metatext_font_family',
			'label'    => __( 'Font Family', 'naya-lite' ),
		)
	);

	// Meta Text Font Size  - Setting
	$wp_customize->add_setting(
		'metatext_font_size',
		array(
			'default'           => $defaults['metatext_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'metatext_font_size',
		array(
			'type'        => 'range',
			'priority'    => 2,
			'settings'    => 'metatext_font_size',
			'section'     => 'sampression_metatext_section',
			'label'       => __( 'Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 22,
				'step' => 1,
			),
		)
	);

	// Meta Text Font Style - Setting
	$wp_customize->add_setting(
		'metatext_font_style',
		array(
			'default'           => $defaults['metatext_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'metatext_font_style',
			array(
				'priority' => 3,
				'settings' => 'metatext_font_style',
				'section'  => 'sampression_metatext_section',
				'label'    => __( 'Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Meta Text Font Color - Setting
	$wp_customize->add_setting(
		'metatext_font_color',
		array(
			'default'           => '#' . $defaults['metatext_font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'metatext_font_color',
			array(
				'label'    => __( 'Link Color', 'naya-lite' ),
				'section'  => 'sampression_metatext_section',
				'settings' => 'metatext_font_color',
				'priority' => 4,
			)
		)
	);

	// Meta Text Link Color - Setting
	$wp_customize->add_setting(
		'metatext_link_color',
		array(
			'default'           => '#' . $defaults['metatext_link_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'metatext_link_color',
			array(
				'label'    => __( 'Link Color: Hover', 'naya-lite' ),
				'section'  => 'sampression_metatext_section',
				'settings' => 'metatext_link_color',
				'priority' => 5,
			)
		)
	);

	// Widget Text - Section
	$wp_customize->add_section(
		'sampression_widgetText_section',
		array(
			'title'    => __( 'General Widget', 'naya-lite' ),
			'priority' => 5,
			'panel'    => 'sampression_typography_panel',
		)
	);

	// widget heading label
	$wp_customize->add_setting(
		'widgetText_heading_label',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'widgetText_heading_label',
		array(
			'priority' => 1,
			'section'  => 'sampression_widgetText_section',
			'settings' => 'widgetText_heading_label',
			'label'    => __( 'Widget Heading', 'naya-lite' ),
			'type'     => 'hidden',
		)
	);

	// widget heading font family
	$wp_customize->add_setting(
		'widgetText_heading_font_family',
		array(
			'default'           => $defaults['widgetText_heading_font_family'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'widgetText_heading_font_family',
		array(
			'type'     => 'select',
			'priority' => 2,
			'section'  => 'sampression_widgetText_section',
			'choices'  => sampression_fonts(),
			'settings' => 'widgetText_heading_font_family',
			'label'    => __( 'Font Family', 'naya-lite' ),
		)
	);

	// widget heading font size
	$wp_customize->add_setting(
		'widgetText_heading_font_size',
		array(
			'default'           => $defaults['widgetText_heading_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'widgetText_heading_font_size',
		array(
			'type'        => 'range',
			'priority'    => 3,
			'settings'    => 'widgetText_heading_font_size',
			'section'     => 'sampression_widgetText_section',
			'label'       => __( 'Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 25,
				'step' => 1,
			),
		)
	);

	// widget heading font style
	$wp_customize->add_setting(
		'widgetText_heading_font_style',
		array(
			'default'           => $defaults['widgetText_heading_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);

	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'widgetText_heading_font_style',
			array(
				'priority' => 4,
				'settings' => 'widgetText_heading_font_style',
				'section'  => 'sampression_widgetText_section',
				'label'    => __( 'Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// widget heading color
	$wp_customize->add_setting(
		'widgetText_heading_font_color',
		array(
			'default'           => '#' . $defaults['widgetText_heading_font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widgetText_heading_font_color',
			array(
				'label'    => __( 'Font Color', 'naya-lite' ),
				'section'  => 'sampression_widgetText_section',
				'settings' => 'widgetText_heading_font_color',
				'priority' => 5,
			)
		)
	);

	// Widget Text label
	$wp_customize->add_setting(
		'widgetText_label',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'widgetText_label',
		array(
			'priority' => 6,
			'section'  => 'sampression_widgetText_section',
			'settings' => 'widgetText_label',
			'label'    => __( 'Widget Text', 'naya-lite' ),
			'type'     => 'hidden',
		)
	);

	// Widget Text Font Family - Setting
	$wp_customize->add_setting(
		'widgetText_font_family',
		array(
			'default'           => $defaults['widgetText_font_family'],
			'sanitize_callback' => 'sampression_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'widgetText_font_family',
		array(
			'type'     => 'select',
			'priority' => 7,
			'section'  => 'sampression_widgetText_section',
			'choices'  => sampression_fonts(),
			'settings' => 'widgetText_font_family',
			'label'    => __( 'Font Family', 'naya-lite' ),
		)
	);

	// Widget Text Font Size  - Setting
	$wp_customize->add_setting(
		'widgetText_font_size',
		array(
			'default'           => 14,
			'default'           => $defaults['widgetText_font_size'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'widgetText_font_size',
		array(
			'type'        => 'range',
			'priority'    => 8,
			'settings'    => 'widgetText_font_size',
			'section'     => 'sampression_widgetText_section',
			'label'       => __( 'Font Size', 'naya-lite' ),
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 22,
				'step' => 1,
			),
		)
	);

	// Widget Text Font Style - Setting
	$wp_customize->add_setting(
		'widgetText_font_style',
		array(
			'default'           => $defaults['widgetText_font_style'],
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
		)
	);

	$wp_customize->add_control(
		new Sampression_Checkboxes_Control(
			$wp_customize,
			'widgetText_font_style',
			array(
				'priority' => 9,
				'settings' => 'widgetText_font_style',
				'section'  => 'sampression_widgetText_section',
				'label'    => __( 'Font Style', 'naya-lite' ),
				'choices'  => sampression_get_font_style_options(),
			)
		)
	);

	// Widget Text Font Color - Setting
	$wp_customize->add_setting(
		'widgetText_font_color',
		array(
			'default'           => '#' . $defaults['widgetText_font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widgetText_font_color',
			array(
				'label'    => __( 'Font Color', 'naya-lite' ),
				'section'  => 'sampression_widgetText_section',
				'settings' => 'widgetText_font_color',
				'priority' => 10,
			)
		)
	);

	// Widget Text Link Color - Setting
	$wp_customize->add_setting(
		'widgetText_link_color',
		array(
			'default'           => '#' . $defaults['widgetText_link_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widgetText_link_color',
			array(
				'label'    => __( 'Link Color', 'naya-lite' ),
				'section'  => 'sampression_widgetText_section',
				'settings' => 'widgetText_link_color',
				'priority' => 11,
			)
		)
	);

	// Widget Text Link hover color
	$wp_customize->add_setting(
		'widgetText_hover_color',
		array(
			'default'           => '#' . $defaults['widgetText_hover_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widgetText_hover_color',
			array(
				'label'    => __( 'Link Color: Hover', 'naya-lite' ),
				'section'  => 'sampression_widgetText_section',
				'settings' => 'widgetText_hover_color',
				'priority' => 12,
			)
		)
	);
}

add_action( 'customize_register', 'sampression_customize_register_typography' );
