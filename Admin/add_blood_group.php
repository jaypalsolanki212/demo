<?php

session_start();

if($_SESSION['email'])
{
	
	include('Connection/cn.php');

		
	if(@$_GET['id'])
	{
		$id=$_GET['id'];
		$r=mysqli_query($cn,"select * from blood_group where id=$id");
		$rw=mysqli_fetch_array($r);
	}
	if(isset($_POST['Update']))
	{
		$id=$_POST['sendid'];
		$blood_group_name=$_POST['blood_group_name'];
		
		   $up=mysqli_query($cn,"UPDATE `blood_group` SET `blood_group_name`='$blood_group_name' where id=$id"); 
		  
		 	 header('Location: view_bloodgrp.php');
	}

if(isset($_POST['Submit']))
{
	
	$blood_group_name=$_POST['blood_group_name'];
	if($blood_group_name=='')
	{
		echo"field are required";
	}
	else
			{
				 $insert=mysqli_query($cn,"INSERT INTO `blood_group`(`blood_group_name`) VALUES ('$blood_group_name')"); 
			}
					
	header('Location: view_bloodgrp.php');
	
}
?>


<html>
<head>
<title>add new blood group</title>
</head>
<body>

<table align="center" border="1"> 
<form action="add_blood_group.php" method="post">

	<tr>
		<td> Add blood group</td>
		<td><input type="text" name="blood_group_name" value="<?php echo @$rw['blood_group_name']; ?>" >
		<input type="hidden" value="<?php echo $_GET['id'] ?>" name="sendid"></td>
		
		<td><?php if(isset($_GET['id'])){?>
			<input type="submit" name="Update" value="Update"/>
		<?php } else { ?>
	
		<input type="submit" name="Submit" value="submit"></td>
		
		
		<?php } ?>
	</tr>


</form>
</table>
</body>
</html>
<?php

}

?>