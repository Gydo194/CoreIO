<?php

interface IUserData {
    public function getId(): int;
    public function setId(int $id);
    
    public function setValue(string $key, string $value);
    public function hasValue(string $key);
    public function getValue(string $value);
}