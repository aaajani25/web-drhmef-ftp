<?php

require __DIR__ .
        '/lib/password_hash_compatibility.php';

class Password {

    /**
     * 
     * return a hashed password with bcrypt algorithm
     * @param string $_pwd
     *  password to hash
     * @return string 
     */
    public static function hash($_pwd) {
        return password_hash($_pwd, PASSWORD_BCRYPT);
    }

    /**
     * verify if hash and password match
     * @param string $_pwd
     *  password of user
     * @param string $_hash
     *  hash saved in database
     * @return boolean
     */
    public static function verify($_pwd, $_hash) {
        return password_verify($_pwd, $_hash);
    }

    /**
     * Generate a strong password 
     * thx to https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
     * @param int $_size
     * @return string
     */
    public static function randomPassword($_size = 8) {
        $alphabet = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789';
        $pass = '';
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $_size; $i++) {
            $n = rand(0, $alphaLength);
            $pass.= $alphabet[$n];
        }
        return $pass; //turn the array into a string
    }

}
