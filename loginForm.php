<div class="login">
<?php
if(isset($_SESSION['user'])){
	echo"<h2>hello {$_SESSION['user']} you are logged in  &nbsp;<a href='logout.php'>logout</a></h2>";
		 
}else{
	echo"<h2>hello you are not logged in.  please login or   &nbsp;<a href='register.php'>register</a> to participate</h2>";
	 
	?>
	<form method="POST" action="index.php" class="loginForm">
	<label>user name: </label><input type="text" name="userName2" id='userName' placeholder='user name' value='<?php if(isset($_COOKIE['user']))echo$_COOKIE['user']; ?>'>
	<label>password: </label><input type="password" name="pass" id='pass1' placeholder='password'>
	
	
	<input type="submit" name="submit" id='submit'value='login'>
 
	</form>
	<?php
}//isset session user
	


?>

</div><!--login-->