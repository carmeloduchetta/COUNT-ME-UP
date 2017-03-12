<?php
session_start();

include 'definitions.php';
include 'Authenticate.class.phps';

// clear the token in the session
$_SESSION[BBC_COOKIE_TOKEN] = "-1";
    	
// clear the user's display name in the session
$_SESSION['plususerdisplayname'] = "";
     	
// clear the user ID in the session
$_SESSION['plususerid'] = "";

// clear the user's admin status in the session
$_SESSION['plususerisadmin'] = "";

authenticate(); 

function authenticate()
{
	// set the webservice url
	$url = BBC_WEBSERVICE_URL . 'authenticate';
	
	//extract data from the post
	extract($_POST);
	
	//print('<pre>');
	//print_r($_POST);
	//print('</pre>');
	
	$fields_string="";
	//$username = "";
	//$password = ""; 
		
	$fields = array(
		'username' => urlencode($username),
		//'password' => urlencode($password)
		'password' => urlencode(base64_encode(mcrypt_encrypt(ENCRYPTION, SECRET_KEY, $password, MODE, IV)))
		//'pin' => urlencode(base64_encode(mcrypt_encrypt(ENCRYPTION, SECRET_KEY, $pin, MODE, IV)))
	);

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

	//open connection
	$ch = curl_init();
    
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	// return the data instead of outputting it
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	//execute post
	$result = curl_exec($ch);
	
	//echo 'result: ' . $result . '<br/>';
	//echo '<h3><a>result' . $result.'</a></h3>';
	//close connection
	curl_close($ch);
	
	try{
		// need to extract out values from the xml
		$resultXml = new SimpleXMLElement($result);
	
		// get the token
		$token = $resultXml->token;
	    
	    // get the user ID
	    $userId = $resultXml->userid;
	    
		// get the user display name
		$userDisplayName = $resultXml->userDisplayName;
	
	    // get whether the user is an admin user or not
	    $userIsAdmin = $resultXml->isAdmin;
	    	    
	    // if token is not valid
		if((trim($token) == "") || (strcmp($token, "-1") == 0) || (strcmp($token, "null") == 0)) {
		
			// redirect to login page
			header('Location: ' . BBC_URL_PATH  . 'index.html?error=1');
		}
		else { 
		    // set COOKIE
			//$authentication = new Authenticate($token, $userId, $userDisplayName, $userIsAdmin,$userIsSuper, '', true);
			$authentication = new Authenticate($token, $userId, $userDisplayName, $userIsAdmin, true);

		    //session_start();
		    
			// store the token in the session
    		$_SESSION[BBC_COOKIE_TOKEN] = urlencode($token);
    	
    	    // store the user ID in the session
    		$_SESSION['plususerid'] = urlencode($userId);
    		
    		// store the user's display name in the session  		
    		//replace all possible hyphens with spaces
    		$userDisplayName = str_replace('-', ' ', $userDisplayName);
    		$_SESSION['plususerdisplayname'] = urlencode($userDisplayName);
    		 
    		// store the user's admin status in the session
    		$_SESSION['plususerisadmin'] = urlencode($userIsAdmin);
    		 		
    		if(urldecode($_SESSION['plususerisadmin']) == '1') {
				// redirect to dashboard page
				header('Location: ' . BBC_URL_PATH . 'welcome.php');
    		}
    		else {
    			header('Location: ' . BBC_URL_PATH . 'welcome.php');
    		}
		}
		
	}
	catch (Exception $e)  
	{  
 		echo $e->getMessage();  
 		// redirect to login page
		header('Location: ' . BBC_URL_PATH  . 'index.html?error=1');
	}  
}

?>