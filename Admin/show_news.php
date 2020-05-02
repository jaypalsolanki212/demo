<?php 
include('Connection/cn.php');

	
$s=mysqli_query($cn,"select * from mng_news");

?>



<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<table border="1" align="center">
<tr>
	<td>
			news
	</td>
	<td>
		Action
	</td>
</tr>
<?php
			while($f=mysqli_fetch_array($s))
			{
?>
<tr>
		<td><?php echo $f['news']; ?></td>
		<td><a href="mng_news.php?id=<?php echo $f['id']; ?>">select</a></td>
</tr>

<?php
}
?>
</table>

</body>
</html>
