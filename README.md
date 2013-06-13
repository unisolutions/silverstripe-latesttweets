silverstripe-latesttweets
=======================

Latest Tweets module for SilverStripe.

## Maintainer Contact

Elvinas Liutkevičius

<elvinas (at) unisolutions (dot) eu>

## Requirements

SilverStripe 3

## Documentation

Simply install the module using the standard method.

This module uses SS_Cache to reduce the amount of Twitter REST API requests. Default cache lifetime is 30min.
You can change this value by putting this line in your _config.php (1800 is cache lifetime in seconds):

	SS_Cache::set_cache_lifetime('TaTw_cache', 1800, 10);

## Usage

Simple. Just place $LatestTweets anywhere in your template.

If you're unhappy with default tweet list template you can override the default LatestTweets.ss template.

## Third parties

Uses [`tmhOAuth`](https://github.com/themattharris/tmhOAuth) library written in PHP by Matt Harris (http://themattharris.com),
specifically for use with the Twitter API.
