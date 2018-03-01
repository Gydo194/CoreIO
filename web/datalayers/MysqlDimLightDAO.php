<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MysqlDimLightDAO
 *
 * @author gydo194
 */

defined("DIMLIGHT_TABLE_NAME") || define("DIMLIGHT_TABLE_NAME","dimlight");

class MysqlDimLightDAO implements IDAODimLight {
  
    private static $instance = null;
    
    public function getInstance(): MysqlDimLightDAO {
        if(null === self::$instance) {
            self::$instance = new MysqlDimLightDAO();
        }
        return self::$instance;
    }
    
    
    
    public function createDimLight(\DimLight $dl) {
        $r = PDOFactory::query("INSERT INTO ".DIMLIGHT_TABLE_NAME." VALUES (null,?,?,?);", array(
            $dl->getGroup(),
            $dl->getValue(),
            $dl->getPin()
        ));
    }

    public function deleteDimLight(\DimLight $dl) {
        $r = PDOFactory::query("DELETE FROM ".DIMLIGHT_TABLE_NAME." WHERE id = ?;", array(
            $dl->getId()
        ));
    }

    public function getDimLight(int $id): \DimLight {
        $r = PDOFactory::query("SELECT groupname, value, pin FROM ".DIMLIGHT_TABLE_NAME." WHERE id = ? LIMIT 1;", array($id));
        $res = $r->fetch(PDO::FETCH_ASSOC);
        
        if(1 !== $r->rowCount()) {
            error_log("MySQLDimLightDAO::getDimLight(int id): rowCount not equals 1");
            throw new InaccessibleDataException();
        }
        
        $d = new DimLight();
        
        $d->setId($id);
        
        if(array_key_exists("groupname", $res)) {
            $d->setGroup($res["groupname"]);
        }
        if(array_key_exists("value", $res)) {
            $d->setPin($res["pin"]);
        }
        if(array_key_exists("pin", $res)) {
            $d->setValue($res["value"]);
        }
        
        
        return $d;
        
        
        
        
    }

    public function updateDimLight(\DimLight $dl) {
        $s = PDOFactory::query("UPDATE ".DIMLIGHT_TABLE_NAME." SET groupname = ?, value = ?, pin = ? WHERE id = ?", array(
            $dl->getGroup(),
            $dl->getValue(),
            $dl->getPin(),
            $dl->getId()
        ));
    }

}
