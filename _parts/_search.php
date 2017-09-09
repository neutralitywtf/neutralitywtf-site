		<div class="neutralitywtf-wrapper">
			<div class="neutralitywtf-search">
				<div class="neutralitywtf-search-info">
					<p>When you read something online and you ask yourself</p>
					<h1>What would it sound like if it was said about the opposite gender?</h1>
					<p>Get insight about the neutrality of online pages by switching the gender terms around:</p>
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
				</div>

				<div class="neutralitywtf-spinner"><div class="neutralitywtf-spinner-image"></div></div>
				<div class="neutralitywtf-search-disclaimer">
					<p><span class='neutralitywtf-emphasis'>... but note: Text depends on context. Not everything that sounds weird is sexist, and not everything that is sexist sounds weird.</span><br /><small class='neutralitywtf-about-text-logo'>This tool should be a conversation starter. Not a discussion-ending hammer. Context matters.</small></p>
				</div>
				<div class="neutralitywtf-search-examples">
					<h1>Examples</h1>
					<ul>
	<?php
	$examples = [
		'https://en.wikipedia.org/wiki/Ada_Lovelace' => [
			'title' => 'Ada Lovelace (Wikipedia)',
		],
		'http://www.wikihow.com/Treat-Girls-and-Women' => [
			'title' => 'How to Treat Girls and Women (WikiHow)'
		],
		'http://www.nytimes.com/2013/03/31/science/space/yvonne-brill-rocket-scientist-dies-at-88.html' => [
			'title' => 'Yvonne Brill, a Pioneering Rocket Scientist, Dies at 88 (NYTimes)',
		],
		'http://money.cnn.com/2017/08/21/news/economy/girls-who-code-saujani/index.html' => [
			'title' => 'Girls Who Code founder: Men build technologies to \'replace their mothers\' (CNN)',
			'hideFromMobile' => true,
		],
	];

	foreach ( $examples as $exampleUrl => $details ) {
		echo '<li';
			if ( isset( $details[ 'hideFromMobile' ] ) && $details[ 'hideFromMobile' ] ) {
				echo ' class="neutralitywtf-search-examples-hideMobile"';
			}
		echo '>' .
			'<a' .
				' href="?url=' . $exampleUrl . '"' .
				' data-url="' . $exampleUrl . '"' .
			'">' . $details['title'] . '</a>' .
		'</li>';
	}
	?>
					</ul>
				</div>
			</div>
		</div>

		<iframe class="neutralitywtf-display"></iframe>
