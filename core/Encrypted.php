<?php

namespace Core;

/**
 * Description of PasswordHash
 *
 * @author Roberto
 */
class Encrypted {
    
    const OPTIONS = array ('cost' => 12);
    
    
    public function __construct() 
    { 
    }
    
    /**
     * Encrypted password hash
     * @param string $password
     * @return string hash password 
     */
    public static function passwordHash($password) {
        return password_hash($password, PASSWORD_DEFAULT, self::OPTIONS);
    }
    
    /**
     * Check password and hash user 
     * @param string $password
     * @param string $hash
     * @return boolean TRUE(1) / FALSE(0)
     */
    public static function passwordVerify($password, $hash) {
        return password_verify($password, $hash);     
    }
    
    
    /**
     * Check if password need rehash -> case TRUE -> to call passwordHash
     * @param string $password
     * @param string $hash
     * @return boolean TRUE(1) / FALSE(0)
     */
    public static function passwordNeedsRehash($hash) {
        return password_needs_rehash($hash, PASSWORD_DEFAULT, self::OPTIONS);
    }
    
}
