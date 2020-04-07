<?php
/**
 * Blog Options
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 **/
//get default values 
$defaults = sampression_get_default_options_value();
 function sampression_customize_register_blog( $wp_customize ) {
     //migration code
    //var_dump(get_option( 'sampression_theme_options'));
        $metas= array();
        $date = (sampression_options_theme_option('show_meta_date')=="yes") ? 'date':'';
        $author = (sampression_options_theme_option('show_meta_author')=="yes") ? 'author':'';
        $categories = (sampression_options_theme_option('show_meta_categories')=="yes") ? 'categories':'';
        $tags = (sampression_options_theme_option('show_meta_tags')=="yes") ? 'tags':'';
        $icon = (sampression_options_theme_option('show_meta_icon')=="yes") ? 'icon':'';
        array_push($metas,$date,$author,$categories,$tags,$icon);
        $c_array = array_filter($metas);
        if(empty($c_array)){
            $metas = array(
                'date' => 'Date',
                'author' => 'Author',
                'categories' => 'Categories',
            );
        }
        
 // Blog - Section
        $wp_customize->add_section('sampression_blog_section',
            array(
                'title' => __('Blog', 'naya-lite'),
                'priority' => 60,
            )
        );

        // Show Post Meta - Setting
       
        $wp_customize->add_setting('hide_post_metas',
            array(
                'sanitize_callback' => 'sampression_sanitize_checkboxes',
                'default'=>$metas,
                //'transport' => 'postMessage'
                //'sanitize_callback' => 'sampression_sanitize_checkbox'
            )
        );

        $wp_customize->add_control(new Sampression_Checkboxes_Control($wp_customize, 'hide_post_metas',
                array(
                    'priority' => 1,
                    'settings' => 'hide_post_metas',
                    'section' => 'sampression_blog_section',
                    'label' => 'Hide Post Meta',
                   
                    'choices' => array(
                        'date' => 'Date',
                        'author' => 'Author',
                        'categories' => 'Categories',
                        'tags' => 'Tags',
                        //'comment-count' => 'Comment ',
                    )
                ))
        );


}
add_action( 'customize_register', 'sampression_customize_register_blog' );