<?php
    include_once 'definitions.php';
    include_once 'Authenticate.class.phps';
    
	session_start();
	
	// see if there is a token in the session
	$token = $_SESSION[BBC_COOKIE_TOKEN];
	
	// if the user is not logged in
	if((!isset($token)) || (strcmp($token, "-1") == 0)) {
	
		// check for an authentication cookie 
		if ( Authenticate::validateAuthCookie() ) {
		
		    // get the user info from the authentication cookie
		    $userInfo = Authenticate::getUserInfo();
		    
		    // obtain the separate user info components
			//list( $id, $expiration, $hmac, $userId, $userDisplayName, $userIsAdmin ) = explode( '|', $userInfo ); 
			list( $id, $expiration, $hmac, $userId, $userDisplayName, $userIsAdmin) = explode( '|', $userInfo ); 
			
			session_start();
		    
			// store the token in the session
    		$_SESSION[BBC_COOKIE_TOKEN] = urlencode($id);
    	
    	    // store the user ID in the session
    		$_SESSION['plususerid'] = urlencode($userId);
    		
    		// store the user's display name in the session
    		$_SESSION['plususerdisplayname'] = urlencode($userDisplayName);
    	
    		// store the user's admin status in the session
    		$_SESSION['plususerisadmin'] = urlencode($userIsAdmin);
    		
			
		}
		else { // cookie not found
		
			// redirect to login page
			header('Location: ' . BBC_URL_PATH . 'index.html');
		}		
	}
?>