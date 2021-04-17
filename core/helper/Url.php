<?php 

namespace Core\Helper;

/**
 * Description of Helper
 *
 * @author Roberto
 */
class Url {
    
    // Helper url controller
      
    public function uri($controller, $action, $id = null) 
    {
        if ($id) {
            return '//localhost/notebook-mvc/index.php?controller='. $controller . '&action=' . $action . '&id=' . $id;  
        }
        return '//localhost/notebook-mvc/index.php?controller='. $controller . '&action=' . $action;  
    }
    
    // Helper url resource assets
    
    public function assets($type = null, $resource = null) 
    {
        return '//localhost/notebook-mvc/app/public/assets/'. $type . '/css/' . $resource;
    }
    
    
    static function redirect($controller, $action) 
    {
        header('Location:http://localhost/notebook-mvc/index.php?controller='. $controller . '&action=' . $action);   
    }
        
}
        
        
    
    

