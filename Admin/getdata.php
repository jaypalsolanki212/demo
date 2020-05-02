<?php
	include('Connection/cn.php');
	
	$selname=$_GET['status'];
	$sendid=$_GET['sendid'];
 	$up=mysqli_query($cn,"update blood_request set status='$selname' where id=$sendid "); 
 ?>