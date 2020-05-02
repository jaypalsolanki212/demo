<?php
session_start();
include('Connection/cn.php');

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$r=mysqli_query($cn,"select * from registration where Reg_id=$id");
		$rw=mysqli_fetch_array($r);
		
	}
	
	if(isset($_POST['Update']))
	{
	$id=$_POST['sendid'];
	$Name=$_POST['Name'];
	$gender=$_POST['gender'];
	$Age=$_POST['Age'];
	$Mobile_No=$_POST['Mobile_No'];
	$Blood_Group=$_POST['Blood_Group'];
	$Email=$_POST['Email'];
	$Address=$_POST['Address'];
	$City=$_POST['City'];
	$Password=$_POST['Password'];
	
	 $up=mysqli_query($cn,"UPDATE `registration` SET `Name`='$Name',`gender`='$gender',`Age`='$Age',`Mobile_No`='$Mobile_No',`Blood_Group`='$Blood_Group',`Email`='$Email',`Address`='$Address',`City`='$City',`Password`='$Password' WHERE Reg_id='$id'"); 
	 
	 if(!$_SESSION['email']=='')
	 {
	 header('Location: Admin/reg_data.php');
	 }
	 else
	 {
	  header('Location: profile.php?id='.$_SESSION['id']);
	 }
	
	
	}
	if(isset($_POST['Submit']))
	{
	$Name=$_POST['Name'];
	@$gender=$_POST['gender'];
	$Age=$_POST['Age'];
	$Mobile_No=$_POST['Mobile_No'];
	$Blood_Group=$_POST['Blood_Group'];
	$Email=$_POST['Email'];
	$Address=$_POST['Address'];
	$City=$_POST['City'];
	$Password=$_POST['Password'];
	$confirmpass=$_POST['confirm_password'];
	
	
	
			if($Name=='' || $gender==''|| $Age=='' || $Mobile_No=='' || $Blood_Group=='' || $Email=='' || $Address==''|| $City=='' || $Password=='' ||$confirm )
			{
				$msg=" all fields are requreid";
			}
			else
			{
				 $insert= mysqli_query($cn,"INSERT INTO `registration`(`Name`, `gender`, `Age`, `Mobile_No`, `Blood_Group`, `Email`, `Address`, `City`, `Password`, `donate_date`) VALUES('".$Name."','".$gender."','".$Age."','".$Mobile_No."','".$Blood_Group."','".$Email."','".$Address."','".$City."','".$Password."','".date('d-m-Y')."')");
				 $insert= mysqli_query($cn,"INSERT INTO `donor`(`Name`, `gender`, `Age`, `Mobile_No`, `Blood_Group`, `Email`, `Address`, `City`, `Password`, `donate_date`) VALUES('".$Name."','".$gender."','".$Age."','".$Mobile_No."','".$Blood_Group."','".$Email."','".$Address."','".$City."','".$Password."','".date('d-m-Y')."')");
				 
				 
			}
			
		header('Location: registrationform.php?msg=1');
	}
	
?>
<br>

<html>
<title></title>
<head>


<link href="style.css" rel="stylesheet" type="text/css">
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
   <script>
function displayMessage() {
    document.getElementById("msg").innerHTML = "<strong>Note:</strong>Age must be between 18 and 25";
}
 
function validateAge(age) {
    var input = age.value;
    if(input>=18&&input<=25) {
        return true;
    }
    else {
        alert("Age must be between 18 and 25 | You have entered "+input);
        return false;
    }
}
</script>
<script>
var check = function() {

  if (document.getElementById('Password').value ==
    document.getElementById('curr_Password').value) {
	
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
	
  }
}
</script>
 
</head>

<body>

<form  action="registrationform.php" method="post">

<!--  menu -->

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


<!--   registration form  -->


<table border="1" align="center">

<h1 align="center"> registration form</h1>
<div class="reg_tab">
<tr>

	<td>
<b>Name:</b>
	</td>

	<td>
	<input type="text" name="Name" id="nm" value="<?php echo @$rw['Name']; ?>"/> <input type="hidden" value="<?php echo $_GET['id'];?>" name="sendid">
	</td>
</tr>
<tr>
<td>
	<b>Gender:</b>
</td>

<td>
<input type="radio" name="gender" value="Male" <?php if(@$rw['gender']=='Male') {?> checked <?php }?>  /> Male
			<input type="radio" name="gender" value="Female" <?php if(@$rw['gender']=='Female') {?> checked <?php }?>/> Female
</td>

</tr>

<tr>
<td>
	<b>Age:</b>
</td>
<td>
	<input type="text" name="Age" id="age" value="<?php echo @$rw['Age'];?>" onFocus="validateAge()" onChange="return validateAge(this)"/>
	
</td>
</tr>

<tr>
<td>
	<b>Mobile No:</b>
</td>
<td>
	<input type="text" name="Mobile_No" id="txtChar" onKeyPress="return isNumberKey(event)" maxlength="10" value="<?php echo @$rw['Mobile_No']?>" />
	
</td>
</tr>

<tr>
<td>
<b>Blood Group:</b></td>
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
	<b>Email:</b>
</td>
<td>
	<input type="email" name="Email" id="email" value="<?php echo @$rw['Email'];?>"/>
</td>
</tr>

<tr>
<td>
	<b>Address:</b>
</td>
<td>
	<input type="text" name="Address" id="address" value="<?php echo @$rw['Address'];?>"/>
</td>
</tr>

<tr>
<td>
<b>City:</b></td>
<td>
		<select name="City">
		<option value="select">select</option>
		<option value="Bhavnagar"<?php if(@$rw['City']=='Bhavnagar'){?> selected="selected"<?php }?>>Bhavnagar</option>
		<option value="Anand"<?php if(@$rw['City']=='Anand'){?> selected="selected"<?php }?>>Anand</option>
		<option value="Surat"<?php if(@$rw['City']=='Surat'){?> selected="selected"<?php }?>>Surat</option>
		<option value="Ahemdabad"<?php if(@$rw['City']=='Ahemdabad'){?> selected="selected"<?php }?>>Ahemdabad</option>
		
</select>
	
</td>
</tr>


<tr>
<td>
	<b>Password:<b><br>
	<b>(policy:1 char capital,1 small char,1 digit, 1 special char)</b>
</td>
<td>
	
	<?php if(isset($_GET['id'])){?><input type="text" name="Password" id="password" value="<?php echo @$rw['Password'] ?>"  />
	<?php } else { ?>
	<input type="password" name="Password" id="Password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/><br>
	<?php }?>
</td>
</tr>
<tr>
<td><b>RE Enter your password:</b><br>
	<b>(policy:1 char capital,1 small char,1 digit, 1 special char)<b></td>
<td><input type="password" name="curr_Password" id="curr_Password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
 <span id='message'></span>
</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<?php if(isset($_GET['id'])){?>
			<input type="submit" name="Update" value="Update">
			<!--try -->
			<!--tryy -->
		<?php } else { ?>
		<input type="submit" name="Submit" value="Submit">
		<?php } ?>
		<input type="reset" name="cancel" value="cancel"><br>
		<?php echo @ $msg?>
		
		<?php 
			if(@$_GET['msg'])
			{
				echo "<script>
					
					alert('inserted successfully');
				</script>";
			echo'<meta http-equiv="Refresh" content="0; URL=registrationform.php" />';
			}	
		?>
	</td>
</tr>

</div>

</form>
</table>

</body>

</html>



