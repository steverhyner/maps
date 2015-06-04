<?php
SESSION_START();
$out2='';
require_once('../../require/pdoConnect.php');
if(isset($_GET['email'])){
		$uName=$_GET['uName'];
		$email=$_GET['email'];
	 
}else{//isset in url
			//header("refresh:2; index.php"); 
};
		 
if(!empty($_POST['uName'])&& !empty($_POST['email']) &&!empty($_POST['pass1']) && !empty($_POST['pass2'])){
	$uName=$_POST['uName'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	if($pass1 != $pass2){
		$out2 .= "passwords don't match";
	}else{
				 
		$salt= mcrypt_create_iv(16,MCRYPT_DEV_URANDOM);
		$pass1=$salt.$pass1;
		$hash=hash('sha512',$pass1);
		$stmt=$db->prepare("update login  set password=? , salt=? where email='$email' and uName='$uName' ");
		$stmt->bindParam(1,$hash);
		$stmt->bindParam(2,$salt);
		try{
				$stmt->execute();
				$out2.="password changed";
				$email=$_POST['email'];
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$body=
					"<p>dear " .$uName .",</p> 
					<p>your password was recently updated.</p>
					<p>maps.steverhyner.biz/index.php</p>
											
					<p>Thanks,</p>
					<p>Steve</p>";
				mail($email,'password updated',$body,$headers);		
				
		}catch(Exception $e){ //this is to catch  an existing user name error
				$out2.="there was a problem";
		}//try catch
					}
}else{//new pass info not empty
	$out2 .= "fill out all fields";
};

require_once'helpers.php';
renderHeader('reset');
   
?>
<script>
	$(document).ready(function(){
		var valid = false;
		var validate = false;
		var validates = false;
		var pass=$('#pass').val();
		var passed=$('#passed').val();
		$('#pass').focus(function(){
			$('.passmsgB').remove();
			$('.passmsg2B').remove();
			$('.after').remove();
			$(this).after('<div class="passmsgB">The password must contain one lowercase letter, one uppercase letter, one number, and be at least 6 characters long.</div>');

		});//.focus
	 
		$('#pass').blur(function(){
			var regEx=/(?=^.{6,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*/
			if(regEx.test($('#pass').val())){
				$('.passmsgB').remove();
				$('.passmsg2B').remove();
				$(this).after('<div class="passmsg2B"> valid password</div>');
				validate=true;
			}else{
				$('.passmsg2B').remove();
				$('.passmsgB').remove();
				$(this).after('<div class="passmsg2B">not a valid password</div>');
				$('.passmsg2B').css({color:' red'});
				validate=false;
			};
		});//.blur
		
		$('#reset').submit(function(){
			$pass=$('#pass').val();
			$passed=$('#passed').val();
			if($pass ==$passed){
				validates=true;
				$('.after').remove();
				$('#passed').after('<div class="after">passwords match</div>');
			}else{
				$('.after').remove();
				$('#passed').after('<div class="after">unmatched passwords</div>');
				$('.after').css({color:' red'});
				validates=false;
			};//pass==pass
			$('.errB').remove();
				 
			$('.required').each(function(){
				if(!$(this).val()){
					 $(this).prev().css({color:'red'});//.previous is the inputs
					 $(this).after("<div class='errB'>required fields</div>");
					 valid=false;
				} else{
						 $(this).prev().css({color:'black'});
						 valid = true;
				};
					
			});//foreach
			if((valid)&&(validate) &&(validates)){
			return true;
			
			}else{
				return false;
			};
		});//onsubmit
		
	});
</script>
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
			<h1 class='regh2'>reset password</h1>
			<form  id="reset" action="reset.php" method="POST">
				<label>userName: </label> <input type="text" name="uName" class='required'><br>
				<label>email: </label> <input type="email" name="email" class='required'><br>
				<label>New password : </label> <input type="password" name="pass1" id="pass" class='required'><br>
				<label>Repeat password : </label> <input type="password" name="pass2" id="passed" class='required'><br>
				<input type="submit" name="submit" value="Send">
				<?php
				echo$out2;
				?>
			</form>
		</div><!--maincanvas-->
		 
	</div><!--main-->
			<?php
			require_once'foot.php';
			?>
</body>
</html>
