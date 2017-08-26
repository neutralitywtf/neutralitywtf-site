wtf.process = {
	fetch: function ( url ) {
		var apiLocation,
			locationArr = window.location.href.split('?')[0].split( '/' ),
			lastLocationItem = locationArr[ locationArr.length - 1 ];

		if ( lastLocationItem.substring( lastLocationItem.length - 4 ) === '.php' ) {
			locationArr.pop();
		}
		apiLocation = locationArr.join( '/' ) + '/api/api.php';

		return $.ajax( {
			type: 'GET',
			url: apiLocation,
			data: {
				localize: 1,
				url: url,
				// TODO: Mobile compatibility is coming, but for the moment
				// the ConceptReplacer library seems to not handle it
				// that well. Commenting this part out for now.
				mobile: 0 // Number( $( window ).width() <= wtf.const.MOBILE_THRESHHOLD )
			}
		} ).then(
			function ( data ) {
				return data;
			},
			function () {
				var deferred = $.Deferred();

				deferred.resolve( 'ERROR: Could not load page.' );

				return deferred.promise();
			}
		);
	},
	pushState: function ( url ) {
		var params = {
			url: $( '<span>' ).html( url ).text()
		};
		window.history.pushState(
			{
				tag: 'neutralitywtf'
			},
			document.title,
			'?' + $.param( params )
		);
	}
};
