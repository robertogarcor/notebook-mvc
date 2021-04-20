<?php 

namespace App\Controllers;

/**
 * Description of AuthController
 *
 * @author Roberto
 */

use Core\Auth,
    Core\Controller,
    Core\View;

use Core\Helper\Url;

use App\Models\User;

class AuthController extends Controller {
      
    public function __construct() 
    { 
        
    }

    public function login() 
    {
        if (isset($_POST['login'])) {
            // Check login and create session user
            $user_valid = User::getUser($_POST['username'], $_POST['password']);
            if ($user_valid) {
                $_SESSION['user'] = get_object_vars($user_valid); // Convert object to array assoc
                $this->redirect('task', 'index');
                //Url::redirect('task', 'index');
            } else {
                View::make('auth', 'login')->with('error', 'error')->execute();      
            }   
        } else {
            View::make('auth', 'login')->execute();   
        }
        
    }
    
    public function logout() 
    {
        if (!Auth::check()) {
            $this->redirect('auth', 'login');
            exit();
        } 
        Auth::logout();
        View::make('auth', 'login')->with('logout', 'logout')->execute();        
    }
    
    public function register() 
    {
        View::make('auth', 'register')->execute();
    }
    
    public function store() 
    {
        if(isset($_POST['user-register'])){
          $user = (object)$_POST;
          //var_dump($user);
          $result = User::save($user);
          if ($result == 1) {
              View::make('auth', 'login')->with('success', 'Register User OK!')->execute();
          } else {
              View::make('auth', 'register')->with('error', 'A ocurred an error to register User!')->execute();
          }
        } else {
            View::make('auth', 'login')->execute(); 
        }
        
        
    }
    
}
