<?php

/*
 * CoreIO main
 */

//exceptions
require_once 'utils/InaccessibleDataException.php';
require_once 'utils/ServerCommunicationException.php';
require_once 'utils/ServerCommunication.php';


//general utility
require_once 'utils/PDOFactory.php';
require_once 'utils/Base64Serializeable.php';
require_once 'utils/Request.php';

require_once 'core/models/interfaces/IUser.php';
require_once 'core/models/User.php';
require_once 'core/datalayerinterfaces/IDAOUser.php';
require_once 'core/datalayers/TestUserDAO.php';
require_once 'core/datalayers/MysqlUserDAO.php';


require_once 'core/controllers/SessionController.php';
require_once 'core/controllers/UserController.php';


require_once 'web/ActionFramework/AccessViolationException.php';
require_once 'web/ActionFramework/ActionFramework.php';


require_once 'web/views/TestPage.php';
require_once 'web/views/NotFoundPage.php';
require_once 'web/views/MainPage.php';
require_once 'web/views/UnauthorisedPage.php';
require_once 'web/views/AdminPage.php';
require_once 'web/views/LoginPage.php';
require_once 'web/views/LogoutPage.php';

//web datalayer interfaces
require_once 'web/datalayerinterfaces/IDAORgbLed.php';

//web datalayers
require_once 'web/datalayers/MysqlRgbLedDAO.php';


//web models
require_once 'web/models/RgbLed.php';

//web controllers (actions)
require_once 'web/controllers/TCPSendAction.php';
require_once 'web/controllers/UserCheckAction.php';
require 'web/controllers/RGBLedController.php';

//web applets
require_once 'web/applets/RgbledApplet.php';


//applets old
//require_once 'web/applets/RgbledApplet.php';



//define constants
defined("APP_NAME") || define("APP_NAME","CoreIO");
defined("APP_VERSION") || define("APP_VERSION","7.2.3");
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
//$rgbled = new RgbledApplet();

/*
//add pages *OLD
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
*/

//bind pages
ActionFramework::bindAction("test", $tp, "invoke");
ActionFramework::bindAction("404", $nf, "invoke");
//ActionFramework::bindAction("ERROR", $tp, "invoke");
ActionFramework::bindAction("UNAUTH", $uauth, "invoke");
ActionFramework::bindAction("admin", $admin, "invoke");
ActionFramework::bindAction("login", $login, "invoke");
ActionFramework::bindAction("logout", $logout, "invoke");
ActionFramework::bindAction("send", $snd, "invoke");
ActionFramework::bindAction("send", $snd, "invoke");
ActionFramework::bindAction("usercheck", $uchck, "invoke");
//ActionFramework::bindAction("rgbled", $rgbled, "invoke");
ActionFramework::bindAction("main", $mp, "invoke");

//bind rgbled actions
$rgbled_controller = RGBLedController::getInstance();

ActionFramework::bindAction("updateRgbledRed", $rgbled_controller, "updateRedByIdWebWrapper");
ActionFramework::bindAction("updateRgbledGreen", $rgbled_controller, "updateGreenByIdWebWrapper");
ActionFramework::bindAction("updateRgbledBlue", $rgbled_controller, "updateBlueByIdWebWrapper");
ActionFramework::bindAction("rgbledGetValues", $rgbled_controller, "getValuesById");


//get the page/action
$page = "main";
if(isset($_REQUEST[VIEW_PAGE_PARAM_NAME])) {
    $page = $_REQUEST[VIEW_PAGE_PARAM_NAME];
}

//log the user in
UserController::login();

//render the page
ActionFramework::invoke($page); //the page render functions decide whether or not the user is authorised to see the page
