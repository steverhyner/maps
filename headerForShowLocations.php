<!DOCTYPE html>
 
  <head>
    <title><?php echo $ttl; ?></title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
     <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?v=3sensor=true.exp&libraries=places&key="></script>
	   <style>
 	 
   <style>
 	 
@font-face{
	font-family:myFont;
	src:url(ihopRegular/ihop.ttf);
}  
 
@font-face{
	font-family:funFont;
	src:url(justMe/JustMe.ttf);
}  
body{ 
	 
	   outline:2px solid red;
	   }
.main{
  
   overflow:hidden;
   margin: 0px;
   padding: 0px;
		
   }
  
	 

	  /*horizontal ==========================================================*/

#horizontal {
	
	 
}
#horizontal ul {
	list-style-type:none;
	width:520px;
	margin:   auto;
	margin-top:14px;
	 
	  
	  }
#horizontal ul li {
	text-align:center;
	border:2px outset red;
	 width: 120px;
	 float: left;
	position: relative;
}
#horizontal li ul {
	display: none;
	margin:0;
	padding: 0;
}
#horizontal li:hover ul{
	display:block;
	position:absolute;
	left: -5px;
	top: 35px;
	z-index:40;
	 
	 
	 
	 
}
#horizontal li:hover ul li {
	float:none;
}
#horizontal ul li a {	
	text-decoration:none;
	 background:#ccc;
    
	color:#191970;
	display:block;
	line-height: 30px;
	height: 30px;
}
	
	
#horizontal  a:active {
	border: 5px inset #000000;
}
#horizontal  a:hover {
	 color: #fff;
	background-color: #191970;

}
 /*header ==========================================================*/
  header{
	   background-image:url("images/header.png");
	  background-position:center top;
	  background-size:auto 40%;
	  background-repeat:repeat-x;
	  
	  position: relative;
	  background-color:#ccc;
	  border-bottom: 2px solid red;
	  overflow:hidden;
	 
}
.clearfix{
	clear:both;	
}
header h1{
	font-family:"Comic Sans MS", cursive, sans-serif;
	 
	width:30%;
	line-height:150%;
	margin:6% auto;
	margin-bottom:20px;
	text-align:center;
	color:black;
	background:#ccc;
    
	 
	 
}
#both{
	margin:auto;
	position:relative;
	width:100%;
	overflow:hidden;
}

  #right{
    position:absolute;
    float:right;
	width:48%;
	bottom:1px;
	right:1px;
 }
 
 
 /*========login form in header==================================================*/
 .login{
	
	 
	background:#ccc;
	float:left;
	 
	padding:5px;
    z-index: 2;
	 
	 
	 
 }
 .login h2{
 margin: 0px auto;
 
  font-family:funFont;
  font-size:32px;
 }

 /*=======main - map area==================================================*/
 
  #map-canvas,#main-canvas{
	    overflow:hidden;
        min-height: 500px;
        margin: 0px;
        padding: 0px;
		border-bottom: 2px solid red;
   }
  #loginh2{
  font-family:"Comic Sans MS", cursive, sans-serif;
	background:#ccc;
    z-index: 6;
    position:absolute;
	top: 1%;
	left: 15%;
	padding:5px;
 }
   .maph2{
   font-family:"Comic Sans MS", cursive, sans-serif;
   font-size:20px;
	 background:#ccc;
	 z-index: 6;
	 position:absolute;
	 top: 1%;
	 left: 20%;
     padding:5px;
 }
 /*========map form minus search box==================================================*/
   #mapForm{
	position: relative;
	 
 }


  #upload{
    background:#ccc;
    background:rgba(255,255,255,0.5);
	width:35%;
    outline:1px solid red;
    position:absolute;
    top: 15%;
	left: 6%;
	padding:5px;
	 z-index: 3;
	 
 }
 #textBox{
	
	margin-top:5px;
 }
 #userInput{
    margin-left:1%;
     margin-bottom:1%;
 }
 #btnSubmit{
	margin-top:1%;
 }
 /*======= map form search /autocomplete area and button==================================================*/
 #btn{
      width:96%;
	  margin-left:1%;
      z-index: 5;
      background-color: #ccc;
      padding: 3px;
      border: 1px solid #999;

 }
 #search{

	width:96.3%;
	margin-left:  1.5%;
 }
 #button{
	margin-left:  1.5%;
	width:97%;
 }

 /*========registration form on registration page==================================================*/
  #register{
    background:#ccc;
    background:rgba(255,255,255,0.9);
	width:33%;
    outline:1px solid red;
   
	padding:5px;
	 z-index: 3;
	 margin: 5px auto;
 }
 
 
 #register label{
	width: 30%;
	text-align:right;
	display:inline-block; 
 }
 .regh2 {
  
    
	text-align:center;
	  
 }
 .regp{
  font-weight:bold;
    width:90%;
	  margin: 15px auto;
	  
 }
#register input{
	margin: 5px;
}
 /*========footer==================================================*/
  .foot{
 min-height:100px;
 background:#ccc;
 }
</style><script type="text/javascript" src="showLocations.js"> </script>
 </head>