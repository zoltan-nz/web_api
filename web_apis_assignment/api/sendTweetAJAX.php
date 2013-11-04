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

/*
  The above checks that the parameter submitTweet is sent to this file.
  If it is, the form has been submitted from the form 
*/

if (!isset($_REQUEST['s']) || $_REQUEST['s'] != '133COR') { 
  echo "<div class=\"alert alert-error\">INVALID ACCESS TO SCRIPT</div>";
  exit;
}

$myTweet = $_REQUEST['aTweet'];

// check if there is a tweet
if (empty($myTweet)) 
    $error = 'You must enter text'; 

// check if an error was found - if there was, send the user back to the form 
if (isset($error)) 
{ 
    echo "<p>".$error."</p>"; 
}
else
{
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

      // stream back to the form
      //echo "<p>".$returnMessage."</p>"; 
      echo "<div class=\"alert alert-success\">".$returnMessage."</div>";
      //tmhUtilities::pr(json_decode($connection->response['response'])) 
    } 
    else 
    {
      //print "Error: $code";
      $returnMessage = "ERROR $code";
      // stream back to the form
      //echo "<p>".$returnMessage."</p>";
      echo "<div class=\"alert alert-error\">".$returnMessage."</div>";
      //tmhUtilities::pr($connection->response['response']);  
    }
}


?>