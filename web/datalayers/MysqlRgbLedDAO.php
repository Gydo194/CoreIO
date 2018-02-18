<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MysqlRgbLedDAO
 *
 * @author gydo194
 */
defined("MYSQL_RGBLED_USER_TABLE_NAME") || define("MYSQL_RGBLED_USER_TABLE_NAME", "rgbled");

class MysqlRgbLedDAO implements IDAORgbLed {

    private static $instance = null;

    public static function getInstance(): MysqlRgbLedDAO {
        if (null === self::$instance) {
            self::$instance = new MysqlRgbLedDAO();
        }
        return self::$instance;
    }

    public function createRgbLed(\RgbLed $led) {
        $s = PDOFactory::query("INSERT INTO " . MYSQL_RGBLED_USER_TABLE_NAME . " (group,redpin,greenpin,bluepin) VALUES (?,?,?,?);", array(
                    $led->getRedPin(),
                    $led->getGreenPin(),
                    $led->getBluePin()
        ));
    }

    public function deleteRgbLed(\RgbLed $led) {
        $s = PDOFactory::query("DELETE from " . MYSQL_RGBLED_USER_TABLE_NAME . " WHERE id = ?;", array($led->getId()));
    }

    public function getRgbLed(int $id): RgbLed {
        $s = PDOFactory::query("SELECT groupname,red,green,blue,redpin,greenpin,bluepin FROM " . MYSQL_RGBLED_USER_TABLE_NAME . " WHERE id = ? LIMIT 1;", array($id));
        $res = $s->fetch(PDO::FETCH_ASSOC);


        if ($s->rowCount() !== 1) {
            //error_log("MysqlRgbledDAO::getRgbLed: rgbled id:".$id);
            throw new InaccessibleDataException("MysqlRgbledDAO::getRgbLed: no results from database");
        }

        $led = new RgbLed();

        $led->setId($id); //dont forget it!

        if (array_key_exists("groupname", $res)) {
            $led->setGroup($res["groupname"]);
        }
        if (array_key_exists("red", $res)) {
            $led->setRed($res["red"]);
        }
        if (array_key_exists("green", $res)) {
            $led->setGreen($res["green"]);
        }
        if (array_key_exists("blue", $res)) {
            $led->setBlue($res["blue"]);
        }
        if (array_key_exists("redpin", $res)) {
            $led->setRedPin($res["redpin"]);
        }
        if (array_key_exists("greenpin", $res)) {
            $led->setGreenPin($res["greenpin"]);
        }
        if (array_key_exists("bluepin", $res)) {
            $led->setBluePin($res["bluepin"]);
        }

        return $led;
    }

    public function updateRgbLed(\RgbLed $led) {

        $s = PDOFactory::query("UPDATE " . MYSQL_RGBLED_USER_TABLE_NAME . " SET groupname = ?, red = ?, green = ?, blue = ?, redpin = ?, greenpin = ?, bluepin = ? WHERE id = ?;", array(
                    $led->getGroup(),
                    $led->getRed(),
                    $led->getGreen(),
                    $led->getBlue(),
                    $led->getRedPin(),
                    $led->getGreenPin(),
                    $led->getBluePin(),
                    $led->getId()
        ));
    }

}
