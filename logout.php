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
	
 
	}
	 
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
echo"<h2>you are now logged out! &nbsp;<a href='index.php'>login</a>&nbsp; or &nbsp;<a href='register.php'>register</a></h2>";
	$_SESSION=array();
	SESSION_DESTROY();
	SESSION_UNSET();
	header("refresh:2; index.php");
	}
?>
	 

</div><!--login-->

</header>
 <div class="main">
 <div id="main-canvas">
 
 
 </div><!--maincanvas-->
	</div><!--main-->
<div class='foot'>
copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
	</body>
</html>