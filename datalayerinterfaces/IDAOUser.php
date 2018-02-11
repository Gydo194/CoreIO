<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gydo194
 */
interface IDAOUser {
    public function createUser(User $user);
    public function updateUser(User $user);
    public function deleteUser(User $user);
    
    public function getUser(int $id);
    public function getUserByName(string $username);
    public function getUserByToken(string $token);
    public function getUserByUsernameAndPassword(string $user, string $pass);
    
}
