<?php
/**
 * Default theme options
 *
 * @package Naya_Lite
 */

/**
 * Get default theme options.
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function sampression_get_default_options_value() {
	$defaults = array();

	// Header.
	$defaults['sampression_remove_logo']    = true; // Show Site Title?
	$defaults['sampression_remove_tagline'] = false; // Remove Tagline?

	// Footer.
	$defaults['sampression_copyright_text'] = '';

	// Sidebar.
	$defaults['sampression_sidebar_layout'] = 'right';

	// Social.
	$defaults['sampression_socials_facebook']   = '';
	$defaults['sampression_socials_twitter']    = '';
	$defaults['sampression_socials_youtube']    = '';
	$defaults['sampression_socials_googleplus'] = '';
	$defaults['sampression_socials_linkedin']   = '';
	$defaults['sampression_socials_flickr']     = '';
	$defaults['sampression_socials_vimeo']      = '';
	$defaults['sampression_socials_github']     = '';
	$defaults['sampression_socials_instagram']  = '';
	$defaults['sampression_socials_tumblr']     = '';
	$defaults['sampression_socials_pinterest']  = '';

	// Fonts.
	$defaults['primary_font_family']   = 'Kreon';
	$defaults['secondary_font_family'] = 'Kreon';

	// Color Options.
	$defaults['primary_color']   = '#000000';
	$defaults['secondary_color'] = '#333333';

	return $defaults;
}
