		<div class="neutralitywtf-wrapper">
			<div class="neutralitywtf-search">
				<div class="neutralitywtf-search-info">
					<h1>Can we examine the neutrality of gendered language online?</h1>
					<p>Get some insight about the neutrality of online pages by typing a valid URL below, and the system will show it to you with binary gender terms switched around:</p>
				</div>
				<div class="neutralitywtf-search-alert">
					<div class="alert alert-danger" role="alert">
					  <strong>Can't do it!</strong> Please try again with a valid URL.
					</div>
				</div>
				<div class="neutralitywtf-search-input">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Type a URL..." aria-label="Search for..." id="targetUrl" <?php if ( $url ) { echo 'disabled="disabled" value="' . urldecode( $url ) . '"'; } ?>>
						<span class="input-group-btn">
							<button class="btn btn-danger" type="button" id="actionButton" <?php if ( $url ) { echo 'disabled="disabled"'; } ?>>Switch it up!</button>
						</span>
					</div>
				</div>

				<div class="neutralitywtf-spinner"><div class="neutralitywtf-spinner-image"></div></div>
				<div class="neutralitywtf-search-disclaimer">
                    <h2>NOTE<small class="neutralitywtf-search-disclaimer-readmore"><a href="about.php">[ Read more ]</a></small></h2>
                    <p><span class='neutralitywtf-emphasis'>But actually... Gender isn't binary.</span><br />
                        <small class='neutralitywtf-about-text-logo neutralitywtf-search-disclaimer-text'>There are more than two genders, and gender neutral pronouns are entirely valid. This exercise is meant to flip on its head gendered language specifically, and not to undermine those that exist beyond the binary.</small></p>
                    <p><span class='neutralitywtf-emphasis'>And... Text depends on context.</span><br />
                        <small class='neutralitywtf-about-text-logo neutralitywtf-search-disclaimer-text'>This tool should be a conversation starter. Not a discussion-ending hammer. Context matters.</small></p>
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
				<div class="neutralitywtf-search-bookmarklet">
					<h1>Bookmarklet</h1>
					<p>If you want to add a button that will automatically send websites to <span class='neutralitywtf-about-text-logo'>neutrality.wtf</span>, drag this box to your bookmarks bar: <a href="javascript: (function () {var jsCode = document.createElement('script');jsCode.setAttribute('src', 'http://www.neutrality.wtf/assets/neutrality.wtf.bookmarklet.js');document.body.appendChild(jsCode);}());">Send to Neutrality.WTF</a>
					</p>
				</div>
			</div>
		</div>

		<iframe class="neutralitywtf-display"></iframe>
