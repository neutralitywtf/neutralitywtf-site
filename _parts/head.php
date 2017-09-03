<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Check what happens when you take a text and switch all gender terms around. Women become men, and men become women. Does it sound the same? Is the text neutral?">
		<meta name="author" content="">

		<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
		<link rel="shortcut icon" type="image/png" href="http://www.neutrality.wtf/favicon.ico"/>

		<!-- Social media !-->
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Neutrality.WTF" />
		<meta property="og:image" content="http://www.neutrality.wtf/assets/images/neutralitywtf.png" />
		<meta property="og:image:secure_url" content="https://www.neutrality.wtf/assets/images/neutralitywtf.png" />
		<meta property="og:description" content="Check what happens when you take a text and switch all gender terms around. Women become men, and men become women. Does it sound the same? Is the text neutral?" />
		<meta property="og:url" content="<?php
echo 'https://www.neutrality.wtf/index.php';
if ( $url ) {
	echo '?url=' . urldecode( $url );
}
		?>" />

		<meta name="twitter:site" content="@neutralitywtf" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="Neutrality.WTF" />
		<meta name="twitter:description" content="Check what happens when you take a text and switch all gender terms around. Women become men, and men become women. Does it sound right? Is the text neutral?" />
		<meta name="twitter:image" content="http://www.neutrality.wtf/assets/images/neutralitywtf.png" />

		<!-- end OpenGraph social media definition -->

		<title>Neutrality:WTF || Check the neutrality of text online</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Magnific popup -->
		<link rel="stylesheet" href="node_modules/magnific-popup/dist/magnific-popup.css">

		<!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">


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
					<div class="neutralitywtf-topbar-logo neutralitywtf-cell"><a href="http://neutrality.wtf/">Neutrality:WTF</a></div>
					<div class="neutralitywtf-topbar-middle neutralitywtf-cell">
						<ul class="neutralitywtf-topbar-middle-menu">
							<li><a id="view-original" target="_blank" href="<?php echo urldecode( $url ); ?>">[ View original ]</a></li>
							<li><a id="try-again" href="?">[ Try another ]</a></li>
						</ul>
					</div>
					<div class="neutralitywtf-topbar-menu neutralitywtf-cell">
						<ul>
							<li class="neutralitywtf-topbar-menu-item-main <?php echo $page === 'main' ? 'neutralitywtf-topbar-menu-active' : '' ?>"><a href="index.php">Main</a></li>
							<li class="neutralitywtf-topbar-menu-item-about <?php echo $page === 'about' ? 'neutralitywtf-topbar-menu-active' : '' ?>"><a href="about.php">About</a></li>
							<hr />
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Ambiguity popup -->
			<div id="ambiguity-popup" class="white-popup mfp-hide neutralitywtf-popup">
				<p>This word has been marked as <em><strong>"ambiguous"</strong></em>, which means that the original word has several options for replacements. The system can't tell which to choose, because it doesn't know context, which makes these ambiguous replacements often wrong.</p>
				<p><small>An example of an ambiguous word is "her" being replaced either with "him" or "his" depending on context. Since the system has no understanding of context, the substitution may be wrong.</small></p>
				<button title="Got it!" type="button" class="mfp-close">&#215;</button>
			</div>
		<!-- End ambiguity popup -->