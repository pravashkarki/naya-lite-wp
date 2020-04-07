<?php

function sampression_fonts()
{
    return $google_fonts = array(
        'Arial, sans-serif' => 'Arial',
        'Verdana, Geneva, sans-serif' => 'Verdana',
        'Playfair+Display:400,700,400italic,700italic=serif' => 'Playfair Display',
        'Work+Sans:400,700=sans-serif' => 'Work Sans',
        'Alegreya:400,400italic,700,700italic=serif' => 'Alegreya',
        'Alegreya+Sans:400,400italic,700,700italic=sans-serif' => 'Alegreya Sans',
        'Fira+Sans:400,400italic,700,700italic=sans-serif' => 'Fira Sans',
        'Droid+Sans:400,700=sans-serif' => 'Droid Sans',
        'Source+Sans+Pro:400,400italic,700,700italic=sans-serif' => 'Source Sans Pro',
        'Source+Serif+Pro:400,700=serif' => 'Source Serif Pro',
        'Lora:400,700=serif' => 'Lora',
        'Neuton:400,700=serif' => 'Neuton',
        'Poppins:400,700=sans-serif' => 'Poppins',
        'Karla:400,700=sans-serif' => 'Karla',
        'Merriweather:400,400italic,700,700italic=serif' => 'Merriweather',
        'Open+Sans:400,400italic,700,700italic=sans-serif' => 'Open Sans',
        'Roboto:400,400italic,700,700italic=sans-serif' => 'Roboto',
        'Roboto+Slab:400,700=serif' => 'Roboto Slab',
        'Lato:400,400italic,700,700italic=sans-serif' => 'Lato',
        'Droid Serif' => 'Droid Serif Normal',
        'Droid+Serif:400,400italic,700,700italic=serif' => 'Droid Serif',
        'Kreon' => 'Kreon',
        'Archivo+Narrow:400,400italic,700,700italic=sans-serif' => 'Archivo Narrow',
        'Libre+Baskerville:400,700,400italic=serif' => 'Libre Baskerville',
        'Crimson+Text:400,400italic,700,700italic=serif' => 'Crimson Text',
        'Montserrat:400,700=sans-serif' => 'Montserrat',
        'Chivo:400,400italic=sans-serif' => 'Chivo',
        'Old+Standard+TT:400,400italic,700=serif' => 'Old Standard TT',
        'Domine:400,700=serif' => 'Domine',
        'Varela+Round=sans-serif' => 'Varela Round',
        'Bitter:400,700=serif' => 'Bitter',
        'Cardo:400,700,400italic=serif' => 'Cardo',
        'Arvo:400,400italic,700,700italic=serif' => 'Arvo',
        'PT+Serif:400,400italic,700,700italic=serif' => 'PT Serif',
        'Passion+One:400,700=cursive' => 'Passion One',
        'Poiret+One=cursive' => 'Poiret One',
        'Pacifico=cursive' => 'Pacifico',
        'Georgia' => 'Georgia, serif',
        'Dancing+Script:400,700=cursive' => 'Dancing Script',
        'Kaushan+Script=cursive' => 'Kaushan Script',
        'Satisfy=cursive' => 'Satisfy',
        'Courgette=cursive' => 'Courgette',
        'Cookie=cursive' => 'Cookie',
        'Tangerine:400,700=cursive' => 'Tangerine',
        'Bad+Script=cursive' => 'Bad Script',
        'Calligraffitti=cursive' => 'Calligraffitti',
        'Sacramento=cursive' => 'Sacramento',
        'Trebuchet MS, Tahoma, sans-serif' => 'Trebuchet MS',
        'Times New Roman, serif' => 'Times New Roman',
        'Tahoma, Geneva, Verdana, sans-serif' => 'Tahoma',
        'Impact, Charcoal, sans-serif' => 'Impact',
        'Courier, Courier New, monospace' => 'Courier',
        'Century Gothic, sans-serif' => 'Century Gothic',
        'Nixie+One=cursive' => 'Nixie One',
        'Parisienne=cursive' => 'Parisienne',
        'Life+Savers:400,700=cursive' => 'Life Savers',
        'Special+Elite=cursive' => 'Special Elite',
        'Cutive=serif' => 'Cutive',
        'Cutive+Mono=serif' => 'Cutive Mono',
        'Josefin+Sans:400,400italic,700,700italic=sans-serif' => 'Josefin Sans',
        'Josefin+Slab:400,400italic,700,700italic=serif' => 'Josefin Slab',
    );
}

function font_style()
{
    return $font_style = array(
        'bold' => 'Bold',
        'italic' => 'Italic',
        'all-caps' => 'All Caps',
        'underline' => 'Underline',
    );
}


function categories_lists()
{
    foreach (get_categories() as $category) {
        $data[] = $category->slug . "=" . $category->count;
    }
    return $data_str = implode('&', $data);
}

//edit function name to remove conflict with nayalite theme option functions.
function sampression_exclude_categories_update()
{
    global $sampression_options_settings;
    $post_display = get_theme_mod('categories_post_display');
    $categories = array();
    if (is_array($post_display)) {
        parse_str($post_display[0], $categories);
    } else {
        if (!empty($sampression_options_settings['category_posts_display'])) {
            $options = $sampression_options_settings['category_posts_display'];
            parse_str($options, $categories);
        }
    }
    $cats = array();
    foreach ($categories as $slug => $count) {
        if ($count == 0) {
            $category = get_term_by('slug', $slug, 'category');
            $cats[] = $category->term_id;
        }
    }
    return $cats;
}

function check_custom_logo()
{
    global $sampression_options_settings;
    if (get_theme_mod('custom_logo') == '' && $sampression_options_settings['logo_url'] != '' && get_theme_mod('sampression_remove_logo') != 1) {
        return $sampression_options_settings['logo_url'];
    } else {
        return false;
    }
}

function sampression_filter_for_home_blog($query)
{
    global $sampression_options_settings;

    if ($query->is_home() && $query->is_main_query()) {
        $query->set('posts_per_page', -1);
        if (get_theme_mod('categories_post_display')) {
            $post_display = get_theme_mod('categories_post_display');

            $categories = array();
            if (is_array($post_display)) {
                parse_str($post_display[0], $categories);
            } else {
                if (!empty($sampression_options_settings['category_posts_display'])) {
                    $post_display = $sampression_options_settings['category_posts_display'];
                    $categories = array();
                    parse_str($post_display, $categories);
                }
            }

            $exclude_cat = array();
            $exclude_post = array();


            foreach ($categories as $slug => $count) {

                $category = get_term_by('slug', $slug, 'category');
                //echo $count . '(' . $category->count . ')';
                if ($count == 0) {
                    $exclude_cat[] = '-' . $category->term_id;
                } elseif ($count > 0) {
                    if ($category->count != $count) {
                        //echo $count;
                        $args = array(
                            'posts_per_page' => $category->count,
                            'offset' => $count,
                            'category' => $category->term_id
                        );
                        $ex_posts = get_posts($args);
                        foreach ($ex_posts as $post) {
                            $exclude_post[] = $post->ID;
                        }
                    }
                    // echo $category->count;

                }
            }

            if (sizeof($exclude_cat)) {
                $exclude_cat_string = implode(',', $exclude_cat);
                $query->set('cat', $exclude_cat_string);
            }
            if (sizeof($exclude_post)) {
                $query->set('post__not_in', $exclude_post);
            }
            //echo '<pre>';
            //print_r($categories);
            //print_r(array_unique($exclude_post));
            //print_r($exclude_post);
            //echo '</pre>';
        } else {
            if (!empty($sampression_options_settings['category_posts_display'])) {
                $post_display = $sampression_options_settings['category_posts_display'];
                $categories = array();
                parse_str($post_display, $categories);

                $exclude_cat = array();
                $exclude_post = array();

                foreach ($categories as $slug => $count) {

                    $category = get_term_by('slug', $slug, 'category');

                    if ($count == 0) {
                        $exclude_cat[] = '-' . $category->term_id;
                    } elseif ($count > 0) {
                        if ($category->count != $count) {

                            $args = array(
                                'posts_per_page' => $category->count,
                                'offset' => $count,
                                'category' => $category->term_id
                            );

                            $ex_posts = get_posts($args);

                            foreach ($ex_posts as $post) {
                                $exclude_post[] = $post->ID;
                            }
                        }
                        // echo $category->count;

                    }
                }

                if (sizeof($exclude_cat)) {
                    $exclude_cat_string = implode(',', $exclude_cat);
                    $query->set('cat', $exclude_cat_string);
                }
                if (sizeof($exclude_post)) {
                    $query->set('post__not_in', $exclude_post);
                }

            }
        }

        //$query->set( 'cat', '-1,-1347' );
    }
}

add_action('pre_get_posts', 'sampression_filter_for_home_blog');

if (!function_exists('sampression_home_layout_classes')) {

    function sampression_home_layout_classes()
    {
        $classes = array();
        $classes[] = 'columns';
        if (get_theme_mod('home_sidebar') === 'left') {
            $classes[] = 'alignright';
            $classes[] = 'nine';
        } elseif (get_theme_mod('home_sidebar') === 'right') {
            $classes[] = 'nine';
        } else {
            $classes[] = 'twelve';
        }


        echo implode(' ', $classes);
        /*
        if( get_theme_mod( 'home_columns' ) ) {
                switch ( get_theme_mod( 'home_columns' ) ) {
                    case '1':
                        $classes[] = 'twelve';
                        break;
                    case '2':
                        $classes[] = 'six';
                        break;
                    case '3':
                        $classes[] = 'four';
                        break;
                    default:
                        $classes[] = 'three';
                        break;
                }
            }
         */
    }

}

if (!function_exists('sampression_inner_layout_classes')) {

    function sampression_inner_layout_classes()
    {
        global $sampression_options_settings;
        $classes = array();
        $classes[] = 'columns';
        if (get_theme_mod('sidebar_position') === 'left' || get_theme_mod('sidebar_position') === 'right' || get_theme_mod('sidebar_position') === 'none' ||
            $sampression_options_settings['sidebar_active'] === 'left' || $sampression_options_settings['sidebar_active'] === 'right' || $sampression_options_settings['sidebar_active'] === 'none'
        ) {

            if (get_theme_mod('sidebar_position') === 'left') {
                $classes[] = 'alignright';
                $classes[] = 'nine';
            } else {
                if ($sampression_options_settings['sidebar_active'] === 'left') {
                    $classes[] = 'alignright';
                    $classes[] = 'nine';
                }
            }

            if (get_theme_mod('sidebar_position') === 'right') {
                $classes[] = 'nine';
            } else {
                if ($sampression_options_settings['sidebar_active'] === 'right') {
                    $classes[] = 'nine';
                }
            }

            if (get_theme_mod('sidebar_position') === 'none') {
                $classes[] = 'twelve';
            } else {
                if ($sampression_options_settings['sidebar_active'] === 'none') {
                    $classes[] = 'twelve';
                }
            }

        } else if (is_single()) {
            $classes[] = 'nine';
        } else if (is_page()) {
            $classes[] = 'nine';
        } else {
            $classes[] = 'twelve';
        }

        echo implode(' ', $classes);
        /*
        if( get_theme_mod( 'home_columns' ) ) {
                switch ( get_theme_mod( 'home_columns' ) ) {
                    case '1':
                        $classes[] = 'twelve';
                        break;
                    case '2':
                        $classes[] = 'six';
                        break;
                    case '3':
                        $classes[] = 'four';
                        break;
                    default:
                        $classes[] = 'three';
                        break;
                }
            }
         */
    }

}

if (!function_exists('sampression_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function sampression_setup()
    {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('naya-lite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support('post-thumbnails');

        /**
         * Sampression Uses uses wp_nav_menu() in below assigned locations
         */
//        register_nav_menus( array(
//            'top-menu' => esc_html__( 'Primary Navigation','naya-lite' ),
//            'secondary' => esc_html__( 'Secondary Navigation','naya-lite' ),
//        ) );

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /**
         * Enable support for Post Formats.
         */
        add_theme_support('post-formats', array(
            //'aside',
            'image',
            'gallery',
            'video',
            'quote',
            'link',
            'status',
            'audio',
            'chat'
        ));

        /**
         * Set up the WordPress core custom background feature.
         */
        add_theme_support('custom-background', array(
            'default-color' => 'F3F7F6',
            'default-image' => '',
            'wp-head-callback' => 'sampression_custom_background_cb'
        ));

        add_theme_support('custom-header', array(
            // Text color and image (empty to use none).
            'default-text-color' => 'FE6E41',
            'default-image' => '',

            // Set height and width, with a maximum value for the width.
            'height' => 152,
            'width' => 1200,
            'max-width' => 2000,

            // Support flexible height and width.
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => false
        ));

        add_theme_support('custom-logo', array(
            'height' => 120,
            'width' => 220,
            'flex-height' => true,
            'default-image' => '',
        ));
    }

endif;
add_action('after_setup_theme', 'sampression_setup');

/**
 * Sampression theme background image css callback
 */
if (!function_exists('sampression_custom_background_cb')):

    function sampression_custom_background_cb()
    {
        $background = get_background_image();
        $color = get_background_color();

        if (!$background && !$color)
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', 'repeat');

            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';

            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', 'left');

            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';

            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', 'scroll');

            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';

            $attachment = " background-attachment: $attachment;";

            $cover = '';
            if (get_theme_mod('sampression_background_cover')) {
                $cover = ' background-size: cover;';
            }

            $style .= $image . $repeat . $position . $attachment . $cover;
        }
        ?>
        <style type="text/css">
            #content-wrapper, body {
            <?php echo trim( $style ); ?>
            }
        </style>
        <?php
    }

endif;

function sampression_font_family($family)
{
    if (strpos($family, '=') !== false) {
        $family = explode('=', $family);
        //print_r($family);
        $character = $family[1];
        $font = explode(':', $family[0]);
        $font = str_replace('+', ' ', $font[0]);
        if ($character != '') {
            return "'$font', " . $character;
        } else {
            return $font;
        }
    } else {
        $font = $family;
        return $font;
    }

}

function sampression_font_style($style)
{
    $webtitle = '';
    $style = (array)$style;
    if (in_array('bold', $style)) {
        $webtitle .= 'font-weight: bold;';
    } else {
        $webtitle .= 'font-weight: normal;';
    }
    if (in_array('italic', $style)) {
        $webtitle .= 'font-style: italic;';
    } else {
        $webtitle .= 'font-style: normal;';
    }
    if (in_array('all-caps', $style)) {
        $webtitle .= 'text-transform: uppercase;';
    } else {
        $webtitle .= 'text-transform: none;';
    }
    if (in_array('underline', $style)) {
        $webtitle .= 'text-decoration: underline;';
    } else {
        $webtitle .= 'text-decoration: none;';
    }
    return $webtitle;
}

if (!function_exists('sampression_header_style')) {

    function sampression_header_style()
    {
        global $sampression_options_settings;
        $webtitle = $webtitle_color = $webtagline = $primary_nav = $primary_nav_col_hover = $social_media_icon = '';
        // Website Title Style
        if ((get_theme_mod('webtitle_font_family'))) {
            $webtitle .= 'font-family: ' . sampression_font_family(get_theme_mod('webtitle_font_family')) . ';';
        } else {
            if (get_theme_mod('body_font')) {
                $webtitle .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
            } else {
                if ($sampression_options_settings['web_title_font'] != '') {
                    $webtitle .= 'font-family: ' . sampression_font_family($sampression_options_settings['web_title_font']) . ';';
                }
            }
        }
        if (null !== get_theme_mod('webtitle_font_style')) {
            $webtitle .= sampression_font_style(get_theme_mod('webtitle_font_style'));
        }
        if (get_theme_mod('webtitle_font_color')) {
            $webtitle_color .= 'color: #' . get_theme_mod('webtitle_font_color', '') . ';';
        } else {
            if (get_theme_mod('title_textcolor')) {
                $webtitle_color .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                //web_title_color
                $webtitle_color .= 'color: ' . $sampression_options_settings['web_title_color'] . ';';
            }

        }
        // Website Tagline Style
        if ((get_theme_mod('webtagline_font_family'))) {
            $webtagline .= 'font-family: ' . sampression_font_family(get_theme_mod('webtagline_font_family')) . ';';
        } else {
            if (get_theme_mod('body_font')) {
                $webtagline .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
            } else {
                if ($sampression_options_settings['web_desc_font'] != '') {
                    $webtagline .= 'font-family: ' . sampression_font_family($sampression_options_settings['web_desc_font']) . ';';
                }
            }
        }
        if (get_theme_mod('webtagline_font_style')) {
            $webtagline .= sampression_font_style(get_theme_mod('webtagline_font_style'));
        }
        if (get_theme_mod('webtagline_font_color')) {
            $webtagline .= 'color: #' . get_theme_mod('webtagline_font_color') . ';';
        } else {
            if (get_theme_mod('body_textcolor') && get_theme_mod('webtagline_font_color') == '') {
                $webtagline .= 'color: ' . get_theme_mod('body_textcolor') . ';';
            } else {
                if ($sampression_options_settings['web_desc_color'] != '') {
                    $webtagline .= 'color: ' . $sampression_options_settings['web_desc_color'] . ';';
                }
            }
        }
//        if( !empty(get_theme_mod( 'primarynav_font_family' )) ) {
//            $primary_nav .= 'font-family: ' . sampression_font_family( get_theme_mod( 'primarynav_font_family' ) ) . ';';
//        } else {
//            if($sampression_options_settings['nav_font_family'] != '') {
//                $primary_nav .= 'font-family: ' . sampression_font_family( $sampression_options_settings['nav_font_family'] ) . ';';
//            }
//        }
//        if( get_theme_mod( 'primarynav_font_style' ) ) {
//            $primary_nav .= sampression_font_style( get_theme_mod( 'primarynav_font_style' ) );
//        }
//        if( get_theme_mod( 'primarynav_font_color' ) ) {
//            $primary_nav .= 'color: #' . get_theme_mod( 'primarynav_font_color' ) . ';';
//        } else {
//            if(get_theme_mod( 'link_color' )) {
//                $primary_nav .= 'color: ' . get_theme_mod('link_color') . ';';
//            } else {
//                if($sampression_options_settings['nav_font_color'] != '') {
//                    $primary_nav .= 'color: ' . $sampression_options_settings['nav_font_color'] . ';';
//                }
//            }
//        }
//        if( get_theme_mod( 'primarynav_font_color_hover' ) ) {
//            $primary_nav_col_hover .= 'color: #' . get_theme_mod( 'primarynav_font_color_hover' ) . ';';
//        } else {
//            if($sampression_options_settings['nav_font_color_hover'] != '') {
//                $primary_nav_col_hover .= 'color: ' . $sampression_options_settings['nav_font_color_hover'] . ';';
//            }
//        }
        if ((get_theme_mod('use_social_default_color') === false)) {
            $social_media_icon .= 'color: #' . get_theme_mod('social_icon_color', '') . ';';
        }
        $full_width_nav = $full_width_nav_a = $full_width_nav_a_hover = '';
        if (get_theme_mod('sec_nav_background_color')) {
            $full_width_nav .= 'background-color: #' . get_theme_mod('sec_nav_background_color') . ';';
        }
        if ((get_theme_mod('secondarynav_font_family'))) {
            $full_width_nav_a .= 'font-family: ' . sampression_font_family(get_theme_mod('secondarynav_font_family')) . ';';
        }

        if (get_theme_mod('secondarynav_font_style')) {
            $full_width_nav_a .= sampression_font_style(get_theme_mod('secondarynav_font_style', 'all-caps'));
        }
        if (get_theme_mod('secondarynav_font_color')) {
            $full_width_nav_a .= 'color: #' . get_theme_mod('secondarynav_font_color') . ';';
        }
        if (get_theme_mod('secondarynav_font_color_hover')) {
            $full_width_nav_a_hover .= 'color: #' . get_theme_mod('secondarynav_font_color_hover') . ';';
        }
        $header_text = $header_text_hover = '';
        if ((get_theme_mod('title_font'))) {
            $header_text .= 'font-family: ' . sampression_font_family(get_theme_mod('title_font')) . ';';
        } else {
            if (!empty($sampression_options_settings['blog_post_title_font_family'])) {
                $header_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['blog_post_title_font_family']) . ';';
            }
        }
        $header_text .= sampression_font_style(get_theme_mod('headertext_font_style', 'bold'));
        if (get_theme_mod('title_textcolor')) {
            if (strpos(get_theme_mod('title_textcolor'), '#') !== false) {
                $header_text .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                $header_text .= 'color: #' . get_theme_mod('title_textcolor') . ';';
            }
        } else {
            if (($sampression_options_settings['blog_post_title_color'])) {
                $header_text .= 'color: ' . $sampression_options_settings['blog_post_title_color'] . ';';
            }
        }
        if (get_theme_mod('headertext_link_color')) {
            $header_text_hover .= 'color: #' . get_theme_mod('headertext_link_color') . ';';
        }
        $body_text = $bodytext_link_color = '';
        $bodytext_link_color_hover = '';
        if ((get_theme_mod('body_font'))) {
            $body_text .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
        } else {
            if (($sampression_options_settings['body_font_family'])) {
                $body_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['body_font_family']) . ';';
            }
        }
        $body_text .= sampression_font_style(get_theme_mod('bodytext_font_style'));
        if (get_theme_mod('body_textcolor')) {
            if (strpos(get_theme_mod('body_textcolor'), '#') !== false) {
                $body_text .= 'color: ' . get_theme_mod('body_textcolor') . ';';
            } else {
                $body_text .= 'color: #' . get_theme_mod('body_textcolor') . ';';
            }
        } else {
            if (isset($sampression_options_settings['body_font_color'])) {
                $body_text .= 'color: ' . $sampression_options_settings['body_font_color'] . ';';
            }
        }
        if (get_theme_mod('bodytext_font_size')) {
            if ((get_theme_mod('bodytext_font_size'))) {
                $body_text .= 'font-size: ' . sampression_font_family(get_theme_mod('bodytext_font_size')) . 'px;';
            }
        }

        if (get_theme_mod('body_link_color')) {
            //if (strpos(get_theme_mod( 'link_color'), '#') !== false) {
            $bodytext_link_color .= 'color: #' . get_theme_mod('body_link_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $bodytext_link_color .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (isset($sampression_options_settings['body_link_color'])) {
                    $bodytext_link_color .= 'color: ' . $sampression_options_settings['body_link_color'] . ';';
                }
            }
        }

        $filter_icon = $filter_text = '';

//        if( !empty(get_theme_mod( 'filterby_font_family' )) ) {
//            $filter_text .= 'font-family: ' . sampression_font_family( get_theme_mod( 'filterby_font_family' ) ) . ';';
//        }
//
//        $filter_text .= sampression_font_style( get_theme_mod( 'filterby_font_style', array('all-caps') ) );
//
//        if( get_theme_mod( 'filterby_font_color' ) ) {
//            $filter_text .= 'color: #' .get_theme_mod( 'filterby_font_color' ) . ';';
//            $filter_icon .= 'background-color: #' .get_theme_mod( 'filterby_font_color' ) . ';';
//        } else {
//            if(get_theme_mod( 'link_color' )) {
//                $filter_text .= 'color: ' . get_theme_mod('link_color') . ';';
//                $filter_icon .= 'background-color: ' . get_theme_mod('link_color') . ';';
//            } else {
//                if($sampression_options_settings['filter_by_color'] != '') {
//                    $filter_text .= 'color: ' . $sampression_options_settings['filter_by_color'] . ';';
//                    $filter_icon .= 'background-color: ' . $sampression_options_settings['filter_by_color'] . ';';
//                }
//            }
//        }

        $meta_text = $meta_text_color = $meta_text_color_hover = '';
        if ((get_theme_mod('metatext_font_family'))) {
            $meta_text .= 'font-family: ' . sampression_font_family(get_theme_mod('metatext_font_family')) . ';';
        } else {
            if (($sampression_options_settings['blog_meta_font_family'])) {
                $meta_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['blog_meta_font_family']) . ';';
            }
        }
        $meta_text .= sampression_font_style(get_theme_mod('metatext_font_style'));
        if (get_theme_mod('metatext_font_color')) {
            $meta_text_color .= 'color: #' . get_theme_mod('metatext_font_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $meta_text_color .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (($sampression_options_settings['blog_meta_font_color'])) {
                    $meta_text_color .= 'color: ' . $sampression_options_settings['blog_meta_font_color'] . ';';
                }
            }
        }
        if (get_theme_mod('metatext_link_color')) {
            $meta_text_color_hover .= 'color: #' . get_theme_mod('metatext_link_color') . ';';
        }


        $widget_text = $widget_text_link = $widget_heading_text = $widget_text_link_hover = '';
        if ((get_theme_mod('widgetText_heading_font_family'))) {
            $widget_heading_text .= 'font-family: ' . sampression_font_family(get_theme_mod('widgetText_heading_font_family')) . ';';
        } else {
            if (($sampression_options_settings['widget_header_font_family'])) {
                $widget_heading_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['widget_header_font_family']) . ';';
            }
        }

        $widget_heading_text .= sampression_font_style(get_theme_mod('widgetText_heading_font_style'));

        if (get_theme_mod('widgetText_heading_font_color')) {
            $widget_heading_text .= 'color: #' . get_theme_mod('widgetText_heading_font_color') . ';';
        } else {
            if (get_theme_mod('title_textcolor')) {
                $widget_heading_text .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                if (($sampression_options_settings['widget_header_font_color'])) {
                    $widget_heading_text .= 'color: ' . $sampression_options_settings['widget_header_font_color'] . ';';
                }
            }
        }

        if ((get_theme_mod('widgetText_font_family'))) {
            $widget_text .= 'font-family: ' . sampression_font_family(get_theme_mod('widgetText_font_family')) . ';';
        }

        $widget_text .= sampression_font_style(get_theme_mod('widgetText_font_style'));
        if (get_theme_mod('widgetText_font_color')) {
            $widget_text .= 'color: #' . get_theme_mod('widgetText_font_color') . ';';
        }
        if (get_theme_mod('widgetText_link_color')) {
            $widget_text_link .= 'color: #' . get_theme_mod('widgetText_link_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $widget_text_link .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (($sampression_options_settings['link_font_color'])) {
                    $widget_text_link .= 'color: ' . $sampression_options_settings['link_font_color'] . ';';
                }
            }
        }
        if (get_theme_mod('widgetText_hover_color')) {
            $widget_text_link_hover .= 'color: #' . get_theme_mod('widgetText_hover_color') . ';';
        }

        //footer widget
//        $footer_text = $footer_text_link = $footer_heading_text = $footer_text_link_hover = '';
//        if( !empty(get_theme_mod( 'footerText_heading_font_family' )) ) {
//            $footer_heading_text .= 'font-family: ' . sampression_font_family( get_theme_mod( 'footerText_heading_font_family' ) ) . ';';
//        } else {
//            if($sampression_options_settings['widget_header_font_family'] != '') {
//                $footer_heading_text .= 'font-family: ' . sampression_font_family( $sampression_options_settings['widget_header_font_family'] ) . ';';
//            }
//        }
//
//        $footer_heading_text .= sampression_font_style( get_theme_mod( 'footerText_heading_font_style' ) );
//
//        if( get_theme_mod( 'footerText_heading_font_color' ) ) {
//            $footer_heading_text .= 'color: #' . get_theme_mod( 'footerText_heading_font_color' ) . ';';
//        } else {
//            if (strpos(get_theme_mod( 'title_textcolor'), '#') !== false) {
//                    $footer_heading_text .= 'color: ' . get_theme_mod('title_textcolor') . ';';
//            } else {
//                if ($sampression_options_settings['widget_header_font_color'] != '') {
//                    $footer_heading_text .= 'color: ' . $sampression_options_settings['widget_header_font_color'] . ';';
//                }
//            }
//        }
//
//        if( !empty(get_theme_mod( 'footerText_font_family' )) ) {
//            $footer_text .= 'font-family: ' . sampression_font_family( get_theme_mod( 'footerText_font_family' ) ) . ';';
//        }
//
//        $footer_text .= sampression_font_style( get_theme_mod( 'footerText_font_style' ) );
//        if( get_theme_mod( 'footerText_font_color' ) ) {
//            $footer_text .= 'color: #' .get_theme_mod( 'footerText_font_color' ) . ';';
//        }
//        if( get_theme_mod( 'footerText_link_color' ) ) {
//            $footer_text_link .= 'color: #' .get_theme_mod( 'footerText_link_color' ) . ';';
//        } else {
//            if(get_theme_mod( 'link_color' )) {
//                $footer_text_link .= 'color: ' . get_theme_mod('link_color') . ';';
//            } else {
//                if($sampression_options_settings['link_font_color'] != '') {
//                    $footer_text_link .= 'color: ' . $sampression_options_settings['link_font_color'] . ';';
//                }
//            }
//        }
//
//        $footer_a = '';
//        if(get_theme_mod( 'link_color' ) && get_theme_mod('footer_link_color') == '') {
//            $footer_a = 'color: ' . get_theme_mod('link_color') . ';';
//        } else {
//            if(get_theme_mod('footer_link_color')) {
//                $footer_a = 'color: #' . get_theme_mod('footer_link_color') . ';';
//            } else {
//                if ($sampression_options_settings['link_font_color'] != '') {
//                    $footer_a = 'color: ' . $sampression_options_settings['link_font_color'] . ';';
//                }
//            }
//        }
//
//        if( get_theme_mod( 'footerText_hover_color' ) ) {
//            $footer_text_link_hover .= 'color: #' .get_theme_mod( 'footerText_hover_color' ) . ';';
//        } else {
//            $footer_text_link_hover .= 'color: #333333;';
//        }

        //end

//        $pagination_text = $pagination_text_link = '';
//        if( !empty(get_theme_mod( 'paginationtext_font_family', 'Roboto:400,400italic,700,700italic=sans-serif' )) ) {
//            $pagination_text .= 'font-family: ' . sampression_font_family( get_theme_mod( 'paginationtext_font_family', 'Roboto:400,400italic,700,700italic=sans-serif' ) ) . ';';
//        }
//        $pagination_text .= sampression_font_style( get_theme_mod( 'paginationtext_font_style' ) );
//        if( get_theme_mod( 'paginationtext_font_color') ) {
//            $pagination_text .= 'color: #' . get_theme_mod( 'paginationtext_font_color' ) . ';';
//        } else {
//            if (get_theme_mod( 'link_color')) {
//                $pagination_text .= 'color: ' . get_theme_mod( 'link_color') . ';';
//            } else {
//                if($sampression_options_settings['link_font_color'] != '') {
//                    $pagination_text .= 'color: ' . $sampression_options_settings['link_font_color'] . ';';
//                }
//            }
//        }
//        if( get_theme_mod( 'paginationtext_font_color_hover') ) {
//            $pagination_text_link .= 'color: #' . get_theme_mod( 'paginationtext_font_color_hover') . ';';
//        }
//        $pin_color = '';
//        if( get_theme_mod( 'sticky_pin_color' ) ) {
//            $pin_color .= 'fill: #' . get_theme_mod( 'sticky_pin_color' ) . ';';
//        } else {
//            if($sampression_options_settings['sticky_bgcolor'] != '') {
//                $pin_color .= 'fill: #' . $sampression_options_settings['sticky_bgcolor'] . ';';
//            }
//        }
//        $button_bg = '';
//        if( get_theme_mod( 'button_bg_color' ) ) {
//            $button_bg .= 'background-color: #' . get_theme_mod( 'button_bg_color' ) . ';';
//        } else {
//            if($sampression_options_settings['button_bgcolor'] != '') {
//                $button_bg .= 'background-color: ' . $sampression_options_settings['button_bgcolor'] . ';';
//            }
//        }

        //echo $full_width_nav_a;
        ?>
        <style id="sampression-header-style" type="text/css">
            <?php
            if($webtitle != '' ) {
            echo "#site-title { $webtitle }" . PHP_EOL;
            }
            if( get_theme_mod( 'webtitle_font_size' ) ) {
                $size = (int)get_theme_mod( 'webtitle_font_size' ) / 10;
                $webtitle_font_size = 'font-size: ' . get_theme_mod( 'webtitle_font_size' ) . 'px; ';
                $webtitle_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #site-title { $webtitle_font_size } }" . PHP_EOL;
            } else {
                if($sampression_options_settings['web_title_size'] != '') {
                    $size = $sampression_options_settings['web_title_size'] / 10;
                    $webtitle_font_size = 'font-size: ' . $sampression_options_settings['web_title_size'] . 'px; ';
                    $webtitle_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #site-title { $webtitle_font_size } }" . PHP_EOL;
                }
            }
            if($webtitle_color != '' ) {
            echo "#site-title a { $webtitle_color }" . PHP_EOL;
            }
            if($webtagline != '') {
            echo "#site-description { $webtagline }" . PHP_EOL;
            }
            if( get_theme_mod( 'webtagline_font_size' ) ) {
                $size = (int)get_theme_mod( 'webtagline_font_size' ) / 10;
                $webtagline_font_size = 'font-size: ' . get_theme_mod( 'webtagline_font_size' ) . 'px; ';
                $webtagline_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #site-description { $webtagline_font_size } }" . PHP_EOL;
            } else {
                if($sampression_options_settings['web_desc_size'] != '') {
                    $size = (int)$sampression_options_settings['web_desc_size'] / 10;
                    $webtagline_font_size = 'font-size: ' . $sampression_options_settings['web_desc_size'] . 'px; ';
                    $webtagline_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #site-description { $webtagline_font_size } }" . PHP_EOL;
                }
            }
            if($primary_nav != '' ) {
            echo "#top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a{ $primary_nav }" . PHP_EOL;
            }
            if(get_theme_mod( 'primarynav_font_color' )){
                echo ".sub-menu-toggle { color: #".get_theme_mod( 'primarynav_font_color' ) . "; }" . PHP_EOL;
                echo ".toggle-nav .ico-bar { background-color: #".get_theme_mod( 'primarynav_font_color' ) . "; }" . PHP_EOL;
            }
            if(get_theme_mod( 'primarynav_font_size' )){
                $size = (int)get_theme_mod( 'primarynav_font_size' ) / 10;
                $primary_nav_font_size = 'font-size: ' . get_theme_mod( 'primarynav_font_size' ) . 'px; ';
                $primary_nav_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $primary_nav_font_size } }" . PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['nav_font_size'] )) {
                    $size = (int)$sampression_options_settings['nav_font_size'] / 10;
                    $primary_nav_font_size = 'font-size: ' . $sampression_options_settings['nav_font_size'] . 'px; ';
                    $primary_nav_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $primary_nav_font_size } }" . PHP_EOL;
                }
            }
            if(!empty($primary_nav_col_hover ) ) {
            echo "#top-nav ul li a:hover,
            #top-nav ul li.current-menu-item > a,
            #top-nav ul li:hover > a,
            #top-nav .sub-menu li:hover > a,
            #top-nav .sub-menu .sub-menu li:hover > a,
            #top-nav .sub-menu li:last-child > .sub-menu li:hover > a,
            #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            #top-nav ul li.current-menu-ancestor a,
            #top-nav ul li.current-menu-parent a,
            #top-nav ul li li li a:hover,
            #top-nav ul li.current_page_item > a,
            #top-nav ul li.current_page_parent > a,
            #top-nav ul li.current_page_parent ul li.current_page_item > a { $primary_nav_col_hover }" . PHP_EOL;
            }
            //echo"aaaaaaaaaa"; var_dump($social_media_icon);
            if(!empty($social_media_icon) ) {
            echo ".sm-top li.sm-top-fb a, .sm-top li.sm-top-tw a, .sm-top li.sm-top-youtube a, .sm-top li.sm-top-gplus a, .sm-top li.sm-top-tumblr a,
             .sm-top li.sm-top-pinterest a, .sm-top li.sm-top-linkedin a, .sm-top li.sm-top-github a, .sm-top li.sm-top-instagram a, .sm-top li.sm-top-flickr a,
              .sm-top li.sm-top-vimeo a ,.social-connect a{ $social_media_icon }" . PHP_EOL;
            }
            if( !empty($full_width_nav ) ) {
            echo ".full-width #full-width-nav { $full_width_nav }" . PHP_EOL;
            echo "#full-width-nav ul ul { $full_width_nav }" . PHP_EOL;
            echo "#full-width-nav ul ul ul:before { border-right-color: #".get_theme_mod( 'sec_nav_background_color' ) . "; }" . PHP_EOL;
            echo "#full-width-nav ul li.edge ul ul:before { border-left-color: #".get_theme_mod( 'sec_nav_background_color' ) . "; }" . PHP_EOL;
            }
            if(!empty( $full_width_nav_a )) {
            echo ".full-width #full-width-nav ul li a, .full-width #full-width-nav ul li li a,  .full-width #full-width-nav .sub-menu li a, .full-width #full-width-nav .sub-menu .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a{ $full_width_nav_a }" . PHP_EOL;

            }
            if(get_theme_mod( 'secondarynav_font_color' )){
                echo "#full-width-nav .sub-menu-toggle:before, #full-width-nav .sub-menu-toggle.menu-open:before { color: #".get_theme_mod( 'secondarynav_font_color' ) . "; }" . PHP_EOL;
            }
            if(get_theme_mod( 'secondarynav_font_size' )){
                $size = (int)get_theme_mod( 'secondarynav_font_size' ) / 10;
                $secondarynav_font_size = 'font-size: ' . get_theme_mod( 'secondarynav_font_size' ) . 'px; ';
                $secondarynav_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .full-width #full-width-nav ul li a, .full-width #full-width-nav ul li li a,  .full-width #full-width-nav .sub-menu li a, .full-width #full-width-nav .sub-menu .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $secondarynav_font_size } }" . PHP_EOL;

            }
            if( !empty($full_width_nav_a_hover ) ) {
            echo ".full-width #full-width-nav ul li a:hover,
            .full-width #full-width-nav ul li.current-menu-item > a,
            .full-width #full-width-nav ul li:hover > a,
            .full-width #full-width-nav .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav ul li.current-menu-ancestor a,
            .full-width #full-width-nav ul li.current-menu-parent a,
            .full-width #full-width-nav ul li li li a:hover,
            .full-width #full-width-nav ul li.current_page_item > a,
            .full-width #full-width-nav ul li.current_page_parent > a,
            .full-width #full-width-nav ul li.current_page_parent ul li.current_page_item > a { $full_width_nav_a_hover }" . PHP_EOL;
            }
            if( !empty($header_text ) ) {
            echo "#page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title,
            .entry-header .entry-title ,.page-title,.entry-title,.comments-title,.entry-title a,h1,h2,h3,h4,h5,h6{ $header_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'headertext_font_size' ) ) {
                $size = (int)get_theme_mod( 'headertext_font_size' ) / 10;
                $headertext_font_size = 'font-size: ' . get_theme_mod( 'headertext_font_size' ) . 'px; ';
                $headertext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title ,
                .entry-header .entry-title,.page-title,.entry-title,.comments-title,.entry-title a{ $headertext_font_size } }" . PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['blog_post_title_font_size'] )) {
                    $size = (int)$sampression_options_settings['blog_post_title_font_size'] / 10;
                    $headertext_font_size = 'font-size: ' . $sampression_options_settings['blog_post_title_font_size'] . 'px; ';
                    $headertext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title { $headertext_font_size } }" . PHP_EOL;
                }
            }

            if( !empty($header_text_hover) ) {
            echo "article.post .post-title a:hover ,article .entry-title > a:hover{ $header_text_hover }" . PHP_EOL;
            }
            if( !empty($body_text ) ) {
            echo "body .entry, body .comment-content , body .comment-content p,body .entry-content,body .entry-content p ,.entry-summary p,.page-content p,textarea{ $body_text }" . PHP_EOL;
            }
            if(get_theme_mod( 'bodytext_font_size' )){
                $h1_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 10;
                $h2_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 8;
                $h3_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 6;
                $h4_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 4;
                $h5_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 2;
                $h6_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 1;

                $size = (int)get_theme_mod( 'bodytext_font_size' ) / 10;
                $bodytext_font_size = 'font-size: ' . get_theme_mod( 'bodytext_font_size' ) . 'px; ';
                $bodytext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  body .entry, body .comment-content{ $bodytext_font_size }" . PHP_EOL;

                echo "body .entry h1{ font-size: ".$h1_font_size . "px; }" . PHP_EOL;
                echo "body .entry h2{ font-size: ".$h2_font_size . "px; }" . PHP_EOL;
                echo "body .entry h3{ font-size: ".$h3_font_size . "px; }" . PHP_EOL;
                echo "body .entry h4{ font-size: ".$h4_font_size . "px; }" . PHP_EOL;
                echo "body .entry h5{ font-size: ".$h5_font_size . "px; }" . PHP_EOL;
                echo "body .entry h6{ font-size: ".$h6_font_size . "px; }" . PHP_EOL;
                echo "}". PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['body_font_size'] )) {
                    $h1_font_size = $sampression_options_settings['body_font_size'] + 10;
                    $h2_font_size = $sampression_options_settings['body_font_size'] + 8;
                    $h3_font_size = $sampression_options_settings['body_font_size'] + 6;
                    $h4_font_size = $sampression_options_settings['body_font_size'] + 4;
                    $h5_font_size = $sampression_options_settings['body_font_size'] + 2;
                    $h6_font_size = $sampression_options_settings['body_font_size'] + 1;

                    $size = $sampression_options_settings['body_font_size'] / 10;
                    $bodytext_font_size = 'font-size: ' . $sampression_options_settings['body_font_size'] . 'px; ';
                    $bodytext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  body .entry, body .comment-content{ $bodytext_font_size }" . PHP_EOL;

                    echo "body .entry h1{ font-size: ".$h1_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h2{ font-size: ".$h2_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h3{ font-size: ".$h3_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h4{ font-size: ".$h4_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h5{ font-size: ".$h5_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h6{ font-size: ".$h6_font_size . "px; }" . PHP_EOL;
                    echo "}". PHP_EOL;
                }
            }
            if( ($bodytext_link_color ) ) {
            echo "body .entry a, body .comment-content a, .pingback a,.entry-content  a{ $bodytext_link_color }" . PHP_EOL;
            }

            if((get_theme_mod( 'bodytext_font_color' ))){
            echo "body .entry a:hover { color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            }
            if( ($filter_icon ) ) {
            echo "#primary-nav ul.nav-listing li a span { $filter_icon }" . PHP_EOL;
            }
            if( !empty($filter_text )) {
            echo "#primary-nav .nav-label, #filter a { $filter_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'filterby_font_size' ) ) {
                $size = (int)get_theme_mod( 'filterby_font_size' ) / 10;
                $filterby_font_size = 'font-size: ' . get_theme_mod( 'filterby_font_size' ) . 'px; ';
                $filterby_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #primary-nav .nav-label, #filter a { $filterby_font_size } }" . PHP_EOL;
            }
            if(( get_theme_mod( 'bodytext_font_color' ) ) ) {
            echo "#primary-nav .nav-label { color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            echo "input[type='submit']:hover { background-color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            }
            if( ($meta_text ) ) {
            echo ".meta a, .comment-meta a, .logged-in-as a,.entry-meta a ,.entry-meta span{ ".$meta_text." }" . PHP_EOL;
            }
            if( (get_theme_mod( 'metatext_font_size' )  )) {
                $meta_icon_size = (int)get_theme_mod( 'metatext_font_size' ) + 8;
                $size = (int)get_theme_mod( 'metatext_font_size' ) / 10;
                $metatext_font_size = 'font-size: ' . get_theme_mod( 'metatext_font_size' ) . 'px; ';
                $metatext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{ font-size: ".$meta_icon_size ."px; }" . PHP_EOL;
                echo ".meta a, .comment-meta a, .logged-in-as a ,.entry-meta span{ ".$metatext_font_size ."px; }" . PHP_EOL;
                echo "}". PHP_EOL;

            } else {
                if(($sampression_options_settings['blog_meta_font_size'] )) {
                    $meta_icon_size = (int)$sampression_options_settings['blog_meta_font_size'] + 8;
                    $size = (int)$sampression_options_settings['blog_meta_font_size'] / 10;
                    $metatext_font_size = 'font-size: ' . $sampression_options_settings['blog_meta_font_size'] . 'px; ';
                    $metatext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{ font-size: ".$meta_icon_size ."px; }" . PHP_EOL;
                    echo ".meta a, .comment-meta a, .logged-in-as a { ".$metatext_font_size ."px; }" . PHP_EOL;
                    echo "}". PHP_EOL;
                }
            }
            if( ($meta_text_color )) {
            echo ".xmeta, .meta a, .comment-meta a, .logged-in-as a, body .genericon-edit .post-edit-link,.entry-meta a  { $meta_text_color }" . PHP_EOL;
            }
            if( ($meta_text_color_hover )) {
            echo ".meta a:hover, .url.fn.n:hover, .comment-meta a:hover, .logged-in-as a:hover, .overflow-hidden.cat-listing > a:hover ,.entry-meta a:hover { $meta_text_color_hover }" . PHP_EOL;
            }
            if( ($widget_heading_text )) {
            echo ".sidebar .widget .widget-title ,.widget .widget-title,.widget select{ $widget_heading_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'widgetText_heading_font_size' ) ) {
                $size = (int)get_theme_mod( 'widgetText_heading_font_size' ) / 10;
                $widgetText_heading_font_size = 'font-size: ' . get_theme_mod( 'widgetText_heading_font_size' ) . 'px; ';
                $widgetText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size } } .sidebar .widget .widget-title,.widget .widget-title,.widget select { $widgetText_heading_font_size }" . PHP_EOL;
            } else {
                if(($sampression_options_settings['widget_header_font_size'])) {
                    $size = (int)$sampression_options_settings['widget_header_font_size'] / 10;
                    $widgetText_heading_font_size = 'font-size: ' . $sampression_options_settings['widget_header_font_size'] . 'px; ';
                    $widgetText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size } } .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size }" . PHP_EOL;
                }
            }
            if( ($widget_text )) {
            echo ".sidebar .widget { $widget_text } .widget ,.widget select { $widget_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'widgetText_font_size' ) ) {
                $size = (int)get_theme_mod( 'widgetText_font_size' ) / 10;
                $widgetText_font_size = 'font-size: ' . get_theme_mod( 'widgetText_font_size' ) . 'px; ';
                $widgetText_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .sidebar .widget,.widget select { $widgetText_font_size } } .widget { $widgetText_font_size }" . PHP_EOL;
            }
            if( ($widget_text_link ) ) {
            echo ".sidebar .widget a , .widget a,.widget select{ $widget_text_link }" . PHP_EOL;
            }
            if( ($widget_text_link_hover )) {
            echo ".sidebar .widget a:hover,.widget a:hover { $widget_text_link_hover }" . PHP_EOL;
            }
            if( ($footer_heading_text ) ) {
            echo ".footer-widget .widget .widget-title { $footer_heading_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'footerText_heading_font_size' ) ) {
                $size = (int)get_theme_mod( 'footerText_heading_font_size' ) / 10;
                $footerText_heading_font_size = 'font-size: ' . get_theme_mod( 'footerText_heading_font_size' ) . 'px; ';
                $footerText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .footer-widget .widget .widget-title { $footerText_heading_font_size } }" . PHP_EOL;
            } else {
                if(($sampression_options_settings['widget_header_font_size'] )) {
                    $size = (int)$sampression_options_settings['widget_header_font_size'] / 10;
                    $footerText_heading_font_size = 'font-size: ' . $sampression_options_settings['widget_header_font_size'] . 'px; ';
                    $footerText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  .footer-widget .widget .widget-title { $footerText_heading_font_size } }" . PHP_EOL;
                }
            }
            if( ($footer_text ) ) {
            echo ".footer-widget .widget { $footer_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'footerText_font_size' ) ) {
                $size = (int)get_theme_mod( 'footerText_font_size' ) / 10;
                $footerText_font_size = 'font-size: ' . get_theme_mod( 'footerText_font_size' ) . 'px; ';
                $footerText_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .footer-widget .widget { $footerText_font_size } }" . PHP_EOL;
            }
            if( ($footer_text_link ) ) {
            echo ".footer-widget .widget a { $footer_text_link }" . PHP_EOL;
            }
            if( ($footer_text_link_hover )) {
            echo ".footer-widget .widget a:hover { $footer_text_link_hover }" . PHP_EOL;
            }
            if (($footer_a)) {
            echo "#footer a { $footer_a }" . PHP_EOL;
            }
            if( ($pagination_text ) ) {
            echo "#nav-above a, #nav-below a, #nav-below span { $pagination_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'paginationtext_font_size' ) ) {
                $size = (int)get_theme_mod( 'paginationtext_font_size' ) / 10;
                $paginationtext_font_size = 'font-size: ' . get_theme_mod( 'paginationtext_font_size' ) . 'px; ';
                $paginationtext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #nav-above a, #nav-below a, #nav-below span { $paginationtext_font_size } }" . PHP_EOL;
            }
            if( ($pagination_text_link ) ) {
            echo "#nav-above a:hover, #nav-below a:hover, #nav-below a:hover span { $pagination_text_link }" . PHP_EOL;
            }
            if(($pin_color)){
                echo ".sticky-icon path{ $pin_color }" . PHP_EOL;
            }
            if( ($button_bg ) ) {
            echo ".button, button, input[type=\"submit\"], input[type=\"reset\"], input[type=\"button\"] { $button_bg }" . PHP_EOL;
            }

            if( get_theme_mod( 'filterby_font_size' ) ) {
                $filter = (int)get_theme_mod( 'filterby_font_size' ) * 6;
                $filter_margin = $filter. 'px;';
                echo "@media (min-width: 769px) { #primary-nav ul.nav-listing{ margin: 0 0 0 ".$filter_margin. "} }" . PHP_EOL;
            }
            ?>
        </style>
        <?php
    }
}
// TODO
// add_action('wp_head', 'sampression_header_style', 999);

function sampression_header_code()
{
    global $sampression_options_settings;
    if (get_theme_mod('sampression_header_code')) {
        echo get_theme_mod('sampression_header_code') . PHP_EOL;
    } else {
        if (get_theme_mod('sampression_header_code') == '') {
            echo get_theme_mod('sampression_header_code') . PHP_EOL;
        } else {
            if (($sampression_options_settings['advanced_header_code'])) {
                echo $sampression_options_settings['advanced_header_code'] . PHP_EOL;
            }
        }
    }
}

add_action('wp_head', 'sampression_header_code', 1111);

function sampression_footer_code()
{
    global $sampression_options_settings;
    if (get_theme_mod('sampression_footer_code')) {
        echo get_theme_mod('sampression_footer_code') . PHP_EOL;
    } else {
        if (get_theme_mod('sampression_footer_code') == '') {
            echo get_theme_mod('sampression_footer_code') . PHP_EOL;
        } else {
            if (($sampression_options_settings['advanced_footer_code'])) {
                echo $sampression_options_settings['advanced_footer_code'] . PHP_EOL;
            }
        }
    }
}

add_action('wp_footer', 'sampression_footer_code', 999);


/**
 * Register widget area.
 */
function sampression_widgets_init()
{
    global $table_prefix, $wpdb;
    register_sidebar(array(
        'name' => esc_html__('Primary Sidebar', 'naya-lite'),
        'id' => 'primary-sidebar',
        'description' => esc_html__('The Primary Sidebar displays on sidebar of the inner pages.', 'naya-lite'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar', 'naya-lite'),
        'id' => 'footer-sidebar',
        'description' => esc_html__('The Footer Sidebar displays on footer.', 'naya-lite'),
        'before_widget' => '<div id="%1$s" class="column one-third widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}

//add_action( 'widgets_init', 'sampression_widgets_init' );

function sampression_create_font_url($family)
{
    $family = explode('=', $family);
    return $family[0];
}

function sampression_fonts_url()
{
    $fonts_url = '';
    $fonts = array();

    $fonts[] = sampression_create_font_url(get_theme_mod('webtitle_font_family', 'Roboto+Slab:400,700=serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('webtagline_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('primarynav_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('secondarynav_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('title_font', 'Roboto+Slab:400,700=serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('body_font', 'Roboto+Slab:400,700=serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('filterby_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('metatext_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    //$fonts[] = sampression_create_font_url( get_theme_mod( 'widgettext_font_family', 'Roboto:400,400italic,700,700italic=sans-serif' ) );
    $fonts[] = sampression_create_font_url(get_theme_mod('widgetText_heading_font_family', 'Roboto+Slab:400,700=serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('widgetText_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('footerText_heading_font_family', 'Roboto+Slab:400,700=serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('footerText_font_family', 'Roboto:400,400italic,700,700italic=sans-serif'));
    $fonts[] = sampression_create_font_url(get_theme_mod('paginationtext_font_family', 'Roboto+Slab:400,700=serif'));

    $fonts = array_unique($fonts);

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => implode('|', $fonts)
        ), '//fonts.googleapis.com/css');
    }
    return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function sampression_scripts()
{
    global $sampression_options_settings;
    wp_enqueue_style('sampression-fonts', sampression_fonts_url(), array(), null);
    wp_enqueue_style('sampression-style', get_stylesheet_uri());

    global $post;
    $columns_var = 4;
    if (get_theme_mod('home_columns')) {
        $columns_var = get_theme_mod('home_columns');
    } else {
        if ($sampression_options_settings['column_active'] != '') {
            if ($sampression_options_settings['column_active'] === 'one') {
                $columns_var = '1';
            } else if ($sampression_options_settings['column_active'] === 'two') {
                $columns_var = '2';
            } else if ($sampression_options_settings['column_active'] === 'three') {
                $columns_var = '3';
            } else if ($sampression_options_settings['column_active'] === 'four') {
                $columns_var = '4';
            }
        }
    }
    if (is_archive()) {
        $columns_var = 3;
    }

    if (is_singular()) wp_enqueue_script("comment-reply");

    wp_localize_script('sampression-scripts', 'SampressionVar',
        array(
            'SampressionColumnsVar' => $columns_var
        )
    );

}

//add_action( 'wp_enqueue_scripts', 'sampression_scripts' );

/*
 * Localizing template directory path to customizer js
 */

function locallize_script_customizer()
{
    //for localizing dynamic theme path to customizer js
    wp_enqueue_script('customizer-directory-const', get_template_directory_uri() . '/js/customizer.control.js', array('jquery'), '1.0', true);
    wp_localize_script('customizer-directory-const', 'WPURLS', array('siteurl' => get_template_directory_uri()));
}

//add_action( 'admin_enqueue_scripts', 'locallize_script_customizer' );

/**
 * Fallback for wp_nav_menu calls in header.php
 */
if (!function_exists('sampression_page_menu')) :

    function sampression_page_menu()
    {
        echo '<ul class="top-menu clearfix">';
        wp_list_pages('title_li=&depth=0');
        echo '</ul>';
    }
endif;

/**
 * customizer migrate from lite-pro
 *
 */
if (!function_exists('sampression_migrate_ver')) :
    function sampression_migrate_ver()
    {

        global $wpdb, $table_prefix;

        //check whether lite migration exist
        $args = array(
            'post_type' => 'migrate',
            'posts_per_page' => -1,
            'post_content' => 'theme_mod-sampression-lite'
        );
        $migrate = new WP_Query($args);
        return $migrate->found_posts;
    }
endif;


if (is_admin() && (isset($_GET['activated']) && $_GET['activated'] == 'true' || isset($_GET['preview']) && $_GET['preview'] == 1)) :
    if (!function_exists('migrate_customizer')) :
        function migrate_customizer($table_prefix)
        {
            global $wpdb;

            //migrate : get theme switched name
            $prev_theme_lite = get_option('theme_switched');
            $check_prev_theme = wp_get_theme($prev_theme_lite);

            if ($check_prev_theme == 'Sampression Lite') {

                $wp_option_lite = " SELECT option_value FROM " . $table_prefix . "options WHERE option_name = 'theme_mods_" . $prev_theme_lite . "'";
                $result = $wpdb->get_results($wp_option_lite);

                //template : get currently activated template name
                $sampression_pro = get_template();

                /*
                 * migrate : check previous store flag if already migrated before
                 */
                $result_mod = sampression_migrate_ver();

                //migrate : lite to pro upgrade for the first switch
                if ($result_mod == 0) {
                    /*
                     * add slashes quotes
                     */
                    $option_value = addslashes($result[0]->option_value);

                    //update lite customizer setting
                    $update_to_pro = "UPDATE " . $table_prefix . "options SET option_value = '" . $option_value . "' where option_name = 'theme_mods_" . $sampression_pro . "'";
                    if ($wpdb->query($update_to_pro)) {
                        /*
                         * activate token : add flag for the first migration to pro 2.0
                         */
                        $activated_token = $wpdb->get_results("INSERT INTO " . $table_prefix . "posts SET post_content='theme_mod-" . $prev_theme_lite . "', post_type = 'migrate'");
                        $wpdb->query($activated_token);
                        wp_redirect('/wp-admin/themes.php');
                    }
                } else {
                    wp_redirect('/wp-admin/themes.php');
                }
            }
        }

        migrate_customizer($table_prefix);
    endif;
endif;

/* Redirect to custom theme page after activate */
global $pagenow;
if (is_admin() && $pagenow == 'themes.php' && isset($_GET['activated'])) {
    wp_redirect(admin_url('themes.php?page=about-sampression'));
    exit;
}

// if( !function_exists( 'sampression_post_class' ) ) :
//     /**
//      * Filter for post_class
//      */
//     function sampression_post_class( $classes ) {
//         global $post, $sampression_options_settings;
//         if( is_sticky($post->ID) ) {
//             $classes[] = '';
//         }
//         foreach ( ( get_the_category( $post->ID ) ) as $category ) {
//             $classes[] = $category->category_nicename;
//         }
//         if( is_home() ) {
//             if( get_theme_mod( 'home_columns' ) ) {
//                 switch ( get_theme_mod( 'home_columns' ) ) {
//                     case '1':
//                         $classes[] = 'twelve';
//                         break;
//                     case '2':
//                         $classes[] = 'six';
//                         break;
//                     case '3':
//                         $classes[] = 'four';
//                         break;
//                     default:
//                         $classes[] = 'three';
//                         break;
//                 }
//             } else if($sampression_options_settings['column_active'] != '') {
//                 if($sampression_options_settings['column_active'] === 'one') {
//                     $columns = '1';
//                 } else if($sampression_options_settings['column_active'] === 'two') {
//                     $columns = '2';
//                 } else if($sampression_options_settings['column_active'] === 'three') {
//                     $columns = '3';
//                 } else if($sampression_options_settings['column_active'] === 'four') {
//                     $columns = '4';
//                 }
//                 switch ( $columns ) {
//                     case '1':
//                         $classes[] = 'twelve';
//                         break;
//                     case '2':
//                         $classes[] = 'six';
//                         break;
//                     case '3':
//                         $classes[] = 'four';
//                         break;
//                     default:
//                         $classes[] = 'three';
//                         break;
//                 }
//             } else {
//                 $classes[] = 'three';
//             }
//             $classes[] = 'columns item';
//         }
//         if( is_archive() ) {
//             $classes[] = 'four columns item';
//         }
//         if( is_search() ) {
//             $classes[] = 'twelve columns item';
//         }
//         if( is_attachment() ) {
//             $classes[] = 'post';
//         }
//         return $classes;
//     }

// endif;
// add_filter( 'post_class', 'sampression_post_class' );

if (!function_exists('sampression_body_class')) {
    function sampression_body_class($classes)
    {
        $classes[] = 'top';
        if (get_theme_mod('website_layout') === 'full-width-layout') {
            $classes[] = 'full-width-layout';
        }
        return $classes;
    }
}
add_filter('body_class', 'sampression_body_class');

if (!function_exists('sampression_entry_date')) {
    /**
     * Displays published date for posts
     */
    function sampression_entry_date()
    {

        $link_string = sprintf('<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
            esc_url(get_permalink()),
            get_the_time(),
            get_the_date()
        );

        printf('<time class="col posted-on genericon-day" datetime="%1$s">%2$s</time>',
            esc_attr(get_the_date('c')),
            $link_string
        );

    }

}

if (!function_exists('sampression_entry_date_comment')) {
    /**
     * Displays published date and comment for posts
     */
    function sampression_entry_date_comment()
    {

        $link_string = sprintf('<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
            esc_url(get_permalink()),
            get_the_time(),
            get_the_date()
        );

        printf('<time class="col posted-on genericon-day" datetime="%1$s">%2$s</time>',
            esc_attr(get_the_date('c')),
            $link_string
        );

        sampression_entry_comment($comment = '');

    }

}

if (!function_exists('sampression_entry_comment')) {
    /**
     * Displays comment count for posts
     */
    function sampression_entry_comment($comment_nayalite)
    {

        if ($comment_nayalite != '') {
            if (!post_password_required() && (comments_open() && get_comments_number() > 0)) {
                if ($comment_nayalite != 'meta_single') {
                    echo "<div class='meta clearfix'>";
                }
                echo ',<span class="col count-comment genericon-comment">';
                comments_popup_link(('0'), __('1 comment', 'naya-lite'), __('% comments', 'naya-lite'));
                echo '</span>';
                if ($comment_nayalite != 'meta_single') {
                    echo "</div>";
                }

            }
        } else {
            global $sampression_options_settings;
            $hide_metas = array();
            if (isset($sampression_options_settings['show_meta_comment_count'])) {
                $hide_metas[] = 'comment-count';
            }
            if (!post_password_required() && (comments_open() && get_comments_number() > 0)) {
                echo ',<span class="col count-comment genericon-comment">';
                comments_popup_link(('0'), __('1 comment', 'naya-lite'), __('% comments', 'naya-lite'));
                echo '</span>';
            }
        }

    }
}

if (!function_exists('sampression_entry_author')) {
    /**
     * Displays author name and author archive url for posts
     */
    function sampression_entry_author()
    {
        printf('<div class="post-author genericon-user col"> Posted By <a class="url fn n" href="%1$s" title="%2$s">%3$s</a></div>',
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            _x('View all posts by ', 'There is a space after the comma.', 'naya-lite') . get_the_author(),
            get_the_author()
        );
    }

}


if (!function_exists('sampression_entry_category')) {
    /**
     * Displays categories lists with its archive links for posts
     */
    function sampression_entry_category()
    {
        if ('post' === get_post_type()) {
            $overflow_wrapper_open = '<div class="overflow-hidden cat-listing"> &nbsp;Under ';
            $overflow_wrapper_close = '</div>';
            if (is_single()) {
                $overflow_wrapper_open = '';
                $overflow_wrapper_close = '';
            }
            $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'naya-lite'));
            if ($categories_list) {
                printf('<div class="cats genericon-category">%1$s %2$s %3$s</div>',
                    $overflow_wrapper_open,
                    $categories_list,
                    $overflow_wrapper_close
                );
            }
        }
    }

}

if (!function_exists('sampression_entry_tag')) {
    /**
     * Displays tags lists with its archive links for posts
     */
    function sampression_entry_tag()
    {
        if ('post' === get_post_type()) {
            $overflow_wrapper_open = '<div class="overflow-hidden tag-listing">';
            $overflow_wrapper_close = '</div>';
            $tag_wrapper_open = '<div class="meta"> ';
            $tag_wrapper_close = '</div>';
            if (is_single()) {
                $overflow_wrapper_open = '';
                $overflow_wrapper_close = '';
                $tag_wrapper_open = '';
                $tag_wrapper_close = '';
            }
            $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'naya-lite'));
            if ($tags_list) {
                echo $tag_wrapper_open;
                printf('<div class="tags genericon-tag tags-links">%1$s  %2$s  %3$s</div>',
                    $overflow_wrapper_open,
                    $tags_list,
                    $overflow_wrapper_close
                );
                echo $tag_wrapper_close;
            }
        }
    }

}

if (!function_exists('sampression_edit_post_link')) {
    /**
     * Displays edit link for posts if user logged in
     */
    function sampression_edit_post_link()
    {
        if (is_user_logged_in()) {
            ?>
            <div class="meta clearfix">
                <div class="edit genericon-edit">
                    <?php edit_post_link(__('Edit', 'naya-lite')); ?>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('sampression_post_entry_meta')) {
    function sampression_post_entry_meta()
    {
        global $sampression_options_settings;
        $hide_metas = array();
        if ((get_theme_mod('hide_post_metas'))) {
            $hide_metas = get_theme_mod('hide_post_metas');
        } else {
            if ($sampression_options_settings['show_meta_date'] != 'yes') {
                $hide_metas[] = 'date';
            }
            if ($sampression_options_settings['show_meta_author'] != 'yes') {
                $hide_metas[] = 'author';
            }
            if ($sampression_options_settings['show_meta_categories'] != 'yes') {
                $hide_metas[] = 'categories';
            }
            if ($sampression_options_settings['show_meta_tags'] != 'yes') {
                $hide_metas[] = 'tags';
            }
            if ($sampression_options_settings['show_meta_comment_count'] != 'yes') {
                $hide_metas[] = 'comment-count';
            }


        }
        if (!in_array('date', $hide_metas) && in_array('comment-count', $hide_metas)) {
            echo '<div class="meta clearfix">';
            sampression_entry_date();
            echo '</div>';
        }
        if (!in_array('comment-count', $hide_metas) && in_array('date', $hide_metas)) {
            sampression_entry_comment('meta');
        }
        if (!in_array('comment-count', $hide_metas) && !in_array('date', $hide_metas)) {
            echo '<div class="meta clearfix">';
            sampression_entry_date_comment();
            echo '</div>';
        }
        if (!in_array('author', $hide_metas)) {
            echo '<div class="meta clearfix">';
            sampression_entry_author();
            echo '</div>';
        }
        if (!in_array('categories', $hide_metas)) {
            echo '<div class="meta">';
            sampression_entry_category();
            echo '</div>';
        }
        if (!in_array('tags', $hide_metas)) {
            sampression_entry_tag();
        }

        sampression_edit_post_link();
    }

}

if (!function_exists('sampression_post_entry_meta_single')) {
    function sampression_post_entry_meta_single()
    {
        global $sampression_options_settings;
        $hide_metas = array();
        if (get_theme_mod('hide_post_metas')) {
            $hide_metas = get_theme_mod('hide_post_metas');
        } else {
            if (isset($sampression_options_settings['show_meta_date'])) {
                $hide_metas[] = 'date';
            }
            if (isset($sampression_options_settings['show_meta_author'])) {
                $hide_metas[] = 'author';
            }
            if (isset($sampression_options_settings['show_meta_categories'])) {
                $hide_metas[] = 'categories';
            }
            if (isset($sampression_options_settings['show_meta_tags'])) {
                $hide_metas[] = 'tags';
            }
            if (isset($sampression_options_settings['show_meta_comment_count'])) {
                $hide_metas[] = 'comment-count';
            }


        }

        if (!in_array('date', $hide_metas) || !in_array('author', $hide_metas) || !in_array('categories', $hide_metas) || !in_array('tags', $hide_metas)) {
            echo '<div class="meta clearfix">';
            if (!in_array('author', $hide_metas)) {
                sampression_entry_author();
            }
            if (!in_array('date', $hide_metas) && in_array('comment-count', $hide_metas)) {
                //echo '<div class="meta clearfix">';
                sampression_entry_date();
                //echo '</div>';
            }
            if (!in_array('categories', $hide_metas)) {
                sampression_entry_category();
            }
            if (!in_array('tags', $hide_metas)) {
                sampression_entry_tag();
            }

            if (!in_array('comment-count', $hide_metas) && !in_array('date', $hide_metas)) {
                //echo '<div class="meta clearfix">';
                sampression_entry_date_comment();
                //echo '</div>';
            }
             if (!in_array('comment-count', $hide_metas) && in_array('date', $hide_metas)) {
                sampression_entry_comment('meta_single');
            }

            echo '</div>';
        }
    }

}

if (!function_exists('sampression_social_media')) {

    function sampression_social_media()
    {
        global $sampression_options_settings;
        if (get_theme_mod('sampression_socials_facebook') || get_theme_mod('sampression_socials_twitter') || get_theme_mod('sampression_socials_youtube')
            || get_theme_mod('sampression_socials_googleplus') || get_theme_mod('sampression_socials_tumblr') || get_theme_mod('sampression_social_pinterest')
            || get_theme_mod('sampression_social_linkedin') || get_theme_mod('sampression_social_github') || get_theme_mod('sampression_social_instagram')
            || get_theme_mod('sampression_social_flickr') || get_theme_mod('sampression_social_vimeo') || $sampression_options_settings['social_facebook_url'] != '' ||
            $sampression_options_settings['social_twitter_url'] != '' || $sampression_options_settings['social_youtube_url'] != '' || $sampression_options_settings['social_googleplus_url'] != ''
            || $sampression_options_settings['social_linkedin_url'] != ''
        ) {
            ?>
            <ul class="sm-top">
                <?php if (get_theme_mod('sampression_socials_facebook') || $sampression_options_settings['social_facebook_url'] != '') { ?>
                    <li class="sm-top-fb">
                        <a class="genericon-facebook-alt"
                           href="<?php if (get_theme_mod('sampression_socials_facebook')) {
                               echo esc_url(get_theme_mod('sampression_socials_facebook'));
                           } else {
                               echo $sampression_options_settings['social_facebook_url'];
                           } ?>" target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_twitter') || $sampression_options_settings['social_twitter_url'] != '') { ?>
                    <li class="sm-top-tw">
                        <a class="genericon-twitter" href="<?php if (get_theme_mod('sampression_socials_twitter')) {
                            echo esc_url(get_theme_mod('sampression_socials_twitter'));
                        } else {
                            echo $sampression_options_settings['social_twitter_url'];
                        } ?>" target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_youtube') || $sampression_options_settings['social_youtube_url'] != '') { ?>
                    <li class="sm-top-youtube">
                        <a class="genericon-youtube" href="<?php if (get_theme_mod('sampression_socials_youtube')) {
                            echo esc_url(get_theme_mod('sampression_socials_youtube'));
                        } else {
                            echo $sampression_options_settings['social_youtube_url'];
                        } ?>" target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_googleplus') || $sampression_options_settings['social_googleplus_url'] != '') { ?>
                    <li class="sm-top-gplus">
                        <a class="genericon-googleplus"
                           href="<?php if (get_theme_mod('sampression_socials_googleplus')) {
                               echo esc_url(get_theme_mod('sampression_socials_googleplus'));
                           } else {
                               echo $sampression_options_settings['social_googleplus_url'];
                           } ?>" target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_tumblr')) { ?>
                    <li class="sm-top-tumblr">
                        <a class="genericon-tumblr"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_tumblr')); ?>"
                           target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_pinterest')) { ?>
                    <li class="sm-top-pinterest">
                        <a class="genericon-pinterest"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_pinterest')); ?>"
                           target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_linkedin') || $sampression_options_settings['social_linkedin_url'] != '') { ?>
                    <li class="sm-top-linkedin">
                        <a class="genericon-linkedin" href="<?php if (get_theme_mod('sampression_socials_linkedin')) {
                            echo esc_url(get_theme_mod('sampression_socials_linkedin'));
                        } else {
                            echo $sampression_options_settings['social_linkedin_url'];
                        } ?>" target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_github')) { ?>
                    <li class="sm-top-github">
                        <a class="genericon-github"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_github')); ?>"
                           target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_instagram')) { ?>
                    <li class="sm-top-instagram">
                        <a class="genericon-instagram"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_instagram')); ?>"
                           target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_flickr')) { ?>
                    <li class="sm-top-flickr">
                        <a class="genericon-flickr"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_flickr')); ?>"
                           target="_blank"></a>
                    </li>
                <?php }
                if (get_theme_mod('sampression_socials_vimeo')) { ?>
                    <li class="sm-top-vimeo">
                        <a class="genericon-vimeo"
                           href="<?php echo esc_url(get_theme_mod('sampression_socials_vimeo')); ?>"
                           target="_blank"></a>
                    </li>
                <?php } ?>
            </ul>
            <!-- .sm-top -->
            <?php
        }
    }

}


if (!function_exists('sampression_has_embed')) {
    /**
     * Check for the URL if the_content have any video support url
     */
    function sampression_has_embed()
    {

        global $post;

        if ($post && $post->post_content) {

            global $shortcode_tags;
            //print_r($shortcode_tags);
            // Make a copy of global shortcode tags - we'll temporarily overwrite it.
            $theme_shortcode_tags = $shortcode_tags;

            // The shortcodes we're interested in.
//            $shortcode_tags = array(
//                'video' => $theme_shortcode_tags['video'],
//                'embed' => $theme_shortcode_tags['embed']
//            );
            //print_r($shortcode_tags);
            // Get the absurd shortcode regexp.
            $video_regex = '#' . get_shortcode_regex() . '#i';

            // Restore global shortcode tags.
            // $shortcode_tags = $theme_shortcode_tags;

            $pattern_array = array($video_regex);

            // Get the patterns from the embed object.
            if (!function_exists('_wp_oembed_get_object')) {
                include ABSPATH . WPINC . '/class-oembed.php';
            }
            $oembed = _wp_oembed_get_object();
            $pattern_array = array_merge($pattern_array, array_keys($oembed->providers));

            // Or all the patterns together.
            function pattern_nayalite($carry, $item)
            {
                if (strpos($item, '#') === 0) {
                    // Assuming '#...#i' regexps.
                    $item = substr($item, 1, -2);
                } else {
                    // Assuming glob patterns.
                    $item = str_replace('*', '(.+)', $item);
                }
                return $carry ? $carry . ')|(' . $item : $item;
            }

            $pattern = '#(' . array_reduce($pattern_array, pattern_nayalite()) . ')#is';

            // Simplistic parse of content line by line.
            $lines = explode("\n", $post->post_content);
            //print_r($lines);
            foreach ($lines as $line) {
                $line = trim($line);
                if (preg_match($pattern, $line, $matches)) {
                    if (strpos($matches[0], '[') === 0) {
                        $ret = do_shortcode($matches[0]);
                    } else {
                        $ret = wp_oembed_get($matches[0]);
                    }
                    return $ret;
                }
            }
        }
    }
}

if (!function_exists('sampression_get_url_in_content')) {
    /**
     * Get first URL from the_content
     */
    function sampression_get_url_in_content()
    {
        $content = get_the_content();
        $has_url = get_url_in_content($content);
        return ($has_url) ? $has_url : apply_filters('the_permalink', get_permalink());
    }
}

/**
 * [soundcloud_shortcode description]
 * auto_play  = true / false
 * hide_related = true / false
 * show_comments = true / false
 * show_user - true / false
 * show_reposts = true / false
 * visual = true / false
 *
 * width = 100%
 * height = 450
 * iframe = true / false
 *
 * [soundcloud url="https://api.soundcloud.com/tracks/245048301" params="auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&visual=true" width="100%" height="450" iframe="true" /]
 */
function sampression_soundcloud_shortcode($atts, $content = null)
{
    $shortcode_options = array_merge(array('url' => trim($content)), is_array($atts) ? $atts : array());

    $shortcode_params = array();
    if (isset($shortcode_options['params'])) {
        parse_str(html_entity_decode($shortcode_options['params']), $shortcode_params);
    }
    $shortcode_options['params'] = $shortcode_params;

    // The "url" option is required
    if (!isset($shortcode_options['url'])) {
        return '';
    }

    // Both "width" and "height" need to be integers
    if (isset($shortcode_options['width']) && !preg_match('/^\d+$/', $shortcode_options['width'])) {
        // set to 0 so oEmbed will use the default 100% and WordPress themes will leave it alone
        $shortcode_options['width'] = 0;
    }
    if (isset($shortcode_options['height']) && !preg_match('/^\d+$/', $shortcode_options['height'])) {
        unset($shortcode_options['height']);
    }

    // Return html embed code
    if ($shortcode_options['iframe'] == 'true') {
        return sampression_soundcloud_iframe_widget($shortcode_options);
    } else {
        return sampression_soundcloud_flash_widget($shortcode_options);
    }
}

//add_shortcode("soundcloud", "sampression_soundcloud_shortcode");

function sampression_soundcloud_iframe_widget($options)
{

    $url = $options['url'] . '&' . http_build_query($options['params']);
    $width = isset($options['width']) && $options['width'] !== 0 ? $options['width'] : '100%';
    $height = isset($options['height']) && $options['height'] !== 0
        ? $options['height']
        : (soundcloud_url_has_tracklist($options['url']) || (isset($options['params']['visual']) && $options['params']['visual'] == 'true') ? '450' : '166');
    return sprintf('<iframe width="%s" height="%s" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=%s"></iframe>',
        $width, $height, $url
    );
}

function sampression_soundcloud_flash_widget($options)
{
    return '<object height="81" width="100%">
  <param name="movie" value="http://player.soundcloud.com/player.swf?url=https://api.soundcloud.com/tracks/245048301&enable_api=true"></param>
  <param name="allowscriptaccess" value="always"></param>
  <embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?url=https://api.soundcloud.com/tracks/245048301&enable_api=true" type="application/x-shockwave-flash" width="100%"></embed>
</object>';
    $url = 'https://player.soundcloud.com/player.swf?' . http_build_query($options['params']) . '&url=' . $options['url'];
    //$url = $options['url'] . '&' . http_build_query($options['params']);
    $width = isset($options['width']) && $options['width'] !== 0 ? $options['width'] : '100%';
    $height = isset($options['height']) && $options['height'] !== 0
        ? $options['height']
        : (soundcloud_url_has_tracklist($options['url']) || (isset($options['params']['visual']) && $options['params']['visual'] == 'true') ? '255' : '81');
    return sprintf('<object height="%s" width="%s"><param name="movie" value="%s"></param><param name="allowscriptaccess" value="always"></param><embed allowscriptaccess="always" height="%s" src="%s" type="application/x-shockwave-flash" width="%s"></embed></object>',
        $height, $width, $url, $height, $url, $width
    );
}

function soundcloud_url_has_tracklist($url)
{
    return preg_match('/^(.+?)\/(sets|groups|playlists)\/(.+?)$/', $url);
}

if (!function_exists('sampression_comment')) :

    function sampression_comment($comment, $args, $depth)
    {
        //$GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="post pingback">
                <p><?php _e('Pingback:', 'naya-lite'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'naya-lite'), '<span class="edit-link">', '</span>'); ?></p>
                <?php
                break;
            default :
                ?>
                <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <div class="avatar-wrapper">
                        <span class="pointer"></span>
                        <div class="avatar">
                            <?php // Get Avatar
                            $avatar_size = 80;
                            if ('0' != $comment->comment_parent)
                                $avatar_size = 80;

                            echo get_avatar($comment, $avatar_size);
                            ?>
                        </div>
                        <!-- .avatar -->
                    </div>
                    <!-- .col-2 -->
                    <div class="comment-wrapper">
                        <div class="comment-entry">
                            <header class="comment-meta clearfix">
                                <div class="comment-author">
                                    <?php

                                    /* translators: 1: comment author, 2: date and time */
                                    printf(__('%1$s on %2$s', 'naya-lite'),
                                        sprintf('<span class="fn">%s</span>', get_comment_author_link()),
                                        sprintf('<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            /* translators: 1: date, 2: time */
                                            sprintf(__('<span class="date-details">%1$s</span>', 'naya-lite'), get_comment_date(), get_comment_time())
                                        )
                                    );
                                    ?>
                                </div><!-- .comment-author  -->
                                <?php edit_comment_link(__('Edit', 'naya-lite'), '<span class="edit-link">', '</span>'); ?>

                                <div class="reply">
                                    <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply <span>&darr;</span>', 'naya-lite'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                </div><!-- .reply -->
                            </header>
                            <div class="comment-content"><?php comment_text(); ?></div>

                        </div>

                        <?php /*if ( $comment->comment_approved == '0' ) : ?>
                    <div class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'naya-lite' ); ?></div>
            <?php endif; */ ?>


                </article><!-- #comment-## -->

                <?php
                break;
        endswitch;
    }
endif; // ends check for sampression_comment()

if (!function_exists('sampression_posts_navi')) :
    /**
     * Displays post navigation
     */
    function sampression_posts_navi($nav_id)
    {
        global $wp_query;

        if ($wp_query->max_num_pages > 1) : ?>
            <nav id="<?php echo $nav_id; ?>" class="post-navigation clearfix" role="navigation">
                <?php
                /**
                 * Navigation support for WP-PageNavi plugin
                 * @https://wordpress.org/plugins/wp-pagenavi/
                 */
                if (function_exists('wp_pagenavi')) {
                    wp_pagenavi();
                } else {
                    if (!get_theme_mod('page_navigation') || get_theme_mod('page_navigation') === 'default') {
                        ?>
                        <div class="container">
                            <div class="nav-previous alignleft">
                                <?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'naya-lite')); ?>
                            </div>
                            <div class="nav-next alignright">
                                <?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'naya-lite')); ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'prev_text' => __('<span class="meta-nav">&larr;</span> Previous', 'naya-lite'),
                            'next_text' => __('Next <span class="meta-nav">&rarr;</span>', 'naya-lite'),
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $wp_query->max_num_pages
                        ));

                    }
                }
                ?>
            </nav>
        <?php endif;
    }
endif;


function pre($arr, $die = false)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    if ($die) {
        die;
    }
}


function sampression_sticky_ping()
{
    $code = '';
    $code .= '<svg version="1.1" class="sticky-icon" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12px" height="20px"
     viewBox="0 0 12 20" enable-background="new 0 0 12 20" xml:space="preserve">
            <g id="Mockups" sketch:type="MSPage">
                <g id="sam-lite---home-typography" transform="translate(-408.000000, -239.000000)" sketch:type="MSArtboardGroup">
                    <path id="Rectangle-202" sketch:type="MSShapeGroup" fill="#333333" fill-opacity="1" d="M408,239h12v20l-5.708-4L408,259V239z"
                        />
                </g>
            </g>
       </svg>';
    return $code;

}


if (!isset($content_width)) $content_width = 900;
function customizer_widgets_section_args_nayalite($args)
{
    $args['active_callback'] = '__return_true';
    return $args;
}

add_filter('customizer_widgets_section_args', 'customizer_widgets_section_args_nayalite');


