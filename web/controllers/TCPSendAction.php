<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TCPSendPage
 *
 * @author gydo194
 */


defined("TCP_SEND_PERMISSION_NAME") || define("TCP_SEND_PERMISSION_NAME","send");
//defined("HOST") || define("HOST","127.0.0.1");
defined("HOST") || define("HOST","core.io");
defined("PORT") || define("PORT",3000);


class TCPSendAction {
   
     private function send2($msg) {
        $host = gethostbyname(HOST);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            error_log("send2(): socket creation failed");
            return false;
        }
        if (!socket_connect($socket, HOST, PORT)) {
            error_log("send2(): connection failed");
            socket_close($socket);
            return false;
        }
        if (!socket_write($socket, $msg)) {
            error_log("send2(): socket write failed");
            socket_close($socket);
            return false;
        }
        socket_close($socket);
        return true;
    }

    public function invoke() {

        if (!UserController::getPermission("send")) {
            echo "{\"success\":false}";
            throw new AccessViolationException(); //notify the caller we failed because the user does not have the required access attributes
        }

        if (!isset($_REQUEST["msg"])) {
            return;
        }

        if (!defined("HOST") || !defined("PORT")) {
            error_log("send2(): HOST or PORT constants not defined. Aborting.");
            throw new ActionExecutionException();
        }

        if ($this->send2($_REQUEST["msg"])) {
            echo "{\"success\":true}";
        } else {
            echo "{\"success\":false}";
        }
    }

}
