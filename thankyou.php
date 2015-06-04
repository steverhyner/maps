<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
require_once'helpers.php';
renderHeader('thank-you');
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
	 <div id='mapForm'>
	    <h1 class='regh2'>thank you for registering.  Must be logged out to register!</h1>
		<div id='extra'></div><!--extra-->
	 </div><!--mapform-->
	</div><!--main-->
			<?php
			require_once'foot.php';
			?>
</body>
</html>