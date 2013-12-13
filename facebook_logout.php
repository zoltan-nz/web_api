<?php
session_start();

//Constant for security
define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

require 'secret_tokens.php';
require LIBRARY_PATH . '/facebook-php-sdk/src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId' => FACEBOOK_APP_ID,
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

// if user exist get the logout url and destroy the session, after logout browser redirect to this page
// so if user logged out then else part will be fired and we can go back to home page.

if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
    session_destroy();
    header('Location: ' . $logoutUrl);
} else {
    session_destroy();
    header('Location: ./index.php');
}