<?php
SESSION_START();
if(!$_SESSION['admin']){
header('Location:/admin.php');
}
require_once('../../require/pdoConnect.php');
require_once'helpers.php';
renderHeader('user uploads');
 
//-----------------------------
$sql="select distinct uName from userInfo";
$result=$db->query($sql);
 //----------------------------------------------------------------------------------------
if(isset($_POST['getUserName'])){
									
									$getUserName=$_POST['getUserName'];
									//$getUserEmail=$_POST['getUserEmail'];
									$sql="select * from userInfo where uName = '$getUserName'";
									$result2=$db->query($sql);
								 
									$flag3=true;
								 
};

//-----------------------------
//----------------------------------------------------------------------------------------
if(isset($_GET['getUserName'])){
									
									$getUserName=$_GET['getUserName'];
									//$getUserEmail=$_GET['getUserEmail'];
									$sql="select * from userInfo where uName = '$getUserName'";
									$result2=$db->query($sql);
								 
									$flag3=true;
								 
};

//-----------------------------
//--------------------------------------
if(isset($_GET['uNameUpload']) && isset($_GET['uID'])){
	$uNameUpload=$_GET['uNameUpload'];
	$uploadID=$_GET['uID'];
	$sql="delete from userInfo where uID=$uploadID";
	$result=$db->query($sql);
	$getUserName=$_GET['getUserName'];
	$sql="select distinct uName from userInfo";
$result=$db->query($sql);
	$sql="select * from userInfo where uName = '$getUserName'";
									$result2=$db->query($sql);
}
 
?>
<header>
		<div class="top">
			<a href="index.php"><img src="images/header.png"></a>
		    <h1>Location History App</h1>
		</div>
		<div id="both">
			<div id="right">
				 
			</div><!--right--> 
				 
		 
		  <?php
			require_once'nav2.php';
			?>
		</div><!--both-->
	</header>
		<div class="main">
		 <h2 class='regh2'>welcome to the admin page &nbsp; <a href='logout2.php'>logout</a></h2>
		<div id="getInfo">
					 <h2>get a user's location uploads /delete any individual upload if desired</h2>
						 <form  id='get' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
				 
							<label>User name: </label>
								<?php  echo"<select name='getUserName'>";
											echo"<option>make selection</option>";
								while($row=$result->fetch(PDO::FETCH_ASSOC)){
									echo"<option value='".$row['uName']."'>" .$row['uName'] . "</option>";
								}
								echo"</select>";?><br><br>			
							<input type='hidden' name='name' value='<?php $_GET['getUserName'] ?>'>
							<input type='submit' value='get user Info'>
							 
							<?php
							echo$out5."<br>";
							 
							?>
						 </form>
							  <div id="userInformation">
								 
								<?php
								if($flag3==true){?>
									 
									<table id='userIn2' border="1">
									<thead><th>user name</th><th>Date of upload</th><th>Location name</th><th>Your comment</th><th>your image</th><th>delete comment</th></thead>
									<?php
									
										while($row=$result2->fetch(PDO::FETCH_ASSOC)){
											
											$out5.="user found<br>";
											echo"<tr><td>". $row['uName'] . "</td><td>". $row['dateCreated'] . "</td><td>".$row['locationName'] .  "</td><td>".$row['userComment'] .   "</td><td><a href='details.php?ID={$row['uID']}'><img src='uploads/{$row['fileName']}' width= '20'></a>" .   "</td><td>
											<form action='userUplads.php' method='GET'>
													<input type='hidden' name='uNameUpload' value= '".$row['uName']."'>
													<input type='hidden' name='getUserName' value= '".$row['uName']."'>
													<input type='hidden' name='uID' value= '".$row['uID']."'>
													
													
											</form>
											<form action='userUplads.php' method='GET'>
													<input type='hidden' name='uNameUpload' value= '".$row['uName']."'>
													<input type='hidden' name='getUserName' value= '".$row['uName']."'>
													<input type='hidden' name='uID' value= '".$row['uID']."'>
													
													<input type='submit' name='del' value='delete'>
											</form> </td></tr>";
											
															
										};
											
									 
									?>			
									</table>
								<?php } ?>
							</div><!--userIformation  -->
				 </div><!--grtinfo-->
 </div><!--main-->
<?php
		require_once'foot.php';
	?>
</body>
</html>