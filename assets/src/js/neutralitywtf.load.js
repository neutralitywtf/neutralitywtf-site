$( document ).ready( function () {
	var loader = new wtf.ui.Loader( $( 'body' ) ),
		search = new wtf.ui.SearchWidget(
			$( '.neutralitywtf-search' ),
			loader
		),
		$display = $( '.neutralitywtf-display' );

	wtfdata = wtfdata || {};

	search.on( 'fetch', function ( url ) {
		loader.start();

		wtf.process.fetch( url )
			.then( function ( data ) {
				if ( data.substring( 0, 5 ) === 'ERROR' ) {
					loader.reset();
					search.setFailure( 'problemFetching' );
					return;
				}

				$display
					.prop( 'srcdoc', data );

				wtf.process.pushState( url );
				loader.finish();
			} );
	} );

	// Change the logo to fit small screens
	$( window ).on( 'resize', adjustSmallScreen );
	adjustSmallScreen();

	if ( !!wtfdata.url ) {
		// Data already exists, and the URL is in the input already.
		// Run the load process
		search.submit();
	}

	function adjustSmallScreen() {
		var windowWidth = $( window ).width(),
			isSmallWindow = windowWidth <= wtf.const.MOBILE_THRESHHOLD;

		$( '.neutralitywtf-topbar-logo a' )
			.text(
				isSmallWindow ?
					'Neutrality WTF' : 'Neutrality:WTF'
			);

		$( '.neutralitywtf-topbar-middle-menu #view-original' )
			.text( '[ ' + ( isSmallWindow ? 'Original' : 'View original' ) + ' ]' );
		$( '.neutralitywtf-topbar-middle-menu #try-again' )
			.text( '[ ' + ( isSmallWindow ? 'Reset' : 'Try again' ) + ' ]' );
	}
} );
