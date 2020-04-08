<?php
/**
 * Default theme options.
 *
 * @package Online_News
 */

if ( ! function_exists( 'sampression_get_default_options_value' ) ) :

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


		//font setting
		$defaults['font']                       = 'Kreon, serif';
		$defaults['font_size']                  = '14px';
		$defaults['font_size_large']            = '21px';
		$defaults['font_color']                 = '#000';
		$defaults['font_style']                 = 'normal';

		//color settings
		$defaults['social_color']               ='#eee';
		$defaults['background_color']           ='#fff';
		$defaults['hover_color']                ='#0085ba';
		$defaults['link_color']                 ='#006799';

		//checkbox setting
		$defaults['checkbox']		            = false;

		//website-layout setting
		$defaults['website_layout']		        = 'right';
		$defaults['inner_sidebar_position']		= 'right';

		//Home layout
		$defaults['home_column']		         = 1;//1,2,3
		$defaults['home_sidebar']		         = 'right';//left or right or none

		// Pass through filter.
		return $defaults;
	}

endif;
