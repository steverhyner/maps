<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
if(!isset($_SESSION['user'])){
  header("Location: index.php"); 
}else{
  $id= $_SESSION['user'];
 }
$userName=$_SESSION['user'];
$sql="select * from userInfo where uName = '$userName' order by dateCreated desc";
if( $result=$db->query($sql)){
    $userName=$row['uName'];
	$location=$row['locationName'];
	$comment=$row['userComment'];
	$date=$row['dateCreated'];
	$image="<img src='uploads/{$row['fileName']}'>";
};
	
require_once'helpersForDetails.php';
renderHeader('history table');
?>
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
		    <h1 class='maph2'>Table of your Uploads</h1>
			<div class="left2">
		  
				<div class ="details">
					 <p>
					 <p class="maph23">Here are all of your location uploads with the most recent on the top of the list!  click on the images in the table to go to the 
					 detail page of that particular upload.</p>
					 
				 
					 </p>
					
				</div>
		  
		  </div><!--left2-->
			<div id="map-canvas2">

					<table border="0">
						<thead><th>Date of upload</th><th>Location name</th><th>Your comment</th><th>your image</th></thead>
						<?php
						 
						while($row=$result->fetch(PDO::FETCH_ASSOC)){
								echo"<tr><td>". $row['dateCreated'] . "</td><td>".$row['locationName'] .  "</td><td>".$row['userComment'] .   "</td><td><a href='details.php?ID={$row['uID']}'><img src='uploads/{$row['fileName']}'></a>" .   "</td></tr>";
						};
						 
						?>
		
					
					
					</table>
			</div><!--mapcanvas-->
		 
		  
		</div><!--mapform-->
			 
			 
	</div><!--main-->
<?php
	require_once'foot.php';
?>
</body>
</html>