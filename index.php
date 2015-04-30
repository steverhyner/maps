<?php
SESSION_START();
 
require_once('../../../../require/pdoConnect.php');

require_once'phpLoginCheck.php';
$out2='';
 $err='';

function getCoordinates($loc){
	$address = str_replace(" ", "+", $loc); // replace all the white space with "+" sign to match with google search pattern
	$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
	if (function_exists('curl_version'))
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$content = curl_exec($curl);
			curl_close($curl);
		}
	else if (file_get_contents(__FILE__) && ini_get('allow_url_fopen'))
	{
		$content = file_get_contents($url);
	}
	else
	{
		echo 'You have neither cUrl installed nor allow_url_fopen activated. Please setup one of those!';
	}
	$json = json_decode($content,TRUE); //generate array object from the response from the web
	return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
	 
}
 
 
 
 $sql= "CREATE TABLE IF NOT EXISTS userInfo(
	uID int primary key Auto_increment,
	uName VARCHAR(128) NOT null ,
	locationName varchar(259) not null,
	location varchar(55) not null,
	userComment blob,
	fileName varchar(255)
	
	)";
	$result=$db->query($sql);
 $flag=true;
if(!empty($_POST['search'])){
	$loc=$_POST['search'];

	getCoordinates($loc);
	$location=getCoordinates($loc);
	$out2.=$loc."<br>";
	$out2.=$location."<br>";
	 
	
	
	if(!empty($_POST['info']) ){
		$info=$_POST['info'];
	}else{
		$err.=" no comment for this upload!<br>";
		$info='no info from user for this upload';
	}
	
	 
	 	 
	if(!empty($_FILES['image']['name']) ){
	 
			$tempName=$_FILES['image']['tmp_name'];
		if($_FILES['image']['error']){ //checks to see if any errors occur from the uploaded image on the browser.  a 0 is no errors.
			$err.= "file upload error: {$_FILES['image']['error']} <br>";
			$flag=false;
		}
		if($_FILES['image']['size'] > 4000000){  //4mg biggest size
			$err.="file size is to big my friend, max size is 4mb<br>";
			$flag=false;
			
		}
		 
		if(!exif_imagetype($tempName)){  //checks the file type to see if it is an image or not.
			$err.=" this is not an image fine sir/ma'am!<br>";
			$flag=false;
		}
		if($flag){
		 
			$cleanFileName=str_replace(' ','_',$_FILES['image']['name']);
			//timestamp the file to make it original
			$ts=time();
			$cleanFileName=$ts.$cleanFileName;
			//$err.=$cleanFileName."<br>";
			move_uploaded_file($tempName,"uploads/".$cleanFileName);//move the temp file to the uploads folder. be sure to add an uploads folder
		}
	}else{
			$err.=" no image for this upload!<br>";
			$cleanFileName="";
	}
$uName=$_SESSION['user'];	
		 $stmt=$db->prepare("INSERT INTO userInfo(uName,location,userComment,fileName,locationName)
	 values(?,?,?,?,?)");
	 $stmt->bindParam(1,$uName);
	 $stmt->bindParam(2,$location);
	 $stmt->bindParam(3,$info);
	 $stmt->bindParam(4,$cleanFileName);
	 $stmt->bindParam(5,$loc);
	 $stmt->execute();

}else{
	$err.="must pick a location";
}
	
	//$out2.=$info ."<br>";
 	
	//$out2.=$uName."<br>";


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
  
	<?php
	if(isset($_SESSION['user'])){?>
		 <div id="map-canvas"></div>
			<h2 class='maph2'> Upload location with a comment and/or picture to remember the occassion</h2>
		
		 
			<form  id='upload'action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' enctype='multipart/form-data'>
				<div id='btn'>
		          <input id="search" name='search' class='controls' type="text" size="50" placeholder="enter search here"><br>
			 
				</div><!--btn-->
				<div id='userInput'>
					<textarea id="textBox" name='info' cols='30' rows='10' placeholder='comment'></textarea><br>
					<label>image: </label><input type='file' name='image'   placeholder='upload picture'><br>
					 
					<input id='btnSubmit' onclick="pinLocation()"   type='submit' value='upload info and retaurant location'>
				</div>
				<?php
				echo$out2;
				echo$err;
				?>
			</form>
	
		 <?php
	}else{?>
		  <div id="main-canvas">
			<h1 class='regh2'>please log in to participate with logging your restaurant history</h1>
		  </div>
		
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