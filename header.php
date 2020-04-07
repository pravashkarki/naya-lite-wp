<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package naya_lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div id="wrapper">
    <div id="inner-wrapper">

        <header id="header" class="block">
            <div class="container">
                <div class="six columns">
                    <span id="trigger-primary-nav"><a href="#primary-nav"><i class="icon-menu6"></i>&nbsp;</a></span>
                    <div class="site-title-wrap">
                        <?php // sampression_blog_title() ?>
                        <?php
                        if (get_theme_mod('custom_logo') && get_custom_logo() && get_theme_mod('sampression_remove_logo') != 1) {
                            ?>
                            <a href="<?php echo esc_url(site_url()) ?>" title="<?php bloginfo('name') ?>" rel="home"
                               id="logo-area">
                                <?php echo get_custom_logo(); ?>
                            </a>
                            <?php
                        } else if (check_custom_logo() !== false) { ?>
                            <a href="<?php echo esc_url(site_url()) ?>" title="<?php bloginfo('name') ?>" rel="home"
                               id="logo-area">
                                <img class="logo-img" src="<?php echo check_custom_logo(); ?>"
                                     alt="<?php bloginfo('name'); ?>">
                            </a>
                        <?php } else { ?>
                            <h1 id="site-title" class="site-title">
                                <a rel="home" title="<?php bloginfo('name') ?>"
                                   href="<?php echo esc_url(site_url()) ?>"><?php bloginfo('name') ?></a>
                            </h1>
                            <?php
                        }
                        if (get_theme_mod('sampression_remove_tagline') != 1) {
                            ?>
                            <h2 id="site-description" class="site-description"><?php bloginfo('description') ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="social-connect" id="social-connect">
                    <?php sampression_social_media_icons() ?>
                </div>
                <?php $header_image = get_header_image();
                if (!empty($header_image)) : ?>
                    <div class="jumbotron">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($header_image); ?>"
                                                                             class="header-image"
                                                                             width="<?php echo get_custom_header()->width; ?>"
                                                                             height="<?php echo get_custom_header()->height; ?>"
                                                                             alt="<?php echo get_bloginfo('name'); ?>"/>
                        </a>
                    </div>
                <?php endif; ?>
                <!-- .social-connect-->

                <nav id="primary-nav" class="clearfix" role="navigation">

                    <?php sampression_navigation(); ?>

                </nav>
                <!-- #primary-nav -->
            </div>
        </header><!--/#header-->


<?php

$test = get_theme_support(  'custom-background' );
nspre( $test );
 ?>
