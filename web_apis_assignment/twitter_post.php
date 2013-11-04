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
 * Create a constant to be checked by include files
 * this ensures the include files cannot be called on their own
 */

define("MY_INC_CODE", 1);

/*
 * Set up a constant to your main application path
 */

define("APPLICATION_PATH", "app");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");
define("LIBRARY_PATH", "lib");

/*
 * Pull in the configuration files
 * As these files are inside php tags their data
 * is not written within the presented HTML page
 * this ensure that tokens, passwords, usernames etc
 * are secure used 
 */

include (APPLICATION_PATH . "/inc/config.inc.php");
//include (APPLICATION_PATH . "/inc/db.inc.php");
//include (APPLICATION_PATH . "/inc/functions.inc.php");

/*
 * Pull in the header component of the HTML page
 * This header is used for all pages that do not
 * require a login e.g. publically accessible pages
 * Contains <HTML><HEADER></HEADER><BODY> and menu ..
 */

include (TEMPLATE_PATH . "/public/header.php");

?>

<!-- main page content ................................. -->

<!-- THE BODY SHOULD REALLY BE IN ITS OWN FILE UNDER app/view/public -->

<!--  button -->
<div class="container buttonbar">
<p align="right">
  <a href="index.html" class="btn btn-success btn-large">
  	<i class="icon-white icon-arrow-left"></i>  Back to Twitter Home</a>
</p>
</div>

<div class="container twitter">
<div class="row">

	   <div class="span4">
       <h2>My Tweets</h2>
       <p><a class="twitter-timeline"  
             href="https://twitter.com/crowforgedev"  
             data-widget-id="308732289569923072">Tweets by @crowforgedev</a></p>
       </div><!-- .span4 -->

       <div class="span8">
       <h2>JSON Response from Twitter</h2>


       <?php

		// Load the app's OAuth tokens into memory
		require (APPLICATION_PATH . "/inc/app_tokens_twitter.inc.php");

		// Load the tmhOAuth library
		require 'lib/tmhOAuth_v0.7.5/tmhOAuth.php';
		require 'lib/tmhOAuth_v0.7.5/tmhUtilities.php';

		// Create an OAuth connection to the Twitter API
		$connection = new tmhOAuth(array(
		  'consumer_key'    => $consumer_key,
		  'consumer_secret' => $consumer_secret,
		  'user_token'      => $user_token,
		  'user_secret'     => $user_secret
		));

		//can't tweet duplicates so use time to make tweet unique
		$time = time();
		$currenttime = date ('Y-m-d H:i', $time - ($time % 300));

		// Send a tweet
		$code = $connection->request('POST', 
			$connection->url('1.1/statuses/update'), 
			array('status' => 'A programatic post at '.$currenttime));

		// A response code of 200 is a success
		if ($code == 200) 
		{
		  print "Tweet sent";
		  tmhUtilities::pr(json_decode($connection->response['response']));
		} 
		else 
		{
		  print "Error: $code";
		  tmhUtilities::pr($connection->response['response']);
		}

		?>
		 </div><!-- .span4 -->
 
 </div><!-- .row -->
 </div><!-- .container -->

 <br/>

 <!-- Twitter JS -->
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 

<!-- main page  end .................................... -->

<?php
/*
 * Pull in the public version of the footer
 * contains JQuery pullin and <BODY/><HTML/>
 */
 include (TEMPLATE_PATH . "/public/footer.html"); 
 ?>