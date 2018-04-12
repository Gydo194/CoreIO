<?php

class UserData implements IUserData {
    private $id = 0;
    private $data = array();
    private $kvsname = "";

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getKVSName(): string {
        return $this->kvsname;
    }
    
    public function setKVSName(string $kvsname) {   
        $this->kvsname = $kvsname;
    }
}
