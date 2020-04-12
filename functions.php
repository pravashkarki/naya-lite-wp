<?php
/**
 * Theme functions and definitions
 *
 * @package naya_lite
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function naya_lite_setup() {
	/**
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'naya-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Sampression Uses uses wp_nav_menu() in below assigned locations
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'naya-lite' ),
		)
	);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/**
	 * Enable support for Post Formats.
	 */
	add_theme_support(
		'post-formats',
		array(
			'image',
			'gallery',
			'video',
			'quote',
			'link',
			'status',
			'audio',
			'chat',
		)
	);

	/**
	 * Set up the WordPress core custom background feature.
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'F3F7F6',
			'default-image' => '',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'width'         => 220,
			'height'        => 120,
			'flex-height'   => true,
			'default-image' => '',
		)
	);
}

add_action( 'after_setup_theme', 'naya_lite_setup' );

/**
 * Enqueue scripts and styles.
 */
function naya_lite_scripts() {
	$fonts_url = naya_lite_fonts_url();

	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'naya-lite-google-fonts', $fonts_url );
	}

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/css/font-awesome.css' );
	wp_enqueue_style( 'font', get_template_directory_uri() . '/lib/css/fonts-sampression.css' );
	wp_enqueue_style( 'base', get_template_directory_uri() . '/lib/css/base-960.css' );
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/lib/css/superfish.css' );

	wp_enqueue_style( 'naya-lite-style', get_stylesheet_uri() );
    wp_enqueue_style( 'mediaq', get_template_directory_uri() . '/lib/css/mediaquery.css' );

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

// Load files.
require get_template_directory() . '/sampression-customizer/customizer.php';
require get_template_directory() . '/sampression-customizer/theme-functions.php';
require get_template_directory() . '/sampression-customizer/theme-hooks.php';
require get_template_directory() . '/inc/custom.php';
require get_template_directory() . '/inc/theme-page.php';
