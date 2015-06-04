<?php
SESSION_START();
if(!$_SESSION['admin']){
header('Location:/admin.php');
}
require_once('../../require/pdoConnect.php');
require_once'helpers.php';
renderHeader('password change');
//---------change password----------
$sql="select uName from login";
$result=$db->query($sql);
 
 
 
if(!empty($_POST['uNameChange']) &&!empty($_POST['pass1Change']) && !empty($_POST['pass2Change'])){
	$uNameChange=$_POST['uNameChange'];
	 
	$pass1Change=$_POST['pass1Change'];
	$pass2Change=$_POST['pass2Change'];
	if($pass1Change != $pass2Change){
		$out7 .= "passwords don't match";
	}else{
		$sql="select email from login where uName='$uNameChange'";
		$result2=$db->query($sql);
		while($row=$result2->fetch(PDO::FETCH_ASSOC)){
			$emailChange=$row['email'];
		};
		$salt= mcrypt_create_iv(16,MCRYPT_DEV_URANDOM);
		$pass1Change=$salt.$pass1Change;
		$hash=hash('sha512',$pass1Change);
		$stmt=$db->prepare("update login  set password=? , salt=? where email='$emailChange' and uName='$uNameChange' ");
		$stmt->bindParam(1,$hash);
		$stmt->bindParam(2,$salt);
		try{
				$stmt->execute();
				$out7.="password changed";
				 
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$body=
					"<p>dear " .$uNameChange .",</p> 
					<p>your password was recently updated.</p>
					<p>maps.steverhyner.biz/index.php</p>
											
					<p>Thanks,</p>
					<p>Steve</p>";
				mail($emailChange,'password updated',$body,$headers);		
				
		}catch(Exception $e){ //this is to catch  an existing user name error
				$out2.="there was a problem";
		}//try catch
					}
}else{//new pass info not empty
	$out7 .= "fill out all fields";
};
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
		<div id='resetPass'>
						<h1 class='regh2'>reset a users password</h1>
			<form  id="reset" action="passwordChange.php" method="POST">
			<label>user name:</label>
				<?php  echo"<select name='uNameChange'>";
							echo"<option>make selection</option>";
				while($row=$result->fetch(PDO::FETCH_ASSOC)){
					echo"<option value='".$row['uName']."'>" .$row['uName'] . "</option>";
				}
				echo"</select>";?><br>
				 
				<label>New password : </label> <input type="password" name="pass1Change" id="pass" class='required'><br>
				<label>Repeat password : </label> <input type="password" name="pass2Change" id="passed" class='required'><br>
				<input type="submit" name="submit" value="Send">
				<?php
				echo$out7;
				?>
			</form>
	 
					
					</div><!--resetPass-->
 </div><!--main-->
<?php
		require_once'foot.php';
	?>
</body>
</html>