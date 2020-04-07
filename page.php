<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

                            <?php get_template_part('template-parts/content', 'page'); ?>

                        <?php endwhile; ?>
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

                echo '<div class="left-sidebar-wrp four offset-by-one columns ">';

                get_sidebar();

                echo '</div>';

            }
            ?>
        </div>
    </section><!--.block-->
<?php get_footer(); 