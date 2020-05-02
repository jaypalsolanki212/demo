<?php
include('Connection/cn.php');
?>
<?php

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$r=mysqli_query($cn,"select * from blood_request where id=$id");
		$rw=mysqli_fetch_array($r);
		
	}
if(isset($_POST['Submit']))
{
	$nm=$_POST['name'];
	$gnd=$_POST['gender'];
	$blood=$_POST['Blood_Group'];
	$mob=$_POST['mobile_no'];
	$qty=$_POST['qty'];
	//$current_date=$_POST['current_date'];

if($nm==''||$gnd==''||$blood==''|| $mob==''|| $qty=='')
{
echo"all field are requeired";
}
else
{
  $ins=mysqli_query($cn,"INSERT INTO `blood_request`(`name`, `gender` ,`Blood_Group`,`mobile_no`, `qty`,`current_date`) VALUES('".$nm."','".$gnd."','".$blood."','".$mob."','".$qty."','".date('d-m-Y')."')");
		 
}

}
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
		<?php
include('menu.php');		
	?>
</div>

</div>

<form method="post">
<table align="center" border="1">
<h1 align="center">blood request</h1>
<tr>
	<td>
	name:
	
	</td>
	<td><input type="text" name="name" value="<?php echo @$rw['name'];?>"><input type="hidden" value="<?php echo $_GET['id'];?>" name="sendid"></td>

</tr>
<tr>
	<td>
		gender:
	</td>
	<td>
		<input type="radio" name="gender" value="male"  <?php if(@$rw['gender']=='male') {?> checked <?php }?> >Male
		<input type="radio" name="gender" value="female" <?php if(@$rw['gender']=='female') {?> checked <?php }?>>Female
	</td>
</tr>
<tr>
	<td>
		patient blood group:
	
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

</tr>
<tr>
	<td>
		mobile no:
	</td>
	<td>
		<input type="text" name="mobile_no" maxlength="10" value="<?php echo @$rw['mobile_no'];?>">
	</td>
</tr>
<tr>
	<td>
		quantity:
	</td>
	<td><input type="text" name="qty" value="<?php echo @$rw['qty'];?>"></td>
</tr>

<tr>
<td colspan="2" align="center">
	<?php if(isset($_GET['id'])){?>
			<input type="submit" name="view" value="view">
			<!--try -->
			
	
			<!--tryy -->
		<?php } else { ?>
	
		<input type="submit" name="Submit" value="Submit">
		
		
		<?php } ?>
</tr>
</table>
</form>
</body>
</html>
