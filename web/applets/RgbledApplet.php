<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RgbledApplet_
 *
 * @author gydo194
 */
class RgbledApplet_ {

    public static function renderApplet(RgbLed $led) {
        $red = $led->getRed();
        $green = $led->getGreen();
        $blue = $led->getBlue();

        $redPin = $led->getRedPin();
        $greenPin = $led->getGreenPin();
        $bluePin = $led->getBluePin();

        $rgbled_id = $led->getId();
        ?>


        <style>
            /*rgbled sliders - red*/
            input[type=range].dimlight-slider {
                -webkit-appearance: none;
                width: 100%;
                margin: 10.8px 0;
            }
            input[type=range].dimlight-slider:focus {
                outline: none;
            }
            input[type=range].dimlight-slider::-webkit-slider-runnable-track {
                width: 100%;
                height: 8.4px;
                cursor: pointer;
                box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                background: #ff0000;
                border-radius: 25px;
                border: 0.2px solid #010101;
            }
            input[type=range].dimlight-slider::-webkit-slider-thumb {
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
            input[type=range].dimlight-slider:focus::-webkit-slider-runnable-track {
                background: #ff1a1a;
            }
            input[type=range].dimlight-slider::-moz-range-track {
                width: 100%;
                height: 8.4px;
                cursor: pointer;
                box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
                background: #ff0000;
                border-radius: 25px;
                border: 0.2px solid #010101;
            }
            input[type=range].dimlight-slider::-moz-range-thumb {
                box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                border: 0.1px solid #000000;
                height: 30px;
                width: 30px;
                border-radius: 50px;
                background: #ffffff;
                cursor: pointer;
            }
            input[type=range].dimlight-slider::-ms-track {
                width: 100%;
                height: 8.4px;
                cursor: pointer;
                background: transparent;
                border-color: transparent;
                color: transparent;
            }
            input[type=range].dimlight-slider::-ms-fill-lower {
                background: #e60000;
                border: 0.2px solid #010101;
                border-radius: 50px;
                box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            }
            input[type=range].dimlight-slider::-ms-fill-upper {
                background: #ff0000;
                border: 0.2px solid #010101;
                border-radius: 50px;
                box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            }
            input[type=range].dimlight-slider::-ms-thumb {
                box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
                border: 0.1px solid #000000;
                height: 30px;
                width: 30px;
                border-radius: 50px;
                background: #ffffff;
                cursor: pointer;
                height: 8.4px;
            }
            input[type=range].dimlight-slider:focus::-ms-fill-lower {
                background: #ff0000;
            }
            input[type=range].dimlight-slider:focus::-ms-fill-upper {
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


                                <input type="range" id="rgbled-input-red<?php echo $rgbled_id; ?>" class="dimlight-slider" min="0" max="255" value="<?php echo $red; ?>" >

                            </div>

                            <!-- green slider -->
                            <div class="row justify-content-center">

                                <input type="range" id="rgbled-input-green<?php echo $rgbled_id; ?>" class="rgbled-slider-green" min="0" max="255" value="<?php echo $green; ?>" >


                            </div>

                            <!-- blue slider -->
                            <div class="row justify-content-center">

                                <input type="range" id="rgbled-input-blue<?php echo $rgbled_id; ?>" class="rgbled-slider-blue" min="0" max="255" value="<?php echo $blue; ?>" >


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






        <script>

            //statis text
            function rgbled_<?php echo $rgbled_id; ?>_success() {
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("<font color=\"green\">Success</font>");
                setTimeout(rgbled_<?php echo $rgbled_id; ?>_reset, 2000);
            }
            function rgbled_<?php echo $rgbled_id; ?>_failure() {
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("<font color=\"red\">Failed</font>");
                setTimeout(rgbled_<?php echo $rgbled_id; ?>_reset, 2000);
            }
            function rgbled_<?php echo $rgbled_id; ?>_reset() {
                $("#rgbled_<?php echo $rgbled_id; ?>_status_text").html("");
            }

            //updating
            function buildXHR() {
                var x = new XMLHttpRequest();
                x.open("POST", "", true);
                x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                return x;
            }


            $("#rgbled-input-red<?php echo $rgbled_id; ?>").on("change", function () {
                var red = $(this).val();
                console.log("rgbled_<?php echo $rgbled_id; ?>: red:" + red);
                var x = buildXHR();
                x.onload = function () {
                    if (4 === this.readyState) {
                        try {
                            var res = JSON.parse(this.responseText);
                            if (true === res["success"]) {
                                console.log("rgbled update: succes");

                                rgbled_<?php echo $rgbled_id; ?>_success();
                            } else {
                                console.log("rgbled update: failed");
                                rgbled_<?php echo $rgbled_id; ?>_failure();
                            }
                        } catch (err) {
                            console.log("rgbled update: json parse failed");
                        }
                    }
                }
                x.send("p=updateRgbledRed&rgbled_id=<?php echo $rgbled_id; ?>&value=" + red);
            });
            
            /*
            $("#rgbled-input-green<?php echo $rgbled_id; ?>").on("change", function () {
                var green = $(this).val();
                console.log("rgbled_<?php echo $rgbled_id; ?>: green:" + green);
                buildXHR().send("p=updateRgbledGreen&rgbled_id=<?php echo $rgbled_id; ?>&value=" + green);
            });
            $("#rgbled-input-blue<?php echo $rgbled_id; ?>").on("change", function () {
                var blue = $(this).val();
                console.log("rgbled_<?php echo $rgbled_id; ?>: blue:" + blue);
                buildXHR().send("p=updateRgbledBlue&rgbled_id=<?php echo $rgbled_id; ?>&value=" + blue);
            });
*/
   
    $("#rgbled-input-green<?php echo $rgbled_id; ?>").on("change", function () {
                var green = $(this).val();
                console.log("rgbled_<?php echo $rgbled_id; ?>: green:" + green);
                var x = buildXHR();
                x.onload = function () {
                    if (4 === this.readyState) {
                        try {
                            var res = JSON.parse(this.responseText);
                            if (true === res["success"]) {
                                console.log("rgbled update: succes");

                                rgbled_<?php echo $rgbled_id; ?>_success();
                            } else {
                                console.log("rgbled update: failed");
                                rgbled_<?php echo $rgbled_id; ?>_failure();
                            }
                        } catch (err) {
                            console.log("rgbled update: json parse failed");
                        }
                    }
                }
                x.send("p=updateRgbledGreen&rgbled_id=<?php echo $rgbled_id; ?>&value=" + green);
            });
            
            
            
             $("#rgbled-input-blue<?php echo $rgbled_id; ?>").on("change", function () {
                var blue = $(this).val();
                console.log("rgbled_<?php echo $rgbled_id; ?>: blue:" + blue);
                var x = buildXHR();
                x.onload = function () {
                    if (4 === this.readyState) {
                        try {
                            var res = JSON.parse(this.responseText);
                            if (true === res["success"]) {
                                console.log("rgbled update: succes");

                                rgbled_<?php echo $rgbled_id; ?>_success();
                            } else {
                                console.log("rgbled update: failed");
                                rgbled_<?php echo $rgbled_id; ?>_failure();
                            }
                        } catch (err) {
                            console.log("rgbled update: json parse failed");
                        }
                    }
                }
                x.send("p=updateRgbledBlue&rgbled_id=<?php echo $rgbled_id; ?>&value=" + blue);
            });
            
            
            
            
            
            
            
            
            


            //polling
            function rgbled_<?php echo $rgbled_id; ?>_poll() {
                var x = buildXHR()
                x.onload = function () {
                    if (this.readyState === 4) {
                        try {
                            var json = JSON.parse(this.responseText);
                            if (true === json["success"]) {
                                $("#rgbled-input-red<?php echo $rgbled_id; ?>").val(json["red"]);
                                $("#rgbled-input-green<?php echo $rgbled_id; ?>").val(json["green"]);
                                $("#rgbled-input-blue<?php echo $rgbled_id; ?>").val(json["blue"]);
                            } else {
                                console.log("rgbled update value: backend reported success false");
                                console.log(json);
                            }
                        } catch (err) {
                            console.error("rgbled_<?php echo $rgbled_id; ?>_update(): JSON parse error");
                        }

                    }
                }
                x.send("p=rgbledGetValues&rgbled_id=<?php echo $rgbled_id; ?>");


            }

            //set the timer
            setInterval(rgbled_<?php echo $rgbled_id; ?>_poll, 2000);


        </script>
        <?php
    }

}
