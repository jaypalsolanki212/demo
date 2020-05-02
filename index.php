<?php 
session_start();	
if($_SESSION['email'])
{
	include('Connection/cn.php');
?>

<html>
<head>
<title></title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	h1 {
    color: red;
    text-shadow: 2px 2px 4px black;
}
div.sticky {
  position: -webkit-sticky;
  position: sticky;
 top:0;
  
}
</style>

<style>
html, body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: "Helvetica", sans-serif;
}

img {
  max-width: 100%;
	}

.slider-container{
  height: 500px;
  width: 100%;
  position: relative;
  overflow: hidden; 
  text-align: center;
}

.menu {
  position: absolute;
  left: 0;
  z-index: 900;
  width: 100%;
  bottom: 0;
}

.menu label {
  cursor: pointer;
  display: inline-block;
  width: 16px;
  height: 16px;
  background: #fff;
  border-radius: 50px;
  margin: 0 .2em 1em;
  &:hover {
    background: red;
  }
}

.slide {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 100%;
  z-index: 10;
  padding: 8em 1em 0;
  background-size: cover;
  background-position: 50% 50%;
  transition: left 0s .75s;
}

[id^="slide"]:checked + .slide {
  left: 0;
  z-index: 100;
  transition: left .65s ease-out;
}

.slide-1 {
  background-image: url(image/slider1.jpg); 
}
.slide-2 {
  background-image: url(image/slider2.jpg);
}
.slide-3 {
  background-image: url("https://source.unsplash.com/OlZ1nWLEEgM/1600x900"); 
}
</style>
</head>
<body>
<img src="image/symbol.jpg" height="100px" width="100px"/>
<div class="head-1">
			
			<h1>Online Blood Management System</h1>

</div>
<br><br><br>
<div class="sticky">



<div class="menu" id="myTopnav">
		
	<?php include('menu.php'); ?>
	
		
		<a href="javascript:void(0);" class="icon" onClick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
</div>

</div>
<br>
<br>
<br>
	
	<div class="slider-container">
  <div class="menu">
    <label for="slide-dot-1"></label>
    <label for="slide-dot-2"></label>
    <label for="slide-dot-3"></label>
  </div>
  
  <input id="slide-dot-1" type="radio" name="slides" checked>
    <div class="slide slide-1"></div>
  
  <input id="slide-dot-2" type="radio" name="slides">
    <div class="slide slide-2"></div>
  
  <input id="slide-dot-3" type="radio" name="slides">
    <div class="slide slide-3"></div>
</div>
	
	<div class="head-2">
		<h2> Welcome To Blood Bank Management System</h2>
		<p>If you are a new user then first sign up, and if youare a member then enter your details regarding your
		   personal information,contact information, healthinformation. Press submit and your location will be
		   traced and infor-<br>mation will be available Register means registration in terms of Username
		   and Password then check the availability of blood in hospital, blood banks, and blood donors, 
		   if present thenget the information and list of them <br>and use theinformation as per the requirement 
		   and then exit.If blood needed then first check that account ispresent or
		   not for that go to point 4 the users location is traced and according to the location nearby
		   hospitals, blood donors,blood banks is listed. Then choose the information as per the requirement and
		   then exit.Login: If the account is present then proceed to point
		   and exit but if not then register. 
		   <?php
		  	  $s=mysqli_query($cn,"select * from mng_news");
			while($f=mysqli_fetch_array($s)) 
			{
			echo $f['news']; 
			echo"<br>";
			}
		    ?>
		   
		   
		   </p>
		   
	</div>
	<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}
</script>
</body>
</html>
<?php
	}
	else
	{
		header('Location: login_form.php');
	}
?>