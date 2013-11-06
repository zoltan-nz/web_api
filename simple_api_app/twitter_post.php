<?php
//Constant for security
session_start();

define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

/* Libraries and tokens for twitter queries */
require(LIBRARY_PATH . '/twitteroauth/twitteroauth/twitteroauth.php');
require 'secret_tokens.php';

if (isset($_SESSION['status']) and $_SESSION['status'] == 'verified') {
    $access_token = $_SESSION['access_token'];

    /* Create a TwitterOauth object with consumer/user tokens. */
    $connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

    $_SESSION['twitter_post_result'] = $connection->post('statuses/update', array('status' => $_POST['status']));

    header('Location: ./index.php#twitter_post_form');
} else {
    echo 'you are not eligible for using this script';
}


include (LAYOUT_PATH.'/footer.php');
