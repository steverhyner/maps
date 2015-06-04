<?php
SESSION_START();

require_once('../../require/pdoConnect.php');
//create table for upload info
 $sql= "CREATE TABLE IF NOT EXISTS userInfo(
	uID int primary key Auto_increment,
	uName VARCHAR(128) NOT null ,
	location varchar(55) not null,
	userComment blob,
	fileName varchar(255)
	
	)";
	$result=$db->query($sql);
	$locations=array();//this is where the user info will be stored
	 
	$sql="select * from userInfo where datediff(now(),dateCreated) < 10";//this is a user I made up to show example locations and such
	$result=$db->query($sql);
	while($row=$result->fetch(PDO::FETCH_ASSOC)){
		$locations[]=$row;//now I have a multideminsional array full of the user sample's information uploads
	};

  require_once'phpLoginCheck.php';  
  require_once'helpersForIndex.php';
  renderHeader('home');
 ?>
 <script>// turn php user info $locations array into javascript so i can populate map with pins
   var jsArray={};
	function convert(){//now I have that same php array of sample's upload info ,
						//in a java script multi dimensional array. I wil break it apart on the  javasript page(showlocations.js)
	 <?php echo ' jsArray ='.json_encode($locations);?>
	 
	}
	
	 convert();//call the above function to make it happen
		 
 
</script>
<body>
<header>
	<div class="top">
		<a href="index.php" id="logo"><img src="images/header.png"></a>
		<h1>Location History App</h1>
	 </div><!--top-->
	 <div id="both">
		
			<?php
			require_once'loginForm.php';
			?>
			<div id="right">
			 <?php
			require_once'nav.php';
			?>
		</div><!--right-->  
	</div><!--both-->
	
</header>
<div class="main">
	 
	  <div id='mapForm'>
		  <h1 class='maph2'>Welcome to the Location History App </h1><p id='indenth2'>-Below are a collection of user's location uploads for the past 10 days-See where the hot spots are!  Register today to start pinning!</p>
 
		  <div class="left">

			  <p class='tom'> If you register, You can have a location upload history!  You will be able to see all of your location uploads on a map as well as in a table format
			  (which you can access when registered!).  You will be able to view the details of any particular upload including a picture,comment,date of upload, and of course the 
			  location of the upload! </p><br><br>
			  
			  <h2 id='btnh2'><a href='/register.php' id='regbtn'>Register</a></h2><br> 
			  <br><br>
			  
			  <p class='tom'>
			  
			  It is a great way to look back to where you have been and to reminisce on those events and special occasions!</p>
		  
		  </div>
		 <div id="map-canvas"> </div>
	 
	  
	 </div><!--mapform-->
</div><!--main-->
 <?php
require_once'foot.php';
 ?>
</body>
</html>
