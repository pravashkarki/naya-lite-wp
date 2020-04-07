<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package naya_lite
 */

get_header();
?>
    <section class="block">
        <div class="container">
            <!--add right sidebar-->
            <?php
            $position = sampression_sidebar_position();

            if ($position === 'left') {

                echo '<div class="left-sidebar-wrp four columns ">';

                get_sidebar();

                echo '</div>';
            }
            ?>
            <!--#add right sidebar-->
            <div id="content" class="<?php sampression_content_class() ?>">
                <?php if (have_posts()) :
                    /* Start the Loop */

                    while (have_posts()) : the_post();

                        get_template_part('template-parts/content', get_post_format());

                    endwhile;
                    sampression_content_nav();

                else :

                    get_template_part('content', 'none');

                endif; ?>
                <!-- .post-->
            </div>
            <!--#content-->
            <!--add right sidebar-->
            <?php
            if ($position === 'right') {
                echo '<div class="left-sidebar-wrp four offset-by-one columns ">';

                get_sidebar();

                echo '</div>';
            }
            ?>
            <!--#add right sidebar-->

        </div>
    </section>
    <!-- .block-->

<?php
get_footer();
