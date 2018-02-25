<?php


/**
 * Check whether a valid user is logged in; used by javascript in front end to validate your password
 *
 * @author gydo194
 */
class UserCheckAction {

    public function invoke() {
        if (UserController::isLoggedIn()) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

}
