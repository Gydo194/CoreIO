<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestPage
 *
 * @author gydo194
 */
class TestPage {
    //put your code here
    
    public function invoke() {
        echo "TestPage invoked!<br>";
       // echo "constant: ".LOGIN_BASE_PERMISSION_NAME."<br>";
        echo UserController::isLoggedIn() ? "Logged in" : "not logged in";
        if(UserController::getPermission("debug")) {
            echo "Debug Access<br>";
            var_dump(UserController::getUser());
            
        } else {
            echo "No debug access";
        }
    }

}
