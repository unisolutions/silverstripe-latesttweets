<?php

class LaTw_Page_Controller_Extension extends Extension {

	public function getTweetUser() {
		return SiteConfig::current_site_config()->TwitterName;
	}

	public function LatestTweetsList($limit = '5') {
		$conf = SiteConfig::current_site_config();

		if (empty($conf->TwitterName)
			|| empty($conf->TwitterConsumerKey)
			|| empty($conf->TwitterConsumerSecret)
			|| empty($conf->TwitterAccessToken)
			|| empty($conf->TwitterAccessTokenSecret)
		) {
			return new ArrayList();
		}

		$cache = SS_Cache::factory('LatestTweets_cache');
		if (!($results = unserialize($cache->load(__FUNCTION__)))) {
			$results = new ArrayList();

			require_once dirname(__FILE__) . '/tmhOAuth/tmhOAuth.php';
			require_once dirname(__FILE__) . '/tmhOAuth/tmhUtilities.php';

			$tmhOAuth = new tmhOAuth(array(
				'consumer_key' => $conf->TwitterConsumerKey,
				'consumer_secret' => $conf->TwitterConsumerSecret,
				'user_token' => $conf->TwitterAccessToken,
				'user_secret' => $conf->TwitterAccessTokenSecret,
				'curl_ssl_verifypeer' => false
			));

			$code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), array(
				'screen_name' => $conf->TwitterName,
				'count' => $limit
			));

			$tweets = $tmhOAuth->response['response'];

			$json = new JSONDataFormatter();
			if (($arr = $json->convertStringToArray($tweets)) && is_array($arr) && isset($arr[0]['text'])) foreach ($arr as $tweet) {
				try {
					$here = new DateTime(SS_Datetime::now()->getValue());
					$there = new DateTime($tweet['created_at']);
					$there->setTimezone($here->getTimezone());
					$date = $there->Format('Y-m-d H:i:s');
				} catch(Exception $e) {
					$date = 0;
				}

				$results->push(new ArrayData(array(
					'Text' => nl2br(tmhUtilities::entify_with_options($tweet, array('target' => '_blank'))),
					'Date' => SS_Datetime::create_field('SS_Datetime', $date),
				)));
			}

			$cache->save(serialize($results), __FUNCTION__);
		}

		return $results;
	}

	public function LatestTweets() {
		return $this->owner->renderWith('LatestTweets');
	}

}