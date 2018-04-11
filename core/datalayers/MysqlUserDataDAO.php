<?php

//nobody ever said this worked
class MysqlUserDataDAO implements IDAOUserData {
    
    /** @var \MysqlUserDataDAO*/
    protected static $instance = null;

    protected function __construct() {
    }
    
    /** @return MysqlUserDataDAO **/
    static public function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new MysqlUserDataDAO();
        }
        return self::$instance;
    }
    //interface implements
    public function createUserData(IUserData $ud) {
        if(is_null($ud))
            return;
        $stmt = PDOFactory::query("insert into " . 
                                  MYSQL_USERDATA_DAO_TABLE_NAME . 
                                  " values (?)", array($ud->getId()));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() < 1) {
            throw new InaccessibleDataException();
        }
    }

    public function updateUserData(IUserData $ud) {
    }

    public function deleteUserData(IUserData $ud) {
    }
    //create by integer ID
    public function createUserDataById(int $id) {
    }
    //get UD
    public function getUserData(int $id) {
        $stmt = PDOFactory::query("SELECT id FROM " . 
                                  MYSQL_USERDATA_DAO_TABLE_NAME . 
                                  " WHERE id = ?", array($id));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount()< 1) {
            //got no database results
            throw new InaccessibleDataException();
        }
        $ud = new UserData();
        //if  the keys exist, push them into object, if not throw exception
        if(array_key_exists("id", $res)) {
            $ud->setId($res["id"]);
        } else {
            //didn't get ID
            throw new InaccessibleDataException();
        }
        //base object finished
        //now for the KVS (Key-Value Service)
        $this->getKVS($id, $ud);
        return $ud;
    }
}