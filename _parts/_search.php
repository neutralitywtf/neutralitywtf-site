		<div class="neutralitywtf-wrapper">
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
