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
class MainPage implements Action {

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
        <html>
            <head>
                <title><?php echo APP_NAME . " " . APP_VERSION; ?></title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

                <link rel="stylesheet" href="res/bootstrap.min.css" />
                <script src="res/jquery-3.2.1.slim.min.js"></script>
                <script src="res/popper.min.js"></script>
                <script src="res/bootstrap.min.js"></script>


                <!--
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
               
                <style>
                    /*rgbled sliders - red*/
                    input[type=range].rgbled-slider-red {
                        -webkit-appearance: none;
                        width: 100%;
                        margin: 10.8px 0;
                    }
                    input[type=range].rgbled-slider-red:focus {
                        outline: none;
                    }
                    input[type=range].rgbled-slider-red::-webkit-slider-runnable-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #ff0000;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-red::-webkit-slider-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        -webkit-appearance: none;
                        margin-top: -11px;
                    }
                    input[type=range].rgbled-slider-red:focus::-webkit-slider-runnable-track {
                        background: #ff1a1a;
                    }
                    input[type=range].rgbled-slider-red::-moz-range-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #ff0000;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-red::-moz-range-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                    }
                    input[type=range].rgbled-slider-red::-ms-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        background: transparent;
                        border-color: transparent;
                        color: transparent;
                    }
                    input[type=range].rgbled-slider-red::-ms-fill-lower {
                        background: #e60000;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-red::-ms-fill-upper {
                        background: #ff0000;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-red::-ms-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        height: 8.4px;
                    }
                    input[type=range].rgbled-slider-red:focus::-ms-fill-lower {
                        background: #ff0000;
                    }
                    input[type=range].rgbled-slider-red:focus::-ms-fill-upper {
                        background: #ff1a1a;
                    }

                    /*rgbled sliders - green*/

                    input[type=range].rgbled-slider-green {
                        -webkit-appearance: none;
                        width: 100%;
                        margin: 10.8px 0;
                    }
                    input[type=range].rgbled-slider-green:focus {
                        outline: none;
                    }
                    input[type=range].rgbled-slider-green::-webkit-slider-runnable-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #00ff00;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-green::-webkit-slider-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        -webkit-appearance: none;
                        margin-top: -11px;
                    }
                    input[type=range].rgbled-slider-green:focus::-webkit-slider-runnable-track {
                        background: #1aff1a;
                    }
                    input[type=range].rgbled-slider-green::-moz-range-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #00ff00;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-green::-moz-range-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                    }
                    input[type=range].rgbled-slider-green::-ms-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        background: transparent;
                        border-color: transparent;
                        color: transparent;
                    }
                    input[type=range].rgbled-slider-green::-ms-fill-lower {
                        background: #00e600;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-green::-ms-fill-upper {
                        background: #00ff00;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-green::-ms-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        height: 8.4px;
                    }
                    input[type=range].rgbled-slider-green:focus::-ms-fill-lower {
                        background: #00ff00;
                    }
                    input[type=range].rgbled-slider-green:focus::-ms-fill-upper {
                        background: #1aff1a;
                    }

                    /*rgbled sliders - blue*/


                    input[type=range].rgbled-slider-blue {
                        -webkit-appearance: none;
                        width: 100%;
                        margin: 10.8px 0;
                    }
                    input[type=range].rgbled-slider-blue:focus {
                        outline: none;
                    }
                    input[type=range].rgbled-slider-blue::-webkit-slider-runnable-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #0000ff;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-blue::-webkit-slider-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        -webkit-appearance: none;
                        margin-top: -11px;
                    }
                    input[type=range].rgbled-slider-blue:focus::-webkit-slider-runnable-track {
                        background: #1a1aff;
                    }
                    input[type=range].rgbled-slider-blue::-moz-range-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                        background: #0000ff;
                        border-radius: 25px;
                        border: 0.2px solid #010101;
                    }
                    input[type=range].rgbled-slider-blue::-moz-range-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                    }
                    input[type=range].rgbled-slider-blue::-ms-track {
                        width: 100%;
                        height: 8.4px;
                        cursor: pointer;
                        background: transparent;
                        border-color: transparent;
                        color: transparent;
                    }
                    input[type=range].rgbled-slider-blue::-ms-fill-lower {
                        background: #0000e6;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-blue::-ms-fill-upper {
                        background: #0000ff;
                        border: 0.2px solid #010101;
                        border-radius: 50px;
                        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                    }
                    input[type=range].rgbled-slider-blue::-ms-thumb {
                        box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                        border: 0.1px solid #000000;
                        height: 30px;
                        width: 30px;
                        border-radius: 50px;
                        background: #ffffff;
                        cursor: pointer;
                        height: 8.4px;
                    }
                    input[type=range].rgbled-slider-blue:focus::-ms-fill-lower {
                        background: #0000ff;
                    }
                    input[type=range].rgbled-slider-blue:focus::-ms-fill-upper {
                        background: #1a1aff;
                    }


                </style>
                -->
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
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?p=admin">Admin Page</a>                                
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

                            <?php ActionFramework::invokeAction("rgbled"); ?>
                            <?php ActionFramework::invokeAction("rgbled"); ?>
                            <?php ActionFramework::invokeAction("rgbled"); ?>
                            <?php ActionFramework::invokeAction("rgbled"); ?>
                            <?php ActionFramework::invokeAction("rgbled"); ?>
                            <?php ActionFramework::invokeAction("rgbled"); ?>


                        </div>





                        <!-- container -->
                    </div>


                </main>



                <script id="mainScript">

                            var timer = null;

                            function checkSession() {
                                console.log("check called");
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
                                            console.log("JSON state is true; all is fine");
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
                                timer = setInterval(checkSession,3000);
                            });

                            timer = setInterval(checkSession,3000);





                </script>



            </body>
        </html>

        <?php
    }

}
