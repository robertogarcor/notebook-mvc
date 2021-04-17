<?php

//GET           /model                      index       ModelController@index
//GET           /model/create               create      ModelController@create
//POST          /model                      store       ModelController@store
//GET           /model/{resource}           show        ModelController@show
//GET           /model/{resource}/edit      edit        ModelController@edit
//PUT/PATCH     /model/{resource}/update    update      ModelController@update
//DELETE        /model/{resource}/delete    destroy     ModelController@destroy


define('PATH', dirname(__FILE__) . '/');

require_once PATH . 'core/global.php';
require_once PATH . 'app/config.php';

spl_autoload_register();

use core\Route;

if (isset($_GET['controller'])) {
    session_start();
    $controller = Route::get($_GET['controller']);
    runAction($controller);
    
} else {
    $controller = Route::get(CONTROLLER_DEFAULT);
    runAction($controller);
}

/////////////////////////


function getAction($controller, $action) 
{ 
    $controller->$action(\Core\Request::request());
}

function runAction($controller) 
{
    if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])){
        getAction($controller, $_GET["action"]);
    } else {
        getAction($controller, ACTION_DEFAULT);
    }   
}

?>