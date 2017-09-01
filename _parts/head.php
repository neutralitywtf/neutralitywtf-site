<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Social media !-->
		<meta property="og:title" content="Neutrality.WTF" />
		<meta property="og:image" content="https://www.neutrality.wtf/assets/images/neutralitywtf.jpg" />
		<meta property="og:url" content="<?php
echo 'https://www.neutrality.wtf/index.php';
if ( $url ) {
	echo '?url=' . urldecode( $url );
}
		?>" />

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
							<li class="neutralitywtf-topbar-menu-item-main <?php echo $page === 'main' ? 'neutralitywtf-topbar-menu-active' : '' ?>"><a href="index.php">Main</a></li>
							<li class="neutralitywtf-topbar-menu-item-about <?php echo $page === 'about' ? 'neutralitywtf-topbar-menu-active' : '' ?>"><a href="about.php">About</a></li>
							<hr />
						</ul>
					</div>
				</div>
			</div>
		</div>
