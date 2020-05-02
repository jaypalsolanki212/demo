<?php
	session_start();
	
	include('Connection/cn.php');
	
	if(@$_GET['id'])
	{
		$id=$_GET['id'];
		$r=mysqli_query($cn,"select * from blood_group where id=$id");
		$rw=mysqli_fetch_array($r);
	}


	if(@$_GET['id'])
	{
			$id=$_GET['id'];
			$del=mysqli_query($cn,"delete from blood_group where id=$id");
			
		}	

	$f=mysqli_query($cn,"select * from blood_group");
	

?>


<html>
<head>
<title>Untitled Document</title>
</head>
<body>
<table border="1" align="center"> 

<tr>
<td>id</td>
<td>blood group</td>
<td>action</td>
<td>Action</td>
</tr>


<?php
$id=1;
while($s=mysqli_fetch_array($f))
{

?>

<tr>
<td> <?php echo $id++;?> </td>

<td> <?php echo $s['blood_group_name']?></td>

<td><a href="add_blood_group.php?id=<?php echo $s['id'];?>">Edit</a></td>
<td><a href="view_bloodgrp.php?id=<?php echo $s['id'];?>">delete</a></td>
</tr>





<?php
}
?>



</table>
</body>
</html>
