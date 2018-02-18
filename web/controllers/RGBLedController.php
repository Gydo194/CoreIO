<?php

/**
 * Description of ArduinoRGBLedController
 *
 * @author gydo194
 */
defined("RGBLED_UPDATE_PERMISSION") || define("RGBLED_UPDATE_PERMISSION", "send");

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
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getRedPin(), $red));
            $led->setRed($red);
            $this->dao->updateRgbLed($led); //and there we go; second query D:
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
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getGreenPin(), $green));
            $led->setGreen($green);
            $this->dao->updateRgbLed($led);
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
            ServerCommunication::send($led->getGroup(), self::generateArduinoAWSendCommand($led->getBluePin(), $blue));
            $led->setBlue($blue);
            $this->dao->updateRgbLed($led);
        } catch (InaccessibleDataException $ex) {
            error_log("RGBLedController::updateRedById(): caught InaccessibleDataException from DAO.");
            return false;
        } catch (ServerCommunicationException $e) {
            error_log("RGBLedController::updateRedById(): caught ServerCommunicationException, could not connect to server.");
            return false;
        }
        return true;
    }

    public function updateRedByIdWebWrapper() { //TODO: implement permission; make constant for rgbled_id and value params
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

        $id = intval(Request::getRequestParameter("rgbled_id"));
        $green = intval(Request::getRequestParameter("value"));


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

        $id = intval(Request::getRequestParameter("rgbled_id"));
        $blue = intval(Request::getRequestParameter("value"));

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

        $id = intval(Request::getRequestParameter("rgbled_id"));
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
