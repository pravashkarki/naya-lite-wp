function google_web_fonts_id( font ) {
	font = font.split('=');
	var colon = '';
	if( font[0].indexOf(':') == -1 ) {
		colon = ':';
	}
	return font[0] + colon + ':latin';
}

function google_web_fonts() {
	var font_script =  document.getElementById('sampression-fonts-css');//sampression-google-fonts
	if (typeof(font_script) != 'undefined' && font_script != null) {
		font_script.parentNode.removeChild(font_script);
	}
	var google_fonts = Array();
	google_fonts.push( google_web_fonts_id( wp.customize._value.webtitle_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.webtagline_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.primarynav_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.secondarynav_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.title_font() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.body_font() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.filterby_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.metatext_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.widgetText_heading_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.widgetText_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.footerText_heading_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.footerText_font_family() ) );
	google_fonts.push( google_web_fonts_id( wp.customize._value.paginationtext_font_family() ) );

	google_fonts = jQuery.unique( google_fonts );
	//console.log(google_fonts);
	var fonts_ = google_fonts.join('|');

	var wf = document.createElement('link');
	wf.setAttribute("id", "sampression-fonts-css");
	wf.setAttribute("media", "all");
	wf.setAttribute("type", "text/css");
	wf.setAttribute("href", "//fonts.googleapis.com/css?family=" + fonts_);
	wf.setAttribute("rel", "stylesheet");
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);

}

function font_family( to ) {
	var font_ = '', font = '', style_ = '', style = '';
	if(to.indexOf(':') === -1) {
		font_ = to.split('=');
		font = font_[0].replace('+', ' ');
		style = font_[1];
		if(style === undefined) {
			return font;
		} else {
			return '"' + font + '", ' + style;
		}
	} else {
		font_ = to.split(':');
		font = font_[0].replace('+', ' ');
		style_ = font_[1].split('=');
		style = style_[1];
		return '"' + font + '", ' + style;
	}

}

( function( $ ) {

	"use strict";

	function sampression_font_family( target, to ) {
		google_web_fonts();
		var family = font_family( to );
		$( target ).css( {
			'font-family': family
		});
	}

	function sampression_font_size( target, to ) {
		$( target ).css( {
			'font-size': (to / 10) + 'rem'
		});
		sampression_isotope_relayout();
	}
    function sampression_font_size_heading( target, to){
        var font_var_h1 = (to * 1 + 10);
        var font_var_h2 = (to * 1 + 8);
        var font_var_h3 = (to * 1 + 6);
        var font_var_h4 = (to * 1 + 4);
        var font_var_h5 = (to * 1 + 2);
        var font_var_h6 = (to * 1 + 1);
    	$( target + ' h1' ).css( {
			'font-size': (font_var_h1 / 10) + 'rem'
		});
		$( target + ' h2').css( {
			'font-size': (font_var_h2 / 10) + 'rem'
		});
		$( target + ' h3').css( {
			'font-size': (font_var_h3 / 10) + 'rem'
		});
		$( target + ' h4').css( {
			'font-size': (font_var_h4 / 10) + 'rem'
		});
		$( target + ' h5').css( {
			'font-size': (font_var_h5 / 10) + 'rem'
		});
		$( target + ' h6').css( {
			'font-size': (font_var_h6 / 10) + 'rem'
		});
		sampression_isotope_relayout();

    }
	function sampression_font_style( target, to ) {
		var styles = to.split(',');
		if( $.inArray('bold', styles) !== -1 ) {
			$( target ).css({ 'font-weight' : 'bold' });
		} else {
			$( target ).css({ 'font-weight' : 'normal' });
		}
		if( $.inArray('italic', styles) !== -1 ) {
			$( target ).css({ 'font-style' : 'italic' });
		} else {
			$( target ).css({ 'font-style' : 'normal' });
		}
		if( $.inArray('all-caps', styles) !== -1 ) {
			$( target ).css({ 'text-transform' : 'uppercase' });
		} else {
			$( target ).css({ 'text-transform' : 'none' });
		}
		if( $.inArray('underline', styles) !== -1 ) {
			$( target ).css({ 'text-decoration' : 'underline' });
		} else {
			$( target ).css({ 'text-decoration' : 'none' });
		}
	}

	function sampression_font_color(target, to) {
		$( target ).css( {
			'color': to
		});
	}

	function sampression_svg_color(target, to) {
		$( target ).css( {
			'fill': to
		});
	}

	function sampression_font_color_hover( target, to, base_color ) {
		$( target ).hover(function() {
			$(this).css({
				'color': to
			});
		}, function() {
			$(this).css({
				'color': base_color
			});
		});
	}
 //remove isotope
	function sampression_isotope_relayout() {
		// var $container = $('#post-listing');
		// $container.isotope();
	}

	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			if( $( '#site-title a' ).length > 0 ) {
				$( '#site-title a' ).text( to );
			}
		} );
	} );

	wp.customize( 'custom_logo', function( value ) {
		value.bind( function( to ) {
				$( '#site-title ' ).text( to );

		} );
	} );

	// Site description (Tagline)
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#site-description' ).text( to );
		} );
	} );

	// Body background color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			// $('body.custom-background').css({
			// 	'background': 'none'
			// });
			$('#content-wrapper').css({
    			'background-color': to
			});
		});
	} );

	// Body background cover
	wp.customize( 'sampression_background_cover', function( value ) {
		value.bind( function( to ) {
			if(to == true) {
				$('#content-wrapper').css('background-size', 'cover');
			} else {
				$('#content-wrapper').css('background-size', 'inherit');
			}
		} );
	} );

	// Website Title Font Family
	wp.customize( 'webtitle_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '#site-title a', to );
		});
	});

	// Website Title Font Size
	wp.customize( 'webtitle_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '#site-title', to );
		} );
	} );

	// Website Title Font Style
	wp.customize( 'webtitle_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '#site-title a', to );
		});
	} );

	// Website Title Font Color
	wp.customize( 'webtitle_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#site-title a', to );
		});
	});

	// Website Tagline Font Family
	wp.customize( 'webtagline_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '#site-description', to );
		});
	});

	// Website Tagline Font Size
	wp.customize( 'webtagline_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '#site-description', to );
		});
	});

	// Website Tagline Font Style
	wp.customize( 'webtagline_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '#site-description', to );
		} );
	} );

	// Website Tagline Font Color
	wp.customize( 'webtagline_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#site-description', to );
		} );
	} );

	// Primary Navigation Font Family
	wp.customize( 'primarynav_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '#top-nav ul li a', to );

		});
	} );

	// Primary Navigation Font Size
	wp.customize( 'primarynav_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '#top-nav ul li a', to );
		});
	} );

	// Primary Navigation Font Style
	wp.customize( 'primarynav_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '#top-nav ul li a', to );
		} );
	} );

	// Primary Navigation Font Color
	wp.customize( 'primarynav_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#top-nav ul li a', to );
			sampression_font_color( '.sub-menu-toggle', to );
			$('.toggle-nav .ico-bar').css({
    			'background-color': to
			});
			var base_color = wp.customize._value.primarynav_font_color_hover();
			sampression_font_color_hover( '#top-nav ul li a', base_color, to );
		});
	} );

	// Primary Navigation Font Color:Hover
	wp.customize( 'primarynav_font_color_hover', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.primarynav_font_color();
			sampression_font_color_hover( '#top-nav ul li a', to, base_color );
		});
	} );

	// Social Icon Color
	wp.customize( 'social_icon_color', function( value ) {
		value.bind( function( to ) {
			if(wp.customize._value.use_social_default_color() == false) {
				if($('ul.sm-top').length > 0) {
					$('.sm-top li.sm-top-fb a, .sm-top li.sm-top-tw a, .sm-top li.sm-top-youtube a, .sm-top li.sm-top-gplus a, .sm-top li.sm-top-tumblr a, .sm-top li.sm-top-pinterest a, .sm-top li.sm-top-linkedin a, .sm-top li.sm-top-github a, .sm-top li.sm-top-instagram a, .sm-top li.sm-top-flickr a, .sm-top li.sm-top-vimeo a').css({
						'color' : to
					});
				}
			}

		});
	});

	// Secondary Navigation Background Color
	wp.customize( 'sec_nav_background_color', function( value ) {
		value.bind( function( to ) {
			$('.full-width #full-width-nav').css({
				'background-color' : to
			});
			$('#full-width-nav ul ul').css({
				'background-color' : to
			});
			var styleNode = document.createElement('style');
			styleNode.type = "text/css";
			styleNode.setAttribute("id", "sampression-border-css");
			var css = '#full-width-nav ul ul ul:before{border-right-color:'+to+';} #full-width-nav ul li.edge ul ul:before{border-left-color:'+to+';}';
			if(!!(window.attachEvent && !window.opera)) {
				styleNode.styleSheet.cssText = css;
			} else {
				var styleText = document.createTextNode(css);
				styleNode.appendChild(styleText);
			}
			document.getElementsByTagName('head')[0].appendChild(styleNode);

		});
	});

	// Secondary Navigation Font Family
	wp.customize( 'secondarynav_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.full-width #full-width-nav ul a', to );
		} );
	} );

	// Secondary Navigation Font Size
	wp.customize( 'secondarynav_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.full-width #full-width-nav ul a', to );
		} );
	} );

	// Secondary Navigation Font Style
	wp.customize( 'secondarynav_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.full-width #full-width-nav ul a', to );
		} );
	} );

	// Secondary Navigation Font Color
	wp.customize( 'secondarynav_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.full-width #full-width-nav ul a', to );
			var base_color = wp.customize._value.secondarynav_font_color_hover();
			sampression_font_color_hover( '.full-width #full-width-nav ul a', base_color, to );
		} );
	} );

	// Secondary Navigation Font Color:Hover
	wp.customize( 'secondarynav_font_color_hover', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.secondarynav_font_color();
			sampression_font_color_hover( '.full-width #full-width-nav ul a', to, base_color );
		} );
	} );

	// Header Text Font Family
	wp.customize( 'title_font', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.post-title a', to );
		} );
	} );

	// Header Text Font Size
	wp.customize( 'headertext_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( 'article.post .post-title a, body.single article.post .post-title a, body.page article.post .post-title a, body.page article.post .post-title, body.single article.post .post-title, #page-not-found-message h2', to );
		} );
	} );

	// Header Text Font Style
	wp.customize( 'headertext_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( 'article.post .post-title a, body.single article.post .post-title a, body.page article.post .post-title a, #page-not-found-message h2', to );
		} );
	} );

	// Header Text Font Color
	wp.customize( 'title_textcolor', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#page-not-found-message h2, article.post .post-title, article.post .post-title a, #page-not-found-message h3 a', to );
			var base_color = wp.customize._value.headertext_link_color();
			sampression_font_color_hover( '#page-not-found-message h2, article.post .post-title a, #page-not-found-message h3 a', base_color, to );
		} );
	} );

	// Header Text Link Color
	wp.customize( 'headertext_link_color', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.title_textcolor();
			sampression_font_color_hover( '.post-title a', to, base_color );
		} );
	} );

	// Body Text Font Family
	wp.customize( 'body_font', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( 'body .entry, body .comment-content', to );
		} );
	} );

	// Body Text Font Size
	wp.customize( 'bodytext_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( 'body .entry, body .comment-content', to );
			sampression_font_size_heading( 'body .entry', to);
		} );
	} );

	// Body Text Font Style
	wp.customize( 'bodytext_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( 'body .entry, body .comment-content', to );
		} );
	} );

	// Body Text Font Color
	wp.customize( 'body_textcolor', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( 'body .entry', to );
			var base_color = wp.customize._value.body_textcolor();
			sampression_font_color_hover( 'body .entry, body .comment-content', base_color, to );
		} );
	} );

	// Body Text Link Color
	wp.customize( 'body_link_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color('body .entry a, body .comment-content a', to);
			var base_color = wp.customize._value.body_link_color();
			sampression_font_color_hover( 'body .entry a, body .comment-content a', base_color, to );
		} );
	} );

	// Filter By Icon Color
	wp.customize( 'filterby_font_color', function( value ) {
		value.bind( function( to ) {
			$('#primary-nav ul.nav-listing li a span').css({
				'background-color' : to
			});
		} );
	} );

	// Filter By Font Family
	wp.customize( 'filterby_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '#primary-nav .nav-label, #filter a', to );
		} );
	} );

	// Filter By Font Size
	wp.customize( 'filterby_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '#primary-nav .nav-label, #filter a', to );
			$( "#primary-nav ul.nav-listing" ).css( { 'margin-left': (to * 6) + 'px' });
		} );
	} );


	// Filter By Font Style
	wp.customize( 'filterby_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '#primary-nav .nav-label, #filter a', to );
		} );
	} );

	// Filter By Font Color
	wp.customize( 'filterby_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#filter a, #primary-nav .nav-label', to );
		} );
	} );

	// Meta Text Font Family
	wp.customize( 'metatext_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.meta a, .comment-meta a, .logged-in-as a', to );
		} );
	} );

	// Meta Text Font Size
	wp.customize( 'metatext_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.meta a, .comment-meta, .comment-meta a, .logged-in-as a', to );
			to = parseInt(to) + 8;

			var meta_style =  document.getElementById('sampression-meta-icon-css');//sampression-google-fonts
			if (typeof(meta_style) != 'undefined' && meta_style != null) {
				meta_style.parentNode.removeChild(meta_style);
			}


			var styleNode = document.createElement('style');
			styleNode.type = "text/css";
			styleNode.setAttribute("id", "sampression-meta-icon-css");
			var css = '.post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before{font-size:'+to+'px;}';
			if(!!(window.attachEvent && !window.opera)) {
				styleNode.styleSheet.cssText = css;
			} else {
				var styleText = document.createTextNode(css);
				styleNode.appendChild(styleText);
			}
			document.getElementsByTagName('head')[0].appendChild(styleNode);

		} );

	} );

	// Meta Text Font Style
	wp.customize( 'metatext_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.meta a, .comment-meta a, .logged-in-as a', to );
		} );
	} );

	// Meta Text Font Color
	wp.customize( 'metatext_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.meta, .meta a, .comment-meta a, .logged-in-as a', to );
			var base_color = wp.customize._value.metatext_link_color();
			sampression_font_color_hover( '.meta a, .url.fn.n, .comment-meta a, .logged-in-as a', base_color, to );
		} );
	} );

	// Meta Text Link Color
	wp.customize( 'metatext_link_color', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.metatext_font_color();
			sampression_font_color_hover( '.meta a, .url.fn.n, .comment-meta a, .logged-in-as a', to, base_color );
		} );
	} );

	//Widget Heading Font Family
	wp.customize( 'widgetText_heading_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.sidebar .widget .widget-title', to );
		} );
	} );

	//Widget Heading Size
	wp.customize( 'widgetText_heading_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.sidebar .widget .widget-title', to );
		} );
	} );

	// Widget Heading Font Style
	wp.customize( 'widgetText_heading_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.sidebar .widget .widget-title', to );
		} );
	} );

	// Widget Heading Font Color
	wp.customize( 'widgetText_heading_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.sidebar .widget .widget-title', to );
		} );
	} );

	// Widget Text Font Family
	wp.customize( 'widgetText_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.sidebar .widget', to );
		} );
	} );

	// Widget Text Font Size
	wp.customize( 'widgetText_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.sidebar .widget', to );
		} );
	} );

	// Widget Text Font Style
	wp.customize( 'widgetText_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.sidebar .widget', to );
		} );
	} );

	// Widget Text Font Color
	wp.customize( 'widgetText_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.sidebar .widget', to );
		} );
	} );

	// Widget Text Link Color
	wp.customize( 'widgetText_link_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.sidebar .widget a', to );
			var base_color = wp.customize._value.widgetText_hover_color();
			sampression_font_color_hover( '.sidebar .widget a', base_color, to );
		} );
	} );

    // Widget Text Link Hover Color
	wp.customize( 'widgetText_hover_color', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.widgetText_link_color();
			sampression_font_color_hover( '.sidebar .widget a', to, base_color );
		} );
	} );


  //Footer Widget Heading Font Family
	wp.customize( 'footerText_heading_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.footer-widget .widget .widget-title', to );
		} );
	} );

	//Footer Widget Heading Font Size
	wp.customize( 'footerText_heading_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.footer-widget .widget .widget-title', to );
		} );
	} );

	// Footer Widget Heading Font Style
	wp.customize( 'footerText_heading_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.footer-widget .widget .widget-title', to );
		} );
	} );

	// Footer Widget Heading Font Color
	wp.customize( 'footerText_heading_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.footer-widget .widget .widget-title', to );
		} );
	} );

  // Footer Widget Text Font Family
	wp.customize( 'footerText_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '.footer-widget .widget', to );
		} );
	} );

	// Footer Widget Text Font Size
	wp.customize( 'footerText_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '.footer-widget .widget', to );
		} );
	} );

	// Footer Widget Text Font Style
	wp.customize( 'footerText_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '.footer-widget .widget', to );
		} );
	} );

	// Footer Widget Text Font Color
	wp.customize( 'footerText_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.footer-widget .widget', to );
		} );
	} );

	// Footer Widget Text Link Color
	wp.customize( 'footerText_link_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '.footer-widget .widget a', to );
			var base_color = wp.customize._value.footerText_hover_color();
			sampression_font_color_hover( '.footer-widget .widget a', base_color, to );
		} );
	} );

   // Footer Widget Text Link Hover Color
	wp.customize( 'footerText_hover_color', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.footerText_link_color();
			sampression_font_color_hover( '.footer-widget .widget a', to, base_color );
		} );
	} );
	// Pagination Text Font Family
	wp.customize( 'paginationtext_font_family', function( value ) {
		value.bind( function( to ) {
			sampression_font_family( '#nav-above a, #nav-below a, #nav-below span', to );
		} );
	} );

	// Pagination Text Font Size
	wp.customize( 'paginationtext_font_size', function( value ) {
		value.bind( function( to ) {
			sampression_font_size( '#nav-above a, #nav-below a, #nav-below span', to );
		} );
	} );

	// Pagination Text Font Style
	wp.customize( 'paginationtext_font_style', function( value ) {
		value.bind( function( to ) {
			sampression_font_style( '#nav-above a, #nav-below a, #nav-below span', to );
		} );
	} );

	// Pagination Text Font Color
	wp.customize( 'paginationtext_font_color', function( value ) {
		value.bind( function( to ) {
			sampression_font_color( '#nav-above a, #nav-below a, #nav-below span', to );
			var base_color = wp.customize._value.paginationtext_font_color_hover();
			sampression_font_color_hover( '#nav-above a, #nav-below a, #nav-below a span', base_color, to );
		} );
	} );

	// Pagination Text Font Color:Hover
	wp.customize( 'paginationtext_font_color_hover', function( value ) {
		value.bind( function( to ) {
			var base_color = wp.customize._value.paginationtext_font_color();
			sampression_font_color_hover( '#nav-above a, #nav-below a, #nav-below a span', to, base_color );
		} );
	} );

	// Footer Link Color
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( to ) {
			//console.log(to);
			sampression_font_color( '#footer a', to );
			var base_color = wp.customize._value.footer_link_color();
		} );
	} );

	// Sticky Pin Color
	wp.customize( 'sticky_pin_color', function( value ) {
		value.bind( function( to ) {
			//console.log(to);
			sampression_svg_color( '.sticky-icon path', to );
		} );
	} );

	// Button Background Color
	wp.customize( 'button_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.button, button, input[type="submit"], input[type="reset"], input[type="button"]').css({
				'background-color' : to
			});
		} );
	} );




















	// wp.customize( 'title_font', function( value ) {
	// 	value.bind( function( to ) {
	// 		console.log(to);
	// 	} );
	// } );
    console.log('fasdf');
    jQuery(document).ready(function(){
        console.log('faasdasdasdf');

        jQuery(document).on('click','#extra-css-div .al-done',function(){
            jQuery(this).parent().hide();
            localStorage['extra-css-div'] = 'done';
        });
    });

} )( jQuery );
