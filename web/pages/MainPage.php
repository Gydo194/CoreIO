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
                -->
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
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tools
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
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


                        <!-- modal defenition -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Customize</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <!-- red slider -->
                                            <div class="row justify-content-center">


                                                <input type="range" id="rgbled-input-red" class="rgbled-slider-red" min="0" max="255" value="0" >

                                            </div>

                                            <!-- green slider -->
                                            <div class="row justify-content-center">

                                                <input type="range" id="rgbled-input-green" class="rgbled-slider-green" min="0" max="255" value="0" >


                                            </div>

                                            <!-- blue slider -->
                                            <div class="row justify-content-center">

                                                <input type="range" id="rgbled-input-blue" class="rgbled-slider-blue" min="0" max="255" value="0" >


                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary" onclick="alert('applied null');">Apply</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->



                        <!-- send modal defenition -->
                        <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Send to GAMP server</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Server URL</span>
                                            </div>
                                            <input id="input-gamp-url" type="text" placeholder="Optional" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                        </div>

                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Channel</span>
                                            </div>
                                            <input id="input-gamp-channel" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                        </div>

                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Message</span>
                                            </div>
                                            <input id="input-gamp-message" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                        </div>

                                        <button id="input-gamp-send" type="button" class="btn btn-primary">Send</button>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary" onclick="alert('applied null');">Apply</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end send modal -->


                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-sm-12 ">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Server command
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Send a message</h5>
                                        <p class="card-text">Send a GAMP server command</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sendModal">Send message &#5125;</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Go somewhere &#5125;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Go somewhere &#5125;</a>
                                    </div>
                                </div>
                            </div>


                            <!--  </div> -->

                            <!-- start row 2 -->

                            <!--  <div class="row"> -->

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Go somewhere &#5125;</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Go somewhere &#5125;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        Featured
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Go somewhere &#5125;</a>
                                    </div>
                                </div>
                            </div>



                        </div>





                        <!-- container -->
                    </div>


                </main>




                <script>
                    function gampsend(channel, message) {
                        var gcmd = "bsend(CHANNEL,MESSAGE);";
                        var bmsg = btoa(message);

                        console.log("gampsend: message:" + bmsg);

                        var msga = gcmd.replace("CHANNEL", channel);
                        var msg = msga.replace("MESSAGE", bmsg);

                        var x = new XMLHttpRequest();
                        x.open("POST", "", true);
                        x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        /*
                         x.onreadystatechange = function() {
                         if(this.readyState == 4) {
                         //console.log("Request completed. Response:"+this.response);
                         return true;
                         }
                         else {
                         //console.log("request busy.. readyState == "+this.readyState);
                         }
                         }
                         */

                        x.onload = function () {
                            console.log("response='" + this.response + "'");
                            if (this.readyState == 4) {
                                // console.log("OK");

                                var json = JSON.parse(this.responseText);
                                if (json["success"] == true) {
                                    console.log("GAMP command succeeded");
                                } else {
                                    console.log("GAMP command failed (success=false)");

                                }


                            } else {
                                return false;
                            }
                        }

                        x.send("p=send&msg=" + msg);


                    }
                </script>
                <script>

                    $("#input-gamp-send").on("click", function () {
                        console.log("run");
                        var url = $("#input-gamp-url").val();
                        var channel = $("#input-gamp-channel").val();
                        var message = $("#input-gamp-message").val();
                        console.log("URL:" + url);
                        console.log("channel:" + channel);
                        console.log("message:" + message);

                        //var requrl = url + "?a="

                        // var msg = "bsend("+channel+","+btoa(message)+");";

                        //console.log("Base64:"+msg);


                        var xhr = new XMLHttpRequest();

                        xhr.onload = function (e) {
                            console.log("request completed, response:" + e.responseText);
                        }

                        xhr.open("POST", url, true);
                        //xhr.open("POST",url);

                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded") //required

                        var b64 = "bsend(" + channel + "," + btoa(message) + ");";

                        var req = "a=send&msg=" + b64;

                        console.log("POST load:" + req);


                        xhr.send(req);




                    });
                </script>


                <script>
                    //RGB range slider jQuery events
                    const RGBLED_DEVICE_CHANNEL = "1";
                    const RGBLED_RED_PIN = "9";
                    const RGBLED_GREEN_PIN = "6";
                    const RGBLED_BLUE_PIN = "5";



                    $("#rgbled-input-red").on("change", function () { //was on change mousemove
                        console.log("rgbled: Red:" + $(this).val());
                        gampsend(RGBLED_DEVICE_CHANNEL, "aw(" + RGBLED_RED_PIN + "," + $(this).val() + ");");
                        //alert($(this).val());
                    });

                    $("#rgbled-input-green").on("change", function () { //was on change mousemove
                        console.log("rgbled: Green:" + $(this).val());
                        gampsend(RGBLED_DEVICE_CHANNEL, "aw(" + RGBLED_GREEN_PIN + "," + $(this).val() + ");");
                    });

                    $("#rgbled-input-blue").on("change", function () { //was on change mousemove
                        console.log("rgbled: Blue:" + $(this).val());
                        gampsend(RGBLED_DEVICE_CHANNEL, "aw(" + RGBLED_BLUE_PIN + "," + $(this).val() + ");");
                    });

                </script>


            </body>
        </html>

        <?php
    }

}
