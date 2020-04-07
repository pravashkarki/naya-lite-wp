<?php 
 /**
 * Default Theme Option.
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

 
function sampression_customize_register_default( $wp_customize ) {
    
        /** Default Settings */    
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        //$wp_customize->remove_section('title_tagline');
        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('background_image');
        

        /**
         * Sampression Theme Support here
         * 
         * */


        //get default values 
        $defaults = sampression_get_default_options_value();

        // General Settings - Panel
        $wp_customize->add_panel('sampression_general_setting_panel', array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('General Settings', 'naya-lite'),
            
        ));

        // Site Title, Tagline, Site Icon - Section
        $wp_customize->add_section('title_tagline',
            array(
                'title' => __('Site Identity', 'naya-lite'),
                'priority' => 1,
                'panel' => 'sampression_general_setting_panel',
            )
        );


        //Remove Logo - Setting
        $wp_customize->add_setting('sampression_remove_logo', array('sanitize_callback' => 'sampression_sanitize_checkbox'));
        $wp_customize->add_control('sampression_remove_logo',
            array(
                'type' => 'checkbox',
                'label' => __('Show Site Title?', 'naya-lite'),
                'section' => 'title_tagline',
                'priority' => 61,
            )
        );

        //Remove Tagline - Setting
        $wp_customize->add_setting('sampression_remove_tagline', array('sanitize_callback' => 'sampression_sanitize_checkbox'));
        $wp_customize->add_control('sampression_remove_tagline',
            array(
                'type' => 'checkbox',
                'label' => __('Remove Tagline?', 'naya-lite'),
                'section' => 'title_tagline',
                'priority' => 62,
            )
        );

                // Background - Section
        $wp_customize->add_section('background_image',
            array(
                'title' => __('Background', 'naya-lite'),
                'priority' => 2,
                'panel' => 'sampression_general_setting_panel'
            )
        );

        // Background Image Cover - Setting
        $wp_customize->add_setting('sampression_background_cover', array('transport' => 'postMessage', 'sanitize_callback' => 'sampression_sanitize_checkbox'));
        $wp_customize->add_control(
            'sampression_background_cover',
            array(
                'type' => 'checkbox',
                'label' => __('Use Background As Cover', 'naya-lite'),
                'section' => 'background_image',
                'settings' => 'sampression_background_cover',
                'priority' => 10
            )
        );
        // Background Color - Setting
        $wp_customize->add_setting('background_color', array(
            'default' =>$defaults['background_color'],
            'theme_supports' => 'custom-background',
            'sanitize_callback' => 'sanitize_hex_color_no_hash',
            'sanitize_js_callback' => 'maybe_hash_hex_color',
            //'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
            'label' => __('Background Color', 'naya-lite'),
            'section' => 'background_image',
            'priority' => 1
        )));


        

        /** Add selective part pencil tool here */
        //require get_template_directory() . '/sampression-customizer/inc/selective-part.php';
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector' => '.site-title', // You can also select a css class
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
          'selector' => '#site-description', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'social_icon_color', array(
              'selector' => '.social-connect', // You can also select a css class
          ) );
         $wp_customize->selective_refresh->add_partial( 'metatext_font_family', array(
            'selector' => '.entry-meta', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'body_font', array(
              'selector' => '.entry-content', // You can also select a css class
          ) );
          $wp_customize->selective_refresh->add_partial( 'nav_menu', array(
            'selector' => '#primary-nav', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'website_layout', array(
            'selector' => '#content-wrapper', // You can also select a css class
        ) );
           $wp_customize->selective_refresh->add_partial( 'hide_post_metas', array(
            'selector' => '#post-listing', // You can also select a css class
        ) );
           $wp_customize->selective_refresh->add_partial( 'hide_post_metas', array(
            'selector' => '#content', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'footerText_heading_label', array(
            'selector' => '.footer-widget', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'sampression_copyright_text', array(
            'selector' => '.copyright', // You can also select a css class
        ) );
           $wp_customize->selective_refresh->add_partial( 'sampression_credit_text', array(
            'selector' => '.credit', // You can also select a css class
        ) );
          $wp_customize->selective_refresh->add_partial( 'widgetText_heading_label', array(
            'selector' => '.sidebar', // You can also select a css class
        ) );
    
    }
add_action( 'customize_register', 'sampression_customize_register_default' );

//addition css section
add_action( 'customize_register', 'wpse261932_change_css_title', 15 );

function wpse261932_change_css_title () {
	global $wp_customize;

	$wp_customize->get_section('custom_css')->title = __('Additional CSS', 'naya-lite');
	$wp_customize->get_section('custom_css')->description = __( '<div class="add-extra-css"></div>', 'naya-lite' );

}


