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
    //put your code here
    public function createDimLight(\DimLight $dl) {
        $r = PDOFactory::query("", array());
    }

    public function deleteDimLight(\DimLight $dl) {
        
    }

    public function getDimLight(int $id): \DimLight {
        
    }

    public function updateDimLight(\DimLight $dl) {
        
    }

}
