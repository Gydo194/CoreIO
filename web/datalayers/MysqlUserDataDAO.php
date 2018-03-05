<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MysqlUserDataDAO
 *
 * @author gydo194
 */
class MysqlUserDataDAO implements IDAOUserData {
    private static $instance = null;
    
    public static function getInstance(): MysqlUserDataDAO {
        if(null === self::$instance) {
            self::$instance = new MysqlUserDataDAO();
        }
        return self::$instance;
    }

    public function createUserData(\UserData $ud) {
        
    }

    public function deleteUserData(\UserData $ud) {
        
    }

    public function getUserData(int $id): \UserData {
        $s = PDOFactory::query("SELECT applets FROM userdata WHERE id = ? LIMIT 1;", array($id));
        $res = $s->fetch(PDO::FETCH_ASSOC);
        
        if(1 !== $s->rowCount()) {
            error_log("MysqlUserDataDAO::getUserData(): mysql returned awkward row count (0?)");
            throw new InaccessibleDataException();
        }
        
        $u = new UserData();
        $u->setId($id);
        
        if(array_key_exists("applets", $res)) {
            $applets = explode(";",$res["applets"]);
            $u->setApplets($applets);
        }
        else {
            error_log("MysqlUserDataDAO::getUserData(): got no data from db");
        }
        
        return $u;
        
    }

    public function updateUserData(\UserData $ud) {
        
    }

}
