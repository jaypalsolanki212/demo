
<?php
session_start();

include('Connection/cn.php');

if(isset($_POST['login']))
{
	if($_POST['Name']=='' || $_POST['Password']=='')
	{
		$msg="All fields are required...";
	}
	else{
		$uname=$_POST['Name'];
		$s=mysqli_query($cn,"select * from registration where Name='".$_POST['Name']."' and Password='".$_POST['Password']."'");
		$f=mysqli_fetch_array($s);
		if($f['Name']== $uname)
		{
			$_SESSION['email']=$uname;
			$_SESSION['id']= $f['Reg_id'];
			$_SESSION['cdt']=$f['cdt'];
			
			  $s=mysqli_query($cn,"UPDATE `registration` SET `cdt`='".date('d-m-Y : h:i:s')."' WHERE id='".$_SESSION['id']."'"); 
			
				header('Location: index.php');
		}
		else
		{
			$msg="your user name and password is invalid....";
		}

	}
	
	if($_POST['Name']=='' || $_POST['Password']=='')
	{
		$msg="All fields are required...";
	}
	else{
		$uname=$_POST['Name'];
		$s= mysqli_query($cn,"select * from adminlogin where uname='".$_POST['Name']."' and password='".$_POST['Password']."'"); 
		$f=mysqli_fetch_array($s);
		if($f['uname']== $uname)
		{
			$_SESSION['email']=$uname;
			$_SESSION['id']= $f['id'];
			$_SESSION['cdt']=$f['cdt'];
			
			  $s=mysqli_query($cn,"UPDATE `adminlogin` SET `cdt`='".date('d-m-Y : h:i:s')."' WHERE id='".$_SESSION['id']."'"); 
			
				header('Location: Admin/index.php');
		}
		else
		{
			$msg="your user name and password is invalid....";
		}
	}
}
?>
<html>
<title></title>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<style>

.login_form {
	border: 2px solid;
    margin: 200px;
    margin-left: 545px;
    background-color: azure;
    padding: 56px;

}
.btn{
	    padding-top: 30px;
		
}

</style>
</head>




	
<body>
<!--menu -->
<img src="image/symbol.jpg" height="100px" width="100px"/>
<div class="head-1">
			
			<h1>Online Blood Management System</h1>

</div>

<div class="sticky">


<div class="menu" id="myTopnav">
		
		
		<a href="index.php">Home</a>
		<a href="registrationform.php"> Registration</a>
		<a href="camp.php"> Camp</a>
		<a href="search_blood.php"> Search blood</a>
		<a href="#"> About Us</a>
		<a href="#"> Contact Us</a>	
		<a href="login_form.php">Login</a>
		<a href="javascript:void(0);" class="icon" onClick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
</div>

<!--login form -->
<form method="post">
	<div>	
	<table class="login_form">
	<th colspan="2" style="padding: 10px 0px;">
			Login Form
	</th>
		<tr>
		<td>
			User Name:
		</td>
		
		<td class="txtbox">
			<input type="text" name="Name" id="Name"/>
		</td>
		
		<tr>
		<td>
			Password:
		</td>
		<td>
				<input type="password" name="Password" id="Password"/>
		</td>
		</tr>
		<tr>
			<td colspan="2" class="btn">
		<center>
	
				<input type="submit" name="login" value="login"/>
			</center>
			</td>
		</tr>
		
	</table>
	</div>
	</form>
</body>
	

</html>









