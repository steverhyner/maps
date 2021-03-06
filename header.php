<!DOCTYPE html>
 
  <head>
    <title><?php echo $ttl; ?></title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?v=3sensor=true.exp&libraries=places&key="></script>
	 <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	   <style>
	
 @font-face{
	font-family:banger;
	src:url(Bangers/Bangers.ttf);
}  	 
 
@font-face{
	font-family:funFont;
	src:url(justMe/JustMe.ttf);
}  
body{ 
	 
	   outline:1px solid red;
	   }
.main{
  
   overflow:hidden;
   margin: 0px;
   padding: 0px;
		
   }
  
	 

	  /*horizontal ==========================================================*/

#horizontal,#horizontal2 {
	float:right;
	 
}
#horizontal ul {
 
	list-style-type:none;
	width:520px;
 
	margin-top:29px;
	 
	  
	  }
	  #horizontal2 ul {
 
	list-style-type:none;
	width:820px;
 
	margin-top:29px;
	 
	  
	  }
#horizontal ul li ,#horizontal2 ul li{
	text-align:center;
	border:2px outset white;
	 width: 120px;
	 float: right;
	 margin-right: 1%;
	 
}
 
#horizontal li:hover ul,#horizontal2 li:hover ul{
	display:block;
	 
	left: -5px;
	top: 35px;
	z-index:40;
	 
	 
	 
	 
}
#horizontal li:hover ul li ,#horizontal2 li:hover ul li{
	float:none;
}
#horizontal ul li a ,#horizontal2 ul li a{	
	text-decoration:none;
	 background:#7A9DD4;
    
	color:black;
	display:block;
	line-height: 30px;
	height: 30px;
}
	
	
#horizontal  a:active,#horizontal2 a:active {
	border: 5px inset #000000;
}
#horizontal  a:hover ,#horizontal2 a:hover{
	 color: #fff;
	background-color: #214478;

}
 /*header ==========================================================*/
  header{
	  
	    
	   background-image: url("images/white.png");
	   background-repeat: no-repeat;
	       background-size:cover;
	  position: relative;
	  background-color:#ccc;
	  border-bottom: 1px solid red;
	  	  padding-bottom:3px;
	  overflow:hidden;
	 
}
 
.top img{
	float:left;
	margin-left:25%;
	margin-top:1%;
	width: 10%;
	height: 10%;
}
.top h1{
	color:#214478;
	font-family:banger;
	font-size:350%;
	width:50%;
	float:right;
	margin-right:12%;
	margin-top:4%;
}
.clearfix{
	clear:both;	
}
 
#both{
	 
	 
	width:100%;
	overflow:hidden;
}

  #right{
   
    float:right;
	 
	margin-bottom:1px;
 }
 
 
 /*========login form in header==================================================*/
 #loginmsg{
 
 }
#low{
	color:red;
	margin-left:60%;
	width:50%;
 }
 .login{
	font-family:"Comic Sans MS", cursive, sans-serif;
	float:left;
	padding:5px;
    z-index: 2;
	 
}
 .login h2{
	margin: 0px auto;
 
  font-family:funFont;
  font-size:22px;
 }
 #submit{
 font-family:"Comic Sans MS", cursive, sans-serif;
	 
	background:#5E89CD;
	color:white;
	 
 }
 #submit:hover{
	background:white;
	color:black;
	 
 }
 #submit:active{
	background:green;
	color:white;
	 
 }

 /*=======main - map area==================================================*/
 #extra{
	min-height:400px;
 }
 .left{
 
	 float:left;
	  
	 width:28%;
	 margin:1%;
 }
  #map-canvas{
	float:right;
  }
  #map-canvas {
		outline:1px solid red;
	    overflow:hidden;
        min-height: 500px;
        margin: 0px;
        padding: 0px;
		margin:1%;
		width:68%;
   }
   #main-canvas{
		overflow:hidden;
        min-height: 500px;
        
        padding: 1px;
		margin:1%;
		width:98%;
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
		font-size:30px;
		text-align:center;
		padding:5px;
 }
 /*========map form minus search box==================================================*/
 
  
   #mapForm{
  
	position: relative;
	 
 }
 #userInput{
    width:95%;
   margin:auto;
     margin-bottom:1%;
 }
 #imgup{
 width:100%;
  margin:1% auto;
 
 }
 #lbl{
	width:18%;
 }
 #btnSubmit {
	 width:100%;
	 line-height:120%;
	 outline:1px solid black;
	 background:#7A9DD4;
	 color:black;
	  margin:2% auto;
 
 }
 #imageFile{
	  line-height:120%;
	 outline:1px solid black;
	 background:#7A9DD4;
	 color:black;
	width:80%;
	float:right;
	 margin:1px auto;
 
 }
 
 #textBox{
	  width:99%;
	  margin:1% auto;
	 outline:1px solid black;
	 background:#7A9DD4;
	 
 }
    
 #btn{
      width:95%;
	  margin:auto;
      background-color: #ccc;
    }
 #search{

	width:100%;
	margin:1% auto;
 }
 #upload{
    background:#ccc;
    border:1px solid red;
	width:100%;
  	padding:5px;
	 
 }
  

 /*========registration form on registration page==================================================*/
  #register{
  font-family:"Comic Sans MS", cursive, sans-serif;
	position:relative;
    background:#ccc;
	width:60%;
    outline:1px solid red;
	padding:5px;
	 z-index: 3;
	 
	 margin: 15px auto;
 }

 
 
 #register label{
	width: 33%;
	text-align:right;
	display:inline-block; 
 }
 .regh2 {
	font-size:30px;
    font-family:"Comic Sans MS", cursive, sans-serif;
	text-align:center;
	  
 }
 .regp{
	padding-bottom:15px;
	font-family:"Comic Sans MS", cursive, sans-serif;
 
    width:90%;
	margin: 15px auto;
	  
 }
#register input{
 
	margin: 5px;
}
#register input[type='submit']{
	font-family:"Comic Sans MS", cursive, sans-serif;
	margin-left: 15%;
	background:#5E89CD;
	color:white;
	width:25%;
}
#register input[type='submit']:hover{
	 
	background:white;
	color:black;
	 
}
#register input[type='submit']:active{
	 
	background:green;
	color:white;
	 
}
/*--------contact-----------------*/
 #contact{
  font-family:"Comic Sans MS", cursive, sans-serif;
	position:relative;
    background:#ccc;
	width:50%;
    outline:1px solid red;
	padding:5px;
	 z-index: 3;
	  
	 margin: 15px auto;
 }

 
 #contact textarea{
 color:black;
	width: 50%;
margin-left: 15%;
 }
 #contact label{
	width: 23%;
	text-align:right;
	display:inline-block; 
 }
 #contact input{
 
	margin: 5px;
}
#contact input[type='submit']{
	font-family:"Comic Sans MS", cursive, sans-serif;
	margin-left: 15%;
	background:#5E89CD;
	color:white;
	width:25%;
}
#contact input[type='submit']:hover{
	 
	background:white;
	color:black;
	 
}
#contact input[type='submit']:active{
	 
	background:green;
	color:white;
	 
}

/*--------reset-----------------*/
 #reset{
  font-family:"Comic Sans MS", cursive, sans-serif;
	position:relative;
    background:#ccc;
	width:60%;
	min-height:200px;
    outline:1px solid red;
	padding:5px;
	 z-index: 3;
	 
	 margin: 15px auto;
 }
 
 
 #reset label{
	width: 33%;
	text-align:right;
	display:inline-block; 
 }
  
#reset input{
 
	margin: 5px;
}
#reset input[type='submit']{
	font-family:"Comic Sans MS", cursive, sans-serif;
	margin-left: 5%;
	background:#5E89CD;
	color:white;
	width:25%;
}
#reset input[type='submit']:hover{
	 margin-left:15%;
	background:white;
	color:black;
	 
}
#reset input[type='submit']:active{
	 
	background:green;
	color:white;
	 
}




/*--------reset-----------------*/
/*--------admin page-----------------*/

#deleteUser{
	margin:auto;
	outline:1px solid red;
	width: 30%;
	padding: 1%;
	margin-bottom:1%;
}
#adminInfo{
	outline:1px solid red;
	width: 50%;
margin: auto;
	padding: 1%;
	 

}
#userInformation{
	 
 
	 
	padding: 1%;
	 
}
#userIn{
	 margin:auto;
	 
	border-collapse:collapse;
}
#userIn tr:nth-child(odd){
	background:#ccc;
}
#userIn th{
	background:#5E89CD;
}
#userIn2 th{
	background:#5E89CD;
}
#userIn2{

	margin:auto;
	margin-top: 2%;
	border-collapse:collapse;
}
#userIn2 td:last-child{
	text-align:center;
	 
}
#userIn2 td:nth-child(3){
	width: 60%;
}
#userIn2 tr:nth-child(odd){
	background:#ccc;
}
#userIn2 td:first-child{
	width: 10%;
	 
}
#getInfo{
width: 90%;
 padding:1%;
 margin: auto;
clear:both;
outline:1px solid red;
margin-bottom: 1%;
}
#getInfo2{
 padding:1%;
clear:both;
outline:1px solid red;
}
#delete input{
	margin:1%;
}
#get input{
	margin:3px;
}
/*--------admin page-----------------*/

 /*========registration form on registration form alerts=================================================*/
  #update{
  position:absolute;
   color:red;
   top:17%;
	 right:5%;
  
  }
    #updates{
  position:absolute;
   color:red;
   top:31%;
	left:1%;
  
  }
  
  .err{
	  color:red;
	 min-height:28px;
	 min-width:28px;
	 position:absolute;
	 bottom:1%;
	 right:5%;
	  
	 }
.msg{
		position:absolute;
		top:33%;
		right:5%;
		
	 }
 .passmsg{
	      
		 padding:1%;
	 width:28%;
	  background:#ccc;
	 	position:absolute;
		top:7%;
		left:67%;
	 }
	 .passmsg2{
 
	 	position:absolute;
		top:48%;
		right:5%;
	 }
	 
	 .passmsgB{
	      
		 	 padding:1%;
	 width:28%;
	  background:#ccc;
	 	position:absolute;
		top:.1%;
		left:67%;
	 	 
	 }
	 .passmsg2B{
 	 padding:1%;
	 	 	position:absolute;
		top:32%;
		right:5%;
	 }
	   .errB{
	   	 padding:1%;
	  color:red;
	 min-height:28px;
	 min-width:28px;
	 position:absolute;
	 bottom:1%;
	 right:5%;
	  
	 }
	 .after{
	 padding:1%;
	  position:absolute;
	 top:46%;
	 right:2%;
	 }
	  /*details page ==========================================================*/ 
	   .details{
	 outline:1px solid red;
	 width:80%;
	 margin:auto;
	 padding:3%;
 
	 
	 }
	  .details img{
	  margin-top:2%;
	  margin-left:15%;
	 width:60%;
 	}
	 /* ==========================================================*/ 
 /*========footer==================================================*/
 
 footer{
	  border-top:1px solid red;
	 overflow:hidden;
	 margin-top:30px;
		width: 100%;
		min-height: 100px;
		margin-bottom: 20px;
		background-color: #ccc;
 }
 .footbottom{
	 
	 overflow:hidden;
	 margin: 5px auto;
		width: 90%;
		 
		min-height: 4em;
	 
	border-top: 1px solid   #747373;	
 }
  
 
 #firstPartOfNav{
		width: 30%; 
		float:left;
		margin-top: 10px;
		 
		
		 
		
 }
  #firstPartOfNav p{
		 
		  margin-left: 5%;
		
		 
		
 }
 
 .footNav{
	  margin-top:10px;
		 float:right;
		   
	    margin-right: 10%;
		 width:60%;
		  
		 
		 
		 
 }
   
 
.footNav ul{
	 
	 height: 30px;
	width: 100%;
	 
	 
	overflow: hidden;
	margin: 0  auto;
	margin-right:  0%;
	 
	 
	 
}
.footNav ul li{
	width: 15.0%;
	height: 30px;
	margin-top: 7px;
	margin-bottom: 7px;
    margin-left:  1%;
	list-style-type:none;
	float:right;
	 
	display: inline-block;
}
.footNav ul li:nth-child(4){
	 
}
.footNav ul li a{
	 
	 
     font-size: .75em;
     font-weight:bold;
	  display:block;
		text-align:center;
		color:black;
		  
		line-height:30px;
		text-decoration: none;
}
.footNav ul li a:hover{
	background-color: black;
	color:white;	
}
.footNav ul li a:active{
	  color: red;
	 
}
.footNav ul li a:selected{
	  color: blue;
	 
}

.footNav ul li:first-child{
	margin-left:.1em;
}
.footNav ul li:last-child{
	margin-right: 0px;	
}
 
.footerparagraph{
	margin: 0 auto;
	width: 95%;
	  
	  
	  overflow:hidden;
	  
}
 
#footparagraph1 {
	 
	float:left;
	width:60%;
	margin: 0 auto;
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	  
	 
	   
	 	 	
}
#footparagraph1 div {
	 
	 
	 
	margin: 0 auto;
	margin-top: 20px;
	 	
}
 
#footparagraph1 div p{
	margin-left: 10%;
}
#footparagraph2{
	 
	float:right;
	width: 35%;
	margin: 0 auto;
	margin-right: 1%;
	 font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	  
	 
}
#footparagraph2 div{
	 
	margin: 0 auto;
	 
	margin-top: 20px;
	 
	 
}

#footparagraph2 div p{
	margin-left: 15%;
}
</style>
<script type="text/javascript" src="map.js"> </script>
 </head>