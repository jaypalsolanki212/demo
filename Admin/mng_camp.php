
<?php

include('../Connection/cn.php');

if(isset($_POST['Submit']))
{

$org_by=$_POST['org_by'];
$camp_title=$_POST['camp_title'];
$city=$_POST['city'];
$area=$_POST['area'];
$detail=$_POST['detail'];


if($org_by==''||$camp_title==''||$area=='' ||$detail=='')
	{
			echo"all field are req....";
	}
	else
	{
		  $s=mysqli_query($cn,"INSERT INTO `mng_camp`(`org_by`, `camp_title`, `city`, `area`, `detail`,`cmp_date`) VALUES('".$org_by."','".$camp_title."','".$city."','".$area."','".$detail."','".date('d-m-Y')."')");
		 
	}
		header('Location: show_cmp.php');
}
?>

<?php

if(isset($_POST['Update']))
	{
	$id=$_POST['sendid'];
	$org_by=$_POST['org_by'];
	$camp_title=$_POST['camp_title'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	$detail=$_POST['detail'];
	
	 $up=mysqli_query($cn,"UPDATE `mng_camp` SET `org_by`='$org_by',`camp_title`='$camp_title',`city`='$city',`area`='$area',`detail`='$detail' where $id=id");

 header('Location: Admin/show_cmp.php');
 }
?>

<?php 
if(@$_GET['id'])
{
	$id=$_GET['id'];
	$q=mysqli_query($cn,"select * from  mng_camp");
	$f=mysqli_fetch_array($q);
}
?>
<html>
	<head>
		
	</head>
	<body>
	<form action="mng_camp.php" method="post">
		<table border=1 align="center">
			<center><h1>camp_master</h1></center>
		<tr>
			<td>
				Organised By:
			</td>
			<td>
			<input type="text" name="org_by" value="<?php echo @$f['org_by']?>"><input type="hidden" value="<?php echo $_GET['id'];?>" name="sendid">
			</td>	
		</tr>
		<tr>
			<td>
				camp title:
			</td>
			<td>
			<input type="text" name="camp_title" value="<?php echo @$f['camp_title']?>">
			</td>	
		</tr>
		<tr>
			<td>
				city:
			</td>
			<td>
				<select name="city">
						<option value="select">--select--</option>
						<option value="Bhavnagar"<?php if(@$f['city']=='Bhavnagar'){?> selected="selected"<?php }?>>Bhavnagar</option>
						<option value="Anand"<?php if(@$f['city']=='Anand'){?> selected="selected"<?php }?>>Anand</option>
						<option value="Surat"<?php if(@$f['city']=='Surat'){?> selected="selected"<?php }?>>Surat</option>
						<option value="Ahemdabad"<?php if(@$f['city']=='Ahemdabad'){?> selected="selected"<?php }?>>Ahemdabad</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>
					area:
				</td>
				<td>
					<input type="text" name="area" value="<?php echo @$f['area']?>">
				</td>
			</tr>
			<tr>
				<td>
					detail:
				</td>
				<td>
					<input type="text" name="detail" value="<?php echo @$f['detail']?>">
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<center>
					<?php if(isset($_GET['id'])){?>
					<input type="submit" name="Update" value="Update">
					<?php } else { ?>
					<input type="submit" name="Submit" value="Submit">
					<?php } ?>
					<input type="reset" name="cancel" value="cancel"><br>
					</center>
				</td>
				
			</tr>
		</table>
		</form>
		
		
	</body>
</html>
<body>
</body>
</html>
