<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



require_once './utils/interfaces/Base64Serializeable.php';
require_once 'models/interfaces/IUser.php';
require_once 'models/User.php';
require_once './datalayerinterfaces/IDAOUser.php';
require_once './datalayers/TestUserDAO.php';
require_once './datalayers/MysqlUserDAO.php';


require_once './controllers/SessionController.php';
require_once './controllers/UserController.php';


require_once './web/ViewFramework/PageRenderException.php';
require_once './web/ViewFramework/AccessViolationException.php';
require_once './web/ViewFramework/Action.php';
require_once './web/ViewFramework/ViewFramework.php';


require_once './web/pages/TestPage.php';
require_once './web/pages/NotFoundPage.php';
require_once './web/pages/MainPage.php';
require_once './web/pages/UnauthorisedPage.php';
require_once './web/pages/AdminPage.php';
require_once './web/pages/LoginPage.php';


/*
//echo SessionController::getValue(SESSION_USER_VAR_NAME);
$u = new User();
//$u->unserialize($data);
$u->setPassword("pass");
$u->setUserName("user");
$u->setToken("user0_token");
//$u->setPermissions(array("admin","main","debug","base"));
$u->setPermissions(array());


var_dump($u);

echo "<br>";

var_dump($u->getPermission("base"));
echo "<br>";
var_dump($u->isLoggedIn());
 * 
 */

$i = new MysqlUserDAO();

$user = $i->getUserByUsernameAndPassword("user0", "password0");

var_dump($user);




//phpinfo();