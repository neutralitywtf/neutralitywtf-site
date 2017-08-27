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
			' Couldn\'t load the site. Please try another URL, or try again later.'
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
