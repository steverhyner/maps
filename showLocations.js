var map;
  var input;
  var lat;
  var lon;
  var placed = {};
   var place;
var id;
var local;
 
	 
	 

 

function init() { //find current position then go to function doit and take location info along
  navigator.geolocation.getCurrentPosition(doit);
  }
	 
function doit(location){// create variables from current location then loads map to current position
	  console.log(location);
	 // alert(location.coords.latitude + ', ' + location.coords.longitude);
	  currentCoords=(location.coords.latitude + ', '+ location.coords.longitude);
	 // alert(currentCoords);
	  lat=location.coords.latitude;
      lon=location.coords.longitude;
	  centerCoords=new google.maps.LatLng(lat,lon)
	  
  var mapdiv=document.getElementById('map-canvas');// we will put map in map-canvas div
  
  var mapOptions = {
    zoom: 12,
	center: centerCoords
  };//minimum map option requirements
   map = new google.maps.Map(mapdiv,mapOptions);// put the new map on the page using the options
   

   
  

  
  
    
    




  
  
  
  var infowindow = new google.maps.InfoWindow();//create a info window for locations
  var marker = new google.maps.Marker({// put pin on current location(centercoords)
  position: centerCoords,
    map: map,
	
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });//open info window if marker is clicked
  
  
	 
	  
 }//doit makemap
 
google.maps.event.addDomListener(window, 'load', init);//when window loads go to init function and get current location