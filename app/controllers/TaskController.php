<?php 

namespace App\Controllers;

/**
 * Description of ControllerTask
 *
 * @author Roberto
 */

use Core\Auth,
    Core\Controller,
    Core\View,
    Core\Helper\FileTask;

use App\Models\Task;

class TaskController extends Controller {

    private $task; /* @var $task Task */

    public function __construct()
    {
        parent::$require_auth = ['index', 'store', 'edit', 'update', 'destroy', 'download'];
        parent::__construct();
        $this->task = new Task();
    }

    //GET   /model  index   ModelController@index
    public function index()
    {
        $this->getTaskUser(Auth::user()->id);
        View::view('task', 'index-task', ['userObj' => Auth::user()]);
        //View::make('task', 'index-task')->with('userObj', Auth::user())->execute();       
    }
    
    //GET   /model/create   create  ModelController@create
    public function create()
    {
        View::make('task', 'formtask-create')->with('username', Auth::user()->username)->execute();      
    }
    
    //POST  /model  store   ModelController@store | store(Request $request)
    public function store() 
    {
        if (Auth::check() && isset($_POST['task'])){
            $this->task->setName($_POST['name']);
            $this->task->setCompleted((empty($_POST['completed'])) ? 0 : 1);
            $this->task->setUser(Auth::user()->id);
            $this->task->save($this->task);
            $this->redirect('task', 'index');   
        } 
       
    }
    
    //GET   /model/{resource}/edit  edit    ModelController@edit | edit($id)
    public function edit()  
    {
        if (Auth::check() && isset($_GET['id'])) {
            $task = $this->show($_GET['id']);
            View::view('task', 'formtask-update', array('username' => Auth::user()->username,
                                                        'taskObj' => (object)$task));
        }
    }
    
    
    //PUT/PATCH    /model/{resource}   update  ModelController@update | update(Request $request, $id)
    public function update() 
    {
        if (Auth::check() && isset($_POST['updtask'])){ 
            $this->task->setName($_POST['name']);
            $this->task->setCompleted((empty($_POST['completed'])) ? 0 : 1);
            $this->task->setId($_POST['id']);
            $this->task->update($this->task);
            $this->redirect('task', 'index');    
        }
    }
    
    //DELETE    /model/{resource}   destroy     ModelController@destroy | destroy($id)
    public function destroy() 
    {
        if (Auth::check() & isset($_GET['id'])) {
            $task = $this->show($_GET['id']);
            View::view('task', 'formtask-destroy', array('username' => Auth::user()->username,
                                                        'taskObj' => (object)$task));                                          
        }
        else if (Auth::check() && isset($_POST['deltask'])){ 
            $this->task->setId($_POST['id']);
            $this->task->delete($this->task);
            $this->redirect('task', 'index');
        }
    }
    
    //GET   /model/{resource}   show    ModelController@show | show($id)
    public function show($id)
    {
        return $this->getTask($id);
    }
    
    
    public function download() 
    {
        if (Auth::check() && isset($_POST['donwloadTask'])){
            $fdownload = new FileTask();
            $fdownload->createFile('tasks_'. Auth::user()->username . '.txt', Auth::user());     
        } 
        else {
            View::make('task', 'formtask-download')->with('username', Auth::user()->username)->execute();   
        }
    }
    
    
    ////////////////////////////////////////////////////////////////////////////
    
    
    private function getTaskUser($id)
    {
        //unset($_SESSION['user']['tasks']);
        unset(Auth::user()->tasks);
        $tasks_user = $this->task->getAllByUser($id);
        $_SESSION['user']['tasks'] = $tasks_user;
        
    }

    private function getTask($id) 
    {
        $user = Auth::user();
        //$user = (object)$_SESSION['user'];
        foreach ($user->tasks as $key){
            if ($key->id == $id){
                return $key;
            } 
        }   
    }




}






