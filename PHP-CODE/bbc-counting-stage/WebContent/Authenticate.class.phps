<?php 

$cookiedomain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; 

define( 'COOKIE_DOMAIN', $cookiedomain ); 
define( 'COOKIE_PATH', '/' ); 

//define( 'SECRET_KEY', 'dk;l1894!851éds-fuw34flk67i:è3afàzgq_f4fá.' ); 

class Authenticate { 

    public function __construct( $token, $userId, $userDisplayName, $userIsAdmin, $remember) { 
     
        $this->authenticate($token, $userId, $userDisplayName, $userIsAdmin, $remember); 
         
    } 
     
    private function authenticate( $token, $userId, $userDisplayName, $userIsAdmin, $remember) { 

        $this->setCookie(  $token, $userId, $userDisplayName, $userIsAdmin, $remember); 
    } 
     
    private function setCookie(  $token, $userId, $userDisplayName, $userIsAdmin, $remember = false) { 

        if ( $remember ) { 

            $expiration = time() + 1209600; // 14 days 

        } else { 

            $expiration = time() + 172800; // 48 hours 

        } 

        $cookie = $this->generateCookie( $token, $userId, $userDisplayName, $userIsAdmin, $expiration); 

        if ( !setcookie( COOKIE_AUTH, $cookie, $expiration, COOKIE_PATH, COOKIE_DOMAIN, false, true ) ) { 
         
            throw new AuthException( "Could not set cookie." ); 
         
        } 

    } 
     
    private function generateCookie( $token, $userId, $userDisplayName, $userIsAdmin, $expiration) { 

        $key = hash_hmac( 'md5', $token . $expiration, SECRET_KEY ); 
        $hash = hash_hmac( 'md5', $token . $expiration, $key ); 

        $cookie = $token . '|' . $expiration . '|' . $hash . '|' . $userId . '|' . $userDisplayName . '|' . $userIsAdmin; 

        return $cookie; 

    } 

    public static function logOut( ) { 

        setcookie( COOKIE_AUTH, "", time() - 1209600, COOKIE_PATH, COOKIE_DOMAIN, false, true ); 

    } 

    public static function validateAuthCookie() { 

        if ( empty($_COOKIE[COOKIE_AUTH]) ) 
            return false; 

        list( $id, $expiration, $hmac, $userId, $userDisplayName, $userIsAdmin ) = explode( '|', $_COOKIE[COOKIE_AUTH] ); 

        if ( $expiration < time() ) 
            return false; 

        $key = hash_hmac( 'md5', $id . $expiration, SECRET_KEY ); 
        $hash = hash_hmac( 'md5', $id . $expiration, $key ); 

        if ( $hmac != $hash ) 
            return false; 

        return true; 

    } 

    public static function getUserId() { 

        list( $id, $expiration, $hmac, $userId, $userDisplayName, $userIsAdmin ) = explode( '|', $_COOKIE[COOKIE_AUTH] ); 

        return $id; 

    } 
    
    public static function getUserInfo() { 

        //list( $id, $expiration, $hmac, $userId, $userDisplayName, $userIsAdmin ) = explode( '|', $_COOKIE[COOKIE_AUTH] ); 

        return $_COOKIE[COOKIE_AUTH]; 

    } 

} 

class AuthException extends Exception {} 

?>