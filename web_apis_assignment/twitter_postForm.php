<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * Ref : 
 * http://140dev.com
 * https://dev.twitter.com/docs/api/1.1/post/statuses/update.
 * https://github.com/themattharris/tmhOAuth-examples.git
 * http://rosstanner.co.uk/2012/11/build-simple-contact-form-html-php-bootstrap/
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
  <a href="index.php" class="btn btn-success btn-large">
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

       	<h2>Post your Tweet via a PHP page</h2>

 			<form method="POST" action="./api/sendTweet.php" class="form-horizontal helpDoc">   
       		 <!-- 
       		 If you POST to testSubmits.php you can see what is being sent, it is a good
       		 way to debug the process or to prototype a form
       		 <form method="POST" action="testSubmits.php" class="form-horizontal helpDoc">
       		 --> 

          <!-- This code does not need to be inside the form elements, it is here because
               that is where I want the error or status message displayed. It could be 
               anywhere on the page. Also this code only displays something on the page
               after the button to send a tweet is clicked. The first time you visit the page
               there are no URL parameters, these are added by the PHP page called by the
               send button being pressed, when it returns back to this page once it contacts
               Twitter and attempts to send the message 
          -->
          <?php           
            /* 
               When a PHP page is used to send the tweet, once the tweet is sent
               then the program returns to this page with additional parameters on the
               URL the code below detects these parameters and displays the appropiate
               message. $_REQUEST works if either a POST or GET was used to return back
               to this page       		 
            */
               
    				// check for a successful tweet  
    				if (isset($_REQUEST['ack'])) echo "<div class=\"alert alert-success\">".$_REQUEST['ack']."</div>";  

    				// check for a form error  
    				elseif (isset($_REQUEST['inerr'])) echo "<div class=\"alert alert-error\">".$_REQUEST['inerr']."</div>";  

    				// check for a tweet error  
    				elseif (isset($_REQUEST['nack'])) echo "<div class=\"alert alert-error\">".$_REQUEST['nack']."</div>";  

    			 ?>
           <!-- end of the PHP that displays the status of the tweet send request -->

            <div class="control-group">  
                <label class="control-label" for="input3">Your Tweet</label>  
                <div class="controls">  
                    <textarea name="aTweet" id="input3" rows="8" class="span5" 
                    placeholder="Your tweet, 140 characters only"></textarea>  
                </div>  
            </div>  
            <div class="form-actions twitter">  
                <input type="hidden" name="submitTweets" value="tweetSent">  
                <button type="submit" name="submitButton" class="btn btn-primary">Send</button>  
            </div>  
  
			</form> 

       <!-- <h2>JSON Response from Twitter</h2>

       <?php
       		if (isset($_REQUEST['json'])) echo $_REQUEST['json']; 
       ?> 

   		-->
       
	   </div><!-- .span8 -->
 
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