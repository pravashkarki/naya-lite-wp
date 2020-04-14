<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package naya_lite
 */

get_header(); ?>

    <section class="block">
        <div class="container">
            <?php

            $position = sampression_sidebar_position();

            if ($position === 'left') {

                echo '<div class="left-sidebar-wrp four columns ">';

                get_sidebar();

                echo '</div>';
            }
            ?>
            <div class="<?php sampression_content_class() ?>">
                <div id="primary-content">

                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php

                            $single_format = array('standard');

                            if (in_array(sampression_get_post_format(), $single_format)) {
                                ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
                                         itemscope="itemscope" itemtype="http://schema.org/Article" role="article">
                                    <header class="entry-header">

                                        <?php sampression_the_title() ?>

                                    </header>

                                    <?php sampression_post_thumbnail(); ?>

                                    <div class="entry-meta meta">
                                        <?php sampression_post_meta(); ?>
                                    </div>

                                    <div class="entry-content" itemprop="articleBody">
                                        <?php
                                        the_content();
                                        wp_link_pages(array(
                                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'naya-lite') . '</span>',
                                            'after' => '</div>',
                                            'link_before' => '<span>',
                                            'link_after' => '</span>',
                                        ));
                                        ?>
                                    </div>
                                </article>
                                <?php
                            } else {
                                get_template_part('template-parts/content', get_post_format());
                            }

                            ?>
                        <?php endwhile; ?>

                        <?php sampression_content_nav(); ?>
                        <!-- content navigation -->
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number())
                            comments_template();
                        ?>

                    <?php else : ?>

                        <?php get_template_part('content', 'none'); ?>

                    <?php endif; ?>
                    <!-- .post-->

                </div>
                <!-- #primary-content-->
            </div>
            <?php
            $position = sampression_sidebar_position();

            if ($position === 'right') {

                echo '<div class="left-sidebar-wrp four offset-by-one columns">';

                get_sidebar();

                echo '</div>';

            }

            ?>
        </div>
    </section><!--.block-->
<?php get_footer();
