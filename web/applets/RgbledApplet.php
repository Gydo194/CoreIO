<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RgbledApplet
 *
 * @author gydo194
 */
defined("RGBLED_PERMISSION_NAME") || define("RGBLED_PERMISSION_NAME", "main"); //just use the main permission

class RgbledApplet {

    public function invoke() {
        if (!UserController::getPermission(RGBLED_PERMISSION_NAME)) {
            throw new AccessViolationException();
        }
        $rgbled_id = uniqid();
        ?>
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



        <script>
            function gampsend(channel, message, onsuccess, onerror) {
                var gcmd = "bsend(CHANNEL,MESSAGE);";
                var bmsg = btoa(message);

               // console.log("gampsend: message:" + bmsg);

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
                    //console.log("response='" + this.response + "'");
                    if (this.readyState == 4) {
                        // console.log("OK");

                        var json = JSON.parse(this.responseText);
                        if (json["success"] == true) {
                            console.log("GAMP command succeeded");
                             onsuccess(this);
                        } else {
                            console.log("GAMP command failed (success=false)");
                            onerror(this);
                        }
                       

                    } else {
                        return false;
                    }
                }

                x.onerror = onerror;

                x.send("p=send&msg=" + msg);


            }
        </script>





        <!-- RGBLED modal defenition -->
        <div class="modal fade" id="rgbled_<?php echo $rgbled_id; ?>_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rgbled_<?php echo $rgbled_id; ?>_modalLabel">Customize</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <!-- red slider -->
                            <div class="row justify-content-center">


                                <input type="range" id="rgbled-input-red<?php echo $rgbled_id; ?>" class="rgbled-slider-red" min="0" max="255" value="0" >

                            </div>

                            <!-- green slider -->
                            <div class="row justify-content-center">

                                <input type="range" id="rgbled-input-green<?php echo $rgbled_id; ?>" class="rgbled-slider-green" min="0" max="255" value="0" >


                            </div>

                            <!-- blue slider -->
                            <div class="row justify-content-center">

                                <input type="range" id="rgbled-input-blue<?php echo $rgbled_id; ?>" class="rgbled-slider-blue" min="0" max="255" value="0" >


                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <span id="rgbled_<?php echo $rgbled_id; ?>_status_text"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary" onclick="alert('applied null');">Apply</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

        <!-- applet container defenition -->

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-3">
                <div class="card-header" style="background: linear-gradient(#D8D8D8,#BDBDBD);">
                    RGB led strip
                </div>
                <div class="card-body">
                    <h5 class="card-title">RGB led</h5>
                    <p class="card-text">Customize RGB led</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#rgbled_<?php echo $rgbled_id; ?>_modal">Configure &#5125;</a>
                </div>
            </div>
        </div>


        <!-- end applet container defenition -->


        <!-- onclick scripts -->


        <script>
            //RGB range slider jQuery events
            const RGBLED_<?php echo $rgbled_id; ?>_DEVICE_CHANNEL = "1";
            const RGBLED_<?php echo $rgbled_id; ?>_RED_PIN = "9";
            const RGBLED_<?php echo $rgbled_id; ?>_GREEN_PIN = "6";
            const RGBLED_<?php echo $rgbled_id; ?>_BLUE_PIN = "5";

            function rgbled_<?php echo $rgbled_id; ?>_reset() {
                console.log("RGBLED_RESET");
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("");

            }

            function rgbled_<?php echo $rgbled_id; ?>_success() {
                console.log("RGBLED_SUCCESS");
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("<font color=\"green\">Success</font>");
                setTimeout(rgbled_<?php echo $rgbled_id; ?>_reset,2000);
            }

            function rgbled_<?php echo $rgbled_id; ?>_failure() {
                console.log("RGBLED_FAILURE");
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("<font color=\"red\">Failed</font>");
                setTimeout(rgbled_<?php echo $rgbled_id; ?>_reset,2000);
            }


            $("#rgbled-input-red<?php echo $rgbled_id; ?>").on("change", function () { //was on change mousemove
                console.log("rgbled: Red:" + $(this).val());
                gampsend(RGBLED_<?php echo $rgbled_id; ?>_DEVICE_CHANNEL, "aw(" + RGBLED_<?php echo $rgbled_id; ?>_RED_PIN + "," + $(this).val() + ");",rgbled_<?php echo $rgbled_id; ?>_success,rgbled_<?php echo $rgbled_id; ?>_failure);
                //alert($(this).val());
            });

            $("#rgbled-input-green<?php echo $rgbled_id; ?>").on("change", function () { //was on change mousemove
                console.log("rgbled: Green:" + $(this).val());
                gampsend(RGBLED_<?php echo $rgbled_id; ?>_DEVICE_CHANNEL, "aw(" + RGBLED_<?php echo $rgbled_id; ?>_GREEN_PIN + "," + $(this).val() + ");",rgbled_<?php echo $rgbled_id; ?>_success,rgbled_<?php echo $rgbled_id; ?>_failure);
            });

            $("#rgbled-input-blue<?php echo $rgbled_id; ?>").on("change", function () { //was on change mousemove
                console.log("rgbled: Blue:" + $(this).val());
                gampsend(RGBLED_<?php echo $rgbled_id; ?>_DEVICE_CHANNEL, "aw(" + RGBLED_<?php echo $rgbled_id; ?>_BLUE_PIN + "," + $(this).val() + ");",rgbled_<?php echo $rgbled_id; ?>_success,rgbled_<?php echo $rgbled_id; ?>_failure);
            });

        </script>

        <!-- end onclick scripts -->

        <?php
    }

}
