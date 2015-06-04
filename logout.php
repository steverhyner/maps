<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
if(isset($_SESSION['user'])){
	$_SESSION=array();
	SESSION_DESTROY();
	SESSION_UNSET();
}
header("refresh:2; index.php"); 
require_once'helpers.php';
renderHeader('logout');
?>
<body>
	<header>
		<div class="top">
			<a href="index.php"><img src="images/header.png"></a>
			<h1>Location History App</h1>
		</div><!--top-->
		<div id="both">
			
			<?php
				require_once'loginForm.php';
			?>
			<div id="right">
				<?php
					require_once'nav.php';
				?>
			</div><!--right-->  
		</div><!--both-->
	</header>
	<div class="main">
		 <div id="main-canvas"> 
			<h1 class='regh2'>you are logged out</h1>
		 </div><!--maincanvas-->
		 
	</div><!--main-->
<?php
	require_once'foot.php';
?>
</body>
</html>