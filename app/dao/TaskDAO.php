<?php 

namespace App\Dao;

/**
 * Description of TaskDAO
 *
 * @author Roberto
 */

use Core\Database;
use App\Dao\iTask;
use PDO;

class TaskDAO implements iTask {
    
    static function getAll() {

        $sql = 'SELECT * FROM tasks';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            // Execute sent
            $prst->execute();

            // Return the rows
            return $prst->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }

    static function getAllByUser($id) {
        
        $sql = 'SELECT * FROM tasks WHERE user_id = ?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            $prst->bindValue(1, $id, PDO::PARAM_INT);
            
            // Execute sent
            $prst->execute();

            // Return the rows
            return $prst->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
    }
    
    
    static function findOne($id) {
        
        $sql = 'SELECT * FROM tasks WHERE id = ?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            $prst->bindValue(1, $id, PDO::PARAM_INT);
            
            // Execute sent
            $prst->execute();

            // Return the rows
            return $prst->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
    }
    
    static function delete($task) { /* @var $task Task */

        $sql = 'DELETE FROM tasks WHERE id = ?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            
            $prst->bindValue(1, $task->getId(), PDO::PARAM_INT);

            // Execute sent
            $prst->execute();

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }
    
    static function save($task) { /* @var $task Task */
        
        $sql = 'INSERT INTO tasks (name, completed, user_id) VALUES (?,?,?)';

        try {
            
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            $prst->bindValue(1, $task->getName(), PDO::PARAM_STR);
            $prst->bindValue(2, $task->getCompleted(), PDO::PARAM_INT);
            $prst->bindValue(3, $task->getUser(), PDO::PARAM_INT);
            
            $prst->execute();

         } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }       

    }

    static function update($task) { /* @var $task Task */
        
        $sql = 'UPDATE tasks SET name=?, completed=? WHERE id=?';

        try {
            
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            $prst->bindValue(1, $task->getName(), PDO::PARAM_STR);
            $prst->bindValue(2, $task->getCompleted(), PDO::PARAM_INT);
            $prst->bindValue(3, $task->getId(), PDO::PARAM_INT);
             
            $prst->execute();

         } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }       
        
    }
}


?>
