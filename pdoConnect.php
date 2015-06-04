<?php
try{
$db=new PDO('mysql:host=localhost;dbname=steve_php;charset=utf8','steve_steve','H0ganisnumber!');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	echo"Caught exception:" .$e->getMessage()."<br>";
	//echo"bad stuff";
}



?>