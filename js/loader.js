/*!
 * Main Theme methods
 *
 * Bite 1.1.5
 */
/* jshint -W062 */
/* global DocumentTouch */
var BiteUi = BiteUi || {},
BiteParams = BiteParams || {},
	console = console || {};

BiteUi = function( $ ) {

	'use strict';

	return {
		doParallax : true,
		parallaxSpeed : 3,
		body : $( 'body' ),
		loader : $( '#loading-overlay' ),
		clock : 0,
		timer : null,
		isMobile : ( navigator.userAgent.match( /(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i ) ) ? true : false,
		supportSVG : !! document.createElementNS && !! document.createElementNS( 'http://www.w3.org/2000/svg', 'svg').createSVGRect,
		isTouch : 'ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch,
		videoBgOptions : {
			loop: true,
			features: [],
			enableKeyboard: false,
			pauseOtherPlayers: false
		},

		init : function () {

			var _this = this;

			$( window ).trigger( 'resize' ); // trigger resize event to force all window size related calculation
			$( window ).trigger( 'scroll' ); // trigger scroll event to force all window scroll related calculation

			this.loadingAnimation();

			this.setClasses();
			this.breakPoint();

			this.logoMenuPadding();
			this.mainContainerMinHeight();

			this.postPaddingTop();

			this.fullWindowElement();

			/* Video functions */
			this.fluidVideos();
			this.youtubeWmode();
			this.removeVimeoTitle();
			this.videoBackground();

			this.parallax();

			this.flexSlider();

			this.lightbox();

			this.animateAnchorLinks();

			this.commentForm();

			/* Menu functions */
			this.stickyMenu();
			this.pagePaddingTop();
			this.toggleMenu();
			this.mobileMenuScroll();
			this.megaMenuBg();

			this.shareLinkPopup();
			this.singlePostNavBg();

			this.additionalFixes();

			/**
			 * Resize event
			 */
			$( window ).resize( function() {
				//_this.setHomeHeaderDimensions();
				_this.fullWindowElement();
				_this.videoBackground();
				_this.breakPoint();
				_this.mainContainerMinHeight();
				_this.postPaddingTop();
				_this.doZoom();
				_this.pagePaddingTop();
				_this.mobileMenuScroll();
			} ).resize();

			/**
			 * Scroll event
			 */
			$( window ).scroll( function() {
				var scrollTop = $( window ).scrollTop();
				_this.stickyMenu( scrollTop );
				_this.transitionParallax( scrollTop );
				_this.animatePageTitle( scrollTop );
				_this.mobileMenuScroll( scrollTop );
			} );

			_this.body.addClass( 'loaded' );
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

		/**
		 * Loader
		 */
		loadingAnimation : function () {

			var _this = this;

			// timer to display the loader if loading last more than 1 sec
			_this.timer = setInterval( function() {

				_this.clock++;
				
				/**
				 * If the loading time last more than 2 sec, we hide the overlay anyway
				 * An iframe such as a video or a google map probably takes too much time to load
				 * So let's show the page
				 */
				if ( _this.clock === 2 ) {
					_this.hideLoader();
				}

			}, 1000 );
		},

		/**
		 * Adjust left and right menu padding depending on logo width
		 */
		logoMenuPadding : function () {
			if ( $( '#logo a img' ).length ) {

				var logoWidth = 250;

				if ( $( '#logo-light' ).length && $( '#logo-light' ).is( ':visible' ) ) {
					logoWidth = $( '#logo-light' ).width();
				} else if ( $( '#logo-dark' ).length && $( '#logo-dark' ).is( ':visible' ) ) {
					logoWidth = $( '#logo-dark' ).width();
				}

				$( '#navbar-left' ).css( { 'padding-right' : logoWidth / 2 } );
				$( '#navbar-right' ).css( { 'padding-left' : logoWidth / 2 } );
			}
		},

		/**
		 * Set a minimum height to the #main container to avoid a gap below the footer
		 */
		mainContainerMinHeight : function () {
			var minHeight,
				footerHeight = ( $( '#colophon' ).is( ':visible' ) ) ? $( '#colophon' ).outerHeight() : 0,
				headerHeight = ( $( '#masthead' ).length ) ? $( '#masthead' ).outerHeight() : 0;
			
			minHeight = $( window ).height() - footerHeight - headerHeight;

			$( '#main' ).css( { 'min-height' : minHeight } );
		},

		/**
		 * Full Window Home Header
		 */
		setHomeHeaderDimensions : function () {

			if ( this.body.hasClass( 'has-hero' ) ) {

				var winHeight = Math.floor( ( $( window ).height() * BiteParams.headerPercent / 100 ) - this.getToolBarOffset() ),
					winWidth = ( this.body.hasClass( 'layout-boxed' ) ) ? $( '#page-content' ).width() : $( window ).width(),
					header = $( '.header-inner' ),
					newCss;

				if ( this.body.hasClass( 'full-window-header' ) ) {
					winHeight = $( window ).height() - this.getToolBarOffset();
				}

				if ( this.body.hasClass( 'has-header-image' ) ) {
					winHeight = $( '.page-header-container' ).height();
				}

				if ( BiteParams.isHomeSlider ) {
					winHeight = 'auto';
				}

				if ( $( '#hero-content .wrap' ).height() + this.getToolBarOffset() + 200 > winHeight ) {
					winHeight = 'auto';
					$( '#hero-content .wrap' ).addClass( 'add-padding' );
					$( '#scroll-down' ).addClass( 'hide' );
				} else {
					$( '#hero-content .wrap' ).removeClass( 'add-padding' );
					$( '#scroll-down' ).removeClass( 'hide' );
				}

				newCss = {
					width : winWidth,
					height : winHeight
				};

				header.css( newCss );

				// fix hero content overflow for firefox
				$( '#hero-content .wrap' ).css( { 'width' : winWidth - 10 } );
			}
		},

		/**
		 * Full Window function
		 */
		fullWindowElement : function () {

			var _this = this;

			$( '.full-height, .page-header-full .page-header-container' ).each( function() {
				$( this ).css( { 'height' : $( window ).height() - _this.getToolBarOffset() } );
			} );
		},

		/**
		 * Video Background
		 */
		videoBackground : function () {

			var videoContainer = $( '.video-bg-container' );

			$( '.site-header' ).find( 'video' ).attr( 'id', 'header-video' );

			videoContainer.each( function() {
				var videoContainer = $( this ),
					containerWidth = videoContainer.width(),
					containerHeight = videoContainer.height(),
					ratioWidth = 640,
					ratioHeight = 360,
					video = videoContainer.find( 'video' ),
					newHeight,
					newWidth,
					newMarginLeft,
					newMarginTop,
					newCss;

				if ( videoContainer.hasClass( 'youtube-video-bg-container' ) ) {
					video = videoContainer.find( 'iframe' );
					ratioWidth = 560;
					ratioHeight = 315;

				} else {
					// fallback
					if ( this.isTouch && 800 > $( window ).width() ) {
						// console.log( this.isTouch );
						videoContainer.find( '.video-bg-fallback' ).css( { 'z-index' : 1 } );
						video.remove();
						return;
					}
				}

				if ( ( containerWidth / containerHeight ) >= 1.8 ) {
					newWidth = containerWidth;

					//console.log( containerWidth / containerHeight );

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
		 * Blog top padding
		 */
		postPaddingTop : function () {
		
			if ( this.body.hasClass( 'single-post-layout-small-width' ) || this.body.hasClass( 'single-post-layout-full-width' ) ) {

				var winWidth = $( '.site-wrapper' ).width(),
					$post = $( 'article.type-post' );

				if ( $post.hasClass( 'format-image' ) || $post.hasClass( 'format-standard' ) || $post.hasClass( 'format-video' ) || $post.hasClass( 'format-audio' ) || $post.hasClass( 'format-gallery' ) ) {
					
					if ( $post.find( '.entry-header-inner' ).width() < winWidth ) {
						$post.removeClass( 'post-no-padding-top' );
					} else {
						$post.addClass( 'post-no-padding-top' );
					}
				}
			}
		},

		/**
		 * Home Header Animation
		 */
		transitionParallax : function ( scrollTop ) {

			if ( this.doParallax ) {

				var _this = this,
					$el = $( '.parallax-inner' );

				$el.each( function() {
					$el.css( {
						'transform': 'translate3d(0,-' + Math.floor( scrollTop/_this.parallaxSpeed ) + 'px,0)',
						'-webkit-transform': 'translate3d(0,-' + Math.floor( scrollTop/_this.parallaxSpeed ) + 'px,0)'
					} );
				} );
			}
		},

		/**
		 * Animate page title while scrolling
		 */
		animatePageTitle : function ( scrollTop ) {

			if ( this.doParallax ) {

				var ratio = 0.5;

				$( '#hero, .intro' ).css( {
					'opacity': 1 - scrollTop/400
				} );

				$( '#hero' ).css( {
					'transform': 'translate3d(0,' + Math.floor( scrollTop * ratio ) + 'px,0)',
					'-webkit-transform': 'translate3d(0,' + Math.floor( scrollTop * ratio ) + 'px,0)'
				} );
			}
		},

		/**
		 * Allow scrolling if right side menu iheight is too high
		 */
		mobileMenuScroll : function ( scrollTop ) {

			scrollTop = scrollTop || 0;

			var _this = this,
				adminbar = 0,
				menuTopPos = 0,
				offset = 0,
				winHeight = $( window ).height(),
				winWidth = $( window ).width(),
				panel = $( '#navbar-mobile-container' ),
				panelheight = panel.outerHeight();


			if ( _this.body.hasClass( 'admin-bar' ) ) {
				if ( 782 > winWidth ) {
					adminbar = 46;
				} else {
					adminbar = 32;
				}
			}

			if ( winHeight < panelheight ) {

				menuTopPos = adminbar - scrollTop;
				offset = panelheight - winHeight;

				if ( menuTopPos > - offset ) {
					panel.css( {
						'top' : menuTopPos
					} );
				}
			}
		},

		/**
		 * Check if the window dimension allow zoom effect
		 */
		doZoom : function () {

			var containerHeight = $( '#masthead' ).height();

			$( '.zoom-bg' ).each( function() {
				var $this = $( this ),
					img = $this.find( 'img' ),
					imgHeight = img.height();

				if ( containerHeight < imgHeight ) {
					$this.addClass( 'do-zoom' );
				} else {
					$this.removeClass( 'do-zoom' );
				}
			} );
		},

		stickyMenu : function ( scrollTop ) {

			if ( 'standard' !== BiteParams.menuType && 'none' !== BiteParams.menuType  ) {
				scrollTop = scrollTop || 0;

				var scrollPoint = 100;

				if ( scrollPoint < scrollTop ) {
					this.body.addClass( 'sticking' );
					this.body.removeClass( 'menu-' + BiteParams.menuType );
				} else {
					this.body.removeClass( 'sticking' );
					this.body.addClass( 'menu-' + BiteParams.menuType );
				}
			}
		},

		pagePaddingTop : function () {
			if ( 'standard' === BiteParams.menuType && ! this.body.hasClass( 'breakpoint' ) ) {
				$( '#page' ).css( {
					'padding-top' : $( '#navbar-container' ).height()
				} );
			} else {
				$( '#page' ).css( {
					'padding-top' : 0
				} );
			}
		},

		/**
		 *  Add a breakpoint class
		 */
		breakPoint : function () {

			var breakpoint = BiteParams.breakPoint;

			if ( breakpoint > $( window ).width() ) {
				this.body.addClass( 'breakpoint' );
			} else {
				this.logoMenuPadding();
				
				this.body.removeClass( 'breakpoint' );

				if ( this.body.hasClass( 'menu-toggle' ) ) {
					this.body.removeClass( 'menu-toggle' );
				}
			}
		},

		/**
		 * Fluid Video wrapper
		 */
		fluidVideos : function ( container ) {

			container = container || $( '#page' );

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

			container.find( videoSelectors.join( ',' ) ).wrap( '<span class="fluid-video" />' );
			$( '.youtube-video-bg' ).find( videoSelectors.join( ',' ) ).unwrap(); // disabled for youtube video background
			$( '.rev_slider_wrapper' ).find( videoSelectors.join( ',' ) ).unwrap(); // disabled for revslider videos
			$( '.fluid-video' ).parent().addClass( 'fluid-video-container' );
		},

		/**
		 * Fix z-index bug with youtube videos
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

				$iframes.each( function(){

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
		 * Header parallax
		 */
		parallax : function () {
			$( '.parallax' ).haParallax();
		},

		/**
		 * FlexSlider
		 */
		flexSlider : function() {

			if ( $.isFunction( $.flexslider ) ) {

				/* Post slider */
				$( '.post-gallery-slider' ).flexslider( {
					animation: 'slide',
					slideshow : true,
					smoothHeight : true
				} );
			}
		},

		/**
		 * Set lightbox depending on user's theme options
		 */
		lightbox : function() {

			if ( BiteParams.doWoocommerceLightbox ) {
				$( 'a[data-rel^="prettyPhoto"]' ).each( function() {
					//console.log( $( this ).data( 'rel' ) );
					$( this ).attr( 'rel', $( this ).data( 'rel' ) );
				} );
			}

			if ( $.isFunction( $.swipebox ) && 'swipebox' === BiteParams.lightbox ) {

				$( '.lightbox, .wolf-show-flyer, .wolf-show-flyer-single, .last-photos-thumbnails, .zoom, a[data-rel^="prettyPhoto"]' ).swipebox();

			}

			$( '.gallery .lightbox' ).each( function(){ $( this ).attr( 'rel', 'gallery' ); } );
		},

		/**
		 * Get the height of the top admin bar and/or menu
		 */
		getToolBarOffset : function () {

			var offset = 0;

			if ( this.body.is( '.admin-bar' ) ) {

				if ( 782 < $( window ).width() ) {
					offset = 32;
				} else {
					offset = 46;
				}
			}

			if ( $( '#wolf-message-bar' ).length && $( '#wolf-message-bar' ).is( ':visible' ) ) {
				offset = offset + $( '#wolf-message-bar-container' ).outerHeight();
			}

			return offset;
		},

		/**
		 * Commentform placeholder
		 */
		commentForm : function () {

			$( '#comment' ).attr( 'placeholder', BiteParams.replyTitle );

			$( '#comment' ).on( 'focus', function() {
				$( this ).attr( 'placeholder', '' );
				//$( '.form-submit' ).show();
			} );

			$( '#respond' ).on( 'focusout', function() {
				$( '#comment' ).attr( 'placeholder', BiteParams.replyTitle );
				//$( '.form-submit' ).hide();
			} );
		},

		/**
		 * Get scroll offset
		 */
		getScrollOffset : function () {
			var addOffset = 8, // additional offset to avoid unexpected "line" blow navbar
				offset = this.getToolBarOffset() + $( '#navbar-container' ).height() - addOffset;

			if ( this.body.hasClass( 'breakpoint' ) ) {
				offset = this.getToolBarOffset() + $( '#mobile-bar' ).height() - addOffset;
			}

			return offset;
		},

		/**
		 * Smooth scroll
		 */
		animateAnchorLinks : function () {
			var body = this.body,
				scrollOffset = this.getScrollOffset();

			$( window ).on( 'hashchange', function () {
				window.scrollTo( window.scrollX, window.scrollY - scrollOffset );
			} );

			$( '.scroll, .woocommerce-review-link' ).on( 'click', function( event ) {

				var $this = $( this ),
					href = $this.attr( 'href' ),
					hash;

				event.preventDefault();
				event.stopPropagation();

				if ( -1 !== href.indexOf( '#' ) ) {
					hash = href.substring( href.indexOf( '#' ) + 1 );

					if ( $( '#' + hash ).length ) {

						$( 'html, body' ).stop().animate( {

							scrollTop: $( '#' + hash ).offset().top - scrollOffset

						}, 1200, 'swing', function() {

							if ( body.hasClass( 'menu-toggle' ) ) {
								body.removeClass( 'menu-toggle' );
								$( '#navbar-mobile-container' ).css( { 'z-index' : -2 } );
							}

							// set hash in URL
							setTimeout( function() {

								if ( 'top' === hash ) {
									location.hash = '';

								} else {
									location.hash = href;
								}

							}, 200 );
						} );
					}
				}
			} );
		},

		/**
		 * Mobile Menu
		 */
		toggleMenu : function () {

			var body = this.body,
				button = $( '#toggle' ),
				toggleClass = 'menu-toggle',
				mobileMenu = $( '#navbar-mobile-container' ),
				dropDown = $( '.dropdown li.menu-item-has-children a, .dropdown li.page_item_has_children a' );

			button.on( 'click', function() {
				
				if ( body.hasClass( toggleClass ) ) {

					mobileMenu.css( { 'z-index' : -1 } );
					body.removeClass( toggleClass );

				} else {

					body.addClass( toggleClass );
					setTimeout( function() {
						mobileMenu.css( { 'z-index' : 99999 } );
					}, 450 );
				}
			} );

			dropDown.each( function() {
				var $link = $( this );

				if ( $link.parent().find( 'ul:first' ).length ) {

					$link.toggle( function( event ) {

						event.preventDefault();

						$link.parent().find( 'ul:first' ).slideDown();

					}, function() {

						$link.parent().find( 'ul:first' ).slideUp();
					} );
				}
			} );
		},

		/**
		 * Set mega menu background
		 */
		megaMenuBg : function () {

			$( '.mega-menu' ).each( function() {
				var $this = $( this ),
					bg = $this.data( 'mega-menu-bg' ),
					bgRepeat = 'repeat' === $this.data( 'mega-menu-bg-repeat' );

				if ( bg ) {
					$this.find( '.sub-menu' ).css( {
						'background-image' : 'url('+ bg +')'
					} );

					if ( bgRepeat ) {
						$this.find( '.sub-menu' ).addClass( 'mega-menu-bg-repeat' );
					}
				}
			} );
		},

		/**
		 * Share Links Popup
		 */
		shareLinkPopup : function () {

			var _this = this;

			$( '.share-link, .share-link-video' ).click( function() {

				if ( $( this ).data( 'popup' ) === true && ! _this.isMobile ){

					var $link = $( this ),
						url = $link.attr( 'href' ),
						height = $link.data( 'height' ) || 250,
						width = $link.data( 'width' ) || 500,
						popup = window.open( url,'null', 'height=' + height + ',width=' + width + ', top=150, left=150' );

					if ( window.focus ) {
						popup.focus();
					}

					return false;
				}
			} );
		},

		/**
		 * Add featured image backgrounds to post navigation
		 */
		singlePostNavBg : function () {
			$( '.nav-single' ).find( '[data-bg]' ).each( function() {

				var style, $this = $( this ),
					imgUrl = $this.data( 'bg' );

				// console.log( imgUrl );

				if ( '' !== imgUrl ) {
					style = 'background-color:transparent;background-image:url(' + imgUrl + ');background-repeat:no-repeat;background-position:center center;background-size:100%;background-size:cover;-webkit-background-size:100%;-webkit-background-size:cover;';
					$this.addClass( 'nav-has-bg' )
						.prepend( '<span class="nav-bg-overlay" />' );

					$this.find( '.nav-bg-overlay' ).attr( 'style', style );
				}
			} );
		},

		/**
		 * Additional fix for WP
		 */
		additionalFixes : function () {
			$( '.wp-embedded-content' ).parent( 'p' ).addClass( 'no-margin' );
		},

		/**
		 * Hide loader
		 */
		hideLoader : function () {

			var _this = this;

			_this.loader.fadeOut( 'slow', function() {
				clearInterval( _this.timer );
				_this.body.addClass( 'loaded' );
			} );
		},

		/**
		 * Page Load
		 */
		pageLoad : function() {

			$( window ).trigger( 'resize' ); // trigger resize event to force all window size related calculation
			$( window ).trigger( 'scroll' ); // trigger scroll event to force all window scroll related calculation
		}
	};

}( jQuery );

( function( $ ) {

	'use strict';

	$( document ).ready( function() {
		BiteUi.init();
	} );

	$( window ).load( function() {
		BiteUi.pageLoad();
	} );

} )( jQuery );
