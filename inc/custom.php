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

	foreach ( $theme_options as $f) {

		$f_family = explode(':', $f);

		$f_family = str_replace('+', ' ', $f_family);

		$font_family = ( !empty( $f_family[1]) ) ? $f_family[1] : '';

		$fonts[] = $f_family[0].':'.$font_family;

	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family'  => urlencode( implode( '|', $fonts ) ),
			'subset'  => urlencode( $subsets ),
			'display' => 'swap',
		), '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
