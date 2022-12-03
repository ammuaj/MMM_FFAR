<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/11.0.2.bootstrap-slider.css"/>
    <link rel="stylesheet" href="vendor/custom_style.css"/>
    <script src="bootstrap/jquery/3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery/11.0.2.bootstrap-slider.min.js"></script>
</head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html"/>

<link rel="stylesheet" href="./vendor/custom_style.css">
<!--script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script-->
<script src="leaflet13.js"></script>

<!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"-->
<!--      integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="-->
<!--      crossorigin=""/>-->
<!--&lt;!&ndash; Make sure you put this AFTER Leaflet's CSS &ndash;&gt;-->
<!--<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"-->
<!--        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="-->
<!--        crossorigin=""></script> -->

<!--script src="https://unpkg.com/leaflet@0.7.7/dist/leaflet.js"></script-->
<script src="vendor/geotiff.js"></script>
<script src="vendor/plotty.js"></script>

<script src="leaflet-geotiff.js"></script>
<script src="map-controller.js"></script>
<script src="slider-control.js"></script>

<div class="container-fluid">
    <div id="leftmenu" style="width:15%;float:left;">

        <form>

            <select id="selectColorScale">
                <option selected="" value="rainbow">Rainbow</option>
                <option value="viridis">Viridis</option>
                <option value="greys">Greys</option>
                <option value="hsv">HSV</option>
                <option value="earth">Earth</option>
                <option value="magma">Magma</option>
                <option value="plasma">Plasma</option>
                <option value="blackbody">Blackbody</option>
                <option value="greys">Greys</option>
                <option value="greens">Greens</option>
            </select>

            <div class="form-group row">

                <label for="splitMap" class="col-sm-7 col-form-label"> Split Maps?</label>
                <div class="col-sm-4">
                    <select class="form-control form-control-sm" id="splitMap">
                        <option selected="" value="1">One</option>
                        <option value="2">Two</option>
                        <option value="4">Four</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="tif_alpha" class="col-sm-4 col-form-label">Opacity</label>
                <div class=" col-sm-5">
                    <input class=" form-range" type="range" name="weight" id="tif_alpha" value="80" min="0" max="255">
                </div>
                <div class=" col-sm-3">
                    <output id="tif_alpha_disp"></output>
                    </duv>
                </div>

                <!--Clip the image using a polygon <button type="button" onclick="toggleClip()">Toggle</button></p> -->
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                    <hr>
                </div>
                <div class="col-sm-4">
                    <span class="font-weight-bold"> MAP-1 </span>

                </div>
                <div class="col-sm-4">
                    <hr>
                </div>

            </div>

            <div class="form-group row">
                <label for="siteSelect" class="col-sm-2">Site:</label>
                <div class="col-sm-7">
                    <select id="siteSelect">
                        <option selected="" value="site-ardec">CSU-ARDEC</option>
                        <option value="site-cortez">Cortez</option>
                        <option value="site-idalia">Idalia</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <a id="siteLink" href="https://coagmet.colostate.edu/station/ftc03_main.html" target="_blank">
                        visit</a>
                </div>
            </div>

            <div class="form-group row">
                <label for="siteSelect" class="col-sm-3">Date:</label>
                <div class="col-sm-9">

            <select id="selectDate">
            </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="siteSelect" class="col-sm-3">Band:</label>
                <div class="col-sm-9">

            <select id="bandSelect">
                <option selected="" value="et">ET</option>
                <option value="lst">LST</option>
                <option value="ndvi">NDVI</option>
                <option value="openet">OPENET</option>
            </select>
                </div>
            </div>
            <img id="colorScaleImage" src=""/>

            <output style="float: left; margin-top:-10px;" id="range_ET_disp_colorascale_min"></output>
            <output style="float: right; margin-top:-10px;margin-right:15px;"
                    id="range_ET_disp_colorascale_max"></output>

            <label for="range_ET">Min: </label>
            <input class="slider-width" type="range" name="weight" id="range_ET" value="1" min="1" max="100">
            <output id="range_ET_disp"></output>

            </br>
            <label for="range_ET">Max: </label>
            <input class="slider-width" type="range" name="weight" id="range_ET_Max" value="1" min="1" max="100">
            <output id="range_ET_disp_Max"></output>
        </form>

    </div>


    <div id="mapid" style="width:85%; height:100%;float:left;">

    </div>

    <div id="secondMapid" style="width:42%; height:100%;float:right; visibility:hidden; ">
    </div>

    <div id="thirdMapid" style="width:42%; height:48%;float:left; margin-top:20px; visibility:hidden; ">
    </div>

    <div id="fourthMapid" style="width:42%; height:48%;float:right; margin-top:20px; visibility:hidden; ">
    </div>

</div>

<script src="actions.js">

</script>