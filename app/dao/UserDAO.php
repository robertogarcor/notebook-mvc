<?php 

namespace App\Dao;


/**
 * Description of UserDAO
 *
 * @author Roberto
 */

use Core\Database;
use App\Dao\iUser;
use PDO;

class UserDAO implements iUser {
    
    
    static function getUser($username, $password) {
        
        $sql = 'SELECT * FROM users WHERE username=? AND password=?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            $prst->bindParam(1, $username, PDO::PARAM_STR);
            $prst->bindParam(2, $password, PDO::PARAM_STR);
            
            // Execute sent
            $prst->execute();
            
            // Return the rows
            return $prst->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }

}
