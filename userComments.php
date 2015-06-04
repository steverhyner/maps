<?php
SESSION_START();
if(!$_SESSION['admin']){
header('Location:/admin.php');
}
require_once('../../require/pdoConnect.php');
require_once'helpers.php';
renderHeader('password change');
//-----------------------------
$sql="select distinct uName from mapComments";
$result=$db->query($sql);
//----------------
if(isset($_POST['getUserInfo']) ){
									
									$getUserInfo=$_POST['getUserInfo'];
									$getUserInfoEmail=$_POST['getUserInfoEmail'];
									$sql="select * from mapComments where uName = '$getUserInfo'";
									$result3=$db->query($sql);
									 
								 
									$flag4=true;
									 
};
//--------------------------------------
//-----------------------------
if(isset($_GET['getUserInfo']) ){
									
									$getUserInfo=$_GET['getUserInfo'];
									$getUserInfoEmail=$_GET['getUserInfoEmail'];
									$sql="select * from mapComments where uName = '$getUserInfo'";
									$result3=$db->query($sql);
									 
								 
									$flag4=true;
									 
};
//--------------------------------------
//--------------------------------------
if(isset($_GET['uNameComment']) && isset($_GET['commentID'])){
	$uNameComment=$_GET['uNameComment'];
	$commentID=$_GET['commentID'];
	$sql="delete from mapComments where commentID=$commentID";
	$result=$db->query($sql);
	$getUserInfo=$_GET['getUserInfo'];
	$sql="select distinct uName from mapComments";
	$result=$db->query($sql);
	$sql="select * from mapComments where uName = '$getUserInfo'";
									$result3=$db->query($sql);
}
//--------------------------

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
						 <h2>get user  additional comments from detail page,if there is any/delete any individual comment if desired</h2>
							 <form  id='get' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
								<label>User name: </label>
								<?php  echo"<select name='getUserInfo'>";
										echo"<option>make selection</option>";
								while($row=$result->fetch(PDO::FETCH_ASSOC)){
									echo"<option value='".$row['uName']."'>" .$row['uName'] . "</option>";
								}
								echo"</select>";?><br><br>
								<input type='hidden' name='name' value='<?php $_GET['getUserInfo'] ?>'>
								
								<input type='submit' value='get user Info'>
								 
								<?php
								echo$out6."<br>";
								 
								?>
							 </form>
								  <div id="userInformation">
								 
									<?php
									if($flag4==true){?>
										
										<table id='userIn2' border="1">
										<thead><th>Date of upload</th><th>user name</th><th>Your comment</th><th>Picture ID</th><th>delete comment</th></thead>
										<?php
										
											while($row=$result3->fetch(PDO::FETCH_ASSOC)){
												
												$out6.="user found<br>";
												echo"<tr><td>". $row['dateCreated'] . "</td><td>".$row['uName'] .  "</td><td>".$row['comment'] .   "</td> <td>".$row['picID'] .  "</td><td>
												<form action='userComments.php' method='GET'>
													<input type='hidden' name='uNameComment' value= '".$row['uName']."'>
													<input type='hidden' name='getUserInfo' value= '".$row['uName']."'>
											 
													<input type='hidden' name='commentID' value= '".$row['commentID']."'>
												</form>
													<form action='userComments.php' method='GET'>
													<input type='hidden' name='uNameComment' value= '".$row['uName']."'>
													<input type='hidden' name='getUserInfo' value= '".$row['uName']."'>
											 
													<input type='hidden' name='commentID' value= '".$row['commentID']."'>
													<input type='submit' name='del' value='delete'>
												</form> </td></tr>";
												
																
											};
												
										 
										?>			
										</table>
									<?php } ?>
								</div><!--userIformation  -->
					</div><!--grtinfo2-->
 </div><!--main-->
<?php
		require_once'foot.php';
	?>
</body>
</html>