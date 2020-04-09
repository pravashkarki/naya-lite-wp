<?php
/**
 * Custom functions
 *
 * @package Nata_Lite
 */

/**
 * Return fonts URL.
 *
 * @return string Fonts URL.
 */
function naya_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	$font_fields = array(
		'webtitle_font_family',
		'webtagline_font_family',
		'title_font',
		'body_font',
		'metatext_font_family',
		'widgetText_heading_font_family',
		'widgetText_font_family',
	);

	$theme_options = array();

	foreach ( $font_fields as $k ) {
		$theme_options[] = sampression_get_option( $k );
	}

	$theme_options = array_unique( $theme_options );

	foreach ( $theme_options as $f ) {
		$f_family = explode( '=', $f );

		$font_family = ( ! empty( $f_family[0] ) ) ? $f_family[0] : '';

		$fonts[] = $font_family;
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family'  => implode( '|', $fonts ),
				'subset'  => $subsets,
				'display' => 'swap',
			),
			'//fonts.googleapis.com/css'
		);
	}

	return esc_url_raw( $fonts_url );
}
