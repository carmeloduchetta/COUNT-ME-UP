<?php
include_once 'definitions.php';
include 'Authenticate.class.phps';

session_start();

// clear the token in the session
$_SESSION[BBC_COOKIE_TOKEN] = "-1";
    	
// clear the user's display name in the session
$_SESSION['plususerdisplayname'] = "";

// clear the user ID in the session
$_SESSION['plususerid'] = "";

// clear the user's admin status in the session
$_SESSION['plususerisadmin'] = "";
    		    		
// clear the authentication cookie
Authenticate::logOut();
		    
// redirect to login page
header('Location: ' . BBC_URL_PATH . 'index.html');
?>
