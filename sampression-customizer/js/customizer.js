function google_web_fonts() {

	var font_script =  document.getElementById('sampression-google-fonts');
	if (typeof(font_script) != 'undefined' && font_script != null) {
		font_script.parentNode.removeChild(font_script);
	}
	//var header = wp.customize._value.webtitle_font_family().split(':');
	var body = '';//wp.customize._value.body_font_family().split(':');
	var header = '';
	//console.log(header);


	if(header[0] == body[0]) {
		var WebFontConfig = {
			google: { families: [ header[0] + '::latin' ] }
		};
	} else {
		var WebFontConfig = {
			google: { families: [ header[0] + '::latin', body[0] + '::latin' ] }
		};
	}

	var wf = document.createElement('script');
	wf.setAttribute("id", "sampression-google-fonts");
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
}

function font_family( to ) {
	var font_ = '', font = '', style_ = '', style = '';
	if(to.indexOf(':') === -1) {
		font_ = to.split('=');
		font = font_[0].replace('+', ' ');
		style = font_[1];
	} else {
		font_ = to.split(':');
		font = font_[0].replace('+', ' ');
		style_ = font_[1].split('=');
		style = style_[1];
	}
	return '"'+font+'", '+style;
}

( function( $ ) {

	"use strict";

	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			if( $( '#site-title a' ).length > 0 ) {
				$( '#site-title a' ).text( to );
			}
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
			//console.log($('#content-wrapper'));
			$('#content-wrapper').css({
    			'background-color': to
			});
			$('body.custom-background').css({
				'background': 'none'
			});
		});
	} );

	// Body background cover
	wp.customize( 'sampression_background_cover', function( value ) {
		value.bind( function( to ) {
			if(to == true) {
				$('#content-wrapper').css('background-size', 'cover');
			} else {
				$('#content-wrapper').css('background-size', 'initial');
			}
		} );
	} );



	// Header text font.
	wp.customize( 'title_font', function( value ) {
		value.bind( function( to ) {
			google_web_fonts();
			var family = font_family( to );
			$( '#site-title a, article.post .post-title a, body.single article.post .post-title, body.page article.post .post-title' ).css( {
				'font-family': family
			});
		});
	});

	// Header & Nacigation - Section
	// Website Title Font Family
	wp.customize( 'title_font', function( value ) {
		value.bind( function( to ) {
			//console.log(to);
		} );
	} );
	// wp.customize( 'webtitle_font_size', function( value ) {
	// 	value.bind( function( to ) {
	//
	// 		return;
	// 		google_web_fonts();
	// 		var family = font_family( to );
	// 		$( '#site-title a' ).css( {
	// 			'font-family': family
	// 		});
	// 	});
	// });






































	/***************************************

	// Header Font Color
	wp.customize( 'header_font_color', function( value ) {
		value.bind( function( to ) {
			$( '#site-title a, article.post .post-title a, body.single article.post .post-title, body.page article.post .post-title' ).css( {
				'color': to
			});
		});
	});

	// Header Font Size
	wp.customize( 'webtitle_font_size', function( value ) {
		value.bind( function( to ) {
			console.log(to);
		});
	});

	// Header Font Family
	wp.customize( 'body_font_family', function( value ) {
		value.bind( function( to ) {
			google_web_fonts();
			var family = font_family( to );
			$( 'p' ).css( {
				'font-family': family
			});
		});
	});

	// Body Font Color
	wp.customize( 'body_font_color', function( value ) {
		value.bind( function( to ) {
			$( 'p' ).css( {
				'color': to
			});
		});
	});

	// Link Color
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( {
				'color': to
			});
		});
	});

	// Link Color:Hover
	wp.customize( 'link_color_hover', function( value ) {
		value.bind( function( to ) {
			$( '#primary-nav, #primary-nav a:link, #primary-nav a:visited' ).css( {
				'color': to
			});
		});
	});

	//Filter By Color
	wp.customize( 'filter_by_color', function( value ) {
		value.bind( function( to ) {
			$( 'a:hover' ).css( {
				'color': to
			});
		});
	});

	// Sidebar Position
	wp.customize( 'sidebar_position', function( value ) {
		value.bind( function( to ) {
			if( to === 'left' ) {
				$('aside.sidebar').css('display', 'block');
				$('aside.sidebar').removeClass('sidebar-right');
				$('#content').addClass('alignright');
				$('aside.sidebar').addClass('sidebar-left');
				$('#content').removeClass('twelve');
				$('#content').addClass('nine');
			} else if( to === 'right' ) {
				$('aside.sidebar').css('display', 'block');
				$('aside.sidebar').removeClass('sidebar-left');
				$('#content').removeClass('alignright');
				$('aside.sidebar').addClass('sidebar-right');
				$('#content').removeClass('twelve');
				$('#content').addClass('nine');
			} else {
				$('aside.sidebar').css('display', 'none');
				$('#content').removeClass('nine');
				$('#content').addClass('twelve');
			}
		});
	});


	wp.customize( 'webtitle_font_color', function( value ) {
		value.bind( function( to ) {
			console.log(to);
		});
	});****************************************************/


} )( jQuery );
