<?php 

namespace Core;


/**
 * Description of Auth
 *
 * @author Roberto
 */
class Auth {
    
    static function check()
    {    
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }
    
    
    static function logout()
    {
        $_SESSION = array();
        setcookie(session_name(), '',time(), '/');
        session_destroy();   
    }
    
    
    static function user()
    {
        if(self::check()){
            return (Object)$_SESSION['user'];
        } else {
            return false;
        }
    }
}
