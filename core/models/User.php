<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author gydo194
 */
class User implements IUser, Base64Serializeable {

//    private $id;
    private $username;
    private $password;
    private $token;
    private $permissions = array();
    private $userDataId = 0;

    public function __construct() {
        
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function setPermissions(array $permissions) {
        $this->permissions = $permissions;
    }

    public function getUserName(): string {
        return strval($this->username);
    }

    public function getPassword(): string {
        return strval($this->password);
    }

    public function getPermission(string $name) {
        return in_array($name, $this->permissions);
    }

    public function getToken(): string {
        return $this->token;
    }
    
    public function getId(): int {
        return $this->id;
    }

    //setters
    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setPermission(string $perm, bool $state) {
        $this->permissions[$perm] = $state;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

    public function setUserName(string $username) {
        $this->username = $username;
    }
    
    public function setId(int $id) {
        $this->id = $id;
    }
    
    
    
    
    
    //serialization

    public function serialize(): string {
        $arr = array(
            "username" => $this->username,
            "password" => $this->password,
            "token" => $this->token,
            "permissions" => $this->permissions
        );
        $json = json_encode($arr, true);
        $b64 = base64_encode($json);
        return $b64;
    }

    public function unserialize(string $data) {
        $json = base64_decode($data);
        $arr = json_decode($json, true);
        if (!is_array($arr)) {
            return false;
        }
        if (array_key_exists("username", $arr)) {
            $this->username = $arr["username"];
        }

        if (array_key_exists("password", $arr)) {
            $this->password = $arr["password"];
        }

        if (array_key_exists("token", $arr)) {
            $this->token = $arr["token"];
        }

        if (array_key_exists("permissions", $arr)) {
            $this->permissions = $arr["permissions"];
        }
    }
    
    
    //login
    
    public function isLoggedIn() {
        return !empty($this->permissions);
    }


}
