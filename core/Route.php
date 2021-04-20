<?php 

namespace Core;

/**
 * Description of Route
 *
 * @author Roberto
 */

use App\Controllers\AuthController;
use App\Controllers\TaskController;

class Route {
    
    public static function get($resource)
    {
        $controller = ucwords($resource) . 'Controller';
        $fileController = './app/controllers/' . $controller . '.php';
        if (is_file($fileController)) { 
            switch ($controller) {
                case 'AuthController':
                    $controller = new AuthController();
                    break;
                case 'TaskController':
                    $controller = new TaskController();
                    break;
            }
            return $controller;
        }
        die('404');
        
    }
}
