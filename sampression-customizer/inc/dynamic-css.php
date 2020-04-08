<?php
if (!function_exists('sampression_header_style')) {

    function sampression_header_style()
    {
        global $sampression_options_settings;
        $webtitle = $webtitle_color = $webtagline = $primary_nav  = $social_media_icon = '';
        // Website Title Style
        if ((get_theme_mod('webtitle_font_family'))) {
            $webtitle .= 'font-family: ' . sampression_font_family(get_theme_mod('webtitle_font_family')) . ';';
        } else {
            if (get_theme_mod('body_font')) {
                $webtitle .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
            } else {
                if ($sampression_options_settings['web_title_font'] != '') {
                    $webtitle .= 'font-family: ' . sampression_font_family($sampression_options_settings['web_title_font']) . ';';
                }
            }
        }
        if (null !== get_theme_mod('webtitle_font_style')) {
            $webtitle .= sampression_font_style(get_theme_mod('webtitle_font_style'));
        }
        if (get_theme_mod('webtitle_font_color')) {
            $webtitle_color .= 'color: #' . get_theme_mod('webtitle_font_color', '') . ';';
        } else {
            if (get_theme_mod('title_textcolor')) {
                $webtitle_color .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                //web_title_color
                $webtitle_color .= 'color: ' . $sampression_options_settings['web_title_color'] . ';';
            }

        }
        // Website Tagline Style
        if ((get_theme_mod('webtagline_font_family'))) {
            $webtagline .= 'font-family: ' . sampression_font_family(get_theme_mod('webtagline_font_family')) . ';';
        } else {
            if (get_theme_mod('body_font')) {
                $webtagline .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
            } else {
                if ($sampression_options_settings['web_desc_font'] != '') {
                    $webtagline .= 'font-family: ' . sampression_font_family($sampression_options_settings['web_desc_font']) . ';';
                }
            }
        }
        if (get_theme_mod('webtagline_font_style')) {
            $webtagline .= sampression_font_style(get_theme_mod('webtagline_font_style'));
        }
        if (get_theme_mod('webtagline_font_color')) {
            $webtagline .= 'color: #' . get_theme_mod('webtagline_font_color') . ';';
        } else {
            if (get_theme_mod('body_textcolor') && get_theme_mod('webtagline_font_color') == '') {
                $webtagline .= 'color: ' . get_theme_mod('body_textcolor') . ';';
            } else {
                if ($sampression_options_settings['web_desc_color'] != '') {
                    $webtagline .= 'color: ' . $sampression_options_settings['web_desc_color'] . ';';
                }
            }
        }



        if ((get_theme_mod('use_social_default_color') === false)) {
            $social_media_icon .= 'color: #' . get_theme_mod('social_icon_color', '') . ';';
        }
        $full_width_nav = $full_width_nav_a = $full_width_nav_a_hover = '';
        if (get_theme_mod('sec_nav_background_color')) {
            $full_width_nav .= 'background-color: #' . get_theme_mod('sec_nav_background_color') . ';';
        }
        if ((get_theme_mod('secondarynav_font_family'))) {
            $full_width_nav_a .= 'font-family: ' . sampression_font_family(get_theme_mod('secondarynav_font_family')) . ';';
        }

        if (get_theme_mod('secondarynav_font_style')) {
            $full_width_nav_a .= sampression_font_style(get_theme_mod('secondarynav_font_style', 'all-caps'));
        }
        if (get_theme_mod('secondarynav_font_color')) {
            $full_width_nav_a .= 'color: #' . get_theme_mod('secondarynav_font_color') . ';';
        }
        if (get_theme_mod('secondarynav_font_color_hover')) {
            $full_width_nav_a_hover .= 'color: #' . get_theme_mod('secondarynav_font_color_hover') . ';';
        }
        $header_text = $header_text_hover = '';
        if ((get_theme_mod('title_font'))) {
            $header_text .= 'font-family: ' . sampression_font_family(get_theme_mod('title_font')) . ';';
        } else {
            if (!empty($sampression_options_settings['blog_post_title_font_family'])) {
                $header_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['blog_post_title_font_family']) . ';';
            }
        }
        $header_text .= sampression_font_style(get_theme_mod('headertext_font_style', 'bold'));
        if (get_theme_mod('title_textcolor')) {
            if (strpos(get_theme_mod('title_textcolor'), '#') !== false) {
                $header_text .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                $header_text .= 'color: #' . get_theme_mod('title_textcolor') . ';';
            }
        } else {
            if (($sampression_options_settings['blog_post_title_color'])) {
                $header_text .= 'color: ' . $sampression_options_settings['blog_post_title_color'] . ';';
            }
        }
        if (get_theme_mod('headertext_link_color')) {
            $header_text_hover .= 'color: #' . get_theme_mod('headertext_link_color') . ';';
        }
        $body_text = $bodytext_link_color = '';
        $bodytext_link_color_hover = '';
        if ((get_theme_mod('body_font'))) {
            $body_text .= 'font-family: ' . sampression_font_family(get_theme_mod('body_font')) . ';';
        } else {
            if (($sampression_options_settings['body_font_family'])) {
                $body_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['body_font_family']) . ';';
            }
        }
        $body_text .= sampression_font_style(get_theme_mod('bodytext_font_style'));
        if (get_theme_mod('body_textcolor')) {
            if (strpos(get_theme_mod('body_textcolor'), '#') !== false) {
                $body_text .= 'color: ' . get_theme_mod('body_textcolor') . ';';
            } else {
                $body_text .= 'color: #' . get_theme_mod('body_textcolor') . ';';
            }
        } else {
            if (isset($sampression_options_settings['body_font_color'])) {
                $body_text .= 'color: ' . $sampression_options_settings['body_font_color'] . ';';
            }
        }
        if (get_theme_mod('bodytext_font_size')) {
            if ((get_theme_mod('bodytext_font_size'))) {
                $body_text .= 'font-size: ' . sampression_font_family(get_theme_mod('bodytext_font_size')) . 'px;';
            }
        }

        if (get_theme_mod('body_link_color')) {
            //if (strpos(get_theme_mod( 'link_color'), '#') !== false) {
            $bodytext_link_color .= 'color: #' . get_theme_mod('body_link_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $bodytext_link_color .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (isset($sampression_options_settings['body_link_color'])) {
                    $bodytext_link_color .= 'color: ' . $sampression_options_settings['body_link_color'] . ';';
                }
            }
        }

        $filter_icon = $filter_text = '';




        $meta_text = $meta_text_color = $meta_text_color_hover = '';
        if ((get_theme_mod('metatext_font_family'))) {
            $meta_text .= 'font-family: ' . sampression_font_family(get_theme_mod('metatext_font_family')) . ';';
        } else {
            if (($sampression_options_settings['blog_meta_font_family'])) {
                $meta_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['blog_meta_font_family']) . ';';
            }
        }
        $meta_text .= sampression_font_style(get_theme_mod('metatext_font_style'));
        if (get_theme_mod('metatext_font_color')) {
            $meta_text_color .= 'color: #' . get_theme_mod('metatext_font_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $meta_text_color .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (($sampression_options_settings['blog_meta_font_color'])) {
                    $meta_text_color .= 'color: ' . $sampression_options_settings['blog_meta_font_color'] . ';';
                }
            }
        }
        if (get_theme_mod('metatext_link_color')) {
            $meta_text_color_hover .= 'color: #' . get_theme_mod('metatext_link_color') . ';';
        }


        $widget_text = $widget_text_link = $widget_heading_text = $widget_text_link_hover = '';
        if ((get_theme_mod('widgetText_heading_font_family'))) {
            $widget_heading_text .= 'font-family: ' . sampression_font_family(get_theme_mod('widgetText_heading_font_family')) . ';';
        } else {
            if (($sampression_options_settings['widget_header_font_family'])) {
                $widget_heading_text .= 'font-family: ' . sampression_font_family($sampression_options_settings['widget_header_font_family']) . ';';
            }
        }

        $widget_heading_text .= sampression_font_style(get_theme_mod('widgetText_heading_font_style'));

        if (get_theme_mod('widgetText_heading_font_color')) {
            $widget_heading_text .= 'color: #' . get_theme_mod('widgetText_heading_font_color') . ';';
        } else {
            if (get_theme_mod('title_textcolor')) {
                $widget_heading_text .= 'color: ' . get_theme_mod('title_textcolor') . ';';
            } else {
                if (($sampression_options_settings['widget_header_font_color'])) {
                    $widget_heading_text .= 'color: ' . $sampression_options_settings['widget_header_font_color'] . ';';
                }
            }
        }

        if ((get_theme_mod('widgetText_font_family'))) {
            $widget_text .= 'font-family: ' . sampression_font_family(get_theme_mod('widgetText_font_family')) . ';';
        }

        $widget_text .= sampression_font_style(get_theme_mod('widgetText_font_style'));
        if (get_theme_mod('widgetText_font_color')) {
            $widget_text .= 'color: #' . get_theme_mod('widgetText_font_color') . ';';
        }
        if (get_theme_mod('widgetText_link_color')) {
            $widget_text_link .= 'color: #' . get_theme_mod('widgetText_link_color') . ';';
        } else {
            if (get_theme_mod('link_color')) {
                $widget_text_link .= 'color: ' . get_theme_mod('link_color') . ';';
            } else {
                if (($sampression_options_settings['link_font_color'])) {
                    $widget_text_link .= 'color: ' . $sampression_options_settings['link_font_color'] . ';';
                }
            }
        }
        if (get_theme_mod('widgetText_hover_color')) {
            $widget_text_link_hover .= 'color: #' . get_theme_mod('widgetText_hover_color') . ';';
        }
        ?>


        <style id="sampression-header-style" type="text/css">
            <?php
            if($webtitle != '' ) {
            echo "#site-title { $webtitle }" . PHP_EOL;
            }
            if( get_theme_mod( 'webtitle_font_size' ) ) {
                $size = (int)get_theme_mod( 'webtitle_font_size' ) / 10;
                $webtitle_font_size = 'font-size: ' . get_theme_mod( 'webtitle_font_size' ) . 'px; ';
                $webtitle_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #site-title { $webtitle_font_size } }" . PHP_EOL;
            } else {
                if($sampression_options_settings['web_title_size'] != '') {
                    $size = $sampression_options_settings['web_title_size'] / 10;
                    $webtitle_font_size = 'font-size: ' . $sampression_options_settings['web_title_size'] . 'px; ';
                    $webtitle_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #site-title { $webtitle_font_size } }" . PHP_EOL;
                }
            }
            if($webtitle_color != '' ) {
            echo "#site-title a { $webtitle_color }" . PHP_EOL;
            }
            if($webtagline != '') {
            echo "#site-description { $webtagline }" . PHP_EOL;
            }
            if( get_theme_mod( 'webtagline_font_size' ) ) {
                $size = (int)get_theme_mod( 'webtagline_font_size' ) / 10;
                $webtagline_font_size = 'font-size: ' . get_theme_mod( 'webtagline_font_size' ) . 'px; ';
                $webtagline_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #site-description { $webtagline_font_size } }" . PHP_EOL;
            } else {
                if($sampression_options_settings['web_desc_size'] != '') {
                    $size = (int)$sampression_options_settings['web_desc_size'] / 10;
                    $webtagline_font_size = 'font-size: ' . $sampression_options_settings['web_desc_size'] . 'px; ';
                    $webtagline_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #site-description { $webtagline_font_size } }" . PHP_EOL;
                }
            }
            if($primary_nav != '' ) {
            echo "#top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a{ $primary_nav }" . PHP_EOL;
            }
            if(get_theme_mod( 'primarynav_font_color' )){
                echo ".sub-menu-toggle { color: #".get_theme_mod( 'primarynav_font_color' ) . "; }" . PHP_EOL;
                echo ".toggle-nav .ico-bar { background-color: #".get_theme_mod( 'primarynav_font_color' ) . "; }" . PHP_EOL;
            }
            if(get_theme_mod( 'primarynav_font_size' )){
                $size = (int)get_theme_mod( 'primarynav_font_size' ) / 10;
                $primary_nav_font_size = 'font-size: ' . get_theme_mod( 'primarynav_font_size' ) . 'px; ';
                $primary_nav_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $primary_nav_font_size } }" . PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['nav_font_size'] )) {
                    $size = (int)$sampression_options_settings['nav_font_size'] / 10;
                    $primary_nav_font_size = 'font-size: ' . $sampression_options_settings['nav_font_size'] . 'px; ';
                    $primary_nav_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #top-nav ul li a, #top-nav ul li li a,  #top-nav .sub-menu li a, #top-nav .sub-menu .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, #top-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $primary_nav_font_size } }" . PHP_EOL;
                }
            }

            if(!empty($social_media_icon) ) {
            echo ".sm-top li.sm-top-fb a, .sm-top li.sm-top-tw a, .sm-top li.sm-top-youtube a, .sm-top li.sm-top-gplus a, .sm-top li.sm-top-tumblr a,
             .sm-top li.sm-top-pinterest a, .sm-top li.sm-top-linkedin a, .sm-top li.sm-top-github a, .sm-top li.sm-top-instagram a, .sm-top li.sm-top-flickr a,
              .sm-top li.sm-top-vimeo a ,.social-connect a{ $social_media_icon }" . PHP_EOL;
            }
            if( !empty($full_width_nav ) ) {
            echo ".full-width #full-width-nav { $full_width_nav }" . PHP_EOL;
            echo "#full-width-nav ul ul { $full_width_nav }" . PHP_EOL;
            echo "#full-width-nav ul ul ul:before { border-right-color: #".get_theme_mod( 'sec_nav_background_color' ) . "; }" . PHP_EOL;
            echo "#full-width-nav ul li.edge ul ul:before { border-left-color: #".get_theme_mod( 'sec_nav_background_color' ) . "; }" . PHP_EOL;
            }
            if(!empty( $full_width_nav_a )) {
            echo ".full-width #full-width-nav ul li a, .full-width #full-width-nav ul li li a,  .full-width #full-width-nav .sub-menu li a, .full-width #full-width-nav .sub-menu .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a{ $full_width_nav_a }" . PHP_EOL;

            }
            if(get_theme_mod( 'secondarynav_font_color' )){
                echo "#full-width-nav .sub-menu-toggle:before, #full-width-nav .sub-menu-toggle.menu-open:before { color: #".get_theme_mod( 'secondarynav_font_color' ) . "; }" . PHP_EOL;
            }
            if(get_theme_mod( 'secondarynav_font_size' )){
                $size = (int)get_theme_mod( 'secondarynav_font_size' ) / 10;
                $secondarynav_font_size = 'font-size: ' . get_theme_mod( 'secondarynav_font_size' ) . 'px; ';
                $secondarynav_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .full-width #full-width-nav ul li a, .full-width #full-width-nav ul li li a,  .full-width #full-width-nav .sub-menu li a, .full-width #full-width-nav .sub-menu .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a, .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li a { $secondarynav_font_size } }" . PHP_EOL;

            }
            if( !empty($full_width_nav_a_hover ) ) {
            echo ".full-width #full-width-nav ul li a:hover,
            .full-width #full-width-nav ul li.current-menu-item > a,
            .full-width #full-width-nav ul li:hover > a,
            .full-width #full-width-nav .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:last-child > .sub-menu li:hover > a,
            .full-width #full-width-nav ul li.current-menu-ancestor a,
            .full-width #full-width-nav ul li.current-menu-parent a,
            .full-width #full-width-nav ul li li li a:hover,
            .full-width #full-width-nav ul li.current_page_item > a,
            .full-width #full-width-nav ul li.current_page_parent > a,
            .full-width #full-width-nav ul li.current_page_parent ul li.current_page_item > a { $full_width_nav_a_hover }" . PHP_EOL;
            }
            if( !empty($header_text ) ) {
            echo "#page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title,
            .entry-header .entry-title ,.page-title,.entry-title,.comments-title,.entry-title a,h1,h2,h3,h4,h5,h6{ $header_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'headertext_font_size' ) ) {
                $size = (int)get_theme_mod( 'headertext_font_size' ) / 10;
                $headertext_font_size = 'font-size: ' . get_theme_mod( 'headertext_font_size' ) . 'px; ';
                $headertext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  #page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title ,
                .entry-header .entry-title,.page-title,.entry-title,.comments-title,.entry-title a{ $headertext_font_size } }" . PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['blog_post_title_font_size'] )) {
                    $size = (int)$sampression_options_settings['blog_post_title_font_size'] / 10;
                    $headertext_font_size = 'font-size: ' . $sampression_options_settings['blog_post_title_font_size'] . 'px; ';
                    $headertext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  #page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title { $headertext_font_size } }" . PHP_EOL;
                }
            }

            if( !empty($header_text_hover) ) {
            echo "article.post .post-title a:hover ,article .entry-title > a:hover{ $header_text_hover }" . PHP_EOL;
            }
            if( !empty($body_text ) ) {
            echo "body .entry, body .comment-content , body .comment-content p,body .entry-content,body .entry-content p ,.entry-summary p,.page-content p,textarea{ $body_text }" . PHP_EOL;
            }
            if(get_theme_mod( 'bodytext_font_size' )){
                $h1_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 10;
                $h2_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 8;
                $h3_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 6;
                $h4_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 4;
                $h5_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 2;
                $h6_font_size = (int)get_theme_mod( 'bodytext_font_size' ) + 1;

                $size = (int)get_theme_mod( 'bodytext_font_size' ) / 10;
                $bodytext_font_size = 'font-size: ' . get_theme_mod( 'bodytext_font_size' ) . 'px; ';
                $bodytext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  body .entry, body .comment-content{ $bodytext_font_size }" . PHP_EOL;

                echo "body .entry h1{ font-size: ".$h1_font_size . "px; }" . PHP_EOL;
                echo "body .entry h2{ font-size: ".$h2_font_size . "px; }" . PHP_EOL;
                echo "body .entry h3{ font-size: ".$h3_font_size . "px; }" . PHP_EOL;
                echo "body .entry h4{ font-size: ".$h4_font_size . "px; }" . PHP_EOL;
                echo "body .entry h5{ font-size: ".$h5_font_size . "px; }" . PHP_EOL;
                echo "body .entry h6{ font-size: ".$h6_font_size . "px; }" . PHP_EOL;
                echo "}". PHP_EOL;
            } else {
                if(!empty($sampression_options_settings['body_font_size'] )) {
                    $h1_font_size = $sampression_options_settings['body_font_size'] + 10;
                    $h2_font_size = $sampression_options_settings['body_font_size'] + 8;
                    $h3_font_size = $sampression_options_settings['body_font_size'] + 6;
                    $h4_font_size = $sampression_options_settings['body_font_size'] + 4;
                    $h5_font_size = $sampression_options_settings['body_font_size'] + 2;
                    $h6_font_size = $sampression_options_settings['body_font_size'] + 1;

                    $size = $sampression_options_settings['body_font_size'] / 10;
                    $bodytext_font_size = 'font-size: ' . $sampression_options_settings['body_font_size'] . 'px; ';
                    $bodytext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  body .entry, body .comment-content{ $bodytext_font_size }" . PHP_EOL;

                    echo "body .entry h1{ font-size: ".$h1_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h2{ font-size: ".$h2_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h3{ font-size: ".$h3_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h4{ font-size: ".$h4_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h5{ font-size: ".$h5_font_size . "px; }" . PHP_EOL;
                    echo "body .entry h6{ font-size: ".$h6_font_size . "px; }" . PHP_EOL;
                    echo "}". PHP_EOL;
                }
            }
            if( ($bodytext_link_color ) ) {
            echo "body .entry a, body .comment-content a, .pingback a,.entry-content  a{ $bodytext_link_color }" . PHP_EOL;
            }

            if((get_theme_mod( 'bodytext_font_color' ))){
            echo "body .entry a:hover { color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            }
            if( ($filter_icon ) ) {
            echo "#primary-nav ul.nav-listing li a span { $filter_icon }" . PHP_EOL;
            }
            if( !empty($filter_text )) {
            echo "#primary-nav .nav-label, #filter a { $filter_text }" . PHP_EOL;
            }

            if(( get_theme_mod( 'bodytext_font_color' ) ) ) {
            echo "#primary-nav .nav-label { color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            echo "input[type='submit']:hover { background-color: #".get_theme_mod( 'bodytext_font_color' ) . "; }" . PHP_EOL;
            }
            if( ($meta_text ) ) {
            echo ".meta a, .comment-meta a, .logged-in-as a,.entry-meta a ,.entry-meta span{ ".$meta_text." }" . PHP_EOL;
            }
            if( (get_theme_mod( 'metatext_font_size' )  )) {
                $meta_icon_size = (int)get_theme_mod( 'metatext_font_size' ) + 8;
                $size = (int)get_theme_mod( 'metatext_font_size' ) / 10;
                $metatext_font_size = 'font-size: ' . get_theme_mod( 'metatext_font_size' ) . 'px; ';
                $metatext_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{ font-size: ".$meta_icon_size ."px; }" . PHP_EOL;
                echo ".meta a, .comment-meta a, .logged-in-as a ,.entry-meta span{ ".$metatext_font_size ."px; }" . PHP_EOL;
                echo "}". PHP_EOL;

            } else {
                if(($sampression_options_settings['blog_meta_font_size'] )) {
                    $meta_icon_size = (int)$sampression_options_settings['blog_meta_font_size'] + 8;
                    $size = (int)$sampression_options_settings['blog_meta_font_size'] / 10;
                    $metatext_font_size = 'font-size: ' . $sampression_options_settings['blog_meta_font_size'] . 'px; ';
                    $metatext_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{ font-size: ".$meta_icon_size ."px; }" . PHP_EOL;
                    echo ".meta a, .comment-meta a, .logged-in-as a { ".$metatext_font_size ."px; }" . PHP_EOL;
                    echo "}". PHP_EOL;
                }
            }
            if( ($meta_text_color )) {
            echo ".xmeta, .meta a, .comment-meta a, .logged-in-as a, body .genericon-edit .post-edit-link,.entry-meta a  { $meta_text_color }" . PHP_EOL;
            }
            if( ($meta_text_color_hover )) {
            echo ".meta a:hover, .url.fn.n:hover, .comment-meta a:hover, .logged-in-as a:hover, .overflow-hidden.cat-listing > a:hover ,.entry-meta a:hover { $meta_text_color_hover }" . PHP_EOL;
            }
            if( ($widget_heading_text )) {
            echo ".sidebar .widget .widget-title ,.widget .widget-title,.widget select{ $widget_heading_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'widgetText_heading_font_size' ) ) {
                $size = (int)get_theme_mod( 'widgetText_heading_font_size' ) / 10;
                $widgetText_heading_font_size = 'font-size: ' . get_theme_mod( 'widgetText_heading_font_size' ) . 'px; ';
                $widgetText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size } } .sidebar .widget .widget-title,.widget .widget-title,.widget select { $widgetText_heading_font_size }" . PHP_EOL;
            } else {
                if(($sampression_options_settings['widget_header_font_size'])) {
                    $size = (int)$sampression_options_settings['widget_header_font_size'] / 10;
                    $widgetText_heading_font_size = 'font-size: ' . $sampression_options_settings['widget_header_font_size'] . 'px; ';
                    $widgetText_heading_font_size .= 'font-size: ' . $size . 'rem;';
                    echo "@media (min-width: 769px) {  .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size } } .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size }" . PHP_EOL;
                }
            }
            if( ($widget_text )) {
            echo ".sidebar .widget { $widget_text } .widget ,.widget select { $widget_text }" . PHP_EOL;
            }
            if( get_theme_mod( 'widgetText_font_size' ) ) {
                $size = (int)get_theme_mod( 'widgetText_font_size' ) / 10;
                $widgetText_font_size = 'font-size: ' . get_theme_mod( 'widgetText_font_size' ) . 'px; ';
                $widgetText_font_size .= 'font-size: ' . $size . 'rem;';
                echo "@media (min-width: 769px) {  .sidebar .widget,.widget select { $widgetText_font_size } } .widget { $widgetText_font_size }" . PHP_EOL;
            }
            if( ($widget_text_link ) ) {
            echo ".sidebar .widget a , .widget a,.widget select{ $widget_text_link }" . PHP_EOL;
            }
            if( ($widget_text_link_hover )) {
            echo ".sidebar .widget a:hover,.widget a:hover { $widget_text_link_hover }" . PHP_EOL;
            }



            ?>
        </style>
        <?php
    }
}

add_action('wp_head', 'sampression_header_style', 999);
