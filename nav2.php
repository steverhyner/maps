 <nav id="horizontal2">
		 <ul>
			
			   <?php
				 if(isset($_SESSION['admin'])){
				?>
			
			 
				
		
				<li><a href="userUplads.php">delete upload</a></li>
				 <li><a href="userComments.php">delete Comment</a></li>
		
			 <li><a href="passwordChange.php">change Password</a></li>
			 		
				<li><a href="deleteUser.php">delete user</a></li>
				<?php
				}
				?>
			 <li><a href="admin.php">admin home</a></li>
			 
			 
		 
			 
		
		 </ul>
		
<p class="clearfix"></p>
</nav>