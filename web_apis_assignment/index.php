<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * *************************************** */

/*
 * Session is started if logged in already then
 * go straight to the private home page otherwise
 * asked to login or can browse content that does
 * not require login 
 */

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1)
{
	header("Location:  privateHomeTestCard.php");
    //header("Location: privateHome.php");
}

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
 * Before pull in header set a variable that is
 * associated with only this page. This variable 
 * will be used to turn on the menu item to show
 * which page is currently selected, see menu.html
 * class="<?php echo $activeIndex ?>" is on the
 * menu item line if variable not set class=""
 * if set then class="active" and bootstrap highlights
 * that item
 */

$activeIndex = "active";

/*
 * Pull in the configuration files
 * As these files are inside php tags their data
 * is not written within the presented HTML page
 * this ensure that tokens, passwords, usernames etc
 * are securely used 
 */

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
//include (APPLICATION_PATH . "/inc/functions.inc.php");


/*
 * Pull in the header component of the HTML page
 * This header is used for all pages that do not
 * require a login e.g. publically accessible pages
 * Contains <HTML><HEADER></HEADER><BODY> and menu ..
 */

include (TEMPLATE_PATH . "/public/header.php");

?>

<div class="wrapper">
<!-- the wrapper is above the containers to push down the footer -->

<!-- main page content ................................. -->

<!--  button -->
<div class="container buttonbar">
<p align="left">

  <!--
  <a href="login_facebookv2.php">
    <img class="can" src="img/fb-connect.png" 
         alt="facebook-login" width="160" height="26">
  </a>
    -->
  
  <a href="login_facebook.php" 
     class="btn btn-success btn-large">Login using Facebook</a>

  <a href="login_twitter.php" 
     class="btn btn-success btn-large">Login using Twitter</a>

  <a href="login_google.php" 
     class="btn btn-success btn-large">Login using Google</a>

</p>
</div>

<?php
/*
 * Pull in the public version of the main
 * page of the content
 */
include (TEMPLATE_PATH . "/public/home.inc.php");

?>

<!-- 
 if there is an issue with login, 
 return here with a login parameter with an error status 
-->

<div class="container">
<div class="row">
    <div class="span12">

    <?php
        if( $_GET != NULL )
        {
            $loginStatus = $_GET['login'];
            if($loginStatus == 'vfail')
                {echo '<p>Invalid username or password</p>';}
            elseif($loginStatus == 'efail')
                {echo '<p>No username or password</p>';}
            elseif($loginStatus == 'CSRFfail')
                {echo '<p>The Facebook state does not match. You may be a victim of CSRF.</p>';}
            else
                {echo '<p>' . $loginStatus . '</p>';}
        }
    ?>

    </div>
</div>
</div>

<!-- main page  end .................................... -->

<!-- keep this at the bottom to push down the footer-->
<div class="push"><!--//--></div>
</div><!-- .wrapper -->

<?php
/*
 * Pull in the public version of the footer
 * contains JQuery pullin and <BODY/><HTML/>
 */
 include (TEMPLATE_PATH . "/public/footer.html"); 
 ?>