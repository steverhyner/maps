

function init() { // now I will take that js array of sample's upload info and break it apart into several individual arrays 
 //multiple Markers lat long coord sarray- loop through the jsArray and pull out the .location info and put it in the markers array
   var markers=[];
   
   jsArray.forEach( function(arrItem)
	{
	var mark= arrItem.location;
	markers.push(mark);
	});
	 console.log(markers);//javascript user info array converted from php array .function found on showLocations.php
	   console.log(jsArray);
	   //-----------------------------------------------------------------
   //multiple location id's
	var locationIds=[];
	
   jsArray.forEach( function(arrItem)
	{
	var id= arrItem.uID;
	locationIds.push(id);
	});
	   
//-----------------------------------------------------------------------------
//-----------------------------------------------------------------
   //multiple location names
	var locationNames=[];
	
   jsArray.forEach( function(arrItem)
	{
	var loc= arrItem.locationName;
	locationNames.push(loc);
	});
	   
//-----------------------------------------------------------------------------
  //multiple user names
	var userNames=[];
	
   jsArray.forEach( function(arrItem)
	{
	var name= arrItem.uName;
	userNames.push(name);
	 
	});
  
	 //------------------------------------------------------------------------
	 
	 //multiple file names
	var fileNames=[];
	
   jsArray.forEach( function(arrItem)
	{
	var fileName= arrItem.fileName;
	fileNames.push(fileName);
	});
 
	 //------------------------------------------------------------------------
	 
	 //multiple user comments
	var userComments=[];
	
   jsArray.forEach( function(arrItem)
	{
	var comment= arrItem.userComment;
	userComments.push(comment);
	});
  
	 //------------------------------------------------------------------------
	 	 //multiple user comments
	var timeStamp=[];
	
   jsArray.forEach( function(arrItem)
	{
	var time= arrItem.dateCreated;
	timeStamp.push(time);
	});
  console.log(markers);//javascript user info array converted from php array .function found on showLocations.php
	   console.log(jsArray);
	   
//-------------------------------------------------------------------------------

 
//---------------------------------------------------------------------	   
   var map;
	var bounds= new google.maps.LatLngBounds();
	var mapOptions={
		zoom: 12,
		mapTypeId:'roadmap'
	}	
	
	 //display map on page
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);// put the new map on the page using the options
   map.setTilt(45);
   
   //-----------------------------------------------------------
 //--------------------------------------------------
   // Display multiple markers info window on a map
    var infoWindow = new google.maps.InfoWindow({
		maxWidth:380,
		content:'<p class="popout"></p>'
	}), marker, i;
	//--------------------------------------------------------------
   // Loop through our array of markers & place each one on the map  

    for( i = 0; i < markers.length; i++ ) {
	   var split=markers[i].split(',');
	   var lat=split[0];
	   var lon=split[1];
        var position = new google.maps.LatLng(lat,lon);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map
            
        });
	
	  // Allow each marker to have an info window  --we get the info from the javascript arrays we created above-we are using the above loop variables again to set content
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
			 
                infoWindow.setContent('<p class="popout">'+locationNames[i]+ '<br>' + 'user name: ' + userNames[i] + '<br>' + 
									'date posted: ' +   timeStamp[i] + '<br>' + 'user comments: ' +  userComments[i] + '<br>' +
									'your picture upload: ' + '<a href="details.php?ID='+ locationIds[i]+'"><img   class="windowImg" width=30%;   src="uploads/'+fileNames[i]+'"></a>'+'</p>')
                infoWindow.open(map, marker);
            }
        })(marker, i));
	}
	//----------------------------------------------------------------
	
	 google.maps.event.addListener(map, 'zoom_changed', (function() {
           
                infoWindow.close(map, marker);
            }));
	
	
	  
	
		
	   google.maps.event.addListener(map, 'click', (function() {
           
                infoWindow.close(map, marker);
            }));
	
	//----------------------------------------------
	map.fitBounds(bounds);
 }//doit makemap
 
	
 
google.maps.event.addDomListener(window, 'load', init);//when window loads go to init function and get current location