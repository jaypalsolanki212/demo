<?php 
include('Connection/cn.php');
if(@$_GET['id'])
{

$id=$_GET['id'];
 $s=mysqli_query($cn,"select * from mng_news where id='$id'"); 
$rw=mysqli_fetch_array($s);

}
if(isset($_POST['Update']))
{
$id=$_POST['sendid'];
$news=$_POST['news'];

$up=mysqli_query($cn,"update `mng_news` set `news`='$news' where `id`=$id");

header('Location: ../Admin/show_news.php');
}

if(isset($_POST['Submit']))
{
$news=$_POST['news'];

	if($news=='')
	{
		echo"field are required..";
	}
	else
	{
		$in=mysqli_query($cn,"INSERT INTO `mng_news`(`news`) VALUES ('".$news."')"); 
	}

}
?>
<html>
<head>
<title>Untitled Document</title>
</head>
<form action="mng_news.php" method="post">
<body>
<table border="1" align="center">
	<h1 align="center">manage news</h1>
	
	<tr>
		<td>
			add news:		
		</td>
		<td>
		<input type="text" name="news" value="<?php echo @$rw['news'];?>"><input type="hidden" value="<?php echo $_GET['id'];?>" name="sendid">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
	
		<?php if(isset($_GET['id'])){?>
			<input type="submit" name="Update" value="Update">
		<?php } else { ?>
	
		<input type="submit" name="Submit" value="Submit">
		
		
		<?php } ?>
		</td>
	</tr>
</table>

</body>
</form>
</body>
</html>

