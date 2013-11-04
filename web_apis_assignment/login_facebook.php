<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 * ref: 
 *    https://developers.facebook.com/docs/howtos/login/server-side-login/
 * 		http://www.geekinterview.com/question_details/80455
 *    http://www.youtube.com/watch?v=fZ-LdWUEcNA
 * *************************************** */

define("MY_INC_CODE", 1);

define("APPLICATION_PATH", "app");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");
define("LIBRARY_PATH", "lib");

//Load the facebook access codes

require (APPLICATION_PATH . "/inc/app_tokens_facebook.inc.php");

// This code is from the referenced facebook example

session_start();

//check to see this script has been run before. If no, set $code equal to nothing. 
if (isset($_REQUEST["code"]))
{
    $code = $_REQUEST["code"];
}

// Determine whether a variable is considered to be empty. 
// A variable is considered empty if it does not exist or if its value equals FALSE

if(empty($code)) 
{
  //redirect to facebook login dialog

  $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
   $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
     . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
     . $_SESSION['state'];

  echo("<script> top.location.href='" . $dialog_url . "'</script>");
}


if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) 
{
 // state variable matches
 $token_url = "https://graph.facebook.com/oauth/access_token?"
   . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
   . "&client_secret=" . $app_secret . "&code=" . $code;

 $response = file_get_contents($token_url);
 $params = null;
 parse_str($response, $params);

 $_SESSION['access_token'] = $params['access_token'];

 $graph_url = "https://graph.facebook.com/me?access_token=" 
   . $params['access_token'];

 $user = json_decode(file_get_contents($graph_url));

// We set our session logged in parameter and go to the private homepage

// version 1
  echo("Hello " . $user->name);

//version 2
    $_SESSION["loggedIn"]=1;
    header("Location: privateHomeTestCard.php");
    //header("Location: privateHome.php");
}
else 
{
 	// Cross-Site Request Forgery.
	// Ref: http://en.wikipedia.org/wiki/Cross-site_request_forgery
 	echo("The state does not match. You may be a victim of CSRF. v2");
}

?>

<html>
    <head>
      <title>CRAWDESK Facebook Login Page</title>
    </head>
    <body>

    </body>
</html>
