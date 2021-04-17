<?php 

namespace Core;

/**
 * Description of View
 *
 * @author Roberto
 */

use Core\Helper\Url;

class View extends Reponse {
    
    static $dir = './app/views/';
    static $ext = '.tpl.php';
    static $locals = [];
    
    private $type;
    private $view;
    private $attrs;
     
    public function __construct($type, $view) 
    {
        $this->type = $type;
        $this->view = $view;
        self::$locals = ['url' => new Url()];
    }
    
    
    static function make($type, $view)
    {
        return new self($type, $view);
    }
    
    
    static function view($type, $view, $attrs=null) 
    {    
        $view = self::make($type, $view);
        if ($attrs) {
            $view->attrs = $attrs;
        }
        $view->execute();      
    }
    
    
    public function with($attrs, $value)
    {
        if (is_array($attrs)){
            foreach ($attrs as $k => $v) {
                $this->attrs[$k] = $v;
            }
        } else {
            $this->attrs[$attrs] = $value;
        }
        return $this;  
    }
    
    
    public function execute() 
    { 
        echo $this->get();   
    }
    
    
    private function get()
    { 
        if ($this->attrs) {
            extract($this->attrs);
        }
        extract(self::$locals);
        require_once self::$dir . $this->type . '/' . $this->view . self::$ext;        
    }
    
    
    static function setDir($dir) 
    {
        self::$dir = $dir;
    }

    static function setExt($ext) 
    {
        self::$ext = $ext;
    }

    static function setLocals($locals) 
    {
        self::$locals = $locals;
    }


}
