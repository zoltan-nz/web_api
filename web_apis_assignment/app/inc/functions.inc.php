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


/*
 * look up the database to see if the username and password exist
 * once and once only
 */

function authenticate($username, $password) 
{   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * from SYS_USERS WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)
    {
    	//die("Error: " . $sqlQuery . mysql_error());
        $boolAuthenticated = false;
    }  
    
    if (mysql_num_rows($result)==1) 
    {
        $boolAuthenticated = true;
    }
    else
    {
    	//same user there more than once?
        $boolAuthenticated = false;
    }
    
    return $boolAuthenticated;
}