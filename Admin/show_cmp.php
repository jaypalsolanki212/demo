
<html>
<head>
<title>show_cmp</title>
</head>
<?php 

include('../Connection/cn.php');
if(@$_GET['id'])
{
	$id=$_GET['id'];
	$del=mysqli_query($cn,"DELETE FROM mng_camp WHERE id=$id"); 
}
$d=mysqli_query($cn,"select * from mng_camp");
?>
<body>
<table border="1" align="center">

<center><h1>camp_master</h1></center>
<tr>
	<td>organised by</td>
	<td>camp_title</td>
	<td>city</td>
	<td>area</td>
	<td>detail</td>
	<td>camp date</td>
	<td>Action</td>
	<td>Action</td>
</tr>
<?php 
while($f=mysqli_fetch_array($d))
{
?>

<tr>
	<td><?php echo $f['org_by']; ?></td>
	<td><?php echo $f['camp_title']?></td>
	<td><?php echo $f['city']?></td>
	<td><?php echo $f['area']?></td>
	<td><?php echo $f['detail']?></td>
	<td><?php echo $f['cmp_date']?></td>
	<td><a href="mng_camp.php?id=<?php  echo $f['id']; ?>">select</a></td>
	<td><a href="show_cmp.php?id=<?php  echo $f['id']; ?>">delete</a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>

