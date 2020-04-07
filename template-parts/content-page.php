<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package naya_lite
 */

?>
<div <?php post_class(); ?> >
      <header class="entry-header">
        <?php sampression_the_title() ?>
    </header>
        <?php sampression_post_thumbnail(); ?>
   <div class="entry-content">
        <?php
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'naya-lite' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            ) );
        ?>
    </div>
</div>


