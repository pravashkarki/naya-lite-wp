<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

                    <?php
                    if (have_posts()) : ?>

                        <header class="page-header">
                            <h1 class="page-title"><?php
                                /* translators: %s: search query. */
                                printf(esc_html__('Search Results for: %s', 'naya-lite'), '<span>' . get_search_query() . '</span>');
                                ?></h1>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>


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