<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DimLight
 *
 * @author gydo194
 */
class DimLight {
    private $id = 0; //the mysql database id
    private $value = 0;
    private $pin = 0;
    
    
    function __construct() {
        
    }

    
    
    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }
    
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPin() {
        return $this->pin;
    }

    function setPin($pin) {
        $this->pin = $pin;
    }




}
