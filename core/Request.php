<?php

namespace Core;

/**
 * Description of Request
 *
 * @author Roberto
 */
class Request {
    
    
    static function request()
    {
        if(isset($_REQUEST)) {
            return (object)$_REQUEST;
        } else {
            return false;
        }  
    }
    
}
