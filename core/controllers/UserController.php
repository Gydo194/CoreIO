<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author gydo194
 */

defined("SESSION_USER_VAR_NAME") || define("SESSION_USER_VAR_NAME","user");
defined("LOGIN_USERNAME_PARAM_NAME") || define("LOGIN_USERNAME_PARAM_NAME","user");
defined("LOGIN_PASSWORD_PARAM_NAME") || define("LOGIN_PASSWORD_PARAM_NAME","pass");
defined("LOGIN_TOKEN_PARAM_NAME") || define("LOGIN_TOKEN_PARAM_NAME","token");
//defined("LOGIN_BASE_PERMISSION_NAME") || define("LOGIN_BASE_PERMISSION_NAME","base");


class UserController {

    private static $user = null; //user
    
    
    public static function getUser() {
        return self::$user;
    }

    public static function setUser($user) {
        self::$user = $user;
    }

        

    public static function login() {
        $u = new User();
        
        $data = SessionController::getValue(SESSION_USER_VAR_NAME);
        $u->unserialize($data);
        
        if($u->isLoggedIn()) { //can be improved?
            self::$user = $u;
            return true;
        }
        
//        $dao = new TestUserDAO(); //static / singleton getinstance
        $dao = new MysqlUserDAO();
        
        if(isset($_REQUEST[LOGIN_USERNAME_PARAM_NAME]) && isset($_REQUEST[LOGIN_PASSWORD_PARAM_NAME])) {
        $username = self::getRequestParameter(LOGIN_USERNAME_PARAM_NAME);
        $password = self::getRequestParameter(LOGIN_PASSWORD_PARAM_NAME);
        
       
        
        $u = $dao->getUserByUsernameAndPassword($username, $password);
        }
       
        if(isset($_REQUEST[LOGIN_TOKEN_PARAM_NAME])) {
            $token = self::getRequestParameter(LOGIN_TOKEN_PARAM_NAME);
            $u = $dao->getUserByToken($token);
        }
        
       
        //if($u) {
            self::$user = $u;
            SessionController::setValue(SESSION_USER_VAR_NAME, $u->serialize());
            return true;
        //}
        
        //return false;
            
            //unused instance of dao
       
    }

   
    
    
    public static function logout() {
        SessionController::setValue("user", ""); //destroy user data
    }
    
    
    public static function getPermission(string $name) {
        if(self::$user == null) { return false; }
        return self::$user->getPermission($name);
    }
    

    private static function getRequestParameter(string $name): string {
        if (isset($_REQUEST[$name])) {
            return $_REQUEST[$name];
        } else {
            return "";
        }
    }
    
    public static function isLoggedIn() {
        if(self::$user == null) { return false; }
        return self::$user->isLoggedIn();
    }
    
    public static function getUserName() {
        if(self::$user == null) {
            return "";
        }
        return self::$user->getUserName();
    }
    
    public static function sessionActive() {
        return session_id() !== "";
    }
    
   

}
