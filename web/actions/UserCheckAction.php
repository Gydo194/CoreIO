<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserCheckAction
 *
 * @author gydo194
 */
class UserCheckAction implements Action {

    public function invoke() {
        if (UserController::isLoggedIn()) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

}
