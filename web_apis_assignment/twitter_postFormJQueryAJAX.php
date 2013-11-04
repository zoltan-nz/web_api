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
 * Example of using AJAX with the JQuery Libraries
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

<!-- THE BODY SHOULD REALLY BE IN ITS OWN FILE UNDER app/view/public -->

<!-- main page content ................................. -->

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

       	<h2>Post your Tweet via an JQuery AJAX call</h2>

 			<form method="POST" class="form-horizontal helpDoc" onSubmit="return false;">   

			<!-- This is the same as the twitter_postFormAJAX.php	-->
			<div id="AJAXResponseMessage"></div>
			<div id="AJAXResponseDebug"></div>
			<!-- the divs above are replaced by the AJAX call response -->

            <div class="control-group">  
                <label class="control-label" for="input3">Your Tweet</label>  
                <div class="controls">  
                    <textarea name="aTweet" id="input3" rows="8" class="span5" 
                    placeholder="Your tweet, 140 characters only"></textarea>  
                </div>  
            </div>  
            <div class="form-actions">  
                <button name="submitButton" class="btn btn-primary">Send</a>
            </div>

            <!-- loading animated gif, invisible by default in CSS -->
            <p align="right"><img id="loading" src="img/ajax_load.gif" 
            					  alt="sending"
            					  width="5%"
            					  height="5%" /></p>   
  
			</form> 

       
	   </div><!-- .span8 -->
 
 </div><!-- .row -->
 </div><!-- .container -->

 <br/>

 <!-- Twitter JS -->
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 

 <!-- javascript for AJAX call, assigns function to button click -->
 <script type="text/javascript" src="js/twitter_JQueryAJAXcall.js"></script>

<!-- main page  end .................................... -->

<?php
/*
 * Pull in the public version of the footer
 * contains JQuery pullin and <BODY/><HTML/>
 */
 include (TEMPLATE_PATH . "/public/footer.html"); 
 ?>