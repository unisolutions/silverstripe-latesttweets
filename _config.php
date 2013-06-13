<?php

SS_Cache::add_backend('LatestTweets_cache', 'File', array('cache_dir' => TEMP_FOLDER . DIRECTORY_SEPARATOR . 'cache'));
SS_Cache::set_cache_lifetime('LatestTweets_cache', 1800, 10);
SS_Cache::pick_backend('LatestTweets_cache', 'any', 10);

Object::add_extension('SiteConfig', 'LaTw_SiteConfig_Extension');
Object::add_extension('Page_Controller', 'LaTw_Page_Controller_Extension');