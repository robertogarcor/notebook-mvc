<?php

namespace App\Dao;

/**
 *
 * @author Roberto
 */
interface iTask {
    
    public static function getAll();
    
    public static function getAllByUser($id);
    
    public static function findOne($id);
               
    public static function delete($task);
    
    public static function save($task);
    
    public static function update($task);
           
}
    
