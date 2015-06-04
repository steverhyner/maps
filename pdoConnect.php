<?php
try{
$db=new PDO('mysql:host=localhost;dbname=##;charset=utf8','###','###');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	echo"Caught exception:" .$e->getMessage()."<br>";
	//echo"bad stuff";
}



?>
