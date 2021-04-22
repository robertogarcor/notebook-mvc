<?php

namespace App\Dao;

/**
 *
 * @author Roberto
 */
interface iUser {
    
    public static function getUser($username);
    
    public static function save($user);
    
}

