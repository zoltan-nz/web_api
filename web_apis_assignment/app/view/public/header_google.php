<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>CRAWDESK</title>
            <meta name="description" content="Lecture examples">
            <meta name="author" content="Conor O&amp;Reilly">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- do not touch this one -->
            <link href="lib/bootstrap_v230/css/bootstrap.min.css" rel="stylesheet"/>
            <link href="lib/bootstrap_v230/css/bootstrap-responsive.min.css" rel="stylesheet"/>
            
            <!-- Your styles go in here-->
            <link href="css/styles.css" rel="stylesheet"/>

            <!-- javascripts libraries use by all pages-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <!-- the link below to the CDN links to the latest version of jquery each time BUT
            this is a bad idea 
                1) the caching only works if you specify a version number
                2) deploy with only what you have tested with
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            -->
            <script src="lib/bootstrap_v230/js/bootstrap.min.js"></script>

            <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

            <!-- GOOGLE MAPS -->

            <?php 

                if ( isset($map_app_key) ) 
                { 
                    echo '<script type="text/javascript"
                            src="http://maps.googleapis.com/maps/api/js?key='. $map_app_key
                            .'&sensor=false"></script>';
                }
            ?>

            <script type="text/javascript">

            function initialize() {

                var mapOptions = {
                  center: new google.maps.LatLng(-34.397, 150.644),
                  zoom: 8,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("map_canvas"),
                    mapOptions);

            }

            </script>

            <!-- <script type="text/javascript">
            // Async load

            function loadScript() {
                  var script = document.createElement("script");
                  script.type = "text/javascript";
                  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCe2DEDUJUDytVBoeQ4XLEKgtPERGYXmUA&sensor=TRUE_OR_FALSE&callback=initialize";
                  document.body.appendChild(script);
            }

            </script> -->


        </head>

        <body onload="initialize()">

        <!-- pull in the menu-->
        <?php
          include "menu.php";