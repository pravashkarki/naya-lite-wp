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

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'naya-lite' ); ?></a>

<div id="wrapper">
    <div id="inner-wrapper">

        <header id="header" class="block">
            <div class="container">
                <div class="six columns">
                    <span id="trigger-primary-nav"><a href="#primary-nav"><i class="icon-menu6"></i>&nbsp;</a></span>
                    <div class="site-title-wrap">
                        <?php $sampression_remove_logo = sampression_get_option( 'sampression_remove_logo' ); ?>

                        <?php
                        if ( has_custom_logo() && true !== $sampression_remove_logo ) {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"
                               id="logo-area">
                                <?php echo get_custom_logo(); ?>
                            </a>
                            <?php
                        } else { ?>
                            <h1 id="site-title" class="site-title">
                                <a rel="home" title="<?php bloginfo('name') ?>"
                                   href="<?php echo esc_url(home_url()) ?>"><?php bloginfo('name') ?></a>
                            </h1>
                            <?php
                        }
                        ?>

                        <?php $sampression_remove_tagline = sampression_get_option( 'sampression_remove_tagline' ); ?>

                        <?php if ( true !== $sampression_remove_tagline ) : ?>
                        	<h2 id="site-description" class="site-description"><?php bloginfo('description') ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="ten columns">
                    <div class="social-connect" id="social-connect">
                        <?php sampression_social_media_icons() ?>
                    </div><!-- .social-connect-->
                </div>
                <nav id="primary-nav" class="clearfix" role="navigation">

                    <?php sampression_navigation(); ?>

                </nav>
                <!-- #primary-nav -->
            </div>
        </header><!--/#header-->
