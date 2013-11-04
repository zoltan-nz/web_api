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
<div class="span6 twitter">
	
	<p> Login using a database </p>
	<br/>
	<!--  <form class="form-horizontal" action="testSubmits.php" method="POST"> --> 
	<form class="form-horizontal" action="login_database.php" method="POST"> 
	    
	    <div class="control-group">
	    	<label class="control-label" for="username">Username:</label> 
	      	<div class="controls">
	    		<input type ="text" id="username" name="username" /> 
	 	 	</div>
	    </div>
	    
	    <div class="control-group">
	      	<label  class="control-label" for="password">Password</label> 
		    <div class="controls">
		    	<input type="password" id="password" name="password" />
		    </div>
	    </div>
	    
	    <div class="control-group">
		    <div class="controls">
		   		<input type="submit" value="Login" />
		    </div>
	    </div>

	    <small> u:admin p:letmein </small>
	    
	</form>
	</div><!-- .container form -->

</div>
</div>



