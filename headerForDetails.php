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
#horizontal {
	float:right;
	 
}
#horizontal ul {
 
	list-style-type:none;
	width:520px;
 
	margin-top:29px;
	 
	  
	  }
#horizontal ul li {
	text-align:center;
	border:2px outset white;
	 width: 120px;
	 float: right;
	 margin-right: 1%;
	 
}
 
#horizontal li:hover ul{
	display:block;
	 
	left: -5px;
	top: 35px;
	z-index:40;
	 
	 
	 
	 
}
#horizontal li:hover ul li {
	float:none;
}
#horizontal ul li a {	
	text-decoration:none;
	 background:#7A9DD4;
    
	color:black;
	display:block;
	line-height: 30px;
	height: 30px;
}
	
	
#horizontal  a:active {
	border: 5px inset #000000;
}
#horizontal  a:hover {
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
	margin:auto;
	 
	width:100%;
	overflow:hidden;
}

  #right{
   
    float:right;
	 
	margin-bottom:1px;
 }
 
 
 /*========login form in header==================================================*/
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
 .login h2{
    margin: 0px auto;
	font-family:funFont;
	font-size:22px;
 }
 /*=======main -top of mapvdiv==================================================*/
 
 
  /*========registration form on registration page==================================================*/
  #register{
    background:#ccc;
   outline:1px solid red;
	width:90%;
    
   
	padding:5px;
	 z-index: 3;
	 margin: 5px auto;
 }
 
 
 #register label{
	font-size:140%;
	 
	 
	display:inline-block; 
 }
  hr{
   border: 0;
  height:1px;
   color:red;
   background:red;
    outline:1px solid red;
   
   }
  
#register input{
	margin: 5px;
}
#displayComments{
	margin-top:2%;
	 outline:1px solid red;
	 font-size:140%;
	 padding:1%;
}
  
 
 /*=======main - map area==================================================*/
 .left{
  
	 float:left;
	 font-family:funFont;
	 outline:1px solid red;
	 width:48%;
	 margin:1%;
 }
  .left2{
  
	 float:left;
	 font-family:funFont;
	  
	 width:18%;
	 margin:1%;
 }
 .lefty{
  
	 float:left;
	 font-family:funFont;
	  outline:1px solid red;
	 width:18%;
	 margin:1%;
 }
 
  #map-canvas {
   float:right;
   outline:1px solid red;
	overflow:hidden;
    min-height: 500px;
    padding: 0px;
	 margin:1%;
		width:48%;
   }
   #map-canvas2 {
   float:right;
   outline:1px solid red;
	overflow:hidden;
    min-height: 500px;
    padding: 0px;
	 margin:1%;
		width:78%;
   }
   .detailh2{
    
   
   margin:-10px;
   }
   .detailh2img  {
  
   width:100%;
		 
   }
 .detailh2img img{
 
		outline:1px solid red;
   }
   .logged{
       width:90%;
   
	margin-left: 3% ;
}
 
   .maph2{
   font-family:"Comic Sans MS", cursive, sans-serif;
   font-size:30px;
	text-align:center;
    padding:5px;
 }
    .maph23{
   font-family:"Comic Sans MS", cursive, sans-serif;
 
	 
    padding:5px;
 }
 
   .windowImg{
	   outline:1px solid red;
	   margin:1%;
   }
 #infoWindow{
	  width:20px;
	  outline:1px solid red;
  }
 /*========map form minus search box==================================================*/
   #mapForm{
	 overflow:hidden;
	 margin:auto;
	 outline:1px solid black;
	
 }


   
  
 
  /*details page ==========================================================*/ 
	   .details{
	
	 width:90%;
	 margin:auto;
	 padding:3%;
 
	 
	 }
	  .details img{
	  margin-top:2%;
	  margin-left:15%;
	 width:60%;
 	}
	 /* ===================table detail page================================*/ 
	 table{
	 
		 width:100%;
		 border-collapse:collapse;
	 }
	 
	 table img{
		outline:1px solid red;
		width:20%;
	 }
	  th{
		 background:#5E89CD;
		 text-align:center;
		 font-family:funFont;
		 font-size:175%;
	 }
	  td:nth-child(2){
		    	border-right: 1px solid red;
				width:25%;
	  }
	  td:nth-child(3){
				width:45%;
		    	border-right: 1px solid red;
	  }
	 td:nth-child(4){
			width:15%;
			text-align:center;;
	 }
	  td:first-child{
	  	border-right: 1px solid red;
		 padding:5px;
		 overflow:hidden;
		 width:15%;
		text-align:center;
	 }
	 td{
		 border-bottom: 1px solid red;
		 padding:5px;
		 overflow:hidden;
		 
	 }
	 tr:nth-child(even){
		background:#EBEBEB;
	 }
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
 </style><script type="text/javascript" src="detailsJs.js"> </script>
 </head>