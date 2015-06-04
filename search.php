<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
	$names=array();
	if(isset($_GET['uName'])){
		$uName=$_GET['uName'];
		
		$stmt=$db->prepare("select * from login where uName=?");
			$stmt->bindParam(1,$uName);
			$stmt->execute();
		 
		if($stmt->fetch(PDO::FETCH_ASSOC)){
			echo"<div class='r'>user name taken</div>";
		}else{
			echo"<div class='b'>user name good</div>";
		};
	};
	
	
		if(isset($_GET['email'])){
		$email=$_GET['email'];
		
		$stmt=$db->prepare("select * from login where email=?");
			$stmt->bindParam(1,$email);
			$stmt->execute();
		 
		if($stmt->fetch(PDO::FETCH_ASSOC)){
			echo"<div class='r'>email taken</div>";
		}else{
			echo"<div class='b'>available</div>";
		};
	};
	 

?>
 
	 <style>
	 
	 .r{
	 color:red;
	 }
	 .b{
	  color:black;
	 }
	 </style>