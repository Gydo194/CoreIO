<?php


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
require_once './web/pages/LogoutPage.php';


//actions
require_once './web/actions/TCPSendAction.php';
require_once './web/actions/UserCheckAction.php';






/*
$u = new User("user", "pass", "token", array("main"));

var_dump($u);


*/
/*
$u = new TestUserDAO();

$user = null;
$user = $u->getUserByUsernameAndPassword("user", $_GET["p"]);



if($user == null) { die("no login"); }

var_dump($user);

echo "<br>";
echo $user->getUserName();
echo "<br>";
echo $user->getPassword();
echo "<br>";
echo $user->getToken();
echo "<br>";

echo $user->getPermission("admin") ? "true" : "false";

echo "<br>";

echo $user->serialize();

echo "<br>";

$u2 = new User();
$u2->unserialize("eyJ1c2VybmFtZSI6InVzZXIiLCJwYXNzd29yZCI6InBhc3MiLCJ0b2tlbiI6InVzZXIwX3Rva2VuIiwicGVybWlzc2lvbnMiOnsibWFpbiI6dHJ1ZSwiYWRtaW4iOnRydWUsImRlYnVnIjp0cnVlLCJoYWxsbyI6ZmFsc2V9fQ==");

echo "User deserialize dump<br>";

var_dump($u2);


echo "<br>";
echo "<br>";
*/

/*
define("SESSION_USER_VAR_NAME","user");
define("LOGIN_USERNAME_PARAM_NAME","user");
define("LOGIN_PASSWORD_PARAM_NAME","pass");

echo "UserController login unit test<br>";

UserController::login();


echo "UserController unit test done<br>";

var_dump(UserController::getUser());

*/



/*
echo SessionController::getValue("test");

SessionController::setValue("test", $_REQUEST["set"]);

*/

//echo '"'.UserController::getRequestParameter("test").'"'; //now private function

////////////////////////////////////////////////////////
/*
if(!isset($_REQUEST["nosess"])) {
    session_start();
    
}

echo "UserController login unit test<br>";

UserController::login();


echo "UserController unit test done<br>";

var_dump(UserController::getUser());



echo "View Framework unit test<br>";


$tp = new TestPage();

ViewFramework::addPage("test", $tp);


ViewFramework::render("test");
/////////////////////////////////////////////////////////////


//var_dump((new TestUserDAO)->getUserByToken($_REQUEST["token"]));
 * 
 */


//define constants
defined("APP_NAME") || define("APP_NAME","CoreIO");
defined("APP_VERSION") || define("APP_VERSION","7.2.1");
defined("VIEW_PAGE_PARAM_NAME") || define("VIEW_PAGE_PARAM_NAME","p");


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

//add pages
ViewFramework::addPage("test", $tp);
ViewFramework::addPage("404", $nf);
ViewFramework::addPage("main", $mp);
ViewFramework::addPage("unauth", $uauth);
ViewFramework::addPage("admin", $admin);
ViewFramework::addPage("login", $login);
ViewFramework::addPage("logout", $logout);
ViewFramework::addPage("send", $snd);
ViewFramework::addPage("usercheck", $uchck);


//get the page/action
$page = "main";
if(isset($_REQUEST[VIEW_PAGE_PARAM_NAME])) {
    $page = $_REQUEST[VIEW_PAGE_PARAM_NAME];
}

//log the user in
UserController::login();

//render the page
ViewFramework::renderPage($page); //the page render functions decide whether or not the user is authorised to see the page

