<?php 
	session_start();
	include('Connect.php');

	$UserID=$_SESSION['UID'];

	if (isset($_REQUEST['change'])) 
	{
		$Npass=$_REQUEST['npass'];
		$Cpass=$_REQUEST['cpass'];

		if ($Npass == $Cpass) 
		{
			$hashpassword=md5($Npass);
			$update="Update users 
					set Password='$hashpassword'
					where UserID='$UserID'";

			$urun=mysqli_query($connect,$update);

			if ($urun) 
			{
				echo "<script>window.alert('Your password has changed successfully')</script>";
				echo "<script>window.location='viewprofile.php'</script>";
			}

			else
			{
				echo "<script>window.alert('Something went wrong')</script>";
				echo mysqli_error($connect);
			}
		}

		else
		{
			echo "<script>window.alert('Your confirmation password does not match your new password.Try again!')</script>";
			echo "<script>window.location='changepassword.php'</script>";
		}
	}


 ?>

  <html>
 <head>
 	<title>New Password</title>
 		<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script> 	

 </head>
 <body class="newyork">
  <div class="page2">
 		<div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
              <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>
               <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities </a> 
                <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
      
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>  
               <a href="MyQuestions.php">My Questions</a>
              <a href="viewprofile.php"><span>My Profile</span></a>
              <a href="FaqDisplay.php">FAQ</a>
              
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>
</div>
  

  <div class="search-box">

    <input class="search-txt" type="text" name="" placeholder="Type to search">
    <a class="search-btn" href="#"> <i class="fas fa-search"></i></a>

  </div>

   <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
    </ul>
  </div>

 <form action="" method="post" class="profile">
 	<table class="emotion">
 		<tr>
 			<td>Enter New Password <i class="fas fa-key"></i> : </td>
 			<td><input type="password" name="npass" ></td>
 		</tr>

 		<tr>
 			<td>Confirm New Password <i class="fas fa-key"></i> : </td>
 			<td><input type="password" name="cpass"></td>
 		</tr>

 		<tr>
 			<td colspan="2"><button name="change" type="submit">Confirm</button></td>
 		</tr>



 	</table>

 </form>
 </body>
</div class="jade">
  <footer class="page5">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>


<div>
 </html>