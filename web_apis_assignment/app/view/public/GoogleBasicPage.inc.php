<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * *************************************** */

/*
 * Checks that the constant is defined this include
 * will only run if it recieves the defined constent
 */
defined('MY_INC_CODE') or die('Access to this file is restricted');

/* ****************************************
 *	THE MAIN CONTENT OF THE PAGE IS BELOW
 *
 *  The HTML headers and footers are in
 *  include files that are pulled in here
 *  The HTML below is already within a BOOTSTRAP
 *  container DIV
 *
 * **************************************** */

?>
 
<div class="container">
<!-- <form class="form-horizontal" action="login.php" method="POST"> -->

<div class="row">
<div class="span6">
	
	<h1> Google Buttons </h1>
	<p> get button code from : <a href="https://developers.google.com/+/web/+1button/">https://developers.google.com/+/web/+1button/</a></p>
	<br/>

	<!-- Place this tag where you want the +1 button to render. -->
	<div class="g-plusone" data-annotation="inline" data-width="300"></div>

</div>
</div>

<div class="row">
<div class="span6">
	</br>
	<h1> Google Badge </h1>
	<p> get badge code from : <a href="https://developers.google.com/+/plugins/badge/">https://developers.google.com/+/plugins/badge/</a></p>
	<br/>

	<!-- Place this tag where you want the badge to render. -->
	<div class="g-plus" data-height="69" data-href="//plus.google.com/107940309094061908018" data-rel="author"></div>

	<!-- another format -->
	<g:plus href="https://plus.google.com/107940309094061908018" rel="author"></g:plus>

</div>
</div>

<div class="row">
<div class="span12">
	</br>
	<h1> Google Maps </h1>

	<p> Tutorial : <a href="https://developers.google.com/maps/documentation/javascript/tutorial">https://developers.google.com/maps/documentation/javascript/tutorial</a></p>

	<p> Get Access Token : <a href="https://code.google.com/apis/console ">https://code.google.com/apis/console </a></p>
	<br/>
		<div id="map_canvas">MAP HERE</div>	
	<br/>

</div>
</div>

</div><!-- .container form -->



<!-- 
	FROM GOOGLE
	Ref: https://developers.google.com/+/web/+1button/
	Place this tag after the last +1 button tag. 
-->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>




