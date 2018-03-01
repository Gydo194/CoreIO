<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DimLightController
 *
 * @author gydo194
 */
defined("DIMLIGHT_REQUEST_VALUE_VARNAME") || define("DIMLIGHT_REQUEST_VALUE_VARNAME", "value");
defined("DIMLIGHT_REQUEST_PIN_VARNAME") || define("DIMLIGHT_REQUEST_PIN_VARNAME", "pin");
defined("DIMLIGHT_REQUEST_GROUP_VARNAME") || define("DIMLIGHT_REQUEST_GROUP_VARNAME", "groupname");
defined("DIMLIGHT_REQUEST_ID_VARNAME") || define("DIMLIGHT_REQUEST_ID_VARNAME", "dimlightid");
defined("DIMLIGHT_PERMISSION_NAME") || define("DIMLIGHT_PERMISSION_NAME", "dimlight");

class DimLightController {

    private static $instance = null;

    public static function getInstance(): DimLightController {
        if (null === self::$instance) {
            self::$instance = new DimLightController();
        }
        return self::$instance;
    }

    private $dao = null;

    public function __construct() {
        $this->dao = MysqlDimLightDAO::getInstance();
    }

    private function permissionCheck() {
        if (!UserController::getPermission(DIMLIGHT_PERMISSION_NAME)) {
            error_log("Not authorised to perform dimlight action.");
            throw new AccessViolationException();
        }
    }

    public function updateDimLight() {

        self::permissionCheck();

        if (!isset($_REQUEST[DIMLIGHT_REQUEST_ID_VARNAME])) {
            error_log("DimLightController::updateDimLight(): missing id param");
            echo "{\"success\":false}";
            return;
        }

        $id = $_REQUEST[DIMLIGHT_REQUEST_ID_VARNAME];

        $d = $this->dao->getDimLight($id);

        if (null === $d) {
            error_log("DimLightController::updateDimLight(): cannot get dimlight object from dao, is id correct?");
            echo "{\"success\":false}";
            return;
        }


        if (isset($_REQUEST[DIMLIGHT_REQUEST_VALUE_VARNAME])) {
            //update the value
            $value = intval($_REQUEST[DIMLIGHT_REQUEST_VALUE_VARNAME]);
            $d->setValue($value);
        }

        if (isset($_REQUEST[DIMLIGHT_REQUEST_PIN_VARNAME])) {
            $pin = intval($_REQUEST[DIMLIGHT_REQUEST_PIN_VARNAME]);
            $d->setPin($pin);
        }

        if (isset($_REQUEST[DIMLIGHT_REQUEST_GROUP_VARNAME])) {
            $groupname = strval($_REQUEST[DIMLIGHT_REQUEST_GROUP_VARNAME]);
            $d->setGroup($groupname);
        }



        $this->dao->updateDimLight($d);

        echo "{\"success\":true}";
    }
    
    
    
    
     public function getValueById() {
         $d = null;
        if (!UserController::getPermission(DIMLIGHT_PERMISSION_NAME)) {
            echo "{\"success\":false,\"reason\":\"unauthorised\"}";
            return;
        }

        $id = intval(Request::getRequestParameter(DIMLIGHT_REQUEST_ID_VARNAME));
        try {
            $d = $this->dao->getDimLight($id);
        } catch (InaccessibleDataException $e) {
            echo "{\"success\":false}";
            return;
        }

        $arr = array(
            "success" => true,
            "value" => intval($d->getValue())
        );
        echo json_encode($arr, true);
    }
    

}
