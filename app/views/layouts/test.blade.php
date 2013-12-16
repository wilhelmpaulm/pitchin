
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>Jumbotron Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        {{HTML::style("css/bootstrap.min.css")}}
        {{HTML::script("js/jquery.js")}}
        {{HTML::script("js/bootstrap.min.js")}}
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }

        </style>
        <style>
            #map-canvas {
                min-height: 300px;
            }

            .col-md-8{

                /*                min-height: 300px;
                                height: 300px;*/
            }

            #panel {
                position: absolute;
                top: 5px;
                left: 50%;
                margin-left: -180px;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>

// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.
var map;
var markers = [];

function initialize() {
//  var haightAshbury = new google.maps.LatLng(37.7699298, -122.4469157);
//  var mapOptions = {
//    zoom: 12,
//    center: haightAshbury,
//    mapTypeId: google.maps.MapTypeId.TERRAIN
//  };


    var myLatlng = new google.maps.LatLng(14.578129, 120.993112);
    var mapOptions = {
        zoom: 15,
        center: myLatlng
    };
//  map = new google.maps.Map(document.getElementById('map-canvas'),
//      mapOptions);

    map = new google.maps.Map($('#map-canvas')[0], mapOptions);
    var image = new google.maps.MarkerImage(
            "{{URL::asset("images / me.jpg")}}", //url
            new google.maps.Size(20, 20), //size
            new google.maps.Point(0, 0), //origin
            new google.maps.Point(0, 0) //anchor 
            );

    var contentString = '<div id="content" style="max-width :350px">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading "><span class=""> {{HTML::image("images/me.jpg")}} </span> wilhelmpaulm</h1><hr>' +
            '<div id="bodyContent">' +
            '<p><b>Wilhelm Paul </b>, also referred to as <b>wilhelmpaulm</b>, is a magical ' +
            'unicorn/ zombie/ wizard/ developer who loves to tinker ' +
            'with various programming languages. He\'s usually at home sipping coffe with cinnamon and makes fart noises with his underpits ' +
            'He loves strawberry ice cream and dancing randomly.</p>' +
            '<p>Website: <a href="http://wilhelmpaulm.com">' +
            'wilhelmpaulm.com</a> ' +
            '<p>Twitter: <a href="http://twitter.com/wilhelmpaulm">' +
            '@wilhelmpaulm</a> ' +
            '.</p>' +
            '</div>' +
            '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
//        icon: image,
        title: 'Wilhelm Paul Martinez'
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });

    google.maps.event.addListener(map, 'click', function(event) {
        addMarker(event.latLng);
    });
}

function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setAllMap(map);
}


// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

$(function() {

    $('#filter').change(function() {
        if ($(this).is(':checked')) {
            showMarkers();
        } else {
            clearMarkers();
        }
    });


});
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.trigger(map, 'resize');



        </script>
        <!--<link href="../../dist/css/bootstrap.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <!--<link href="jumbotron.css" rel="stylesheet">-->

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div class="navbar-collapse collapse">

                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
            </div>
        </div>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-8">
                    <div id="panel">
                        <input  type="checkbox" id="filter"> Show/hide
                        <input onclick="clearMarkers();" type=button value="Hide Markers" checked>
                        <input onclick="showMarkers();" type=button value="Show All Markers">
                        <input onclick="deleteMarkers();" type=button value="Delete Markers">
                    </div>
                    <div id="map-canvas"></div>

                </div>

                <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; Company 2013</p>
            </footer>
        </div> <!-- /container -->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

<!--        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>-->
    </body>
</html>
