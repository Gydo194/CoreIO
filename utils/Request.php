<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author gydo194
 */
class Request {
    //put your code here
   private static function getRequestParameter(string $name): string {
        if (isset($_REQUEST[$name])) {
            return $_REQUEST[$name];
        } else {
            return "";
        }
    }
}
