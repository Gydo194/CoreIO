<?php

interface IStringKVS {

    public function setValue(string $key, string $value);

    public function hasValue(string $key): bool;

    public function getValue(string $key): string;

    //entire array
    public function getData(): array;

    public function setData(array $data);
    
    //KVSNAME
    public function getName(): string;
    
    public function setName(string $name);
}