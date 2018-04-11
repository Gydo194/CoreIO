<?php

//INCLUDES ONLY FOR UNIT TEST!!!!!!!!
include_once "../../utils/Base64Serializeable.php";
include_once "../datalayerinterfaces/IDAOUser.php";
include_once "../datalayers/MysqlUserDAO.php";
include_once "../datalayerinterfaces/IDAOUserData.php";
include_once "../models/interfaces/IUser.php";
include_once "../models/interfaces/IUserData.php";
include_once "../models/User.php";
include_once "../models/UserData.php";



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
        if(is_null($ud)) return;
        foreach($ud->getData() as $k => $v) {
            echo "MysqlUserDataDAO::createUserData(): Key: '".$k."', val: '".$v."'!<br>";
        }
        
    }
    public function updateUserData(IUserData $ud) {
        
    }
    public function deleteUserData(IUserData $ud) {
        
    }
    
    //create by integer ID
    public function createUserDataById(int $id) {
        
    }
    
    //get
    public function getUserData(int $id) {
        
    }
    
    
}

//unit test
$u = new UserData();
$u->setId(1);
$u->setValue("key0","value0");
$u->setValue("key1","value1");
$u->setValue("key2","value2");

echo "creating<br>";
MysqlUserDataDAO::getInstance()->createUserData($u);
echo "create done<br>";