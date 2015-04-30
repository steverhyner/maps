<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
 
 
 
	 
	header("refresh:2; index.php");
	 
?>
 
 
 
   <?php
  require_once'helpers.php';
  renderHeader('thank-you');
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
  
 	 <h2 class='regh2'>thank you for registering</h2>
  
  </div><!--mapform-->
	</div><!--main-->
<div class='foot'>
copyright &copy; 2015 Steve Rhyner Web Development
</div><!--foot-->
	</body>
</html>