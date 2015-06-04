<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
 
require_once'phpLoginCheck.php'; //this needs to go here or we will get header errors from login form refresh page header.
								  //this has to go above the require directly below
$out2='';
 if(!empty($_POST['name2']) && !empty($_POST['email2']) && !empty($_POST['info2'])){
	$name2=$_POST['name2'];
	$email2=$_POST['email2'];
	$info2=$_POST['info2'];
	$adminemail='steverhyner1@gmail.com';
	
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$body=
				"<p>dear administrator,</p> 
				<p>from: ".$name2."</p<br>
				<p>from email:".$email2."</p><br>
				<p>user comment: ".$info2."</p>";
				
			
			mail($adminemail,'email from maps app',$body,$headers);	
			$out2.='an email has been sent to a site administrator!';			

			

 }else{
	$out2.='please fill out all fields';
 }
require_once'helpers.php';
renderHeader('contact me');
?>
 
	<header>
		<div class="top">
			<a href="index.php"><img src="images/header.png"></a>
		    <h1>Location History App</h1>
		</div>
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
			 
			 
				<h1 class='regh2'>Contact Administrator</h1>
				<p class ="regp">
					If you are having any issues with the site please leave a detailed explanation of what issues you are having! I will do my best to alleviate any problems!
				</p>
				<form  id='contact' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
					<label for='name'>name: </label><input type='text' id='name' name='name2'   value='<?php echo $name; ?>'><br>
					<label for='email'>Email: </label><input type='email' id="email" name='email2'  ><br>
				<textarea id="textBox" class='required' name='info2' cols='10' rows='10' placeholder='user issue here'></textarea><br>
					
					 
				
					<input type='submit' value='contact'>
				 
					 <?php
					 echo$out2;
					 ?>
				</form>
				 
			 </div><!--main- canvas->
		 
	</div><!--main-->
	<?php
		require_once'foot.php';
	?>
</body>
</html>