 
<?php

interface IUser {
    //getters
    public function getUserName(): string;
    public function getPassword(): string;
    public function getToken(): string;
    public function getPermission(string $name);
    
    //setters
    public function setUserName(string $username);
    public function setPassword(string $password);
    public function setToken(string $token);
    public function setPermission(string $perm, bool $state);
    
    
}