 <nav id="horizontal">
		 <ul>
			
			 
			
			
			  <?php
				 if(isset($_SESSION['user'])){
				?>
				
				<li><a href="history.php">History table</a></li>
				<li><a href="showLocations.php">Your Pins</a></li>
				 <li><a href="upload.php">Pin a location</a></li>
				
				<?php
				 
				 } ?>
			
			 <?php
			  if(!isset($_SESSION['user'])){
			 ?> <li><a href="register.php">register</a></li>
			 <?php
				 
				 } ?>
			   
			  <li><a href="index.php">home</a></li>
		 
			 
		
		 </ul>
		
<p class="clearfix"></p>
</nav>