<?php

function sampression_get_font_style_options() {
	return array(
		'bold'      => __( 'Bold' ),
		'italic'    => __( 'Italic' ),
		'all-caps'  => __( 'All Caps' ),
		'underline' => __( 'Underline' ),
	);
}

function sampression_get_font_family( $family ) {
	if ( strpos( $family, '=' ) !== false ) {
		$family = explode( '=', $family );

		$character = $family[1];

		$font = explode( ':', $family[0] );
		$font = str_replace( '+', ' ', $font[0] );

		if ( $character != '' ) {
			return "'$font', " . $character;
		} else {
			return $font;
		}
	} else {
		$font = $family;
		return $font;
	}
}

function sampression_font_style( $style ) {
	$webtitle = '';

	$style = (array) $style;

	if ( in_array( 'bold', $style ) ) {
		$webtitle .= 'font-weight: bold;';
	} else {
		$webtitle .= 'font-weight: normal;';
	}
	if ( in_array( 'italic', $style ) ) {
		$webtitle .= 'font-style: italic;';
	} else {
		$webtitle .= 'font-style: normal;';
	}
	if ( in_array( 'all-caps', $style ) ) {
		$webtitle .= 'text-transform: uppercase;';
	} else {
		$webtitle .= 'text-transform: none;';
	}
	if ( in_array( 'underline', $style ) ) {
		$webtitle .= 'text-decoration: underline;';
	} else {
		$webtitle .= 'text-decoration: none;';
	}

	return $webtitle;
}
