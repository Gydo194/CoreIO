<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserData
 *
 * @author gydo194
 */
class UserData {
    private $id = 0;
    private $applets = array();
    
    public function getApplets(): array {
        return $this->applets;
    }
    
    public function setApplets(array $a) {
        $this->applets = $a;
    }
    
    public function addApplet(string $name) {
        array_push($this->applets, $name);
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }


    
}
