wtf.process = {
	fetch: function ( url ) {
		var apiLocation,
			locationArr = window.location.href.split('?')[0].split( '/' ),
			lastLocationItem = locationArr[ locationArr.length - 1 ],
			// Conditionally request a mobile site if the
			// width of the page is below the mobile threshhold
			isMobile = Number( $( window ).width() <= wtf.const.MOBILE_THRESHHOLD )
			deferred = $.Deferred(),
			ajaxParams = {
				localize: 1,
				url: url,
				mobile: isMobile
			};

		if ( lastLocationItem.substring( lastLocationItem.length - 4 ) === '.php' ) {
			locationArr.pop();
		}
		apiLocation = locationArr.join( '/' ) + '/api/api.php';

		$.ajax( {
			type: 'GET',
			url: apiLocation,
			data: ajaxParams
		} ).then(
			function ( data ) {
				// Check if data is actually an empty page
				// This happens when sites either have a pay-wall,
				// a full-page ad, or are lazy-loading content
				var textlength = $( $.parseHTML( data ) ).contents().text().length;

				if ( textlength ) {
					deferred.resolve(
						data,
						apiLocation + '?localize=1&mobile=' + isMobile + '&url=' + url
					);
				} else {
					deferred.reject( 'problemFetching' );
				}
			},
			function () {
				deferred.reject( 'problemFetching' );
			}
		);

		return deferred.promise();
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
