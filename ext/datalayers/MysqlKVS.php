<?php


defined("MYSQL_KVS_TABLE_NAME")|| define("MYSQL_KVS_TABLE_NAME", "kvs");


class MysqlKVS {
    private static $instance = null;

    public static function getInstance(): MysqlKVS {
        if(is_null(self::$instance)) {
            self::$instance = new MysqlKVS();
        }
        return self::$instance;
    }

    public function getKVS(string $kvsName): IStringKVS {
        $stmt = PDOFactory::query("SELECT kvskey,value FROM " . 
                                  MYSQL_KVS_TABLE_NAME . 
        " WHERE name = ?", array($kvsName));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(false === $res) {
            echo "getKVS() got FALSE (SQLERR)<br>";
        }
        
        //if there are no rows, there is no userdata associated.
        if(0 == $stmt->rowCount()) {
            echo "NO associated user data found";
            return new KVS();
            //return empty KVS object
        }
        $kvs = new KVS();

        foreach($res as $key => $value) {
            $kvs->setValue($key, $value);
            echo "adding  KVS value '" . $key . "' = '" . $value . "'.<br>";
        }
        return $kvs;
    }

    public function setKVSValue(string $kvsname, string $kvskey, string $kvsvalue) {
        $stmt = PDOFactory::query("insert into ".MYSQL_KVS_TABLE_NAME." values ( ?, ?, ? )", array($kvsname,$kvskey,$kvsvalue));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        //check success or failure (dont use rowcount or === false)
    }

    public function setKVS(KVS $kvs) {
        if(is_null($kvs)) {
            return;
        }

        foreach($kvs->getData() as $key => $value) {
            echo "MysqlKVS::setKVS(): key = '".$key."' value = '".$value."'.<br>";
            $this->setKVSValue($kvs->getName(),$key,$value); //name
        }
    }
    
}