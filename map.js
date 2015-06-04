  var map;
  var input;
  var lat;
  var lon;
  var placed = {};
   var place;
var id;
var local;
   
function init() { //find current position then go to function doit and take location info along
 //var $_POST = <?php echo json_encode($_POST); ?>;
	var pos=$_POST["search"];
	 console.log(pos);
	if(pos==null){
	console.log('emptystring');

	
	navigator.geolocation.getCurrentPosition(doit);
	}else{
			var user1Location = pos;
			var geocoder = new google.maps.Geocoder();
			//convert location into longitude and latitude
			geocoder.geocode({
				address: user1Location
			}, function(locResult) {
					console.log(locResult);
					var lat1 = locResult[0].geometry.location.lat();
					var lng1 = locResult[0].geometry.location.lng();
				   console.log(lat1);
				   console.log(lng1);
				
				 centerCoords=new google.maps.LatLng(lat1,lng1)
			  
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
			  
				var infowindow = new google.maps.InfoWindow({
					content:"this is the location you have just uploaded! Go to <a href='/showLocations.php'>your pins</a> or <a href='/history.php'>history table</a> to see your upload info!"
				   
					
				});//create a info window for locations
				var marker = new google.maps.Marker({// put pin on current location(centercoords)
					position: centerCoords,
					map: map,
					
				});
			  
				google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map, marker);
				});//open info window if marker is clicked
				
				  google.maps.event.addListener(map, 'zoom_changed', (function() {
           
                 infowindow.close(map, marker);
                 }));
				 
				 	
	   google.maps.event.addListener(map, 'click', (function() {
           
                infoWindow.close(map, marker);
            }));
				   
			  
				 google.maps.event.addListener(autocomplete, 'place_changed', function() {// if a new location is selected from autoComplete do the following
					 infowindow.close();//close info window
					 place = autocomplete.getPlace();
					 id=place.place_id;
					 local=place.geometry.location;
					 placed[0]={ "id": id,"local": local};//push place info into array for later use
					
					 
					if (!place.geometry) {// dont do anything if you cant find location?
					  return;
					}

					if (place.geometry.viewport) {// if you can find location recenter map to that location
					
					map.fitBounds(place.geometry.viewport);
						  var marker2 = new google.maps.Marker({// put pin on current location(centercoords)
						  position: local,
						  map: map,
					

						 });
					} else {
					  map.setCenter(place.geometry.location);
					  map.setZoom(17);
					}

		   
			    });
			});
				  
		};
		
		
		  
}
   
	
function doit(location){// create variables from current location then loads map to current position
	 
	  currentCoords=(location.coords.latitude + ', '+ location.coords.longitude);
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
  
    var infowindow = new google.maps.InfoWindow({
		content:"your current location"
    });//create a info window for locations
    var marker = new google.maps.Marker({// put pin on current location(centercoords)
	    position: centerCoords,
		map: map,
		
    });
  
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
    });//open info window if marker is clicked
  
     google.maps.event.addListener(autocomplete, 'place_changed', function() {// if a new location is selected from autoComplete do the following
     infowindow.close();//close info window
	 place = autocomplete.getPlace();
	 id=place.place_id;
	 local=place.geometry.location;
     placed[0]={ "id": id,"local": local};//push place info into array for later use
	
	 
    if (!place.geometry) {// dont do anything if you cant find location?
      return;
    }

    if (place.geometry.viewport) {// if you can find location recenter map to that location
	
    map.fitBounds(place.geometry.viewport);
		  var marker2 = new google.maps.Marker({// put pin on current location(centercoords)
		  position: local,
          map: map,
	

		 });
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

   
  });
	 var button= document.getElementById("btnSubmit");
 
     button.addEventListener( "onClick",function(){
      id=placed[0].id;
	  local=placed[0].local;
		 
	   var marker3 = new google.maps.Marker({// put pin on current location(centercoords)
		position: local,
        map: map,
	

});
   
 
	  });
 
	  
 };//doit makemap
 
	    
google.maps.event.addDomListener(window, 'load', init);//when window loads go to init function and get current location