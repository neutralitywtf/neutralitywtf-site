<?php
header( 'Access-Control-Allow-Origin: *' );
session_start();

require '../ConceptReplacer/bootstrap.php';
require '../vendor/autoload.php';

/**
 * Get a value from the GET variable and fallback on default
 * if the variable isn't set.
 *
 * @param string $getVar The name of the GET variable
 * @param mixed $default Default value to fallback on
 * @return mixed Value or default
 */
function safeGet( $getVar, $default = false ) {
	return isset( $_GET[ $getVar ] ) ? $_GET[ $getVar ] : $default;
}

define( 'CACHE_VERSION', 0.7 );

$sessionID = session_id();

$url = urldecode( html_entity_decode( filter_var( safeGet( 'url' ), FILTER_SANITIZE_STRING ) ) );
// Remove &#xx entities
// See http://www.php.net/manual/en/function.html-entity-decode.php
$url = preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $url);

$module = filter_var( safeGet( 'module', 'swapgender' ), FILTER_SANITIZE_STRING );
$isMobile = (bool)filter_var( safeGet( 'mobile', false ), FILTER_SANITIZE_STRING );
$localize = (bool)safeGet( 'localize' );

if ( $url ) {
	phpFastCache\CacheManager::setDefaultConfig( [
		'path' => dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'cache',
	] );
	$cache = phpFastCache\CacheManager::getInstance( 'files' );

	$keywordWebpage = md5( $url . $isMobile . CACHE_VERSION );

	// try to get from Cache first.
	$resultsItem = $cache->getItem( $keywordWebpage );

	if ( !$resultsItem->isHit() ) {
		$api = new ConceptReplacer\API(
			$url,
			$module,
			$localize,
			$isMobile
		);
		$output = $api->process();

		$resultsItem->set( $output );
		$resultsItem->expiresAfter( 3600 * 12 );
		$cache->save( $resultsItem );
	}

	echo $resultsItem->get();
} else {
	echo 'ERROR: Bad request';
}
?>
