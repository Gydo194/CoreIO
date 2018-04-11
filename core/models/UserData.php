<?php

class UserData implements IUserData {
    private $id = 0;
    private $data = array();

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setValue(string $key, string $value) {
        $this->data[$key] = $value;
    }

    public function hasValue(string $key) {
        return array_key_exists($this->data, $key);
    }

    public function getValue(string $value) {
        return $this->data[$key];
    }
}
