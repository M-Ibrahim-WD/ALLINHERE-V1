( function( $ ) {

	// Site Title and Description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Primary Color.
	wp.customize( 'allinhere_primary_color', function( value ) {
		value.bind( function( to ) {
			// Update h1-h6, widget titles, etc.
			$( 'h1, h2, h3, h4, h5, h6, .widget-title' ).css( 'color', to );
		} );
	} );

	// Link Color.
	wp.customize( 'allinhere_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a, .site-title a, .entry-title a' ).css( 'color', to );
		} );
	} );

	// For Header/Footer visibility, 'refresh' transport is used in PHP, so no JS needed here for that.
    // If you were to use 'postMessage' for them, you'd add JS like this:
	/*
	wp.customize( 'allinhere_show_header', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( '#masthead' ).show();
			} else {
				$( '#masthead' ).hide();
			}
		} );
	} );

	wp.customize( 'allinhere_show_footer', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( '#colophon' ).show();
			} else {
				$( '#colophon' ).hide();
			}
		} );
	} );
	*/

} )( jQuery );
