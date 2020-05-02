<?php
include('Connection/cn.php');

	if(@$_GET['id'])
	{
		$id=$_GET['id'];
		$del=mysqli_query($cn,"DELETE FROM `registration` WHERE Reg_id=$id"); 
		
	}
	$s=mysqli_query($cn,"select * from registration");
?>

<html>
<head>
<title>show_data</title>
</head>
<body>
<table border=1 align="center">
<h1 align="center"> registrated people</h1>
<tr><td>sr_no</td>
	<td>name</td>
	<td>gender</td>
	<td>age</td>
	<td>mobile no</td>
	<td>blood group</td>
	<td>email</td>
	<td>address</td>
	<td>city</td>
	<td>donate date</td>
	<td>Action</td>
	<td>Action</td>
	
</tr>
<?php
			$i=1;
			while($f=mysqli_fetch_array($s))
			{
?>
<tr>
	<td><?php echo $i++; ?> </td>
	<td><?php echo $f['Name']; ?></td>
	<td>  <?php echo $f['gender']; ?></td>	
	<td>  <?php echo $f['Age']; ?></td>
	<td>  <?php echo $f['Mobile_No']; ?></td>
	<td>  <?php $sa = $f['Blood_Group'];
				
					$ss=mysqli_query($cn,"select * from  Blood_Group where id='$sa'"); 
					$fa=mysqli_fetch_array($ss);
					
					echo $fa['blood_group_name'];?></td>
	<td>  <?php echo $f['Email']; ?></td>
	<td>  <?php echo $f['Address']; ?></td>
	<td>  <?php echo $f['City']; ?></td>
	<td>  <?php echo $f['donate_date']; ?></td>
	<td><a href="../registrationform.php?id=<?php  echo $f['Reg_id']; ?>">select</a>
	<td><a href="reg_data.php?id=<?php  echo $f['Reg_id']; ?>">Delete</a></td>
	
</tr>


<?php
}
?>
</table>
</body>
</html>
