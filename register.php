<?php
SESSION_START();
require_once'helpers.php';
renderHeader('registration');
require_once('../../../require/pdoConnect.php');
require_once'phpRegistrationCheck.php';
?>
 
<body>
<header>
	<h1>Restaurant History App</h1>
	<div id="both">
		<div id="right">
		  
			<?php
			require_once'nav.php';
			?>
			 
		</div><!--right--> 
		<?php
		require_once'loginForm.php';
		?>
	</div><!--both-->
</header>
<div class="main">
	<div id='mapForm'>
		<div id="map-canvas"></div>
		<?php
		if(!isset($_SESSION['user'])){?>
			<h2 class='regh2'>Register</h2>
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
			 <h2 class='regh2'>must be logged out to register</h2>
			 <?php
		 }
		 ?>
	</div><!--mapform-->
</div><!--main-->
<div class='foot'>
	copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
</body>
</html>