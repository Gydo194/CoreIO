<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginPage
 *
 * @author gydo194
 */
class LoginPage{

    //put your code here
    /*
      public function invoke() {
      echo "Login Page";
      }
     */
    public function invoke() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="robots" content="noindex, nofollow">

                <title><?php echo APP_NAME . " " . APP_VERSION; ?></title>
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
                <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

                <link rel="stylesheet" href="web/res/bootstrap.min.css" />
                <script src="web/res/jquery-3.2.1.slim.min.js"></script>
                <script src="web/res/popper.min.js"></script>
                <script src="web/res/bootstrap.min.js"></script>



                <style type="text/css">
                    h2   {color:white}
                    p    {color:white}



                    body {
                        height: 100%;
                        background-image: url("web/res/img/login.jpg");
                    }


                    .card-container.card {
                        /* width: 350px; */
                        padding: 40px 40px;
                    }

                    .btn {
                        font-weight: 700;
                        height: 36px;
                        -moz-user-select: none;
                        -webkit-user-select: none;
                        user-select: none;
                        cursor: default;
                    }

                    /*
                     * Card component
                     */
                    .card {
                        background-color: #F7F7F7;
                        /* just in case there no content*/
                        padding: 20px 25px 30px;
                        margin: 0 auto 25px;
                        margin-top: 50px;
                        /* shadows and rounded borders */
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 2px;
                        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    }

                    .profile-img-card {
                        width: 96px;
                        height: 96px;
                        margin: 0 auto 10px;
                        display: block;
                        -moz-border-radius: 50%;
                        -webkit-border-radius: 50%;
                        border-radius: 50%;
                    }

                    /*
                     * Form styles
                     */
                    .profile-name-card {
                        font-size: 16px;
                        font-weight: bold;
                        text-align: center;
                        margin: 10px 0 0;
                        min-height: 1em;
                    }

                    .reauth-email {
                        display: block;
                        color: #404040;
                        line-height: 2;
                        margin-bottom: 10px;
                        font-size: 14px;
                        text-align: center;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        -moz-box-sizing: border-box;
                        -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                    }

                    .form-signin #inputEmail,
                    .form-signin #inputPassword {
                        direction: ltr;
                        height: 44px;
                        font-size: 16px;
                    }

                    .form-signin input[type=email],
                    .form-signin input[type=password],
                    .form-signin input[type=text],
                    .form-signin button {
                        width: 100%;
                        display: block;
                        margin-bottom: 10px;
                        z-index: 1;
                        position: relative;
                        -moz-box-sizing: border-box;
                        -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                    }

                    .form-signin .form-control:focus {
                        border-color: rgb(104, 145, 162);
                        outline: 0;
                        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
                        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
                    }

                    .btn.btn-signin {
                        /*background-color: #4d90fe; */
                        /*background-color: rgb(104, 145, 162);
                        / background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
                        padding: 0px;
                        font-weight: 700;
                        font-size: 14px;
                        height: 36px;
                        -moz-border-radius: 3px;
                        -webkit-border-radius: 3px;
                        border-radius: 3px;
                        border: none;
                        -o-transition: all 0.218s;
                        -moz-transition: all 0.218s;
                        -webkit-transition: all 0.218s;
                        transition: all 0.218s;
                    }


                    .forgot-password {
                        color: rgb(104, 145, 162);
                    }

                    .forgot-password:hover,
                    .forgot-password:active,
                    .forgot-password:focus{
                        color: rgb(12, 97, 33);
                    }
                </style>


            </head>
            <body>


                <div class="container">
                    <div class="card card-container col-sm-12 col-md-8 col-lg-4">
                        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                        <img id="profile-img" class="profile-img-card" src="web/res/img/user.png" />
                        <p id="profile-name" class="profile-name-card"></p>
                        <!--  <span><b>Welcome to <?php echo APP_NAME; ?> v2.0.1 beta</b></span> -->
                        <span class="card-text text-sm-left text-md-center text-lg-center">Please sign in</span>
                        <div class="form-signin" method="POST">
                            <span id="reauth-email" class="reauth-email"></span>
                            <input type="text" id="loginuser" class="form-control" placeholder="Username" name="user" required autofocus>                   
                            <input type="password" id="loginpass" class="form-control" placeholder="Password" name="pass" required>

                            <div class="input-group-append">
                                <button class="btn btn-lg btn-success btn-block btn-signin" id="loginsubmit">Log In</button>
                                <!-- <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Log In</button> -->
                            </div>
                        </div><!-- /form -->

                    </div><!-- /card-container -->
                </div><!-- /container -->

            </body>


            <script>

                function handleLoginSuccess() {
                    //alert("login succeeded");
                    document.location.reload();
                }

                function handleLoginFailure() {
                    alert("login failed");
                }

                function handleError() {
                    alert("login error");
                }


                function login(checkOnly = false) {
                    var x = new XMLHttpRequest();

                    var url = "?p=usercheck";
                    if (checkOnly) {
                        url += "&nosess";
                    }
                    console.log("login(): url:" + url);


                    x.open("POST", url);
        //                    x.open("POST", "?p=test");
                    x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    x.onload = function () {
                        console.log("response:'" + this.responseText + "'end response");
                        if (this.readyState == 4) {
                            try {
                                var json = JSON.parse(this.responseText);

                            } catch (err) {
                                console.error("Login: Invalid JSON response received");
                                handleError();
                            }
                            console.log("Login attempt:" + json["success"]);

                            if (json["success"]) {
                                handleLoginSuccess();
                            } else {
                                handleLoginFailure();
                            }

                        }
                    }

                    var user = $("#loginuser").val();
                    var pass = $("#loginpass").val();
                    var params = "user=" + user + "&pass=" + pass;
                    console.log("parameters:" + params);
                    x.send(params);
                }



                $("#loginsubmit").on("click", function () {
                    login();

                });

                $("#loginpass").keyup(function (e) {
                    if (e.keyCode == 13) { //on enter press
                        login();
                    }
                })

            </script>

        </html>
        <?php
    }

}
