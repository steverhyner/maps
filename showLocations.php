<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
  if(!isset($_SESSION['user'])){
  header("Location: index.php"); 
  }
$sql= "CREATE TABLE IF NOT EXISTS userInfo(
	uID int primary key Auto_increment,
	uName VARCHAR(128) NOT null ,
	locationName varchar(259) not null,
	location varchar(55) not null,
	userComment blob,
	fileName varchar(255) ,
	dateCreated DATE not null 
	)";
$result=$db->query($sql);
$locations=array();
$userName=$_SESSION['user'];
$sql="select * from userInfo where uName = '$userName'";
$result=$db->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){;
	$locations[]=$row;
};
$sql2="select * from userInfo where uName = '$userName' order by dateCreated desc";
if( $result2=$db->query($sql2)){
	$location=$row2['locationName'];
	$date=$row2['dateCreated'];
};
require_once'helpersForShowLocations.php';
renderHeader('showLocations');
?>
<script>// turn php user info from data base  into javascript so i can populate map with pins
     var jsArray={};
	function convert(){//convert php  $locations array to  var jsArray (javascript array)
	 <?php echo ' jsArray ='.json_encode($locations);?>
	}
	convert();
	//-------------------------------------

</script>
<body>
	<header>
		<div class="top">
			<a href="index.php"><img src="images/header.png"></a>
		    <h1>Location History App</h1>
		 </div>
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
			<h1 class='maph2'>Here are your locations</h1>
			<div class="left">
				<p class='maph23'>Here are your locations!  Have fun revisiting where you were and who you were with!</p>
				<table id="smalltable" border="1">
					<thead><th>Date of upload</th><th>Location name</th></thead>
					<?php
					 while($row2=$result2->fetch(PDO::FETCH_ASSOC)){
							echo"<tr><td>". $row2['dateCreated'] . "</td><td>".$row2['locationName'] .  "</td></tr>";
					};
					 
					?>
				</table>
			</div><!--left-->
			<div id="map-canvas">  </div>
		</div><!--mapform-->
	</div><!--main-->
<?php
		require_once'foot.php';
?>
</body>
</html>