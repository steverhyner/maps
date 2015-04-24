<?php
SESSION_START();
require_once('../../../require/pdoConnect.php');
$out='';
if(isset($_POST['userName2'])&& isset($_POST['pass'])){
	$name2=$_POST['userName2'];
	$pass=$_POST['pass'];
	$stmt=$db->prepare("select salt from userLogin where uName=?");
	$stmt->bindParam(1,$name2);
	$stmt->execute();
	if($row=$stmt->fetch()){
		$salt=$row['salt'];
		$pass=$salt.$pass;
		$hash=hash('sha512',$pass);
		
		$stmt=$db->prepare("SELECT 1 from userLogin where uName =? AND password=?");
		$stmt->bindParam(1,$name2);
		$stmt->bindParam(2,$hash);
		$stmt->execute();
		if($stmt->fetch()){
					
					$_SESSION['user']=$name2;
					setCookie('user',$name2,time()+360000);
		}else{
			$out.="bad user name/password";
		}//good or bad login?
			
	}else{
		$out.="bad user name/password";
	
	}//if user exists
}//isset
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="maps.css">
	        
     <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?v=3sensor=true.exp&libraries=places&key=">
    </script>
    <script>
<<<<<<< HEAD
  
  var map;
  var input;
  var lat;
  var lon;
  var placed = {};


=======
// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected..
>>>>>>> origin/master

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
    </script>
  </head>
   <body>
    <header>
<h1>Restaurant Check-in Club</h1>
  
 <a href="/"><img src="images/rhyner_logotype.png" alt='steve logo'></a>
 <?php
 
require_once'nav.php';
?>
     
   
 <div class="login">
<?php
if(isset($_SESSION['user'])){
	echo"<h2>hello {$_SESSION['user']} you are logged in  &nbsp;<a href='logout.php'>logout</a></h2>";
		 
}else{
	echo"<h2>hello you are not logged in.  please login or   &nbsp;<a href='register.php'>register</a> to participate</h2>";
	 
	?>
	<form method="POST" action="index.php" class="loginForm">
	<label>user name: </label><input type="text" name="userName2" id='userName' placeholder='user name'value='<?php if(isset($_COOKIE['user']))echo$_COOKIE['user']; ?>'>
	<label>password: </label><input type="password" name="pass" id='pass1'placeholder='password'>
	
	
	<input type="submit" name="submit" id='submit'value='login'>

 <?php
 echo$out;
 ?>
	</form>
	<?php
}//isset session user
	


?>

<<<<<<< HEAD
</div><!--login-->

</header>
 <div class="main">
<?php
if(isset($_SESSION['user'])){?>
 <div id='mapForm'>
 <h2 id='maph2'>Use form to pin restaurant location, then upload location with a comment and/or picture to remember the occassion</h2>
 <div id="map-canvas"></div>
 
 <form  id='upload'action='<?php echo $_SERVER['PHP_SELF']?>' method='GET'>
  <div id='btn'>
  
  <input id="search" class='controls' type="text" size="50" placeholder="enter search here"><br>
  <input type="button" onclick="pinLocation()" value="pin restaurant location" id='button' />
 </div><!--btn-->
 <textarea name='info' cols='20' rows='10'>comment</textarea><br>
		<input type='file' name='upload' value='upload picture' placeholder='upload picture'><br>
		<input type='submit' value='upload info and retaurant location'>

 </form>
 </div><!--mapform-->
 <?php
 }else{?>
	 <div id='mapForm'>
 <h1 id='loginh2'>please log in to participate in logging your restaurant history</h1>
 <div id="map-canvas"></div>
 </div><!--mapform-->
 <?php
 }
 ?>
	</div><!--main-->
<div class='foot'>
copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
	</body>
</html>
=======
</div><!--container-->
  </body>
</html>
>>>>>>> origin/master
