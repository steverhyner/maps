<?php
SESSION_START();
require_once('../../require/pdoConnect.php');
if(!isset($_SESSION['user'])){
  header("Location: index.php"); 
}
$out2='';
$out3='';
$err='';
function getCoordinates($loc){
	$address = str_replace(" ", "+", $loc); // replace all the white space with "+" sign to match with google search pattern
	$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
	if(function_exists('curl_version'))
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
	 
};
$sql= "CREATE TABLE IF NOT EXISTS userInfo(
	uID int primary key Auto_increment,
	uName VARCHAR(128) NOT null ,
	locationName varchar(259) not null,
	location varchar(55) not null,
	userComment blob,
	fileName varchar(255) ,
	dateCreated DATE not null 
 
	
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
	if(!empty($_POST['search']) &&  !empty($_POST['info'])){
		$out3.="successful upload! view your upload on your <a href='/history.php'>history table page</a> or your  <a href='/showLocations.php'>pins page</a>!";
	 };
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
			$cleanFileName="placeholder.jpeg";
	}
	$uName=$_SESSION['user'];	
	$dte=DATE("Y/m/d");
	$stmt=$db->prepare("INSERT INTO userInfo(uName,location,userComment,fileName,locationName,dateCreated)
	values(?,?,?,?,?,?)");
		 $stmt->bindParam(1,$uName);
		 $stmt->bindParam(2,$location);
		 $stmt->bindParam(3,$info);
		 $stmt->bindParam(4,$cleanFileName);
		 $stmt->bindParam(5,$loc);
		 $stmt->bindParam(6,$dte);
		 $stmt->execute();
	?>
	 <script>// turn php user info from data base  into javascript so i can populate map with wins
	   var jsArray={};
		function convert(){//convert php  $locations array to  var jsArray (javascript array)
		 <?php echo ' jsArray ='.json_encode($loc);?>
		
		}
	   convert();
	//-------------------------------------

	</script>
	<?php
}else{
	$err.="must pick a location from search box and leave a comment";
}

require_once'helpers.php';
renderHeader('upload');
  ?>
<body>
	 <script>
	  var $_POST = <?php echo json_encode($_POST); ?>;
	  $(document).ready(function(){
	  $('#upload').submit(function(){
		
		
			
		 
	 
			var abort=false;
				  
			$('.error').remove();
			var checkForSpace = $('#search').val().trim().split(" ");//checks for two words
			var str= $('#search').val();//use str to check for comma
			if($('#search').val().length <3 || checkForSpace.length < 2 || str.indexOf(',')==-1){
			 alert('is that realy a valid address?  Most addresses have at least two words and a comma in the address? Do you really want to try and save this to your history?');
			 abort=true;
			}
			
			
			 
		
		 
			$('.required').each(function(){
				if($(this).val()===''){
					$(this).after('<div class="error">this is a required field</div>');
						$('.error').css({color:' red'});
					abort=true;
				}
			});//go through each required value
			if(abort){return false;}else{return true;}
		});//.submit
		
		
	});//,ready

	 
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
		<div id='mapForm'>
			<h1 class='maph2'> Upload location with a comment and/or picture to remember the occassion</h1>
			<div class="left">
				<div id="red">
					<?php
						echo $out3;
					?>
				</div>
				<form  id='upload' action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' enctype='multipart/form-data'>
					<div id='btn'>
					  <input id="search" class='required' name='search'   type="text" size="50" placeholder=" search  location here"><br>
					</div><!--btn-->
					<div id='userInput'>
						<textarea id="textBox" class='required' name='info' cols='30' rows='10' placeholder='comment'></textarea><br>
						<div id='imgup'><label id='lbl'>image: </label><input type='file' name='image' id='imageFile' placeholder="enter search here"  accept='image/*' ></div>
						<input id='btnSubmit'  type='submit' value='upload info and retaurant location'>
					</div>
					<?php
					echo$out2;
					echo$err;
					?>
				</form>
			</div><!--left-->
			<div id="map-canvas"></div>
		</div><!--mapform-->
	</div><!--main-->
	<?php
	require_once'foot.php';
	 ?>
</body>
</html>