<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutPage
 *
 * @author gydo194
 */
class LogoutPage implements Action {
    //put your code here
    public function invoke() {
        UserController::logout();
        echo "<b>Logout successful</b>";
    }

}
