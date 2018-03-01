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
        //error_log("UpdateDimLight() called");
        if(!Request::hasRequestParameter(DIMLIGHT_REQUEST_ID_VARNAME)) { 
            error_log("DimLightController::updateDimLight(): missing ID parameter; aborting..");
            return;
        }
        self::permissionCheck();
        $id = Request::getRequestParameter(DIMLIGHT_REQUEST_ID_VARNAME);
        $value = Request::getRequestParameter(DIMLIGHT_REQUEST_VALUE_VARNAME);
        $pin = Request::getRequestParameter(DIMLIGHT_REQUEST_PIN_VARNAME);
        $groupname = Request::getRequestParameter(DIMLIGHT_REQUEST_GROUP_VARNAME);

        //echo "id:{$id} val: {$value} pin: {$pin} group: {$groupname}";
        
        
        try {
            $d = $this->dao->getDimLight($id);
            
            if(Request::hasRequestParameter(DIMLIGHT_REQUEST_PIN_VARNAME)) {
                $d->setPin($pin);
            }
            if(Request::hasRequestParameter(DIMLIGHT_REQUEST_GROUP_VARNAME)) {
                $d->setGroup($groupname);
            }
            if(Request::hasRequestParameter(DIMLIGHT_REQUEST_VALUE_VARNAME)) {
                $d->setValue($value);
            }
            
            
            $this->dao->updateDimLight($d);
            //error_log("GROUPNAME:".$d->getGroup());
            //error_log("VALUE:"+$d->getValue());
            ServerCommunication::send($d->getGroup(), self::generateArduinoAWSendCommand($d->getPin(), $d->getValue()));
            echo "{\"success\":true}";
        } catch (InaccessibleDataException $e) {
            error_log("inacc data exception");
            echo "{\"success\":false}";
        } catch (ServerCommunicationException $s) {
            error_log("Servercomm exception");
            echo "{\"success\":false}";
        }
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

    private static function generateArduinoAWSendCommand(int $pin, int $val): string {
        return "aw(" . $pin . "," . $val . ");";
    }

}
