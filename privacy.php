<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
require_once'phpRegistrationCheck.php';
require_once'phpLoginCheck.php'; //this needs to go here or we will get header errors from login form refresh page header.
								  //this has to go above the require directly below
require_once'helpers.php';
renderHeader('register');
   
?>
<body>
	<script>
	$(document).ready(function(){
		var valid = false;
		var valids = false;
		var validate = false;
		$('#pass').focus(function(){
			$('.passmsg').remove();
			$('.passmsg2').remove();
			$(this).after('<div class="passmsg">The password must contain one lowercase letter, one uppercase letter, one number, and be at least 6 characters long.</div>');

		});//.focus
		
		$('#email').focus(function(){
			$('.msg').remove();
			$(this).after('<div class="msg">must be a valid email</div>');

		});//.focus
		
		$('#email').blur(function(){
			var regEx=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
			if(regEx.test($('#email').val())){
				$('.msg').remove();
				$(this).after('<div class="msg">that is a valid email</div>');
				 valids=true;
			}else{
				$('.msg').remove();
				$(this).after('<div class="msg">that is not a valid email</div>');
				$('.msg').css({color:' red'});
				valids=false;
			};//regex
		});//.blur
		
		$('#pass').blur(function(){
			var regEx=/(?=^.{6,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*/
			if(regEx.test($('#pass').val())){
				$('.passmsg').remove();
				$('.passmsg2').remove();
					$(this).after('<div class="passmsg2">that is a valid password</div>');
						validate=true;
			}else{
			$('.passmsg2').remove();
			$('.passmsg').remove();
				$(this).after('<div class="passmsg2">not a valid password</div>');
				$('.passmsg2').css({color:' red'});
				validate=false;
			};//regex
		});//.blur
		
		$('#register').submit(function(){
			$('.err').remove();
			$('.required').each(function(){
				if(!$(this).val()){
					 $(this).prev().css({color:'red'});//.previous is the inputs
					 $(this).after("<div class='err'>red identifies required field warning </div>");
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
			};
		});//onsubmit
		
	});//doc.ready
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
			<div class="bio">
				 <h1 class='maph2'>Privacy Policy</h1>
				 
				<p><strong> What information do we collect?</strong></p>
				<p>We collect information from you when you register on our site or fill out a form.</p>
				<p>When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address or phone number. You may, however, visit our site anonymously.</p>
				<p><strong>What do we use your information for?</strong></p>
				<p>Any of the information we collect from you may be used in one of the following ways:</p>
				<p>To personalize your experience
				(your information helps us to better respond to your individual needs)</p>
				<p>To improve our website
				(we continually strive to improve our website offerings based on the information and feedback we receive from you)</p>
				<p>To improve customer service
				(your information helps us to more effectively respond to your customer service requests and support needs)</p>
				<p>To process transactions
				Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested.</p>
				<p>To administer a contest, promotion, survey or other site feature</p>
				<p>To send periodic emails</p>
				<p>The email address you provide may be used to send you information, respond to inquiries, and/or other requests or questions.</p>
				<p><strong>How do we protect your information?</strong></p>
				<p>We implement a variety of security measures to maintain the safety of your personal information when you enter, submit, or access your personal information.</p>
				<p><strong>Do we use cookies?</strong></p>
				<p>Yes (Cookies are small files that a site or its service provider transfers to your computers hard drive through your Web browser (if you allow) that enables the sites or service providers systems to recognize your browser and capture and remember certain information</p>
				<p>We use cookies to compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future. We may contract with third-party service providers to assist us in better understanding our site visitors. These service providers are not permitted to use the information collected on our behalf except to help us conduct and improve our business.</p>
				<p><strong>Do we disclose any information to outside parties?</strong></p>
				<p>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>
				<p>Oregon Online Privacy Protection Act Compliance</p>
				<p>Because we value your privacy we have taken the necessary precautions to be in compliance with the Oregon Online Privacy Protection Act. We therefore will not distribute your personal information to outside parties without your consent.</p>
				<p>Childrens Online Privacy Protection Act Compliance</p>
				<p>We are in compliance with the requirements of COPPA (Childrens Online Privacy Protection Act), we do not collect any information from anyone under 13 years of age. Our website, products and services are all directed to people who are at least 13 years old or older.</p>
				<p><strong>Your Consent</strong></p>
				<p>By using our site, you consent to our web site privacy policy.</p>
				<p>Changes to our Privacy Policy</p>
				<p>If we decide to change our privacy policy, we will post those changes on this page.</p>
				<p><strong>Contacting Us</strong></p>
				<p>If there are any questions regarding this privacy policy you may contact us using the information below.</p>
				<p>http://www.steverhyner.biz</p>
				 
					
			</div><!--bio-->
		</div><!--maincanvas-->
		 
	</div><!--main-->
<?php
	require_once'foot.php';
?>
</body>
</html>