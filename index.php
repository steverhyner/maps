<?php
SESSION_START();
 
require_once('../../require/pdoConnect.php');

require_once'phpLoginCheck.php';
?>
  

 
  <?php
  require_once'helpers.php';
  renderHeader('home');
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
	if(isset($_SESSION['user'])){?>
		
			<h2 id='maph2'>Use form to pin restaurant location, then upload location with a comment and/or picture to remember the occassion</h2>
		
		 
			<form  id='upload'action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
				<div id='btn'>
		          <input id="search" name='search' class='controls' type="text" size="50" placeholder="enter search here"><br>
				  <input type="button" onclick="pinLocation()" value="pin restaurant location" id='button' />
				</div><!--btn-->
				<div id='userInput'>
					<textarea id="textBox" name='info' cols='30' rows='10'>comment</textarea><br>
					<input type='file' name='upload' value='upload picture' placeholder='upload picture'><br>
					<input id='btnSubmit' type='submit' value='upload info and retaurant location'>
				</div>
			</form>
	
		 <?php
	}else{?>
		 
			<h1 id='loginh2'>please log in to participate with logging your restaurant history</h1>
		  
		
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