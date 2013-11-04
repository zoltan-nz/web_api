<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * Ref : 
 * http://140dev.com
 * https://dev.twitter.com/docs/api/1.1/post/statuses/update.
 * https://github.com/themattharris/tmhOAuth-examples.git
 *
 * *************************************** */

// check for form submission - if it doesn't exist then send back to form  
if (!isset($_REQUEST['submitTweets']) || $_REQUEST['submitTweets'] != 'tweetSent') { 
    header('Location: ../twitter_postForm.php?misuse=1'); exit; 
}

/*
The above checks that the parameter submitTweet is sent to this file. If it is, the form has been submitted from the form IF NOT then someone may be trying to access this file directly.If so, we want to redirect them to the form so that they can enter their details. Hidden record are used because the name of the actual button pressed and its value is because older versions of IE doesn’t submit a button value with a form submit. So easier to use a hidden field instead since that will always be posted, regardless of the broswer.
*/

$myTweet = $_REQUEST['aTweet'];

// check if there is a tweet
if (empty($myTweet)) 
    $error = 'You must enter text'; 

// check if an error was found - if there was, send the user back to the form 
if (isset($error)) { 
    header('Location: ../twitter_postForm.php?inerr='.urlencode($error)); exit; 
}

// Load the app's OAuth tokens into memory
require '../app/inc/app_tokens_twitter.inc.php';

// Load the tmhOAuth library
require '../lib/tmhOAuth_v0.7.5/tmhOAuth.php';
require '../lib/tmhOAuth_v0.7.5/tmhUtilities.php';


// Create an OAuth connection to the Twitter API
$connection = new tmhOAuth(array(
  'consumer_key'    => $consumer_key,
  'consumer_secret' => $consumer_secret,
  'user_token'      => $user_token,
  'user_secret'     => $user_secret
));

// Send a tweet
$code = $connection->request('POST', 
	$connection->url('1.1/statuses/update'), 
	array('status' => $myTweet ));

// A response code of 200 is a success
if ($code == 200) 
{
  $returnMessage = "TWEET SENT SUCESSFULLY";

  // send the user back to the form 
  header('Location: ../twitter_postForm.php?ack='.urlencode($returnMessage));
  //tmhUtilities::pr(json_decode($connection->response['response']))
  exit;  
} 
else 
{
  //print "Error: $code";
  $returnMessage = "ERROR $code";
  // send the user back to the form 
  header('Location: ../twitter_postForm.php?nack='.urlencode($returnMessage));
  //tmhUtilities::pr($connection->response['response']); 
  exit;  
}



?>