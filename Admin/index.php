<?php
	session_start();	
	if($_SESSION['email'])
	{
	include('Connection/cn.php');
?>
<html>
<head>
<style>

td .s{
	background:#0033CC;
    background-image: url("slide3.jpg");
    background-repeat: no-repeat;
}

</style>
<title>Untitled Document</title>

</head>


<body>
<table border=1 align="center"  width="100%" >

		<caption> welcome to Admin panel</caption>
	
<tr>
	<td colspan="2" style=" background-image:url(image/slide3.jpg); height:auto; width:100%; 
    background-repeat: no-repeat; background-size: cover;">
	<?php /*?><img src="../image/heart-health-weeks-banner.jpg" width="1400" height="200"/><?php */?>
		<h1 align="right">Last Login :<?php echo $_SESSION['cdt']; ?></h1>
		<h1 align="right"><a href="../logout.php"> Logout</a></h1>
		
	</td>
</tr>

<tr>
	<td style="width:20%;">
		 Ragistration : <a href="../registrationform.php">+</a> 
	</td>
	
	<td style="50%;" rowspan="8">
	dgdf
	</td>
</tr>
<tr>
<td>
	show registration user:<a href="reg_data.php">show user</a>
	</td>
</tr>
<tr>
<td>
	show donor:<a href="show_donor.php">show donor</a>
	</td>
</tr>
<tr>
	<td>
		add blood group:<a href="add_blood_group.php">add</a>
	</td>
	
</tr>
<tr>
	<td>
		add camp:<a href="mng_camp.php">add camp</a>
	</td>
	
</tr>
<tr>
<td>
manage news:<a href="#">manage news</a>
</td>
</tr>
<tr>
	<td>
			stock:<a href="blood_stock.php">blood stock</a>
	</td>
</tr>
<tr>
	<td>
			blood_request:<a href="show_blood_request.php">show request</a>
	</td>
</tr>
</table>
	
	
</body>
</html>
<?php
	}
	else
	{
		header('Location: ../login_form.php');
	}
?>
	
	
	
	
	

