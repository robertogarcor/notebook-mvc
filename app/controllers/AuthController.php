<?php 

namespace App\Controllers;

/**
 * Description of AuthController
 *
 * @author Roberto
 */

use Core\Auth,
    Core\Controller,
    Core\View,
    Core\Encrypted;

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
            $user = User::getUser($_POST['username']);
            if($user){
                $login_password = $_POST['password'];
                $db_password = $user->password;
                if (Encrypted::passwordVerify($login_password, $db_password)) {    
                    $_SESSION['user'] = get_object_vars($user); // Convert object to array assoc
                    $this->redirect('task', 'index');
                    //Url::redirect('task', 'index');
                } 
            }
            View::make('auth', 'login')->with('error', 'Username or password invalid. Please in again!.')->execute(); 
            exit(403);
        } 
        View::make('auth', 'login')->execute();      
    }
    
    public function logout() 
    {
        if (!Auth::check()) {
            $this->redirect('auth', 'login');
            exit();
        } 
        Auth::logout();
        View::make('auth', 'login')->with('logout', 'Session closed success!.')->execute();        
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
          $user->password = Encrypted::passwordHash($user->password);
          $result = User::save($user);
          if ($result == 1) {
              View::make('auth', 'login')->with('success', 'Register user success!.')->execute();
          } else {
              View::make('auth', 'register')->with('error', 'A ocurred an error to register user!')->execute();
          }
        } else {
            View::make('auth', 'login')->execute(); 
        }
        
        
    }
    
}
