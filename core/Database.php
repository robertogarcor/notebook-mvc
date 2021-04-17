<?php 

namespace Core;

/**
 * Description of Database
 *
 * @author Roberto
 */

//require_once './app/config.php';
use PDO;


class Database {
    
    private static $db = null;
    private static $connPDO;
    private static $config = db;
    
    /**
     * Construct Class
     */
    private function __construct()
    {
        try {
            self::getDb();  
        } catch (PDOException $ex) {
            $ex->getMessage();    
        }
    }
    /**
     * Return instance class
     * @return object Database or null
     */
    public static function getInstance()
    {
        if (self::$db == null) {
            self::$db = new self();  
        }
        return self::$db;
    }
    
    /**
     * Create connection type object PDO
     * @return object PDO
     */
    public function getDb()
    {    
        if (self::$connPDO == null) {
            self::$connPDO = new PDO('mysql:host='.self::$config['host'].';port='.self::$config['port'].';dbname='.self::$config['name'],
                                    self::$config['user'],
                                    self::$config['pass'],
                                    array(
                                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
                                    );
            
            // Enable exceptions
            self::$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$connPDO;   
    }
    
    /**
     * Close connection PDO
     */
    public static function closeDb()
    {
        self::$connPDO = null;
    }  
    
    
    public function __clone()
    {
       
    }
     
}



?>