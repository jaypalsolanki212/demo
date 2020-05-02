<?php
$hostname="localhost";
$username="root";
$password="";
$databasename="blood_bank";

$cn = new mysqli($hostname, $username, $password, $databasename);

if($cn)
{
	echo"connection eshtablish";
}
else
{
	echo"connection not eshtablish";
}


//$cn = mysql_connect($hostname, $username, $password);
//mysql_select_db($cn,$databasename);
?>