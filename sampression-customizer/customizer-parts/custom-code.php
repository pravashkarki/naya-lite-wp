<?php
/**
 * Custom code Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */
 
 function sampression_customize_register_custom_code( $wp_customize ) {

    //get default values 
        $default = '';
        
     // Custom code Section
        $wp_customize->add_section('sampression_custom_code_section', array(
            'title' => __('Custom Code', 'naya-lite'),
            'priority' => 180,
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_setting('sampression_header_code', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
            'sampression_header_code',
            array(
                'label' => __('To Insert Into Header', 'naya-lite'),
                'description' => __('Write/Paste the codes which you want to insert in Header. For eg. custom styles, scripts, etc. This will be inserted before the  &#060;/head&#062; tag in the header of the document.', 'naya-lite'),
                'section' => 'sampression_custom_code_section',
                'settings' => 'sampression_header_code',
                'type' => 'textarea',
            )
        );

        // Footer Code Setting

        $wp_customize->add_setting('sampression_footer_code', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
            'sampression_footer_code',
            array(
                'label' => __('To Insert Into Footer', 'naya-lite'),
                'description' => __('Write/Paste the codes which you want to insert in Footer. For eg. custom styles, scripts, etc. This will be inserted before the  &#060;/body&#062; tag in the footer of the document.', 'naya-lite'),
                'section' => 'sampression_custom_code_section',
                'settings' => 'sampression_footer_code',
                'type' => 'textarea',
            )
        );
    }

    

add_action( 'customize_register', 'sampression_customize_register_custom_code' );
