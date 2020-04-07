<?php
/**
 * Default template for displaying Image post format
 * @package sampression framework v 1.0
 * @theme naya 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'restricted access' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( sampression_post_class() ); ?> itemtype="http://schema.org/Article" itemscope="itemscope" role="article">
    <header class="entry-header">
        <?php sampression_the_title() ?>
    </header>
    <div class="entry-meta">
        <i class="icon-image5"></i>
        <?php sampression_post_meta();
        //sampression_post_entry_meta_single(); ?>
    </div>
    <div class="entry-content" itemprop="articleBody"> 
        <?php
        sampression_post_thumbnail();
        the_content();
        wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
            ) );
        ?>
    </div>
    <?php sampression_readmore_link() ?>
</article>