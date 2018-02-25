<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestDAORGBLed
 *
 * @author gydo194
 */
class TestDAORGBLed implements IDAORgbLed {
    
    private static $instance = null;
    
    public static function getInstance(): TestDAORGBLed {
        if(null === self::$instance) {
            self::$instance = new TestDAORGBLed();
        }
        return self::$instance;
    }
    
    
    
    public function createRgbLed(\RgbLed $led) {
        
    }

    public function deleteRgbLed(\RgbLed $led) {
        
    }

    public function updateRgbLed(\RgbLed $led) {
        
    }
     
   
    public function getRgbLed(int $id) { //throw InaccessibleDataException if not found
        $i = new RgbLed();
        $i->setId(1);
        
        return $i;
    }

   
    /*
    public function updateRedById(int $id, int $red) {
        
    }
    public function updateGreenById(int $id, int $green) {
        
    }
    
    public function updateBlueById(int $id, int $blue) {
        
    }
    */

}
