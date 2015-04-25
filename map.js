  var map;
  var input;
  var lat;
  var lon;
  var placed = {};



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
   input = (document.getElementById('search'));//this is the search box

   
  var autocomplete = new google.maps.places.Autocomplete(input);// this helps user auto complete in  search box to find location
  autocomplete.bindTo('bounds', map);// set the bounds on creation of the autoComplete object

 // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);// position of autoComplete search box
  
    
    




  
  
  
  var infowindow = new google.maps.InfoWindow();//create a info window for locations
  var marker = new google.maps.Marker({// put pin on current location(centercoords)
  position: centerCoords,
    map: map,
	
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });//open info window if marker is clicked
  
  google.maps.event.addListener(autocomplete, 'place_changed', function() {// if a new location is selected from autoComplete do the following
    infowindow.close();//close info window
    var place = autocomplete.getPlace();
	//	alert(place.formatted_address);
	//alert(place.place_id);
	id=place.place_id;
	
	//alert(id +" :is the place_id")
	//alert(place.name);
	//alert(place.geometry.location);
	local=place.geometry.location;
     placed[0]={ "id": id,"local": local};//push place info into array for later use
	//alert(local +" :is the local")
	//alert(place.geometry.viewport);
	 
    if (!place.geometry) {// dont do anything if you cant find location?
      return;
    }

    if (place.geometry.viewport) {// if you can find location recenter map to that location
	console.log(place.formatted_address);
	console.log(place.url);
	console.log(place.geometry.location);
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

   
  });
	 
	  
 }//doit makemap
  function pinLocation(){ // Set   new marker at the position of the new place ID and location
  
	  id=placed[0].id;
	  local=placed[0].local;
	  alert(local);
	   var marker = new google.maps.Marker({// put pin on current location(centercoords)
  position: local,
    map: map,
	
  });
	  };
google.maps.event.addDomListener(window, 'load', init);//when window loads go to init function and get current location