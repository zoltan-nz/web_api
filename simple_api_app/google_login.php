<?php
define("MY_INC_CODE", 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

session_start();
require 'secret_tokens.php';
require(LIBRARY_PATH . '/google-api-php-client/src/Google_Client.php');
require(LIBRARY_PATH . '/google-api-php-client/src/contrib/Google_PlusService.php');

$client = new Google_Client();
$client->setApplicationName('ApiDev505');
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->setDeveloperKey(GOOGLE_DEVELOPER_KEY);
$plus = new Google_PlusService($client);

if (isset($_GET['code'])) {
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['google_token'])) {
    $client->setAccessToken($_SESSION['google_token']);
}

if ($client->getAccessToken()) {
//    $activities = $plus->activities->listActivities('me', 'public');
//    print 'Your Activities: <pre>' . print_r($activities, true) . '</pre>';

    // We're not done yet. Remember to update the cached access token.
    // Remember to replace $_SESSION with a real database or memcached.
    $_SESSION['google_token'] = $client->getAccessToken();
    header('Location: ./index.php');
} else {
    $authUrl = $client->createAuthUrl();
    header('Location:' . $authUrl);
}