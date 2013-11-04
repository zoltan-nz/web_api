<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * *************************************** */

session_start();

define("MY_INC_CODE", 1);

define("APPLICATION_PATH", "app");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");
define("LIBRARY_PATH", "lib");

/*
 * Pull in the configuration files
 * As these files are inside php tags their data
 * is not written within the presented HTML page
 * this ensure that tokens, passwords, usernames etc
 * are securely used 
 */

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");


/*
 * If the form posts the username and password to this
 * page then the code that tests for a POST will call
 * this function to authenticate the username and password
 * the authenticate function this function calls is in the
 * functions.inc.php file that is included above
 *
 */

function login($username, $password) 
{ 
    return authenticate($username,$password);
}

/*
 * This function is called by the form when the login button
 * is pressed as the form posts to this page
 */
if (!empty($_POST)) 
{    
	// validate the input

    $s_username = htmlspecialchars($_POST['username']);
    $s_password = $_POST['password'];

    //call the login function on this page which returns true or false

    if (login($s_username, $s_password)) 
    {   
        // if true then go to the private home page

        $_SESSION["loggedIn"]=1;
        
        header("Location: privateHomeTestCard.php");
        //header("Location: privateHome.php");
    }
    else
    {
        header("Location: index.php?login=vfail");
    }
}
else
{
    header("Location: index.php?login=efail");
}

