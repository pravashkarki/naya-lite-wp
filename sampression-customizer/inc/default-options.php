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
	$defaults['sampression_copyright_text']        = '';
	$defaults['sampression_remove_copyright_text'] = false;

	// Blog.
	$defaults['hide_post_metas'] = array();

	// Sidebar.
	$defaults['sampression_sidebar_layout'] = 'right';

	// Social.
	$defaults['social_icon_color']              = 'eeeeee';
	$defaults['use_social_default_color']       = true;
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
	// Title and tagline.
	$defaults['webtitle_font_family']   = 'Kreon';
	$defaults['webtitle_font_size']     = '42';
	$defaults['webtitle_font_style']    = array();
	$defaults['webtitle_font_color']    = '000000';
	$defaults['webtagline_font_family'] = 'Kreon';
	$defaults['webtagline_font_size']   = '14';
	$defaults['webtagline_font_style']  = array();
	$defaults['webtagline_font_color']  = '000000';

	// Header Text.
	$defaults['title_font']            = 'Kreon';
	$defaults['headertext_font_size']  = '21';
	$defaults['headertext_font_style'] = array();
	$defaults['title_textcolor']       = '000000';
	$defaults['headertext_link_color'] = '006799';

	// Body.
	$defaults['body_font']           = 'Kreon';
	$defaults['bodytext_font_size']  = '14';
	$defaults['bodytext_font_style'] = array();
	$defaults['body_textcolor']      = '000000';
	$defaults['body_link_color']     = '006799';

	// Meta.
	$defaults['metatext_font_family'] = 'Kreon';
	$defaults['metatext_font_size']   = '14';
	$defaults['metatext_font_style']  = array();
	$defaults['metatext_font_color']  = '000000';
	$defaults['metatext_link_color']  = '006799';

	// General.
	$defaults['widgetText_heading_font_family'] = 'Kreon';
	$defaults['widgetText_heading_font_size']   = '21';
	$defaults['widgetText_heading_font_style']  = array();
	$defaults['widgetText_heading_font_color']  = '000000';
	$defaults['widgetText_font_family']         = 'Kreon';
	$defaults['widgetText_font_size']           = '14';
	$defaults['widgetText_font_style']          = array();
	$defaults['widgetText_font_color']          = '000000';
	$defaults['widgetText_link_color']          = '006799';
	$defaults['widgetText_hover_color']         = '0085ba';

	return $defaults;
}
