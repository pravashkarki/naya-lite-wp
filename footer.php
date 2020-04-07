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
<footer id="footer" class="block">
    <div class="container">
        <div class="sixteen columns">
            <div class="site-info ten columns">
                <?php if (true !== sampression_get_option( 'sampression_remove_copyright_text' ) ) { ?>
                    <div class="alignleft powered-wp copyright">

                        <?php $sampression_copyright_text = sampression_get_option( 'sampression_copyright_text' ); ?>

                        <?php if ( ! empty( $sampression_copyright_text ) ) : ?>
                        	<?php echo wp_kses_post( $sampression_copyright_text ); ?>
                        <?php else: ?>
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
                        <?php endif; ?>

                    </div>
                <?php }
                ?>
            </div>

            <div class="six columns">
                <div class="social-connect social-footer">
                    <?php sampression_social_media_icons(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!--/#inner-wrapper-->
</div>

<?php wp_footer(); ?>

</body>
</html>
