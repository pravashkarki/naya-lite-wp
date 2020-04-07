<?php
/**
 * Theme Info
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */

if ( ! function_exists( 'sampression_add_info_customizer' ) ) {
	function sampression_add_info_customizer( $wp_customize ) {

			//get default values 
            $defaults = sampression_get_default_options_value();

			/*----------------------------
				Theme Option Panel
			-----------------------------*/

			  // Theme important links started
			   class sampression_Important_Links extends WP_Customize_Control {

			      public $type = "sampression-important-links";

			      public function render_content() {
			         //Add Theme instruction, Support Forum, Demo Link, Rating Link
			         $important_links = array(
			            'theme-info' => array(
			               'link' => esc_url('https://www.sampression.com/themes/naya-lite/'),
			               'text' => esc_html__('Theme Info', 'naya-lite'),
			            ),
			            'support' => array(
			               'link' => esc_url('https://www.sampression.com/supports/'),
			               'text' => esc_html__('Support', 'naya-lite'),
			            ),
			            'documentation' => array(
			               'link' => esc_url('https://www.docs.sampression.com/category/naya-lite/'),
			               'text' => esc_html__('Documentation', 'naya-lite'),
			            ),
			            'demo' => array(
			               'link' => esc_url('https://www.demo.sampression.com/naya-lite/'),
			               'text' => esc_html__('View Live Demo', 'naya-lite'),
			            ),
			            'rating' => array(
			               'link' => esc_url('https://wordpress.org/support/theme/naya-lite/reviews/'),
			               'text' => esc_html__('Rate this Theme', 'naya-lite'),
			            ),
			         );
			         foreach ($important_links as $important_link) {
			            echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
			         }
			      }

			   }

			   $wp_customize->add_section('sampression_important_links', array(
			      'priority' => 1,
			      'title' => __('Important Links', 'naya-lite'),
			   ));

			   /**
			    * This setting has the dummy Sanitizaition function as it contains no value to be sanitized
			    */
			   $wp_customize->add_setting('sampression_important_links', array(
			      'capability' => 'edit_theme_options',
			      'sanitize_callback' => 'sampression_links_sanitize'
			   ));

			   $wp_customize->add_control(new sampression_Important_Links($wp_customize, 'important_links', array(
			      'label' => __('Important Links', 'naya-lite'),
			      'section' => 'sampression_important_links',
			      'settings' => 'sampression_important_links'
			   )));
			   // Theme Important Links Ended


	}
}
add_action( 'customize_register', 'sampression_add_info_customizer' );

