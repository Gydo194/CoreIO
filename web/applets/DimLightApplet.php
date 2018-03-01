<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DimLightApplet
 *
 * @author gydo194
 */
class DimLightApplet {

    //put your code here


    public static function render(DimLight $dl) {

        $id = $dl->getId();
        $initialValue = $dl->getValue();
        ?>
        <!-- DIMLIGHT APPLET CODE -->



        <style>



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
        </style>




        <div class="modal fade" id="dimlight_<?php echo $id; ?>_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dimlight_<?php echo $id; ?>_modalLabel">Customize</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <!-- red slider -->
                            <div class="row justify-content-center">

                                <input type="range" id="dimlight_value_<?php echo $id; ?>" class="dimlight-slider" min="0" max="255" value="<?php echo $initialValue; ?>" >

                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <span id="dimlight_<?php echo $id; ?>_status_text"></span>
                        <button  class="btn btn-success" id="dimlight_<?php echo $id; ?>_on">On</button>
                        <button  class="btn btn-danger" id="dimlight_<?php echo $id; ?>_off">Off</button>
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
                    Lamp
                </div>
                <div class="card-body">
                    <h5 class="card-title">Dimmable LED light</h5>
                    <p class="card-text">Customize Dimmable Light</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#dimlight_<?php echo $id; ?>_modal">Configure &#5125;</a>
                </div>
            </div>
        </div>


        <script>


            function dimlight_<?php echo $id; ?>_buildXHR() {
                var x = new XMLHttpRequest();
                x.open("POST", "", true);
                x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                return x;
            }



            function dimlight_<?php echo $id; ?>_success() {
                $("#dimlight_<?php echo $id; ?>_status_text").html("<font color=\"green\">Success</font>");
                setTimeout(dimlight_<?php echo $id; ?>_reset, 2000);
                ;

            }


            function dimlight_<?php echo $id; ?>_failure() {
                $("#dimlight_<?php echo $id; ?>_status_text").html("<font color=\"red\">Failed</font>");
                setTimeout(dimlight_<?php echo $id; ?>_reset, 2000)
            }


            function dimlight_<?php echo $id; ?>_reset() {
                $("#dimlight_<?php echo $id; ?>_status_text").html("");
            }



            //poll the server for new values
            function dimlight_<?php echo $id; ?>_poll() {
                var x = dimlight_<?php echo $id; ?>_buildXHR();

                x.onload = function () {
                    //parse JSON and set values accordingly
                    try {
                        var json = JSON.parse(this.responseText);
                        if (true === json["success"]) {
                            //console.log("dimlight poll success");
                            $("#dimlight_value_<?php echo $id; ?>").val(json["value"]);
                        } else {
                            //console.error("dimlight poll failed");
                        }
                    } catch (err) {
                        console.error("caught error parsing JSON");
                        console.log("Response was:" + this.responseText)
                    }
                };

                x.send("p=getDimlightValueById&dimlightid=<?php echo $id; ?>");

            }














            function dimlight_<?php echo $id; ?>_update() {

                console.log("Dimlight update called");

                var val = 0;

                value = $("#dimlight_value_<?php echo $id; ?>").val();
                //console.log("DimLight: value = " + val);

                var x = dimlight_<?php echo $id; ?>_buildXHR();
                x.onload = function () {


                    if (4 === this.readyState) {

                        try {
                            var res = JSON.parse(this.responseText);
                            if (true === res["success"]) {
                                //console.log("dimlight update: succes");

                                dimlight_<?php echo $id; ?>_success();
                            } else {
                                //console.log("dimlight update: failed");

                                dimlight_<?php echo $id; ?>_failure();
                            }
                        } catch (err) {
                            console.log("dimlight update: json parse failed");
                            console.log("erronous response was: '" + this.responseText + "'.");

                        }
                    }
                }
                x.send("p=updateDimLight&&dimlightid=<?php echo $id; ?>&value=" + value);

            }









            //INPUT scripts


            $("#dimlight_<?php echo $id; ?>_on").on("click", function () {
                console.log("turning on");
                $("#dimlight_value_<?php echo $id; ?>").val(255);
                dimlight_<?php echo $id; ?>_update();
            });

            $("#dimlight_<?php echo $id; ?>_off").on("click", function () {
                console.log("turning off");
                $("#dimlight_value_<?php echo $id; ?>").val(0);
                dimlight_<?php echo $id; ?>_update();
            });




            $("#dimlight_value_<?php echo $id; ?>").on("change", function () {
                dimlight_<?php echo $id; ?>_update();


            });


            //start the dimlight update timer
            var dimlight_<?php echo $id; ?>_timer = setInterval(dimlight_<?php echo $id; ?>_poll, 2000);
            //console.log("dimlight timer:"+dimlight_<?php echo $id; ?>_timer);



        </script>





        <!-- END DIMLIGHT APPLET -->
        <?php
    }

}
