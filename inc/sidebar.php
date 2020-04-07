<?php
if ( ! defined('ABSPATH')) exit('restricted access');

add_action( 'widgets_init', 'sampression_register_sidebars' );

function sampression_register_sidebars() {

	if ( ! current_theme_supports( 'sampression-sidebars' ) )
		return;

	$sidebars = get_theme_support( 'sampression-sidebars' );

    // Register supported menus
	foreach ( (array) $sidebars[0] as $id => $name ) {
            //sam_p($name);
            // in place of col
            //1 = sixteen
            //2 = eight
            //3 = one-third
            //4 = four
            $col = '';
            if($name['column'] === '1 Column') {
                $col = 'sixteen';
            } elseif($name['column'] === '2 Columns') {
                $col = 'eight';
            } elseif($name['column'] === '3 Columns') {
                $col = 'one-third';
            } elseif($name['column'] === '4 Columns') {
                $col = 'four';
            }
		register_sidebar(array(
			'id'            => $id,
			'name'          => $name['name'],
			'description'   => $name['desc'],
			'before_widget' => '<div id="%1$s" class="widget clearfix '.$col.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}      
        
}