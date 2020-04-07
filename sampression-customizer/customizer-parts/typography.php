<?php
/**
 * Typography Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
function sampression_customize_register_typography( $wp_customize ) {

	//get default values
	$defaults = sampression_get_default_options_value();

	//Typography - Panel
	$wp_customize->add_panel('sampression_typography_panel', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => __('Typography','naya-lite'),
		'description' => __('Description of what this panel does.','naya-lite'),
	));

	// website Text - Section
	$wp_customize->add_section('sampression_title_tag_section',
		array(
			'title' => __('Site Title/Tagline','naya-lite'),
			'priority' => 1,
			'panel' => 'sampression_typography_panel',
		)
	);


	//website title and tags font setting
	//migration code
	if(get_theme_mod('webtitle_font_family') == '' && sampression_options_theme_option("web_title_font") != '') {
		$webtitle_font_family = sampression_options_theme_option("web_title_font");
	} else {
		$webtitle_font_family = $defaults['font'];
	}
	//migration code end
	$wp_customize->add_setting('webtitle_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $webtitle_font_family,
		)
	);
	$wp_customize->add_control('webtitle_font_family',
		array(
			'type' => 'select',
			'priority' => 1,
			'description' => __('Select your desired font for Site Title.','naya-lite'),
			'section' => 'sampression_title_tag_section',
			'choices' => sampression_fonts(),
			'settings' => 'webtitle_font_family',
			'label' => 'Site Font Family',
			'sanitize_callback' => 'sampression_sanitize_fonts'
		));

	// Website Title Font Size  - Setting

	//migration code
	if(get_theme_mod('webtitle_font_size') == '' && sampression_options_theme_option("web_title_size") != '') {
		$webtitle_font_size = sampression_options_theme_option("web_title_size");
	} else {
		$webtitle_font_size = $defaults['font_size_large'];
	}
	//migration code end
	$wp_customize->add_setting('webtitle_font_size',
		array(
			'default' => $webtitle_font_size,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control('webtitle_font_size',
		array(
			'type' => 'range',
			'priority' => 2,
			'settings' => 'webtitle_font_size',
			'section' => 'sampression_title_tag_section',
			'label' => 'Site Title Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 72,
				'step' => 1,
			),
		)
	);

	// Title Font Style - Setting
	//migration code
	if(get_theme_mod('webtitle_font_style') == '' && sampression_options_theme_option("web_title_style") != '') {
		$webtitle_font_size = sampression_options_theme_option("webtitle_font_style");
	} else {
		$webtitle_font_size = $defaults['font_style'];
	}
	//migration code end
	$wp_customize->add_setting('webtitle_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => '',
			//'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'webtitle_font_style',
			array(
				'priority' => 3,
				'settings' => 'webtitle_font_style',
				'section' => 'sampression_title_tag_section',
				'label' => 'Site Title Font Style',
				'choices' => font_style()
			))
	);

	// Title Font Color - Setting
	//migration code
	if(get_theme_mod('webtitle_font_color') == '' && sampression_options_theme_option("web_title_color") != '') {
		$webtitle_font_color = sampression_options_theme_option("webtitle_font_color");
	} else {
		$webtitle_font_color = $defaults['font_color'];
	}
	//migration code end
	$wp_customize->add_setting('webtitle_font_color', array(
		'default' => $webtitle_font_color,
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'webtitle_font_color', array(
		'label' => __('Title Font Color','naya-lite'),
		'section' => 'sampression_title_tag_section',
		'settings' => 'webtitle_font_color',
		'priority' => 4
	)));

	// Website Tagline Font Family - Setting
	//migration code
	if(get_theme_mod('webtagline_font_family') == '' && sampression_options_theme_option("web_desc_font") != '') {
		$webtagline_font_family = sampression_options_theme_option("web_desc_font");
	} else {
		$webtagline_font_family = $defaults['font'];
	}
	//migration code end
	$wp_customize->add_setting('webtagline_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $webtagline_font_family,
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control('webtagline_font_family',
		array(
			'type' => 'select',
			'priority' => 5,
			'section' => 'sampression_title_tag_section',
			'choices' => sampression_fonts(),
			'settings' => 'webtagline_font_family',
			'label' => ' Tagline Font Family'
		));

	// Website Tagline Font Size  - Setting
	//migration code
	if(get_theme_mod('webtagline_font_size') == '' && sampression_options_theme_option("web_desc_size") != '') {
		$webtagline_font_size = sampression_options_theme_option("web_desc_size");
	} else {
		$webtagline_font_size = $defaults['font_size'];
	}
	//migration code end
	$wp_customize->add_setting('webtagline_font_size',
		array(
			'default' => $webtagline_font_size,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('webtagline_font_size',
		array(
			'type' => 'range',
			'priority' => 6,
			'settings' => 'webtagline_font_size',
			'section' => 'sampression_title_tag_section',
			'label' => ' Tagline Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 32,
				'step' => 1,
			),
		)
	);

	// Website Tagline Font Style - Setting
	//migration code
	if(get_theme_mod('webtagline_font_style') == '' && sampression_options_theme_option("web_desc_style") != '') {
		$webtagline_font_style = sampression_options_theme_option("web_desc_style");
	} else {
		$webtagline_font_style = $defaults['font_style'];
	}
	//migration code end
	$wp_customize->add_setting('webtagline_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $webtagline_font_style,//italic,underline
			//'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'webtagline_font_style',
			array(
				'priority' => 7,
				'settings' => 'webtagline_font_style',
				'section' => 'sampression_title_tag_section',
				'label' => ' Tagline Font Style',
				'choices' => font_style()
			))
	);

	// Website Tagline Font Color - Setting
	//migration code
	if(get_theme_mod('webtagline_font_color') == '' && sampression_options_theme_option("web_desc_color") != '') {
		$webtagline_font_color = sampression_options_theme_option("web_desc_color");
	} else {
		$webtagline_font_color = $defaults['font_color'];
	}
	//migration code end
	$wp_customize->add_setting('webtagline_font_color', array(
		'default' => $webtagline_font_color,
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'webtagline_font_color', array(
		'label' => __('Tagline Font Color','naya-lite'),
		'section' => 'sampression_title_tag_section',
		'settings' => 'webtagline_font_color',
		'priority' => 8
	)));


	// Header Text Font Family - Setting
	//migration code
	if(get_theme_mod('title_font') == '' && sampression_options_theme_option("post_title_font_family") != '') {
		$title_font = sampression_options_theme_option("post_title_font_family");
	} else {
		$title_font = $defaults['font'];
	}
	//migration code end
	$wp_customize->add_setting('title_font',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $title_font,
			//'transport' => 'postMessage'
			'sanitize_callback' => 'sampression_sanitize_fonts'
		)
	);

	$wp_customize->add_control('title_font',
		array(
			'type' => 'select',
			'priority' => 1,
			'section' => 'sampression_headertext_section',
			'choices' => sampression_fonts(),
			'settings' => 'title_font',
			'label' => 'Font Family'
		));

	// Header Text - Section
	$wp_customize->add_section('sampression_headertext_section',
		array(
			'title' => __('Header Text','naya-lite'),
			'priority' => 2,
			'panel' => 'sampression_typography_panel',
		)
	);


	// Header Text Font Size  - Setting
	//migration code
	if(get_theme_mod('headertext_font_size') == '' && sampression_options_theme_option("post_title_font_size") != '') {
		$headertext_font_size = sampression_options_theme_option("post_title_font_size");
	} else {
		$headertext_font_size = $defaults['font_size_large'];
	}
	//migration code end
	$wp_customize->add_setting('headertext_font_size',
		array(
			'default' => $headertext_font_size,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('headertext_font_size',
		array(
			'type' => 'range',
			'priority' => 2,
			'settings' => 'headertext_font_size',
			'section' => 'sampression_headertext_section',
			'label' => 'Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 36,
				'step' => 1,
			),
		)
	);

	// Header Text Font Style - Setting
	$wp_customize->add_setting('headertext_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $defaults['font_style'],//italic,underline
			//'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'headertext_font_style',
			array(
				'priority' => 3,
				'settings' => 'headertext_font_style',
				'section' => 'sampression_headertext_section',
				'label' => 'Font Style',
				'choices' => font_style()
			))
	);

	// Header Text Font Color - Setting
	$wp_customize->add_setting('title_textcolor', array(
		'default' => $defaults['font_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'title_textcolor', array(
		'label' => __('Font Color','naya-lite'),
		'section' => 'sampression_headertext_section',
		'settings' => 'title_textcolor',
		'priority' => 4
	)));

	// Header Text Link Color - Setting
	$wp_customize->add_setting('headertext_link_color', array(
		'default' => $defaults['link_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'headertext_link_color', array(
		'label' => __('Font Color : Hover','naya-lite'),
		'section' => 'sampression_headertext_section',
		'settings' => 'headertext_link_color',
		'priority' => 5
	)));

	// Body Text - Section
	$wp_customize->add_section('sampression_bodytext_section',
		array(
			'title' => __('Body Text','naya-lite'),
			'priority' => 1,
			'panel' => 'sampression_typography_panel',
		)
	);

	// Body Text Font Family - Setting


	//migration code
	if(get_theme_mod('body_font') == '' && sampression_options_theme_option("body_font_family") != '') {
		$body_font_family = sampression_options_theme_option("body_font_family");
	} else {
		$body_font_family = $defaults['font'];
	}
	//migration code end
	$wp_customize->add_setting('body_font',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $body_font_family,
			//'transport' => 'postMessage'
			'sanitize_callback' => 'sampression_sanitize_fonts'
		)
	);

	$wp_customize->add_control('body_font',
		array(
			'type' => 'select',
			'priority' => 1,
			'section' => 'sampression_bodytext_section',
			'choices' => sampression_fonts(),
			'settings' => 'body_font',
			'label' => 'Font Family'
		));

	// Body Text Font Size  - Setting
	//migration code
	if(get_theme_mod('bodytext_font_size') == '' && sampression_options_theme_option("body_font_size") != '') {
		$body_font_size = sampression_options_theme_option("body_font_family");
	} else {
		$body_font_size = $defaults['font_size'];
	}
	//migration code end
	$wp_customize->add_setting('bodytext_font_size',
		array(
			'default' => $body_font_size,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('bodytext_font_size',
		array(
			'type' => 'range',
			'priority' => 2,
			'settings' => 'bodytext_font_size',
			'section' => 'sampression_bodytext_section',
			'label' => 'Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 22,
				'step' => 1,
			),
		)
	);

	// Body Text Font Style - Setting
	$wp_customize->add_setting('bodytext_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $defaults['font_style'],//italic,underline
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'bodytext_font_style',
			array(
				'priority' => 3,
				'settings' => 'bodytext_font_style',
				'section' => 'sampression_bodytext_section',
				'label' => 'Font Style',
				'choices' => font_style()
			))
	);

	// Body Text Font Color - Setting
	$wp_customize->add_setting('body_textcolor', array(
		'default' => $defaults['font_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_textcolor', array(
		'label' => __('Font Color', 'naya-lite'),
		'section' => 'sampression_bodytext_section',
		'settings' => 'body_textcolor',
		'priority' => 4
	)));

	// Body Text Link Color - Setting

	$wp_customize->add_setting('body_link_color', array(
		'default' => $defaults['link_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_link_color', array(
		'label' => __('Link Color', 'naya-lite'),
		'section' => 'sampression_bodytext_section',
		'settings' => 'body_link_color',
		'priority' => 5
	)));


	// Meta Text - Section
	$wp_customize->add_section('sampression_metatext_section',
		array(
			'title' => __('Meta Text', 'naya-lite'),
			'priority' => 4,
			'panel' => 'sampression_typography_panel',
		)
	);

	// Meta Text Font Family - Setting
	//migration code
	if(get_theme_mod('metatext_font_family') == '' && sampression_options_theme_option("meta_font_family") != '') {
		$meta_font_family = sampression_options_theme_option("meta_font_family");
	} else {
		$meta_font_family = $defaults['font'];
	}
	//migration code end
	$wp_customize->add_setting('metatext_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $meta_font_family,
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control('metatext_font_family',
		array(
			'type' => 'select',
			'priority' => 1,
			'section' => 'sampression_metatext_section',
			'choices' => sampression_fonts(),
			'settings' => 'metatext_font_family',
			'label' => 'Font Family'
		));

	// Meta Text Font Size  - Setting
	//migration code
	if(get_theme_mod('metatext_font_size') == '' && sampression_options_theme_option("meta_font_size") != '') {
		$meta_font_size = sampression_options_theme_option("meta_font_size");
	} else {
		$meta_font_size = $defaults['font_size'];
	}
	//migration code end
	$wp_customize->add_setting('metatext_font_size',
		array(
			'default' => $meta_font_size,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('metatext_font_size',
		array(
			'type' => 'range',
			'priority' => 2,
			'settings' => 'metatext_font_size',
			'section' => 'sampression_metatext_section',
			'label' => 'Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 22,
				'step' => 1,
			),
		)
	);

	// Meta Text Font Style - Setting
	$wp_customize->add_setting('metatext_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $defaults['font_style'],//italic,underline
			//'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'metatext_font_style',
			array(
				'priority' => 3,
				'settings' => 'metatext_font_style',
				'section' => 'sampression_metatext_section',
				'label' => 'Font Style',
				'choices' => font_style()
			))
	);

	// Meta Text Font Color - Setting
	$wp_customize->add_setting('metatext_font_color', array(
		'default' => $defaults['font_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'metatext_font_color', array(
		'label' => __('Link Color', 'naya-lite'),
		'section' => 'sampression_metatext_section',
		'settings' => 'metatext_font_color',
		'priority' => 4
	)));

	// Meta Text Link Color - Setting
	$wp_customize->add_setting('metatext_link_color', array(
		'default' => $defaults['link_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'metatext_link_color', array(
		'label' => __('Link Color: Hover', 'naya-lite'),
		'section' => 'sampression_metatext_section',
		'settings' => 'metatext_link_color',
		'priority' => 5
	)));

	// Widget Text - Section
	$wp_customize->add_section('sampression_widgetText_section',
		array(
			'title' => __('General Widget', 'naya-lite'),
			'priority' => 5,
			'panel' => 'sampression_typography_panel',
		)
	);

	//widget heading label
	$wp_customize->add_setting('widgetText_heading_label',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
		)
	);
	$wp_customize->add_control('widgetText_heading_label',
		array(
			'priority' => 1,
			'section' => 'sampression_widgetText_section',
			'settings' => 'widgetText_heading_label',
			'label' => 'Widget Heading',
			'type' => 'hidden'
		));

	//widget heading font family

	$wp_customize->add_setting('widgetText_heading_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $defaults['font'],
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control('widgetText_heading_font_family',
		array(
			'type' => 'select',
			'priority' => 2,
			'section' => 'sampression_widgetText_section',
			'choices' => sampression_fonts(),
			'settings' => 'widgetText_heading_font_family',
			'label' => 'Font Family'
		));

	//widget heading font size

	$wp_customize->add_setting('widgetText_heading_font_size',
		array(
			'default' => $defaults['font_size_large'],
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('widgetText_heading_font_size',
		array(
			'type' => 'range',
			'priority' => 3,
			'settings' => 'widgetText_heading_font_size',
			'section' => 'sampression_widgetText_section',
			'label' => 'Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 25,
				'step' => 1,
			),
		)
	);

	//widget heading font style
	$wp_customize->add_setting('widgetText_heading_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $defaults['font_style'],//italic,underline
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'widgetText_heading_font_style',
			array(
				'priority' => 4,
				'settings' => 'widgetText_heading_font_style',
				'section' => 'sampression_widgetText_section',
				'label' => 'Font Style',
				'choices' => font_style()
			))
	);

	// widget heading color

	$wp_customize->add_setting('widgetText_heading_font_color',
		array(
			'default' => $defaults['font_color'],
			'sanitize_callback' => 'sanitize_hex_color_no_hash',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'widgetText_heading_font_color', array(
		'label' => __('Font Color', 'naya-lite'),
		'section' => 'sampression_widgetText_section',
		'settings' => 'widgetText_heading_font_color',
		'priority' => 5
	)));

	//Widget Text label
	$wp_customize->add_setting('widgetText_label',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
		)
	);

	$wp_customize->add_control('widgetText_label',
		array(
			'priority' => 6,
			'section' => 'sampression_widgetText_section',
			'settings' => 'widgetText_label',
			'label' => 'Widget Text',
			'type' => 'hidden'
		));

	// Widget Text Font Family - Setting
	$wp_customize->add_setting('widgetText_font_family',
		array(
			'sanitize_callback' => 'sampression_sanitize_fonts',
			'default' => $defaults['font'],
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control('widgetText_font_family',
		array(
			'type' => 'select',
			'priority' => 7,
			'section' => 'sampression_widgetText_section',
			'choices' => sampression_fonts(),
			'settings' => 'widgetText_font_family',
			'label' => 'Font Family'
		));

	// Widget Text Font Size  - Setting
	$wp_customize->add_setting('widgetText_font_size',
		array(
			'default' => 14,
			//'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('widgetText_font_size',
		array(
			'type' => 'range',
			'priority' => 8,
			'settings' => 'widgetText_font_size',
			'section' => 'sampression_widgetText_section',
			'label' => 'Font Size',
			'input_attrs' => array(
				'min' => 12,
				'max' => 22,
				'step' => 1,
			),
		)
	);

	// Widget Text Font Style - Setting
	$wp_customize->add_setting('widgetText_font_style',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default' => $defaults['font_style'],//italic,underline
			//'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'widgetText_font_style',
			array(
				'priority' => 9,
				'settings' => 'widgetText_font_style',
				'section' => 'sampression_widgetText_section',
				'label' => 'Font Style',
				'choices' => font_style()
			))
	);

	// Widget Text Font Color - Setting
	$wp_customize->add_setting('widgetText_font_color', array(
		'default' => $defaults['font_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'widgetText_font_color', array(
		'label' => __('Font Color', 'naya-lite'),
		'section' => 'sampression_widgetText_section',
		'settings' => 'widgetText_font_color',
		'priority' => 10
	)));

	// Widget Text Link Color - Setting
	$wp_customize->add_setting('widgetText_link_color', array(
		'default' => $defaults['link_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'widgetText_link_color', array(
		'label' => __('Link Color', 'naya-lite'),
		'section' => 'sampression_widgetText_section',
		'settings' => 'widgetText_link_color',
		'priority' => 11
	)));

	// Widget Text Link hover color
	$wp_customize->add_setting('widgetText_hover_color', array(
		'default' => $defaults['hover_color'],
		'sanitize_callback' => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		//'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'widgetText_hover_color', array(
		'label' => __('Link Color: Hover', 'naya-lite'),
		'section' => 'sampression_widgetText_section',
		'settings' => 'widgetText_hover_color',
		'priority' => 12
	)));
	//end

}
add_action( 'customize_register', 'sampression_customize_register_typography' );
