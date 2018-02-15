<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminPage
 *
 * @author gydo194
 */

defined("ADMIN_PAGE_PERMISSION_NAME") || define("ADMIN_PAGE_PERMISSION_NAME","admin");

class AdminPage implements Action {
    //put your code here
    public function invoke() {
        
        if(!UserController::getPermission(ADMIN_PAGE_PERMISSION_NAME)) {
            throw new AccessViolationException();
        }
        echo "admin page success";
    }

}
