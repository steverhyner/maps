<?php
	$out2="";
	$name='';
	$uName='';
	$email='';
	$pass1='';
	$pass2='';
	$sql="CREATE TABLE IF NOT EXISTS login(
		uID int PRIMARY KEY AUTO_INCREMENT,
		uName VARCHAR(128) UNIQUE,
		name VARCHAR(256),
		email varchar(128) unique,
		password char(128),
		salt BLOB
		
	)";
	$result=$db->query($sql);
	
if(isset($_POST['name']) && isset($_POST['uName']) && isset($_POST['email']) && isset($_POST['pass1'])){
	
	$sql="CREATE TABLE IF NOT EXISTS login(
		uID int PRIMARY KEY AUTO_INCREMENT,
		uName VARCHAR(128) UNIQUE,
		name VARCHAR(256),
		email varchar(128) unique,
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
		$out2 .= "passwords don't match";
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
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$body=
				"<p>dear " .$uName .",</p> 
				<p>Welcome to the location history site!  Enjoy uploading your location history.  You can  now have a location upload history! 
				You will be able to see all of your location uploads on a map as well as in a table format. You will be able to view the details 
				of any particular upload including a picture,comment,date of upload, and of course the location of the upload!
</p>
				<p>maps.steverhyner.biz</p>
				
				<p>Thanks,</p>
				
				<p>Steve</p>";
			mail($email,'Welcome to the location history app',$body,$headers);		

		 
			
			$_SESSION['user']=$uName;
			
				if(isset($_POST['remember'])){
				setCookie('user',$uName,time()+360000);
				
				}
			
			header("Location: thankyou.php");
		}catch(Exception $e){ //this is to catch  an existing user name error
			if($e->getCode()==23000){
				$out2 .="email in use";
				 
			}else{
					$out2.="there was a problem";
					 
			}//if error code
		}//try catch

	}//if passwords match
       
}//isset
?>