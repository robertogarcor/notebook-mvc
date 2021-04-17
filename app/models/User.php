<?php 

namespace App\Models;

/**
 * Description of User
 *
 * @author Roberto
 */

use App\Dao\UserDAO;

class User extends UserDAO {
    
    private $username;
    private $password;
    private $email;
    private $firstname;
    private $surname;
    private $createat;
    private $updateat;
    private $tasks;
    

    public function __construct() 
    { 
        
    }

    // Getters and Setters 
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getSurname() {
        return $this->surname;
    }

    function getCreateat() {
        return $this->createat;
    }

    function getUpdateat() {
        return $this->updateat;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setCreateat($createat) {
        $this->createat = $createat;
    }

    function setUpdateat($updateat) {
        $this->updateat = $updateat;
    }

    function getTasks() {
        return $this->tasks;
    }

    function setTasks($tasks) {
        $this->tasks = $tasks;
    }

}
