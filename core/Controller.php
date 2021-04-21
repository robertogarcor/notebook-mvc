<?php 

namespace Core;

/**
 * Description of Controller
 *
 * @author Roberto
 */

use Core\Helper\Url;
use Core\View,
    Core\Request;

class Controller {
     
    // Example in ModelController -> ['index', 'store', 'update',]
    static $require_auth = [];
    
    public function __construct() 
    {
        // Authentication method --> Model Controller var $require_auth
        if (in_array($_REQUEST['action'], self::$require_auth)){
            if (!Auth::user()) {
                $this->redirect('auth', 'login');
                exit;
            }
        } else {
            $this->redirect('auth', 'login');
            exit;
        } 
    }
    
    
    
    public function redirect($controller, $action, $attrs = null) 
    {
        if($attrs != null) {
            header('Location:http://localhost/notebook-mvc/index.php?controller='. $controller . '&action=' . $action . '&' . http_build_query($attrs));
        } else {
            header('Location:http://localhost/notebook-mvc/index.php?controller='. $controller . '&action=' . $action);
        }
        exit();
    }
       
}


