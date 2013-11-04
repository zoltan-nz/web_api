<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * *************************************** */

define("MY_INC_CODE", 1);

define("APPLICATION_PATH", "app");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");
define("LIBRARY_PATH", "lib");

include (APPLICATION_PATH . "/inc/config.inc.php");
//include (APPLICATION_PATH . "/inc/db.inc.php");
//include (APPLICATION_PATH . "/inc/functions.inc.php");

include (TEMPLATE_PATH . "/private/header.php");

?>

<!-- main page content ................................. -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=557248730973135";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrapper">
<!-- main page content -->

<div class="container">

	<div class="page-header">  
	    <h1>PRIVATE LOGIN TESTCARD</h1>
	    <p>at this page if login was sucessful</p>  
	</div> 

	<div class="row">
		<div class="span12">
		<p>Private Stuff ...</p>
		</div>
	</div>

	<div class="row">
		<div class="span12">
		<p>Like for digital skills academy</p>
		<div class="fb-like" data-href="http://www.digitalskillsacademy.com/" 
		data-send="true" data-layout="button_count" 
		data-width="450" data-show-faces="true" data-font="lucida grande"></div>
		</div>
	</div>

	<div class="row">
		<div class="span12">
		<p>Comments on : <a 
			href="http://www.insidefacebook.com/2013/01/01/top-25-facebook-pages-january-2013/">
			http://www.insidefacebook.com/2013/01/01/top-25-facebook-pages-january-2013/</a></p>
	<div class="fb-comments" 
	data-href="http://www.insidefacebook.com/2013/01/01/top-25-facebook-pages-january-2013/" 
	data-width="470" data-num-posts="10"></div>
		<br/>
		</div>
	</div>
 
</div>

<!-- keep this at the bottom to push down the footer-->
<div class="push"><!--//--></div>
</div><!-- .wrapper -->

<!-- main page  end .................................... -->

<?php include (TEMPLATE_PATH . "/private/footer.html"); ?>