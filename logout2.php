<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
if(isset($_SESSION['admin'])){
	$_SESSION=array();
	SESSION_DESTROY();
	SESSION_UNSET();
}
header("Location: admin.php"); 

?>
