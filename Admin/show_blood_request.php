

<?php
	include('Connection/cn.php');
	if(@$_GET['id'])
	{
		$id=$_GET['id'];
		$del=mysqli_query($cn,"DELETE FROM `blood_request` WHERE id=$id"); 
		
	}
	$s=mysqli_query($cn,"select * from blood_request"); 
	 
?>

<?php
	if(isset($_POST['ac']))
	{
		$id=$_POST['sendid'];

		 /*?>$ss=mysqli_query($cn,"select * from blood_request where id=$id");
		$fet=mysqli_fetch_array($ss);
		$ser=$fet['Blood_Group'];
		$d=mysqli_query($cn,"select * from donor where Blood_Group='$ser'");
		$fg=mysqli_fetch_array($d);
		$r=mysqli_num_rows($d);<?php */
		
		//if($r==$fet['qty'])
		
		$s=mysqli_query($cn,"select * from blood_request where id='$id'");
		$fet=mysqli_fetch_array($s);
		
		if($fet['status']=='accept')
		{
				echo"already accpted";
		}else
		{
		
		$qty=$fet['qty'];
		$bldgrp=$fet['Blood_Group'];
		
		$sel=mysqli_query($cn,"select * from donor where Blood_Group='$bldgrp'");
		$fat=mysqli_fetch_array($sel);
		$rw=mysqli_num_rows($sel);
		
		echo $ans=$rw-$qty; 
		
		
		
		if($ans<$qty)
		{
		echo " out of stock"; 
		}
		else
		{
			$up=mysqli_query($cn,"update blood_request set status='accept' where id=$id");
			for($i=1; $i<=$qty; $i++)
			{
				$sal=mysqli_query($cn,"select * from donor where Blood_Group='$bldgrp'");
				$faat=mysqli_fetch_array($sal);
				$dd=$faat['Reg_id'];
			
				$del=mysqli_query($cn,"delete from donor where Reg_id='$dd'");
			}
			
		}
	}
		
	//else
		//{
			//echo "Not invelid items.. ";
		//}
	}
		
 
?>
<html>

<title>Untitled Document</title>
</head>

<body>
<table border="1" align="center">

<tr><td>SR No</td>
	<td>name</td>
	<td>gender</td>
	<td>mobile no</td>
	<td>blood group</td>
	<td>quantity</td>
	<td>current date</td>
	<td>status</td>
	
	<td>Action</td>
	
</tr>
<?php
$i=1;
while($f=mysqli_fetch_array($s)){
?>
<tr>
	<td><?php echo $i++; ?> </td>
	<td><?php echo $f['name']; ?></td>
	<td><?php echo $f['gender']; ?></td>
	<td><?php echo $f['mobile_no']; ?></td>
	<td><?php $sa = $f['Blood_Group'];
				
					$ss=mysqli_query($cn,"select * from  Blood_Group where id='$sa'"); 
					$fa=mysqli_fetch_array($ss);
					
					echo $fa['blood_group_name']; ?></td>
	
	<td><?php echo $f['qty']; ?></td>
	<td><?php echo $f['current_date'];?></td>
	<td>
		<form method="post">
			<input type="hidden" value="<?php echo $f['id']; ?>" name="sendid">
			<input type="submit" name="ac" value="accept">
			
		</form>
	</td>
	<td><a href="show_blood_request.php?id=<?php  echo $f['id']; ?>">Delete</a></td>

</tr>
<?php
}
?>
</table>
</body>

</html>
