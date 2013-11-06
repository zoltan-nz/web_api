<?php
/**
 * @file
 * Take the user when they return from Twitter. Get access tokens.
 * Verify credentials and redirect to based on response from Twitter.
 */

error_reporting(-1);

define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

/* Start session and load lib */
session_start();
require(LIBRARY_PATH . '/twitteroauth/twitteroauth/twitteroauth.php');
require 'secret_tokens.php';

/* If the oauth_token is old redirect to the connect page. */
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
    $_SESSION['oauth_status'] = 'oldtoken';
    session_start();
    session_destroy();
    session_start();
    header('Location: twitter_login.php');
}

/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

/* Request access tokens from twitter */
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

/* Save the access tokens. Normally these would be saved in a database for future use. */
$_SESSION['access_token'] = $access_token;

/* Remove no longer needed request tokens */
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

/* If HTTP response is 200 continue otherwise send to connect page to retry */
if (200 == $connection->http_code) {
    /* The user has been verified and the access tokens can be saved for future use */
    $_SESSION['status'] = 'verified';

    /* Get user access tokens out of the session. */
    $access_token = $_SESSION['access_token'];

    /* Create a TwitterOauth object with consumer/user tokens. */
    $connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

    $_SESSION['twitter_results'] = $connection->get('account/verify_credentials');

    header('Location: ./index.php');
} else {
    /* Save HTTP status for error dialog on connnect page.*/
    header('Location: ./clearsessions.php');
}
