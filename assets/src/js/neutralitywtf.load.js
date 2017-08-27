$( document ).ready( function () {
	var search,
		loader = new wtf.ui.Loader( $( 'body' ) ),
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

	if ( !!wtfdata.url ) {
		// Data already exists, and the URL is in the input already.
		// Run the load process
		search.submit();
	}
} );
