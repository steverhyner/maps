<?php
require_once('../../require/pdoConnect.php');
$out='';
/*if(isset($_GET('adddress'))){
$address=$_GET('adddress');
$out=$address;
}
*/

?>
<!DOCTYPE html>
<html>
  <head>
    <title>PlaceID finder</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="maps.css">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&signed_in=true"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>-->

    <script>
// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected.

function initialize() {
  var mapOptions = {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    marker.setVisible(true);

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
        'Place ID: ' + place.place_id + '<br>' +
        place.formatted_address);
    infowindow.open(map, marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
	 <script>
var chicago = new google.maps.LatLng(41.850033, -87.6500523);
var anchorage = new google.maps.LatLng(61.2180556, -149.9002778);
var mexico = new google.maps.LatLng(19.4270499, -99.1275711);
var equator = new google.maps.LatLng(0,0);
var london = new google.maps.LatLng(51.5001524, -0.1262362);
var johannesburg = new google.maps.LatLng(-26.201452, 28.045488);
var kinshasa = new google.maps.LatLng(-4.325, 15.322222);
var sydney = new google.maps.LatLng( -33.867139, 151.207114);

var locationArray = [chicago,anchorage,mexico,equator,london,johannesburg,kinshasa,sydney];
var locationNameArray = ['Chicago','Anchorage','Mexico City','The Equator','London','Johannesburg','Kinshasa','Sydney'];

// Note: this value is exact as the map projects a full 360 degrees of longitude
var GALL_PETERS_RANGE_X = 800;

// Note: this value is inexact as the map is cut off at ~ +/- 83 degrees.
// However, the polar regions produce very little increase in Y range, so
// we will use the tile size.
var GALL_PETERS_RANGE_Y = 510;

function degreesToRadians(deg) {
  return deg * (Math.PI / 180);
}

function radiansToDegrees(rad) {
  return rad / (Math.PI / 180);
}

/**
 * @constructor
 * @implements {google.maps.Projection}
 */
function GallPetersProjection() {

  // Using the base map tile, denote the lat/lon of the equatorial origin.
  this.worldOrigin_ = new google.maps.Point(GALL_PETERS_RANGE_X * 400 / 800,
      GALL_PETERS_RANGE_Y / 2);

  // This projection has equidistant meridians, so each longitude degree is a linear
  // mapping.
  this.worldCoordinatePerLonDegree_ = GALL_PETERS_RANGE_X / 360;

  // This constant merely reflects that latitudes vary from +90 to -90 degrees.
  this.worldCoordinateLatRange = GALL_PETERS_RANGE_Y / 2;
};

GallPetersProjection.prototype.fromLatLngToPoint = function(latLng) {

  var origin = this.worldOrigin_;
  var x = origin.x + this.worldCoordinatePerLonDegree_ * latLng.lng();

  // Note that latitude is measured from the world coordinate origin
  // at the top left of the map.
  var latRadians = degreesToRadians(latLng.lat());
  var y = origin.y - this.worldCoordinateLatRange * Math.sin(latRadians);

  return new google.maps.Point(x, y);
};

GallPetersProjection.prototype.fromPointToLatLng = function(point, noWrap) {

  var y = point.y;
  var x = point.x;

  if (y < 0) {
    y = 0;
  }
  if (y >= GALL_PETERS_RANGE_Y) {
    y = GALL_PETERS_RANGE_Y;
  }

  var origin = this.worldOrigin_;
  var lng = (x - origin.x) / this.worldCoordinatePerLonDegree_;
  var latRadians = Math.asin((origin.y - y) / this.worldCoordinateLatRange);
  var lat = radiansToDegrees(latRadians);
  return new google.maps.LatLng(lat, lng, noWrap);
};

function initialize() {

  var gallPetersMap;

  var gallPetersMapType = new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom) {
      var numTiles = 1 << zoom;

      // Don't wrap tiles vertically.
      if (coord.y < 0 || coord.y >= numTiles) {
        return null;
      }

      // Wrap tiles horizontally.
      var x = ((coord.x % numTiles) + numTiles) % numTiles;

      // For simplicity, we use a tileset consisting of 1 tile at zoom level 0
      // and 4 tiles at zoom level 1. Note that we set the base URL to a
      // relative directory.
      var baseURL = 'images/';
      baseURL += 'gall-peters_' + zoom + '_' + x + '_' + coord.y + '.png';
      return baseURL;
    },
    tileSize: new google.maps.Size(800, 512),
    isPng: true,
    minZoom: 0,
    maxZoom: 1,
    name: 'Gall-Peters'
  });

  gallPetersMapType.projection = new GallPetersProjection();

  var mapOptions = {
    zoom: 0,
    center: new google.maps.LatLng(0,0),
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'gallPetersMap']
    }
  };
  gallPetersMap = new google.maps.Map(document.getElementById('map-canvas2'),
      mapOptions);

  gallPetersMap.mapTypes.set('gallPetersMap', gallPetersMapType);
  gallPetersMap.setMapTypeId('gallPetersMap');

  var coord;
  for (coord in locationArray) {
    new google.maps.Marker({
      position: locationArray[coord],
      map: gallPetersMap,
      title: locationNameArray[coord]
    });
  }

  google.maps.event.addListener(gallPetersMap, 'click', function(event) {
    alert('Point.X.Y: ' + event.latLng);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
  </head>
  <body>
  <div class='container'>
  <header>
<h1>Restaurant Check-in Club</h1>
  
 <a href="/webProgramming/index.php"><img src="images/rhyner_logotype.png" alt='steve logo'></a>
 
 
 <nav id="horizontal">
		 <ul>
		   
		<li><a href="#">#</a> 
			<ul>
				 <li><a href="#">#</a></li>
				 <li><a href="#">#</a></li>
			</ul>
			 
		</li>
		<li><a href="#">#</a> 
			<ul>
				 <li><a href="#"></a></li>
				 
			</ul>
			 
		</li>
		
         <li><a href="#">#</a> 
			<ul>
				 <li><a href="#">#</a></li>
			</ul>
			 
		</li>
		<li><a href="#">#</a> 
			<ul>
				 <li><a href="#"></a></li>
			</ul>
			 
		</li>
		<li><a href="#">#</a> 
			<ul>
				 <li><a href="#">#</a></li>
			</ul>
			 
		</li>
		<li><a href="#">#</a> 
			<ul>
				 <li><a href="#">#</a></li>
			</ul>
			 
		</li>	<li><a href="#">#</a> 
			<ul>
				 <li><a href="#">#</a></li>
				 
			</ul>
			 
		</li>
		
		 </ul>
		
	  <p class="clearfix"></p>
	</nav>
	 
     
   
 

</header>
<div id="main">
<div class='left'>
	<form method ='GET'action='<?php echo $_SERVER['PHP_SELF'] ?>'>
		<h2>must be logged in to upload a new location to your personal map</h2>
		<input id="pac-input" class="controls" type="text" name='address'
			placeholder="Enter a location">
		<div id="map-canvas"></div>
		
		<textarea name='info' cols='20' rows='10'>comment</textarea>
		<input type='file' name='upload'>
		<input type='submit' value='upload address'>

		<?php
		echo$out?>
	</form>
</div><!--left-->
<div class='right'>
<h2>must be logged in to see your personal map</h2>
   <div id="map-canvas2"></div>
</div><!--right-->
	<p class="clearfix"></p>
</div><!--main-->	


</div><!--container-->
  </body>
</html>