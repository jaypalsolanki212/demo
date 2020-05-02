<?php
include('Connection/cn.php');

?>

<?php
	$s=mysqli_query($cn,"select * from registration");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<table border=1 align="center">
<tr>
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
			while($f=mysqli_fetch_array($s))
			{
?>

<tr>
	<td><?php echo $f['Name']; ?></td>
	<td>  <?php echo $f['gender']; ?></td>	
	<td>  <?php echo $f['Age']; ?></td>
	<td>  <?php echo $f['Mobile_No']; ?></td>
	<td>  <?php echo $f['Blood_Group']; ?></td>
	<td>  <?php echo $f['Email']; ?></td>
	<td>  <?php echo $f['Address']; ?></td>
	<td>  <?php echo $f['City']; ?></td>
	<td>  <?php echo $f['donate_date']; ?></td>
	<td><a href="../registrationform.php?id=<?php  echo $f['Reg_id']; ?>">Edit</a></td>
	<td><a href="../registrationform.php?id=<?php  echo $f['Reg_id']; ?>">Update</a></td>
</tr>


<?php
}
?>

<?php

$s=mysqli_query($cn,"update set registration 
?>
</table>

</body>
</html>
