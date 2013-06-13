<% if $LatestTweetsList %>
	<div class="latest_tweets">
		<div class="title">
			<h1>Latest Tweets</h1>
		</div>
		<ul class="tweets">
			<% loop $LatestTweetsList %>
				<li>
					<span>$Text</span>
					<span class="tweet-date">$Date.Ago</span>
				</li>
			<% end_loop %>
		</ul>
		<a href="https://twitter.com/{$getTweetUser}" class="twitter-follow-button" data-show-count="false"><% _t('LatestTweets.Follow', 'Follow') %> @{$getTweetUser}</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
<% end_if %>