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
