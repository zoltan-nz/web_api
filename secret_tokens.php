<?php

// Fill in with your secret tokens from Twitter API

defined('MY_INC_CODE') or die('Access to this file is restricted');

// TWITTER TOKENS
define('TWITTER_CONSUMER_KEY', 'your key');
define('TWITTER_CONSUMER_SECRET', 'your secret');
define('TWITTER_USER_TOKEN', 'your user token');
define('TWITTER_USER_SECRET', 'your user secret');
define('TWITTER_OAUTH_CALLBACK', 'http://' . $_SERVER['HTTP_HOST'] . '/twitter_callback.php');

// FACEBOOK TOKENS
define('FACEBOOK_APP_ID', 'your facebook app id');
define('FACEBOOK_SECRET', 'your facebook secret');
// Facebook App url: http://localhost:8000

// GOOGLE TOKENS
define('GOOGLE_CLIENT_ID', 'your google client id');
define('GOOGLE_CLIENT_SECRET', 'your client secret');
define('GOOGLE_REDIRECT_URI', 'http://' . $_SERVER['HTTP_HOST'] . '/google_login.php');
define('GOOGLE_SIMPLE_API_KEY', '');
define('GOOGLE_DEVELOPER_KEY', '');