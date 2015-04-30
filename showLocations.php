<?php
SESSION_START();
require_once('../../../../require/pdoConnect.php');
  if(!isset($_SESSION['user'])){
  header("Location: index.php"); 
  }
  
  
  
  
  $sql= "CREATE TABLE IF NOT EXISTS userInfo(
	uID int primary key Auto_increment,
	uName VARCHAR(128) NOT null ,
	location varchar(55) not null,
	userComment blob,
	fileName varchar(255)
	
	)";
	$result=$db->query($sql);
	 $locations=array();
	$userName=$_SESSION['user'];
	$sql="select * from userInfo where uName = '$userName'";
	 $result=$db->query($sql);
	while($row=$result->fetch(PDO::FETCH_ASSOC)){;
	$locations[]=$row;
	}
	 echo"<pre>";
     print_r($locations);
	echo"</pre>";

	 
 
?>


  <?php
  require_once'helpersForShowLocations.php';
  renderHeader('showLocations');
  
 
  ?>
   <script>
	function convert(){//convert php  $locations array to  var jsArray (javascript array)
	 <?php echo 'var jsArray ='.json_encode($locations);?>
	 
	}
	
	 convert();
	 console.log(jsArray);
</script>
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
	   <div id='mapForm'>
	 <div id="map-canvas">  </div>
	 <h2 class='maph2'>Here is your locations</h2>
	 
	 </div><!--mapform-->
</div><!--main-->
<div class='foot'>
	copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
</body>
</html>