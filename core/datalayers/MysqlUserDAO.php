<?php

/**
 * @author Gydo194
 * 
 * MySQL User DAO class
 */

class MysqlUserDAO implements IDAOUser {
    //put your code here
    private $db = null;
    public function __construct() {
        //$this->db = new PDO
    }

    
    
    public function createUser(IUser $user) {
        
    }

    public function deleteUser(IUser $user) {
        
    }

    public function getUser(int $id) {
        
    }

    public function getUserByName(string $username) {
        
    }

    public function getUserByToken(string $token) {
        $stmt = PDOFactory::query("SELECT name,password,token,permissions FROM users where token = ? LIMIT 1;",array($token));
        $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //create new user with the results from the database
        $u = new User();
        
        if($stmt->rowCount() < 1) {
            return $u;
        }
       
        if(array_key_exists("name", $userdata)) {
            $u->setUserName($userdata["name"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "USER NAME IS NULL";
            return null;
        }
        
         if(array_key_exists("password", $userdata)) {
            $u->setPassword($userdata["password"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "PASSWORD IS NULL";
            return null;
        }
        
         if(array_key_exists("token", $userdata)) {
            $u->setToken($userdata["token"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "TOKEN IS NULL";
            return null;
        }
        
         if(array_key_exists("permissions", $userdata)) {
            $perms = explode(";",$userdata["permissions"]);  
            $u->setPermissions($perms);
        } else {
            //missing user data; abort
            //return new User();
            echo "PERMISSIONS IS NULL";
            return null;
        }
        
        //return that user
        return $u;
    }

    public function getUserByUsernameAndPassword(string $user, string $pass) {
        //$stmt = PDOFactory::query("SELECT * FROM users WHERE name = ? and pass = ? LIMIT 1;", array($user,$pass));
        $stmt = PDOFactory::query("SELECT name,password,token,permissions FROM users where name = ? and password = sha1(?);",array($user,$pass));
        $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo "<br>userdumpmysql<br>";
        //var_dump($userdata);
        
        //create new user with the results from the database
        $u = new User();
        
        if($stmt->rowCount() < 1) {
            return $u;
        }
       
        if(array_key_exists("name", $userdata)) {
            $u->setUserName($userdata["name"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "USER NAME IS NULL";
            return null;
        }
        
         if(array_key_exists("password", $userdata)) {
            $u->setPassword($userdata["password"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "PASSWORD IS NULL";
            return null;
        }
        
         if(array_key_exists("token", $userdata)) {
            $u->setToken($userdata["token"]);
        } else {
            //missing user data; abort
            //return new User();
            echo "TOKEN IS NULL";
            return null;
        }
        
         if(array_key_exists("permissions", $userdata)) {
            $perms = explode(";",$userdata["permissions"]);  
            $u->setPermissions($perms);
        } else {
            //missing user data; abort
            //return new User();
            echo "PERMISSIONS IS NULL";
            return null;
        }
        
        
        
        
        
        //return that user
        return $u;
        
        
        
    }

    public function updateUser(IUser $user) {
        
    }

}
