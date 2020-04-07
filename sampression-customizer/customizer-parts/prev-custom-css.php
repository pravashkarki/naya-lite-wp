<?php
/**
 * pre custom css Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/

//get default values
$defaults = sampression_get_default_options_value();

//check previous version addition css
//if checked hide the section
$prev_css_check = get_theme_mod('sampression_remove_prev_css');
if($prev_css_check==true){
	return;
}

function sampression_customize_register_pre_custom_css( $wp_customize ) {
	//migration code
	$extra_c = get_option( 'sampression_theme_options');
	$extra_css= $extra_c['custom_css_value'];


	// Blog - Section
	$wp_customize->add_section('sampression_prev_css_section',
		array(
			'title' => __('Previous Custom CSS', 'naya-lite'),
			'priority' => 200,
		)
	);

	// Show Post Meta - Setting

	$wp_customize->add_setting('previous_version_custom_css',
		array(
			'sanitize_callback' => 'sampression_sanitize_checkboxes',
			'default'=>$extra_css,
			//'transport' => 'postMessage'
			 'sanitize_callback' => 'sampression_sanitize_text'
		)
	);

	$wp_customize->add_control('previous_version_custom_css',
		array(
			'label' => __('Previous Version Custom CSS', 'naya-lite'),
			'section' => 'sampression_prev_css_section',
			'priority' => 100,
			'type' => 'textarea'
		)
	);

	// Remove Copyright Text - Setting
	$wp_customize->add_setting('sampression_remove_prev_css', array('sanitize_callback' => 'sampression_sanitize_checkbox'));
	$wp_customize->add_control('sampression_remove_prev_css',
		array(
			'label' => __('Remove Previous CSS?', 'naya-lite'),
			'section' => 'sampression_prev_css_section',
			'description'=>'It will delete all your old custom css.Make sure you have pasted it in customizer additional css.',
			'priority' => 64,
			'type' => 'checkbox'
		)
	);

}
add_action( 'customize_register', 'sampression_customize_register_pre_custom_css' );


