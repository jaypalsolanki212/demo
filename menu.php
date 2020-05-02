	
		<a href="index.php">Home</a>
		<?php if($_SESSION['email'])
		{
		
		}else{
		?>
			<a href="registrationform.php"> Registration</a>
		<?php
		}
		?>
		
	
		<a href="camp.php"> Camp</a>
		<a href="search_blood.php"> Search blood</a>
		
		<a href="#"> About Us</a>
		<a href="#"> Contact Us</a>	
		<?php if(isset($_GET['id']))
		{ ?>
		<a href="login_form.php">Login</a>
		
			
		<?php  } else { ?>
		<a href="profile.php">profile</a>
		<a href="logout.php">logout</a>
		<a href="blood_request.php">Blood_Request</a>
		
		<?php } ?>
		
		