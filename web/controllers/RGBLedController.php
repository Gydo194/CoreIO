<?php

/**
 * Description of ArduinoRGBLedController
 *
 * @author gydo194
 */
defined("RGBLED_UPDATE_PERMISSION") || define("RGBLED_UPDATE_PERMISSION", "send");
defined("RGBLED_ID_PARAM_NAME") || define("RGBLED_ID_PARAM_NAME","rgbled_id");
defined("RGBLED_VALUE_PARAM_NAME") || define("RGBLED_VALUE_PARAM_NAME","value");

class RGBLedController {

    private static $instance = null;
    private $dao = null;

    public static function getInstance(): RGBLedController {
        if (null === self::$instance) {
            self::$instance = new RGBLedController();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->dao = MysqlRgbLedDAO::getInstance(); //DAO
    }

    private function generateArduinoAWSendCommand(int $pin, int $val): string {
        return "aw(" . $pin . "," . $val . ");";
    }

    public function getRgbLed(int $id): RgbLed {
        return $this->dao->getRgbLed($id);
    }

    public function updateRedById(int $id, int $red): bool {
        try {
            $led = $this->dao->getRgbLed($id); //we need the group to send to and pin mapping values; still need to reach out to DB :(\
            $led->setRed($red);
            $this->dao->updateRgbLed($led); //and there we go; second query D:
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getRedPin(), $red));
        } catch (InaccessibleDataException $ex) {
            error_log("RGBLedController::updateRedById(): caught InaccessibleDataException from DAO.");
            return false;
        } catch (ServerCommunicationException $e) {
            error_log("RGBLedController::updateRedById(): caught ServerCommunicationException, could not connect to server.");
            return false;
        }


        return true;
    }

    public function updateGreenById(int $id, int $green): bool {
        try {
            $led = $this->dao->getRgbLed($id);
            $led->setGreen($green);
            $this->dao->updateRgbLed($led);
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getGreenPin(), $green));
        } catch (InaccessibleDataException $ex) {
            error_log("RGBLedController::updateRedById(): caught InaccessibleDataException from DAO.");
            return false;
        } catch (ServerCommunicationException $e) {
            error_log("RGBLedController::updateRedById(): caught ServerCommunicationException, could not connect to server.");
            return false;
        }
        return true;
    }

    public function updateBlueById(int $id, int $blue): bool {
        try {
            $led = $this->dao->getRgbLed($id);
            $led->setBlue($blue);
            $this->dao->updateRgbLed($led);
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getBluePin(), $blue));
        } catch (InaccessibleDataException $ex) {
            error_log("RGBLedController::updateRedById(): caught InaccessibleDataException from DAO.");
            return false;
        } catch (ServerCommunicationException $e) {
            error_log("RGBLedController::updateRedById(): caught ServerCommunicationException, could not connect to server.");
            return false;
        }
        return true;
    }

    public function updateRedByIdWebWrapper() {
        if (!UserController::getPermission(RGBLED_UPDATE_PERMISSION)) {
            echo "{\"success\":false,\"reason\":\"unauthorised\"}";
            return; //throwing the access violation exception when not logged in renders the login page
        }
        
        $id = intval(Request::getRequestParameter("rgbled_id"));
        $red = intval(Request::getRequestParameter("value"));


        if (self::updateRedById($id, $red)) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

    public function updateGreenByIdWebWrapper() {

        if (!UserController::getPermission(RGBLED_UPDATE_PERMISSION)) {
            echo "{\"success\":false,\"reason\":\"unauthorised\"}";
            return;
        }

        $id = intval(Request::getRequestParameter(RGBLED_ID_PARAM_NAME));
        $green = intval(Request::getRequestParameter(RGBLED_VALUE_PARAM_NAME));


        if (self::updateGreenById($id, $green)) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

    public function updateBlueByIdWebWrapper() {

        if (!UserController::getPermission(RGBLED_UPDATE_PERMISSION)) {
            echo "{\"success\":false,\"reason\":\"unauthorised\"}";
            return;
        }

        $id = intval(Request::getRequestParameter(RGBLED_ID_PARAM_NAME));
        $blue = intval(Request::getRequestParameter(RGBLED_VALUE_PARAM_NAME));

        if (self::updateBlueById($id, $blue)) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

    public function getValuesById() {

        if (!UserController::getPermission(RGBLED_UPDATE_PERMISSION)) {
            echo "{\"success\":false,\"reason\":\"unauthorised\"}";
            return;
        }

        $id = intval(Request::getRequestParameter(RGBLED_ID_PARAM_NAME));
        try {
            $led = $this->dao->getRgbLed($id);
        } catch (InaccessibleDataException $e) {
            echo "{\"success\":false}";
            return;
        }

        $arr = array(
            "success" => true,
            "red" => $led->getRed(),
            "green" => $led->getGreen(),
            "blue" => $led->getBlue()
        );
        echo json_encode($arr, true);
    }

}
