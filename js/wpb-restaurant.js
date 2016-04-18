/*!
 * %NAME% %VERSION%
 */
/* jshint -W062 */
var WPBRestaurant =  WPBRestaurant || {},
	console = console || {};

WPBRestaurant = function( $ ) {

	'use strict';

	return {

		init : function () {
			/* Restaurant module */
			this.restaurantItemDots();

			var _this = this;

			/**
			 * Resize event
			 */
			$( window ).resize( function() {
				_this.restaurantItemDots();
			} ).resize();
		},

		restaurantItemDots : function () {
			$( '.wpb-restaurant-menu-item-dots' ).each( function() {
				var dotWidth = $( this ).width();

				if ( 30 > dotWidth ) {
					$( this ).parent().addClass( 'wpb-restaurant-menu-item-title-container-block' );
				} else {
					$( this ).parent().removeClass( 'wpb-restaurant-menu-item-title-container-block' );
				}
			} );
		},
	};
}( jQuery );

;( function( $ ) {

	'use strict';
	WPBRestaurant.init();

} )( jQuery );