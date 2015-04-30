<?php
require_once('../../../../require/pdoConnect.php');
$out='';
if(isset($_POST['userName2'])&& isset($_POST['pass'])){
	$name2=$_POST['userName2'];
	$pass=$_POST['pass'];
	$stmt=$db->prepare("select salt from login where uName=?");
	$stmt->bindParam(1,$name2);
	$stmt->execute();
	if($row=$stmt->fetch()){
		$salt=$row['salt'];
		$pass=$salt.$pass;
		$hash=hash('sha512',$pass);
		
		$stmt=$db->prepare("SELECT 1 from login where uName =? AND password=?");
		$stmt->bindParam(1,$name2);
		$stmt->bindParam(2,$hash);
		$stmt->execute();
		if($stmt->fetch()){
					
					$_SESSION['user']=$name2;
					setCookie('user',$name2,time()+360000);
		}else{
			$out.="bad user name/password";
		}//good or bad login?
			
	}else{
		$out.="bad user name/password";
	
	}//if user exists
}//isset
?>
  