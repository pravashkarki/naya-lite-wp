<?php
/**
 * Theme background image css callback
 */
if (!function_exists('naya_lite_custom_background_cb')):

    function naya_lite_custom_background_cb()
    {
        $background = get_background_image();
        $color = get_background_color();

        if (!$background && !$color)
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', 'repeat');

            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';

            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', 'left');

            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';

            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', 'scroll');

            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';

            $attachment = " background-attachment: $attachment;";

            $cover = '';
            if (get_theme_mod('sampression_background_cover')) {
                $cover = ' background-size: cover;';
            }

            $style .= $image . $repeat . $position . $attachment . $cover;
        }
        ?>
        <style type="text/css">
            #content-wrapper, body {
            <?php echo trim( $style ); ?>
            }
        </style>
        <?php
    }

endif;

