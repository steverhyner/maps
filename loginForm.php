<div class="login">
<?php
 require_once'phpLoginCheck.php';
if(isset($_SESSION['user'])){
	echo"<h2 id='loginmsg'>hello {$_SESSION['user']} you are logged in  &nbsp;<a href='logout.php'>logout</a></h2>";
	 
}else{
	echo"<h2 id='loginmsg'>hello! Please login or   &nbsp;<a href='register.php'>register</a> to participate  &nbsp;  <a href='forgot.php'>forgot password?</a> </h2>";
	 
	?>
	<form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>' class="loginForm">
	<label>user name: </label><input type="text" name="userName2" id='userName' placeholder='user name' value='<?php if(isset($_COOKIE['user']))echo$_COOKIE['user']; ?>'>
	<label>password: </label><input type="password" name="pass" id='pass1' placeholder='password'>
	
	
	<input type="submit" name="submit" id='submit'value='login'><br>
	<div id="low">
 <?php
 echo$out;
 ?>
 </div>
	</form>
	<?php
}//isset session user
	


?>

</div><!--login-->