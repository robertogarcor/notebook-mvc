<?php 

namespace App\Models;

/**
 * Description of Task
 *
 * @author Roberto
 */


//require_once 'TaskDAO.php';

use App\Dao\TaskDAO;

class Task extends TaskDAO {
        
        private $id;
        private $name;
        private $completed;
        private $createat;
        private $updateat;
        private $user;
    

	public function __construct() {
	    
	}
        
        // Getters and Setters
        
        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getCompleted() {
            return $this->completed;
        }

        function getCreateat() {
            return $this->createat;
        }

        function getUpdateat() {
            return $this->updateat;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setCompleted($completed) {
            $this->completed = $completed;
        }

        function setCreateat($createat) {
            $this->createat = $createat;
        }

        function setUpdateat($updateat) {
            $this->updateat = $updateat;
        }

        function getUser() {
            return $this->user;
        }

        function setUser($user) {
            $this->user = $user;
        }
 
}

?>
