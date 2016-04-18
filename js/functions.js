/*!
 * Front end plugin methods
 *
 * %NAME% %VERSION% 
 */
/* jshint -W062 */
/* global DocumentTouch */
var WPBParams =  WPBParams || {},
	WPB = WPB || {},
	WOW = WOW || {},
	Modernizr = Modernizr || {},
	MediaElementPlayer = MediaElementPlayer || {},
	console = console || {};

WPB = function( $ ) {

	'use strict';

	return {
		doParallax : true,
		doAnimation : true,
		body : $( 'body' ),
		isMobile : ( navigator.userAgent.match( /(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i ) ) ? true : false,
		supportSVG : !! document.createElementNS && !! document.createElementNS( 'http://www.w3.org/2000/svg', 'svg').createSVGRect,
		isTouch : 'ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch,

		/**
		 * Init functions
		 */
		init : function () {

			var _this = this;

			$( window ).trigger( 'resize' ); // trigger resize event to force all window size related calculation
			$( window ).trigger( 'scroll' ); // trigger scroll event to force all window scroll related calculation

			this.doParallax = ( ! this.isMobile ) || ( this.isMobile && ! WPBParams.disableParallaxOnMobile );
			this.doAnimation = ( ! this.isMobile ) || ( this.isMobile && ! WPBParams.disableAnimationOnMobile );

			this.setClasses();
			this.videoBackground();
			this.fullHeightSection();
			this.parallax();
			this.fitText();
			this.fluidVideos();
			this.wowAnimate();
			this.youtubeWmode();
			this.closeAlertMessage();
			this.lightbox();
			this.videoShortcode();
			this.scrollDownArrow();
			this.smoothScroll();
			this.relGalleryAttr();

			/**
			 * Resize event
			 */
			$( window ).resize( function() {
				_this.fullHeightSection();
				_this.videoBackground();
				_this.parallax();
				_this.videoShortcode();
				_this.scrollDownArrowDisplay();
			} ).resize();
		},

		/**
		 * Check if IE
		 */
		isIE : function () {
			var ua = window.navigator.userAgent,
				msie = ua.indexOf( 'MSIE ' ),
				trident = ua.indexOf( 'Trident/' );

			if ( msie > 0 ) {
				return true;
			}

			if ( trident > 0 ) {
				// IE 11 (or newer) => return version number
				return true;
			}

			// other browser
			return false;
		},

		setClasses : function () {

			if ( this.supportSVG ) {
				$( 'html' ).addClass( 'svg' );
			}

			if ( this.isTouch ) {
				$( 'html' ).addClass( 'touch' );
			} else {
				$( 'html' ).addClass( 'no-touch' );
			}

			if ( this.isMobile ) {
				this.body.addClass( 'is-mobile' );
			}
		},

		getToolBarOffset : function () {

			var scrollOffset = 0;

			if ( $( 'body' ).is( '.admin-bar' ) ) {

				if ( 782 < $( window ).width() ) {
					scrollOffset = 32;
				} else {
					scrollOffset = 46;
				}
			}

			return scrollOffset;
		},

		/**
		 * Set element height to full screen
		 */
		fullHeightSection : function() {
			var _this = this;

			$( '.wpb-section-full-height' ).each( function() {

				$( this ).css( { 'height' : $( window ).height() - _this.getToolBarOffset() } );
			} );
		},

		/**
		 * Fluid Video wrapper
		 */
		fluidVideos : function ( container ) {

			container = container || $( '.wpb-section-inner' );

			var videoSelectors = [
				'iframe[src*="player.vimeo.com"]',
				'iframe[src*="youtube.com"]',
				'iframe[src*="youtube-nocookie.com"]',
				'iframe[src*="youtu.be"]',
				'iframe[src*="kickstarter.com"][src*="video.html"]',
				'iframe[src*="screenr.com"]',
				'iframe[src*="blip.tv"]',
				'iframe[src*="dailymotion.com"]',
				'iframe[src*="viddler.com"]',
				'iframe[src*="qik.com"]',
				'iframe[src*="revision3.com"]',
				'iframe[src*="hulu.com"]',
				'iframe[src*="funnyordie.com"]',
				'iframe[src*="flickr.com"]',
				'embed[src*="v.wordpress.com"]'
			];

			container.find( videoSelectors.join( ',' ) ).wrap( '<span class="wpb-fluid-video" />' );
			$( '.wpb-fluid-video' ).parent().addClass( 'wpb-fluid-video-container' );
		},

		/**
		 * Video Background
		 */
		videoBackground : function () {

			var _this = this;

			$( '.wpb-video-bg-container').each( function() {
				var videoContainer = $( this ),
					containerWidth = $( this ).width(),
					containerHeight = $( this ).height(),
					ratioWidth = 640,
					ratioHeight = 360,
					ratio = ratioWidth/ratioHeight,
					video = $( this ).find( '.wpb-video-bg' ),
					newHeight,
					newWidth,
					newMarginLeft,
					newMarginTop,
					newCss;

				if ( videoContainer.hasClass( 'wpb-youtube-video-bg-container' ) ) {
					video = videoContainer.find( 'iframe' );
					ratioWidth = 560;
					ratioHeight = 315;

				} else {
					if ( _this.isMobile ) {
						// console.log( this.isTouch );
						videoContainer.find( '.wpb-video-bg-fallback' ).css( { 'z-index' : 1 } );
						video.remove();
						return;
					}
				}

				if ( ( containerWidth / containerHeight ) >= 1.8 ) {
					newWidth = containerWidth;

					// console.log( containerWidth / containerHeight );

					newHeight = Math.floor( ( containerWidth/ratioWidth ) * ratioHeight ) + 2;
					newMarginTop =  - ( Math.floor( ( newHeight - containerHeight  ) ) / 2 );
					newMarginLeft =  - ( Math.floor( ( newWidth - containerWidth  ) ) / 2 );

					newCss = {
						width : newWidth,
						height : newHeight,
						marginTop :  newMarginTop,
						marginLeft : newMarginLeft
					};

					video.css( newCss );

				} else {

					// console.log( containerHeight );
					
					newHeight = containerHeight;
					newWidth = Math.floor( ( containerHeight/ratioHeight ) * ratioWidth );
					newMarginLeft =  - ( Math.floor( ( newWidth - containerWidth  ) ) / 2 );

					newCss = {
						width : newWidth,
						height : newHeight,
						marginLeft :  newMarginLeft,
						marginTop : 0
					};

					video.css( newCss );
				}
			} );
		},

		/**
		 * Use Wow plugin to reveal animation on page scroll
		 */
		wowAnimate : function () {
			if ( this.doAnimation ) {
				var wowAnimate = new WOW( { offset : 50 } ); // init wow for CSS animation
				wowAnimate.init();
			}
		},

		/**
		 * Fix wmode  with youtube videos
		 */
		youtubeWmode : function() {

			var iframes, $iframes,
				youtubeSelector = [
					'iframe[src*="youtube.com"]',
					'iframe[src*="youtu.be"]',
					'iframe[src*="youtube-nocookie.com"]'
				];

			iframes = youtubeSelector.join( ',' );
			$iframes = $( iframes );

			if ( $iframes.length ) {

				$iframes.each(function(){

					var url = $( this ).attr( 'src' );

					if ( url  ) {

						if ( url.indexOf( '?' ) !== -1) {

							$( this ).attr( 'src', url + '&wmode=transparent' );

						} else {

							$( this ).attr( 'src', url + '?wmode=transparent' );
						}
					}
				} );
			}
		},

		/**
		 * Fittext
		 */
		fitText : function () {
			$( '.wpb-fittext' ).each( function() {
				var maxFontSize = $( this ).data( 'max-font-size' ) || 60;
				$( this ).fitText( 1.2, { minFontSize: '14px', maxFontSize: maxFontSize + 'px' } );
			} );
		},

		/**
		 * Close alert message
		 */
		closeAlertMessage : function () {

			$( '.wpb-notification-close' ).click( function() {
				$( this ).parents( '.wpb-notification' ).slideUp();
			} );
		},

		/**
		 *  Parallax Background
		 */
		parallax : function () {

			if ( this.doParallax ) {
				$( '.wpb-section-parallax, .wpb-block-parallax' ).haParallax();
			}
		},

		/**
		 *  Lightbox
		 */
		lightbox : function () {

			if ( $.isFunction( $.swipebox ) ) {

				var _this = this;

				$( '.wpb-lightbox, .wpb-gallery-lightbox' ).swipebox();

				$( '.wpb-video-lightbox' ).swipebox( {
					hideBarsDelay : 0,
					autoplayVideos : true,
					afterOpen : function () {

						_this.removeVimeoTitle();

						// $( '#swipebox-close' ).css( {
						// 	'right' : 'auto',
						// 	'left' : 0
						// } );
					}
				} );

				// add rel attribute for galleries
				$( '.wpb-gallery .wpb-lightbox' ).each( function() { $( this ).attr( 'rel', 'gallery' ); } );
			}
		},

		/**
		 * Remove title from vimeo videos
		 */
		removeVimeoTitle : function() {

			var iframes, $iframes,
				vimeoSelector = [
					'iframe[src*="player.vimeo.com"]'
				];

			iframes = vimeoSelector.join( ',' );
			$iframes = $( iframes );

			if ( $iframes.length ) {

				$iframes.each(function(){

					var url = $( this ).attr( 'src' );

					if ( url ) {

						if ( url.indexOf( '?' ) !== -1) {

							$( this ).attr( 'src', url + '&title=0&byline=0&portrait=0' );

						} else {

							$( this ).attr( 'src', url + '?title=0&byline=0&portrait=0' );
						}
					}
				} );
			}
		},

		/**
		 * Make WP video shortcode responsive
		 */
		videoShortcode : function () {

			$( '.wpb-section .wp-video' ).each( function() {
				var $this = $( this ),
					width = $this.parent().width(),
					height = Math.floor( ( width/16 ) * 9 );

				$this.css( {
					'width' : width,
					'height' : height
				} );
			} );
		},

		/**
		 * Trick to customize the embed tweet
		 */
		loadTwitter : function() {

			var tweet = $( '.twitter-tweet-rendered' ),
				tweetItems = $( '.post.is-tweet' );

			setTimeout( function() {
				if ( tweet.length ) {
					tweet.each( function() {
						$( this ).removeAttr( 'style' )
						.attr( 'height' , 'auto' )
						.animate( { 'opacity' : 1 } );
					} );
				}

				if ( tweetItems.length ) {
					tweetItems.each( function() {
						$( this ).animate( { 'opacity' : 1} );
					} );
				}
			}, 500 );
		},

		/**
		 * Instagrams fade in
		 */
		loadInstagram : function() {
			var instagramItems = $( '.post-item.is-instagram' );

			if ( instagramItems.length ) {
				instagramItems.each( function() {
					$( this ).animate( { 'opacity' : 1} );
				} );
			}
		},

		/**
		 * Display an arrow to scroll to the next section
		 */
		scrollDownArrow : function () {
			var _this = this,
				$arrow,
				$section,
				$nextSection;
			
			$( '.wpb-arrow-down' ).each( function() {
				$arrow = $( this ),
				$section = $arrow.parents( '.wpb-section' ),
				$nextSection = $section.next();

				if ( $nextSection.length ) {

					$arrow.on( 'click', function() {
							$( 'html, body' ).stop().animate( {

							scrollTop: $nextSection.offset().top - _this.getToolBarOffset()

						}, 1200, 'swing' );
					} );
				} else {
					$arrow.hide();
				}
			} );
		},

		/**
		 * Show or hide the scrolldow arrow depending on the section content height
		 */
		scrollDownArrowDisplay : function () {
			var _this = this,
				$arrow,
				$section,
				$sectionInner,
				sectionInnerHeight = 0;

			$( '.wpb-arrow-down' ).each( function() {
				$arrow = $( this ),
				$section = $arrow.parents( '.wpb-section' ),
				$sectionInner = $section.find( '.wpb-section-inner' );

				$sectionInner.find( '.wpb-row' ).each( function() {
					sectionInnerHeight = sectionInnerHeight + $( this ).height();
				} );

				if ( $( window ).height() - 250 <= sectionInnerHeight ) {
					$arrow.hide();
				} else {
					$arrow.show();
				}
			} );
		},

		/**
		 * Smooth scroll
		 */
		smoothScroll : function () {
			var _this = this;

			$( '.wpb-nav-scroll a, .wpb-scroll' ).on( 'click', function( event ) {
				

				event.preventDefault();
				event.stopPropagation();
				
				var scrollOffset = _this.getToolBarOffset(),
					$this = $( this ),
					href = $this.attr( 'href' ),
					hash;

				if ( href && href.indexOf( '#' ) !== -1 ) {
					
					hash = href.substring( href.indexOf( '#' ) + 1 );
					if ( $( '#' + hash ).length ) {
						$( 'html, body' ).stop().animate( {
							scrollTop: $( '#' + hash ).offset().top - scrollOffset
						}, 1E3, 'swing', function() {} );
					}
				}
			} );
		},

		/**
		 * Set gallery rel attribute for HTML validation
		 */
		relGalleryAttr : function () {
			$( '.wolf-images-gallery .wpb-image-inner, .wpb-item-price-image-container a' ).each( function() {
				if ( $( this ).data( 'wpb-rel' ) ) {
					$( this ).attr( 'rel', $( this ).data( 'wpb-rel' ) );
				}
			} );
		},

		/**
		 * Function to fire on page load
		 */
		pageLoad : function () {

			$( window ).trigger( 'resize' ); // trigger resize event to force all window size related calculation
			$( window ).trigger( 'scroll' ); // trigger scroll event to force all window scroll related calculation

			this.videoShortcode();
			this.parallax();
			this.loadInstagram();
			this.loadTwitter();

			$( 'body' ).addClass( 'wpb-loaded' );
		}
	};

}( jQuery );

( function( $ ) {

	'use strict';

	$( document ).ready( function() {
		WPB.init();
	} );

	$( window ).load( function() {
		WPB.pageLoad();
	} );

} )( jQuery );