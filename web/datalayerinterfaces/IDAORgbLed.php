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
interface IDAORgbLed {
    public function createRgbLed(RgbLed $led);
    public function deleteRgbLed(RgbLed $led);
    public function updateRgbLed(RgbLed $led);
    
    
    public function getRgbLed(int $id);
    
}
