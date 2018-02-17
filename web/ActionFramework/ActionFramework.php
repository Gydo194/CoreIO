<?php

defined("AF3_404_ACTION") || define("AF3_404_ACTION", "404");
defined("AF3_UAUTH_ACTION") || define("AF3_UAUTH_ACTION", "UAUTH");
defined("AF3_ERROR_ACTION") || define("AF3_ERROR_ACTION", "ERROR");


defined("LOGIN_ACTION") || define("LOGIN_ACTION", "login");

class ActionFramework {

    private static $actions = array();

    /**
     * 
     * @param string $name the name to bind the action to
     * @param type $object the object reference to call a function on
     * @param string $funcName the name of the function to call
     */
    public static function bindAction(string $name, &$object, string $funcName) {
        self::$actions[$name] = array("ref" => $object, "name" => $funcName);
    }

    public static function hasAction(string $name) {
        return array_key_exists($name, self::$actions);
    }

    /**
     * 
     * @param string $name the function name to call
     */
    public static function invoke(string $name) {
        if (!self::hasAction($name)) {
            self::handleNotFound();
            return;
        }
        try {
            call_user_func(array(self::$actions[$name]["ref"], self::$actions[$name]["name"]));
        } catch (ActionExecutionException $e) {
            self::handleExecutionException();
        } catch (AccessViolationException $e) {
            self::handleUnauthorised();
        }
    }

    private static function handleNotFound() {
        if (self::hasAction(AF3_404_ACTION)) {
            self::invoke(AF3_404_ACTION);
        } else {
            print("404");
        }
    }

// customizations
    private static function handleUnauthorised() {
        if (UserController::isLoggedIn()) {
            self::unauth();
        } else {
            self::unauthLogin();
        }
    }

    private static function unauthLogin() {
        if (UserController::sessionActive()) {
            self::invoke(LOGIN_ACTION);
        } else {
            print("Unauthorised");
        }
    }

    private static function unauth() {
        if (self::hasAction(AF3_UAUTH_ACTION)) {
            self::invoke(AF3_UAUTH_ACTION);
        } else {
            print("Unauthorised");
        }
    }

//end customizations
    private static function handleExecutionException() {
        if (self::hasAction(AF3_ERROR_ACTION)) {
            self::invoke(AF3_ERROR_ACTION);
        } else {
            print("Error");
        }
    }

}
