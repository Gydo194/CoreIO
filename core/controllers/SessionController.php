<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SessionController
 *
 * @author gydo194
 */
class SessionController {
    //put your code here
    public static function getValue(string $name): string {
        if(isset($_SESSION[$name])) {
            return strval($_SESSION[$name]);
        } else {
            return "";
        }
    }
    
    
    public static function setValue(string $name, string $value) {
        if(isset($_SESSION)) {
            $_SESSION[$name] = $value;
        }
    }
    
    public function hasValue(string $name): bool {
        return isset($_SESSION[$name]);
    }
    
    
    
}
