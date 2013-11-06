<?php
error_reporting(-1);
session_start();

//Constant for security
define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

require 'secret_tokens.php';
require LIBRARY_PATH.'/facebook-php-sdk/src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId'  => FACEBOOK_APP_ID,
    'secret' => FACEBOOK_SECRET,
));

$user = $facebook->getUser();

if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
    session_destroy();
    header('Location: ' . $logoutUrl);
}
else
{
    session_destroy();
    header('Location: ./index.php');
}