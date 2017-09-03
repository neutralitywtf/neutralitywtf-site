window.neutralitywtf = {};

( function ( $, wtf ) {

wtf.const = {
	/**
	 * Threshhold, in pixels, noting when the request
	 * should attempt to fetch a mobile site
	 *
	 * @property {number}
	 */
	MOBILE_THRESHHOLD: 500
};

wtf.ui = {};

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
	addStyles: function ( data ) {
		// var $style = $( '<style>' )
		// 		.attr( 'type', 'text/css' ),
		// 	styles ='.conceptreplacer-replaced {' +
		// 		'background-color: red;' +
		// 		'}';

		// return $( $.parseHTML( data ) ).contents().find( 'head' )
		// 	.append(
		// 		$style.append( styles )
		// 	).html();
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

wtf.ui.Loader = function WtfUiLoader ( $wrapper ) {
	// Mixin constructors
	OO.EventEmitter.call( this );

	this.$wrapper = $wrapper;
};

OO.initClass( wtf.ui.Loader );
OO.mixinClass( wtf.ui.Loader, OO.EventEmitter );

/**
 * Trigger a start of a load
 */
wtf.ui.Loader.prototype.start = function () {
	this.setState( 'loading' );
};

/**
 * Trigger a finished loading
 */
wtf.ui.Loader.prototype.finish = function () {
	this.setState( 'loaded' );
};

/**
 * Trigger a reset of loading process
 */
wtf.ui.Loader.prototype.reset = function () {
	this.setState( '' );
};

/**
 * Set loading state
 *
 * @param {string} loadingState Loading state; none, 'loading' or 'loaded'
 * @fires stateChange
 */
wtf.ui.Loader.prototype.setState = function ( loadingState ) {
	this.$wrapper
		.toggleClass( 'neutralitywtf-loading', loadingState === 'loading' )
		.toggleClass( 'neutralitywtf-loaded', loadingState === 'loaded' );

	this.emit( 'stateChange', loadingState );
};

wtf.ui.SearchWidget = function WtfUiSearchWidget ( $element, loader, config ) {
	// Configuration initialization
	config = config || {};

	// Mixin constructors
	OO.EventEmitter.call( this );

	// Initialize elements
	this.$element = $element;
	this.loader = loader;

	this.msgs = {
		badUrl: '<strong>Can\'t do it!</strong> Please try again with a valid URL.',
		problemFetching: '<strong>Oh noes!</strong>' +
			' Couldn\'t display the content. There is an issue loading the site; this might be because of pay-wall or a full-page ad obscuring the content.<br />' +
			' Please try another URL, or try again later.'
	};

	this.$info = this.$element.find( '.neutralitywtf-search-info' );
	this.$alert = this.$element.find( '.neutralitywtf-search-alert' );
	this.$input = this.$element.find( '.neutralitywtf-search-input input' );
	this.$button = this.$element.find( '.neutralitywtf-search-input button' );

	// Events
	this.$button.on( 'click', this.submit.bind( this ) );
	this.$input.on( 'keypress', this.onInputKeypress.bind( this ) );

	this.loader.connect( this, { stateChange: 'onLoaderStateChange' } );
};

OO.initClass( wtf.ui.SearchWidget );
OO.mixinClass( wtf.ui.SearchWidget, OO.EventEmitter );

/**
 * Listen to loading state change
 *
 * @param {string} loadingState Loading state; 'loading' or 'loaded'
 */
wtf.ui.SearchWidget.prototype.onLoaderStateChange = function ( loadingState ) {
	this.$input.prop( 'disable', loadingState === 'loading' ? 'disabled' : '' );
	this.$button.prop( 'disable', loadingState === 'loading' ? 'disabled' : '' );
};

/**
 * Listen to keypress even to intercept the enter key
 *
 * @param {jQuery.event} e jQuery event
 */
wtf.ui.SearchWidget.prototype.onInputKeypress = function ( e ) {
	this.$alert.hide();

	if ( e.which === 13 ) {
		this.submit();
	}
};

/**
 * Set the current value of the search to the given URL
 *
 * @param {string} url URL to set the value to
 */
wtf.ui.SearchWidget.prototype.setValue = function ( url ) {
	this.$input.val( url );
};
/**
 * Check whether the given URL is valid
 *
 * @param {string} url Given url
 * @return {boolean} URL is valid
 */
wtf.ui.SearchWidget.prototype.isValid = function ( url ) {
	var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;

	return pattern.test( url );
};

/**
 * Submit the form with the URL. Validate first.
 *
 * @return {boolean} false
 */
wtf.ui.SearchWidget.prototype.submit = function () {
	var url = this.$input.val();

	if ( this.isValid( url ) ) {
		this.$alert.hide();
		this.emit( 'fetch', url );
	} else {
		this.setFailure( 'badUrl' );
	}
	return false;
};

/**
 * Trigger a failure with a special message
 */
wtf.ui.SearchWidget.prototype.setFailure = function ( failureMessage ) {
	var msg;

	failureMessage = failureMessage || 'badUrl';

	msg = this.msgs[ failureMessage ] || this.msg.badUrl;

	this.$alert.find( 'div' ).html( msg );
	this.$alert.show();
};

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

		wtf.process.fetch( url ).then(
			function ( data, apiURL ) {
				// Now that we know it's ready, we can load
				// using the api url, since it will be cached
				// And we src is more supported than srcdata
				$display
					.prop( 'src', apiURL )
					.on( 'load', function () {
						var $ambiguous = $( this ).contents().find( '.conceptreplacer-ambiguous' );
						// Define a popup for ambiguous words inside the iframe
						$ambiguous
							.append(
								$( '<span>' )
									.text( '*' )
									// This is inside the iFrame, so we need to
									// specifically state it here rather than in a CSS page
									.css( {
										size: '0.8em',
										color: '#e28089'
									} )
							)
							.magnificPopup( {
								items: {
									type: 'inline',
									closeBtnInside: true,
									closeOnContentClick: true,
									showCloseBtn: true,
									src: $( '#ambiguity-popup' )
								}
							} );
					} );

				wtf.process.pushState( url );
				loader.finish();
			},
			// Failure
			function () {
				search.setFailure( 'problemFetching' );
				loader.reset();
			}
		);
	} );

	// Change the logo to fit small screens
	$( window ).on( 'resize', adjustSmallScreen );
	adjustSmallScreen();

	// Load if needed
	if ( !!wtfdata.url ) {
		// Data already exists, and the URL is in the input already.
		// Run the load process
		search.submit();
	}

	// Load examples
	$( '.neutralitywtf-search-examples ul li a' ).on( 'click', function () {
		var url = $( this ).data( 'url' );

		$( '.neutralitywtf-topbar-middle-menu #view-original' )
			.prop( 'href', url );

		search.setValue( url );
		search.submit();

		return false;
	} );

	/** Functions */

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

}( jQuery, neutralitywtf ) );
