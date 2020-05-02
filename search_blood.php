<?php
	session_start();
	include('Connection/cn.php');
	if($_SESSION['email'])
{
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<style>

 .search_blood {
    margin-left: 37%;
    margin-top: 5%;
}
</style>
<title>search blood</title>
</head>

<body>
<!-- menu-->

<img src="image/symbol.jpg" height="100px" width="100px"/>
<div class="head-1">
			
			<h1>Online Blood Management System</h1>

</div>

<div class="sticky">


<div class="menu" id="myTopnav">
		
		
			<?php include('menu.php'); ?>
</div>

</div>
<!-- search blood -->
<form method="post">
<table align="center" border="1" class="search_blood">
<tr>
	<td>
		Search Blood:
	</td>
	<td>
		<?php
			$s=mysqli_query($cn,"select * from blood_group");
			
		?>
		<select name="Blood_Group">
			<option value="select" >select</option>
			<?php
				while($f=mysqli_fetch_array($s))
				{
			?>
				<option value="<?php echo $f['id']; ?>"><?php echo $f['blood_group_name'];?></option>
			<?php
				}
			?>
	</select>
	</td>
	<td>
	<input type="submit" name="search" value="search">
	</td>
</tr>

</table>
</body>
</html>




<?php
include('Connection/cn.php');
if(isset($_POST['search']))
{
			 $blood= $_POST['Blood_Group'];
	   		$query = mysqli_query($cn,"SELECT * FROM `donor` WHERE Blood_Group='$blood'");  
		
	$count = mysqli_num_rows($query);
	
	
	if($count == "0")
	{
		
		$output = '<h2>No result found!</h2>';
	}
	
	else
	{
	?>
	
	
	<html>
	<head>
	</head>
		<body>
		<table border="1" align="center">
		<h1 align="center">search result</h1>
		<tr>
		<td>Sr No</td>
			<td>name</td>
			<td>blood_group</td>
			<td>address</td>
			<td>city</td>
			<td>mobile no</td>
			
		</tr>
		<?php	
		$i=1;
		while($row = mysqli_fetch_array($query))
		{
		?>	
		<tr>	
				<td><?php echo $i++; ?> </td>
				<td><?php echo $nm=$row['Name'];?> </td>
			 	<td><?php  $s = $row['Blood_Group'];
				
					$ss=mysqli_query($cn,"select * from  Blood_Group where id='$s'"); 
					$f=mysqli_fetch_array($ss);
					
					echo $f['blood_group_name'];?></td>
				<td><?php echo $add=$row['Address'];?> </td>
				<td><?php echo $nm=$row['City'];?> </td>
				<td><?php echo $nm=$row['Mobile_No'];?> </td>
		</tr>	
		<?php
		}
		?>
<?php
		}
	
}
?>
</table>
			
		
	</body>
</html>
<?php
	}
	else
	{
		header('Location: login_form.php');
	}
?>