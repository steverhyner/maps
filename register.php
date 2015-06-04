<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
require_once'phpRegistrationCheck.php';
require_once'phpLoginCheck.php'; //this needs to go here or we will get header errors from login form refresh page header.
								  //this has to go above the require directly below
//---------------------------------------
//if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
	//header("Location: https://" . $_SERVER["HTTP_HOST"] . 	$_SERVER["REQUEST_URI"]);
//}//IF HTTPS
//---------------------------------------
$names=array();
$userName=$_SESSION['user'];
$sql="select uName from login ";
$result=$db->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
	$names[]=$row;
};


require_once'helpers.php';
renderHeader('register');
?>
<script>// turn php user info from data base  into javascript so i can see if user name exists
   var jsArrayNames={};
	function convert(){//convert php  $names array to  var jsArray (javascript array)
	 <?php echo ' jsArrayNames ='.json_encode($names);?>
	}
	convert();
	//-------------------------------------
	// 
   var names=[];
   jsArrayNames.forEach( function(arrItem){
		var nm= arrItem.uName;
		names.push(nm);
	});
	// console.log(names);//javascript user info array converted from php array .function found on showLocations.php
	 //console.log(jsArrayNames);
	 
</script>
 
<body>
	<script>
	$(document).ready(function(){
		$('#uName').keyup(function(){
			$('#update').load('search.php?uName='+$(this).val());
		 });//keyup
		 
		 $('#email').keyup(function(){
			$('#updates').load('search.php?email='+$(this).val());
		 });//keyup
		 
		 
		var valid = false;
		var valids = false;
		var validate = false;
		$('#pass').focus(function(){
			$('.passmsg').remove();
			$('.passmsg2').remove();
			$(this).after('<div class="passmsg">The password must contain one lowercase letter, one uppercase letter, one number, and be at least 6 characters long.</div>');

		});
		
		$('#email').focus(function(){
			$('.msg').remove();
			$(this).after('<div class="msg">must be a valid email</div>');

		});
		
		$('#email').blur(function(){
			var regEx=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
			if(regEx.test($('#email').val())){
			$('.msg').remove();
				$(this).after('<div class="msg">that is a valid email</div>');
				 valids=true;
			}else{
			$('.msg').remove();
				$(this).after('<div class="msg">not a valid email</div>');
				$('.msg').css({color:' red'});
				//setTimeout(function(){
					//$('#email').focus();
				//},1000);
				valids=false;
			}
		});
		
		
		
		$('#pass').blur(function(){
			var regEx=/(?=^.{6,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*/
			if(regEx.test($('#pass').val())){
				$('.passmsg').remove();
				$('.passmsg2').remove();
					$(this).after('<div class="passmsg2">valid password</div>');
					validate=true;
			}else{
				$('.passmsg2').remove();
				$('.passmsg').remove();
					$(this).after('<div class="passmsg2">not a valid password</div>');
					$('.passmsg2').css({color:' red'});
				//	setTimeout(function(){
						//$('#pass').focus();
				//	},1000);
				validate=false;
			 
			}
		});
		$('#register').submit(function(){
			$('.err').remove();
				 
			$('.required').each(function(){
				if(!$(this).val()){
					 $(this).prev().css({color:'red'});//.previous is the inputs
					 $(this).after("<div class='err'>required field warning </div>");
					 valid=false;
				} else{
						 $(this).prev().css({color:'black'});
						 valid = true;
				}
					
			});//foreach
			if((valid)&&(validate)&&(valids)){
				return true;
			
			}else{
				return false;
			}
			

		});//onsubmit
		
	});
</script>
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
			<?php
			if(!isset($_SESSION['user'])){?>
				<h1 class='regh2'>Register</h1>
				<p class ="regp">
					In order to track your event location along with uploading info about the event, please register! 
					Then you will be able to see all of your location check-ins on a map!  
					You will also be able to see the info uploaded with your location! 
					It is a great way to look back to where you have been and to reminisce on those events and special occasions!
					
				</p>
				<form  id='register' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
					<label for='name'>name: </label><input type='text' id='name' name='name' class='required' value='<?php echo $name; ?>'><br>
					<label for='uName'>User name: </label><input type='text' id='uName' name='uName' class='required' value='<?php echo $uName; ?>'><br>
					<div id="update"> </div>
					<label for='email'>Email: </label><input type='email' id="email" name='email' class='required' ><br>
						<div id="updates"> </div>
					<label for='pass'>Password: </label><input type='password'  id="pass" name='pass1' class='required'  ><br>
					<label for='pass2'>Repeat Password: </label><input type='password'  id='pass2' name='pass2' class='required'><br>
					<label for='remember'>remember me: </label><input type='checkbox' name='remember' id='remember'><br>
					<input type='submit' value='Register'>
				 
					 <?php
					 echo$out2;
					 ?>
				</form>
				 <?php
			 }else{?>
				 <h2 class='regh2'>must be logged out to register</h2>
				 <?php
			 }
			 ?>
			 </div><!--main- canvas->
		 
	</div><!--main-->
	<?php
		require_once'foot.php';
	?>
</body>
</html>