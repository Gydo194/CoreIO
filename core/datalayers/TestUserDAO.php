<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author gydo194
 */
class TestUserDAO implements IDAOUser {

    public function __construct() {
        
    }

    public function createUser(IUser $user) {
        return;
    }

    public function deleteUser(IUser $user) {
        return;
    }

    public function updateUser(IUser $user) {
        return;
    }

    public function getUser(int $id) {
        return new User("user", "pass", array("main", "admin", "debug"));
    }

    public function getUserByName(string $username) {
        return new User("user", "pass", array("main", "admin", "debug"));
    }

    public function getUserByUsernameAndPassword(string $user, string $pass) {
        if ($pass == "pass" && $user == "user") {
            $user = new User();
            $user->setUserName("user");
            $user->setPassword("pass");
            $user->setToken("user0_token");
            // $user->setPermissions(array("main" => true, "admin" => true, "debug" => true, "base" => false));
            $user->setPermissions(array("main","debug","send"));
            return $user;
        } else {
            return null;
        }
    }

    public function getUserByToken(string $token) {
        if ($token == "user0_token") {
            $user = new User();
            $user->setUserName("user");
            $user->setPassword("pass");
            $user->setToken("user0_token");
            //$user->setPermissions(array("main" => true, "admin" => false, "debug" => true, "hallo" => false));
            $user->setPermissions(array("main", "admin","send"));
            return $user;
        } else {
            return null;
        }
    }

}
