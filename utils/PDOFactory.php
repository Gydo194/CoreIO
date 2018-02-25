<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDOFactory
 *
 * @author gydo194
 */
//no personal passwords in here today
defined("MYSQL_USER") || define("MYSQL_USER","hibernate");
defined("MYSQL_PASS") || define("MYSQL_PASS","hibernate");
defined("MYSQL_HOST") || define("MYSQL_HOST","127.0.0.1");
defined("MYSQL_DBNAME") || define("MYSQL_DBNAME","coreio");

class PDOFactory {
    private static function getPDOInstance() {
        $db = MYSQL_DBNAME;
        $host = MYSQL_HOST;
        $pass = MYSQL_PASS;
        $user = MYSQL_USER;
        $dbc = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $dbc;
    }
    
    public static function query(string $sql, array $args) {
        $db = self::getPDOInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
}
