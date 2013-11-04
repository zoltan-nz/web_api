<?php

/*
 * Check if logged in before allowing a page that
 * includes this file to be rengered
 */

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {

//back to the login page
header("Location: index.php");

}