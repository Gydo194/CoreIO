<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gydo194
 */
interface Base64Serializeable {
    public function serialize(): string;
    public function unserialize(string $data);
}
