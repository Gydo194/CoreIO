<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RgbLed
 *
 * @author gydo194
 */
class RgbLed {
    //unique id
    private $id = 0;
    
    //arduino group
    private $group = "1";
    
    //RGB values
    private $red = 0;
    private $green = 0;
    private $blue = 0;
    
    //Pin mappings
    private $redPin = 9;
    private $greenPin = 6;
    private $bluePin = 5;
   
    
    public function __construct() {
      //  $this->id = uniqid(); //give the applet an unique ID so multiple instances of RGB led control applets won't mess up web-side
        //replace the uniqid with mysql id
    }
    
    
    function getGroup(): string {
        return $this->group;
    }

    function getRed(): int {
        return $this->red;
    }

    function getGreen(): int {
        return $this->green;
    }

    function getBlue(): int {
        return $this->blue;
    }

    function setGroup(string $group) {
        $this->group = $group;
    }

    function setRed(int $red) {
        $this->red = $red;
    }

    function setGreen(int $green) {
        $this->green = $green;
    }

    function setBlue(int $blue) {
        $this->blue = $blue;
    }


    function getRedPin(): int {
        return $this->redPin;
    }

    function getGreenPin(): int {
        return $this->greenPin;
    }

    function getBluePin(): int {
        return $this->bluePin;
    }

    function setRedPin(int $redPin) {
        $this->redPin = $redPin;
    }

    function setGreenPin(int $greenPin) {
        $this->greenPin = $greenPin;
    }

    function setBluePin(int $bluePin) {
        $this->bluePin = $bluePin;
    }

    function getId(): int {
        return $this->id;
    }

    function setId(int $id) {
        $this->id = $id;
    }


    
    
    
}
