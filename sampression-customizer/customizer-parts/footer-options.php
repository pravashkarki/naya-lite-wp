<?php
/**
 * Footer Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */
 
 function sampression_customize_register_footer( $wp_customize ) {
    //get default values 
        $defaults = sampression_get_default_options_value();
    
    /** Footer Settings */
        $wp_customize->add_section('footer_options',
            array(
                'title' => __('Footer Options', 'naya-lite'),
                'priority' => 160,
                //'panel' => 'sampression_general_setting_panel'
            )
        );
         // Copyright Text - Setting
        $wp_customize->add_setting('sampression_copyright_text', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control('sampression_copyright_text',
            array(
                'label' => __('Copyright Text', 'naya-lite'),
                'section' => 'footer_options',
                'priority' => 63,
                'type' => 'textarea'
            )
        );

        // Remove Copyright Text - Setting
        $wp_customize->add_setting('sampression_remove_copyright_text', array('sanitize_callback' => 'sampression_sanitize_checkbox'));
        $wp_customize->add_control('sampression_remove_copyright_text',
            array(
                'label' => __('Remove Copyright Text?', 'naya-lite'),
                'section' => 'footer_options',
                'priority' => 64,
                'type' => 'checkbox'
            )
        );
       

    /** Footer Settings Ends */
    
 }
 add_action( 'customize_register', 'sampression_customize_register_footer' );