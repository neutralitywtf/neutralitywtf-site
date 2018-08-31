		<div class="neutralitywtf-wrapper">
			<div class="neutralitywtf-about">
				<h1>WTF, Neutrality?</h1>
				<p>Yes. That is - no. Well, maybe. Definitely maybe.</p>
				<p>Society has instilled gender norms, of the type we tend to miss, attributing characteristics based on gender perceptions. Gender norms can manifest by broad generalizations about a certain gender, reducing gender into binary terminology, or using certain tone and language when speaking about one gender versus the other.</p>
				<p>Gender roles and society's gender norms are harmful to all genders, binary and non-binary. So why do we do them?</p>
				<p>Sometimes, we reject the notion these language influences exists (despite research to show they do). Sometimes, we just don't notice.</p>

				<h2>This site exists to make us notice</h2>
				<p><span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> exists to demonstrate what happens to our language online when we switch genders around. Is there a clear difference between how we relate to men versus how we talk about women? Do we notice when we fall into pitfalls that encourage one gender at the expense of another? Can we even see when an article we think is 'complimentary' is actually anything but?</p>
				<p class='neutralitywtf-emphasis'><span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> challenges you to try and notice.</p>
                <h2>Gender isn't binary</h2>
                <p>Gender is not a binary, it's a spectrum. The purpose of <span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> is not to undermine that. We respect and acknowledge that there are more than two genders, and that gender neutral pronouns are entirely valid. We do not intend to undermine those that exist beyond the binary.<br/>
                    The purpose of the tool is merely to flip language that is already gendered, on its head, to examine a very specific impact of how we think of <strong>gendered roles</strong> in our society.</p>
                <h2>Context matters</h2>
				<p>While the test of switching terminology around can expose biases, it is really not supposed to stand on its own. Text alone, lacking context, is proof of nothing.</p>
				<p class='neutralitywtf-emphasis'>More than anything, <span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> should be a conversation starter. Not a discussion ending hammer. Context matters.</p>

				<h1>Technical stuff</h1>
				<p><span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> uses the <a href="https://github.com/neutralitywtf/ConceptReplacer">ConceptReplacer</a> library, available on GitHub. The library uses dictionaries to do direct replacements of words based on dictionary definitions.</p>

				<h2>Technical limitations</h2>
				<p>Language is hard and complicated, but it had to be oversimplified to allow the system to replace terminology around. There are a few known limitations that currently exist with the system as it is built right now:
				<ul>
					<li><span class='neutralitywtf-emphasis'>Binary gender is a problem</span><br />Research shows that the concept of gender is far from being binary, so the fact <span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> uses binary gender is quite a limitation. However, <span class='neutralitywtf-about-text-logo'>Neutrality:WTF</span> uses this concept ot make a point <strong>about</strong> binary expectations specifically. In the future, it may expand to make further points about the broader aspects of gender and personal identities, and the societal implications that accompany them.</li>
					<li><span class='neutralitywtf-emphasis'>Manual word-lists limit the translation</span><br />The dictionaries are currently handwrittern, and not very well. This is being improved (feel free <a href="https://github.com/neutralitywtf/ConceptReplacer">to help</a>!) but it does limit the language used.</li>
					<li><span class='neutralitywtf-emphasis'>Straightforward word replacement is inherently flawed</span><br />When the dictionaries are defined, they search for words that are defined as the same "type" as the words in the parallel dictionary. However, some words are repeated in multiple types and the system can't recognize which to switch to.<br/>An example of this is the word 'her' that can be replaced with either 'him' ('talk to her' becomes 'talk to him') or with the word 'his' ('her house' becomes 'his house'). The system as it is built right now is plain; it looks for the word and conducts a plain, straightforward replacement, so the ambiguity can result in "him" and "his" appearing in error.</li>
				</ul>
				<h2>Contribute</h2>
				<p>This tool is still being developed; it's in beta phase, and has a lot of potential. If you catch any bugs or have any suggestions, <a href="https://github.com/neutralitywtf/ConceptReplacer">please check out the github page</a>.
				</p>
				</p>

				<h1>Contact</h1>
				<p class='neutralitywtf-emphasis'>For questions and inquiries, please use<br/>contact [at] neutrality.wtf</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</div>
