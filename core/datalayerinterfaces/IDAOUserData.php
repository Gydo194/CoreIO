<?php

interface IDAOUserData {
    //object based CRUD
    public function createUserData(IUserData $ud);
    public function updateUserData(IUserData $ud);
    public function deleteUserData(IUserData $ud);
    
    //create by integer ID
    public function createUserDataById(int $id);
    
    //get
    public function getUserDate(int $id);
    
}