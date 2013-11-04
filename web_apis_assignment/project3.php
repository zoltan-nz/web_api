<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
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

//for menu item highlighting
$activeProject3 = "active";

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

<div class="wrapper">
<!-- the wrapper is above the containers to push down the footer -->

<!-- main page content ................................. -->

<?php
/*
 * Pull in the public version of the main
 * page of the content
 */
include (TEMPLATE_PATH . "/public/project3.inc.php");
?>


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