 <nav id="horizontal">
		 <ul>
			 <li><a href="index.php">home</a></li>
			 <li><a href="register.php">register</a></li>
			  <?php
				 if(isset($_SESSION['user'])){
				?><li><a href="showLocations.php">Your History</a></li> <?php
				 } ?>
					  
			 
		 
			 <li><a href="#">#</a></li>
		
		 </ul>
		
<p class="clearfix"></p>
</nav>