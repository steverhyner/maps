<?php 
SESSION_START();
$out2='';
require_once('../../require/pdoConnect.php');
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$stmt=$db->prepare("select * from login   where  email=?   ");
	$stmt->bindParam(1,$email);
	$stmt->execute();
	if($stmt->fetch()){
		 $code=rand(100,999);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$message=
			"<p>dear user,</p> 
						 
			<p>Your password reset activation link is:<br> maps.steverhyner.biz/reset.php?email=$email&code=$code'</p>
			<p>copy link to browser window!</p>
						
			<p>Thanks,</p>
						
			<p>Steve</p>";
		mail($email,'location History App',$message,$headers);		
		$out2.= " Reset link sent to email";
	}else{
		$out2.= "No user exists with this email";
	};
};//isset
require_once'phpLoginCheck.php'; //this needs to go here or we will get header errors from login form refresh page header.
								  //this has to go above the require directly below
require_once'helpers.php';
renderHeader('forgot');
?>
<body>
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
			<form id="register" action="forgot.php" method="POST">
				<label>Enter you email :</label><input type="text" name="email"><br>
				<input type="submit" name="submit" value="get reset link">
				<?php
				echo $out2;
				?>
			</form>
		</div><!--maincanvas-->
		 
	</div><!--main-->
<?php
	require_once'foot.php';
?>
</body>
</html>
