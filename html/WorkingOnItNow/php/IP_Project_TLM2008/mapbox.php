<!DOCTYPE html>
<?php include 'header.inc'?>
<html>
<head>
<meta charset="utf-8" />
<title>MapBox</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css" rel="stylesheet" />
<style>
	
</style>
	

</head>
<body>
    <!-- show coordinates in webpage for developing/debugging purposes -->
    <style type="text/css">
      #map {
        margin-top : 50px;
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        .displayhelp {
        display: block;
        position: relative;
        //margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
        }
        #info{
        display: block;
        position: relative;
        //margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
        
    </style>

    <!-- Geocoder API -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
    <link
        rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css"
        type="text/css"
    />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    

    <!-- Set map -->
    <div id="map1"></div>
    <pre id="info"></pre>
    <div class="displayhelp">
        Select the location you want to report an incident
    </div>

    <!-- Mapbox Script -->
    <script>
	    mapboxgl.accessToken = 'pk.eyJ1IjoiZnVndWVtYXN0ZXIiLCJhIjoiY2s3aG45dDQ0MGM4YzNmbGxiM3JqaXBlaCJ9.UXkXKi2Cq8veJTtkUYq8wg';
        
        // Set scorlling boundaries to Singapore Map
        var bounds = [
            [103.56480861951604, 1.154021455003118], // Southwest coordinates[lng, lat]
            [104.13164125586022, 1.518896810581026] // Northeast coordinates[lng, lat]
        ];

        // Set map 
        var map = new mapboxgl.Map({
            container: 'map1', // container id
            style: 'mapbox://styles/fuguemaster/ck7ho8svq54td1ip8d8w18vmt', // stylesheet location
            center: [103.8198, 1.3521], // starting position [lng, lat], Singapore
            zoom: 14, // starting zoom
            maxBounds: bounds // Sets bounds as max
        });
    

        // create marker on click event
        map.on('click', function(e) {  
            document.getElementById('info').innerHTML =
            // e.point is the x, y coordinates of the mousemove event relative
            // to the top-left corner of the map
            JSON.stringify(e.point) +
            '<br />' +
            // e.lngLat is the longitude, latitude geographical position of the event
            JSON.stringify(e.lngLat.wrap());

            // Marker settings
            var marker = new mapboxgl.Marker({
            draggable: false
            })

            .setLngLat(e.lngLat)
            .addTo(map);
        });

        // Geocoder function
        map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        }));

    
        

    </script>

</body>

</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
