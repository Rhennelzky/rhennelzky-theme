( function( $ ) {
	wp.customize( 'footer_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer_bkg' ).css('background-color', to);
		} );
	} );
})( jQuery );