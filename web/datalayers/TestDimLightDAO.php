<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestDimLightDAO
 *
 * @author gydo194
 */
class TestDimLightDAO implements IDAODimLight {
    
    private static $instance = null;
    
    public static function getInstance(): TestDimLightDAO {
        if(null == self::$instance) {
            self::$instance = new TestDimLightDAO();
        }
        return self::$instance;
    }
   
    public function createDimLight(\DimLight $dl) {
        
    }

    public function deleteDimLight(\DimLight $dl) {
        
    }

    public function getDimLight(int $id): DimLight {
        $dl = new DimLight();
        $dl->setId($id);
        $dl->setValue(0);
        return $dl;
    }

    public function updateDimLight(\DimLight $dl) {
        
    }

}
