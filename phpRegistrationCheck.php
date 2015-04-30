<?php
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
			
			}
			header("Location: thankyou.php");exit();
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