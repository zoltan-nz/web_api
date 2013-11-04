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
 * The constants used below are defined in config.inc.php
 */

//Connect to server

$link_id=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if($link_id) 
{
	//echo "Successful Connection";
} 
else 
{
	echo "UnSuccessful Connection: " . DB_HOST;
	EXIT;
}

// connect to a database on the server

if(mysql_select_db(DB_DATABASE,$link_id)) 
{
	// shouldn't echo DB name out, as too much information
	// only doing this by way of explaination
	
	echo "<p>DB ok : ". DB_DATABASE . "</p>";
} 
else
{
	echo "<p>Connection to database failed </p>";
}