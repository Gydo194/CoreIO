<?php

/*
 * CoreIO main
 */

require_once './utils/interfaces/Base64Serializeable.php';
require_once 'models/interfaces/IUser.php';
require_once 'models/User.php';
require_once './datalayerinterfaces/IDAOUser.php';
require_once './datalayers/TestUserDAO.php';
require_once './datalayers/MysqlUserDAO.php';


require_once './controllers/SessionController.php';
require_once './controllers/UserController.php';


require_once './web/ActionFramework/PageRenderException.php';
require_once './web/ActionFramework/AccessViolationException.php';
require_once './web/ActionFramework/Action.php';
require_once './web/ActionFramework/ActionFramework.php';


require_once './web/pages/TestPage.php';
require_once './web/pages/NotFoundPage.php';
require_once './web/pages/MainPage.php';
require_once './web/pages/UnauthorisedPage.php';
require_once './web/pages/AdminPage.php';
require_once './web/pages/LoginPage.php';
require_once './web/pages/LogoutPage.php';


//actions
require_once './web/actions/TCPSendAction.php';
require_once './web/actions/UserCheckAction.php';

//applets
require_once './web/applets/RgbledApplet.php';



//define constants
defined("APP_NAME") || define("APP_NAME","CoreIO");
defined("APP_VERSION") || define("APP_VERSION","7.2.1");
defined("VIEW_PAGE_PARAM_NAME") || define("VIEW_PAGE_PARAM_NAME","p");

defined("ADMIN_PAGE_PERMISSION_NAME") || define("ADMIN_PAGE_PERMISSION_NAME","admin");

//start session if necessary
if(!isset($_REQUEST["nosess"])) {
    session_start();
    
}

//build pages
$tp = new TestPage();
$nf = new NotFoundPage();
$mp = new MainPage();
$uauth = new UnauthorisedPage();
$admin = new AdminPage();
$login = new LoginPage();
$logout = new LogoutPage();
//actions
$snd = new TCPSendAction();
$uchck = new UserCheckAction();
//applets
$rgbled = new RgbledApplet();

//add pages
ActionFramework::addPage("test", $tp);
ActionFramework::addPage("404", $nf);
ActionFramework::addPage("main", $mp);
ActionFramework::addPage("unauth", $uauth);
ActionFramework::addPage("admin", $admin);
ActionFramework::addPage("login", $login);
ActionFramework::addPage("logout", $logout);
ActionFramework::addPage("send", $snd);
ActionFramework::addPage("usercheck", $uchck);
ActionFramework::addPage("rgbled", $rgbled);



//get the page/action
$page = "main";
if(isset($_REQUEST[VIEW_PAGE_PARAM_NAME])) {
    $page = $_REQUEST[VIEW_PAGE_PARAM_NAME];
}

//log the user in
UserController::login();

//render the page
ActionFramework::invokeAction($page); //the page render functions decide whether or not the user is authorised to see the page
