<?php
	
	include('Connection/cn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<?php
		$s=mysqli_query($cn,"select * from registration");
	?>
	<table border="1" align="center">
		<tr>
			<td>Name</td>
			<td>Gender</td>
		</tr>
		<?php
			while($f=mysqli_fetch_array($s))
			{
		?>
		<tr>
			<td><?php echo $f['Name']; ?></td>
			<td><?php echo $f['gender']; ?></td>
			
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
