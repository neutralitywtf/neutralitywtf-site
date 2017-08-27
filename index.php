<?php
session_start();
$url = isset( $_GET[ 'url' ] ) ? urlencode( filter_var( $_GET[ 'url' ], FILTER_SANITIZE_STRING ) ) : '';
$module = 'swapgender'; // For the moment, that's the only module
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Neutrality:WTF || Check the neutrality of text online</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

		<!-- Loading animation from https://loading.io/animation/ -->
		<!-- <link rel="stylesheet" type="text/css" href="assets/lib/loading.css"/> -->

		<!-- Custom styles for this page -->
		<link href="assets/neutrality.wtf.build.css" rel="stylesheet">
<?php
	echo "<script type='text/javascript'>var wtfdata=" .
		json_encode( [ 'url' => $url, 'module' => $module ] ) .
		'</script>';
?>
	</head>
	<body>
		<div class="neutralitywtf-wrapper">
			<div class="neutralitywtf-topbar neutralitywtf-table">
				<div class="neutralitywtf-row">
					<div class="neutralitywtf-topbar-logo neutralitywtf-cell"><a href="?">Neutrality:WTF</a></div>
					<div class="neutralitywtf-topbar-middle neutralitywtf-cell">
						<ul class="neutralitywtf-topbar-middle-menu">
							<li><a id="view-original" target="_blank" href="<?php echo urldecode( $url ); ?>">[ View original ]</a></li>
							<li><a id="try-again" href="?">[ Try another ]</a></li>
						</ul>
					</div>
					<div class="neutralitywtf-topbar-menu neutralitywtf-cell">
						<ul>
							<li class="neutralitywtf-topbar-menu-item-main neutralitywtf-topbar-menu-active">Main</li>
							<li class="neutralitywtf-topbar-menu-item-about">About</li>
							<hr />
						</ul>
					</div>
				</div>
			</div>

			<div class="neutralitywtf-search">
				<div class="neutralitywtf-search-info">
					<p>When you read something online and you ask yourself</p>
					<h1>What would it sound like if it was said about the opposite gender?</h1>
					<p>Check what happens when you take a text and switch all gender terms around. Women become men, and men become women. Does it sound the same? Is the text neutral?</p>
				</div>
				<div class="neutralitywtf-search-alert">
					<div class="alert alert-danger" role="alert">
					  <strong>Can't do it!</strong> Please try again with a valid URL.
					</div>
				</div>
				<div class="neutralitywtf-search-input">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="http://" aria-label="Search for..." id="targetUrl" <?php if ( $url ) { echo 'disabled="disabled" value="' . urldecode( $url ) . '"'; } ?>>
						<span class="input-group-btn">
							<button class="btn btn-danger" type="button" id="actionButton" <?php if ( $url ) { echo 'disabled="disabled"'; } ?>>Switch it up!</button>
						</span>
					</div>
					<p><small>Test the neutrality of online text by typing a URL in the box above.</small></p>
				</div>

				<div class="neutralitywtf-spinner"><div class="neutralitywtf-spinner-image"></div></div>
				<div class="neutralitywtf-search-examples">
					<h1>Examples</h1>
					<ul>
<?php
	$examples = [
		'https://en.wikipedia.org/wiki/Ada_Lovelace' => 'Ada Lovelace (Wikipedia)',
		'http://www.wikihow.com/Treat-Girls-and-Women' => 'How to Treat Girls and Women (WikiHow)',
		'https://en.wikipedia.org/wiki/Women\'s_empowerment' => 'Women\'s empowerment (Wikipedia)',
		'https://en.wikipedia.org/wiki/Men\'s_rights_movement' => 'Men\'s rights movement (Wikipedia)',
		'http://money.cnn.com/2017/08/21/news/economy/girls-who-code-saujani/index.html' => 'Girls Who Code founder: Men build technologies to \'replace their mothers\' (CNN)'
	];

	foreach ( $examples as $exampleUrl => $exampleText ) {
		echo '<li>' .
			'<a' .
				' href="?url=' . $exampleUrl . '"' .
				' data-url="' . $exampleUrl . '"' .
			'">' . $exampleText . '</a>' .
		'</li>';
	}
?>
					</ul>
				</div>
			</div>

		</div>

		<iframe class="neutralitywtf-display"></iframe>




		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="assets/lib/jquery-3.2.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="vendor/twbs/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="vendor/twbs/bootstrap/assets/js/vendor/popper.min.js"></script>
		<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="vendor/twbs/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>

		<script src="node_modules/oojs/dist/oojs.jquery.min.js"></script>
		<script src="assets/neutrality.wtf.build.js"></script>
	</body>
</html>
