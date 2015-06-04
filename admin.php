<?php
SESSION_START();

require_once('../../require/pdoConnect.php');
 $uName='';
 
require_once'phpLoginCheck.php'; //this needs to go here or we will get header errors from login form refresh page header.
	
							  //this has to go above the require directly below
$out2='';
$out3='';
$out4='';
$out5='';
$out6='';
$out7='';
$flag=true;
$flag2=true;
$flag3=false;
$flag4=false;
//---------------------------------------------
 if(!empty($_POST['uName'])){
	$uName=$_POST['uName'];
} ;
 
 if(!empty($_POST['uName']) && !empty($_POST['pass'])){
	$uName=$_POST['uName'];
	$pass=$_POST['pass'];
	
	if($uName != 'steve' || $pass != 'H0ganisnumber!'){
		$out2.="bad user name password combo";

	}else{
		$stmt=$db->prepare("select salt from login where uName=?");
		$stmt->bindParam(1,$uName);
		$stmt->execute();
		if($row=$stmt->fetch()){
			$salt=$row['salt'];
			$pass=$salt.$pass;
			$hash=hash('sha512',$pass);
			$stmt=$db->prepare("SELECT 1 from login where uName =? AND password=?");
			$stmt->bindParam(1,$uName);
			$stmt->bindParam(2,$hash);
			$stmt->execute();
			if($stmt->fetch()){
						
				$_SESSION['admin']=$uName;
				$out2.="good login";
				 
				
						
			}else{
				$out2.="bad user name/password";
			}//good or bad login?
		}else{
				$out2.="bad password/username";
			};//salt is good
	};//uname and pass are good
}else{
		$out2.="please fill in all fields";
	 };

//----------------------------------------------------------------------------------------

 


require_once'helpers.php';
renderHeader('admin');
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
		 
			<div id="main-canvas">
			<?php
			if(!isset($_SESSION['admin'])){?>
				<h1 class='regh2'>use admin login form to view admin info</h1>
				<p class ="regp">
					 
					
				</p>
				<form  id='register' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
				 
					
					<label for='uName'>User name: </label><input type='text' id='uName' name='uName' class='required' value='<?php echo $uName; ?>'><br>
					<div id="update"> </div>
					 
						<div id="updates"> </div>
					<label for='pass'>Password: </label><input type='password'  id="pass" name='pass' class='required'  ><br>
					<input type='submit' value='admin login'>
				 
					 <?php
					 echo$out2."<br>";
				 
					 ?>
				</form>
				 <?php
			 }else{?>
					 <h2 class='regh2'>welcome to the admin page &nbsp; <a href='logout2.php'>logout</a></h2>
					 
			
					
				 
					
				  <div id="adminInfo">
				  <h2> Quick stats</h2>
						<?php
						$info='';
						
						$sql="select count(*)as 'count' from login" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the number of users signed up for this site is: {$row['count']}<br>";
						};
						
						$sql="select count(*)as 'count' from userInfo" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the number of total locations pinned for this site is: {$row['count']}<br>";
						};
						
						$sql="select count(*)as 'count' from userInfo group by uName order by count(*) desc limit 1" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the user with the top number of total locations pinned for this site is: {$row['count']}<br>";
						};
						
						$sql="select uName,count(*)as 'count' from userInfo group by uName order by count(*) desc limit 1" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the users name with the top number of total locations pinned for this site is: {$row['uName']}<br>";
						};
						
							$sql="select dateCreated from userInfo  order by dateCreated desc limit 1" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the last pin for this site was on : {$row['dateCreated']}<br>";
						};
						
						$sql="select uName from userInfo  order by dateCreated desc limit 1" ;
						$result=$db->query($sql);
						while($row=$result->fetch(PDO::FETCH_ASSOC)){;
						echo "the last person to pin on this site was  : {$row['uName']}<br>";
						};
						$sql="select locationName from userInfo where datediff(now(),dateCreated) < 2";
							$result=$db->query($sql);
							while($row=$result->fetch(PDO::FETCH_ASSOC)){
							echo " pinned in the last 24 hours  : {$row['locationName']}<br>";
						};
						echo$info;
						?>
						
						
				  </div><!--adminInfo-->
				  
				
					
			  
			 <?php
			 
			 };//endelse
			 ?>
			 </div><!--main- canvas-->
		 
	</div><!--main-->
	<?php
		require_once'foot.php';
	?>
</body>
</html>