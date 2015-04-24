<?php
SESSION_START();
require_once('../../../require/pdoConnect.php');
$out="";
if(isset($_POST['name']) && isset($_POST['uName']) && isset($_POST['email']) && isset($_POST['pass1'])){
	
	$sql="CREATE TABLE IF NOT EXISTS login(
		uID int PRIMARY KEY AUTO_INCREMENT,
		uName VARCHAR(128) UNIQUE,
		name VARCHAR(256),
		email varchar(128),
		password char(128),
		salt BLOB
		
	)";
	$result=$db->query($sql);
	
	$name=$_POST['name'];
	$uName=$_POST['uName'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	
	if($pass1 != $pass2){
		$out .= "passwords don't match";
	}else{
	$salt= mcrypt_create_iv(16,MCRYPT_DEV_URANDOM);
		$pass1=$salt.$pass1;
		$hash=hash('sha512',$pass1);
		
		$stmt=$db->prepare("INSERT INTO login (uName,name,email,password,salt)
		values(?,?,?,?,?)");
		$stmt->bindParam(1,$uName);
		$stmt->bindParam(2,$name);
		$stmt->bindParam(3,$email);
		$stmt->bindParam(4,$hash);
		$stmt->bindParam(5,$salt);
		try{
		$stmt->execute();
		$_SESSION['user']=$name;
			if(isset($_POST['remember'])){
			setCookie('user',$name,time()+360000);
			header("Location: index.php");
			}
		}catch(Exception $e){ //this is to catch  an existing user name error
			if($e->getCode()==23000){
				$out .="user name exists";
			}else{
					$out.="there was a problem";
			}//if error code
		}//try catch
		
	}//if passwords match
	

}//isset
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="maps.css">
	        
     <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?v=3sensor=true.exp&libraries=places&key=">
    </script>
    
  </head>
   <body>
    <header>
<h1>Restaurant Check-in Club</h1>
  
 <a href="/"><img src="images/rhyner_logotype.png" alt='steve logo'></a>
 <?php
 
require_once'nav.php';
?>
     
   
 <div class="login">
<?php
if(isset($_SESSION['user'])){
	echo"<h2>hello {$_SESSION['user']} you are logged in  &nbsp;<a href='logout.php'>logout</a></h2>";
		 
}else{
	echo"<h2>hello you are not logged in.  please login or   &nbsp;<a href='register.php'>register</a></h2>";
	 
	?>
	<form method="POST" action="index.php" class="loginForm">
	<label>user name: </label><input type="text" name="userName2" id='userName' placeholder='user name'value='<?php if(isset($_COOKIE['user']))echo$_COOKIE['user']; ?>'>
	<label>password: </label><input type="password" name="pass" id='pass1'placeholder='password'>
	
	
	<input type="submit" name="submit" id='submit'value='login'>

 <?php
 echo$out;
 ?>
	</form>
	<?php
}//isset session user
	


?>

</div><!--login-->

</header>
 <div class="main">
 <div id="main-canvas">
 <?php
 if(!isset($_SESSION['user'])){?>
 <h2 id='regh2'>Register</h2>
 
 
 <form  id='register'action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
 
 
		 
		<label>name: </label><input type='text' name='name'><br>
		<label>User name: </label><input type='text' name='uName'><br>
		<label>Email: </label><input type='email' name='email'><br>
		<label>Password: </label><input type='passwod' name='pass1'><br>
		<label>Repeat Password: </label><input type='passwod' name='pass2'><br>
		<label>remember me: </label><input type='checkbox' name='remember' id='remember'><br>
		 
		<input type='submit' value='Register'>

 </form>
 <?php
 }else{?>
	 <h2 id='regh2'>must be logged out to register</h2>
	 <?php
 }
 ?>
 </div><!--maincanvas-->
	</div><!--main-->
<div class='foot'>
copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
	</body>
</html>