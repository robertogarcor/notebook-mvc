<?php

namespace App\Dao;

/**
 *
 * @author Roberto
 */
interface iUser {
    
    public static function getUser($username, $password);
    
    public static function save($user);
    
}

