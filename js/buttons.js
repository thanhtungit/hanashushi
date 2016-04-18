/**
 * Button shortcode
 */
jQuery( function( $ ) {

	if ( $( '.wpb-button' ).length ) {
		$( '.wpb-button' ).each( function() {
			var $button = $( this ),
				color = $button.data( 'color' ),
				colorHover = $button.data( 'color-hover' ),
				fontColor = '#ffffff',
				fontColorHover = '#ffffff';

			if ( color ) {

				if ( ! colorHover ) {
					colorHover = color;
				}

				if ( '#ffffff' === color ) {
					fontColor = '#333333';
				}

				if ( '#ffffff' === colorHover ) {
					fontColorHover = '#333333';
				}

				if ( $button.hasClass( 'wpb-flat' ) ) {

					$button.css( {
						'color' : fontColor,
						'background' : color,
						'border-color' : color
					} );

					if ( colorHover ) {
						$button.hover(
							function() {
								$button.css( {
									'color' : fontColorHover,
									'background' : colorHover,
									'border-color' : colorHover
								} );
							},
							function() {
								$button.css( {
									'color' : fontColor,
									'background' : color,
									'border-color' : color
								} );
							}
						);
					}

				} else if ( $button.hasClass( 'wpb-outline' ) ) {

					$button.css( {
						'color' : color,
						'background' : 'none',
						'border-color' : color
					} );

					$button.hover(
						function() {
							$button.css( {
								'color' : fontColorHover,
								'background' : colorHover,
								'border-color' : colorHover
							} );
						},
						function() {
							$button.css( {
								'color' : color,
								'background' : 'none',
								'border-color' : color
							} );
						}
					);
				} else if ( $button.hasClass( 'wpb-outline-inverted' ) ) {

					$button.css( {
						'color' : fontColor,
						'background' : color,
						'border-color' : color
					} );

					$button.hover(
						function() {
							$button.css( {
								'color' : colorHover,
								'background' : 'none',
								'border-color' : colorHover
							} );
						},
						function() {
							$button.css( {
								'color' : fontColor,
								'background' : color,
								'border-color' : color
							} );
						}
					);
				}
			}
		} );
	}
} );