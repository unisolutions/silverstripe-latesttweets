<?php

class LaTw_SiteConfig_Extension extends DataExtension
{

    private static $db = array(
        'TwitterName' => 'Varchar(100)',
        'TwitterConsumerKey' => 'Varchar(100)',
        'TwitterConsumerSecret' => 'Varchar(100)',
        'TwitterAccessToken' => 'Varchar(100)',
        'TwitterAccessTokenSecret' => 'Varchar(100)',
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab("Root.LatestTweets", new TextField('TwitterName', _t('LatestTweets.TwitterName', 'Twitter Name')));
        $fields->addFieldToTab("Root.LatestTweets", new TextField('TwitterConsumerKey', _t('LatestTweets.TwitterConsumerKey', 'Consumer Key')));
        $fields->addFieldToTab("Root.LatestTweets", new TextField('TwitterConsumerSecret', _t('LatestTweets.TwitterConsumerSecret', 'Consumer Secret')));
        $fields->addFieldToTab("Root.LatestTweets", new TextField('TwitterAccessToken', _t('LatestTweets.TwitterAccessToken', 'Access Token')));
        $fields->addFieldToTab("Root.LatestTweets", new TextField('TwitterAccessTokenSecret', _t('LatestTweets.TwitterAccessTokenSecret', 'Access Token Secret')));
    }
}
