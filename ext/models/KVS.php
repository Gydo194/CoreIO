<?php

class KVS implements IStringKVS {
    private $data;
    private $name;

    public function setValue(string $key, string $value) {
        $this->data[$key] = $value;
    }

    public function hasValue(string $key): bool {
        return array_key_exists($key, $this->data);
    }

    public function getValue(string $key): string {
        if(!self::hasValue($key)) {
            return "";
        }
        return $this->data[$key];
    }
    //raw handling functions
    public function getData(): array {
        return $this->data;
    }

    public function setData(array $data) {
        $this->data = $data;
    }
    
    //KVSNAME
    public function getName(): string {
        return $this->name;
    }
    
    public function setName(string $name) {
        $this->name = $name;
    }
}