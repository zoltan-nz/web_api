<?php
define("MY_INC_CODE", 1);
define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

session_start();
require 'secret_tokens.php';
require(LIBRARY_PATH . '/twitteroauth/twitteroauth/twitteroauth.php');

/* Code from twitteroauth sample files. */

/* Build TwitterOAuth object with client credentials. */
$connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);

/* Get temporary credentials. */
$request_token = $connection->getRequestToken(TWITTER_OAUTH_CALLBACK);

/* Save temporary credentials to session. */
$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

/* If last connection failed don't display authorization link. */
switch ($connection->http_code) {
    case 200:
        /* Build authorize URL and redirect user to Twitter. */
        $url = $connection->getAuthorizeURL($token);
        header('Location: ' . $url);
        break;
    default:
        /* Show notification if something went wrong. */
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
}


