<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainPage
 *
 * @author gydo194
 */

defined("ADMIN_PAGE_PERMISSION_NAME") || define("ADMIN_PAGE_PERMISSION_NAME","admin");

class MainPage {

    //put your code here
    /*
      public function invoke() {
      if (!UserController::getPermission("main")) {
      echo "main page failed: no perms";
      //var_dump(UserController::isLoggedIn());
      throw new AccessViolationException(); //need the 'main' permission
      }
      echo "<h1>Main page</h1>";
      }
     */

    public function invoke() {
        if (!UserController::getPermission("main")) {
            //echo "main page failed: no perms";
            //var_dump(UserController::isLoggedIn());
            throw new AccessViolationException(); //need the 'main' permission
        }
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title><?php echo APP_NAME . " " . APP_VERSION; ?></title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

                <link rel="stylesheet" href="web/res/bootstrap.min.css" />
                <script src="web/res/jquery-3.2.1.slim.min.js"></script>
                <script src="web/res/popper.min.js"></script>
                <script src="web/res/bootstrap.min.js"></script>
            </head>
            <body>


                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"><?php echo APP_NAME . " - " . UserController::getUserName(); ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tools
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item disabled" href="#" id="onlineIndicator"><font color='green'>Online</font></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?p=usercheck">User Check</a>
                                    <a class="dropdown-item" href="?p=test">Test Page</a>
                                    <?php
                                    if (UserController::getPermission(ADMIN_PAGE_PERMISSION_NAME)) {
                                        ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="?p=admin">Admin Page</a> 
                                        <?php
                                    }
                                    ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?p=logout">Logout</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
                            -->
                        </ul>
                        <!--
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        -->
                    </div>
                </nav>


                <main role="main">
                    <!--  <div class="container-fluid"> -->


                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Welcome!</h1>
                            <p class="lead">No news for today.</p>
                        </div>
                    </div>
                    <!--    </div> -->
                    <div class="container-fluid">



                        <div class="row">

                            <?php ActionFramework::invoke("rgbled"); ?>
                            <?php ActionFramework::invoke("rgbled"); ?>
                            <?php ActionFramework::invoke("rgbled"); ?>
                            <?php ActionFramework::invoke("rgbled"); ?>
                            <?php ActionFramework::invoke("rgbled"); ?>
                            <?php ActionFramework::invoke("rgbled"); ?>


                        </div>





                        <!-- container -->
                    </div>


                </main>



                <script id="mainScript">

                            var timer = null;

                            function checkSession() {
                                //console.log("check called");
                                var x = new XMLHttpRequest();
                                x.onload = function () {
                                    if (4 === this.readyState) {
                                        var state = false;
                                        try {
                                            state = JSON.parse(this.responseText)["success"];
                                        } catch (err) {
                                            $("#onlineIndicator").html("<font color='red'>Check Error [JSON]</font>");
                                        }
                                        //check
                                        if (true === state) {
                                            //console.log("JSON state is true; all is fine");
                                            $("#onlineIndicator").html("<font color='green'>Connected</font>");

                                        } else {
                                            //check browser online
                                            console.log("check: session expired.");
                                            $("#onlineIndicator").html("<font color='red'>Session expired</font>");
                                        }
                                    }
                                }
                                x.onerror = function () {
                                    $("#onlineIndicator").html("<font color='red'>Check Error</font>");
                                }

                                x.open("GET", "?p=usercheck");
                                x.send();
                            }


                            window.addEventListener("offline", function (e) {
                                console.log("window.onoffline event fired");
                                $("#onlineIndicator").html("<font color='red'>Offline</font>");
                                clearInterval(timer);

                            });


                            window.addEventListener("online", function (e) {
                                console.log("window.ononline event fired");
                                $("#onlineIndicator").html("<font color='green'>Online</font>");
                                timer = setInterval(checkSession, 3000);
                            });

                            timer = setInterval(checkSession, 3000);





                </script>



            </body>
        </html>

        <?php
    }

}
