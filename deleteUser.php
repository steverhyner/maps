<?php
SESSION_START();
if(!$_SESSION['admin']){
header('Location:/admin.php');
}
require_once('../../require/pdoConnect.php');
require_once'helpers.php';
renderHeader('delete user');
//-------------------delete a user---------------------------------
$out3='';
$out4='';
$flag='';
$flag2='';
 

		if(isset($_GET['uName']) && isset($_GET['email'])){
		$userName= $_GET['uName'];
		$email= $_GET['email'];
				 
			$stmt=$db->prepare("delete from login where uName = ?  ");
			$stmt->bindParam(1,$userName);
		
			$stmt->execute();
			$flag2=true;
			$out4.="user: $userName deleted<br>";
			
			$stmt=$db->prepare("delete from userInfo where uName = ?   ");
			$stmt->bindParam(1,$userName);
			$stmt->execute();
			
			$stmt=$db->prepare("delete from mapComments where uName = ?   ");
			$stmt->bindParam(1,$userName);
			$stmt->execute();
		};
	 
 
//-------------------------------------

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
	<div id="deleteUser">
	
					 <h2>delete a user and all of that user's information</h2>
						 
							  <div id="userInformation">
								<table id="userIn" border="1">
								<thead><th>user Name</th><th>email</th><th>delete</th></thead>
									<?php
								 
						  
									$sql="select  distinct uName,email  from login " ;
									$result=$db->query($sql);
									while($row=$result->fetch(PDO::FETCH_ASSOC)){
									echo "<tr><td>". $row['uName']. "</td><td>". $row['email'].  "</td><td>
									<form action='deleteUser.php' method='GET'>
									<input type='hidden' name='uName' value='".$row['uName']."'>
									<input type='hidden' name='email' value='".$row['email']."'>
									</form>
										<form action='deleteUser.php' method='GET'>
									<input type='hidden' name='uName' value='".$row['uName']."'>
									<input type='hidden' name='email' value='".$row['email']."'>
									<input type='submit' name='delete' value='delete'>
									</form></td>
									
									</tr>";
								};
								  
								?>
								</table>
							</div><!--userIformation  -->
				 </div><!--delete user-->
		 </div><!--main-->
<?php
		require_once'foot.php';
	?>
</body>
</html>