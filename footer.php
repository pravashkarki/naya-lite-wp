<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package naya_lite
 */

?>

<?php
/**
 * sampression_before_footer hook
 */
do_action('sampression_before_footer');
?>
<footer id="footer" class="block">
    <div class="container">
        <div class="sixteen columns">
            <div class="site-info ten columns">
                <?php if (get_theme_mod('sampression_remove_copyright_text') != 1) { ?>
                    <div class="alignleft powered-wp copyright">
                        <?php
                        if (get_theme_mod('sampression_copyright_text')) {
                            echo get_theme_mod('sampression_copyright_text');
                        } else { ?>
                            <?php printf(esc_html__('&copy; 2017. A theme by ', 'naya-lite')); ?>
                            <a href="<?php echo esc_url(__('sampression.com', 'naya-lite')); ?>"><?php
                                /* translators: %s: CMS name, i.e. WordPress. */
                                printf(esc_html__(' %s', 'naya-lite'), 'Sampression');
                                ?></a>
                            <?php printf(esc_html__('. Powered by', 'naya-lite')); ?>
                            <a href="<?php echo esc_url(__('wordpress.org', 'naya-lite')); ?>"><?php
                                /* translators: %s: CMS name, i.e. WordPress. */
                                printf(esc_html__(' %s', 'naya-lite'), 'WordPress');
                                ?></a>
                        <?php }
                        ?>
                    </div>
                <?php }
                if (get_theme_mod('sampression_remove_credit_text') != 1) { ?>
                    <!-- <div class="alignleft credit "> -->
                    <?php
                    // if( get_theme_mod( 'sampression_credit_text' ) ) {
                    // 	echo get_theme_mod( 'sampression_credit_text' );
                    // } else {
                    // 	printf( esc_html__( 'A theme %1$s by %2$s.', 'naya-lite' ), 'naya-lite', '<a href="http://sampression.com/">Sampression</a>' );
                    // }
                    ?>
                    <!-- </div> -->
                <?php } ?>
            </div>

            <div class="six columns">
                <div class="social-connect social-footer">
                    <?php sampression_social_media_icons(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
/**
 * sampression_after_footer hook
 */
do_action('sampression_after_footer');
?>
</div>
<!--/#inner-wrapper-->
</div>

<?php wp_footer(); ?>

</body>
</html>
