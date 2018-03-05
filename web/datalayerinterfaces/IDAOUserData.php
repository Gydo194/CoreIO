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
interface IDAOUserData {
    public function getUserData(int $id): UserData;
    public function createUserData(UserData $ud);
    public function updateUserData(UserData $ud);
    public function deleteUserData(UserData $ud);
}
