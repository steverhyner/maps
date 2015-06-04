<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
if (isset($_GET['ID'])){
	$ID=$_GET['ID'];
	$uName=$_SESSION['user'];	
	$flag2=false;
	$flag3=false;
	$msg='';
	if(is_numeric($ID)){
		$stmt=$db->prepare("select * from userInfo where uID= ?");
		$stmt->bindParam(1,$ID);
		$stmt->execute();
		if($row=$stmt->fetch()){
			$uID=$row['ID'];
			$userName=$row['uName'];
			$location=$row['locationName'];
			$comment=$row['userComment'];
			$date=$row['dateCreated'];
			$image="<img src='uploads/{$row['fileName']}'>";
		};//if$row
	}else{
		header('Location:showLocations.php');//bounce if the id isn't numeric because it should be
	};//isnumeric
	
		$sql="create table if not exists mapComments(
		commentID integer primary key auto_increment,
		uName varchar(255),
		comment blob,
		picID integer,
		dateCreated DATE not null 
		)";
		$result=$db->query($sql);
		
		$sql="select * from mapComments where picID= '$ID'";
		$result=$db->query($sql);
		if($row=$result->fetch(PDO::FETCH_ASSOC)>0){
		 $flag2=true;
		}//if$row
}else{
	header('Location:showLocations.php');
};//isset
//---------------the below are sample's uploads---i don't want anybody but sample to be able to make a comment here----------------------------------------
	 
if($ID== 6 || $ID== 7 ||  $ID== 8 ||  $ID== 9 ||  $ID== 10 ||  $ID== 11 ||  $ID== 12){
		$msg.="only make a comment on your own uploads<br>";
} //if$ID
		
		
if( $ID!= 6  &&  $ID!= 7 &&  $ID!= 8 &&  $ID!= 9 &&  $ID!= 10 &&  $ID!= 11 &&  $ID!= 12   && !empty($_GET['text'])){
	$uName=$_SESSION['user'];	
	$text=$_GET['text'];
	$dte=DATE("Y/m/d");
	$stmt=$db->prepare("insert into mapComments(comment,uName,picID,dateCreated)
	values(?,?,?,?)");
			
	$stmt->bindParam(1,$text);
	$stmt->bindParam(2,$uName);
	$stmt->bindParam(3,$ID);
	$stmt->bindParam(4,$dte);
	$stmt->execute();
	$msg.="thanks for submission";
	 $sql="select * from mapComments where picID= '$ID'";
		$result=$db->query($sql);
		if($row=$result->fetch(PDO::FETCH_ASSOC)>0){
		 $flag2=true;
		}
				
}else{
		$msg.="please fill out all fields";
}//if!empty and $ID
//------------------------------------------------
 //need below info to populate the map on the details page
$locations=array();
$useName=$_SESSION['user'];
$sql="select * from userInfo where uID = '$ID'";
$result=$db->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
	$locations[]=$row;
};//while
//-----------------------------------------	
	
require_once'helpersForDetails.php';
renderHeader('details');
 ?>
 
<script>// turn php user info array into javascript so i can populate map with pins
	var jsArray={};
	function convert(){//convert php  $locations array to  var jsArray (javascript array)
		<?php echo ' jsArray ='.json_encode($locations);?>
	};
	convert();
	//--------below is just some form validation before upload-----------------------------
	$(document).ready(function(){
		var valid=false;
		$('#register').submit(function(){
			$('.err').remove();
			$('.required').each(function(){
				if(!$(this).val()){
					 $(this).after("<div class='err'>required field warning </div>");
					 $('.err').css({color:' red'});
					 valid=false;
				} else{
					valid = true;
				};
			});//foreach
			if(valid){
				return true;
			}else{
				return false;
			}
		});//.submit
	});//.ready
	
	
	
 
</script>
 <body>
	 <header>
		<div class="top">
			<a href="index.php"><img src="images/header.png"></a>
			<h1>Location History App</h1>
		</div><!--top--> 
		<div id="both">
			
			<?php
				require_once'loginForm.php';
			?><div id="right">
				<?php
					require_once'nav.php';
				?>
			</div><!--right--> 
		 
		</div><!--both-->
	</header>

<div class="main">
	<div id='mapForm'>
		<h1 class='maph2' >Details about Upload</h1>
		<div class="left">
	
			<div class ="details">
					 
				<?php
						echo "<h2 class='detailh2'>Date:  " . $date . "</h2><br>";
						echo "<h2 class='detailh2'>user name:  " . $userName . "</h2><br>";
						echo "<h2 class='detailh2'>Location:  " . $location . "</h2> <br>";
						echo "<h2 class='detailh2'>User Comment:  " . $comment . "</h2><br>";
						echo "<h2 class='detailh2'>Image Upload:</h2><div class='detailh2img'>" . $image . "</div><br>";
				?>
				
			</div><!--details-->
				 
				<?PHP
				
				if(isset($_SESSION['user'])){
					 ?>
					 <h1 class='maph2'>leave another comment!</h1>
					 
			<form name='register' id='register' method='GET' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
						<input type='hidden' name='ID' value='<?php echo $ID ?>'>
						<textarea id='box'cols='50' rows='6' name='text' placeholder='what would you like to say?' class='required'></textarea><br>
						<input type='submit' value='submit'><br>

						<?PHP
						echo $msg;
						?>
						<?php
				}else{
					echo" <div class='logged'>"."<h2>you are not logged in, if you would like to comment please log in</h2>"."</div>";
						 
				}
						?>
			</form>
			<div id='displayComments'>
				<?php
					if($flag2==false ){
						echo"<h2>leave a comment?</h2>";
					}else{
						echo"<div id='results'>";
						$sql="select * from mapComments where picID= '$ID'";
						$result2=$db->query($sql);
						while($row=$result2->fetch(PDO::FETCH_ASSOC)){
							echo "<strong>date of comment:</strong>{$row['dateCreated']} <br>";
							echo "<strong>user name:</strong>{$row['uName']} <br>";
							echo "<strong>comment:</strong>{$row['comment']} <br>";
							echo"<hr>";
										 
						};//while
						echo"</div>";
					}
				?>
			</div><!--displayComments-->
		</div><!--left-->
		<div id="map-canvas">
		</div>
	</div><!--mapform-->
</div><!--main-->
	  <?php
	require_once'foot.php';
	 ?>
</body>
</html>