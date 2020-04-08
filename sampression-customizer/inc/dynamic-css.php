<?php

function sampression_header_style() {
    $webtitle = $webtitle_color = $webtagline = $social_media_icon = '';

    // Website Title Style
    if ((sampression_get_option('webtitle_font_family'))) {
        $webtitle .= 'font-family: ' . sampression_get_font_family(sampression_get_option('webtitle_font_family')) . ';';
    } else {
        if (sampression_get_option('body_font')) {
            $webtitle .= 'font-family: ' . sampression_get_font_family(sampression_get_option('body_font')) . ';';
        }
    }
    if (null !== sampression_get_option('webtitle_font_style')) {
        $webtitle .= sampression_font_style(sampression_get_option('webtitle_font_style'));
    }
    if (sampression_get_option('webtitle_font_color')) {
        $webtitle_color .= 'color: #' . sampression_get_option('webtitle_font_color', '') . ';';
    } else {
        if (sampression_get_option('title_textcolor')) {
            $webtitle_color .= 'color: ' . sampression_get_option('title_textcolor') . ';';
        }
    }

    // Website Tagline Style
    if ((sampression_get_option('webtagline_font_family'))) {
        $webtagline .= 'font-family: ' . sampression_get_font_family(sampression_get_option('webtagline_font_family')) . ';';
    } else {
        if (sampression_get_option('body_font')) {
            $webtagline .= 'font-family: ' . sampression_get_font_family(sampression_get_option('body_font')) . ';';
        }
    }
    if (sampression_get_option('webtagline_font_style')) {
        $webtagline .= sampression_font_style(sampression_get_option('webtagline_font_style'));
    }
    if (sampression_get_option('webtagline_font_color')) {
        $webtagline .= 'color: #' . sampression_get_option('webtagline_font_color') . ';';
    } else {
        if (sampression_get_option('body_textcolor') && sampression_get_option('webtagline_font_color') == '') {
            $webtagline .= 'color: ' . sampression_get_option('body_textcolor') . ';';
        }
    }



    if ((sampression_get_option('use_social_default_color') === false)) {
        $social_media_icon .= 'color: #' . sampression_get_option('social_icon_color', '') . ';';
    }

    $header_text = $header_text_hover = '';
    if ((sampression_get_option('title_font'))) {
        $header_text .= 'font-family: ' . sampression_get_font_family(sampression_get_option('title_font')) . ';';
    }

    $header_text .= sampression_font_style(sampression_get_option('headertext_font_style', 'bold'));
    if (sampression_get_option('title_textcolor')) {
        if (strpos(sampression_get_option('title_textcolor'), '#') !== false) {
            $header_text .= 'color: ' . sampression_get_option('title_textcolor') . ';';
        } else {
            $header_text .= 'color: #' . sampression_get_option('title_textcolor') . ';';
        }
    }
    if (sampression_get_option('headertext_link_color')) {
        $header_text_hover .= 'color: #' . sampression_get_option('headertext_link_color') . ';';
    }
    $body_text = $bodytext_link_color = '';
    $bodytext_link_color_hover = '';
    if ((sampression_get_option('body_font'))) {
        $body_text .= 'font-family: ' . sampression_get_font_family(sampression_get_option('body_font')) . ';';
    }

    $body_text .= sampression_font_style(sampression_get_option('bodytext_font_style'));
    if (sampression_get_option('body_textcolor')) {
        if (strpos(sampression_get_option('body_textcolor'), '#') !== false) {
            $body_text .= 'color: ' . sampression_get_option('body_textcolor') . ';';
        } else {
            $body_text .= 'color: #' . sampression_get_option('body_textcolor') . ';';
        }
    }

    if (sampression_get_option('bodytext_font_size')) {
        if ((sampression_get_option('bodytext_font_size'))) {
            $body_text .= 'font-size: ' . sampression_get_font_family(sampression_get_option('bodytext_font_size')) . 'px;';
        }
    }

    if (sampression_get_option('body_link_color')) {
        $bodytext_link_color .= 'color: #' . sampression_get_option('body_link_color') . ';';
    } else {
        if (sampression_get_option('link_color')) {
            $bodytext_link_color .= 'color: ' . sampression_get_option('link_color') . ';';
        }
    }

    $meta_text = $meta_text_color = $meta_text_color_hover = '';
    if ((sampression_get_option('metatext_font_family'))) {
        $meta_text .= 'font-family: ' . sampression_get_font_family(sampression_get_option('metatext_font_family')) . ';';
    }
    $meta_text .= sampression_font_style(sampression_get_option('metatext_font_style'));
    if (sampression_get_option('metatext_font_color')) {
        $meta_text_color .= 'color: #' . sampression_get_option('metatext_font_color') . ';';
    } else {
        if (sampression_get_option('link_color')) {
            $meta_text_color .= 'color: ' . sampression_get_option('link_color') . ';';
        }
    }
    if (sampression_get_option('metatext_link_color')) {
        $meta_text_color_hover .= 'color: #' . sampression_get_option('metatext_link_color') . ';';
    }


    $widget_text = $widget_text_link = $widget_heading_text = $widget_text_link_hover = '';
    if ((sampression_get_option('widgetText_heading_font_family'))) {
        $widget_heading_text .= 'font-family: ' . sampression_get_font_family(sampression_get_option('widgetText_heading_font_family')) . ';';
    }

    $widget_heading_text .= sampression_font_style(sampression_get_option('widgetText_heading_font_style'));

    if (sampression_get_option('widgetText_heading_font_color')) {
        $widget_heading_text .= 'color: #' . sampression_get_option('widgetText_heading_font_color') . ';';
    } else {
        if (sampression_get_option('title_textcolor')) {
            $widget_heading_text .= 'color: ' . sampression_get_option('title_textcolor') . ';';
        }
    }

    if ((sampression_get_option('widgetText_font_family'))) {
        $widget_text .= 'font-family: ' . sampression_get_font_family(sampression_get_option('widgetText_font_family')) . ';';
    }

    $widget_text .= sampression_font_style(sampression_get_option('widgetText_font_style'));
    if (sampression_get_option('widgetText_font_color')) {
        $widget_text .= 'color: #' . sampression_get_option('widgetText_font_color') . ';';
    }
    if (sampression_get_option('widgetText_link_color')) {
        $widget_text_link .= 'color: #' . sampression_get_option('widgetText_link_color') . ';';
    } else {
        if (sampression_get_option('link_color')) {
            $widget_text_link .= 'color: ' . sampression_get_option('link_color') . ';';
        }
    }
    if (sampression_get_option('widgetText_hover_color')) {
        $widget_text_link_hover .= 'color: #' . sampression_get_option('widgetText_hover_color') . ';';
    }
    ?>


    <style id="sampression-header-style" type="text/css">
        <?php
        if($webtitle != '' ) {
        echo "#site-title { $webtitle }" . PHP_EOL;
        }
        if( sampression_get_option( 'webtitle_font_size' ) ) {
            $size = (int)sampression_get_option( 'webtitle_font_size' ) / 10;
            $webtitle_font_size = 'font-size: ' . sampression_get_option( 'webtitle_font_size' ) . 'px; ';
            $webtitle_font_size .= 'font-size: ' . $size . 'rem;';
            echo "@media (min-width: 769px) {  #site-title { $webtitle_font_size } }" . PHP_EOL;
        }

        if($webtitle_color != '' ) {
        echo "#site-title a { $webtitle_color }" . PHP_EOL;
        }
        if($webtagline != '') {
        echo "#site-description { $webtagline }" . PHP_EOL;
        }
        if( sampression_get_option( 'webtagline_font_size' ) ) {
            $size = (int)sampression_get_option( 'webtagline_font_size' ) / 10;
            $webtagline_font_size = 'font-size: ' . sampression_get_option( 'webtagline_font_size' ) . 'px; ';
            $webtagline_font_size .= 'font-size: ' . $size . 'rem;';
            echo "@media (min-width: 769px) {  #site-description { $webtagline_font_size } }" . PHP_EOL;
        }

        if(!empty($social_media_icon) ) {
        echo ".sm-top li.sm-top-fb a, .sm-top li.sm-top-tw a, .sm-top li.sm-top-youtube a, .sm-top li.sm-top-gplus a, .sm-top li.sm-top-tumblr a,
         .sm-top li.sm-top-pinterest a, .sm-top li.sm-top-linkedin a, .sm-top li.sm-top-github a, .sm-top li.sm-top-instagram a, .sm-top li.sm-top-flickr a,
          .sm-top li.sm-top-vimeo a ,.social-connect a{ $social_media_icon }" . PHP_EOL;
        }

        if( !empty($header_text ) ) {
        echo "#page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title,
        .entry-header .entry-title ,.page-title,.entry-title,.comments-title,.entry-title a,h1,h2,h3,h4,h5,h6{ $header_text }" . PHP_EOL;
        }
        if( sampression_get_option( 'headertext_font_size' ) ) {
            $size = (int)sampression_get_option( 'headertext_font_size' ) / 10;
            $headertext_font_size = 'font-size: ' . sampression_get_option( 'headertext_font_size' ) . 'px; ';
            $headertext_font_size .= 'font-size: ' . $size . 'rem;';
            echo "@media (min-width: 769px) {  #page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a, body.single article.post .post-title, body.page article.post .post-title ,
            .entry-header .entry-title,.page-title,.entry-title,.comments-title,.entry-title a{ $headertext_font_size } }" . PHP_EOL;
        }

        if( !empty($header_text_hover) ) {
        echo "article.post .post-title a:hover ,article .entry-title > a:hover{ $header_text_hover }" . PHP_EOL;
        }
        if( !empty($body_text ) ) {
        echo "body .entry, body .comment-content , body .comment-content p,body .entry-content,body .entry-content p ,.entry-summary p,.page-content p,textarea{ $body_text }" . PHP_EOL;
        }
        if(sampression_get_option( 'bodytext_font_size' )){
            $h1_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 10;
            $h2_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 8;
            $h3_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 6;
            $h4_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 4;
            $h5_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 2;
            $h6_font_size = (int)sampression_get_option( 'bodytext_font_size' ) + 1;

            $size = (int)sampression_get_option( 'bodytext_font_size' ) / 10;
            $bodytext_font_size = 'font-size: ' . sampression_get_option( 'bodytext_font_size' ) . 'px; ';
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
        if( ($bodytext_link_color ) ) {
        echo "body .entry a, body .comment-content a, .pingback a,.entry-content  a{ $bodytext_link_color }" . PHP_EOL;
        }

        if((sampression_get_option( 'bodytext_font_color' ))){
        echo "body .entry a:hover { color: #".sampression_get_option( 'bodytext_font_color' ) . "; }" . PHP_EOL;
        }

        if(( sampression_get_option( 'bodytext_font_color' ) ) ) {
        echo "#primary-nav .nav-label { color: #".sampression_get_option( 'bodytext_font_color' ) . "; }" . PHP_EOL;
        echo "input[type='submit']:hover { background-color: #".sampression_get_option( 'bodytext_font_color' ) . "; }" . PHP_EOL;
        }
        if( ($meta_text ) ) {
        echo ".meta a, .comment-meta a, .logged-in-as a,.entry-meta a ,.entry-meta span{ ".$meta_text." }" . PHP_EOL;
        }
        if( (sampression_get_option( 'metatext_font_size' )  )) {
            $meta_icon_size = (int)sampression_get_option( 'metatext_font_size' ) + 8;
            $size = (int)sampression_get_option( 'metatext_font_size' ) / 10;
            $metatext_font_size = 'font-size: ' . sampression_get_option( 'metatext_font_size' ) . 'px; ';
            $metatext_font_size .= 'font-size: ' . $size . 'rem;';
            echo "@media (min-width: 769px) {  .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{ font-size: ".$meta_icon_size ."px; }" . PHP_EOL;
            echo ".meta a, .comment-meta a, .logged-in-as a ,.entry-meta span{ ".$metatext_font_size ."px; }" . PHP_EOL;
            echo "}". PHP_EOL;
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
        if( sampression_get_option( 'widgetText_heading_font_size' ) ) {
            $size = (int)sampression_get_option( 'widgetText_heading_font_size' ) / 10;
            $widgetText_heading_font_size = 'font-size: ' . sampression_get_option( 'widgetText_heading_font_size' ) . 'px; ';
            $widgetText_heading_font_size .= 'font-size: ' . $size . 'rem;';
            echo "@media (min-width: 769px) {  .sidebar .widget .widget-title,.widget .widget-title { $widgetText_heading_font_size } } .sidebar .widget .widget-title,.widget .widget-title,.widget select { $widgetText_heading_font_size }" . PHP_EOL;
        }

        if( ($widget_text )) {
        echo ".sidebar .widget { $widget_text } .widget ,.widget select { $widget_text }" . PHP_EOL;
        }
        if( sampression_get_option( 'widgetText_font_size' ) ) {
            $size = (int)sampression_get_option( 'widgetText_font_size' ) / 10;
            $widgetText_font_size = 'font-size: ' . sampression_get_option( 'widgetText_font_size' ) . 'px; ';
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

add_action('wp_head', 'sampression_header_style', 999);
