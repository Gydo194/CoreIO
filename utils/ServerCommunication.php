<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gamp
 *
 * @author gydo194
 */
defined("HOST") || define("HOST", "127.0.0.1");
defined("PORT") || define("PORT", 3000);

class ServerCommunication {

    // private static $host = "127.0.0.1";
    // private static $port = 3000;
    private static $host = HOST;
    private static $port = PORT;

    private static function send2($msg) {
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

    //default to base64 send
    public static function send(string $group, string $message) {
        $b64 = base64_encode($message);
        $msg = "bsend({$group},{$b64});";
        if (!self::send2($msg)) {
            throw new ServerCommunicationException();
        }
    }

}
