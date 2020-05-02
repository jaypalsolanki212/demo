<?php
session_start();	
if($_SESSION['email'])
{
include('Connection/cn.php');
$d=mysqli_query($cn,"select * from mng_camp");
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<style>
 table.cmp {
    margin-top: 5%;
}
</style>
<title>camp</title>
</head>
<body>
<img src="image/symbol.jpg" height="100px" width="100px"/>
<div class="head-1">
			
			<h1>Online Blood Management System</h1>

</div>

<div class="sticky">


<div class="menu" id="myTopnav">
		
		
		<?php include('menu.php'); ?>
</div>
<form action="#" method="post">


<table border="1" align="center" class="cmp">
<h1 align="center">camp</h1>
<tr>
<td>organised by</td>
	<td>camp_title</td>
	<td>city</td>
	<td>area</td>
	<td>detail</td>
	<td>camp date</td>
	
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


</tr>
<?php 
}
?>
</table>

</body>
</html>
<?php
	}
	else
	{
		header('Location: login_form.php');
	}
?>