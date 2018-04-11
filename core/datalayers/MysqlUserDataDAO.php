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
include_once "../../utils/PDOFactory.php";
include_once "../../utils/InaccessibleDataException.php";


defined("MYSQL_USERDATA_DAO_TABLE_NAME") || define("MYSQL_USERDATA_DAO_TABLE_NAME","userdata");

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
        
        $stmt = PDOFactory::query("insert into ".MYSQL_USERDATA_DAO_TABLE_NAME." values (?)",array($ud->getId()));
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
    
    //get
    public function getUserData(int $id) {
        $stmt = PDOFactory::query("SELECT id FROM ".MYSQL_USERDATA_DAO_TABLE_NAME." WHERE id = ?",array($id));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() < 1) {
            //got no database results
            echo "NO DATABASE ROWS RETURNED<br>";
            throw new InaccessibleDataException();
        }
        
        foreach($res as $k => $v) {
            echo "MysqlUserDataDAO::getUserData(): database result: Key: '".$k."', val: '".$v."'!<br>";
        }
        
        $ud = new UserData();
        if(array_key_exists("id",$res)) {
            $ud->setId($res["id"]);
        }
        
        return $ud;
    }
    
    
}

//unit test
$u = new UserData();
$u->setId(1);
$u->setValue("key0","value0");
$u->setValue("key1","value1");
$u->setValue("key2","value2");

echo "creating<br>";
//MysqlUserDataDAO::getInstance()->createUserData($u);
try{
$userdataget = MysqlUserDataDAO::getInstance()->getUserData(1);
}catch(InaccessibleDataException $e){
    echo "IDE";
    exit();
}

var_dump($userdataget);

echo "<br>user data id =" . $userdataget->getId();
echo "create done<br>";