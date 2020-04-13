//==============================================================
// CUSTOM SCRIPTS
// 2013
// ==============================================================


jQuery(document).ready(function($) {

    /**
     * Do not submit search form if empty
     */
     $(document).on( 'click', '#searchsubmit', function() {
        var search = $(this).prev('#s');
        if(search.val() == '') {
            search.focus();
            return false;
        }
     });

    /**
     * Superfish
     */
    if ($(window).width() > 767) {

        $('.main-nav').superfish({
            delay: 0
        });

        $('span.sf-sub-indicator').remove();

    }

    /**
     * Navigation swap class
     */
    var maxwidth=62;
    var parentwidth=$('.container').outerWidth();
    var navwidth = $('#primary-nav').outerWidth();
    var navpercentage =   navwidth / parentwidth * 100;

    if(navpercentage>maxwidth){
        $('#primary-nav').addClass('columns sixteen' );
    }

    /**
     * WordPress specialist:
     * get Widget title as a widget class
     */
    $('.widget_text').each(function() {
        var widgetTitle = $(this).find('.widget-title').text();
        var widgetTitleSlug = widgetTitle.replace(/ /gi, "-");
        widgetTitleSlug = widgetTitleSlug.toLowerCase();
        widgetTitleSlug = "widget-" + widgetTitleSlug;
        $(this).addClass(widgetTitleSlug);
    });

    /**
     * Navigation
     * Add the 'show-nav' class to the body when the nav toggle is clicked
     */
    $( '#trigger-primary-nav' ).click(function(e) {

        // Prevent default behaviour
        e.preventDefault();

        // Add the 'show-nav' class
        $( 'body' ).toggleClass( 'show-nav' );

        // Add the 'vertical-transform' class
        $(this).toggleClass('vertical-transform');
        
    });

    /**
     * Append 'nav-height-col' and 'sub-menu-toggle' only once
     * after clicking '#trigger-primary-nav'
     */
    $( '#trigger-primary-nav' ).one('click', function(e) {

        // Prevent default behaviour
        e.preventDefault();

        $('#inner-wrapper').append('<div class="nav-height-col">menu background</div>');
        // Append 'sub-menu-toggle'
        
    });

    
    if($('.page_item_has_children').length > 0){
        $('#primary-nav li.page_item_has_children').prepend('<button class="sub-menu-toggle"><span class="screen-reader-text">Show sub menu</span></button>');
        $( '.sub-menu-toggle' ).click(function(e) {
            // Prevent default behaviour
            e.preventDefault();

            if($(this).hasClass('menu-open')){
                $(this).parent('li.page_item_has_children').children('ul').slideToggle('fast');
                $(this).parent('li.page_item_has_children').removeClass('active');
                $('.main-nav-wrapper ul li').removeClass('inactive');
                $(this).toggleClass('menu-open');
            } else {
                $('.main-nav-wrapper ul li').addClass('inactive');
                $('.main-nav-wrapper ul li').removeClass('active');
                $('.sub-menu-toggle').removeClass('menu-open');
                $('.sub-menu-toggle').parent('li.page_item_has_children').children('ul').slideUp('fast');
                $(this).parent('li.page_item_has_children').children('ul').slideToggle('fast');
                $(this).parent('li.page_item_has_children').removeClass('inactive');
                $(this).parent('li.page_item_has_children').addClass('active');
                $(this).toggleClass('menu-open');
            }
        });
    }

    /**
     * Fallback for menu
     */
    if($('ul.main-nav').length > 0){
        $('#primary-nav li.menu-item-has-children').prepend('<button class="sub-menu-toggle"><span class="screen-reader-text">Show sub menu</span></button>');
         $( '.sub-menu-toggle' ).click(function(e) {
            // Prevent default behaviour
            e.preventDefault();
            if($(this).hasClass('menu-open')){
            
                $(this).parent('li.menu-item-has-children').children('ul').slideToggle('fast');
                $(this).parent('li.menu-item-has-children').removeClass('active');
                $('ul.main-nav li').removeClass('inactive');
                $(this).toggleClass('menu-open');
            } else {
                $('ul.main-nav li').addClass('inactive');
                $('ul.main-nav li').removeClass('active');
                $('.sub-menu-toggle').removeClass('menu-open');
                $('.sub-menu-toggle').parent('li.menu-item-has-children').children('ul').slideUp('fast');
                $(this).parent('li.menu-item-has-children').children('ul').slideToggle('fast');
                $(this).parent('li.menu-item-has-children').removeClass('inactive');
                $(this).parent('li.menu-item-has-children').addClass('active');
                $(this).toggleClass('menu-open');

            }
        });
    }

    /**
     * Tab Navigation
     */
    if( $('.tabs').length > 0 ) {
        //Default Action - Hide all content
        $(".tab_content").hide();
        if ($("ul.tabs li.active").length == 0) {
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content
        } else {
            var tabIndex = $("ul.tabs li").index($('ul.tabs li.active'));
            tabIndex++; // as index starts from 0 we need to increase by 1
            $("#tab" + tabIndex).fadeIn();
        }

        //On Click Event
        $("ul.tabs li").click(function() {
            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;
        });
    }

    /**
     * Find out a elements position(x-axis) and add class if it resides on left half or the right half of the window
     */
    var winwidth = $(window).width();
    var winhalf = winwidth/2;

    if ($(window).width() > 767) {
        $('#primary-nav ul > li').hover(
            function() {
                var elemoffset = $(this).offset();
                var elemoffsetleft = elemoffset.left;
                if(elemoffsetleft > winhalf) {
                    $(this).addClass('window-right');
                }
            },
            function(){
                //$(this).removeClass('window-right');
                $(this).delay(200).queue(function(){
                    $(this).removeClass('window-right').clearQueue();
                });
            }
        );
    }

    /**
     * Responsive Video
     */
    (function($) {
        $.fn.responsiveVideo = function() {
            // Add CSS to head
            $('head').append('<style type="text/css">.responsive-video-wrapper{width:100%;position:relative;padding:0 ;margin-bottom:25px;}.responsive-video-wrapper iframe,.responsive-video-wrapper object,.responsive-video-wrapper embed{position:absolute;top:0;left:0;width:100%;height:100%}</style>');
            // Gather all videos
            var $all_videos = $(this).find('iframe[src*="player.vimeo.com"], iframe[src*="youtube.com"], iframe[src*="youtube-nocookie.com"], iframe[src*="dailymotion.com"], iframe[src*="kickstarter.com"][src*="video.html"], object, embed');
            // Cycle through each video and add wrapper div with appropriate aspect ratio if required
            $all_videos.not('object object').each(function() {
                var $video = $(this);
                if ($video.parents('object').length)
                    return;
                if (!$video.prop('id'))
                    $video.attr('id', 'rvw' + Math.floor(Math.random() * 999999));
                $video
                        .wrap('<div class="responsive-video-wrapper" style="padding-top: ' + ($video.attr('height') / $video.attr('width') * 100) + '%" />')
                        .removeAttr('height')
                        .removeAttr('width');
            });
        };
    })(jQuery);
    $( 'body' ).responsiveVideo();

});
// end ready function here.