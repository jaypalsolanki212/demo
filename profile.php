<?php

session_start();
if($_SESSION['email'])
{
	
include('Connection/cn.php');
	
if($_SESSION['email'])
{
	
 $s=mysqli_query($cn,"select * from registration WHERE Reg_id='".$_SESSION['id']."'"); 

?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<body>
<img src="image/symbol.jpg" height="100px" width="100px"/>
<div class="head-1">
			
			<h1>Online Blood Management System</h1>

</div>

<div class="sticky">


<div class="menu" id="myTopnav">
		
		
		<?php include('menu.php'); ?>
</div>
<form method="post">
<table border="1" align="center">
<h1 align="center">Profile</h1> 

<tr>
	<td>name</td>
	<td>gender</td>
	<td>age</td>
	<td>mobile no</td>
	<td>blood group</td>
	<td>email</td>
	<td>Address</td>
	<td>City</td>
	<td>Action</td>
	
</tr>
<?php
	while($f=mysqli_fetch_array($s))
	{
?>

<tr>
	<td>  <?php echo $f['Name']; ?></td>
	<td>  <?php echo $f['gender']; ?></td>	
	<td>  <?php echo $f['Age']; ?></td>
	<td>  <?php echo $f['Mobile_No']; ?></td>
	<td>  <?php  $sa= $f['Blood_Group']; 
					$qry=mysqli_query($cn,"select * from blood_group where id='$sa'");
					$fa=mysqli_fetch_array($qry);
					echo $fa['blood_group_name'];
					?></td>
	<td>  <?php echo $f['Email']; ?></td>
	<td>  <?php echo $f['Address']; ?></td>
	<td>  <?php echo $f['City']; ?></td>
	<td><a href="registrationform.php?id=<?php echo $f['Reg_id']; ?>">edit</a>
	
</tr>
<?php
	}
}
?>

</table>
</form>
</body>
</html>
<?php
	}
	else
	{
		header('Location: login_form.php');
	}
?>