<?php
/**
 * Theme functions and definitions
 *
 * @package naya_lite
 */

/**
 * Enqueue scripts and styles.
 */
function naya_lite_scripts() {
	wp_enqueue_style( 'gfont-kreon', '//fonts.googleapis.com/css?family=Kreon:400,700' );
	wp_enqueue_style( 'gfont-droid', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic' );
	wp_enqueue_style( 'font', get_template_directory_uri() . '/lib/css/fonts-sampression.css' );
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/lib/css/base-960.css' );
	wp_enqueue_style( 'base', get_template_directory_uri() . '/lib/css/superfish.css' );
	wp_enqueue_style( 'mediaq', get_template_directory_uri() . '/lib/css/mediaquery.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/css/font-awesome.css' );

	wp_enqueue_style( 'naya-lite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/lib/js/plugins.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/lib/js/main.js', array( 'jquery', 'plugins' ), '1.0', true );

	wp_enqueue_script( 'naya-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'naya-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'naya_lite_scripts' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function naya_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'naya_lite_content_width', 900 );
}

add_action( 'after_setup_theme', 'naya_lite_content_width', 0 );

/**
 * Register widget area.
 */
function naya_lite_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'naya-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'naya-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'naya_lite_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load files.
require get_template_directory() . '/sampression-customizer/customizer.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/functions.php';
require get_template_directory() . '/inc/sidebar.php';
require get_template_directory() . '/inc/theme-page.php';

/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function sampression_get_option( $key ) {
	$default_options = sampression_get_default_options_value();

	$current_default_value = isset( $default_options[ $key ] ) ? $default_options[ $key ] : null;

	$value = get_theme_mod( $key );

	return ! is_null( $value ) ? $value : $current_default_value;
}
