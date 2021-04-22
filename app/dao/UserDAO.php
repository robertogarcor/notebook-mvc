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
    
    
    static function getUser($username) {
        
        $sql = 'SELECT * FROM users WHERE username=?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $pdo = Database::getInstance()->getDb(); /* @var $pdo \PDO */
        
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(1, $username, PDO::PARAM_STR);

            // Execute sent
            $stmt->execute();
            
            // Return the rows
            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }  
    }

    public static function save($user) {
        
        $sql = 'INSERT INTO users (username, password, firstname, surname, email) VALUES (:username,:password,:firstname,:surname,:email)';
        
        try {
            
            $pdo = Database::getInstance()->getDb(); /* @var $pdo \PDO */
            
            $stmt = $pdo->prepare($sql);
            
            $pdo->beginTransaction();
            
            $stmt->bindParam(':username', $user->username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->password, PDO::PARAM_STR);
            $stmt->bindParam(':firstname', $user->firstname, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $user->surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
            
            $result = $stmt->execute();

            $pdo->commit();
            
            // return true(1) or fail(0) insert user
            return $result;
            
        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }

}

