<?php

function sampression_header_style() {
	$style = '';

	// Font Family.
	$primary_font_family   = sampression_get_font_family( sampression_get_option( 'primary_font_family' ) );
	$secondary_font_family = sampression_get_font_family( sampression_get_option( 'secondary_font_family' ) );

	$style .= sampression_generate_css( 'body,.site-title', 'font-family', wp_kses_post( $primary_font_family ) );
	$style .= sampression_generate_css( 'h1,h2,h3,h4,h5,h6', 'font-family', wp_kses_post( $secondary_font_family ) );

	// Color.
	$primary_color   = sampression_get_option( 'primary_color' );
	$secondary_color = sampression_get_option( 'secondary_color' );

	$style .= sampression_generate_css( 'body,.site-title', 'color', esc_attr( $primary_color ) );
	$style .= sampression_generate_css( 'h1,h2,h3,h4,h5,h6', 'color', esc_attr( $secondary_color ) );

	if ( ! empty( $style ) ) {
		echo '<style>';
		echo $style; // phpcs:ignore WordPress.Security.EscapeOutput
		echo '</style>';
	}
}

add_action( 'wp_head', 'sampression_header_style', 999 );

