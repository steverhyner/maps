<?php
SESSION_START();
<<<<<<< HEAD
require_once'helpers.php';
renderHeader('home');
=======
require_once('../../../require/pdoConnect.php');
$out='';
if(isset($_POST['userName2'])&& isset($_POST['pass'])){
	$name2=$_POST['userName2'];
	$pass=$_POST['pass'];
	$stmt=$db->prepare("select salt from login where uName=?");
	$stmt->bindParam(1,$name2);
	$stmt->execute();
	if($row=$stmt->fetch()){
		$salt=$row['salt'];
		$pass=$salt.$pass;
		$hash=hash('sha512',$pass);
		
		$stmt=$db->prepare("SELECT 1 from login where uName =? AND password=?");
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
>>>>>>> origin/master

require_once'phpLoginCheck.php';

?>

 <body>
<header>
   <h1>Restaurant History App</h1>
   <div id="both">
	   <div id="right">
	  
		<?php
		 
		require_once'nav.php';
		?>
		</div><!--right-->  
		<?php
	  require_once'loginForm.php';
	  ?>
  </div><!--both-->
</header>
 <div class="main">
	<?php
	if(isset($_SESSION['user'])){?>
		 <div id='mapForm'>
			<h2 id='maph2'>Use form to pin restaurant location, then upload location with a comment and/or picture to remember the occassion</h2>
		 <div id="map-canvas"></div>
		 
			<form  id='upload'action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
				<div id='btn'>
		          <input id="search" name='search' class='controls' type="text" size="50" placeholder="enter search here"><br>
				  <input type="button" onclick="pinLocation()" value="pin restaurant location" id='button' />
				</div><!--btn-->
				<div id='userInput'>
					<textarea id="textBox" name='info' cols='30' rows='10'>comment</textarea><br>
					<input type='file' name='upload' value='upload picture' placeholder='upload picture'><br>
					<input id='btnSubmit' type='submit' value='upload info and retaurant location'>
				</div>
			</form>
		 </div><!--mapform-->
		 <?php
	}else{?>
		 <div id='mapForm'>
			<h1 id='loginh2'>please log in to participate with logging your restaurant history</h1>
		 <div id="map-canvas"></div>
		 </div><!--mapform-->
		 <?php
	}
	?>
</div><!--main-->
<div class='foot'>
	copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
<<<<<<< HEAD
</body>
</html>
=======
	</body>
</html>
>>>>>>> origin/master
