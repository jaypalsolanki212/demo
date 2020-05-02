<?php
include('Connection/cn.php');

?>
<?php
if(isset($_POST['blood_stock']))
{
	$blood=$_POST['Blood_Group'];
	$ss=mysqli_query($cn,"select * from registration where Blood_Group='$blood'");
	$ff=mysqli_num_rows($ss);
 
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table align="center" border="1">
<tr>
	<td>
	blood group:
	</td>
	<td>
	
	<?php
$s=mysqli_query($cn,"select * from blood_group");
?>

<select name="Blood_Group">
	<option value="select" >select</option>
	<?php while($f=mysqli_fetch_array($s))
	{
	?>
		<option value="<?php echo $f['id'];?>"><?php echo $f['blood_group_name'];?></option>
	<?php }?>
	
</select>

	
	</td>
	
	<tr>
		<td colspan="2">
	<?php
	echo @$ff ." Unit"; 
	?>
	</td></tr>
</tr>

<tr>
	<td colspan="2" align="center">


		<input type="submit" name="blood_stock" value="blood_stock">
	</td>

</tr>
</table>
</form>
</body>
</html>

	<?php

/*$s=mysqli_query($cn,"select * from registration ");
$f=mysqli_num_rows($s);
echo $f; 
*/


?>

